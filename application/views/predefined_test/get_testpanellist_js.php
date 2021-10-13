<?php
$session_data = $this->session->userdata('lsesson');
?>

<script>

    var testPanelList = new Map();
//get All Test panel list

    function getTestPanelList() {
        $.ajax({

            url: '<?php echo base_url();?>get_panel_test_admin',

            type: 'GET',

            dataType: 'json',
            async:false,

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            testPanelList.set(response.data[i].panelId, response.data[i]);

                        }
                        showCatList(testPanelList);

                    }

                }

            }

        });
    }
    getTestPanelList();


    function showCatList(list) {
        var option = '';
        for (let k of list.keys()) {
            let test = list.get(k);
            option += `
            <option value="` + test.panelId + `">` + test.testName + `</option>
                    `;
        }

        $('#testSelectBox').html(option);
    }

</script>