<?php

function the_slug() {
$post_data = get_post($post->ID, ARRAY_A);
$slug = $post_data['post_name'];
return $slug; }

function the_full_slug() {
$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://"; 
if ($_SERVER["SERVER_PORT"] != "80")
 {     $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"]; } 
else  
 {     $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; } 
 return $pageURL;} 


?>

