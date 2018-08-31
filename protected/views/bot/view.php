<?php
/* @var $this BotController */
/* @var $model Bot */

$this->breadcrumbs=array(
	'Bots'=>array('index'),
	$model->bot_id,
);

$this->menu=array(
	array('label'=>'List Bot', 'url'=>array('index')),
	array('label'=>'Create Bot', 'url'=>array('create')),
	array('label'=>'Update Bot', 'url'=>array('update', 'id'=>$model->bot_id)),
	array('label'=>'Delete Bot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->bot_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bot', 'url'=>array('admin')),
);
?>

</style>
<section class="content-header">
   
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
		
	<?php endif?>
	<h1>BOT</h1>
</section>
<section class="content">

<div class="row">
<?php $this->renderPartial('_data', array('id'=>$id)); ?>
</div>
</section>
