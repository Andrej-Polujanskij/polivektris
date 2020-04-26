<?php
// enquee scripts and styles
include('includes/scripts.php');
include('includes/disable_comments.php');

// create post types and taxonomies if needed
include('includes/post_types.php');

function mycustomfunc_remove_css_section( $wp_customize ) {
    $wp_customize->remove_section( 'custom_css' );
}
add_action( 'customize_register', 'mycustomfunc_remove_css_section', 15 );


// add post thumbnails with sizes
add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'news_image', 416, 273, true );
	add_image_size( 'product_image', 421, 436, false );
	add_image_size( 'product_gallery_image', 212, 212, true );
	add_image_size( 'product_content_image', 158, 158, false );
	add_image_size( 'inner-page_image', 619, 449, false );
	add_image_size( 'inner-page_header-image', 1366, 388, false );
	add_image_size( 'home-page_header-image', 1366, 592, false );
    add_image_size( 'inner-page_content-image', 353, 358, false );
    add_image_size( 'inner-page_content-extra-image', 353, 453, false );
	add_image_size( 'responsibility-galery-image', 391, 308, true );
}

// custom function for returning excerpt from post
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

// get image url from attachment id
function get_correct_image_link_thumb($thumb_id='', $size='large'){

    if ($thumb_id != '') {
        $imagepermalink = wp_get_attachment_image_src($thumb_id, $size, true);
    } else {
        $imagepermalink[0] =  get_stylesheet_directory_uri() . '/images/cover.jpg';
    }
    return $imagepermalink[0];
}

// disable admin bar if needed
show_admin_bar(false);

// get url by page template
function get_all_news_url(){
    $page_var = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-news.php'
    ));
    return get_permalink($page_var[0]->ID);
}

// Create ACF options page
if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page( 'Temos nustatymai' );
}

// Create wordpress menu locations
function register_theme_menus() {
    register_nav_menus(array(
        'header_main-menu' => __( 'Header main menu' )
    ));
}
add_action( 'init', 'register_theme_menus' );

// ajax function
/*
add_action('wp_ajax_filter_data',        'filter_data');
add_action('wp_ajax_nopriv_filter_data', 'filter_data');
function filter_data(){

    die();
}
*/

// Inner page header image
function top_header_image($image){
    ?>
    <div class="page-img" style="background-image: url(<?php  echo $image; ?>)">
        <!-- <img src="<?php echo $image; ?>" alt=""> -->
        <div class="page_header-shadow"></div>
    </div>
    <div class="page-title container">
        <h1 class=""><?php the_title(); ?></h1> 
    </div>
    <?php
}

// Contacts form
add_action('wp_ajax_send_contact_form_message',        'send_contact_form_message');
add_action('wp_ajax_nopriv_send_contact_form_message', 'send_contact_form_message');
function send_contact_form_message(){
    $to = 'andrej@nextweb.lt';

//    print_r($_POST);
    
    if(!$_POST['name'] or !$_POST['company'] or !$_POST['email'] or !$_POST['inquiry'] or !$_POST['gdpr'] ){
        echo 'error';
        die();
    }
    $message ='
        Name: '.$_POST['name'].'<br />
        Company: '.$_POST['company'].'<br />
        Email: '.$_POST['email'].'<br />
        Message: '.$_POST['inquiry'].'<br />
        ';

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From:  - Plivektris noreply@polivektris.lt',
        'Reply-To: '.$_POST['name'].' '.$_POST['company'].' <'.$_POST['email'].'>'
    );

    $subject = 'Inquiry message';

    wp_mail($to, $subject, $message, $headers);
    die();
}