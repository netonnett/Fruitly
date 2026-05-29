<!-- Formulär för search-->
<form name="search" action="home.php" method="get">
    <label class="search_icon">🔍︎</label>
    <input type="text" name="search" id="search" class="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" placeholder="pasta">
</form>