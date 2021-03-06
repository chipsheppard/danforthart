<?php
/**
 * The template part for displaying Courses.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

?>

<div class="course-rows-wrap">
	<?php
	$level  = get_field( 'c_level' );
	$season = get_field( 'c_season' );
	if ( ! $level ) :
		$level = get_sub_field( 'c_level' );
	endif;
	if ( ! $season ) :
		$season = get_sub_field( 'c_season' );
	endif;
	// WP_Query arguments.
	$args = array(
		'post_type'      => array( 'course' ),
		'posts_per_page' => 100,
		'tax_query'      => array( // phpcs:ignore slow query ok.
			array(
				'taxonomy'         => 'level',
				'terms'            => $level,
				'field'            => 'slug',
				'include_children' => true,
			),
			array(
				'taxonomy'         => 'level',
				'terms'            => array( 'vacation-week' ),
				'field'            => 'slug',
				'include_children' => true,
			),
			array(
				'taxonomy' => 'season',
				'terms'    => $season,
				'field'    => 'slug',
			),
		),
	);

	// The Query.
	$query = new WP_Query( $args );

	// The Loop.
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$v_terms = get_the_terms( $post->ID, 'level' );
			if ( ! empty( $v_terms ) ) :
				$v_term      = $v_terms[0];
				$v_term_slug = $v_term->slug;
				$v_term_name = $v_term->name;
			endif;

			$seasons = get_the_terms( $post->ID, 'season' );
			if ( ! empty( $seasons ) ) :
				$sns = array();
				foreach ( $seasons as $season ) {
					$sns[] = $season->slug;
				}
				$season_list = join( ' ', $sns );
			endif;

			?>
			<div class="course-row<?php printf( ' %s', esc_html( $term_slug ) ); ?><?php printf( ' %s', esc_html( $season_list ) ); ?>">
				<div class="inner-wrap">
				<div class="course-row-innerwrap">
				<?php
				if ( get_field( 'course_alert' ) ) :
					$ca = ' ca';
					?>
					<div class="alert"><?php the_field( 'course_alert' ); ?></div>
				<?php endif; ?>
				<div class="row-top<?php echo esc_html( $ca ); ?>">
					<div class="col-1-4 first course-col fb">
						<?php if ( get_field( 'session_number' ) ) : ?>
							<div class="circle-num"><?php the_field( 'session_number' ); ?></div>
						<?php endif; ?>
						<div class="date"><?php the_field( 'date' ); ?></div>
					</div>
					<div class="col-1-6 course-col fb">
						<div class="instructors"><?php the_field( 'instructors' ); ?></div>
					</div>
					<div class="col-1-4 course-col fb">
						<div class="display-name"><span class="opener2"><?php the_field( 'display_name' ); ?></span></div>
					</div>
					<div class="col-1-12 course-col fb">
						<div class="control"><span class="opener cssicon-plusminus small plus"></span></div>
					</div>
					<div class="col-1-6 course-col fb">
						<div class="level"><?php printf( '%s', esc_html( $v_term_name ) ); ?></div>
					</div>
					<div class="col-1-12 course-col fb">
						<div class="price"><?php the_field( 'price' ); ?></div>
					</div>
					<div class="cf"></div>
				</div>

				<div class="row-bottom">
					<div class="col-1-6 first course-col fb">
						<div class="sessions">
						<strong><?php the_field( 'sessions_amount' ); ?><?php if ( get_field( 'session_range' ) ) : ?>
							<?php
							echo ',</strong> ';
							the_field( 'session_range' );
							else :
								echo '</strong>';
							endif;
							?>
						</div>
						<div class="session-note"><?php the_field( 'session_note' ); ?></div>
					</div>
					<div class="col-1-6 course-col fb">
						<div class="other-courses"><?php the_field( 'other_courses' ); ?></div>
					</div>
					<div class="col-1-2 course-col">
						<?php the_content(); ?>
					</div>
					<div class="col-1-6 course-col">
					</div>
					<div class="cf"></div>

					<div class="course-images">
					<?php
					if ( have_rows( 'images' ) ) :
						while ( have_rows( 'images' ) ) :
							the_row();
							?>
							<div class="c-image col-1-3">
								<?php
								$image = get_sub_field( 'image' );
								if ( ! empty( $image ) ) :
									$alt     = $image['alt'];
									$caption = $image['caption'];
									$size    = 'medium';
									$width   = $image['sizes'][ $size . '-width' ];
									$height  = $image['sizes'][ $size . '-height' ];
									$url     = $image['sizes'][ $size ];
									?>
									<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
									<?php if ( $caption ) : ?>
										<div class="image-caption"><span><?php echo esc_html( $caption ); ?></span></div>
										<?php
									endif;
								endif;
								?>
							</div>
							<?php
						endwhile;
					endif;
					?>
					<div class="cf"></div>
					</div>
				</div>
			</div>
			</div>
			</div>
			<?php
		} // endwhile.
	} else {
		echo '<div class="inner-wrap no-courses">No courses have been published for that criterea.</div>';
	}
	wp_reset_postdata();
	?>
</div><!-- /course-rows-wrap -->
