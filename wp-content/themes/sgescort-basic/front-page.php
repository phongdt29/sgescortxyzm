<?php 

get_header();

$post_id = get_the_ID();

$enabled_sections = get_option( 'sgescort_basic_sections_enabled', array( 'hero', 'about', 'services', 'portfolio', 'banner', 'team', 'faq', 'news', 'counter', 'testimonials' ) );
?>

<?php if ( in_array( 'hero', $enabled_sections ) ) : ?>
<!-- Hero Section -->
<section id="home" class="slide-area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="slide-content">
					<?php
					$hero_query = new WP_Query(
						array(
							'post_type'      => 'sgescort_hero',
							'posts_per_page' => 1,
							'orderby'        => 'menu_order',
							'order'          => 'ASC',
						)
					);

					if ( $hero_query->have_posts() ) :
						while ( $hero_query->have_posts() ) :
							$hero_query->the_post();
							$hero_id = get_the_ID();
							$title1 = get_post_meta( $hero_id, '_sgescort_hero_title1', true );
							$title2 = get_post_meta( $hero_id, '_sgescort_hero_title2', true );
							$button1_text = get_post_meta( $hero_id, '_sgescort_hero_button1_text', true );
							$button1_url = get_post_meta( $hero_id, '_sgescort_hero_button1_url', true );
							$button2_text = get_post_meta( $hero_id, '_sgescort_hero_button2_text', true );
							$button2_url = get_post_meta( $hero_id, '_sgescort_hero_button2_url', true );
							?>
							<span class="title1"><?php echo esc_html( $title1 ?: '#1 Best Directory Singapore (SG)' ); ?></span>
							<h1 class="title2">
								<?php echo esc_html( $title2 ?: get_bloginfo( 'name' ) ); ?>
							</h1>
							<div class="slider-button">
								<?php if ( $button1_text && $button1_url ) : ?>
									<a class="slide-btn" href="<?php echo esc_url( $button1_url ); ?>"><?php echo esc_html( $button1_text ); ?></a>
								<?php else : ?>
									<a class="slide-btn" href="https://sgescorthub.com/">Visit SGESCORTHUB.COM</a>
								<?php endif; ?>
								<?php if ( $button2_text && $button2_url ) : ?>
									<a class="slide-btn" href="<?php echo esc_url( $button2_url ); ?>"><?php echo esc_html( $button2_text ); ?></a>
								<?php else : ?>
									<a class="slide-btn" href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow">Visit Telegram</a>
								<?php endif; ?>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?>
						<span class="title1">#1 Best Directory Singapore (SG)</span>
						<h1 class="title2">
							<?php bloginfo( 'name' ); ?>
						</h1>
						<div class="slider-button">
							<a class="slide-btn" href="https://sgescorthub.com/">Visit SGESCORTHUB.COM</a>
							<a class="slide-btn" href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow">Visit Telegram</a>
						</div>
						<?php
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ( in_array( 'about', $enabled_sections ) ) : ?>
<!-- About Section -->
<section id="about" class="about-area bg-color area-padding">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="about-images position-relative">
					<img class="ab-image" src="<?php echo esc_url( home_url( '/html/images/s1.jpg' ) ); ?>" alt="Singapore Escort Hub Team">
					<div class="video-content">
						<a href="#" class="video-play-icon">
							<i class="fa fa-play"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="about-content">
					<div class="about-headline">
						<?php
						$about_query = new WP_Query(
							array(
								'post_type'      => 'sgescort_about',
								'posts_per_page' => 1,
								'orderby'        => 'menu_order',
								'order'          => 'ASC',
							)
						);

						if ( $about_query->have_posts() ) :
							while ( $about_query->the_post() ) :
								$about_id = get_the_ID();
								$subtitle = get_post_meta( $about_id, '_sgescort_about_subtitle', true );
								$title = get_post_meta( $about_id, '_sgescort_about_title', true );
								?>
								<span class="top-head"><?php echo esc_html( $subtitle ?: 'About Us' ); ?></span>
								<h3><?php echo esc_html( $title ?: 'About Singapore Escort Hub' ); ?></h3>
								<?php
							endwhile;
							wp_reset_postdata();
						else :
							?>
							<span class="top-head">About Us</span>
							<h3>About Singapore Escort Hub</h3>
							<?php
						endif;
						?>
					</div>
					<?php if ( get_the_content() ) : ?>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
					<?php else : ?>
						<p>
							An Singapore Escort Agency / Escort Girls SG is a professional service provider that offers
							companionship and social support for clients in various settings. These services may include
							attending social events, business meetings, private gatherings, or accompanying clients on
							travel arrangements.
						</p>
						<p>
							The nature of escort services provided by escort agencies can vary depending on regional laws
							and cultural norms. Clients are encouraged to verify the agency's credentials and the scope of
							its offerings to ensure a legitimate and satisfactory experience.
						</p>
					<?php endif; ?>
					<div class="slider-button">
						<a class="slide-btn" href="https://sgescorthub.com/">Visit</a>
						<a class="slide-btn" href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow">Join Telegram</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ( in_array( 'services', $enabled_sections ) ) : ?>
