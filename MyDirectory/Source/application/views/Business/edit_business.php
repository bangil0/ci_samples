              <div class="container mar_top">
          <div class="basic_inf">EDIT BUSINESS INFORMATION</div>

            <?php
    if(($this->session->flashdata('msg'))) {
      $message = $this->session->flashdata('msg');
      ?>
      <div class="<?php echo $message['class'];?>"><?php echo $message['message']; ?></div>
       <?php
       }
       $id=$this->uri->segment(3);
       ?>
        <div class="loader1" >
                      <img src="<?php echo base_url();?>assets/images/loader.gif" />
                    </div>

         
          <div class="row" style="margin-top:25px;">
            <form  action="<?php echo base_url();?>Business/editBusiness" method="post" enctype="multipart/form-data" data-parsley-validate>
             
              <div class="col-md-8">
                  <label>Primary phone number for your business</label><br>
                  <input type="text" class="inf_basic" name="phone_number" value="<?php echo $editBus->phone_number;?>" data-parsley-minlength="5" data-parsley-maxlength="15" data-parsley-trigger="change" 
    data-parsley-type="digits" required><br><br>
                   <label>Business name</label><br>
                    <input type="text" class="inf_basic" name="business_name" value="<?php echo $editBus->business_name;?>" data-parsley-minlength="2"  data-parsley-trigger="change"   required><br><br>
                  
                  <div class="md_bbs">
                      <div class="md_bbs1">
                   <label>Business owners First name</label><br>
                    
                  <input type="text" class="inf_basic_bus_lft" name="first_name" value="<?php echo $editBus->first_name;?>"  data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="change" required>
                            </div>
                       <div class="md_bbs2">
                   <label>Last name</label><br>
                    
                  <input type="text" class="inf_basic_bus"  name="last_name" value="<?php echo $editBus->last_name;?>" data-parsley-minlength="2"  data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z ]+$"  data-parsley-trigger="change" required>
                            </div>
                  </div>
                  <br>
                   <br>
  <br>
                     <br>
                  <label>Your Email</label><br>
                  <input type="email" class="inf_basic url" name="email" value="<?php echo $editBus->email;?>"  data-parsley-trigger="change" required><br><br>
                  <label>Website</label><br>
                  <input type="url" class="inf_basic" name="website" value="<?php echo $editBus->website;?>"  data-parsley-trigger="change" required><br><br>
                    
                    <label>Description</label><br>
                  <input type="text" class="inf_basic" name="description" value="<?php echo $editBus->description;?>" data-parsley-trigger="change"  required><br><br>
                   
                  <label>Social Link</label><br>
                  <input type="url" class="inf_basic" name="social_links"  value="<?php echo $editBus->social_links;?>" data-parsley-trigger="change"  required><br><br>
                  
                  <label>Hours</label><br>
                  <input type="text" class="inf_basic" name="hours" value="<?php echo $editBus->hours;?>" placeholder="Regular Hours" data-parsley-trigger="change"  data-parsley-minlength="1" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\- , . \/]+$" required><br><br>
                  
                  <label>Neighborhoods</label><br>
                  <input type="text" class="inf_basic" name="neighborhoods" value="<?php echo $editBus->neighborhoods;?>" data-parsley-trigger="change"  required><br><br>
                   
                  
                  <label>Brands</label><br>
                  <input type="text" class="inf_basic" name="brands" value="<?php echo $editBus->brands;?>" data-parsley-trigger="change"  required><br><br>
                   
                   <label>Payment method</label><br>
                  <input type="text" class="inf_basic" name="payment_method" value="<?php echo $editBus->payment_method;?>" data-parsley-trigger="change"  required><br><br>
                   
                   <label>Location</label><br>
                  <input type="text" class="inf_basic" name="location" value="<?php echo $editBus->location;?>" data-parsley-trigger="change"  required><br><br>
                   
                   <label>Amenities</label><br>
                  <input type="text" class="inf_basic" name="amenities" value="<?php echo $editBus->amenities;?>" ><br><br>
                   <label>Accreditation</label><br>
                  <input type="text" class="inf_basic" name="accreditation" value="<?php echo $editBus->accreditation;?>" ><br><br>
                   
                   <label>Associations</label><br>
                  <input type="text" class="inf_basic" name="associations" value="<?php echo $editBus->associations;?>" ><br><br>
                   
                   <label>Other link</label><br>
                  <input type="url" class="inf_basic" name="other_link" value="<?php echo $editBus->other_link;?>"><br><br>
                   
                   <label>Other Information</label><br>
                  <input type="text" class="inf_basic" name="other_information" value="<?php echo $editBus->other_information;?>"><br><br>
                   
                   <label>Extra Phones</label><br>
                  <input type="text" class="inf_basic" name="extra_phones" value="<?php echo $editBus->extra_phones;?>"><br><br>
                   
                   <label>Latitude</label><br>
                  <input type="text" class="inf_basic" name="latitude"   id="latitude" value="<?php echo $editBus->latitude;?>" data-parsley-trigger="change" required><br>
                  <span><a href="javascript:void(0)" id='pick-map'>Pick from map</a></span><br><br>
                   
                   <label>Longitude</label><br>
                  <input type="text" class="inf_basic"  name="longitude" id="longitude" value="<?php echo $editBus->longitude;?>" data-parsley-trigger="change"  required><br><br>
                   
                   <label>General Info</label><br>
                  <input type="text" class="inf_basic" name="general_info" value="<?php echo $editBus->general_info;?>"><br><br>
                   
                   <label>Message</label><br>
                  <input type="text" class="inf_basic" name="message" value="<?php echo $editBus->message;?>" data-parsley-trigger="change" required><br><br>
                   <label>Categories that best describe your business</label><br>
                   <div class="select-style">
  <select name="categories[]" multiple="multiple" class="js-example-basic-multiple" required>
    <?php
     $arry_select = explode(",", $editBus->categories);
    foreach ($categry as $categ) {

     ?>
    
    <option value="<?php echo $categ->id;?>"<?php if (in_array($categ->id, $arry_select))//if($collection->id == $data->categories)   
               echo 'selected';  ?> ><?php echo $categ->business_category_name;?></option>
    <?php
     }
     ?>
  </select>

