
<?php 
$session_data=$this->session->userdata('lsesson');
?>
<script>

    $('#unitForm').on('submit', function (e) {
        e.preventDefault();
         var returnVal = $("#unitForm").valid();
        var formdata = new FormData(this);
        if (returnVal) {
            $.ajax({

                url: 'add_lab_unit',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        window.location.reload();
                        swal("Good job!", response.Message, "success");
                        
                        
                    } else {

                        swal("Error!", response.Message, "error");

                    }

                }

            });
        }
    });

</script>
