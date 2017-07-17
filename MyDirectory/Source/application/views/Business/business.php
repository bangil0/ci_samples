              <div class="container mar_top">
          <div class="basic_inf">BASIC BUSINESS INFORMATION</div>

            <?php
    if(($this->session->flashdata('msg'))) {
      $message = $this->session->flashdata('msg');
      ?>
      <div class="<?php echo $message['class'];?>"><?php echo $message['message']; ?></div>
       <?php
       }
       ?>
        <div class="loader1" >
                      <img src="<?php echo base_url();?>assets/images/loader.gif" />
                    </div>


          <div class="row" style="margin-top:25px;">
            <form  action="<?php echo base_url();?>Business/addBusiness" method="post" enctype="multipart/form-data" data-parsley-validate>
              <div class="col-md-8">
                  <label>Primary phone number for your business</label><br>
                  <input type="text" class="inf_basic" name="phone_number" data-parsley-minlength="5" data-parsley-maxlength="15" data-parsley-trigger="change"
    data-parsley-type="digits" required><br><br>
                   <label>Business name</label><br>
                    <input type="text" class="inf_basic" name="business_name" data-parsley-minlength="2"  data-parsley-trigger="change"   required><br><br>

                  <div class="md_bbs">
                      <div class="md_bbs1">
                   <label>Business owners First name</label><br>

                  <input type="text" class="inf_basic_bus_lft" name="first_name" data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="change" required>
                            </div>
                       <div class="md_bbs2">
                   <label>Last name</label><br>

                  <input type="text" class="inf_basic_bus"  name="last_name" data-parsley-minlength="2"  data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z ]+$"  data-parsley-trigger="change" required>
                            </div>
                  </div>
                  <br>
                   <br>
  <br>
                     <br>
                  <label>Your Email</label><br>
                  <input type="email" class="inf_basic" name="email" data-parsley-trigger="change" required><br><br>
                   <label>Message</label><br>
                  <input type="text" class="inf_basic" name="message" data-parsley-trigger="change"  required><br><br>
                   <label>Categories that best describe your business</label><br>
                   <div class="select-style">
  <select name="categories[]" multiple="multiple" class="js-example-basic-multiple" required>
    <?php
    foreach ($category as $categ) {

     ?>

    <option value="<?php echo $categ->id;?>"><?php echo $categ->business_category_name;?></option>
    <?php
     }
     ?>
  </select>
</div>
<span class="multC">You have to select multiple categories</span>
<br><br>
                    <label>Street Address</label><br>
                  <input type="text" class="inf_basic" name="street_address"  data-parsley-trigger="change" required><br><br>
                   <label>City</label><br>
                  <input type="text" class="inf_basic" name="city" data-parsley-minlength="2" data-parsley-maxlength="25"  data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="change" required><br><br>


                    <div class="md_bbs">
                      <div class="yp_bbs1">
                         <label> State</label><br>
                    <input type="text" class="inf_basic" name="state" data-parsley-minlength="2" data-parsley-maxlength="25"  data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="change" required><br><br>
                            </div>
                       <div class="yp_bbs2">
                  <label> Zip code</label><br>

                  <input type="text" class="inf_basic_bus" name="zip_code"  data-parsley-trigger="change" data-parsley-minlength="4" data-parsley-maxlength="9" required>
                            </div>
                  </div>
                   <br>
                   <br>
                  <br>
                   <br>
                 <label> Year Established</label><br>
                  <input type="text" class="md_year" name="year_established" placeholder="Eg:-2016" data-parsley-minlength="4" data-parsley-maxlength="4" data-parsley-trigger="change"
    data-parsley-type="digits" required><br>
                  <br>
                   <input type="file" name="image" accept="image/*" required>
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
