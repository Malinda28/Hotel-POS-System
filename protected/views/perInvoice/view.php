<?php
/* @var $this PerInvoiceController */
/* @var $model PerInvoice */

$this->breadcrumbs=array(
	'Per Invoices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PerInvoice', 'url'=>array('index')),
	array('label'=>'Create PerInvoice', 'url'=>array('create')),
	array('label'=>'Update PerInvoice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PerInvoice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PerInvoice', 'url'=>array('admin')),
);
?>

<h1>View PerInvoice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'gen_id',
		'ticket_id',
		'type',
		'invoice_status',
	),
)); ?>
