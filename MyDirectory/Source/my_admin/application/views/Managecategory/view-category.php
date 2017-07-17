<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Category Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-cube"></i> Home</a></li>
         <li><a href="#">Category</a></li>
         <li class="active">View Category</li>
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
                  <h3 class="box-title">Add Category Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Category Name</label>
                           <input type="text" class="form-control required" name="business_category_name" id="exampleInputEmail1" placeholder="Enter category">
                        </div>
						
						   <div class="form-group has-feedback">
						   <label for="exampleInputEmail1">Description</label>				
						   <textarea class="textarea1 form-control box_sizes required" name="description" class="words" rows="8" cols="500" style="width: 502px; height: 59px;"></textarea>
						   <span class="glyphicon  form-control-feedback"></span>
						   </div>
							
						
						<div class="form-group">
                        <label>Display Picture</label>
                        <input name="image" type="file"  accept="image/*" class="required">
                        </div>
						
						<div class="form-group checkbox" style="padding:20px;">                         
						   <input type="checkbox" value="1" name="featured_category"><label for="exampleInputEmail1">Add Category To Feature List</label></br>
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
         <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Category Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Category Name</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           foreach($data as $categories) {			 
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $categories->id; ?></td>
                           <td class="center"><?php echo $categories->business_category_name; ?></td>
                           <td class="center">	
						       
							  <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Manage_categori/edit_categorydetails/<?php echo $categories->id; ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
							   
							   
                              <?php if( $categories->status){?>
                              <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Manage_categori/category_status/<?php echo $categories->id; ?>"> 
                              <i class="fa fa-fw fa-trash"></i>Delete</a>           
                              <?php
                                 }
                                 
                                 else
                                 {
                                 ?>
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Manage_categori/category_active/<?php echo $categories->id; ?>"> 
                              <i class="fa fa-fw fa-trash"></i>Active</a>
                              <?php
                                 }
                                 ?>
								 
                           </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Category Name</th>
                           <th>Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
   </section>
</div>
<!-- /.row -->
<!-- /.content -->

