<?php 
$session_data=$this->session->userdata('lsesson');
?>
<script>
function getReportData() {
    var data = [];
    for (var i = 0; i < testArr.length; i++) {
        var category = $('#cat_' + testArr[i].test_name.replace(/ /g, "_")).val();
        var testName = $('#test_' + testArr[i].test_name.replace(/ /g, "_")).val();
        var unit = $('#unit_' + testArr[i].test_name.replace(/ /g, "_")).val();
        var finding = $('#finding_' + testArr[i].test_name.replace(/ /g, "_")).val();


        data[i] = {
            category: category,
            test_name: testName,
            unit: unit,
            findings: finding
        };

    }
    return data;
}




$('#saveFinding').click(function() {
    var reportData = getReportData();
    //console.log(reportData);
    var formdata = new FormData();
    formdata.append('report_data', reportData);
    formdata.append('centerId', <?php echo $session_data['centerId'];?>)
    formdata.append('patientId', 2);
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
            if (response.ResponseCode == 200) {
                swal("Good job!", response.Message, "success");
                //window.location.reload();
                window.history.back();

            } else {

                swal("Error!", response.Message, "error");

            }

        }

    });


});
</script>