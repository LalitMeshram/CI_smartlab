<script>
function getFindingDetail() {
    $.ajax({

        url: '<?php echo base_url(); ?>view_finding/' + <?php echo $caseId; ?>,

        type: 'GET',

        dataType: 'json',
        async: false,

        success: function(response) {


            if (response.ResponseCode == 200) {
                var testList = ``;

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
                            testList += `<tr>
                            <td>` + response.Data[j].test_name + `</td>
                            <td>
                                <div class="controls">
                                    <input type="text" placeholder="Enter value" class="form-control"  id="">
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

                $('#testList').html(testList);
            }

        }

    });
}
getFindingDetail();
</script>