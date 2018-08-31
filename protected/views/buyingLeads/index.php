<?php
/* @var $this BuyingLeadsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Buying Leads',
);

$this->menu=array(
	array('label'=>'Create BuyingLeads', 'url'=>array('create')),
	array('label'=>'Manage BuyingLeads', 'url'=>array('admin')),
);
?>

<h1>Buying Leads</h1>

<?php $this->widget('booster.widgets.TbExtendedGridView', array(
    'type' => 'striped bordered',
    'dataProvider' => $model->search(),
    'template' => "{items}",
    'selectableRows' => 2,
    'bulkActions' => array(
     'actionButtons' => array(
        array(
            'buttonType' => 'button',
            'context' => 'primary',
            'size' => 'small',
            'label' => 'Send Mails',
            'click' => 'js:function(values){console.log();}',
            'id'=>'one'
			)
        ),
        // if grid doesn't have a checkbox column type, it will attach
        // one and this configuration will be part of it
        'checkBoxColumnConfig' => array(
            'name' => 'id'
        ),
    ),
    'columns'=>array(
		'buying_leads_code',
		'subject',
		'id',)

)); ?>
