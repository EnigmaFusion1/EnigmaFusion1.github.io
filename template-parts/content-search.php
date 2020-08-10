<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( sprintf('<h3><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
	<?php the_excerpt(); ?>
</article>
