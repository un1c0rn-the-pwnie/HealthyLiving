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

    <!------------------------------------------- Main Body ---------------------------------------------------->

    <!-- Slider -->
    <section id="slider-container">
        <!-- First Slide -->
        <div class="slide fade" id="slide-2">
            <img src="./images/HomePage/GJCpd6.jpg" alt="First Image">
        </div>

        <!-- Second Slide -->
        <div class="slide fade" id="slide-2">
            <img src="./images/HomePage/emma-simpson-mNGaaLeWEp0-unsplash.jpg" alt="First Image">
        </div>

        <!-- Third Slide -->
        <div class="slide fade" id="slide-1">
            <img src="./images/HomePage/1737971.jpg" alt="Second Image">
        </div>

        <!-- arrows -->
        <div id="arrows-wrapper" class="">
            <!-- previous arrow -->
            <p class="slider-arrow center_y" id="arrow-prev">&#10094;</p>
            <!-- next arrow -->
            <p class="slider-arrow center_y" id="arrow-next">&#10095;</p>
        </div>

        <!-- dots -->
        <div id="dots-wrapper" class="center_x">
            <div class="dot-navigation"></div>
            <div class="dot-navigation"></div>
            <div class="dot-navigation"></div>
        </div>
    </section>
    <!-- End of Slider -->


    <!-- Texts and Images -->
    <div class="container">
        <div class="description-container">
            <!-- Text for About us -->
            <h3>Σχετικά με εμάς</h3>
            <br>
            <p>Το Healthy Living αναπτύχθηκε το 2021 από 4 φοιτητές του Τμήματος Πληροφορικής του Αριστοτελείου
                Πανεπιστημίου Θεσσαλονίκης. Πρόκειται για ένα έργο που αναπτύχθηκε για την εκπόνηση της εργασίας στο
                μάθημα "Πληροφοριακά Συστήματα Παγκόσμιου Ιστού".</p>
            <br>
            <p>
                Το site αυτό απευθύνεται σε όλους τους πολίτες ανεξαρτήτου ηλικίας και στόχος του είναι να
                ενημερώσει και να δώσει πληροφορίες σχετικά με την υγεία και την επίδραση που έχουν σε αυτή η σωστή
                διατροφή μαζί με τακτική άσκηση. Επίσης το site προσφέρει στον χρήστη την δυνατότητα να υπολογίσει
                τον ΔΜΣ(Δείκτη Μάζας Σώματος) καθώς και τις θερμίδες που
                καταναλώνει ημερησίως, χρήσιμα εργαλεία τα οποία χρησιμοποιούνται ευρέως και δείχνουν την σωματική
                κατάσταση και το επίπεδο της υγείας μας. Επιπροσθέτως το site δίνει την δυνατότητα στους χρήστες να
                επικοινωνήσουν μαζί μας είτε στέλνοντας e-mail είτε στα κοινωνικά μέσα(facebook,twitter).</p>

            <br><br>
            <!-- First image of main body -->
            <img src="images/HomePage/5504048.jpg" alt="" class="img-responsive floating-image right">
            <h3>Η Σημασία της Υγείας</h3>
            <p>Σύμφωνα με τον ορισμό που διατυπώθηκε στο καταστατικό του Παγκόσμιου Οργανισμού Υγείας (1946) η
                υγεία είναι η κατάσταση της πλήρους σωματικής, ψυχικής και κοινωνικής ευεξίας και όχι μόνο η
                απουσία ασθένειας ή αναπηρίας. Η υγεία είναι ένα από τα σημαντικότερα αγαθά στην ζωή του
                ανθρώπου και είναι ο παράγοντας εκείνος που μετράει την φυσική ψυχολογική ή ακόμα και την
                πνευματική κατάσταση ενός οργανισμού και επηρεάζεται από άλλους παράγοντεςόπως είναι το
                περιβάλλον, η διατροφή, η άθληση κι άλλα πολλά.</p>
            <br>
            <!-- Second image of main body -->
            <img src="images/HomePage/vegetables-1085063_1920.jpg" alt="" class="img-responsive floating-image left">
            <h3> Διατροφικές Ανάγκες</h3>
            <p>
                Η διατροφή είναι πολύ σημαντική για το άτομο ώστε να έχει καλή υγεία.Οι διατροφικές ανάγκες για το κάθε
                άτομο
                διαφέρουν ανάλογα με την ηλικία του, το φύλο του και το κατά πόσο αθλήται. Ωστόσο ανεξάρτητα από τις
                παραπάνω
                παραμέτρους θα πρέπει οπωςδήποτε να προσέχει την διατροφή του.</p>
            <p>
                Ότι τρώει κανείς μπορεί να επηρεάσει σημαντικά την υγεία του. Ο Ιπποκράτης αναγνωρίζοντας την αξία
                της διατροφής και τη δύναμη της τροφής να ενισχύει την υγεία, δήλωσε ότι ο άνθρωπος θα πρέπει να έχει
                την τροφή του για φάρμακο. Τα τρόφιμα που τρώμε περιέχουν διάφορα θρεπτικά συστατικά για να συντηρήσουν
                τη ζωή, παρέχοντας ενέργεια, προάγοντας την ανάπτυξη και ρυθμίζοντας τις μεταβολικές διεργασίες.
            </p>
            <br>

            <!-- Third image of main body -->
            <img src="images/HomePage/pexels-william-choquette-1954524.jpg" alt=""
                class="img-responsive floating-image right">
            <h3>Η Σημασία της Άθλησης</h3>
            <p>Η άθληση είναι απαραίτητο να υπάρχει στην ζωή των ανθρώπων και μάλιστα σε καθημερινή βάση.
                Η άθληση προάγει την αυτοεκτίμηση κι βοηθάει στην εκτόνωση του ατόμου ενώ διατηρεί παράλληλα μυαλό
                και σώμα σε εγγρήγορση. Τα οφέλη που ακομίζουμε από την άθληση είναι τεράστια κι για αυτό είναι πολλή
                σημαντική ιδιαίτερα για τα παιδία και τους νέους, χωρίς αυτό να σημαίνει ότι μόνο οι νεόι πρέπει
                να αθλούνται. Αναλογα με τα χαρακτηριστικά του(φύλο ,ηλικία) και τα ενδιαφέροντα του ο καθένας μπορεί
                να κάνει γυμναστική με διαφορετικό τρόπο. Πολύ σημαντικό είναι να μην υπερβάλλουμε καθώς το σώμα
                χρειάζεται
                ξεκούραση. Η ξεκούραση είναι τόσο σημαντική όσο και η εκγύμναση. Ελλιπής ξεκούραση και ελάχιστος ύπνος
                θα
                φέρουν αντίθετα αποτελέσματα.</p>
        </div>
    </div>
    <!-- End of Texts and Images -->

    <!----------------------------------------- End of Main Body ---------------------------------------------->

    <br>
    <br>

    <!------------------------------------------------ Footer ------------------------------------------------>
    <?php
        readfile('footer.html');
    ?>
    <!--------------------------------------------- End of Footer ---------------------------------------------->

    <script src="JavaScript/HomePage.js"></script>
    <script src="JavaScript/all_pages.js"></script>
</body>

</html>

<?php
    $conn->close(); // close database connection
?>