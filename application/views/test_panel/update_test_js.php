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
        var subtypes_test = getSubtypesTest();
        var subtypesTestString = JSON.stringify(subtypes_test);
        var formdata = new FormData(this);
        formdata.append('subtypes_test', subtypesTestString);
        formdata.append('centerId',<?php echo $session_data['centerId']; ?>)
        if (returnVal) {
            $.ajax({

                url: '<?php echo base_url();?>add_test_user',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        swal("Good job!", response.Message, "success");
//                        window.location.reload();

                    } else {

                        swal("Error!", response.Message, "error");

                    }

                }

            });
        }
    });

</script>