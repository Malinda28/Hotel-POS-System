<?php /* @var $this Controller */ ?>
<!DOCTYPE html>

<?php $Alerts=MainData::Alerts();?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="language" content="en">
		
		<!-- blueprint CSS framework -->
		<!--link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection"-->
		<!--link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print"-->
		
		<!--[if lt IE 8]>
			<link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
		<![endif]-->
		<!--link rel="stylesheet" type="text/css" href="/css/main.css"-->
		
		
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		
		
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet" >
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" rel="stylesheet"   >
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ionicons.min.css" rel="stylesheet" >
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2.min.css">
		<link  href="<?php echo Yii::app()->request->baseUrl; ?>/css/AdminLTE.css" rel="stylesheet"  >
		<link  href="<?php echo Yii::app()->request->baseUrl; ?>/css/skins/_all-skins.min.css" rel="stylesheet">
		<link  href="<?php echo Yii::app()->request->baseUrl; ?>/css/dataTables.bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/css/plugins/daterangepicker/daterangepicker.css">
		<!--link rel="stylesheet" href="<?php //echo Yii::app()->request->baseUrl; ?>/js/timepicker/bootstrap-timepicker.min.css"-->
		
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/dist/bootstrap-clockpicker.min.css">
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/datepicker/datepicker3.css">
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/daterangepicker/daterangepicker.css">
		<!-- jQuery 2.2.3 -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jQuery/jquery-2.2.3.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/dist/Chart.bundle.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/dist/utils.js"></script>
		<?php $user=ucwords(Yii::app()->user->name); ?>
		<style>
			.breadcrumbs{
			float: right;
			
			}
			
			.pull-right {
			
			margin-left: 5px;}
			
			body::-webkit-scrollbar {
			width: 0.5em;
			}
			
			body::-webkit-scrollbar-track {
			-webkit-box-shadow: inset 0 0 px rgba(1,1,1,0.9);
			}
			
			body::-webkit-scrollbar-thumb {
			background-color: #0E9881;
			outline: 1px solid slategrey;
			}
			.direct-chat-messages::-webkit-scrollbar {
			width: 0.5em;
			}
			.direct-chat-messages::-webkit-scrollbar-track {
			-webkit-box-shadow: inset 0 0 px rgba(1,0,0,0.9);
			}
			
			.direct-chat-messages::-webkit-scrollbar-thumb {
			background-color: #0E9881;
			}
			#Regular_row{margin-bottom: 10px;}
			
			.errorMessage{color: #ff3f2c;}
			
		</style>
	</head>
	
	<body class="hold-transition skin-blue sidebar-mini">
		
		<div class="wrapper">
			
			<header class="main-header">
				<!-- Logo -->
				<a href="index2.html" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>POS</b></span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>Horizon </b>POS</span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- Messages: style can be found in dropdown.less-->
							<!-- Notifications: style can be found in dropdown.less -->
							<li class="dropdown notifications-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-bell-o"></i>
									<span class="label label-danger"><?php echo count($Alerts); ?></span>
								</a>
								<ul class="dropdown-menu">
									<li class="header"><?php echo count($Alerts); ?> items have less Qty</li>
									<li>
										<!-- inner menu: contains the actual data -->
										<ul class="menu">
											<?php foreach($Alerts as $alert){
												
												if($alert['type']=='K'){
													echo '<li>
													<a href="#">
													<i class="fa fa-cutlery text-aqua"></i>'.$alert['item'].' : '.$alert['qty'].'
													</a>
													</li>';
												}
												else
												{    echo '<li>
													<a href="#">
													<i class="fa fa-beer text-yellow"></i> '.$alert['item'].' : '.$alert['qty'].'
													</a>
													</a>
												</li>';}
												
											}?>
											
										</ul>
									</li>
									<li class="footer"><a href="#">View all</a></li>
								</ul>
							</li>
							<!-- Tasks: style can be found in dropdown.less -->
							<!-- User Account: style can be found in dropdown.less -->
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/avatar5.png" class="user-image" alt="User Image">
									<span class="hidden-xs"><?php echo $user;?></span>
								</a>
								<ul class="dropdown-menu">
									<!-- User image -->
									<li class="user-header">
										<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/avatar5.png" class="img-circle" alt="User Image">
										
										<p>
											<?php echo $user;?> - Manager
											<small>Member since Nov. 2012</small>
										</p>
									</li>
									
									
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-left">
											<a href="#" class="btn btn-default btn-flat">Profile</a>
										</div>
										<div class="pull-right">
											
											<?php echo CHtml::link('Log out',array('/site/logout'),array('class'=>'btn btn-success btn-flat')); ?>
										</div>
									</li>
								</ul>
							</li>
							<!-- Control Sidebar Toggle Button -->
							
						</ul>
					</div>
				</nav>
			</header><!-- header -->
			
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- Sidebar user panel -->
					<div class="user-panel">
						<div class="pull-left image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/avatar5.png" class="img-circle" alt="User Image">
						</div>
						<div class="pull-left info">
							<p><?php echo $user;?></p>
							<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
						</div>
					</div>
					<!-- search form -->
					
					<!-- /.search form -->
					<!-- sidebar menu: : style can be found in sidebar.less -->
					
					<ul class="sidebar-menu">
						<li class="header">MAIN NAVIGATION</li>
						<li class="treeview " id="M_dash">
							<a href="<?php echo Yii::app()->request->baseUrl; ?>">
								<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>
						
						<li class="treeview " id="M_resv">
							<a href="<?php echo Yii::app()->createUrl('/reservation');?>">
								<i class="fa fa-bed"></i>
								<span>Reservation</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
						</li>
						
						<li class="treeview" id="M_kot">
							<a href="<?php echo Yii::app()->createUrl('kot/create');?>">
								<i class="fa fa-ticket"></i>
								<span>KOT</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu" >
								<li><a href="<?php echo Yii::app()->createUrl('kot/create');?>"><i class="fa fa-circle-o"></i> Create KOT</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('kot/view');?>"><i class="fa fa-circle-o"></i> View KOT</a></li>
							</ul>
						</li>
						<li class="treeview" id="M_bot">
							<a href="<?php echo Yii::app()->createUrl('bot/create');?>">
								<i class="fa fa-ticket"></i>
								<span>BOT</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu " >
								<li><a href="<?php echo Yii::app()->createUrl('bot/create');?>"><i class="fa fa-circle-o"></i> Create BOT</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('bot/create');?>"><i class="fa fa-circle-o"></i> View BOT</a></li>
							</ul>
						</li>
						<li class="treeview" id="M_invo">
							<a href="<?php echo Yii::app()->createUrl('invoice/Index');?>">
								<i class="fa fa-file-text"></i> <span>Invoice</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							
						</li>
						<li class="treeview" id="M_ingr">
							<a href="<?php echo Yii::app()->createUrl('kitchenIngrediants');?>">
								<i class="fa fa-shopping-cart"></i> <span>Kitchen Ingrediants</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							
						</li>
						
						<li class="treeview" id="M_bmenu">
							<a href="<?php echo Yii::app()->createUrl('barItems');?>">
								<i class="fa fa-glass"></i><span>Bar Menu</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
						</li>
						<li class="treeview" id="M_rmenu">
							<a href="<?php echo Yii::app()->createUrl('RestaurantItems');?>">
								<i class="fa fa-cutlery"></i> <span>Restaurant Menu</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<!--ul class="treeview-menu">
								<li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Create Menu Items</a></li>
								<li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> View Menu Items</a></li>
							</ul-->
						</li>
						<li class="treeview" id="M_room">
							
							<a href="<?php echo Yii::app()->createUrl('/room/create');?>">
								<i class="fa fa-home"></i> <span>Room</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
						</li>
						<li class="treeview" id="M_stew">
							<a href="<?php echo Yii::app()->createUrl('/steward/create');?>">
								
								<i class="fa  fa-user"></i> <span>Steward</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>          
						</li>
						<li class="treeview" id="M_user">
							<a href="<?php echo Yii::app()->createUrl('/user');?>">
								
								<i class="fa  fa-user"></i> <span>User</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							
						</li>
						<li class="treeview" id="M_cus">
							
							<a href="<?php echo Yii::app()->createUrl('/customer');?>">
								<i class="fa  fa-users"></i> <span>Customers</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							
						</li>
						
						<li class="treeview" id="M_expen">
							<a href="<?php echo Yii::app()->createUrl('/expenses');?>">
								
								<i class="fa    fa-money"></i> <span>Expenses</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							
						</li>
						<li class="treeview" id="M_repo">
							
							<a href="<?php echo Yii::app()->createUrl('/reports');?>">
								<i class="fa fa-line-chart"></i> <span>Reports</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu " >
								<li><a href="<?php echo Yii::app()->createUrl('Reports/stock');?>"><i class="fa fa-circle-o"></i>Current Stock</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('Reports/sales');?>"><i class="fa fa-circle-o"></i>Sales</a></li>
								<li><a href="<?php echo Yii::app()->createUrl('Reports/profit');?>"><i class="fa fa-circle-o"></i>Profit</a></li>
							</ul>
							
						</li>
						<li class="treeview" id="M_more">
							
							<a href="<?php echo Yii::app()->createUrl('/more');?>">
								<i class="fa  fa-plus-square"></i> <span>More</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							
						</li>
					</ul>
					<!-- /.sidebar -->
				</section >
			</aside>
			<!-- mainmenu -->
			<div class="content-wrapper">
				
				
				
				<?php echo $content; ?>
				
				<div class="clear"></div>
			</div>
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 1.0
				</div>
				<strong>Copyright &copy; UOB SE & CS 2017<a href="#"> SPPM Group 7</a>.</strong> All rights
				reserved.
			</footer><!-- footer -->
			<div class="control-sidebar-bg"></div>
		</div><!-- page -->
		
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" id="message-title"></h4>
					</div>
					<div class="modal-body" >
						<p id="message-body"></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<?php if(Yii::app()->user->hasFlash('success')):?>
		
        <?php echo Yii::app()->user->getFlash('success'); ?>
		
		<?php endif; ?>
		
		
		<!-- Bootstrap 3.3.6 -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
		<!--script src="<?php  //echo Yii::app()->request->baseUrl; ?>/js/dataTables.bootstrap.min.js"></script-->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/dataTables.bootstrap.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/datepicker/bootstrap-datepicker.js"></script>
		
		<!-- date-range-picker -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
		<!--script src="<?php //	echo Yii::app()->request->baseUrl; ?>/js/daterangepicker/daterangepicker.js"></script-->
		
		<!--script src="<?php //echo Yii::app()->request->baseUrl; ?>/js/timepicker/bootstrap-timepicker.min.js"></script-->
		
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootbox.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2.full.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/dist/bootstrap-clockpicker.min.js"></script>
		
		
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/daterangepicker/daterangepicker.js"></script>
		
		<script>
			
			
			
			function Drangepicker(){
				
				$(function () {
					
					$('#daterange-btn').daterangepicker(
					{
						ranges: {
							'Today': [moment(), moment()],
							'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
							'Last 7 Days': [moment().subtract(6, 'days'), moment()],
							'Last 30 Days': [moment().subtract(29, 'days'), moment()],
							'This Month': [moment().startOf('month'), moment().endOf('month')],
							'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
							'Last 6 Months': [moment().subtract(6, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
						},
						startDate: moment().subtract(29, 'days'),
						endDate: moment()
					},
					function (start, end) {
						$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
						//$('#End_Date value').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
						document.getElementById("Start_Date").value=start.format('YYYY-MM-DD');
						document.getElementById("End_Date").value=end.format('YYYY-MM-DD');
						
					}
					);
				});
				
			};
		</script>
		
		
		
		<script type="text/javascript">
			$('.clockpicker').clockpicker()
			.find('input').change(function(){
				console.log(this.value);
			});
			var input = $('#single-input').clockpicker({
				placement: 'bottom',
				align: 'left',
				autoclose: true,
				'default': 'now'
			});
			
			$('.clockpicker-with-callbacks').clockpicker({
				donetext: 'Done',
				init: function() { 
					console.log("colorpicker initiated");
				},
				beforeShow: function() {
					console.log("before show");
				},
				afterShow: function() {
					console.log("after show");
				},
				beforeHide: function() {
					console.log("before hide");
				},
				afterHide: function() {
					console.log("after hide");
				},
				beforeHourSelect: function() {
					console.log("before hour selected");
				},
				afterHourSelect: function() {
					console.log("after hour selected");
				},
				beforeDone: function() {
					console.log("before done");
				},
				afterDone: function() {
					console.log("after done");
				}
			})
			.find('input').change(function(){
				console.log(this.value);
			});
			
			// Manually toggle to the minutes view
			$('#check-minutes').click(function(e){
				// Have to stop propagation here
				e.stopPropagation();
				input.clockpicker('show')
				.clockpicker('toggleView', 'minutes');
			});
			if (/mobile/i.test(navigator.userAgent)) {
				$('input').prop('readOnly', true);
			}
			
			
			
		</script>
		
		<script>
			
			$(".select2").select2();
			
			$('.datepicker').datepicker({
				autoclose: true,
				//minViewMode: 1,
				//format: 'mm/yyyy'
			});
			
			
			function Mpicker(){	
				$('.monthpicker').datepicker({
					autoclose: true,
					minViewMode: 1,
					format: 'M-yyyy'
				});};
				
				
				$(function () {
					$("#table-data").DataTable();
					$('#example2').DataTable({
						"paging": true,
						"lengthChange": false,
						"searching": false,
						"ordering": true,
						"info": true,
						"autoWidth": false
					});
				});
				
		</script>
		
	</html>
