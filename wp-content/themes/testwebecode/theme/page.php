<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test_webecode
 */

get_header();
?>

<main class="w-full bg-[#FAFAFA]">

    <div class="flex flex-col gap-20">
        <?php the_content() ?>
    </div>

</main>

<?php
get_footer();
