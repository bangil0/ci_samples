 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           View Manage Collection Details
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cube"></i>Home</a></li>
            <li><a href="#">Manage Collection</a></li>
            <li class="active">View Manage Collection</li>
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
                  <h3 class="box-title">View Manage Collection Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                    <thead>
                      <tr>
					    <th class="hidden">ID</th>
                        <th>Username</th>                  
                        <th>Email</th>                  
                        <th>PhomeNumber</th>                  
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     
					  
		 <?php
	foreach($data as $manage) {			 
	?>
	    <tr>
        <td class="hidden"><?php echo $manage->id; ?></td>
        <td class="center"><?php echo $manage->username; ?></td>      
        <td class="center"><?php echo $manage->email; ?></td>
        <td class="center"><?php echo $manage->phone_number; ?></td>
        <td class="center">			  
		
                       
					    
				
					    <?php if( $manage->status){?>
						<a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Manage_collection/manage_status/<?php echo $manage->id; ?>"> 
					    <i class="fa fa-fw fa-trash"></i>Delete</a>           
			            <?php
	                    }

	                    else
	                    {
		                ?>
						<a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Manage_collection/manage_active/<?php echo $manage->id; ?>"> 
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
						<th>Username</th>
						<th>Email</th>                  
                        <th>PhomeNumber</th>  
						<th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
	  
	  