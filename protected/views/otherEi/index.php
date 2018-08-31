<?php
/* @var $this OtherEiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Other Eis',
);

$this->menu=array(
	array('label'=>'Create OtherEi', 'url'=>array('create')),
	array('label'=>'Manage OtherEi', 'url'=>array('admin')),
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
	<h1>Other Expenses</h1>
</section>


<section class="content">

<div class="row">
<?php $this->renderPartial('_form', array('model'=>$model,'action'=>$action)); ?>
</div>

<div class="row">
<?php $this->renderPartial('_data', array('model'=>$model)); ?>
</div>
</section>