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

                    testList += `<div class="col-12 table-responsive">
                <center><h4 style="background-color: #fff;margin-top: 2%;"><b>` + response.category[i].category + `</b></h4></center>
                <table class="table with-border" style="background-color: #ffffffd4;" id="testTable">
                    <thead>
                        <tr>

                            <th style="width: 20%">Test</th>
                            <th style="width: 20%">Value</th>
                            <th style="width: 10%">Unit</th>
                            <th style="width: 10%">Reference</th>
                        </tr>
                    </thead>
                    <tbody>`;
                    //console.log(response.category[i].category);



                    for (var j = 0; j < response.Data.length; j++) {
                        if (response.category[i].category == response.Data[j].category) {
                            testArr[j] = response.Data[j];

                            testList += `<tr>
                                <input type="hidden" id="cat_` + response.Data[j].test_name.replace(/ /g, "_") +
                                `" value="` + response.Data[j].category + `">
                                <input type="hidden" id="test_` + response.Data[j].test_name.replace(/ /g, "_") +
                                `" value="` + response.Data[j].test_name + `">
                                <input type="hidden" id="unit_` + response.Data[j].test_name.replace(/ /g, "_") +
                                `" value="` + response.Data[j].unit + `">
                               
                            <td>` + response.Data[j].test_name + `</td>
                            <td>
                            
                                <div class="form-inline">
                                <label class="text-bold" for="finding_` + response.Data[j].test_name
                                .replace(/ /g, "_") + `" id="fCheck_` + response.Data[j].test_name.replace(
                                    / /g, "_") + `"></label>&nbsp;
                                    <input type="text" placeholder="Enter value" class="form-control"  id="finding_` +
                                response.Data[j].test_name.replace(/ /g, "_") + `" oninput="checkLowHigh(` +
                                response.Data[j].lower + `,` + response.Data[j].upper + `,'` + response
                                .Data[j].test_name.replace(/ /g, "_") + `')">
                                </div>
                            </td>
                            <td>` + response.Data[j].unit + `</td>
                            <td>` + response.Data[j].lower + `-` + response.Data[j].upper + `</td>
                        </tr>`;
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