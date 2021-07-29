<script>

    $('#addTestbtn').click(function () {
        $('#trNaN').remove();
        
        var testId = $('#test').val();
        var test = testList.get(testId);
//        alert(testId);
        console.log(test);
        var tableData = '';
        if (testId != '') {
            
            if (!($('#r' + testId).length)) {
                tableData += $('#testTable tbody').html();
                tableData += `<tr id="r` + testId + `">
                        <td>
                        ` + test.test_name + `
                       <input type="hidden" id="hd` + testId + `" value="` + testId + `"/>
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






            } 
        }



    });

    function deleteTest(id) {
        $('#r' + id).remove();
       var rowCount = $("#testTable tbody tr").length;
//            alert(rowCount); 
        if (rowCount==0) {
          var tableData=`<tr id="trNaN">
                   <td colspan="4" align="center">Data not present</td>
                    </tr>`;
            $('#testList').html(tableData);
        }
    }


</script>