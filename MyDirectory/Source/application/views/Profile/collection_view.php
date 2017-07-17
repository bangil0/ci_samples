
  
  <div class="container" style="margin-top:1px;">
  <div class="yp-set-row">
  
  
  </div>
  <div class="yp-add-bus-wrap no">
 
   <?php
   if($businClctn)
   {
     foreach($businClctn as $busi)
     {
      $busID=$busi->id;
     ?>    
  <li>
  <div class="yp-bus">
    <div class="yp-top-ban">
    </div>
    <div class="yp-bus-in">
      <h1><a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $busID;?>"><?php echo $busi->business_name; ?></a></h1>
      <div class="yp-bus-rate">
      <!--rating-->  
  <div  id="b_rating<?php echo $busi->id;?>" data-id="<?php echo $busi->rating;?>" data-read="true" data-title="b_rating<?php echo $busi->id;?>" class="b_rating"></div>
    <!--rating end--> 
      
      </div>
      <p><?php echo $busi->comments; ?></p>
      <h5>
      <?php echo $busi->street_address; ?><br>
      <strong><?php echo $busi->phone_number; ?></strong></h5>
    </div>
    <div class="yp-bus-in-btm">
        <!-- <div class="d1">NOTES</div> -->
        <div class="d2"><a href="<?php echo base_url();?>SearchResult/BusMapShow/<?php echo $busID;?>">  <img src="<?php echo base_url();?>assets/images/drct.png"> &nbsp;DIRECTION</a></div>
        <div class="d3"><a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $busID;?>"><img src="<?php echo base_url();?>assets/images/more.png"> &nbsp;MORE</a></div>
      </div>
  </div>
  </li>
   <?php
       }
      }
      else
      {
        ?>
         <div class="no-results ttop width"><div class="yp_found  "><img src="<?php echo base_url();?>assets/images/found.png" width="150px;height:134px;"></div>no search results found</div>
      <?php
      } 
       ?>

  

  <div class="clearfix"></div>
  </div>
 
 
  
  </div>
<div class="md_gap"></div>
  </div>  
  
