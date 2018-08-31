<?php
/* @var $this Expenses_testingController */
/* @var $model Expenses_testing */

$this->breadcrumbs=array(
	'Expenses Testings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Expenses_testing', 'url'=>array('index')),
	array('label'=>'Create Expenses_testing', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#expenses-testing-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Expenses Testings</h1>

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
	'id'=>'expenses-testing-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'type',
		'description',
		'category',
		'date',
		'amount',
		/*
		'recipient',
		'approved',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
