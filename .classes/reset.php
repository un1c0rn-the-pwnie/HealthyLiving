<?php
require_once 'validate_functions.php';
require_once 'db.php';
require_once 'funcs.php';

$password_attempt = false;
$is_valid_url = true;
//Αρχικά ελέγχουμε άμα έχει σταλθεί url με τις σωστές μεταβλητές
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['code']) && !empty($_GET['code'])){
    global $conn, $ret_error;
    //Ελέγχουμε άμα κάθε μεταβλητή έχει υποβληθεί σωστα και περιορίζουμε τον κακόβουλο κώδικα
    $email = safe_sqlparam($_GET['email'], $conn);
    $code = safe_sqlparam($_GET['code'], $conn);
    $search = mysqli_query($conn,"SELECT email, code FROM reset WHERE email='".$email."' AND code='".$code."'"); 
    $match  = mysqli_num_rows($search);
            
    if($match > 0){
        //Άμα είναι στην βάση μπορέι να αλλάγξει τον κωδικό του
        $reset_message =  'Μπορείς να αλλάξεις τον κωδικό σου';
        $password_error = "";
        //ελέγχουμε άμα έχει σταλθεί η φόρμα
        if(isset($_POST['submit'])) {
            $password_attempt = true;
            //Ελέγχουμε άμα κάθε πεδίο έχει υποβληθεί σωστα
            $password = $_POST['password'];

            if(empty($password)) {
                $password_error = "Δεν δόθηκε κωδικός.";
                return;
            }

            // Άμα όλα είναι σωστά άλλαξε τον κωδικό και ενημέρωσε τις βάσεις

            $password = safe_sqlparam($password, $conn);

            $salt = bin2hex(random_bytes('16'));
            $password = hash('sha512', $salt . $password);
            mysqli_query($conn,"UPDATE `users` SET `password`='".$password."', `salt`='".$salt."' WHERE `email`='".$email."';");
            mysqli_query($conn,"DELETE FROM `reset` WHERE `email`='".$email."';");
            $reset_message = 'Έγινε αλλαγή του κωδικού';
            $is_valid_url = false;
        }
    }else{
        $reset_message = 'Λανθασμένος σύνδεσμος αλλαγής κωδικού';
        $is_valid_url = false;
    }
}
else{
    die("τί πάς να κάνεις hacker;");
    $is_valid_url = false;
}
//Για να δείξουμε στον χρήστη ενημερωτικά μυνήματα για την διαδικασία
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
//Για να δείξουμε στον χρήστη ενημερωτικά μυνήματα για την διαδικασία
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