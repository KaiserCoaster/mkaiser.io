<!DOCTYPE html>
<html>
<head>
	<meta name="description" content="Matthew Kaiser is a computer science student, roller coaster enthusiast, and amateur photographer." />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="600">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
	<title><?php bloginfo('title') ?></title>
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" />
	<link rel="stylesheet" media="(max-width: 1100px)" href="/wp-content/themes/maverick/mobile_style.css" />
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300|Roboto:300,100|Raleway:300' rel='stylesheet' type='text/css'>
	<link href='/css/foundation-icons.css' rel='stylesheet' type='text/css'>
	<?php wp_head() ?>
	<script type="text/javascript" src="/js/blur.min.js"></script>
	<script type="text/javascript" src="/js/scripts.js"></script>
</head>

<body>

<!--<header>
	<h1><a href="<?php echo home_url('/') ?>"><?php bloginfo('name') ?></a></h1>
</header>-->

<header>
	<div id="mobile_menu">
		<a href="#" id="menu"><img src="/assets/menu.svg" id="menu_button" onerror="this.onerror=null; this.src='/assets/menu.png'" /></a>
	</div>
	<div id="mobile_logo">
		<a href="#"><img src="/assets/MKaiserLogo2.svg" id="m_logo" onerror="this.onerror=null; this.src='/assets/MKaiserLogo.png'" /></a>
	</div>
</header>

<nav>
	<ul>
		<li>
			<a href="#" id="menu-norm">
				<img src="/assets/menu.svg" class="nav_button" onerror="this.onerror=null; this.src='/assets/menu.png'" />
			</a>
		</li>
		
		<?php wp_nav_menu( array('theme_location' => 'main_menu', 'container' => false, 'link_before' => "<div class='nav_button'></div><div class='nav_title'>", 'link_after' => "</div>", 'items_wrap' => '%3$s') ); ?>

	</ul>
</nav>

<div id="nav_remainder"></div>

<div id="container">