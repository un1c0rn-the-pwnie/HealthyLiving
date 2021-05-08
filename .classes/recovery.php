<?php

require_once '.classes/db.php';
require_once '.classes/funcs.php';

$email_attempt = false;
$email_error = "";

if(isset($_POST['submit'])){
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
    global $conn;
    $email  = safe_sqlparam($email, $conn);
    $row = retrieve_email_row($email);
    if($row == null) {
        $email_error = "Λάθος email, παρακαλώ προσπαθήστε ξανά.";
        return;
    }

    $password = $row[3];

    $subject = 'Healthy living Password Recovery';
    $message = '
        
    Below you can see your password:

    password = '.$password.'
        
    ';
    mail($email, $subject, $message);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function recovery_attempt_status() {
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