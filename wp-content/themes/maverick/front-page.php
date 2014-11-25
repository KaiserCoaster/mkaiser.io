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
		
		<div class="section">
			<h2 class="bottom-margin">Recent Blog Posts</h2>
			<ul id="recent_blogs" class="grid">
				<?php
				$walk = new Grid_Walker();
				$args = array( 'numberposts' => '5');
				$recent_posts = wp_get_recent_posts( $args, OBJECT );
				echo $walk->walk($recent_posts, -1);
				?>
			</ul>
		</div>
		
		<div class="section">
			<h2 class="bottom-margin">Featured Projects</h2>
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