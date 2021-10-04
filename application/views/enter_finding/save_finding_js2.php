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
                        var testName = $('#test_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var unit = $('#unit_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var finding = $('#finding_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();


                        data[i] = {
                        category: category,
                        test_name: testName,
                        unit: unit,
                        findings: finding
                        };

                       
                        
                    }//for i
                        
                    }
    //data
    return data;
}




$('#saveFinding').click(function() {
    
    var reportData = getReportData();
    console.log(reportData);
    var formdata = new FormData();
    formdata.append('report_data', reportData);
    formdata.append('centerId', <?php echo $session_data['centerId'];?>)
    formdata.append('patientId', 2);
    formdata.append('caseId',<?php echo $caseId; ?>);
    formdata.append('casedate', '2015-03-25');

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
                //window.location.reload();
                //window.history.back();

            } else {

                swal("Error!", response.Message, "error");

            }

        }

    });


});
</script>