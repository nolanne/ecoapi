<?php
class db{

    private static $MySQLiConnect;

    public static function connect()
    {
        if( !isset( self::$MySQLiConnect ) )
        {
            $mysqli = new mysqli("localhost", "root", "", "ecoapi");
            if ($mysqli->connect_errno) {
                echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            else
            {
                self::$MySQLiConnect = $mysqli;
            }
        }
        return self::$MySQLiConnect;
    }

}