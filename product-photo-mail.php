<?php
// Pear library includes
// You should have the pear lib installed
include 'Mail.php';
include 'Mail/mime.php' ;

//Settings 
//$max_allowed_file_size = 5000; // size in KB 
$allowed_extensions = array("jpg", "jpeg", "gif", "bmp", "png");
$upload_folder = './uploads/'; //<-- this folder must be writeable by the script
$your_email = 'robertkarsch@gmail.com'.', ';//<<--  update this to your email address
//$your_email = 'robertkarsch@gmail.com';//<<--  update this to your email address
$your_email .= 'leigh@lapetitefleuronline.com'.', ';
$your_email .= 'info@lapetitefleuronline.com';

$errors ='';


	//Get the uploaded file information
	$name_of_uploaded_file =  basename($_FILES['uploaded_file']['name']);
	
	
	//get the file extension of the file
	$type_of_uploaded_file = substr($name_of_uploaded_file, 
							strrpos($name_of_uploaded_file, '.') + 1);
							
							
	
	$size_of_uploaded_file = $_FILES["uploaded_file"]["size"]/1024;
	
    //if($size_of_uploaded_file > $max_allowed_file_size ) 
	//{
	//	$errors .= "\n Size of file should be less than $max_allowed_file_size";
	//	
	//}
	
	//------ Validate the file extension -----
	$allowed_ext = false;
	for($i=0; $i<sizeof($allowed_extensions); $i++) 
	{ 
		if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0)
		{
			$allowed_ext = true;		
		}
		else
		{
			header('Location: http://www.lapetitefleuronline.com/order-error');
		}
	}
	
	if(!$allowed_ext)
	{
		$errors .= "\n The uploaded file is not supported file type. ".
		" Only the following file types are supported: ".implode(',',$allowed_extensions);
		header('Location: http://www.lapetitefleuronline.com/order-error');
	//	echo $errors;
	}
	
	//send the email 
	if(empty($errors))
	{
		//copy the temp. uploaded file to uploads folder
		$path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
		$tmp_path = $_FILES["uploaded_file"]["tmp_name"];
		
		if(is_uploaded_file($tmp_path))
		{
		    if(!copy($tmp_path,$path_of_uploaded_file))
		    {
		    	//$errors .= '\n error while copying the uploaded file';
				//echo $errors;
				// redirect if login was successful
    			header('Location: http://www.lapetitefleuronline.com/order-error');
		    }
		}
	
			//send the email
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
  
		  //$to = $your_email;
		  //$subject="New form submission";
		  //$from = $email;
		 $crlf = "\n";
		  
		 $hdrs = array(
              'From'    => $email,
              'Subject' => 'New Order from LPF online'
              );
			  $text = 'Order from lapetitefleuronline.com'."\r\n\r\n";
  
 		 $text .= 'Personalization Section:'."\r\n\r\n";
 	   	 $text .= 'Type of Invitation: '.$invitetype."\r\n";
		 $text .= 'Quantity: '.$quantity."\r\n";
  		 $text .= 'Names on Card: '.$person_names."\r\n";
  		 $text .= 'Event Date: '.$event_date."\r\n";
  		 $text .= 'Return Address: '.$card_ret_addr."\r\n\r\n";
  		 $text .= 'Billing Information:'."\r\n\r\n";
  		 $text .= 'Billing Name: '.$name."\r\n";
  		 $text .= 'Email Address: '.$email."\r\n";
  		 $text .= 'Phone: '.$phone."\r\n";
  		 $text .= 'Shipping Address: '.$shipping_address;
  		 $text .= 'Size of Uploaded File: '.$size_of_uploaded_file.' KB';
		
		$mime = new Mail_mime(array('eol' => $crlf));
		
		$mime->setTXTBody($text); 
		$mime->addAttachment($path_of_uploaded_file);
	
		$body = $mime->get();
		$hdrs = $mime->headers($hdrs);
		$mail =& Mail::factory('mail');
		$mail->send($your_email, $hdrs, $body);

		//redirect to 'thank-you page
		header('Location: http://www.lapetitefleuronline.com/successful-order');
		
	}



?>