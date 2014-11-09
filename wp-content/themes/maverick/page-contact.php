<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
	
		<div class="section">
			<h2 class="bottom-margin"><?php the_title() ?></h2>
			<form id="contact">
				<ul id="contact-form">	
					<li>
						<label for="contact-name">Name</label>
						<input id="contact-name" type="text" />
					</li>
					<li>
						<label for="contact-email">Email</label>
						<input id="contact-email" type="email" />
					</li>
					<li>
						<label for="contact-message">Message</label>
						<textarea id="contact-message"></textarea>
					</li>
					<li>
						<input type="submit" value="Send" />
					</li>
				</ul>
			</form>
			<?php the_content() ?>
		</div>
		
	<?php endwhile; ?>
	
</main>

<?php get_footer() ?>