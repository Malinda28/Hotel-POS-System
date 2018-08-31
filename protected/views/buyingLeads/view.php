<?php
/* @var $this BuyingLeadsController */
/* @var $model BuyingLeads */

$this->breadcrumbs=array(
	'Buying Leads'=>array('index'),
	$model->buying_leads_code,
);

$this->menu=array(
	array('label'=>'List BuyingLeads', 'url'=>array('index')),
	array('label'=>'Create BuyingLeads', 'url'=>array('create')),
	array('label'=>'Update BuyingLeads', 'url'=>array('update', 'id'=>$model->buying_leads_code)),
	array('label'=>'Delete BuyingLeads', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->buying_leads_code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BuyingLeads', 'url'=>array('admin')),
);
?>

<h1>View BuyingLeads #<?php echo $model->buying_leads_code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'buying_leads_code',
		'id',
		'created_date',
		'content',
		'buying_leads_status_code',
		'group_code',
		'item_code',
		'subject',
		'is_public',
		'due_date',
		'questions_codes',
		'viewed',
		'active',
	),
)); ?>
