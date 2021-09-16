
<!-- Main Navbar -->
<div class="main-nav">  	
    <nav class="navbar navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard mr-5"></i> <span>Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>create_case"><i class="fa fa-pencil-square-o  mr-5"></i> <span>New Case</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-users mr-5"></i> <span>Cases</span>
                    </a>				  
                    <ul class="dropdown-menu multilevel scale-up-left">
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>all_cases">All Cases</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>patient">Patients</a></li>	
                        <li class="nav-item"><a class="nav-link" href="#">Receipts</a></li>	

                        <li class="nav-item"><a class="nav-link" href="#">Agents</a></li>	
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>all_receipt">All Receipt</a></li>	
                    </ul>				  
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-flask mr-5"></i> <span>Lab</span>
                    </a>				  
                    <ul class="dropdown-menu multilevel scale-up-left">
                        <li class="nav-item"><a class="nav-link" href="#">Today's Report</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Search Report</a></li>	
                        <li class="nav-item"><a class="nav-link" href="#">Test Database</a></li>	
                        <li class="nav-item"><a class="nav-link" href="#">Test Panel</a></li>	
                        <li class="nav-item"><a class="nav-link" href="#">Add New</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">More</a></li>	
                    </ul>				  
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-money mr-5"></i> <span>Business</span>
                    </a>				  
                    <ul class="dropdown-menu multilevel scale-up-left">
                        <li class="nav-item"><a class="nav-link" href="#">Daily Business</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Due Reports</a></li>	
                        <li class="nav-item"><a class="nav-link" href="#">Daily Business Reports</a></li>	
                        <li class="nav-item"><a class="nav-link" href="#">Refferal Business</a></li>	
                        <li class="nav-item"><a class="nav-link" href="#">Casewise Business Reports</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Business Analysis</a></li>	
                    </ul>				  
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog mr-5"></i> <span>Setup</span>
                    </a>
                    <ul class="dropdown-menu multilevel scale-up-left">
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>lab_registration">Lab Registration</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>letter_head">Letter Head</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>add_test">Add Test</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>test_database">Test Database</a></li>
                        
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog mr-5"></i> <span>Masters</span>
                    </a>
                    <ul class="dropdown-menu multilevel scale-up-left">
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>lab_category">Lab Category</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>lab_unit">Lab Unit</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>outsource_lab">Outsource Lab</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>referal_doctor">Refferal Doctors</a></li>
                        
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-hospital-o mr-5"></i> <span>Account</span></a>
                </li>	
            </ul>
        </div>
    </nav>	  
</div> 

