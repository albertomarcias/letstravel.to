<?php 
  get_header();
  // Get the current category object
  $category = get_queried_object();
  // Get the ID of the current category
  $category_id = $category->term_id;
  // Get the URL of this category
  $category_link = get_category_link( $category_id );
?>

  <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="breadcrumbs-item">
      <a itemprop="item" href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo-link">
        <img itemprop="name" class="logo-img" src="<?php echo esc_url( get_theme_mod( 'ltt_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
      </a><meta itemprop="position" content="1" />
    </li>
    <li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="breadcrumbs-item breadcrumbs-item--text"> / <a itemprop="item" href="<?php echo esc_url( $category_link ); ?>" alt="<?php single_cat_title(); ?>" title="<?php single_cat_title(); ?>"><h1 itemprop="name"><?php single_cat_title(); ?></h1></a><meta itemprop="position" content="2" /></li>
  </ol>

  <?php
    $tagid= get_query_var('tag_id');
    $args = array(
          'cat'             => get_query_var('cat'),
          'tag_id'          => $tagid,
    );
    $args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $query     = new WP_Query($args);
    $temp_query = $wp_query;
    $wp_query   = NULL;
    $wp_query   = $query;
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();;
  ?>
    <article class="category-posts">
      <a class="block" href="<?php the_permalink(); ?>">
        <header class="article-header" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>') 50% 50% no-repeat; background-size: cover;">
          <div class="over-image-bg">
            <time datetime="<?php the_time( 'Y-m-d' ); ?>" class="article-date"><?php the_time( 'j \d\e F, Y' ); ?>.</time>
            <?php the_title( '<h2 class="article-h1">', '</h2>' ); ?>
          </div>
        </header>
      </a>
      <div class="category-content">
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>"><?php echo 'Continuar leyendo...' ?></a>
      </div>
    </article>
    <?php endwhile; ?>
    <?php the_posts_pagination( array(
        'mid_size' => 2,
        'prev_text' => __( ('Anterior'), 'textdomain' ),
        'next_text' => __( ('Siguiente'), 'textdomain' )
    ) ); ?>

  <?php else : endif; ?>

  <?php include( TEMPLATEPATH . '/world-map.php' ); ?>

  <div class="category-activities">
    <h3>Qué hacer y qué visitar en <?php single_cat_title(); ?></h3>
    <?php
    if ( is_category() ) {
    $cat = get_category( get_query_var( 'cat' ), false );
    $thecat = $cat->slug;
    } else {
    $thecat = '';
    }
    $custom_query = new WP_Query( 'posts_per_page=-1&category_name=' . $thecat );
    if ( $custom_query->have_posts() ) :
      while ( $custom_query->have_posts() ) : $custom_query->the_post();
        $posttags = get_the_tags();
        if ( $posttags ) {
          foreach( $posttags as $tag ) {
            $all_tags[] = $tag->term_id;
          }
        }
      endwhile;
    endif;

    $tags_arr = array_unique( $all_tags );
    $tags_str = implode( ",", $tags_arr );

    $args = array(
      'smallest'  => 12,
      'largest'   => 12,
      'unit'      => 'px',
      'number'    => 0,
      'format'    => 'list',
      'include'   => $tags_str
    );
    wp_tag_cloud( $args );
    ?>
  </div>

<?php get_footer(); ?>