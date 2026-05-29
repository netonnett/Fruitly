<?php require_once './Include/Bootstraps.php'; ?>
<!--Kontrollerar så att användaren är inloggad -->
<?php $autorizer->requireLogin(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Stylesheets för alla sidor-->
  <link rel="stylesheet" href="style/headerstyle.css">
  <link rel="stylesheet" href="style/create_post.css">
  <link rel="stylesheet" href="style/footerstyle.css">
  <link rel="stylesheet" href="style/homepage.css">
  <link rel="stylesheet" href="style/post_list.css">
  <title>Home page</title>
</head>

<body>
  <!-- Inkluderar headern-->
  <?php include './include/view/header.php'; ?>
  <div class="share_box">
    <!-- Skriver ut välkommen och den aktuella användarnamnet som är inloggad-->
    <p class="share_text">
      <i> Welcome, <?= $_SESSION['user']['username'] ?>! Share your recipes now! </i>
    </p>
  </div>
  <!-- Länk till 'create_post.php' där formuläret för att skapa inlägg finns-->
  <?php include './include/view/create_post.php'; ?>
  <hr class="divider">
  <br>
  <?php include './Include/View/search.php'?>
  <!-- Länk till 'posts' där alla post skrivs ut på skärmen-->
  <?php include './Include/View/posts.php' ?>
  <!-- Länk till footern-->
  <?php include './include/view/footer.php'; ?>
  <!-- Länk till javascript-->
  <script src="JavaScript/createpost.js"></script>
</body>

</html>