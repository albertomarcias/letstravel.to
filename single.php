<?php get_header(); ?>

<?php
	$category 					= get_the_category();
	$firstCategory 			= $category[0]->cat_name;
	$firstCategoryLink 	= get_category_link($category[0]->term_id);
?>

  <ol id="breadcrumbs" class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
	  <li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="breadcrumbs-item">
	    <a itemprop="item" href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo-link">
	      <img itemprop="name" class="logo-img" src="<?php echo esc_url( get_theme_mod( 'ltt_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
	    </a><meta itemprop="position" content="1" />
	  </li>
  	<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="breadcrumbs-item breadcrumbs-item--text"> / <?php echo '<a itemprop="item" href="' . $firstCategoryLink . '" alt="' . $firstCategory . '" title="' . $firstCategory . '"><span itemprop="name">' . $firstCategory . '</span></a><meta itemprop="position" content="2" />' ?></li>
  </ol>

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		<article>
			<header class="article-header" style="background: url('<?php echo get_the_post_thumbnail_url(); ?>') 50% 50% no-repeat; background-size: cover;">
			</header>
			<div class="article-title">
				<time datetime="<?php the_time( 'Y-m-d' ); ?>" class="article-date"><?php the_time( 'j \d\e F, Y' ); ?>.</time>
				<?php	the_title( '<h1 class="article-h1">', '</h1>' ); ?>
			</div>
			<section class="article-content">
				<?php echo $content = apply_filters( 'the_content', get_the_content() ); $content = str_replace( ']]>', ']]&gt;', $content ); ?>
				<?php
			    $date_visit = get_post_meta($post->ID, "date-of-visit", true);
			    echo '<p class="visit-date">Fecha de nuestra visita: <strong>' . esc_attr( $date_visit ) . '</strong></p>';
				?>
			</section>
		</article>

		<div id="mc_embed_signup" class="newsletter-suscription clearfix">
			<h3>¿Quieres seguir leyendo nuestras historias por el mundo?</h3>
			<p>Déjanos tu email y te enviaremos historias, datos de viajes, fotos de lugares... Quien sabe, puede ayudarte a planear tu próximo viaje. :D</p>
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
			    	<input type="submit" value="¡Suscríbeme!" name="subscribe" id="mc-embedded-subscribe" class="button">
			    </div>
			  </div>
			</form>
		</div>

 		<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
	<?php endwhile; else : endif; ?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/single.js'; ?>"></script>

<?php get_footer(); ?>