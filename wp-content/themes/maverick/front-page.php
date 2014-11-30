<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
	
		<div class="section">
			<?php mk_header(); ?>
			<div class="bottom-margin"><?php the_content() ?></div>
			
			<a href="/about-me/" class="blue-button">Find out more about me</a>
			<a href="/contact/" class="blue-button">Contact Me</a>
		</div>
		
		<div class="section">
			<h2 class="bottom-margin"><a href="/blog/">Recent Blog Posts</a></h2>
			<ul id="recent_blogs" class="grid">
				<?php
				$walk = new Grid_Walker();
				$args = array( 'numberposts' => '5', 'post_status' => 'publish');
				$recent_posts = wp_get_recent_posts( $args, OBJECT );
				echo $walk->walk($recent_posts, -1);
				?>
			</ul>
		</div>
		
		<div class="section">
			<h2 class="bottom-margin"><a href="/projects/">Featured Projects</a></h2>
			<ul id="featured_projects" class="grid">
				<?php
				$walk = new Grid_Walker();
				wp_list_pages(array(
					'title_li' => '',
					'child_of' => 'projects',
					'meta_key' => 'mk_featured_project',
					'walker' => $walk
					) 
				); 
				?>
			</ul>
		</div>
		
		<!-- Disable Photography section for now
		<div class="section">
			<h2 class="bottom-margin">Photography</h2>
			<ul id="photography" class="grid">
				<li>
					<a href="#">
						<div class="grid-image">
							<img src="http://mkaiser.io/wp-content/uploads/2014/08/edited-5475-300x200.jpg" width="100%" />
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="grid-image">
							<img src="http://mkaiser.io/wp-content/uploads/2014/08/edited-5422-200x300.jpg" width="100%" />
						</div>
					</a>
				</li>
			</ul>
		</div>
		-->
		
		
	<?php endwhile; ?>

</main>

<?php get_footer() ?>