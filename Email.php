<?php
    session_start();
    include '.classes/auth.php';

    include '.classes/captcha.php';
    include '.classes/email.php';
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
        <h3>Αποστολή E-mail</h3>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-md-6">
                    <form id="emailForm" action="Email.php"
                        class="p-4 my-3 bg-white text-black text-center border needs-validation" novalidate
                        style="border-radius:12px;" method="post">
                        <div class="form-group">
                            <input id="email" name="email" type="email" class="form-control" placeholder="Email" required>
                            <div class="invalid-feedback">Συμπληρώστε το υποχρεωτικό πεδίο.</div>
                        </div>
                        <div class="form-group">
                            <input type="text" id="subj" name="subject" placeholder="Θέμα" class="form-control" required>
                            <div class="invalid-feedback">Συμπληρώστε το υποχρεωτικό πεδίο.</div>
                        </div>
                        <div class="form-group">
                            <textarea name="comment" class="form-control" placeholder="Πληκτρολογήστε το μήνυμα σας..." rows="6"
                                required></textarea>
                            <div class="invalid-feedback">Συμπληρώστε το υποχρεωτικό πεδίο.</div><br />
                        </div>
                        <?php
                            email_attempt_status();
                        ?>
                        <?php
                            display_captcha_status();
                        ?>
                        <div style="text-align: center;">
                            <div
                                class="g-recaptcha" 
                                data-sitekey="6LfZoMUaAAAAAA_k25wLAT5nZkEhXMpdx2JPK835" 
                                style="display: inline-block;"
                            ></div>
                        </div>
                        </br>
                        <button type="submit" name="submit" class="btn btn-lg btn-green btn-block">ΑΠΟΣΤΟΛΗ</button><br />
                    </form>
                </div>
                <div class="col-sm">
                </div>
            </div>
        </div>
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

    <script src="JavaScript/form_check.js"></script>
    <script src="JavaScript/all_pages.js"></script>
</body>

</html>

<?php
    $conn->close(); // close database connection
?>