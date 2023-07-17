<?php

// authentication.php

/**
 * Check if a user is logged in
 *
 * @return bool True if the user is logged in, false otherwise
 */
function isUserLoggedIn()
{
    return isset($_SESSION['user']);
}

/**
 * Log in a user
 *
 * @param array $user User data to be stored in the session
 */
function loginUser($user)
{
    $_SESSION['user'] = $user;
}

/**
 * Log out the current user
 */
function logoutUser()
{
    unset($_SESSION['user']);
}
