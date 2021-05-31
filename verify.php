<?php
    session_start();
    include '.classes/auth.php';
    include '.classes/verify.php';
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
    <br>
    <br>
    <br>
    <br>

    <!------------------------------------------- Main Body ---------------------------------------------------->
    <h3>Validate Page</h3>

    <br>
    <br>

    <main>
        <?php
            verify_attempt_status();
        ?>
    </main>
    
    <br>
    <br>
    <!----------------------------------------- End of Main Body ---------------------------------------------->

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