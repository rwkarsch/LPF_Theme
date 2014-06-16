<?php

/*

Template Name: Client Page

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
			Cufon.replace('#container');
</script>



<title><?php echo the_slug(); ?></title>

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
        <?php wp_list_pages('sort_column=menu_order&include=25,17,9,27,29,31&title_li='); ?>
        
    </ul>
    </div>
    
        
    <div id = "content-client">
   		 <?php 
		   /*  Step 1: Establish the pod object  */
		  $client = new Pod('customer');    
          
		   /*  Step 2: set the parameters to be used in the sql the SQL */
		   $areaname = the_dynamic_slug();
		   
		   
		   /*$wherecl = substr($areaname, 0, -1);  */
		    $params['where'] = 't.name = "'.$areaname.'"';	
				     
		   /*  Step 3: Run the SQL */
		   $client->findRecords($params, 1); 
           
		   /*  Step 4: How many rows are we dealing with? */
		   $total_clients = $client->getTotalRows();
		   ?>
           
           <?php
			   /*  Step 5: Start processing the records */
			   $client_num = 0;	   
			    	
			   if ($total_clients>0 ) : ?>
					<?php while ( $client->fetchrecord() ) : ?>
						<?php
						// set out variables
						$name					= $client->get_field('name');
						$client_name            = $client->get_field('client_name');
						$ws_client_name         = $client_name; 	
						?>
			   
              	<div id = "content-client-name">
						<strong>Project: <?php echo $ws_client_name;?></strong> <br /><br />
                     
                     </div>  				     
       				 
					 <?php endwhile; ?>
		   	 <?php endif; ?>
<!--=====================================================================================================================================-->
<!--=================Get the files to display                                                                      ======================--><!--=====================================================================================================================================-->       
      <?php 
		   /*  Step 1: Establish the pod object  */
		  $client_files = new Pod('customer_files');    
          
		   /*  Step 2: set the parameters to be used in the sql the SQL */
		   $params = array();
		   $params['where'] = 'clnt_nme.name = "'.$name.'"';	
		   $params['orderby'] = 'client_file_date DESC';
				     
		   /*  Step 3: Run the SQL */
		   $client_files->findRecords($params, 2); 
           
		   /*  Step 4: How many rows are we dealing with? */
		   $total_client_files = $client_files->getTotalRows();
		   ?>
           
           <?php
			   /*  Step 5: Start processing the records */
			   $client_num = 0;	   
			   
			   if ($total_client_files>0 ) : ?>
					<?php while ( $client_files->fetchrecord() ) : ?>
						<?php
						// set out variables
						$file_name			   	  = $client_files->get_field('name');
						$client_file              = $client_files->get_field('client_file.guid');
						$client_file2			  = $client_files->get_field('client_file2.guid');
						$client_file3			  = $client_files->get_field('client_file3.guid');
						$client_file_date         = $client_files->pod_helper('format_date', $client_files->get_field('client_file_date'));
						$client_comment           = $client_files->get_field('client_comment');
						?>
			   		<div id = "client-date">
               			<strong><?php echo $client_file_date ;?></strong> 
                    	<br />
                    </div>    
                    
                    <div id = "client-description"> 
						<?php echo $client_comment ;?><br />
                    		
                            <!-- This function gets the filename of the file to display -->
							<?php $file_name1 = the_filename($client_file);?> 
							
                            	File to Review:
                                	<a href="<?php echo $client_file ; ?>" target="_blank" > 
                                          	<strong><?php echo $file_name1; ?></strong>
                     				</a><br />
                     		
                            
                            
                             <?php if ($client_file2 != "") :?>
                            
                             		<?php $file_name2 = the_filename($client_file2);?>
                                    File to Review:
                                        	<a href="<?php echo $client_file2 ; ?>" target="_blank" > 
                                            	<strong><?php echo $file_name2; ?></strong>
                     						</a><br />
                                    
                            <?php endif; ?>
                            
                             <?php if ($client_file3 != "") :?>
                             
                            		<?php $file_name3 = the_filename($client_file3);?> 
                                   	File to Review:
                                        	<a href="<?php echo $client_file3 ; ?>" target="_blank" > 
                                            	<strong><?php echo $file_name3; ?></strong>
                     						</a><br />
                                   
                            <?php endif; ?>
                            
                            
                    </div>
                     	    
                        
       				 
					 <?php endwhile; ?>
		   	 <?php endif; ?>
          	<br />
            <br />
 			<div id = "client-pages">
				<?php echo $client_files->getPagination(); ?>            
            </div>
            
    </div> <!-- end class = content -->
</div>
<?php get_footer(); ?>
