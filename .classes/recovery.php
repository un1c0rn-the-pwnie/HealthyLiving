<?php

require_once '.classes/db.php';
require_once '.classes/funcs.php';

$email_attempt = false;
$email_error = "";

if(isset($_POST['submit'])){
    $email_attempt = true;
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
    global $conn;
    $email  = safe_sqlparam($email, $conn);
    $row = retrieve_email_row($email);
    if($row == null) {
        $email_error = "Λάθος email, παρακαλώ προσπαθήστε ξανά.";
        return;
    }


    $code  = bin2hex(random_bytes('16'));
    $query = "INSERT INTO `reset` (email, code) VALUES ('$email', '$code')";

    $result = mysqli_query($conn, $query);
    if(!$result) {
        $ret_error = "Error 007 please contact with admin";
        return;
    }

    $subject = 'Healthy living Αλλαγή Κωδικού';
    $message = '

    Μπορείτε να αλλάξετε τον κωδικό σας πατόντας τον παρακάτω σύνδεσμο:
    
    http://localhost/Reset.php?email='.$email.'&code='.$code.'
        
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