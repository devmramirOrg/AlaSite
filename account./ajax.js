$(document).ready(function() {
    $('#payment-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'pay.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == '1') {
                    location.href = './account/index.php'; 
                }
            }
        })
    })
});