<?php

class Grid_Walker extends Walker_page {
	function start_el(&$output, $obj, $depth, $args, $current_obj) {
		$img = wp_get_attachment_image_src( get_post_thumbnail_id($obj->ID), 'medium' );
		$desc = get_post_custom_values( 'mk_project_desc', $obj->ID );
		$output .= "<li>";
		$output .= 	"<a href='" . get_permalink($obj->ID) . "'>";
		$output .= 		"<div class='grid-image'>";
		$output .= 			"<img src='" . $img[0] . "' width='100%' />";
		$output .= 		"</div>";
		$output .= 		"<div class='grid-text'>";
		$output .=			$page->post_title;
		if(count($desc) > 0) {
			$output .=		"<div class='grid-description'>";
			$output .=			$desc[0];
			$output .=		"</div>";
		}
		$output .=		"</div>";
		$output .=	"</a>";
		$output .= "</li>";
	}
}

?>