<?php

class db {

    private static $con;

    public static function connect($mysqlhost, $mysqluser, $mysqlpwd, $mysqldb) {
        self::$con = new mysqli($mysqlhost, $mysqluser, $mysqlpwd, $mysqldb) or error_connect();
    }

    public static function get()
    {
        return self::$con;
    }
}

