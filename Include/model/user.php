<?php
class User
{
    //Funktion som tar emot uppgifter från användaren för att sedan spara undan de i databasen
    //Lösenordet hashas först sedan skapas en sql förfrågan till databasen med värden. 
    //Sedan utfärdas förfrågan med de korrekta värdena
    public static function register($db, $username, $email, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->getConnection()->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$username, $email, $hashed_password]);
    }

    //Funktion som används för att loga in användaren. Den tar emot information från formuläret och kontrollerar att de finns i databasen
    //Först skapas en sql förfrågan som hämtar alla email adresser som finns i databasen och jämför med den aktuella emailadressen.
    //Sedan utfärdas den förfrågan med användarens email adress.
    //Efter det hämtas information av användaren. 
    //Lösenordet kontrolleras genom 'password_verify' och sedan jämförs den angivna lösenordet med det lösenordet som användaren registrera med.
    //Baserat på resultatet returneras alltingen användaren eller false.
    public static function login($db, $email, $password)
    {
        $stmt = $db->getConnection()->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    //En funktion som kontrollerar att email adressen finns i databasen.
    //En sql förfrågan skapas som hämtar email adressen och jämför de med den angivna adressen.
    //Sedan utfärdas förfrågan och om den angivna email adressen hittas så hämtas användaren.
    //funktionen returnerar sedan användaren.
    public static function emailControll($db, $email)
    {
        $statement = $db->getConnection()->prepare('SELECT * FROM users WHERE email = ?');
        $statement->execute([$email]);
        $user = $statement->fetch();
        return $user;
    }

    //Funktionen kontrollerar så att användarnamnet finns i databasen.
    //En sql förfrågan skapas som hämtar användarnamnen i databasen och sedan jämför med den angivna användarnamnet.
    //Sedan utfärdas förfrågan med den angivna användarnamnet
    //Funktionen returnerar användaren.
    public static function usernameControll($db, $username)
    {
        $statement = $db->getConnection()->prepare('SELECT * FROM users WHERE username = ?');
        $statement->execute([$username]);
        $user = $statement->fetch();
        return $user;
    }

    //Funktionen tar emot information om användaren samt en ny användarnamn
    //sedan uppdaterar den det gammla användarnamnet till det nya.
    //Returnerar sant för att säkerställa att updateringen lyckades.
    public static function updateUsername($db, $new_username, $userID)
    {
        $stmt = $db->getConnection()->prepare('UPDATE users SET username = ? WHERE id = ?');
        $stmt->execute([$new_username, $userID]);
        return true;
    }

    //Funktionen hämtar användare baserat på en ID.
    //Tar emot en användareID och returnerar allt om användaren.
    public static function getByID($db, $userID)
    {
        $stmt = $db->getConnection()->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$userID]);
        $user = $stmt->fetch();
        return $user;
    }

    //Funktion som tar emot en ID och ett nytt lösenord.
    //Den hash:ar det nya lösenordet, gör sedan ane sql förfrågan som uppdaterar lösenordet.
    //Därefter utfärdas förfrågan med userID och hash:ade nya lösenordet.
    //Funktionen returnerar sant för att säkerställa att updateringen lyckades.
    public static function updatePassword($db, $new_psw, $userID)
    {
        $hashed_newpsw = password_hash($new_psw, PASSWORD_DEFAULT);
        $stmt = $db->getConnection()->prepare('UPDATE users SET password = ? WHERE id = ?');
        $stmt->execute([$hashed_newpsw, $userID]);
        return true;
    }
}
