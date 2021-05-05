<?php
    session_start();
    include '.classes/auth.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Healthy Living</title>
    <link rel="icon" href="images/yin-yang.jpg">
    <meta name="description" content="Sport Page">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/all_pages.css">
    <link rel="stylesheet" href="css/BasicPages.css">

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
            <img src="./images/SportPage/pexels-pixabay-235922.jpg" alt="" class="img-responsive floating-image left">
            <h3>Τι είναι η άθληση;</h3>
            <p>Άθληση είναι η προσπάθεια βελτίωσης της φυσικής κατάστασης του οργανισμού μέσω της
                συστηματικής σωματικής άσκησης. Η αντίληψη ότι η σωματική άσκηση
                συντείνει στη διατήρηση της υγείας ανάγεται στην αρχαιότητα, ενώ η
                επιστημονική της εγκυρότητα κατοχυρώθηκε τις τελευταίες δεκαετίες.
                Στατιστικά στοιχεία από μελέτες ινστιτούτων ερευνών τεκμηριώνουν τις απόψεις
                καρδιολόγων, επιδημιολόγων και ψυχιάτρων ότι όποιος ασκείται έχει λιγότερες πιθανότητες να
                παρουσιάσει καρδιοπάθειες, καρκίνο και ψυχικά νοσήματα. Το βασικό άθλημα θα πρέπει να
                συμπληρώνεται και από άλλες ασκήσεις, ώστε η εκγύμναση του σώματος να είναι ολοκληρωμένη.</p>
            <br>
            <h3 class="Center_h3">Τα οφέλη της Άθλησης</h3>
            <p>Ο αθλητισμός και η υγεία του σώματος και της ψυχής, πάνε μαζί. Δεν είναι τυχαίο
                που οι αρχαίοι μας πρόγονοι έλεγαν νους υγιής εν σώματι υγιή. Σήμερα η
                επίδραση του αθλητισμού και της ψυχαγωγίας στην υγεία μας, είναι ζήτημα
                επίκαιρο όσο ποτέ άλλοτε.Η συστηματική σωματική εξάσκηση βοηθά τον οργανισμό μας σε πολύ μεγάλο
                βαθμό και σε πολλά επίπεδα. Είναι περισσότερο οικονομικά και ψυχικά
                αποδοτική και συμφέρουσα από τις άλλες μας δραστηριότητες που μας κάνουν
                να τρέχουμε καθημερινά. Η συστηματική σωματική εξάσκηση μειώνει τον κίνδυνο εκδήλωσης καρδιακών
                παθήσεων και της αρτηριακής πίεσης. Βελτιώνει την ψυχολογία, μειώνει το
                άγχος, την ένταση και την κατάθλιψη και βοηθά στο να διατηρήσουμε υγιή
                οστά, μυς και αρθρώσεις .Όταν αποφασίσουμε ότι πρέπει να εφαρμόσουμε ένα
                πρόγραμμα συστηματικής σωματικής εξάσκησης είναι σημαντικό αυτό να γίνει
                προσεκτικά και προγραμματισμένα. Απότομες εξάρσεις μπορεί να έχουν τα
                αντίθετα αποτελέσματα. </p>
            <br>
            <!-- First image of main body -->
            <img src="./images/SportPage/pexels-victor-freitas-841130.jpg" alt=""
                class="img-responsive floating-image right">
            <h3>Άθληση και Ψυχική Υγεία</h3>
            <p>Ο αθλητισμός συνεισφέρει όπως αναφέρθηκε παραπάνω στην ψυχική μας
                υγεία. Η συμβολή του στον τομέα αυτό είναι τεράστια για τον άνθρωπο (π.χ.
                μπορεί να βοηθήσει άτομα που πάσχουν από κατάθλιψη και αναζωογωνεί
                το συναισθηματικό μας κόσμο).Το στρες υποχωρεί πιο εύκολα μετά από μια
                αθλητική δραστηριότητα. Η μείωση της έντασης των μυών και η αύξηση του
                καρδιακού ρυθμού που συνοδεύουν τη σωματική άσκηση δημιουργούν μια
                γενικότερη χαλάρωση και συμβάλλουν στην εγρήγορση του οργανισμού.
                Αυτό μας βοηθά να βρούμε λύσεις στα προβλήματα που μας βασανίζουν. Η
                εξωτερίκευση της έντασης όταν κάνουμε κάποια αθλητική δραστηριότητα ή
                άλλη ρυθμική σωματική δραστηριότητα, μειώνει τον εκνευρισμό που πιθανόν να
                μας έχει κυριεύσει κατά τη διάρκεια μιας δύσκολης μέρας φορτωμένης με
                πολλές καταστάσεις που μας προκαλούν στρες. Έτσι μειώνεται ο κίνδυνος να
                ξεσπάσουμε νευριασμένα πάνω σε άτομα της οικογένειας μας ή σε φίλους μας.</p>
            <br>
            <h3 class="Center_h3">Τρόποι άθλησης</h3>
            <p>Ο αθλητισμός μπορεί να πάρει πέντε μορφές, είτε ως ερασιτεχνικός, είτε ως
                επαγγελματικός, είτε ως μαζικός αθλητισμός, είτε ως φυσικές δραστηριότητες, είτε με την
                μορφή των παιχνιδιών.</p>
            <ul class="Sport_ul">
                <li>Βάρη</li>
                <li>Περπάτημα</li>
                <li>Κολύμβηση</li>
                <li> Αερόβια άσκηση</li>
                <li>Τρέξιμο (όλα τα είδη)</li>
                <li>Κάποιο άθλημα(π.χ Ποδόσφαιρο, Μπασκετ)</li>
            </ul>
        </div>
    </div>
    <!-- End of Texts and Images -->

    <br>
    <br>
    <!-- Video of bottom of the main body  -->
    <div class="video_div">
        <iframe class="video" width="800" height="600" src="https://www.youtube.com/embed/s58Tqo--59o" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <!----------------------------------------- End of Main Body ---------------------------------------------->

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