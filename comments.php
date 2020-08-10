<?php if (post_password_required()) return; ?>
<?php if (have_comments()): ?>
	<ol id="comments">
		<?php
			wp_list_comments(array(
				'style' => 'ol',
				'short_ping' => true,
			));
		?>
	</ol>
	<?php the_comments_navigation(); ?>
	<?php if (!comments_open()): ?>
		<p id="comments-closed"><?php esc_html_e('Comments are closed.', 'ss-foundation'); ?></p>
	<?php endif; ?>
<?php endif; ?>
<?php comment_form(); ?>
