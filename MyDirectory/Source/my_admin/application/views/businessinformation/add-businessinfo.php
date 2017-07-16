<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Business Information Details
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-building"></i>Home</a></li>
            <li><a href="#">Business Information</a></li>
            <li class="active">Add Business</li>
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
                  <h3 class="box-title">Add Business Information Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
                 
				 <div class="box-body">
				 <div class="col-md-6">
				 
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Business Name</label>
                       <input type="text" class="form-control required" name="business_name" data-parsley-trigger="change"	
                       data-parsley-minlength="2" data-parsley-maxlength="20" required=""  placeholder="Business Name">
                       <span class="glyphicon  form-control-feedback"></span>
                       </div>

					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">First Name</label>
					   <input type="text" class="form-control required" name="first_name" data-parsley-trigger="change"	
                       data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required=""  placeholder="First Name">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
				   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Last Name</label>
					   <input type="text" class="form-control required" name="last_name" data-parsley-trigger="change"	
                       data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" placeholder="Last Name">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
		   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Email</label>
					   <input type="email" class="form-control required" name="email" data-parsley-trigger="change" required="" placeholder="Email">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">PhoneNumber</label>
					   <input type="text" class="form-control required" name="phone_number" data-parsley-trigger="keyup" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9]+$" required="" placeholder="PhoneNumber">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>

					   
					   <div class="form-group">
					   <label for="exampleInputtype1">Status</label>
					   <select name="status" id="status" onchange="" class="form-control select2" data-parsley-trigger="keyup"  size="1" style="width: 100%;">

					   <option  id="1" value="1">Enable</option>
					   <option  id="0" value="0">Disable</option>
					   </select>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Web Site</label>
					   <input type="url" class="form-control required" name="website" data-parsley-trigger="change" required=""   placeholder="Web Site">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>					 
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Description</label>				
					   <textarea class="textarea1 form-control box_sizes required" name="description" class="words" rows="4" cols="50" style="width: 502px; height: 59px;"></textarea>
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Street Address</label>
					   <input type="text" class="form-control required" name="street_address"  placeholder="Street Address">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">City</label>
					   <input type="text" class="form-control required" name="city" data-parsley-trigger="change"	
                        data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-pattern="^[a-zA-Z\ . ! @ # $ % ^ & * () + = , \/]+$" required=""  placeholder="City">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">State</label>
					   <input type="text" class="form-control required" name="state" data-parsley-trigger="change"	
					data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-pattern="^[a-zA-Z\ . ! @ # $ % ^ & * () + = , \/]+$" required="" placeholder="State">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Zipcode</label>
					   <input type="text" class="form-control required" name="zip_code" data-parsley-trigger="change" 
						data-parsley-minlength="4" data-parsley-maxlength="15" data-parsley-pattern="^[0-9\ . \/]+$" required="" placeholder="Zipcode">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Year Established</label>
					   <input type="text" class="form-control required" name="year_established"  data-parsley-trigger="change"	
                       data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required="" placeholder="Year Established">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Social Links</label>
					   <input type="url" class="form-control required" name="social_links" data-parsley-trigger="change" required=""  placeholder="Social Links">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Hours</label>
					   <input type="text" class="form-control required" name="hours" data-parsley-trigger="keyup"
					   data-parsley-minlength="1" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\- , . \/]+$" required="" placeholder="Hours">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   	   <div class="form-group">
                        <label>Select Category</label>
                             <select class="form-control select2" multiple="multiple"  style="width: 100%;" name="categories[]" data-parsley-trigger="keyup" required="" id="business_category_name">
                           <?php
                              foreach($result as $collection){
                           ?>
						   <option value="<?php echo $collection->id;?>"><?php echo $collection->business_category_name;?></option>
                           <?php
                           }
						   ?>
                          </select>
                       </div> 	
					   
					       <div class="form-group checkbox" style="padding:20px;">   
						   <input type="checkbox"  value="1" name="advertisement_status"><label for="exampleInputEmail1">Add Category To Feature List</label></br>
						</div>
					   
					
					   
					   
		         </div>
		   
		         <div class="col-md-6">
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Neighborhoods</label>
					   <input type="text" class="form-control required" name="neighborhoods" data-parsley-trigger="change" required=""  placeholder="neighborhoods">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Brands</label>
					   <input type="text" class="form-control required" name="brands" data-parsley-trigger="change" required=""  placeholder="Brands">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Payment method</label>
					   <input type="text" class="form-control required" name="payment_method" data-parsley-trigger="change" required=""  placeholder="Payment method">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Location</label>
					   <input type="text" class="form-control required" name="location" data-parsley-trigger="change" required=""  placeholder="Location">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Amenities</label>
					   <input type="text" class="form-control" name="amenities"  placeholder="amenities">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
                       <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Accreditation</label>
					   <input type="text" class="form-control" name="accreditation"  placeholder="Accreditation">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Associations</label>
					   <input type="text" class="form-control" name="associations" placeholder="Associations">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Other link</label>
					   <input type="text" class="form-control" name="other_link"  placeholder="Other link">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					    <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Other Information</label>
					   <input type="text" class="form-control" name="other_information" placeholder="Other Information">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Extra Phones</label>
					   <input type="text" class="form-control required" name="extra_phones" data-parsley-trigger="keyup" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9]+$" required="" placeholder="Extra Phones">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Latitude</label>
					   <input type="text" class="form-control required" name="latitude"  id="latitude" placeholder="Latitude">
					   <span class="glyphicon  form-control-feedback"></span>
					   <span><a href="#" id='pick-map'>Pick from map</a></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Longitude</label>
					   <input type="text" class="form-control required" name="longitude" id="longitude"  placeholder="Longitude">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
                       	                
					   
					   <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Open Time</label>
                      <div class="input-group">
                        <input type="text" name="open_time" class="form-control timepicker">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->
                  </div>
					   
				<div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Close Time</label>
                      <div class="input-group">
                        <input type="text" name="close_time" class="form-control timepicker">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->
                  </div>
				  
				       <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Message</label>				
					   <textarea class="textarea1 form-control box_sizes required" name="message" class="words" rows="4" cols="50" style="width: 502px; height: 59px;"></textarea>
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">General Info</label>
					   <textarea class="textarea1 form-control box_sizes required" name="general_info" class="words" rows="4" cols="50" style="width: 502px; height: 59px;"></textarea>
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   
					   
						
					   <div class="form-group col-md-4">
                       <label>Display Picture</label>
                       <input name="image" type="file" accept="image/*" class="required">
                       </div>
					  
					  
					   
					   <input type="hidden" name="created_by" value="<?php echo $u_id; ?>">	
					   
		          </div>
                  </div><!-- /.box-body -->
                         <div class="box-footer">
                       <button type="submit" class="btn btn-primary">Submit</button>
                       </div>  
                      
                </form>
              </div><!-- /.box -->
            </div>
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div>
	  
	  
		 
		 <div class="modal fade modal-wide" id="myModalmap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Select location</h4>
                  </div>
                  <div class="modal-body">
                    <div id='map_canvas'></div>
                    <div id="current">Nothing yet...</div>
                    <input type="hidden" id="pick-lat" />
                    <input type="hidden" id="pick-lng" />
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-custom select-location">Select Location</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
	
	  

