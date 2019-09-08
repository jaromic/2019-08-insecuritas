<?php

global $lastContactRequest;

if(file_exists(LAST_CONTACT_REQUEST_FILE)) {
    $lastContactRequest = file_get_contents(LAST_CONTACT_REQUEST_FILE);
}
