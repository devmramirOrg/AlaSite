<?php
session_start();

?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate">
    <link rel="stylesheet" href="./../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Vazirmatn">
    <link rel="icon" href="<?php print_r(@$app_icon); ?>">
    <title><?php print_r(@$app_title); ?></title>
    <link rel="stylesheet" href="./../style.css">
    <link rel="stylesheet" href="./../scm.css">
</head>
<body>
<section id="section-auth">
    <div id="auth-container">
        <div id="section-auth-box">
            <div id="section-auth-header">
                <svg id="section-auth-close" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
                <span id="auth-title">ورود به حساب مدیریت</span>
            </div>
            <hr id="section-auth-header-hr">
            <div id="section-auth-body">
                <form id="auth-form">
                     <span id="auth-err-box">
                        <svg fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>
                        <span id="auth-err"></span>
                    </span>
                    <br>
                    <input id="auth-email" class="auth-input" name="username" type="text" placeholder="Username">
                    <br>
                    <input id="auth-password" class="auth-input" name="password" type="password" placeholder="Password">
                    <br>
                    <div>
                        <input id="auth-submit" type="submit" value="تایید">
                        <!-- <span id="auth-forward-login">حساب ندارید؟ یکی بسازید.</span> -->
                        <span id="auth-forward-signup">LOG4J</span>
                    </div>
                </form>
            </div>
            <script>
                const auth_email = document.getElementById('auth-email');
                const auth_password = document.getElementById('auth-password');
                const auth_submit = document.getElementById('auth-submit');
                const auth_forward_signup = document.getElementById('auth-forward-signup'); // replace with captcha
                const auth_title = document.getElementById('auth-title');
                
                auth_title.innerHTML = "ورود به حساب مدیریت";
                auth_password.setAttribute('placeholder', 'Password');
                auth_submit.value = "ورود";
                auth_forward_signup.style.display = "block";
            </script>
        </div>
    </div>
</section>
</body>
<script>
    const section_auth = document.getElementById('section-auth');
    const section_auth_close = document.getElementById("section-auth-close");
    section_auth.style.display = 'block';
</script>
<script src="./../jquery/jquery-3.6.4.min.js"></script>
<script defer src="./login.js"></script>
</html>