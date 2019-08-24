<?php

session_start();
if(isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
} elseif(isset($_SESSION['authenticated_user'])) {
    ?>
    <h1>Welcome, <?php echo $_SESSION['authenticated_user']; ?>!</h1>
    <h2>Confidential information</h2>
    <ul>
        <li><a href="">Bli</a></li>
        <li><a href="">Bla</a></li>
        <li><a href="">Blu</a></li>
    </ul>
    <form method="post">
        <button type="submit" name="logout">Abmelden</button>
    </form>
<?php
} else {
    ?>
    You are not logged in. <a href="index.php">Go back.</a>
<?php
}