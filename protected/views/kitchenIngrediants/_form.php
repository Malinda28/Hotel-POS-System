<?php
/* @var $this KitchenIngrediantsController */
/* @var $model KitchenIngrediants */
/* @var $form CActiveForm */
?>
<style>#KitchenIngrediants_unit{display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
border: 1px solid #ccc;}
</style>
<div class="col-xs-12">
    <div class="box box-success">
		<div class="box-header with-border">
         <h3 class="box-title"><?php echo $action;?> Kitchen Ingrediants</h3>

            </div>
			
<div class="box-body ">			
		<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kitchen-ingrediants-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

			

			<?php // echo $form->errorSummary($model); ?>
		
			
			<div class="col-xs-4">
				<div class="form-group">
	
						<?php echo $form->labelEx($model,'ingrediant_name'); ?>
						<?php echo $form->textField($model,'ingrediant_name',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
						<?php echo $form->error($model,'ingrediant_name'); ?>
				</div>
			</div>
			  
			<div class="col-xs-4">
				<div class="form-group">
						<?php echo $form->labelEx($model,'ingrediant_qty'); ?>
						<?php echo $form->textField($model,'ingrediant_qty',array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'ingrediant_qty'); ?>
				</div>
			</div>

			<div class="col-xs-4">
				<div class="form-group">
						<?php echo $form->labelEx($model,'unit'); ?>
						<?php echo $form->dropDownList($model, 'unit',
      array('g' => 'g', 'ml' => 'ml',  's' => 's',), array('empty' => 'Select a Unit'),   array('class'=>'form-control')
   ); 
?>
						<?php echo $form->error($model,'unit'); ?>
						
				</div>
			</div>
		
		</div>
	</div>
	<div class="box-footer clearfix">
				
	
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn  btn-success pull-right')); ?>
	


</div>

<?php $this->endWidget(); ?>

	<!-- form -->
	</div>
</div>