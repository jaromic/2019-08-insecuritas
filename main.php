<?php ?>
    <html lang="en">
    <head><title>Main Menu &ndash; Insecuritas</title>
        <?php
            $lastContactRequest = null;
            require_once "include/common.php";
            require_once "include/common_head.php";
            require_once "include/last_contact_request.php";
        ?>
    </head>

    </html>

<?php
session_start();
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
} elseif (isset($_SESSION['authenticated_user'])) {
    ?>
    <h1>Welcome on the '<?php echo $_SESSION['server']; ?>' server, <?php echo $_SESSION['authenticated_user']; ?>!</h1>
    <h2>Confidential information</h2>
    <ul>
        <li><a href="">Bli</a></li>
        <li><a href="">Bla</a></li>
        <li><a href="">Blu</a></li>
    </ul>
    <h2>License check</h2>
    <a href="xml.php">Upload license data</a>
    <br>
    <br>
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
    <h2>Last Contact Request</h2>
    <?php if ($lastContactRequest) { ?>
        <div class="lastContactRequest">
            <?php echo $lastContactRequest ?>
        </div>
    <?php } else { ?>
        <div>No last contact request yet.</div>
    <?php } ?>

    <?php
} else {
    ?>
    You are not logged in. <a href="index.php">Go back.</a>
    <?php
}