<?php
/* @var $this UserController */
/* @var $model user */

$this->breadcrumbs=array(
	'users'=>array('index'),
	$action,
);

$this->menu=array(
	array('label'=>'List user', 'url'=>array('index')),
	array('label'=>'Manage user', 'url'=>array('admin')),
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
	<h1>User</h1>
</section>
<section class="content">
<div class="row">
<?php $this->renderPartial('_form', array('model'=>$model,'action'=>$action)); ?>
</div>
<div class="row">
<?php $this->renderPartial('_data', array('model'=>$model)); ?>
</div>
</section>
