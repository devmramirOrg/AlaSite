<?php
//------- Sql DataBase -------
$serverName = "localhost"; // ادیت نشود
$db_name    = ""; // نام دیتابیس
$db_user    = ""; // یوزر دیتابیس
$db_pass    = ""; // پسورد دیتابیس

$conn = mysqli_connect($serverName, $db_user, $db_pass, $db_name);

if(!$conn){

    die('failed ' . mysqli_connect_error());
}

$licendCode = "";
?>