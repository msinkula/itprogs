<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
 ?>
         </div>
        </section>
        <footer id="ft">
            <div class="wrapper">
            	<nav id="site-map">
                	<div>
                        <h3>
                            <a href="<?php bloginfo('url'); ?>/about/">ABOUT</a>
                        </h3>
						<?php wp_nav_menu( array( 
                        'menu' => 'About',
                        'container' => '',
                        )); ?>                                                  
                    </div>
                    <div>
                        <h3>
                            <a href="<?php bloginfo('url'); ?>/announcements/">ANNOUNCEMENTS</a>
                        </h3>
						<?php wp_nav_menu( array( 
                        'menu' => 'Announcements',
                        'container' => '',
                        )); ?>                          
                    </div>
                    <div>
                        <h3>
                            <a href="<?php bloginfo('url'); ?>/programs/">PROGRAMS</a>
                        </h3>
						<?php wp_nav_menu( array( 
                        'menu' => 'Programs',
                        'container' => '',
                        )); ?>  
    				</div>
                    <div>
                        <h3>
                            <a href="<?php bloginfo('url'); ?>/classes/">CLASSES</a>
                        </h3>
						<?php wp_nav_menu( array( 
                        'menu' => 'Classes',
                        'container' => '',
                        )); ?>                                                 
    				</div>
                    <div>
                        <h3>
                            <a href="<?php bloginfo('url'); ?>/resources/">RESOURCES</a>
                        </h3>
						<?php wp_nav_menu( array( 
                        'menu' => 'Resources',
                        'container' => '',
                        )); ?>  
                    </div>
                    <div>
	                    <h3><a href="<?php bloginfo('url'); ?>/contact/">CONTACT</a></h3>
                	    <ul>
                  	     <li id="linked" class="icon"><a href="http://www.linkedin.com/groups?home=&gid=2642569&trk=anet_ug_hm&goback=.myg" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/lnkedIn-icon.png" alt="LinkedIn" width="33" height="33"/></a><span>LinkedIn</span></li>
                         <li id="rss" class="icon"><a href="javascript:;" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/rss.png" alt="RSS" width="33" height="33"/></a><span>RSS</span></li>
                 	    </ul>
                     <h4><?php wp_loginout(); ?></h4>   
                    </div>
                </nav>
                <nav id="credits">
                	<p>1701 Broadway | Seattle 98122 | 206-934-3800 | &copy;2012 - 2012 <a href="http://www.seattlecentral.org/">Seattle Central Community College.</a> All rights reserved</p>
                    <p><a href="<?php bloginfo('url'); ?>/contact/">Contact Us</a> | <a href="http://seattlecentral.edu/sccc/disclaimer.html">Disclaimer</a> | <a href="http://seattlecentral.edu/disability-support/index.php">Disability Resources</a> | <a href="http://seattlecentral.edu/policy/index.php">Policies</a> | <a href="http://sccdweb.sccd.ctc.edu/Common_files/privacy/privacyCIS.html">Privacy</a> | <a href="http://seattlecentral.edu/policy/nondisc.php">Equal Opportunity Institution</a></p>
                    <p>One of the Seattle Community Colleges <a href="http://www.seattlecolleges.com/">District</a> | <a href="https://northseattle.edu/">North</a> | <a href="http://southseattle.edu/">South</a> | <a href="http://seattlecentral.edu/">Central</a> | <a href="http://sviweb.sccd.ctc.edu/">SVI</a></p>
                    <p>Website designed by <a href="http://www.rebeccahosford.com/">Rebecca Hosford</a> &amp; Phillip Balsley | Developed by Jon Manning</p>
                </nav>
            </div>
            <!-- /wrapper -->
        </footer>
        <!-- /ft -->
   	</div>
    <!--/torso-->

    <?php wp_footer(); ?>
    </body>
</html>