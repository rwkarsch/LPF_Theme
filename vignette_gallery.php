<?php

/*

Template Name: Vignette Gallery

*/

?>
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

<title><?php echo the_slug(); ?></title>

<?php wp_head() // Do not remove; helps plugins work ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/thumbnailviewer2.js">

/***********************************************
* Image Thumbnail Viewer II script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

</script>
<!-- This is the font script -->

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/Helv-Joey.font.js" type="text/javascript"></script>
<script type="text/javascript">
			Cufon.replace('#container');
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

</head>
<body>

<div id = "container">
	
    <div id = "container-header">
  		<a href="http://www.lapetitefleuronline.com">
	        <img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/newlogowebsite.png" alt="Home" />
    	</a>
    </div>
    
    <div id = "links">
    	<ul>
			<?php wp_list_pages('sort_column=menu_order&include=13,15,21,23,34&title_li='); ?>
        	<li><img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/little-break-graphic.gif" alt="--" /></li>
        	<?php wp_list_pages('sort_column=menu_order&include=25,17,9,27,29,1981&title_li='); ?>
        	<!--<li><a title="blog" href="http://www.lapetitefleuronline.com/blog" target="_blank">blog</a></li>-->
        </ul>
    </div>
    
 <!--   <div id = "loadarea">
    rollover images on right
   	</div> -->
    
    <div id = "vignette-right-top">
        <?php 
		   /*  Step 1: Establish the pod object  */
		  $vignette = new Pod('vignette');    
          
		   /*  Step 2: set the parameters to be used in the sql the SQL */
		   $areaname = the_dynamic_slug();
		   /*echo "The area name is: ".$areaname; */
		   /*$wherecl = substr($areaname, 0, -1);  */
		    $params['where'] = 't.name = "'.$areaname.'"';	
				     
		   /*  Step 3: Run the SQL */
		   $vignette->findRecords($params, 1); 
           
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
						$vign_event_date          = $vignette->get_field('event_date');
						$vign_venue               = $vignette->get_field('event_venue');
						$vign_location            = $vignette->get_field('event_location');
						$vign_desc                = $vignette->get_field('vignette_desc');
						$vign_pc                  = $vignette->get_field('vignette_photo_credit');
						//$vign_slug				  = $vignette->get_field('slug');
						//$serv_short_text          = $services->get_field('service_short_text');
						?>
			   
               		<div id = "vignette-title">
						<strong><?php echo $vign_evnt_nme ;?></strong> <br />
                     <div id = "vignette-location"><?php echo $vign_venue." - ".$vign_location ;?> <br /></div>
                     </div>   
                        
				     <div id = "vignette-description">   
                        <?php echo $vign_desc ;?> 
       				 </div>
					 <?php endwhile; ?>
		   	 <?php endif; ?>
					
     	  </div> <!-- end class = content-right -->     
         
          <?php 
		   /*  Step 1: Establish the pod object  */
		  $pictures = new Pod('vignette_pic');    
          
		   /*  Step 2: set the parameters to be used in the sql the SQL */
		   /*$wherecl = substr($areaname, 0, -4);*/  

		   $params['where'] = 'vignette_name.name = "'.$areaname.'"';
		  
		   /*  Step 3: Run the SQL */
		   $pictures->findRecords($params, 13);
           
		   /*  Step 4: Haw many rows are we dealing with? */
		   $total_pictures = $pictures->getTotalRows();
		   ?>
           
           <div id = "vignette-right-bottom">
           <table>     	
			   <tr>
		   
		   			<?php
			   /*  Step 5: Start processing the records */
			   $pic_num = 0;	   
			   $first_flag = 0;
			   if ($total_pictures>0 ) : ?>
					<?php while ( $pictures->fetchrecord() ) : ?>
						<?php
						// set out variables
						$pic_vign_type            = $pictures->get_field('slug');
						$pic_vign_pic_thumb          = $pictures->get_field('vignette_th.guid');
						$pic_vign_pic_large          = $pictures->get_field('vignette_pic_lg.guid');
						?>
			   
						<!-- Get the row info -currently show 6 per row-->          
						<?php $pic_num ++; ?>
						<?php if($first_flag == 0) :
							$first_pic  =  $pic_vign_pic_large;
							$first_cred =  $vign_pc;
							$first_flag =  999;
						endif;?>
						
						
						<?php if($pic_num > 7) :?>
							</tr>
							<?php $pic_num = 0; ?>
						<?php endif; ?>   
						
						<!--- Format the output -->
							
							
							<td>
								<a href="<?php echo $pic_vign_pic_large; ?>"  title="<?php echo $vign_pc; ?>" rel="enlargeimage" rev="targetdiv:loadarea">
								<img src="<?php echo $pic_vign_pic_thumb; ?>">                     
								</a>
							</td>
						   
					<?php endwhile; ?>
				 <?php endif; ?>
							<td><center>
                                <?php $prev_url = the_prev_slug(); ?>
                                <a href="http://www.lapetitefleuronline.com/<?php echo $prev_url; ?>">main<br />menu<br /> </a>
                                </center>
                			</td>
                </tr> 
			</table>
<?php echo $pictures->getPagination(); ?>    
    </div> 
    
    <div id = "loadarea">
    	 <img src="<?php echo $first_pic ; ?>"> 
         <?php echo $first_cred;?>
   	</div>
   
</div>
<?php get_footer(); ?>