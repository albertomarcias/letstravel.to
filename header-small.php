<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <?php include_once("analyticstracking.php") ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/style.css'; ?>">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() . '/favicon.png'; ?>">

    <meta property="fb:admins" content="561794537" />
    <meta property="og:site_name" content="Let's Travel To..." />
    <meta property="og:type" content="article" />
    <meta property="og:image:type" content="jpeg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="1200" />

    <?php if ( is_front_page() && is_home() ) {
        echo '<link rel="canonical" href="http://www.letstravel.to" />';
        echo '<meta name="description" content="Hola, somos Carla ♥ Alberto. Te invitamos a recorrer el mundo con nosotros a través de nuestras historias, fotos y datos de viajes. Hemos viajado por varios países y aquí te dejamos lo que recomendamos de cada uno." />';
        echo '<meta property="og:url" content="http://www.letstravel.to" />';
        echo '<meta property="og:title" content="Let\'s Travel To..." />';
        echo '<meta property="og:description" content="Hola, somos Carla ♥ Alberto. Te invitamos a recorrer el mundo con nosotros a través de nuestras historias, fotos y datos de viajes. Hemos viajado por varios países y aquí te dejamos lo que recomendamos de cada uno." />';
        echo '<meta property="og:image" content="' ?><?php echo get_template_directory_uri() . '/images/letstravel-to-homepage.jpg'; ?><?php echo '" />';
      } if ( is_category() || is_tag() ) {
        $obj_id = get_queried_object_id();
        $current_url = get_term_link( $obj_id );
        echo '<link rel="canonical" href="' . $current_url . '" />';
        echo '<meta name="description" content="' . term_description() . '" />';
        echo '<meta property="og:url" content="' . $current_url . '" />'; ?>
        <meta property="og:title" content="<?php single_cat_title(); ?>" />
      <?php
        echo '<meta property="og:description" content="' . term_description() . '" />';
        echo '<meta property="og:image" content=""/>';
      } ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="newsletter-container">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
        <img class="main-logo" src="<?php echo get_template_directory_uri() . '/images/letstravel-to-logo.svg'; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="500" height="">
      </a>