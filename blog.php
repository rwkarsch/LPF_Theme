<?php

/*

Template Name: Blog

*/

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" />  
<!-- This is the font script -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/Helv-Joey.font.js" type="text/javascript"></script>
<script type="text/javascript">
			Cufon.replace('#container');
</script>
<script language="JavaScript" type="text/JavaScript">
window.location.href = "http://inspiredaisle.blogspot.com/";
</script>


<title><?php echo the_slug(); ?></title>

<?php wp_head() // Do not remove; helps plugins work ?>

  

</head>
<body>
</body>
</html>

