<?php
/* @var $this ReservationController */
/* @var $model Reservation */
/* @var $form CActiveForm */
?>
<style>
#check_out {display: block;
			width: 100%;
			height: 34px;
			padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
border: 1px solid #ccc;}

#check_in{display: block;
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
         <h3 class="box-title"><?php echo $action;?> Customer Registraion</h3>
        </div>
			
<div class="box-body ">			
		<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reservation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	
	<?php echo $form->errorSummary($model); ?>

	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'CusID'); ?>
					<?php echo $form->textField($model,'CusID',array('size'=>25,'maxlength'=>25,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'CusID'); ?>
				</div>
	</div>

	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'MobNo'); ?>
					<?php echo $form->textField($model,'MobNo',array('size'=>25,'maxlength'=>25,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'MobNo'); ?>
				</div>
	</div>

	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'CusFName'); ?>
					<?php echo $form->textField($model,'CusFName',array('size'=>25,'maxlength'=>25,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'CusFName'); ?>
				</div>
	</div>

	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'CusLName'); ?>
					<?php echo $form->textField($model,'CusLName',array('size'=>25,'maxlength'=>25,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'CusLName'); ?>
				</div>
	</div>

	<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'CusAddress'); ?>
					<?php echo $form->textField($model,'CusAddress',array('size'=>60,'maxlength'=>225,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'CusAddress'); ?>
				</div>
	</div>
</div>
</div>

	</div>
</div>
	<div class="col-xs-12">
    <div class="box box-success">
		<div class="box-header with-border">
         <h3 class="box-title">Reserve Room</h3>

            </div>
			
	<div class="box-body ">			
		<div class="row">
			<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'reservation_id'); ?>
					<?php echo $form->textField($model,'reservation_id',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'reservation_id'); ?>
				</div>
			</div>

		<div class="col-xs-4">
				<div class="form-group">s
					<?php echo $form->labelEx($model,'check_in');
					
					$this->widget('zii.widgets.jui.CJuiDatePicker',
						array(
							'attribute'=>'check_in',
							'name'=>'check_in',
							'value'=>$model->check_in,
							'model'=>$model,
							'options'=> array(
								'showAnim'=='slide',
								'showButtonPanel'=>true,
								'dateformat'=>'yy-m-d'
							),
							'htmlOptions'=>array('style'=>''),
						)); ?>	
					<?php echo $form->error($model,'check_in'); ?>
				</div>
		</div>

		<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'check_out');
					
					$this->widget('zii.widgets.jui.CJuiDatePicker',
						array(
							'attribute'=>'check_out',
							'name'=>'check_out',
							'value'=>$model->check_out,
							'model'=>$model,
							'options'=> array(
								'showAnim'=='slide',
								'showButtonPanel'=>true,
								'dateformat'=>'yy-m-d'
							),
							'htmlOptions'=>array('style'=>''),
						)); ?>		
							
					<?php echo $form->error($model,'check_out'); ?>
				</div>
		</div>

		<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'no_rooms'); ?>
					<?php echo $form->textField($model,'no_rooms',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'no_rooms'); ?>
				</div>
		</div>

		<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'no_adults'); ?>					
					<?php echo $form->dropDownList($model, 'no_adults',
					array('1', '2' ),	  
					array('class'=>'form-control')); ?>	
					<?php echo $form->error($model,'no_adults'); ?>
				</div>
		</div>

		<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'no_children'); ?>					
					<?php echo $form->dropDownList($model, 'no_children',
					array('0','1', '2'),	  
					array('class'=>'form-control')); ?>	
					<?php echo $form->error($model,'no_children'); ?>
				</div>
		</div>

		<div class="col-xs-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'room_id'); ?>
					<?php echo $form->textField($model,'room_id',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'room_id'); ?>
				</div>
		</div>
	
		</div>
	</div>
	
	
	<div class="box-footer clearfix">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Reserve' : 'Save',array('class'=>'btn  btn-success pull-right')); ?>
	</div>
	
<?php $this->endWidget(); ?>
</div></div>
<!-- form -->