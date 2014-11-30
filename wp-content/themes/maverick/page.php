<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
	
		<div class="section">
			<?php mk_header(); ?>
			<?php if ( is_page() && $post->post_parent > 0 ) : ?>
				<div class="breadcrumbs">
					<a href="<?=get_permalink($post->post_parent) ?>"><?=get_the_title($post->post_parent) ?></a> → 
					<?php the_title() ?>
				</div>
			<?php endif; ?>
			<?php the_content() ?>
			
			<?php if ( is_page() && $post->post_parent > 0 ) : ?>
				<a href="<?=get_permalink($post->post_parent) ?>" class="blue-button">← Return to <?=get_the_title($post->post_parent) ?></a>
			<?php endif; ?>
			
		</div>
		
	<?php endwhile; ?>

</main>

<?php get_footer() ?>