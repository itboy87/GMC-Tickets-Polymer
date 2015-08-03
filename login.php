<?php
/**
 * Created by PhpStorm.
 * User: itboy
 * Date: 7/30/2015
 * Time: 11:04 PM
 */
session_start();

if(isset($_POST['email']) && $_POST['pass'])
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if(strtolower($email) === 'admin@gmc.com' && $pass === 'gmcadmin123'){
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = 1;

        header("location:index.php?res=Login Success fully");
    }
    else
    {
        header("location:index.php?res=Incorrect username or password");
    }
}
else
{
    header("location:index.php?res=username or password missing!");
}