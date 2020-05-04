<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" class="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-lg navbar-dark">

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
				
                        <a class="navbar-brand p-0" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
<!--							--><?php //bloginfo( 'name' ); ?>
							<svg class="heroblock__svg" xmlns="http://www.w3.org/2000/svg" width="150" height="100%" viewBox="0 0 2949.2 1105.3"><path d="M519 119H367l-1-1 1-1h152l1 1-1 1m3-6H364c-2 0-4 2-4 5 0 2 2 4 4 4h158c2 0 4-2 4-4 0-3-2-5-4-5m-3 38H367l-1-2 1-1h152l1 1-1 2m7-2c0-2-2-4-4-4H364c-2 0-4 2-4 4 0 3 2 5 4 5h158c2 0 4-2 4-5m-113-18a2 2 0 11-1 5 2 2 0 011-5m13 0a3 3 0 110 5 3 3 0 010-5m13-1l3-1h2l3 1 1 2v3l-1 2-3 1h-2l-3-1-1-2v-3l1-2m21 1a3 3 0 110 5 3 3 0 010-5m13 0a2 2 0 110 5 2 2 0 010-5m-30 11h76l2-3c-3-4-1-9 0-11l-2-3H367l-2 3c1 2 2 7 0 11l2 3zm6-106c0-5-3-11-4-14-1-2-3-2-4 0-1 3-4 9-4 14 0 7 3 10 5 11h2c2-1 5-4 5-11"/><path d="M400 93c2 2 6 5 11 5l1 1v1c1 2 0 3-1 3h-19l-1-2-1-2s5-1 7-6c1-1 3-2 3 0m-14-38c0-6 1-12 3-15h3c2 2 5 7 6 13s-2 9-3 11h-2c-2-1-6-3-7-9m59 33c1 3 5 8 11 10 1 0 2 1 1 2v1l-2 2h-24l-2-2v-1c-1-1 0-2 1-2 6-2 10-7 11-10h4m-13-52c0-10 7-20 9-24h3c3 4 9 14 10 24 0 11-8 15-10 16h-2c-2-1-10-5-10-16m43 62c5 0 8-3 10-5 1-2 3-1 3 0 2 5 8 6 8 6l-1 2-1 2h-19c-1 0-2-1-2-3l1-1 1-1m13-45c1-6 4-11 6-13h3c1 3 3 9 2 15 0 6-4 8-6 9h-2c-1-2-5-5-3-11M341 28l2 6v1c3 2 19 16 9 29l11 39v5l2 2h156l2-2v-5l11-39c-11-15 9-29 9-29l2-7c1-2-1-3-3-2-23 18-19 34-17 39v2l-7 3v2l4 8v1c-3 13-13 17-16 17l-2 2v2a2 2 0 01-3-1v-2l-1-2c-7-2-7-9-7-11l1-1 5-5 1-3-4-6v-3c16-11 6-32 2-38l-2-1c-20 20-13 34-10 38v3l-6 4-1 2 4 7v1c-2 10-10 11-13 12l-2 1-1 5-2 1h-2l2-7-1-2c-11-4-14-13-15-16l1-1 6-9v-2l-6-7v-3c23-16 0-47-6-55h-2c-7 8-29 39-6 55v3l-6 7v2l6 9 1 1c-1 3-4 12-15 16-1 0-2 1-1 2l2 7h-3l-1-1-1-5-2-1c-3-1-11-2-13-12v-1l4-7-1-2-6-4v-3c3-4 11-19-10-38l-2 1c-4 6-14 27 1 38 1 1 2 2 1 3l-4 6 1 3 5 5 1 1c0 2 0 9-7 11l-1 2v2a2 2 0 01-3 1l-1-2-1-2c-3 0-13-4-16-17v-1l4-8v-2l-7-3-1-2c3-5 7-21-16-39-2-1-4 0-3 2"/><path d="M352 51c-1-7-8-11-8-11l7 21s2-4 1-10m183 10l7-21s-7 5-8 11c-1 7 1 10 1 10M88 275h26v-48H44v145l44-44zm0 746V742v-1l-43-42-1 1v368h257l-47-47zm701-273v273H629l-47 47h252V703zm0-473v52l45 45V227h-70v48z"/><path d="M802 643c-10-56-46-99-46-99l29-5c27 38 23 85 20 104 0 2-3 2-3 0m-27 72c-12 65-32 107-32 107s-22-188-70-206h-1c4 16 0-16 35 93 0 2-2 3-3 2-20-18-81-83-62-157 1-3 5-5 8-3 21 14 87 66 96 168h3c5-28 13-120-97-209-1-1 0-3 1-3 31 11 148 63 122 208m-118 76c-67-56-63-102-59-117 0-2 2-2 2 0 7 42 49 72 66 81 2 1 3-1 2-3-70-86-60-143-54-162 1-2 4-2 4 0 24 140 110 133 94 238-11 51-1 79 4 89 0 2-1 3-3 2-56-30-32-107-56-128m-25 144c-7 19-67 85-84 104-2 2-5 1-4-2 5-40 41-83 41-83 9-11 32-36 34-64 5-56-39-110-51-123-1-2-4-1-5 0-9 18-8 48-8 54 8 70-14 88-43 144-2 3 2 5 4 3l34-44c27-39 29-64 22-95 0-3 3-4 5-2 17 37 34 78-21 127-63 57-87 115-87 115-17-84 64-142 55-197-17-100 31-148 45-159 2-1 4 0 5 2 22 88 100 90 58 220m-186 66c-3 6-3 18-15-6-12-40-17-38-27-55-40-69-11-100-1-112 1-1 3 0 3 1-5 69 29 107 35 113h2c38-52 37-103 36-114l2-1c43 34-34 169-35 174m-29 58c0 3-4 4-6 1-9-18-35-62-82-106-59-53-39-97-21-135 1-2 3-1 3 0-1 21-1 75 11 95 1 1 3 1 3-1 0-11 0-38 7-91 2-21-4-38-14-55-1-2-4-2-5 0-10 13-49 69-47 123 2 28 24 53 33 64 0 0 35 41 41 80 1 4-3 6-6 4-17-17-60-61-81-103-32-63 3-124 9-137 14-32 34-35 49-84 0-2 2-2 3-1 12 13 63 70 45 145-15 83 66 124 58 201M227 792c-30 29-8 95-53 125-2 2-5 0-5-3 4-13 11-42 4-86-17-106 74-94 92-240 0-2 2-2 3-1 5 16 19 73-54 168-1 1 0 2 1 1 14-7 62-44 68-91h2c6 12 18 58-58 127m-87 17c-1 3-5 3-6 0-7-21-20-65-27-95-23-132 74-189 116-207 3-1 5 3 3 5-89 73-98 152-96 190 1 4 6 4 6 0 14-86 82-140 99-152 2-1 4 0 4 2 15 79-38 138-59 157-2 2-5 0-5-3 12-39 25-67 32-81 2-3-2-6-4-4-40 33-58 148-63 188M76 631c-2-23-3-66 23-91l2-1 23 4c2 0 3 3 1 5-9 11-33 42-43 84-1 3-5 3-6-1M44 487c-3-2-2-5 1-6 20-3 75-18 122-93 57-98 156-46 156-46-58-3-101 21-118 53-31 54-82 85-105 91-3 1-3 6 1 6 28-4 69-19 118-81 5-7 45-49 98-42-28-1-96 105-127 129-52 44-124 3-146-11m43-79c14-9 50-33 68-68 1-2 0-4-2-4h-35s26-34 87-13c0 0-24 14-51 52a92 92 0 01-66 36c-1 0-2-2-1-3m49-174s14 19 132 13c0 0 85-7 110 62 0 2-2 3-4 2-10-12-32-30-78-39-10-2-96-3-124-8 0 0 6 18 96 19 0 0 67 0 92 49 2 3-2 7-5 5-16-11-50-26-117-27-32-1-91-21-102-76m237-3l-10-15c-1-1 0-2 1-2 17 11 69 53 54 128 0 2-3 2-4 0-7-28-30-111-151-128v-2c22 0 82 3 108 21l2-2m10-54c23-4 51 11 59 22h2c12-11 44-29 62-23-13 8-47 36-63 137h-1l-1-26c-8-63-47-100-58-110m137 36c-14 18-9 21-9 21 56-25 92-23 106-20v3c-18 2-65 12-94 34-59 48-42 108-57 118-13 9-45 22-17-2 11-9 15-14 14-27-11-76 39-117 55-129l2 2m223 25c3-1 5 1 4 3-14 50-70 68-101 69-79 1-112 23-123 32-1 1-3 0-2-2 21-58 95-57 95-57 66-1 87-10 94-16 1-1 0-3-1-2-32 4-111 5-121 7-44 4-75 35-86 47-1 2-3 1-2-1 21-77 116-71 116-71 83 5 116-4 127-9m18 98h-27c-3 0-5 3-4 6 14 23 50 52 65 64 3 1 1 5-2 5-19-3-45-12-63-36-19-28-39-42-48-48-2-2-2-5 1-6 43-13 70 4 79 12 2 1 1 3-1 3M447 792c-32 1-69-37-79-48-1-2 0-4 1-5 12-3 50-17 66-35 3-3 7-3 10 0 8 9 27 26 64 33 4 1 6 5 4 8-8 15-37 47-66 47m-16 52c0-25 23-34 29-36l1 1c-5 8-7 33-8 48s-16 59-15 53c5-30-7-60-7-66m107-241c15-4 92 14-6 66-1 1 0 3 1 2 10-1 29-4 47-11 0 0 1 18-40 26-1 1-2 3 0 4 3 2 9 5 17 7 2 1 3 4 1 5-8 10-32 33-68 11-83-49 4-52 17-102 1-2-2-4-4-3-10 7-36 20-60 20-31 0-46-9-63-20-1-2-4 0-3 2 7 50 100 54 18 103-37 22-61-1-69-11-1-1 0-4 2-5l16-7c2-1 1-3-1-4-28-5-35-16-37-22-1-1 1-3 2-3 18 6 35 9 44 11 1 0 2-2 1-3-100-53-21-70-6-66l1-1c-4-29-22-47-31-55 0 0-2 1-1 2 12 20 10 32 9 35l-1 1c-73-26-95-74-28-170 50-71 133-8 146 5h4c13-13 97-76 142-5 64 99 43 144-28 170 0 0-15 2 8-36 1-1-1-2-2-1-9 8-26 26-29 54l1 1m300-121c3 0 4 4 2 6-24 15-95 53-145 10-29-22-90-115-121-128l1-2c49-3 86 37 90 43 63 76 109 82 128 80 2-1 2-3 0-4-19-3-66-19-113-92-26-31-56-53-111-53-1 0-2-3 0-3 23-10 101-23 146 51 57 75 104 89 123 92m-40 48c42-20 71-44 84-55 2-2 1-6-3-6-80-3-106-40-101-42 36 6 57-3 67-8 2-2 2-5-1-6-74-29-85-62-85-62 4-2 25 4 37 7 2 0 4-2 2-4-24-36-51-48-63-52-3-1-4-4-2-7 28-27 27-65 26-78-1-2-3-3-4-2-31 22-93 18-112 16-2-1-3-4-1-5 8-5 22-9 30-10v-3c-66-24-128-9-128-9 1-5 6-11 10-15 2-1 0-4-2-3-26 4-43 14-53 21-1 1-2-1-1-2 15-19 28-30 34-34 2-2 1-4-1-5-60-11-89 12-89 12s-18-22-87-12c-3 1-4 4-1 6 7 5 20 17 36 37l-1 1c-8-7-26-19-56-24-2-1-4 2-2 3 3 4 7 9 9 14l-1 1c-10-2-62-12-119 7-3 1-3 6 0 7 7 1 14 3 19 6 4 2 3 7-1 7-19 2-67 4-106-13-5-2-11 2-10 7 1 18 7 52 36 76 0 0-39 3-73 55-1 1 0 3 2 2 10-3 34-9 38-7 0 0-10 33-84 62-3 1-3 4-1 6 10 5 31 13 67 8 4 2-33 38-104 42-3 0-4 3-2 5 10 9 37 32 80 53 1 1 2 3 1 4-9 12-38 61-8 147 1 3 5 3 5 0 2-7 5-15 8-9 0 0 10 119 49 192 2 2 5 2 6-1 3-11 9-33 14-26 0 0 18 51-14 101-1 2 0 5 2 5 14 0 52-6 72-57 2-3 6-2 6 1 2 24 12 71 54 116 51 54 64 64 70 75 1 2 4 2 5-1 3-14 8-44 0-69 0 0 38 34 56 98 1 3 5 3 7 1 6-11 21-36 18-81-1-10 2-5 4-2 2 1 4 3 6 8 0 1 3 2 4 0l5-5c1 46 12 69 19 79 1 3 6 2 7-1 14-50 41-81 52-92 1-2 3 0 3 1-6 24-1 52 2 64 0 3 3 3 4 1 6-12 18-20 70-76 46-49 52-99 52-121 0-2 3-2 3-1 19 54 58 61 75 62 3 0 5-4 4-7-31-49-14-99-14-99 5-6 8 7 10 18 1 4 6 5 8 2 41-67 50-183 50-183 1-1 3 6 5 12 1 2 5 2 6 0 36-119-9-153-9-153"/><path d="M373 500c-3 3-13 11-21 8-14-6-11-20-11-20l11 2c1 0 1 11 3 12l9-9 9 4c2 1 2 2 0 3m28-22c-4 3-9 6-15 8-17 0-24-18-92-5v3c7 2 20 8 22 18l4 8c13 18 50 7 64 5 9 3 18 28 21 37h1c2-7 4-25-7-45-2-3-2-7-1-11l5-17c0-1-1-2-2-1m133 30c-11 4-20-7-22-11l1-2c3-2 12-3 13-3 2 0 2 10 4 9 2 0 5-10 6-11l11-2 1 1c-1 2-2 16-14 19m54-27c-66-12-73 5-89 5-7-1-12-5-15-8-1-1-3 0-2 1l5 18c1 3 0 6-1 9-9 16-11 36-11 45 0 2 1 2 1 1 5-11 15-34 24-36 6 1 47 16 65-6l3-9c3-14 13-15 20-17v-3m481-8h-1l-21 96h42zm34 163l-9-41h-51l-10 41h-33l48-194h42l47 194zm139 0l-55-137v137h-29V442h37l55 137V442h29v194zm161 0l-55-137h-1v137h-29V442h37l55 137h1l-1-137h29v194zm125-163h-1l-21 96h43zm34 163l-9-41h-51l-10 41h-33l48-194h42l47 194zm181-137l-2-15c-2-4-4-7-7-9-2-2-5-4-9-4l-10-2h-18v60h18c8 0 15-3 20-8s8-12 8-22m2 137l-30-83h-18v83h-32V442h55c8 0 16 1 23 3a44 44 0 0128 27c3 7 4 15 4 25 0 8-1 14-3 20-1 6-4 11-7 15l-9 9c-4 3-8 4-11 5l35 90zm60 0V442h87v29h-55v51h51v27h-51v57h58v30zm170-163h-2l-21 96h43zm34 163l-10-41h-51l-10 41h-32l48-194h42l47 194zm54 0V442h33v163h54v31zm155 0V442h87v29h-56v51h51v27h-51v57h58v30zm195-157a33 33 0 00-36-11 22 22 0 00-13 13c-2 4-2 8-2 13 0 8 2 14 7 19 5 4 11 8 20 12l14 9c5 3 9 6 13 11 4 4 8 9 10 15 3 6 4 13 4 22s-1 18-4 25-7 13-12 18-11 9-18 12l-21 3a71 71 0 01-52-22l18-24a45 45 0 0033 17c7 0 13-3 17-7 5-5 7-12 7-20 0-9-3-15-8-20-6-5-13-10-21-14l-15-9c-4-3-9-6-12-11-4-4-7-9-9-15-2-5-3-12-3-20 0-10 2-19 5-26s7-13 13-18c5-5 11-8 17-11a69 69 0 0146 1c8 4 15 9 20 15zm94-9v166h-33V470h-36v-28h105v28zm100 3h-1l-21 96h43zm34 163l-9-41h-51l-10 41h-33l48-194h42l48 194zm98-166v166h-32V470h-36v-28h105v28zm56 166V442h87v29h-56v51h51v27h-51v57h58v30zm154-232H935v-31h2014zm0 299H935v-31h2014z"/></svg>
						</a>

                <!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
