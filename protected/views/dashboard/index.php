<script>
 $("#M_dash").addClass("active");
 

</script>

<?php
	//use yii\bootstrap\Modal;
	/* @var $this yii\web\View */
	
	$title = 'Dashboard';
?>

<section class="content-header">
	
	<?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->
	
	<?php endif?>
	<h1><?=$title?></h1>
</section>
<section class="content">
	
	<!-- Small boxes (Stat box) -->
	<div class="row">
        <div class="col-lg-3 col-xs-6">
			<!-- small box --><a href="http://localhost/pos_yii/index.php?r=kot/create" >
				<div class="small-box bg-aqua">
					
					<div class="inner">
						<h4>Create</h4>
						<h3> KOT</h3>
						
						
					</div>
					
					<div class="icon">
						<i class="fa fa-ticket"></i>
					</div>
					<div  class="small-box-footer"><i class="fa  fa-arrow-circle-right"></i></div>
				</div></a>
		</div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
			<!-- small box --><a href="http://localhost/pos_yii/index.php?r=bot/create" class="small-box-footer">
				<div class="small-box bg-yellow">
					
					<div class="inner">
						<h4>Create</h4>
						<h3>BOT</h3>
					</div>
					<div class="icon">
						<i class="fa fa-ticket"></i>
					</div>
					<div  class="small-box-footer"><i class="fa   fa-arrow-circle-right"></i></div>
				</div></a>
		</div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
			<!-- small box --><a href="http://localhost/pos_yii/index.php?r=reservation" >
				<div class="small-box bg-red">
					<div class="inner">
						<h4>Room</h4>
						<h3>Reservation</h3>
						
					</div>
					<div class="icon">
						<i class="fa fa-bed"></i>
					</div>
					<div  class="small-box-footer"><i class="fa   fa-arrow-circle-right"></i></div>
				</div></a>
		</div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
			<!-- small box --><a href="http://localhost/pos_yii/index.php?r=invoice/Index" class="small-box-footer">
				<div class="small-box bg-green">
					
					<div class="inner">
						<h4>View</h4>
						<h3>Invoices</h3>
						
					</div>
					<div class="icon">
						<i class="fa fa-file-text"></i>
					</div>
					<div  class="small-box-footer"><i class="fa  fa-arrow-circle-right"></i></div>
				</div></a>
		</div>
        <!-- ./col -->
	</div>
	<!-- /.row -->
	<div class="row">
        <div class="col-xs-12">
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Current Customers - Restaurant</h3>
					
					<div class="box-tools">
						<div class="input-group input-group-sm" style="width: 150px;">
							<!--input type="text" name="table_search" class="form-control pull-right" placeholder="Search"-->
							
							<div class="input-group-btn">
								<!--button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button-->
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				
					<?php $Res_main=MainData::DashResdata();
					
					
				?>
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th>Table No</th>
							
							<th>KOTs</th>
							<th>BOTs</th>
							
							<th>Tools</th>
						</tr>
						<?php foreach($Res_main as $gen)
							{
								//echo $gen['gen_id'].'<br/>';
								$chek=substr($gen['gen_id'],0,1);
							
								if($chek=='T'){
								
								echo'<tr><td>'.$gen["table_no"].'</td>';
									

								 
								
								
								$Orders=MainData::OrderRoomdata($gen['gen_id']); 
									echo'<td>';
									foreach($Orders as $Order)
									{
										
										if($Order['type']=='K')
										{
										echo' <a href="'.Yii::app()->createUrl('kot/update',array('id' =>$Order['ticket_id'])).'"  type="button" ><span class="label label-info">'.$Order['ticket_id'].'</span></a> ';	
										}
										
									}
									echo'</td><td>';
									foreach($Orders as $Order)
									{
										
									
										if($Order['type']=='B')
										{
										
										echo' <a href="'.Yii::app()->createUrl('bot/update',array('id' =>$Order['ticket_id'])).'"  type="button" ><span class="label label-warning">'.$Order['ticket_id'].'</span></a> ';	
										}
									}
								echo'</td>';
								
								echo'<td>
							
								<a role="button" href="'.Yii::app()->createUrl("/bot/create").'" class="btn btn-default btn-sm btn-warning"><i class="fa fa-ticket"> BOT</i></a>
								<a role="button" href="http://localhost/pos_yii/index.php?r=kot/kots&id='.$gen['gen_id'].'"  type="button" class="btn btn-default btn-sm btn-info"><i class="fa fa-ticket"> KOT</i></a>
								<a role="button" href="http://localhost/pos_yii/index.php?r=invoice/preview&id='.$gen['gen_id'].'"  type="button" class="btn btn-default btn-sm btn-success "><i class="fa fa-file-text"></i> Invoice</a>
								</td></tr>';
								}
							}
							//exit();
						?>
						
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>    
	
	<div class="row">
		
        <div class="col-xs-12">
			<div class="box box-success">
				
				<div class="box-header">
					<h3 class="box-title">Current Customers - Rooms</h3>
					
					<div class="box-tools">
						<div class="input-group input-group-sm" style="width: 150px;">
							<!--input type="text" name="table_search" class="form-control pull-right" placeholder="Search"-->
							
							<div class="input-group-btn">
								<!--button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button-->
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				
				<?php $Gen_main=MainData::DashRoomdata();
					
					
				?>
				
				<div class="box-body table-responsive no-padding">
					<table class="table table-bordered table-striped" id="example2">
						<tr>
							<th>Reservation No</th>
							<th>Room No(s)</th>
							
							<th>Order Numbers</th>
							
							
							<th>Tools</th>
						</tr>
						<?php foreach($Gen_main as $gen)
							{
								//echo $gen['gen_id'].'<br/>';
								
									echo'<tr><td>'.$gen["ticket_id"].'</td><td>';
									$Rooms=MainData::PreInvoiceROOM($gen['gen_id']);
									foreach($Rooms as $Room)
									{
										echo'<span class="label label-success">'.$Room['room_no'].'</span> ';
										
									}
									
								
								echo'</td><td>'; 
								
								
								$Orders=MainData::OrderRoomdata($gen['gen_id']); 
									foreach($Orders as $Order)
									{
										
										if($Order['type']=='K')
										{
										echo' <a href="'.Yii::app()->createUrl('kot/update',array('id' =>$Order['ticket_id'])).'"  type="button" ><span class="label label-info">'.$Order['ticket_id'].'</span></a> ';		
										}
										if($Order['type']=='B')
										{
										
										echo' <a href="'.Yii::app()->createUrl('bot/update',array('id' =>$Order['ticket_id'])).'"  type="button" ><span class="label label-warning">'.$Order['ticket_id'].'</span></a> ';	
										}
									}
								echo'</td>';
								//echo'<tr><td>'.$gen["ticket_id"].'</td><td>';
								echo'<td>
							
								<a role="button" href="http://localhost/pos_yii/index.php?r=bot/create"class="btn btn-default btn-sm btn-warning"><i class="fa fa-ticket"> BOT</i></a>
								<a role="button" href="http://localhost/pos_yii/index.php?r=kot/kots&id='.$gen['gen_id'].'"  type="button" class="btn btn-default btn-sm btn-info"><i class="fa fa-ticket"> KOT</i></a>
								
								<a role="button" href="http://localhost/pos_yii/index.php?r=invoice/preview&id='.$gen['gen_id'].'"  class="btn btn-default btn-sm btn-success "><i class="fa fa-file-text"></i> Invoice</a>
								</td></tr>';
								
							}
							//exit();
						?>
						
						
					
					
				</table>
				
				
			</div>
            <!-- /.box-body -->
			
		</div>
		<!-- /.box -->
	</div>
</div>    


<!-- Main row -->
<div class="row">
	<!-- Left col -->
	
	
</div>

</section>	
<!-- /.row (main row) -->
<style>
	.head-red {
    background-color: #E84C3D;
    color: #FFFFFF;
    font-weight: 500;
}</style>

<!-- /.content -->

