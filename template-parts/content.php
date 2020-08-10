<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (is_singular()): ?>
		<?php if (has_post_thumbnail()): the_post_thumbnail(); endif;	?>
		<?php the_content(); ?>
		<?php the_tags('<ul id="post-tags"><li>#', '</li><li>#', '</li></ul>'); ?>
		<?php wp_link_pages(); ?>
	<?php else: ?>
		<div class="teaser-date"><?php if (is_sticky()): echo'<span>'; esc_html_e('Featured - ', 'ss-foundation'); echo'</span>'; endif; ?><?php echo get_the_date(); ?></div>
		<?php the_title('<h3 class="teaser-heading"><a href="' . esc_url(get_permalink()) . '">', '</a></h3>'); ?>
		<div class="teaser-excerpt"><?php the_excerpt(); ?></div>
	<?php endif; ?>
</article>
