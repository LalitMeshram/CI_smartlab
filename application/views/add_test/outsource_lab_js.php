<?php
$session_data = $this->session->userdata('lsesson');
?>

<script>


    var outsourceList = new Map();
    function getOutsourceLab() {
        $.ajax({

            url: '<?php echo base_url();?>outsource_lab_list/' +<?php echo $session_data['centerId']; ?>,

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            outsourceList.set(response.data[i].outsource_lab_id, response.data[i]);

                        }
                        showOutsourceList(outsourceList);

                    }

                }

            }

        });
    }

    $('#outsourceCheck').click(function () {
        if ($(this).prop("checked") == true) {
            getOutsourceLab();
        } else if ($(this).prop("checked") == false) {
            $("#outsourcelabId").html('');
            $('#outsourcelabAmount').val('');
        }
    });


    function showOutsourceList(list) {
        var option = '';
        for (let k of list.keys()) {
            let out = list.get(k);
            option += `
            <option value="` + out.outsource_lab_id + `">` + out.lab_name + `</option>
                    `;
        }
        $('#outsourcelabId').html(option);
    }


//add outsource lab
    $('#outsourceLabFrom').on('submit', function (e) {
        e.preventDefault();
        var returnVal = $("#outsourceLabFrom").valid();
        var lab_name=$('#lab_name').val();
        var formdata = new FormData(this);
        formdata.append('centerId',<?php echo $session_data['centerId']; ?>)
        if (returnVal) {
            $.ajax({

                url: 'add_outsource_lab',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        $('#add_lab').modal('toggle');
                        $('#outsourceLabFrom').trigger("reset");
                        
                        swal("Good job!", response.msg, "success");
                        outsourceList.set(response.Data, {outsource_lab_id: response.Data, lab_name: lab_name})
                        showOutsourceList(outsourceList);
                    } else {

                        swal("Error!", response.msg, "error");

                    }

                }

            });
        }
    });





</script>