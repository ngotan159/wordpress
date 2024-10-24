<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
 <?php
  $class = '';
  if (!is_single()) {
	$class = 'danh-sach';
  }
?>
<article <?php post_class('two-column-layout'); ?> id="post-<?php the_ID(); ?>">
    <div class="post-left-column">
        <div class="post-date">
            <span class="day"><?php echo get_the_date('d'); ?></span>
            <span class="month"><?php echo get_the_date('F'); ?></span>
        </div>
    </div>

    <div class="post-right-column">
        <?php get_template_part( 'template-parts/entry-header' ); ?>

        <div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">
            <div class="entry-content">
                <?php
                if ( ! is_singular() ) {
                    // Trích xuất 200 ký tự từ bài viết
                    $excerpt = wp_trim_words( get_the_content(), 50, '...' );
                    echo '<p>' . $excerpt . '</p>';
                } else {
                    the_content( __( 'Continue reading', 'twentytwenty' ) );
                }
                ?>
            </div>
        </div>
    </div>
</article>
<!-- .post -->
 <style>
	.two-column-layout {
    display: flex;
    align-items: flex-start;
    margin-bottom: 30px;
}

.post-left-column {
    flex: 0 0 15%;
    text-align: center;
	display: flex;
    justify-content: end;
    margin-left: 13%;
    margin-top: 2%;
    border-right: 1px solid;
    padding: 50px
}

.post-right-column {
    flex: 1;
    padding-left: 20px;
}

.post-date {
    font-size: 24px;
    font-weight: bold;
    line-height: 1.2;
}

.post-date .day {
    display: block;
    font-size: 50px;
    color: #333;
}

.post-date .month {
    display: block;
    font-size: 18px;
    color: #7c7373bf;
	font-weight: 450;
}

.entry-content p {
    margin-top: 0;
    font-size: 14px;
    color: #555;
	position: relative;
	transform: translateY(-50px);
}
.entry-categories-inner {
	display: none;
}
.entry-title {
	position: relative;
	top: 15px;
	text-align: left;
	font-size: 35px !important;
	display: flex;
    flex-direction: row;
	transform: translateX(-22px);
	
}
#site-content {
	background-color: #fff !important;
}
.post-inner {
    display: flex;  /* Sử dụng flex để canh thẳng hàng nội dung */
    flex-direction: row; 
}
.entry-title a {
	color: #3184fa !important;
	
}
 </style>
