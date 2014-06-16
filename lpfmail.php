<?php

/* All form fields are automatically passed to the PHP script through the array $HTTP_POST_VARS. */
$send_email  = 'leigh@lapetitefleuronline.com'.', ';
$send_email .= 'robertkarsch@gmail.com'.', ';
$send_email .= 'info@lapetitefleuronline.com';
$subject = ' Online inquiry from La Petite Events.com';
$headers = 'From: contact@lapetitefleuronline.com'. "\r\n" .
           'Reply-To: leigh@lapetitefleuronline.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

//Get the form variables
$email = $_POST['lpf_email'];
$name = $_POST['lpf_name'];
$phone = $_POST['lpf_area_code']."-".$_POST['lpf_phone_num2']."-".$_POST['lpf_phone_num3'];
$event_date = $_POST['lpf_month']."-".$_POST['lpf_day']."-".$_POST['lpf_year'];
$event_location = $_POST['lpf_location'];
$num_of_guests = $_POST['lpf_num_of_guests'];
// Handle the checkboxes. Only include the services they checked off in the email.
$services_needed = 'Services Interested In:'."\r\n";
if(isset($_POST['Flowers']) && $_POST['Flowers'] == 'Flowers_and_Decor')
	{
	    $services_needed .= 'Flowers and Decor'."\r\n";
	}
if(isset($_POST['Planning']) && $_POST['Planning'] == 'Event_Planning')
	{
	    $services_needed .=  'Event Planning'."\r\n";
	} 	
if(isset($_POST['Invitations']) && $_POST['Invitations'] == 'Invitations')
	{
	    $services_needed .=  'Invitations'."\r\n";
	} 
if(isset($_POST['Other']) && $_POST['Other'] == 'Other')
	{
	    $services_needed .= 'Other'."\r\n";
	} 			
$comment = $_POST['lpf_comment'];
$hear_abt = $_POST['hear_abt_LPF'];
//$wrap_comment = wordwrap($comment, 60);

//This is the message being sent to through the email.
$message = 'Another inquiry from lpfevents.com'."\r\n\r\n";
$message .= 'Name: '.$name."\r\n";
$message .= 'Email: '.$email."\r\n";
$message .= 'Phone: '.$phone."\r\n";
$message .= 'Event Date: '.$event_date."\r\n";
$message .= 'Event Locations: '.$event_location."\r\n";
$message .= 'Approx Number of Guests: '.$num_of_guests."\r\n\r\n";
$message .= $services_needed."\r\n\r\n";
$message .= 'Comment: '.$comment."\r\n\r\n";
$message .= 'How did you hear about LPF?: '.$hear_abt;

/* Sends the mail and outputs the "Thank you" string if the mail is successfully sent, or the error string otherwise. */
if(mail($send_email, $subject, $message, $headers)) {?>
 <script language="JavaScript" type="text/JavaScript">
<!--
window.location.href = "http://www.lapetitefleuronline.com/thank-you";
//-->
</script>
    <?
} else {?>
   <script language="JavaScript" type="text/JavaScript">
<!--
window.location.href = "http://www.lapetitefleuronline.com/error";
//-->
</script>
<?php }

?>

</body>
</html>