<?php

session_start();

// Ensure that all session data is cleared
$_SESSION = [];

// Destroy the session
session_destroy();

// Clear the session cookie to fully log out the user
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirect to index.html
header("Location: index.html");
exit;

?>
