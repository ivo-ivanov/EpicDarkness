<?php
// Replace image URLs with production domain for src
function replace_image_urls_with_production_domain($image, $attachment_id, $size, $icon) {
    // Replace "localhost" with the production domain
    $image = str_replace('http://localhost', 'https://epicdarkness.com', $image);
    return $image;
}
add_filter('wp_get_attachment_image_src', 'replace_image_urls_with_production_domain', 10, 4);

// Replace image URLs with production domain for srcset
function replace_srcset_urls_with_production_domain($sources, $size_array, $image_src, $image_meta, $attachment_id) {
    // Replace "localhost" with the production domain
    foreach ($sources as $source => $src) {
        $sources[$source]['url'] = str_replace('http://localhost', 'https://epicdarkness.com', $src['url']);
    }
    return $sources;
}
add_filter('wp_calculate_image_srcset', 'replace_srcset_urls_with_production_domain', 10, 5);
