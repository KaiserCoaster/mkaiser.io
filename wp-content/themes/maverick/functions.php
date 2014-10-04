<?php 

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

?>