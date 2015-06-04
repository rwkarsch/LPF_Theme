<?php

/*

Template Name: Portfolio

*/

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<!--[if lte IE 8]>        
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style-ie.css" />
<![endif]-->
<!--[if gt IE 8]>        
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" />
<![endif]-->
<!--[if !IE]><!-->                
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" />
<!--<![endif]--> 
<!-- Favicon -->
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/graphics/favicon.ico" />

<!-- This is the font script -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/lpfevents.font.js" type="text/javascript"></script>
<script type="text/javascript">
			Cufon.replace('#links');
			Cufon.replace('#port-top-left');
			Cufon.replace('#port-top-right');
			Cufon.replace('#port-bottom-left');
			Cufon.replace('#port-bottom-right');
			Cufon.replace('#port-bottom-mid');
			Cufon.replace('#port-top-mid');
</script>

<title>La Petite Fleur  | Philadelphia Wedding and Event Design, Planning, Décor, Flowers, Invitations | <?php echo the_slug(); ?></title>

<?php wp_head() // Do not remove; helps plugins work ?>
</head>
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
        <?php wp_list_pages('sort_column=menu_order&include=25,17,9,27,29&title_li='); ?>
        <li><a title="blog" href="http://www.lapetitefleuronline.com/blog" target="_blank">blog</a></li>
        </ul>
    </div>
        <div id = "content-port">
    <?php 
		   /*  Step 1: Establish the pod object  */
		  $vignette = new Pod('vignette');    
          
		   /*  Step 2: set the parameters to be used in the sql the SQL */
		   $areaname = the_slug();
		   /*$wherecl = substr($areaname, 0, -1);  */
		   		     
		   /*  Step 3: Run the SQL */
		   $vignette->findRecords('vignette_event_name', 6); 
           
		   /*  Step 4: How many rows are we dealing with? */
		   $total_vignettes = $vignette->getTotalRows();
		   ?>
           
           <?php
			   /*  Step 5: Start processing the records */
			   $vign_num = 0;	   
			   if ($total_vignettes>0 ) : ?>
					<?php while ( $vignette->fetchrecord() ) : ?>
						<?php
						// set out variables
						$vign_evnt_nme            = $vignette->get_field('vignette_event_name');
						$vign_pic                 = $vignette->get_field('vignette_photo.guid');
						$vign_slug				  = $vignette->get_field('slug');
						//$serv_short_text          = $services->get_field('service_short_text');
						?>
			   
						<!--- Format the output -->
          
						<?php $vign_num ++; ?>
						<?php switch($vign_num){ 
						 case 1: ?> 
                            	<div id = "port-top-left">
                                <?php break; ?>
                        <?php case 2:  ?>
                                <div id = "port-top-mid">
                                <?php break; ?> 
                         <?php case 3:  ?>   
                         		<div id = "port-top-right">
                                <?php break; ?>                               
                         <?php case 4: ?>      
								<div id = "port-bottom-left">
                                <?php break; ?> 
						 <?php case 5: ?>      
								<div id = "port-bottom-mid">
                                <?php break; ?>	
                         <?php case 6: ?>      
								<div id = "port-bottom-right">
                                <?php break;        	
						}?>
						<div id = "port-pic">
                        
                        	<a href="http://www.lapetitefleuronline.com/<?php echo $areaname."/".$vign_slug; ?>">
                        		<img src="<?php echo $vign_pic; ?>"> 
							</a>
                        </div>    
                        <div id = "port-content">
							<?php echo $vign_evnt_nme ?>
                         </div>
						</div>
    				<?php endwhile; ?>
				 <?php endif; ?>
</div><!-- content end -->
</div><!-- container end -->

<?php get_footer(); ?>            
    	
    
    