    <?php
      $now = time();
      $departure_date = strtotime("2018-05-27");
      $days_travelling = $now - $departure_date;
    ?>

    <footer class="footer clearfix">
      <div class="footer-left">
        <img class="logo-img logo-img--footer" src="<?php echo esc_url( get_theme_mod( 'ltt_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        <p>© 2019. En la ruta durante <?php echo round($days_travelling / (60 * 60 * 24)); ?> días.</p>
      </div>
      <div class="footer-right">
        <a class="social-media" href="https://www.instagram.com/letstravel.to/" alt="Síguenos en Instagram" target="_blank"><img class="social-media--ig" src="<?php echo get_template_directory_uri() . '/images/social-instagram.png'; ?>" alt="Let's Travel To... Instagram"></a>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>