<script>

    $('#cityorhighway').prop('disabled', true);
    $('#searchButton').prop('disabled', true);


    var userList = new Map();
    var highwayList = [];
    var cityList = [];

    function getUser() {
        $.ajax({

            url: 'user',

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            userList.set(response.data[i].id, response.data[i]);
                            highwayList[i] = response.data[i].highway;
                            cityList[i] = response.data[i].city;
                        }
                        showList(userList);
                        console.log(highwayList);
                        console.log(cityList);
                    }

                }

            }

        });
    }
    getUser();


    function showList(list) {

        $('#userTable').dataTable().fnDestroy();
        $('#userList').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let users = list.get(k);
            switch (users.is_active) {
                case '1':
                    status = '<span class="badge badge-pill badge-primary">Active</span>';
                    break;

                case '0':
                    status = '<span class="badge badge-pill badge-danger">Inactive</span>';
                    break;

            }

            tblData += `
                    <tr>
                            <td>` + users.id + `</td>
                            <td>` + users.business_name + `</td>
                            <td>` + users.owner_name + `</td>
                            <td>` + users.emailid + `</td>
                            <td>` + users.contact1 + `</td>
                            <td>` + users.city + `</td>
                            <td>` + users.highway + `</td>
                            <td>` + status + `</td>
                            <td>` + users.created_at + `</td>
                            <td> <a href="#" onclick="getUsers(` + users.id + `)" title="update User" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> </td>
                    </tr>
                    `;
        }

        $('#userList').html(tblData);
        $('#userTable').DataTable();
    }


    function getUsers(id) {
        $.ajax({

            url: 'user/' + id,

            type: 'GET',

            dataType: 'json',

            success: function (response) {
//                console.log(response);

                if (response.status == 200) {
                    $('#uId').val(id);
                    $('#ubusiness_name').val(response.data.business_name);
                    $('#uowner_name').val(response.data.owner_name);
                    $('#uemailid').val(response.data.emailid);
                    $('#ucontact1').val(response.data.contact1);
                    $('#ucontact2').val(response.data.contact2);
                    $('#uaddress').val(response.data.address);
                    $('#uhighway').val(response.data.highway);
                    $('#ucity').val(response.data.city);
                    (response.data.is_active == 1) ? $("#uactive").attr('checked', 'checked') : $("#uinactive").attr('checked', 'checked');

                    $('#updateUserModal').modal('toggle');

                }

            }

        });
    }




    $('#addUser').click(function () {
        $("#addUserForm").trigger("reset");
        $('#uId').val('');
    });



    $("input[name='group']").change(function () {
        var optionList = '';
        var radioValue = $("input[name='group']:checked").val();
        if (radioValue == 'highway') {
            $('#cityorhighway').prop('disabled', false);
            $('#searchButton').prop('disabled', false);
            for (var i = 0; i < highwayList.length; i++)
            {
                optionList += `<option value="` + highwayList[i] + `">` + highwayList[i] + `</option>`;
            }

            $('#cityorhighway').html(optionList);
        } else if (radioValue == 'city') {
            $('#cityorhighway').prop('disabled', false);
            $('#searchButton').prop('disabled', false);
//            alert(radioValue);
            for (var i = 0; i < cityList.length; i++)
            {
                optionList += `<option value="` + cityList[i] + `">` + cityList[i] + `</option>`;
            }

            $('#cityorhighway').html(optionList);
        }


    });


</script>