<?php

/*
Template Name: Archives
*/

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<!--[if lte IE 8]>        
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style-ie.css" />
<![endif]-->
<!--[if gt IE 8]>        
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/blog-style.css" />
<![endif]-->
<!--[if !IE]><!-->                
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/blog-style.css" />
<!--<![endif]--> 
<!-- Favicon -->
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/graphics/favicon.ico" />

<!-- This is the font script -->




<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/lpfevents.font.js" type="text/javascript"></script>
<script type="text/javascript">
			Cufon.replace('#links');

</script>

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
        <div class = "blog-content-home">
    	<!-- Start the Loop. -->
       
 <?php is_tag(); ?>
  <?php if (have_posts()) : ?>

  <div class="archives"> 
   <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
   <?php /* If this is a category archive */ if (is_category()) { ?>
    <h2> &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
   <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    <h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
   <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h2>a <?php the_time('F jS, Y'); ?></h2>
   <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h2> <?php the_time('F, Y'); ?></h2>
   <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h2><?php the_time('Y'); ?></h2>
   <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <h2>Author Archive</h2>
   <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h2>Blog Archives</h2>
   <?php } ?>
   </div>
 	<?php while (have_posts()) : the_post(); ?>  
               <!-- do stuff ... -->
               	<?php $x == 0; ?> 
                <!--This is the main page-->
                <!--This is the featured image of the post--> 
                 <div class="post-featured-img">
                     	<?php the_post_thumbnail();
						$image1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured image' ); ?>

          		</div>	
						
			  	<!--This is the title of the post-->
                <div class="blog-post-title">	
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                    	<?php $title1 = the_title(); ?>
                        </a>
                 </div>
                 <!--This is the featured date of the post-->    
				 <div class="blog-post-date">
                    	<?php the_time('F jS, Y'); ?> <!-- by <?php the_author() ?> -->
                 </div>    
                     
                <!--This is the excerpt from the post-->        
				<div class="entry">
						<?php echo get_the_excerpt(); ?>
						<a href="<?php echo get_permalink(); ?>"> Read More...</a><br>
               	 		
                        
						<div class="blog-post-tags">
                        	                          
                        	
							<?php the_tags('Tags: ', ', ', '<br />'); ?><br>
                            <?php echo do_shortcode('[pinit count="vertical" url="http://www.lapetitefleuronline.com" image_url="'.$image1[$x].'" description="'.$title1[$x].'" float="left"]'); ?>
                            
                        </div> 
                </div>
                
                <!--This is the decorative break between posts-->    
                <div class="blog-seperator">
                    	<img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/little-break-graphic.gif" alt="flourish">
                </div>
                 <?php $x++; endwhile; ?>
 
 <?php else : ?>

  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

  <?php endif; ?>


 <div class="pagination-older"><?php next_posts_link('Older Entries ') ?></div>
<div class=" pagination-newer"><?php previous_posts_link('Newer Entries ') ?></div> 
    



<?php get_footer(); ?>
