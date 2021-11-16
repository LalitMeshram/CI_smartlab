<?php 
$session_data=$this->session->userdata('lsesson');
?>


<script>



    var testList = new Map();
    function getTests() {
        $.ajax({

            url: '<?php echo base_url();?>get_center_tests/'+<?php echo $session_data['centerId'];?>,

            type: 'GET',
            
            async:false,

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            testList.set(response.data[i].testId, response.data[i]);

                        }
                        showTestList(testList);

                    }

                }

            }

        });
    }
    getTests();


    function showTestList(list) {
        var option = '';
        for (let k of list.keys()) {
            let test = list.get(k);
            option += `
                    <option value="`+test.testId+`">`+test.test_name+((test.short_name!='')?'(':'')+test.short_name+((test.short_name!='')?')':'')+`</option>
                    `;
        }

        $('#test').html(option);
    }








</script>

