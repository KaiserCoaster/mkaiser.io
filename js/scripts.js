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

	});
})(jQuery);