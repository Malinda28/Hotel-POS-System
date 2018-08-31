<script>
	$("#M_repo").addClass("active");
	
</script>

<?php
	/* @var $this DefaultController */
	
	$this->breadcrumbs=array(
	$this->module->id,
	);
	
	
?>
<style>
	.breadcrumbs{
	float: right;
	
}</style>
<section class="content-header">
	
	<?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->
	
	<?php endif?>
	<h1>Reports</h1>
</section>

<section class="content">
	
	<div class="row">
		
		
		
		
		<div class="col-xs-12">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Manage Kitchen Ingrediants<?//=$action ?></h3>
					
				</div>
				
				<div class="box-body ">			
					<div class="row">
						<div class="col-xs-12">
							
							
							<table id="table-data" class="table table-bordered table-striped dataTable">
								<thead>
									<tr><th>Ingrediant ID</th>
										<th>Ingrediant Name </th>
										<th>Ingrediant Qty </th>
										
									</tr>
								</thead>
								<tbody>
									<?php
										$sql1 = "SELECT * FROM kitchen_ingrediants";
										//$resultList = mysqli_query($connection->getConnection(), $userList);
										$data1 = Yii::app()->db->createCommand($sql1)->queryAll();
										//while ($row1 = mysqli_fetch_array($data1)) 
										foreach ($data1 as $row1)
										{
										?>
										<tr>
											<?php if($row1['unit']=='g')
												{
													$row1['ingrediant_qty']=bcdiv($row1['ingrediant_qty'],1000,0);
													//bcdiv($sub_total,100,2)
													$row1['unit']='kg';
													
												}
												else if($row1['unit']=='ml')
												{
													$row1['unit']='L';
													$row1['ingrediant_qty']=bcdiv( $row1['ingrediant_qty'],1000,0);
													
												}
												else{
													$row1['unit']='&#039s';
													
												}
												
											?>
											<td><?php echo $row1['ingrediant_id']; ?></td>
											<td><?php echo $row1['ingrediant_name']; ?></td>
											<td><?php echo $row1['ingrediant_qty']; ?> <?php echo $row1['unit']; ?></td>
											
											
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
		
		
		
		
		
		
		
	</section>	

