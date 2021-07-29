<?php
$session_data = $this->session->userdata('lsesson');
?>
<script>

    $('#patientRegForm').on('submit', function (e) {

        e.preventDefault();

        var returnVal = $("#patientRegForm").valid();
        var formdata = new FormData(this);
        formdata.append('centerId',<?php echo $session_data['centerId']; ?>)
        if (returnVal) {
            $.ajax({

                url: 'patient_reg',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
//                        swal("Good job!", response.msg, "success");
                        swal({
                            title: "Patient Created successfully!",
                            text: "Do you want to create Case?!",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        }, function (isConfirm) {
                            if (isConfirm) {
                                window.location.href = "<?php echo base_url();?>create_case";
                            } else {
//                                swal("Cancelled", "Your imaginary file is safe :)", "error");
                                window.location.reload();
                            }
                        });





                    } else {

                        swal("Error!", response.msg, "error");

                    }

                }

            });
        }
    });

</script>