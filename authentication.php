<?php

const PASSWORD_FILE = 'secret/passwd';

function authenticate($user, $password)
{
    $usersAndPasswords = getUsersAndPasswords();

    if($user) {
        if (!array_key_exists($user, $usersAndPasswords) || $usersAndPasswords[$user] != $password) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

/**
 * @return array
 */
function getUsersAndPasswords()
{
    $passwordFileContent = file_get_contents(PASSWORD_FILE);
    $lines = explode("\r\n", $passwordFileContent);
    $usersAndPasswords = [];
    array_walk($lines, function ($line) use (&$usersAndPasswords) {
        list($u, $p) = explode(":", $line);
        $usersAndPasswords[$u] = $p;
    });
    return $usersAndPasswords;
}
