<?php
/* @var $this KotController */
/* @var $model Kot */

$this->breadcrumbs=array(
	'Kot'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Kot', 'url'=>array('index')),
	array('label'=>'Create Kot', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#Kot-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
							$sql1 = "SELECT beverage_name, d.volume as volumed, qty, 
							FROM bot b, bot_detail d,bar_items r,steward s
							WHERE b.bot_id=d.bot_id AND d.bar_item_id=r.bar_item_id AND b.steward_id=s.steward_id AND b.bot_id='".$id."'";
							
							
							
                            //$resultList = mysqli_query($connection->getConnection(), $userList);
							$data1 = Yii::app()->db->createCommand($sql1)->queryAll();





?>
<div class="col-xs-12">
    <div class="box box-success">
		<div class="box-header with-border">
         <h3 class="box-title">BOT # <?php echo $data1[0]['bot_id']; ?></h3>
 
            </div>
			
<div class="box-body ">			
<div class="row">
<div class="col-xs-12">

<!--p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p-->


<div class="search-form" style="display:none">
<!--?php $this->renderPartial('_search',array(
	'searchmodel'=>$searchmodel,
)); ?-->
</div><!-- search-form -->

<!--?php/*  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kitchen-ingrediants-grid',
	'dataProvider'=>$searchmodel->search(),
	'filter'=>$searchmodel,
	'columns'=>array(
		'ingrediant_id',
		'ingrediant_name',
		'ingrediant_qty',
		'unit',
		array(
			'class'=>'CButtonColumn',
		),
	),
));  */?-->
<table id="customer_table" class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr>
								
                                <th>Beverage</th>
                                <th>Portion </th>                    
                               	<th>Qty</th>
							
								
                                
								
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
							?>
							<div class="row">
							<div class="col-xs-3">
							<?php echo  'Table NO :'.$data1[0]['table_no'].'';?>
							</div>
							<div class="col-xs-3">
							<?php echo 'Room NO :'.$data1[0]['room_no'].'';?>
							</div>
							<div class="col-xs-3">
							<?php echo 'Steward Name :'.$data1[0]['Name'].'';?>
							</div>
							<div class="col-xs-3">
							<?php echo 'Date Time :'.$data1[0]['date_time'].'';?>
							</div>
							
							
							
							
							
							
							
							
                           
							 <?php foreach ($data1 as $row1)
								{
                                ?>
                                <tr style="cursor: pointer" onclick="setFieldDate('<?php echo $row1['bot_id'] ?>', '<?php echo $row1['table_no'] ?>', '<?php echo $row1['room_no'] ?>', '<?php echo $row1['Name'] ?>', '<?php echo $row1['beverage_name'] ?>',  '<?php echo $row1['volumed'] ?>', '<?php echo $row1['qty'] ?>' , '<?php echo $row1['date_time'] ?>'?>')">
                                   
									<td><?php echo $row1['beverage_name']; ?></td>
                                    <td><?php echo $row1['volumed']; ?></td>
                                    <td><?php echo $row1['qty']; ?></td>
									
									
                                    
									
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>

	 				
</div>
</div></div>


</div>



</div>
<script> $('#customer_table').DataTable();</script>