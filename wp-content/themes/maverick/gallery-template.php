<?php
/*
Template Name: Gallery Template
*/
?>

<?php get_header(); ?>

<main>

	<?php if(have_posts()) the_post() ?>

	<div class="section">
		<h1 class="bottom-margin"><?php the_title(); ?></h1>
		<div class="bottom-margin"><?php the_content(); ?></div>
		
		<?php if ( function_exists( 'pdfprnt_show_buttons_for_custom_post_type' ) ) 
			echo pdfprnt_show_buttons_for_custom_post_type( 'post_type=gallery&orderby=post_date' );
		?>
		
		<ul id="photography" class="grid">
			
			<?php 
				
				global $post, $wpdb, $wp_query, $request;
							
				if ( get_query_var( 'paged' ) ) {
					$paged = get_query_var( 'paged' );
				} elseif ( get_query_var( 'page' ) ) {
					$paged = get_query_var( 'page' );
				} else {
					$paged = 1;
				}
	
				$permalink = get_permalink();
				$gllr_options = get_option( 'gllr_options' );
				$count = 0;
				$per_page = $showitems = get_option( 'posts_per_page' );  
				$count_all_albums = $wpdb->get_var( "SELECT COUNT(*) FROM wp_posts WHERE 1=1 AND wp_posts.post_type = 'gallery' AND (wp_posts.post_status = 'publish')" );

				if ( substr( $permalink, strlen( $permalink ) -1 ) != "/" ) {
					if ( strpos( $permalink, "?" ) !== false ) {
						$permalink = substr( $permalink, 0, strpos( $permalink, "?" ) -1 ) . "/";
					} else {
						$permalink .= "/";
					}
				}
	
				$args = array(
					'post_type'				=> 'gallery',
					'post_status'			=> 'publish',
					'orderby'				=> 'post_date',
					'posts_per_page'		=> $per_page,
					'paged'					=> $paged
				);
				$second_query = new WP_Query( $args );

				if ( function_exists( 'pdfprnt_show_buttons_for_custom_post_type' ) ) 
					echo pdfprnt_show_buttons_for_custom_post_type( $second_query );
				
				$request = $second_query->request;
	
				if ( $second_query->have_posts() ) {
					while ( $second_query->have_posts() ) {
						$second_query->the_post();
						$attachments	= get_post_thumbnail_id( $post->ID );
						if ( empty ( $attachments ) ) {
							$attachments = get_posts( array(
								'post_parent' => $post->ID,
								'post_type' => 'attachment',
								'post_mime_type' => 'image',
								'posts_per_page' => 1,
								'orderby' => 'menu_order',
								'order' => 'ASC'
								)
							);
							//$id = key( $attachments );
							$image_attributes = wp_get_attachment_image_src( $attachments[0]->ID, 'medium' );
						} else {
							$image_attributes = wp_get_attachment_image_src( $attachments, 'medium' );
						}
						?>
						
						<li>
							<a href="<?php echo $permalink; echo basename( get_permalink( $post->ID ) ); ?>" title="<?php echo htmlspecialchars( $post->post_title ); ?>">
								<div class="grid-image">
									<img src="<?php echo $image_attributes[0]; ?>" width="100%" />
								</div>
								<div class="grid-text">
									<?php echo htmlspecialchars( $post->post_title ); ?>
									<!--<div class="grid-description"><?php echo the_excerpt_max_charlength( 100 ); ?></div>-->
								</div>
							</a>
						</li>

					<?php
					} 
				}
				wp_reset_query(); 
				$request = $wp_query->request; 
			?>
			
		</ul>
		
		<?php $pages = intval ( $count_all_albums / $per_page );
		if ( $count_all_albums % $per_page > 0 )
			$pages += 1;
		$range = 100;
		if ( ! $pages ) {
			$pages = 1;
		}
		if ( 1 != $pages ) { ?>
			<div class='pagination'>
				<?php for ( $i = 1; $i <= $pages; $i++ ) {
					if ( 1 != $pages && ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
						echo ( $paged == $i ) ? "<span class='current'>". $i ."</span>":"<a href='". get_pagenum_link($i) ."' class='inactive' >". $i ."</a>";
					}
				} ?>
				<div class='clear'></div>
			</div><!-- .pagination -->
		<?php } ?>

	</div>
	
</main>

<?php get_footer(); ?>