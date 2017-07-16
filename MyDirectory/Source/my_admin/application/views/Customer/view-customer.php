<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         View Customer Details
         <small></small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-users"></i>Home</a></li>
         <li><a href="#">Customer Details</a></li>
         <li class="active">View Customer</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
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
         <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Customer Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>UserName</th>
                           <th>Email</th>
                           <th>Phone Number</th>
                           <th>City</th>
                           <th>Country</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           foreach($data as $customer) {			 
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $customer->id; ?></td>
                           <td class="center"><?php echo $customer->username; ?></td>
                           <td class="center"><?php echo $customer->email; ?></td>
                           <td class="center"><?php echo $customer->phone_number; ?></td>
                           <td class="center"><?php echo $customer->city; ?></td>
                           <td class="center"><?php echo $customer->country; ?></td>
                           <td class="center">	
						      <a class="btn btn-sm bg-olive show-customer" href="javascript:void(0);" data-id="<?php echo $customer->id; ?>">
                              <i class="fa fa-fw fa-eye"></i>View</a>
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Customer_details/edit_customer/<?php echo $customer->id; ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
                              <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Customer_details/delete_customer/<?php echo $customer->id; ?>" onClick="return doconfirm()">
                              <i class="fa fa-fw fa-trash"></i>Delete</a>
							  
							
                           </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>UserName</th>
                           <th>Email</th>
                           <th>Phone Number</th>
                           <th>City</th>
                           <th>Country</th>
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
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

<div class="modal fade modal-wide" id="popup-customer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">View Customer Details</h4>
         </div>
         <div class="modal-body">
         </div>
         <div class="business_info">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

