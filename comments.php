<?php if ( post_password_required() ) return; ?>

<div id="comments" class="article-comments">
  <?php if ( have_comments() ) : ?>
    <h3 class="comments-title"><?php printf( _nx( 'Un comentario para "%2$s"', '%1$s comentarios para "%2$s"', get_comments_number(), 'comments title', 'twentythirteen' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h3>

    <ol class="comments-list">
      <?php
        wp_list_comments( array(
          'style'       => 'ol',
          'short_ping'  => true,
          'avatar_size' => 40,
        ) );
      ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	    <nav class="navigation comment-navigation" role="navigation">
	      <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
	      <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
	      <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
	    </nav>
    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() ) : ?><p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p><?php endif; ?>
  <?php endif; ?>

  <?php
  	$comment_args = array(
  		'comment_notes_before' => false,
  		'fields' => array(
				'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
			  'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
  		)
   	);
  	comment_form( $comment_args );
  ?>
</div>