<?php

session_start();

if (isset($_SESSION['login'])) {
include("./../scratch.php");
$idUser     = $_SESSION['login'];
$sqluser    = "SELECT * FROM `users` WHERE `id`='$idUser'";
$resultuser = mysqli_query($conn,$sqluser);
        
$resuser    = mysqli_fetch_assoc($resultuser);
$balance    = $resuser['appname'];
$time       = $resuser['time'];
$ban        = $resuser['ban'];
$email      = $resuser['email'];
$password   = $resuser['password'];

if(isset($_POST['newServiceName']) and !is_null($_POST['newServiceName']) and $_POST['newServiceName'] != ''){
$nameServes  = $_POST['newServiceName'];
$sqluser2    = "SELECT * FROM `serF` WHERE `name`='$nameServes'";
$resultuser2 = mysqli_query($conn,$sqluser2);
        
$resuser2    = mysqli_fetch_assoc($resultuser2);
$name        = $resuser2['name'];
$coin        = $resuser2['coin'];
$protocol    = $resuser2['protocol'];
$natwork     = $resuser2['natwork'];
$port        = $resuser2['port'];
$ip          = $resuser2['ip'];
$time2       = $resuser2['time'];
$hajm        = $resuser2['hajm'];
$hosturl     = $resuser2['hosturl'];
$public      = $resuser2['public'];
$privet      = $resuser2['privet'];
$contry      = $resuser2['contry'];

if($name != NULL){
    
    if($balance >= $coin){
        
$sqluser3    = "SELECT * FROM `panel` WHERE `ip`='$ip'";
$resultuser3 = mysqli_query($conn,$sqluser3);
        
$resuser3    = mysqli_fetch_assoc($resultuser3);
$usernameP   = $resuser3['username'];
$passwordP   = $resuser3['password'];
$portP       = $resuser3['port'];

if($usernameP != NULL){
    
    $link = json_decode(file_get_contents("https://galexynet.work/PA/create2.php?step=client&name=$name&ports=$port&traific=$hajm&date=$time2&ip=$ip&port=$portP&username=$usernameP&pass=$passwordP&domains=$hosturl&public=$public&private=$privet"),true)["servers"];
    
    if(isset($link)){
        $coinNew = $balance - $coin;
        $next = date('Y/m/d');
        
$current_date = date("Y-m-d");

// افزودن یک روز به تاریخ فعلی
$new_date = date("Y-m-d", strtotime("+$time2 day", strtotime($current_date)));

        mysqli_query($conn,"UPDATE `users` SET `coin`='$coinNew' WHERE `id`='$idUser' LIMIT 1");
        $sql2    = "INSERT INTO `service` (`key`, `price`, `time`, `user`, `name`, `hajm`, `contry`, `expire`, `type`, `active`) VALUES ('$link', '$coin', '$next', '$idUser', '$hajm', '$contry', '$new_date', '$coin', '$protocol', 'active')";
        $result2 = mysqli_query($conn,$sql2);
        echo json_encode(['success' => 1]);
    }
} else {
    echo json_encode(['success' => 4]);
}
    }
    else {
        echo json_encode(['success' => 2]);
    }
}
 else {
     
     echo json_encode(['success' => 3]);
 }
}
}

?>