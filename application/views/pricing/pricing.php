
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pricing Table
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Examples</a></li>
        <li class="breadcrumb-item active">Pricing Table</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
			<br><br><br>
		
		
                        <div class="row" id="planList">

              

              

            </div>


    </section>
    <div style="display:none;">
    <form action="<?php echo base_url().'register/pay'; ?>" method="post" class="form-signin" name="paymentform">
                      
					<label for="subject">Amount <span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                            <input type="text" id="amount" name="amount" value="10" readonly class="form-control" placeholder="Amount" required>
                        </div><br/>
                       <br/>
                        <button type="submit" name="sendMailBtn" class="btn btn-lg btn-primary btn-block text-uppercase" >Pay Now</button>
                    </form>
                    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 