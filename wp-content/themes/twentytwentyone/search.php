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
?>
<div class="row search-none">
	<?php
		get_template_part( 'template-parts/content/content-none' );
	?>
</div>
<div class="content-list-post">
<div class="row">
<div class="col-md-3">


</div>
	<div class="col-md-6">
			
	</div>

	
	<div class="col-md-3">

	
</div>
</div>

		<div class="lastpost-list mt-5 mb-5">
			<div class="br">
				<div class="col-md-6 offset-md-3">
					<h4 class="latest-news-title">Latest News</h4>
						<ul class="timeline lastpost">
							<?php
								$args = array(
								'posts_per_page' => -1,
								'post_status'    => 'publish',
								'orderby'        => 'post_date',
								'order'          => 'DESC',
								);
								$latest_posts = get_posts($args);
								if ($latest_posts) {
									foreach ($latest_posts as $post) {
									setup_postdata($post);
							?>
								<li class="timeline-item">
								<a class="post-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<a class="post-date float-right" href="#"><?php echo get_the_date(); ?></a>
								<p class="post-content"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
								</li>
							<?php
									}
									wp_reset_postdata();
								} else {
								echo '<li class="no-posts">No posts found.</li>';
								}
							?>
						</ul>
				</div>
			</div>
		</div>

</div>
<?php
get_footer();