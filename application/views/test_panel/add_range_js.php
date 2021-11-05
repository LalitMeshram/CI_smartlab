<script>
    $('#rangeDetailbtn').click(function () {
        var gender = $('#rangGender').val();
        var minAge = $('#minAge').val();
        var minAgePeriod = $('#minAgePeriod').val();
        var maxAge = $('#maxAge').val();
        var maxAgePeriod = $('#maxAgePeriod').val();
        var lower = $('#lower').val();
        var upper = $('#upper').val();
        var words = $('#words').val();
        var tableData = '';

        var d = new Date();
        var n = d.getTime();


        if (minAge != '' && lower != '') {
            if (!($('#l' + n).length)) {
                tableData += $('#rangeTable tbody').html();
                tableData += `<tr id="l` + n + `">
                        <td>` + gender + `</td>
                        <td>` + minAge + " " + minAgePeriod + `</td>
                        <td>` + maxAge + " " + maxAgePeriod + `</td>
                        <td>` + lower + `</td>
                        <td>` + upper + `</td>
                        <td>` + words + `</td>
                        <td>
                        <button class="btn btn-danger btn-xs" onclick="deleteRange('` + n + `')"><i class="fa fa-trash-o"></i> Delete</button> 
                        </td>
                        </tr>`;

                $('#rangeList').html(tableData);

                $('#minAge').val('');
                $('#maxAge').val('');
                $('#lower').val('');
                $('#upper').val('');
                $('#words').val('');




            }
        }



    });

    function deleteRange(id) {
        $('#l' + id).remove();
    }

//save range into the map


    function getrangeData() {

        var data = [];
        var gender;
        var tempMinAge;
        var minAge;
        var minAgePeriod;
        var tempMaxAge;
        var maxAge;
        var maxAgePeriod;
        var lower;
        var upper;
        var words;
        var i = 0;
        $('#rangeTable tbody>tr').each(function (index, tr) {
            var tds = $(tr).find('td');
            gender = tds[0].textContent;
            tempMinAge = tds[1].textContent;
            tempMaxAge = tds[2].textContent;
            lower = tds[3].textContent;
            upper = tds[4].textContent;
            words = tds[5].textContent;

            const minAgeArr = tempMinAge.split(" ");
            minAge = minAgeArr[0];
            minAgePeriod = minAgeArr[1];

            const maxAgeArr = tempMaxAge.split(" ");
            maxAge = maxAgeArr[0];
            maxAgePeriod = maxAgeArr[1];

            data[i++] = {
                gender: gender,
                lower_age: minAge,
                lower_age_period: minAgePeriod,
                upper_age: maxAge,
                upper_age_period: maxAgePeriod,
                lower_limit: lower,
                upper_limit: upper,
                words: words
            }
        });
        return data;
    }



    $('#rangeSavebtn').click(function () {
        var param_subtype_id = $('#param_subtype_id').val();
        if (stypeRange.has(param_subtype_id)) {
            stypeRange.delete(param_subtype_id);
            stypeRange.set(param_subtype_id, getrangeData());
            swal("Good job!", "Range Successfully Updated!", "success");
            $('#add_range').modal('toggle');
        } else {
            stypeRange.set(param_subtype_id, getrangeData());
            swal("Good job!", "Range Successfully Added!", "success");
            $('#add_range').modal('toggle');
        }
        //console.log(stypeRange);
    });






</script>