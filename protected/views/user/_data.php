<?php
	/* @var $this userController */
	/* @var $model user*/
	
	$this->breadcrumbs=array(
	'user'=>array('index'),
	'Manage',
	);
	
	$this->menu=array(
	array('label'=>'List user', 'url'=>array('index')),
	array('label'=>'Create user', 'url'=>array('create')),
	);
	
	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
	});
	$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
	data: $(this).serialize()
	});
	return false;
	});
	");
?>
<div class="col-xs-12">
    <div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">Manage User<?//=$action ?></h3>
			
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
									<tr><th>User ID </th>
                                <th>User Name </th>
								<th>Email </th>
                                <th>Role</th>
								<th>Availability</th>
								<th>Tools</th>
									</tr>
								</thead>
								<tbody>
                            <?php
								$sql1 = "SELECT * FROM user";
								//$resultList = mysqli_query($connection->getConnection(), $userList);
								$data1 = Yii::app()->db->createCommand($sql1)->queryAll();
								//while ($row1 = mysqli_fetch_array($data1)) 
								foreach ($data1 as $row1)
								{
								?>
                                <tr >
                                    <td><?php echo $row1['id']; ?></td>
                                    <td><?php echo $row1['username']; ?></td>
									<td><?php echo $row1['email']; ?></td>
                                    <td><?php echo $row1['role']; ?></td>
                                     <td >
									<?php 
									if($row1['status']=="1")
										
									{
										echo CHtml::link("<span class = 'label-success label'> Available</span>",array('user/User_d',
                                         'id'=>$row1['id'] ));
										 
                                     
										} 
									else {echo CHtml::link("<span class ='label-danger label'> Not Available</span>",array('user/User_a',
                                         'id'=>$row1['id'] ));
									
									}?></td>
									
                                    
									<td><a role="button"  class="btn btn-default btn-sm btn-success" href="./index.php?r=user/update&id=<?php echo $row1['id'];?>"><i class="fa fa-pencil"></i></a>
									</td>
								</tr>
								<?php }
							?>
						</tbody>
						</table>
							
							
					
				
				</div>
			</div>
			
		</div>
			
			
	</div>
	
	
	
</div>
