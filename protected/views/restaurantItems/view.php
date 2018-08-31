<?php
/* @var $this RestaurantItemsController */
/* @var $model Restaurant_items */
$colspan=2;
$this->breadcrumbs=array(
	'Restaurant Items'=>array('index'),
	$model->	res_item_id,
);

$this->menu=array(
	array('label'=>'List Restaurant_items', 'url'=>array('index')),
	array('label'=>'Create Restaurant_items', 'url'=>array('create')),
	array('label'=>'Update Restaurant_items', 'url'=>array('update', 'id'=>$model->	res_item_id)),
	array('label'=>'Delete Restaurant_items', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->res_item_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Restaurant_items', 'url'=>array('admin')),
);
?>
<style>
	tbody{
    height:25px;
    overflow-y:auto;
    width: 100%;
    }
	
	.direct-chat-messages {
	
    height: 345px;
	}
</style>

<?php 
		$Regular_P=$Large_P="<span class='text-red'>not available</span>";

		if($model->regular_price>0)
		{	
			$Regular_P="Rs. ".$model->regular_price;
			

		}
		if($model->large_price>0)
		{	
			$Large_P="Rs. ".$model->large_price;
			
			
		}
?>

<section class="content-header" onload="listIngredients()">
   
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
		
	<?php endif?>
	<h1>Restaurant Menu </h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-6">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $model->item_name; ?></b></h3>
			
				</div>
			
				<div class="box-body " id="box-body">
				<h4 class="description-header pull-right">Large Price: <?php echo $Large_P.'.00'; ?></h4>
				<h4 class="description-header ">Regular Price: <?php echo $Regular_P.'.00'; ?></h4>
				
			<table class="table table-hover" id="compareul">
                <tr>
				
				<th>Ingredient</th> 
              
			  <?php if($model->regular_price>0)
					{	
						echo '<th>Qty R</th>';
						$colspan++;
						

					}
					if($model->large_price>0)
					{	
						echo '<th>Qty L</th>';
						$colspan++;
						
					}
			  ?>
			  
                        
                </tr>
					
				
				<?php
					
					$Current_ing= MainData::Saved_Ing($model->res_item_id);
					
					if(count($Current_ing)==0)
					{
		
					echo'  <tr><td colspan="'.$colspan.'" align="center">No Ingredients selected</td> </tr> ';
	
						
					}
					foreach ($Current_ing as $row1){
				 ?>
               
				<tr>
				  <td>
                  
				<?php echo $row1['ingrediant_name']; ?>      
                
                  
				<?php 
					if($model->regular_price>0){
					echo "<td> ".$row1['regular_qty']." ".$row1['unit']."</td>";}
				
				  if($model->large_price>0){
                  echo "<td> ".$row1['large_qty']." ".$row1['unit']."</td>";}
					?> 
                </tr>
					<?php } ?>
               

			</table>

				</div>
					<div class="box-footer clearfix"  id="box-footer">
						
					 
					</div>
				</div>
			</div>
		
		<div class="col-xs-6">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Menu Items<b></b></h3>
			
				</div>
			
				<div class="box-body " id="box-body">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
						<?php 
								$Item_cat= MainData::Res_Item_Category();
								$ResItem= MainData::Saved_ResItem();
								$tab=1;
								foreach($Item_cat as $cat)
								{
									foreach($ResItem as $item)
									{
												
										if($cat['id']==$item['category'])
										{
											if($tab==1)
											{
											echo '<li class="active"><a href="#tab_'.$tab.'" data-toggle="tab">'.$cat['category'].'</a></li>';
											}
											else
											{
											echo '<li ><a href="#tab_'.$tab.'" data-toggle="tab">'.$cat['category'].'</a></li>';	
											}
											$tab++;
											continue 2;
										}
									}	
								}	
						?>
							        
						</ul>
							<div class="tab-content">
							<?php $tab=1;
							foreach($Item_cat as $cat){
									
								if($tab==1){
								echo ' <div class="tab-pane active" id="tab_'.$tab.'">';
								}
								else{
								echo ' <div class="tab-pane" id="tab_'.$tab.'">';
								}
								?>	
								
									<div class="direct-chat-messages">
										<ul class="products-list product-list-in-box ">
										<?php 
										
											foreach($ResItem as $item){
												
												if($cat['id']==$item['category'])
												{
													
												echo'<li class="item">
														<a href="./index.php?r=restaurantItems/view&id='.$item['res_item_id'].'" class="product-title">
															<div class="product-img">
																<img src="dist/img/default-50x50.gif" alt="Product Image">
															</div>
														<div class="product-info">
														'.$item['item_name'].'
														
														
														'.CHtml::link('<button type="button"  class="btn btn-default btn-sm btn-danger pull-right"><i class="fa fa-trash"></i></button>',array('/restaurantItems/ingredients_details','id'=>$item['res_item_id'])).'
														'.CHtml::link('<button type="button"  class="btn btn-default btn-sm btn-success pull-right"><i class="fa fa-pencil"></i></button>',array('/restaurantItems/ingredients_details','id'=>$item['res_item_id'])).'
														
														<span class="product-description">
															  '.$item['item_description'].'
														</span>
													</div>
												</a>
											</li>';

													
												
												}
											}
										?>
											
										</ul>
									</div>
								</div>
									
										
							<?php $tab++;}?>

							
							
						
						
					</div><!--/tab-content-->
				</div><!--/nav-tabs-custom-->
					
			</div>	<!--/box-success-->
			<div class="box-footer clearfix"  id="box-footer">
						
					 
			</div>
		
			
			</div>	
			
		</div>
	</div>

</section>

