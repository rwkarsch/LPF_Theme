<?php

/*
Template Name: Blog-Template2
*/

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>


<!-- stylesheet -->              
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/blog-style.css" />

<!-- Favicon -->
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/graphics/favicon.ico" />



<!-- This is the font script -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/lpfevents.font.js" type="text/javascript"></script>
<script type="text/javascript">
			Cufon.replace('#links');
			Cufon.replace('.heading');
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<script type="text/javascript" src="//use.typekit.net/aiq3idz.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>




<title>La Petite Fleur  | Philadelphia Wedding and Event Design, Planning, Décor, Flowers, Invitations | <?php echo the_slug(); ?></title>


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
				<?php wp_list_pages('sort_column=menu_order&include=13,15,21,23,34&title_li='); ?>
        		<li><img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/little-break-graphic.gif" alt="--" /></li>
        		<?php wp_list_pages('sort_column=menu_order&include=25,17,9,27,29,1981&title_li='); ?>
        	</ul>
    	</div>
        <div class	= "blog-content-home">
    	
        <!-- Header Logo -->
        <div class = "blog-title">
        
   		  <img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/IA_Header.png"  alt="Inspired Aisle">       
        </div> 
        
        <!-- Start the Loop. -->
		<?php $i = 0;
			  $z = 0;	 
		      $title1 = array();
			  $image1 = array();
		      $sidebar = "no"; ?>
         <?php if (have_posts()) : ?>
               <?php while (have_posts()) : the_post(); ?>  
               <?php 
			   if( $i < 2) { ?>  
               <!-- do stuff ... -->
               	 
                <!--This is the main page-->
                <!--This is the featured image of the post--> 
                 <div class="post-featured-img">
                     	<?php the_post_thumbnail();
						$image1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
          		</div>	
						
			  	<!--This is the title of the post-->
                <div class="blog-post-title">	
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                    	<?php $title1 = the_title(); ?>
                        </a>
                 </div>
                 <!--This is the featured date of the post-->    
				 <div class="blog-post-date">
                    	<?php the_time('F j, Y') ?> <!-- by <?php the_author() ?> -->
                 </div>    
                     
                <!--This is the excerpt from the post-->        
				<div class="entry">
						<?php echo get_the_excerpt(); ?>
				  <a href="<?php echo get_permalink(); ?>"><strong> READ FULL FEATURE...</strong></a><br>
               	 		
                        
						<div class="blog-post-tags">
                        	
                            
							<?php the_tags('Tags: ', ', ', '<br />'); ?>
                            <!-- This is the Pinterest Icon -->
                             <?php echo do_shortcode('[pinit count="vertical" url="http://www.lapetitefleuronline.com" image_url="'.$image1[$i].'" description="'.$title1[$i].'" float="left"]'); ?>
                            <!-- This is the Facebook Icon -->
                            &nbsp;&nbsp;<div class="fb-like" data-href="<?php the_permalink() ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div> 
                              <!-- This is the Twitter Icon 
                            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php //the_permalink() ?>" data-text="<?php //the_title(); ?>">Tweet</a>
-->
                         
 
                            
                        </div> 
                </div>
                
                <!--This is the decorative break between posts-->    
                <div class="blog-seperator">
                    	<img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/IA_Inbetween.png" alt="flourish">
                </div>
                    
			   <?php } else { 
			   
			   if ($sidebar == "no") {
				   	$sidebar = "yes"; 
					?> </div>
               		<div class = "sidebar-area">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/IA_previousposts.png" alt="flourish">
				    <table>
				 <?php  }                  
                 if ($z == 0){?> <tr>
                <?php  }  ?>
            	 <td>
              		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
					<?php if( class_exists( 'kdMultipleFeaturedImages' ) ) {
            				kd_mfi_the_featured_image( 'navigation-thumbnail', 'post' );
					} 
					$z++; 
					if ($z>2){$z=0;}?> 
                    </a>
                </td>
                <?php if ($z == 0){?> </tr>
                <?php  }
				$z++;  ?>
			<!--	============================ -->
          
	      <?php } $i++;  endwhile; ?>
          
     <?php endif; ?>
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
