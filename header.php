<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js main-html" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="<?php bloginfo('template_directory'); ?>/dist/assets/images/logo/icon.png">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
        <header class="header-wrapper">
            <div class="top-bar" id="responsive-menu" data-sticky data-margin-top="0">
                <div class="top-bar-left">
                    <ul class="dropdown menu" data-dropdown-menu>
                        <li class="menu-image">
                            <a href="<?php echo home_url(); ?>" title="Home">
                                <img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/logo/name.png" alt="">
                            </a>
                        </li>
                        <li class="show-for-large">
                            <a href="<?php echo home_url(); ?>" class="button"><span class="fas fa-home"></span> Home</a>
                        </li>
                        <li class="has-submenu show-for-large">
                            <a class="button">Products</a>
                            <ul class="submenu menu vertical" data-submenu>
                                <li><a class="button" href="/about/frames">Frames</a></li>
                                <li><a class="button" href="/about/lenses">Lenses</a></li>
                                <li><a class="button" href="/about/optometry">Optometry</a></li>
                                <li><a class="button" href="/about/sunglasses">Sunglasses</a></li>
                            </ul>
                        </li>
                        <li class="show-for-large">
                            <a href="/about" class="button">About Us</a>
                        </li>
                        <li class="show-for-large">
                            <a href="/contact" class="button">Contact</a>
                        </li>
                        <li class="show-for-large">
                            <a href="/blog" class="button">Blog</a>
                        </li>
                        <li class="show-for-large">
                            <a href="/collection" class="button">Collection</a>
                        </li>
                    </ul>
                </div>
                <div class="top-bar-right">
                    <div class="hide-for-large">
                        <a class="black-text" data-toggle="mobile-menu"><i class="fas fa-bars"></i> Menu</a>
                    </div>
                </div>
            </div>
        </header>

        <div class="off-canvas-wrapper">
            <div id="mobile-menu" class="off-canvas position-right" data-off-canvas>
                <ul class="menu vertical accordion-menu" data-accordion-menu>
                    <li>
                        <a aria-label="Close menu" class="button" data-close><em>Back</em></a>
                    </li>
                    <li>
                        <a href="<?php echo home_url(); ?>" class="button"><span class="fas fa-home"></span> Home</a>
                    </li>
                    <li>
                        <a class="button">Products</a>
                        <ul class="menu vertical nested">
                            <li><a class="button" href="/about/frames">Frames</a></li>
                            <li><a class="button" href="/about/lenses">Lenses</a></li>
                            <li><a class="button" href="/about/optometry">Optometry</a></li>
                            <li><a class="button" href="/about/sunglasses">Sunglasses</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/about" class="button">About Us</a>
                    </li>
                    <li>
                        <a href="/contact" class="button">Contact</a>
                    </li>
                    <li>
                        <a href="/blog" class="button">Blog</a>
                    </li>
                    <li>
                        <a href="/collection" class="button">Collection</a>
                    </li>
                </ul>
            </div>
        </div>