<?php

require_once '.classes/db.php';
require_once '.classes/funcs.php';

$email_attempt = false;
$email_error = "";
//Αρχικά ελέγχουμε άμα έχει σταλθεί η φόρμα
if(isset($_POST['submit'])){
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
    global $conn;
    $email  = safe_sqlparam($email, $conn);
    $row = retrieve_email_row($email);
    if($row == null) {
        $email_error = "Λάθος email, παρακαλώ προσπαθήστε ξανά.";
        return;
    }

    //δημιουργούμε έναν μοναδικό κωδικό ανάκτησης για το url της αλλαγής Κωδικού και αποθήκευσέ το σε μία βάση
    $code  = bin2hex(random_bytes('16'));
    $query = "INSERT INTO `reset` (email, code) VALUES ('$email', '$code')";

    $result = mysqli_query($conn, $query);
    if(!$result) {
        $email_error = "Error 007 please contact with admin";
        return;
    }
    //Στέλνουμε το email με το url
    $subject = 'Healthy living Αλλαγή Κωδικού';
    $message = '

    Μπορείτε να αλλάξετε τον κωδικό σας πατόντας τον παρακάτω σύνδεσμο:
    
    http://localhost/Reset.php?email='.$email.'&code='.$code.'
        
    ';
    mail($email, $subject, $message);
    $email_error = 'Σας στάλθηκε κωδικός επαναφοράς στην διεύθυνση που δηλώσατε.';
}

//φιλτράρισμα κακόβουλου κώδικα
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//Για να δείξουμε στον χρήστη ενημερωτικά μυνήματα για την διαδικασία
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