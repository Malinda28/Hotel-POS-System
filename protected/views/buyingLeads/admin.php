<?php
/* @var $this BuyingLeadsController */
/* @var $model BuyingLeads */

$this->breadcrumbs=array(
	'Buying Leads'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BuyingLeads', 'url'=>array('index')),
	array('label'=>'Create BuyingLeads', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#buying-leads-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Buying Leads</h1>

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

<?php $this->widget('booster.widgets.TbExtendedGridView', array(
	'id'=>'buying-leads-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	'buying_leads_code',
          
	'id',
	//'content',
	'buying_leads_status_code',
//		//'group_code',
//
//		'item_code',
//		'subject',
//		'is_public',
//		'due_date',
//		//'questions_codes',
//		//'viewed',
		'active',
	
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
$this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
        'fixedHeader' => true,
        'headerOffset' => 40,
        // 40px is the height of the main navigation at bootstrap
        'type' => 'striped',
        'dataProvider' => $model->search(),
        'responsiveTable' => true,
        //'template' => "{items}",
        'columns'=>array(
		'buying_leads_code',
		'id',
    )
		)
    ); 

	$this->widget('booster.widgets.TbExtendedGridView', array(
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
));
?>
<script>
 function log{
 alert('ok';)}


</script>