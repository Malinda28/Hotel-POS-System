<?php
/* @var $this ExpensesController */
/* @var $model Expenses */

$this->breadcrumbs=array(
	'Expenses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Expenses', 'url'=>array('index')),
	array('label'=>'Manage Expenses', 'url'=>array('admin')),
);
?>
<section class="content-header">
	
	<?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->
	
	<?php endif?>
	<h1>Expenses</h1>
</section>
<section class="content">
	<div class="row">
	


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>


<div class="row">
<?php $this->renderPartial('_data', array('model'=>$model)); ?>
</div>
</section>