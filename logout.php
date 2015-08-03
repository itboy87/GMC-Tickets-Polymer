<?php
/**
 * Created by PhpStorm.
 * User: itboy
 * Date: 7/31/2015
 * Time: 7:55 AM
 */

session_start();

session_destroy();

header("location:index.php");