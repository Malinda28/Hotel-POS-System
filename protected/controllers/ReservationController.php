<?php
	
	class ReservationController extends Controller
	{
		/**
			* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
			* using two-column layout. See 'protected/views/layouts/column2.php'.
		*/
		//public $layout='//layouts/column2';
		
		/**
			* @return array action filters
		*/
		public function filters()
		{
			return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			);
		}
		
		/**
			* Specifies the access control rules.
			* This method is used by the 'accessControl' filter.
			* @return array access control rules
		*/
		public function accessRules()
		{
			return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
			'actions'=>array('view'),
			'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
			'actions'=>array('update','avalible_rooms','customer','create','index'),
			'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('admin','delete'),
			'users'=>array('admin'),
			),
			array('deny',  // deny all users
			'users'=>array('*'),
			),
			);
		}
		
		/**
			* Displays a particular model.
			* @param integer $id the ID of the model to be displayed
		*/
		public function actionView($id)
		{
			$this->render('view',array(
			'model'=>$this->loadModel($id),
			));
		}
		
		/**
			* Creates a new model.
			* If creation is successful, the browser will be redirected to the 'view' page.
		*/
		public function actionCreate()
		{	
			$model=new Reservation;
			$customer=new Customer;
			$perinvoice=new PerInvoice;
			
			
			
			//$ReservationDetail=new ReservationDetail;
			
			//$model->unsetAttributes();  // clear any default values
			$ROOM=array();
			$DateTime=array();
			
			//$this->performAjaxValidation($customer);
			if(isset($_POST['available_AC']))
			{	
				for($i=0;$i<count($_POST['available_AC']);$i++)
				{
					array_push($ROOM,array("room_no"=>$_POST['available_AC'][$i], "adults"=>"0", "children"=>"0"));
				}
				//Print_r($ROOM);
				//echo'<br/>';
				//exit();
				
				//$ROOM=$_POST['available_AC'];
				
			}
			
			if(isset($_POST['available_nonAC']))
			{		
				
				for($i=0;$i<count($_POST['available_nonAC']);$i++)
				{
					array_push($ROOM,array("room_no"=>$_POST['available_nonAC'][$i], "adults"=>"0", "children"=>"0"));
				}
				//Print_r($ROOM);
				
				//$ROOM=array_merge($ROOM,$_POST['available_nonAC']);
				
				//Yii::app()->user->setState("nonac_rooms", $NON);
			}
			
			if(isset($_POST['DateTime']))
			{
				
				array_push($DateTime,array("check_in_date_time"=>$_POST['DateTime'][0]['date_in']." ".$_POST['DateTime'][0]['time_in'], "check_out_date_time"=>$_POST['DateTime'][0]['date_out']." ".$_POST['DateTime'][0]['time_out']));
				
			}
			if( isset($_POST['Customer']) && isset($_POST['Reservation']))
			{	
				$DateTime=$_POST['Reservation'];
				$ROOM=$_POST['ReservationDetail'];
				
				
				
				$customer->attributes=$_POST['Customer'];
				$model->attributes=$_POST['Reservation'][0];
				
				$model->cus_id=$customer->nic_no;

				if($customer->validate())
				{

					$CUS=MainData::Customers($customer->nic_no);
					
					if(count($CUS)==0)
					{
						$customer->save();
						/* echo $customer->nic_no."- ";
							echo $customer->customer_name."- ";
							echo $customer->address." -";
						echo $customer->phone." -"; */
						
					}
					
					$count=count($_POST['ReservationDetail']);

					/* echo $model->cus_id."- ";
					echo $model->check_in_date_time."- ";
					echo $model->check_out_date_time." -";
					echo "<br/>";  */
					
					if($model->save())
					{
						/*----Preinvoice------*/
						$gen_code= "R".Date('YmdHi').$model->reservation_id;
						
					
						$perinvoice->gen_id=$gen_code;
						$perinvoice->ticket_id=$model->reservation_id;
						$perinvoice->type="R";
						$perinvoice->invoice_status="N";
						$perinvoice->save();
						/*----Preinvoice END------*/
						for($i=0; $i<$count ; $i++ )
						{

							$ReservationDetail=new ReservationDetail;
							$ReservationDetail ->attributes=$_POST['ReservationDetail'][$i];
							$ReservationDetail->reservation_id=$model->reservation_id;
							//print_r($_POST['ReservationDetail'][$i]);
							$ReservationDetail->save();	
							
						} 
						Yii::app()->user->setFlash('success', "<script>
													window.onload = function gos()
													{
														document.getElementById('message-title').innerHTML= 'Success' ;
														document.getElementById('message-body').innerHTML= 'Successfully Booked !!' ;
														$('#myModal').modal('show');
													
													}</script>");
													
						$this->redirect(array('invoice/preview','id'=>$perinvoice->gen_id));
						
					}
					
				}
			}
			
			if(count($ROOM)==0 &&  !isset($_POST['DateTime']))
			{
				
				$this->redirect(array('index'));
				
			}
			
			$this->render('create',array(
			'model'=>$model,'ROOM'=>$ROOM,'customer'=>$customer,'DateTime'=>$DateTime
			));
		}
		
		/**
			* Updates a particular model.
			* If update is successful, the browser will be redirected to the 'view' page.
			* @param integer $id the ID of the model to be updated
		*/
		public function actionUpdate($id)
		{
			//$model=new Steward
			$searchmodel=new Reservation('search');
			$model=$this->loadModel($id);
			$action = 'Update';
			
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
			
			if(isset($_POST['Reservation']))
			{
				$model->attributes=$_POST['Reservation'];
				if($model->save())
				$this->redirect(array('view','id'=>$model->reservation_id));
			}
			if(isset($_GET['Reservation']))
			$model->attributes=$_GET['Reservation'];
			
			$this->render('update',array(
			'model'=>$model, 'searchmodel'=>$searchmodel,'action'=>$action
			));
		}
		
		/**
			* Deletes a particular model.
			* If deletion is successful, the browser will be redirected to the 'admin' page.
			* @param integer $id the ID of the model to be deleted
		*/
		public function actionDelete($id)
		{
			$this->loadModel($id)->delete();
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		
		/**
			* Lists all models.
		*/
		public function actionIndex()
		{
			$model=new Reservation;
			$searchmodel=new Reservation('search');
			$this->render('index',array(
			'model'=>$model,
			'searchmodel'=>$searchmodel,
			));
		}
		
		
		
		public function actionAvalible_rooms()
		{
			
			//$_POST['din']='2017-07-21 00:00';
			//$_POST['dout']='2017-07-21 06:00';
			
			
			//$_POST['rmtype']='A/C';
			//$_POST['rmtype']='Non A/C';
			if(isset($_POST['din'])){
				//	echo $_POST['din']." ".$_POST['dout'];
				
				$Aval_rooms=MainData::Avalible_Rooms($_POST['din'],$_POST['dout']);
				
				$this->renderPartial('_rooms',array(
				'Aval_rooms'=>$Aval_rooms,'Rmtype'=>$_POST['rmtype']
				
				));
				
			}
			//$searchmodel=new Reservation('search');
			//echo "Error";
			Yii::app()->end();
		}
		
		
		public function actionCustomer()
		{
			
			$Customers=MainData::Customers($_POST['nic']);
			
			
			if (count($Customers)==1)
			{
				foreach($Customers as $Customer)
				{
					$Customers_array = array($Customer['customer_name'],$Customer['address'],$Customer['phone']);
				}
			}
			else
			{
				$Customers_array = array('','','');
			}
			echo json_encode( $Customers_array );
		}
		
		
		//print_r($Customers);
		//echo $_POST['nic'];
		
		
		/**
			* Manages all models.
		*/
		public function actionAdmin()
		{
			$model=new Reservation('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Reservation']))
			$model->attributes=$_GET['Reservation'];
			
			$this->render('admin',array(
			'model'=>$model,
			));
		}
		
		/**
			* Returns the data model based on the primary key given in the GET variable.
			* If the data model is not found, an HTTP exception will be raised.
			* @param integer $id the ID of the model to be loaded
			* @return Reservation the loaded model
			* @throws CHttpException
		*/
		public function loadModel($id)
		{
			$model=Reservation::model()->findByPk($id);
			if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}
		
		/**
			* Performs the AJAX validation.
			* @param Reservation $model the model to be validated
		*/
		protected function performAjaxValidation($model)
		{
			if(isset($_POST['ajax']) && $_POST['ajax']==='reservation-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
		}
	}
