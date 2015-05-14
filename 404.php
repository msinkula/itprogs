<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

 /*
Template Name: Resources
*/

get_header(); ?>

<aside id="sidebar">
<?php if ( is_active_sidebar( 'home_right' ) ) : ?>

<?php dynamic_sidebar( 'home_right' ); ?>

<?php else : ?>

<!-- Create some custom HTML or call the_widget().  It's up to you. -->

<?php endif; ?>

</aside>

    <aside id="alliances">
    <?php if ( is_active_sidebar( 'page_left' ) ) : ?>

    <?php dynamic_sidebar( 'page_left' ); ?>

    <?php else : ?>

    <!-- Create some custom HTML or call the_widget().  It's up to you. -->

    <?php endif; ?>

    </aside>


	<section id="middle_content" role="main">

    <nav class="breadcrumbs">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </nav>

    <h2 class="center">
    <br /><br /><br /><br />
    Error 404 - Not Found
    </h2>

	</section><!-- End Content -->

<?php get_footer(); ?>