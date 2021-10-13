<script>
var testList;
var tempMap =[];

function getTestList() {
    testList = new Map(JSON.parse(localStorage.myMap));
    console.log(testList);
    setTest();
}
getTestList();

function setTest() {
    var id = <?php echo $id; ?>;
    id = id.toString();
    var test = testList.get(id);


    $('#testId').val(id);
    $('#categoryId').val(test.categoryId);
    $('#test_name').val(test.test_name);
    $('#short_name').val(test.short_name);
    $('#gender').val(test.gender);
    $('#fees').val(test.fees);
    console.log(test.desc_text);
    $('#editor1').val(test.desc_text);

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
        var tableData = '';
        var testStr = '';
        var testArr = '';
        var jsid = subType[i].jsid;
             tableData += `<tr id="r` + subType[i].jsid + `">`;
             tableData += `<td>` + subType[i].label + ` </td>`;
        if (subType[i].isgroup == '1') {

            for (var j = 0; j < subType.length; j++) {

                if (subType[i].label == subType[j].label) {
                    testStr += subType[j].testName+' ';
                    testArr += subType[j].panelId+' ';
                }
                
            }

        } else {
            testStr += subType[i].testName;
            testArr += subType[i].panelId;
        }

        testStr=testStr.trim().replace(/ /g, ",");
        testArr=testArr.trim().replace(/ /g, ",");
        

        tableData += `<td>` + testStr + ` </td>`;
        tableData += `<td>
                        <input type="hidden" id="harr` + jsid + `" value="` + testArr + `">  
                            <input type="hidden" id="hgroup` + jsid + `" value="` + subType[i].isgroup + `"> 
                            <input type="hidden" id="hgName` + jsid + `" value="` + subType[i].label + `">
                        <button class="btn btn-danger btn-xs" onclick="deleteSubType('` + subType[i].jsid + `')" type="button"><i class="fa fa-trash-o"></i> Delete</button> 
                        </td>
                        </tr>`;
        //console.log(tableData);
        //$('#subtypeList').html(tableData);
        tempMap[i]=tableData;
        setSubTypeList(tempMap);
    }
   
}


function setSubTypeList(list) {
    var tableData ='';
    const uniqueArr = [...new Set(list)];
   // console.log(uniqueArr);
    for(var i=0;i<uniqueArr.length;i++) {
        tableData +=uniqueArr[i];
    }
    
    $('#subtypeList').html(tableData.toString());
}
</script>