<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
	
		<div class="section">
			<h1 class="bottom-margin"><?php the_title() ?></h1>
			<?php the_content() ?>
		</div>
		
		<div class="section">
			<h2 class="bottom-margin">Recent Blog Posts</h2>
			<ul id="recent_blogs" class="grid">
				<?php
				$args = array( 'numberposts' => '5' );
				$recent_posts = wp_get_recent_posts( $args );
				foreach( $recent_posts as $recent ){
					?>
					
					<li>
						<a href="<?=get_permalink($recent["ID"]);?>">
							<div class="recent-blog-image"></div>
							<div class="recent-blog-text">
								<?=$recent["post_title"];?>
								<date><?=mysql2date('j M Y', $recent['post_date']);?></date>
							</div>
						</a>
					</li>
					
					<?php
				}
				?>
				<li>
					<a href="#">
						<div class="recent-blog-image"></div>
						<div class="recent-blog-text">
							This is a title
							<date>8 June 2014</date>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="recent-blog-image"></div>
						<div class="recent-blog-text">
							This is a title
							<date>22 January 2014</date>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="recent-blog-image"></div>
						<div class="recent-blog-text">
							Daily GitHub Commits For a Year
							<date>22 January 2014</date>
						</div>
					</a>
				</li>
			</ul>
		</div>
		
		<div class="section">
			<h2 class="bottom-margin">Featured Projects</h2>
			<ul id="featured_projects" class="grid">
				<li>
					<a href="#">
						<div class="project-image"><img src="http://mkaiser.io/wp-content/uploads/2014/10/Screen-Shot-2014-10-17-at-9.41.08-PM-300x169.png" width="100%" /></div>
						<div class="project-text">
							gadv.com
							<div class="project-description">Fan-site for Six Flags Great Adventure</div>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="project-image"><img src="http://mkaiser.io/wp-content/uploads/2014/10/Screen-Shot-2014-10-17-at-10.33.03-PM-300x169.png" width="100%" /></div>
						<div class="project-text">
							Online Day 2014
							<div class="project-description">Event held at Six Flags</div>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="project-image"><img src="http://mkaiser.io/wp-content/uploads/2014/10/Screen-Shot-2014-10-17-at-11.36.23-PM-300x169.png" width="100%" /></div>
						<div class="project-text">
							wishlist
							<div class="project-description">Web app for making a wishlist</div>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="project-image"><img src="http://mkaiser.io/wp-content/uploads/2014/10/Screen-Shot-2014-10-17-at-11.20.25-PM-copy-300x169.png" width="100%" /></div>
						<div class="project-text">
							RUcheesy
							<div class="project-description">Where is the Mac & Cheese at Rutgers?</div>
						</div>
					</a>
				</li>
			</ul>
		</div>
		
		<div class="section">
			<h2 class="bottom-margin">Photography</h2>
			<ul id="photography" class="grid">
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
		</div>
		
		
	<?php endwhile; ?>

</main>

<?php get_footer() ?>