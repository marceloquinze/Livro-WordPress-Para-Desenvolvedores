<?php 

/*
Template Name: Home Page
*/

get_header(); ?>

	<div class="content-area">
		<main>
			<section class="slider">
				<div class="flexslider">
				  <ul class="slides">
					<?php  

					for ($i=1; $i < 4; $i++) : 
						$slider_page[$i] 				= get_theme_mod( 'set_slider_page' . $i );
						$slider_button_text[$i]			= get_theme_mod( 'set_slider_button_text' . $i ); 
						$slider_button_url[$i]			= get_theme_mod( 'set_slider_button_url' . $i );
					endfor;

					$args = array(
						'post_type'			=> 'page',
						'posts_per_page'	=> 3,
						'post__in'			=> $slider_page,
						'orderby'			=> 'post__in',
					);

					$slider_loop = new WP_Query( $args );

					$j = 1;

					if( $slider_loop->have_posts() ):
						while( $slider_loop->have_posts() ):
							$slider_loop->the_post();
					?>
					    <li>
					      <?php the_post_thumbnail( 'aprendawp-slider', array( 'class' => 'img-fluid' ) ); ?>
					      <div class="container">
					      	<div class="slider-details-container">
					      		<div class="slider-title">
					      			<h1><?php the_title(); ?></h1>
					      		</div>
					      		<div class="slider-description">
					      			<div class="subtitle"><?php the_content(); ?></div>
					      			<a class="link" href="<?php echo $slider_button_url[$j]; ?>"><?php echo $slider_button_text[$j]; ?></a>
					      		</div>
					      	</div>
					      </div>
					    </li>
					<?php 
					$j++;
					endwhile;
					wp_reset_postdata();
					endif;
					?>
				  </ul>
				</div>
			</section>

			<?php 
			if( class_exists( 'WooCommerce' ) ): 
			?>
				<section class="popular-products">
					<?php 

					$popular_limit		= get_theme_mod( 'set_popular_max_num', 4 );
					$popular_col 		= get_theme_mod( 'set_popular_max_col', 4 );
					$arrivals_limit		= get_theme_mod( 'set_new_arrivals_max_num', 4 );
					$arrivals_col		= get_theme_mod( 'set_new_arrivals_max_col', 4 );

					?>				
					<div class="container">
						<div class="section-title">
							<h2><?php echo get_theme_mod( 'set_popular_title', __( 'Popular products', 'aprendawp' ) ); ?></h2>
						</div>
						<?php echo do_shortcode( '[products limit=" ' . $popular_limit . ' " columns=" ' . $popular_col . ' " orderby="popularity"]' ); ?>	
					</div>
				</section>
				<section class="new-arrivals">
					<div class="container">
						<div class="section-title">
							<h2><?php echo get_theme_mod( 'set_new_arrivals_title', __( 'New Arrivals', 'aprendawp' ) ); ?></h2>
						</div>
						<?php echo do_shortcode( '[products limit=" ' . $arrivals_limit . ' " columns=" ' . $arrivals_col . ' " orderby="date"]' ); ?>
					</div>
				</section>
				<?php 

				$showdeal	= get_theme_mod( 'set_deal_show', 0 );
				$deal 		= get_theme_mod( 'set_deal' );
				$currency	= get_woocommerce_currency_symbol();
				$regular	= get_post_meta( $deal, '_regular_price', true );
				$sale 		= get_post_meta( $deal, '_sale_price', true );

				if( $showdeal == 1 && ( !empty( $deal ) ) ):
					$discount_percentage = absint( 100 - ( ( $sale/$regular ) * 100 ) );
				?>
				<section class="deal-of-the-week">
					<div class="container">
						<div class="section-title">
							<h2><?php echo get_theme_mod( 'set_deal_title', __( 'Deal of the Week', 'aprendawp' ) ); ?></h2>
						</div>
						<div class="row d-flex align-items-center">
							<div class="deal-img col-md-6 col-12 ml-auto text-center">
								<?php echo get_the_post_thumbnail( $deal, 'large', array( 'class' => 'img-fluid' ) ); ?>
							</div>
							<div class="deal-desc col-md-4 col-12 mr-auto text-center">
								<?php if( !empty( $sale ) ): ?>
									<span class="discount">
										<?php echo $discount_percentage . __( '% OFF', 'aprendawp' ); ?>
									</span>
								<?php endif; ?>
								<h3>
									<a href="<?php echo get_permalink( $deal ); ?>"><?php echo get_the_title( $deal ); ?></a>
								</h3>
								<p><?php echo get_the_excerpt( $deal ); ?></p>
								<div class="prices">
									<span class="regular">
										<?php 
										echo sprintf( get_woocommerce_price_format(), $currency, $regular );
										?>
									</span>
									<?php if( !empty( $sale ) ): ?>
										<span class="sale">
											<?php 
											echo sprintf( get_woocommerce_price_format(), $currency, $sale );
											?>										
										</span>
									<?php endif; ?>
								</div>
								<a href="<?php echo esc_url( '?add-to-cart=' . $deal ); ?>" class="add-to-cart"><?php _e( 'Add to Cart', 'aprendawp' ); ?></a>
							</div>
						</div>
					</div>
				</section>
				<?php endif; ?>
			<?php endif; ?>
			<section class="site-blog">
				<div class="container">
					<div class="section-title">
						<h2><?php echo get_theme_mod( 'set_blog_title', __( 'Latest News', 'aprendawp' ) ); ?></h2>
					</div>
					<div class="row">
						<?php

						$args = array(
							'post_type'				=> 'post',
							'posts_per_page'		=> 2,
							'ignore_sticky_posts'	=> true,
						);

						$blog_posts = new WP_Query( $args );

						if( $blog_posts->have_posts() ):
							while( $blog_posts->have_posts() ): $blog_posts->the_post();
								?>
								<article class="col-md-6">
									<div class="post-thumbnail">
										<a href="<?php the_permalink(); ?>">
											<?php 
												if( has_post_thumbnail() ){
													the_post_thumbnail( 
														'aprendawp-blog', 
														array( 
															'class' => 'img-fluid' 
														) 
													);
												}
											?>
										</a>
									</div>
									<h3>
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<span class="pub-date">
										<a href="<?php the_permalink(); ?>">
											<?php echo get_the_date(); ?>
										</a>
									</span>
									<div class="excerpt"><?php the_excerpt(); ?></div>
								</article>
								<?php
							endwhile;
							wp_reset_postdata();
						else: ?>
							<p><?php _e( 'Nothing to display.', 'aprendawp' ); ?></p>
						<?php endif; ?>
					</div>
				</div>						
			</section>
		</main>
	</div>
<?php get_footer(); ?>