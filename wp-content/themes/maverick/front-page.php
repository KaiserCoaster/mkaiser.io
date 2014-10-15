<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
	
		<h2 class="bottom-margin"><?php the_title() ?></h2>
		<div class="bottom-margin"><?php the_content() ?></div>
		
		<h2 class="bottom-margin">Recent Blog Posts</h2>
		<ul id="recent_blogs" class="grid bottom-margin">
			<?php
			$args = array( 'numberposts' => '5' );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $recent ){
				?>
				
				<li>
					<div>
						<date><?=mysql2date('j M Y', $recent['post_date']);?></date>
						<a href="<?=get_permalink($recent["ID"]);?>"><?=$recent["post_title"];?></a>
					</div>
				</li>
				
				<?php
			}
			?>
				<li>
					<div>
						<date>8 June 2014</date>
						<a href="#">This is a title</a>
					</div>
				</li>
				<li>
					<div>
						<date>22 January 2014</date>
						<a href="#">This is a title</a>
					</div>
				</li>
				<li>
					<div>
						<date>22 January 2014</date>
						<a href="#">Daily GitHub Commits For a Year</a>
					</div>
				</li>
		</ul>
		
		<h2 class="bottom-margin">Featured Projects</h2>
		<ul id="featured_projects" class="grid bottom-margin">
				<li>
					<div>
						<date>8 June 2014</date>
						<a href="#">This is a title</a>
					</div>
				</li>
				<li>
					<div>
						<date>22 January 2014</date>
						<a href="#">This is a title</a>
					</div>
				</li>
				<li>
					<div>
						<date>22 January 2014</date>
						<a href="#">Daily GitHub Commits For a Year</a>
					</div>
				</li>
		</ul>
		
		<h2 class="bottom-margin">Photography</h2>
		<ul id="photography" class="grid bottom-margin">
				<li>
					<div>
						<a href="#">
							<img src="http://mkaiser.io/wp-content/uploads/2014/08/edited-5475-300x200.jpg" width="100%" />
						</a>
					</div>
				</li>
				<li>
					<div>
						<a href="#">
							<img src="http://mkaiser.io/wp-content/uploads/2014/08/edited-5422-200x300.jpg" width="100%" />
						</a>
					</div>
				</li>
		</ul>
		
		
		
	<?php endwhile; ?>

</main>

<?php get_footer() ?>