<?php
/**
 * The template for displaying the Team page.
 *
 * Template Name: Team
 *
 * @package    danforthart
 * @subpackage danforthart/templates
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

add_filter(
	'body_class',
	function( $classes ) {
		return array_merge( $classes, array( 'meet team' ) );
	}
);

/**
 * Team page functions
 */
function da_team() {
	?>
<div class="inner-wrap">
	<div class="sub-navigation">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'meet',
				'menu_id'        => 'meet-menu',
				'container'      => '',
			)
		);
		?>
	</div>
</div>

<div class="inner-wrap">
	<h1 class="page-title">
		<?php the_field( 'page_title' ); ?>
	</h1>
</div>

<div class="inner-wrap">
	<div class="top-members">
		<?php
		if ( have_rows( 'top_teams' ) ) :
			while ( have_rows( 'top_teams' ) ) :
				the_row();
				?>
				<div class="mem-row">
					<?php
					if ( have_rows( 'member' ) ) :
						$c = 0;
						while ( have_rows( 'member' ) ) :
							the_row();
							$c++;
							?>
							<div class="member mt<?php echo esc_html( $c ); ?> col-1-4<?php if ( 1 === $c ) : ?>
								<?php
								echo ' first';
								endif;
													?>
" data-team="mem<?php echo esc_html( $c ); ?>">
								<a name="<?php the_sub_field( 'page_target' ); ?>"></a>
								<div class="mem-card">
									<div class="m-image">
										<?php
										$image = get_sub_field( 't_image' );
										if ( ! empty( $image ) ) :
											$alt    = $image['alt'];
											$size   = 'medium_large';
											$width  = $image['sizes'][ $size . '-width' ];
											$height = $image['sizes'][ $size . '-height' ];
											$url    = $image['sizes'][ $size ];
											?>
											<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
										<?php else : ?>
											<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/t0.jpg' ); ?>" alt="Team Member" width="400" height="230" />
										<?php endif; ?>
									</div>
									<div class="m-name"><?php the_sub_field( 'name' ); ?></div>
									<div class="m-title"><?php the_sub_field( 'job_title' ); ?></div>
								</div>
								<div class="mem-content-mobile">
									<div class="col-1-3 first col-left"><?php the_sub_field( 'left_col' ); ?></div>
									<div class="col-2-3 col-right"><?php the_sub_field( 'right_col' ); ?></div>
									<div class="cf"></div>
								</div>
							</div>
							<?php
						endwhile;
					endif;
					?>
					<div class="cf"></div>

					<?php
					if ( have_rows( 'member' ) ) :
						$c = 0;
						while ( have_rows( 'member' ) ) :
							the_row();
							$c++;
							?>
							<div class="mem-content-desk mem<?php echo esc_html( $c ); ?>">
								<div class="col-1-3 first col-left">
									<?php
									if ( get_sub_field( 'left_col' ) ) :
										the_sub_field( 'left_col' );
									else :
										echo '&nbsp;';
									endif;
									?>
								</div>
								<div class="col-2-3 col-right"><?php the_sub_field( 'right_col' ); ?></div>
								<div class="cf"></div>
							</div>
							<?php
						endwhile;
					endif;
					?>
				</div><!-- /row -->
				<?php
			endwhile;
		endif;
		?>
	</div><!-- /top -->
</div>


<div class="content-wrap">
	<div class="inner-wrap">

		<?php get_template_part( 'template-parts/fullwidth-quote' ); ?>

		<div class="bottom-members">
			<a name="<?php the_sub_field( 'page_target' ); ?>"></a>
			<?php
			if ( have_rows( 'bottom_teams' ) ) :
				while ( have_rows( 'bottom_teams' ) ) :
					the_row();
					?>
					<div class="mem-row">
						<?php
						if ( have_rows( 'b_member' ) ) :
							$c = 0;
							while ( have_rows( 'b_member' ) ) :
								the_row();
								$c++;
								?>
								<div class="member mt<?php echo esc_html( $c ); ?> col-1-4<?php if ( 1 === $c ) : ?>
									<?php
									echo ' first';
									endif;
														?>
" data-team="mem<?php echo esc_html( $c ); ?>">
									<a name="<?php the_sub_field( 'page_target' ); ?>"></a>
									<div class="mem-card">
										<div class="m-image">
											<?php
											$image = get_sub_field( 'image' );
											if ( ! empty( $image ) ) :
												$alt    = $image['alt'];
												$size   = 'medium_large';
												$width  = $image['sizes'][ $size . '-width' ];
												$height = $image['sizes'][ $size . '-height' ];
												$url    = $image['sizes'][ $size ];
												?>
												<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
											<?php else : ?>
												<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/t0.jpg' ); ?>" alt="Team Member" width="400" height="230" />
											<?php endif; ?>
										</div>
										<div class="m-name"><?php the_sub_field( 'name' ); ?></div>
									</div>
									<div class="mem-content-mobile">
										<div class="col-1-3 first col-left"><?php the_sub_field( 'left_col' ); ?></div>
										<div class="col-2-3 col-right"><?php the_sub_field( 'right_col' ); ?></div>
										<div class="cf"></div>
									</div>
								</div>
								<?php
							endwhile;
						endif;
						?>
						<div class="cf"></div>

						<?php
						if ( have_rows( 'b_member' ) ) :
							$c = 0;
							while ( have_rows( 'b_member' ) ) :
								the_row();
								$c++;
								?>
								<div class="mem-content-desk mem<?php echo esc_html( $c ); ?>">
									<div class="col-1-3 first col-left">
										<?php
										if ( get_sub_field( 'left_col' ) ) :
											the_sub_field( 'left_col' );
										else :
											echo '&nbsp;';
										endif;
										?>
									</div>
									<div class="col-2-3 col-right"><?php the_sub_field( 'right_col' ); ?></div>
									<div class="cf"></div>
								</div>
								<?php
							endwhile;
						endif;
						?>
					</div><!-- /row -->
					<?php
				endwhile;
			endif;
			?>
		</div><!-- /top -->

		<?php get_template_part( 'template-parts/call-to-action' ); ?>

	</div><!-- /inner-wrap -->
</div><!-- /content-wrap -->

	<?php
}
add_action( 'tha_entry_content_before', 'da_team' );



// Build the page.
get_template_part( 'index' );
