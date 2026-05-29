//Funktion som validerar data från 'log in'
function login_validator() {
    //Variabler för att spara undan data från formuläret.
    let form = document.forms['login'];
    let email = form['email'].value;
    let psw = form['password'].value;

    //Returnerar sant om både funktionen 'passwordChecker' och 'validateEmail' är sant
    if (passwordChecker(psw) && validateEmail(email)) {
        return true;
    }
    //skapar en ny error variabel
    let error = "";
    //Om email addressen är i fel format, läggs felmeddelandet till i error.
    if (!validateEmail(email))
        error += "Please enter a valid email address\r\n";
    //Om lösenordet är inkorrekt så läggs felmeddelandet till i error variabeln
    if (!passwordChecker(psw))
        error += "Please write in your password";
    //Hämtar html element och sätter texten i den till det som finns i error variabeln.
    document.getElementById('js_error').innerText = error;
    return false;
}

//Funktion för att kontrollera att email addressen är i korrekt format
//Om email addressen innehållet . @ på korrekta ställen returneras true, annars false
function validateEmail(email) {
    if (email.lastIndexOf(".") > email.indexOf("@") + 2 && email.indexOf("@") > 0 && email.length - email.lastIndexOf(".") > 2) {
        return true;
    }
    return false;
}

//Funktion för att kontrollera att lösenordet är korrekt
//Funktionen tar emot lösenordet och kontrollerar att den inte är tom.
//Returnerar true om den inte är tom, annars false
function passwordChecker(psw) {
    if (psw.length > 1)
        return true;
    return false;
}