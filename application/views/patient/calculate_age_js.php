<script>



function calculateAge() {
    let dobstr = $('#dob').val();
    if (dobstr != '') {
        //calculate
        let dob = new Date(dobstr);
        var ageDifMs = Date.now() - dob.getTime();
        var ageDate = new Date(ageDifMs); // miliseconds from epoch
        let year = Math.abs(ageDate.getUTCFullYear() - 1970);

        if (year != 0) {
            //calculate year
            //alert(year+'Year');
            $('#age').val(year);
            $('#agestr').val('Year');
        } else {
            ////calculate Months
            let monthstr = Date.now() - dob.getTime();
            let month = new Date(monthstr);
            if (month.getMonth() != 0) {
                // alert(month.getMonth()+'month');
                $('#age').val(month.getMonth());
                $('#agestr').val('Month');
            } else {
                //calculate Days
                let daystr = Date.now() - dob.getTime();
                let days = parseInt(daystr / (1000 * 3600 * 24));
                //alert(days+'Days');
                $('#age').val(days);
                $('#agestr').val('Days');
            }

        }
    }else{
        $('#age').val('');
        $('#agestr').val('Days');
    }
}
</script>