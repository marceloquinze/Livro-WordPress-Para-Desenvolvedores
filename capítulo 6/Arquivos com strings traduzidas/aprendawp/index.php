<?php 
get_header(); 
get_template_part( 'template-parts/header-image' );
?>
	<div class="content-area">
		<main>
			<div class="container">
				<div class="row">
					<div class="blog-area col-lg-9 col-md-8 col-12">
						<?php
						if( have_posts() ):
							while( have_posts() ): the_post();
								get_template_part( 'template-parts/content' );
							endwhile;

						the_posts_pagination( array(
							'prev_text'		=> __( 'Previous', 'aprendawp' ),
							'next_text'		=> __( 'Next', 'aprendawp' ),
						));
												
						else: 
							get_template_part( 'template-parts/content', 'none' );
						endif; ?>
					</div>
					<?php get_sidebar(); ?>					
				</div>
			</div>						
		</main>
	</div>
<?php get_footer(); ?>