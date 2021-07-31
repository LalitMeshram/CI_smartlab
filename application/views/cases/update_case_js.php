<script>


    function getCaseDetails() {
        $.ajax({

            url: '<?php echo base_url(); ?>get_case_data/' +<?php echo $caseId; ?>,

            type: 'GET',

            dataType: 'json',
            async: false,

            success: function (response) {


                if (response.status == 200) {

                    var details = response.data;
                    setCaseDetails(details);
                }

            }

        });
    }
    getCaseDetails();


    function setCaseDetails(cases) {
        $('#caseId').val(cases.caseId);
        $('#patientId').val(cases.patientId);
        $('#referenceId').val(cases.referenceId);
        $('#collection_center').val(cases.collection_center);
        $('#collection_source').val(cases.collection_source);
        $('#tbillAmt').html(cases.total_amt);
        $('#paidAmt').html(cases.amt_recieved);
        $('#aftDiscAmt').html(cases.total_amt - cases.amt_recieved);
        
        
        var test = cases.tests;
        var tableDate = '';
        for (var i = 0; i < test.length; i++) {
            tableDate += `<tr id="r` + test[i].testId + `">
                        <td>` + test[i].testId + `</td>
                        <td>
                        ` + test[i].test_name + `
                        </td>
                        <td>` + test[i].category + `
                        </td>
                        <td>` + test[i].fees + `
                        </td>
                        <td>
                        <button class="btn btn-danger btn-xs" onclick="deleteTest('` + test[i].testId + `')" type="button"><i class="fa fa-trash-o"></i> Delete</button> 
                        </td>
                        </tr>`;

                  
              }
          $('#testList').html(tableDate);        
       
        
        
        //field
    }


</script>
