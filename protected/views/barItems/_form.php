<?php
/* @var $this BarItemsController */
/* @var $model BarItems */
/* @var $form CActiveForm */
?>

<style>#BarItems_category{display: block;
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
         <h3 class="box-title">Create Bar Items menu</h3>

            </div>

<div class="box-body ">	
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bar-items-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php /* echo $form->errorSummary($model); */ ?>


<div class="row">
	<div class="col-xs-4">
	<div class="form-group">
		<?php echo $form->labelEx($model,'beverage_name'); ?>
		<?php echo $form->textField($model,'beverage_name',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'beverage_name'); ?>
	</div>
</div>
<div class="col-xs-4">
	<div class="form-group">
		<?php echo $form->labelEx($model,'volume'); ?>
		<div class="input-group">
								
								<?php echo $form->textField($model,'volume',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
								<span class="input-group-addon" id="basic-addon1">ml</span>
								</div>
		
		<?php echo $form->error($model,'volume'); ?>
	</div>
</div>
<div class="col-xs-4">
	<div class="form-group">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->dropDownList($model,'category', CHtml::listData( BarItemCategory::model()->findAll("status='Y'"),'bcat_id','b_category'), array(
                            'empty'=>'Select a Category'));  ?></div>
		<?php echo $form->error($model,'category'); ?>
	</div>
</div>

</div>
<div class="row">
<div class="col-xs-12">
  
		<div class="box-header with-border">
         <h3 class="box-title">Price</h3>

            </div>
					
						<div class="col-xs-4">
							<div class="form-group">
								<?php echo $form->labelEx($model,'price_25ml'); ?>
								<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Rs.</span>
								<?php echo $form->textField($model,'price_25ml',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
								</div>
								<?php echo $form->error($model,'price_25ml'); ?>
							</div>
						</div>
							<div class="col-xs-4">
							<div class="form-group">
								<?php echo $form->labelEx($model,'price_50ml'); ?>
								<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">Rs.</span>
								<?php echo $form->textField($model,'price_50ml',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
								</div>
								<?php echo $form->error($model,'price_50ml'); ?>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<?php echo $form->labelEx($model,'price_100ml'); ?>
								<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">Rs.</span>
								<?php echo $form->textField($model,'price_100ml',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
								</div>
								<?php echo $form->error($model,'price_100ml'); ?>
							</div>
						</div>
					
					
						
						<div class="col-xs-4">
							<div class="form-group">
								<?php echo $form->labelEx($model,'price_300ml'); ?>
								<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">Rs.</span>
								<?php echo $form->textField($model,'price_300ml',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
								</div>
								<?php echo $form->error($model,'price_300ml'); ?>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<?php echo $form->labelEx($model,'price_750ml'); ?>
								<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">Rs.</span>
								<?php echo $form->textField($model,'price_750ml',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
								</div>
								<?php echo $form->error($model,'price_750ml'); ?>
							</div>
					</div>
						<div class="col-xs-4">
							<div class="form-group">
								<?php echo $form->labelEx($model,'price_1000ml'); ?>
								<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">Rs.</span>
								<?php echo $form->textField($model,'price_1000ml',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
								</div>
								<?php echo $form->error($model,'price_1000ml'); ?>
							</div>
						</div>
					
	

	
	<div class="box-footer clearfix" >
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn  btn-success pull-right')); ?>
	</div>
	
</div>
</div>
<?php $this->endWidget(); ?>

</div>
</div>
