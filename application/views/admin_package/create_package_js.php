<script>
$('#addFeatureBtn').click(function() {
    var feature = $('#featureCombo').val();

    var tableData = '';
    if (feature != '') {
        if (!($('#r' + feature.replace(/ /g, "_")).length)) {
            tableData += $('#featureTable tbody').html();
            tableData += `<tr id="r` + feature.replace(/ /g, "_") + `">
                        <td>` + feature + `</td>
                        <td>
                        <button class="btn btn-danger btn-xs" onclick="deleteFeature('` + feature.replace(/ /g,
                "_") + `')" type="button"><i class="fa fa-trash-o"></i> Delete</button> 
                        </td>
                        </tr>`;

            $('#featureList').html(tableData);






        }
    }



});

function deleteFeature(id) {
    $('#r' + id).remove();
}



<!-- get Feature list from tbl -->
function getFeatureList() {
        var data = [];
        var feature;
        
        var i = 0;
        $('#featureTable tbody>tr').each(function (index, tr) {
            var tds = $(tr).find('td');
            feature = tds[0].textContent;
            
            data[i++] = {
                details: feature,
                
            }
        });
        return data;
    }

//save package Details
$('#savepkgBtn').click(function (e) {
        e.preventDefault();

        var packageId=$('#packageId').val();
        var planName=$('#plan_name').val();
        var amount=$('#amount').val();
        var duration=$('#duration').val();

        var feature_list = getFeatureList();
        console.log(feature_list);
        var featureListString = JSON.stringify(feature_list);

        var formdata = new FormData();
        formdata.append('packageId',packageId);
        formdata.append('package_details', featureListString);
        formdata.append('plan_name',planName);
        formdata.append('amount',amount);
        formdata.append('duration',duration);
        formdata.append('isactive',1);
        
            $.ajax({

                url: '<?php echo base_url("add_package")?>',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        swal("Good job!", response.Message, "success");
                        setTimeout(function(){ 
                            window.location.replace("<?php echo base_url('getPackage')?>"); 
                        }, 1000);

                    } else {

                        swal("Error!", response.Message, "error");

                    }

                }

            });
        
    });


</script>