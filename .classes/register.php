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

if(isset($_POST['submit']) && $captcha_status) {
    $register_attempt = true;
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
        $ret_error = "Το ονομα χρηστη πρεπει να μην περιεχει ειδικους χαρακτηρες μονο μικρα, κεφαλαια και αριθμοι επιτρεπονται";
        return;
    }

    if(!isValidPassword($password)) {
        $ret_error = "Ο κωδικός πρέπει να περιέχει τουλάχιστον έναν αριθμό, έναν κεφαλαίο χαρακτήρα, έναν μικρό χαρακτήρα, και να είναι 8 οι περισσότερα γράμματα μεγάλος.";
        return;
    }

    if(!isValidEmail($email)) {
        $ret_error = "Δεν δόθηκε έγκυρη μορφή email.";
        return;
    }

    // U have succeed to survive from all these checks!

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

    register($username, $email, $password); // You're IN!
}

function register($username, $email, $password) {
    global $conn, $ret_error;

    $salt = bin2hex(random_bytes('16'));
    $password = hash('sha512', $salt . $password);
    $register_date = date("Y-m-d H:i:s");
    $hash = bin2hex(random_bytes('16'));
    $query = "INSERT INTO `users` (username, password, salt, email, rg_date, hash) VALUES ('$username', '$password', '$salt', '$email', '$register_date', '$hash')";

    $result = mysqli_query($conn, $query);
    if(!$result) {
        $ret_error = "Error 007 please contact with admin";
        return;
    }

    // Verification email start
    $subject = 'Healthy living Verification';
    $message = '
    
    Thanks for signing up!
    Your account has been created, you can activated your account by pressing the url below.
    
    Please click this link to activate your account:
    localhost/verify.php?username='.$username.'&hash='.$hash.'
    
    ';
                        
    mail($email, $subject, $message, $headers);
    // Verification email end
    
    // TODO beautiful prompt
    header("Location: index.php");
}

function register_attempt_status() {
    global $register_attempt, $ret_error;
    if($register_attempt) {
        if(isset($ret_error) && !empty($ret_error)) {
            echo "<div>
            $ret_error
            </div> ";
        } else {
            header("Location: index.php");
        }
    }
}

?>