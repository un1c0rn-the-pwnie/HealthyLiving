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
  <meta name="description" content="Calculator Page">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


  <link rel="stylesheet" href="css/all_pages.css">
  <link rel="stylesheet" href="css/BasicPages.css">
  <link rel="stylesheet" href="css/green-bootstrap.css">
</head>

<body>

    <!-------------------------------------------- Header Menu -------------------------------------------------->
    <?php
      include 'header.php';
    ?>
    <!------------------------------------------ End of Header Menu ------------------------------------------------>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!--------------------------------------------- Main Body ---------------------------------------------------->

    <h3 class="text-center">Υπολόγισε τη φυσική σου κατάσταση!</h3>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <!-- Basic form for BMI , calculations done on BMIFunction() -->
            <form id="bmiForm" class="p-4 my-3 bg-light text-black border needs-validation" action="javascript:BMIFunction();" novalidate style="border-radius:12px;">
                <fieldset>
                    <legend>BMI:</legend>
                    <div class="form-group">
                    <label for="heightbmi">Ύψος:</label><br>
                    <input type="number" id="heightbmi" name="heightbmi" placeholder="Εισάγεται το ύψος σε εκατοστά" class="form-control" min="1" max="300" step=any required>
                    <div class="invalid-feedback">Εισάγεται έναν αριθμό μεταξύ του 1 και του 300</div>
                    </div>
                    <br><br>
                    <div class="form-group">
                    <label for="weightbmi">Βάρος:</label><br>
                    <input type="number" id="weightbmi" name="weightbmi" placeholder="Εισάγεται το βάρος σε κιλά" class="form-control" min="1" max="500" step=any required>
                    <div class="invalid-feedback">Εισάγεται έναν αριθμό μεταξύ του 1 και του 500</div>
                    </div>
                    <br><br>
                    <input type="submit" value="Υπολογισμός" class="btn btn-lg btn-green btn-block"> <br><br>
                    <p id="BMIresult"></p>
                </fieldset>
            </form> 
            <!-- End of Basic Form for BMI -->
          </div>
          <div class="col-md-6">
            <br>
              <!-- BMI description and icon -->
              <p>Ο Δείκτης μάζας σώματος (ΔΜΣ) είναι μία γενική ιατρική ένδειξη για τον υπολογισμό του βαθμού παχυσαρκίας, 
                που πηγάζει από το βάρος και το ύψος του ατόμου. Ο μαθηματικός του τύπος προέρχεται από βάρος διά του ύψους 
                στο τετράγωνο (ΔΜΣ = βάρος (kg) / ύψος<sup>2</sup> (m<sup>2</sup>)). Το ΔΜΣ μπορεί να κατηγοριοποιήσει ένα άτομο ως ελλιποβαρή, 
                φυσιολογικού βάρους, υπέρβαρο ή παχύσαρκο (πρώτου, δεύτερου ή τρίτου βαθμού), τα οποία βασίζονται σε μετρήσεις 
                ατόμων άνω των 20 ετών.</p>
              <img src="images/CalculatorsPage/siora-photography-cixohzDpNIo-unsplash.jpg" class="img-fluid" alt="ruler">
          </div>
        </div>
      </div>
    
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <!-- Basic form for daily calories burn, calculations done on CaloriesFunction() -->
            <form id="CalcForm" class="p-4 my-3 bg-light text-black border needs-validation" action="javascript:CaloriesFunction();" novalidate style="border-radius:12px;">
                <fieldset>
                  <legend>Καθημερινή καύση θερμίδων:</legend>
                  <label for="gender">Φύλο:</label><br>
                  <div class="form-check custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="male" name="gender" value="0" required>
                    <label class="custom-control-label" for="male" >Άνδρας</label><br>
                  </div>
                  <div class="form-check custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="female" name="gender" value="1" required>
                    <label class="custom-control-label" for="female" >Γυναίκα</label>
                  </div>
                  <br>
                  <div class="form-group">   
                    <label for="agebmr">Ηλικία:</label><br>
                    <input type="number" id="agebmr" name="agebmr" placeholder="Εισάγεται την ηλικία" class="form-control" step=any min="1" max="200" required><br>
                    <div class="invalid-feedback">Εισάγεται έναν αριθμό μεταξύ του 1 και του 200</div>
                  </div>
                  <div class="form-group">
                    <label for="heightbmr">Ύψος:</label><br>
                    <input type="number" id="heightbmr" name="heightbmr" placeholder="Εισάγεται το ύψος σε εκατοστά" class="form-control" step=any min="1" max="300" required><br>
                    <div class="invalid-feedback">Εισάγεται έναν αριθμό μεταξύ του 1 και του 300</div>
                  </div>
                  <div class="form-group">
                  <label for="weightbmr">Βάρος:</label><br>
                  <input type="number" id="weightbmr" name="weightbmr" placeholder="Εισάγεται το βάρος σε κιλά" class="form-control" min="1" max="500" step=any required><br>
                  <div class="invalid-feedback">Εισάγεται έναν αριθμό μεταξύ του 1 και του 500</div>
                  </div>
                  <div class="form-group">
                    Δραστηριότητα:<br> <select name="activity" id="activity" class="custom-select">
                      <option value="1.2" >Ανενεργός: λίγη ή καθόλου άσκηση</option>
                      <option value="1.375" >Ελαφριά άσκηση: 1-3 ημέρες την εβδομάδα</option>
                      <option value="1.55" > Μέτρια άσκηση: 6-7 ημέρες την εβδομάδα</option>
                      <option value="1.725" >Δυνατή άσκηση: καθημερινά ή 2 φορές την ημέρα</option>
                      <option value="1.9" >Σκληρή άσκηση: καθημερινά 2 ή περισσότερες φορές την ημέρα</option>
                    </select><br><br>
                  <div>
                  <input type="submit" value="Υπολογισμός" class="btn btn-lg btn-green btn-block"> <br><br>
                  <p id="Caloriesresult"></p>
              </fieldset>
            </form>
            <!-- End of Basic Form for daily calories burn -->
          </div>
          <div class="col-md-6">
            <!-- Daily calories burn description and icon -->
            <br>
            <p>Η καθημερινή καύση θερμίδων χαρακτηρίζεται από τον συνολικό αριθμό θερμίδων που καταναλώνει το σώμα κατά
               την διάρκεια μιας μέρας, συμπεριλαμβανομένου των δραστηριοτήτων. Μπορεί να ποικίλει ευρέως, π.χ. ανάλογα
                με τον μεταβολισμό του κάθε ατόμου, και είναι πολύ υψηλότερη στους αθλητές και σε εξαιρετικά ενεργά άτομα.
                 Επιπλέον, η καθημερινή καύση θερμίδων υπολογίζεται από τον βασικό μεταβολικό ρυθμό (ΒΜΡ) του ατόμου  
                 το οποίο πολλαπλασιάζεται με το επίπεδο δραστηριότητας. Το ΒΜΡ είναι ο συνολικός αριθμός θερμίδων που 
                 χρειάζεται το σώμα για να λειτουργήσει σωστά, εξαιρουμένης της άσκησης και υπολογίζεται με 
                 το ύψος, το βάρος, την ηλικία και το φύλο.</p>
              <img src="images/CalculatorsPage/diet-695723_640.jpg" class="img-fluid" alt="measuring sandwich">
          </div>
        </div>
      </div>
            <br>
      <br>
      <p class="text-center"><b>Υποσημείωση:</b> Αυτές οι μετρήσεις είναι ένας οδηγός για να υπολογίσει κάποιος την φυσική του κατάσταση.
         Συμβουλευτείτε έναν γιατρό για περισσότερες πληροφορίες.</p>

    <!---------------------------------------- End of Main Body ---------------------------------------------------->

    <br>
    
    <?php
        include 'Comments.php';
    ?>
    
    <br>

    <!------------------------------------------- Footer ------------------------------------------------>
    <?php
      readfile("footer.html");
    ?>
    <!--------------------------------------------- End of Footer ---------------------------------------------->

    <script src="JavaScript/Calculators.js"></script>
    <script src="JavaScript/form_check.js"></script>
    <script src="JavaScript/all_pages.js"></script>
</body>

</html>

<?php
    $conn->close(); // close database connection
?>