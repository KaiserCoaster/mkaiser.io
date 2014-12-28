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
	<script type="text/javascript">
		
		(function($){
			$(document).ready(function() {
				$("nav").hover(function() {
					openNav();
				}, function() {
					closeNav();
				});
				
				$("#menu-norm").click(function(event) {
					toggleNav();
					event.preventDefault();
				});
				
				$("#menu_button").click(function(e) {
					e.preventDefault();
					openNav();
				});
				
				
				function toggleNav() {
					if($("nav").width() > 50) {
						closeNav();
					}
					else {
						openNav();
					}
				}
				
				function openNav() {
					var open_width = "";
					if($("header").is(":visible")) {
						open_width = "260px";
					}
					else {
						open_width = "235px";
					}
					$("#menu-norm img").attr("src","/assets/close.svg");
					$("nav").stop().animate({'width': open_width}, 'fast');
					$(".nav_button").stop().animate({'margin-left': '16px'}, 'fast')/*.css({'margin-bottom': '7px'})*/;
					$("#nav_remainder").stop().fadeIn('fast');
					//$("nav a").css({'border-bottom': '1px solid #FCC238'});
				}

				function closeNav() {
					var close_width = "";
					if($("header").is(":visible")) {
						close_width = "0px";
					}
					else {
						close_width = "50px";
					}
					$("#menu-norm img").attr("src","/assets/menu.svg");
					$("nav").stop().animate({'width': close_width}, 'fast', function() {
						$("nav").css("width", "");
					});
					$(".nav_button").stop().animate({'margin-left': '8px'}, 'fast')/*.css({'margin-bottom':'8px'})*/;
					$("#nav_remainder").stop().fadeOut('fast');
					//$("nav a").css({'border-bottom': 'none'});
				}
				
				
				$.fn.animateRotate = function(angle, duration, easing, complete) {
				    var args = $.speed(duration, easing, complete);
				    var step = args.step;
				    return this.each(function(i, e) {
				        args.step = function(now) {
				            $.style(e, 'transform', 'rotate(' + now + 'deg)');
				            if (step) return step.apply(this, arguments);
				        };
				
				        $({deg: 0}).animate({deg: angle}, args);
				    });
				};
				
				
				
				var Snowstorm = function() {
					console.log("Letting it snow..");
					this.flakes = [];
					this.generate();
					var $this = this;
					this.interval = window.setInterval(function() { $this.loop(); }, (1000/15));
				};
				Snowstorm.prototype.generate = function() {
					var num = Math.round((window.innerHeight * window.innerWidth) * .00016);
					for(i = 0; i < num; i++) {
						this.flakes[i] = new Flake();
						this.flakes[i].randomize();
					}
				};
				Snowstorm.prototype.loop = function() {
					for(i = 0; i < this.flakes.length; i++) {
						this.flakes[i].update();
					}
				};
				var Flake = function() {
					this.el = $("<div />").appendTo("body");
					this.radius = 1;
					this.x = 0;
					this.y = 0;
					this.dx = 0;
					this.dy = 0;
				};
				Flake.prototype.randomize = function() {
					this.radius = rand(5, 30)/10;
					this.y = rand(0, window.innerHeight);
					this.x = rand(0, window.innerWidth);
					this.el.css({	'width': (this.radius*2) + 'px',
									'height': (this.radius*2) + 'px',
									'border-radius': this.radius + 'px',
									'top': this.y + 'px',
									'left': this.x + 'px',
					}).addClass('snowflake');
					this.dx = rand(-10, 10)/10;
					this.dy = rand(18, 24)/10;
				};
				Flake.prototype.update = function() {
					this.x += this.dx;
					this.y += this.dy;
					this.el.css({	'top': this.y + 'px',
									'left': this.x + 'px',
					});
					if(this.y > window.innerHeight) {
						this.y = 0;
						this.x = rand(0, window.innerWidth);
					}
				};
				var rand = function(min, max) {
					return Math.floor(Math.random()*(max-min+1)+min);
				};
				var letItSnow = new Snowstorm();
		
			});
		})(jQuery);
		
	</script>
	<style>
		.snowflake {
			position: fixed;
			display: block;
			background-color: #fff;
		}
	</style>
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