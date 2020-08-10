<?php get_header(); ?>
<div class="wrap">
	<?php
	if (have_posts()):
		while (have_posts()): the_post();
			get_template_part('template-parts/content', get_post_type());
		endwhile;
	else :
		get_template_part('template-parts/content', 'none');
	endif;
	the_posts_pagination(array(
    'mid_size' => 2,
    'prev_text' => __('&larr;', 'ss-foundation'),
    'next_text' => __('&rarr;', 'ss-foundation'),
	));
	?>
</div>
<?php get_footer(); ?>
