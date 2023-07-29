<?php

session_start();

if (isset($_SESSION['login'])) {
    include("./../scratch.php");
    
$url = $_SERVER['HTTP_HOST'];
$checkL = file_get_contents("https://devmramir.info/licens/api.php?url=$url&licens=$licendCode");

if(strpos($checkL, "licens ok") == false){
    
    echo "لایسنس خریداری نشده";
    exit;
}
$sqluser    = "SELECT * FROM `config`";
$resultuser = mysqli_query($conn,$sqluser);
        
$resuser    = mysqli_fetch_assoc($resultuser);
$nameSite   = $resuser['appname'];
$caption    = $resuser['caption'];
$instagram  = $resuser['instagram'];
$telegram   = $resuser['telegram'];
$seo        = $resuser['seo'];
$walet      = $resuser['walet'];
$crispSC    = $resuser['crispSC'];
$apptitle   = $resuser['apptitle'];
$id         = $_SESSION['login']; 

$sql    = "SELECT * FROM `users` WHERE `id`='$id'";
$result = mysqli_query($conn,$sql);
$res    = mysqli_fetch_assoc($result);
$coin   = $res['balance'];

$sqlF    = "SELECT * FROM `service`";
$resultF = mysqli_query($conn,$sqlF);
$resF    = mysqli_num_rows($resultF);

$sqlFA    = "SELECT * FROM `service` WHERE `active`='on'";
$resultFA = mysqli_query($conn,$sqlFA);
$resFA    = mysqli_num_rows($resultFA);
    
$sql_admin2    = "SELECT GROUP_CONCAT(balance SEPARATOR ', ') FROM `users`";
$result_admin2 = mysqli_query($conn,$sql_admin2);
$res_admin2 = mysqli_fetch_assoc($result_admin2);

$balance_res = $res_admin2 ["GROUP_CONCAT(balance SEPARATOR ', ')"];

$balance_seperated = explode(",", $balance_res);
$balance_total = 0;
foreach($balance_seperated as $blnc) {
    $balance_total += $blnc;
}
}else{
    header("Location: ./login.php");
}

?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Vazirmatn">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./scm.css">
</head>
<body>
    <!-- header -->
    <header>
        <div id="header-banner">
            <img id="header-logo" src="./../assets/img/logo.svg">
            <span id="header-title"><?php echo $nameSite;?></span>
            <div id="header-balance">
                <svg id="header-balance-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                    <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"></path>
                </svg>
                <span id="header-balance-value"><?php echo "$coin تومان"; ?></span>
            </div>
        </div>
    </header>
    
    <!-- sidebar -->
    <section id="section-sidebar">
        <div id="sidebar-container">
            <div class="sidebar-item sidebar-item-active" id="sidebar-myServices">
                <svg class="sidebar-item-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cloud-fog2-fill" viewBox="0 0 16 16">
                    <path d="M8.5 3a5.001 5.001 0 0 1 4.905 4.027A3 3 0 0 1 13 13h-1.5a.5.5 0 0 0 0-1H1.05a3.51 3.51 0 0 1-.713-1H9.5a.5.5 0 0 0 0-1H.035a3.53 3.53 0 0 1 0-1H7.5a.5.5 0 0 0 0-1H.337a3.5 3.5 0 0 1 3.57-1.977A5.001 5.001 0 0 1 8.5 3z"/>
                  </svg>
                <span class="sidebar-item-title">سرویس های من</span>
            </div>
            <div class="sidebar-item" id="sidebar-newService">
                <svg class="sidebar-item-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cloud-plus-fill" viewBox="0 0 16 16">
                    <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm.5 4v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
                </svg>
                <span class="sidebar-item-title">خرید سرویس</span>
            </div>
            <div class="sidebar-item" id="sidebar-addrbalance">
                <svg class="sidebar-item-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-wallet-fill" viewBox="0 0 16 16">
                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2h-13z"/>
                    <path d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6z"/>
                  </svg>
                <span class="sidebar-item-title">افزایش موجودی</span>
            </div>
            <!-- <div class="sidebar-item" id="sidebar-alert">
                <svg class="sidebar-item-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg>
                <span class="sidebar-item-title">اعلان ها</span>
            </div> -->
            <!-- <div class="sidebar-item" id="sidebar-settings">
                <svg class="sidebar-item-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                </svg>
                <span class="sidebar-item-title">تنظیمات</span>
            </div> -->
            <div class="sidebar-item" id="sidebar-logout">
                <svg class="sidebar-item-icon" id="account-option-logout" xmlns="http://www.w3.org/2000/svg" fill="#f44336" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
                <span class="sidebar-item-title">خروج</span>
            </div>
        </div>
    </section>

    <script>
    function copy(Text) {
        navigator.clipboard.writeText(Text);
    }
    </script>

    <section id="section-myServices">
        <div id="myServices-container">
            <?php 
            
