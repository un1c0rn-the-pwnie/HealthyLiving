<?php
    session_start();
    include '.classes/auth.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Healthy Living</title>
    <link rel="icon" href="images/yin-yang.jpg">
    <meta name="description" content="Home Page">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/all_pages.css">
    <link rel="stylesheet" href="css/BasicPages.css">
    <link rel="stylesheet" href="css/slider.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
    <!-------------------------------------------- Header Menu -------------------------------------------------->
    <?php
        include 'header.php';
    ?>
    <!------------------------------------------ End of Header Menu ---------------------------------------------------->

    <br>
    <br>
    <br>
    <br>

    <!------------------------------------------- Main Body ---------------------------------------------------->
    <h3>Validate Page</h3>
    <!----------------------------------------- End of Main Body ---------------------------------------------->

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
                echo 'Your account has been activated, you can now login';
            }else{
                echo 'The url is either invalid or you already have activated your account.';
            }
        }
        else{
            echo 'what are you doing?';
        }

    ?>

    <br>
    <br>

    <!------------------------------------------------ Footer ------------------------------------------------>
    <?php
        readfile('footer.html');
    ?>
    <!--------------------------------------------- End of Footer ---------------------------------------------->


    <script src="JavaScript/all_pages.js"></script>
</body>

</html>

<?php
    $conn->close(); // close database connection
?>