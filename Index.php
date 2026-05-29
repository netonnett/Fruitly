<?php require_once './Include/Bootstraps.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruitly</title>
    <!-- Länk till all css-->
    <link rel="stylesheet" href="style/indexstyle.css">
    <link rel="stylesheet" href="style/headerstyle.css">
    <link rel="stylesheet" href="style/footerstyle.css">
</head>

<body>
    <!-- Länkar till header-->
    <?php include './include/view/header.php'; ?>
    <div>
        <!-- Välkomsttext-->
        <p class="welcome_title">
            Welcome to fruitly!
        </p>
    </div>
    <hr class="divider">
    <p class="paragraph">
        Fruitly is a website where you can share your most delicious recipes! Fruitly makes it possible to chat all within this website with other enthusiasts. Together, you can come up with the most delicious food combinations.<br>
        In order to chat with others or view recipes you have to log in to our website. This is to ensure the safety of our users.<br>
        If you are not already a member at Fruitly you can register an account and begin chatting away.<br>
        Join us today!<br>
    </p>
    <!-- Knapp som tar en till 'register.php' där användaren kan registrera sig-->
    <div class="button_holder">
        <div class="button">
            <a class="button_text" href="register.php">
                Register
            </a>
        </div>
    </div>
    <hr class="divider">
    <div>
        <p class="quote">
            <i>
                "A recipe has no soul. <br>
                You, as a cook, must <b>bring soul</b> to the recipe."
            </i>
        </p>
    </div>
    <div>
        <!-- Text om hemsidan-->
        <p class="about_us">
            About us
        </p>
        <hr class="au_divider">
        <div>
            <div class="img_box">
                <!-- En decorativ bild på sidan-->
                <img class="image" src="images/cooking.jpg" alt="Cute kitchen baking cookies">
                <div class="img_overlay">
                    <p class="overlay_text">
                        ~ A little treat for someone sweet
                    </p>
                </div>
            </div>
            <div class="au_container">
                <p class="paragraph">
                    Fruitly is a website developed by food enthusiasts in hope to make recipe usage easier and more available for everyone. <br>
                    It is a common occurrence that you are standing in front of a recipe trying to make a delicious meal but then you find something that you do not understand. At times like that you wish that you could just ask someone what you are supposed to do next. <br>
                    Here is where Fruitly comes in! Here you can post your inquiries and other food experts have a chanse to answer.<br>
                    Simply post your inquiry and let others answer! It is that simple.<br>
                    You can even share your own recipe if you wish.<br>
                    At Fruitly you can even share concerns about a recipe or if you noticed any faults in a recipe. Together all users can figure out a solution.<br>
                    In order to use Fruitly you have to be a registered member. Simply, make your account and chat away.<br>
                    This is for the protection of our users. This way only those can post, read and comment that are truly serious about recipes.<br>

                </p>
            </div>
        </div>
    </div>
    <!-- Inkluderar footern-->
    <?php include './include/view/footer.php'; ?>
</body>

</html>