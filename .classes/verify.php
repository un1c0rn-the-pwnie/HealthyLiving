<?php
require_once '.classes/db.php';
require_once '.classes/funcs.php';
//Αρχικά ελέγχουμε άμα έχει σταλθεί url με τις σωστές μεταβλητές
if(isset($_GET['username']) && !empty($_GET['username']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    global $conn, $ret_error;
    //Ελέγχουμε άμα κάθε μεταβλητή έχει υποβληθεί σωστα και περιορίζουμε τον κακόβουλο κώδικα
    $username = safe_sqlparam($_GET['username'], $conn);
    $hash = safe_sqlparam($_GET['hash'], $conn);
    $search = mysqli_query($conn,"SELECT email, hash, active FROM users WHERE username='".$username."' AND hash='".$hash."' AND active='0'"); 
    $match  = mysqli_num_rows($search);
                
    if($match > 0){
        //Άμα είναι στην βάση ενεργοποιούμε τον λογαριασμό
        mysqli_query($conn,"UPDATE users SET active='1' WHERE username='".$username."' AND hash='".$hash."' AND active='0'");
        $verify_message = 'Ο λογαριασμός ενεργοποιήθηκε , μπορείτε να συνδεθείτε';
    }else{
        $verify_message = 'Ο σύνδεσμος είναι λανθασμένος ή έγινε ενεργοποίηση του λογαριασμού.';
    }
}
else{
    die("τί πάς να κάνεις hacker;");
}
//Για να δείξουμε στον χρήστη ενημερωτικά μυνήματα για την διαδικασία
function verify_attempt_status() {
    global  $verify_message;
    if(isset($verify_message) && !empty($verify_message)) {
        echo "
        <center>
            <div>
                $verify_message
            </div>
        </center> ";
    }
}
?>