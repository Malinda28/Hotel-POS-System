<?php
/* @var $this KitchenIngrediantsController */
/* @var $model KitchenIngrediants */

$this->breadcrumbs=array(
	'Other Expenses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List OtherExpenses', 'url'=>array('index')),
	array('label'=>'Create OtherExpenses', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#other-expenses-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="col-xs-12">
    <div class="box box-success">
		<div class="box-header with-border">
         <h3 class="box-title">Manage Other Expenses<?//=$action ?></h3>
 
            </div>
			
<div class="box-body ">			
<div class="row">
<div class="col-xs-12">

<!--p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p-->

<!--?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none"-->
<!--?php /* $this->renderPartial('_search',array(
	'searchmodel'=>$searchmodel,
));  */?-->
<!-- search-form -->

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
));  */ ?-->
<table id="customer_table" class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr><th>Month / Year</th>
                                <th>Sales </th>
                                <th>Cost of Sales </th>
                                <th>Other Income</th>
								<th>Admin Expenses</th>
								<th>Sales and Distribution Expenses</th>
								<th>Financial Expenses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1 = "SELECT * FROM other_ei";
                            //$resultList = mysqli_query($connection->getConnection(), $userList);
							$data1 = Yii::app()->db->createCommand($sql1)->queryAll();
                            //while ($row1 = mysqli_fetch_array($data1)) 
							 foreach ($data1 as $row1)
								{
                                ?>
                                <tr style="cursor: pointer" onclick="setFieldDate('<?php echo $row1['yearmonth'] ?>', '<?php echo $row1['sales'] ?>', '<?php echo $row1['costofsales'] ?>', '<?php echo $row1['otherincome'] ?>' , '<?php echo $row1['admin_exp'] ?>', '<?php echo $row1['sales_disexp'] ?>', '<?php echo $row1['financial_exp'] ?>'?>')">
                                    <td><?php echo $row1['yearmonth']; ?></td>
                                    <td><?php echo $row1['sales']; ?></td>
                                    <td><?php echo $row1['costofsales']; ?></td>
                                    <td><?php echo $row1['otherincome']; ?></td>
									<td><?php echo $row1['admin_exp']; ?></td>
									<td><?php echo $row1['sales_disexp']; ?></td>
									<td><?php echo $row1['financial_exp']; ?></td>
									<td><a role="button"  class="btn btn-default btn-sm btn-success" href="./index.php?r=otherei/update&id=<?php echo $row1['yearmonth'];?>"><i class="fa fa-pencil"></i></a>
									<a role="button"  class="btn btn-default btn-sm btn-danger" href="./index.php?r=otherei/delete&id=<?php echo $row1['yearmonth'];?>">
				   <i class="fa fa-trash"></i></a>
				    </td>
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