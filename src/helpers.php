<?php
/**
 * Created by PhpStorm.
 * User: damilare-konga
 * Date: 5/31/18
 * Time: 5:30 PM
 */

/**
 * @param $name
 * @param array $data
 * @return mixed
 */
function view(string $name, array $data = []) {

    extract($data);

    return require "../views/{$name}.php";
}

/**
 * @param string $path
 */
function redirect(string $path = null) : void {
    header("Location: /{$path}");
}

/**
 * @param string $formName
 * @return string
 */
function generateToken(string $formName) : string {
    if (!session_id()) {
        session_start();
    }
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