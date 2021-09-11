
<?php 
$session_data=$this->session->userdata('lsesson');
?>
<script>

    $('#unitForm').on('submit', function (e) {
        e.preventDefault();
         var returnVal = $("#unitForm").valid();
        var formdata = new FormData(this);
        formdata.append('centerId',<?php echo $session_data['centerId'];?>)
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
