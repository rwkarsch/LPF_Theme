<?php

/*

Template Name: Contact

*/

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" />  

<!-- Favicon -->
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/graphics/favicon.ico" />

<!-- This is the font script -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/lpfevents.font.js" type="text/javascript"></script>
<script type="text/javascript">
			Cufon.replace('#container-contact');
</script>

<script type="text/javascript">
function validateForm()
{
var x=document.forms["form1"]["lpf_name"].value
if (x==null || x=="")
  {
  alert("First name must be filled out");
  return false;
  }
  
var x=document.forms["form1"]["lpf_email"].value
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
  
var x=document.forms["form1"]["lpf_area_code"].value
if (x==null || x=="")
  {
  alert("Phone number is not completely filled out");
  return false;
  }
   
var x=document.forms["form1"]["lpf_phone_num2"].value
if (x==null || x=="")
  {
  alert("Phone number is not completely filled out");
  return false;
  }
   
var x=document.forms["form1"]["lpf_phone_num3"].value
if (x==null || x=="")
  {
  alert("Phone number is not completely filled out");
  return false;
  }       
}


</script>
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


<title><?php echo the_slug(); ?></title>

<?php wp_head() // Do not remove; helps plugins work ?>

  

</head>
<body>
<div id = "container-contact">
	
    <div id = "container-header">
  		<a href="http://www.lapetitefleuronline.com">
	        <img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/newlogowebsite.png" alt="Home" />
    	</a>
    </div>
    
    <div id = "links">
    	<ul>
			<?php wp_list_pages('sort_column=menu_order&include=13,15,21,23,34&title_li='); ?>
        	<li><img src="<?php bloginfo('stylesheet_directory'); ?>/graphics/little-break-graphic.gif" alt="--" /></li>
        	<?php wp_list_pages('sort_column=menu_order&include=25,17,9,27,29,1981&title_li='); ?>
        	<!--<li><a title="blog" href="http://www.lapetitefleuronline.com/blog" target="_blank">blog</a></li>-->
        </ul>
    </div>
    
        
    <div id = "content-contact">
Let's get your party started! <br /><br />Please complete the form below, and a member of our design team will contact you within a few days. <br /><br />Any questions? 215.576.1814<br /><br />
        

  
<form id="form1" name="form1" method="post" onsubmit="return validateForm();" action="<?php bloginfo('stylesheet_directory'); ?>/lpfmail.php">
<table width="95%" border="0">
  <tr>
    <td class = "lpf_table" width="35%"><p>* Name:</p></td>
    <td class = "lpf_right_side" width="65%">
      <input type="text" name="lpf_name" id="lpf_name" size="35"/></td>
    </tr>
  <tr>
    <td class = "lpf_table" ><p>* Email Address:</p></td>
    <td class = "lpf_right_side">
      <input type="text" name="lpf_email" id="lpf_email" size="35"/></td>
    </tr>
  <tr>
    <td class = "lpf_table" ><p>* Phone Number:</p></td>
    <td class = "lpf_right_side">
      <input name="lpf_area_code" type="text" id="lpf_area_code" size="2" maxlength="3" />
      -
      
      <input name="lpf_phone_num2" type="text" id="lpf_phone_num2" size="2" maxlength="3" /> 
      -
      
      <input name="lpf_phone_num3" type="text" id="lpf_phone_num3" size="3" maxlength="4" /></td>
    </tr>
  <tr>
    <td class = "lpf_table" ><p>Event Date:</p></td>
    <td class = "lpf_right_side">
      <input name="lpf_month" type="text" id="lpf_month" size="2" maxlength="2" /> 
      /
      <input name="lpf_day" type="text" id="lpf_day" size="2" maxlength="2" /> 
      / 
      <input name="lpf_year" type="text" id="lpf_year" size="3" maxlength="4" /></td>
    </tr>
  <tr>
    <td class = "lpf_table" ><p>Venue:</p></td>
    <td class = "lpf_right_side"><input type="text" name="lpf_location" id="lpf_location" size="35"/></td>
    </tr>
  <tr>
  	<td class = "lpf_table" ><p>&nbsp;<br />&nbsp;</p></td>
    <td class = "lpf_right_side" ><p>&nbsp;<br />&nbsp;</p></td>
  </tr>
  <tr>
    <td class = "lpf_table" valign=top ><p>Services Needed:<br />
    (select all that apply)</p></td>
    <td><table width="350">
      <tr>
        <td width="169" class = "lpf_right_side" ><label>
          <input type="checkbox" name="Flowers" value="Flowers_and_Decor" id="Services_0" />
          Flowers and Decor</label></td>
        <td width="169" class = "lpf_right_side" ><label>
          <input type="checkbox" name="Planning" value="Event_Planning" id="Services_4" />
          Event Planning</label></td>
      </tr>
  
      <tr>
        <td class = "lpf_right_side"><label>
          <input type="checkbox" name="Invitations" value="Invitations" id="Services_2" />
          Invitations</label></td>
         <td class = "lpf_right_side"><label>
         <input type="checkbox" name="Other" value="Other" id="Services_5" />
         Other</label>
         </td>
    
        </tr>
       
    </table></td>
     
    </tr>
  
    <td class = "lpf_table" ><p>Number of Guests:</p></td>
    <td class = "lpf_right_side"><input type="text" name="lpf_num_of_guests" id="lpf_num_of_guests" size="5"/></td>
    </tr>
    
  <tr>
    <td class = "lpf_table" ><p>Additional Info:</p></td>
    <td class = "lpf_right_side"><textarea name="lpf_comment" id="lpf_comment" cols="40" rows="6"></textarea></td>
  </tr>
  <tr>
  	<td class = "lpf_table" >How did you hear about us?</td>
  	<td class = "lpf_right_side">
      <input type="text" name="hear_abt_LPF" id="hear_abt_LPF" size="40"></td>
  </tr>
  <tr></tr>
  
  <tr>
    <td>&nbsp;</td>
    <td class = "lpf_right_side">
      <input type="submit" name="button2" id="button2" class="formbutton" value="Submit" /></td>
  </tr>
  
</table>

</form>
			

        
        
        
    </div> <!-- end class = content -->
</div>
<?php get_footer(); ?>
