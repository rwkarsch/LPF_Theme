<?php

/*

Template Name: About Grid

*/

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" />  

<!-- This is the font script -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/Helv-Joey.font.js" type="text/javascript"></script>
<script type="text/javascript">
			Cufon.replace('#links');
			Cufon.replace('#grid-top-left');
			Cufon.replace('#grid-top-right');
			Cufon.replace('#grid-bottom-left');
			Cufon.replace('#grid-bottom-right');
</script>

<title><?php echo the_slug(); ?></title>

<?php wp_head() // Do not remove; helps plugins work ?>
</head>
<body>

<div id = "container">
	
    <div id = "container-header">
  		<img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/newlogowebsite.png" alt="Home" />
    </div>
    
    <div id = "links">
    	<ul><?php wp_list_pages('sort_column=menu_order&include=13,15,21,23,34&title_li='); ?>
        <li><img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/little-break-graphic.gif" alt="--" /></li>
        <?php wp_list_pages('sort_column=menu_order&include=17,25,9,27,29,31&title_li='); ?>
        </ul>
    </div>
    <div id = "content">
    <?php 
		   /*  Step 1: Establish the pod object  */
		  // $services = new Pod('services');  <--- depreciated in pods 1.0
		  //$services = pods('services');    
          
		   /*  Step 2: set the parameters to be used in the sql the SQL */
		   $areaname = the_slug();
		   echo $areaname;
		   /*$wherecl = substr($areaname, 0, -1);  */

		   /* $params['where'] = 'service_category.name like "%'.$wherecl.'%"'; */
		  // $params['where'] = 'service_category.name = "'.$areaname.'"';
		  
		  // all of this is new
		  $params = array(
		  	'where' => 'service_category.name = "'.$areaname.'"',
			'limit' => 4  
			);
			
			$services = pods('servcies', $params);
			
		   /*  Step 3: Run the SQL */
		   // $services->findRecords($params, 4); <--- depreciated in pods 1.0
		   //$services->find($params, 4);
           
		   /*  Step 4: Haw many rows are we dealing with? */
		   //$total_services = $services->getTotalRows(); <--- depreciated in pods 1.0
		   $total_services = $services->total();
		   ?>
           
           <?php
			   /*  Step 5: Start processing the records */
			   $serv_num = 0;	   
			   if ($total_services>0 ) : ?>
					<?php //while ( $services->fetchrecord() ) <-- depreciated in pods 1.0
                     while ( $services->fetch	() ) : ?>
						<?php
						// set out variables
						//$serv_type                = $services->get_field('slug'); <--depreciate in pods 1.0
						$serv_type                = $services->field('slug');
						$serv_pic                 = $services->field('service_pic.guid');
						$serv_short_text          = $services->field('service_short_text');
						?>
			   
						<!--- Format the output -->
          
						<?php $serv_num ++; ?>
						<?php switch($serv_type){ 
						 case "about-leigh-karsch": ?> 
                            	<div id = "grid-top-left">
                                    <div id = "grid-pic">
                        					<img src="<?php echo $serv_pic; ?>"> 
                                    </div>   

								 <?php break; ?>
                        <?php case "the-team":  ?>
                                <div id = "grid-top-right">
                                    <div id = "grid-pic">
                        				<a href="http://lpfevents.com/<?php echo $areaname."/".$serv_type; ?>">
                        					<img src="<?php echo $serv_pic; ?>"> 
										</a>
                                    </div>   
								 <?php break; ?>
                         <?php case "style":  ?>   
                         		<div id = "grid-bottom-left">
                                    <div id = "grid-pic">
                        					<img src="<?php echo $serv_pic; ?>"> 
                                    </div>   

								 <?php break; ?>
                         <?php case "our_company": ?>      
								<div id = "grid-bottom-right">
                                	<div id = "grid-pic">
                        				<a href="http://lpfevents.com/boutique">
                        					<img src="<?php echo $serv_pic; ?>"> 
										</a>
                                    </div>   
								<?php break; ?>
                                <?php
						}?>
                        
                        <div id = "grid-content">
							<?php echo $serv_short_text ?>
                         </div>
						</div>
    				<?php endwhile; ?>
				 <?php endif; ?>
</div><!-- content end -->
</div><!-- container end -->

<?php get_footer(); ?>            
    	
    
    