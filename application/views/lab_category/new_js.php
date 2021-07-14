
<?php 
$session_data=$this->session->userdata('lsesson');
?>
<script>

    $('#categoryForm').on('submit', function (e) {
        e.preventDefault();
         var returnVal = $("#categoryForm").valid();
        var formdata = new FormData(this);
        formdata.append('centerId',<?php echo $session_data['centerId'];?>)
        if (returnVal) {
            $.ajax({

                url: 'add_center_category',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        swal("Good job!", response.msg, "success");
                        window.location.reload();
                        
                    } else {

                        swal("Error!", response.msg, "error");

                    }

                }

            });
        }
    });

</script>
