<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Add Feature Categories Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-cube"></i>Home</a></li>
         <li><a href="#">Feature Categories</a></li>
         <li class="active">View Feature</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-xs-12">
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
                  <h3 class="box-title">Add Feature Categories Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post" class="validate">
                  <div class="box-body">
                     <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control select2 required"   style="width: 100%;" name="id" data-parsley-trigger="keyup" required="" id="business_category_name">
                           <?php
                              //var_dump($query11);
                              foreach($feature as $featured){
                              $d = ($featured->featured_category == 1) ? "disabled" : "";
                              ?>
                           <option value="<?php echo $featured->id; ?>" <?php echo $d; ?>> <?php echo $featured->business_category_name; ?> </option>
                           <?php
                              }
                              ?>
                        </select>
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
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">View Feature Categories Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form">
                  <div class="box-body">
                     <table id="" class="table table-bordered table-striped datatable">
                        <thead>
                           <tr>
                              <th class="hidden">ID</th>
                              <th>Business Category Name</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              if($data) {
                                 foreach($data as $categoryfeatures) {			 
                                ?>
                           <tr>
                              <td class="hidden"><?php echo $categoryfeatures->id; ?></td>
                              <td class="center"><?php echo $categoryfeatures->business_category_name; ?></td>
                              <td class="center">			  
                                 <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Manage_categori/delete_categoryname/<?php echo $categoryfeatures->id; ?>">
                                 <i class="fa fa-fw fa-trash"></i>Delete</a>
                              </td>
                           </tr>
                           <?php
                              }
                              }
                              ?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th class="hidden">ID</th>
                              <th>Business Category Name</th>
                              <th>Action</th>
                           </tr>
                        </tfoot>
                     </table>
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

