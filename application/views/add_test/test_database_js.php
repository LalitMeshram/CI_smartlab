<?php
$session_data = $this->session->userdata('lsesson');
?>

<script>


    var testList = new Map();
    function getTestList() {
        $.ajax({

            url: 'get_center_tests/' +<?php echo $session_data['centerId']; ?>,

            type: 'GET',

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
    getTestList();


    function showTestList(list) {
        $('#testTable').dataTable().fnDestroy();
        $('#testList').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let test = list.get(k);
            tblData += `
                    <tr>
							<td>`+test.test_name+`</td>
							<td>`+test.short_name+`</td>
							<td>`+test.categoryId+`</td>
							<td>`+test.gender+`</td>
							<td>`+test.fees+`</td>
							<td>
                                                        <a href="#" onclick="getTest(` + test.testId + `)" title="update Test" class="btn btn-success btn-xs" ><i class="fa fa-edit"></i></a>
                                                        <a href="#" onclick="getTest(` + test.testId + `)" title="delete Test" class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i></a>
                                                         </td>
						</tr>
                    `;
        }

        $('#testList').html(tblData);
        $('#testTable').DataTable();
    }


    function getTest(id) {
    localStorage.myMap = JSON.stringify(Array.from(testList.entries()));
    window.location.replace("update_test/"+id);
    }




    $('#addNew').click(function () {
        $("#categoryForm").trigger("reset");
        $('#add_category').modal('toggle');

    });


</script>