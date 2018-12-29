<?php
/**
 * Template part for the Homepage content area
 *
 * @package  danforthart
 * @subpackage danforthart/template-parts
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

echo '<article id="post-' . get_the_ID() . '" class="' . join( ' ', get_post_class() ) . '">'; // WPCS: XSS OK.

tha_entry_top();

echo '<div class="entry-content">';

tha_entry_content_before();

echo '<div class="hero-wrap">';
echo '<div class="heroslider">';
echo '<div class="sl"><span class="progbar"></span><img src="/wp-content/uploads/2018/12/slide1.jpg" alt=""></div>';
echo '<div class="sl"><span class="progbar"></span><img src="/wp-content/uploads/2018/12/slide2.jpg" alt=""></div>';
echo '<div class="sl"><span class="progbar"></span><img src="/wp-content/uploads/2018/12/slide3.jpg" alt=""></div>';
echo '</div>';

echo '<div class="hero-callout">';
echo '<div class="link"><a href="#">See Art</a></div>';
echo '<div class="date">Till Mar. 17</div>';
echo '<div class="text">Featured exhibition here lorem ipsum dolor sit amet consector.</div>';
echo '</div>';
echo '</div>';

the_content();



tha_entry_content_after();

echo '</div>';

tha_entry_bottom();

echo '</article>';
