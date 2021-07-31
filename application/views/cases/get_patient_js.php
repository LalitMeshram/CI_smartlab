<?php 
$session_data=$this->session->userdata('lsesson');
?>

<script>



    var patientList = new Map();
    function getPatients() {
        $.ajax({

            url: '<?php echo base_url();?>get_patients/'+<?php echo $session_data['centerId'];?>,

            type: 'GET',
            
            async:false,

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            patientList.set(response.data[i].patientId, response.data[i]);

                        }
                        showPatientList(patientList);

                    }

                }

            }

        });
    }
    getPatients();


    function showPatientList(list) {
        var option = '';
        for (let k of list.keys()) {
            let patient = list.get(k);
            option += `
                    <option value="`+patient.patientId+`">`+patient.patient_title+' '+patient.first_name+' '+patient.last_name+`</option>
                    `;
        }

        $('#patientId').html(option);
    }








</script>
