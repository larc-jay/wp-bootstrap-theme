<footer class="site-footer">
	

<?php  wp_footer(); ?>
   <nav class="site-nav">
	<?php $args = array(
				'theme_location' => 'footer'
			);	
	?>
		<?php wp_nav_menu($args) ?>
	</nav>
	<p> <?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?>  </p>
	</footer>
</div> <!-- end container -->
</body>
</html>