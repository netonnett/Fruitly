<?php
class DB
{
    //En privat variabel
    private $pdo;
    //En konstruktor som tar emot en sökväg sedan skapar en anslutning till databasen
    public function __construct($path)
    {
        $this->pdo = new PDO('sqlite:' . $path);
    }

    //En funktion som man kan kalla på när man vill komma åt databasen
    public function getConnection()
    {
        return $this->pdo;
    }
}
