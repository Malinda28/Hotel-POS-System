<?php
/* @var $this PerInvoiceController */
/* @var $model PerInvoice */

$this->breadcrumbs=array(
	'Per Invoices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PerInvoice', 'url'=>array('index')),
	array('label'=>'Create PerInvoice', 'url'=>array('create')),
	array('label'=>'View PerInvoice', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PerInvoice', 'url'=>array('admin')),
);
?>

<h1>Update PerInvoice <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>