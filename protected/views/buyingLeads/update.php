<?php
/* @var $this BuyingLeadsController */
/* @var $model BuyingLeads */

$this->breadcrumbs=array(
	'Buying Leads'=>array('index'),
	$model->buying_leads_code=>array('view','id'=>$model->buying_leads_code),
	'Update',
);

$this->menu=array(
	array('label'=>'List BuyingLeads', 'url'=>array('index')),
	array('label'=>'Create BuyingLeads', 'url'=>array('create')),
	array('label'=>'View BuyingLeads', 'url'=>array('view', 'id'=>$model->buying_leads_code)),
	array('label'=>'Manage BuyingLeads', 'url'=>array('admin')),
);
?>

<h1>Update BuyingLeads <?php echo $model->buying_leads_code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>