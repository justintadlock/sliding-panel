<?php if ( is_active_sidebar( 'sliding-panel' ) ) { ?>

	<aside id="sidebar-sliding-panel" class="sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

		<div class="sp-wrap">

			<div class="sp-content">

				<div class="sp-content-wrap">
					<?php dynamic_sidebar( 'sliding-panel' ); ?>
				</div><!-- .sp-content-wrap -->

			</div><!-- .sp-content -->

			<div class="sp-toggle">
				<a href="#"></a>
			</div><!-- .sp-toggle -->

		</div><!-- .sp-wrap -->

	</aside><!-- #sliding-panel -->

<?php } ?>