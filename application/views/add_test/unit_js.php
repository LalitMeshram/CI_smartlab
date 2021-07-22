<?php
$session_data = $this->session->userdata('lsesson');
?>

<script>


    var unitList = new Map();
//    get all unit list
    function getUnits() {
        $.ajax({

            url: 'get_center_unit/' +<?php echo $session_data['centerId']; ?>,

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            unitList.set(response.data[i].unitId, response.data[i]);

                        }
                        showUnitList(unitList);

                    }

                }

            }

        });
    }
    getUnits();


    function showUnitList(list) {
        var option = '';
        for (let k of list.keys()) {
            let unit1 = list.get(k);
            option += `
            <option value="` + unit1.unitId + `">` + unit1.unit + `</option>
                    `;
        }

        $('#unitId').html(option);

    }



//add unit

    $('#unitForm').on('submit', function (e) {
        e.preventDefault();
        var returnVal = $("#unitForm").valid();
        var unit = $('#unit').val();
        var formdata = new FormData(this);
        formdata.append('centerId',<?php echo $session_data['centerId']; ?>)
        if (returnVal) {
            $.ajax({

                url: 'add_center_unit',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        $("#unitForm").trigger("reset");
                        $('#add_unit').modal('toggle');
                        swal("Good job!", response.msg, "success");

                        unitList.set(response.Data, {unitId: response.Data, unit: unit})
                        showUnitList(unitList);
                    } else {

                        swal("Error!", response.msg, "error");

                    }

                }

            });
        }
    });

   

</script>