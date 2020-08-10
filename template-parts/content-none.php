<article>
	<?php if (is_search()): ?>
		<h1><?php esc_html_e('Nothing Found', 'ss-foundation'); ?></h1>
		<p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ss-foundation'); ?></p>
		<?php get_search_form(); ?>
	<?php else: ?>
		<h1><?php esc_html_e('Page Not Found', 'ss-foundation'); ?></h1>
		<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ss-foundation'); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</article>
