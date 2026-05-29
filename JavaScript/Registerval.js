//En funktion får att validera registrering
function register_validator() {
    //sparar informationen från formen i variabler
    let form = document.forms['register'];
    let uname = form['username'].value;
    let email = form['email'].value;
    let psw = form['password'].value;
    //Kontrollerar så att användarnamnet är mellan 4 till 15 tecken, och kaller på funktionen som kontrollorer lösenordet och email
    //Om alla villkoren är sant skickas sant tillbaks
    if (uname.length >= 4 && uname.length <= 15 && passwordChecker(psw) && validateEmail(email)) {
        return true;
    }
    //skapar error variabel
    let error = "";
    //Kontrollerar så att användarnamnet är mellan 4 och 15 tecken, om inte så läggs error meddelandet i error variabeln
    if (uname.length < 4 || uname.length > 15)
        error += "Username must be at least 4 letters long and a maximum of 15 characters\r\n";
    //Kontrollerar email genom att kalla på funktionen 'validateEmail'
    //Om email är i fel format läggs error meddelandet till i error variabeln
    if (!validateEmail(email))
        error += "Please enter a valid email address\r\n";
    //Kallar på funktionen 'passwordChecker' som kontrollerar lösenordet
    //Om lösenordet är i fel format, dvs inte längre än 8 tecken och innehålla en siffra
    if (!passwordChecker(psw))
        error += "Password must be longer than 8 characters and contain at least one numeric value";
    document.getElementById('js_error').innerText = error;
    return false;
}
//Funktion för att kontrollera email
//Tar emot en email adress och kontrollerar så att den innehåller . @ på korrekt ställe
function validateEmail(email) {
    if (email.lastIndexOf(".") > email.indexOf("@") + 2 && email.indexOf("@") > 0 && email.length - email.lastIndexOf(".") > 2) {
        return true;
    }
    return false;
}
//Funktion för att kontrollera lösenordet
//Tar emot ett lösenord och kontrollerar att den är längre än 8 tecken och innehåller en siffra
function passwordChecker(psw) {
    if (psw.length >= 8 && hasNumeric(psw))
        return true;
    return false;
}
//Kontrollerar så att lösenordet innehåller en siffta
//Tar emot ett lösenord och skickar tillbaka true/false beroende på om den innehåller en siffra eller inte
function hasNumeric(s) {
    for (let i = 0; i < s.length; i++) {
        const c = s[i];
        if (!isNaN(c))
            return true;
    }
    return false;
}
