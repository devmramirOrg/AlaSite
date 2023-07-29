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
                    location.href = './index.php';
                }
                const auth_err_box = document.getElementById('auth-err-box');
                const auth_err = document.getElementById('auth-err');
                if (jsonData.success == '0') {
                    auth_err_box.style.display = 'flex';
                    auth_err.innerHTML = 'پر کردن تمامی فیلد ها الزامی است.';
                }
                if (jsonData.success == '2') {
                    auth_err_box.style.display = 'flex';
                    auth_err.innerHTML = 'اطلاعات نامعبر!'; 
                }
            }
        })
    })
});