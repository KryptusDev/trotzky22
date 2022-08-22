<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>

<?php
$navbar_scheme   = get_theme_mod('navbar_scheme', 'navbar-light bg-light'); // Get custom meta-value.
$navbar_position = get_theme_mod('navbar_position', 'static'); // Get custom meta-value.

$search_enabled  = get_theme_mod('search_enabled', '1'); // Get custom meta-value.
?>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<a href="#main" class="visually-hidden-focusable"><?php esc_html_e('Skip to main content', 'trotzky22'); ?></a>

	<div id="wrapper">
		<header>
			<nav id="header" class="navbar navbar-expand-md <?php echo esc_attr($navbar_scheme);
															if (isset($navbar_position) && 'fixed_top' === $navbar_position) : echo ' fixed-top';
															elseif (isset($navbar_position) && 'fixed_bottom' === $navbar_position) : echo ' fixed-bottom';
															endif;
															if (is_home() || is_front_page()) : echo ' home';
															endif; ?>">
				<div class="container">
					<a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
						<?php
						$header_logo = get_theme_mod('header_logo'); // Get custom meta-value.

						if (!empty($header_logo)) :
						?>
							<img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
						<?php
						else :
							echo esc_attr(get_bloginfo('name', 'display'));
						endif;
						?>
					</a>

					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'trotzky22'); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div id="navbar" class="collapse navbar-collapse">
						<?php
						// Loading WordPress Custom Menu (theme_location).
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'container'      => '',
								'menu_class'     => 'navbar-nav ms-auto',
								'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
								'walker'         => new WP_Bootstrap_Navwalker(),
							)
						);

						if ('1' === $search_enabled) :
						?>
							<!-- <form class="search-form my-2 my-lg-0" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
								<div class="input-group">
									<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e('Search', 'trotzky22'); ?>" title="<?php esc_attr_e('Search', 'trotzky22'); ?>" />
									<button type="submit" name="submit" class="btn btn-outline-secondary"><?php esc_html_e('Search', 'trotzky22'); ?></button>
								</div>
							</form> -->
							<button class="btn btn-revo-red	" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearchExternal" aria-controls="navbarSearchExternal" aria-expanded="false" aria-label="Toggle search field">
								<i class="bi bi-search"></i>
							</button>
						<?php
						endif;
						?>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container -->
			</nav><!-- /#header -->
			<div class="container-fluid collapse spy-3 border-top bg-revo-red" id="navbarSearchExternal">
				<form class="form-inline d-flex flex-column flex-sm-row justify-content-end gap-2 p-3" method="get" action="<?php echo esc_url(home_url('/')); ?>">
					<input class="form-control" type="search" placeholder="Search" aria-label="Search" name="s">
					<button class="btn btn-outline-light type=" submit">Search</button>
				</form>
			</div>
		</header>

		<main id="main" class="" <?php if (isset($navbar_position) && 'fixed_top' === $navbar_position) : echo ' style="padding-top: 100px;"';
											elseif (isset($navbar_position) && 'fixed_bottom' === $navbar_position) : echo ' style="padding-bottom: 100px;"';
											endif; ?>>
			<?php
			// If Single or Archive (Category, Tag, Author or a Date based page).
			if (is_single() || is_archive()) :
			?>
				<!-- <div class="row">
					<div class="col-md-8 col-sm-12"> -->
			<?php
			endif;
			?>