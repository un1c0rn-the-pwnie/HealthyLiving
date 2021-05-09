<?php
    session_start();
    include '.classes/auth.php';
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
        <?php
            require_once '.classes/db.php';
            require_once '.classes/funcs.php';
            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['code']) && !empty($_GET['code'])){
                global $conn, $ret_error;
                $email = safe_sqlparam($_GET['email'], $conn);
                $code = safe_sqlparam($_GET['code'], $conn);
                $search = mysqli_query($conn,"SELECT email, code FROM reset WHERE email='".$email."' AND code='".$code."'"); 
                $match  = mysqli_num_rows($search);
                            
                if($match > 0){
                    echo 'You can now reset your password';
                }else{
                    echo 'The url is invalid.';
                }
            }
            else{
                echo 'what are you doing?';
            }

        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-md-6">
                    <form id="resetForm" action=".classes/reset.php?email=<?php echo $_GET['email']?>"
                        class="p-4 my-3 bg-white text-black text-center border needs-validation" novalidate
                        style="border-radius:12px;" method="post">
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

    <script src="JavaScript/Register.js"></script>
    <script src="JavaScript/form_check.js"></script>
    <script src="JavaScript/all_pages.js"></script>
</body>

</html>

<?php
    $conn->close(); // close database connection
?>