
		 
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
                        $d=0;
			           foreach($bMap as $bDetails)
			            {
                         
                        $b_id=$bDetails->id; 
			            $d++;
			             ?>
						<li>
						<div class="yp-item-pic">
							<div class="yp-pic">
								<img src="<?php echo  $bDetails->image;?>">
							</div>
						</div>
						<div class="yp-item-detail">
							<div class="yp-item-head"><h1><a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $b_id;?>"><?php echo $bDetails->business_name;?></a></h1></div>
							<div class="yp-item-rate">
							 <!--rating-->  

                        <div  id="ratings<?php echo $d;?>" data-id="<?php echo $bDetails->rating;?>" data-title="ratings<?php echo $d;?>" class="ratings"></div> 
                               
                                  <!--rating end--> 
							</div>
							<p>
							<?php echo $bDetails->street_address;?>
							</p>
							<p>
							<?php echo $bDetails->phone_number;?>
							</p>
						</div>
						</li>
						<?php
						$map_data[] = '{ "DisplayText": "'.$bDetails->business_name.'", "Location": "'.$bDetails->city.'", "LatitudeLongitude": "'.$bDetails->latitude.','.$bDetails->longitude.'","Address": "'.$bDetails->street_address.'","Website": "'.$bDetails->website.'"}';
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


                