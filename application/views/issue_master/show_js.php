<script>
    var issueList = new Map();
    function getUser() {
        $.ajax({

            url: 'issue',

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            issueList.set(response.data[i].im_id, response.data[i]);
                        }
                        showList(issueList);

                    }

                }

            }

        });
    }
    getUser();


    function showList(list) {

        $('#issueTable').dataTable().fnDestroy();
        $('#issueList').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let issue = list.get(k);
            
            switch (issue.status) {
                            case 'PENDING':
                                badge='badge-info';
                                break;
                            case 'RUNNING':
                                badge='badge-primary';
                                break;
                            case 'DONE':
                                badge='badge-success';
                                break;
                            case 'HOLD':
                                badge='badge-warning';
                                break;
                            case 'REJECTED':
                                badge='badge-danger';
                                break;
                        }
            
            
            
            tblData += `
                    <tr>
                            <td>` + issue.im_id + `</td>
                            <td>` + issue.owner_name + `</td>
                            <td>` + issue.product_name + `</td>
                            <td>` + issue.issue + `</td>
                            <td><span class="badge `+badge+`">` + issue.status +`</span></td>
                            <td>` + issue.call_date + `</td>
                            <td>` + issue.start_date + `</td>
                            <td> <a href="#" onclick="getUsers(` + issue.im_id + `)" title="update Issue Master" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> </td>
                    </tr>
                    `;
        }

        $('#issueList').html(tblData);
        $('#issueTable').DataTable();
    }


    function getUsers(im_id) {
        $.ajax({

            url: 'issue/' + im_id,

            type: 'GET',

            dataType: 'json',

            success: function (response) {
                console.log(response);

                if (response.status == 200) {
                    $('#uId').val(im_id);
                    $('#uclient_id').val(response.data.client_id);
                    $('#uproduct_id').val(response.data.product_id);
                    $('#uissue').val(response.data.issue);
                    $('#ucall_date').val(response.data.call_date);
                    $('#usolution').val(response.data.solution);
                    $('#ustatus').val(response.data.status);
                    $('#ustart_date').val(response.data.start_date);
                    $('#uclose_date').val(response.data.close_date);
//                    (response.data.is_active == 1) ? $("#uactive").attr('checked', 'checked') : $("#uinactive").attr('checked', 'checked');

                    $('#updateIssuemasterModal').modal('toggle');

                }

            }

        });
    }




    $('#addIssuemaster').click(function () {
        $("#addIssuemasterForm").trigger("reset");
        $('#uId').val('');
    });
    


//get client

function getClient() {


        $.ajax({

            url: 'user',

            type: 'GET',

            dataType: 'json',

            success: function (response) {

                if (response.status == 200) {
                    var userlistData = '';
                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            userlistData += `<option value="` + response.data[i].id + `"> ` + response.data[i].owner_name + ` </option>`;
                        }

                    }
                    $('#client_id').html(userlistData);
                    $('#uclient_id').html(userlistData);
                }

            }

        });

    }
    getClient();

// get product
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