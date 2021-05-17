<?php
require_once 'validate_functions.php';
require_once 'db.php';
require_once 'funcs.php';

$password_attempt = false;
$is_valid_url = true;

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['code']) && !empty($_GET['code'])){
    global $conn, $ret_error;
    $email = safe_sqlparam($_GET['email'], $conn);
    $code = safe_sqlparam($_GET['code'], $conn);
    $search = mysqli_query($conn,"SELECT email, code FROM reset WHERE email='".$email."' AND code='".$code."'"); 
    $match  = mysqli_num_rows($search);
                
    if($match > 0){
        $reset_message =  'You can now reset your password';
        $password_error = "";
        if(isset($_POST['submit'])) {
            $password_attempt = true;

            $password = $_POST['password'];

            if(empty($password)) {
                $password_error = "Δεν δόθηκε κωδικός.";
                return;
            }

            if(!isValidPassword($password)) {
                $password_error = "Ο κωδικός πρέπει να περιέχει τουλάχιστον έναν αριθμό, έναν κεφαλαίο χαρακτήρα, έναν μικρό χαρακτήρα, και να είναι 8 οι περισσότερα γράμματα μεγάλος.";
                return;
            }

            // U have succeed to survive from all these checks!

            $password = safe_sqlparam($password, $conn);
            $email = $_GET['email'];


            $salt = bin2hex(random_bytes('16'));
            $password = hash('sha512', $salt . $password);
            mysqli_query($conn,"UPDATE `users` SET `password`='".$password."', `salt`='".$salt."' WHERE `email`='".$email."';");
            mysqli_query($conn,"DELETE FROM `reset` WHERE `email`='".$email."';");
            $reset_message = 'Egine allagi kodikou';
            $is_valid_url = false;
        }
    }else{
        $reset_message = 'The url is invalid.';
        $is_valid_url = false;
    }
}
else{
    $reset_message = 'what are you doing?';
    $is_valid_url = false;
}

function reset_attempt_status() {
    global $reset_message;
    if(isset($reset_message) && !empty($reset_message)) {
        echo "
        <center>
            <div>
                $reset_message
            </div>
        <center> ";
    }
}
function password_attempt_status() {
    global $password_attempt, $password_error;
    if($password_attempt) {
        if(isset($password_error) && !empty($password_error)) {
            echo "
            <div>
                $password_error
            </div> ";
        }
    }
}
?>