<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
	
		<div class="section">
			<h1 class="bottom-margin"><?php the_title() ?></h1>
			<?php the_content() ?>
		</div>
		
	<?php endwhile; ?>
	
	<!--<ul id="resume" class="blue-button">
		<li id="resume-thumbnail">
			<img src="/assets/resume-lines.png" />
		</li>
		<li id="resume-text">
			<span id="resume-title">Download my r&eacute;sum&eacute;</span>
			<span id="resume-desc">
				My phone number, address, and email have been removed for privacy purposes.<br />
				I'll be happy to provide full contact details at request.
			</span>
		</li>
	</ul>-->

</main>

<?php get_footer() ?>