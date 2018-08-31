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
<table id="table-data" class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr>
								
                              
                                <th>BOT id</th>
                                <th>Table No </th>                    
                               	<th>Room No</th>
								<th>Steward ID</th>
								<th>Date Time</th>
                                <th>Tools</th>
							
								
                                
								
                            </tr>
                        </thead>
                        <tbody>
						
                            <?php
							
							
							//print_r($data1);
							//exit();
							
							
							//$id='230';
                            $sql1 = "SELECT * 
							FROM bot
							";
							
                            //$resultList = mysqli_query($connection->getConnection(), $userList);
							$data1 = Yii::app()->db->createCommand($sql1)->queryAll();

						 
						 
						 
						 
							 foreach ($data1 as $row1)
								{
                                ?>
                                <tr style="cursor: pointer" onclick="setFieldDate('<?php echo $row1['bot_id'] ?>', '<?php echo $row1['table_no'] ?>', '<?php echo $row1['room_no'] ?>', '<?php echo $row1['steward_id'] ?>', '<?php echo $row1['date_time'] ?>'?>')">
									<?php
									if($row1['table_no']==0){ 
										$tableNO='-';
									}
									else{
										$tableNO=$row1['table_no'];
										
									}
									if($row1['room_no']==0){ 
										$roomNO='-';
									}
									else{
										$roomNO=$row1['room_no'];
										
									}
									?>
									<td><?php echo $row1['bot_id']; ?></td>
									<td><?php echo $tableNO; ?></td>
									<td><?php echo $roomNO; ?></td>
									<td><?php echo $row1['steward_id']; ?></td>
									<td><?php echo $row1['date_time']; ?></td>
                                    <td><a role="button"  class="btn btn-default btn-sm btn-success viewnow" id="<?php echo $row1['bot_id'];?>">View</a></td>
										
										
										
									
									
							

									
                                    
									
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>

	 				
</div>
</div></div>


</div>



</div>
<script>

	$('.table').on("click",'.viewnow',function(e) {
		e.preventDefault();
		var id = $(this).attr('id');  	
		
			
		$.ajax({
			url:'<?php echo Yii::app()->createUrl('/bot/view') ?>',
			type: "POST",
			//data: {check_in_date_time: check_in_date_time, check_out_date_time:check_out_date_time},
			data: {id:id},
			
			beforeSend: function() {
				
				
				//alert(check_in_date_time);
				
				
			},
			success: function(data){
				
				document.getElementById("modal-view1").innerHTML = data;
				document.getElementById("botid").innerHTML = "BOT #"+id;
				  $('#myModal2').modal('show');
					
				
				
			}
			
			
		});
		
		
		return false; 
	});

</script>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="botid">   </h4>
      </div>
      <div id="modal-view1" class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>