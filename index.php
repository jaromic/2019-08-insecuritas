<?php

require_once "include/common.php";
require_once "include/authentication.php";

$permissionDenied = false;

session_start();
if (isset($_SESSION['authenticated_user'])) {
    header("Location: main.php");
} elseif (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $server = $_POST['server'];

    if (!authenticate($username, $password)) {
        $permissionDenied = true;
    } else {
        $_SESSION['authenticated_user'] = $username;
        header("Location: main.php");
    }

    include($_POST['server']);
}


?>
<!doctype html>
<html lang="en">
<head><title>Insecuritas Login</title>
    <?php require_once "include/common_head.php"; ?>
</head>
<body>
<h1>Login</h1>
<?php if ($permissionDenied) { ?>
    <div style="background: red;">
        Zugriff verweigert.
    </div>

<?php } ?>
<!-- TODO secure 'secret/passwd' -->
<form method="post">
    <p><label>Username
            <input id="username" name="username" type="text" onchange="onInputChanged()" onkeyup="onInputChanged()"/>
        </label>
    </p>
    <p>
        <label>Password
            <input id="password" name="password" type="password" onchange="onInputChanged()" onkeyup="onInputChanged()"/>
        </label>
    </p>
    <p><label>System
            <select name="server">
                <option value="include/test.php">Test</option>
                <option value="include/prod.php">Prod</option>
            </select>
        </label>
    </p>
    <p>
        <button id="login" name="login" type="submit" disabled="disabled">Login</button>
    </p>
</form>
<footer>
    <a href="contact.php">Need help? Contact us!</a>
</footer>
</body>
</html>
