<?php
require_once '.classes/db.php';
require_once '.classes/funcs.php';
if(isset($_GET['username']) && !empty($_GET['username']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    global $conn, $ret_error;
    $username = safe_sqlparam($_GET['username'], $conn);
    $hash = safe_sqlparam($_GET['hash'], $conn);
    $search = mysqli_query($conn,"SELECT email, hash, active FROM users WHERE username='".$username."' AND hash='".$hash."' AND active='0'"); 
    $match  = mysqli_num_rows($search);
                
    if($match > 0){
        mysqli_query($conn,"UPDATE users SET active='1' WHERE username='".$username."' AND hash='".$hash."' AND active='0'");
        $verify_message = 'Your account has been activated, you can now login';
    }else{
        $verify_message = 'The url is either invalid or you already have activated your account.';
    }
}
else{
    $verify_message = 'what are you doing?';
}

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