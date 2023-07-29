<?php

session_start();
include("config.php");

if (isset($_SESSION['admin']) and $_SESSION['admin'] == $user) {
    include("./../scratch.php");
    
if(isset($_GET['id']) and !is_null($_GET['id']) and $_GET['id'] != '' and $_GET['id'] != null){
    

$id         = $_GET['id'];

$sql     = "SELECT * FROM `users` WHERE `id`='$id'";
$result  = mysqli_query($conn,$sql);
$res     = mysqli_fetch_assoc($result);
$balance = $res['balance'];
$active  = $res['ban'];
    
}else{
    header("Location: ./index.php");
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
    <style>
        *, body {
            margin: 0;
            font-size: 1vw;
        }
        body {
            background: #fff;
            color: #222222;
        }
        header {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row-reverse;
            background: #EFEEE5;
            width: 100%;
            height: 4em;
            position: fixed;
            top: 0;
        }
        #header-title {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row-reverse;
            width: max-content;
            height: 3.5em;
        }
        #header-title > svg {
            width: 3em;
            height: 3em;
            margin: .5em 1em .5em .5em;
            color: #444;
        }
        #header-title > span {
            font-size: 1.5em;
            font-family: "Vazirmatn";
            font-weight: 900;
            margin-top: .5em;
            color: #333;
        }
        #main {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row-reverse;
            justify-content: space-between;
            width: 100%;
            height: 100%;
            margin-top: 4em;
        }

        /* services */
        #main-services {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            justify-content: top;
            width: 40%;
            margin: 3em 5% 1em 5%;
            box-shadow: rgba(0, 0, 0, .25) 0 0 .5vw;
            border-radius: .3em;
        }
        #main-services > span {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: center;
            width: 100%;
            height: 2em;
            background: #E8E8E8;
        }
        #main-services > span > svg {
            width: 1.5em;
            height: 1.5em;
            margin: .25em;
        }
        #main-services > span > span {
            font-size: 1vw;
            font-family: "Vazirmatn";
            font-weight: 900;
        }
        #main-services > div {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row-reverse;
            justify-content: space-around;
            width: 100%;
            height: max-content;
            padding: .5vw 0 .5vw 0;
        }
        #main-services > div > div {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row-reverse;
        }
        #main-services > div > div > span {
            font-size: 1.15vw;
            font-family: "Vazirmatn";
            direction: rtl;
            margin-right: .5vw;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: min-content;
            margin-top: .15vw;
        }
        #main-services > div > div > svg {
            width: 2vw;
            height: 2vw;
        }
        #main-services > div > svg {
            width: 1.5vw;
            height: 1.5vw;
            padding: .35vw;
            color: #e42154;
            border-radius: .5vw;
            cursor: pointer;
        }
        #main-services > div > svg:hover {
            background: rgba(228,33,84,.08);
        }
        #main-services > div > span {
            font-size: 1vw;
            font-family: "Vazirmatn";
            font-weight: 900;
            padding: .25vw .75vw .25vw .75vw;
            border-radius: .5vw;
        }
        .service-active {
            color: #0dbf66;
            background: rgba(13,191,102,.08);
        }
        .service-inactive {
            color: #e42154;
            background: rgba(228,33,84,.08);
        }
        #main-services > hr {
            width: 95%;
            margin: .1em 2.5% .1em 2.5%;
            color: #222;
            opacity: 70%;
        }
        #main-services-bg {
            background: #F8F8F8;
            min-height: 25em;
            opacity: 50%;
        }
        #main-services-bg > span {
            font-size: 1.5vw;
            font-family: "Vazirmatn";
            font-weight: 900;
            margin-top: 10em;
        }

        /* info */
        #main-info {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            justify-content: center;
            width: 40%;
            height: min-content;
            margin: 3em 5% 1em 5%;
            box-shadow: rgba(0, 0, 0, .25) 0 0 .5vw;
            border-radius: .3em;
        }
        #main-info-header {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: center;
            width: 100%;
            height: 2em;
            background: #E8E8E8;
            font-size: 1vw;
            font-family: "Vazirmatn";
            font-weight: 900;
        }
        #main-info-id {
            display: flex;
            width: 70%;
            height: 2em;
            font-size: 1.5vw;
            font-family: monospace;
            padding: .5em 5% .5em 5%;
            margin: .5vw 15% .5vw 15%;
            direction: ltr;
            text-align: center;
            border: solid #444 1px;
            border-radius: .75vw;
            background-image: url(./../assets/img/fingerprint.svg);
            background-repeat: no-repeat;
            background-size: 2vw;
            background-position: 1vw;
        }
        #main-info-balance {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row-reverse;
            width: 60%;
            height: 2vw;
            font-size: 1.5vw;
            font-family: monospace;
            padding: .35vw 5% .35vw 5%;
            margin: .5vw 15% .5vw 15%;
            direction: ltr;
            text-align: center;
            border: solid #444 1px;
            border-radius: .75vw;
        }
        #main-info-balance > svg {
            width: 2em;
            height: 2em;
            color: #444;
        }
        #main-info-balance > span {
            font-size: 1.25vw;
            font-family: "Vazirmatn";
            font-weight: 900;
            direction: rtl;
            margin-right: 1em;
        }
        #user-info-form {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            height: min-content;
        }
        #blnc-change-label {
            font-size: 1em;
            font-family: "Vazirmatn";
            width: 85%;
            margin-right: 15%;
            direction: rtl;
        }
        #blnc-change {
            display: flex;
            width: 70%;
            height: 2.5em;
            font-size: 1.25vw;
            font-family: "Vazirmatn";
            padding: .35vw 5% .35vw 5%;
            margin: .5vw 15% .5vw 15%;
            direction: ltr;
            text-align: center;
            border: solid #444 1px;
            border-radius: .75vw;
        }
        #user-info-form > span {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row-reverse;
            width: 70%;
            margin: .5vw 15% .5vw 15%;
        }
        #user-info-form > span > input {
            width: 1em;
            height: 1em;
            cursor: pointer;
        }
        #user-info-form > span > span {
            font-size: 1em;
            font-family: "Vazirmatn";
            margin-right: .5vw;
            margin-top: -.25vw;
        }
        #user-info-submit {
            display: flex;
            font-size: 1.25vw;
            font-family: "Vazirmatn";
            font-weight: 900;
            background: #2C6BED;
            color: #fff;
            padding: .35vw 1.5vw .35vw 1.5vw;
            border: none;
            border-radius: 2vw;
            cursor: pointer;
            width: max-content;
            height: min-content;
            margin: .5vw 40% 1.5vw 40%;
        }
    </style>
    <style>
        @media screen and (max-width: 600px) {
            header {
                display: flex;
                flex-wrap: wrap;
                flex-direction: row-reverse;
                background: #EFEEE5;
                width: 100%;
                height: 8em;
                position: fixed;
                top: 0;
            }
            #header-title {
                display: flex;
                flex-wrap: wrap;
                flex-direction: row-reverse;
                width: max-content;
                height: 8em;
            }
            #header-title > svg {
                width: 7em;
                height: 7em;
                margin: .5em 1em .5em .5em;
                color: #444;
            }
            #header-title > span {
                font-size: 3.5em;
                font-family: "Vazirmatn";
                font-weight: 900;
                margin-top: .5em;
                color: #333;
            }
            #main {
                display: flex;
                flex-wrap: wrap;
                flex-direction: row-reverse;
                justify-content: space-between;
                width: 100%;
                height: 100%;
                margin-top: 8em;
            }

            /* services */
            #main-services {
                display: flex;
                flex-wrap: wrap;
                flex-direction: column;
                justify-content: center;
                width: 95%;
                margin: 3em 2.5% 1em 2.5%;
                box-shadow: rgba(0, 0, 0, .25) 0 0 1vw;
                border-radius: .5em;
            }
            #main-services > span {
                display: flex;
                flex-wrap: wrap;
                flex-direction: row;
                justify-content: center;
                width: 100%;
                height: 4em;
                background: #E8E8E8;
            }
            #main-services > span > span {
                font-size: 2vw;
                font-family: "Vazirmatn";
                font-weight: 900;
            }
            #main-services > div {
                display: flex;
                flex-wrap: wrap;
                flex-direction: row-reverse;
                justify-content: space-around;
                width: 100%;
                height: max-content;
                padding: 1vw 0 1vw 0;
            }
            #main-services > div > div {
                display: flex;
                flex-wrap: wrap;
                flex-direction: row-reverse;
            }
            #main-services > div > div > span {
                font-size: 3vw;
                font-family: "Vazirmatn";
                direction: rtl;
                margin-right: 2vw;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: min-content;
                margin-top: .15vw;
            }
            #main-services > div > div > svg {
                width: 4.5vw;
                height: 4.5vw;
            }
            #main-services > div > svg {
                width: 3vw;
                height: 3vw;
                padding: .35vw;
                color: #e42154;
                border-radius: .5vw;
                cursor: pointer;
            }
            #main-services > div > svg:hover {
                background: rgba(228,33,84,.08);
            }
            #main-services > div > span {
                font-size: 2.5vw;
                font-family: "Vazirmatn";
                font-weight: 900;
                padding: .25vw .75vw .25vw .75vw;
                border-radius: .5vw;
            }
            .service-active {
                color: #0dbf66;
                background: rgba(13,191,102,.08);
            }
            .service-inactive {
                color: #e42154;
                background: rgba(228,33,84,.08);
            }
            #main-services > hr {
                width: 95%;
                margin: .5em 2.5% .5em 2.5%;
                color: #222;
                opacity: 70%;
            }
            #main-services-bg {
                background: #F8F8F8;
                min-height: 25em;
                opacity: 50%;
            }
            #main-services-bg > span {
                font-size: 3vw;
                font-family: "Vazirmatn";
                font-weight: 900;
                margin-top: 10em;
            }

            /* info */
            #main-info {
                display: flex;
                flex-wrap: wrap;
                flex-direction: column;
                justify-content: center;
                width: 95%;
                height: min-content;
                margin: 3em 2.5% 1em 2.5%;
                box-shadow: rgba(0, 0, 0, .25) 0 0 .5vw;
                border-radius: .3em;
            }
            #main-info-header {
                display: flex;
                flex-wrap: wrap;
                flex-direction: row;
                justify-content: center;
                width: 100%;
                height: 2em;
                background: #E8E8E8;
                font-size: 2.5vw;
                font-family: "Vazirmatn";
                font-weight: 900;
            }
            #main-info-id {
                display: flex;
                width: 70%;
                height: 4vw;
                font-size: 4vw;
                font-family: monospace;
                padding: 1vw 5% 1vw 5%;
                margin: 2vw 10% 2vw 10%;
                direction: ltr;
                text-align: center;
                border: solid #444 1px;
                border-radius: 1vw;
                background-image: url(./../assets/img/fingerprint.svg);
                background-repeat: no-repeat;
                background-size: 4vw;
                background-position: 1vw;
            }
            #main-info-balance {
                display: flex;
                flex-wrap: wrap;
                flex-direction: row-reverse;
                width: 70%;
                height: 4vw;
                font-size: 3vw;
                font-family: monospace;
                padding: 1vw 5% 1vw 5%;
                margin: 2vw 10% 2vw 10%;
                direction: ltr;
                text-align: center;
                border: solid #444 1px;
                border-radius: 1vw;
            }
            #main-info-balance > svg {
                width: 5vw;
                height: 5vw;
                color: #444;
                margin-top: -.5vw;
            }
            #main-info-balance > span {
                font-size: 3.5vw;
                font-family: "Vazirmatn";
                font-weight: 900;
                direction: rtl;
                margin-right: 1vw;
                margin-top: -1vw;
            }
            #user-info-form {
                display: flex;
                flex-wrap: wrap;
                flex-direction: column;
                justify-content: center;
                width: 100%;
                height: min-content;
            }
            #blnc-change-label {
                font-size: 2vw;
                font-family: "Vazirmatn";
                width: 85%;
                margin-right: 15%;
                direction: rtl;
            }
            #blnc-change {
                display: flex;
                width: 70%;
                height: 4vw;
                font-size: 3vw;
                font-family: "Vazirmatn";
                padding: 1vw 5% 1vw 5%;
                margin: 1vw 10% 1vw 10%;
                direction: ltr;
                text-align: center;
                border: solid #444 1px;
                border-radius: 1vw;
            }
            #user-info-form > span {
                display: flex;
                flex-wrap: wrap;
                flex-direction: row-reverse;
                width: 70%;
                margin: 1vw 15% 1vw 15%;
            }
            #user-info-form > span > input {
                width: 4vw;
                height: 4vw;
                cursor: pointer;
            }
            #user-info-form > span > span {
                font-size: 3.5vw;
                font-family: "Vazirmatn";
                margin-right: 1vw;
                margin-top: -.5vw;
            }
            #user-info-submit {
                display: flex;
                font-size: 4vw;
                font-family: "Vazirmatn";
                font-weight: 900;
                background: #2C6BED;
                color: #fff;
                padding: 1vw 5vw 1vw 5vw;
                border: none;
                border-radius: 2vw;
                cursor: pointer;
                width: max-content;
                height: min-content;
                margin: .5vw 40% 1.5vw 40%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div id="header-title">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-database-fill-gear" viewBox="0 0 16 16">
                <path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z"/>
                <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Zm3.631-4.538c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
            </svg>
            <span>مدیریت کاربر</span>
        </div>
    </header>
    <div id="main">
        <div id="main-info">
            <div id="main-info-header">مدیریت کاربر</div>
            <input id="main-info-id" disabled type="text" value="<?php echo $id;?>">
            <div id="main-info-balance">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
                </svg>
                <span><?php echo "موجودی : $balance تومان";?></span>
            </div>
            <form id="user-info-form">
                <input style="display: none;" type="text" name="userId" value="<?php echo $id;?>">
                <div id="blnc-change-label">افزایش یا کسر موجودی:</div>
                <input type="number" id="blnc-change" name="blnc-change" placeholder="موجودی جدید را واررد کنید">
                <input style="display: none;" type="text" id="ban-input" name="ban">
                <br>
                <span>
                    <input id="ban-checkbox" type="checkbox" <?php 
                if($active == "inactive"){
                    echo "checked";
                }
                ?>>
                <script defer>
                    const ban_checkbox = document.getElementById('ban-checkbox');
                    const ban_input = document.getElementById('ban-input');
                    
                    if(ban_checkbox.checked) {
                        ban_input.setAttribute('value', "inactive");
                    } else {
                        ban_input.setAttribute('value', "active");
                    }
                    
                    ban_checkbox.addEventListener('click', function() {
                        if(ban_checkbox.checked) {
                            ban_input.setAttribute('value', "inactive");
                        } else {
                            ban_input.setAttribute('value', "active");
                        }
                    })
                </script>
                    <span>مسدود کردن کاربر</span>
                </span>
                <br>
                <input id="user-info-submit" type="submit" value="ذخیره">
            </form>
        </div>
        <div id="main-services">
            <span>
                <span>سرویس های کاربر</span>
            </span>
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

    echo "<div>
                <div>
                    <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-hdd-network-fill' viewBox='0 0 16 16'>
                        <path d='M2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h5.5v3A1.5 1.5 0 0 0 6 11.5H.5a.5.5 0 0 0 0 1H6A1.5 1.5 0 0 0 7.5 14h1a1.5 1.5 0 0 0 1.5-1.5h5.5a.5.5 0 0 0 0-1H10A1.5 1.5 0 0 0 8.5 10V7H14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm.5 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1z'/>
                    </svg>
                    <span>$name</span>
                </div>
                <span class='service-active'>$active</span>
                <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                </svg>
            </div>
            <hr>";
}}else{
    echo "<div id='main-services-bg'>
                <span>سرویسی برای نمایش وجود ندارد</span>
            </div>";
}
            
            ?>
            <!--<div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-hdd-network-fill" viewBox="0 0 16 16">
                        <path d="M2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h5.5v3A1.5 1.5 0 0 0 6 11.5H.5a.5.5 0 0 0 0 1H6A1.5 1.5 0 0 0 7.5 14h1a1.5 1.5 0 0 0 1.5-1.5h5.5a.5.5 0 0 0 0-1H10A1.5 1.5 0 0 0 8.5 10V7H14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm.5 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1z"/>
                    </svg>
                    <span>سرویس vmess یک ماهه 30 کیک  فرانسه</span>
                </div>
                <span class="service-active">فعال</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                </svg>
            </div>
            <hr>
            <div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-hdd-network-fill" viewBox="0 0 16 16">
                        <path d="M2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h5.5v3A1.5 1.5 0 0 0 6 11.5H.5a.5.5 0 0 0 0 1H6A1.5 1.5 0 0 0 7.5 14h1a1.5 1.5 0 0 0 1.5-1.5h5.5a.5.5 0 0 0 0-1H10A1.5 1.5 0 0 0 8.5 10V7H14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm.5 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1z"/>
                    </svg>
                    <span>سرویس vmess یک ماهه 30 کیک  فرانسه</span>
                </div>
                <span class="service-active">فعال</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                </svg>
            </div>
            <hr>
            -->
        </div>
    </div>
</body>
<script src="./../jquery/jquery-3.6.4.min.js"></script>
<script src="./umngr.js"></script>
</html>