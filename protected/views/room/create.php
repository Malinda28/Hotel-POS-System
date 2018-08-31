<?php
/* @var $this RoomController */
/* @var $model Room */

$title='Rooms';
$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Room', 'url'=>array('index')),
	array('label'=>'Manage Room', 'url'=>array('admin')),
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
	<h1><?=$title?></h1>
</section>
<section class="content">
<div class="row">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>

<div class="row">
<?php $this->renderPartial('_data', array('model'=>$model,'searchmodel'=>$searchmodel,)); ?>
</div>

</section>