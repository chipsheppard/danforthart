=== Danforth Art WordPress Theme ===

Contributors: chipsheppard
Tags: translation-ready, theme-options, full-width-template, custom-logo, custom-colors, custom-background, flexible-header, grid-layout, align-wide, block-styles
Requires at least: 4.0
Tested up to: 5.2.2
Stable tag: 1.5.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==
danforthart is a basic but flexible starter theme for WordPress 5.0.

2 Widget Areas
  - Post Sidebar
  - Footer

2 Supported Post Formats
  - Aside
  - Status

= Theme Hook Alliance =

34 Theme Action Hooks for developers following the standard set by the Theme Hook Alliance (THA)
https://github.com/zamoose/themehookalliance

  Header:
  - tha_html_before()
  - tha_head_top()
  - tha_head_bottom()
  - tha_body_top()
  - tha_header_before()
  - tha_header_top()
  - tha_header_bottom()
  - tha_header_after()

  Index:
  - tha_content_before()
  - tha_content_wrap_before()
  - tha_content_top()
  - tha_content_loop()
  - tha_content_bottom()
  - tha_content_wrap_after()
  - tha_content_after()

  Loop:
  - tha_content_while_before()
  - tha_entry_before()
  - tha_entry_after()
  - tha_content_while_after()

  Content:
  - tha_entry_top()
  - tha_entry_content_before()
  - tha_entry_content_after()
  - tha_entry_bottom()

  Comments:
  - tha_comments_before()
  - tha_comments_after()

  Sidebar:
  - tha_sidebars_before()
  - tha_sidebar_top()
  - tha_sidebar_bottom()
  - tha_sidebars_after()

  Footer:
  - tha_footer_before()
  - tha_footer_top()
  - tha_footer_bottom()
  - tha_footer_after()
  - tha_body_bottom()

= Utility Classes =

class="mobile-only" : Displays on small viewports, hidden on large viewports.
class="desktop-only" : Displays on large viewports, hidden on small viewports.
class="ta-center" : Text align center.
class="ta-right" : Text align right.
class="fwn" : Font weight normal.
class="fwl" : Font weight light;
class="to-left" : Position element (opening hang quote) slightly to the left, outside the container.
class="right-dq" : A fancy double right quote. You could also just use the HTML special character &rdquo;
class="red" : Text color red
class="grn" : Text color green
class="blu" : Text color blue
class="pur" : Text color purple
class="big" : Font size -> 125%
class="intro" : Light font, size = 30px
class="circle-num" : A 28x28 black circle you can put a character into, numbers for example.
class="num-list" : To be placed on an unordered list! <ul class="num-list"> Used when "circle-num" characters are placed in each <li> - replaces default bullet points.
class="oh" : overflow: hidden;

= Anything Else I Should Know? =

The logo is constrained to 300px wide max.

<hr>             is 10% black
<hr class=“alt”> is 50% white

BlockQuote:
citations go in <cite> tags. A <span> tag inside the <cite> tag will unBold the text.


== Changelog ==

= 1.5.1 - 06 04 2019 =
* Mid-block images to unequal widths.
* Built in opening quotes.
* Sub headers display on single-exhibition template.

= 1.5.0 - 03 15 2019 =
* Class season tabs to separate pages.

= 1.0.0 - 01 01 2019 =
* Stable

= 0.5.0 - 11 11 2018 =
* First deploy to GIT

= 0.0.1 - 11 13 2018 =
* OsixthreeO renamed to "danforthart"

== Credits ==
* Based on Underscores http://underscores.me/, (C) 2012-2018 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
