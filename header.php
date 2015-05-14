<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html>
<html lang="en">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="description" content="<?php bloginfo('description'); ?>">
<meta name="keywords" content="keywords" />

<!--<title><?php /*wp_title('&laquo;', true, 'right');*/ ?> <?php /*bloginfo('name');*/ ?></title>-->

        <title>
               <?php
                  if (function_exists('is_tag') && is_tag()) {
                     single_tag_title("Tag Archive for &quot;"); echo '&quot; | '; }
                  elseif (is_archive()) {
                     wp_title(''); echo ' | Announcements '; }
                  elseif (is_home()) {
                     echo ' Announcements '; }					 
                  elseif (is_search()) {
                     echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; }
                  elseif (is_404()) {
                     echo 'Not Found | '; } 
                     
                  if ( is_home() || is_archive() || is_page('Welcome'))  {
                     bloginfo('description'); echo ' | '; 
                     }else {
                        if ( is_single() || is_page()) { 
                        the_title(); echo ' | '; 
                        if ( is_page() && $post->post_parent ) {  
                        $parent_title = get_the_title($post->post_parent); echo $parent_title; print ' | '; }			         	 
                     }} 
                     
                    bloginfo('name'); echo ' | Seattle, WA';	 
                     
                  if ($paged>1) {
                     echo ' | page '. $paged; }
               ?>
        </title>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/styles.css" type="text/css" media="all" />
<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie8.css" media="all"/>
<![endif]-->
<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie7-and-down.css" media="all"/>
<![endif]-->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_enqueue_script('jquery'); // you can either let wp insert this for you or just delete this and add it directly to your template
?>

<script src="<?php bloginfo('template_url'); ?>/javascript/h5.js"></script>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div id="torso">

        <header id="hd">
            <div class="wrapper">
                <h1 id="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Information Technology Programs" height="140" width="400"/></a><span>Information Technology Programs</span></h1>
                <section id="head-right">
                 <?php get_search_form(); ?> 
                    <h2 id="sccc-logo"><a href="http://www.seattlecentral.org/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/color-horizontal-webSMALL.png" alt="Seattle Central Community College" /></a><span>Seattle Central College</span></h2>
                	<h3><?php wp_loginout(); ?></h3>
                </section>
                <nav id="main-nav">
                	<?php wp_nav_menu(array(
                		'theme_location' => 'main-menu',
                		'menu' => 'main-menu'
                	)); ?>
                </nav>

            </div>
            <!-- /wrapper -->
        </header>
        <!-- /hd -->
<section id="bd">
    <div class="wrapper">        