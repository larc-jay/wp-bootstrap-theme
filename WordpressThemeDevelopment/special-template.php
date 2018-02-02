<?php
/*
Template Name: Special Layout
*/


get_header();

if(have_posts()):
	while(have_posts()) : the_post(); ?> 
		<article class="post">
			<div class="row">
				<div class="col-md-12">
				<h2><?php the_title(); ?> </h2>
				<div class="info-box">
				<h4>Disclaimer Title </h4>
				<p> DISCLAIMER. This word signifies. to abandon, to renounce; also the act by which the renunciation is made. For example, a disclaimer is the act by which a patentee renounces a part of his title of invention, 2. In real actions, a disclaimer of the tenancy or title is frequently added.</p>
				</div>
				<?php the_content(); ?>
				</div>
			</div>
		</article>	
	<?php endwhile;

else :
	 echo "<p> No content found </p>";
endif;

get_footer();



