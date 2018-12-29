/**
 * Customizer JS
 *
 * @package  danforthart
 * @subpackage danforthart/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );


	// Color 1.
	wp.customize(
		'danforthart_settings[color_1]', function( value ) {
			value.bind(
				function( newval ) {
					$( 'body.color1, .site-navigation .color1 a:hover,.site-navigation .color1.current-menu-item > a,.site-navigation .color1.current-menu-ancestor > a' ).css( 'background-color', newval );
					$( '.site-navigation .color1 a' ).css( 'border-bottom-color', newval );
				}
			);
		}
	);

	// Color 2.
	wp.customize(
		'danforthart_settings[color_2]', function( value ) {
			value.bind(
				function( newval ) {
					$( 'body.color2, .site-navigation .color2 a:hover,.site-navigation .color2.current-menu-item > a,.site-navigation .color2.current-menu-ancestor > a' ).css( 'background-color', newval );
					$( '.site-navigation .color2 a' ).css( 'border-bottom-color', newval );
				}
			);
		}
	);

	// Color 3.
	wp.customize(
		'danforthart_settings[color_3]', function( value ) {
			value.bind(
				function( newval ) {
					$( 'body.color3, .site-navigation .color3 a:hover,.site-navigation .color3.current-menu-item > a,.site-navigation .color3.current-menu-ancestor > a' ).css( 'background-color', newval );
					$( '.site-navigation .color3 a' ).css( 'border-bottom-color', newval );
				}
			);
		}
	);

	// Color 4.
	wp.customize(
		'danforthart_settings[color_4]', function( value ) {
			value.bind(
				function( newval ) {
					$( 'body.color4, .site-navigation .color4 a:hover,.site-navigation .color4.current-menu-item > a,.site-navigation .color4.current-menu-ancestor > a' ).css( 'background-color', newval );
					$( '.site-navigation .color4 a' ).css( 'border-bottom-color', newval );
				}
			);
		}
	);

	// Color 5.
	wp.customize(
		'danforthart_settings[color_5]', function( value ) {
			value.bind(
				function( newval ) {
					$( 'body.color5, .site-navigation .color5 a:hover,.site-navigation .color5.current-menu-item > a,.site-navigation .color5.current-menu-ancestor > a' ).css( 'background-color', newval );
					$( '.site-navigation .color5 a' ).css( 'border-bottom-color', newval );
				}
			);
		}
	);

} )( jQuery );
