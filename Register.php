<?php
    session_start();
    include('.classes/accesscheck.php');

    include('.classes/register.php');
?>

<!DOCTYPE html>
<html>

<head>

    <title>Healthy Living</title>
    <link rel="icon" href="images/yin-yang.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Register Page">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


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

    <!--------------------------------------------- Main Body ----------------------------------------------->
    <!-- Basic Form for register -->
    <main>
        <h3>Φόρμα Εγγραφής</h3>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-md-6">
                    <form id="mForm" action="Register.php" method="post"
                        class="p-4 my-3 bg-white text-black text-center border needs-validation" novalidate
                        style="border-radius:12px;">
                        <div class="form-group">
                            <input id="username" type="text" pattern="[a-zA-Z0-9]{1,}" title="Το ονομα χρηστη πρεπει να μην περιεχει ειδικους χαρακτηρες μονο μικρα, κεφαλαια και αριθμοι επιτρεπονται" name="username" class="form-control" placeholder="Όνομα χρήστη" required>
                            <div class="invalid-feedback">Το όνομα χρήστη πρέπει να μην περιέχει ειδικούς χαρακτήρες μόνο μικρά, κεφαλαία η αριθμούς.</div>
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" name="email" class="form-control" placeholder="Email" required>
                            <div class="invalid-feedback">Συμπληρώστε το υποχρεωτικό πεδίο.</div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Ο κωδικός πρέπει να περιέχει τουλάχιστον έναν αριθμό, έναν κεφαλαίο χαρακτήρα, έναν μικρό χαρακτήρα, και να είναι 8 οι περισσότερα γράμματα μεγάλος."
                                    placeholder="Κωδικός πρόσβασης" id="pwd" required>
                                <input type="password" name="confirmPassword" class="form-control"
                                    title="Must match password" placeholder="Επιβεβαίωση κωδικού" id="rpwd" required>
                                <div class="invalid-feedback">Πρέπει να περιέχει τουλάχιστον έναν αριθμό, εναν κεφαλαίο
                                    και εναν μικρό χαρακτήρα. Ο κωδικός πρέπει να περιέχει τουλάχιστον 8 ή
                                    περισσότερους χαρακτήρες.
                                </div>
                                <div id="pass-invalid-feedback" class="invalid-feedback">Οι κωδικοί πρόσβασης δεν
                                    ταιριάζουν.</div>
                            </div>
                        <?php
                            register_attempt_status();
                        ?>
                        <?php
                            display_captcha_status();
                        ?>
                        </div>
                        <div style="text-align: center;">
                            <div
                                class="g-recaptcha" 
                                data-sitekey="6LfZoMUaAAAAAA_k25wLAT5nZkEhXMpdx2JPK835" 
                                style="display: inline-block;"
                            ></div>
                        </div>
                        <br/>
                        <button type="submit" name="submit" value="submit" class="btn btn-lg btn-green btn-block">ΕΓΓΡΑΦΗ</button><br />

                        <p>Έχεις ήδη λογαριασμό;<a class="text-green" href="Login.php"> Σύνδεση</a></p>
                    </form>
                </div>
                <div class="col-sm">
                </div>
            </div>
        </div>
    </main>
    <!-- End of Basic Form for register -->

    <!------------------------------------------- End of Main Body -------------------------------------------->

    <br>
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