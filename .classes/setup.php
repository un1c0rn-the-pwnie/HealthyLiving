<?php
//Αρχείο που σημιουργεί την βάση και τους πίνακες που χρειάζεται το site για να λειτουργήσει
include 'config.php';

define('root_pass', 'QsXPl,10_+;!'); // Bale ton kwdkio tou root apo phpmyadmin
define('root_name', 'root'); // bale to onoma tou root apo to phpmyadmin

$link = mysqli_connect(db_db, root_name, root_pass); 

if($link === false){
    die("Αλλαξτε τον κωδικο του root της mysql στο αρχειο .classes/setup.php να τεριαζει με αυτον του phpmyadmin ωστε να φτιαχτει η βαση σωστα.<br/><br/>" . mysqli_connect_error());
}

if(mysqli_query($link, "CREATE USER IF NOT EXISTS 'healthy_living_user'@'localhost' IDENTIFIED BY 'QsXPl,10_+;!';")) {
    echo "User healthy_living_user created successfully<br/>";
} else {
    echo "Could not able to execute $sql. " . mysqli_error($link) . "<br/>";
}

$sql = "CREATE DATABASE IF NOT EXISTS healthy_living";
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

$sql = "CREATE TABLE IF NOT EXISTS `reset` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `email` varchar(50) NOT NULL,
    `code` varchar(32) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1
  COLLATE latin1_general_cs;";

if(mysqli_query($link, $sql)){
    echo "Table reset created succcessfully<br/>";
} else{
    echo "Could not able to execute $sql. " . mysqli_error($link) . "<br/>";
}

$sql = "CREATE TABLE IF NOT EXISTS `comments_diet` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(255) NOT NULL,
    `comment` mediumtext NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8
  COLLATE utf8_bin;";

if(mysqli_query($link, $sql)){
    echo "Table comments_diet created succcessfully<br/>";
} else{
    echo "Could not able to execute $sql. " . mysqli_error($link) . "<br/>";
}

$sql = "CREATE TABLE IF NOT EXISTS `comments_sport` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(255) NOT NULL,
    `comment` mediumtext NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8
  COLLATE utf8_bin;";

if(mysqli_query($link, $sql)){
    echo "Table comments_sport created succcessfully<br/>";
} else{
    echo "Could not able to execute $sql. " . mysqli_error($link) . "<br/>";
}

$sql = "CREATE TABLE IF NOT EXISTS `comments_calculator` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(255) NOT NULL,
    `comment` mediumtext NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8
  COLLATE utf8_bin;";

if(mysqli_query($link, $sql)){
    echo "Table comments_calculator created succcessfully<br/>";
} else{
    echo "Could not able to execute $sql. " . mysqli_error($link) . "<br/>";
}
 
mysqli_close($link);

?>