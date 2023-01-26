<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/favicon/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>
	<?php
		$body = '';
	?>
	<body <?php body_class($body); ?>>
		<div id="preloader"><img src="<?php echo site_url(); ?>/wp-content/loader.svg" alt=""></div>
		<div class="site-wrap">

		<div class="site-header">
			<div class="wrap">

				<?=get_template_part('partials/navigation');?>

				<?=get_template_part('partials/hero');?>

			</div>
		</div>






