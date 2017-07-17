<?php
 $user_details=$this->session->userdata('userdatas');
 $user_id=$user_details['id'];
 
  ?>
		 
<!-- SEARCH-1-PAGE-BEGIN -->

	
	

		<div class="row">
			<div class="col-md-2 padding-r0">
				<div class="yp-side-panel">
					<div class="yp-side-panel-pic-slot">
					<?php
					$img=$getImage->image;
					if($img)
					{

					?>
				    <img src="<?php echo $img; ?>"></img>
				    <?php
				    }
				    else
				    {	
				    ?>
				    <img src="<?php echo base_url();?>assets/images/profile.jpg"></img>
				    <?php
				    }
				    ?> 		
					</div>
					<button class="yp-pic-edit" data-toggle="modal" data-target="#add-photo-pop">
						Add a Profile Photo
					</button>
					<div class="modal fade" id="add-photo-pop" role="dialog">
					<div class="modal-dialog yp-add-photo-pop">
					<!-- ADD-PHOTO-POP -->
					<form action="<?php echo base_url();?>profile/profileImage" method="post"  enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header yp-add-photo-pop-header">
							<button class="yp-pop-close " data-dismiss="modal"></button>
								<h4 class="">Add a Photo</h4>
							</div>
													
													<div class="yp-pop-img-wrap Getimg" >
														<div class="yp-pop-img ">
															<?php
															if($img)
					                                        {

					                                        ?>
														<img class="prfl_image" src="<?php echo $img; ?>">
														 <?php
				                                           }
				                                           else
				                                           {	
				                                           ?>
				                                           <img class="prfl_image" src="<?php echo base_url();?>assets/images/profile.jpg"></img>
				                                           <?php
				                                           }
				                                           ?> 
														</div>
														<p class="pcls" style="display:none;">By clicking Submit below, I hereby certify that I have the right to use and
														distribute the uploaded material and such material does not, and will not
														infringe any third party right or violate the MD.com <a href="<?php echo base_url();?>">Terms & Conditions.</a>
														</p>
													</div>
													<!--change browse button name-->
													<input type="file" name="image" accept="image/*" class="imgShow" id="browse"  style="display: none" onChange="Handlechange();"/>
                                                    <input type="button" value="Select A Photo" class="yp-pop-select" id="fakeBrowse" onclick="HandleBrowseClick();"/>
													 <!--change browse button name-->
													<div class="yp-add-pop-btn-bay-sbmt sub" style="display:none;">
															<button class="yp-pop-submit" type="submit" name="submit">SUBMIT</button>
														<button class="yp-pop-sbmtcncl " data-dismiss="modal">CANCEL</button>
														</div>
														<?php
                                                          if(($this->session->flashdata('msg'))) {
                                                            $message = $this->session->flashdata('msg');
                                                            ?>
                                                            <div class="<?php echo $message['class'];?>"><?php echo $message['message']; ?></div>
                                                             <?php
                                                             }
                                                             ?>
												</div>
											</form>
												<!-- END-POP -->
												</div>
												</div>
							<?php
								$timestamp=$getImage->created_date;
								$splitTimeStamp = explode(" ",$timestamp);
                                $getdate = $splitTimeStamp[0];
                                ?>
					<h1><?php echo $getImage->username;?></h1>
					<p>Joined <?php echo $getdate;?></p>
					<a href="<?php echo base_url();?>Profile/settings"><div class="yp-side-setting">
						Settings
					</div></a>
					<hr>
					
					<h2>CONTRIBUTIONS</h2>
					<div class="yp-side-panel-white-slot">
					<img src="<?php echo base_url();?>assets/img/yp-star.png">
					<h1><?php echo $rating[0]->rating;?></h1>
					<p>Rating </p>
					</div>
					<div class="yp-side-panel-white-slot">
					<img src="<?php echo base_url();?>assets/img/yp-cam.png">
					<h1><?php echo $photos;?></h1>
					<p>Photos</p>
					</div>
					<div class="yp-side-panel-white-slot">
					<img src="<?php echo base_url();?>assets/img/yp-heart.png">
					<h1><?php echo $favourite;?></h1>
					<p>Favourite</p>
					</div>
				</div>
			</div>
			
			<!-- TABS -->
			
			<div class="col-md-10 padding-l0">
				<ul class="yp-tab-wrap">
					<li><a data-toggle="tab" href="#review">REVIEWS</a></li>
					<li>|</li>
					<li><a data-toggle="tab" href="#photo">PHOTOS</a></li>
					<li>|</li>
					<li><a data-toggle="tab" href="#busdetails">MY BUSINESS</a></li>
				</ul>
				<div class="tab-content">
					<div id="review" class="tab-pane fade in active">
						<div class="yp-photo-tab">
							<div class="yp-my-photos-bay">
								<h1>MY REVIEWS</h1>
								<?php
								$l=0;
								foreach ($userReview as $reviews) {
                              

                                $Ebid=$reviews->id;
								$l++;
								$timestamp=$reviews->cdate;
								$splitTimeStamp = explode(" ",$timestamp);
                                $date = $splitTimeStamp[0];
									
								?>
								<li>
								<div class="yp-review-wrap">
									<h4><a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $Ebid;?>"><?php echo $reviews->business_name;?></a></h4>
									<h3><?php echo $reviews->business_category_name;?></h3>
									<p><?php echo $reviews->street_address;?>, <?php echo $reviews->phone_number;?></p>
									<div class="yp-review-rate">
									<!--rating-->  

                              <div style="display:inline-flex;"><div  id="ratings<?php echo $l;?>" data-id="<?php echo $reviews->rating;?>" data-title="ratings<?php echo $l;?>" class="ratings"></div>
                               
                                  <!--rating end--> 

										<div style="font-size: 13px;padding-top: 3px;padding-left: 10px;">Posted on <?php echo $date;?></div></div>
									</div>
									<div class="yp-review-comment">
										<?php echo $reviews->comments;?>
									</div>
									<ul class="yp-review-option">
										<li>
											<button class="yp-review-edit" data-toggle="modal" data-target="#edit-review-pop<?php echo $reviews->id;?>">Edit</button>
											<!-- REVIEW-POP -->
							
							<div class="modal fade" id="edit-review-pop<?php echo $reviews->id;?>" role="dialog" >
											<div class="modal-dialog yp-review-pop">
														<div class="modal-content">
												
														<button class="yp-pop-close" data-dismiss="modal"></button>
													
													<div class="yp-review-pop-content">
														<div class="yp-review-left">
															<div class="yp-review-pop-pic">
																<img src="<?php echo $reviews->image; ?>"></img>
															</div>
															<h1><?php echo $reviews->business_name;?></h1>
															<h2><?php echo $reviews->street_address;?></h2>
															<p><?php echo $reviews->description;?></p>
														</div>
													
														<div class="yp-review-right">
														<h1>Write a Review</h1>
														<hr>
														<h2>Overall Rating</h2>

														<div class="yp-review-pop-rating">
														
															
														  <input type="hidden" class="rBid<?php echo $Ebid;?>" name="bid" value="<?php echo $Ebid;?>">
														
												          <!--rating-->  
                                                        <div  id="b_rating<?php echo $reviews->id;?>" data-id="<?php echo $reviews->rating;?>"  data-title="b_rating<?php echo $reviews->id;?>"  class="b_rating"></div>
                                                         <!--rating end--> 
														 
														
														</div>
														<div class="yp-review-pop-textarea">
												<textarea rows="5" class="yp-textarea cmnts<?php echo $reviews->id;?>" name="comments" ><?php echo $reviews->comments;?></textarea>
															
															
														</div>
														</div>
														
													</div>
													
													
													<div class="yp-add-pop-btn-bay-sbmt">
															<button onclick="Prflrating(<?php echo $Ebid;?>)" type="submit" class="yp-pop-submit" >SUBMIT</button>
															<button class="yp-pop-sbmtcncl " data-dismiss="modal">CANCEL</button>
														</div>
												</div>
												
												
											</div>
										</div>
										<!--END REVIEW POP -->
										</li>
										<li class="paddinglr10">|</li>
										<li>
											<a href="<?php echo base_url();?>Profile/Deleterating/<?php echo $reviews->id;?>"  onClick="return doconfirm()">
												<div class="yp-review-delete bdel">Delete<div></a>
										</li>
									</ul>
								
								</div>
							</li>
								<?php
							    }
							    ?>
							</div>
						</div>
					</div>
					<div id="photo" class="tab-pane fade">
						<div class="yp-photo-tab">
							<div class="yp-my-photos-bay">
								<h1>MY ADDED PHOTOS</h1>
								<ul class="yp-photo-sec">
								
								<?php
								$x=0;
								foreach($prfImages as $gallery)
								{
									$x++;

                                $timestamp=$gallery->created_date;
								$splitTimeStamp = explode(" ",$timestamp);
                                $gdate = $splitTimeStamp[0];
                                $busiIdimg=$gallery->bid;
								?>	
                                 <li>
								<div class="yp-photo-wrap" data-toggle="modal" data-target="#myPhoto<?php echo $x;?>">
									<div class="yp-my-photos">
										<img src="<?php echo $gallery->image;?>">
									</div>
									<h2><a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $busiIdimg;?>"><?php echo $gallery->business_name;?></a></h2>
									<p><?php echo $gdate;?></p>
									
								 
								</div>
								<p></p>
							</li>
									<div class="modal fade" id="myPhoto<?php echo $x;?>" role="dialog">
									<div class="modal-dialog yp-view-photo-pop">
										<div class="modal-content">
											<div class="modal-header yp-view-photo-pop-header">
												<button class="yp-pop-close" data-dismiss="modal"></button>
												<h4 class="">View Photo</h4>
											</div>
											<div class="yp-view-photo-pop-header-content">
												<h1><?php echo $gallery->business_name;?></h1>
												<div class="yp-view-photo-pop-header-content-inner">
													<img src="<?php echo $gallery->image;?>">
												</div>
											</div>
											<div class="yp-view-photo-pop-footer">
												<div class="yp-view-photo-pop-footer-left">
													<?php echo $gdate;?>
												</div>
												<a href="<?php echo base_url();?>Profile/delImage/<?php echo $gallery->id;?>"  onClick="return doconfirmDel()">
												<div class="yp-view-photo-pop-footer-right yp-review-delete bdel">
												
								                 Delete</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
								 }


								 ?>
						


								</li>
								</ul>
							</div>
						</div>
					</div>
					<div id="busdetails" class="tab-pane fade">
						<div class="yp-photo-tab">
							<div class="yp-my-photos-bay">
								<h1>BASIC BUSINESS INFORMATION</h1>
								<?php
								foreach ($businessDetails as $bDtls) {
                                // var_dump($bDtls);
									$businid=$bDtls->id;
									
								?>
								<li>
								<div class="yp-review-wrap">
									<h4><a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $businid;?>"><?php echo $bDtls->business_name;?></a></h4>
									<div class="yp-firm-photo">
										<img src="<?php echo $bDtls->image;?>">
									</div>
									<div class="yp-bus-details">
										<ul>
											<li>
												<ul>
													<li>Business Name</li>
													<li>:</li>
													<li><?php echo $bDtls->business_name;?></li>
												</ul>
												<ul>
													<li>Owner Name</li>
													<li>:</li>
													<li><?php echo $bDtls->first_name;?>&nbsp;<?php echo $bDtls->last_name;?></li>
												</ul>
												<ul>
													<li>Email Address</li>
													<li>:</li>
													<li><?php echo $bDtls->email;?></li>
												</ul>
												<ul>
													<li>Phone Number</li>
													<li>:</li>
													<li><?php echo $bDtls->phone_number;?></li>
												</ul>
												<ul>
													<li>Street Address</li>
													<li>:</li>
													<li><?php echo $bDtls->street_address;?></li>
												</ul>
											</li>
											<li>
												<ul>
													<li>State</li>
													<li>:</li>
													<li><?php echo $bDtls->state;?></li>
												</ul>
												<ul>
													<li>City</li>
													<li>:</li>
													<li><?php echo $bDtls->city;?></li>
												</ul>
												<ul>
													<li>Zip Code</li>
													<li>:</li>
													<li><?php echo $bDtls->zip_code;?></li>
												</ul>
												<ul>
													<li>Established Year</li>
													<li>:</li>
													<li><?php echo $bDtls->year_established;?></li>
												</ul>
												<ul>
													<li>Message</li>
													<li>:</li>
													<li><?php echo $bDtls->message;?></li>
												</ul>
											</li>
										</ul>
									</div>
									<ul class="yp-review-option">
										<li>
											<a href="<?php echo base_url();?>Business/editBusiness/<?php echo $bDtls->id;?>">
											<button class="yp-review-edit">Edit</button></a>
										</li>
										<li class="paddinglr10">|</li>
										<li>
											<a href="<?php echo base_url();?>Business/deleBusiness/<?php echo $bDtls->id;?>" onClick="return doconfirm()">
											<button class="yp-review-delete">Delete</button>
										</a>
										</li>
									</ul>
								</div>
								</li>
								
								<?php
							    }
							    ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- END-TABS -->
			
		</div>
	</div>
</div>		
<!-- FOOTER -->
