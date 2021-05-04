<?php

$email_attempt = false;
$email_error = "";

if(isset($_POST['submit']) && $captcha_status){
  $email_attempt = true;
  if (empty($_POST["email"])) {
      die("Email is required");
      return;
  } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $email_error = "Invalid email format"; 
          return;
      }
  }

  if (empty($_POST["subject"])) {
      die("subject is required");
      return;
  } else {
      $subject = test_input($_POST["subject"]);
  }
  
  
  if (empty($_POST["comment"])) {
      die("comment is required");
      return;
  } else {
      $comment = test_input($_POST["comment"]);
  }
  $ouremail = "healthylivingauth@gmail.com";
  $header = "Sender ".$email;
  mail($ouremail, $subject, $comment, $header);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function email_attempt_status() {
  global $email_attempt, $email_error;
  if($email_attempt) {
      if(isset($email_error) && !empty($email_error)) {
          echo "
          <div>
              $email_error
          </div> ";
      }
  }
}
?>