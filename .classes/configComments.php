<?php 

    $server = "localhost";
    $username = "healthy_living_user";
    $password = "QsXPl,10_+;!";
    $database = "healthy_living";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) { // If Check Connection
        die("<script>alert('Connection Failed.')</script>");
    }

?>