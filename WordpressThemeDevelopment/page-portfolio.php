<?php

get_header();

if(have_posts()):
	while(have_posts()) : the_post(); ?> 
		<article class="post">

			<div class="row">
				<div class="col-md-3">
					<h2><?php the_title(); ?> </h2>
				</div>
				<div class="col-md-9">
					<p><?php the_content(); ?> </p>
				</div>	
			</div>
		</article>	
	<?php endwhile;

else :
	 echo "<p> No content found </p>";
endif;

get_footer();



