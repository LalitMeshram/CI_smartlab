<script>
var categoryArr;
var testArr = [];

function getFindingDetail() {
    $.ajax({

        url: '<?php echo base_url(); ?>view_finding/' + <?php echo $caseId; ?>,

        type: 'GET',

        dataType: 'json',
        async: false,

        success: function(response) {


            if (response.ResponseCode == 200) {
                var testList = ``;
                categoryArr = (response.category.length > 0) ? response.category : [];
                for (var i = 0; i < response.category.length; i++) {

                    testList += `<div class="test_section">
				<div class="report_title">
					<center><h4 style="background-color: #fff;margin-top: 2%; font-weight: 800;">` + response.category[i].category + `</h4></center>
					<center><h5 style="background-color: #fff; font-weight: 700;">CBC WITH ESR</h5></center>
				</div>
				<div class="table-responsive">
					<table class="table">
						<tr>
						<th>TEST</th>
						<th>VALUE</th>
						<th>UNIT</th>
						<th>REFERENCE</th>
					</tr>`;
                    



                    for (var j = 0; j < response.Data.length; j++) {
                        if (response.category[i].category == response.Data[j].category) {
                            
                        }
                    }
                    testList += `</tbody>
                                </table>
                               <hr/>
                            </div>`;



                }
                console.log(categoryArr);
                console.log(testArr);
                $('#testList').html(testList);
            }

        }

    });
}
getFindingDetail();



function checkLowHigh(lower, upper, id) {
    var value = $('#finding_' + id).val();
    if (value != '') {
        
        if (value > upper) {
            $('#fCheck_' + id).removeClass("text-success");
            $('#fCheck_' + id).addClass("text-danger");
            $('#fCheck_' + id).html('H');
        } else if (value < lower) {
            $('#fCheck_' + id).removeClass("text-success");
            $('#fCheck_' + id).addClass("text-danger");
            $('#fCheck_' + id).html('L');
        } else if (value >= lower && value <= upper) {
            $('#fCheck_' + id).removeClass("text-danger");
            $('#fCheck_' + id).addClass("text-success");
            $('#fCheck_' + id).html('N');

        }
    } else {
        //alert('Blank');
        $('#fCheck_' + id).html('');
    }

}
</script>