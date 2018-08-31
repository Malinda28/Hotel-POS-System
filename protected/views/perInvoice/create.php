<?php
/* @var $this PerInvoiceController */
/* @var $model PerInvoice */

$this->breadcrumbs=array(
	'Per Invoices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PerInvoice', 'url'=>array('index')),
	array('label'=>'Manage PerInvoice', 'url'=>array('admin')),
);
?>

<h1>Create PerInvoice</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>