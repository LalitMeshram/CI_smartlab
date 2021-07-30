<?php
$session_data = $this->session->userdata('lsesson');
?>
<script>
    var casesList = new Map();
    function getAllCases() {
        $.ajax({

            url: '<?php echo base_url(); ?>get_all_cases_center/' +<?php echo $session_data['centerId']; ?>,

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.length != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            casesList.set(response.data[i].caseId, response.data[i]);

                        }
                        showCaseList(casesList);

                    }

                }

            }

        });
    }
    getAllCases();


    function showCaseList(list) {
        $('#casesTable').dataTable().fnDestroy();
        $('#casesList').empty();
        var tblData = '';
        for (let k of list.keys()) {
            let cases = list.get(k);
            tblData += `
                    <tr>
                      <td>`+cases.patientId+`</td>
                      <td>`+cases.username+`</td>
                      <td>`+cases.contact_number+`</td>
                      <td>`+cases.createdat+`</td>
                      <td>`+cases.total_amt+`</td>
                      <td>`+cases.amt_recieved+`</td>
                      <td>`+cases.pending_amt+`</td>
                      <td>`+cases.tests+`</td>
                      <td>
                      <button type="button" class="btn btn-success btn-xs case_action_buttons" onclick="modifyCase('`+cases.caseId+`');"><i class="fa fa-edit"></i> Modify Case</button>
                      <button type="button" class="btn btn-danger btn-xs case_action_buttons"><i class="fa fa-trash-o"></i> View Bill</button>
                      <button type="button" class="btn btn-primary btn-xs case_action_buttons"><i class="fa fa-trash-o"></i> View Report</button>
                      </td>
                      </tr>
                    `;
        }

        $('#casesList').html(tblData);
        $('#casesTable').DataTable();
    }


    function modifyCase(id) {
        $.ajax({

            url: 'get_patients/' + id,

            type: 'GET',

            dataType: 'json',

            success: function (response) {
//                console.log(response);

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