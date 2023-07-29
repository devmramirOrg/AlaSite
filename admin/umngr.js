$(document).ready(function() {
    $('#user-info-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'umngr.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == '1') {
                    console.log("updated");
                }
                if (jsonData.success == '2') {
                    console.log("sucked");
                }
                if (jsonData.success == '3') {
                    console.log("mmdkoni");
                }
                if (jsonData.success == '4') {
                    console.log("kiramshage");
                }
                if (jsonData.success == '5') {
                    console.log("konmmd");
                }
            }
        })
    });
});