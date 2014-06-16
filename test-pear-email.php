<?php

include 'Mail.php';
include 'Mail/mime.php' ;

//check to see if I have the path right:
$file_x = "uploads/11bouquet.jpg";

if (file_exists($file_x)) {
    echo $file_x . " exists";
} else {
    echo $file_x . " does not exist";
}



$text = 'Text version of email';
//$html = '<html><body>HTML version of email</body></html>';
$file = 'uploads/11bouquet.jpg';
$crlf = "\n";
$hdrs = array(
              'From'    => 'rwkarsch@yahoo.com',
              'Subject' => 'Test mime message'
              );

$mime = new Mail_mime(array('eol' => $crlf));

$mime->setTXTBody($text);
if(!$mime) {
	echo "Could not text body";
}
else {
	echo "Success on text body";
}

//$mime->setHTMLBody($html);
//if(!$mime) {
//	echo "Could not HTML";
//}
//else {
//	echo "Success on HTML";
//}

//$mime->addAttachment($file, 'image/jpeg', '11bouquet.jpeg' );
$mime->addAttachment($file);

if(!$mime) {
	echo "Could not attach the email";
}
else {
	echo "Success on the Attachment";
}




$body = $mime->get();
$hdrs = $mime->headers($hdrs);

$mail =& Mail::factory('mail');
$mail->send('robertkarsch@gmail.com', $hdrs, $body);

?>