</div>
<span class="multC">You have to select multiple categories</span>
<br><br>
                    <label>Street Address</label><br>
                  <input type="text" class="inf_basic" name="street_address" value="<?php echo $editBus->street_address;?>" data-parsley-trigger="change" required><br><br>
                   <label>City</label><br>
                  <input type="text" class="inf_basic" name="city"  value="<?php echo $editBus->city;?>" data-parsley-minlength="2" data-parsley-maxlength="25"  data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="change" required><br><br>
                  
                  
                    <div class="md_bbs">
                      <div class="yp_bbs1">
                         <label> State</label><br>
                    <input type="text" class="inf_basic" name="state" value="<?php echo $editBus->state;?>" data-parsley-minlength="2" data-parsley-maxlength="25"  data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="change" required><br><br>
                            </div>
                       <div class="yp_bbs2">
                  <label> Zip code</label><br>
                    
                  <input type="text" class="inf_basic_bus" name="zip_code"  value="<?php echo $editBus->zip_code;?>" data-parsley-trigger="change" data-parsley-minlength="4" data-parsley-maxlength="9" required>
                            </div>
                  </div>
                   <br>
                   <br>
                   <input type="hidden" name="id" value="<?php echo $id;?>">
                  <br>
                   <br>
                 <label> Year Established</label><br>
                  <input type="text" class="md_year" name="year_established" value="<?php echo $editBus->year_established;?>" placeholder="Eg:-2016" data-parsley-minlength="4" data-parsley-maxlength="4" data-parsley-trigger="change" 
    data-parsley-type="digits" required><br>
                  <br>
                   <input type="file" name="image" accept="image/*" required >
                  <br><br>
                  <button type="submit"  class="md_cont">Continue</button><span class="match_on"> upon clicking on<span class="look_md "><a href="#">"continue"</a></span> ,we will look for a match on your business information.</span>
                  <br>
                   <br>
              </div> 
           
            </form>


               <div class="col-md-4"></div> 
              
          </div>
      <!--resuls-found end--> 
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
  