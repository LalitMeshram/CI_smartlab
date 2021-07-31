<script>


    function getInvoice() {
        $.ajax({

            url: '<?php echo base_url(); ?>get_case_data/' +<?php echo $caseId; ?>,

            type: 'GET',

            dataType: 'json',
            async: false,

            success: function (response) {

                console.log(response);

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
        $('#pName').html(invoice.patientId);
        $('#pGender').html(invoice.patientId);
        $('#refBy').html(invoice.referenceId);
        $('#mobiNo').html(invoice.patientId);
        $('#emailId').html(invoice.patientId);

        var test = invoice.tests;
        var tableDate = '';
        for (var i = 0; i < test.length; i++) {
            tableDate += `
                        <tr>
              <td>`+test[i].testId+`</td>
              <td>`+test[i].testId+`</td>
            </tr>
                    `;
                  
              }
                  
        var transaction = invoice.transactions;
        var tableDate1 = '';
        for (var i = 0; i < transaction.length; i++) {
            tableDate1 += `
                        <tr>
	              <td>`+transaction[i].paymentdate+`</td>
	              <td><button class="btn btn-danger btn-xs">Refund</button></td>
	              <td>`+transaction[i].amount+`</td>
	              <td>XYZ</td>
	              <td>XYZ</td>
	            </tr>
	            
                    `;
                  
                  
                  
        }
        $('#testList').html(tableDate);
        $('#transactionList').html(tableDate1);
    }


</script>
