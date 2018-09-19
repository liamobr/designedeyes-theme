<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<footer class="footer">
    <div class="row">
        <div class="columns small-12 medium-6 align-left">
            <em>
                <img id="footer-logo" src="<?php bloginfo('template_directory'); ?>/dist/assets/images/logo/name.png">
                <br>
                Shop 16 967/991
                Point Nepean Rd, Rosebud VIC 3939
                <br>
                <a href="tel:+0359821582">
                    <span class="fas fa-phone"></span> (03) 5982 1582
                </a>
                <br>
                <a href="https://www.facebook.com/designedeyes/" target="_blank"><span class="fab fa-facebook-square"></span> Designed Eyes Rosebud</a>
                <br>
                © 2018 Designed Eyes
            </em>
        </div>
        <div class="columns small-12 medium-6 center-children">
            <ul class="footer-nav">
                <li>
                    <a href="/home"><i class="fas fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="/about"><i class="fas fa-book-open"></i> About Us</a>
                </li>
                <li>
                    <a href="/about/frames"><i class="fas fa-glasses"></i> Frames</a>
                </li>
                <li>
                    <a href="/about/lenses"><i class="far fa-eye-slash"></i> Lenses</a>
                </li>
                <li>
                    <a href="/about/optometry"><i class="fas fa-eye"></i> Optometry</a>
                </li>
                <li>
                    <a href="/about/sunglasses"><i class="fas fa-sun"></i> Sunglasses</a>
                </li>
                <li>
                    <a href="/contact"><i class="fas fa-phone"></i> Contact</a>
                </li>
                <li>
                    <a href="/blog"><i class="fas fa-align-left"></i> Blog</a>
                </li>
                <li>
                    <a href="/collection"><i class="fas fa-th"></i> Collection</a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>