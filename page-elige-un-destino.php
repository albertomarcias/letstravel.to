<?php get_header(); ?>

  <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="breadcrumbs-item">
      <a itemprop="item" href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo-link">
        <img itemprop="name" class="logo-img" src="<?php echo esc_url( get_theme_mod( 'ltt_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
      </a><meta itemprop="position" content="1" />
    </li>
  </ol>

  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <?php echo $content = apply_filters( 'the_content', get_the_content() ); $content = str_replace( ']]>', ']]&gt;', $content ); ?>

    <?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
  <?php endwhile; else : endif; ?>

<?php get_footer(); ?>