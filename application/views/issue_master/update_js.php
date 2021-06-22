<script>

    $('#updateIssuemasterForm').on('submit', function (e) {

        e.preventDefault();
        
        var formdata = new FormData(this);

        $.ajax({

            url: 'issue-update',

            type: 'POST',

            data: formdata,

            cache: false,

            contentType: false,

            processData: false,
            dataType: 'json',

            success: function (response) {
                if (response.status == 200) {
                    $('#updateIssuemasterForm').modal('toggle');

                    swal("Good job!", response.msg, "success");
                    location.reload(); 

                } else {

                    swal("Good job!", response.msg, "error");

                }

            }

        });

    });

</script>