/*
    Το BMI υπολογίζεται με τον παρακάτω τύπο : βάρος διά του ύψους στο τετράγωνο.
    Μετά βλέπεις σύμφονα με την τιμή που βρήκες σε ποιά κατηγορία βρήσκεται το άτομο
*/
function BMIFunction() {

    var h = document.getElementById("heightbmi").value;
    var w = document.getElementById("weightbmi").value;
    h = h / 100;
    bmi = w / (h ** 2);
    if (bmi < 18.5) {
        status = 'ελλιποβαρής'
    }
    else if (bmi >= 18.5 & bmi < 25) {
        status = 'φυσιολογικό βάρος'
    }
    else if (bmi >= 25 & bmi < 30) {
        status = 'υπέρβαρος'
    }
    else if (bmi >= 30 & bmi < 35) {
        status = 'παχύσαρκος βαθμού I'
    }
    else if (bmi >= 35 & bmi < 40) {
        status = 'παχύσαρκος βαθμού II'
    }
    else {
        status = 'παχύσαρκος βαθμού III'
    }

    bmitext = 'Το bmi σου είναι ' + bmi.toFixed(1) + ' και βρίσκεσαι στην κατηγορία ' + status;
    document.getElementById("BMIresult").innerHTML = bmitext;
}
/*
    Για τον υπολογισμό της Καθημερινής καύσης θερμίδων πρέπει αρχικά να υπολογιστεί το bmr:
    Στους άντρες: BMR = 10W + 6.25H - 5A + 5
    Στις γυναίκες: BMR = 10W + 6.25H - 5A - 161
    αυτό πολλαπλασιάζεται με το επίπεδο δραστηριότητας για το τελικό αποτέλεσμα
*/
function CaloriesFunction() {

    var g = document.querySelector('input[name="gender"]:checked').value;
    var act = document.getElementById("activity").value;
    var a = document.getElementById("agebmr").value;
    var h = document.getElementById("heightbmr").value;
    var w = document.getElementById("weightbmr").value;
    if (g == 0) {
        bmr = 10 * w + 6.25 * h - 5 * a + 5
    }
    else {
        bmr = 10 * w + 6.25 * h - 5 * a - 161
    }
    calories = bmr * act;
    caloriestext = 'Καις ' + calories.toFixed(1) + ' θερμίδες κάθε μέρα';
    document.getElementById("Caloriesresult").innerHTML = caloriestext;
}
