<?php
function gp_enqueue_assets() {
    // Подключаем главный CSS (тот, что в /assets/css/style.css)
    wp_enqueue_style('gp-theme-style', get_template_directory_uri() . '/assets/css/style.css');

    // Подключаем Swiper CSS
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');

    // Подключаем Swiper JS
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', [], null, true);

    // Твои скрипты
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', [], null, true);
    wp_enqueue_script('index', get_template_directory_uri() . '/assets/js/index.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'gp_enqueue_assets');
