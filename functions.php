<?php
if( class_exists( 'kdMultipleFeaturedImages' ) ) {

                $args = array(
                        'id' => 'navigation-thumbnail',
                        'post_type' => 'post',      // Set this to post or page
                        'labels' => array(
                            'name'      => 'Navigation Thumbnail',
                            'set'       => 'Set Navigation Thumbnail',
                            'remove'    => 'Remove Navigation Thumbnail',
                            'use'       => 'Use as Navigation Thumbnail',
                        )
                );
				
	                new kdMultipleFeaturedImages( $args );
			
        }
		



function the_slug() {
$post_data = get_post($post->ID, ARRAY_A);
$slug = $post_data['post_name'];
return $slug; }

// created by Jon Ruttan. Based on breadcrumb menu by Chris Poole(chrispoole.com)

function breadcrumb() {
	$url = $_SERVER['REQUEST_URI'];
	$urlArray = explode('/', rtrim($url, '/'));

	// Set $dir to the first value
	$dir = array_shift($urlArray);
	$breadcrumb = '<a href="/">Home</a>';
	foreach($urlArray as $text) {
		$dir .= "/$text";
		$breadcrumb .= ' > <a href="'.$dir.'">' . ucwords(strtr($text, '_-', '  ')) . '</a>';
	}
	return $breadcrumb;
}


//This function is by Roberto Karscho and retrieves the last word in the link (basically to go up a directory)
//Based on the above breadcrumb script by Jon Ruttan
//This function basically returns the words in a url
//For example, if the url is "http://www.yahoo.com/fuzzy/slippers", it returns the word "fuzzy"
function the_prev_slug()
{
	$url = $_SERVER['REQUEST_URI'];
	$urlArray = explode('/', rtrim($url, '/'));
	$prev = $urlArray[count($urlArray)-2];	
	return $prev;
}

//This function is by Roberto Karscho and retrieves the last word in the link (basically to go up a directory)
//Based on the above breadcrumb script by Jon Ruttan
//This function basically returns the words in a url
//For example, if the url is "http://www.yahoo.com/fuzzy/slippers", it returns the word "fuzzy"
function the_dynamic_slug()
{
	$url = $_SERVER['REQUEST_URI'];
	$urlArray = explode('/', rtrim($url, '/'));
	$prev = $urlArray[count($urlArray)-1];	
	return $prev;
}

// This function is to get client info from the database.
function get_client_info()
{
	  global $wpdb;
	  $client_sel = "SELECT client_id, client_name FROM client";
	 
}

add_theme_support('post-thumbnails');



function the_filename($file)
{
	$url = $file;
	$urlArray = explode('/', rtrim($url, '/'));
	$prev = $urlArray[count($urlArray)-1];	
	return $prev;
}

// this gets the excerpt and adds Read the rest...
function new_excerpt_more($more) {
       global $post;
	return ' <a href="'. get_permalink($post->ID) . '">Read the Rest...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
?>