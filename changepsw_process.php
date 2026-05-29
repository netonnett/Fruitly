<?php require_once './Include/Bootstraps.php' ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $oldpsw = $_POST['old_password'];
    $new_psw = $_POST['new_password'];
    //Kontrollerar så att lösenordet är längre än 8 tecken
    if (strlen($new_psw) < 8) {
        $_SESSION['error'] = 'The password must contain at least 8 characters';
        header('Location: profil.php');
        exit();
    }

    //Kontrollerar lösenordet så att den innehåller minst en siffra
    if (!preg_match('/[0-9]/', $new_psw)) {
        $_SESSION['error'] = 'Your password must contain a number';
        header('Location: profil.php');
        exit();
    }
    //Hämtar användarens ID från sessionen
    $userID = $_SESSION['user']['id'];
    $user =  User::getByID($db,  $userID);
    if(!password_verify($oldpsw, $user['password'])){
        $_SESSION['error'] = 'Wrong password';
        header('Location: profil.php');
        exit();
    }
    User::updatePassword($db, $new_psw, $userID);
    //Omdirigerar till profilsidan
    header('Location: profil.php');
    exit();

}
?>