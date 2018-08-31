<?php
	
	class StockController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
			'actions'=>array('view'),
			'users'=>array('@'),
			),
	
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('admin','delete','Index','SalesM'),
			'roles'=>array('Admin','Manager'),
			),
			array('deny',  // deny all users
			'users'=>array('*'),
			),
			);
		}
		public function actionIndex()
		{
			
			/* $Start_date='2017-07-13';
			$End_date='2017-07-31'; */
			//$this->renderPartial('application.views.layouts.column3',array('active'=>1));
			$month_ini = new DateTime("first day of last month");
			$month_end = new DateTime("last day of last month");
			
			$Start_date=$month_ini->format('Y-m-d');
			$End_date=$month_end->format('Y-m-d'); 
			$Start_date='2017-07-13';
			$End_date='2017-07-31';
			
			
			if(isset($_POST['Start_Date']) && isset($_POST['End_Date'])) 
			{
				$Start_date = $_POST['Start_Date'];
				$End_date   = $_POST['End_Date'];
				
				//exit($Start_date.' '.$End_date);
			}
			
			$Start_date='2017-07-13';
			$End_date='2017-08-31';
			$SALES=ReportsData::Sales($Start_date,$End_date);
			
			//print_r($SALES);
			
			$this->render('index',array(
			'SALES'=>$SALES,'Start_date'=>$Start_date,'End_date'=>$End_date,));
			
		}
		
		public function actionSalesM()
		{
			
			/* $Start_date='2017-07-13';
			$End_date='2017-07-31'; */
			
			$month_ini = new DateTime("first day of last month");
			$month_end = new DateTime("last day of last month");
			
			$Start_date=$month_ini->format('Y-m');
			$End_date=$month_end->format('Y-m'); 
			$Start_date='2017-06';
			$End_date='2017-09';
			
			
			if(isset($_POST['start_month']) && isset($_POST['end_month'])) 
			{
				$Start_date = $_POST['start_month'];
				$End_date   = $_POST['end_month'];
				
				//exit($Start_date.' '.$End_date);
			}
			
			$SALES=ReportsData::Sales_M($Start_date,$End_date);
			
			/* print_r($SALES);
			exit(); */
			
			$this->render('index',array(
			'SALES'=>$SALES,'Start_date'=>$Start_date,'End_date'=>$End_date,'Mchek'=>1));
			
		}
		
		
	}	