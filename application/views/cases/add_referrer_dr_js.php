
<?php 
$session_data=$this->session->userdata('lsesson');
?>
<script>

    $('#refForm').on('submit', function (e) {
        e.preventDefault();
         var returnVal = $("#refForm").valid();
        var formdata = new FormData(this);
        formdata.append('centerId',<?php echo $session_data['centerId'];?>)
        if (returnVal) {
            $.ajax({

                url: 'add_ref',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        swal("Good job!", response.Message, "success");
                        //window.location.reload();
                        $('#add_refferer').modal('toggle');
                        getDoctors();
                    } else {

                        swal("Error!", response.msg, "error");

                    }

                }

            });
        }
    });

</script>
