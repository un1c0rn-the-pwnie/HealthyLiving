<?php

require_once 'config.php';
require_once 'defines.php';

function returnError($error) {
    if(ShowErrors) {
        if(!empty($error)) {
            exit($error);
        }
    }
}

$conn = new mysqli(db_db, db_user, db_pass, db_name);
if ($conn->connect_error) {
    returnError("Couldn't connect to mysql: " . $conn->connect_error);
}

$conn->set_charset(db_charset);

?>