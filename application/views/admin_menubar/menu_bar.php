
<!-- Main Navbar -->
<div class="main-nav">  	
    <nav class="navbar navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>adminDashboard"><i class="fa fa-dashboard mr-5"></i> <span>Dashboard</span></a>
                </li>
                
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog mr-5"></i> <span>Master</span>
                    </a>
                    <ul class="dropdown-menu multilevel scale-up-left">
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>predefined_category">Category</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>predefined_unit">Unit</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>test_predefined_database">Test Database</a></li>	
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>admin_test_panel">Test Parameter</a></li>	
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>getPackage"><i class="fa fa-hospital-o mr-5"></i> <span>Package</span></a>
                </li>
                	
            </ul>
        </div>
    </nav>	  
</div> 

