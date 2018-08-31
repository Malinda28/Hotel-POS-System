<?php
/* @var $this BarItemsController */
/* @var $model BarItems */

$this->breadcrumbs=array(
	'Bar Items'=>array('index'),
	'Create',
);

$title='Bar Items';
$this->menu=array(
	array('label'=>'List BarItems', 'url'=>array('index')),
	array('label'=>'Manage BarItems', 'url'=>array('admin')),
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
<?php $this->renderPartial('_form', array('model'=>$model,'action'=>$action)); ?>
</div>

<div class="row">
<?php $this->renderPartial('_data', array('model'=>$model,'searchmodel'=>$searchmodel,)); ?>
</div>
</section>