<?php
/* @var $this KitchenIngrediantsController */
/* @var $model KitchenIngrediants */

$this->breadcrumbs=array(
	'Kitchen Ingrediants'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Reservations', 'url'=>array('index')),
	array('label'=>'Create Reservations', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kitchen-ingrediants-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="col-xs-12">
    <div class="box box-success">
		<div class="box-header with-border">
         <h3 class="box-title">Manage Reservations<?//=$action ?></h3>
 
            </div>
			
<div class="box-body ">			
<div class="row">
<div class="col-xs-12">

<!--p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p-->



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
));  */?-->
<table id="table-data" class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr>
								<th>Reser ID </th>
                                <th>Cus NIC </th>
                                <th>Mob no. </th>
                                <th>Name</th>								
                                <th>Check IN </th>
								<th>Check OUT </th>															
								<th>Address </th>			
                            		
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1 = "SELECT * FROM reservation r, reservation_detail d, customer c WHERE r.reservation_id=d.reservation_id AND c.nic_no= r.cus_id group by r.reservation_id";
                            //$resultList = mysqli_query($connection->getConnection(), $userList);
							$data1 = Yii::app()->db->createCommand($sql1)->queryAll();
							

						 foreach ($data1 as $row1)
								{
                                ?>
                                <tr style="cursor: pointer" >
                                    <td><?php echo $row1['reservation_id']; ?></td>
									<td><?php echo $row1['nic_no']." V"; ?></td>
                                    <td><?php echo $row1['phone']; ?></td>
                                    <td><?php echo $row1['customer_name']; ?></td>
									
                                    
									<td><?php echo $row1['check_in_date_time']; ?></td>
                                    <td><?php echo $row1['check_out_date_time']; ?></td>
									<td><?php echo $row1['address']; ?></td>
  
									
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>

	 				
</div>
</div></div>


</div>
</div>
