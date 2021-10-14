<script>


    function getInvoice() {
        $.ajax({

            url: '<?php echo base_url(); ?>get_case_data/' +<?php echo $caseId; ?>,

            type: 'GET',

            dataType: 'json',
            async: false,

            success: function (response) {


                if (response.status == 200) {

                    var invoice = response.data;
                    setInvoice(invoice);
                }

            }

        });
    }
    getInvoice();


    function setInvoice(invoice) {
        $('#billNo').html(invoice.caseId);
        $('#invoiceNo').html(invoice.caseId);
        $('#invoiceDate').html(invoice.createdat);
        $('#patientId').html(invoice.patientId);
        $('#pName').html(invoice.first_name+' '+invoice.last_name);
        $('#pGender').html(invoice.gender);
        $('#refBy').html(invoice.ref_name);
        $('#mobiNo').html(invoice.contact_number);
        $('#emailId').html(invoice.emailId);
        $('#pamt').html(invoice.pending_amt);
        $('#paidamt').html(invoice.amt_recieved);
        $('#tamt').html(invoice.total_amt);

        var test = invoice.test;
        var tableDate = '';
        for (var i = 0; i < test.length; i++) {
            tableDate += `
                        <tr>
              <td>`+test[i].test_name+`</td>
              <td>`+test[i].fees+`</td>
            </tr>
                    `;
                  
              }
                  
        var transaction = invoice.transactions;
        var tableDate1 = '';
        for (var i = 0; i < transaction.length; i++) {
            tableDate1 += `
                        <tr>
	              <td>`+transaction[i].paymentdate+`</td>
	              <td><button class="btn btn-success btn-xs">Paid</button></td>
	              <td>`+transaction[i].amount+`</td>
	              <td>admin</td>
	              <td>`+transaction[i].paymentmode+`</td>
	            </tr>
	            
                    `;
                  
                  
                  
        }

        $('#testList').html(tableDate);
        $('#transactionList').html(tableDate1);
    }


$('#enterFinding').click(function() {
//    alert(<?php echo $caseId; ?>);
window.location.href = '<?php echo base_url('enter_finding/'.$caseId);?>';
});

function getPendingAmount(caseId){
    $.ajax({

url: '<?php echo base_url(); ?>get_pending_amount/' +caseId,

type: 'GET',

dataType: 'json',
async: false,

success: function (response) {


    if (response.Responsecode == 200) {

        swal("Good job!", response.Message, "success");
        location.reload(); 
    }else{
        swal("Good job!", response.Message, "warning");
    }

}

});
}


</script>
