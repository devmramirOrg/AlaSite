
<?php

session_start();
include("config.php");

include("./config.php");
    
$sqluser    = "SELECT * FROM `config`";
$resultuser = mysqli_query($conn,$sqluser);
        
$resuser    = mysqli_fetch_assoc($resultuser);
$nameSite   = $resuser['appName'];
$caption    = $resuser['caption'];
$instagram  = $resuser['instagram'];
$telegram   = $resuser['telegram'];
$seo        = $resuser['seo'];
$walet      = $resuser['zarinpal'];
$apptitle   = $resuser['title'];

$sql    = "SELECT * FROM `products`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_num_rows($result);

$sqlF    = "SELECT * FROM `pays`";
$resultF = mysqli_query($conn,$sqlF);
$resF    = mysqli_num_rows($resultF);

$sqlF2    = "SELECT * FROM `users`";
$resultF2 = mysqli_query($conn,$sqlF2);
$resF2    = mysqli_num_rows($resultF2);

    
$sql_admin2    = "SELECT GROUP_CONCAT(balance SEPARATOR ', ') FROM `users`";
$result_admin2 = mysqli_query($conn,$sql_admin2);
$res_admin2 = mysqli_fetch_assoc($result_admin2);

$balance_res = $res_admin2 ["GROUP_CONCAT(balance SEPARATOR ', ')"];

$balance_seperated = explode(",", $balance_res);
$balance_total = 0;
foreach($balance_seperated as $blnc) {
    $balance_total += $blnc;
}


?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Vazirmatn">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./scm.css">
</head>
<body>
    <header>
        <div id="header-col-info">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cloud-fog2-fill" viewBox="0 0 16 16">
                <path d="M8.5 3a5.001 5.001 0 0 1 4.905 4.027A3 3 0 0 1 13 13h-1.5a.5.5 0 0 0 0-1H1.05a3.51 3.51 0 0 1-.713-1H9.5a.5.5 0 0 0 0-1H.035a3.53 3.53 0 0 1 0-1H7.5a.5.5 0 0 0 0-1H.337a3.5 3.5 0 0 1 3.57-1.977A5.001 5.001 0 0 1 8.5 3z"/>
            </svg>
            <span><?php echo $nameSite;?></span>
        </div>
        <div id="header-col-auth">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
            </svg>
            <span id="header-login">ورود به حساب کاربری</span>
        </div>
    </header>
    <section id="section-top">
        <div id="section-top-container">
            <div id="section-top-box">
                <span><?php echo $caption;?></span>
                <img src="./assets/img/vector.png">
            </div>
            <div id="section-top-btn">
                <div>مشاهده فروشگاه</div>
            </div>
            <section id="section-flex-box">
                <div id="flex-box-container">
                    <div class="flex-box">
                        <img src="./assets/img/category-icon-1.png">
                        <span>ربات تلگرام</span>
                    </div>
                    <div class="flex-box">
                        <img src="./assets/img/category-icon-2.png">
                        <span>قالب سایت</span>
                    </div>
                    <div class="flex-box">
                        <img src="./assets/img/category-icon-4.png">
                        <span>اسکریپت</span>
                    </div>
                    <div class="flex-box">
                        <img src="./assets/img/category-icon-6.png">
                        <span>اپلیکیشن</span>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <section id="section-products">
        <div id="products-container">
            <div>
                <img src="./assets/img/tmp.jpg">
                <span>نام محصول</span>
                <div>مشاهده محصول</div>
            </div>
            <div>
                <img src="./assets/img/tmp.jpg">
                <span>نام محصول</span>
                <div>مشاهده محصول</div>
            </div>
            <div>
                <img src="./assets/img/tmp.jpg">
                <span>نام محصول</span>
                <div>مشاهده محصول</div>
            </div>
            <div>
                <img src="./assets/img/tmp.jpg">
                <span>نام محصول</span>
                <div>مشاهده محصول</div>
            </div>
        </div>
    </section>

    <section id="section-info-box">
        <div id="info-box-container">
            <div class="info-box">
                <div><?php echo $res;?></div>
                <span>محصول</span>
            </div>
            <div class="info-box">
                <div><?php echo $resF;?></div>
                <span>فروش موفق</span>
            </div>
            <div class="info-box">
                <div><?php echo $resF2;?></div>
                <span>کاربر</span>
            </div>
        </div>
    </section>
    <!-- <section id="section-sidebox">
        <div id="sidebox-container">
            <form id="sidebox-form">
                <div id="sidebox-title">ورود به حساب کاربری</div>
                <input class="sidebox-input" type="email" placeholder="ایمیل">
                <input class="sidebox-input" type="password" placeholder="رمز عبور">
                <span>
                    <span>حساب ندارید؟ ثبت نام کنید.</span>
                    <input id="sidebox-submit" type="submit" value="ذخیره">
                </span>
            </form>
        </div>
    </section> -->
    <footer>
        <div id="footer-col-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
            </svg>
            <span>تلگرام</span>
        </div>
        <div id="footer-col-2">
            <img src="./assets/img/zarinpal.png">
        </div>
    </footer>


<script>
    const header_login = document.getElementById('header-login');
    
    header_login.addEventListener('click', function() {
        window.location.href = "./login.php";
    });
</script>
</body>
</html>