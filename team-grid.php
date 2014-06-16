<?php

/*

Template Name: TeamGrid

*/

?>
<!DOCTYPE html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style-the-team.css" type="text/css" />  
<!-- Favicon -->
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/graphics/favicon.ico" />
<!-- This is the font script -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/lpfevents.font.js" type="text/javascript"></script>
<script type="text/javascript">
			Cufon.replace('#links');
			Cufon.replace('#tgrid-top-left');
			Cufon.replace('#tgrid-top-right');
			Cufon.replace('#tgrid-mid-left');
			Cufon.replace('#tgrid-mid-right');
			Cufon.replace('#tgrid-bottom-left');
			Cufon.replace('#tgrid-bottom-right');
</script>

<title>La Petite Fleur  | Philadelphia Wedding and Event Design, Planning, Décor, Flowers, Invitations | <?php echo the_slug(); ?></title>

<?php wp_head() // Do not remove; helps plugins work ?>
</head>
<body>

<div id = "container">
	
    <div id = "container-header">
		<a href="http://lpfevents.com">
	        <img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/newlogowebsite.png" alt="Home" />
    	</a>    
    </div>
    
    <div id = "links">
    	<ul><?php wp_list_pages('sort_column=menu_order&include=13,15,21,23,34&title_li='); ?>
        <li><img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/little-break-graphic.gif" alt="--" /></li>
        <?php wp_list_pages('sort_column=menu_order&include=25,17,9,27,29,1981&title_li='); ?>
        <!--<li><a title="blog" href="http://www.lapetitefleuronline.com/blog" target="_blank">blog</a></li>-->
        </ul>
    </div>
    <div id = "tcontent">
    <?php 
		   /*  Step 1: Establish the pod object  */
		  $services = new Pod('services');    
          
		   /*  Step 2: set the parameters to be used in the sql the SQL */
		   $areaname = the_slug();
		   /*$wherecl = substr($areaname, 0, -1);  */
			/*echo "The area is: ".$areaname;*/
		   /* $params['where'] = 'service_category.name like "%'.$wherecl.'%"'; */
		   $params = array();
		   $params['where'] = 'service_category.name = "'.$areaname.'"';
		   $params['orderby'] = 'service_order';
		  
		   /*  Step 3: Run the SQL */
		   $services->findRecords($params, 6);
           
		   /*  Step 4: Haw many rows are we dealing with? */
		   $total_services = $services->getTotalRows();
		   ?>
           
           <?php
			   /*  Step 5: Start processing the records */
			   $tserv_num = 0;	   
			   if ($total_services>0 ) : ?>
					<?php while ( $services->fetchrecord() ) : ?>
						<?php
						// set out variables
						$tserv_type                = $services->get_field('slug');
						$tserv_pic                 = $services->get_field('service_pic.guid');
						$tserv_short_text          = $services->get_field('service_short_text');
						?>
			   
						<!--- Format the output -->
          
						<?php $tserv_num ++; ?>
						<?php switch($tserv_num){ 
						    case 1: ?> 
                            	<div id = "tgrid-top-left">
                                <?php break;
                            case 2:  ?>
                                <div id = "tgrid-top-right">
                                <?php break;  
                            case 3:  ?>   
                         		<div id = "tgrid-mid-left">
                                <?php break;
							case 4: ?>      
								<div id = "tgrid-mid-right">
                                <?php break; 
						    case 5:  ?>   
                         		<div id = "tgrid-bottom-left">
                                <?php break;                             
                            case 6: ?>      
								<div id = "tgrid-bottom-right">
                                <?php break;
										
						}?>
						<div id = "tgrid-pic">
                                    				<img src="<?php echo $tserv_pic; ?>"> 
									
                            
                        </div>    
                        <div id = "tgrid-content">
							<?php echo $tserv_short_text; ?>
                         </div>
						</div> <!-- indicates grid-top-left, grid-top-right, etc. -->
    				<?php endwhile; ?>
				 <?php endif; ?>
</div><!-- content end -->
</div><!-- container end -->

<?php get_footer(); ?>            
    	
    
    