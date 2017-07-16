<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit User Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-user"></i>Home</a></li>
         <li><a href="#">User Details</a></li>
         <li class="active">Edit User</li>
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
                  <h3 class="box-title">Edit User Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Firstname</label>
                           <input type="text" class="form-control required" name="first_name" value="<?php echo $data->first_name; ?>"
                           	data-parsley-trigger="change"	
                            data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" placeholder="Firstname">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Lastname</label>
                           <input type="text" class="form-control required" name="last_name" value="<?php echo $data->last_name; ?>" data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required=""  placeholder="Lastname">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Username</label>
                           <input type="text" class="form-control required" name="username" value="<?php echo $data->username; ?>"  data-parsley-trigger="change"	
                           data-parsley-minlength="2" data-parsley-maxlength="15" required="" placeholder="Username">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Email</label>
                           <input type="email" class="form-control" name="email" value="<?php echo $data->email; ?>" data-parsley-trigger="change" required="" placeholder="Email">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Phonenumber</label>
                           <input type="text" class="form-control required" name="phone_number" value="<?php echo $data->phone_number; ?>" data-parsley-trigger="keyup" data-parsley-type="digits" 
							data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9]+$" required="" placeholder="Phonenumber">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
                        <div class="form-group col-md-4">
                           <label>Display Picture</label>
                           <input name="image" type="file" accept="image/*" class="required">
                           <img src="<?php echo  $data->image; ?>" width="100px" height="100px" alt="Picture Not Found" />
                        </div>
						
                     </div>
                     <div class="col-md-6">
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">City</label>
                           <input type="text" class="form-control required" name="city" value="<?php echo $data->city; ?>"
						    data-parsley-trigger="change"	
							data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-pattern="^[a-zA-Z\ . ! @ # $ % ^ & * () + = 	, \/]+$" required=""  placeholder="City">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">State</label>
                           <input type="text" class="form-control required" name="state" value="<?php echo $data->state; ?>" data-parsley-trigger="change"	
                           data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-pattern="^[a-zA-Z\ . ! @ # $ % ^ & * () + = , \/]+$" required="" placeholder="State">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Country</label>
                           <input type="text" class="form-control required" name="country" value="<?php echo $data->country; ?>" data-parsley-trigger="change"	
                           data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-pattern="^[a-zA-Z\ . ! @ # $ % ^ & * () + = , \/]+$" required="" placeholder="Country">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                           <label for="exampleInputEmail1">Zipcode</label>
                           <input type="text" class="form-control required" name="zip_code" value="<?php echo $data->zip_code; ?>"   data-parsley-trigger="change" 
					       data-parsley-minlength="4" data-parsley-maxlength="15" data-parsley-pattern="^[0-9\ . \/]+$" required="" placeholder="Zipcode">
                           <span class="glyphicon  form-control-feedback"></span>
                        </div>
                        <div class="form-group">
                           <label for="exampleInputtype1">Status</label>
                           <select name="status" id="status" onchange="" class="form-control select2 required" data-parsley-trigger="keyup" required="" size="1" style="width: 100%;">
                              <option  id="1" value="1"  <?php if($data->status == '1') echo 'selected'; ?>>Enable</option>
                              <option  id="0" value="0" <?php if($data->status == '0') echo 'selected'; ?>>Disable</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
            <!-- /.box -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

