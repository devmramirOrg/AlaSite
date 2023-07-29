<?php

if(isset($_GET['verify'])) {
    if ($_GET['verify'] == "true") {
        echo('<!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="google" content="notranslate">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Vazirmatn">
            <style>
                body {
                    display: flex;
                    flex-wrap: wrap;
                    flex-direction: column;
                    justify-content: center;
                    background: #fff;
                    color: #333;
                    margin: 0;
                }
                body > div {
                    display: flex;
                    flex-wrap: wrap;
                    flex-direction: row;
                    justify-content: space-around;
                    width: 100%;
                    height: min-content;
                    padding: 1em 0 1em 0;
                    margin: 6em 0 0 0;
                }
                body > div > div {
                    display: flex;
                    flex-wrap: wrap;
                    flex-direction: row-reverse;
                    width: max-content;
                }
                body > div > span {
                    font-size: 1em;
                    font-family: "Vazirmatn";
                    font-weight: 900;
                    color: #333;
                    width: max-content;
                    background: rgba(0, 0, 0, .05);
                    padding: .35em 1em .35em 1em;
                    border-radius: .5em;
                }
                body > div > div > svg {
                    width: 2em;
                    color: #198754;
                }
                body > div > div > span {
                    font-size: 1.5em;
                    font-family: "Vazirmatn";
                    font-weight: 900;
                    direction: rtl;
                    margin: .15em .5em 0 0;
                    color: #198754;
                }
            </style>
        </head>
        <body>
            <div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <span>تراکنش با موفقیت انجام شد.</span>
                </div>
            </div>
            <div>
                <span>بازگشت به صفحه اصلی</span>
            </div>
        
        <script>
            setTimeout(function() {
                window.location.href = "./index.php";
            }, 3000);
        </script>
        
        </body>
        </html>');
    } else {
        echo('<!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="google" content="notranslate">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Vazirmatn">
            <style>
                body {
                    display: flex;
                    flex-wrap: wrap;
                    flex-direction: column;
                    justify-content: center;
                    background: #fff;
                    color: #333;
                    margin: 0;
                }
                body > div {
                    display: flex;
                    flex-wrap: wrap;
                    flex-direction: row;
                    justify-content: space-around;
                    width: 100%;
                    height: min-content;
                    padding: 1em 0 1em 0;
                    margin: 6em 0 0 0;
                }
                body > div > div {
                    display: flex;
                    flex-wrap: wrap;
                    flex-direction: row-reverse;
                    width: max-content;
                }
                body > div > span {
                    font-size: 1em;
                    font-family: "Vazirmatn";
                    font-weight: 900;
                    color: #333;
                    width: max-content;
                    background: rgba(0, 0, 0, .05);
                    padding: .35em 1em .35em 1em;
                    border-radius: .5em;
                }
                body > div > div > svg {
                    width: 2em;
                    color: #DC3545;
                }
                body > div > div > span {
                    font-size: 1.5em;
                    font-family: "Vazirmatn";
                    font-weight: 900;
                    direction: rtl;
                    margin: .15em .5em 0 0;
                    color: #DC3545;
                }
            </style>
        </head>
        <body>
            <div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
                    <span>خطا در انجام تراکنش.</span>
                </div>
            </div>
            <div>
                <span>بازگشت به صفحه اصلی</span>
            </div>
        
        <script>
            setTimeout(function() {
                window.location.href = "./index.php";
            }, 3000);
        </script>
        
        </body>
        </html>');
    }
} else {
    header("Location: ./index.php");
}

?>