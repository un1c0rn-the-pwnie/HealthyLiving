<?php

require_once 'db.php';
require_once 'funcs.php';

session_start();

if($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Λάθος method.");
}

if(!isset($_POST['comment_id']) || empty($_POST['comment_id'])) {
    die("Το id δεν πρέπει να είναι κενό.");
}

if(!isset($_POST['comment_database']) || empty($_POST['comment_database'])) {
    die("Το commentdb δεν πρέπει να είναι κενό.");
}

if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    $comment_tables = array("comments_sport", "comments_calculator", "comments_diet");

    $commentdb = safe_sqlparam($_POST['comment_database'], $conn);
    $comment_id = safe_sqlparam($_POST['comment_id'], $conn);

    if(!in_array($commentdb, $comment_tables)) {
        die("Λάθος table");
    }

    $query = "SELECT * FROM `$commentdb` WHERE ID = '$comment_id';";

    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    if($rows !== 1) {
         die("Δεν υπάρχει το id.");
    }

    $query = "DELETE FROM `$commentdb` WHERE id='$comment_id';";
    $result = mysqli_query($conn,$query);

    echo "success";

    $conn->close();

} else {
    echo "Πρέπει να είστε διαχειρηστής.";
}

?>