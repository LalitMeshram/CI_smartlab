<?php
$session_data = $this->session->userdata('lsesson');
?>

<script>


    var findingList = new Map();
    function getEnterFinding() {
        $.ajax({

            url: '<?php echo base_url(); ?>get_report_finding/' +<?php echo $caseId; ?>,

            type: 'GET',

            async:false,

            dataType: 'json',

            success: function (response) {


                if (response.ResponseCode == 200) {

                    if (response.Data.reports.lenght != 0) {
                        for (var i = 0; i < response.Data.reports.length; i++) {
                            findingList.set(response.Data.reports[i].case_report_id, response.Data.reports[i]);

                        }
                        $('#more_details').val(response.Data.finding_details);
                        showList(findingList);
                  
                    }

                }

            }

        });
    }
    getEnterFinding();


    function showList(list) {
        console.log('#####################');
        console.log(list);
        for (let k of list.keys()) {
            let find = list.get(k);
            $('#finding_' + find.testName.replace(/ /g, "_")+find.label.replace(/ /g, "_")+find.categoryid+find.parameterId).val(find.finding_value);
            $('#reportId').val(find.reportId);
            console.log('#finding_' + find.testName.replace(/ /g, "_")+find.label.replace(/ /g, "_")+find.categoryid.replace(/ /g, "_")+find.parameterId);
            $('#ck'+find.category.replace(/ /g, "_")+find.testName.replace(/ /g, "_")).val(find.test_desc);
        }

    }


    
</script>