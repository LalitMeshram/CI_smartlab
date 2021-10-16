<?php
$session_data = $this->session->userdata('lsesson');
?>

<script>


    var categoryList = new Map();
    function getPatients() {
        $.ajax({

            url: '<?php echo base_url("get_lab_unit");?>',

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            categoryList.set(response.data[i].unitId, response.data[i]);

                        }
                        showList(categoryList);

                    }

                }

            }

        });
    }
    getPatients();


    function showList(list) {
        $('#unitTable').dataTable().fnDestroy();
        $('#unitList').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let category = list.get(k);
            tblData += `
                    <tr>
                            <td>` + category.unitId + `</td>
                            <td>` + category.unit + `</td>
                            <td> <a href="#" onclick="getUsers(` + category.unitId + `)" title="update Patient" class="btn btn-success btn-xs" ><i class="fa fa-edit"></i></a> </td>
                    </tr>
                    `;
        }

        $('#unitList').html(tblData);
        $('#unitTable').DataTable();
    }


    function getUsers(id) {
        var cat = categoryList.get(id.toString());
        $('#unitId').val(id);
        $('#unit').val(cat.unit);
        $('#add_unit').modal('toggle');

    }




    $('#addNew').click(function () {
        $("#unitForm").trigger("reset");
        $('#add_unit').modal('toggle');

    });


</script>