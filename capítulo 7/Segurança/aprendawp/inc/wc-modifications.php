<?php 

function aprendawp_wc_modify(){

	add_action( 'woocommerce_before_main_content', 'aprendawp_open_container_row', 5 );
	function aprendawp_open_container_row(){
		?>
			<div class="container shop-content"><div class="row">
		<?php
	}

	add_action( 'woocommerce_after_main_content', 'aprendawp_close_container_row', 5 );
	function aprendawp_close_container_row(){
		?>
			</div></div>
		<?php
	}
		
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );

	if( is_shop() ){
		
		add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar', 7 );

		add_action( 'woocommerce_before_main_content', 'aprendawp_add_sidebar_tags', 6 );
		function aprendawp_add_sidebar_tags(){
			?>
				<div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-1">
			<?php
		}

		add_action( 'woocommerce_before_main_content', 'aprendawp_close_sidebar_tags', 8 );
		function aprendawp_close_sidebar_tags(){
			?>
				</div>
			<?php
		}

	}

	add_action( 'woocommerce_before_main_content', 'aprendawp_add_shop_tags', 9 );
	function aprendawp_add_shop_tags(){
		if( is_shop()){
			?>
				<div class="col-lg-9 col-md-8 order-1 order-md-2">
			<?php
		} else{
			?>
				<div class="col">
			<?php
		}
	}
	add_action( 'woocommerce_after_main_content', 'aprendawp_close_shop_tags', 4 );
	function aprendawp_close_shop_tags(){
		?>
			</div>
		<?php
	}

	if( ! is_front_page() ){
   		add_action( 'woocommerce_after_shop_loop_item_title', 'the_excerpt', 1 );
	}
	
}
add_action( 'wp', 'aprendawp_wc_modify' );