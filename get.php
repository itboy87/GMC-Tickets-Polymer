<?php
/**
 * Created by PhpStorm.
 * User: itboy
 * Date: 7/31/2015
 * Time: 8:05 AM
 */

require_once"database/DB.php";
require_once"utils.php";
require_once"Response.php";

$res = new Response();


$setValues = array(
    "student_name",
    "father_name",
    "roll_no",
    "semester",
    "department",
    "total_fee",
    "session_from",
    "session_to"
);
$notEmptyValues = array(
    "student_name",
    "roll_no",
    "total_fee"
);

$data = array();
$data = DB::Select("SELECT * FROM Student");
if(is_array($data) && count($data))
{
    $res->setSuccess(true)->setData($data)->echo_json();
}
else
{
    $res->setError("No Record Found.")->echo_json();
}