<!-- Services Section -->
<section id="services" class="services-area bg-color-2 area-padding-2">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-headline white-headline text-center">
					<?php
					$services_section_query = new WP_Query(
						array(
							'post_type'      => 'sgescort_services_section',
							'posts_per_page' => 1,
							'orderby'        => 'menu_order',
							'order'          => 'ASC',
						)
					);

					if ( $services_section_query->have_posts() ) :
						while ( $services_section_query->have_posts() ) :
							$services_section_query->the_post();
							$services_section_id = get_the_ID();
							$subtitle = get_post_meta( $services_section_id, '_sgescort_services_section_subtitle', true );
							$title = get_post_meta( $services_section_id, '_sgescort_services_section_title', true );
							?>
							<span class="top-head"><?php echo esc_html( $subtitle ?: 'Services' ); ?></span>
							<h3><?php echo esc_html( $title ?: 'Our Singapore Escort Hub Services' ); ?></h3>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?>
						<span class="top-head">Services</span>
						<h3>Our Singapore Escort Hub Services</h3>
						<?php
					endif;
					?>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$services_query = new WP_Query(
				array(
					'post_type'      => 'sgescort_service',
					'posts_per_page' => -1,
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
				)
			);

			if ( $services_query->have_posts() ) :
				while ( $services_query->have_posts() ) :
					$services_query->the_post();
					$image_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
					?>
					<div class="col-md-4 col-sm-6 mb-4">
						<div class="single-services">
							<div class="services-image">
								<?php if ( $image_url ) : ?>
									<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>">
								<?php endif; ?>
							</div>
							<div class="services-content">
								<h4><?php the_title(); ?></h4>
								<div class="services-text">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<!-- Fallback static services (from original HTML) -->
				<div class="col-md-4 col-sm-6 mb-4">
					<div class="single-services">
						<div class="services-image">
							<img src="<?php echo esc_url( home_url( '/html/images/s2.jpg' ) ); ?>" alt="girlfriend meeting service">
						</div>
						<div class="services-content">
							<h4>Girlfriend Meeting (女友式约会)</h4>
							<p>A date-like experience that feels like being with a real girlfriend — intimate, emotional, and natural.（如同真实女友般的约会体验，亲密、贴心、自然、富有情感。）</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 mb-4">
					<div class="single-services">
						<div class="services-image">
							<img src="<?php echo esc_url( home_url( '/html/images/s3.jpg' ) ); ?>" alt="high class escort service">
						</div>
						<div class="services-content">
							<h4>High-class Terms (高端服务)</h4>
							<p>Tailored for VIP clients — discreet, elegant, and luxurious service at the highest standard.（为尊贵客户提供的高级服务，私密、高雅、尊享顶级体验。）</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 mb-4">
					<div class="single-services">
						<div class="services-image">
							<img src="<?php echo esc_url( home_url( '/html/images/s4.jpg' ) ); ?>" alt="home escort service">
						</div>
						<div class="services-content">
							<h4>Home Service (上门服务)</h4>
							<p>Private in-home service including massage, companionship, or personal care — discreet and comfortable.（提供上门按摩、陪伴、贴心服务，安全私密，舒适享受。）</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 mb-4">
					<div class="single-services">
						<div class="services-image">
							<img src="<?php echo esc_url( home_url( '/html/images/s5.jpg' ) ); ?>" alt="companion escort service">
						</div>
						<div class="services-content">
							<h4>Companion Service (陪伴服务)</h4>
							<p>Emotional and personal companionship during events, dinners, or daily activities.（陪同客户出席活动、用餐或日常生活中的伴随服务，营造温馨陪伴感。）</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 mb-4">
					<div class="single-services">
						<div class="services-image">
							<img src="<?php echo esc_url( home_url( '/html/images/s6.jpg' ) ); ?>" alt="intimate travel escort">
						</div>
						<div class="services-content">
							<h4>Intimate Travel Buddy (贴心陪游)</h4>
							<p>A caring travel partner who provides company, conversation, and thoughtful attention during your trip.（旅游中贴心陪伴者，照顾周到，聊天轻松愉快。）</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 mb-4">
					<div class="single-services">
						<div class="services-image">
							<img src="<?php echo esc_url( home_url( '/html/images/s7.jpg' ) ); ?>" alt="massage based escort service">
						</div>
						<div class="services-content">
							<h4>Massage-based (按摩服务为主)</h4>
							<p>Primarily focused on relaxing or therapeutic massage, with optional personal or emotional care.（以放松或理疗按摩为主的服务，也可结合贴心照顾或情感关怀。）</p>
						</div>
					</div>
				</div>
				<?php
			endif;
			?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ( in_array( 'counter', $enabled_sections ) ) : ?>
