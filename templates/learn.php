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

			<div class="course-blocks">
			<?php
			if ( have_rows( 'course_box' ) ) :
				while ( have_rows( 'course_box' ) ) :
					the_row();
					$lcl = get_sub_field( 'c_level' );
					$boxlevel = $lcl->name;
					?>
					<div class="course-overview-box<?php if ( get_sub_field( 'highlight_color' ) ) : ?>
<?php
echo ' ';
the_sub_field( 'highlight_color' );
endif;
?>
">
						<div class="box-top">
							<div class="col-1-2 first c-title">
								<div class="title-text"><?php the_sub_field( 'box_title' ); ?></div>
								<div class="trigger cssicon-plusminus plus"></div>
							</div>
							<div class="col-1-4 c-level"><?php echo 'Grades: ' . esc_html( $boxlevel ); ?></div>
							<div class="col-1-4 c-button">
							<?php
							$link = get_sub_field( 'box_link' );
							if ( $link ) :
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
							</div>
							<div class="cf"></div>
							<div class="c-intro">
								<?php the_sub_field( 'box_intro' ); ?>
							</div>
						</div>
						<div class="box-bottom">
							<div class="col-3-5 first c-text">
								<?php the_sub_field( 'box_text' ); ?>
							</div>
							<div class="cf"></div>
							<div class="c-list-header">
								<span><?php the_sub_field( 'list_header' ); ?></span>
							</div>



							<?php get_template_part( 'template-parts/courses-overview' ); ?>



							<?php if ( have_rows( 'vaca_block' ) ) : ?>
							<div class="vaca-blocks">
								<?php
								while ( have_rows( 'vaca_block' ) ) :
									the_row();
								?>
								<div class="col-1-2 nm vaca-block">
									<div class="vaca-title"><span><?php the_sub_field( 'vaca_title' ); ?></span></div>
									<div class="vaca-text"><?php the_sub_field( 'vaca_text' ); ?></div>
									<div class="vaca-dates">
										<?php
										if ( have_rows( 'vaca_dates' ) ) :
											while ( have_rows( 'vaca_dates' ) ) :
												the_row();
											?>
											<div class="vd-date"><?php the_sub_field( 'v_date' ); ?></div>
											<div class="vd-price"><?php the_sub_field( 'v_price' ); ?></div>
											<?php
											endwhile;
										endif;
										?>
										<div class="cf"></div>
									</div>
									<div class="vaca-btn">
										<?php
										$v_link = get_sub_field( 'vaca_btn' );
										if ( $v_link ) :
											$url = $v_link['url'];
											$title = $v_link['title'];
											$target = $v_link['target'] ? $v_link['target'] : '_self';
											?>
											<a class="btn" href="<?php echo esc_url( $url ); ?>" target="<?php echo esc_attr( $target ); ?>"><?php echo esc_html( $title ); ?></a>
										<?php endif; ?>
									</div>
									<div class="vaca-ps"><?php the_sub_field( 'vaca_ps' ); ?></div>
								</div>
								<?php endwhile; ?>
							<div class="cf"></div>
							</div><!-- /vaca-blocks -->
							<?php endif; ?>
							<div class="box-close">Close <span class="cssicon-plusminus minus"></span></div>
						</div><!-- /box-bottom -->
					</div><!-- /course-box -->
					<?php
				endwhile;
			endif;
			?>
			</div><!-- /course-blocks -->


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
