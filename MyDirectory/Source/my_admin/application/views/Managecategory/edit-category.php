<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Category Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-cube"></i>Home</a></li>
         <li><a href="#">Category</a></li>
         <li class="active">Edit Category</li>
      </ol>
   </section>
   <!-- Main content -->	
   <section class="content">
      <div class="row">
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
                  <h3 class="box-title">Edit Category Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Category Name</label>
                           <input type="text" class="form-control required" name="business_category_name"
                			value="<?php echo $data->business_category_name; ?>" id="exampleInputEmail1" placeholder="Enter category">
                        </div>	

						   <div class="form-group has-feedback">
						   <label for="exampleInputEmail1">Description</label>				
						   <textarea class="textarea1 form-control box_sizes required" name="description" class="words"  style="width: 502px; height: 59px;"><?php echo $data->description;?></textarea>
						   <span class="glyphicon  form-control-feedback"></span>
						   </div>
						
						<?php if($data->featured_category == '1') 
						{
						$c = "checked";
						}
						else
						{ 
						$c = "";
						}
						?>
						
					     <div class="form-group checkbox" style="padding:20px;">

				         <input type="checkbox" <?php echo $c; ?> name="featured_category" value="1" /><label for="exampleInputEmail1">Category To Feature List</label></br>
						 </div>
						 
						 
						 <div class="form-group col-md-4">
						 <label>Display Picture</label>
					     <input name="image" type="file" accept="image/*">
					     <img src="<?php echo $data->image; ?>" width="100px" height="100px" alt="Picture Not Found"/>
					     </div>
						
						
						

						
                     </div>
                     <!-- /.box -->
                  </div>
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- /.col -->
      </div>
   </section>
</div>
<!-- /.row -->
<!-- /.content -->

