<?php

// ------- Sql Code -------
include("./scratch.php");

mysqli_multi_query(
    $conn,
    "CREATE TABLE `users` (
        `id` text,
        `balance` text,
        `time` text,
        `ban` text,
        `email` text,
        `password` text
        ) default charset = utf8mb4;
        CREATE TABLE `service` (
        `key` text,
        `price` text,
        `time` text,
        `user` text,
        `name` text,
        `hajm` text,
        `contry` text,
        `expire` text,
        `type` text,
        `active` text
        ) default charset = utf8mb4;
        CREATE TABLE `admin` (
        `username` text,
        `password` text
        ) default charset = utf8mb4;
        CREATE TABLE `serA` (
        `name` text,
        `caption` text,
        `contry` text
        ) default charset = utf8mb4;
        CREATE TABLE `serF` (
        `name` text,
        `coin` text,
        `protocol` text,
        `natwork` text,
        `port` text,
        `ip` text,
        `time` text,
        `hajm` text,
        `active` text,
        `contry` text,
        `hosturl` text,
        `public` text,
        `privet` text
        ) default charset = utf8mb4;
        CREATE TABLE `config` (
        `appname` text,
        `apptitle` text,
        `caption` text,
        `instagram` text,
        `telegram` text,
        `seo` text,
        `walet` text,
        `crispSC` text,
        `alert` text,
        `alertShow` text,
        `zarinpal` text
        ) default charset = utf8mb4;
        CREATE TABLE `panel` (
        `ip` text,
        `username` text,
        `password` text,
        `port` text
        ) default charset = utf8mb4;");
    if(mysqli_connect_errno()){
    echo "به دلیل مشکل زیر، اتصال برقرار نشد : <br />" . mysqli_connect_error();
    die();
}else{
echo "دیتابیس متصل و نصب شد .";

            
            
            
            
            
}

?>