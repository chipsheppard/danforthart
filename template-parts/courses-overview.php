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
	// Season, K-8.
	$level  = get_sub_field( 'c_level' );
	$ls     = $level->slug;
	$season = get_sub_field( 'c_season' );
	$ss     = $season->slug;

	// WP_Query arguments.
	$args = array(
		'post_type'      => array( 'course' ),
		'posts_per_page' => 100,
		'tax_query'      => array( // phpcs:ignore slow query ok.
			array(
				'taxonomy' => 'level',
				'terms'    => $level,
				'field'    => 'slug',
			),
			array(
				'taxonomy' => 'level',
				'terms'    => 'vacation-week',
				'field'    => 'slug',
				'operator' => 'NOT IN',
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
			?>
			<div class="course-row">
				<div class="inner-wrap">
				<div class="course-row-innerwrap">
				<div class="row-top">
					<div class="col-1-5 first course-col fb">
						<?php if ( get_field( 'session_number' ) ) : ?>
							<div class="circle-num"><?php the_field( 'session_number' ); ?></div>
						<?php endif; ?>
						<div class="date"><?php the_field( 'date' ); ?></div>
					</div>
					<div class="col-1-5 course-col fb">
						<div class="instructors"><?php the_field( 'instructors' ); ?></div>
					</div>
					<div class="col-2-5 course-col fb">
						<div class="display-name">
							<?php
							$c_link = get_field( 'registration_link', 'option' );
							if ( $c_link ) :
								$c_link_url    = $c_link['url'];
								$c_link_title  = $c_link['title'];
								$c_link_target = $c_link['target'] ? $c_link['target'] : '_self';
								?>
								<a href="<?php echo esc_url( $c_link_url ); ?>" target="<?php echo esc_attr( $c_link_target ); ?>"><?php the_field( 'display_name' ); ?></a>
							<?php else : ?>
								<span><?php the_field( 'display_name' ); ?></span>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-1-5 course-col fb">
						<div class="level-o fb"><?php $c_terms = get_the_terms( $post->ID, 'level' ); ?>
			<?php
			if ( ! empty( $c_terms ) ) :
				$levels = array();
				foreach ( $c_terms as $c_term ) {
					$levels[] = $c_term->name;
				}
				$level_list = join( ', ', $levels );
				printf( '%s', esc_html( $level_list ) );
			endif;
			?>
</div>
						<div class="price-o fb"><?php the_field( 'price' ); ?></div>
					</div>
					<div class="cf"></div>
				</div>
				</div>
				</div>

			</div><!-- / course-row -->
			<?php
		} // endwhile.
	} else {
		echo '<div class="no-results">No courses have been published for that criterea.</div>';
	}
	wp_reset_postdata();
	?>
</div><!-- /course-rows-wrap -->
