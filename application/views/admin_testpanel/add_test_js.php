<?php
$session_data = $this->session->userdata('lsesson');
?>

<script>
    var stypeRange = new Map();


    
    //add test all data 

    function getSubtypesTest() {
        var data = [];
        var parameter;
        var unitId;
        var i = 0;
        $('#subtypeTable tbody>tr').each(function (index, tr) {
            var tds = $(tr).find('td');
            parameter = tds[0].textContent;

            unitId = $('#hd' + parameter.replace(/ /g, "_")).val();

            data[i++] = {
                test_name: parameter,
                unitId: unitId,
                subtypes_test_ranges: stypeRange.get(parameter.replace(/ /g, "_"))
            }
        });
        return data;
    }

    $('#addTestForm').on('submit', function (e) {
        e.preventDefault();
        var returnVal = $("#addTestForm ").valid();
        var test=$('#testName').val();
        var subtypes_test = stypeRange.get(test.replace(/ /g, "_"));
        var subtypesTestString = JSON.stringify(subtypes_test);
        console.log(subtypesTestString);
        var formdata = new FormData(this);
        formdata.append('subtypes_test', subtypesTestString);
        
        if (returnVal) {
            $.ajax({

                url: '<?php echo base_url();?>add_panel_test_admin',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        swal("Good job!", response.Message, "success");
                        window.location.replace("<?php echo base_url('admin_test_panel'); ?>");

                    } else {

                        swal("Error!", response.Message, "error");

                    }

                }

            });
        }
    });

</script>