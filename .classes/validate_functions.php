<?php

require_once 'defines.php';

function isValidUsername($username)
{
    if (ctype_alnum($username)) {
        return true;
    }
    return false;
}

function isValidPassword($password)
{
    return true;
}

function isValidEmail($email) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

?>