<?php
    session_start();
    include '.classes/auth.php';
?>

<!DOCTYPE html>
<html>

<head>

    <!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
    <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> -->

    <title>Healthy Living</title>
    <link rel="icon" href="images/yin-yang.jpg">
    <meta name="description" content="Diet Page">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/all_pages.css">
    <link rel="stylesheet" href="css/BasicPages.css">
    <link rel="stylesheet" type="text/css" href="css/Comments.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

    <!------------------------------------------- Main Body ---------------------------------------------------->

    <!-- Texts and Images -->
    <div class="container">
        <div class="description-container">
            <!-- First image of main body -->
            <img src="./images/yin-yang.jpg" alt="" class="img-responsive floating-image right">
            <h3>Η Σημασία της Διατροφής</h3>
            <p>Η διατροφή διαδραματίζει πολύ σημαντικό ρόλο στην καθημερινότητα του
                ανθρώπου. Ο άνθρωπος με την τροφή βοηθά τον οργανισμό να επιβιώσει και
                καλύπτει τις βασικές του ανάγκες. Από την άλλη πλευρά η διατροφή συμβάλει
                στην καλή λειτουργία του οργανισμού και όταν ακολουθούνται συγκεκριμένοι
                κανόνες ένα μεγάλο ποσοστό ανθρώπων είναι υγιές. Η διατροφή είναι
                απαραίτητη στην σωματική και ψυχική υγεία. Το να τρέφεσαι σωστά έχει ως
                αποτέλεσμα στην καλή φυσική σου κατάσταση.</p>
            <br>
            <br>
            <br>
            <h3 class="Center_h3">Σωστό ξεκίνημα</h3>
            <p>Η σωστή διατροφή ξεκινά από το «πρωινό». Αυτό αποτελεί το σημαντικότερο
                γεύμα της ημέρας, διότι είναι η βάση της υγιεινής διατροφής. Γενικά οι
                άνθρωποι οι οποίοι έχουν την τάση να καταναλώσουν πρωινό, έχουν μια πιο
                ισορροπημένη διατροφή, επιλέγουν τροφές με χαμηλότερο λίπος, έχουν
                χαμηλότερα επίπεδα χοληστερόλης στο αίμα και ελέγχουν καλύτερα το
                σωματικό τους βάρος. Διαθέτουν επίσης πνευματική διαύγεια και έχουν
                περισσότερη ενέργεια για την άσκηση, αφού για παράδειγμα η πρόσληψη 400-
                500 θερμίδων από το πρωινό θα βοηθήσει στην αποθήκευση, άρα και στην
                προσφορά ενέργειας κατά την διάρκεια της ημέρας.
            </p>
            <br>
            <!-- Second image of main body -->
            <img src="./images/DietPage/pexels-daria-shevtsova-949069.jpg" alt=""
                class="img-responsive floating-image left">
            <h3>Κρατήστε τις ισορροπίες</h3>
            <p>Καθημερινά θα πρέπει να καταναλώνετε τρόφιμα από όλες τις ομάδες τροφίμων
                (σωστά κατανεμημένα κατά τη διάρκεια της ημέρας προκείμενου να καλύπτεται
                τις καθημερινές σας ανάγκες σε θρεπτικά συστατικά). Άλλωστε μια μη
                ισορροπημένη διατροφή δεν εξαρτάται από την έλλειψη διαθεσιμότητας
                καταλλήλων τροφίμων, αλλά από την επιλογή τροφίμων που κάνετε εσείς. Οι
                ποσότητες που πρέπει να καταναλώνετε καθημερινά από τις ομάδες τροφίμων
                είναι: Από την ομάδα ψωμιού, δημητριακών, ρυζιού και ζυμαρικών (6-11
                μερίδες, δηλαδή 2 φέτες ψωμί, 1 φλιτζάνι δημητριακά και 1 φλιτζάνι ρύζι) Από
                την ομάδα λαχανικών (3-5 μερίδες, 1 μερίδα = ½ φλιτζάνι) Από την ομάδα
                φρούτων (2-4 μερίδες, 1 μερίδα = ½ φρούτο) Από την ομάδα των
                γαλακτοκομικών (2-3 μερίδες) Από την ομάδα κρέατος (150-200 γρ. την ημέρα)
                Από την ομάδα λιπών και ελαιών – γλυκά (με μέτρο) Ο ημερήσιος αριθμός
                μερίδων βασίζεται πάντα στις θερμίδες ανάγκες του κάθε ατόμου. </p>
            <br>
            <h3 class="Center_h3">Πείτε όχι στο λίπος </h3>
            <p>Είναι σημαντικό να επιλέγετε ένα διαιτολόγιο που να είναι χαμηλό σε λιπαρά,
                κορεσμένα λίπη και χοληστερόλη. Προκείμενου να το πετύχετε προσπαθήστε να
                τρώτε λιγότερο κρέας με υψηλή περιεκτικότητα σε λίπη, ενώ θα πρέπει να
                αποφύγετε και τα αλλαντικά όπως το ζαμπόν, τα λουκάνικα και το μπέικον.
                Αφαιρέστε το υπερβολικό λίπος πριν μαγειρέψετε το κρέας. Τρώτε μόνο άπαχο
                κόκκινο κρέας περισσότερο άσπρο κρέας όπως γαλοπούλα και κοτόπουλο, τα
                οποία έχουν λιγότερο λίπος. Αφαιρέστε την πέτσα από τα πουλερικά και τρώτε
                περισσότερο ψάρι, όπως σαρδέλες, σολομό, τόνο και σκουμπρί, που είναι
                πλούσια σε ωμέγα-3 λιπαρά οξέα. Τρώτε μόνο 2-3 αυγά την εβδομάδα και
                λιγότερα γαλακτοκομικά που είναι πλούσια σε λιπαρά. Αλλάξτε το πλήρες γάλα
                με αποβουτυρωμένο ή μη αποβουτυρωμένο και να τρώτε λιγότερο βούτυρο ή
                φαγητά φτιαγμένα αυγά και κορεσμένα λίπη.</p>
        </div>
    </div>

    <!-- End of Texts and Images -->

    <br>
    <br>

    <!-- Video of bottom of the main body  -->
    <div class="video_div">
        <iframe class="video" width="800" src="https://www.youtube.com/embed/399rYrOlZBY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>

    <!----------------------------------------- End of Main Body ---------------------------------------------->

    <br>
    
    <?php
        $commentdb = "comments_diet";
        include 'Comments.php';
    ?>
    
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