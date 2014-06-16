<?php

/*

Template Name: Estimate

*/

?>
<?php get_header(); ?>

<div id = "container">
	
    <div id = "container-header">
  		<img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/newlogowebsite.png" alt="Home" />
    </div>
    
  
    
      <div id = "estimate-content">
    <?php 
		   echo "About to execute the query!<br />";
			
		/* This function does a select against the client table to get the list of clients   */
		/* two variables: $results and 	$number_of_results can be accessed                   */
		/*	get_client_info(); */
		/*  global $wpdb;*/
		 
	  $client_sel = "SELECT client_id, client_name FROM client";
	  $results = mysql_query($client_sel);
      $number_of_results = mysql_num_rows($results); 
		  
		  
		  
		  while ($row=mysql_fetch_array($results))
			{
				$client_id = $row['client_id'];
				$client_name = $row['client_name'];
				echo "This client name is ".$client_name." - ";
			echo ". This client id is ".$client_id."<br>";
			}
		   
			
			
			
		    
		 ?>
</div><!-- content end -->
</div><!-- container end -->
<?php get_footer(); ?>
