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



							
?>
<div class="col-xs-12">
    <div class="box box-success">
		<div class="box-header with-border">
         <h3 class="box-title">INVOICE </h3>
 
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
								
                              
                                <th>invoice_id</th>
                                <th>date_time </th>                    
                               	<th>sub_total</th>
								<th>net_total</th>
                                
							
								
                                
								
                            </tr>
                        </thead>
                        <tbody>
						
                            <?php
							
							
							//print_r($data1);
							//exit();
							
							
							//$id='230';
                            $sql1 = "SELECT * 
							FROM invoice
							";
							
                            //$resultList = mysqli_query($connection->getConnection(), $userList);
							$data1 = Yii::app()->db->createCommand($sql1)->queryAll();

						 
						 
						 
						 
							 foreach ($data1 as $row1)
								{
                                ?>
                                <tr style="cursor: pointer" onclick="setFieldDate('<?php echo $row1['invoice_id'] ?>', '<?php echo $row1['date_time'] ?>', '<?php echo $row1['sub_total'] ?>', '<?php echo $row1['net_total'] ?>'?>')">
									
									
									<td><?php echo $row1['invoice_id']; ?></td>
									<td><?php echo $row1['date_time']; ?></td>
									<td><?php echo $row1['sub_total']; ?></td>
									<td><?php echo $row1['net_total']; ?></td>
                                   <td><a role="button"  class="btn btn-default btn-sm btn-success" href="./index.php?r=invoice/view&id=<?php echo $row1['pre_gen_id'];?>"><i class="fa fa-pencil"></i></a></td>
							

									
                                    
									
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