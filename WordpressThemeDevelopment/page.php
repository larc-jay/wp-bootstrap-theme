<?php

get_header();

if(have_posts()):
	while(have_posts()) : the_post(); ?> 
		
		<article class="post">
			<?php if(has_children() OR $post->post_parent > 0){ ?>
			<nav class="site-nav children-links clearfix">

		     	<span class="parent-link">
		     		
		     		<a href="<?php echo get_the_permalink(); ?>"> 
		     			<?php echo get_the_title(get_top_ancestor_id()); ?> </a>
		     	</span>
		     	<ul>
				<?php 
					$args = array(
						'child_of' => get_top_ancestor_id(),
						'title_li' => ''
					);
				?>	
			    <?php wp_list_pages($args); ?>	
				</ul>
			  </nav>

			<h2><?php the_title(); ?> </h2>
			<p><?php the_content(); ?> </p>
			<?php } ?>
		</article>	
	<?php endwhile;

else :
	 echo "<p> No content found </p>";
endif;

get_footer();