$sqlUN    = "SELECT * FROM `service` WHERE `user`='$id'";
$resultUN = mysqli_query($conn,$sqlUN);
if(!$resultUN){
 while($row = mysqli_fetch_assoc($resultUN)){
        $kay      = $row['kay'];
        $name     = $row['name'];
        $type     = $row['type'];
        $contry   = $row['contry'];
        $hajm     = $row['hajm'];
        $expire   = $row['expire'];
        $time     = $row['time'];
        $active   = $row['active'];
        $price    = $row['price'];
        if ($active == "active") {
            $active = "فعال";
        } else {
            $active = "غیرفعال";
        }

    echo "<div class='myServices-item'>
                <div class='myServices-item-header'>
                    <svg class='myServices-item-header-icon' xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-router' viewBox='0 0 16 16'>
                        <path d='M5.525 3.025a3.5 3.5 0 0 1 4.95 0 .5.5 0 1 0 .707-.707 4.5 4.5 0 0 0-6.364 0 .5.5 0 0 0 .707.707Z'/>
                        <path d='M6.94 4.44a1.5 1.5 0 0 1 2.12 0 .5.5 0 0 0 .708-.708 2.5 2.5 0 0 0-3.536 0 .5.5 0 0 0 .707.707ZM2.5 11a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm4.5-.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2.5.5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm1.5-.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Z'/>
                        <path d='M2.974 2.342a.5.5 0 1 0-.948.316L3.806 8H1.5A1.5 1.5 0 0 0 0 9.5v2A1.5 1.5 0 0 0 1.5 13H2a.5.5 0 0 0 .5.5h2A.5.5 0 0 0 5 13h6a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5h.5a1.5 1.5 0 0 0 1.5-1.5v-2A1.5 1.5 0 0 0 14.5 8h-2.306l1.78-5.342a.5.5 0 1 0-.948-.316L11.14 8H4.86L2.974 2.342ZM14.5 9a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h13Z'/>
                        <path d='M8.5 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z'/>
                    </svg>
                    <span class='myServices-item-header-title'>$name</span>
                    <span class='myServices-item-header-status'>$active</span>
                </div>
                <hr>
                <div class='myService-info'>
                    <span class='myService-info-type'>نوع سرویس: $type</span>
                    <span class='myService-info-time'>زمان: $time</span>
                    <span class='myService-info-value'>حجم: $hajm GB</span>
                    <span class='myService-info-region'>کشور: $contry  <img src='./../assets/flags/fr.png'></span>
                    <span class='myService-info-expire'>تاریخ انقضا: $expire</span>
                </div>
                <div class='myService-Auth' onclick='copy('84y32igfbvnf89321chy4bc843c43cgrewkhmt5k6nhgkernmt4ihgmorgbn5trogmenrjtnwp8b93rnymc8crbn439comukwbfynduiuykbwtjvfrecbyunimcwnebuyvfeubsnwminebfvww')'>
                    <code>$kay</code>
                </div>
            </div>";
}}else{
    echo('<div id="no-service-text">
    <img src="./../assets/img/404.png">
    <div>شما سرویسی را خریداری نکرده اید.</div>
    </div>');
}
            ?>
            <!--
            <div class="myServices-item">
                <div class="myServices-item-header">
                    <svg class="myServices-item-header-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-router" viewBox="0 0 16 16">
                        <path d="M5.525 3.025a3.5 3.5 0 0 1 4.95 0 .5.5 0 1 0 .707-.707 4.5 4.5 0 0 0-6.364 0 .5.5 0 0 0 .707.707Z"/>
                        <path d="M6.94 4.44a1.5 1.5 0 0 1 2.12 0 .5.5 0 0 0 .708-.708 2.5 2.5 0 0 0-3.536 0 .5.5 0 0 0 .707.707ZM2.5 11a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm4.5-.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2.5.5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm1.5-.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Z"/>
                        <path d="M2.974 2.342a.5.5 0 1 0-.948.316L3.806 8H1.5A1.5 1.5 0 0 0 0 9.5v2A1.5 1.5 0 0 0 1.5 13H2a.5.5 0 0 0 .5.5h2A.5.5 0 0 0 5 13h6a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5h.5a1.5 1.5 0 0 0 1.5-1.5v-2A1.5 1.5 0 0 0 14.5 8h-2.306l1.78-5.342a.5.5 0 1 0-.948-.316L11.14 8H4.86L2.974 2.342ZM14.5 9a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h13Z"/>
                        <path d="M8.5 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                    </svg>
                    <span class="myServices-item-header-title">سرویس 30 گیگ 1 ماهه</span>
                    <span class="myServices-item-header-status">فعال</span>
                </div>
                <hr>
                <div class="myService-info">
                    <span class="myService-info-type">نوع سرویس: vmess</span>
                    <span class="myService-info-time">زمان: 1 ماهه</span>
                    <span class="myService-info-value">حجم: 30 گیگ</span>
                    <span class="myService-info-region">کشور: فرانسه  <img src="./../assets/flags/fr.png"></span>
                    <span class="myService-info-expire">تاریخ انقضا: 21/02/1402</span>
                </div>
                <div class="myService-Auth" onclick="copy('84y32igfbvnf89321chy4bc843c43cgrewkhmt5k6nhgkernmt4ihgmorgbn5trogmenrjtnwp8b93rnymc8crbn439comukwbfynduiuykbwtjvfrecbyunimcwnebuyvfeubsnwminebfvww')">
                    <code>vmess://84y32igfbvnf89321chy4bc843c43cgrewkhmt5k6nhgkernmt4ihgmorgbn5trogmenrjtnwp8b93rnymc8crbn439comukwbfynduiuykbwtjvfrecbyunimcwnebuyvfeubsnwminebfvww</code>
                </div>
            </div>
            <div class="myServices-item">
                <div class="myServices-item-header">
                    <svg class="myServices-item-header-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-router" viewBox="0 0 16 16">
                        <path d="M5.525 3.025a3.5 3.5 0 0 1 4.95 0 .5.5 0 1 0 .707-.707 4.5 4.5 0 0 0-6.364 0 .5.5 0 0 0 .707.707Z"/>
                        <path d="M6.94 4.44a1.5 1.5 0 0 1 2.12 0 .5.5 0 0 0 .708-.708 2.5 2.5 0 0 0-3.536 0 .5.5 0 0 0 .707.707ZM2.5 11a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm4.5-.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2.5.5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm1.5-.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Z"/>
                        <path d="M2.974 2.342a.5.5 0 1 0-.948.316L3.806 8H1.5A1.5 1.5 0 0 0 0 9.5v2A1.5 1.5 0 0 0 1.5 13H2a.5.5 0 0 0 .5.5h2A.5.5 0 0 0 5 13h6a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5h.5a1.5 1.5 0 0 0 1.5-1.5v-2A1.5 1.5 0 0 0 14.5 8h-2.306l1.78-5.342a.5.5 0 1 0-.948-.316L11.14 8H4.86L2.974 2.342ZM14.5 9a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h13Z"/>
                        <path d="M8.5 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                    </svg>
                    <span class="myServices-item-header-title">سرویس 30 گیگ 1 ماهه</span>
                    <span class="myServices-item-header-status-inactive">فعال</span>
                </div>
                <hr>
                <div class="myService-info">
                    <span class="myService-info-type">نوع سرویس: vmess</span>
                    <span class="myService-info-time">زمان: 1 ماهه</span>
                    <span class="myService-info-value">حجم: 30 گیگ</span>
                    <span class="myService-info-region">کشور: فرانسه  <img src="./../assets/flags/fr.png"></span>
                    <span class="myService-info-expire">تاریخ انقضا: 21/02/1402</span>
                </div>
                <div class="myService-Auth">
                    <code>vmess://84y32igfbvnf89321chy4bc843c43cgrewkhmt5k6nhgkernmt4ihgmorgbn5trogmenrjtnwp8b93rnymc8crbn439comukwbfynduiuykbwtjvfrecbyunimcwnebuyvfeubsnwminebfvww</code>
                </div>
            </div>-->
        </div>
    </section>
    

    <section id="section-newService">
        <div id="newService-container">
            <?php
                    
$sqlUN    = "SELECT * FROM `serF` WHERE `active`='active'";
$resultUN = mysqli_query($conn,$sqlUN);
$res_mmdkoni    = mysqli_num_rows($resultUN);

if($res_mmdkoni > 0){
 while($row = mysqli_fetch_assoc($resultUN)){
        $name_S   = $row['name'];
        $coin_S   = $row['coin'];
        $hajm_S   = $row['hajm'];
        $protocol = $row['protocol'];
        $contry_S = $row['contry'];
        $time_S   = $row['time'];
        $active_S = $row['active'];

    echo "<div class='newService-item'>
                <div class='newService-item-header'>
                    <svg class='newService-item-header-icon' xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-router' viewBox='0 0 16 16'>
                        <path d='M5.525 3.025a3.5 3.5 0 0 1 4.95 0 .5.5 0 1 0 .707-.707 4.5 4.5 0 0 0-6.364 0 .5.5 0 0 0 .707.707Z'/>
                        <path d='M6.94 4.44a1.5 1.5 0 0 1 2.12 0 .5.5 0 0 0 .708-.708 2.5 2.5 0 0 0-3.536 0 .5.5 0 0 0 .707.707ZM2.5 11a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm4.5-.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2.5.5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm1.5-.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Z'/>
                        <path d='M2.974 2.342a.5.5 0 1 0-.948.316L3.806 8H1.5A1.5 1.5 0 0 0 0 9.5v2A1.5 1.5 0 0 0 1.5 13H2a.5.5 0 0 0 .5.5h2A.5.5 0 0 0 5 13h6a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5h.5a1.5 1.5 0 0 0 1.5-1.5v-2A1.5 1.5 0 0 0 14.5 8h-2.306l1.78-5.342a.5.5 0 1 0-.948-.316L11.14 8H4.86L2.974 2.342ZM14.5 9a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h13Z'/>
                        <path d='M8.5 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z'/>
                    </svg>
                    <span class='newService-item-header-title'>سرویس $name_S زمان $time_S روز</span>
                </div>
                <hr>
                <div class='newService-info'>
                    <span class='newService-info-type'>نوع سرویس : $protocol</span>
                    <span class='newService-info-time'>زمان سرویس : $time_S روزه</span>
                    <span class='newService-info-value'>حجم : $hajm_S</span>
                    <span class='newService-info-region'>کشور : $contry_S<img src='./../assets/flags/fr.png'></span>
                    <span class='newService-info-price'>قیمت : $coin_S</span>
                </div>
                <div class='newServiceGet'>
                    <form id='newService-form'>
                        <input style='display: none;' id='newServiceId' type='text' name='newServiceName' value='$name_S'>
                        <input type='submit' value='خرید' class='newServiceGet-btn'>
                    </form>
                </div>
            </div>";
}
    
}
else {
    echo('<div id="no-service-text">
    <img src="./../assets/img/404.png">
    <div>سرویسی برای نمایش وجود ندارد</div>
    </div>');
}

                    ?>
        </div>
    </section>
    
    
    <section id="section-payment">
        <div id="payment-container">
            <form id="payment-form" method="post" action="./pay.php">
                <div id="payment-title">افزایش موجودی</div>
                <br>
                <input id="payment-input" type="number" name="balance" placeholder="افزایش موجودی">
                <br>
                <input id="payment-submit" type="submit" value="ارسال">
            </form>
        </div>
    </section>
    
   

<!-- JS -->
<script defer>
    // DOM Import Sidebar
    const sidebar_myServices = document.getElementById('sidebar-myServices');
    const sidebar_newService = document.getElementById('sidebar-newService');
    const sidebar_balance = document.getElementById('sidebar-addrbalance');
    const sidebar_logout = document.getElementById('sidebar-logout');

    // DOM Import Sections
    const section_myServices = document.getElementById('section-myServices');
    const section_newService = document.getElementById('section-newService');
    const section_payment = document.getElementById('section-payment');

    section_newService.style.display = 'none';
    section_payment.style.display = 'none';

    // Event Listeners 
    sidebar_myServices.addEventListener('click', function() {
        section_myServices.style.display = 'block';
        section_newService.style.display = 'none';
        section_payment.style.display = 'none';
        sidebar_myServices.classList.add("sidebar-item-active");
        sidebar_newService.classList.remove("sidebar-item-active");
        sidebar_balance.classList.remove("sidebar-item-active");
    });
    sidebar_newService.addEventListener('click', function() {
        section_myServices.style.display = 'none';
        section_payment.style.display = 'none';
        section_newService.style.display = 'block';
        sidebar_myServices.classList.remove("sidebar-item-active");
        sidebar_balance.classList.remove("sidebar-item-active");
        sidebar_newService.classList.add("sidebar-item-active");
    });
    sidebar_balance.addEventListener('click', function() {
        section_myServices.style.display = 'none';
        section_payment.style.display = 'block';
        section_newService.style.display = 'none';
        sidebar_myServices.classList.remove("sidebar-item-active");
        sidebar_balance.classList.add("sidebar-item-active");
        sidebar_newService.classList.remove("sidebar-item-active");
    });
</script>
<script defer src="./../jquery/jquery-3.6.4.min.js"></script>
<script defer src="./serviceAddr.js"></script>
<!--<script defer src="./ajax.js"></script>-->
</body>
</html>