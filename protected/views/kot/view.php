<?php
/* @var $this KotController */
/* @var $model Kot */

$this->breadcrumbs=array(
	'Kots'=>array('index'),
	$model->kot_id,
);

$this->menu=array(
	array('label'=>'List Kot', 'url'=>array('index')),
	array('label'=>'Create Kot', 'url'=>array('create')),
	array('label'=>'Update Kot', 'url'=>array('update', 'id'=>$model->kot_id)),
	array('label'=>'Delete Kot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->kot_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kot', 'url'=>array('admin')),
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
	<h1>KOT</h1>
</section>
<section class="content">

<div class="row">
<?php $this->renderPartial('_data', array('id'=>$id)); ?>
</div>
</section>
