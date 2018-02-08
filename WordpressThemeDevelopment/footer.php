<footer class="site-footer">
		<?php if(get_theme_mod('wp-footer-callout-display') =="Yes") { ?>
			<div class="footer-callout clearfix">
				<div class="footer-callout-image">
				    <img src="<?php echo wp_get_attachment_url(get_theme_mod('wp-footer-callout-image')); ?>" /> 
				</div>
				<div class="footer-callout-text">
					 <h2> 
					 	<a href="<?php echo get_permalink(get_theme_mod('wp-footer-callout-link'));  ?> ">
					 		<?php echo get_theme_mod('wp-footer-callout');  ?> 
					 	</a>
					 </h2>
					 <?php echo wpautop( get_theme_mod('wp-footer-callout-text')); ?>
				</div>
			</div>
			<?php } ?>
	<!-- footer widgets  -->	
	<div class="footer-widgets clearfix">
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