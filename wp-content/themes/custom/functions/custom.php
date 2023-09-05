<?php //vlastní scripty


//univerzální sanitize script
function sanitize($form) {
	$form = trim($form);
	$form = stripcslashes($form);
	$form = htmlspecialchars($form);
	return $form;
}

// odstranění závorek u excerptu
function my_excerpt_more( $text ) {
	$text = '...';
	return $text;
}
add_filter( 'excerpt_more', 'my_excerpt_more' );


//vlastní excerpt u příspěvků
function the_post_excerpt($val) {

    $count = 16;

    if (mb_strlen( $val ) > $count) {

        $val = implode(' ', array_slice(explode(' ', $val), 0, $count))."...";

    }

    echo $val;

}


/*odstranění br tagů u CF7 pluginu*/
add_filter( 'wpcf7_autop_or_not', '__return_false' );


/* tinyMCE - nonbreaking plugin */
// add_filter('mce_external_plugins', 'my_tinymce_plugins');

function my_tinymce_plugins() {
    $plugins_array = array(
        'nonbreaking' => get_template_directory_uri().'/js/tinymce-custom.js',
        'cstbtn' => get_template_directory_uri().'/js/tinymce-custom.js',
        'embdbtn' => get_template_directory_uri().'/js/tinymce-custom.js',
    );
    return $plugins_array;
}

function custom_register_buttons($buttons) {
    array_push($buttons, 'cstbtn', 'embdbtn');
    return $buttons;
}

function dmcg_allow_nbsp_in_tinymce( $init ) {
    $init['entities'] = '160,nbsp,38,amp,60,lt,62,gt';
    $init['entity_encoding'] = 'named';
    $init['toolbar1'] = 'formatselect,bold,italic,bullist,numlist,blockquote,alignleft,aligncenter,alignright,link,wp_more,spellchecker,fullscreen,wp_adv,nonbreaking,cstbtn,embdbtn';
    return $init;
}

add_filter( 'tiny_mce_before_init', 'dmcg_allow_nbsp_in_tinymce' );
add_filter('mce_buttons', 'custom_register_buttons');


//alt u thumbnailu
function the_alt($id) {
    $thumbnail_id = get_post_thumbnail_id( $id );
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

    echo $alt;
}

//formát telefonu

function the_tel_phone($phone) {

    $output = str_replace(" ", "", $phone);
    $output = str_replace("+", "", $output);

    echo $output;
}


//odstranění prefixu u title u chráněných stránek
add_filter( 'protected_title_format', 'remove_protected_text' );
function remove_protected_text() {
    return __('%s');
}

// odstranění inputut webových stárnek

add_filter('comment_form_default_fields', 'unset_url_field');

function unset_url_field($fields) {
    if (isset($fields['url'])) {
        unset($fields['url']);
    }

    return $fields;
}

// odstranění headings při preview postu

function bac_wp_strip_header_tags($text) {
    $raw_excerpt = $text;
    if('' == $text) {
        $text = get_the_content('');
        $text = strip_shortcodes($text);
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]&gt', $text);

        $regex = '#(<h([1-6])[^>]*>)\s?(.*)?\s?(<\/h\2>)#';
        $text = preg_replace($regex, '', $text);

        $excerpt_word_count = 55;
        $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);

        $excerpt_end = '[...]';
        $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
        $excerpt = wp_trim_words($text, $excerpt_length, $excerpt_more);
    }

    return apply_filters('wp_trim_excerpt', $excerpt, $raw_excerpt);
}

add_filter('get_the_excerpt', 'bac_wp_strip_header_tags', 5);

function custom_comment($comment, $args, $depth) {
    if('div' === $args['style']) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?> id="comment-<?php comment_ID() ?>"><?php
    if('div' != $args['style']) { ?>
        <article id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
    <footer class="comment-meta">
        <div class="comment-img">
        <?php 
            if ( $args['avatar_size'] != 0 ) {
                echo '<img src="" data-src="' . get_avatar_url($comment) . '" alt="">';
                echo '<noscript>';
                echo get_avatar( $comment);
                echo '</noscript>';
            }
        ?>
        </div>
        <div class="comment-author vcard">
            <?php
                printf( __( '<b class="fn">%s</b>' ), get_comment_author_link() );
            ?>
        </div>
        <?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
        } ?>
        <div class="comment-metadata">
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
                /* translators: 1: date, 2: time */
                printf( 
                    __('%1$s (%2$s)'), 
                    get_comment_date(),  
                    get_comment_time() 
                ); ?>
            </a><?php 
            edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
        </div>
            </footer>
        <div class="comment-content">
            <?php comment_text(); ?>
        </div>
        <div class="reply"><?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
        </div><?php 
    if ( 'div' != $args['style'] ) : ?>
        </article><?php 
    endif;
}


/**** begin custom gallery shortcode ******/

function galleryShortcode($atts) {
        extract(shortcode_atts(array(
        "id" => ''
    ), $atts));
    $LiString = "";
    $LiString = "Nav";
    $rand = rand(5, 3000);
    if ( have_rows('image_gallery_components')){
        while( have_rows('image_gallery_components') ): the_row();
            if(get_sub_field("image_gallery_shortcode_name")==$id){
                
                $galleryImages = get_sub_field("gallery_of_images");
                
                foreach($galleryImages as $galleryImage)
                {
                $LiString .= "
                <li>
                <a href='".$galleryImage['sizes']['full_width_retina']."' data-size='".$galleryImage['sizes']['full_width-width'].'x'.$galleryImage['sizes']['full_width-height']."'>
                    <img src='' data-src='".$galleryImage['sizes']['large']."' alt='".$galleryImage['alt']."' style='width: 100%;'>
                    <noscript>
                        <img src='".$galleryImage['sizes']['large']."' alt='".$galleryImage['alt']."' style='width: 100%;'>
                    </noscript>
                </a>
                </li>
                ";
                $LiStringNav .= "
                <li>
                    <div class='gallery-nav-item'>
                        <img src='' data-src='".$galleryImage['sizes']['172x86']."' alt='".$galleryImage['alt']."'>
                        <noscript>
                            <img src='".$galleryImage['sizes']['172x86']."' alt='".$galleryImage['alt']."'>
                        </noscript>
                    </div>
                </li>
                ";

                }


                $wrapperString = "
                <div class='gallery'>
                    <ul class='gallery-slider js-gallery-slider' data-pswp>
                        ".$LiString."
                    </ul>
                    <ul class='gallery-nav js-gallery-nav'>
                        ".$LiStringNav."
                    </ul>
                </div> ";

            }

        endwhile;
    }
    return $wrapperString;
 }
 
 add_shortcode("postgallery", "galleryShortcode");
 /****** end custom gallery shortcodes *********/