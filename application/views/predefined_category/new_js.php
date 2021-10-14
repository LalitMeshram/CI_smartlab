
<?php 
$session_data=$this->session->userdata('lsesson');
?>
<script>

    $('#categoryForm').on('submit', function (e) {
        e.preventDefault();
         var returnVal = $("#categoryForm").valid();
        var formdata = new FormData(this);
        
        if (returnVal) {
            $.ajax({

                url: 'add_lab_category',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        swal("Good job!", response.Message, "success");
                        window.location.reload();
                        
                    } else {

                        swal("Error!", response.Message, "error");

                    }

                }

            });
        }
    });

</script>
