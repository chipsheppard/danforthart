<?php
/**
 * Custom Background Color Meta Box.
 *
 * @package  danforthart
 * @subpackage danforthart/inc
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 *
 * @link https://generatewp.com/how-to-add-custom-post-colors-with-the-metabox-generators/
 */

/**
 * The Class.
 */
class Bgcolor_Metabox {

	/**
	 * Cconstructor.
	 */
	public function __construct() {
		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}
	}

	/**
	 * Initate stuff.
	 */
	public function init_metabox() {
		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' ) );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts_styles' ) );
		add_action( 'admin_footer',          array( $this, 'color_field_js' ) );
	}

	/**
	 * Add metabox.
	 *
	 * @param Array $post_type the post type of this post.
	 */
	public function add_metabox( $post_type ) {
		// Limit meta box to certain post types.
		$post_types = array( 'post', 'page' );
		if ( in_array( $post_type, $post_types, true ) ) {
			add_meta_box(
				'bgcolor-metabox',
				__( 'Background Color', 'danforthart' ),
				array( $this, 'render_metabox' ),
				$post_type,
				'side',
				'high'
			);
		}
	}

	/**
	 * Render metabox.
	 *
	 * @param WP_Post $post The post object.
	 */
	public function render_metabox( $post ) {

		// Add nonce for security and authentication.
		wp_nonce_field( 'bgcolor_nonce_action', 'bgcolor_nonce' );

		// Retrieve an existing value from the database.
		$bgcolor_color = get_post_meta( $post->ID, 'bgcolor_color', true );

		// Set default values.
		if ( empty( $bgcolor_color ) ) {
			$bgcolor_color = '#ffffff';
		}

		// Form fields.
		echo '<label for="bgcolor_color">';
		echo '<input type="text" id="bgcolor_color" name="bgcolor_color" class="bgcolor_color_field" placeholder="' . esc_attr__( '#ffffff', 'danforthart' ) . '" value="' . esc_attr( $bgcolor_color ) . '">';
		echo '<p>' . esc_html__( 'Select a background color', 'danforthart' ) . '</p>';
		echo '</label>';

	}


	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int     $post_id The ID of the post being saved.
	 * @param WP_Post $post    The post object.
	 */
	public function save_metabox( $post_id, $post ) {
		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 *  and   KILL this function !!!!
		 */
		if ( ! isset( $_POST['bgcolor_nonce'] )
		|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bgcolor_nonce'] ) ), 'bgcolor_nonce_action' ) ) {

			return $post_id;

		} else {

			// Add nonce for security and authentication.
			$nonce_name   = isset( $_POST['bgcolor_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['bgcolor_nonce'] ) ) : '';
			$nonce_action = 'bgcolor_nonce_action';

			// Check if a nonce is set.
			if ( ! isset( $nonce_name ) ) {
				return;
			}

			// Check if a nonce is valid.
			if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) {
				return;
			}

			// Check if the user has permissions to save data.
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}

			// Check if it's not an autosave.
			if ( wp_is_post_autosave( $post_id ) ) {
				return;
			}

			// Check if it's not a revision.
			if ( wp_is_post_revision( $post_id ) ) {
				return;
			}

			// Sanitize user input.
			$bgcolor_new_color = isset( $_POST['bgcolor_color'] ) ? sanitize_text_field( wp_unslash( $_POST['bgcolor_color'] ) ) : '';

			// Update the meta field in the database.
			update_post_meta( $post_id, 'bgcolor_color', $bgcolor_new_color );

		}
	}

	/**
	 * Enqueue all the WP Color-Picker things.
	 */
	public function load_scripts_styles() {
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );
	}

	/**
	 * Write the JavaScript.
	 */
	public function color_field_js() {
		// Print js only once per page.
		if ( did_action( 'post_colors_metabox_color_picker_js' ) >= 1 ) {
			return;
		}
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('#bgcolor_color').wpColorPicker( {
					palettes: ['#000000', '#f1a676', '#93ddce', '#f6d06d', '#edd6b9', '#9ed4ef', '#afc2e3']
				} );
			});
		</script>
		<?php
		do_action( 'post_colors_metabox_color_picker_js', $this );
	}

}

new Bgcolor_Metabox();
