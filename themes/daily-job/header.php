<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Daily_Job
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php add_theme_support('title-tag'); ?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header>
		<div class="header-area ">
			<div id="sticky-header" class="main-header-area">
				<div class="container-fluid ">
					<div class="header_bottom_border">
						<div class="row align-items-center">
							<div class="col-xl-3 col-lg-2">
								<div class="logo">
									<a href="<?php echo esc_url(home_url('/')); ?>">
										<img src="<?php echo esc_url(get_template_directory_uri() . '/img/logo.png'); ?>" alt="">
									</a>
								</div>
							</div>
							<div class="col-xl-6 col-lg-7">
								<div class="main-menu  d-none d-lg-block">
									<nav>
										<ul id="navigation">
											<li><a href="<?php echo esc_url(home_url('/')); ?>">home</a></li>
											<li><a href="#">Browse Job</a></li>
											<li><a href="#">pages <i class="ti-angle-down"></i></a>
												<ul class="submenu">
													<li><a href="#">Candidates </a></li>
													<li><a href="#">job details </a></li>
													<li><a href="#">elements</a></li>
												</ul>
											</li>
											<li><a href="#">blog <i class="ti-angle-down"></i></a>
												<ul class="submenu">
													<li><a href="#">blog</a></li>
													<li><a href="#">single-blog</a></li>
												</ul>
											</li>
											<li><a href="<?php echo esc_home_url(); ?>/contact">Contact</a></li>
										</ul>
									</nav>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 d-none d-lg-block">
								<div class="Appointment">
									<div class="phone_num d-none d-xl-block">
										<a href="#">Log in</a>
									</div>
									<div class="d-none d-lg-block">
										<a class="boxed-btn3" href="#">Post a Job</a>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="mobile_menu d-block d-lg-none"></div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</header>
	<?php if (is_home()) : ?>

		<!-- header-end -->
		<div class="slider_area">
			<?php
			// Custom query to retrieve the last created banner post
			$args = array(
				'post_type'      => 'banner',
				'posts_per_page' => 1,
				'orderby'        => 'date',
				'order'          => 'DESC'
			);
			$banner_query = new WP_Query($args);
			if ($banner_query->have_posts()) :
				while ($banner_query->have_posts()) : $banner_query->the_post();
			?>
					<div class="single_slider  d-flex align-items-center slider_bg_1">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-lg-7 col-md-6">
									<div class="slider_text">
										<h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s"><?php echo get_post_meta(get_the_ID(), 'heading', true); ?></h5>
										<h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s"><?php echo get_post_meta(get_the_ID(), 'sub_heading', true); ?></h3>
										<p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s"><?php echo get_post_meta(get_the_ID(), 'paragraph', true); ?></p>
											<div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
												<a href="<?php echo esc_home_url(); ?>/upload-resume" class="boxed-btn3">Upload your Resume</a>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<p>No banners found.</p>
			<?php
			endif;
			?>
			<div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/img/banner/illustration.png'); ?>" alt="">
			</div>
		</div>
	<?php endif; ?>