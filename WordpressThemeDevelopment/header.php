
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- site header -->
	<div class="container">
	<header class="site-header">
		<h1> <a href ="<?php home_url(); ?>" > <?php bloginfo('name'); ?> </a> </h1>
		<h5> <?php bloginfo('description'); ?>  </h5>

		<nav class="site-nav">
			<?php $args = array(
				'theme_location' => 'primary'
			);	
			?>
			<?php wp_nav_menu($args) ?>
		</nav>	
	</header>	