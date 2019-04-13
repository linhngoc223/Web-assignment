<?php
class Session{

    public static function init() {
        if (version_compare(phpversion(),'7.2.1','<')) {
            if (session_id() == '') {
                session_start();
            }
        }
        else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }

    public static function set($key, $var) {
        $_SESSION[$key] = $var;
    }

    public static function get($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        else {
            return false;
        }
    }


    public static function checkSession() {
        if (self::get("login")==false) {
            self::destroy();
            header("Location: /");
        }
    }

    public static function checkLogin() {
//        die(var_dump($_SESSION));
        if (self::get("login")==true) {
            header("Location: /");
        }
    }

    public static function destroy() {
        session_destroy();
        session_unset();
        header("Location: /");

    }
}
