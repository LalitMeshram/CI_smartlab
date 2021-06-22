<script>

    $('#addIssuemasterForm').on('submit', function (e) {
        alert('hello');
        e.preventDefault();

        var returnVal = $("#addIssuemasterForm").valid();
        var formdata = new FormData(this);
        if (returnVal) {
            $.ajax({

                url: 'issue',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        $('#myModal5').modal('toggle');
                        swal("Good job!", response.msg, "success");
                        location.reload();

                    } else {

                        swal("Good job!", response.msg, "error");

                    }

                }

            });
        }
    });



</script>