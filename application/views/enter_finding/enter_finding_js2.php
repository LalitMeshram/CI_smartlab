<script>
var categoryArr;
var testArr;

function getFindingDetail() {
    $.ajax({

            url: '<?php echo base_url(); ?>view_finding/' + <?php echo $caseId; ?>,

            type: 'GET',

            dataType: 'json',
            async: false,

            success: function(response) {
                     testArr=response;

                if (response.ResponseCode == 200) {
                    var testList = ``;
                    var categoryArr = response.category;
                    var dataArr = response.Data;
                    for (var i = 0; i < categoryArr.length; i++) {

                        testList += `<div class="test_section">
				<div class="report_title">
					<center><h4 style="background-color: #fff;margin-top: 2%; font-weight: 800;">` + categoryArr[i].category + `</h4></center>
					<center><h5 style="background-color: #fff; font-weight: 700;">` + categoryArr[i].test_name + `(` + categoryArr[i]
                            .short_name + `)` + `</h5></center>
				</div>
				<div class="table-responsive">
					<table class="table">
						<tr>
						<th>TEST</th>
						<th>VALUE</th>
						<th>UNIT</th>
						<th>REFERENCE</th>
					</tr>`;

                        var groupArr = [];
                        var parameters = '';
                        var parmwithoutGroup = '';
                        var groupName;
                        for (var j = 0; j < dataArr.length; j++) {
                            
                            if (categoryArr[i].test_name == dataArr[j].test_name &&
                                (groupArr.indexOf(dataArr[j].label) == -1) &&
                                dataArr[j].isgroup == 1) {
                                    var tempParm='';
                                groupArr[j] = dataArr[j].label;
                                groupName=`<tr>
						                    <td>`+dataArr[j].label+`</td>
						                    <td></td>
						                    <td></td>
						                    <td></td>
					                        </tr>`;
                                for (var l = 0; l < dataArr.length; l++) {
                                    if (dataArr[j].label == dataArr[l].label &&
                                        dataArr[j].test_name == dataArr[l].test_name &&
                                        dataArr[l].isgroup == 1) {
                                            tempParm += `<tr>

                                            <input type="hidden" id="cat_` + dataArr[l].test_name.replace(/ /g, "_")+dataArr[l].label.replace(/ /g, "_")+dataArr[l].categoryId+dataArr[l].panelId +
                                            `" value="` + dataArr[l].category + `">
                                            <input type="hidden" id="test_` + dataArr[l].test_name.replace(/ /g, "_")+dataArr[l].label.replace(/ /g, "_")+dataArr[l].categoryId+dataArr[l].panelId +
                                            `" value="` + dataArr[l].test_name + `">
                                            <input type="hidden" id="unit_` + dataArr[l].test_name.replace(/ /g, "_")+dataArr[l].label.replace(/ /g, "_")+dataArr[l].categoryId+dataArr[l].panelId +
                                           `" value="` + dataArr[l].unit + `">

						                                <td class="parameter">`+dataArr[l].testName+`</td>
						                                <td>
                            
                                <div class="form-inline">
                                <label class="text-bold" for="finding_` + dataArr[l].test_name
                                .replace(/ /g, "_")+dataArr[l].label.replace(/ /g, "_")+dataArr[l].categoryId+dataArr[l].panelId + `" id="fCheck_` +dataArr[l].test_name.replace(/ /g, "_")+dataArr[l].label.replace(/ /g, "_")+dataArr[l].categoryId+dataArr[l].panelId+ `"></label>&nbsp;
                                    <input type="text" placeholder="Enter value" class="form-control form-control-sm m-1"  id="finding_` +
                                    dataArr[l].test_name.replace(/ /g, "_")+dataArr[l].label.replace(/ /g, "_")+dataArr[l].categoryId+dataArr[l].panelId+ `" oninput="checkLowHigh(` +
                                dataArr[l].lower + `,` + dataArr[l].upper + `,'` +dataArr[l].test_name.replace(/ /g, "_")+dataArr[l].label.replace(/ /g, "_")+dataArr[l].categoryId+dataArr[l].panelId+ `')">
                                </div>
                            </td>
						                                <td>` + dataArr[l].unit + `</td>
						                                <td>` + dataArr[l].lower + `-` + dataArr[l].upper + `</td>
					                                    </tr>`;
                                    }//if
                                   
                                } //for l
                                parameters +=groupName+tempParm;
                            } //if
                            else if(categoryArr[i].test_name == dataArr[j].test_name && dataArr[j].isgroup == 0){
                                parmwithoutGroup +=`<tr>

                                <input type="hidden" id="cat_` + dataArr[j].test_name.replace(/ /g, "_")+dataArr[j].label.replace(/ /g, "_")+dataArr[j].categoryId+dataArr[j].panelId +
                                `" value="` + dataArr[j].category + `">
                                <input type="hidden" id="test_` + dataArr[j].test_name.replace(/ /g, "_")+dataArr[j].label.replace(/ /g, "_")+dataArr[j].categoryId+dataArr[j].panelId +
                                `" value="` + dataArr[j].test_name + `">
                                <input type="hidden" id="unit_` + dataArr[j].test_name.replace(/ /g, "_")+dataArr[j].label.replace(/ /g, "_")+dataArr[j].categoryId+dataArr[j].panelId +
                                `" value="` + dataArr[j].unit + `">
						                  <td>`+dataArr[j].testName+`</td>
                                          <td>
                            
                            <div class="form-inline">
                            <label class="text-bold" for="finding_` + dataArr[j].test_name
                            .replace(/ /g, "_")+dataArr[j].label.replace(/ /g, "_")+dataArr[j].categoryId+dataArr[j].panelId + `" id="fCheck_` +dataArr[j].test_name.replace(/ /g, "_")+dataArr[j].label.replace(/ /g, "_")+dataArr[j].categoryId+dataArr[j].panelId+ `"></label>&nbsp;
                                <input type="text" placeholder="Enter value" class="form-control form-control-sm m-1"  id="finding_` +
                                dataArr[j].test_name.replace(/ /g, "_")+dataArr[j].label.replace(/ /g, "_")+dataArr[j].categoryId+dataArr[j].panelId+ `" oninput="checkLowHigh(` +
                            dataArr[j].lower + `,` + dataArr[j].upper + `,'` +dataArr[j].test_name.replace(/ /g, "_")+dataArr[j].label.replace(/ /g, "_")+dataArr[j].categoryId+dataArr[j].panelId+ `')">
                            </div>
                        </td>
						                   <td>` + dataArr[j].unit + `</td>
						                   <td>` + dataArr[j].lower + `-` + dataArr[j].upper + `</td>
					                       </tr>`;
                            }//else
                            
                            
                        } //for j
                        
                        testList +=parameters+parmwithoutGroup;
                        testList +=`</table>
			                	    </div>
			                        </div>
                                    </div>`;
                    }//for i
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