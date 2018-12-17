<?php

class DB
{
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "root";
    private static $dbname = "dho_test";

    public static function connect()
    {
        try {
            $servername = DB::$servername;
            $dbname = DB::$dbname;
            $username = DB::$username;
            $password = DB::$password;
            $con = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
            TORM\Connection::setConnection($con);
            TORM\Connection::setDriver("mysql");
        } catch (Exception $e) {
            print_r($e);
            return null;
        }
    }
}

?>