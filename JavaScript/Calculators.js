function BMIFunction() {

    /*Below 18.5
    Underweight
    18.5–24.9
    Normal weight
    25.0–29.9
    Pre-obesity
    30.0–34.9
    Obesity class I
    35.0–39.9
    Obesity class II
    Above 40
    Obesity class III*/

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

    bmitext = 'Το bmi σου είναι ' + bmi + ' και βρίσκεσαι στην κατηγορία ' + status;
    document.getElementById("BMIresult").innerHTML = bmitext;
}
function CaloriesFunction() {

    //For men BMR = 10W + 6.25H - 5A + 5
    //For women:BMR = 10W + 6.25H - 5A - 161
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
    caloriestext = 'Καις ' + calories + ' θερμίδες κάθε μέρα';
    document.getElementById("BMRresult").innerHTML = caloriestext;
}
