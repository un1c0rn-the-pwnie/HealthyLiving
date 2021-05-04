<?php

$captcha_status = false;

if(isset($_POST['g-recaptcha-response'])) {
    if(empty($_POST['g-recaptcha-response'])) {
        $captcha_error = "Το reCaptcha απέτυχε.";
        $catpcha_status = false;
    } else {
        $secret_key = '6LfZoMUaAAAAAJ5Jk8cHicIcg0UNm9pUS90uFwF9';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        //die(var_dump($responseData));
        if (!$responseData->success) {
            $captcha_error = "Το reCapthca απέτυχε";
            $captcha_status = false;
        } else {
            $captcha_status = true;
        }
    }
}


function display_captcha_status() {
    global $captcha_status, $captcha_error;
    if(!$captcha_status) {
        if(isset($captcha_error) && !empty($captcha_error)) {
            echo "
            <div>
                $captcha_error
            </div> ";
        }
    }
}

?>