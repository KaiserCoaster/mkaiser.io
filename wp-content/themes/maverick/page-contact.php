<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
	
		<div class="section">
			<h2 class="bottom-margin"><?php the_title() ?></h2>
			<?php the_content() ?>
		</div>
		
	<?php endwhile; ?>
	
	-Contact form here-

</main>

<?php get_footer() ?>