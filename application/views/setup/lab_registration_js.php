<script>
<?php 
$session_data=$this->session->userdata('lsesson');
?>
    $('#labRegForm').on('submit', function (e) {

        e.preventDefault();

        var returnVal = $("#labRegForm").valid();
        var formdata = new FormData(this);
            formdata.append('centerId',<?php echo $session_data['centerId'];?>)
        if (returnVal) {
            $.ajax({

                url: 'lab_reg',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        swal("Good job!", response.msg, "success");
                        window.location.replace("<?php echo base_url('letter_head');?>");
                        
                    } else {

                        swal("Error!", "Detail not inserted!", "error");

                    }

                }

            });
        }
    });

</script>