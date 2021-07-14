<?php 
$session_data=$this->session->userdata('lsesson');
?>

<script>


    var categoryList = new Map();
    function getPatients() {
        $.ajax({

            url: 'get_center_category/'+<?php echo $session_data['centerId'];?>,

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            categoryList.set(response.data[i].categoryid, response.data[i]);

                        }
                        showList(categoryList);

                    }

                }

            }

        });
    }
    getPatients();


    function showList(list) {
        $('#categoryTable').dataTable().fnDestroy();
        $('#categoryList').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let category = list.get(k);
            tblData += `
                    <tr>
                            <td>` + category.categoryid + `</td>
                            <td>` + category.category + `</td>
                            <td> <a href="#" onclick="getUsers(` + category.categoryid + `)" title="update Patient" class="btn btn-success btn-xs" ><i class="fa fa-edit"></i></a> </td>
                    </tr>
                    `;
        }

        $('#categoryList').html(tblData);
        $('#categoryTable').DataTable();
    }


    function getUsers(id) {
        $.ajax({

            url: 'get_patients/' + id,

            type: 'GET',

            dataType: 'json',

            success: function (response) {
//                console.log(response);

                if (response.status == 200) {
                    
                    $('#add_category').modal('toggle');
                }

            }

        });
    }




$('#addNew').click(function() {
        $('#add_category').modal('toggle');
        
    });


</script>