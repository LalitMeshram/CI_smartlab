<?php 
$session_data=$this->session->userdata('lsesson');
?>


<script>



    var refList = new Map();
    function getDoctors() {
        $.ajax({

            url: '<?php echo base_url();?>ref_list/'+<?php echo $session_data['centerId'];?>,

            type: 'GET',
            
            async:false,

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            refList.set(response.data[i].ref_id, response.data[i]);

                        }
                        showDoctorList(refList);

                    }

                }

            }

        });
    }
    getDoctors();


    function showDoctorList(list) {
        var option = '';
        for (let k of list.keys()) {
            let doctor = list.get(k);
            option += `
                    <option value="`+doctor.ref_id+`">`+doctor.ref_title+' '+doctor.ref_name+`</option>
                    `;
        }

        $('#referenceId').html(option);
    }








</script>
