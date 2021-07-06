<?php 
$session_data=$this->session->userdata('lsesson');
?>
<script>

    $('#letterHeadForm').on('submit', function (e) {

        e.preventDefault();

        var returnVal = $("#letterHeadForm").valid();
        var formdata = new FormData(this);
        formdata.append('centerId',<?php echo $session_data['centerId'];?>)
        if (returnVal) {
            $.ajax({

                url: 'letter_head_details_register',

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

                        swal("Error!", response.msg, "error");

                    }

                }

            });
        }
    });

</script>