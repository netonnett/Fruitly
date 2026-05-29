<?php require_once './Include/Bootstraps.php'; ?>
<!-- Talar om för webbläsaren att svar från javascript är i json format-->
<?php header('Content-Type: application/json'); ?>
<?php
//Kontrollerar så att användaren är inloggad
//Om inte så skickas ett meddelande som talar om för användaren att logga in
if (!$autorizer->isLoggedIn()) {
    echo json_encode(['success' => false, 'message' => 'Please log in']);
    exit();
} else {
    //Om användaren är inloggad sparas titeln av inlägget i en variabel och själva texten
    $title = $_POST['title'];
    $maintext = $_POST['maintext'];

    //Kontrollerar så att titeln inte är tom
    if (strlen($title) < 1) {
        echo json_encode(['success' => false, 'message' => 'Please enter a title']);
        exit();
    }

    //Kontrollerar så att innehållet inte är tom
    if (strlen($maintext) < 1) {
        echo json_encode(['success' => false, 'message' => 'Please enter content']);
        exit();
    }

    //Kontrollerar så att titlen är inte längre än 50 tecken
    if (strlen($title) > 50) {
        echo json_encode(['success' => false, 'message' => 'Title is to long']);
        exit();
    }

    //sparar användar id i en variabel
    $user_id = $_SESSION['user']['id'];
    //Kallar på metoden 'creaete' som sparar inlägget i databasen
    Post::create($db, $title, $maintext, $user_id);

    //Skickar meddelande tillbaks till användaren att inlägget är skapat.
    echo json_encode([
        'success' => true,
        'message' => 'The post has successfully been created!',
        'title' => $title,
        'content' => $maintext,
        'username' => $_SESSION['user']['username'],
        'id' => $db->getConnection()->lastInsertId()
    ]);
}
?>