<?php
/**
 * Template part for ACF PAGES
 *
 * @package  danforthart
 * @subpackage danforthart/template-parts
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
tha_entry_top();
echo '<div class="entry-content">';
tha_entry_content_before();
tha_entry_content_after();
echo '</div>';
tha_entry_bottom();
?>
</article>
