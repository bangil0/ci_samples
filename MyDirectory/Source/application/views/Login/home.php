<?php
$res= $this->session->userdata('searchResult');
$business=$res['business'];
$city=$res['city'];
?>


  
      <div class="baner">
         <div class="container">
            <div class="row">
               <div class="col-md-4"></div>
               <div class="col-md-8">
                  <div class="job">
                     <h4>CONNECT WITH SERVICE EXPERTS TO GET YOUR JOB DONE</h4>
                  </div>
                          <?php
                         $city_name = "";
                         $home_city = get_cookie('md_homecity');
                         if($home_city) {
                         $city_name = $home_city;
                         }
                         ?>
                  <form id="searchForm" method="get" action="SearchResult/result" >
                  <div class="search" >
                     <!-- <input type="hidden" name="page" value="0"  > -->
                     <input type="text" class="styled-select sh" id="country" autocomplete="off" name="city" value="<?php echo $city_name; ?> " placeholder="Search..."  required>  
                     <ul  class="results  dropdown-menu txtcountry lefft " id="DropdownCountry"  role="menu" aria-labelledby="dropdownMenu">
                        
                     </ul>
                    


                 </div>
                  <div class="crntlctn">
                    
                      <ul  class="results_crnt" id="check"  style="display:none;">
                         <li class="zip_md left"> &nbsp;Search by city</li>
                        <li class="color"> <a  ><i class="fa fa-location-arrow"></i>
                           My current Location</a>
                           
                        </li>
                       
                     </ul>
                   </div>
                  <div class="search_business" >
                  <input type="text" id="business" autocomplete="off" name="business"  class="searchBox" placeholder="What Service do you need today?" required>  
                  <ul class="search_results dropdown-menu txtbusiness llft"  id="DropdownBusiness">
                      
                       <li class="zip_md"> &nbsp;Search by category</li>
                       
                       
                     </ul>
                 </div>
                  <button type="submit" class="find" >Find</button>
                   </form>
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

           

            <div class="row">
               <div class="col-md-6"></div>
               <div class="col-md-6">
                  <div class="get">
                     <h1>GET APP</h1>
                     <div class="arow">
                        <img src="<?php echo base_url();?>assets/images/arrow.png">
                     </div>
                     <p>Choose your native platform and download the app free</p>
                  </div>
                  <div class="playstore">
                     <div class = "raspberry">
                        <a href="#"><img src="<?php echo base_url();?>assets/images/goo.png"/></a>
                     </div>
                     <div class = "raspberry">
                        <a href="#"> <img src="<?php echo base_url();?>assets/images/apple.png"/></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
     
      <div class="row">
         <p class="featured">Featured Collections</p>
         <ul id="flexiselDemo3">
           <?php
          foreach($collection as $featured)
           {
            
          ?>
            <li>
               <a href="<?php echo base_url();?>Collection_Details/view_collection/<?php echo $featured->id; ?>"><img src="<?php  echo $featured->image;?>"></a>


               <a href="<?php echo base_url();?>Collection_Details/view_collection/<?php echo $featured->id; ?>"><h4 class="collect"><?php echo $featured->business_category_name;?></h4></a>
               
            </li>
			
			

         
            <?php
            }
           ?> 
            
         </ul>
      </div>
    <div class="row">
                  <div class="col-md-6"></div>
                  <div class="col-md-6">
                     <p class="yp_viewall"><a href="<?php echo base_url();?>Feature_collection/view_category">VIEW ALL</a></p>
                  </div>
               </div>