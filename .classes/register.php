<?php

require_once 'validate_functions.php';
require_once 'db.php';
require_once 'funcs.php';
require_once 'captcha.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$register_attempt = false;
$ret_error = "";
//Αρχικά ελέγχουμε άμα έχει σταλθεί η φόρμα και έχει πατηθεί το captcha
if(isset($_POST['submit']) && $captcha_status) {
    $register_attempt = true;
    //Ελέγχουμε άμα κάθε πεδίο έχει υποβληθεί σωστα και περιορίζουμε τον κακόβουλο κώδικα
    $username = $_POST['username'];

    if(empty($username)) {
        $ret_error = "Δεν δόθηκε όνομα χρήστη.";
        return;
    }

    $password = $_POST['password'];

    if(empty($password)) {
        $ret_error = "Δεν δόθηκε κωδικός.";
        return;
    }

    $email = $_POST['email'];

    if(empty($email)) {
        $ret_error = "Κένο email.";
        return;
    }

    if(!isValidUsername($username)) {
        $ret_error = "Το ονομα χρηστη πρεπει να είναι μέχρι 20 γράμματα ,να περιέχει μόνο λατινικούς χαρακτήρες και να μην περιεχει ειδικους χαρακτηρες μονο μικρα, κεφαλαια και αριθμοι επιτρεπονται";
        return;
    }

    if(!isValidEmail($email)) {
        $ret_error = "Δεν δόθηκε έγκυρη μορφή email.";
        return;
    }

    $username = safe_sqlparam($username, $conn);
    $password = safe_sqlparam($password, $conn);
    $email    = safe_sqlparam($email, $conn);

    if(isRegisteredUsername($username)) {
        $ret_error = "Το όνομα χρήστη είναι πιασμένο.";
        return;
    }

    if(isRegisteredEmail($email)) {
        $ret_error = "Η διεύθυνση ηλεκτρονικού ταχυδρομείου χρησημοποιείται απο άλλον λογαριασμό.";
        return;
    }

    //Άμα όλα είναι σωστά κάνε το register
    register($username, $email, $password);
}

function register($username, $email, $password) {
    global $conn, $ret_error;
    //Δημιουργία salt για κρηπτογράφηση του κωδικού
    $salt = bin2hex(random_bytes('16'));
    $password = hash('sha512', $salt . $password);
    $register_date = date("Y-m-d H:i:s");
    //δημιουργούμε έναν μοναδικό κωδικό επιβεβαίωσης για το url της επιβεβαίωσης
    $hash = bin2hex(random_bytes('16'));
    //Τα αποθηκέυουμε όλα στην βάση
    $query = "INSERT INTO `users` (username, password, salt, email, rg_date, hash) VALUES ('$username', '$password', '$salt', '$email', '$register_date', '$hash')";

    $result = mysqli_query($conn, $query);
    if(!$result) {
        $ret_error = "Error 007 please contact with admin";
        return;
    }

    // Στέλνουμε το email με το url της επιβεβαίωσης
    $subject = 'Healthy living Επιβεβαίωση';
    $message = '
    
    Ευχαριστούμε για την εγγραφή σας!
    Δημιουργήθηκε επιτυχώς ο λογαριασμός σας , μπορείτε να τον ενεργοποιήσετε πατόντας τον παρακάτω σύνδεσμο:
    
    http://localhost/verify.php?username='.$username.'&hash='.$hash.'
    
    ';
                        
    mail($email, $subject, $message);

    
    $ret_error = "Δημιουργήθηκε επιτυχώς ο λογαριασμός σας , στάλθηκε ένα email επιβεβαίωσης στο email σας";
}

//Για να δείξουμε στον χρήστη ενημερωτικά μυνήματα για την διαδικασία
function register_attempt_status() {
    global $register_attempt, $ret_error;
    if($register_attempt) {
        if(isset($ret_error) && !empty($ret_error)) {
            echo "<div>
            $ret_error
            </div> ";
        } 
    }
}

?>