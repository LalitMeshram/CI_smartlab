<?php
$session_data = $this->session->userdata('lsesson');
?>

<script>

    //add test all data 

    function getTestDetails() {
        var data = [];
        var testId;
        var i = 0;
        $('#testTable tbody>tr').each(function (index, tr) {
            var tds = $(tr).find('td');
            testId = tds[0].textContent;


            data[i++] = {
                testId: testId
            }
        });
        return data;
    }

    $('#createCaseForm').on('submit', function (e) {
        e.preventDefault();
        var returnVal = $("#createCaseForm ").valid();
        var test_data = getTestDetails();
        var TestString = JSON.stringify(test_data);
        var formdata = new FormData(this);
        formdata.append('test_data', TestString);
        formdata.append('centerId',<?php echo $session_data['centerId']; ?>)
        if (returnVal) {
            $.ajax({

                url: '<?php echo base_url()?>add_new_case',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        swal("Good job!", response.Message, "success");
                        //window.location.replace("<?php echo base_url('all_cases');?>");
                        
                        setTimeout(function(){ location.reload(); }, 3000);

                    } else {

                        swal("Error!", response.Message, "error");

                    }

                }

            });
        }
    });

</script>