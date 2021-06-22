<script>

    var userProductList = new Map();
    getUser();
    function getUserProduct() {
        $.ajax({

            url: 'productMapping',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
//                console.log(response);
                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            userProductList.set(response.data[i].upmId, response.data[i]);
                        }
                        showList(userProductList);
                    }

                }

            }

        });
    }
    getUserProduct();
    function showList(list) {

        $('#userProductTable').dataTable().fnDestroy();
        $('#userProductList').empty();
        var tblData = '';
        for (let k of list.keys()) {
            let userProduct = list.get(k);
            tblData += `
                    <tr>
                            <td>` + userProduct.upmId + `</td>
                            <td>` + userProduct.ownerName + `</td>
                            <td>` + userProduct.productName + `</td>
                            <td>` + userProduct.installationDate + `</td>
                            <td>` + userProduct.upcommingAmcDate + `</td>
                            
                            <td> <a href="#" onclick="getUserProducts(` + userProduct.upmId + `)" title="update User Product" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> &nbsp;&nbsp;&nbsp;
                                 <a href="#" onclick="getamcDetails( 0 ,` + userProduct.upmId + `)" title="AMC Details" ><i class="glyphicon glyphicon-hdd" style="font-size: 20px;"></i></a>
                            </td>
                    </tr>
                    `;
//            console.log(tblData);
        }
        $('#userProductList').html(tblData);
        $('#userProductTable').DataTable();
    }


    function getUserProducts(upmId) {
        $.ajax({

            url: 'productMapping/' + upmId,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response);

                if (response.status == 200) {
                    $('#uId').val(upmId);
                    $('#uuserId').val(response.data.userId);
                    $('#uproductId').val(response.data.productId);
                    $('#uinstallationDate').val(response.data.installationDate);
                    $('#uinstallationAmount').val(response.data.installationAmount);
                    $('#uamcAmountPerYear').val(response.data.amcAmountPerYear);
                    $('#uupcommingAmcDate').val(response.data.upcommingAmcDate);
                    $('#udescription').val(response.data.installationDescription);

                    $('#updateUserproductmodal').modal('toggle');
                }

            }

        });
    }




    $('#addUserproduct').click(function () {
        $("#addUserproductForm").trigger("reset");
        $('#uId').val('');
    });

    function getUser() {


        $.ajax({

            url: 'user',

            type: 'GET',

            async: false,

            dataType: 'json',

            success: function (response) {

                if (response.status == 200) {
                    var userlistData = '';
                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            userlistData += `<option value="` + response.data[i].id + `"> ` + response.data[i].owner_name + ` </option>`;
                        }

                    }
                    $('#userId').html(userlistData);
                    $('#uuserId').html(userlistData);
                }

            }

        });

    }


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
                    $('#productId').html(userlistData);
                    $('#uproductId').html(userlistData);
                }

            }

        });

    }
    getProduct();

    function getamcDetails(id, upmId) {
        $('#upm_id').val(upmId);
        
        $.ajax({

            url: 'amc/' + id + '/' + upmId,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
//                console.log(response);

                if (response.status == 200) {
                    var tList = ``;
                    for (var i = response.data.length-1; i>=0; i--) {
                        tList += `<tr>
                                        <td>` + response.data[i].amc_date + `</td>
                                        <td>` + response.data[i].amc_amount + `</td>
                                        <td>` + response.data[i].amc_remark + `</td>
                                    </tr>`;
                    }
                    $('#amctableList').html(tList);
                    $('#addAmcModal').modal('toggle');

                } else if (response.status == 404) {
                    $('#amcLi').remove();
                    $("#amcListTab").removeClass("active");
                    $('#addAMCTab').addClass("active");
                    $('#addAmcModal').modal('toggle');
                }

            }

        });
    }


</script>