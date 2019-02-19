<?php
/**
 * Business Hours
 *
 * @package  danforthart
 * @subpackage danforthart/inc
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/*
 * Hours
 -----------------------------------------------------------------
 */

$day = date( 'l' );
$day_closed = null;
$opens = null;
$closes = null;

echo '<div class="open-hours">';

if ( have_rows( 'day', 'option' ) ) :
	while ( have_rows( 'day', 'option' ) ) :
		the_row();

		if ( ! get_sub_field( 'open', 'option' ) ) :
			$day_closed = get_sub_field( 'day_of_week', 'option' );
		endif;

		if ( get_sub_field( 'day_of_week', 'option' ) === $day ) :
			$opens = get_sub_field( 'open', 'option' );
			$closes = get_sub_field( 'close', 'option' );
		endif;

	endwhile;
endif;


// HEADING & TODAY's HOURS ===================.
if ( $day === $day_closed ) :
	echo '<h5><span>closed</span></h5>';
else :
	echo '<h5><span>open today</span></h5>';
	echo '<div class="open-time">' . esc_html( $opens ) . ' - ' . esc_html( $closes ) . '</div>';
endif;



// HOURS LISTING ===================.
if ( have_rows( 'day', 'option' ) ) :
	while ( have_rows( 'day', 'option' ) ) :
		the_row();

		echo '<div class="hours-row">';
		echo '<div class="col-1-2 first">';
		the_sub_field( 'day_of_week', 'option' );
		echo '</div>';
		echo '<div class="col-1-2">';
		if ( get_sub_field( 'open', 'option' ) ) :
			the_sub_field( 'open', 'option' );
			echo ' - ';
			the_sub_field( 'close', 'option' );
			echo '</div>';
		else :
			echo 'Closed</div>';
		endif;
		echo '</div>';
	endwhile;
endif;
echo '</div>';
