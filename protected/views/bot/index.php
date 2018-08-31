<?php
/* @var $this BotController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bots',
);

$this->menu=array(
	array('label'=>'Create Bot', 'url'=>array('create')),
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
<?php $this->renderPartial('_data', array('model'=>$model)); ?>
</div>
</section>
