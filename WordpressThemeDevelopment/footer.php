<footer class="site-footer">
	<!-- footer widgets  -->	
	<div class="footer-widgets">
		<div class="row">
 			<?php if(is_active_sidebar('footer1')): ?>
					<div class="col-md-3">
					 	<?php  dynamic_sidebar('footer1'); ?>
					 </div>
			<?php endif; ?>	
			<?php if(is_active_sidebar('footer2')): ?>
					<div class="col-md-3">
					 	<?php  dynamic_sidebar('footer2'); ?>
					 </div>
			<?php endif; ?>	
			<?php if(is_active_sidebar('footer3')): ?>
					<div class="col-md-3">
					 	<?php  dynamic_sidebar('footer3'); ?>
					 </div>
			<?php endif; ?>	
			<?php if(is_active_sidebar('footer4')): ?>
					<div class="col-md-3">
					 	<?php  dynamic_sidebar('footer4'); ?>
					 </div>
			<?php endif; ?>		 
		 </div>
	</div>
	<!-- footer widgets  -->	
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