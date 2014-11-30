<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
		
		<article>
			<?php mk_header(); ?>
			<date>
				<?php the_date(); ?>
			</date>
			<span class="the_post">
				<?php the_content(); ?>
			</span>
			
			<a href="/blog/" class="blue-button">← Return to Blog</a>
		</article>
		
		<!--<?php the_permalink() ?>-->
		
	<?php endwhile; ?>
	
	<?php comments_template('', true); ?>

</main>

<?php get_footer() ?>