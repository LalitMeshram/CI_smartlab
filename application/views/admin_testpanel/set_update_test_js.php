<script>
    var testList;
    function getTestList() {
        testList = new Map(JSON.parse(localStorage.myMap));
        
        setTest();
    }
    getTestList();

    function setTest() {
        var id =<?php echo $id; ?>;
        id = id.toString();
        var test = testList.get(id);
        console.log(test);

        $('#testName').val(test.testName);
        $('#panelId').val(test.panelId);
        $('#unitId').val(test.unitId);
        
        var paramTable = '';

        
        
            paramTable += `<tr id="r` + test.testName.replace(/ /g, "_").replace(/[{()}]/g, '_') + `">
                        <td>` + test.testName + `</td>
                        <td>` + test.unit + `
                                <input type="hidden" id="hd` + test.testName.replace(/ /g, "_").replace(/[{()}]/g, '_') + `" value="` + test.unitId + `"/>
                        </td>
                        <td>
                        <button class="btn btn-success btn-xs" onclick="addRange('` + test.testName.replace(/ /g, "_").replace(/[{()}]/g, '_') + `')" type="button"><i class="fa fa-plus"></i> Add Range</button>
                        <button class="btn btn-danger btn-xs" onclick="deleteSubType('` + test.testName.replace(/ /g, "_").replace(/[{()}]/g, '_') + `')" type="button"><i class="fa fa-trash-o"></i> Delete</button> 
                        </td>
                        </tr>`;


            var key = test.testName.replace(/ /g, "_").replace(/[{()}]/g, '_');
            var range = test.subtypes_test_ranges;
            if (range.length > 0) {
                if (stypeRange.has(key)) {
                    stypeRange.delete(key);
                    stypeRange.set(key, range);
                } else {
                    stypeRange.set(key, range);
                }
            }
       
        $('#subtypeList').html(paramTable);
    }


</script>
