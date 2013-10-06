jQuery( document ).ready(
	function () {

		jQuery( '#sidebar-sliding-panel' ).show();
		jQuery( '.sp-toggle a' ).text( sp_l10n.open );
		jQuery( '.sp-toggle a' ).attr( 'aria-selected', 'false' );

		jQuery( '.sp-toggle a' ).click(
			function( j ) {

				j.preventDefault();

				jQuery( this ).parents( '#sidebar-sliding-panel' ).find( '.sp-content' ).slideToggle(
					'slow',
					function() {

						if ( jQuery( this ).is( ':visible' ) ) {
							jQuery( '.sp-toggle a' ).text( sp_l10n.close );
							jQuery( '.sp-toggle a' ).attr( 'aria-selected', 'true' );
						}

						else {
							jQuery( '.sp-toggle a' ).text( sp_l10n.open );
							jQuery( '.sp-toggle a' ).attr( 'aria-selected', 'false' );
						}
					}
				);
			}
		);
	}
);