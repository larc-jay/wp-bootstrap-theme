<?php

get_header();

?>
<!-- main column -->
	<div class="row">
		<div class="col-md-9">
				<?php
					if(have_posts()):
						while(have_posts()) : the_post(); 

							//get_template_part('content'); // without post format
							get_template_part('content', get_post_format());
							
						endwhile;
						echo paginate_links();
						//previous_posts_link();
						//next_posts_link();
					else :
						 echo "<p> No content found </p>";
					endif;
				?>
			</div> <!-- main column -->
			<?php get_sidebar(); ?>
		</div>	
	<?php 
		get_footer();



