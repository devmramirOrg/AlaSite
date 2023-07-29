$(document).ready(function() {
    $('#settings-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'addr.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == '1') {
                    console.log("updated");
                }
            }
        })
    });
    $('#panel-addr-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'addr.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == '1') {
                    console.log("updated");
                }
            }
        })
    });
    $('#service-addr-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'addr.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == '1') {
                    console.log("updated");
                }
            }
        })
    });
    $('#nowpayments-script-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'addr.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == '1') {
                    console.log("updated");
                }
            }
        })
    });
    $('#service-crisp-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'addr.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == '1') {
                    console.log("updated");
                }
            }
        })
    });
    $('#zarinpal-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'addr.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == '1') {
                    console.log("updated");
                }
            }
        })
    });
    $('#seo-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'addr.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == '1') {
                    console.log("updated");
                }
            }
        })
    });
    $('#alert-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'addr.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == '1') {
                    console.log("updated");
                }
            }
        })
    });
    $('#sidebar-logout').click(function() {
        $.ajax({
            url: "addr.php",
            type: "POST",
            data: { logout: true},
            success: function(response) {
                // Handle success response
                console.log("logout success");
                location.href = "./login.php";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle error response
                console.log("errorThrown");
            }
        })
    });
    $('#alert-delete-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'addr.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == '1') {
                    console.log("updated");
                }
            }
        })
    });
});