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


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57176096-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>