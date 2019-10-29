<?php 
get_header(); 
get_template_part( 'template-parts/header-image' );
?>
	<div class="content-area">
		<main>
			<div class="container">
					<?php
						while( have_posts() ): the_post();
							get_template_part( 'template-parts/content', 'page' );
						endwhile;
					?>
			</div>						
		</main>
	</div>
<?php get_footer(); ?>