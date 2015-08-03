<?php
/**
 * Created by PhpStorm.
 * User: mrhus_000
 * Date: 6/3/2015
 * Time: 12:40 PM
 */

require_once"DB_Connect.php";
class DB {
    public static $isTransaction = false;
    public static $transactionOwner = "";
    public static function beginTransaction($owner=""){
        if(self::$isTransaction)
        {
            DB::custom_sql_error(null,"DB Transaction Already Started By: ".self::$transactionOwner,array("owner"=>$owner));
        }
        self::$isTransaction = true;
        self::$transactionOwner = $owner;

        DB_Connect::getInstance()->beginTransaction();
    }
    public static function endTransaction($success){
        if(self::$isTransaction)
        {
            if($success)
            {
                self::commit();
            }
            else
            {
                self::rollback();
            }
        }
    }
    public static function commit(){
        self::$isTransaction = false;
        self::$transactionOwner = "";
        DB_Connect::getInstance()->commit();

    }
    public static function rollback(){
        self::$isTransaction = false;
        self::$transactionOwner = "";
        DB_Connect::getInstance()->rollBack();
    }
    public static function select($query,$params=array(),$fetch_mode=PDO::FETCH_ASSOC){
        $results = null;
        try{
            $stmt = self::execute($query,$params);
            if($stmt->rowCount())
            {
                $results = $stmt->fetchAll($fetch_mode);
            }
            $stmt->closeCursor();
            return $results;
        }catch (\PDOException $e){
            self::handle_sql_errors($query,$e);
        }
    }

    public static function insert($query,$params=array()){
        try{
            $stmt = self::execute($query,$params);
            return $stmt->rowCount();
        }catch (\PDOException $e){
            self::handle_sql_errors($query,$e);
        }

    }
    public static function insertWithType($query,$params){
        try{
            $stmt = self::executeWithType($query,$params);
            return $stmt->rowCount();
        }catch (\PDOException $e){
            self::handle_sql_errors($query,$e);
        }

    }
    public static function formatKeyValues($arr)
    {
        $output = "";
        foreach($arr as $key=>$value)
        {
            $output .= $key." = ?,";
        }
        //Remove last comma
        $output = rtrim($output,',');

        return $output;
    }
    /*
    public static function formatWhere($arr)
    {
        $output = " WHERE ";
        $i = 1;
        foreach($arr as $key=>$value)
        {
            if($i%2 == 0)
            {
                $output .= " $value ";
            }
            else
            {
                $output .= $key."=?";
            }
            $i++;
        }

        return $output;
    }
    public static function getWhereValues($arr)
    {
        $output = array();
        $i = 1;
        foreach($arr as $key=>$value)
        {

            if($i%2 !== 0)
            {
                $output[] = $value;
            }
            $i++;
        }

        return $output;
    }
    */
    public static function update($table,$values,$condition=array()){
        $query = "UPDATE ".$table." SET ";

        if(!Utils\Check::isAllAssoc($values) || count($values)<1)
        {
            self::custom_sql_error($query,"Invalid values associative array of values required.",array("values"=>$values));
        }
        $parameters = array_values($values);

        $query .= self::formatKeyValues($values);
        if(isset($condition['where']))
        {
            $query .= " WHERE ".$condition['where'];

            $params_need = substr_count($condition['where'],'?');
            if($params_need)
            {
                if(!isset($condition['values']) || count($condition['values']) !== $params_need)
                {
                    self::custom_sql_error($query,"prepared '?' parameters not equal given values",$condition);
                }
                else
                {
                    $parameters = array_merge($parameters,$condition['values']);
                }
            }
        }

        try{
            $stmt = self::execute($query,$parameters);

            //if error then exception will be thrown
            //If same data updated then rowCount return 0
            return true;


        }catch (\PDOException $e){
            self::handle_sql_errors($query,$e);
        }

    }
    public static function delete($query,$params=array()){

        try{
            $stmt = self::execute($query,$params);
            return $stmt->rowCount();
        }catch (\PDOException $e){
            self::handle_sql_errors($query,$e);
        }

    }
    public static function lastInsertedId(){
        return \DB_Connect::getInstance()->lastInsertId();
    }

    public static function execute($query,$params=array()){
        $stmt = \DB_Connect::getInstance()->prepare($query);

        if( is_array($params) && count($params) ){
            $stmt->execute($params);
        }
        else{
            $stmt->execute();
        }
        return $stmt;
    }
    public static function executeWithType($query,$params){
        $stmt = \DB_Connect::getInstance()->prepare($query);

        if($params){
            $i=1;
            foreach($params->data_fields AS $key => $value) {
                $stmt->bindParam($i, $params->values[$key], $value);
                $i++;
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public static function handle_sql_errors($query, $e)
    {
        DB_Connect::handle_sql_errors($query,$e);
    }

    public static function custom_sql_error($query,$msg,$extra)
    {
        //This function also used by table class
        /** @var Response $res */
        $res = new Response();
        $res->setError("Query Error Logged In File Please Contact Web Administrator!");
        echo json_encode($res);
        $error["query"] = $query;
        $error["extra"] = $extra;
        $error["msg"] = $msg;
        file_put_contents('error/CUSTOM_DB_Errors.json', json_encode($error)."\r\n", FILE_APPEND);
        die;
    }

    public static function errorCode()
    {
        return DB_Connect::getInstance()->errorCode();
    }
    public static function errorInfo()
    {
        return DB_Connect::getInstance()->errorInfo();
    }
}