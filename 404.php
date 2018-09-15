<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div id="error" class="main-content align-center">
	<h3> 404 - Page not found. Click <a href="<?php echo home_url(); ?>">here</a> to return home.</h3>
    <i class="fas fa-exclamation-triangle error-icon"></i>
</div>

<?php get_footer();
