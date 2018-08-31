<?php
/* @var $this RestaurantItemsController */
/* @var $model Restaurant_items */
/* @var $form CActiveForm */
?>


          <div class="box box-success" id="Rest-box">
		  
            <div class="box-header with-border">
              <h3 class="box-title">Kitchen Ingredients</h3>
			<div class="box-tools ">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
			 <div class="box-body " id="box-body">
          <div class="direct-chat-messages">
		 
				<ul class="products-list product-list-in-box ">	
				<?php
					$sql1 = "SELECT * FROM kitchen_ingrediants";
					
					$data1 = Yii::app()->db->createCommand($sql1)->queryAll();
					
					foreach ($data1 as $row1){
				 ?>
               
				<li class="item" style="cursor: pointer" onclick="addIngredients('<?php echo $row1['ingrediant_id'] ?>', '<?php echo $row1['ingrediant_name'] ?>','0','0','<?php echo $row1['unit'] ?>')">
				   <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Ingredient Image">
                  </div>
				  
                  <div class="product-info">
				<?php echo $row1['ingrediant_name']; ?>      
                
                  </div>
                </li>
					<?php } ?>
               
				
                
              </ul>
              
			  </div>
		  </div>
		  <div class="box-footer clearfix" >
		
		
	
</div>
            <!-- /.tab-content -->
          </div>
		  
		  

