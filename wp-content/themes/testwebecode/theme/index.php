<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no `home.php` file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test_webecode
 */

get_header();
?>

	<section class="flex w-full h-full justify-center items-center">
		<h1 class="text-5xl text-slate-900">Hello</h1>
	</section>

<?php
get_footer();
