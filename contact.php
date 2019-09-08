<?php

require_once "include/common.php";

if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
} else {
    $email = null;
}

if (isset($_REQUEST['message'])) {
    $message = $_REQUEST['message'];
} else {
    $message = null;
}

if (isset($_GET['preview'])) {
    $preview = true;
    $messageSent = false;
} elseif (isset($_POST['send'])) {
    $preview = false;
    file_put_contents(LAST_CONTACT_REQUEST_FILE, "E-Mail: {$email}<br>Message: {$message}");
    $messageSent = true;
} else {
    $preview = false;
    $messageSent = false;
}

?>
<html lang="en">
<head><title>Contact Us &ndash; Insecuritas</title>
    <?php require_once "include/common_head.php"; ?>
    <link rel="stylesheet" href="css/contact.css" />
</head>
<body>
<h1>Contact us</h1>
<?php if ($preview) { ?>
    <div id="preview" class="preview">
        <p>This is a preview of your message:</p>
        <p><strong>E-Mail: </strong><?php echo $email ?></p>
        <p><strong>Your message: </strong><?php echo $message ?></p>
        <form action="contact.php" method="post">
            <input type="hidden" name="email" value="<?php echo $email ?>" />
            <input type="hidden" name="message" value="<?php echo $message ?>" />
            <button id="send" name="send" type="submit">Send</button>
        </form>
        <a href="contact.php">Cancel</a>
    </div>
<?php } elseif($messageSent) { ?>
    <div id="sent" class="sent">
        <p>Your message has been sent. Thank you!</p>
    </div>
<?php } else { ?>
<main>
    <form>
        <p><label>Your e-mail address
                <input id="email" name="email" type="email"/>
            </label>
        </p>
        <p><label>Your message
                <textarea id="message" name="message">
                    <?php echo $message ?>
                </textarea>
            </label>
        </p>
        <p>
            <button id="preview" name="preview" type="submit">Preview</button>
        </p>
    </form>
</main>
<?php } ?>
<footer>
    <a href="index.php">Back to Login</a>
</footer>
</body>
</html>
