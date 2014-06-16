<?php

/*

Template Name: Gallery

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

<title>La Petite Fleur  | Philadelphia Wedding and Event Design, Planning, Décor, Flowers, Invitations | <?php echo the_slug(); ?></title>

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
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/lpfevents.font.js" type="text/javascript"></script>
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
    	<ul><?php wp_list_pages('sort_column=menu_order&include=13,15,21,23,34&title_li='); ?>
        <li><img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/little-break-graphic.gif" alt="--" /></li>
        <?php wp_list_pages('sort_column=menu_order&include=25,17,9,27,29,1981&title_li='); ?>
        <!--<li><a title="blog" href="http://www.lapetitefleuronline.com/blog" target="_blank">blog</a></li>-->
        </ul>
        </ul>
    </div>
    
 <!--   <div id = "loadarea">
    rollover images on right
   	</div> -->
    
    <div id = "content-right-top">
    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">
	 <!--  remove the "#" within the php tag to get the title to appear  <h2><?php# the_title(); ?></h2> -->
     
				<?php  the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'lpf') . '</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'lpf') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                <?php endwhile; endif; ?>
                <?php 
				$areaname = the_slug();
			     ?>
               
				       
          <!-- This is where we are going to start the experiment with PODS -->
     	</div>
    </div> <!-- end class = content-right -->     
         
          <?php 
		   /*  Step 1: Establish the pod object  */
		  $pictures = new Pod('serv_pic');    
          
		   /*  Step 2: set the parameters to be used in the sql the SQL */
		   /*$wherecl = substr($areaname, 0, -4);*/  

		   $params['where'] = 'service_type.name = "'.$areaname.'"';
		  
		   /*  Step 3: Run the SQL */
		   $pictures->findRecords($params, 14);
           
		   /*  Step 4: Haw many rows are we dealing with? */
		   $total_pictures = $pictures->getTotalRows();
		   ?>
           
           <div id = "content-right-bottom">
           <table>     	
			   <tr>
		   
		   			<?php
			   /*  Step 5: Start processing the records */
			   $pic_num = 0;
			  
			  /* added the first flag indicator to make sure the first picture in the series shows up when the user enters the page */
			   $first_flag = 0;	   
			   if ($total_pictures>0 ) : ?>
					<?php while ( $pictures->fetchrecord() ) : ?>
						<?php
						// set out variables
						$pic_service_type            = $pictures->get_field('slug');
						$pic_serv_pic_thumb          = $pictures->get_field('pic_th.guid');
						$pic_serv_pic_large          = $pictures->get_field('pic_large.guid');
						$pic_serv_photo_cred         = $pictures->get_field('pic_photo_credit');
						?>
			   
						<!-- Get the row info -currently show 6 per row-->          
						<?php $pic_num ++; ?>
                        
						<!-- Make sure the first picture in the series is the first picture to show up -->
						<?php if($first_flag == 0) :
							$first_pic  =  $pic_serv_pic_large;
							$first_cred =  $pic_serv_photo_cred;
							$first_flag =  999;
						endif;?>	
							
						<?php if($pic_num > 7) :?>
							</tr>
							<?php $pic_num = 0; ?>
						<?php endif; ?>   
						
						<!--- Format the output -->
							
							
							<td>
								
                               
                                 <?php if ($areaname != "paper") :?>
                                
                                	<a href="<?php echo $pic_serv_pic_large;?>" title="<?php echo $pic_serv_photo_cred;?>" rel="enlargeimage" rev=		"targetdiv:loadarea,enabletitle:yes">
                                		<img src="<?php echo $pic_serv_pic_thumb; ?>">                     
									</a>
                                
                                <?php else :?>
                                	 <a href="<?php echo $pic_serv_pic_large;?>" title="<?php echo $pic_serv_photo_cred;?>" rel="enlargeimage" rev="targetdiv:loadareapaper,enabletitle:yes">
                                		<img src="<?php echo $pic_serv_pic_thumb; ?>">                     
									</a>
                                
                                <?php endif; ?>
							</td>
						   
					<?php endwhile; ?>
				 <?php endif; ?>
							
                            
                            <?php if ($areaname != "paper") :?>
                            <!-- <td width="30" height="30"> -->
                            <td>
                                <?php $prev_url = the_prev_slug(); ?>
                               <center> <a href="http://www.lapetitefleuronline.com/<?php echo $prev_url; ?>">main<br /> menu</a></center>
                			</td>
                            <?php endif; ?>
							
                </tr> 
			</table>
<?php echo $pictures->getPagination(); ?>    
    </div> 
    <!-- Originally this code was higher, but we want to load the picture upon coming in -->
    <!-- There is different dimensions for the paper page and any other gallery -->
     <?php if ($areaname != "paper") :?>
     
     	<div id = "loadarea" class="photos">
    	 	<img src="<?php echo $first_pic ; ?>"> 
         	<?php echo $first_cred;?>
   		</div>
    
     <?php else :?>
   	 	<div id = "loadareapaper" class="photos">
    	 	<img src="<?php echo $first_pic ; ?>">
      	 	<?php echo $first_cred;?>
   		</div>
    <?php endif; ?>
    
</div>
<?php get_footer(); ?>