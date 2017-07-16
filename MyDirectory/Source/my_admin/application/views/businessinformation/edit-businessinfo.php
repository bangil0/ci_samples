<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Business Information Details
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-building"></i>Home</a></li>
            <li><a href="#">Business Information</a></li>
            <li class="active">Edit Business</li>
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
                  <h3 class="box-title">Edit Business Information Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="uriForm" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
                 
				 <div class="box-body">
				 <div class="col-md-6">
                   <div class="form-group has-feedback">
				   <label for="exampleInputEmail1">Business Name</label>
                   <input type="text" class="form-control required" name="business_name" value="<?php echo $data->business_name; ?>"  data-parsley-trigger="change"	
                   data-parsley-minlength="2" data-parsley-maxlength="25" required=""placeholder="Business Name">
                   <span class="glyphicon  form-control-feedback"></span>
                   </div>
				   
				   <div class="form-group has-feedback">
				   <label for="exampleInputEmail1">First Name</label>
                   <input type="text" class="form-control required" name="first_name" data-parsley-trigger="change"	
                    data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" value="<?php echo $data->first_name; ?>" placeholder="First Name">
                   <span class="glyphicon  form-control-feedback"></span>
                   </div>
				   
                   <div class="form-group has-feedback">
				   <label for="exampleInputEmail1">Lastname</label>
                   <input type="text" class="form-control required" name="last_name" value="<?php echo $data->last_name; ?>" data-parsley-trigger="change"	
                   data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required=""placeholder="Lastname">
                   <span class="glyphicon  form-control-feedback"></span>
                   </div>
		   
		           <div class="form-group has-feedback">
				   <label for="exampleInputEmail1">Email</label>
                   <input type="email" class="form-control required" name="email" value="<?php echo $data->email; ?>" data-parsley-trigger="change" required="" placeholder="Email">
                   <span class="glyphicon  form-control-feedback"></span>
                   </div>
				   
				   <div class="form-group has-feedback">
				   <label for="exampleInputEmail1">Phonenumber</label>
				   <input type="text" class="form-control required" name="phone_number" value="<?php echo $data->phone_number; ?>" data-parsley-trigger="keyup" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9]+$" required="" placeholder="Phonenumber">
				   <span class="glyphicon  form-control-feedback"></span>
				   </div>
				   
				   <div class="form-group">
                   <label for="exampleInputtype1">Status</label>
				   <select name="status" id="status" onchange="" class="form-control select2 required" data-parsley-trigger="keyup" required="" size="1" style="width: 100%;">
				   <option  id="1" value="1"  <?php if($data->status == '1') echo 'selected'; ?>>Enable</option>
				   <option  id="0" value="0" <?php if($data->status == '0') echo 'selected'; ?>>Disable</option>
				   </select>
				   </div>
				   
			
			       	   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Web Site</label>
					   <input type="url" class="form-control required" value="<?php echo $data->website; ?>" name="website"  data-parsley-trigger="change" required="" placeholder="Web Site">
					  
					   </div>
					   
					    
					   
					   
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Description</label>
					   <input type="text" class="form-control required" value="<?php echo $data->description; ?>" name="description"  data-parsley-trigger="keyup" required=""  placeholder="Description">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Street Address</label>
					   <input type="text" class="form-control required" value="<?php echo $data->street_address; ?>" name="street_address" placeholder="Street Address">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
			
			
			           <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">City</label>
					   <input type="text" class="form-control required" name="city" value="<?php echo $data->city; ?>" data-parsley-trigger="change"	
                        data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-pattern="^[a-zA-Z\ . ! @ # $ % ^ & * () + = , \/]+$" required="" placeholder="City">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">State</label>
					   <input type="text" class="form-control required" name="state" value="<?php echo $data->state; ?>" data-parsley-trigger="change"	
					data-parsley-minlength="3" data-parsley-maxlength="25" data-parsley-pattern="^[a-zA-Z\ . ! @ # $ % ^ & * () + = , \/]+$" required="" placeholder="State">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
			
			           <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Zipcode</label>
					   <input type="text" class="form-control required" name="zip_code" value="<?php echo $data->zip_code; ?>" data-parsley-trigger="change" 
						data-parsley-minlength="4" data-parsley-maxlength="15" data-parsley-pattern="^[0-9\ . \/]+$" required=""   placeholder="Zipcode">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
				   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Year Established</label>
					   <input type="text" class="form-control required" name="year_established" value="<?php echo $data->year_established; ?>" data-parsley-trigger="change"	
                       data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required=""  placeholder="Year Established">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Social Links</label>
					   <input type="url" class="form-control required" value="<?php echo $data->social_links; ?>" name="social_links" data-parsley-trigger="change" required="" placeholder="Social Links">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Hours</label>
					   <input type="text" class="form-control required" value="<?php echo $data->hours; ?>" name="hours" data-parsley-trigger="keyup"
					   data-parsley-minlength="1" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\- , . \/]+$" required= placeholder="Hours">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group">
                        <label>Select Category</label>

                          <select class="form-control select2" multiple="multiple" style="width: 100%;" name="categories[]" data-parsley-trigger="keyup" required="" id="business_category_name">
                           <?php
                              //var_dump($data->categories);
							  //Edit values to get to display
							  $arry_select = explode(",", $data->categories);
							  
                              foreach($result as $collection){
							  //var_dump($collection->id);  
                           ?>
   
						  
						   <option value="<?php echo $collection->id;?>"<?php if (in_array($collection->id, $arry_select))//if($collection->id == $data->categories)   
						   echo 'selected';  ?> ><?php echo $collection->business_category_name;?></option>
					   <?php
                           }
						   ?>
                          </select>
                   </div>   
			   <?php if($data->advertisement_status == '1') 
			{
			$c = "checked";
			}
			else
			{ 
			$c = "";
			}
			?>
			
					  <div class="form-group checkbox" style="padding:20px;">

				      <input type="checkbox" <?php echo $c; ?> value="1" name="advertisement_status"/><label for="exampleInputEmail1">Add Category To Feature List</label></br>

						</div>
		             </div>
		           <div class="col-md-6">
		           
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Neighborhoods</label>
					   <input type="text" class="form-control required" name="neighborhoods" value="<?php echo $data->neighborhoods; ?>" data-parsley-trigger="change" required=""  placeholder="neighborhoods">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Brands</label>
					   <input type="text" class="form-control required" name="brands" value="<?php echo $data->brands; ?>"data-parsley-trigger="change" required=""  placeholder="Brands">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Payment method</label>
					   <input type="text" class="form-control required" name="payment_method" value="<?php echo $data->payment_method; ?>" data-parsley-trigger="change" required=""  placeholder="Payment method">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Location</label>
					   <input type="text" class="form-control required" name="location" value="<?php echo $data->location; ?>" data-parsley-trigger="change" required=""  placeholder="Location">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Amenities</label>
					   <input type="text" class="form-control" name="amenities" value="<?php echo $data->amenities; ?>" placeholder="amenities">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
                       <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Accreditation</label>
					   <input type="text" class="form-control" name="accreditation" value="<?php echo $data->accreditation; ?>"   placeholder="Accreditation">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Associations</label>
					   <input type="text" class="form-control" name="associations" value="<?php echo $data->associations; ?>"   placeholder="Associations">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Other link</label>
					   <input type="text" class="form-control" name="other_link" value="<?php echo $data->other_link; ?>" placeholder="Other link">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					    <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Other Information</label>
					   <input type="text" class="form-control" name="other_information" value="<?php echo $data->other_information; ?>" placeholder="Other Information">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Extra Phones</label>
					   <input type="text" class="form-control required" value="<?php echo $data->extra_phones; ?>" name="extra_phones" data-parsley-trigger="keyup" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9]+$" required="" placeholder="Extra Phones">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>

                       <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Latitude</label>
					   <input type="text" class="form-control required" value="<?php echo $data->latitude; ?>" name="latitude"  id="latitudes" placeholder="Latitude">
					   <span class="glyphicon  form-control-feedback"></span>
					   <span><a href="#" id='pick-maps'>Pick from map</a></span>
					   </div>
					   
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Longitude</label>
					   <input type="text" class="form-control required" value="<?php echo $data->longitude; ?>" name="longitude" id="longitudes"  placeholder="Longitude">
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
                       	                
					   
					   <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Open Time</label>
                      <div class="input-group">
                        <input type="text" name="open_time" value="<?php echo $data->open_time; ?>" class="form-control timepicker">
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
                        <input type="text" name="close_time" value="<?php echo $data->close_time; ?>" class="form-control timepicker">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->
                  </div>
				  
				       <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">Message</label>
					   <textarea class="textarea1 form-control box_sizes required" name="message" class="words" rows="4" cols="50" style="width: 502px; height: 59px;"><?php echo $data->message;?></textarea>
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>
					   
					   <div class="form-group has-feedback">
					   <label for="exampleInputEmail1">General Info</label>
					   <textarea class="textarea1 form-control box_sizes required" name="general_info" class="words" rows="4" cols="50" style="width: 502px; height: 59px;"><?php echo $data->general_info; ?></textarea>
					   <span class="glyphicon  form-control-feedback"></span>
					   </div>

                   <div class="form-group col-md-4">
                   <label>Display Picture</label>
				   <input name="image" accept="image/*" type="file">
				   <img src="<?php echo $data->image; ?>" width="100px" height="100px" alt="Picture Not Found"/>
                   </div>
				   
				  
				   
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
	  
	  
            <div class="modal fade modal-wide" id="myModalmaping" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
               <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Select location</h4>
                  </div>
                  <div class="modal-body">
                    <div id='map_canvasing'></div>
                    <div id="current">Nothing yet...</div>
                    <input type="hidden" id="pick-lats" />
                    <input type="hidden" id="pick-lngs" />
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-custom select-location">Select Location</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>	  
	  
	  
	     <script>
$(document).ready(function() {
    $('#uriForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            website: {
                validators: {
                    uri: {
                        message: 'The website address is not valid'
                    }
                }
            }
        }
    });
});
</script>
	  
	  

