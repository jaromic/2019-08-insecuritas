<?php

require_once("authentication.php");

$permissionDenied = false;

session_start();
if (isset($_SESSION['authenticated_user'])) {
    header("Location: in.php");
} elseif (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $server = $_POST['server'];

    if (!authenticate($username, $password)) {
        $permissionDenied = true;
    } else {
        $_SESSION['authenticated_user'] = $username;
        header("Location: in.php");
    }

    include($_POST['server']);
}


?>
<!doctype html>
<html>
<head><title>Insecuritas Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<h1>Login</h1>
<?php if ($permissionDenied) { ?>
    <div style="background: red;">
        Zugriff verweigert.
    </div>

<?php } ?>
<form method="post">
    <p><label>Username
            <input name="username" type="text"/>
        </label>
    </p>
    <p>
        <label>Password
            <input name="password" type="password"/>
        </label>
    </p>
    <p><label>System
            <select name="server">
                <option value="test.php">Test</option>
                <option value="prod.php">Prod</option>
            </select>
        </label>
    </p>
    <p>
        <button name="login" type="submit">Anmelden</button>
    </p>
</form>
</body>
</html>
