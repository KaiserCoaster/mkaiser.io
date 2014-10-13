<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
	
		<h2><?php the_title() ?></h2>
		<?php the_content() ?>
		
		<h2>Recent Blog Posts</h2>
		<ul id="recent_blogs">
			<?php
			$args = array( 'numberposts' => '5' );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $recent ){
				?>
				
				<li>
					<a href="<?=get_permalink($recent["ID"]);?>"><?=$recent["post_title"];?></a>
					<span><?=mysql2date('j M Y', $recent['post_date']);?></span>
				</li>
				
				<?php
			}
			?>
			
				<li>
					<a href="#">This is a title</a>
					<span>8 June 2014</span>
				</li>
				<li>
					<a href="#">This is a title</a>
					<span>22 January 2014</span>
				</li>
				<li>
					<a href="#">This is a title</a>
					<span>22 January 2014</span>
				</li>
		</ul>
		
		
		
	<?php endwhile; ?>

</main>

<?php get_footer() ?>