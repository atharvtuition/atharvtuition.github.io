<?php

// Define some constants
define( "RECIPIENT_NAME", "Atharv Tuition Center" );
define( "RECIPIENT_EMAIL", "atharvtuition.education@gmail.com" );


// Read the form values
$success = false;
$sendername = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $sendername && $senderEmail && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = " From: " . $senderEmail ;
  $msgBody = "\n".$message;
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: ../index.html');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: ../index.html');	
}

?>