
		 
<!-- SEARCH-1-PAGE-BEGIN -->


	

		<div class="row">
			<div class="col-md-12">
				<ul class="yp-main-tab">
					<li class="active"><a data-toggle="tab" href="#about">ABOUT ME</a></li>
					<li>|</li>
					<li><a data-toggle="tab" href="#email">EMAIL</a></li>
					<li>|</li>
					<li><a data-toggle="tab" href="#location">LOCATIONS</a></li>
					<!-- <li>|</li>
					<li><a data-toggle="tab" href="#other">OTHER</a></li> -->
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 padding-r0">
				<div class="tab-content">
					<div id="about" class="tab-pane fade in active">
						<form method="post" action="<?php echo base_url();?>Profile/settings" data-parsley-validate>
						<div class="yp-tab-content-wrap">
							<h2>To make any changes, enter your new information and click Save.</h2>
							<h1>Display name on MD :  <?php echo $values->first_name;?>&nbsp; <?php echo $values->last_name;?></h1>
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

							<div class="yp-main-tab-input">
								First Name<br>
								<input class="yp-field" type="text" name="first_name" value="<?php echo $values->first_name;?>" placeholder="First Name" data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z ]+$"  data-parsley-trigger="change" required>
							</div>
							<div class="yp-main-tab-input">
								Last Name<br>
								<input class="yp-field" type="text" name="last_name" value="<?php echo $values->last_name;?>" placeholder="Last Name" data-parsley-minlength="1" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="change" required>
							</div>
							<button class="yp-save" type="submit">SAVE</button>
                             

						</div>
					  </form>	
					</div>
					<div id="email" class="tab-pane fade">
						<form method="post" action="<?php echo base_url();?>Profile/email" data-parsley-validate>
						<div class="yp-tab-content-wrap">
							<h2>To change the email address associated with this account, <br>
							enter and confirm your new email address, then click Save.</h2>
							<div class="yp-main-tab-input">
								Current Email Address<br>
								<input class="yp-field" type="text" name="email" value="<?php echo $values->email;?>" placeholder="Current Email" readonly>
							</div>
							<div class="yp-main-tab-input">
								New Email Address<br>
								<input class="yp-field" type="email" name="new_email" placeholder="New Email" data-parsley-trigger="change" required>
							</div>
							<button class="yp-save" type="submit">SAVE</button>
							
						</div>
					</form>
						<!-- <div class="yp-subscribtion">
							<h1>Subscriptions</h1>
							<p>To manage your email subscriptions, click here.</p>
						</div> -->
					</div>
					<div id="location" class="tab-pane fade">
						<form method="post" action="<?php echo base_url();?>Profile/location" data-parsley-validate>
						<div class="yp-tab-content-wrap">
							<h2>Personalize your MD experience by providing us with your location.</h2>
							<div class="yp-main-tab-input">
								Address<br>
								<input class="yp-field" type="text" name="address" placeholder="Address" value="<?php echo $values->address;?>"  data-parsley-trigger="change" required>
							</div>
							<div class="yp-main-tab-input">
								City<br>
								<input class="yp-field" type="text" name="city" placeholder="City" value="<?php echo $values->city;?>" data-parsley-minlength="2" data-parsley-maxlength="25"  data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="change" required>
							</div>
							<div class="yp-main-tab-bay">
								<div class="yp-main-tab-input1">
								State<br>
								<input class="yp-field1" type="text" name="state" placeholder="State" value="<?php echo $values->state;?>"  data-parsley-minlength="2" data-parsley-maxlength="25"  data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="change" required>
								</div>
								<div class="yp-main-tab-input2">
								Zip Code<br>
								<input class="yp-field1" type="text" name="zip_code" placeholder="Zip Code" value="<?php echo $values->zip_code;?>"  data-parsley-trigger="change" data-parsley-minlength="4" data-parsley-maxlength="9" required>
								</div>
							
							</div>
							<button type="submit" class="yp-save">SAVE</button>
							
						</div>
					</form>
					</div>
				<!-- 	<div id="other" class="tab-pane fade">
						<div class="yp-tab-content-wrap">
							<div class="yp-google">
								<h1>Google+</h1>
								<p>You are currently connected with Google+</p>
								<button class="yp-sav">Disconnect Google +</button>
							</div>
						</div>
					</div> -->
				</div>
			</div>
			<div class="col-md-4 padding-l0">
				<div class="yp-privacy">
					<h1>Privacy Policy</h1>
					<p>P.com is committed to respecting and protecting our customer's privacy. We strive to take reasonable care of any information we receive from you.</p>
					<p>YP.com does not rent, sell, disclose or share your e-mail address or personal information with other people or non-affiliated companies, except to provide products or services you've requested or when we have your permission.</p>
					<h6><a href="<?php echo base_url();?>">Read our Privacy Policy in full&nbsp;»</a></h6>
				</div>
			</div>
		</div>				
</div>
		
