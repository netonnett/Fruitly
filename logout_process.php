<?php require_once './Include/Bootstraps.php'; ?>

<!-- Dödar sessionen och omdirigerar till index filen-->
<?php
session_destroy();
header('Location: Index.php');
exit();
?>