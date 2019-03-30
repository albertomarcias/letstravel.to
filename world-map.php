<?php
  $post_id = 538;
  $queried_post = get_post($post_id);
  $content = $queried_post->post_content;
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  echo $content;
?>