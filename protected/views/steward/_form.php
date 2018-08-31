<?php
/* @var $this StewardController */
/* @var $model Steward */
/* @var $form CActiveForm */
?>
<style>
#JoinedDate {display: block;
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
         <h3 class="box-title"><?php echo $action; ?> Steward</h3>

            </div>
			
<div class="box-body ">			
		<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'steward-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<!--!?php echo $form->errorSummary($model); ?-->
	
	
	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'Name'); ?>
					<?php echo $form->textField($model,'Name',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'Name'); ?>
				</div>
	</div>
	<div class="col-xs-4">
				<div class="form-group">				
					<?php echo $form->labelEx($model,'Gender'); ?>					
					<?php echo $form->dropDownList($model, 'Gender',
					
					array('Male'=> 'Male', 'Female'=> 'Female', ),	  
							array('empty'=>'--Select Gender--','class'=>'form-control')); ?>			
					<?php echo $form->error($model,'gender'); ?>
					
				</div>
	</div>
	<div class="col-xs-4">
				<div class="form-group">
				
					<?php echo $form->labelEx($model,'status'); ?>					
					<?php echo $form->dropDownList($model, 'status',
					array('1'=> 'Available', '0'=> 'Unavailable' ),	  
					array('empty'=>'--Select Availability--','class'=>'form-control')); ?>	
					<?php echo $form->error($model,'status'); ?>
				</div>
	</div>
	</div>



	<div class="box-footer clearfix">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('class'=>'btn  btn-success pull-right')); ?>
	</div>
</div>

<?php $this->endWidget(); ?>
	<!-- form -->
	</div></div>
