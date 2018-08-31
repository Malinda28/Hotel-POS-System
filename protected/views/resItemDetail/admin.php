<?php
/* @var $this ResItemDetailController */
/* @var $model ResItemDetail */

$this->breadcrumbs=array(
	'Res Item Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ResItemDetail', 'url'=>array('index')),
	array('label'=>'Create ResItemDetail', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#res-item-detail-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Res Item Details</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'res-item-detail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'detail_id',
		'res_item_id',
		'ingrediant_id',
		'ingrediant_qty',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
