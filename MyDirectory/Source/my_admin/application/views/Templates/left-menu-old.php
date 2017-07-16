<?php  
     $menu = $this->session->userdata('admin');
?>  
  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
			<div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo  $this->session->userdata('profile_pic'); ?>" class="user-image left-sid" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('admin_logged_in')['username']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
             <ul class="sidebar-menu">
			 
			   <?php
                       if( $menu==1  )
                        {
                       ?>
			       <li class="treeview">
					  <a href="#">
						<i class="fa fa-user"></i> <span>User Details</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>User_details/view_userdetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
						<li><a href="<?php echo base_url();?>User_details/add_userdetails"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
					  </ul>
                   </li>
				   
				    <?php
						} 
						?>
						
						    <?php
                       if( $menu==1  )
                        {
                       ?>
				   <li class="treeview">
					 <a href="#">
						<i class="fa fa-cube"></i> <span>Manage Categories</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Manage_categori/view_category"><i class="fa fa-circle-o text-aqua"></i>Category</a></li>
						<li><a href="<?php echo base_url();?>Manage_categori/view_feature"><i class="fa fa-circle-o text-aqua"></i>Feature Category</a></li>
					  </ul>
                   </li>
				    <?php
						} 
						?>
			
			       <li class="treeview">
					  <a href="#">
						<i class="fa fa-building"></i> <span>Business Information</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Business_information/view_business"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
						<li><a href="<?php echo base_url();?>Business_information/add_Businessinformation"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
					  </ul>
                   </li>
			 
				   
				
						 
			

						<?php
                       if( $menu==1  )
                        {
                       ?>
				   
				   
				   <li class="treeview">
					  <a href="#">
						<i class="fa fa-asterisk" aria-hidden="true"></i><span>Advertisement</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Advertise_ment/view_advertisement"><i class="fa fa-circle-o text-aqua"></i>View Details</a></li>
					  </ul>
                   </li>
				   
				    <?php
						} 
						?>	
						
						 <?php
                       if( $menu==1  )
                        {
                       ?>
				   
				    <li class="treeview">
					  <a href="#">
						<i class="fa fa-users"></i><span>Customer Details</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Customer_details/view_customer"><i class="fa fa-circle-o text-aqua"></i>View Details</a></li>
						<li><a href="<?php echo base_url();?>Customer_details/add_Customer"><i class="fa fa-circle-o text-aqua"></i>Add Details</a></li>
					  </ul>
                    </li>
					
					<?php
						} 
						?>
						
						
				   <li class="treeview">
					  <a href="#">
						<i class="fa fa-wrench"></i><span>Settings</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Settings_control/view_settings"><i class="fa fa-circle-o text-aqua"></i>Add Settings</a></li>
					  </ul>
                   </li>
			
             </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
