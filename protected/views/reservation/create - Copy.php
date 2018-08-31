<?php
/* @var $this ReservationController */
/* @var $model Reservation */

$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reservation', 'url'=>array('index')),
	array('label'=>'Manage Reservation', 'url'=>array('admin')),
);
?>

<style>
.breadcrumbs{
	float: right;
	
}</style>
<section class="content-header">
   
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
		
	<?php endif?>
	<h1>Reservation</h1>
</section>
<section class="content">
<div class="row">
<?php $this->renderPartial('_form', array('model'=>$model, 'action'=>$action)); ?>
</div>
<div class="row">
<?php $this->renderPartial('_data', array('model'=>$model,'searchmodel'=>$searchmodel,)); ?>
</div>
</section>