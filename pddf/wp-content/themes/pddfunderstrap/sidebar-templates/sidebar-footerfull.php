<?php

/**
 * Sidebar setup for footer full
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');

?>

<?php if (is_active_sidebar('footerfull')) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper" id="wrapper-footer-full">

		<div class="<?php echo esc_attr($container); ?>" id="footer-full-content" tabindex="-1">

			<div class="row">
				<div class="col-lg-4 main-footer footer-border">
					<h3>Quick Links </h3>
					<ul>
						<li class="footer-links-margin"><a href="#">Home</a></li>
						<li class="footer-links-margin"><a href="#">About Us</a></li>
						<li class="footer-links-margin"><a href="#">Contact Us</a></li>
						<li class="footer-links-margin"><a href="#">Advertise With Us</a></li>
						<li class="footer-links-margin"><a href="#">Terms of Use</a></li>
						<li class="footer-links-margin"><a href="#">Privacy Policy</a></li>
					</ul>
				</div>

				<div class="col-lg-4 main-footer footer-border">
					<h3>Corporate Office </h3>
					<p class="footer-address-margin">No. 1 Farrar Avenue, Adabraka</p>
					<p class="footer-address-margin">Accra</p>
					<p class="footer-address-margin">E-mail: multimedia@myjoyonline.com</p>
					<p class="">Tel: +233-30-222 6163; +233 -30- 222 6151</p>

					<p class="footer-address-margin">Corporate Postal Address</p>
					<p class="footer-address-margin">P.O.Box GP 17202</p>
					<p>Accra, Ghana</p>

				</div>

				<div class="col-lg-4 main-footer">
					<h3>Subscribe</h3>
					<p style="margin-bottom: 2rem;"> Subscribe to get free daily news, updates and more... </p>
					<?php echo do_shortcode("[contact-form-7 id='158' title='Contact form 1']"); ?>
				</div>

				<!-- <?php dynamic_sidebar('footerfull'); ?> -->

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->

<?php
endif;
