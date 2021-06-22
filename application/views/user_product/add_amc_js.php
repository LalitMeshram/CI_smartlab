<script>

    $('#addamcForm').on('submit', function (e) {
        e.preventDefault();

        var formdata = new FormData(this);

        $.ajax({

            url: 'amc',

            type: 'POST',

            data: formdata,

            cache: false,

            contentType: false,

            processData: false,
            dataType: 'json',

            success: function (response) {
                if (response.status == 200) {
                    swal("Good job!", response.msg, "success");
                    
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                    
                } else if (response.status == 400) {
                    swal("Already Paid!", response.msg, "error");
                }

            }

        });

    });

</script>