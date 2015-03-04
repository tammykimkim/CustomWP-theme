<?php 
/**
*
* Theme Footer - footer.php
*
**/
?>
	<footer class="main-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="row">
						<div class="col-md-4">
							<?php 
							/**
							*
							* Footer Left Sidebar
							*
							**/
							
							if ( is_active_sidebar( 'footer-left-sidebar' ) ) : ?>
								<ul id="footer-left-sidebar">
									<?php dynamic_sidebar( 'footer-left-sidebar' ); ?>
								</ul>
								<?php 
							endif; ?>
						</div>
						<div class="col-md-4">
							<?php 
							/**
							*
							* Footer Middle Sidebar
							*
							**/
							
							if ( is_active_sidebar( 'footer-middle-sidebar' ) ) : ?>
								<ul id="footer-middle-sidebar">
									<?php dynamic_sidebar( 'footer-middle-sidebar' ); ?>
								</ul>
								<?php 
							endif; ?>
						</div>	
						<div class="col-md-4">
							<?php 
							/**
							*
							* Footer Right Sidebar
							*
							**/
							
							if ( is_active_sidebar( 'footer-right-sidebar' ) ) : ?>
								<ul id="footer-right-sidebar">
									<?php dynamic_sidebar( 'footer-right-sidebar' ); ?>
								</ul>
								<?php 
							endif; ?>
						</div>
					</div><!-- .row -->	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="site-info">
						<div class="row">
							<div class="col-md-6">
								<p class="pull-left"><?php _e( 'Theme by', 'mn_flow' ); ?> <a href="<?php echo esc_url( __( 'http://www.mateusneves.com', 'mn_flow' ) ); ?>" title="<?php esc_attr_e( 'MN Themes', 'mn_flow' ); ?>"><?php _e( 'MN Themes', 'mn_flow' ); ?></a></p>
							</div>
							<div class="col-md-6">
								<p class="pull-right"><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'mn_flow' ) ); ?>" title="<?php esc_attr_e( 'Publishing platform', 'mn_flow' ); ?>"><?php printf( __( 'Proudly powered by %s <span class="el-icon-wordpress"></span>', 'mn_flow' ), 'WordPress' ); ?></a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div><!-- .content-wrapp -->

<?php
/* Triggered funcion hook */
wp_footer(); ?>
</body>
</html>