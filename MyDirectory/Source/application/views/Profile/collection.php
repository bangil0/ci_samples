<div class="row">
    <div class="col-md-12">
		<div class="yp-collection-head3">
			<h2>Collections</h2>
		</div>
    </div>
</div>
<div class="yp_collection bot">
    <div class="row">
        <div class="col-md-12">
		<div class="yp-service-list-wrap2">
            <ul id="services-list">
                <?php
                foreach($defaultClc as $clctn)
                {
                $categoryId=$clctn->id; 
                ?>
                <li>
                <a href="<?php echo base_url();?>Profile/collectionView/<?php echo $categoryId;?>" class="image">
                    <img style="width:141px;height:120px;" src="<?php echo  $clctn->image;?>" alt="Facebook Icon" />
                </a>
                <div class="content">
                    <h4><?php echo $clctn->business_category_name;?></h4>
                </div>
                </li>
                <?php
                }
                ?>
            </ul>
		</div>
        </div>
    </div>
	<br>
	<br>
    <hr class="yp-hr">
    <div class="row">
        <div class="yp_inner">
			<p class="featured">Featured Collections</p>
			<ul id="flexiselDemo3">
				<?php
				foreach($collection as $featured)
				{
				$categoryId=$featured->id; 
				?>
				<li>
                <a href="<?php echo base_url();?>Collection_Details/view_collection/<?php echo $featured->id; ?>"><img src="<?php echo $featured->image;?>"></a>
				<a href="<?php echo base_url();?>Collection_Details/view_collection/<?php echo $featured->id; ?>"><h4 class="collect"><?php echo $featured->business_category_name;?></h4></a>
				</li>
				<?php
				}
				?> 
			</ul>
         </div>  
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <p class="yp_viewall"><a href="<?php echo base_url();?>Feature_collection/view_category">VIEW ALL</a></p>
        </div>
    </div>
</div>
		 </div>
      
