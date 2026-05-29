<?php
//Startar sessionen
session_start();

//Länkar till alla klasser som skapades i 'model' mappen
require_once __DIR__ . '/model/db.php';
require_once __DIR__ . '/model/user.php';
require_once __DIR__ . '/model/post.php';
require_once __DIR__ . '/model/autorizer.php';

//Skapar ett nytt objekt av typen 'DB' som blir databasen
//Länkar även till databasen 'Databasepost'
$db = new DB(__DIR__ . '/../Database/Databasepost.db');

//Skapar en ny instans av 'Autorizer klassen
$autorizer = new Autorizer();
