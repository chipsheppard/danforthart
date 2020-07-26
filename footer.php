<?php
/**
 * Site footer
 *
 * @package  danforthart
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

echo '</div>';

tha_footer_before();
echo '<footer id="colophon" class="site-footer" role="contentinfo">';
	tha_footer_top();
	tha_footer_bottom();
echo '</footer>';
tha_footer_after();

echo '</div>';
tha_body_bottom();
wp_footer();

echo '</body></html>';
