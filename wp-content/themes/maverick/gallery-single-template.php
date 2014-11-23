<?php get_header(); ?>

<main>

	<?php if(have_posts()) the_post() ?>

	<div class="section">
		
		<?php global $post, $wp_query;
			$args = array(
				'post_type'				=> 'gallery',
				'post_status'			=> 'publish',
				'name'					=> $wp_query->query_vars['name'],
				'posts_per_page'		=> 1
			);	
			$second_query = new WP_Query( $args ); 
			$gllr_options = get_option( 'gllr_options' );
			$gllr_download_link_title = addslashes( __( 'Download high resolution image', 'gallery' ) );
			if ( $second_query->have_posts() ) {
				while ( $second_query->have_posts() ) {
					$second_query->the_post(); ?>
					<h1 class="bottom-margin"><?php the_title(); ?></h1>
					<div class="bottom-margin"><?php the_content(); ?></div>
		
					<?php the_content(); 
					$posts = get_posts( array(
						"showposts"			=> -1,
						"what_to_show"		=> "posts",
						"post_status"		=> "inherit",
						"post_type"			=> "attachment",
						"orderby"			=> $gllr_options['order_by'],
						"order"				=> $gllr_options['order'],
						"post_mime_type"	=> "image/jpeg,image/gif,image/jpg,image/png",
						"post_parent"		=> $post->ID
					));
					if ( count( $posts ) > 0 ) {
						?>
						<ul id="gallery" class="grid bottom-margin">
							<?php
							foreach ( $posts as $attachment ) { 
								$key = "gllr_image_text";
								$link_key = "gllr_link_url";
								$alt_tag_key = "gllr_image_alt_tag";
								$image_attributes = wp_get_attachment_image_src( $attachment->ID, 'thumbnail' );
								$image_attributes_large = wp_get_attachment_image_src( $attachment->ID, 'large' );
								$image_attributes_full = wp_get_attachment_image_src( $attachment->ID, 'full' );
								?>
								
								<li>
									<a href="<?php echo $image_attributes_large[0]; ?>" rel="gallery_fancybox" title="<?php echo get_post_meta( $attachment->ID, $key, true ); ?>">
										<div class="grid-image">
											<img  alt="<?php echo get_post_meta( $attachment->ID, $alt_tag_key, true ); ?>" title="<?php echo get_post_meta( $attachment->ID, $key, true ); ?>" src="<?php echo $image_attributes[0]; ?>" rel="<?php echo $image_attributes_full[0]; ?>" width="100%" />
										</div>
									</a>
								</li>

							<?php
							} 
							?>
						</ul>
					<?php
					} else {
						?>
						<div class="gallery_box_single">
							<p class="not_found"><?php _e( 'Sorry, nothing found.', 'gallery' ); ?></p>
						</div>
					<?php
					}
				}
			} 
		?>

		<?php
		if ( 1 == $gllr_options['return_link'] ) {
			$return_link = "";
			if ( 'gallery_template_url' == $gllr_options["return_link_page"] ) {
				global $wpdb;
				$parent = $wpdb->get_var( "SELECT $wpdb->posts.ID FROM $wpdb->posts, $wpdb->postmeta WHERE meta_key = '_wp_page_template' AND meta_value = 'gallery-template.php' AND (post_status = 'publish' OR post_status = 'private') AND $wpdb->posts.ID = $wpdb->postmeta.post_id" );
				$return_link = ( !empty( $parent ) ? get_permalink( $parent ) : '' );
			} else {
				$return_link = $gllr_options["return_link_url"];
			}
			?>
			<a href="<?php echo $return_link ?>" class="blue-button"><?php echo $gllr_options['return_link_text']; ?></a>
		<?php
		}
		?>
		
	</div>
	
	<?php comments_template('', true); ?>

	<script type="text/javascript">
		(function($){
			$(document).ready(function(){
				$("a[rel=gallery_fancybox<?php if ( 0 == $gllr_options['single_lightbox_for_multiple_galleries'] ) echo '_' . $post->ID; ?>]").fancybox({
					'transitionIn'			: 'elastic',
					'transitionOut'			: 'elastic',
					'titlePosition' 		: 'inside',
					'speedIn'				:	500, 
					'speedOut'				:	300,
					'titleFormat'			: function( title, currentArray, currentIndex, currentOpts ) {
						return '<div id="fancybox-title-inside">' + ( title.length ? '<span id="bws_gallery_image_title">' + title + '</span><br />' : '' ) + '<span id="bws_gallery_image_counter"><?php _e( "Image", "gallery"); ?> ' + ( currentIndex + 1 ) + ' / ' + currentArray.length + '</span></div><?php if( get_post_meta( $post->ID, 'gllr_download_link', true ) != '' ){?><a id="bws_gallery_download_link" href="' + $( currentOpts.orig ).attr('rel') + '" target="_blank"><?php echo $gllr_download_link_title; ?> </a><?php } ?>';
					}<?php if ( $gllr_options['start_slideshow'] == 1 ) { ?>,
					'onComplete':	function() {
						clearTimeout( jQuery.fancybox.slider );
						jQuery.fancybox.slider = setTimeout("jQuery.fancybox.next()",<?php echo empty( $gllr_options['slideshow_interval'] )? 2000 : $gllr_options['slideshow_interval'] ; ?>);
					}<?php } ?>
				});
			});
		})(jQuery);
	</script>
	
</main>

<?php get_footer(); ?>