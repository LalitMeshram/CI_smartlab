<?php 
$session_data=$this->session->userdata('lsesson');
?>
<script>
function getLetterHeadDetail() {
        
        $.ajax({

                url: 'letter_head_details/'+<?php echo $session_data['centerId'];?>,

                type: 'get',

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {

                        $('#lab_incharge_name').val(response.data.lab_incharge_name);
                        $('#lab_incharge_degree').val(response.data.lab_incharge_degree);
                        $('#lab_doctor_name').val(response.data.lab_doctor_name);
                        $('#lab_doctor_degree').val(response.data.lab_doctor_degree);
                        $('#headerpre').prop('src',response.data.header_logo);
                        $('#inchargesignpre').prop('src',response.data.lab_incharge_sign);
                        $('#drsignpre').prop('src',response.data.doctor_sign);
                        $('#footerpre').prop('src',response.data.footer_logo);
                        
                    } 

                }

            });
        
        
    }
    
    getLetterHeadDetail();
</script>