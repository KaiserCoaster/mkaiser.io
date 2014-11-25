	<footer>
		<?php wp_nav_menu( array('theme_location' => 'footer_menu', 'container' => false) ); ?>
		<!--<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="#">Projects</a></li>
			<li><a href="#">Photography</a></li>
			<li><a href="#">Contact</a></li>
		</ul>-->
		&copy;<?=date("Y");?> Matthew Kaiser
	</footer>
</div>

<?php get_sidebar() ?>

</body>
</html>