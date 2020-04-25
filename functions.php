<?php
add_action( 'after_setup_theme', 'ltt_setup' );

/* Agregar logo editable */
function ltt_logo( $wp_customize ) {
  $wp_customize->add_section( 'ltt_logo_section', array(
    'title'          =>  __( 'Logo', 'ltt' )
    , 'priority'    =>  30
    , 'description'  =>  'Sube tu logo'
    ,
  ) );
  $wp_customize->add_setting( 'ltt_logo' );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ltt_logo', array(
    'label'          =>  __( 'Logo', 'ltt' )
    , 'section'      =>  'ltt_logo_section'
    , 'settings'    =>  'ltt_logo'
    ,
  ) ) );
}
add_action( 'customize_register', 'ltt_logo' );
/* Fin función agregar logo editable */

/** Menú Personalizado desde el Admin **/
function ltt_setup() {
  register_nav_menus( array(
    'menu'  		=>  __( 'Menu', 'ltt' ),
  ) );
}
/** Fin menú Personalizado desde el Admin **/

/* Crear posts especiales */
function create_post_type() {
  register_post_type( 'animals',
    array(
      'labels'              => array(
          'name'            => __( 'Animales' )
          , 'singular_name' => __( 'Animal' )
        )
      , 'public'            => true
      , 'has_archive'       => true
      , 'menu_position'     => 2
      , 'show_in_rest'      => true
      , 'supports'          => array( 'title', 'editor', 'author', 'excerpt', 'thumbnail', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' )
    )
  );
}
add_action( 'init', 'create_post_type' );
/* Fin creación post */

/** Setear tamaño imágenes **/
add_theme_support( 'post-thumbnails' );
add_image_size( 'search', 200, 200, true );
add_image_size( 'post_big_images', 604, 9999 );

add_filter( 'image_size_names_choose', 'images_theme' );
function images_theme( $sizes ) {
  return array_merge( $sizes, array(
    'post_big_images'    => __( 'Imagen full post' ),
  ) );
}
/** Fin tamaño imágenes **/

/** Agregar dynamic sidebar para gestionar desde el Admin **/
if(function_exists('register_sidebar')) {
  register_sidebar(array(
    'name'        =>  'Instagram'
    , 'before'    =>  ''
    , 'after'      =>  ''
  ));
}
/** Fin soporte dynamic sidebar **/

/** Agregar estilos al editor **/
function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

/* Callback function to filter the MCE settings */
function my_mce_before_init_insert_formats( $init_array ) {

// Define the style_formats array
  $style_formats = array(
/*
* Each array child is a format with it's own settings
* Notice that each array has title, block, classes, and wrapper arguments
* Title is the label which will be visible in Formats menu
* Block defines whether it is a span, div, selector, or inline style
* Classes allows you to define CSS classes
* Wrapper whether or not to add a new block-level element around any selected elements
*/
    array(
        'title' => 'Cite Author',
        'block' => 'span',
        'classes' => 'blockquote-author',
        'wrapper' => true,
    ),
    array(
        'title' => 'Product description',
        'block' => 'span',
        'classes' => 'p-descriptionsx15',
        'wrapper' => true,
    ),
    array(
        'title' => 'Hints',
        'block' => 'span',
        'classes' => 'hints',
        'wrapper' => true,
    ),
  );
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );
  return $init_array;
}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

function my_theme_add_editor_styles() {
  add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );
/** Fin agregar estilos al editor **/

/* Functions twentyfifteen */
function twentyfifteen_setup() {
  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'comment-form', 'comment-list'
  ) );
}
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );


// Agregar meta para los single post.
function insert_meta_in_head() {
  global $post;
  if ( !is_singular() ) //if it is not a post or a page
    return;
  echo '<meta name="description" content="' . get_the_excerpt() . '" />';
}
add_action( 'wp_head', 'insert_meta_in_head', 5 );

// Agregar OG en los atributos de Language
function add_opengraph_doctype( $output ) {
  return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

// Agregar OG Metadata
function insert_fb_in_head() {
  global $post;
  if ( !is_singular()) //if it is not a post or a page
    return;
    echo '<meta property="og:url" content="' . get_permalink() . '" />';
    echo '<meta property="og:title" content="' . get_the_title() . '" />';
    echo '<meta property="og:description" content="' . get_the_excerpt() . '" />';
  if(!has_post_thumbnail( $post->ID )) {
    $default_image = "";
    echo '<meta property="og:image" content="' . $default_image . '"/>';
  }
  else{
    $thumbnail_src = get_post_meta($post->ID, "share-image", true);
    echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src ) . '"/>';
  }
  echo "";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

// Agregar Twitter Cards Metadata
function insert_tw_in_head() {
  global $post;
  if ( !is_singular()) //if it is not a post or a page
    return;
    echo '<meta name="twitter:card" content="summary" />';
}
add_action( 'wp_head', 'insert_tw_in_head', 5 );

/* Disable the emoji's */
function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' );
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * @param array $plugins
 * @return array Difference betwen the two arrays
*/
function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
   return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
  return array();
 }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
   /** This filter is documented in wp-includes/formatting.php */
   $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
    $urls = array_diff( $urls, array( $emoji_svg_url ) );
 }
  return $urls;
}

//* TN Dequeue Styles - Remove Font Awesome
add_action( 'wp_print_styles', 'tn_dequeue_font_awesome_style' );
function tn_dequeue_font_awesome_style() {
  wp_dequeue_style( 'fontawesome' );
  wp_deregister_style( 'fontawesome' );
}