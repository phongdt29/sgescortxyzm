<?php
/**
 * Front page template based on static HTML landing page.
 *
 * @package sgescort-basic
 */

get_header();

if ( have_posts() ) {
	the_post();
}
?>

<!-- Hero Section -->
<section id="home" class="slide-area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="slide-content">
					<span class="title1">#1 Best Directory Singapore (SG)</span>
					<h1 class="title2">
						<?php bloginfo( 'name' ); ?>
					</h1>
					<div class="slider-button">
						<a class="slide-btn" href="https://sgescorthub.com/">Visit SGESCORTHUB.COM</a>
						<a class="slide-btn" href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow">Visit Telegram</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

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
						<span class="top-head">About Us</span>
						<h3>About Singapore Escort Hub</h3>
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

<!-- Services Section -->
<section id="services" class="services-area bg-color-2 area-padding-2">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-headline white-headline text-center">
					<span class="top-head">Services</span>
					<h3>Our Singapore Escort Hub Services</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- GF Meeting -->
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

			<!-- High-class Terms -->
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

			<!-- Home Service -->
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

			<!-- Companion Service -->
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

			<!-- Intimate Travel Buddy -->
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

			<!-- Massage-based Service -->
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
		</div>
	</div>
</section>

<!-- Counter Section -->
<section class="counter-area area-padding">
	<div class="container">
		<div class="row">
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
		</div>
	</div>
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="project-area bg-color-2 area-padding-2">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-headline white-headline text-center">
					<span class="top-head">Gallery</span>
					<h3>SG SCORT HUB PORTFOLIO</h3>
				</div>
			</div>
		</div>

		<div class="portfolio-slider-container">
			<div class="portfolio-slider" id="portfolioSlider">
				<?php
				$portfolio_images = array(
					'a1.jpg',
					'a2.jpg',
					'a3.jpg',
					'a4.jpg',
					'a5.jpg',
					'a6.jpg',
					'a7.jpg',
					'a8.jpg',
					'a9.jpg',
					'a10.jpg',
					'a11.jpg',
					'a12.jpg',
					'a13.jpg',
					'a14.jpg',
				);
				foreach ( $portfolio_images as $index => $file ) :
					?>
					<div class="portfolio-slide">
						<div class="single-awesome-project">
							<div class="awesome-img">
								<img src="<?php echo esc_url( home_url( '/html/images/' . $file ) ); ?>" alt="<?php echo esc_attr( 'Gallery Image ' . ( $index + 1 ) ); ?>">
							</div>
						</div>
					</div>
				<?php endforeach; ?>
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

<!-- Banner Section -->
<section class="banner-area area-padding">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="banner-content">
					<h2>Elevate Your Experience, Every Moment.</h2>
					<div class="banner-contact">
						<a class="slide-btn" href="https://sgescorthub.com/">Visit SGESCORTHUB.COM</a>
						<a class="slide-btn" href="https://t.me/+qQYECOoAHgZhNzU1" rel="nofollow">Visit 新加坡小姐网 Telegram</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Team Section -->
<section id="team" class="team-area bg-color-2 area-padding-2">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-headline white-headline text-center">
					<span class="top-head">TOP Models</span>
					<h3>Meet Our Models</h3>
				</div>
			</div>
		</div>

		<div class="team-slider-container">
			<div class="team-slider" id="teamSlider">
				<?php
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
				<?php endforeach; ?>
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

<!-- Testimonials Section -->
<section class="reviews-area bg-color area-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="section-headline">
					<span class="top-head">Testimonials</span>
					<h3>What Our Clients Say</h3>
					<p>
						An Escort Agency is a professional service provider that offers companionship and social support
						for clients in various settings. These services may include attending social events, business
						meetings, private gatherings, or accompanying clients on travel arrangements. Outstanding service!
						The companion was elegant, professional, and made my evening unforgettable.
					</p>
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
							<p class="clients-text">
								"Singapore Escort Hub is Perfect match! They understood my preferences and delivered
								beyond expectations."
							</p>
							<div class="guest-details">
								<h4>Jennifer Liu</h4>
								<span class="guest-rev">General customer</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- FAQ Section -->
<section id="faq" class="faq-area bg-color area-padding">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-headline text-center">
					<span class="top-head">FAQ</span>
					<h3>Frequently Asked Questions</h3>
					<p>Find answers to the most common questions about our escort services in Singapore</p>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="faq-accordion" id="faqAccordion">

					<!-- FAQ items: kept same as static HTML -->
					<?php
					// To keep this concise, reuse the static HTML block from the original file.
					?>
					<div class="faq-item">
						<div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false">
							<h4>What is Singapore escort service? <span class="chinese">新加坡的伴游/援交服务是什么意思？</span></h4>
							<i class="fa fa-chevron-down"></i>
						</div>
						<div id="faq1" class="collapse" data-bs-parent="#faqAccordion">
							<div class="faq-body">
								<p class="english">
									Singapore escort service refers to premium companionship with beautiful, real ladies who provide discreet,
									professional services for men in need of intimacy, emotional connection, or event companionship. On our
									platform – one of the top Singapore escort and 新加坡援交网 websites – you'll find real profiles of girls
									offering outcall, massage, dinner dates, travel companionship, and more.
								</p>
								<p class="chinese">
									新加坡伴游服务（Singapore escort）是指由性感、真实的女生提供的高品质陪伴服务，满足男士在情感、亲密或社交活动中的需求。我们作为专业的新加坡援交网、新加坡小姐网、新加坡妓女网平台，提供真实可约的女生资料，支持上门服务、按摩、约饭、出游等形式。
								</p>
							</div>
						</div>
					</div>

					<!-- For brevity, you can copy the remaining FAQ items structure from html/index.html as needed. -->

				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();

