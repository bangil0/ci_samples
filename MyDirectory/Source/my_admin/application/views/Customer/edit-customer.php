<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Customer Details
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i>Home</a></li>
            <li><a href="#"></a>Customer Details</li>
            <li class="active">Edit Customer</li>
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
					<?php echo $message['message']; 
					?>
					</div>
					<?php
					}
                $sess_id=$this->session->userdata('admin_logged_in');
		        $u_id=$sess_id['id'];
            ?>
			</div>
			<div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Customer Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
                 
				 <div class="box-body">
				 <div class="col-md-6">
                       
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">UserName</label>
					   <input type="text" class="form-control required" value="<?php echo $data->username; ?>" name="username" data-parsley-trigger="change"	
                       data-parsley-minlength="2" data-parsley-maxlength="15" required="" placeholder="First Name">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>

					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Last Name</label>
					   <input type="text" class="form-control required" value="<?php echo $data->last_name; ?>" name="last_name"data-parsley-trigger="change"	
                       data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" placeholder="Last Name">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
		   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">PhoneNumber</label>
					   <input type="text" class="form-control required" value="<?php echo $data->phone_number; ?>" name="phone_number" data-parsley-trigger="keyup" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9]+$" required="" placeholder="PhoneNumber">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Country</label>
					   <input type="text" class="form-control required" value="<?php echo $data->country; ?>" name="country"  data-parsley-trigger="change"	
					   data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-pattern="^[a-zA-Z\ . ! @ # $ % ^ & * () + = , \/]+$" required="" placeholder="Country">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>	
					   
					  <div class="form-group col-md-4">
                       <label>Profile Picture</label>
                       <input name="profile_pic" type="file" accept="image/*" class="required">
					   <img src="<?php echo $data->profile_picture; ?>" width="100px" height="100px" alt="Picture Not Found"/>					   
					   </div>
					   			 				
		         </div>
		   
		         <div class="col-md-6">
                        
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">First Name</label>
					   <input type="text" class="form-control required" value="<?php echo $data->first_name; ?>" name="first_name"     data-parsley-trigger="change"	
                        data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required=""placeholder="First Name">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Email</label>
					   <input type="email" class="form-control required" value="<?php echo $data->email; ?>" name="email" data-parsley-trigger="change" required="" name="email" placeholder="Email">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
						
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">City</label>
					   <input type="text" class="form-control required" value="<?php echo $data->city; ?>" name="city"  data-parsley-trigger="change"	
                        data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-pattern="^[a-zA-Z\ . ! @ # $ % ^ & * () + = , \/]+$" required="" placeholder="City">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group">
					   <label for="exampleInputtype1">Status</label>
					   <select name="status" id="status" onchange="" class="form-control select2 required" data-parsley-trigger="keyup" required="" size="1" style="width: 100%;">
					   <option  id="1" value="1"  <?php if($data->status == '1') echo 'selected'; ?>>Enable</option>
					   <option  id="0" value="0" <?php if($data->status == '0') echo 'selected'; ?>>Disable</option>
					   </select>
					   </div>	

					   <input type="hidden" name="created_by" value="<?php echo $u_id; ?>">	
					   
		          </div>
                  </div><!-- /.box-body -->
                       
                       <div class="box-footer">
                       <button type="submit" class="btn btn-primary">Submit</button>
                       </div>
                </form>
              </div><!-- /.box -->
            </div>
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div>

	  

