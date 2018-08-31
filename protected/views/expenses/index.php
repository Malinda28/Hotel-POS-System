<?php
/* @var $this ExpensesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Expenses',
);

$this->menu=array(
	array('label'=>'Create Expenses', 'url'=>array('create')),
	array('label'=>'Manage Expenses', 'url'=>array('admin')),
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
	
</section>
<section class="content">

<div class="row">
<?php $this->renderPartial('_data', array('model'=>$model)); ?>
</div>
</section>
