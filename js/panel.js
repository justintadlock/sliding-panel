jQuery( document ).ready(
	function () {

		jQuery( '.show-if-js' ).show();

		jQuery( '#sliding-panel .sp-toggle a' ).text( sp_l10n.open );
		jQuery( '#sliding-panel .sp-toggle a' ).attr( 'aria-selected', 'false' );

		jQuery( '#sliding-panel .sp-toggle a' ).click(
			function( j ) {

				j.preventDefault();

				jQuery( this ).parents( '#sliding-panel' ).find( '.sidebar' ).slideToggle(
					'slow',
					function() {

						if ( jQuery( this ).is( ':visible' ) ) {
							jQuery( '#sliding-panel .sp-toggle a' ).text( sp_l10n.close );
							jQuery( '#sliding-panel .sp-toggle a' ).attr( 'aria-selected', 'true' );
						}

						else {
							jQuery( '#sliding-panel .sp-toggle a' ).text( sp_l10n.open );
							jQuery( '#sliding-panel .sp-toggle a' ).attr( 'aria-selected', 'false' );
						}
					}
				);
			}
		);
	}
);