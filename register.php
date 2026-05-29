<?php require_once './Include/Bootstraps.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Stylesheets till de länkade sidorna-->
    <link rel="stylesheet" href="style/register_login.css">
    <link rel="stylesheet" href="style/headerstyle.css">
    <link rel="stylesheet" href="style/footerstyle.css">
    <title>Register</title>
</head>

<body>
    <!-- Länk till header, register formen och footern-->
    <?php include './include/view/header.php'; ?>

    <?php include './include/view/register.php'; ?>
    <br>
    <?php include './include/view/footer.php'; ?>
    <!-- Länk till javascript validering-->
    <script src="JavaScript/Registerval.js"></script>
</body>

</html>