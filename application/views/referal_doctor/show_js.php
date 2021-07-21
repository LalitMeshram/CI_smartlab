<?php 
$session_data=$this->session->userdata('lsesson');
?>

<script>


    var refList = new Map();
    function getRefDr() {
        $.ajax({

            url: 'ref_list/'+<?php echo $session_data['centerId'];?>,

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            refList.set(response.data[i].ref_id, response.data[i]);

                        }
                        showList(refList);

                    }

                }

            }

        });
    }
    getRefDr();


    function showList(list) {
        $('#refTable').dataTable().fnDestroy();
        $('#refList').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let ref = list.get(k);
            tblData += `
                    <tr>
                            <td>` + ref.ref_id + `</td>
                            <td>` + (ref.ref_title+' '+ref.ref_name) + `</td>
                            <td>` + ref.ref_degree + `</td>
                            <td>` + ref.ref_contact + `</td>
                            <td> <a href="#" onclick="getRef(` + ref.ref_id + `)" title="update Outsource LAb" class="btn btn-success btn-xs" ><i class="fa fa-edit"></i></a> </td>
                    </tr>
                    `;
        }

        $('#refList').html(tblData);
        $('#refTable').DataTable();
    }


    function getRef(id) {
        reff=refList.get(id.toString());
       $('#ref_id').val(id);
        $('#ref_name').val(reff.ref_name);
        $('#ref_degree').val(reff.ref_degree);
        $('#ref_contact').val(reff.ref_contact);
        $('#ref_email').val(reff.ref_email);
        $('#ref_address').val(reff.ref_address);
        $('#add_ref').modal('toggle');
    }




$('#addNew').click(function() {
        $('#add_ref').modal('toggle');
        
    });


</script>