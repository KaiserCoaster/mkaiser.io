<?php get_header() ?>

<main>

	<h1>Blog</h1>

	<?php 
	
	if ( have_posts() ) :
	
		while(have_posts()): the_post() ?>
	
			<article class="list">
			
				<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
				<date>
					<?php the_date(); ?>
				</date>
				<span class="the_post">
					<?php the_content(__('Continue Reading')); ?>
				</span>

			</article>
		
	<?php
	
		endwhile; 
	
	endif;
	
	echo paginate_links();
	
	?>		

</main>


<?php get_footer() ?>
