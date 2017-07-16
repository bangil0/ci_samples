<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         View User Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-user"></i>Home</a></li>
         <li><a href="#">User Details</a></li>
         <li class="active">View User</li>
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
                  <h3 class="box-title">User Details Table</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Username</th>
                           <th>Email</th>
                           <th>Phone Number</th>
                           <th>State</th>
                           <th>Country</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           foreach($data as $user) {			 
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $user->id; ?></td>
                           <td class="center"><?php echo $user->username; ?></td>
                           <td class="center"><?php echo $user->email; ?></td>
                           <td class="center"><?php echo $user->phone_number; ?></td>
                           <td class="center"><?php echo $user->state; ?></td>
                           <td class="center"><?php echo $user->country; ?></td>
						   <td><span class="center label <?php if($user->status == '1')
			{
			echo "label-success";
			}
			else
			{ 
			echo "label-warning"; 
			}
			?>"><?php if($user->status == '1')				   
			{
			echo "enable";
			}
			else
			{ 
			echo "disable"; 
			}
			?></span> 	
						   
                           <td class="center">			  
                              <a class="btn btn-sm bg-olive show-users" href="javascript:void(0);" data-id="<?php echo $user->id; ?>">
                              <i class="fa fa-fw fa-eye"></i>View</a>
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>User_details/edit_user/<?php echo $user->id; ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
                              <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>User_details/delete_user/<?php echo $user->id; ?>" onClick="return doconfirm()">
                              <i class="fa fa-fw fa-trash"></i>Delete</a>
							  
							   <?php if( $user->status){?>
                              <a class="btn btn-sm label-warning" href="<?php echo base_url();?>User_details/user_status/<?php echo $user->id; ?>"> 
                              <i class="fa fa-folder-open"></i>Disable</a>           
                              <?php
                                 }
                                 
                                 else
                                 {
                                 ?>
                              <a class="btn btn-sm label-success" href="<?php echo base_url();?>User_details/user_active/<?php echo $user->id; ?>"> 
                              <i class="fa fa-folder-o"></i>Enable</a>
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
                           <th>Username</th>
                           <th>Email</th>
                           <th>Phone Number</th>
                           <th>State</th>
                           <th>Country</th>
						   <th>Status</th>
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
<div class="modal fade modal-wide" id="userdetail-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">View User Details</h4>
         </div>
         <div class="modal-body">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

