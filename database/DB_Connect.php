<?php
/**
 * Created by PhpStorm.
 * User: mrhus_000
 * Date: 4/1/2015
 * Time: 9:56 AM
 */

class DB_Connect {

    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            require_once ('/database/db_config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            try{
                self::$instance = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE, DB_USER, DB_PASS,$pdo_options);
            }catch (PDOException $e){
                self::handle_sql_errors("database connection!",$e);
            }
        }

        return self::$instance;
    }

    public static function handle_sql_errors($query, $e)
    {   //This function also used by table class
        /** @var Response $res */
        $res = new Response();
        $res->setError("Error Logged In File Please Contact Web Administrator!");
        echo json_encode($res);
        $error["query"] = $query;
        $error["msg"] = $e->getMessage();
        file_put_contents('error/PDO_DB_Errors.json',json_encode($error)."\r\n", FILE_APPEND);
        die;
    }
}