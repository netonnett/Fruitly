<?php require_once './Include/Bootstraps.php'; ?>
<?php
//Kontrollerar så att formen skickades med 'POST'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //skapar variabler utifrån informationen som skickades från formuläret
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Validerar email-adressen så att den är i korrekt format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email adress';
        header('Location: login.php');
        exit();
    }

    //Kontrollerar så att lösenordet inte är tomt
    if (strlen($password) < 1) {
        $_SESSION['error'] = 'Please write your password';
        header('Location: login.php');
        exit();
    }

    //skapar en user variabler, kallar på funktionen 'login' i User
    $user = User::login($db, $email, $password);
    //Kollar om man är en användare och om lösenordet matchar email
    //om den inte gör det skickas man till login.php sidan för att försöka igen
    if (!$user) {
        $_SESSION['error'] = 'Invalid email or password, please try again';
        header('Location: login.php');
        exit();
    }

    //Om all information var korrekt skickas man till 'home.php' sidan där man kan kolla på inlägg och skriva inlägg
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: home.php');
        exit();
    }
} else {
    //om metoden inte var 'POST' skickas man tillbaka till 'login.php'
    header('Location: login.php ');
    exit();
}
?>