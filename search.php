<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
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
    <?php if ( is_active_sidebar( 'home_left' ) ) : ?>

    <?php dynamic_sidebar( 'page_left' ); ?>

    <?php else : ?>

    <!-- Create some custom HTML or call the_widget().  It's up to you. -->

    <?php endif; ?>

    </aside>

	<div id="middle_content" role="main">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>


<?php get_footer(); ?>
