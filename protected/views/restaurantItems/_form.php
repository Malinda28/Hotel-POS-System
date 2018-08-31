<?php
/* @var $this RestaurantItemsController */
/* @var $model Restaurant_items */
/* @var $form CActiveForm */
?>

<style>#Restaurant_items_category{
	display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
}</style>
<div class="col-xs-12">
    <div class="box box-success">
		<div class="box-header with-border">
         <h3 class="box-title"><?php echo $action; ?> Restaurant Menu Item</h3>

            </div>
			
<div class="box-body ">			


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'restaurant-items-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	

	<div class="row">
	<div class="col-xs-6">
				<div class="form-group">
		<?php echo $form->labelEx($model,'item_name'); ?>
		<?php echo $form->textField($model,'item_name',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'item_name'); ?>
	</div>
			</div>
	<div class="col-xs-3">
				
		<?php echo $form->labelEx($model,'regular_price'); ?>
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Rs.</span>
		<?php echo $form->textField($model,'regular_price',array('class'=>'form-control')); ?>
	</div>
			<?php echo $form->error($model,'regular_price'); ?>
	
			</div>
	<div class="col-xs-3">
				
			<?php echo $form->labelEx($model,'large_price'); ?>
			<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Rs.</span>
			<?php echo $form->textField($model,'large_price',array('class'=>'form-control')); ?>
			
	</div>
			<?php echo $form->error($model,'large_price'); ?>	
			</div>
			
			</div>
	<div class="row">
			<div class="col-xs-6">
				<div class="form-group">
		<?php echo $form->labelEx($model,'item_description'); ?>
		<?php echo $form->textField($model,'item_description',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'item_description'); ?>
	</div>
			</div>
			<div class="col-xs-6">
				<div class="form-group">
				
		<?php echo $form->labelEx($model,'category'); ?>
		
		<?php echo $form->dropDownList($model,'category', CHtml::listData( ResCategory::model()->findAll("status='Y'"),'id','category'), array(
                            'empty'=>'Select a Category'));  ?></div>
		<?php echo $form->error($model,'category'); ?>
		
			</div>
						
			</div>
			
	</div>
			
	<div class="box-footer clearfix" >
			<div Id="box-footer">
			</div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn  btn-success pull-right')); ?>
	
</div>


<?php $this->endWidget(); ?>

	<!-- form -->
	</div>
</div>