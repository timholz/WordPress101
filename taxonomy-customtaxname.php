<?php get_header('wide'); ?>


		<?php if ( have_posts() ) : ?>
			
				<h2><?php printf( __( 'Custom Taxonomy > %s' ), single_cat_title( '', false ) ); ?>
				<span class="numberofposts"><?php
				$postsInCat = get_term_by('name', single_cat_title( '', false ),'customtaxname');
				$postsInCat = $postsInCat->count;
				if ($postsInCat == 1){
					echo '(',$postsInCat, '&nbsp;post)';
				}
				else{
				    echo '(',$postsInCat, '&nbsp;posts)';
				}
				?>
				</span></h2>
				
				

				

			<?php while ( have_posts() ) : the_post(); ?>
			
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" tooltip=">>>&nbsp; <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			
			<!--meta tags-->
			
    			<div class="post-meta"><small>Author: <?php the_time('j F, Y'); ?>;
				  Hour: <?php the_time('G:i') ?> Hour<br><span class="meta-cat">Custom Taxonomy:
				  <?php echo custom_get_terms( $post->ID, 'customtaxname' ); ?></span>
				  <span class="meta-tag">&nbsp;|&nbsp;Custom Tag: 
				  <?php echo custom_get_terms( $post->ID, 'customtagname' ); ?></span>&nbsp;|
				  <span class="meta-tag">
					<?php
						if( current_user_can('manage_options') ) {
							echo edit_post_link(); 
						}
					?></span></small>
    			</div><!--Ende meta tags-->
    			
				<a class="imagehover" href="<?php the_permalink() ?>" rel="bookmark" data-title=">>>&nbsp;<?php the_title_attribute(); ?>">
	      <div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?></div></a>
			    <?php the_excerpt(); ?>
			  <hr>
			  <?php endwhile;?>
			
		  	<!-- Optional-show navigation when there is more than one post -->
			  <?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) : ?>

  				<!-- call navigation funktion, function can be found on wpbeginner -->
	  			
				<?php wpbeginner_numeric_posts_nav() ?>
			
			<!-- End of condition -->
			<?php endif; ?>
			
			<?php wp_reset_postdata(); ?>
			<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		
	</div><!-- End Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

