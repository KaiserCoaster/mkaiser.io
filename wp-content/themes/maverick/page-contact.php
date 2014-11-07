<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
	
		<div class="section">
			<h2 class="bottom-margin"><?php the_title() ?></h2>
			<?php the_content() ?>
		</div>
		
	<?php endwhile; ?>
	
	<form id="contact">
		<label for="name">Name</label>
		<input id="name" name="name" type="text" />
		<label for="email">Email</label>
		<input id="email" name ="email" type="email" />
		<label for="message">Message</label>
		<textarea id="message" name="message"></textarea>
		<input type="submit" value="Send" />
	</form>
</main>

<?php get_footer() ?>