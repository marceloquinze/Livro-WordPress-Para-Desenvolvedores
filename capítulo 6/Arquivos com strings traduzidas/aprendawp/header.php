<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page" class="site">
		<header>
			<section class="top-bar1">
				<div class="container">
					<div class="row">
						<div class="search col-md-7 d-flex justify-content-center justify-content-md-start mb-3 mb-md-0">
							<?php get_search_form(); ?>
						</div>
						<?php if( class_exists( 'WooCommerce' ) ): ?>
							<div class="account col-md-5 d-flex align-items-center justify-content-center justify-content-md-end">
								<div class="account-menu">
									<div class="navbar-expand">
										<ul class="navbar-nav float-left">
											<?php if( is_user_logged_in() ) : ?>
											<li>
												<a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" class="nav-link"><?php _e( 'My Account', 'aprendawp' ); ?></a>
											</li>
											<li>
												<a href="<?php echo wp_logout_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" class="nav-link"><?php _e( 'Logout', 'aprendawp' ); ?></a>
											</li>
											<?php else: ?>
											<li>
												<a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" class="nav-link"><?php _e( 'Login / Register', 'aprendawp' ); ?></a>
											</li>												
											<?php endif; ?>
										</ul>
									</div>								
								</div>
								<div class="cart">
									<a href="<?php echo wc_get_cart_url(); ?>"><span class="cart-icon"></span></a>
									<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<section class="top-bar2">
				<div class="container">
					<div class="row d-flex align-items-center">
						<div class="brand col-md-3 col-lg-2 text-center text-md-left">
							<?php if( has_custom_logo() ): ?>
								<?php the_custom_logo(); ?>
							<?php else: ?>
								<a href="<?php echo home_url( '/' ); ?>">
									<p class="site-title"><?php bloginfo( 'title' ); ?></p>
								</a>
								<span><?php bloginfo( 'description' ); ?></span>
							<?php endif; ?>							
						</div>
						<div class="site-menu col-md-9 col-lg-10">
							<nav class="main-menu navbar navbar-expand-md navbar-light float-md-right" role="navigation">
								<!-- Brand and toggle get grouped for better mobile display -->
								<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'aprendawp' ); ?>">
									<span class="navbar-toggler-icon"></span>
								</button>
									<?php
									wp_nav_menu( array(
										'theme_location'    => 'aprendawp_main_menu',
										'depth'             => 3,
										'container'         => 'div',
										'container_class'   => 'collapse navbar-collapse',
										'container_id'      => 'bs-example-navbar-collapse-1',
										'menu_class'        => 'nav navbar-nav',
										'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
										'walker'            => new WP_Bootstrap_Navwalker(),
									) );
									?>
							</nav>							
						</div>
					</div>
				</div>						
			</section>
		</header>