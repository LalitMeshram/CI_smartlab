<?php 
$session_data=$this->session->userdata('lsesson');
?>
<script>
function getReportData() {
    
    var data = [];
    //data
    if (testArr.ResponseCode == 200) {
                    
                    
                    var dataArr = testArr.Data;
                    
                    for (var i = 0; i < dataArr.length; i++) {

                        var category = $('#cat_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var testId = $('#testid_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var testName = $('#test_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var unit = $('#unit_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var finding = $('#finding_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var categoryid = $('#catid_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var parameterid = $('#parameterid_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var parameter = $('#parameter_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var label = $('#label_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var lower = $('#lower_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var upper = $('#upper_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var isgroup= $('#isgroup_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var reference_value=lower+'-'+upper;

                        data[i] = {
                        category: category,
                        categoryid: categoryid,
                        test_name: testName,
                        testId: testId,
                        unit: unit,
                        parameterid: parameterid,
                        parameter: parameter,
                        label: label,
                        reference_value: reference_value,
                        isgroup: isgroup,
                        finding_value: finding
                        };

                       
                        
                    }//for i
                        
                    }
    //data
    return data;
}




$('#saveFinding').click(function() {
    
    var reportData = getReportData();
    var reportId=$('#reportId').val();
    console.log(reportData);
    var formdata = new FormData();
    formdata.append('report_data', JSON.stringify(reportData));
    formdata.append('centerId', <?php echo $session_data['centerId'];?>)
    formdata.append('patientId', 2);
    formdata.append('caseId',<?php echo $caseId; ?>);
    formdata.append('casedate', '2015-03-25');
    formdata.append('reportId', reportId);

    $.ajax({

        url: '<?php echo base_url();?>save_finding',

        type: 'POST',

        data: formdata,

        cache: false,

        contentType: false,

        processData: false,

        dataType: 'json',

        success: function(response) {
            console.log(response);
            if (response.ResponseCode == 200) {
                swal("Good job!", response.Message, "success");
                window.location.replace("<?php echo base_url('all_cases');?>");

            } else {

                swal("Error!", response.Message, "error");

            }

        }

    });


});
</script>