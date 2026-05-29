
<?php require_once './Include/Bootstraps.php'; ?>

<?php
//Kollar om formen skickades med 'POST' metoden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Sparar datan i variabler
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Validerar email, kollar om det är korrekt format, inbyggd funktion
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email adress';
        header('Location: register.php');
        exit();
    }

    //Kollar så att användarnamnet är minst 4 tecken långt men mindre än 15 tecken
    if (strlen($username) < 4 || strlen($username) > 15) {
        $_SESSION['error'] = 'The username must be between 4 to 15 characters';
        header('Location: register.php');
        exit();
    }

    //Kontrollerar så att användarnamnet inte innehåller några mellanslag
    if (str_contains($username, ' ')) {
        $_SESSION['error'] = 'The username cannot contain any spaces';
        header('Location: register.php');
        exit();
    }

    //Kontrollerar så att lösenordet är längre än 8 tecken
    if (strlen($password) < 8) {
        $_SESSION['error'] = 'The password must contain at least 8 characters';
        header('Location: register.php');
        exit();
    }

    //Kontrollerar lösenordet så att den innehåller minst en siffra
    if (!preg_match('/[0-9]/', $password)) {
        $_SESSION['error'] = 'Your password must contain a number';
        header('Location: register.php');
        exit();
    }

    //Kallar på metoden 'emailControll' i User för att kontrollera om email redan är taget.
    if (User::emailControll($db, $email)) {
        $_SESSION['error'] = 'The email is already registered, please log in';
        header('Location: register.php');
        exit();
    }

    //Kallar på metoden usernameControll i User för att säkerställa att alla användarnamn är unika
    if (User::usernameControll($db, $username)) {
        $_SESSION['error'] = 'This username is already taken, try logging in or pick a new one!';
        header('Location: register.php');
        exit();
    }

    //Om alla ovanstående kontroller passerades kallas metoden 'register' för att registrera användaren i databasen
    User::register($db, $username, $email, $password);
    $user = User::login($db, $email, $password);
    $_SESSION['user'] = $user;
    //Skickas till sidan 'home' där användaren kan se inlägg och skriva egna.
    header('Location: home.php');
} else {
    //Om metoden inte skickades med 'POST' så händer ingenting och sidan skickas tillbaka till register sidan
    header('Location: register.php');
    exit();
}
?>