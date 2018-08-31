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
         <h3 class="box-title">Expenses</h3>
 
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
								
                              
                                <th>Expense ID</th>
                                <th>Date</th>                    
                               	<th>Amount</th>
								<th>Description</th>
								
								<th>Category</th>
								<th>Receipient</th>
								<th>Tools</th>
                                		
                            </tr>
                        </thead>
                        <tbody>
						
                            <?php
							
							
							//print_r($data1);
							//exit();
							
							
							//$id='230';
                            $sql1 = "SELECT * 
							FROM expenses
							";
							
                            //$resultList = mysqli_query($connection->getConnection(), $userList);
							$data1 = Yii::app()->db->createCommand($sql1)->queryAll();

						 
						 
						 
						 
							 foreach ($data1 as $row1)
								{
                                ?>
                                <tr style="cursor: pointer" onclick="setFieldDate('<?php echo $row1['id'] ?>', '<?php echo $row1['type'] ?>', '<?php echo $row1['description'] ?>', '<?php echo $row1['category'] ?>', '<?php echo $row1['date'] ?>', '<?php echo $row1['amount'] ?>', '<?php echo $row1['recipient'] ?>', '<?php echo $row1['approved'] ?>'?>')">
									
									<td><?php echo $row1['id']; ?></td>
									<td><?php echo $row1['date']; ?></td>
									<td><?php echo'Rs ', $row1['amount']; ?></td>
									<td><?php echo $row1['description']; ?></td>
									
									<td><?php echo $row1['category']; ?></td>									
									<td><?php echo $row1['recipient']; ?></td>
									
										
										
                                   <td><a role="button"  class="btn btn-default btn-sm btn-success" href="./index.php?r=expenses/update&id=<?php echo $row1['id'];?>"><i class="fa fa-pencil"></i></a></td>

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