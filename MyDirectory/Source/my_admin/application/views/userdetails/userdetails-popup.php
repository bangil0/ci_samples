<div class="row">
<div class="col-md-6">
   <div class="box box-primary">
      <div class="box-header with-border">
         <h3 class="box-title">View User Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
         <dl>
            <dt>First Name</dt>
            <dd><?php echo $data->first_name; ?></dd>
            <dt>Last Name</dt>
            <dd><?php echo $data->last_name; ?></dd>
            <dt>Phone Number</dt>
            <dd><?php echo $data->phone_number; ?></dd>
            <dt>UserName</dt>
            <dd><?php echo $data->username; ?></dd>
            <dt>Email</dt>
            <dd><?php echo $data->email; ?></dd>
            <dt>Status</dt>
            <dd><?php if($data->status == '1') 
			{
			echo "enable";
			}
			else
			{ 
			echo "disable"; 
			}
			?></dd>			
	
         </dl>
      </div>
      <!-- /.box-body -->
   </div>
   <!-- /.box -->
</div>
<!-- ./col -->
<div class="col-md-6">
   <div class="box box-primary">
      <div class="box-header with-border">
         <h3 class="box-title">View User Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
         <dl>
            <dt>Country</dt>
            <dd><?php echo $data->country; ?></dd>
            <dt>City</dt>
            <dd><?php echo $data->city; ?></dd>
            <dt>state</dt>
            <dd><?php echo $data->state; ?></dd>
            <dt>zip_code</dt>
            <dd><?php echo $data->zip_code; ?></dd>
            <dt>Image</dt>
            <img src="<?php echo $data->image; ?>" width="100px" height="100px" alt="Picture Not Found" />
         </dl>
      </div>
      <!-- /.box-body -->
   </div>
   <!-- /.box -->
</div>
<!-- ./col -->
<div class="row">
   <div class="col-md-12">
      <div class="box box-info">
         <div class="box-header with-border">
            <h3 class="box-title">View Favourite Details</h3>
            <div class="box-tools pull-right">
               <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
               <i class="fa fa-minus"></i>
               </button>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <div class="table-responsive">
               <table class="table no-margin">
                  <thead>
                     <tr>
                        <th>Business Id</th>
                        <th>Category Name</th>
					
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        foreach($categori as $categories) {			 
                        ?>
                     <tr>
                        <td class="center"><?php echo $categories->business_name; ?></td>
						
                        <td class="center"><?php if ($categories->category_status=='user')
						{					
						echo $categories->user_category; 
						}
						else 
						{ 
					    echo $categories->business_category_name;
						}
						?>
						</td>
						
						<!--<td class="center"><?php //echo $categories->category_status; ?></td>-->
						
						
						
						
                     </tr>
                     <?php
                        }
                        ?>
                  </tbody>
                  <thead>
                     <tr>
                        <th>Business Id</th>
                        <th>Categori Name</th>
						
                     </tr>
                  </thead>
               </table>
            </div>
            <!-- /.table-responsive -->
         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->
</div>

