<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

if ( have_posts() ) {
	?>
<header class="page-header alignwide">
	<h1 class="page-title">
		<?php
			printf(
				/* translators: %s: Search term. */
				esc_html__( 'Results for "%s"', 'twentytwentyone' ),
				'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
			);
		?>
	</h1>
</header><!-- .page-header -->

<div class="search-result-count default-max-width">
	<?php
		printf(
			esc_html(
				/* translators: %d: The number of search results. */
				_n(
					'We found %d result for your search.',
					'We found %d results for your search.',
					(int) $wp_query->found_posts,
					'twentytwentyone'
				)
			),
			(int) $wp_query->found_posts
		);
	?>
</div><!-- .search-result-count -->

<div class="search-page-container">
    <div class="sidebar-left">
        <?php if ( is_active_sidebar( '13-pages-sidebar' ) ) : ?>
            <aside class="widget-area">
                <?php dynamic_sidebar( '13-pages-sidebar' ); ?>
            </aside>
        <?php endif; ?>
    </div><!-- .sidebar-left -->

    <div class="main-content">
        <div class="search-results">
            <?php
            // Start the Loop.
            while ( have_posts() ) {
                the_post();
                ?>
                <div class="post">
                    <div class="post-thumbnail">
                    <?php
                    if ( has_post_thumbnail() ) {
                        // Hiển thị ảnh đại diện nếu có
                        the_post_thumbnail('thumbnail');
                    } else {
                        // Lấy nội dung bài viết
                        $content = get_the_content();
                        
                        // Tìm tất cả các thẻ <img> trong nội dung
                        preg_match_all('/<img[^>]+src=[\'"]?([^\'" >]+)[\'"]?[^>]*>/i', $content, $matches);
                        
                        if ( !empty($matches[1]) ) {
                            // Hiển thị ảnh đầu tiên tìm thấy trong nội dung
                            echo '<img src="' . esc_url($matches[1][0]) . '" alt="Post Image">';
                        } else {
                            // Ảnh mặc định nếu không có ảnh đại diện và không có ảnh trong nội dung
                            echo '<img src="' . get_template_directory_uri() . '/assets/images/default-image.jpg" alt="Default Thumbnail">';
                        }
                    }
                    ?>
                    </div>
                    <div class="post-date">
                        <div class="day">
                            <?php echo get_the_date('d'); ?>
                        </div>
                        <div class="month">
                            <?php echo get_the_date('F'); ?>
                        </div>
                    </div>
                    <div class="post-content">
                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
                <?php
            } // End the loop.

            // Previous/next page navigation.
            twenty_twenty_one_the_posts_navigation();
            ?>
        </div><!-- .search-results -->
    </div><!-- .main-content -->

    <div class="sidebar-right">
		<?php if ( is_active_sidebar( '14-comments-sidebar' ) ) : ?>
			<aside class="widget-area">
				<?php dynamic_sidebar( '14-comments-sidebar' ); ?>
			</aside>
		<?php endif; ?>

		<!-- Mã hiển thị Comments -->
		<div class="comments-list">
			<?php
			// Hiển thị danh sách comments
			$args = array(
				'status' => 'approve',
				'number' => 5, // Hiển thị 5 bình luận gần nhất
			);

			$comments = get_comments( $args );
			foreach ( $comments as $comment ) : ?>
				<div class="comment-box media">
					<div class="media-left">
						<a href="#">
							<?php echo get_avatar( $comment, 50 ); ?>
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><?php echo $comment->comment_author; ?></h4>
						<p><?php echo $comment->comment_content; ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div><!-- .search-page-container -->

<?php
} else {
	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );
}

get_footer();
?>