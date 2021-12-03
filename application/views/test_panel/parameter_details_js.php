<script>

    $('#addSubtypebtn').click(function () {
        var parameter = $('#testName').val();
        var unitId = $('#unitId').val();
        var unit = $("#unitId option:selected").html();
        var tableData = '';
        var rowCount = $('#subtypeTable >tbody >tr').length;
        //alert(rowCount);
        if(rowCount==0){
        if (parameter != '') {
            if (!($('#r' + parameter.replace(/ /g, "_").replace(/[{(\/)}]/g, '_')).length)) {
                tableData += $('#subtypeTable tbody').html();
                tableData += `<tr id="r` + parameter.replace(/ /g, "_").replace(/[{(\/)}]/g, '_') + `">
                        <td>` + parameter + `</td>
                        <td>` + unit + `
                                <input type="hidden" id="hd` + parameter.replace(/ /g, "_").replace(/[{(\/)}]/g, '_') + `" value="` + unitId + `"/>
                        </td>
                        <td>
                        <button class="btn btn-success btn-xs" onclick="addRange('` + parameter.replace(/ /g, "_").replace(/[{(\/)}]/g, '_') + `')" type="button"><i class="fa fa-plus"></i> Add Range</button>
                        <button class="btn btn-danger btn-xs" onclick="deleteSubType('` + parameter.replace(/ /g, "_").replace(/[{(\/)}]/g, '_') + `')" type="button"><i class="fa fa-trash-o"></i> Delete</button> 
                        </td>
                        </tr>`;

                $('#subtypeList').html(tableData);






            }
        }

    }

    });

    function deleteSubType(id) {
        $('#r' + id).remove();
        if (stypeRange.has(id)) {
            stypeRange.delete(id);
        }
    }
    function addRange(key) {

        if (stypeRange.has(key)) {
            var range = stypeRange.get(key);
            var tableData = '';
            var d = new Date();
            var n = d.getTime();

            for (var i = 0; i < range.length; i++) {
                tableData += `<tr id="l` + n + `">
                        <td>` + range[i].gender + `</td>
                        <td>` + range[i].lower_age + " " + range[i].lower_age_period + `</td>
                        <td>` + range[i].upper_age + " " + range[i].upper_age_period + `</td>
                        <td>` + range[i].lower_limit + `</td>
                        <td>` + range[i].upper_limit + `</td>
                        <td>` + range[i].words + `</td>
                        <td>
                        <button class="btn btn-danger btn-xs" onclick="deleteRange('` + n + `')"><i class="fa fa-trash-o"></i> Delete</button> 
                        </td>
                        </tr>`;
            }

            $('#rangeList').html(tableData);

        } else {
            $('#rangeList').html('');
        }


        $('#add_range').modal('toggle');
        $('#param_subtype_id').val(key);
    }

</script>