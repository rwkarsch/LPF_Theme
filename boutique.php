<?php

/*

Template Name: Boutique

*/

?>
<?php get_header(); ?>
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
    
    <div id = "photo-left">
    	
    	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/<?php echo the_slug(); ?>/boutiquelg.jpg" alt="--" />
    </div>
    
    <div id = "content-right-boutique">
    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">
	 <!--  remove the "#" within the php tag to get the title to appear  <h2><?php# the_title(); ?></h2> -->
     
				<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'lpf') . '</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'lpf') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                <?php endwhile; endif; ?>
               
   
    	</div>
    </div> <!-- end class = content-right -->
</div>
<?php get_footer(); ?>
