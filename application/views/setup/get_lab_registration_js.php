<?php 
$session_data=$this->session->userdata('lsesson');
?>
<script>
function getCenterDetail() {
        
        $.ajax({

                url: 'lab_register_data/'+<?php echo $session_data['centerId'];?>,

                type: 'get',

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {

                        $('#labName').val(response.data.labName);
                        $('#brandName').val(response.data.brandName);
                        $('#lab_email').val(response.data.lab_email);
                        $('#lab_contact').val(response.data.lab_contact);
                        $('#lab_city').val(response.data.lab_city);
                        $('#lab_address').val(response.data.lab_address);
                        $('#lab_postalcode').val(response.data.lab_postalcode);
                    } 

                }

            });
        
        
    }
    
    getCenterDetail();
</script>