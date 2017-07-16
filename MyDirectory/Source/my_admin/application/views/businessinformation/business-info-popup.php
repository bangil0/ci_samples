		<div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
				<div class="box-header with-border">
         <h3 class="box-title">View Business Information Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div>
                <div class="box-body">
                  <dl>
                    <dt>Business Name</dt>
                    <dd><?php echo $data->business_name; ?></dd>
                    <dt>Phone Number</dt>
                    <dd><?php echo $data->phone_number; ?></dd>
                    <dt>First Name</dt>
                    <dd><?php echo $data->first_name; ?></dd>
                    <dt>Last Name</dt>
                    <dd><?php echo $data->last_name; ?></dd>
                    <dt>Email</dt>
                    <dd><?php echo $data->email; ?></dd>
                    <dt>Categories</dt>
                    <dd><?php echo $data->business_category_name; ?></dd>
                    <dt>created_by</dt>
                    <dd><?php echo $data->first_name; ?></dd>
                  </dl>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
            
            <div class="col-md-6">
              <div class="box box-primary">
               <div class="box-header with-border">
         <h3 class="box-title">View Business Information Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div>
                <div class="box-body">
                  <dl>					
                    <dt>Street Address</dt>
                    <dd><?php echo $data->street_address; ?></dd>
                    <dt>City</dt>
                    <dd><?php echo $data->city; ?></dd>
					<dt>state</dt>
                    <dd><?php echo $data->state; ?></dd>
                    <dt>zip_code</dt>
                    <dd><?php echo $data->zip_code; ?></dd>
					<dt>Year Established</dt>
                    <dd><?php echo $data->year_established; ?></dd>					
					<dt>Image</dt>
                    <img src="<?php echo $data->image; ?>" width="100px" height="100px" alt="Picture Not Found" />
                  </dl>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
          </div>  
			
		
		 
		  
		   <!-- PRODUCT LIST -->
		   <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                
				  <div class="box-header with-border">
         <h3 class="box-title">View Reviews Details</h3>
         <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
            <i class="fa fa-minus"></i>
            </button>
         </div>
      </div>
                
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
				 <tbody>					  
		 <?php
	     foreach($review as $reviews) {			 
	     ?>	
					
                      <div class="product-img">
						<td class="center"><img src="<?php echo $reviews->image; ?>" width="100px" height="100px"  /></td>
                      </div>
					  
	
                      <div class="product-info">
                        <a  class="center"><?php echo $reviews->first_name; ?><span class="label pull-right"><div class="raty" data-rate="<?php echo $reviews->rating; ?>"></div></span></a>
                        <span class="product-description">
                          <td class="center"><?php echo $reviews->comments; ?></td> 
                        </span>
                      </div>
                    </li><!-- /.item -->
		 <?php
	     }
	     ?>
         </tbody>
                  </ul>
                  </div><!-- /.box-body -->
                
                  </div><!-- /.box -->
                  </div>
                  </div><!-- /.row -->