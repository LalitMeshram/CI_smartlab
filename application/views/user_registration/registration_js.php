<script>

    $('#register').on('submit', function (e) {

        e.preventDefault();

        var returnVal = $("#register").valid();
        var formdata = new FormData(this);

        if (returnVal) {
            $.ajax({

                url: 'center_reg',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        swal("Good job!", "Registration Successful", "success");
                        
                        setTimeout(function(){ 
                            window.location.replace("pricing");
                        }, 2000);
                    } else {

                        swal("Error!", "Registration fail", "error");

                    }

                }

            });
        }
    });

</script>