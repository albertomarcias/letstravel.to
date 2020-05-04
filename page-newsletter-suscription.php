<?php /* Template Name: Newsletter Suscription */ ?>

<?php get_header( 'small' ); ?>

  <?php while( have_posts() ) : the_post(); ?>
    <article>
      <?php the_title( '<h1>', '</h1>' ); ?>
      <?php echo $content = apply_filters( 'the_content', get_the_content() ); $content = str_replace( ']]>', ']]&gt;', $content ); ?>
    </article>
  <?php endwhile; ?>

  <form action="https://letstravel.us19.list-manage.com/subscribe/post?u=65640355c73c2540de977859c&amp;id=908964dfe1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
      <div class="mc-field-group newsletter-input">
        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email">
      </div>
      <div id="mce-responses" class="clear">
        <div class="response" id="mce-error-response" style="display:none"></div>
        <div class="response" id="mce-success-response" style="display:none"></div>
      </div>
      <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_65640355c73c2540de977859c_908964dfe1" tabindex="-1" value=""></div>
      <div class="clear newsletter-submit">
        <input type="submit" value="¡Quiero recibir los presets! :D" name="subscribe" id="mc-embedded-subscribe" class="button">
      </div>
    </div>
  </form>

<?php get_footer( 'small' ); ?>