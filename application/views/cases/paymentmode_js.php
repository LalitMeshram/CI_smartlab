<script>
$("#paymentdetails").prop("readonly", true);

$('#paymentmode').change(function() {

    let val = this.value;
    switch (val) {
        case 'Cash':
            $("#paymentdetails").prop("readonly", true);
            break;
        case 'Card':
            $("#paymentdetails").prop("readonly", false);
            break;
        case 'Cheque':
            $("#paymentdetails").prop("readonly", false);
            break;
        case 'UPI':
            $("#paymentdetails").prop("readonly", false);
            break;
    }
});


function checkReceivedAmt() {
    var receiveAmt = parseFloat($('#receivedAmt').val());

    var aftDiscAmt = parseFloat($('#aftDiscAmt').html());
    if (!isNaN(receiveAmt)) {
        
            if (receiveAmt <= aftDiscAmt) {
                //alert(receiveAmt);
            } else {
                alert('Received Amount Not greater than After Discount Amt.');
                $('#receivedAmt').val('0');
            }
        
    }
}


function checkDiscountAmt() {
    var tbillAmt = parseFloat($('#tbillAmt').html());

    var discAmt = parseFloat($('#discount').val());
    
    if (!isNaN(tbillAmt)) {
        
            if (tbillAmt<discAmt) {
                alert('Discount Amount Not greater than Bill Amount');
                $('#discount').val('0');
            } 
        
    }
}



</script>