<!-- Counter Section -->
<section class="counter-area area-padding">
	<div class="container">
		<div class="row">
			<?php
			$counter_section_query = new WP_Query(
				array(
					'post_type'      => 'sgescort_counter',
					'posts_per_page' => 1,
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
				)
			);

			if ( $counter_section_query->have_posts() ) :
				while ( $counter_section_query->the_post() ) :
					$counter_section_id = get_the_ID();
					$counter1_value = get_post_meta( $counter_section_id, '_sgescort_counter1_value', true );
					$counter1_label = get_post_meta( $counter_section_id, '_sgescort_counter1_label', true );
					$counter2_value = get_post_meta( $counter_section_id, '_sgescort_counter2_value', true );
					$counter2_label = get_post_meta( $counter_section_id, '_sgescort_counter2_label', true );
					$counter3_value = get_post_meta( $counter_section_id, '_sgescort_counter3_value', true );
					$counter3_label = get_post_meta( $counter_section_id, '_sgescort_counter3_label', true );
					$counter4_value = get_post_meta( $counter_section_id, '_sgescort_counter4_value', true );
					$counter4_label = get_post_meta( $counter_section_id, '_sgescort_counter4_label', true );
					?>
					<div class="col-md-3 col-sm-6">
						<div class="fun_text">
							<span class="counter"><?php echo esc_html( $counter1_value ?: '100' ); ?></span><span class="counterplus">+</span>
							<h4><?php echo esc_html( $counter1_label ?: 'Popular Models' ); ?></h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="fun_text">
							<span class="counter"><?php echo esc_html( $counter2_value ?: '200' ); ?></span><span class="counterplus">+</span>
							<h4><?php echo esc_html( $counter2_label ?: 'Total Models' ); ?></h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="fun_text">
							<span class="counter"><?php echo esc_html( $counter3_value ?: '5' ); ?></span><span class="counterplus">+</span>
							<h4><?php echo esc_html( $counter3_label ?: 'Areas' ); ?></h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="fun_text">
							<span class="counter"><?php echo esc_html( $counter4_value ?: '15000' ); ?></span><span class="counterplus">+</span>
							<h4><?php echo esc_html( $counter4_label ?: 'Followers' ); ?></h4>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<div class="col-md-3 col-sm-6">
					<div class="fun_text">
						<span class="counter">100</span><span class="counterplus">+</span>
						<h4>Popular Models</h4>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="fun_text">
						<span class="counter">200</span><span class="counterplus">+</span>
						<h4>Total Models</h4>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="fun_text">
						<span class="counter">5</span><span class="counterplus">+</span>
						<h4>Areas</h4>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="fun_text">
						<span class="counter">15000</span><span class="counterplus">+</span>
						<h4>Followers</h4>
					</div>
				</div>
				<?php
			endif;
			?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ( in_array( 'portfolio', $enabled_sections ) ) : ?>
<!-- Portfolio Section -->
<section id="portfolio" class="project-area bg-color-2 area-padding-2">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-headline white-headline text-center">
					
					<?php
					// Initialize so images are available outside the loop.
					$portfolio_cms_images = array();

					$portfolio_section_query = new WP_Query(
						array(
							'post_type'      => 'sge_portfolio',
							'posts_per_page' => 1,
							'orderby'        => 'menu_order',
							'order'          => 'ASC',
						)
					);

					if ( $portfolio_section_query->have_posts() ) :
						while ( $portfolio_section_query->the_post() ) :
							$portfolio_section_id = get_the_ID();
							$subtitle             = get_post_meta( $portfolio_section_id, '_sge_portfolio_subtitle', true );
							$title                = get_post_meta( $portfolio_section_id, '_sge_portfolio_title', true );
							$portfolio_cms_images = get_post_meta( $portfolio_section_id, '_sge_portfolio_images', true );
							$portfolio_cms_images = is_array( $portfolio_cms_images ) ? $portfolio_cms_images : array();
							?>
							<span class="top-head"><?php echo esc_html( $subtitle ?: 'Gallery' ); ?></span>
							<h3><?php echo esc_html( $title ?: 'SG SCORT HUB PORTFOLIO' ); ?></h3>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?>
						<span class="top-head">Gallery</span>
						<h3>SG SCORT HUB PORTFOLIO</h3>
						<?php
					endif;
					?>
				</div>
			</div>
		</div>

		<div class="portfolio-slider-container">
			<div class="portfolio-slider" id="portfolioSlider">
				<?php
				if ( ! empty( $portfolio_cms_images ) ) :
					// Load images uploaded via CMS.
					foreach ( $portfolio_cms_images as $index => $img_url ) :
						?>
						<div class="portfolio-slide">
							<div class="single-awesome-project">
								<div class="awesome-img">
									<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( 'Gallery Image ' . ( $index + 1 ) ); ?>">
								</div>
							</div>
						</div>
					<?php endforeach;
				else :
					// Fallback to default static images.
					$portfolio_fallback = array(
						'a1.jpg','a2.jpg','a3.jpg','a4.jpg','a5.jpg','a6.jpg','a7.jpg',
						'a8.jpg','a9.jpg','a10.jpg','a11.jpg','a12.jpg','a13.jpg','a14.jpg',
					);
					foreach ( $portfolio_fallback as $index => $file ) :
						?>
						<div class="portfolio-slide">
							<div class="single-awesome-project">
								<div class="awesome-img">
									<img src="<?php echo esc_url( home_url( '/html/images/' . $file ) ); ?>" alt="<?php echo esc_attr( 'Gallery Image ' . ( $index + 1 ) ); ?>">
								</div>
							</div>
						</div>
					<?php endforeach;
				endif; ?>
			</div>

			<button class="slider-nav prev" id="prevBtn">
				<i class="fa fa-chevron-left"></i>
			</button>
			<button class="slider-nav next" id="nextBtn">
				<i class="fa fa-chevron-right"></i>
			</button>

			<div class="slider-progress">
				<div class="slider-progress-bar" id="progressBar"></div>
			</div>
		</div>

		<div class="slider-dots" id="sliderDots"></div>
	</div>
