<?php
	date_default_timezone_set('Asia/Colombo');
	class ProfitController extends Controller
	{
		public function filters()
		{
			return array(
			'accessControl', // perform access control for CRUD operations
			//	'postOnly + delete', // we only allow deletion via POST request
			);
		}
		public function accessRules()
		{
			return array(
			/* array('allow',  // allow all users to perform 'index' and 'view' actions
			'actions'=>array('view'),
			'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
			'actions'=>array('update','avalible_rooms','customer','create'),
			'users'=>array('@'),
			), */
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('admin','delete','index'),
			'users'=>array('admin'),
			),
			array('deny',  // deny all users
			'users'=>array('*'),
			),
			);
		}
		/* public function actionSales()
		{
			
			/* $Start_date='2017-07-13';
			$End_date='2017-07-31'; 
			
			$month_ini = new DateTime("first day of last month");
			$month_end = new DateTime("last day of last month");
			
			$Start_date=$month_ini->format('Y-m-d');
			$End_date=$month_end->format('Y-m-d'); 
			
			if(isset($_POST['Start_Date']) && isset($_POST['End_date'])) 
			{
				$Start_date = $_POST['Start_Date'];
				$End_date   = $_POST['End_date'];
				
			}
			$Start_date='2017-07-13';
			$End_date='2017-07-31';
			$SALES=ReportsData::Sales($Start_date,$End_date);
			
			
			$this->render('index',array(
			'SALES'=>$SALES,'Start_date'=>$Start_date,'End_date'=>$End_date,));
			
		} */
		
		public function actionIndex()
		{
			
			/* $Start_date='2017-07-13';
			$End_date='2017-07-31'; */
			$Year=date('Y');
			$Month=date('m');
			$Start_date=$Year.'-01';
			$End_date=$Year.'-'.$Month;
			
			
			if(isset($_POST['start_month'])) 
			{
				
				$Start_date=date("Y-m", strtotime($_POST['start_month']));
				
				 if($_POST['end_month']==''){
					$End_date= $_POST['start_month'];
					}
					else{
					$End_date=date("Y-m", strtotime($_POST['end_month']));
						} 
				//exit($Start_date.' '.$End_date);
				
			}
			
			//$End_date=date("Y-m", strtotime($End_date));
			
			$PROFIT=ReportsData::Profit($Start_date,$End_date);
			
			
			$this->render('pofit_index',array(
			'PROFIT'=>$PROFIT,'Start_date'=>$Start_date,'End_date'=>$End_date));
			
		}
	}	