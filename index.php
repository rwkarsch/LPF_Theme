<?php

/*

Template Name: Index

*/

get_header(); ?>
<body>
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
		<!-- <img src="<?php// bloginfo('stylesheet_directory'); ?>/images/home/rotate.php" />  -->
    	 <?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow("home-page-slideshow", ""); } ?>   
    </div>
    <div id = "phone-area">215.576.1814</div>
    <div id = "facebook-area">
   	<a href="http://instagram.com/lapetiteevents" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/homepage_images/instagram.png" width="20" height="20" alt="Instagram"/></a>
    <a href="http://www.pinterest.com/lapetiteevents/" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/homepage_images/pinterest.png" width="20" height="20" alt="Pinterest" /></a>
    <a href="http://www.twitter.com/lpfevents" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/homepage_images/twitter.png" width="20" height="20" alt="Twitter" /></a>
    <a href="http://www.facebook.com/lapetiteevents" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/homepage_images/fb.jpg" width="20" height="20" alt="Twitter" /></a>
    
     </div>
     
         	<!-- <img src="<?//php bloginfo('stylesheet_directory'); ?>/images/product_images/retouched/home_courtkevinwsg.gif" alt="Invitations" usemap="#invitemap2"/>
            <map name="invitemap2">
  				<area shape="rect" coords="439, 230, 589, 310" alt="Say I Do" href="http://www.lapetitefleuronline.com/fleurish">
            </map>-->
</div>
</body>
</html>

