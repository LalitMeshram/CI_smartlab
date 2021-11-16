<script>
$('#addSubtypebtn').click(function() {
    
    var testArr = $('#testSelectBox').val();
    var testStr = '';
    var groupName = '-';
    var isGroup = 0;

    //alert(testArr.length);   
    if ($("#isGroup").prop('checked') == true) {
        isGroup = 1;
        groupName = $('#groupName').val();
    }
    

    //get test list
    for (var i = 0; i < testArr.length; i++) {
        let test = testPanelList.get(testArr[i].toString());
        testStr += test.testName;
        if (i != testArr.length - 1) {
            testStr += ',';
        }

    }
    //get isGroup checked or not

    

    //create id for row
    var regex = /[.,\s]/g;
    var id = testStr.replace(regex, '');
    id = id.replace(/[{()}]/g, '_');

    var tableData = '';

    if (testArr != 0) {
        if(testArr.length==1 && isGroup==0){
            if (!($('#r' + id).length)) {
            tableData += $('#subtypeTable tbody').html();
            tableData += `<tr id="r` + id + `">
                        <td>` + groupName + `</td>
                        <td>` + testStr + `                      
                        </td>
                        <td>
                        <input type="hidden" id="harr` + id + `" value="` + testArr + `">  
                            <input type="hidden" id="hgroup` + id + `" value="` + isGroup + `"> 
                            <input type="hidden" id="hgName` + id + `" value="` + groupName + `">
                        <button class="btn btn-danger btn-xs" onclick="deleteSubType('` + id + `')" type="button"><i class="fa fa-trash-o"></i> Delete</button> 
                        </td>
                        </tr>`;

            $('#subtypeList').html(tableData);

        }
        }else if(testArr.length>1 && isGroup==1){
            if (!($('#r' + id).length)) {
            tableData += $('#subtypeTable tbody').html();
            tableData += `<tr id="r` + id + `">
                        <td>` + groupName + `</td>
                        <td>` + testStr + `                      
                        </td>
                        <td>
                        <input type="hidden" id="harr` + id + `" value="` + testArr + `">  
                            <input type="hidden" id="hgroup` + id + `" value="` + isGroup + `"> 
                            <input type="hidden" id="hgName` + id + `" value="` + groupName + `">
                        <button class="btn btn-danger btn-xs" onclick="deleteSubType('` + id + `')" type="button"><i class="fa fa-trash-o"></i> Delete</button> 
                        </td>
                        </tr>`;

            $('#subtypeList').html(tableData);

        }
        }else{
            alert('For Multiple Test please select isGroup and provide group Name');
        }

        
    }

    //remove data 
    $("#testSelectBox").val("");
    $("#testSelectBox").trigger("change");
    $('#isGroup').prop('checked', false);
    $('#groupName').val("");
    $('#groupName').attr('readonly', true);

});

function deleteSubType(id) {
    $('#r' + id).remove();
    if (stypeRange.has(id)) {
        stypeRange.delete(id);
    }
}

function addRange(key) {

    if (stypeRange.has(key)) {
        var range = stypeRange.get(key);
        var tableData = '';
        var d = new Date();
        var n = d.getTime();

        for (var i = 0; i < range.length; i++) {
            tableData += `<tr id="l` + n + `">
                        <td>` + range[i].gender + `</td>
                        <td>` + range[i].lower_age + " " + range[i].lower_age_period + `</td>
                        <td>` + range[i].upper_age + " " + range[i].upper_age_period + `</td>
                        <td>` + range[i].lower_limit + `</td>
                        <td>` + range[i].upper_limit + `</td>
                        <td>` + range[i].words + `</td>
                        <td>
                        <button class="btn btn-danger btn-xs" onclick="deleteRange('` + n + `')"><i class="fa fa-trash-o"></i> Delete</button> 
                        </td>
                        </tr>`;
        }

        $('#rangeList').html(tableData);

    } else {
        $('#rangeList').html('');
    }


    $('#add_range').modal('toggle');
    $('#param_subtype_id').val(key);
}
</script>