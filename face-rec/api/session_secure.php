<?php
// session_secure.php

session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '', // Optional: set to 'yourdomain.com' if needed
    'secure' => true,       // Make sure HTTPS is used
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();