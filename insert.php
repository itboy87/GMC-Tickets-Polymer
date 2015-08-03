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
/*    "session_from",
    "session_to"*/
);
$notEmptyValues = array(
    "student_name",
    "roll_no",
    "total_fee"
);


function redirect($str)
{
    header("location:index.php?res=".$str);
}

if(!Utils\IsSetBulk::Request($setValues))
{
    $res->setError("Some values are missing")->echo_json();
}

if(Utils\IsEmptyBulk::Request($notEmptyValues))
{
    $res->setError("Some required fields are empty")->echo_json();
}

$dbValues = array();
foreach($setValues as $key)
{
    $dbValues[] = strip_tags($_REQUEST[$key]);
}


if(DB::insert(
    "INSERT INTO `student` (`student_name`, `father_name`, `roll_no`, `semester`, `department`, `total_fee`) VALUES (?,?,?,?,?,?)",$dbValues)
)
{
    $res->setSuccess(true)->echo_json();
}
else
{
    $res->setError("Unable To add new ticket.")->echo_json();
}


