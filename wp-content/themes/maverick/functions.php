<?php 
	
add_theme_support( 'post-thumbnails' ); 

add_action( 'after_setup_theme', 'register_my_menus' );
function register_my_menus() {
  register_nav_menu( 'main_menu', 'Main Navigation Menu' );
  register_nav_menu( 'footer_menu', 'Footer Navigation Menu' );
}

register_sidebar(array(
	'name' => __('Right Sidebar'),
	'id' => 'right-sidebar',
	'description' => 'the side bar',
	'before_widget' => '<div>',
	'after_widget' => '</div>',
));

// Hide admin bar and fix html 32px margin-top
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}


// No longer using posts for Projects
/*
function exclude_category($query) {
	if ( $query->is_home() ) {
		$query->set('cat', '-4');
	}
	else if($query->is_page('projects')) {
		$query->set('cat', '4');
	}
	return $query;
}
add_filter('pre_get_posts', 'exclude_category');
*/


/*
function my_wp_nav_menu_args( $args = '' ) {
	if()
	return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );*/








class Grid_Walker extends Walker_page {
	function start_el(&$output, $obj, $depth, $args, $current_obj) {
		$desc = false;
		if($obj->post_type == "post") {
			$desc = mysql2date('j M Y', $obj->post_date);
		}
		else if($obj->post_type == "page") {
			$cust_desc = get_post_custom_values( 'mk_grid_desc', $obj->ID );
			if(count($cust_desc) > 0) {
				$desc = $cust_desc[0];
			}
		}
		$output .= "<li>";
		$output .= 	"<a href='" . get_permalink($obj->ID) . "'>";
		if(has_post_thumbnail($obj->ID)) {
			$img = wp_get_attachment_image_src( get_post_thumbnail_id($obj->ID), 'medium' );
			$output .= 	"<div class='grid-image'>";
			$output .= 		"<img src='" . $img[0] . "' width='100%' />";
			$output .= 	"</div>";
		}
		$output .= 		"<div class='grid-text'>";
		$output .=			$obj->post_title;
		if($desc) {
			$output .=		"<div class='grid-description'>";
			$output .=			$desc;
			$output .=		"</div>";
		}
		$output .=		"</div>";
		$output .=	"</a>";
		$output .= "</li>";
	}
}



?>