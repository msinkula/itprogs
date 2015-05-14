<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
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
		<h1><?php the_title(); ?></h1>
			<div class="entry">
			 <?php if ( has_post_thumbnail()) : ?>
               <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
               <?php the_post_thumbnail('full'); ?>
               </a>
             <?php endif; ?>
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			<?php endwhile; endif; ?>
			<?php edit_post_link('Edit this entry.', '<p class="post-edit-p">', '</p>'); ?>
			</div>
    	</div>

    <?php if(!is_page('programs')): ?>
    <section id="sub-pages">
        <!-- following section populates overview pages with post_meta cusotm fields and other data from the child pages, to form and overview-list page -->
		<?php
        $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order", 'OBJECT'); ?>
        <?php if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?>
        <article class="subs with-image">

            <?php
                if ( get_the_post_thumbnail($pageChild->ID, 'thumbnail', true) )
                {
            ?>
                    <a href="<?=get_permalink($pageChild->ID)?>" rel="bookmark">
                    <?=get_the_post_thumbnail($pageChild->ID, 'thumbnail')?>
                    </a>
            <?php
                } else {
            ?>
                    <a href="<?=get_permalink($pageChild->ID)?>" rel="bookmark">
                    <img src="<?=bloginfo('template_url')?>/images/no-photo.jpg" width="100" alt="No Photo Available" />
                    </a>
            <?php
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

             <div class="details">
				<?php
                    if ( get_post_meta($pageChild->ID, 'office', true) )
                    {
                        echo '<p><span>Office:</span> ' . get_post_meta($pageChild->ID, 'office', true) . '</p>';
                    }

                    if ( get_post_meta($pageChild->ID, 'phone', true) )
                    {
                        echo '<p><span>Phone:</span> ' . get_post_meta($pageChild->ID, 'phone', true) . '</p>';
                    }

                    if ( get_post_meta($pageChild->ID, 'email', true) )
                    {
                        echo '<p><span>E-mail:</span> ' . get_post_meta($pageChild->ID, 'email', true) . '</p>';
                    }

                    if ( get_post_meta($pageChild->ID, 'website', true) )
                    {
                        echo '<p><span>Website:</span> ' . get_post_meta($pageChild->ID, 'website', true) . '</p>';
                    }
				 ?>
				</div>
        </article>
        <?php endforeach; endif;
        ?>
	</section><!-- End Sub-Pages -->
    <?php endif; ?>

	</section><!-- End Content -->


<?php get_footer(); ?>
