<?php
$session_data = $this->session->userdata('lsesson');
?>

<script>

var categoryList = new Map();

//get All Categories

    function getCategory() {
        $.ajax({

            url: 'get_center_category/' +<?php echo $session_data['centerId']; ?>,

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            categoryList.set(response.data[i].categoryid, response.data[i]);

                        }
                        showCatList(categoryList);

                    }

                }

            }

        });
    }
    getCategory();


    function showCatList(list) {
        var option = '';
        for (let k of list.keys()) {
            let category = list.get(k);
            option += `
            <option value="`+category.categoryid+`">`+category.category+`</option>
                    `;
        }

        $('#categoryId').html(option);
    }

//add new category

$('#categoryForm').on('submit', function (e) {
        e.preventDefault();
         var returnVal = $("#categoryForm").valid();
        var formdata = new FormData(this);
        formdata.append('centerId',<?php echo $session_data['centerId'];?>)
        if (returnVal) {
            $.ajax({

                url: 'add_center_category',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        $('#add_category').modal('toggle');
                        $('#categoryForm').trigger("reset");
                        swal("Good job!", response.msg, "success");
//                        window.location.reload();

                        
                    } else {

                        swal("Error!", response.msg, "error");

                    }

                }

            });
        }
    });



</script>