<?php 
$session_data=$this->session->userdata('lsesson');
?>
<script>



    var patientList = new Map();
    function getPatients() {
        $.ajax({

            url: '<?php echo base_url();?>get_patients/'+<?php echo $session_data['centerId'];?>,

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            patientList.set(response.data[i].patientId, response.data[i]);

                        }
                        showList(patientList);

                    }

                }

            }

        });
    }
    getPatients();


    function showList(list) {
        $('#patientList').dataTable().fnDestroy();
        $('#patientData').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let patient = list.get(k);
            tblData += `
                    <tr>
                            <td>` + patient.patientId + `</td>
                            <td>` + patient.patient_title + ` ` + patient.first_name + ` ` + patient.last_name + `</td>
                            <td>` + patient.gender + `</td>
                            <td>` + patient.aadhar_number + `</td>
                            <td>` + patient.age + `</td>
                            <td>` + patient.contact_number + `,` + patient.alternate_number + `</td>
                            <td>` + patient.emailId + `</td>
                            <td> <a href="#" onclick="getUsers(` + patient.patientId + `)" title="update Patient" class="btn btn-success btn-xs" ><i class="fa fa-edit"></i></a> </td>
                    </tr>
                    `;
        }

        $('#patientData').html(tblData);
        $('#patientList').DataTable();
    }


    function getUsers(id) {
        $.ajax({

            url: 'get_patients/' + id,

            type: 'GET',

            dataType: 'json',

            success: function (response) {
               console.log(response);

                if (response.status == 200) {
                    $('#patientId').val(id);
                    if (response.data.patient_profile != null) {
                        $('#profilepre').prop('src', response.data.patient_profile);
                    }
                    $('#patient_title').val(response.data.patient_title);
                    $('#first_name').val(response.data.first_name);
                    $('#last_name').val(response.data.last_name);

                    switch (response.data.gender) {
                        case "Male":
                            $("#male").attr('checked', 'checked')
                            break;

                        case "Female":
                            $("#female").attr('checked', 'checked')
                            break;

                        case "Other":
                            $("#others").attr('checked', 'checked')
                            break;


                    }


                    $('#aadhar_number').val(response.data.aadhar_number);
                    $('#dob').val(response.data.dob);
                    $('#age').val(response.data.age);
                    $('#contact_number').val(response.data.contact_number);
                    $('#alternate_number').val(response.data.alternate_number);
                    $('#emailId').val(response.data.emailId);
                    $('#patient_address').val(response.data.patient_address);


                    $('#patientIdStatus').show();
                    $('#myModal').modal('toggle');
                }

            }

        });
    }




    $('#addNew').click(function () {
        $("#patientRegForm").trigger("reset");
        $('#patientIdStatus').hide();
        $('#myModal').modal('toggle');
    });







</script>