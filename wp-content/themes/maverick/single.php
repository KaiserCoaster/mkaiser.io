<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
		
		<article>
			<h1><?php the_title() ?></h1>
			<date>
				<?php the_date(); ?>
			</date>
			<span class="the_post">
				<?php the_content(); ?>
			</span>
		</article>
		
		<!--<?php the_permalink() ?>-->
		
	<?php endwhile; ?>
	
	<?php comments_template('', true); ?>

</main>

<?php get_footer() ?>