<?php
global $wpdb;
$table_name = $wpdb->prefix . 'footer_links';

// Lấy tất cả các liên kết từ cơ sở dữ liệu
$footer_links = $wpdb->get_results("SELECT * FROM $table_name");

// Nhóm liên kết vào ba cột
$links_per_column = array_chunk($footer_links, ceil(count($footer_links) / 3));
?>

<div class="row text-center text-xs-center text-sm-left text-md-left">
    <?php for ($i = 0; $i < 3; $i++): ?>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <h5>Quick links</h5>
            <ul class="list-unstyled quick-links">
                <?php foreach ($links_per_column as $column): ?>
                    <?php foreach ($column as $link): ?>
                        <li>
                            <a href="<?php echo esc_url($link->url); ?>">
                                <i class="<?php echo esc_attr($link->icon_class); ?>"></i>
                                <?php echo esc_html($link->title); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endfor; ?>
</div>