<script>

    $('#addTestbtn').click(function () {
        $('#trNaN').remove();

        var testId = $('#test').val();
        var test = testList.get(testId);
//        alert(testId);
        var tableData = '';
        if (testId != '') {

            if (!($('#r' + testId).length)) {
                tableData += $('#testTable tbody').html();
                tableData += `<tr id="r` + testId + `">
                        <td>` + testId + `</td>
                        <td>
                        ` + test.test_name + `
                       <input type="hidden" id="flag` + testId + `" value="` + test.outsource + `"/>
                       <input type="hidden" id="outAmt` + testId + `" value="` + test.outsourcetest.outsource_amt + `"/>
                        </td>
                        <td>` + test.category + `
                        </td>
                        <td>` + test.fees + `
                        </td>
                        <td>
                        <button class="btn btn-danger btn-xs" onclick="deleteTest('` + testId + `')" type="button"><i class="fa fa-trash-o"></i> Delete</button> 
                        </td>
                        </tr>`;

                $('#testList').html(tableData);
                setTotalBilledAmt();





            }
        }



    });

    function deleteTest(id) {
        $('#r' + id).remove();
        var rowCount = $("#testTable tbody tr").length;
        if (rowCount == 0) {


            $('#discount').attr('readonly', true);


            var tableData = `<tr id="trNaN">
                   <td colspan="5" align="center">Data not present</td>
                    </tr>`;
            $('#testList').html(tableData);


            $('#total_amt').val(0);
            $('#tbillAmt').html(0);
            $('#aftDiscAmt').html(0);
            $('#outsourceAmt').html(0);
            $('#myprofit').html(0);


        } else {
            setTotalBilledAmt();
        }

        $('#discount').val(0);
        $('#receivedAmt').val(0);
        $('#amtReceived').html(0);
        $('#pendingAmt').html(0);

    }

    function setTotalBilledAmt() {
        var fees = 0;
        var outSourceAmt = 0;
        var testId;
        var flag;
        var receivedAmt;
        var rowCount = $("#testTable tbody tr").length;

        if (rowCount > 0) {
            $('#discount').attr('readonly', false);
        }

        $('#total_amt').val(0);
        $('#tbillAmt').html(0);
        $('#aftDiscAmt').html(0);
        $('#outsourceAmt').html(0);
        $('#myprofit').html(0);
        


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
        $('#total_amt').val(fees);
        $('#tbillAmt').html(fees);
        
        //payable amount
        receivedAmt=parseFloat($('#paidAmt').html());
        
        if(receivedAmt>0){
            
        $('#aftDiscAmt').html(fees-receivedAmt);
        }else{
            
        $('#aftDiscAmt').html(fees);
        }
        $('#outsourceAmt').html(outSourceAmt);
        $('#myprofit').html(fees - outSourceAmt);

    }


    $('#discount').on('change', function () {
        var discount = parseFloat(this.value);
        var tbillAmt = parseFloat($('#tbillAmt').html());
        var outSourceAmt = parseFloat($('#outsourceAmt').html());
        $('#aftDiscAmt').html(tbillAmt - discount);
        $('#myprofit').html((tbillAmt - outSourceAmt) - discount);
    });

    $('#receivedAmt').on('change', function () {
        var receivedAmt = parseFloat(this.value);
        var aftAmt = parseFloat($('#aftDiscAmt').html());
        $('#amtReceived').html(receivedAmt);
        $('#pendingAmt').html(aftAmt - receivedAmt);
    });


</script>