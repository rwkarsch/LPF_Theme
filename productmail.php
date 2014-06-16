<?php

/* All form fields are automatically passed to the PHP script through the array $_POST. */
$send_email  = 'leigh@lapetitefleuronline.com'.', ';
$send_email .= 'robertkarsch@gmail.com'.', ';
$send_email .= 'info@lapetitefleuronline.com';
//$send_email = 'smokeykar@gmail.com'.', ';
//$send_email .= 'robertkarsch@gmail.com';
$subject = ' Product Order from La Petite Fleur.com';
$headers = 'From: contact@lapetitefleuronline.com'. "\r\n" .
           'Reply-To: leigh@lapetitefleuronline.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

//Get the form variables


//Billing Section
$invitetype = $_POST['invite_type'];
$email = $_POST['lpf_email'];
$name = $_POST['billing_name'];
$phone = $_POST['lpf_area_code']."-".$_POST['lpf_phone_num2']."-".$_POST['lpf_phone_num3'];
$shipping_address = $_POST['shipping_address'];

//Customized Section
$quantity = $_POST['quantity_cards'];
$person_names = $_POST['personalized_name'];
$event_date = $_POST['lpf_month']."/".$_POST['lpf_day']."/".$_POST['lpf_year'];
$card_ret_addr = $_POST['card_ret_addr'];

// Handle the checkboxes. Only include the services they checked off in the email.
//$wrap_comment = wordwrap($comment, 60);

//This is the message being sent to through the email.
$message = 'Order from lapetitefleuronline.com'."\r\n\r\n";

$message .= 'Personalization Section:'."\r\n\r\n";
$message .= 'Type of Invitation: '.$invitetype."\r\n";
$message .= 'Quantity: '.$quantity."\r\n";
$message .= 'Names on Card: '.$person_names."\r\n";
$message .= 'Event Date: '.$event_date."\r\n";
$message .= 'Return Address: '.$card_ret_addr."\r\n\r\n";
$message .= 'Billing Information:'."\r\n\r\n";
$message .= 'Billing Name: '.$name."\r\n";
$message .= 'Email Address: '.$email."\r\n";
$message .= 'Phone: '.$phone."\r\n";
$message .= 'Shipping Address: '.$shipping_address;


/* Sends the mail and outputs the "Thank you" string if the mail is successfully sent, or the error string otherwise. */
if(mail($send_email, $subject, $message, $headers)) {?>
 <script language="JavaScript" type="text/JavaScript">
<!--
window.location.href = "http://www.lapetitefleuronline.com/successful-order";
//-->
</script>
    <?
} else {?>
   <script language="JavaScript" type="text/JavaScript">
<!--
window.location.href = "http://www.lapetitefleuronline.com/order-error";
//-->
</script>
<?php }


?>

</body>
</html>