</section>
<?php endif; ?>

<?php if ( in_array( 'banner', $enabled_sections ) ) : ?>
<!-- Banner Section -->
<section class="banner-area area-padding">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="banner-content">
					<?php
					$banner_query = new WP_Query(
						array(
							'post_type'      => 'sgescort_banner',
							'posts_per_page' => 1,
							'orderby'        => 'menu_order',
							'order'          => 'ASC',
						)
					);

					if ( $banner_query->have_posts() ) :
						while ( $banner_query->the_post() ) :
							$banner_id = get_the_ID();
							$title = get_post_meta( $banner_id, '_sgescort_banner_title', true );
							$button1_text = get_post_meta( $banner_id, '_sgescort_banner_button1_text', true );
							$button1_url = get_post_meta( $banner_id, '_sgescort_banner_button1_url', true );
							$button2_text = get_post_meta( $banner_id, '_sgescort_banner_button2_text', true );
							$button2_url = get_post_meta( $banner_id, '_sgescort_banner_button2_url', true );
							?>
							<h2><?php echo esc_html( $title ?: 'Elevate Your Experience, Every Moment.' ); ?></h2>
							<div class="banner-contact">
								<?php if ( $button1_text && $button1_url ) : ?>
									<a class="slide-btn" href="<?php echo esc_url( $button1_url ); ?>"><?php echo esc_html( $button1_text ); ?></a>
								<?php else : ?>
									<a class="slide-btn" href="https://sgescorthub.com/">Visit SGESCORTHUB.COM</a>
								<?php endif; ?>
								<?php if ( $button2_text && $button2_url ) : ?>
									<a class="slide-btn" href="<?php echo esc_url( $button2_url ); ?>"><?php echo esc_html( $button2_text ); ?></a>
								<?php else : ?>
									<a class="slide-btn" href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow">Visit 新加坡小姐网 Telegram</a>
								<?php endif; ?>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?>
						<h2>Elevate Your Experience, Every Moment.</h2>
						<div class="banner-contact">
							<a class="slide-btn" href="https://sgescorthub.com/">Visit SGESCORTHUB.COM</a>
							<a class="slide-btn" href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow">Visit 新加坡小姐网 Telegram</a>
						</div>
						<?php
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ( in_array( 'team', $enabled_sections ) ) : ?>
<!-- Team Section -->
<section id="team" class="team-area bg-color-2 area-padding-2">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-headline white-headline text-center">
					<?php
					$team_section_query = new WP_Query(
						array(
							'post_type'      => 'sgescort_team',
							'posts_per_page' => 1,
							'orderby'        => 'menu_order',
							'order'          => 'ASC',
						)
					);

					if ( $team_section_query->have_posts() ) :
						while ( $team_section_query->have_posts() ) :
							$team_section_query->the_post();
							$team_section_id = get_the_ID();
							$subtitle = get_post_meta( $team_section_id, '_sgescort_team_subtitle', true );
							$title = get_post_meta( $team_section_id, '_sgescort_team_title', true );
							?>
							<span class="top-head"><?php echo esc_html( $subtitle ?: 'TOP Models' ); ?></span>
							<h3><?php echo esc_html( $title ?: 'Meet Our Models' ); ?></h3>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?>
						<span class="top-head">TOP Models</span>
						<h3>Meet Our Models</h3>
						<?php
					endif;
					?>
				</div>
			</div>
		</div>

		<div class="team-slider-container">
			<div class="team-slider" id="teamSlider">
				<?php
				$models_query = new WP_Query(
					array(
						'post_type'      => 'sgescort_model',
						'posts_per_page' => -1,
						'orderby'        => 'menu_order',
						'order'          => 'ASC',
					)
				);

				if ( $models_query->have_posts() ) :
					while ( $models_query->have_posts() ) :
						$models_query->the_post();
						$image_url   = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
						$model_role  = get_post_meta( get_the_ID(), '_sgescort_model_role', true );
						$profile_url = get_post_meta( get_the_ID(), '_sgescort_model_profile_url', true );
						?>
						<div class="team-slide">
							<div class="single-member">
								<div class="team-img">
									<?php if ( $image_url ) : ?>
										<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>">
									<?php endif; ?>
								</div>
								<div class="team-content text-center">
									<h4><?php the_title(); ?></h4>
									<?php if ( $model_role ) : ?>
										<p><?php echo esc_html( $model_role ); ?></p>
									<?php endif; ?>
									<ul class="social-icon">
										<?php if ( $profile_url ) : ?>
											<li>
												<a class="website" href="<?php echo esc_url( $profile_url ); ?>" target="_blank" title="View Profile">
													<i class="fas fa-globe"></i>
												</a>
											</li>
										<?php endif; ?>
										<li>
											<a class="telegram" href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow" target="_blank" title="Contact on Telegram">
												<i class="fab fa-telegram"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
				else :
					// Fallback static team members.
					$team_members = array(
						array(
							'name'        => 'Kallie',
							'role'        => 'Premium Escort',
							'image'       => 'model-Kallie.jpg',
							'profile_url' => 'https://sgescorthub.com/view/kallie-sg-escort',
						),
						array(
							'name'        => 'Lalita',
							'role'        => 'Premium Escort',
							'image'       => 'model-lalita.jpg',
							'profile_url' => 'https://sgescorthub.com/view/lalita-sg-escort',
						),
						array(
							'name'        => 'Molina',
							'role'        => 'Raw Service Girls',
							'image'       => 'model-Molina.jpg',
							'profile_url' => 'https://sgescorthub.com/view/molina-raw-service-girls',
						),
						array(
							'name'        => 'Lisa',
							'role'        => 'Geylang Escort',
							'image'       => 'model-Lisa.jpg',
							'profile_url' => 'https://sgescorthub.com/view/Lisa-escort-geylang',
						),
						array(
							'name'        => 'Annabelle',
							'role'        => 'Thai Escort',
							'image'       => 'model-annabella.jpg',
							'profile_url' => 'https://sgescorthub.com/view/annabelle-thai-escort-sg',
						),
						array(
							'name'        => 'Ely',
							'role'        => 'Geylang Escort',
							'image'       => 'model-ely.jpg',
							'profile_url' => 'https://sgescorthub.com/view/ely-geylang-escort',
						),
						array(
							'name'        => 'Mikio',
							'role'        => 'SG Escort',
							'image'       => 'model-Mikio.jpg',
							'profile_url' => 'https://sgescorthub.com/view/mikio-sg-escort',
						),
						array(
							'name'        => 'Meimei',
							'role'        => 'SG Escort',
							'image'       => 'model-meimei.jpg',
							'profile_url' => 'https://sgescorthub.com/view/meimei-sg-escort',
						),
						array(
							'name'        => 'Chang',
							'role'        => 'SG Escort',
							'image'       => 'model-chang.jpg',
							'profile_url' => 'https://sgescorthub.com/view/chang-sg-escort',
						),
						array(
							'name'        => 'Linda',
							'role'        => 'SG Escort',
							'image'       => 'model-Linda.jpg',
							'profile_url' => 'https://sgescorthub.com/view/linda-sg-escort',
						),
					);

					foreach ( $team_members as $member ) :
						?>
						<div class="team-slide">
							<div class="single-member">
								<div class="team-img">
									<img src="<?php echo esc_url( home_url( '/html/images/' . $member['image'] ) ); ?>" alt="<?php echo esc_attr( $member['name'] ); ?>">
								</div>
								<div class="team-content text-center">
									<h4><?php echo esc_html( $member['name'] ); ?></h4>
									<p><?php echo esc_html( $member['role'] ); ?></p>
									<ul class="social-icon">
										<li>
											<a class="website" href="<?php echo esc_url( $member['profile_url'] ); ?>" target="_blank" title="View Profile">
												<i class="fas fa-globe"></i>
											</a>
										</li>
										<li>
											<a class="telegram" href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow" target="_blank" title="Contact on Telegram">
												<i class="fab fa-telegram"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<?php
					endforeach;
				endif;
				?>
			</div>

			<button class="slider-nav prev" id="teamPrevBtn">
				<i class="fa fa-chevron-left"></i>
			</button>
			<button class="slider-nav next" id="teamNextBtn">
				<i class="fa fa-chevron-right"></i>
			</button>

			<div class="slider-progress">
				<div class="slider-progress-bar" id="teamProgressBar"></div>
			</div>
		</div>

		<div class="slider-dots" id="teamSliderDots"></div>
	</div>
