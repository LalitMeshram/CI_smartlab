<script>

    $('#labRegForm').on('submit', function (e) {

        e.preventDefault();

        var returnVal = $("#labRegForm").valid();
        var formdata = new FormData(this);

        if (returnVal) {
            $.ajax({

                url: 'lab_reg',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        swal("Good job!", response.msg, "success");

                        
                    } else {

                        swal("Error!", "Detail not inserted!", "error");

                    }

                }

            });
        }
    });

</script>