<aside id="about-sidebar">
    
		 <?php		 
        if(!$post->post_parent){
            // will display the subpages of this top level page
            $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order&depth=1");
                
            $titlenamer = get_the_title($post->ID);
            $permalink = get_permalink($post->ID);
            
        }else{
            // diplays only the subpages of parent level
            //$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
            
            if($post->ancestors)
            {
                // now you can get the the top ID of this page
                // wp is putting the ids DESC, thats why the top level ID is the last one
                $ancestors = end($post->ancestors);
                $children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order&depth=1");
                // you will always get the whole subpages list
                
                  $titlenamer = get_the_title($ancestors);
                  $permalink = get_permalink($ancestors);		
            }
        }        
        if ($children) { ?> 
          <nav id="about-nav">      
              <h2 id="sub-navigation-head"><a href="<?php echo $permalink; ?>"> <?php echo $titlenamer; ?></a></h2>        
              <ul id="sub-navigation-items">        
              <?php echo $children; ?>        
              </ul>	
          </nav>            
        <?php } ?>                 
      
 
<?php if ( is_active_sidebar( 'page_left' ) ) : ?>

<?php dynamic_sidebar( 'page_left' ); ?>

<?php else : ?>

<!-- Create some custom HTML or call the_widget().  It's up to you. -->

<?php endif; ?> 
 
       
</aside>






