<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php

/*

Template Name: Product_Gallery

*/

?>

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
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/validate_product_form.js"></script>
<!-- This is the font script -->

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/lpfevents.font.js" type="text/javascript"></script>
<script type="text/javascript">
			Cufon.replace('#product-container-header');
			Cufon.replace('#links')
			Cufon.replace('#product-content-right-top');
</script>


</head>
<body>

<div id = "product-container">
	
    <div id = "product-container-header">
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
    
 <!--   <div id = "loadarea">
    rollover images on right
   	</div> -->
    
    <div id = "product-content-right-top">
    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">
	 <!--  remove the "#" within the php tag to get the title to appear  <h2><?php# the_title(); ?></h2> -->
     
				<?php  the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'lpf') . '</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'lpf') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                <?php endwhile; endif; ?>
    	</div>
 	<?php $areaname = the_slug();
	
	if ($areaname == "celebrating"){
		$invitetyp = "Celebrating";
		$phototype = "none";
		
	}
	else if($areaname == "say-i-do"){
		$invitetyp = "Say I Do";
		$phototype = "none";
	}
	else if($areaname == "just-engaged"){
		$invitetyp = "Just Engaged";
		$phototype = "photo";
	}
	else if($areaname == "just-merried"){
		$invitetyp = "Just Merried";
		$phototype = "photo";
	}
	else if($areaname == "marry-and-bright"){
		$invitetyp = "Marry and Bright";
		$phototype = "photo";
	}
	
	?>
    
    <!-- This is the form. It was easier to put it in an include file.. -->
    <?php if($phototype == "photo"){
			include 'product-photo-form.inc';
	}
	else
	{
		include 'product-form.inc';
	}
	?>	 
              
 </div>                
                  
         
           
<div id = "content-right-bottom">
           <table>     	
			   <tr>
		     		<td>
					</td>
				</tr> 
			</table>
 
</div> 
    <!-- Originally this code was higher, but we want to load the picture upon coming in -->
    <!-- There is different dimensions for the paper page and any other gallery -->
     
<div id = "loadarea" align="center">
	<?php if ($areaname == "celebrating") :?>
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/product_images/final-images/celebrating_main.gif" alt="" />
     <?php endif; ?>   
     <?php if ($areaname == "say-i-do") :?>
      	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/product_images/final-images/sayido_main.gif" alt="" />
     <?php endif; ?>      
     <?php if ($areaname == "just-engaged") :?>
     	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/product_images/final-images/justengaged_main.gif" alt="" />
	 <?php endif; ?>
     <?php if ($areaname == "just-merried") :?>
     	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/product_images/final-images/justmerried_main.gif" alt="" />
	 <?php endif; ?>
     <?php if ($areaname == "marry-and-bright") :?>
     	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/product_images/final-images/marryandbright2_main.gif" alt="" />
	 <?php endif; ?>   
</div>
    
    
</div>
</body>
</html>