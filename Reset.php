<?php
    session_start();
    include '.classes/auth.php';
    include '.classes/reset.php';
?>

<!DOCTYPE html>
<html>

<head>

    <title>Healthy Living</title>
    <link rel="icon" href="images/yin-yang.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Contact Page">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script> 

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="css/all_pages.css">
    <link rel="stylesheet" href="css/Interaction.css">
    <link rel="stylesheet" href="css/green-bootstrap.css">
</head>

<body>

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

    <!-------------------------------------------- Main Body ---------------------------------------------------------->
    <!-- Basic Form for sending email -->
    <main>
        <h3>Αλλαγή Κωδικού</h3>
        </br>
        </br>

        <?php
            reset_attempt_status();
        ?>
        </br>
        </br>
        <?php

            //Έλεγχος άμα είναι σωστό το url δείξε την φόρμα αλλαγής του κωδικού
            if($is_valid_url === true){
                include_once '.classes/reset_form.php';
            }
        ?>
    </main>



    <!-- End of Basic Form for sending email -->

    <!----------------------------------------- End of Main Body -------------------------------------------------->

    <br>
    <br>

    <!------------------------------------------------ Footer ------------------------------------------------>
    <?php
        readfile('footer.html');
    ?>
    <!--------------------------------------------- End of Footer ---------------------------------------------->

    <script src="JavaScript/Register.js"></script>
    <script src="JavaScript/form_check.js"></script>
    <script src="JavaScript/all_pages.js"></script>
</body>

</html>

<?php
    $conn->close(); // close database connection
?>