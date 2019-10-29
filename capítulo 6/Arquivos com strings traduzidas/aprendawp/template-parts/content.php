<article>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="post-thumbnail">
		<?php 
			if( has_post_thumbnail() ){
				the_post_thumbnail( 'aprendawp-blog', array( 'class' => 'img-fluid' ) );
			}
		?>
	</div>
	<div class="meta">
		<p><?php _e( 'Published by', 'aprendawp' ); ?> <?php the_author_posts_link(); ?> 
		<?php _e( 'on', 'aprendawp' ); ?> <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
        <br />
        <?php if( has_category() ): ?>
            <?php _e( 'Categories', 'aprendawp' ) ?>: <span><?php the_category( ' ' ); ?></span>
            <br />
        <?php endif; ?>
        <?php if( has_tag() ): ?>
            <?php _e( 'Tags', 'aprendawp' ); ?>: <span><?php the_tags( '', ', ' ); ?></span>
        <?php endif; ?>			
		</p>
	</div>									
	<div class="content"><?php the_excerpt(); ?></div>
</article>