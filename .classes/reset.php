<?php
require_once 'validate_functions.php';
require_once 'db.php';
require_once 'funcs.php';

$reset_attempt = true;
$reset_error = "";
if(isset($_POST['submit'])) {
    $register_attempt = true;

    $password = $_POST['password'];

    if(empty($password)) {
        echo "Δεν δόθηκε κωδικός.";
        return;
    }

    if(!isValidPassword($password)) {
        echo "Ο κωδικός πρέπει να περιέχει τουλάχιστον έναν αριθμό, έναν κεφαλαίο χαρακτήρα, έναν μικρό χαρακτήρα, και να είναι 8 οι περισσότερα γράμματα μεγάλος.";
        return;
    }

    // U have succeed to survive from all these checks!

    $password = safe_sqlparam($password, $conn);
    $email = $_GET['email'];


    $salt = bin2hex(random_bytes('16'));
    $password = hash('sha512', $salt . $password);
    mysqli_query($conn,"UPDATE `users` SET `password`='".$password."', `salt`='".$salt."' WHERE `email`='".$email."';");
    mysqli_query($conn,"DELETE FROM `reset` WHERE `email`='".$email."';");
    header("Location: index.php");
}
?>