<?php

get_header();
get_template_part('slider');
?>
<!-- main column -->
	<div class="row">
		<div class="col-md-12">
				<?php
					if(have_posts()):
						while(have_posts()) : the_post(); 

							the_content(); 
							
						endwhile;

					else :
						 echo "<p> No content found </p>";
					endif;
				?>
			</div> <!-- main column -->
			
		</div>	
	<?php 
		get_footer();



