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
                      <td>`+cases.discount+`</td>
                      <td>`+cases.pending_amt+`</td>
                      <td>`+cases.tests+`</td>
                      <td>
                      <button type="button" class="btn btn-success btn-xs case_action_buttons" onclick="modifyCase('`+cases.caseId+`');"><i class="fa fa-edit"></i> Modify Case</button>
                      <button type="button" class="btn btn-danger btn-xs case_action_buttons" onclick="getInvoice('`+cases.caseId+`')"><i class="fa fa-fw fa-inr"></i> View Bill</button>`;
                      
                      if(cases.report_flag>0){
                      tblData += `<a href="<?php echo base_url();?>enter_finding/`+cases.caseId+`" class="btn btn-primary btn-xs case_action_buttons"><i class="fa fa-fw fa-file-text"></i> View Report</a>
                      <a href="<?php echo base_url();?>RecieptController/report_print/`+cases.caseId+`" class="btn btn-warning btn-xs case_action_buttons"><i class="fa fa-print"></i> Print Report</a>
                      `;    
                      }
                      
                      tblData += `</td>
                      </tr>
                    `;
        }

        $('#casesList').html(tblData);
        $('#casesTable').DataTable();
    }


    function modifyCase(caseId) {
     window.location.replace("<?php echo base_url();?>update_case/"+caseId);
    }


function getInvoice(caseId) {
    window.location.replace("<?php echo base_url();?>invoice/"+caseId);
}

    $('#addNew').click(function () {
        $("#patientRegForm").trigger("reset");
        $('#patientIdStatus').hide();
        $('#myModal').modal('toggle');
    });







</script>