<script>

    $('#updateUserproductForm').on('submit', function (e) {

        e.preventDefault();
        
        var formdata = new FormData(this);

        $.ajax({

            url: 'productMapping-update',

            type: 'POST',

            data: formdata,

            cache: false,

            contentType: false,

            processData: false,
            dataType: 'json',

            success: function (response) {
                if (response.status == 200) {
                    $('#updateUserproductForm').modal('toggle');

                    swal("Good job!", response.msg, "success");
                    location.reload(); 

                } else {

                    swal("Good job!", response.msg, "error");

                }

            }

        });

    });

</script>