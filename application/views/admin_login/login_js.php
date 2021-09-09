<script>

    $('#loginForm').on('submit', function (e) {

        e.preventDefault();

        var returnVal = $("#loginForm").valid();
        var formdata = new FormData(this);

        if (returnVal) {
            $.ajax({

                url: 'admin_login',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.Responsecode == 200) {
                        swal("Good job!", "Login Successful", "success");

                        setTimeout(function () {
                            
                                window.location.replace("adminDashboard");

                            
                        }, 2000);
                    } else {

                        swal("Error!", "Login fail", "error");

                    }

                }

            });
        }
    });

</script>