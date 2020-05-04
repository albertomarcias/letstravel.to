<?php /* Template Name: Newsletter Success */ ?>

<?php get_header( 'small' ); ?>

  <?php while( have_posts() ) : the_post(); ?>
    <article>
      <?php the_title( '<h1>', '</h1>' ); ?>
      <?php echo $content = apply_filters( 'the_content', get_the_content() ); $content = str_replace( ']]>', ']]&gt;', $content ); ?>
    </article>

    <?php
    $post_objects = get_field('include_post');
    if( $post_objects ): ?>
      <ul>
        <?php foreach( $post_objects as $post): ?>
          <?php setup_postdata($post); ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
              <?php the_title(); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php wp_reset_postdata(); endif; ?>

  <?php endwhile; ?>

<?php get_footer( 'small' ); ?>