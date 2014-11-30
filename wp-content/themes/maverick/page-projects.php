<?php
/*
Template Name: Projects Page Template
*/
?>
<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
	
		<div class="section">
			<?php mk_header(); ?>
			<div class="bottom-margin"><?php the_content() ?></div>
			
			<ul class="grid">
				<?php
				$walk = new Grid_Walker();
				wp_list_pages(array(
					'title_li' => '',
					'child_of' => $post->ID,
					'walker' => $walk
					) 
				); 
				?>
			</ul>
			
		</div>
		
	<?php endwhile; ?>
	
</main>

<?php get_footer() ?>