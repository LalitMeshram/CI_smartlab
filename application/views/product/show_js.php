<script>
    var productList = new Map();
    function getProducts() {
        $.ajax({

            url: 'products',

            type: 'GET',

            dataType: 'json',

            success: function (response) {
                console.log(response);

                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            productList.set(response.data[i].id, response.data[i]);
                        }
                        showList(productList);

                    }

                }

            }

        });
    }
    getProducts();


    function showList(list) {

        $('#productTable').dataTable().fnDestroy();
        $('#productList').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let product = list.get(k);
            switch (product.is_active) {
                case '1':
                    status = '<span class="badge badge-pill badge-primary">Active</span>';
                    break;

                case '0':
                    status = '<span class="badge badge-pill badge-danger">Inactive</span>';
                    break;

            }

            tblData += `
                    <tr>
                            <td>` + product.id + `</td>
                            <td>` + product.name + `</td>
                            <td>` + product.technology + `</td>
                            <td>` + status + `</td>
                            <td>` + product.created_at + `</td>
                            <td> <a href="#" onclick="getProduct(` + product.id + `)" title="update `+product.name+`" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> </td>
                    </tr>
                    `;
        }

        $('#productList').html(tblData);
        $('#productTable').DataTable();
    }


    function getProduct(id) {
        $.ajax({

            url: 'products/'+id,

            type: 'GET',

            dataType: 'json',

            success: function (response) {
//                console.log(response);

                if (response.status == 200) {
                    $('#pId').val(id);
                    $('#uname').val(response.data.name);
                    $('#utype').val(response.data.type);
                    $('#utechnology').val(response.data.technology);
                    $('#udescription').val(response.data.description);
                    (response.data.web==1)? $('#uweb').prop('checked', true):$('#uweb').prop('checked', false);
                    (response.data.android==1)? $('#uandroid').prop('checked', true):$('#uandroid').prop('checked', false);
                    (response.data.is_active==1)? $("#uactive").attr('checked', 'checked'):$("#uinactive").attr('checked', 'checked');
                    
                    $('#updateProductModal').modal('toggle');

                }

            }

        });
    }




$('#addProduct').click(function() {
    $("#addProductForm").trigger("reset");
    $('#pId').val('');
    });

</script>