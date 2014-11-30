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





function mk_header() {
	if( has_post_thumbnail() ) {
		$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); 
		$cust_pos = get_post_custom_values( 'mk_page_featured_image_pos_y' );
		$pos = count($cust_pos) > 0 ? $cust_pos[0] : "top";
		echo "<div style=\"background-image:url(" . $img[0] . "); background-position-y: " . $pos . "\" class='featured_image'>";
			echo "<h1 class='featured_title'>" . the_title(null, null, false) . "</h1>";
		echo "</div>";
	}
	else {
		echo "<h1 class='bottom-margin'>" . the_title(null, null, false) . "</h1>";
	}
}






class Grid_Walker extends Walker_page {
	function start_el(&$output, $obj, $depth = 0, $args = array(), $current_object_id = 0) {
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