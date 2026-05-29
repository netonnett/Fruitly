<?php require_once './Include/Bootstraps.php'; ?>
<?php
//Kontrollerar så att användarnamnet skickad med rätt metod. 
//Den kontrollerar även så att det nya användarnamnet uppfyller kraven för ett giltigt användarnamn
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Variabel där nya användarnamnet sparas
    $new_username = $_POST['username'];

    //Kontrollerar så att användarnamnet innehåller melan 4 till 15 tecken
    if (strlen($new_username) < 4 || strlen($new_username) > 15) {
        $_SESSION['error'] = 'The username must be between 4 to 15 characters';
        header('Location: profil.php');
        exit();
    }

    //Kontrollerar så att användarnamnet inte innehåller några mellanslag
    if (str_contains($new_username, ' ')) {
        $_SESSION['error'] = 'The username cannot contain any spaces';
        header('Location: profil.php');
        exit();
    }

    //Kontrollerar att användarnamnet inte redan är taget.
    if(User::usernameControll($db, $new_username)){
        $_SESSION['error'] = 'The username is already taken please enter a different one';
        header('Location: profil.php');
        exit();
    }
    //Hämtar användarens ID från sessionen
    //Kallar på metoden 'updateUsername' i User klassen.
    $userID = $_SESSION['user']['id'];
    User::updateUsername($db, $new_username, $userID);
    //Updaterar användarnamnet i sessionen 
    $_SESSION['user']['username'] = $new_username;
    //Omdirigerar till profilsidan
    header('Location: profil.php');
    exit();
}
?>