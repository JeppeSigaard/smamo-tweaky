<?php 

/*
Opret bedre meta tags
*/

add_action('wp_head', 'smamo_add_metas');

function smamo_add_metas(){

    global $post;
    
    // Billede
    $meta_img = wp_get_attachment_url( get_post_thumbnail_id() );
    if (!$meta_img || is_home() || is_front_page()){
        $meta_img = get_header_image();
    }

    // Beskrivelse
    $meta_description =  wp_trim_words(wp_strip_all_tags($post->post_excerpt), $num_words = 20, $more = ' ...');
    if (!$meta_description){$meta_description =  wp_trim_words(wp_strip_all_tags($post->post_content), $num_words = 20, $more = ' ...');}
    
    if(is_archive() || is_category()){
        $meta_description = wp_trim_words(wp_strip_all_tags(category_description()), $num_words = 20, $more = ' ...');
    }
    
    if(!$meta_description || is_home() || is_front_page()){
        $meta_description = wp_trim_words(get_bloginfo('description'), $num_words = 20, $more = ' ...');
    }

    // Link
    $meta_url = get_the_permalink();
    if (!$meta_url || is_home() || is_front_page()){
        $meta_url = get_bloginfo('url');
    }

    // Type
    $meta_type = 'article';
    if(is_archive()){
        $meta_type = 'archive';
    }
    elseif(is_home() || is_front_page()){
        $meta_type = 'website';
    }
    
    echo '<meta itemprop="name" content="'. wp_title('·', false, 'right').'">';
    echo '<meta property="og:title" content="'. wp_title('·', false, 'right').'">';
    echo '<meta property="og:site_name" content="'. get_bloginfo('title') .'">';

    if ($meta_description) :

        echo '<meta name="description" content="'.  $meta_description .'">';
        echo '<meta itemprop="description" content="'.  $meta_description .'">';
        echo '<meta property="og:description" content="'.  $meta_description  .'">';

    endif;

    if ($meta_img) :

        echo '<meta itemprop="image" content="'. $meta_img .'">';
        echo '<meta property="og:image" content="'. $meta_img .'">';

    endif;

    echo '<meta property="og:type" content="'. $meta_type .'">';
    echo '<meta property="og:url" content="'. $meta_url .'">';
    
}