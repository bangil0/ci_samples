	<div class="row">
         <div class="col-md-6">
            <div class="yp_gallery">
                <h2> Featured Collections</h2>
            </div>
            <div class="col-md-6">
             </div>
        </div>
    </div>
	
    <!--Collections-->
	
    <div class="row">
		<div class="col-md-12">
        <main class="cd-main-content">
            <div class="cd-tab-filter-wrapper">
                <div class="cd-tab-filter">              
					<ul class="cd-filters">
						<li class="placeholder"> 
							<a data-type="all" href="#0">All</a>
							<!-- selected option on mobile -->
						</li> 
						<li class="filter"><a class="selected" href="" data-type="all">ALL &nbsp; &nbsp;&nbsp; &nbsp;  |</a></li>
						<?php
						foreach($result as $users) {			 
						?>  
						<li class="filter"  data-filter=".categories-<?php echo $users->id; ?>"><a href="" data-type="categories-<?php echo $users->id; ?>"><?php echo $users->business_category_name; ?> &nbsp; &nbsp;&nbsp; &nbsp;  |</a></li>				
						<?php
						}
						?>
					</ul>
				<div class="yp_right">      
                    <div class="ddropbtn_yp">
					<button onClick="myFunctions()" class="dropbtn_yp left">All categories  &nbsp;<img src="<?php echo base_url();?>assets/images/cate-drop.png"> </i></button>      
					<div id="tabss" class="dropbtn_yp-content cd-filters">
						<?php
						foreach($results as $categoryname) {			 
						?> 
						<li class="filter"  data-filter=".categories-<?php echo $categoryname->id; ?>"><a href="" data-type="categories-<?php echo $categoryname->id; ?>"><?php echo $categoryname->business_category_name; ?>&nbsp; &nbsp;&nbsp; &nbsp;</a></li>	
					<?php
					}
					?>
					</div>     
					</div>  
				</div>
  <!-- cd-filters -->
				</div>
 <!-- cd-tab-filter -->
			</div> 
 <!-- cd-tab-filter-wrapper -->

                    
    <section class="cd-gallery">
    	<ul>
			 <?php
      foreach($data as $user) {

      $businessID=$user->id;	
      $all_actegories=explode(",",$user->categories);
			 foreach($all_actegories as $category_image)
			 {
			 ?>
			
			<li class="mix categories-<?php echo $category_image;?> check1 radio2 option3">
	               
        <div class="imageHolder">
            <img src="<?php  echo $user->image; ?>">
            <div class="caption">
              <p><a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $businessID;?>"><?php echo $user->business_name; ?></a><br>
              </p>
            </div>
        </div>
     </li>
				 <?php
         }
			   }
        ?>
			</ul>
    </section> <!-- cd-gallery -->

   <!-- cd-filter -->

    
  </main>
  </div>
           
</div>
</div>


