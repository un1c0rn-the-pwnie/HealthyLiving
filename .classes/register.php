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
    $username = $_POST['username'];

    if(empty($username)) {
        die("Empty username");
    }

    $password = $_POST['password'];

    if(empty($password)) {
        die("Empty password");
    }

    $email = $_POST['email'];

    if(empty($email)) {
        die("Empty email");
    }

    if(!isValidUsername($username)) {
        die("Invalid username");
    }

    if(!isValidPassword($password)) {
        die("Invalid password");
    }

    if(!isValidEmail($email)) {
        die("Invalid email");
    }

    // U have succeed to survive from all these checks!
    $register_attempt = true;

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
    $query = "INSERT INTO `users` (username, password, salt, email, rg_date) VALUES ('$username', '$password', '$salt', '$email', '$register_date')";

    $result = mysqli_query($conn, $query);
    if(!$result) {
        $ret_error = "Error 007 please contact with admin";
        return;
    }
    
    // TODO Verification email
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