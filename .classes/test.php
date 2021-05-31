<?php

session_start();

echo var_dump($_SESSION);
if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    echo "HELLO BABY";
}

?>