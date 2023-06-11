<?php

namespace Model;

abstract class Connect 
    {
        const HOST = "localhost:3306";
        const DB = "script_cinema_rz";
        const USER = "root";
        const PASS = "";

        public static function dbConnect()
            {
                try
                    {
                        $dsn = "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8";
                        $username = self::USER;
                        $password = self::PASS;
                        return new \PDO($dsn, $username, $password);
                    }
                catch(\PDOException $e)
                    {
                        return $e->getMessage();
                    }
            }
    }

?>