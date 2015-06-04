<?php

/*

Template Name: As Seen In

*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

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

<title>La Petite Fleur  | Philadelphia Wedding and Event Design, Planning, Decor, Flowers, Invitations | <?php echo the_slug(); ?></title>

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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
			<?php wp_list_pages('sort_column=menu_order&include=13,21,23,34&title_li='); ?>
        	<li><img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/little-break-graphic.gif" alt="--" /></li>
        	<?php wp_list_pages('sort_column=menu_order&include=25,17,9,27,29,1981&title_li='); ?>
        	<!--<li><a title="blog" href="http://www.lapetitefleuronline.com/blog" target="_blank">blog</a></li>-->
        </ul>
    </div>
    
    		<?php 
				$areaname = the_slug();
			     ?>
         
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
           
           <div id = "content-right-bottom-aso">
       <center>    <table>     	
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
						$pic_url					 = $pictures->get_field('pic_url');
						?>
			   
						<!-- Get the row info -currently show 6 per row-->          
						<?php $pic_num ++; ?>
                        <!-- Make sure the first picture in the series is the first picture to show up -->
						<?php if($first_flag == 0) :
							$first_pic  =  $pic_serv_pic_large;
							$first_url  =  $pic_url;
							$first_flag =  999;
						endif;?>
                        
                        
                        
						<?php if($pic_num > 13) :?>
							</tr><tr>
							<?php $pic_num = 0; ?>
						<?php endif; ?>   
						
						<!--- Format the output -->
							
							
							<td>
								<a href="<?php echo $pic_serv_pic_large;?>" title="<?php echo $pic_serv_photo_cred;?>" rel="enlargeimage" rev="targetdiv:loadarea-aso,link:<?php echo $pic_url; ?>">
								
                                	<img src="<?php echo $pic_serv_pic_thumb; ?>" alt="--" />                     
								</a>
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
			</table></center>
<?php echo $pictures->getPagination(); ?>    
    </div> 
    <!-- Originally this code was higher, but we want to load the picture upon coming in -->
     <div id = "loadarea-aso" class="photos">
    	   	<a href="<?php echo $first_url; ?>" target="_blank">
            	<img src="<?php echo $first_pic; ?>" alt="--" />
            </a>
           
   	</div>
   
    
</div>
<?php get_footer(); ?>