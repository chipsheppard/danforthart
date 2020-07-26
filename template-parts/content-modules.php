<?php
/**
 * Load the ACF flexible fields
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 */

while ( have_rows( 'content_modules' ) ) :
	the_row();

	switch ( get_row_layout() ) {

		case 'introblock':
			require 'mod-intro.php';
			break;

		case 'headlineblock':
			require 'mod-headline.php';
			break;

		case 'textblock':
			require 'mod-text.php';
			break;

		case 'text2colblock':
			require 'mod-text2col.php';
			break;

		case 'imageblock':
			require 'v-images.php';
			break;

		case 'textimageblock':
			require 'mod-textimage.php';
			break;

		case 'footnoteblock':
			require 'mod-footnote.php';
			break;

		case 'quoteblock':
			require 'mod-quote.php';
			break;

		case 'accordionblock':
			require 'mod-accordion.php';
			break;

		case 'calltoactionblock':
			require 'mod-cta.php';
			break;
	}

endwhile;
