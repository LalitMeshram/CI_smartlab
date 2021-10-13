<?php
$session_data = $this->session->userdata('lsesson');
?>

<script>
var stypeRange = new Map();


$('#outsourceCheck').click(function() {
    if ($(this).prop("checked") == true) {
        $("#outsourcelabAmount").removeAttr("disabled");
        $("#outsourcelabId").removeAttr("disabled");
    } else if ($(this).prop("checked") == false) {
        $("#outsourcelabAmount").attr("disabled", "disabled");
        $("#outsourcelabId").attr("disabled", "disabled");
    }
});

//add test all data 

function getSubtypesTest() {
    var data = [];
    var gName = '';
    var isGroup = 0;
    var testarr;
    var testStr = '';
    var regex = /[.,\s]/g;
    var id;
    var flag_sequence=1;
    var i = 0;
    $('#subtypeTable tbody>tr').each(function(index, tr) {
        var tds = $(tr).find('td');
        testStr = tds[1].textContent;
        id = testStr.replace(regex, '');
        gName = $('#hgName' + id).val();
        isGroup = $('#hgroup' + id).val();
        testarr = JSON.parse("[" + $('#harr' + id).val() + "]");
console.log('@@@@@@@@@@@@@@Test Array@@@@@@@@@@');
console.log(testarr);
        for (var j = 0; j < testarr.length; j++) {
            var flag_temp=0;
            if(isGroup==1){
               flag_temp=flag_sequence;
               
            }
            data[i++] = {
                jsid:id,
                panelId: testarr[j],
                isgroup: isGroup,
                label: gName,
                flag_sequence: flag_temp
            }
        }
        flag_sequence++;

    });
    return data;
}

$('#addTestForm').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#addTestForm ").valid();
    var subtypes_test = getSubtypesTest();
    //console.log('@@@@@@@@Test############');
    //console.log(subtypes_test);
    var subtypesTestString = JSON.stringify(subtypes_test);
    var formdata = new FormData(this);
    formdata.append('subtypes_test', subtypesTestString);
   
    if (returnVal) {
        $.ajax({

            url: '<?php echo base_url();?>add_lab_test',

            type: 'POST',

            data: formdata,

            cache: false,

            contentType: false,

            processData: false,

            dataType: 'json',

            success: function(response) {
                if (response.status == 200) {
                    swal("Good job!", response.Message, "success");
                    window.location.replace("<?php echo base_url('test_predefined_database');?>");

                } else {

                    swal("Error!", response.Message, "error");

                }

            }

        });
    }
});
</script>