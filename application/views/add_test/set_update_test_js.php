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


        $('#testId').val(id);
        $('#categoryId').val(test.categoryId);
        $('#test_name').val(test.test_name);
        $('#short_name').val(test.short_name);
        $('#gender').val(test.gender);
        $('#fees').val(test.fees);

//        outsource lab
        //        outsource lab
        if (test.outsource) {
            $('#outsourceCheck').prop('checked', true);
            getOutsourceLab();
            $("#outsourcelabAmount").removeAttr("disabled");
            $("#outsourcelabId").removeAttr("disabled");
            $('#outsourcelabId').val(test.outsourcetest.outsource_lab_id);
            $('#outsourcelabAmount').val(test.outsourcetest.outsource_amt);
        }
        $('#method').val(test.method);
        $('#instrument').val(test.instrument);

        var paramTable = '';

        var subType = test.subtype_test;
        for (var i = 0; i < subType.length; i++) {
            paramTable += `<tr id="r` + subType[i].test_name.replace(/ /g, "_") + `">
                        <td>` + subType[i].test_name + `</td>
                        <td>` + subType[i].unitId + `
                                <input type="hidden" id="hd` + subType[i].test_name.replace(/ /g, "_") + `" value="` + subType[i].unitId + `"/>
                        </td>
                        <td>
                        <button class="btn btn-success btn-xs" onclick="addRange('` + subType[i].test_name.replace(/ /g, "_") + `')" type="button"><i class="fa fa-plus"></i> Add Range</button>
                        <button class="btn btn-danger btn-xs" onclick="deleteSubType('` + subType[i].test_name.replace(/ /g, "_") + `')" type="button"><i class="fa fa-trash-o"></i> Delete</button> 
                        </td>
                        </tr>`;


            var key = subType[i].test_name.replace(/ /g, "_");
            var range = subType[i].subtypes_test_ranges;
            if (range.length > 0) {
                if (stypeRange.has(key)) {
                    stypeRange.delete(key);
                    stypeRange.set(key, range);
                } else {
                    stypeRange.set(key, range);
                }
            }
        }
        $('#subtypeList').html(paramTable);
    }


</script>
