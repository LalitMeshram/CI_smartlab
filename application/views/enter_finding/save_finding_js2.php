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
                        var desc_text="";
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
                        var words= $('#words_' + dataArr[i].test_name.replace(/ /g, "_")+dataArr[i].label.replace(/ /g, "_")+dataArr[i].categoryId+dataArr[i].panelId).val();
                        var eid= 'ck' + dataArr[i].category.replace(/ /g, "_")+dataArr[i].test_name.replace(/ /g, "_");
                      //  console.log(eid);
                        if(dataArr[i].desc_text!=""){
                            desc_text=CKEDITOR.instances[eid].getData();   
                        }
                        
                        
                        var reference_value=lower+'-'+upper;
                        var level='';
                        if(parseInt(finding)<parseInt(lower)){
                            level='L';
                        }else if(parseInt(finding)>parseInt(upper)){
                            level='H';
                        }else if(parseInt(finding)>=parseInt(lower) && parseInt(finding)<=parseInt(upper)){
                            level='N';
                        }

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
                        finding_value: finding,
                        level: level,
                        test_desc:desc_text,
                        words: words
                        };

                       
                        
                    }//for i
                        
                    }
    //data
    return data;
}




$('#saveFinding').click(function() {
    
    var reportData = getReportData();
    var reportId=$('#reportId').val();
    var more_details=$('#more_details').val();
    console.log(reportData);
    var formdata = new FormData();
    formdata.append('report_data', JSON.stringify(reportData));
    formdata.append('centerId', <?php echo $session_data['centerId'];?>)
    formdata.append('patientId', 2);
    formdata.append('caseId',<?php echo $caseId; ?>);
    formdata.append('casedate', <?php echo date('Y-m-d');?>);
    formdata.append('findingDetails', more_details);
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
                window.location.replace("<?php echo base_url('invoice');?>/<?php echo $caseId; ?>");
                window.open("<?php echo base_url('RecieptController/report_print');?>/<?php echo $caseId; ?>","_blank");
            } else {

                swal("Error!", response.Message, "error");

            }

        }

    });


});
</script>