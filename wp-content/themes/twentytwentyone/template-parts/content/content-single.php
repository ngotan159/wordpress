<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

 ?>

<div class="row">
            <div class="col-md-3 bg-corossedbg">
            <h4 class="categories-2">Categories</h4>
                <div class="crossedbg-13">

                        <div class="br-13">
                            <div class="crossedbg">

                            </div>
                                <div class="row br9">

                                    <div class="categories">
                                        <?php get_wp_categories(); ?>
                                    </div>
                                        <?php
                                            function get_wp_categories() {
                                                $categories = get_categories();
                                                if ($categories) {
                                                    echo '<ul>';
                                                    foreach ($categories as $category) {
                                                        echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                                                    }
                                                echo '</ul>';
                                                } else {
                                                echo 'No categories found.';
                                                }
                                            }
                                        ?>
                            </div>
                        </div>
                
            </div>
        </div>
 <div class="col-md-6">
	 
 <?php     
$date = get_the_date('d');
$month = get_the_date('m');
$year = get_the_date('y');
?>
<div class="detailpost">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header class="entry-header alignwide">
 <?php the_title( '<div class="row">
 <div class="ten col-md-10 col-xs-9"><h1 class="ten1 entry-title detail-title">', '</h1></div>
 <div class="col-md-2 col-xs-3 m-auto"><div class="headlinesdate date-detail">
 <div class="headlinesdm">
	 <div class="headlinesday">'. $date .'</div>
	 <div class="headlinesmonth">'. $month .'</div>
 </div>
 <div class="headlinesyear">’'. $year .'</div>
 </div></div>
 </div>' ); ?>
 <div class="row">
	 <div class="col-md-12"><div class="overviewline"></div></div>
 </div>
 <?php twenty_twenty_one_post_thumbnail(); ?>
</header><!-- .entry-header -->
<div class="entry-content" style="margin-bottom: 20px;">
 <?php the_content(); ?>
</div><!-- .entry-content -->
<?php if ( ! is_singular( 'attachment' ) ) : ?>
 <?php get_template_part( 'template-parts/post/author-bio' ); ?>
<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->

 </div>

 </div>
 
</div>
