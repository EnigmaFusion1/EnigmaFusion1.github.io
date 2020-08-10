<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- primary header - desc & primary menu -->
<header id="header-main">
	<div class="wrap">
		<!-- site name & description -->
		<div id="header-branding">
			<?php
			$custom_logo = get_theme_mod('custom_logo');
			$image = wp_get_attachment_image_src($custom_logo , 'full');
			if ($custom_logo): ?>
				<a id="header-name" href ="<?php echo esc_url(home_url('/')); ?>">
					<img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_html(get_bloginfo('name')); ?>" />
				</a>
			<?php else:	?>
				<a id="header-name" href ="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(get_bloginfo('name')); ?></a>
				<?php $description = get_bloginfo('description'); ?>
				<?php if ($description): ?>
					<div id="header-desc"><?php echo esc_html($description); ?></div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<!-- primary menu -->
		<?php if (has_nav_menu('primary')): ?>
			<div id="header-menu">
				<?php wp_nav_menu(array('theme_location' => 'primary')); ?>
			</div>
			<button id="hamburger" type="button">
				<span id="hamburger-box">
					<span id="hamburger-inner"></span>
				</span>
			</button>
		<?php endif; ?>
	</div>
</header>
<!-- secondary header - overview & title -->
<div id="header-secondary">
	<div class="wrap">
		<!-- site overview (frontpage) or title -->
		<?php if (is_front_page()): ?>
			<?php if(get_theme_mod('ssfoundation_text_overview') != '' ): ?>
				<div id="header-overview">
					<?php echo esc_html(get_theme_mod('ssfoundation_text_overview')); ?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<div id="header-title">
				<?php
					global $post;
					if($post):
						$id = $post->ID;
						$author = $post->post_author;
						$date = $post->post_date;
						$format = get_option('date_format');
					endif;
				?>
				<h1><?php echo esc_html(get_the_title($id)); ?></h1>
				<?php if(is_single()): ?>
					<div id="header-title-meta">
						<?php the_author_meta('display_name', $author); ?><span>~</span><?php echo get_the_date($format, $id); ?>
						<?php
							$categories = wp_get_post_categories($id);
							foreach($categories as $category){
						    $data = get_category($category);
								$category_link = get_category_link($data->term_id);
						    echo '<span>/</span><a href="' . esc_url($category_link) . '">' . esc_html($data->name). '</a>';
							}
						?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
