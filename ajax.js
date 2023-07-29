$(document).ready(function() {
    $('#auth-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'check.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == '1') {
                    location.href = './account/index.php';
                }
                const auth_err_box = document.getElementById('auth-err-box');
                const auth_err = document.getElementById('auth-err');
                if (jsonData.success == '0') {
                    auth_err_box.style.display = 'flex';
                    auth_err.innerHTML = 'پر کردن تمامی فیلد ها الزامی است.';
                }
                if (jsonData.success == '2') {
                    auth_err_box.style.display = 'flex';
                    auth_err.innerHTML = 'ایمیل وارد شده اشتباه است';
                }
                if (jsonData.success == '3') {
                    auth_err_box.style.display = 'flex';
                    auth_err.innerHTML = 'رمز عبور نباید کمتر از 6  رقم باشد';
                }
                if (jsonData.success == '4') {
                    auth_err_box.style.display = 'flex';
                    auth_err.innerHTML = 'ایمیل وارد شده از قبل ثبت شده است';
                }
                if (jsonData.success == '5') {
                    auth_err_box.style.display = 'flex';
                    auth_err.innerHTML = 'خطای سیستمی!';
                }
                if (jsonData.success == '6') {
                    auth_err_box.style.display = 'flex';
                    auth_err.innerHTML = 'کاربری با ایمیل وارد شده یافت نشد';
                }
                if (jsonData.success == '7') {
                    auth_err_box.style.display = 'flex';
                    auth_err.innerHTML = 'رمز عبور اشتباه است, لطفا رمز را به درستی وارد کنید.'; 
                }
            }
        })
    })
});