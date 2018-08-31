<?php
/* @var $this KotController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kots',
);

$this->menu=array(
	array('label'=>'Create Kot', 'url'=>array('create')),
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
<?php $this->renderPartial('_info', array('model'=>$model)); ?>
</div>
</section>
