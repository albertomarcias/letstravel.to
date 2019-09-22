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
    <article class="home-featured-post">
      <a class="block" href="<?php the_permalink(); ?>">
        <header class="article-header" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>') 50% 50% no-repeat; background-size: cover;">
          <div class="over-image-bg">
            <time datetime="<?php the_time( 'Y-m-d' ); ?>" class="article-date"><?php the_time( 'j \d\e F, Y' ); ?>.</time>
            <?php the_title( '<h2 class="article-h1">', '</h2>' ); ?>
          </div>
        </header>
      </a>
    </article>
  <?php endwhile; endif; ?>

  <?php include( TEMPLATEPATH . '/world-map.php' ); ?>

<?php get_footer(); ?>