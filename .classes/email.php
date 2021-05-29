<?php

$email_attempt = false;
$email_error = "";
//Αρχικά ελέγχουμε άμα έχει σταλθεί η φόρμα και έχει πατηθεί το captcha
if(isset($_POST['submit']) && $captcha_status){
  $email_attempt = true;
  //Ελέγχουμε άμα κάθε πεδίο έχει υποβληθεί σωστα και περιορίζουμε τον κακόβουλο κώδικα
  if (empty($_POST["email"])) {
      die("Το email απαιτείτε");
      return;
  } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $email_error = "λάθος μορφή email"; 
          return;
      }
  }

  if (empty($_POST["subject"])) {
      die("Το θέμα απαιτείτε");
      return;
  } else {
      $subject = test_input($_POST["subject"]);
  }
  
  
  if (empty($_POST["comment"])) {
      die("Το σχόλιο απαιτείτε");
      return;
  } else {
      $comment = test_input($_POST["comment"]);
  }

  //Άμα όλα είναι σωστά στείλε το email στους διαχειριστές του site
  $ouremail = "healthylivingauth@gmail.com";
  $header = "Sender ".$email;
  mail($ouremail, $subject, $comment, $header);
}

//φιλτράρισμα κακόβουλου κώδικα
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//Για να δείξουμε στον χρήστη ενημερωτικά μυνήματα για την διαδικασία
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