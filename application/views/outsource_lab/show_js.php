<?php 
$session_data=$this->session->userdata('lsesson');
?>

<script>


    var outsourceList = new Map();
    function getPatients() {
        $.ajax({

            url: 'outsource_lab_list/'+<?php echo $session_data['centerId'];?>,

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            outsourceList.set(response.data[i].outsource_lab_id, response.data[i]);

                        }
                        showList(outsourceList);

                    }

                }

            }

        });
    }
    getPatients();


    function showList(list) {
        $('#outsourceTable').dataTable().fnDestroy();
        $('#outsourceList').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let category = list.get(k);
            tblData += `
                    <tr>
                            <td>` + category.outsource_lab_id + `</td>
                            <td>` + category.lab_name + `</td>
                            <td> <a href="#" onclick="getLab(` + category.outsource_lab_id + `)" title="update Outsource LAb" class="btn btn-success btn-xs" ><i class="fa fa-edit"></i></a> </td>
                    </tr>
                    `;
        }

        $('#outsourceList').html(tblData);
        $('#outsourceTable').DataTable();
    }


    function getLab(id) {
        out=outsourceList.get(id.toString());
       $('#outsource_lab_id').val(id);
        $('#lab_name').val(out.lab_name);
        $('#add_lab').modal('toggle');
    }




$('#addNew').click(function() {
        $('#add_lab').modal('toggle');
        
    });


</script>