</section>
<?php endif; ?>

<?php if ( in_array( 'testimonials', $enabled_sections ) ) : ?>
<!-- Testimonials Section -->
<section class="reviews-area bg-color area-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="section-headline">
					<?php
					$testimonials_query = new WP_Query(
						array(
							'post_type'      => 'sgescort_testimonials',
							'posts_per_page' => 1,
							'orderby'        => 'menu_order',
							'order'          => 'ASC',
						)
					);

					if ( $testimonials_query->have_posts() ) :
						while ( $testimonials_query->the_post() ) :
							$testimonials_id = get_the_ID();
							$subtitle = get_post_meta( $testimonials_id, '_sgescort_testimonials_subtitle', true );
							$title = get_post_meta( $testimonials_id, '_sgescort_testimonials_title', true );
							$description = get_post_meta( $testimonials_id, '_sgescort_testimonials_description', true );
							$testimonial_text = get_post_meta( $testimonials_id, '_sgescort_testimonial_text', true );
							$client_name = get_post_meta( $testimonials_id, '_sgescort_client_name', true );
							$client_role = get_post_meta( $testimonials_id, '_sgescort_client_role', true );
							?>
							<span class="top-head"><?php echo esc_html( $subtitle ?: 'Testimonials' ); ?></span>
							<h3><?php echo esc_html( $title ?: 'What Our Clients Say' ); ?></h3>
							<p><?php echo esc_html( $description ?: 'An Escort Agency is a professional service provider that offers companionship and social support for clients in various settings. These services may include attending social events, business meetings, private gatherings, or accompanying clients on travel arrangements. Outstanding service! The companion was elegant, professional, and made my evening unforgettable.' ); ?></p>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?>
						<span class="top-head">Testimonials</span>
						<h3>What Our Clients Say</h3>
						<p>
							An Escort Agency is a professional service provider that offers companionship and social support
							for clients in various settings. These services may include attending social events, business
							meetings, private gatherings, or accompanying clients on travel arrangements. Outstanding service!
							The companion was elegant, professional, and made my evening unforgettable.
						</p>
						<?php
					endif;
					?>
				</div>
			</div>
			<div class="col-md-7">
				<div class="reviews-content bg-color-2">
					<div class="testimonial-carousel">
						<div class="single-testi">
							<div class="client-rating mb-3">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<?php if ( isset( $testimonial_text ) && $testimonial_text ) : ?>
								<p class="clients-text"><?php echo esc_html( $testimonial_text ); ?></p>
							<?php else : ?>
								<p class="clients-text">
									"Singapore Escort Hub is Perfect match! They understood my preferences and delivered
									beyond expectations."
								</p>
							<?php endif; ?>
							<div class="guest-details">
								<?php if ( isset( $client_name ) && $client_name ) : ?>
									<h4><?php echo esc_html( $client_name ); ?></h4>
								<?php else : ?>
									<h4>Jennifer Liu</h4>
								<?php endif; ?>
								<?php if ( isset( $client_role ) && $client_role ) : ?>
									<span class="guest-rev"><?php echo esc_html( $client_role ); ?></span>
								<?php else : ?>
									<span class="guest-rev">General customer</span>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ( in_array( 'faq', $enabled_sections ) ) : ?>
