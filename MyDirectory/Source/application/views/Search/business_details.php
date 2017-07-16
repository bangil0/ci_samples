<style type="text/css" media="screen">
.gallery{width:100%;}
.demo{
width: 150px;
height: 150px;
background-position: center center;
background-repeat: no-repeat;
display: inline-block;
list-style:none;
margin: 1px;
}
.demo img{width:100%;height:100%;}
</style>
		 
<!-- SEARCH-1-PAGE-BEGIN -->
<?php
     $user_details=$this->session->userdata('userdatas');
      $user_id=$user_details['id'];
      //var_dump($details);
      ?>

	
		<div class="row">
			<div class="col-md-8">
				<div class="yp-left-part">
					<div class="yp-business-wrap">
						<div <?php if($user_id){?> class="yp-badges" <?php } else {?> class="lgnbadge" <?php }?>>
					<?php
					 if($favourite==0)
					 {
					 ?>	
					<div class="yp-badge">
					<input type="hidden" name="fav_businessId" class="favrt" value="<?php echo $details->id;?>">
					<input type="hidden" name="fav_CId" class="cat" value="<?php echo $details->cid;?>">  	
					</div>
					<?php
					 }
					 else
					 {
					 ?>
					<div class="yp-badge1">
						<input type="hidden" name="fav_businessId" class="favrt" value="<?php echo $details->id;?>">
					<input type="hidden" name="fav_CId" class="cat" value="<?php echo $details->cid;?>"> 
					</div>
					<?php
					 }
					 ?>
					</div>
					<?php
					
					$map_data[] = '{ "DisplayText": "'.$details->business_name.'", "Location": "'.$details->city.'", "LatitudeLongitude": "'.$details->latitude.','.$details->longitude.'", "Address": "'.$details->street_address.'","Website": "'.$details->website.'"}';
					$maps = '['.implode(",", $map_data).']';
                     //var_dump($maps);
					?>

					<h1><?php echo $details->business_name;?></h1>
				
					 <!--rating-->  
                    <div  id="b_rating<?php echo $details->id;?>" data-id="<?php echo $details->rating;?>" data-read="true" data-title="b_rating<?php echo $details->id;?>" class="b_rating"></div>
                     <!--rating end--> 

					<h5>AVAILABLE</h5>
					<div class="yp-business-wrap-inner">
						<div class="yp-business-wrap-inner-left">
							<?php 
							if($details->open_time & $details->close_time)
							{
							?>


							<ul class="yp-today">
								<li style="width:25%">Today</li>
								<li>:&nbsp;&nbsp;<?php echo $details->open_time;?> - <?php echo $details->close_time;?></li>
							</ul>
							<?php
						     }
						     else
						     {	
						     ?>
						     <ul class="yp-today">
								<li style="width:25%">Place</li>
								<li>:&nbsp;&nbsp;<?php echo $details->city;?> - <?php echo $details->state;?></li>
							</ul>
							<?php
						    }
						    ?>
							<br>
							
							<p><?php echo $details->street_address;?></p>
							<h3><img src="<?php echo base_url();?>assets/img/yp-phone.png" style="width:27px;margin-right:10px;"><?php echo $details->phone_number;?></h3>
						</div>
						<div class="yp-business-wrap-inner-right">
						<div class="yp-btn-bay">
							<button class="yp-review-btn"  <?php if($user_id){?> ng-click='newRating()' <?php } else {?> ng-click='logRating()' <?php } ?>>Write a Review</button>
							
							<!-- REVIEW-POP -->
							
							<div class="modal fade" id="review-pop" role="dialog" >
											<div class="modal-dialog yp-review-pop">
														<div class="modal-content">
												
														<button class="yp-pop-close " data-dismiss="modal"></button>
													
													<div class="yp-review-pop-content">
														<div class="yp-review-left">
															<div class="yp-review-pop-pic">
																<img src="<?php  echo $details->image;?>"></img>
															</div>
															<h1><?php echo $details->business_name;?></h1>
															<h2><?php echo $details->street_address;?></h2>
															<p><?php echo $details->description;?></p>
														</div>
														<div class="yp-review-right">
														<h1>Write a Review</h1>
														<hr>
														<h2>Overall Rating</h2>
														<div class="yp-review-pop-rating">
														<span class="rating" style="margin-top:7px">
															
														    <input type="hidden" class="rBid<?php echo $details->id;?>" name="bid" value="<?php echo $details->id;?>">	
														 
													 <!--rating-->  
                                                   <div  id="b_rating1<?php echo $details->id;?>" data-id="<?php echo $details->rating;?>"  data-title="b_rating1<?php echo $details->id;?>" class="b_rating1"></div>
                                                     <!--rating end--> 
														
														</span>
														</div>
														<div class="yp-review-pop-textarea">
											<textarea rows="5" class="yp-textarea cmnts<?php echo $details->id;?>" name="comments"><?php echo $details->comments;?></textarea>
															
															
														</div>
														</div>
														<!--  <div class="{{class}}">
                                                             {{ message }}
                                                         </div> -->
													</div>
													
													
													<div class="yp-add-pop-btn-bay-sbmt">
															<button class="yp-pop-submit" onclick="Busirating(<?php echo $details->id;?>)" type="submit">SUBMIT</button>
															<button class="yp-pop-sbmtcncl " data-dismiss="modal">CANCEL</button>
														</div>
												</div>
												
												
											</div>
										</div>
										<!--END REVIEW POP -->

							<div class="yp-blank" ></div>
							<button  ng-controller='imageUpload' class="yp-add-photo" <?php if($user_id){?> ng-click="imgUpload()" <?php } else {?> ng-click="lgnImgUpload()" <?php } ?> >+ &nbsp;Add A photo</button>
							
							<!-- POP-UP -->
							<form action="<?php echo base_url();?>SearchResult/addBusinessImage" method="post"  enctype="multipart/form-data">
							<div class="modal fade" id="add-photo-pop" role="dialog">
											<div class="modal-dialog yp-add-photo-pop">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header yp-add-photo-pop-header">
														<button class="yp-pop-close " data-dismiss="modal"></button>
														<h4 class="">Add a Photo</h4>
													</div>
													<div class="yp-add-photo-pop-header-content">
														<div class="yp-add-photo-pop-header-content-inner">
														<ul class="yp-add-pop-ul">
														<li> <?php echo $details->business_name;?></li>
														<li><?php echo $details->street_address;?></li>
														<li><?php echo $details->phone_number;?></li>
														</ul>
														</div>
														
													</div>
													<div class="yp-add-photo-list desc">
															<ul class="yp-list-pop">
																<li>Photos should be clear and in focus</li>
																<li>Photos should be of the business, product or service, not an illustration or clip art</li>
																<li>Photos should not be an advertisment or include contact information</li>
															</ul>
														</div>



                                                    <!-- 	<div class="yp-pop-add-photo-dscrbtion">
													The image you choose is<br>
													FB_IMG_1443084166032.jpg
													</div> -->
													<div class="yp-pop-img-wrap shimg" style="display:none;" >
														<div class="yp-pop-img " >
														<img class="preview_uploaded_image" src="#">
														</div>
														<p>By clicking Submit below, I hereby certify that I have the right to use and
														distribute the uploaded material and such material does not, and will not
														infringe any third party right or violate the MD.com <a href="<?php echo base_url();?>">Terms & Conditions.</a>
														</p>
													</div>
												

													
													<div class="yp-add-photo-pop-footer preview_div">
														<div class="yp-add-pop-btn-bay">
													<!--change browse button name-->
													<input type="file" name="image" accept="image/*" class="img_preview" id="browse"  style="display: none" onChange="Handlechange();"/>
                                                    <input type="button" value="Select A Photo" class="yp-pop-select" id="fakeBrowse" onclick="HandleBrowseClick();"/>
													 <!--change browse button name-->
													
														
														<input type="hidden" name="business_id" value="<?php echo $details->id;?>" >
															<button class="yp-pop-select " data-dismiss="modal">CANCEL</button>
												
														</div>
														
													</div>

														<div class="yp-add-pop-btn-bay-sbmt upldbtn" style="display:none;">
															<button type="submit" name="submit" class="yp-pop-submit">SUBMIT</button>
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
												
												
											</div>
										</div>
							          </form>
							
							<!--END-POP-UP -->
							
						</div>
						
						<div class="yp-photo-bay">
						<?php
						foreach ($limitgallery as $galry) {
                         
						?>
						<li class="yp-photo"><img src="<?php echo $galry->image;?>"></img>
						</li>
						<?php
					     }
					     ?>
						</div>
						
						<div class="yp-photo-footer">
				<?php
				if($gallery)
				 {
				 	?>
						<a href="#gallery">View All Images</a>
				  <?php
					}
					?>
						</div>
						</div>
					</div>
					</div>
					<div class="yp-business-tab">
						<ul class="yp-bus-ul">
							<li><a style="border-bottom:3px solid #ffd400;" class="active" href="#business">BUSINESS DETAILS</a></li>
							<?php
				           if($limitgallery)
				           {
				 	       ?>
							<li style="width: 70%;"><a href="#gallery">GALLERY</a></li>
							<?php
						     }
						     ?>
							<li><a href="#review">REVIEWS</a></li>
						</ul>
						<div id="business">
						<div class="yp-business">
							<h1><?php echo $details->description;?></h1>
							<?php
							 if($details->social_links)
							 {
							?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Social Links</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"><a href="<?php  echo $details->social_links;?>" target="_blank"><?php  echo $details->social_links;?></a></li>
							</ul>
							</li>
							<?php
							 }
							 if($details->hours)
							 {
							 ?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Hours</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"><?php echo $details->hours;?></li>
							</ul>
							</li>
							<?php
							 }
							 if($details->message)
							 {
							 ?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Message</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"><?php echo $details->message;?></li>
							</ul>
							</li>
							<?php
							 }
							 if($details->general_info)
							 {
							 ?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">General Info</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"><?php echo $details->general_info;?> </li>
							</ul>
							</li>
							<?php
							 }
							 if($details->extra_phones)
							 {
							 ?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Extra Phones</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"> <?php echo $details->extra_phones;?></li>
							</ul>
							</li>
							<?php
						     }
						     ?>
						</div>
						</div>
					</div>
					<!-- <div class="yp-sponsered">
						<div class="yp-spnsrd-head">
						<h1>SPONSORED LINKS</h1>
						</div>
						<ul class="yp-sponserd-ul">
							<li class="yp-sponserd-li">
								<div class="yp-spon-prof">
								</div>
								<div class="yp-spon-prof-detail">
								<h5>Best Eyebrows threading</h5>
								<p>www.uniquethreading.com/</p>
								<p>Only Trustable salons 3 convenient Location NYC find out one near you</p>
								</div>
							</li>
							<hr>
							<li class="yp-sponserd-li">
								<div class="yp-spon-prof">
								</div>
								<div class="yp-spon-prof-detail">
								<h5>Best Eyebrows threading</h5>
								<p>www.uniquethreading.com/</p>
								<p>Only Trustable salons 3 convenient Location NYC find out one near you</p>
								</div>
							</li>
							<hr>
							<li class="yp-sponserd-li">
								<div class="yp-spon-prof">
								</div>
								<div class="yp-spon-prof-detail">
								<h5>Best Eyebrows threading</h5>
								<p>www.uniquethreading.com/</p>
								<p>Only Trustable salons 3 convenient Location NYC find out one near you</p>
								</div>
							</li>
						</ul>
					</div> -->
					<div class="yp-business-tab">
					<div class="yp-business">
						<?php
						 if($details->brands)
						 {
						 ?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Brands</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"><?php echo $details->brands;?></li>
							</ul>
							</li>
							<?php
						    }
						    if($details->payment_method)
						    {
						    ?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Payment method</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"><?php echo $details->payment_method;?></li>
							</ul>
							</li>
							<?php
						    }
						    if($details->street_address)
						    {
						    ?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Location</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"><?php echo $details->street_address;?></li>
							</ul>
							</li>
							<?php
						     }
							 if($details->neighborhoods)
							 {
							 ?>	
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Neighborhoods</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"><?php echo $details->neighborhoods;?></li>
							</ul>
							</li>
							<?php
							 }
							 if($details->amenities)
							 {	
							 ?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Amenities</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"><?php echo $details->amenities;?></li>
							</ul>
							</li>
							<?php
							 }
							 if($details->accreditation)
							 {	
							 ?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Accreditation</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"><?php echo $details->accreditation;?></li>
							</ul>
							</li>
							<?php
							 }
							 if($details->associations)
							 {
							 ?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Associations</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"><?php echo $details->associations;?></li>
							</ul>
							</li>
							<?php
						     }
						     if($details->other_link)
						     {
						     ?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Other Link</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3" style="font-style:italic"><a href="<?php echo $details->other_link;?>" target="_blank"><u><?php echo $details->other_link;?></u></a></li>
							</ul>
							</li>
							<?php
						     }
						    
						     ?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Categories</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"><?php echo $details->business_category_name;?></li>
							</ul>
							</li>
							<?php
							 if($details->other_information)
							 {
							 ?>
							<li class="yp-bus-parent">
							<ul class="yp-business-ul">
								<li class="yp-bus-li-1">Other Information</li>
								<li class="yp-bus-li-2"><span>:&nbsp;&nbsp;</span></li>
								<li class="yp-bus-li-3"><?php echo $details->other_information;?></li>
							</ul>
							</li>
							<?php
							 }
							 ?>
						</div>
					</div>
				</div>
			</div>
			<a onclick="BusMapShow(this)" data-BId="<?php echo $buSId;?>">
			<div class="col-md-4">

				<div class="yp-right-part">
					
					 <!--map-->
                  <div id="map-canvas" class="map1 inr" >
                 
                 </div>
                    </a>
                    <!--end map-->
					 <ul class="yp-ad-ul">
					 	<?php
					 
					 	foreach($advertisement as $ad){
                          $busiId= $ad->id;
					    ?>
						<li class="yp-ad-li">
								<h2><a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $busiId;?>"><?php echo $ad->business_name;?></a></h2>
							<ul class="yp-ad-inner-ul">
								<li><?php echo $ad->street_address;?></li>
								<li><?php echo $ad->phone_number;?></li>
								<li><a href="<?php echo $ad->website;?>">Website</a>&nbsp;&nbsp;<span style="color:#b99d0e">
									|</span>&nbsp;&nbsp;<a href="<?php echo base_url();?>SearchResult/BusMapShow/<?php echo $busiId;?>"> Directions</a>&nbsp;&nbsp;
									<span style="color:#b99d0e">
									|</span>&nbsp;&nbsp;<a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $busiId;?>">More Info</a></li>
							</ul>
							<div class="ad">
							AD
							</div>
						</li>
						<?php
					    }
					    ?>

					
					 </ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php
				 if($gallery)
				 {
				 ?>	
				<div id="gallery">
				<div class="yp-gallery">
					<div class="yp-gallery-head">
					<div class="gal" style="width:50%;"><h1>Gallery</h1></div>
					<div class="brwse" style="width:50%;text-align: right;"><h1>Browse Gallery</h1></div>
					</div>
					<?php 
					foreach ($gallery as $images) {
					
					
					?>
					<div class="gallery">	
						<a class="demo nailthumb-container" style="float:left;" rel="shadowbox[gallery]" title="show image" href="<?php echo $images->image;?>"><img src="<?php echo $images->image;?>" alt="" title="" /></a>
					
					</div>
					<?php
				    }
				    ?>
				</div>
				</div>
				<?php
				 }
				 ?>
				<div id="review">
				<div class="yp-review">
					<div class="yp-review-head">
						<div class="gal" style="width:50%;"><h1>Reviews</h1></div>
					</div>
					<div class="yp-rate" >
					
					<div style="width:50%;display:inline-flex;">
					<div style="width:35%;padding-top: 9px;">
					Review this Business
					</div>

					<div style="width:30%;"  >
	<form <?php if($user_id){?> ng-click='newRating()' <?php } else {?> ng-click='logRating()' <?php } ?>  >
   
      <input class="star star-5" id="star-5" type="radio" value="5"name="star"/>
      <label class="star star-5" for="star-5"></label>
      <input class="star star-4" id="star-4" type="radio" value="4"name="star" />
      <label class="star star-4" for="star-4"></label>
      <input class="star star-3" id="star-3" type="radio" value="3"name="star" />
      <label class="star star-3" for="star-3"></label>
      <input class="star star-2" id="star-2" type="radio" value="2"name="star" />
      <label class="star star-2" for="star-2"></label>
      <input class="star star-1" id="star-1" type="radio" value="1"name="star" />
      <label class="star star-1" for="star-1"></label>
  </form>
  </div>
	 
	    
					</div>
					
					<div style="width:50%;text-align:right;padding-top: 9px;">
					Click to Rate
					</div>
					</div>
					<ul class="yp-review-ul">
					<?php
					$j=0;
					foreach($review as $reviews)
					{
                     $j++;
                      $timestamp=$reviews->created_date;
					  $splitTimeStamp = explode(" ",$timestamp);
                      $rdate = $splitTimeStamp[0];
					?>	

					<li>
					<span><img src="<?php echo base_url();?>assets/img/yp-usr.png"></span>
					<span class="review-name"><?php echo $reviews->username;?></span>
					<span class="date"><?php echo $rdate;?></span>
					<!--rating-->  

                <div  id="ratings<?php echo $j;?>" data-id="<?php echo $reviews->rating;?>" data-read="true" data-title="ratings<?php echo $j;?>" class="b_rating yp-ratting1"></div>
                               
                   <!--rating end-->   
					<div class="yp-review-inner">
					<p><?php echo $reviews->comments;?></p>
					<!-- <p>Like this review?
					<span style="color:#fed624;font-weight:600;">&nbsp;&nbsp;Yes</span></p> -->
					<!-- <p><span><img src="<?php echo base_url();?>assets/img/yp-shre.png" style="padding-right:20px;"></span>Share Review</p> -->
					</div>
					</li>
					<?php
					 }
					 ?>
				
					</ul>
				<!-- 	<div class="yp-pagination">
						<div class="row">
							<div class="col-md-6"></div>
							<div class="col-md-6">
								<ul class="yp-inner-pagination">
								<li><a href=#">First</a></li>
								<li><a href=#">1</a></li>
								<li><a href=#">2</a></li>
								<li><a href=#">3</a></li>
								<li><a href=#">4</a></li>
								<li><a href=#">5</a></li>
								<li><a href=#">6</a></li>
								<li><a href=#">7</a></li>
								<li><a href=#">8</a></li>
								<li><a href=#">Last</a></li>
								</ul>
							</div>
						</div>
					</div> -->
				</div>
				</div>
			</div>
		</div>
	</div>
	<div class="yp-up-frame">
	<a href="#top" style="outline:none;">
       <div class="yp-up"></div>
	   </a>
	   </div>



<script type="text/javascript">

   var data = '<?php echo $maps; ?>';
         

    </script>