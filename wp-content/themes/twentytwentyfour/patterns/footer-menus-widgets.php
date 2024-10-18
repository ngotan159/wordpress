<?php
global $wpdb;
$table_name = $wpdb->prefix . 'footer_links';

// Lấy tất cả các liên kết từ cơ sở dữ liệu
$footer_links = $wpdb->get_results("SELECT * FROM $table_name");

// Xác định liên kết cho cột 1 và cột 2 (lấy 5 liên kết đầu tiên)
$first_two_columns_links = array_slice($footer_links, 0, 5);

// Xử lý riêng cho cột 3, lấy tất cả các liên kết
$third_column_links = $footer_links;
?>

<div class="row text-center text-xs-center text-sm-left text-md-left">
    <!-- Cột 1 và 2 -->
    <?php for ($i = 0; $i < 2; $i++): ?>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <h5>Quick links</h5>
            <ul class="list-unstyled quick-links">
                <?php foreach ($first_two_columns_links as $link): ?>
                    <li>
                        <a href="<?php echo esc_url($link->url); ?>">
                            <i class="<?php echo esc_attr($link->icon_class); ?>"></i>
                            <?php echo esc_html($link->title); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endfor; ?>

    <!-- Cột 3 -->
    <div class="col-xs-12 col-sm-4 col-md-4">
        <h5>Quick links</h5>
        <ul class="list-unstyled quick-links">
            <?php if (!empty($third_column_links)): ?>
                <?php foreach ($third_column_links as $index => $link): ?>
                    <?php if ($index != 4): // Bỏ liên kết thứ 5 (index = 4) ?>
                        <li>
                            <a href="<?php echo esc_url($link->url); ?>">
                                <i class="<?php echo esc_attr($link->icon_class); ?>"></i>
                                <?php echo esc_html($link->title); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No links available</li>
            <?php endif; ?>
        </ul>
    </div>
</div>
