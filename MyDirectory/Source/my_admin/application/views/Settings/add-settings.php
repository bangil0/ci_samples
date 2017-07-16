<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

          <h1>
            Add Setting Details
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-wrench"></i>Home</a></li>
            <li><a href="#">Settings</a></li>
            <li class="active">Add Settings</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
			<?php
			if($this->session->flashdata('message')) {
			$message = $this->session->flashdata('message');

			?>
			<div class="alert alert-<?php echo $message['class']; ?>">
			<button class="close" data-dismiss="alert" type="button">×</button>
			<?php echo $message['message']; ?>
			</div>
			<?php
			}
			?>
			</div>
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Setting Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
				 <div class="box-body">
				 <div class="col-md-6">
				 
                        
                                        <div class="form-group">
                                            <label class="intrate">Title</label>
                                            <input class="form-control required regcom" type="text" name="title" data-parsley-trigger="keyup" required="" id="smtp_username" value="<?php echo $result->title; ?>">
                                        </div>	

										<div class="form-group">
                                            <label class="intrate">Admin Email</label>
                                            <input class="form-control required regcom" type="text" name="admin_email" data-parsley-trigger="keyup" required="" id="smtp_username" value="<?php echo $result->admin_email; ?>">
                                        </div>	
										
						                <div class="form-group">
                                            <label style="display:none;" class="intrate">Smtp Username</label>
                                            <input style="display:none;" class="form-control required regcom" type="text" name="smtp_username" data-parsley-trigger="keyup" required="" id="smtp_username" value="<?php echo $result->smtp_username; ?>">
                                        </div>
						                <div class="form-group">
                                            <label style="display:none;" class="intrate">Smtp Host</label>
                                            <input style="display:none;" class="form-control regcom required" type="text" name="smtp_host" data-parsley-trigger="keyup" required="" id="smtp_host" value="<?php echo $result->smtp_host; ?>" >
                                        </div>
										<div class="form-group">
                                            <label style="display:none;" class="intrate">Smtp Password</label>
                                            <input style="display:none;" class="form-control regcom required" type="password" name="smtp_password" data-parsley-trigger="keyup" required="" id="smtp_password" value="<?php echo $result->smtp_password; ?>" type="password">
                                        </div>
										
										<div class="form-group">
                                            <label style="display:none;" class="intrate">Smtp Port</label>
                                            <input style="display:none;" class="form-control regcom required" type="password" name="smtp_port" data-parsley-trigger="keyup" required="" id="smtp_password" value="<?php echo $result->smtp_password; ?>" type="password">
                                        </div>
								   
			
		 
                     <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save" id="taxiadd">                      
                     </div>
                  </div>
				  
				        <div class="col-md-6">
					
						           <div class="form-group has-feedback">
								   <label for="exampleInputEmail1">Logo</label>
								   <input name="logo" class="" accept="image/*" type="file">
								   <img src="<?php echo $result->logo; ?>" width="100px" height="100px" alt="Picture Not Found"/>
								   </div>
								   
							         
							
								   
								   <div class="form-group has-feedback">
								   <label for="exampleInputEmail1">Favicon</label>
								   <input name="favicon" type="file" data-parsley-trigger="keyup" required="" data-parsley-fileextension='ico' class="required">
								   </div>
												  
	                        
		                </div>
				  
				  
		         
		           
				   
				   
		
             </div><!-- /.box-body -->
  
                </form>
              </div><!-- /.box -->
            </div>
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div>
	  
	  