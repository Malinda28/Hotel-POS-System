<?php
/* @var $this StewardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Stewards',
);

$this->menu=array(
	array('label'=>'Create Steward', 'url'=>array('create')),
	array('label'=>'Manage Steward', 'url'=>array('admin')),
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
	<h1>Steward</h1>
</section>
<section class="content">
<div class="row">
<?php $this->renderPartial('_form', array('model'=>$model,'action'=>$action)); ?>
</div>
<div class="row">
<?php $this->renderPartial('_data', array('model'=>$model)); ?>
</div>
</section>
