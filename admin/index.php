<?php

session_start();
include("config.php");
include("./../scratch.php");
if (isset($_SESSION['admin']) and $_SESSION['admin'] == $user) {
    
    
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
$zarinpal   = $resuser['zarinpal'];
$alert      = $resuser['alert'];
$showAlert  = $resuser['alertShow'];

$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_num_rows($result);

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
    <link rel="stylesheet" href="./resp.css">
</head>
<body>
    <!-- header -->
    <header>
        <div id="header-banner">
            <img id="header-logo" src="./../assets/img/logo.svg">
            <span id="header-title"><?php 
            echo $nameSite;
            ?></span>
        </div>
    </header>
    
    <!-- SECTION ALERTBOX -->
    <section id="section-alertbox">
        <div id="alertbox-container">
            <svg id="alertbox-close" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
            </svg>
            <div id="alertbox-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
                <span>اطلاعیه مهم:</span>
            </div>
            <span>نسخه دوم سایت AlaVPN در دسترس قرار گرفت. (مشاهده و دانلود)</span>
        </div>
    </section>
    
    <!-- sidebar -->
    <section id="section-sidebar">
        <div id="sidebar-container">
            <div class="sidebar-item sidebar-item-active" id="sidebar-analytics">
                <svg class="sidebar-item-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                    <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z"/>
                </svg>
                <span class="sidebar-item-title">آمار سایت</span>
            </div>
            <div class="sidebar-item" id="sidebar-serviceManager">
                <svg class="sidebar-item-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cloud-fog2-fill" viewBox="0 0 16 16">
                    <path d="M8.5 3a5.001 5.001 0 0 1 4.905 4.027A3 3 0 0 1 13 13h-1.5a.5.5 0 0 0 0-1H1.05a3.51 3.51 0 0 1-.713-1H9.5a.5.5 0 0 0 0-1H.035a3.53 3.53 0 0 1 0-1H7.5a.5.5 0 0 0 0-1H.337a3.5 3.5 0 0 1 3.57-1.977A5.001 5.001 0 0 1 8.5 3z"/>
                </svg>
                <span class="sidebar-item-title">مدیریت سرویس</span>
            </div>
            <div class="sidebar-item" id="sidebar-userManager">
                <svg class="sidebar-item-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                </svg>
                <span class="sidebar-item-title">مدیریت کاربران</span>
            </div>
            <a target="_blank" href="https://app.crisp.chat/">
            <div class="sidebar-item" id="sidebar-ticket">
                <svg class="sidebar-item-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat-right-text-fill" viewBox="0 0 16 16">
                    <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM3.5 3h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z"/>
                </svg>
                <span class="sidebar-item-title">تیکت ها</span>
            </div>
            </a>
            <div class="sidebar-item" id="sidebar-alert">
                <svg class="sidebar-item-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg>
                <span class="sidebar-item-title">اطلاع رسانی</span>
            </div>
            <div class="sidebar-item" id="sidebar-themes">
                <svg class="sidebar-item-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" focusable="false">
                    <path fill="currentColor" d="M6 9H1a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1zm0 7H1a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1zm9-10h-5a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1zm0 10h-5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1z"></path>
                </svg>
                <span class="sidebar-item-title">تم ها</span>
            </div>
            <div class="sidebar-item" id="sidebar-settings">
                <svg class="sidebar-item-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                </svg>
                <span class="sidebar-item-title">تنظیمات</span>
            </div>
            <div class="sidebar-item" id="sidebar-logout">
                <svg class="sidebar-item-icon" id="account-option-logout" xmlns="http://www.w3.org/2000/svg" fill="#f44336" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
                <span id="sidebar-logout" class="sidebar-item-title">خروج از سیستم</span>
            </div>
        </div>
    </section>
    
    <!-- analytics -->
    <section id="section-analytics">
        <!-- analytics - cards -->
        <div id="analytics-container">
            <div class="analytic-card-container">
                <div class="analytic-card-item">
                    <div class="analytic-card-icon-box">
                        <svg class="analytic-card-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                        </svg>
                    </div>
                    <span class="analytic-card-title">تعداد کاربران</span>
                    <br>
                    <span class="analytic-card-value"><?php echo $res; ?></span>
                </div>
                <div class="analytic-card-item">
                    <div class="analytic-card-icon-box">
                        <svg class="analytic-card-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                            <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
                        </svg>
                    </div>
                    <span class="analytic-card-title">موجودی کل کاربران</span>
                    <br>
                    <span class="analytic-card-value"><?php echo "$balance_total تومان"; ?></span>
                </div>
                <div class="analytic-card-item">
                    <div class="analytic-card-icon-box">
                        <svg class="analytic-card-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                        </svg>
                    </div>
                    <span class="analytic-card-title">مقدار کل فروش</span>
                    <br>
                    <span class="analytic-card-value"><?php echo $resF; ?></span>
                </div>
                <div class="analytic-card-item">
                    <div class="analytic-card-icon-box">
                        <svg class="analytic-card-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-hdd-stack" viewBox="0 0 16 16">
                            <path d="M14 10a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h12zM2 9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2z"/>
                            <path d="M5 11.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM14 3a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                            <path d="M5 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                        </svg>
                    </div>
                    <span class="analytic-card-title">سرویس های فعال</span>
                    <br>
                    <span class="analytic-card-value"><?php echo $resFA; ?></span>
                </div>
            </div>
            <!-- <div class="analytic-card-container">
                <div class="analytic-card-item">
                    <svg class="analytic-card-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                    <span class="analytic-card-title">تیکت ها</span>
a                    <br>
                    <span class="analytic-card-value">10,000</span>
                </div>
                <div class="analytic-card-item">
                    <svg class="analytic-card-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                      </svg>
                    <span class="analytic-card-title">خرید های این هفته</span>
                    <br>
                    <span class="analytic-card-value">1,000 تومان</span>
                </div>
                <div class="analytic-card-item">
                    <svg class="analytic-card-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                        <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                    </svg>
                    <span class="analytic-card-title">بار</span>
                    <br>
                    <span class="analytic-card-value">1,000 تومان</span>
                </div>
                <div class="analytic-card-item">
                    <svg class="analytic-card-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-hdd-stack" viewBox="0 0 16 16">
                        <path d="M14 10a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h12zM2 9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2z"/>
                        <path d="M5 11.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM14 3a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                        <path d="M5 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                    </svg>
                    <span class="analytic-card-title">سرویس های فعال</span>
                    <br>
                    <span class="analytic-card-value">1,000</span>
                </div>
            </div> -->
            <!-- analytics - chart -->
            <div id="analytics-chart">
                <div id="chart-header">
                    <div id="chart-header-name">آمار فروش</div>
                    <div id="chart-header-percent">67%</div>
                    <div id="chart-header-timePeriod">یک ماه گذشته</div>
                </div>
                <script src="https://www.amcharts.com/lib/3/amcharts.js?x"></script>
                <script src="https://www.amcharts.com/lib/3/serial.js?x"></script>
                <!--<script src="https://www.amcharts.com/lib/3/themes/dark.js"></script>-->
                <div id="chartdiv"></div>
                <script defer>
                            var chartData = [
                    {
                        "date": "2012-01-01",
                        "distance": 227,
                        "townName": "",
                        "townName2": "",
                        "townSize": 25,
                        "latitude": 40.71,
                        "duration": 408
                    },
                    {
                        "date": "2012-01-02",
                        "distance": 371,
                        "townName": "",
                        "townSize": 14,
                        "latitude": 38.89,
                        "duration": 482
                    },
                    {
                        "date": "2012-01-03",
                        "distance": 433,
                        "townName": "",
                        "townSize": 6,
                        "latitude": 34.22,
                        "duration": 562
                    },
                    {
                        "date": "2012-01-04",
                        "distance": 345,
                        "townName": "",
                        "townSize": 7,
                        "latitude": 30.35,
                        "duration": 379
                    },
                    {
                        "date": "2012-01-05",
                        "distance": 480,
                        "townName": "",
                        "townName2": "",
                        "townSize": 10,
                        "latitude": 25.83,
                        "duration": 501
                    },
                    {
                        "date": "2012-01-06",
                        "distance": 386,
                        "townName": "",
                        "townSize": 7,
                        "latitude": 30.46,
                        "duration": 443
                    },
                    {
                        "date": "2012-01-07",
                        "distance": 348,
                        "townName": "",
                        "townSize": 10,
                        "latitude": 29.94,
                        "duration": 405
                    },
                    {
                        "date": "2012-01-08",
                        "distance": 238,
                        "townName": "",
                        "townName2": "",
                        "townSize": 16,
                        "latitude": 29.76,
                        "duration": 309
                    },
                    {
                        "date": "2012-01-09",
                        "distance": 218,
                        "townName": "",
                        "townSize": 17,
                        "latitude": 32.8,
                        "duration": 287
                    },
                    {
                        "date": "2012-01-10",
                        "distance": 349,
                        "townName": "",
                        "townSize": 11,
                        "latitude": 35.49,
                        "duration": 485
                    },
                    {
                        "date": "2012-01-11",
                        "distance": 603,
                        "townName": "",
                        "townSize": 10,
                        "latitude": 39.1,
                        "duration": 890
                    },
                    {
                        "date": "2012-01-12",
                        "distance": 534,
                        "townName": "",
                        "townName2": "",
                        "townSize": 18,
                        "latitude": 39.74,
                        "duration": 810
                    },
                    {
                        "date": "2012-01-13",
                        "townName": "",
                        "townSize": 12,
                        "distance": 425,
                        "duration": 670,
                        "latitude": 40.75,
                        "alpha":0.4
                    },
                    {
                        "date": "2012-01-14",
                        "townName": "",
                        "townSize": 12,
                        "distance": 425,
                        "duration": 670,
                        "latitude": 40.75,
                        "alpha":0.4
                    },
                    {
                        "date": "2012-01-15",
                        "townName": "",
                        "townSize": 12,
                        "distance": 425,
                        "duration": 670,
                        "latitude": 40.75,
                        "alpha":0.4
                    },
                    {
                        "date": "2012-01-16",
                        "townName": "",
                        "townSize": 12,
                        "distance": 425,
                        "duration": 670,
                        "latitude": 40.75,
                        "alpha":0.4
                    },
                    {
                        "date": "2012-01-17",
                        "townName": "",
                        "townSize": 12,
                        "distance": 425,
                        "duration": 670,
                        "latitude": 40.75,
                        "alpha":0.4
                    },
                    {
                        "date": "2012-01-18",
                        "townName": "",
                        "townSize": 12,
                        "distance": 425,
                        "duration": 670,
                        "latitude": 40.75,
                        "alpha":0.4
                    },
                    /*{
                        "date": "2012-01-18",
                        "latitude": 36.1,
                        "townsize":
                        "duration": 470,
                        "townName": "",
                        "townName2": "",
                        "bulletClass": "lastBullet"
                    },*/
                    {
                        "date": "2012-01-15"
                    },
                    {
                        "date": "2012-01-16"
                    },
                    {
                        "date": "2012-01-17"
                    },
                    {
                        "date": "2012-01-18"
                    },
                    {
                        "date": "2012-01-19"
                    }
                ];
                var chart = AmCharts.makeChart("chartdiv", {
                type: "serial",
                theme: "light",
                dataDateFormat: "YYYY-MM-DD",
                dataProvider: chartData,
                
                addClassNames: true,
                startDuration: 1,
                color: "#6F6F6F",
                marginLeft: 0,
                
                categoryField: "date",
                categoryAxis: {
                    parseDates: true,
                    minPeriod: "DD",
                    autoGridCount: false,
                    gridCount: 50,
                    gridAlpha: 0.1,
                    gridColor: "#6F6F6F",
                    axisColor: "#555555",
                    dateFormats: [{
                        period: 'DD',
                        format: 'DD'
                    }, {
                        period: 'WW',
                        format: 'MMM DD'
                    }, {
                        period: 'MM',
                        format: 'MMM'
                    }, {
                        period: 'YYYY',
                        format: 'YYYY'
                    }]
                },
                
                valueAxes: [{
                    id: "a1",
                    title: "",
                    gridAlpha: 0,
                    axisAlpha: 0
                },{
                    id: "a2",
                    position: "right",
                    gridAlpha: 0,
                    axisAlpha: 0,
                    labelsEnabled: false
                },{
                    id: "a3",
                    title: "تومان",
                    position: "right",
                    gridAlpha: 0,
                    axisAlpha: 0,
                    inside: true,
                    duration: "mm",
                    durationUnits: {
                        DD: "d. ",
                        hh: "h ",
                        mm: "min",
                        ss: ""
                    }
                }],
                graphs: [{
                    id: "g1",
                    valueField:  "distance",
                    title:  "distance",
                    type:  "column",
                    fillAlphas:  0.9,
                    valueAxis:  "a1",
                    balloonText:  "[[value]] miles",
                    legendValueText:  "[[value]] mi",
                    legendPeriodValueText:  "total: [[value.sum]] mi",
                    lineColor:  "#1971EF",
                    //alphaField:  "alpha",
                },{
                    id: "g2",
                    valueField: "latitude",
                    classNameField: "bulletClass",
                    title: "latitude/city",
                    type: "line",
                    valueAxis: "a2",
                    lineColor: "transparent",
                    lineThickness: 1,
                    legendValueText: "[[description]]/[[value]]",
                    descriptionField: "townName",
                    bullet: "round",
                    bulletSizeField: "townSize",
                    bulletBorderColor: "transparent",
                    bulletBorderAlpha: 1,
                    bulletBorderThickness: 2,
                    bulletColor: "#7431F9",
                    labelText: "[[townName2]]",
                    labelPosition: "right",
                    balloonText: "latitude:[[value]]",
                    showBalloon: true,
                    animationPlayed: true,
                },{
                    id: "g3",
                    title: "duration",
                    valueField: "duration",
                    type: "line",
                    valueAxis: "a3",
                    lineColor: "transparent",
                    balloonText: "[[value]]",
                    lineThickness: 1,
                    legendValueText: "[[value]]",
                    bullet: "square",
                    bulletBorderColor: "#ff5755",
                    bulletBorderThickness: 1,
                    bulletBorderAlpha: 1,
                    dashLengthField: "dashLength",
                    animationPlayed: true
                }],
                
                chartCursor: {
                    zoomable: false,
                    categoryBalloonDateFormat: "DD",
                    cursorAlpha: 0,
                    valueBalloonsEnabled: false
                },
                legend: {
                    bulletType: "round",
                    equalWidths: false,
                    valueWidth: 120,
                    useGraphSettings: true,
                    color: "#FFFFFF"
                }
                });
                </script>																											
            </div>
        </div>
    </section>


    <!-- SECTION PANEL ADDR -->
    <section id="section-panel-addr">
        <div id="panel-addr-container">
            <div id="panel-addr-box">
                    <svg class="addr-close" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
                <div id="panel-addr-header">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-hdd-network-fill" viewBox="0 0 16 16">
                        <path d="M2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h5.5v3A1.5 1.5 0 0 0 6 11.5H.5a.5.5 0 0 0 0 1H6A1.5 1.5 0 0 0 7.5 14h1a1.5 1.5 0 0 0 1.5-1.5h5.5a.5.5 0 0 0 0-1H10A1.5 1.5 0 0 0 8.5 10V7H14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm.5 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1z"/>
                    </svg>
                    <span>افزودن پنل</span>
                    <hr>
                </div>
                <form id="panel-addr-form">
                    <div class="panel-addr-col">
                        <input type="text" name="panelIp" placeholder="IP" required>
                        <input type="text" name="panelPort" placeholder="PORT" required>
                    </div>
                    <div class="panel-addr-col">
                        <input type="text" name="panelUsername" placeholder="Username" required>
                        <input type="password" name="panelPassword" placeholder="Password" required>
                    </div>
                    <div id="panel-addr-submit-col">
                        <input type="submit" value="ذخیره">
                    </div>
                </form>
            </div>
        </div>
    </section>



    <!-- SECTION CATEGORY ADDR -->
    <!--
    <section id="section-category-addr">
        <div id="category-addr-container">
            <div id="category-addr-box">
                    <svg class="addr-close" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
                <div id="category-addr-header">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    <span>افزودن دسته بندی سرویس</span>
                    <hr>
                </div>
                <form id="category-addr-form">
                    <div id="category-addr-col">
                        <input type="text" name="categoryName" placeholder="نام دسته بندی">
                        <input type="text" name="categoryCaption" placeholder="توضیحات">
                        <select name="categoryRegion">
                            <option value="null">کشور</option>
                            <option value="fr">فرانسه <img src="./../assets/flags/fr.png"></option>
                            <option value="us">ایالات متحده</option>
                            <option value="uk">بریتانیا</option>
                            <option value="de">آلمان</option>
                            <option value="nl">هلند</option>
                            <option value="it">ایتالیا</option>
                            <option value="ir">ایران</option>
                            <option value="ru">روسیه</option>
                            <option value="ch">سویس</option>
                            <option value="cz">جمهوری چک</option>
                            <option value="pl">لهستان</option>
                            <option value="ua">اکراین</option>
                            <option value="se">سوئد</option>
                            <option value="ca">کانادا</option>
                            <option value="jp">ژاپن</option>
                            <option value="kr">کره جنوبی</option>
                            <option value="au">استرالیا</option>
                            <option value="ae">امارات متحده عربی</option>
                            <option value="tr">ترکیه</option>
                            <option value="etc">دیگر</option>
                        </select>
                    </div>
                    <div id="category-addr-sec-col">
                        <option>_init_</option>
                    </div>
                    <div id="category-addr-submit-col">
                        <input type="submit" value="ذخیره">
                    </div>
                </form>
            </div>
        </div>
    </section>
    -->
    
    <!-- SECTION SERVICE ADDR -->
    <section id="section-service-addr">
        <div id="service-addr-container">
            <div id="service-addr-box">
                    <svg class="addr-close" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
                <div id="service-addr-header">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0ZM8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z"/>
                        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Z"/>
                    </svg>
                    <span>افزودن سرویس</span>
                    <hr>
                </div>
                <form id="service-addr-form">
                    <div id="addr-top-col">
                        <input type="text" name="serviceName" placeholder="نام سرویس" required>
                        <input type="number" name="serviceValue" placeholder="حجم سرویس (GB)" required>
                        <input type="number" name="serviceTime" placeholder="زمان سرویس (روز)" required>
                    </div>
                    <div id="addr-sec-col">
                        <select name="serviceType" required>
                            <option value="vmess">نوع سرویس</option>
                            <option value="vmess">vmess</option>
                            <option value="vless">vless</option>
                        </select>
                        <select name="serviceRegion" required>
                            <option value="fr">کشور</option>
                            <option value="fr">فرانسه <img src="./../assets/flags/fr.png"></option>
                            <option value="us">ایالات متحده</option>
                            <option value="uk">بریتانیا</option>
                            <option value="de">آلمان</option>
                            <option value="nl">هلند</option>
                            <option value="it">ایتالیا</option>
                            <option value="ir">ایران</option>
                            <option value="ru">روسیه</option>
                            <option value="ch">سویس</option>
                            <option value="cz">جمهوری چک</option>
                            <option value="pl">لهستان</option>
                            <option value="ua">اکراین</option>
                            <option value="se">سوئد</option>
                            <option value="ca">کانادا</option>
                            <option value="jp">ژاپن</option>
                            <option value="kr">کره جنوبی</option>
                            <option value="au">استرالیا</option>
                            <option value="ae">امارات متحده عربی</option>
                            <option value="tr">ترکیه</option>
                            <option value="etc">دیگر</option>
                        </select>
                        <select name="servicePanel" required>
                            <?php 
$sqlUN    = "SELECT * FROM `panel`";
$resultUN = mysqli_query($conn,$sqlUN);
if($resultUN != NULL){
 while($row = mysqli_fetch_assoc($resultUN)){
        $ip      = $row['ip'];
echo "<option>$ip</option>";


}}else{
    echo('<div id="no-service-text">
    <img src="./../assets/img/404.png">
    <div>پنلی وجود ندارد.</div>
    </div>');
}
                            ?>
                        </select>
                    </div>
                    <div id="addr-third-col">
                        <input type="number" name="servicePrice" placeholder="قیمت سرویس (تومان)" required>
                    </div>
                    <div id="addr-ip-col">
                        <input type="text" name="serviceIp" placeholder="ایپی سرویس:" required>
                        <input type="number" name="servicePort" placeholder="پورت سرویس:" required>
                    </div>
                    <div id="addr-network-col">
                        <input id="serviceNetwork" type="text" name="serviceNetwork" placeholder="Service Network:">
                    </div>
                    <div id="addr-tls-col">
                        <label>
                            <input id="addr-tls" type="checkbox" name="tls">    
                            <span>TLS: </span>
                        </label>
                        <input id="tls-public" type="text" name="tlsPublic" value="null" placeholder="TLS Public" disabled>
                        <input id="tls-private" type="text" name="tlsPrivate" value="null" placeholder="TLS Private" disabled>
                    </div>
                    <div id="addr-requestHost-col">
                        <label>
                            <input id="requestHost" type="checkbox" name="requestHost">    
                            <span>Request Host: </span>
                        </label>
                        <input id="requestHostURI" type="text" name="requestHostURI" value="null" placeholder="Request Host URI" disabled>
                    </div>
                    <div id="addr-submit-col">
                        <input type="submit" value="ذخیره">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        const addr_requestHost = document.getElementById('requestHost');
        const requestHostURI =document.getElementById('requestHostURI');
        const addr_tls = document.getElementById('addr-tls');
        const tls_public = document.getElementById('tls-public');
        const tls_private = document.getElementById('tls-private');

        addr_requestHost.addEventListener('click', function() {
            if (requestHostURI.disabled = true) {
                requestHostURI.disabled = false;
            } else {
                requestHostURI.disabled = true;
            }
        });
        
        addr_tls.addEventListener('click', function() {
            if (tls_public.disabled == true) {
                tls_public.disabled = false;
                tls_private.disabled = false;
            } else {
                tls_public.disabled = true;
                tls_private.disabled = true;
                tls_public.value = null;
                tls_private.value = null;
                
            }
        });
    </script>














<!-- SECTION SERVICE edit -->
<section id="section-service-edit">
        <div id="service-edit-container">
            <div id="service-edit-box">
                    <svg class="addr-close" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
                <div id="service-edit-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0ZM8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z"/>
                        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Z"/>
                    </svg>
                    <span>تغییر سرویس</span>
                    <hr>
                </div>
                <form id="service-edit-form">
                    <div id="edit-top-col">
                        <input type="text" name="EditServiceName" placeholder="نام سرویس">
                        <input type="number" name="EditServiceValue" placeholder="حجم سرویس (GB)">
                        <input type="number" name="EditServiceTime" placeholder="زمان سرویس (روز)">
                    </div>
                    <div id="edit-sec-col">
                        <select name="EditServiceType">
                            <option value="null">نوع سرویس</option>
                            <option value="vmess">vmess</option>
                            <option value="vless">vless</option>
                        </select> 
                        <select name="EditServiceRegion">
                            <option value="null">کشور</option>
                            <option value="fr">فرانسه <img src="./../assets/flags/fr.png"></option>
                            <option value="us">ایالات متحده</option>
                            <option value="uk">بریتانیا</option>
                            <option value="de">آلمان</option>
                            <option value="nl">هلند</option>
                            <option value="it">ایتالیا</option>
                            <option value="ir">ایران</option>
                            <option value="ru">روسیه</option>
                            <option value="ch">سویس</option>
                            <option value="cz">جمهوری چک</option>
                            <option value="pl">لهستان</option>
                            <option value="ua">اکراین</option>
                            <option value="se">سوئد</option>
                            <option value="ca">کانادا</option>
                            <option value="jp">ژاپن</option>
                            <option value="kr">کره جنوبی</option>
                            <option value="au">استرالیا</option>
                            <option value="ae">امارات متحده عربی</option>
                            <option value="tr">ترکیه</option>
                            <option value="etc">دیگر</option>
                        </select>
                        <select>
                        </select>
                    </div>
                    <div id="edit-third-col">
                        <input type="number" name="EditServicePrice" placeholder="قیمت سرویس (تومان)">
                    </div>
                    <div id="edit-tls-col">
                        <label>
                            <input id="edit-tls" type="checkbox" name="tls">    
                            <span>TLS: </span>
                        </label>
                        <input id="edit-tls-public" type="text" name="editTlsPublic" placeholder="TLS Public" disabled>
                        <input id="edit-tls-private" type="text" name="editTlsPrivate" placeholder="TLS Private" disabled>
                    </div>
                    <div id="edit-requestHost-col">
                        <label>
                            <input id="editRequestHost" type="checkbox" name="editRequestHost">    
                            <span>Request Host: </span>
                        </label>
                        <input id="editRequestHostURI" type="text" name="editRequestHostURI" placeholder="Request Host URI" disabled>
                    </div>
                    <div id="edit-submit-col">
                        <input type="submit" value="ذخیره">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        const edit_requestHost = document.getElementById('editRequestHost');
        const edit_requestHostURI = document.getElementById('editrequestHostURI');
        const edit_tls = document.getElementById('edit-tls');
        const edit_tls_public = document.getElementById('edit-tls-public');
        const edit_tls_private = document.getElementById('edit-tls-private');

        edit_requestHost.addEventListener('click', function() {
            if (edit_requestHostURI.disabled = true) {
                edit_requestHostURI.disabled = false;
            } else {
                edit_requestHostURI.disabled = true;
            }
        });
        
        edit_tls.addEventListener('click', function() {
            if (edit_tls_public.disabled == true) {
                edit_tls_public.disabled = false;
                edit_tls_private.disabled = false;
            } else {
                edit_tls_public.disabled = true;
                edit_tls_private.disabled = true;   
            }
        });
    </script>


    <!-- services -->
    <section id="section-services">
        <div id="services-container">
            <div id="services-header">
            <div class="services-add" id="panel-add">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hdd-network-fill" viewBox="0 0 16 16">
                        <path d="M2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h5.5v3A1.5 1.5 0 0 0 6 11.5H.5a.5.5 0 0 0 0 1H6A1.5 1.5 0 0 0 7.5 14h1a1.5 1.5 0 0 0 1.5-1.5h5.5a.5.5 0 0 0 0-1H10A1.5 1.5 0 0 0 8.5 10V7H14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm.5 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1z"/>
                    </svg>
                    <span>افزودن پنل</span>
                </div>
                <!--
                <div class="services-add" id="category-add">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    <span>افزودن دسته بندی</span>
                </div>
                -->
                <div class="services-add" id="service-add">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>
                    <span>افزودن سرویس</span>
                </div>
            </div>
            <div id="services-body">
                <div class="services-category-container">
                    <div class="services-category">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <span>سرویس ها</span>
                    </div>
                    <div class="services-item">
                        <div class="service-item-info">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-database-fill-gear" viewBox="0 0 16 16">
                                <path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z"/>
                                <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Zm3.631-4.538c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                            </svg>
                            <span>نام سرویس toiuoiyutyrteryuiopiuytretyuiopityrertyuiokjhvcxolkmjnbvfy9oikjhbvcgytuijhbv</span>
                        </div>
                        <div class="service-item-price">
                            <span>20 تومان</span>
                        </div>
                        <svg class="service-item-edit" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        <svg class="service-item-delete" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                    </div>
                    <hr>
                    <div class="services-item">
                        <div class="service-item-info">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-database-fill-gear" viewBox="0 0 16 16">
                                <path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z"/>
                                <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Zm3.631-4.538c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                            </svg>
                            <span>نام سرویس</span>
                        </div>
                        <div class="service-item-price">
                            <span>20 تومان</span>
                        </div>
                        <svg class="service-item-edit" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        <svg class="service-item-delete" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                    </div>
                    <hr>
                    <div class="services-item">
                        <div class="service-item-info">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-database-fill-gear" viewBox="0 0 16 16">
                                <path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z"/>
                                <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Zm3.631-4.538c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                            </svg>
                            <span>نام سرویس</span>
                        </div>
                        <div class="service-item-price">
                            <span>20 تومان</span>
                        </div>
                        <svg class="service-item-edit" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        <svg class="service-item-delete" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                    </div>
                    <hr>
                    <div class="services-item">
                        <div class="service-item-info">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-database-fill-gear" viewBox="0 0 16 16">
                                <path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z"/>
                                <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Zm3.631-4.538c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                            </svg>
                            <span>نام سرویس toiuoiyutyrteryuiopiuytretyuiopityrertyuiokjhvcxolkmjnbvfy9oikjhbvcgytuijhbv</span>
                        </div>
                        <div class="service-item-price">
                            <span>20 تومان</span>
                        </div>
                        <svg class="service-item-edit" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        <svg class="service-item-delete" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                    </div>
                    <hr>
                    <div class="services-item">
                        <div class="service-item-info">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-database-fill-gear" viewBox="0 0 16 16">
                                <path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z"/>
                                <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Zm3.631-4.538c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                            </svg>
                            <span>نام سرویس toiuoiyutyrteryuiopiuytretyuiopityrertyuiokjhvcxolkmjnbvfy9oikjhbvcgytuijhbv</span>
                        </div>
                        <div class="service-item-price">
                            <span>20 تومان</span>
                        </div>
                        <svg class="service-item-edit" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        <svg class="service-item-delete" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </section>


    <!-- userManager -->
    <section id="section-userManager">
        <div id="userManager-container">
            <div id="userManager-box">
                <div id="userManager-topbar">
                    <input id="userManager-search" type="search" name="userManager-search" placeholder="جستجوی شناسه کاربری">
                    <!--<div id="userManager-topbar-rows">
                        <svg class="userManager-topbar-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                            <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                        </svg>
                        <span class="userManager-topbar-row">2</span>
                        <svg class="userManaegr-topbar-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                        </svg>
                    </div>-->
                </div>
                <div id="userManager-header">
                    <div id="userManager-header-item">شناسه کاربری</div>
                    <div id="userManager-header-item">موجودی</div>
                    <div id="userManager-header-item">وضعیت سرویس</div>
                    <div id="userManager-header-item">تنظیمات کاربر</div>
                </div>
                <div id="userManager-tab">
                    <?php
                    
$sqlUN    = "SELECT * FROM `users`";
$resultUN = mysqli_query($conn,$sqlUN);
 
 while($row = mysqli_fetch_assoc($resultUN)){
        $UserIdUn = $row['id'];
        $tronUn   = $row['balance'];
        $StatusUN = $row['ban'];
        if ($StatusUN == "active") {
            $StatusSHOW = "فعال";
        } else {
            $StatusSHOW = "غیرفعال";
        }
    echo "<div class='userManager-item'>
                        <div class='userManager-item-userid'>$UserIdUn</div>
                        <div class='userManager-item-balance'>$tronUn تومان</div>
                        <div class='userManager-item-status userManager-item-status-$StatusUN'>$StatusSHOW</div>
                        <a target='_blank' href='./userManager.php?id=$UserIdUn'>
                            <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-gear' viewBox='0 0 16 16'>
                                <path d='M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z'/>
                                <path d='M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z'/>
                            </svg>
                        </a>
                    </div>
                    <hr>";
}

                    ?>
                    <!--<div class="userManager-item">
                        <div class="userManager-item-userid">10204593</div>
                        <div class="userManager-item-balance">143 تومان</div>
                        <div class="userManager-item-status userManager-item-status-active">فعال</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                        </svg>
                    </div>
                    <hr>
                    <div class="userManager-item">
                        <div class="userManager-item-userid">10204593</div>
                        <div class="userManager-item-balance">143 تومان</div>
                        <div class="userManager-item-status userManager-item-status-active">فعال</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                        </svg>
                    </div>
                    <hr>
                    <div class="userManager-item">
                        <div class="userManager-item-userid">10204593</div>
                        <div class="userManager-item-balance">143 تومان</div>
                        <div class="userManager-item-status userManager-item-status-inactive">غیرفعال</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                        </svg>
                    </div>
                    <hr>
                    <div class="userManager-item">
                        <div class="userManager-item-userid">10204593</div>
                        <div class="userManager-item-balance">143 تومان</div>
                        <div class="userManager-item-status userManager-item-status-inactive">غیرفعال</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                        </svg>
                    </div>-->
                </div>
            </div>
        </div>
    </section>


    <!-- section - alert -->
    <section id="section-alert">
        <div id="alert-container">
            <!--<div id="alertbox-editbx">
                <span>کص ننه همه کاربرای جنده این سایت.</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </div>-->
            <div id="alert-box">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                      <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                    </svg>
                    <span>اطلاع رسانی</span>
                </div>
                <form id="alert-form">
                    <textarea id="alert-textarea" name="alert-data" cols="20" rows="10"><?php ?></textarea>
                    <br>
                    <div>
                        <?php 
                        

                        if ($showAlert == "on") {
                            echo("<div id='alert-delete'>
                            <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                              <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                            </svg>
                            <span>غیرفعال کردن اطلاع رسانی</span>
                        </div>");
                        } else {
                            echo("<div id='alert-activate'>
                            <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                              <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                            </svg>
                            <span>فعال کردن اطلاع رسانی</span>
                        </div>");
                        }
                        ?>
                        <input type="submit" value="ارسال">
                    </div>
                </form>
                <form id="alert-delete-form" style="display: none !important;">
                    <input id="alert-delete-input" name="alert-visability" value="true">
                    <input id="alert-delete-send">
                </form>
            </div>
        </div>
    </section>
    <script>
        const alert_delete = document.getElementById('alert-delete');
        const alert_delete_input = document.getElementById('alert-delete-input');
        const alert_delete_send = document.getElementById('alert-delete-send');
        const alert_textarea = document.getElementById('alert-textarea');
        
        alert_delete.addEventListener('click', function() {
            alert_textarea.InnerHTML = null;
            alert_delete_send.click();
        });
    </script>
    
    <!-- section - themes -->
    <section id="section-themes">
        <div id="themes-container">
            <img src="./../assets/img/404.png">
            <br>
            <div>قالبی برای نمایش وجود ندارد</div>
        </div>
    </section>

    <!-- section - settings -->
    <section id="section-settings">
        <div id="settings-container">
            <div id="settings-header">
                <div class="settings-header-item settings-header-item-active" id="settings-header-settings">تنظیمات سایت</div>
                <div class="settings-header-item" id="settings-header-payments">درگاه های پرداخت</div>
                <div class="settings-header-item" id="settings-header-services">سرویس ها</div>
                <div class="settings-header-item" id="settings-header-seo">سئو</div>
                <div class="settings-header-spc"></div>
                <div class="settings-header-spc"></div>
                <div class="settings-header-spc"></div>
            </div>
            <div id="settings-tab">
                <form id="settings-form">
                    <input class="settings-input" id="settings-appname" name="appname" type="text" placeholder="نام سایت">
                    <input class="settings-input" name="caption" type="text" placeholder="توضیحات">
                    <br>
                    <input class="settings-input" type="text" placeholder="">
                    <input class="settings-input" type="text">
                    <br>
                    <input class="settings-input" name="telegram" type="text" placeholder="ایدی تلگرام">
                    <input class="settings-input" name="instagram" type="text" placeholder="ایدی اینستاگرام">
                    <br>
                    <input id="settings-save" type="submit" value="ذخیره">
                </form>
                <div id="settings-sidebox">
                    <div class="settings-sidebox-item">
                        <div class="settings-sidebox-label">نام سایت</div>
                        <div id="sidebox-appname" class="settings-sidebox-content"><?php echo $nameSite; ?></div>
                    </div>
                    <hr>
                    <div class="settings-sidebox-item">
                        <div class="settings-sidebox-label">دامنه سایت</div>
                        <div class="settings-sidebox-content"><?php echo($_SERVER['HTTP_HOST']); ?></div>
                    </div>
                    <hr>
                    <div class="settings-sidebox-item">
                        <div class="settings-sidebox-label">ایپی سرور</div>
                        <div class="settings-sidebox-content"><?php echo($_SERVER['SERVER_ADDR']);
 ?></div>
                    </div>
                </div>
            </div>
            <div id="payments-tab">
                <div class="settings-services-item">
                    <div class="settings-services-item-header">
                        <img src="./../assets/img/zarinpal.png">
                        <div class="settings-services-item-dt">
                            <div class="settings-services-title">زرین پال</div>
                            <div class="settings-services-caption">افزونه درگاه پرداخت زرین پال (<a target="_blank" href="https://www.zarinpal.com/">https://zarinpal.com</a>)</div>
                        </div>
                    </div>
                    <div class="settings-services-item-body"  id="settings-services-item-body">
                        <form id="zarinpal-form">
                            <textarea name="zarinpal-token" cols="5" rows="10"><?php echo $zarinpal;?></textarea>
                            <input type="submit" value="ذخیره">
                        </form>
                    </div>
                </div>
                <!-- <div class="settings-services-item">
                    <div class="settings-services-item-header">
                        <img src="./../assets/img/nowpayments.png">
                        <div class="settings-services-item-dt">
                            <div class="settings-services-title">NowPayments</div>
                            <div class="settings-services-caption">افزونه درگاه پرداخت ارز دیجیتال (<a target="_blank" href="https://nowpayments.io">https://nowpayments.io</a>)</div>
                        </div>
                    </div>
                    <div class="settings-services-item-body"  id="settings-services-item-body">
                        <form id="nowpayments-script-form">
                            <textarea name="walet" type="text" cols="5" rows="10"><?php echo $walet; ?></textarea>
                            <input type="submit" value="ذخیره">
                        </form>
                    </div>
                </div> -->
            </div>
            <!-- -->
            <div id="settings-services-tab">
                <div class="settings-services-item">
                    <div class="settings-services-item-header">
                        <img src="https://image.crisp.chat/avatar/website/e7998c1f-86d7-438e-8de7-ecdd1e69fd72/144/?avatar=default">
                        <div class="settings-services-item-dt">
                            <div class="settings-services-title">CRISP</div>
                            <div class="settings-services-caption">افزونه پشتیبانی (<a target="_blank" href="https://crisp.chat">https://crisp.chat</a>)</div>
                        </div>
                    </div>
                    <div class="settings-services-item-body"  id="settings-services-item-body">
                        <form id="service-crisp-form">
                            <textarea name="crisp-script" cols="5" rows="10"><?php echo $crispSC; ?></textarea>
                            <input type="submit" value="ذخیره">
                        </form>
                    </div>
                </div>
            </div>
            <div id="seo-tab">
                <form id="seo-form">
                    <textarea name="seo-data" cols="30" rows="10"><?php echo $seo; ?></textarea>
                    <br>
                    <input type="submit" value="ذخیره">
                </form>
            </div>
        </div>
        <script>
            const settings_tab = document.getElementById('settings-tab');
            const payments_tab = document.getElementById('payments-tab');
            const settings_services_tab = document.getElementById('settings-services-tab');
            const seo_tab = document.getElementById('seo-tab');
            const settings_header_settigns = document.getElementById('settings-header-settings');
            const settings_header_payments = document.getElementById('settings-header-payments');
            const settings_header_services = document.getElementById('settings-header-services');
            const settings_header_seo = document.getElementById('settings-header-seo');

            settings_header_settigns.addEventListener('click', function() {
                settings_header_payments.classList.remove("settings-header-item-active");
                settings_header_services.classList.remove("settings-header-item-active");
                settings_header_seo.classList.remove("settings-header-item-active");
                settings_header_settigns.classList.add("settings-header-item-active");
                payments_tab.style.display = 'none';
                settings_services_tab.style.display = 'none';
                seo_tab.style.display = 'none';
                settings_tab.style.display = 'flex';
            });
            settings_header_payments.addEventListener('click', function() {
                settings_header_settigns.classList.remove("settings-header-item-active");
                settings_header_services.classList.remove("settings-header-item-active");
                settings_header_seo.classList.remove("settings-header-item-active");
                settings_header_payments.classList.add("settings-header-item-active");
                settings_tab.style.display = 'none';
                settings_services_tab.style.display = 'none';
                seo_tab.style.display = 'none';
                payments_tab.style.display = 'block';
            });
            settings_header_seo.addEventListener('click', function() {
                settings_header_payments.classList.remove("settings-header-item-active");
                settings_header_services.classList.remove("settings-header-item-active");
                settings_header_settigns.classList.remove("settings-header-item-active");
                settings_header_seo.classList.add("settings-header-item-active");
                settings_tab.style.display = 'none';
                payments_tab.style.display = 'none';
                settings_services_tab.style.display = 'none';
                seo_tab.style.display = 'block';
            });
            settings_header_services.addEventListener('click', function() {
                settings_header_settigns.classList.remove("settings-header-item-active");
                settings_header_payments.classList.remove("settings-header-item-active");
                settings_header_seo.classList.remove("settings-header-item-active");
                settings_header_services.classList.add("settings-header-item-active");
                settings_tab.style.display = 'none';
                payments_tab.style.display = 'none';
                seo_tab.style.display = 'none';
                settings_services_tab.style.display = 'block';
            });
        </script>
    </section>



<script>
    const as_settings_save = document.getElementById('settings-save');
    const as_settings_appname = document.getElementById('settings-appname');
    const as_sidebox_appname = document.getElementById('sidebox-appname');
    const as_header_title = document.getElementById('header-title');
    
    as_settings_save.addEventListener('click', function() {
        if (as_settings_appname.value != null && as_settings_appname.value != '') {
            as_data_new = as_settings_appname.value;
            as_header_title.innerHTML = as_data_new;
            as_sidebox_appname.innerHTML = as_data_new;
        }
    });
</script>



<!-- JS -->
<script defer>
    // DOM Import Sidebar
    const sidebar_analytics = document.getElementById('sidebar-analytics');
    const sidebar_userManager = document.getElementById('sidebar-userManager');
    const sidebar_serviceManager = document.getElementById('sidebar-serviceManager');
    const sidebar_ticket = document.getElementById('sidebar-ticket');
    const sidebar_alert = document.getElementById('sidebar-alert');
    const sidebar_themes = document.getElementById('sidebar-themes');
    const sidebar_settings = document.getElementById('sidebar-settings');
    const sidebar_logout = document.getElementById('sidebar-logout');

    // DOM Import Sections
    const section_analytics = document.getElementById('section-analytics');
    const section_services = document.getElementById('section-services');
    const section_userManger = document.getElementById('section-userManager');
    const section_alert = document.getElementById('section-alert');
    const section_themes = document.getElementById("section-themes");
    const section_settings = document.getElementById('section-settings');
    const section_alertbox = document.getElementById('section-alertbox');

    // TEMPORARY
    section_analytics.style.display = 'block';
    section_services.style.display = 'none';
    section_userManger.style.display = 'none';
    section_alert.style.display = 'none';
    section_themes.style.display = 'none';
    section_settings.style.display = 'none';


    // SECTION SERVICES
    const section_panel_addr =document.getElementById('section-panel-addr');
    const panel_addr = document.getElementById('panel-add');
    panel_addr.addEventListener('click', function() {
        section_panel_addr.style.display = "flex";
    });

    //const section_category_addr = document.getElementById('section-category-addr');
    //const category_addr = document.getElementById('category-add');
    //category_addr.addEventListener('click', function() {
    //    section_category_addr.style.display = "flex";
    //});
        
    const section_service_addr =document.getElementById('section-service-addr');
    const service_addr = document.getElementById('service-add');
    service_addr.addEventListener('click', function() {
        section_service_addr.style.display = "flex";
    });


    const section_service_edit = document.getElementById('section-service-edit');

    if (typeof document.getElementsByClassName('service-item-edit') !== 'undefined') {
        const service_edit = document.getElementsByClassName('service-item-edit');
        const service_edit_qs = document.querySelectorAll('.service-item-edit');
        for(var i=0; i < service_edit_qs.length; i++) {
            service_edit[i].addEventListener('click', function() {
                section_service_edit.style.display = 'flex';
            });
        }
    }
    /*if (typeof document.getElementsByClassName('service-item-delete') !== 'undefined') {
        const service_delete = document.getElementsByClassName('service-item-delete');
        const service_delete_qs = document.querySelectorAll('.service-item-delete');
        for(var i=0; i < service_delete_qs.length; i++) {
            service_delete[i].addEventListener('click', function() {
                section_delete_edit.style.display = 'flex';
            });
        }
    }*/


    const addr_close = document.getElementsByClassName('addr-close');
    const addr_close_qs = document.querySelectorAll('.addr-close');

    for (var i=0; i < addr_close_qs.length; i++) {
        addr_close[i].addEventListener('click', function() {
            section_service_addr.style.display = 'none';
            //section_category_addr.style.display = 'none';
            section_panel_addr.style.display = 'none';
            section_service_edit.style.display = 'none';
        });
    }


    // Sidebar Event Listeners
    sidebar_analytics.addEventListener('click', function() {
        section_userManger.style.display = 'none';
        section_services.style.display = 'none';
        section_alert.style.display = 'none';
        section_themes.style.display = 'none';
        section_settings.style.display = 'none';
        section_analytics.style.display = 'block';
        section_alertbox.style.display = 'block';
        sidebar_userManager.classList.remove("sidebar-item-active");
        sidebar_serviceManager.classList.remove("sidebar-item-active");
        sidebar_alert.classList.remove("sidebar-item-active");
        sidebar_themes.classList.remove("sidebar-item-active");
        sidebar_settings.classList.remove("sidebar-item-active");
        sidebar_analytics.classList.add("sidebar-item-active");
    });
    sidebar_serviceManager.addEventListener('click', function() {
        section_analytics.style.display = 'none';
        section_userManger.style.display = 'none';
        section_alert.style.display = 'none';
        section_themes.style.display = 'none';
        section_settings.style.display = 'none';
        section_alertbox.style.display = 'none';
        section_services.style.display = 'block'
        sidebar_analytics.classList.remove("sidebar-item-active");
        sidebar_userManager.classList.remove("sidebar-item-active");
        sidebar_alert.classList.remove("sidebar-item-active");
        sidebar_themes.classList.remove("sidebar-item-active");
        sidebar_settings.classList.remove("sidebar-item-active");
        sidebar_serviceManager.classList.add("sidebar-item-active");
    });
    sidebar_userManager.addEventListener('click', function() {
        section_analytics.style.display = 'none';
        section_services.style.display = 'none';
        section_alert.style.display = 'none';
        section_themes.style.display = 'none';
        section_settings.style.display = 'none';
        section_alertbox.style.display = 'none';
        section_userManger.style.display = 'block';
        sidebar_analytics.classList.remove("sidebar-item-active");
        sidebar_serviceManager.classList.remove("sidebar-item-active");
        sidebar_alert.classList.remove("sidebar-item-active");
        sidebar_themes.classList.remove("sidebar-item-active");
        sidebar_settings.classList.remove("sidebar-item-active");
        sidebar_userManager.classList.add("sidebar-item-active");
    });
    sidebar_alert.addEventListener('click', function() {
        section_analytics.style.display = 'none';
        section_services.style.display = 'none';
        section_userManger.style.display = 'none';
        section_themes.style.display = 'none';
        section_settings.style.display = 'none';
        section_alert.style.display = 'block';
        section_alertbox.style.display = 'none';
        sidebar_analytics.classList.remove("sidebar-item-active");
        sidebar_serviceManager.classList.remove("sidebar-item-active");
        sidebar_userManager.classList.remove("sidebar-item-active");
        sidebar_themes.classList.remove("sidebar-item-active");
        sidebar_settings.classList.remove("sidebar-item-active");
        sidebar_alert.classList.add("sidebar-item-active");
    });
    sidebar_themes.addEventListener('click', function() {
        section_analytics.style.display = 'none';
        section_services.style.display = 'none';
        section_userManger.style.display = 'none';
        section_alert.style.display = 'none';
        section_settings.style.display = 'none';
        section_alertbox.style.display = 'none';
        section_themes.style.display = 'block';
        sidebar_analytics.classList.remove("sidebar-item-active");
        sidebar_serviceManager.classList.remove("sidebar-item-active");
        sidebar_userManager.classList.remove("sidebar-item-active");
        sidebar_alert.classList.remove("sidebar-item-active");
        sidebar_settings.classList.remove("sidebar-item-active");
        sidebar_themes.classList.add("sidebar-item-active");
    });
    sidebar_settings.addEventListener('click', function() {
        section_analytics.style.display = 'none';
        section_services.style.display = 'none';
        section_userManger.style.display = 'none';
        section_alert.style.display = 'none';
        section_themes.style.display = 'none';
        section_alertbox.style.display = 'none';
        section_settings.style.display = 'block';
        sidebar_analytics.classList.remove("sidebar-item-active");
        sidebar_serviceManager.classList.remove("sidebar-item-active");
        sidebar_userManager.classList.remove("sidebar-item-active");
        sidebar_alert.classList.remove("sidebar-item-active");
        sidebar_themes.classList.remove("sidebar-item-active");
        sidebar_settings.classList.add("sidebar-item-active");
    });
    document.body.onkeyup = function(e) {
        if(e.keyCode === 27) {
            section_service_addr.style.display = 'none';
            //section_category_addr.style.display = 'none';
            section_panel_addr.style.display = 'none';
            section_service_edit.style.display = 'none';
        }
    };
</script>
<script src="./../jquery/jquery-3.6.4.min.js"></script>
<script defer src="./ajax.js"></script>
</body>
</html>