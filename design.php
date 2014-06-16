<?php

/*

Template Name: Design

*/

?>
<?php get_header(); ?>
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
    </div>
    
    <div id = "photo-left">
    	
    	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/<?php echo the_slug(); ?>/rotate.php" />
        <?php echo print_r; ?>
    </div>
    
    <div id = "content-right">
    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">
	 <!--  remove the "#" within the php tag to get the title to appear  <h2><?php# the_title(); ?></h2> -->
     
				<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'lpf') . '</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'lpf') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                <?php endwhile; endif; ?>
               
   
    	</div>
    </div> <!-- end class = content-right -->
     
</div>
<?php /* get_footer(); */ ?>
