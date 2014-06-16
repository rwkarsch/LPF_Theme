<?php

/*

Template Name: Grid

*/

?>
<!DOCTYPE html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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
			Cufon.replace('#grid-top-left');
			Cufon.replace('#grid-top-right');
			Cufon.replace('#grid-bottom-left');
			Cufon.replace('#grid-bottom-right');
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38342616-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<title>La Petite Fleur  | Philadelphia Wedding and Event Design, Planning, Decor, Flowers, Invitations | <?php echo the_slug(); ?></title>

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
    	<ul><?php wp_list_pages('sort_column=menu_order&include=13,15,21,23,34&title_li='); ?>
        <li><img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/little-break-graphic.gif" alt="--" /></li>
        <?php wp_list_pages('sort_column=menu_order&include=25,17,9,27,29,1981&title_li='); ?>
        <!--<li><a title="blog" href="http://www.lapetitefleuronline.com/blog" target="_blank">blog</a></li>-->
        </ul>
    </div>
    <div id = "content">
    <?php 
		   /*  Step 1: Establish the pod object  */
		  $services = new Pod('services');  //<-- pods 1.0  
		  //$services = pods('services');    
          
		   /*  Step 2: set the parameters to be used in the sql the SQL */
		   $areaname = the_slug();
		   /*$wherecl = substr($areaname, 0, -1);  */

		   /* $params['where'] = 'service_category.name like "%'.$wherecl.'%"'; */
		   $params = array();
		   $params['where'] = 'service_category.name = "'.$areaname.'"';
		   $params['orderby'] = 'service_order';
		  
		   /*  Step 3: Run the SQL */
		   $services->findRecords($params, 4); //<--pods 1.0
		   //$services->find($params, 4);
           
		   /*  Step 4: Haw many rows are we dealing with? */
		   $total_services = $services->getTotalRows();
		   //$total_services = $services->total();
		   
		   ?>
           
           <?php
			   /*  Step 5: Start processing the records */
			   $serv_num = 0;	   
			   if ($total_services>0 ) : ?>
					<?php while ( $services->fetchRecord() ) : ?>
						<?php
						// set out variables
						$serv_type                = $services->get_field('slug');
						$serv_pic                 = $services->get_field('service_pic.guid');
						$serv_short_text          = $services->get_field('service_short_text');
						$serv_url                 = $services->get_field('service_url_to_use');
						?>
			   
						<!--- Format the output -->
          
						<?php $serv_num ++; ?>
						<?php switch($serv_num){ 
						 case 1: ?> 
                            	<div id = "grid-top-left">
                                <?php break; ?>
                        <?php case 2:  ?>
                                <div id = "grid-top-right">
                                <?php break; ?> 
                         <?php case 3:  ?>   
                         		<div id = "grid-bottom-left">
                                <?php break; ?>                               
                         <?php case 4: ?>      
								<div id = "grid-bottom-right">
                                <?php break; 
						}?>
						
                        	<?php switch($serv_type){
								case "about-leigh-karsch": 
								case "style":              ?> 
                                	
                                    <div id = "grid-pic2">
                                    	<img src=" <?php echo $serv_pic; ?>"> 
                                    
									<?php break; ?>
                          <?php case "our_company": ?>    
                                	<div id = "grid-pic">
                                    <a href="http://www.lapetitefleuronline.com/boutique">
                        					<img src="<?php echo $serv_pic; ?>"> 
									</a>
                                	 <?php break; ?>
                          <?php default: ?>      
                        			<div id = "grid-pic">
                                    <a href="http://www.lapetitefleuronline.com/<?php echo $areaname."/".$serv_type; ?>">
                        				<img src="<?php echo $serv_pic; ?>"> 
									</a>
                                    <?php break; 
                                
						}?>
                        </div>    
                        <div id = "grid-content">
							<?php echo $serv_short_text; ?>
                         </div>
						</div> <!-- indicates grid-top-left, grid-top-right, etc. -->
    				<?php endwhile; ?>
				 <?php endif; ?>
</div><!-- content end -->
</div><!-- container end -->

<?php get_footer(); ?>            
    	
    
    