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

    <!-- Begin aside -->
    <?php get_sidebar('subnav'); ?>
    <!-- End aside -->

	<section id="middle_content" role="main">
    
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
		<h1><?php the_title(); ?></h1>
			<div class="entry">
			 <?php if ( has_post_thumbnail()) : ?>
               <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
               <?php the_post_thumbnail('full'); ?>
               </a>
             <?php endif; ?>               
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
    	</div>
        
        
        
        <!-- following section populates overview pages with post_meta cusotm fields and other data from the child pages, to form and overview-list page -->
		<?php
        $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order", 'OBJECT'); ?>
        <?php if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?>
            <?php 
                if ( get_the_post_thumbnail($pageChild->ID, 'thumbnail', true) ) 
                {
					echo '<article class="subs with-image">';
                    echo '<a href="' . get_permalink($pageChild->ID) . '" rel="bookmark">';
                    echo get_the_post_thumbnail($pageChild->ID, 'thumbnail') . '</a> ';
                }
                else
                {
                    echo '<article class="subs">';
                }
                ?>  				   
                
            <header>
                <h2><a href="<?php echo  get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php echo $pageChild->post_title; ?>">
                <?php echo $pageChild->post_title; ?></a>
                <?php
                    if ( get_post_meta($pageChild->ID, 'title', true) ) 
                    {
                        echo '<span>' . get_post_meta($pageChild->ID, 'title', true) . '</span>';
                    }                
                ?>
                </h2>
            </header>	                                 
				                            
                <?php	
                    if ( get_post_meta($pageChild->ID, 'overview-excerpt', true) ) 
                    {
                        echo '<p>' . get_post_meta($pageChild->ID, 'overview-excerpt', true) . '<span><a href="' .get_permalink($pageChild->ID) . '" rel="bookmark" title="' . $pageChild->post_title . '" class="read-more">  Read More &gt;&gt;</a></span></p>';
                    }
				?>

        </article>					
        <?php endforeach; endif;
        ?>

        
	</section><!-- End Content --> 



<?php get_footer(); ?>
