<?php

get_header();

if(have_posts()):
	while(have_posts()) : the_post(); ?> 
		<article class="post">
			<h2><?php the_title(); ?> </h2>
			<p class="post-info">
				<?php the_time('F jS, Y'); ?> | by 
				<a href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>"> <?php the_author(); ?> </a> | 
				Posted in 
				<?php 
					$categories = get_the_category();
					$seperator =", ";
					$output = '';
					if($categories){
						foreach ($categories as $cat) {
							$output .= '<a href="'.get_category_link($cat->term_id).'">'.$cat->cat_name.' </a>'  .$seperator;
						}
						echo trim($output,$seperator);
					}	
				?>
			</p>	

			<p><?php the_content(); ?> </p>
		</article>	
	<?php endwhile;

else :
	 echo "<p> No content found </p>";
endif;

get_footer();



