<?php
$bca_lazy_loading_count = 0;

/**
 * Filter post thumbnail to use the Picture element. 
 * Gives use better control of what image size is used for each browser size
 * @see https://www.youtube.com/watch?v=Rik3gHT24AM | The HTML picture element explained [ Images on the web part 3 ]
 */
function bca_attachment_remove_attrs($attr, $attachment, $size)
{
    if (is_admin()) return $attr;

    unset($attr['srcset']);
    unset($attr['sizes']);
    return $attr;
}



function bca_compare_array_value($a, $b)
{
    if ($a['width'] == $b['width']) {
        return 0;
    }
    return ($a['width'] < $b['width']) ? -1 : 1;
}

function bca_attachment_add_picture_element($html, $attachment_id, $size, $icon, $attr)
{
    if (is_admin()) return $html;

    // retrive attachtment metadata and media upload paths
    $image_meta = wp_get_attachment_metadata($attachment_id);
    $dirname = _wp_get_attachment_relative_path($image_meta['file']);
    $upload_dir    = wp_get_upload_dir();
    $image_baseurl = trailingslashit($upload_dir['baseurl']) . $dirname . '/';

    if (!is_array($image_meta['sizes']) || empty($image_meta['sizes'])) {
        return $html;
    }
    $sources = array();

    // order sizes from smallest to largest
    uasort($image_meta['sizes'], "bca_compare_array_value");
    // error_log(print_r($image_meta,true));
    foreach ($image_meta['sizes'] as $key => $image_size) {
        // if selected size equals image size do not add anymore source sizes
        if ($size == $key) {
            break;
        }
        $width = $image_size['width'] + 50;
        $sources[] = '<source media="(max-width: ' . $width . 'px)" srcset="' . $image_baseurl . $image_size['file'] . '">';
    }

    if (!empty($sources)) {
        $html = '<picture>' . implode("\n",  $sources) . $html . '</picture>';
    }


    return $html;
}



/**
 * Filters the threshold for how many of the first content media elements to not lazy-load.
 * @link https://developer.wordpress.org/reference/hooks/wp_omit_loading_attr_threshold/
 * 
 * 
 * Article on how lazy loading is implemented.
 * Lazy-loading images in 5.5
 * @link https://make.wordpress.org/core/2020/07/14/lazy-loading-images-in-5-5/
 */
function tpd_omit_loading_attr_threshold($omit_threshold)
{

    if (is_front_page()) {
        if (wp_is_mobile()) {
            return get_theme_mod('lazy_loading_threshold_front_page_mobile', $omit_threshold);
        } else {
            return get_theme_mod('lazy_loading_threshold_front_page', $omit_threshold);
        }
    }

    if (is_archive()) {
        if (wp_is_mobile()) {
            return get_theme_mod('lazy_loading_threshold_archive_mobile', 3);
        } else {
            return get_theme_mod('lazy_loading_threshold_archive', 5);
        }
    }

    return $omit_threshold;
}


function bca_img_tag_add_loading_attr_filter($value, $image, $context)
{
    global $bca_lazy_loading_count;

    if ('the_content' === $context && $bca_lazy_loading_count <= wp_omit_loading_attr_threshold() ) {
        $bca_lazy_loading_count++;
        $value = false;
    }

    return $value;
}

function bca_init_performance_settings()
{
    add_filter( 'wp_get_attachment_image_attributes', 'bca_attachment_remove_attrs', 10, 5 );
    add_filter( 'wp_get_attachment_image', 'bca_attachment_add_picture_element', 10, 5 );
    add_filter( 'wp_omit_loading_attr_threshold', 'tpd_omit_loading_attr_threshold');
    add_filter( 'wp_img_tag_add_loading_attr', 'bca_img_tag_add_loading_attr_filter', 10, 3);
}
add_action('init', 'bca_init_performance_settings');
