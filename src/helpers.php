<?php

/**
 * @param $name
 * @param array $data
 * @return mixed
 */
function view(string $name, array $data = []) {

    extract($data);

    return require __DIR__ . "/../views/{$name}.php";
}

/**
 * @param string $path
 */
function redirect(string $path = null) : void {
    header("Location: /{$path}");
}

/**
 * Go back to the previous page
 */
function goBack() : void {
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

/**
 * @param string $formName
 * @return string
 */
function generateToken(string $formName) : string {
    $session_id = session_id();

    return sha1($formName.$session_id);
}

/**
 * @param string $token
 * @param string $formName
 * @return bool
 */
function checkToken(string $token, string $formName) : bool {
    return $token === generateToken( $formName );
}

/**
 * @param string $message
 * @param string $type
 */
function setResponseMessage(string $message, string $type) : void {
    //Delete Older message
    if (isset($_SESSION[$type])) {
        unset($_SESSION[$type]);
    }

    $_SESSION[$type] = $message;
}

/**
 * @param string $type
 * @return bool
 */
function checkSessionMessage(string $type) : bool {
    return isset($_SESSION[$type]);
}

/**
 * @param string $type
 * @return string
 */
function getSessionMessage(string $type) : string {
    $message = $_SESSION[$type];
    unset($_SESSION[$type]);
    return $message ?? 'No Message';
}
