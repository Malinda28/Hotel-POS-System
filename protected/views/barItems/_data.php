<?php
/* @var $this KitchenIngrediantsController */
/* @var $model KitchenIngrediants */

$this->breadcrumbs=array(
	'Kitchen Ingrediants'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List KitchenIngrediants', 'url'=>array('index')),
	array('label'=>'Create KitchenIngrediants', 'url'=>array('create')),
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
         <h3 class="box-title">Manage Bar Items<?//=$action ?></h3>
 
            </div>
			
<div class="box-body ">			
<div class="row">
<div class="col-xs-12">

<!--p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p-->




<table id="table-data" class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr><th>Beverage Name</th>
                                <th>Qty </th>
                                <th>Category</th>
                                <th>25ml</th>
								<th>50ml</th>
								<th>100ml</th>
								<th>300ml</th>
								<th>750ml</th>
								<th>1000ml</th>
								<th>Tools</th>
								
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1 = "SELECT * 
							FROM bar_items b, bar_item_category c
							WHERE c.bcat_id=b.category";
                            //$resultList = mysqli_query($connection->getConnection(), $userList);
							$data1 = Yii::app()->db->createCommand($sql1)->queryAll();
                            //while ($row1 = mysqli_fetch_array($data1)) 
							 foreach ($data1 as $row1)
								{
                                ?>
                                <tr style="cursor: pointer" onclick="setFieldDate('<?php echo $row1['bar_item_id'] ?>','<?php echo $row1['beverage_name'] ?>', '<?php echo $row1['volume'] ?>', '<?php echo $row1['b_category'] ?>', '<?php echo $row1['price_25ml'] ?>' , '<?php echo $row1['price_50ml'] ?>' , '<?php echo $row1['price_100ml'] ?>' , '<?php echo $row1['price_300ml'] ?>' , '<?php echo $row1['price_750ml'] ?>' , '<?php echo $row1['price_1000ml'] ?>' ?>')">
                                   
									<td><?php echo $row1['beverage_name']; ?></td>
                                    <td><?php echo $row1['volume'],' ml'; ?></td>
                                    <td><?php echo $row1['b_category']; ?></td>
                                    <td><?php echo 'Rs ',$row1['price_25ml']; ?></td>
									<td><?php echo 'Rs ',$row1['price_50ml']; ?></td>
									<td><?php echo 'Rs ',$row1['price_100ml']; ?></td>
									<td><?php echo 'Rs ',$row1['price_300ml']; ?></td>
									<td><?php echo 'Rs ',$row1['price_750ml']; ?></td>
									<td><?php echo 'Rs ',$row1['price_1000ml']; ?></td>
									<td><a role="button"  class="btn btn-default btn-sm btn-success" href="./index.php?r=barItems/update&id=<?php echo $row1['bar_item_id'];?>"><i class="fa fa-pencil"></i></a>
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