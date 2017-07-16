
		 
<!-- SEARCH-1-PAGE-BEGIN -->

	<div class="yp-map-content">
	<div class="row">
		<div class="col-md-4 padding-r0">
			
			<div class="yp-left-frame">
				<div class="yp-left-frame-head">
				<h1>Business Details</h1>
				
				</div>
				<div class="yp-left-frame-scroll">
					<ul class="yp-item-div-ul">
						<?php

			            $map_data = array();
                        $maps = '[]';
                        $h=0;
			           foreach($sMap as $mDetails)
			            {
			            	/*echo "<pre>";
			            	var_dump($sMap);exit;*/

                        $b_id=$mDetails->id;
			            $h++;
			             ?>
						<li>
						<div class="yp-item-pic">
							<div class="yp-pic">
								<img src="<?php echo $mDetails->image;?>">
							</div>
						</div>
						<div class="yp-item-detail">
							<div class="yp-item-head"><h1><a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $b_id;?>"><?php echo $mDetails->business_name;?></a></h1></div>
							<div class="yp-item-rate">
							 <!--rating-->  

                        <div  id="ratings<?php echo $h;?>" data-id="<?php echo $mDetails->rating;?>" data-title="ratings<?php echo $h;?>" class="ratings"></div> 
                               
                              <!--rating end--> 
							</div>
							<p>
							<?php echo $mDetails->street_address;?>
							</p>
							<p>
							<?php echo $mDetails->phone_number;?>
							</p>
						</div>
						</li>
						<?php
						$map_data[] = '{ "DisplayText": "'.$mDetails->business_name.'", "Location": "'.$mDetails->city.'", "LatitudeLongitude": "'.$mDetails->latitude.','.$mDetails->longitude.'", "Address": "'.$mDetails->street_address.'","Website": "'.$mDetails->website.'"}';
                         }
                        $maps = '['.implode(",", $map_data).']';
						 ?>
						
					
					</ul>
				</div>
			</div>
			<?php
			?>
		</div>
		
		<div class="col-md-8 padding-l0">
			<div class="yp-big-map" >
				<div id="map-canvas" class="map1" style="height:100%;"></div>
			</div>
		</div>
	</div>
	</div>
</div>	
   <script type="text/javascript">


    var data = '<?php echo $maps; ?>';
       

    </script>     


                