<!-- FAQ Section -->
<section id="faq" class="faq-area bg-color area-padding">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-headline text-center">
					<?php
					$faq_section_query = new WP_Query(
						array(
							'post_type'      => 'sgescort_faq',
							'posts_per_page' => 1,
							'orderby'        => 'menu_order',
							'order'          => 'ASC',
						)
					);

					if ( $faq_section_query->have_posts() ) :
						while ( $faq_section_query->the_post() ) :
							$faq_section_id = get_the_ID();
							$subtitle = get_post_meta( $faq_section_id, '_sgescort_faq_subtitle', true );
							$title = get_post_meta( $faq_section_id, '_sgescort_faq_title', true );
							?>
							<span class="top-head"><?php echo esc_html( $subtitle ?: 'FAQ' ); ?></span>
							<h3><?php echo esc_html( $title ?: 'Frequently Asked Questions' ); ?></h3>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?>
						<span class="top-head">FAQ</span>
						<h3>Frequently Asked Questions</h3>
						<?php
					endif;
					?>
					<p>Find answers to the most common questions about our escort services in Singapore</p>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="faq-accordion" id="faqAccordion">
					<?php
					$faq_query = new WP_Query(
						array(
							'post_type'      => 'sgescort_faq',
							'posts_per_page' => -1,
							'orderby'        => 'menu_order',
							'order'          => 'ASC',
						)
					);

					if ( $faq_query->have_posts() ) :
						$index = 0;
						while ( $faq_query->have_posts() ) :
							$faq_query->the_post();
							$index++;
							$faq_id = 'faq' . $index;
							?>
							<div class="faq-item">
								<div class="faq-header" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr( $faq_id ); ?>" aria-expanded="false">
									<h4><?php the_title(); ?></h4>
									<i class="fa fa-chevron-down"></i>
								</div>
								<div id="<?php echo esc_attr( $faq_id ); ?>" class="collapse" data-bs-parent="#faqAccordion">
									<div class="faq-body">
										<?php the_content(); ?>
									</div>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?>
						<!-- Static FAQ fallback (from original HTML) -->
						<div class="faq-item">
							<div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false">
								<h4>What is Singapore escort service? <span class="chinese">新加坡的伴游/援交服务是什么意思？</span></h4>
								<i class="fa fa-chevron-down"></i>
							</div>
							<div id="faq1" class="collapse" data-bs-parent="#faqAccordion">
								<div class="faq-body">
									<p class="english">Singapore escort service refers to premium companionship with beautiful, real ladies who provide discreet, professional services for men in need of intimacy, emotional connection, or event companionship. On our platform – one of the top Singapore escort and 新加坡援交网 websites – you'll find real profiles of girls offering outcall, massage, dinner dates, travel companionship, and more.</p>
									<p class="chinese">新加坡伴游服务（Singapore escort）是指由性感、真实的女生提供的高品质陪伴服务，满足男士在情感、亲密或社交活动中的需求。我们作为专业的新加坡援交网、新加坡小姐网、新加坡妓女网平台，提供真实可约的女生资料，支持上门服务、按摩、约饭、出游等形式。</p>
								</div>
							</div>
						</div>
						<div class="faq-item">
							<div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false">
								<h4>How do I book an escort in Singapore? <span class="chinese">如何在新加坡预约一位伴游小姐？</span></h4>
								<i class="fa fa-chevron-down"></i>
							</div>
							<div id="faq2" class="collapse" data-bs-parent="#faqAccordion">
								<div class="faq-body">
									<p class="english">Booking through Escort Girl SG is simple and fast. Just browse profiles on our Singapore escorts page, choose your girl, and contact us via WhatsApp or Telegram. Whether you're from Singapore, China, or traveling in Asia, our support team is online 24/7 to help.</p>
									<p class="chinese">通过我们平台（Escort Girl SG，新加坡约炮网）预约非常简单。您只需浏览Singapore escorts的页面，挑选心仪女生，然后通过 WhatsApp 或 Telegram 联系我们。不论您是本地人、华人，或是游客，我们都提供全天候中文和英文客服。</p>
								</div>
							</div>
						</div>
						<div class="faq-item">
							<div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false">
								<h4>Are the girls real on this site? <span class="chinese">你们网站上的小姐都是真的吗？</span></h4>
								<i class="fa fa-chevron-down"></i>
							</div>
							<div id="faq3" class="collapse" data-bs-parent="#faqAccordion">
								<div class="faq-body">
									<p class="english">Yes. Every profile on our 新加坡小姐网 is verified. No fake photos, no bait-and-switch. What you see is what you get. Many girls also provide selfies or short intro videos. We are known as one of the most honest platforms among all 新加坡妓女网 and Singapore escort services.</p>
									<p class="chinese">当然，我们网站上的每位小姐资料都经过严格审核，确保照片真实、无欺诈行为。很多女生还会提供自拍照或视频介绍。我们是新加坡妓女网和新加坡伴游网中公认最真实可靠的平台之一。</p>
								</div>
							</div>
						</div>
						<div class="faq-item">
							<div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false">
								<h4>What kind of services can I expect? <span class="chinese">可以提供哪些服务？</span></h4>
								<i class="fa fa-chevron-down"></i>
							</div>
							<div id="faq4" class="collapse" data-bs-parent="#faqAccordion">
								<div class="faq-body">
									<p class="english">Services vary by girl but may include: GFE (Girlfriend Experience), sensual massage (see 新加坡按摩网 section), outcall to hotel/condo, overnight stays, dinner dates, or private travel companionship. We cover everything from casual meetups to elite bookings via our 新加坡陪游網.</p>
									<p class="chinese">每位女生提供的服务可能不同，包括：女友体验（GFE）、性感按摩（详见新加坡按摩网版块）、上门服务、过夜、陪吃饭、出行陪伴等。无论是短约还是高端客户，我们的新加坡陪游網平台都能满足。</p>
								</div>
							</div>
						</div>
						<div class="faq-item">
							<div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false">
								<h4>How much does it cost to hire an escort in Singapore? <span class="chinese">在新加坡约小姐的价格是多少？</span></h4>
								<i class="fa fa-chevron-down"></i>
							</div>
							<div id="faq5" class="collapse" data-bs-parent="#faqAccordion">
								<div class="faq-body">
									<p class="english">Rates depend on the girl, duration, and type of service. Most Singapore escort girls offer hourly, 2-hour, or overnight packages. Prices range from SGD $250 to $2,000+, depending on exclusivity and service type. All prices on 新加坡约炮网 are upfront – no hidden fees.</p>
									<p class="chinese">价格会根据女生、时间长短和服务内容有所不同。大多数Singapore escort提供按小时、两小时或过夜等多种套餐，价格从SGD $250到$2,000不等，具体取决于服务档次。我们新加坡约炮网平台价格透明，无隐藏费用。</p>
								</div>
							</div>
						</div>
						<div class="faq-item">
							<div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false">
								<h4>Do you support Chinese clients? <span class="chinese">支持中文预约吗？</span></h4>
								<i class="fa fa-chevron-down"></i>
							</div>
							<div id="faq6" class="collapse" data-bs-parent="#faqAccordion">
								<div class="faq-body">
									<p class="english">Yes, our platform welcomes Chinese-speaking guests. Many girls on our 新加坡小姐网 speak Mandarin, and we also support bookings through WeChat and 中文客服 via WhatsApp. 欢迎中国朋友使用我们的新加坡援交网平台！</p>
									<p class="chinese">当然，我们平台欢迎讲中文的客户。很多女生会说普通话，我们也提供微信/WhatsApp中文客服服务。欢迎通过新加坡援交网预约。</p>
								</div>
							</div>
						</div>
						<div class="faq-item">
							<div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faq7" aria-expanded="false">
								<h4>Is my privacy protected? <span class="chinese">我在这里的隐私会被保护吗？</span></h4>
								<i class="fa fa-chevron-down"></i>
							</div>
							<div id="faq7" class="collapse" data-bs-parent="#faqAccordion">
								<div class="faq-body">
									<p class="english">Absolutely. Escort Girl SG guarantees 100% discretion. We never save your data or share your details with third parties. Booking on our 新加坡妓女网 is safe, encrypted, and anonymous.</p>
									<p class="chinese">当然。我们Escort Girl SG平台承诺100%隐私保护。我们不会保存您的信息，也不会与任何第三方共享。您在新加坡妓女网上的预约全程加密、安全、匿名。</p>
								</div>
							</div>
						</div>
						<div class="faq-item">
							<div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faq8" aria-expanded="false">
								<h4>Can I meet girls at my hotel or Airbnb? <span class="chinese">我可以在酒店或民宿见小姐吗？</span></h4>
								<i class="fa fa-chevron-down"></i>
							</div>
							<div id="faq8" class="collapse" data-bs-parent="#faqAccordion">
								<div class="faq-body">
									<p class="english">Yes. Most Singapore escorts offer outcall services. Simply provide your location (hotel name or address), and your selected girl will arrive at the scheduled time. This is one of the most popular features of our 新加坡伴游网 and 新加坡按摩网.</p>
									<p class="chinese">可以。大多数Singapore escorts都提供上门服务。您只需提供您的酒店或民宿地址，女生会按时到达。这是我们新加坡伴游网与新加坡按摩网最受欢迎的功能之一。</p>
								</div>
							</div>
						</div>
						<div class="faq-item">
							<div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faq9" aria-expanded="false">
								<h4>Are there overnight and travel options? <span class="chinese">是否可以安排过夜或出行陪伴？</span></h4>
								<i class="fa fa-chevron-down"></i>
							</div>
							<div id="faq9" class="collapse" data-bs-parent="#faqAccordion">
								<div class="faq-body">
									<p class="english">Yes, selected escort girls SG offer overnight and travel bookings through 新加坡陪游網. Rates are negotiable for longer sessions. Contact our team for exclusive companionship arrangements.</p>
									<p class="chinese">可以，一些优质的Escort Girl SG支持过夜或出游陪伴。长时间约会的价格可协商。请联系我们客服，通过新加坡陪游網安排专属服务。</p>
								</div>
							</div>
						</div>
						<div class="faq-item">
							<div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faq10" aria-expanded="false">
								<h4>What behavior is not allowed? <span class="chinese">有什么行为是被禁止的？</span></h4>
								<i class="fa fa-chevron-down"></i>
							</div>
							<div id="faq10" class="collapse" data-bs-parent="#faqAccordion">
								<div class="faq-body">
									<p class="english">No drug use, no violence, no non-consensual actions, and no recording/photos without permission. Respect and safety are essential in every session on our Singapore escort platform.</p>
									<p class="chinese">禁止使用毒品、暴力、未经同意的行为，以及偷拍录像。在我们的Singapore escort平台中，每一次见面都以安全与尊重为前提。</p>
								</div>
							</div>
						</div>
						<?php
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ( in_array( 'news', $enabled_sections ) ) : ?>
<!-- News Section -->
<section id="news" class="news-area bg-color-2 area-padding-2">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-headline white-headline text-center">
					<?php
					$news_section_query = new WP_Query(
						array(
							'post_type'      => 'sgescort_news',
							'posts_per_page' => 1,
							'orderby'        => 'menu_order',
							'order'          => 'ASC',
						)
					);

					if ( $news_section_query->have_posts() ) :
						while ( $news_section_query->the_post() ) :
							$news_section_id = get_the_ID();
							$subtitle = get_post_meta( $news_section_id, '_sgescort_news_section_subtitle', true );
							$title = get_post_meta( $news_section_id, '_sgescort_news_section_title', true );
							?>
							<span class="top-head"><?php echo esc_html( $subtitle ?: esc_html__( 'News', 'sgescort-basic' ) ); ?></span>
							<h3><?php echo esc_html( $title ?: esc_html__( 'Latest News & Updates', 'sgescort-basic' ) ); ?></h3>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?>
						<span class="top-head"><?php esc_html_e( 'News', 'sgescort-basic' ); ?></span>
						<h3><?php esc_html_e( 'Latest News & Updates', 'sgescort-basic' ); ?></h3>
						<?php
					endif;
					?>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$news_query = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => 3,
					'orderby'        => 'date',
					'order'          => 'DESC',
					'post_status'    => 'publish',
				)
			);

			$has_news = $news_query->have_posts();
			if ( $has_news ) :
				while ( $news_query->have_posts() ) :
					$news_query->the_post();
					$thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
					?>
					<div class="col-md-4 col-sm-6 mb-4">
						<article class="news-card">
							<?php if ( $thumb_url ) : ?>
								<a href="<?php the_permalink(); ?>" class="news-card-image">
									<img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>">
								</a>
							<?php endif; ?>
							<div class="news-card-content">
								<div class="news-card-meta">
									<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
								</div>
								<h4 class="news-card-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h4>
								<div class="news-card-excerpt">
									<?php the_excerpt(); ?>
								</div>
								<a href="<?php the_permalink(); ?>" class="news-card-link"><?php esc_html_e( 'Read more', 'sgescort-basic' ); ?> <i class="fa fa-arrow-right"></i></a>
							</div>
						</article>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<div class="col-12 text-center">
					<p><?php esc_html_e( 'No news posts yet.', 'sgescort-basic' ); ?></p>
				</div>
				<?php
			endif;
			?>
		</div>
		<?php
			$blog_url = get_option( 'page_for_posts' ) ? get_permalink( get_option( 'page_for_posts' ) ) : home_url( '/' );
			if ( $has_news && $blog_url ) :
				?>
			<div class="row mt-4">
				<div class="col-12 text-center">
					<a href="<?php echo esc_url( $blog_url ); ?>" class="slide-btn"><?php esc_html_e( 'View all news', 'sgescort-basic' ); ?></a>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<?php
get_footer();

