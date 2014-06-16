<?php

/*

Template Name: Friends

*/

?>
<?php get_header(); ?>

<div id = "friends-container">
	
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
    
      <div id = "friends-content">
    <?php 
		   /*  Step 1: Establish the pod object  */
		  $services = new Pod('services');    
          
		   /*  Step 2: set the parameters to be used in the sql the SQL */
		   $areaname = the_slug();
		   /*$wherecl = substr($areaname, 0, -1);  */

		   /* $params['where'] = 'service_category.name like "%'.$wherecl.'%"'; */
		   $params = array();
		   $params['where'] = 'service_category.name = "'.$areaname.'"';
		   $params['orderby'] = 'service_order';
		  
		   /*  Step 3: Run the SQL */
		   $services->findRecords($params, 2);
           
		   /*  Step 4: Haw many rows are we dealing with? */
		   $total_services = $services->getTotalRows();
		   ?>
           
           <?php
			   /*  Step 5: Start processing the records */
			   $serv_num = 0;	   
			   if ($total_services>0 ) : ?>
					<?php while ( $services->fetchrecord() ) : ?>
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
                                <?php break; 
                         case 2:  ?>   
                         		<div id = "grid-bottom-left">
                                <?php break; 
						}?>
						<div id = "grid-pic">
                        	  
                        			<a href="<?php echo $serv_url; ?>" target="_blank">
                        				<img src="<?php echo $serv_pic; ?>"> 
									</a>
                              
                        </div>    
                        <div id = "grid-content">
							<?php echo $serv_short_text; ?>
                         </div>
						</div> <!-- indicates grid-top-left, grid-top-right, etc. -->
    				<?php endwhile; ?>
				 <?php endif; ?>
                 <div id = "friends-right">
                 		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        					<div class="post" id="post-<?php the_ID(); ?>">
	 				<!--  remove the "#" within the php tag to get the title to appear  <h2><?php# the_title(); ?></h2> -->
     
								<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'lpf') . '</p>'); ?>

								<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'lpf') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                				<?php endwhile; endif; ?>
               
   
    						</div>
                 </div>
                 <div id="friends-favorite">
               	   <p>
                   <img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/flourishsm.jpg" width="8" height="12" /> La Petite Fleur Favorite
                   </p> 
                 <div>  
</div><!-- content end -->
</div><!-- container end -->
<?php get_footer(); ?>
