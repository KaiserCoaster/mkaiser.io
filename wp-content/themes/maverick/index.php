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
	
	?>
	
	
	
		<article class="list">
		
			<h2><a href="#">Testing Multiple Posts</a></h2>
			<date>
				Friday August 5, 2014
			</date>
			<span class="the_post"><p>
				
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ultricies vulputate aliquam. Nulla vitae condimentum lorem. Morbi cursus leo vitae tortor tincidunt, ac mattis turpis fermentum. Etiam vulputate nisi auctor nulla fermentum viverra. Proin condimentum nibh risus, vel feugiat ante facilisis ut. Pellentesque consequat est dolor, iaculis euismod sem porttitor a. Nunc in justo eget turpis feugiat aliquam id [...]
		
			</p></span>
			
		</article>
		
		
		
		<article class="list">
		
			<h2><a href="#">How many posts can we fit in here?</a></h2>
			<date>
				Monday July 21, 2014
			</date>
			<span class="the_post"><p>
				
				Sed sem est, sagittis sit amet mattis consectetur, tempor a lacus. Curabitur aliquet, ante sit amet pellentesque malesuada, libero risus tempor massa, vel hendrerit enim sapien nec tortor. Nam at imperdiet tellus. Aenean et sapien rutrum, faucibus eros a, aliquet nisl. Praesent id sagittis nulla, nec hendrerit justo. Donec facilisis ligula orci, non commodo odio adipiscing vel. Vestibulum faucibus lacinia [...]
						
			</p></span>
			
		</article>
		
		
		
		<article class="list">
		
			<h2><a href="#">Let's try one more.</a></h2>
			<date>
				Tuesday November 28, 2013
			</date>
			<span class="the_post"><p>
				
				Proin sagittis, enim at porta faucibus, odio ipsum ornare ligula, non ornare sem sapien eget mi. Aenean venenatis ac dolor sit amet scelerisque. Quisque dapibus eleifend lorem, in adipiscing est. Sed molestie adipiscing sapien, ut vehicula mi gravida vitae. Aenean consectetur in sapien et elementum. Etiam gravida malesuada lorem, ac pulvinar diam. Nullam lectus sapien, vehicula quis est pretium, mattis egestas [...]
			</p></span>
			
		</article>
		
		
		
	

</main>


<?php get_footer() ?>
