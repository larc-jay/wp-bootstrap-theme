<article class="post  <?php  if( has_post_thumbnail()) { echo 'has-thumbnail';} ?>">
			<div class="post-thumbnail">
				<a href="<?php echo  the_permalink() ?>"> <?php the_post_thumbnail('small-thumbnail'); ?>	</a>		
			</div>

			<h2><a href="<?php echo  get_the_permalink() ?>"> <?php the_title(); ?> </a> </h2>
			<p class="post-info">
				<?php the_time('F jS, Y'); ?> | by 
				<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"> <?php the_author(); ?> </a> | 
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

			
			<?php 

			if( is_search() OR is_archive()){ ?>
				<p>
				<?php echo get_the_excerpt(); ?>
				</p>
			<?php 		
			}else{	
				if ($post->post_excerpt) { ?>
						<p>
						<?php echo get_the_excerpt() ?> 
						<a href="<?php the_permalink() ?>">Reade more &raquo; </a>
					</p>
					<?php }else { 
							the_content();
						?>		
							<div class="about-authon">
									<h2> Author </h2>
							</div>	

					<?php		
					 } 
			}

			?>
		</article>	