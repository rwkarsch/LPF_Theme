<?php

/*

Template Name: Product_Splash

*/

get_header(); ?>


<div id = "container">
	<div id = "container-header">
  		<a href="http://www.lapetitefleuronline.com">
	        <img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/newlogowebsite.png" alt="Home" />
    	</a>
    </div>
    <div id = "links">
    	<ul><?php wp_list_pages('sort_column=menu_order&include=13,21,23,34&title_li='); ?>
        <li><img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/little-break-graphic.gif" alt="--" /></li>
        <?php wp_list_pages('sort_column=menu_order&include=25,17,9,27,29,1981&title_li='); ?>
        <!--<li><a title="blog" href="http://www.lapetitefleuronline.com/blog" target="_blank">blog</a></li>-->
        </ul>
    </div>
    <div id = "content-home">
  		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/product_images/final-images/FleurishSplash.png" alt="Invitations" usemap="#invitemap"/>
        
        <map name="invitemap">
  			<area shape="rect" coords="2, 151, 100, 321" alt="Say I Do" href="http://www.lapetitefleuronline.com/fleurish/say-i-do">
 			<area shape="rect" coords="116, 215, 265, 354" alt="Marry and Bright" href="http://www.lapetitefleuronline.com/fleurish/marry-and-bright">
  			<area shape="rect" coords="266, 196, 378, 368" alt="Just Engaged" href="http://www.lapetitefleuronline.com/fleurish/just-engaged">
            <area shape="rect" coords="386, 218, 508, 363" alt="Just Married" href="//www.lapetitefleuronline.com/fleurish/just-merried">
            <area shape="rect" coords="518, 147, 614, 324" alt="Celebrating" href="http://www.lapetitefleuronline.com/fleurish/celebrating">
		</map>
   </div>
    <div id = "facebook-area">
   	&nbsp;<a href="http://instagram.com/lapetiteevents" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/homepage_images/instagram.png" width="20" height="20" alt="Instagram"/></a>
    <a href="http://www.pinterest.com/lapetiteevents/" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/homepage_images/pinterest.png" width="20" height="20" alt="Pinterest" /></a>
    <a href="http://www.twitter.com/lpfevents" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/homepage_images/twitter.png" width="20" height="20" alt="Twitter" /></a>
    <a href="http://www.facebook.com/lapetiteevents" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/homepage_images/fb.jpg" width="20" height="20" alt="Twitter" /></a>
    
     </div>
</div>


<?php /*get_footer();*/ ?>
