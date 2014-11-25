<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
		
		<article>
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
			<date>
				<?php the_date(); ?>
			</date>
			<span class="the_post margin-bottom">
				<?php the_content(); ?>
			</span>
			
			<a href="/blog/" class="blue-button top-margin">Return to Blog</a>
		</article>
		
		<!--<?php the_permalink() ?>-->
		
	<?php endwhile; ?>
	
	<?php comments_template('', true); ?>

</main>

<?php get_footer() ?>