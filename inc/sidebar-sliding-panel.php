<?php if ( is_active_sidebar( 'sliding-panel' ) ) { ?>

	<div id="sliding-panel" class="show-if-js">

		<div class="sp-wrap">

			<div id="sidebar-sliding-panel" class="sidebar">

				<div class="sp-sidebar-wrap">
					<?php dynamic_sidebar( 'sliding-panel' ); ?>
				</div><!-- .sp-sidebar-wrap -->

			</div><!-- #sidebar-sliding-panel -->

			<div class="sp-toggle">
				<a href="#"></a>
			</div><!-- .sp-toggle -->

		</div><!-- .sp-wrap -->

	</div><!-- #sliding-panel -->

<?php } ?>