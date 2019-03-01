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

<div class="course-headers">
	<div class="col-1-6 first">Session  number + Dates</div>
	<div class="col-1-6">Instructor(s)</div>
	<div class="col-1-3">Grade level + Class name</div>
	<div class="col-1-6">Price</div>
	<div class="col-1-6 ta-center">Register <span>*</span></div>
	<div class="cf"></div>
</div>
<div class="course-rows-wrap">
	<?php
	$level = get_sub_field( 'c_level' );
	$season = get_sub_field( 'c_season' );
	if ( ! $level ) :
		$level = get_field( 'c_level' );
	endif;
	if ( ! $season ) :
		$season = get_field( 'c_season' );
	endif;
	// WP_Query arguments.
	$args = array(
		'post_type'              => array( 'course' ),
		'tax_query'              => array( // WPCS: slow query ok.
			array(
				'taxonomy'         => 'level',
				'terms'            => $level,
				'field'            => 'slug',
				'include_children' => true,
			),
			array(
				'taxonomy'         => 'level',
				'terms'            => 'vacation-week',
				'field'            => 'slug',
				'operator'         => 'NOT IN',
			),
			array(
				'taxonomy'         => 'season',
				'terms'            => $season,
				'field'            => 'slug',
			),
		),
	);

	// The Query.
	$query = new WP_Query( $args );

	// The Loop.
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$terms = get_the_terms( $post->ID, 'level' );
			if ( ! empty( $terms ) ) :
				$levels = array();
				$names = array();
				foreach ( $terms as $term ) {
					$levels[] = $term->slug;
					$names[] = $term->name;
				}
				$level_list = join( ' ', $levels );
				$name_list = join( ' ', $names );
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
			<div class="course-row<?php printf( ' %s', esc_html( $level_list ) ); ?><?php printf( ' %s', esc_html( $season_list ) ); ?>">
				<?php
				if ( get_field( 'course_alert' ) ) :
					$ca = ' ca';
					?>
					<div class="alert"><?php the_field( 'course_alert' ); ?></div>
				<?php endif; ?>
				<div class="row-top<?php echo esc_html( $ca ); ?>">
					<div class="col-1-6 first course-col fb">
						<?php if ( get_field( 'session_number' ) ) : ?>
							<div class="circle-num"><?php the_field( 'session_number' ); ?></div>
						<?php endif; ?>
						<div class="date"><?php the_field( 'date' ); ?></div>
					</div>
					<div class="col-1-6 course-col fb">
						<div class="instructors"><?php the_field( 'instructors' ); ?></div>
					</div>
					<div class="col-1-3 course-col">
						<div class="level"><?php printf( '%s', esc_html( $name_list ) ); ?></div>
						<div class="display-name"><span><?php the_field( 'display_name' ); ?></span></div>
					</div>
					<div class="col-1-6 course-col fb">
						<div class="price"><?php the_field( 'price' ); ?></div>
						<div class="control"><span class="opener cssicon-plusminus small plus"></span></div>
					</div>
					<div class="col-1-6 course-col fb">
						<?php
						$link = get_field( 'registration_link' );
						if ( $link ) :
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php else : ?>
							<a class="btn disabled" href="#0">Register</a>
						<?php endif; ?>
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
									$alt = $image['alt'];
									$caption = $image['caption'];
									$size = 'medium';
									$width = $image['sizes'][ $size . '-width' ];
									$height = $image['sizes'][ $size . '-height' ];
									$url = $image['sizes'][ $size ];
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
					</div><!-- / images -->
				</div>
			</div><!-- / course-row -->
		<?php } // endwhile. ?>
		<div id="no-results<?php printf( '-%s', esc_html( $season_list ) ); ?>"></div>
	<?php
	} else {
		echo '<div class="no-courses">No courses have been published for that criterea.</div>';
	}
	wp_reset_postdata();
	?>
</div><!-- /course-rows-wrap -->
