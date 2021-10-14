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
    $('#total_amt').val(cases.total_amt);
    $('#paidAmt').html(cases.amt_recieved);
    $('#last_recieved_amt').val(cases.amt_recieved);
    $('#discountSpan').html(cases.discount);
    $('#discount').val(cases.discount);
    //$('#aftDiscAmt').html(cases.total_amt - cases.amt_recieved-cases.discount);
    $('#aftDiscAmt').html(cases.pending_amt);
    var test = cases.test;
    var tableDate = '';
    for (var i = 0; i < test.length; i++) {
    tableDate += `<tr id="r` + test[i].testId + `">
                        <td>` + test[i].testId + `</td>
                        <td>
                        ` + test[i].test_name + `
                            <input type="hidden" id="flag` + test[i].testId + `" value="` + test[i].outsource + `"/>
                       <input type="hidden" id="outAmt` + test[i].testId + `" value="` + test[i].outsourcetest.outsource_amt + `"/>
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
    checkOutsource();
    }


        function checkOutsource() {
        var fees = 0;
        var outSourceAmt = 0;
        var testId;
        var flag;


        $('#testTable tbody>tr').each(function (index, tr) {
            var tds = $(tr).find('td');
            testId = tds[0].textContent;
            fees += parseFloat(tds[3].textContent);

            flag = $('#flag' + testId).val();
            if (flag == 'true') {
                var temp = $('#outAmt' + testId).val();
                outSourceAmt += parseFloat(temp);
            }

        });

        $('#outsourceAmt').html(outSourceAmt);
        $('#myprofit').html(fees - outSourceAmt);

    }

</script>
