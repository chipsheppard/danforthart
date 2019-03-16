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

$date = date_create();
date_sub( $date, date_interval_create_from_date_string( '5 hours' ) );
$day = date_format( $date, 'l' );

// $day = date( 'l' );
$day_closed = null;
$opens = null;
$closes = null;

echo '<div class="open-hours">';

if ( have_rows( 'day', 'option' ) ) :
	while ( have_rows( 'day', 'option' ) ) :
		the_row();

		$weekday = get_sub_field( 'day_of_week', 'option' );

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
	echo '<h5><span>Museum closed</span></h5>';
else :
	echo '<h5><span>Museum open today</span></h5>';
	echo '<div class="open-time">' . esc_html( $opens ) . ' - ' . esc_html( $closes ) . '</div>';
endif;



// HOURS LISTING ===================.
if ( have_rows( 'day', 'option' ) ) :
	$isday = 0;
	$isopen = 0;
	$isclosed = 0;
	$firstday = 0;
	$c = 0;
	while ( have_rows( 'day', 'option' ) ) :
		the_row();

		echo '<div class="hours-row">';

		$myday = get_sub_field( 'day_of_week', 'option' );
		$myopen = get_sub_field( 'open', 'option' );
		$myclose = get_sub_field( 'close', 'option' );

		if ( 0 === $isopen || 0 === $isclosed ) :
			$isday = $myday;
			$isopen = $myopen;
			$isclosed = $myclose;
		else :
			if ( $myopen === $isopen && $myclose === $isclosed ) :
				if ( 0 === $c ) :
					$firstday = $isday;
				endif;
				$c++;
				$isday = $myday;
				$isopen = $myopen;
				$isclosed = $myclose;
			else :
				$c = 0;
				echo '<div class="col-1-2 first">';
				if ( 0 !== $firstday ) :
					echo esc_html( $firstday ) . ' - ';
					$firstday = 0;
				endif;
				echo esc_html( $isday );
				echo '</div>';
				echo '<div class="col-1-2">';
				if ( $isopen ) :
					echo esc_html( $isopen );
					echo ' - ';
					echo esc_html( $isclosed );
					echo '</div>';
				else :
					echo 'Closed</div>';
				endif;
				$isday = $myday;
				$isopen = $myopen;
				$isclosed = $myclose;
			endif;
		endif;
		echo '</div>'; // hours-row.
	endwhile;
endif;
echo '</div>'; // open-hours.
