<?php
class Autorizer
{

    //En funktion som kontrollerar om användaren är inloggad eller inte 
    public function isLoggedIn()
    {
        return isset($_SESSION['user']);
    }

    //En funktion som kräver inloggning för att komma åt vissa filer
    //Skyddar mot att användare kan söka på exempelvis '/create_post' utan att vara inloggad
    public function requireLogin()
    {
        if (!$this->isLoggedIn()) {
            header('Location: login.php');
            exit();
        }
    }
}
