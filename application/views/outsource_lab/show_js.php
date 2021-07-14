<?php 
$session_data=$this->session->userdata('lsesson');
?>

<script>


    var categoryList = new Map();
    function getPatients() {
        $.ajax({

            url: 'outsource_lab_list/'+<?php echo $session_data['centerId'];?>,

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
        $.ajax({

            url: 'get_patients/' + id,

            type: 'GET',

            dataType: 'json',

            success: function (response) {
//                console.log(response);

                if (response.status == 200) {
                    
                    $('#add_unit').modal('toggle');
                }

            }

        });
    }




$('#addNew').click(function() {
        $('#add_lab').modal('toggle');
        
    });


</script>