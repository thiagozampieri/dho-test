<?php
$isSessionLoggedIn = (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ? true : false;
$isCookieLoggedIn = (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) ? true : false;

if ($isSessionLoggedIn == true || $isCookieLoggedIn == true) {
    header("Location: http://www.google.com");
    exit();
}

?>