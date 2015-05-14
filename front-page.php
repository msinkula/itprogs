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

<div id="home-content">

        <section id="slideshow">
        
 				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
                <div class="post" id="post-<?php the_ID(); ?>">
                       <?php the_content(); ?>            
                </div>        
                <?php endwhile; endif; ?>         
        
<!--            <div class="captions">
            	<h2>Welcome to Seattle Central IT Programs</h2>
                <p class="caption-text">Some stuff to say about this slide, eg: a welcome slide, a slide about Programs, a slide about Classes,a slide about Groups,etc.</p>
                <p class="learn-more"><a href="javascript:;">Learn More &gt; &gt;</a></p>
            </div>
            <div class="slide-images">
            	<img src="<?php/* bloginfo('template_url');*/ ?>/images/ComputerLab-edit.jpg" alt="Computer Lab" />
            </div>-->
            
        </section>


    <aside id="alliances">
    <?php if ( is_active_sidebar( 'home_left' ) ) : ?>

    <?php dynamic_sidebar( 'home_left' ); ?>

    <?php else : ?>

    <!-- Create some custom HTML or call the_widget().  It's up to you. -->

    <?php endif; ?>  
    
    </aside>

    <section id="announcements">

    <header>
        <h1>ANNOUNCEMENTS</h1>
    </header>

	<?php
    $loop = new WP_Query('post_type=post');
    if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
    <article>
        <header id="post-<?php the_ID(); ?>">
        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        <p class="meta">Posted in <?php the_category(', ') ?> on <?php the_time('M d, Y') ?> by <?php the_author() ?></p>
        </header>
        <div class="entry">
        <?php the_excerpt();?>
        
        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    
        </div>
    </article>
    <?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
    </section>

</div>

<?php get_footer(); ?>
