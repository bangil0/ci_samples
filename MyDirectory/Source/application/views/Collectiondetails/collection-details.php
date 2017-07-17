        <!------header in---------------->
   
      
         <!------header end---------------->
		 
<!-- SEARCH-1-PAGE-BEGIN -->
<?php
//var_dump($result);

//echo count($result);
//exit();
//count($result);
$count_result = count($result);

if($count_result=='')	
{
	 redirect(base_url().'Pagenotfound');
}
	
else
{

?>

	</div>
	<div class="yp-featured-banner">
		 <img src="<?php  echo $result->image; ?>"> 
	</div>
	<div class="yp-featured-strip">
	<div class="container">
		<div class="yp-featured-main-head">		
			<?php echo $result->business_category_name; ?>	
		</div>
		<div class="yp-featured-content">
		<p><?php echo $result->description; ?>	</p>
		</div>
		<div class="yp-featured-content-btn-bay">
			<button class="yp-set-edit3">Follow</button>
			<button class="yp-set-edit3">Copy to Collection</button>
			 <div class="dropdown">
				<button class="yp-set-edit2" type="button" data-toggle="dropdown">Share
				</button>
				<ul class="dropdown-menu">
					<li><a href="#">Facebook</a></li>
					<li><a href="#">Google+</a></li>
					<li><a href="#">Twitter</a></li>
				</ul>
			</div>
		</div>
		</div>
		</div>
		<div class="container">
		<div class="yp-featured-content-list">
		<ul>
		<?php
					   
						 
						 $count = 0;
						 foreach ($details as $business_details){
						 	$businID=$business_details->id;
						 $count++;
						 $s= ($count % 2 == 1) ? "odd" : "even"; 
					     //echo $s;
						 //echo "<pre>";
						 //var_dump($business_details);
						 $all_actegories=explode(",",$business_details->business_name);
			             foreach($all_actegories as $category_image)
						 
						
		?>
			<li>
			<?php 
			if($s=='odd'){?>
			
			<div class="row">
				<div class="col-md-4">
					<div class="yp-featured-bus-img align-left">
						<img src="<?php  echo $business_details->image; ?>"> 
					
					</div>
				</div>
				<div class="col-md-8">
					<div class="yp-featured-bus-detail">
						 <h1><a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $businID;?>"> <?php echo $business_details->business_name; ?></a></h1>                       
					
					<h3> 
					<?php echo $business_details->street_address; ?>
					<br></h3>
					<p><?php echo $business_details->description; ?></p>
					</div>
				</div>
			</div>
			<?php 
			}
			if($s=='even'){?>
			
			<div class="row">
				<div class="col-md-8">
					<div class="yp-featured-bus-detail">
					<h1> <a href="<?php echo base_url();?>SearchResult/businessDetails/<?php echo $businID;?>"> <?php echo $business_details->business_name; ?></a></h1>                       
					
					<h3> 
					<?php echo $business_details->street_address; ?>
					<br></h3>
					<p><?php echo $business_details->description; ?></p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="yp-featured-bus-img">
						<img src="<?php echo  $business_details->image; ?>"> 
					
					</div>
				</div>
			</div>
			<?php 
			}
			?>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			</li>
			
			<?php
		
						 }
					?>
			
		</ul>
		</div>
	</div>
	


                </div>
                

  
 
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="js/shadowbox.js"></script>
<script src="js/jquery.nailthumb.js"></script>
<script type="text/javascript">
                jQuery(document).ready(function() {
                    jQuery('.demo').nailthumb({
                        imageCustomFinder: function(el){
                            var image = $('<img />').attr('src',el.attr('href').replace('/full/','/small/')).css('display','none');
                            image.attr('alt',el.attr('title'));
                            el.append(image);
                            return image;
                        },
                        titleAttr:'alt'
                    });
                    Shadowbox.init();
                });
            </script>
			<script src="js/yp-custom.js"></script>
			<script src="js/jquery.slimscroll.js"></script>
			<script src="js/script.js"></script>
			<script src="js/bootstrap.min.js"></script>
<script>
				$("#flexiselDemo4").flexisel({
visibleItems: 5,
animationSpeed: 1000,
autoPlay: true,
autoPlaySpeed: 4000,            
pauseOnHover: true,
enableResponsiveBreakpoints: true,
responsiveBreakpoints: { 
portrait: { 
changePoint:480,
visibleItems: 1
}, 
landscape: { 
changePoint:640,
visibleItems: 2
},
tablet: { 
changePoint:768,
visibleItems: 3
}
}
    
    
    
    
});
  </script>  
<?php
}
?>	  