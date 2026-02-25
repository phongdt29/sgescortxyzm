<?php
/**
 * Footer template.
 *
 * @package sgescort-basic
 */
?>

<footer id="contact">
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="footer-content">
						<div class="footer-head">
							<div class="footer-logo">
								<img src="<?php echo esc_url( home_url( '/html/images/logo.png' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" style="width: 120px; height: auto;">
							</div>
							<div class="footer-icons">
								<ul>
									<li>
										<a href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow" title="Telegram">
											<i class="fab fa-telegram"></i>
										</a>
									</li>
									<li>
										<a href="https://sgescorthub.com/" title="Website">
											<i class="fas fa-globe"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="footer-content">
						<div class="footer-head">
							<h4><?php esc_html_e( 'Contact Information', 'sgescort-basic' ); ?></h4>
							<ul class="footer-contact">
								<li>
									<a href="mailto:info@sgescorthub.com" title="Email">
										<i class="fa fa-envelope"></i> info@sgescorthub.com
									</a>
								</li>
								<li>
									<a href="https://sgescorthub.com/" title="Website">
										<i class="fas fa-globe"></i> https://sgescorthub.com/
									</a>
								</li>
								<li>
									<a href="#" title="Address">
										<i class="fa fa-map-marker-alt"></i> Singapore
									</a>
								</li>
								<li>
									<a href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow" title="Telegram">
										<i class="fab fa-telegram"></i> Telegram
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="footer-content last-content">
						<div class="footer-head">
							<h4>SG Escort Hub - 新加坡小姐网</h4>
							<p>
								An Escort Agency Singapore (SG) is a professional escort service provider that offers
								companionship and social support for clients in various settings. These services may
								include attending social events, business meetings, private gatherings, or accompanying
								clients on travel arrangements.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-area-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="copyright">
						<p>
							<?php
							/* translators: %s: current year. */
							printf( '&copy; %s ', esc_html( date_i18n( 'Y' ) ) );
							?>
							<a href="https://sgescorthub.com/" title="Singapore Escort Hub">Singapore Escort Hub</a>
							<?php esc_html_e( ' All Rights Reserved | ', 'sgescort-basic' ); ?>
							<a href="https://sgescorthub.com/" title="SG Escort Hub - 新加坡小姐网">SG Escort Hub - 新加坡小姐网</a> |
							<a href="https://sgescorthub.com/" title="Singapore Escort Hub Vietnam">Singapore Escort Hub</a> |
							<a href="https://sgescorthub.com/" title="Singapore Escort">Singapore Escort</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

