<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Add Advertisement Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-asterisk" aria-hidden="true"></i>Home</a></li>
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
                  <h3 class="box-title">Add Advertisement Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post" class="validate">
                  <div class="box-body">
     
					  <div class="form-group">
                        <label>Select Advertisement</label>
                          <select class="form-control select2"   style="width: 100%;" name="id" data-parsley-trigger="keyup" required="" id="business_name">
                           <?php
                              foreach($result as $advertisement){							  
								     $d = ($advertisement->advertisement_status == 1) ? "disabled" : "";

                           ?>
						   <option value="<?php echo $advertisement->id;?>" <?php echo $d; ?>><?php echo $advertisement->business_name;?></option>
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
                  <h3 class="box-title">View Advertisement Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
                  <div class="box-body">
                     <table id="" class="table table-bordered table-striped datatable">
                        <thead>
                           <tr>
                              <th class="hidden">ID</th>
                              <th>Business Name</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              if($data) {
                                 foreach($data as $business) {			 
                                ?>
                           <tr>
                              <td class="hidden"><?php echo $business->id; ?></td>
                              <td class="center"><?php echo $business->business_name; ?></td>
                              <td class="center">			  
                                 <a class='btn btn-sm btn-danger' href='<?php echo base_url(); ?>Advertise_ment/delete_businessname/<?php echo $business->id; ?>'> 
								 <i class='fa fa-fw fa-trash'></i> Delete </a>
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
                              <th>Business Name</th>
                              <th>Action</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
                  <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

