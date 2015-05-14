<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

/*
Template Name: Instructor / Staff
*/

get_header(); ?>

<!-- Begin aside -->
<?php get_sidebar('subnav'); ?>
<!-- End aside -->

	<section id="content" role="main">

    <nav class="breadcrumbs">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </nav>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- Begin yellow right-upper link -->          
<aside id="linkback">
<?php
	if ( get_post_meta($post->ID, 'linkback-url', true) ) 
	{
		echo '<a target="_blank" href="' . get_post_meta($post->ID, 'linkback-url', true) . '">' . get_post_meta($post->ID, 'linkback-text', true) . '</a>';
	}
 ?>
<!-- preload hover state background image -->  
 <div id="preload">
	<img alt="small-badge" src="<?php bloginfo('template_url'); ?>/images/linkback-hover.png">
</div> 
 </aside>

		<div class="post" id="post-<?php the_ID(); ?>">
		<h1><?php the_title(); ?>
        <?php
            if ( get_post_meta($post->ID, 'title', true) )
            {
                echo '- <span>' . get_post_meta($post->ID, 'title', true) . '</span>';
            }
        ?>
        </h1>
			<div class="entry">

                <div class="single_image">
                <?php if ( has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full'); ?>
                <?php else : ?>
                <img src="<?php bloginfo('template_url'); ?>/images/no-photo.jpg" alt="No Photo Available" />
                <?php endif; ?></div>

                <div class="single_details">
				<?php
                    if ( get_post_meta($post->ID, 'office_hours', true) )
                    {
                        echo '<p><span>Office Hours:</span> ' . get_post_meta($post->ID, 'office_hours', true) . '</p>';
                    }

                    if ( get_post_meta($post->ID, 'office', true) )
                    {
                        echo '<p><span>Office #:</span> ' . get_post_meta($post->ID, 'office', true) . '</p>';
                    }

                    if ( get_post_meta($post->ID, 'phone', true) )
                    {
                        echo '<p><span>Phone:</span> ' . get_post_meta($post->ID, 'phone', true) . '</p>';
                    }

                    if ( get_post_meta($post->ID, 'email', true) )
                    {
                        echo '<p><span>E-mail:</span> ' . get_post_meta($post->ID, 'email', true) . '</p>';
                    }

                    if ( get_post_meta($post->ID, 'email - 2', true) )
                    {
                        echo '<p><span>Alternate E-mail:</span> ' . get_post_meta($post->ID, 'email - 2', true) . '</p>';
                    }

                    if ( get_post_meta($post->ID, 'website', true) )
                    {
                        echo '<p><span>Website:</span> <a href="'.get_post_meta($post->ID, 'website', true).'" target="_blank">' . get_post_meta($post->ID, 'website', true) . '</a></p>';
                    }

                    if ( get_post_meta($post->ID, 'linkedin', true) )
                    {
                        echo '<p><span>LinkedIn:</span> <a href="'.get_post_meta($post->ID, 'linkedin', true).'" target="_blank">' . get_post_meta($post->ID, 'linkedin', true) . '</a></p>';
                    }

                    if ( get_post_meta($post->ID, 'portfolio', true) )
                    {
                        echo '<p><span>Portfolio:</span> <a href="'.get_post_meta($post->ID, 'portfolio', true).'" target="_blank">' . get_post_meta($post->ID, 'portfolio', true) . '</a></p>';
                    }
				 ?>
				</div>

                <div class="single_content">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

                </div>

			</div>
		<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
    	</div>

	</section><!-- End Content -->



<?php get_footer(); ?>
