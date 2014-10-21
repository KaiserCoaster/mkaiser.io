<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
	
		<div class="section">
			<h1 class="bottom-margin"><?php the_title() ?></h1>
			<?php the_content() ?>
		</div>
		
		<div class="section">
			<h2 class="bottom-margin">Recent Blog Posts</h2>
			<ul id="recent_blogs" class="grid grid-img">
				<?php
				$args = array( 'numberposts' => '5' );
				$recent_posts = wp_get_recent_posts( $args );
				foreach( $recent_posts as $recent ){
					?>
					
					<li>
						<a href="<?=get_permalink($recent["ID"]);?>">
							<div class="grid-image"></div>
							<div class="grid-text">
								<?=$recent["post_title"];?>
								<date class="grid-description"><?=mysql2date('j M Y', $recent['post_date']);?></date>
							</div>
						</a>
					</li>
					
					<?php
				}
				?>
				<li>
					<a href="#">
						<div class="grid-image"></div>
						<div class="grid-text">
							This is a title
							<date class="grid-description">8 June 2014</date>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="grid-image"></div>
						<div class="grid-text">
							This is a title
							<date class="grid-description">22 January 2014</date>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="grid-image"></div>
						<div class="grid-text">
							Daily GitHub Commits For a Year
							<date class="grid-description">22 January 2014</date>
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
						<div class="grid-image">
							<img src="http://mkaiser.io/wp-content/uploads/2014/10/Screen-Shot-2014-10-17-at-9.41.08-PM-300x169.png" width="100%" />
						</div>
						<div class="grid-text">
							gadv.com
							<div class="grid-description">Fan-site for Six Flags Great Adventure</div>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="grid-image">
							<img src="http://mkaiser.io/wp-content/uploads/2014/10/Screen-Shot-2014-10-17-at-10.33.03-PM-300x169.png" width="100%" />
						</div>
						<div class="grid-text">
							Online Day 2014
							<div class="grid-description">Event held at Six Flags</div>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="grid-image">
							<img src="http://mkaiser.io/wp-content/uploads/2014/10/Screen-Shot-2014-10-17-at-11.36.23-PM-300x169.png" width="100%" />
						</div>
						<div class="grid-text">
							wishlist
							<div class="grid-description">Web app for making a wishlist</div>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="grid-image">
							<img src="http://mkaiser.io/wp-content/uploads/2014/10/Screen-Shot-2014-10-17-at-11.20.25-PM-copy-300x169.png" width="100%" />
						</div>
						<div class="grid-text">
							RUcheesy
							<div class="grid-description">Where is the Mac & Cheese at Rutgers?</div>
						</div>
					</a>
				</li>
			</ul>
		</div>
		
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
		
		
	<?php endwhile; ?>

</main>

<?php get_footer() ?>