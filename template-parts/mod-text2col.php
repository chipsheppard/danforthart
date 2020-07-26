<?php
/**
 * 2 columnText block for the Modular template.
 *
 * @package    danforthart
 * @subpackage danforthart/template-parts
 * @author     Chip Sheppard
 * @since      1.0.0
 * @license    GPL-2.0+
 */

?>
<div class="col-7-8 silo mod-text2col">
	<div class="col-1-2 first pad-r">
		<?php the_sub_field( 'mod_text2col_col1' ); ?>
	</div>
	<div class="col-1-2 pad-l">
		<?php the_sub_field( 'mod_text2col_col2' ); ?>
	</div>
	<div class="cf"></div>
</div>
