<?php

/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage lpf
 * @since lpf 2.0
 */


?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<!-- Style sheet -->              
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/blog-style.css" />
<!-- Favicon -->
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/graphics/favicon.ico" />


<!-- This is the font script -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/lpfevents.font.js" type="text/javascript"></script>
<script type="text/javascript">
			Cufon.replace('#links');
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery(".content").hide();
  //toggle the componenet with class msg_body
  jQuery(".heading").click(function()
  {
    jQuery(this).next(".content").slideToggle(500);
  });
});
</script>


<script type="text/javascript" src="//use.typekit.net/aiq3idz.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>


<title>La Petite Fleur  | <?php echo the_title(); ?></title>

<?php wp_head() // Do not remove; helps plugins work ?>
</head>
<div id = "blog-container">
	<div id = "blog-container-header">
  		
       <a href="<?php echo $lpfurl; ?>">

	        <img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/newlogowebsite.png" alt="Home" />
    	</a>
    </div>
 	<div id = "links">
    			<ul>
					<?php wp_list_pages('sort_column=menu_order&include=13,21,23,34&title_li='); ?>
        			<li><img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/little-break-graphic.gif" alt="--" /></li>
 		          	<?php wp_list_pages('sort_column=menu_order&include=25,17,9,27,29,1981&title_li='); ?>
    		    </ul>
    </div> 
   
   
    <div class = "blog-content-home">
    	<!-- Header Logo -->
        <div class = "blog-title"> <a href="http://www.lapetitefleuronline.com/blog-page"><img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/IA_interiorHeader3.jpg"  alt="Inspired Aisle"></a><br>  
     <!--     <a href="http://www.lapetitefleuronline.com/blog-page">< Home</a>  -->   
    </div>      
   
   		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
			$do_not_duplicate = $post->ID;
			?>
   			
            <div class="single_blog_post_title">
				<?php the_title(); ?>
            </div>
			
            <div class="single_subheading">
			<?php if ( get_post_meta($post->ID, 'Subheading', true) ) : ?>
            	 <?php echo get_post_meta($post->ID, 'Subheading', true) ?>
             <?php endif; ?>
             </div>
             
             <div class="single_blog_post_date">
				<?php the_time('F j, Y') ?>
        	</div>
     

			<div class="entry">
				<?php the_content(); ?>
                <div class="blog-post-tags">
                	<p><?php the_tags('Tags: ', ', ', '<br />'); ?></p>
            	</div>
                  <!--This is the decorative break between posts-->    
                <div class="blog-seperator">
                    	<img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/IA_Inbetween.png" alt="flourish">
                </div>
              
				 <?php echo do_shortcode('[pinit count="vertical" url="http://www.lapetitefleuronline.com" image_url="'.$image1[$i].'" description="'.$title1[$i].'" float="left"]');
?>  <?php if (function_exists('sociable_html')) {echo sociable_html();} ?>





                
               

            </div>
           
            
			<?php endwhile; // end of the loop. ?>
	</div>
<!------ this is the beginning of the sidebar -->            
    <div class = "sidebar-area">
         <img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/IA_previousposts.png" alt="flourish">
		 <?php rewind_posts();
		 $i=0; 
         $my_query = new WP_Query(  array( 'post_type' => 'post', 'post__not_in' => array( $do_not_duplicate ) ) ); ?>
			<table>
			<?php while ($my_query->have_posts()) : $my_query->the_post(); 
 
			 	if ($i == 0){?> <tr>
                <?php  }  ?>
            	 <td>
              		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
					<?php if( class_exists( 'kdMultipleFeaturedImages' ) ) {
            				kd_mfi_the_featured_image( 'navigation-thumbnail', 'post' );
					} 
					$i++; ?> 
                    </a>
                </td>
                <?php if ($i == 0){?> </tr>
                <?php  }
				$i++;  
				if($i>2){$i=0;}?>
                
	      <?php  endwhile; ?>
          
     	</table>
                 <div class="post-by-month">
           <!----- Date month query ----->
           <div class="post-instructions">{click below to see more}<br>........</span>
<?php
// do a query to get the counts
	$count_array=array();
	
	
	wp_reset_postdata();
	$my_query = new WP_Query( array('orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 20));
	if( $my_query->have_posts() ) {
      $ymdate = '';
	  $next_array = 'N';
	  $array_index = 0;
	  $post_count  = 0;
       while ($my_query->have_posts()) : $my_query->the_post();
         $ympost = mysql2date("F Y", $post->post_date);
         if ( $ympost != $ymdate) {
			 // go to the next set in the array
			    
				$ymdate = $ympost;
			 	if ($next_array == 'Y') {
			 		
					$array_index++;
					$post_count=0;
					$post_count++;
					$count_array[$array_index]=$post_count;
					
			 	} else {
			 							
					$post_count++;
					$count_array[$array_index]=$post_count;
					$next_array = 'Y';
					
			 	}
				
		 	} else {
			 	// add to the number of posts in the array
			 	$post_count++;
				$count_array[$array_index]=$post_count;
				
		 }
		 
		  endwhile;
    } //if ($my_query)
	 
 wp_reset_query();  // Restore global post data stomped by the_post().
// This query will bring back a max of 20 post titles
    wp_reset_postdata();
	$my_query = new WP_Query( array ( 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 20 ) );
	$array_index=0;

	if( $my_query->have_posts() ) {
      $ymdate = '';
       while ($my_query->have_posts()) : $my_query->the_post();
        
		 $ympost = mysql2date("F Y", $post->post_date);
         if ( $ympost != $ymdate) {
		   
		   $check_close_div = $ymdate;
   // this dynamically displays the correct text based on the number of posts in a month - if it is only one - "post" displays...
		   if ($count_array[$array_index] == 1){
		   		$dynamic_text = 'post';
		   }else{
				$dynamic_text = 'posts';
		   }
		   $ymdate = $ympost;
           if ($check_close_div == ''){
				echo '<div class="heading">'.$ymdate.' {'.$count_array[$array_index].' '.$dynamic_text.'}</div><div class="content"><ul>';
								
		   } else {
				echo '</ul></div><div class="heading">'.$ymdate.' {'.$count_array[$array_index].' '.$dynamic_text.'}</div><div class="content"><ul>';
				
		   }
		  $array_index++;
         }
         ?>
           <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
       <?php
	   
        //the_content('Read the rest of this entry &raquo;');
      endwhile;
    } //if ($my_query)
	
  wp_reset_query();  // Restore global post data stomped by the_post().
  wp_reset_postdata();
?>
        
        </div>
     </div>       
</div>


<?php get_footer(); ?>
