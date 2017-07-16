<?php


         $res= $this->session->userdata('searchResult');
         $business=$res['business'];
         $city=$res['city'];
        
     ?>
      
         <div class="row" style="padding-top:15px;">
            <div class="col-md-8">
                  <div class="filter back_color"data-target="#demo">&nbsp;&nbsp;  &nbsp;<i class="fa fa-search fa-lg"></i>&nbsp; 

SEARCH BY <?php echo $city;?> CITY</div>
             <!--      <div id="demo">
                     <div class="options">
                        <h4>Category</h4>
                        <ul>
                           <li>
                              <input type="checkbox">
                              <label>Beauty Salons</label>
                              <div style="clear:both"></div>
                           </li>
                           <li>
                              <input type="checkbox">
                              <label>Hair Styles</label>
                              <div style="clear:both"></div>
                           </li>
                           <li>
                              <input type="checkbox">
                              <label>Day Spas</label>
                              <div style="clear:both"></div>
                           </li>
                        </ul>
                        <p class="yp_more">more >></p>
                     </div>
                     <div class="options1">
                        <h4>Features</h4>
                        <ul>
                           <li>
                              <input type="checkbox">
                              <label>Book a Table</label>
                              <div style="clear:both"></div>
                           </li>
                           <li>
                              <input type="checkbox">
                              <label>Coupons</label>
                              <div style="clear:both"></div>
                           </li>
                           <li>
                              <input type="checkbox">
                              <label>Book an Appointment</label>
                              <div style="clear:both"></div>
                           </li>
                        </ul>
                        <p class="yp_more">&nbsp;</p>
                     </div>
                     <div class="options2">
                        <h4>Neighourhoods</h4>
                        <ul>
                           <li>
                              <input type="checkbox">
                              <label>Beauty Salons</label>
                              <div style="clear:both"></div>
                           </li>
                           <li>
                              <input type="checkbox">
                              <label>Hair Styles</label>
                              <div style="clear:both"></div>
                           </li>
                           <li>
                              <input type="checkbox">
                              <label>Day spas</label>
                              <div style="clear:both"></div>
                           </li>
                        </ul>
                        <p class="yp_more">more >></p>
                     </div>
                  </div> -->
          <!--      <div class="sponsered">
                  <h4 style="margin-left:10px;">Sponsored Links</h4>
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
               </ul> -->
                  <div class="full_profile">
                     <ul id="postList">
                     <li>
                           <?php
                           $map_data = array();
                           $maps = '[]';
                           $i=0;
                         
                           foreach ($result as  $value) 
                            {
                          
                              $i++;
                              $b_id=$value->id;
                              
                        
                           ?>
                        <div class="profile_details" >
                        
                           <div class="col-md-12">
                              <div class="col-md-2 padding">
                                 <div class="profile_pic"><img src="<?php  echo $value->image;?>"></div>
                              </div>
                              <div class="col-md-6">
                                 <div class="profile_rights top"><a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $b_id;?>"> <?php echo $value->business_name;?></a> </div>
                               
                                 <!--rating-->  

                               <div  id="ratings<?php echo $i;?>" data-id="<?php echo $value->rating;?>" data-title="ratings<?php echo $i;?>" class="ratings"></div>
                               
                                  <!--rating end-->  
                                  
                             <br>
                                 <p class="sub_head">
                                    <?php echo $value->street_address;?><br>
                                    <?php echo $value->phone_number;?>
                                 </p>
                              </div>
                              <div class="col-md-4">
                                 <div class="details2">
                                    <?php echo $value->business_category_name;?>
                                    <br>
                                    <div class="website">
                                      <a href="<?php echo $value->website;?>" target="_blank"> Website</a> | <a href="<?php echo base_url();?>SearchResult/BusMapShow/<?php echo $b_id;?>"> Directions</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="col-md-2"></div>
                                 <div class="col-md-10" style="padding:0;">
                                    <div class="description">
                                       <p><?php echo $value->description;?></p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                    
                        </div>
      <?php

    $map_data[] = '{ "DisplayText": "'.$value->business_name.'", "Location": "'.$value->city.'", "LatitudeLongitude": "'.$value->latitude.','.$value->longitude.'", "Address": "'.$value->street_address.'","Website": "'.$value->website.'"}';
     }
    $maps = '['.implode(",", $map_data).']';
   
     
      ?>

                     </li>
                    
                  
                  </div>
               <!-- <div class="sponsered">
                  <h4 style="margin-left:10px;">Sponsored Links</h4>
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
                 
                 
               </ul> -->
             <!--   <div class="result" >Showing 35 total of 6854 results</div>
                
               <div  class="pagination">
                
                  <a href="#"
                     class="page1">First</a>
                  <a href="#" class=
                     "page1">1</a><a href="#" class="page1">2</a><span
                     class="page active">3</span><a href="#" class=
                     "page1">4</a><a href="#" class="page1">5</a>
                  <a href="#" class="page1">6</a>
                  <a href="#" class="page1">7</a>
                  <a href="#" class="page1">8</a>
                  <a href="#" class="page1">9</a>
                  <a href="#"
                     class="page1">Last</a>
               </div> -->
            </div>

            <a onclick="mapShowFunc(this)" data-cid="<?php echo $Catid;?>">
			<div class="col-md-4">
               <!--map-->
               <div id="map-canvas" class="map1" >
            
               </div></a>
               <!--end map-->
               
               <ul class="yp-ad-ul">
                  <?php
                foreach ($ad as $advertisement) {

                  
                  $busiId=$advertisement->id;

                 ?>
                  <li class="yp-ad-li">
                     <h2><a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $busiId;?>" ><?php echo $advertisement->business_name;?></a></h2>
                     <ul class="yp-ad-inner-ul">
                        <li><?php echo $advertisement->street_address;?></li>
                        <li><?php echo $advertisement->phone_number;?></li>
                        <li><a href="<?php echo $advertisement->website;?>">Website</a>&nbsp;&nbsp;<span style="color:#b99d0e">|</span>&nbsp;&nbsp;<a href="<?php echo base_url();?>SearchResult/mapShow/<?php echo $busiId;?>"> Directions</a>&nbsp;&nbsp;<span style="color:#b99d0e">|</span>&nbsp;&nbsp;<a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $busiId;?>">More Info</a></li>
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
     


    <script type="text/javascript">


         var data = '<?php echo $maps; ?>';
        
        //alert(data);
          // ViewCustInGoogleMap(data);
        
   
    </script>