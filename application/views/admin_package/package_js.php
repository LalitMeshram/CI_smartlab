<?php
$session_data = $this->session->userdata('lsesson');
?>

<script>


    var pkgList = new Map();
    function getPackage() {
        $.ajax({

            url: 'get_packages',

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            pkgList.set(response.data[i].packageId, response.data[i]);

                        }
                        showList(pkgList);

                    }

                }

            }

        });
    }
    getPackage();


    function showList(list) {
        $('#pkgTable').dataTable().fnDestroy();
        $('#pkgList').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let pkg = list.get(k);
            var features='';
            for(var i=0;i<pkg.package_details.length;i++){
                features+=pkg.package_details[i].details;
                if(i!=pkg.package_details.length-1){
                    features+=' , ';
                }
            }
            tblData += `
                    <tr>
                            <td>` + pkg.packageId + `</td>
                            <td>` + pkg.plan_name + `</td>
                            <td>` + pkg.duration + `</td>
                            <td>` + features + `</td>
                            <td> <a href="create_package/` + pkg.packageId + `"  title="update Patient" class="btn btn-success btn-xs" ><i class="fa fa-edit"></i></a> </td>
                    </tr>
                    `;
        }

        $('#pkgList').html(tblData);
        $('#pkgTable').DataTable();
    }


    




    $('#addNew').click(function () {
        $("#categoryForm").trigger("reset");
        $('#add_category').modal('toggle');

    });


</script>