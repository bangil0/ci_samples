

<?php
$query=$this->db->get('settings');
$query=$query->row();
$logo=$query->logo;

?>
		 
	
	 <body ng-controller='MainCtrl'>
			
			<!-- login form -->
			<div class="modal fade" id="myModal" role="dialog">
				 <div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content fades">
							 <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><img src="<?php echo base_url();?>assets/images/Mulltiply.png"></button>
							 </div>
							 <div class="modal-body" >
									<form  id="loginForm" data-parsley-validate >
										 <div class="users">
												<h4>Sign In</h4>
										 </div>
										 <input class="a3" type="email" placeholder="Email" ng-model='email' data-parsley-trigger="change" required><br>
										 <input class="a7" type="password" placeholder="Password" ng-model='password' data-parsley-minlength="4" data-parsley-maxlength="10"  data-parsley-trigger="change"  required>
										 <div id="logmes">
												
										 </div>

										 <div class="loader1" >
											<img src="<?php echo base_url();?>assets/images/loader.gif" />
										</div>
										 <p class="log"> <button style="width:50%;" type="button" ng-click='sign_in_funtion()' class="button buttonBlue">Sign In</button></p>
										 
										 <p class="login popup-change" data-open="mymModal" >Sign Up</p>
										 <p class="login popup-change" data-open="myfModal"  style="font-style:italic;">Forgot your password?</p>
										 
									</form>
							 </div>
						</div>
				 </div>
			</div>
			 <!-- end login form -->
			
			<div class="modal fade " id="myfModal" role="dialog">
				 <div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content fades">
							 <div class="modal-header">
									<button type="button" class="close " data-dismiss="modal"><img src="<?php echo base_url();?>assets/images/Mulltiply.png"></button>
							 </div>
							 <div class="modal-body">
									<form id="fgtForm" data-parsley-validate>
										 <div class="users">
												<h4>Forgot Password</h4>
										 </div>
										 <input class="a3" type="email" placeholder="Email" ng-model='formValue.email' data-parsley-trigger="change" required><br>
										
										 <div id="flash" >
													
												</div>


										 <p class="log"> <button style="width:50%;" type="button" ng-click='forget_funtion()' class="button buttonBlue">Submit</button></p>
										 <p class="login popup-change" data-open="myModal">Back to Login</p>
									
									</form>
							 </div>
						</div>
				 </div>
			</div>

				<!-- sign up -->
			<div class="modal fade " id="mymModal" role="dialog">
				 <div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content fades">
							 <div class="modal-header">
									<button type="button" class="close " data-dismiss="modal"><img src="<?php echo base_url();?>assets/images/Mulltiply.png"></button>
							 </div>
							 <div class="modal-body" >
							 	 <div class="loader1" >
											<img src="<?php echo base_url();?>assets/images/loader.gif" />
										</div>
								 
									<form id="regForm"  data-parsley-validate>
										 <div class="users">
												<h4>Sign Up</h4>
										 </div>
										
										 <input class="a2" type="text" placeholder="Username" ng-model='formData.username' data-parsley-minlength="2" data-parsley-maxlength="15"   data-parsley-trigger="change" required> <br>
										 <input class="a3" type="email" placeholder="Email" ng-model='formData.email' data-parsley-trigger="change" required><br>
										 <input class="a7" type="password" placeholder=" Password" ng-model='formData.password' id="password" data-parsley-minlength="4" data-parsley-maxlength="8"  data-parsley-trigger="change"  required><br>
										 <input class="a7" type="password" placeholder=" Confirm Password" ng-model='formData.confirm_password' id="confirm_password" data-parsley-minlength="4" data-parsley-maxlength="8"  data-parsley-trigger="change"  required><br>
										 <input class="a4" type="text" placeholder="Phone Number" ng-model='formData.phone_number' data-parsley-type="digits" data-parsley-trigger="change" data-parsley-minlength="5" data-parsley-maxlength="15" required> <br>
										 <input class="a6" type="text" placeholder="Zip Code" ng-model='formData.zip_code'  data-parsley-trigger="change" data-parsley-minlength="4" data-parsley-maxlength="9" required> <br>
											 <div id="regmes">
												
												</div>

                                        


										 <label style="color:#ffd400;">
										 &nbsp; <input type="checkbox" style="background-color:transperent;"  name="remember_me" id="remember_me" data-parsley-checkmin="1" required>
										 I agree to the Terms of Service
										 </label>
										 <p class="log"> <button style="width:50%;" type="button" ng-click='sign_up_funtion()' id="reg" class="button buttonBlue"  >Sign Up
												</button>
										 </p>
										 <p class="login popup-change" data-open="myModal">Sign In</p>
									</form>
							 </div>
						</div>
				 </div>
			</div>


			<!-- end sign up -->
			
			
			<?php
 $user_details=$this->session->userdata('userdatas');
 $username=$user_details['username'];
 $user_id=$user_details['id'];  
 if(!($user_id) and (isset($header))) 
 {
 ?> 
			<!--header in-->
			<div class="business">
				 <div class="container">
						<div class="row">
							 <div class="col-md-4">
									<div class="yp">
										 <div class="logo">
										 <div class="mydirect"><a href="<?php echo base_url();?>"><img src="<?php echo $logo;?>" width="145px;height:40px;"></a></div>
									</div>
									</div>
									<div class="sign" >
										 <div class="signin" data-toggle="modal" data-target="#myModal">
												<img src="<?php echo base_url();?>assets/images/signin.png">
												<p>SIGN IN</p>
										 </div>
										 <div class="border"></div>
										 <div class="signup" data-toggle="modal" data-target="#mymModal">
												<img src="<?php echo base_url();?>assets/images/signup.png">
												<p>SIGN UP</p>
										 </div>
									</div>
							 </div>
							 <div class="col-md-4"></div>
							 <div class="col-md-4">
									<div class="business">
										 <a href="#">
												<h4><span style="font-size:16px;">+</span><a <?php if(!$user_id){?> class="lgnbadge" <?php }else {?> class="addBusi" <?php }?>>  ADD BUSINESS</a></h4>
										 </a>
									</div>
							 </div>
						</div>
				 </div>
			</div>
			 <div class="header">
				 <div class="container">
						<div class="row">
							 <div class="col-md-1"></div>
							 <div class="col-md-9">
									<div class='cssmenu'>
										 <ul>
												<li><a href='<?php echo base_url();?>'>HOME&nbsp; &nbsp; <span class="md_bar">&#124;</span> </a> </li>
												<li class='active'><a href='#'>PRODUCTS&nbsp; &nbsp; <span class="md_bar">&#124;</span></a></li>
												<li><a href='#'>NEWS& ADVICE&nbsp; &nbsp; <span class="md_bar">&#124;</span></a></li>
												<li><a href='#'>COMMUNITY&nbsp; &nbsp; <span class="md_bar">&#124;</span></a></li>
												<li><a href='#'>fIND A BUSINESS </a></li>
										 </ul>
									</div>
							 </div>
							 <div class="col-md-2">
							 </div>
						</div>
				 </div>
			</div>
 <?php
 } 
 elseif((!(isset($header))) and (!($user_id)))
 {
	?>
			<div class="business">
				 <div class="container">
						<div class="row">
							 <div class="col-md-4">
									<div class="yp">
										 <div class="logo">
										 <div class="mydirect"><a href="<?php echo base_url();?>"><img src="<?php echo $logo;?>" width="145px;height:40px;"></a></div>
									</div>
									</div>
							 </div>
							 <div class="col-md-4"></div>
							 <div class="col-md-4">
									<div class="row">
										 <div class="col-md-6">  </div>
										 <div class="col-md-6">
												<div class="business">
													 <div class="yp_login" data-toggle="modal" data-target="#myModal"><img src="<?php echo base_url();?>assets/images/login.png"> SIGN IN</div>
													 <div class="yp_logout" data-open="mymModal" data-toggle="modal" data-target="#mymModal"> <img src="<?php echo base_url();?>assets/images/logout.png"> SIGN UP</div>
													 <!--logged in-->
													 <!--logged end-->
												</div>
										 </div>
									</div>
							 </div>
						</div>
				 </div>
			</div>
			<div class="header">
				 <div class="container">
						<div class="row">
							 <div class="col-md-1"></div>
							 <div class="col-md-9">
									<div class='cssmenu'>
										 <ul>
												<li><a href='<?php echo base_url();?>'>HOME&nbsp; &nbsp; &#124; </a> </li>
												<li class='active'><a href='#'>PRODUCTS&nbsp; &nbsp; &#124;</a></li>
												<li><a href='#'>NEWS& ADVICE&nbsp; &nbsp; &#124;</a></li>
												<li><a href='#'>COMMUNITY&nbsp; &nbsp; &#124;</a></li>
												<li><a href='#'>fIND A BUSINESS </a></li>
										 </ul>
									</div>
							 </div>
							 <div class="col-md-2">
							 </div>
						</div>
				 </div>
			</div>

<?php
 }
	else
 {
 ?>  
	 <!--logged in div-->
	 
			<div class="business">
						<div class="container">
								<div class="row">
										<div class="col-md-4">
												<div class="yp">
												 <div class="logo2">
											<div class="mydirect"><a href="<?php echo base_url();?>"><img src="<?php echo $logo;?>" width="145px;height:40px;"></a></div>
												</div>
												</div>
											 </div>
								<div class="col-md-4"></div>
										<div class="col-md-4">
												<div class="business">
													 <a <?php if(!$user_id){?> class="lgnbadge" <?php }else {?> class="addBusi" <?php }?>>  <h4><span style="font-size:16px;">+</span>   ADD BUSINESS</h4> </a>
													 
														
																 <div class="dropdown">
<button onClick="myFunction()" class="dropbtn left">WELCOME <?php echo $username;?>  &nbsp; <i class="fa fa-user"></i></button>        
		 
								 <div id="tabs" class="dropdown-content">
		<a href="<?php echo base_url();?>Profile/collection"> <i class="fa fa-bookmark"></i>&nbsp;
 My book</a>
		<a href="<?php echo base_url();?>Profile/profile"> <i class="fa fa-user"></i>&nbsp;
 Profile</a>
		<a href="<?php echo base_url();?>Profile/settings"> <i class="fa fa-cog"></i>&nbsp;
	Settings</a>
		<a href="<?php echo base_url();?>Logout"> <i class="fa fa-sign-out"></i>&nbsp;
 Sign out</a>
	</div>
</div>  
													
												</div>
										</div>
								</div>
						</div>
				</div> 
				<!--  end loggedin div -->

			<div class="header">
				 <div class="container">
						<div class="row">
							 <div class="col-md-1"></div>
							 <div class="col-md-9">
									<div class='cssmenu'>
										 <ul>
												<li><a href='<?php echo base_url();?>'>HOME&nbsp; &nbsp; &#124; </a> </li>
												<li class='active'><a href='#'>PRODUCTS&nbsp; &nbsp; &#124;</a></li>
												<li><a href='#'>NEWS& ADVICE&nbsp; &nbsp; &#124;</a></li>
												<li><a href='#'>COMMUNITY&nbsp; &nbsp; &#124;</a></li>
												<li><a href='#'>fIND A BUSINESS </a></li>
										 </ul>
									</div>
							 </div>
							 <div class="col-md-2">
							 </div>
						</div>
				 </div>
			</div>
		<?php
		 }
		 ?>

			
			<!--header end-->