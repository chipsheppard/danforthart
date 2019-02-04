<?php
/**
 * The template for displaying the Learn Create page.
 *
 * Template Name: Learn Create
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'learncreate learn' ) );
} );

/**
 * Learn Create page functions
 */
function da_learn() {
?>
	<div class="inner-wrap">
		<div class="sub-navigation">
			<?php
			wp_nav_menu( array(
				'menu' => 'learn-sub',
			) );
			?>
		</div>
	</div>


	<div class="inner-wrap">
		<h1 class="page-title">
			<?php the_field( 'page_title' ); ?>
		</h1>
	</div>


	<div class="content-wrap">
		<div class="inner-wrap">
			<div class="mid-block">
				<div class="col-1-2 nm mid-left">
					<div class="imageblock">
						<div class="card-title"><?php the_field( 'quote_tab_text' ); ?></div>
						<?php
						$image = get_field( 'quote_image' );
						if ( ! empty( $image ) ) :
							$url = $image['url'];
							$alt = $image['alt'];
							$size = 'medium_large';
							$width = $image['sizes'][ $size . '-width' ];
							$height = $image['sizes'][ $size . '-height' ];
							?>
							<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
						<?php endif; ?>
					</div>
					<div class="textblock">
						<div class="message"><?php the_field( 'course_text' ); ?></div>
					</div>
				</div>
				<div class="col-1-2 nm mid-right">
					<div class="textblock">
						<?php if ( get_field( 'quote' ) ) : ?>
						<blockquote>
							<?php the_field( 'quote' ); ?>
							<cite>
	<?php
	the_field( 'quote_citation' );
	$link = get_field( 'citation_link' );
	if ( $link ) :
		$link_url = $link['url'];
		$link_title = $link['title'];
		$link_target = $link['target'] ? $link['target'] : '_self';
		?>
		&mdash;<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
	<?php endif; ?>
							</cite>
						</blockquote>
					<?php endif; ?>
					</div>
					<div class="imageblock">
						<?php
						$image = get_field( 'course_image' );
						if ( ! empty( $image ) ) :
							$url = $image['url'];
							$alt = $image['alt'];
							$size = 'medium_large';
							$width = $image['sizes'][ $size . '-width' ];
							$height = $image['sizes'][ $size . '-height' ];
							?>
							<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
						<?php endif; ?>
						<div class="card-title"><?php the_field( 'course_tab_text' ); ?></div>
					</div>
				</div>
				<div class="cf"></div>
			</div>
		</div><!-- /mid-block -->

		<div class="inner-wrap">

			<div class="courses-intro">
				<?php the_field( 'courses_intro' ); ?>
			</div>

			<div class="course-rows-wrap">
				<div class="course-headers">
					<div class="col-1-6 first">Session  number + Dates</div>
					<div class="col-1-6">Instructor(s)</div>
					<div class="col-1-3">Grade level + Class name</div>
					<div class="col-1-6">Price</div>
					<div class="col-1-6">Register <span>*</span></div>
					<div class="cf"></div>
				</div>
				<?php
				$args = array(
					'post_type'  => array( 'course' ),
					'tax_query' => array( // WPCS: slow query ok.
						array(
							'taxonomy' => 'season',
							'field' => 'slug',
							'terms' => 'summer',
						),
					),
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) :
						$query->the_post();
						?>

						<div class="course-row">
							<div class="row-top">
								<div class="col-1-6 first course-col">
									<?php if ( get_field( 'session_number' ) ) : ?>
										<div class="session-num"><?php the_field( 'session_number' ); ?></div>
									<?php endif; ?>
									<div class="date"><?php the_field( 'date' ); ?></div>
								</div>
								<div class="col-1-6 course-col">
									<div class="instructors"><?php the_field( 'instructors' ); ?></div>
								</div>
								<div class="col-1-3 course-col">
									<div class="level">
									<?php
									$terms = get_the_terms( $post->ID, 'level' );
									if ( ! empty( $terms ) ) :
										$levels = array();
										foreach ( $terms as $term ) {
											$levels[] = $term->name;
										}
										$level_list = join( ', ', $levels );
										printf( '%s', esc_html( $level_list ) );
									endif;
									?>
									</div>
									<div class="display-name"><span><?php the_field( 'display_name' ); ?></span></div>
								</div>
								<div class="col-1-6 course-col">
									<div class="price"><?php the_field( 'price' ); ?></div>
									<div class="control"><span class="cssicon-plusminus small plus"></span></div>
								</div>
								<div class="col-1-6 course-col">
									<?php
									$link = get_field( 'registration_link' );
									if ( $link ) :
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>
								</div>
								<div class="cf"></div>
							</div>

							<div class="row-bottom">
								<div class="col-1-6 first course-col">
									<div class="sessions">
									<strong><?php the_field( 'sessions_amount' ); ?> sessions<?php if ( get_field( 'session_range' ) ) : ?>
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
								<div class="col-1-6 course-col">
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
												$url = $image['url'];
												$alt = $image['alt'];
												$caption = $image['caption'];
												$size = 'medium';
												$width = $image['sizes'][ $size . '-width' ];
												$height = $image['sizes'][ $size . '-height' ];
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

					<?php
					endwhile;
				else :
					echo 'no posts';
				endif;
				wp_reset_postdata();
				?>
			</div><!-- /curse-rows-wrap -->




			<div class="lower-block">
				<div class="lb-title">
					<h2><?php the_field( 'lb_title' ); ?></h2>
				</div>

				<div class="col-1-3 first lb-left">
					<?php
					$image = get_field( 'lb_image' );
					if ( ! empty( $image ) ) :
						$url = $image['url'];
						$alt = $image['alt'];
						$caption = $image['caption'];
						$size = 'medium';
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];
						?>
						<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
						<?php if ( $caption ) : ?>
							<div class="card-title"><?php echo esc_html( $caption ); ?></div>
						<?php
						else :
							echo '&nbsp;';
						endif;
					endif;
					?>
				</div>
				<div class="col-2-3 lb-right">
					<?php
					if ( have_rows( 'lb_accordion' ) ) :
						while ( have_rows( 'lb_accordion' ) ) :
							the_row();
							?>
							<div class="accordion col-2-3 silo">
								<div class="actop">
									<div class="acc-title">
										<?php the_sub_field( 'title' ); ?>
									</div>
									<div class="acc-button">
										<span class="cssicon-plusminus small plus"></span>
									</div>
									<div class="cf"></div>
								</div>
								<div class="acbot">
									<?php the_sub_field( 'text' ); ?>
								</div>
							</div>
							<?php
						endwhile;
					endif;
					?>
				</div>
				<div class="cf"></div>

			</div><!-- /lower-block-->

			<?php get_template_part( 'template-parts/call-to-action' ); ?>

		</div><!-- /inner-wrap -->
	</div><!-- /content-wrap -->


<?php
}
add_action( 'tha_entry_content_before', 'da_learn' );



// Build the page.
get_template_part( 'index' );
