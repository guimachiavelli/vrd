<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7 <?php echo print_classes(); ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 <?php echo print_classes(); ?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 <?php echo print_classes(); ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js <?php echo print_classes(); ?>"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
	
		<title><?php bloginfo('name'); ?></title>
		<meta name="description" content="">
	
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/vrd-main.css">
	
		<script data-main="<?php echo TEMPLATE_URL; ?>/js/vrd-main" src="<?php echo TEMPLATE_URL; ?>/js/libs/require.js"></script>

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
	</head>

	<body>
		<header id="intro" role="banner">
			<h1 id="site-name">Van Rietschoten Design</h1>
			<img id="coat-of-arms" data-negative="<?php echo TEMPLATE_URL; ?>/imgs/coat-of-arms-white.png" src="<?php echo TEMPLATE_URL; ?>/imgs/coat-of-arms.png" alt="">
		</header>

		<nav id="menu">
			<ul>
				<li><a href="#news">Nieuws</a></li>
				<li><a href="#projects">Projecten</a></li>
				<li><a href="#process">Ons Process</a></li>
				<li><a href="#about">Wie Zijn Wij?</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
		</nav>
