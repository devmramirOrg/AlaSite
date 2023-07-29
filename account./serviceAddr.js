$(document).ready(function() {
    $('#newService-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'serviceAddr.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == '1') {
                    alert('خرید سرویس با موفقیت انجام شد.');
                }
                if (jsonData.success == '2') {
                    alert('موجودی شما کافی نمیباشد.');
                }
                if (jsonData.success == '3') {
                    alert('سرویس ناموجود');
                }
                if (jsonData.success == '4') {
                    alert('خطای سیستمی!');
                }
            }
        })
    })
});