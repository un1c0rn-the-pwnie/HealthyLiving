<?php

include 'config.php';

define('root_pass', ''); // Bale ton kwdkio tou root apo phpmyadmin
define('root_name', 'root'); // bale to onoma tou root apo to phpmyadmin

$link = mysqli_connect(db_db, root_name, root_pass); 

if($link === false){
    die("Could not connect. " . mysqli_connect_error());
}

if(mysqli_query($link, "CREATE USER IF NOT EXISTS 'healthy_living_user'@'localhost' IDENTIFIED BY 'QsXPl,10_+;!';")) {
    echo "User healthy_living_user created successfully<br/>";
} else {
    echo "Could not able to execute $sql. " . mysqli_error($link) . "<br/>";
}

$sql = "CREATE DATABASE healthy_living";
if(mysqli_query($link, $sql)){
    echo "Database healthy_living created successfully<br/>";
} else{
    echo "Could not able to execute $sql. " . mysqli_error($link) . "<br/>";
}

if(mysqli_query($link, "GRANT SELECT, INSERT, UPDATE, DELETE, CREATE ON healthy_living.* TO 'healthy_living_user'@'localhost'")) {
    echo "Privileges granted to healthy_living_user successfully<br/>";
} else {
    echo "Could not able to execute $sql. " . mysqli_error($link) . "<br/>";
}

mysqli_close($link);

$link = new mysqli(db_db, db_user, db_pass, db_name);

$sql = "CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` varchar(20) NOT NULL,
    `email` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    `salt` varchar(32) NOT NULL,
    `login_hash` varchar(255),
    `rg_date` DATE NOT NULL,
    `hash` varchar(32) NOT NULL,
    `active` INT( 1 ) NOT NULL DEFAULT '0'
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1
  COLLATE latin1_general_cs;";

if(mysqli_query($link, $sql)){
    echo "Table users created succcessfully<br/>";
} else{
    echo "Could not able to execute $sql. " . mysqli_error($link) . "<br/>";
}
 
mysqli_close($link);

?>