<script>
    var productInvestmentList = new Map();
    function getUser() {
        $.ajax({

            url: 'investment',

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            productInvestmentList.set(response.data[i].id, response.data[i]);
                        }
                        showList(productInvestmentList);

                    }

                }

            }

        });
    }
    getUser();


    function showList(list) {

        $('#productInvestmentTable').dataTable().fnDestroy();
        $('#productInvestmentList').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let productinvest = list.get(k);
            switch (productinvest.status) {
                case 'START':
                    badge = 'badge-info';
                    break;
                case 'RUNNING':
                    badge = 'badge-primary';
                    break;
                case 'DONE':
                    badge = 'badge-success';
                    break;
                case 'HOLD':
                    badge = 'badge-warning';
                    break;
                case 'CANCEL':
                    badge = 'badge-danger';
                    break;

            }

            tblData += `
                    <tr>
                            <td>` + productinvest.id + `</td>
                            <td>` + productinvest.dev_point + `</td>
                            <td>` + productinvest.deadline + `</td>
                            <td>` + productinvest.start_date + `</td>
                            <td><span class="badge ` + badge + `">` + productinvest.status + `</span></td>
                            <td> <a href="#" onclick="getUsers(` + productinvest.id + `)" title="update Product Investment" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> </td>
                    </tr>
                    `;
        }

        $('#productInvestmentList').html(tblData);
        $('#productInvestmentTable').DataTable();
    }


    function getUsers(id) {
        $.ajax({

            url: 'investment/' + id,

            type: 'GET',

            dataType: 'json',

            success: function (response) {
                console.log(response);

                if (response.status == 200) {
                    $('#uId').val(id);
                    $('#udev_point').val(response.data.dev_point);
                    $('#ustatus').val(response.data.status);
                    $('#udescription').val(response.data.description);
                    $('#udeadline').val(response.data.deadline);
                    $('#uinvestment').val(response.data.investment);
                    $('#ustart_date').val(response.data.start_date);
                    $('#uclose_date').val(response.data.close_date);
//                    (response.data.is_active == 1) ? $("#uactive").attr('checked', 'checked') : $("#uinactive").attr('checked', 'checked');

                    $('#updateProductinvestModal').modal('toggle');

                }

            }

        });
    }




    $('#addProductInvestment').click(function () {
        $("#addProductInvestForm").trigger("reset");
        $('#uId').val('');
    });



//get productt
    function getProduct() {


        $.ajax({

            url: 'products',

            type: 'GET',

            dataType: 'json',

            success: function (response) {

                if (response.status == 200) {
                    var userlistData = '';
                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            userlistData += `<option value="` + response.data[i].id + `"> ` + response.data[i].name + ` </option>`;
                        }

                    }
                    $('#product_id').html(userlistData);
                    $('#uproduct_id').html(userlistData);
                }

            }

        });

    }
    getProduct();
</script>