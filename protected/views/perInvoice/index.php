<?php
/* @var $this PerInvoiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Per Invoices',
);

$this->menu=array(
	array('label'=>'Create PerInvoice', 'url'=>array('create')),
	array('label'=>'Manage PerInvoice', 'url'=>array('admin')),
);
?>

<h1>Per Invoices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
