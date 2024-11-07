<?php

/**
 * Displays the footer widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>
<?php
// Lấy các bình luận gần đây
$wp_comments = get_comments(array(
    'number' => 3, // Số lượng bình luận muốn lấy
    'status' => 'approve' // Chỉ lấy bình luận đã được phê duyệt
));

// Kiểm tra nếu có lỗi WP_Error
if (is_wp_error($wp_comments)) {
    $comments = [];
} else {
    $comments = $wp_comments;
}

// Lấy các chuyên mục (taxonomy terms)
$wp_terms = get_terms(array(
    'taxonomy' => 'category', // Thay 'category' bằng taxonomy bạn muốn lấy
    'hide_empty' => false, // Ẩn các chuyên mục không có bài viết
));

// Kiểm tra nếu có lỗi WP_Error
if (is_wp_error($wp_terms)) {
    $terms = [];
} else {
    $terms = $wp_terms;
}

// Lấy các bài viết gần đây
$wp_posts = get_posts(array(
    'numberposts' => 3, // Số lượng bài viết muốn lấy
    'post_status' => 'publish' // Chỉ lấy bài viết đã xuất bản
));

// Kiểm tra nếu có lỗi WP_Error
if (is_wp_error($wp_posts)) {
    $posts = [];
} else {
    $posts = $wp_posts;
}
?>

<div class="row text-center text-xs-center text-sm-left text-md-left" style="margin-left: 200px;">
    <!-- Cột 1 -->
    <div class="col-xs-12 col-sm-4 col-md-4">
        <h5>Comment</h5>
        <ul class="list-unstyled quick-links">
            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $comment): ?>
                    <li>
                        <a href="<?php echo esc_url(get_comment_link($comment)); ?>">
                        <i class="fa fa-angle-double-right"></i> <?php echo esc_html($comment->comment_content); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No comments available</li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Cột 2 -->
    <div class="col-xs-12 col-sm-4 col-md-4">
        <h5>Categories</h5>
        <ul class="list-unstyled quick-links">
            <?php if (!empty($terms)): ?>
                <?php foreach ($terms as $term): ?>
                    <li>
                        <a href="<?php echo esc_url(get_term_link($term)); ?>">
                        <i class="fa fa-angle-double-right"></i> <?php echo esc_html($term->name); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No categories available</li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Cột 3 -->
    <div class="col-xs-12 col-sm-4 col-md-4" style="width: 500px;">
        <h5>Last Post</h5>
        <ul class="list-unstyled quick-links">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <li>
                        <a href="<?php echo esc_url(get_permalink($post)); ?>">
                        <i class="fa fa-angle-double-right"></i> <?php echo esc_html(get_the_title($post)); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No posts available</li>
            <?php endif; ?>
        </ul>
    </div>
</div>