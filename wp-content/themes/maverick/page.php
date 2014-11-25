<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
	
		<div class="section">
			<?php if( has_post_thumbnail() ) {
				$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
				$cust_pos = get_post_custom_values( 'mk_page_featured_image_pos_y' );
				$pos = count($cust_pos) > 0 ? $cust_pos[0] : "top"; ?>
				<div style="background-image:url(<?=$img[0]?>); background-position-y: <?=$pos?>" class="featured_image">
					<h1 class="featured_title"><?php the_title() ?></h1>
				</div>
				<?php
			}
			else { ?>
				<h1 class="bottom-margin"><?php the_title() ?></h1>
			<?php } ?>
			<?php the_content() ?>
		</div>
		
		<?php if ( is_page() && $post->post_parent > 0 ) : ?>
			<a href="<?=get_permalink($post->post_parent) ?>" class="blue-button">Back to <?=get_the_title($post->post_parent) ?></a>
		<?php endif; ?>
		
	<?php endwhile; ?>

</main>

<?php get_footer() ?>