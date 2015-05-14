<form method="get" action="<?php bloginfo('url'); ?>/">
    <input height="30" width="30" type="image" id="search-button" alt="Search!" src="<?php bloginfo('template_url'); ?>/images/search_button.png">
    <input type="text" id="s" name="s" class="searchform" value="<?php the_search_query(); ?>">    
</form>
