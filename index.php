<?php

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $server = $_POST['server'];

    echo "Logging in {$username}:{$password}@{$server}";

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
                <option value="test">Test</option>
                <option value="prod">Prod</option>
            </select>
        </label>
    </p>
    <p>
        <button name="login" type="submit">Anmelden</button>
    </p>
</form>
</body>
</html>
