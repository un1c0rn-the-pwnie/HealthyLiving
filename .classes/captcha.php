<?php

$captcha_status = false;
$capthca_error = "";
//Έλεχγος άμα πατήθηκε το captcha
if(isset($_POST['g-recaptcha-response'])) {
    if(empty($_POST['g-recaptcha-response'])) {
        $captcha_error = "Το reCaptcha απέτυχε.";
        $catpcha_status = false;
    } else {
        //άμα πατήθηκε έλεγξε με το api της google άμα δεν είναι μποτάκι
        $secret_key = '6LfZoMUaAAAAAJ5Jk8cHicIcg0UNm9pUS90uFwF9';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . urlencode($_POST['g-recaptcha-response']));
        $responseData = json_decode($verifyResponse);
        if (!$responseData->success) {
            $captcha_error = "Το reCapthca απέτυχε";
            $captcha_status = false;
        } else {
            $captcha_status = true;
        }
    }
}

//Για να δείξουμε στον χρήστη ενημερωτικά μυνήματα για την διαδικασία
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