<?php
   
	date_default_timezone_set('Asia/Colombo');
	
	class InvoiceController extends Controller
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
			/* array('allow',  // allow all users to perform 'index' and 'view' actions
			'actions'=>array(),
			'users'=>array('*'),
			), */
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
			'actions'=>array('create','update','Preview','index','view'),
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
		
		public function actionPreview($id)
		{
			$preinvoice= new PerInvoice;
			
			//$preinvoice=PerInvoice::model()->findByPk($id);
			//print_r($preinvoice);
			$ROOMS=MainData::PreInvoiceROOM($id);
			$KOT=MainData::PreInvoiceKOT($id);
			$BOT=MainData::PreInvoiceBOT($id);
			$CUS=MainData::PreInvoiceCustomer($id);

			$this->render('preview',array(
			'ROOMS'=>$ROOMS,'KOT'=>$KOT,'BOT'=>$BOT,'CUS'=>$CUS,'GID'=>$id
			));
		}
		
		public function actionView($id)
		{
			
			$criteria=new CDbCriteria;
			$criteria->select='invoice_id';  // only select the 'title' column
			$criteria->condition='pre_gen_id="'.$id.'"';
			//$criteria->params=array(':gen_id'=>1);
			$post=Invoice::model()->find($criteria);
			
			//$Date=date('Y-m-d h:i');
			
			$id=$post->invoice_id;
			$sql = "SELECT *
			FROM invoice_detail ind,invoice inv
			WHERE   inv.invoice_id=ind.invoice_id AND inv.invoice_id =".$id;
			
			$Inv_data = Yii::app()->db->createCommand($sql)->queryAll();
			
			
			//print_r ($Inv_data);
			
			
			$Date=$Inv_data[0]['date_time'];
									
			$this->render('view',array(
			'model'=>$this->loadModel($id), 
			'Room_data'=>$Inv_data,'Date'=>$Date
			));
		}
		
		/**
			* Creates a new model.
			* If creation is successful, the browser will be redirected to the 'view' page.
		*/
		public function actionCreate($gid)
		{
			
		
			$criteria=new CDbCriteria;
			$criteria->select='gen_id';  // only select the 'title' column
			$criteria->condition='invoice_status="Y" AND gen_id="'.$gid.'"';
			//$criteria->params=array(':gen_id'=>1);
			$post=PerInvoice::model()->find($criteria);
			
			
			
			if(isset($post->gen_id)):
			$this->redirect(array('view','id'=>$post->gen_id));
			endif;
				
				
			$model=new Invoice;
			
			$Date=date('Y-m-d H:i');
			$Time=date('H:i');

			$ROOMS=MainData::PreInvoiceROOM($gid);
			$KOT=MainData::PreInvoiceKOT($gid);
			$BOT=MainData::PreInvoiceBOT($gid);
			$CUS=MainData::PreInvoiceCustomer($gid);
			
			
			$Kot_data=array();
			$Bot_data=array();
			$Room_data=array();
			if(count($KOT)>0){
				$Kot_data=$this->Kot($KOT);
				}
				
			if(count($BOT)>0){
				$Bot_data=$this->Bot($BOT);
				}
				
			if(count($ROOMS)>0){
				$Room_data=$this->Reservation($ROOMS);
				}

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
			
			if(isset($_POST['Invoice']))
			{
				$savedata=array();
				
				$model->attributes=$_POST['Invoice'];


				if($model->save())
				{ 
			

					for($i=0;$i<count($Room_data);$i++)
					{
						$inv_details= new InvoiceDetail;
						
						$inv_details->description=$Room_data[$i]['Description'];
						$inv_details->price=$Room_data[$i]['UPrice'];
						$inv_details->qty=$Room_data[$i]['Quantity'];
						$inv_details->des_type='R';
						$inv_details->invoice_id=$model->invoice_id;
							
							//echo $inv_details->price;
						$inv_details->save();
					
	
					}	
					
					for($i=0;$i<count($Kot_data);$i++)
					{
						$inv_details= new InvoiceDetail;
						
						$inv_details->description=$Kot_data[$i]['Description']." - ".$Kot_data[$i]['Portion'];
						$inv_details->price=$Kot_data[$i]['UPrice'];
						$inv_details->qty=$Kot_data[$i]['Quantity'];
						$inv_details->des_type='K';
						$inv_details->invoice_id=$model->invoice_id;
							
							//echo $inv_details->price;
							$inv_details->save();	
						
					}
					if(count($Kot_data)>0){
						ReduceData::Reduce_ING($Kot_data);
					}
					for($i=0;$i<count($Bot_data);$i++)
					{
						$inv_details= new InvoiceDetail;
						
						$inv_details->description=$Bot_data[$i]['Description']." - ".$Bot_data[$i]['Volume']."ml";
						$inv_details->price=$Bot_data[$i]['UPrice'];
						$inv_details->qty=$Bot_data[$i]['Quantity'];
						$inv_details->des_type='B';
						$inv_details->invoice_id=$model->invoice_id;
							
							//echo $inv_details->price;
							$inv_details->save();
							
	
					}
					

					//exit();
					  
					$command = Yii::app()->db->createCommand();
				
					$command->update('per_invoice', array(
					'invoice_status'=>'Y',), 'gen_id=:gen_id', array(':gen_id'=>$gid)); 
					
					$this->redirect(array('view','id'=>$gid));
				}	
			

				
			} 
			
			$this->render('create',array(
			'model'=>$model,'Room_data'=>$Room_data,'Kot_data'=>$Kot_data,'Bot_data'=>$Bot_data,'Date'=>$Date,'gid'=>$gid,
			));
		}
		
		/**
			* Updates a particular model.
			* If update is successful, the browser will be redirected to the 'view' page.
			* @param integer $id the ID of the model to be updated
		*/
		
		
		
		
		public function actionUpdate($id)
		{
			$model=$this->loadModel($id);
			
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
			
			if(isset($_POST['Invoice']))
			{
				$model->attributes=$_POST['Invoice'];
				if($model->save())
				$this->redirect(array('view','id'=>$model->invoice_id));
			}
			
			$this->render('update',array(
			'model'=>$model,
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
			
		$model=new Invoice;
		$searchmodel=new Invoice('search');
		$action = 'Update';
		
		
		
		$this->render('index',array(
			'model'=>$model,'searchmodel'=>$searchmodel,'action'=>$action
		));
		}
		/**
			* Manages all models.
		*/
		public function actionAdmin()
		{
			$model=new Invoice('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Invoice']))
			$model->attributes=$_GET['Invoice'];
			
			$this->render('admin',array(
			'model'=>$model,
			));
		}
		
		/**
			* Returns the data model based on the primary key given in the GET variable.
			* If the data model is not found, an HTTP exception will be raised.
			* @param integer $id the ID of the model to be loaded
			* @return Invoice the loaded model
			* @throws CHttpException
		*/
		
		public function Reservation($ROOMS)
		{
			
			
			$resv_data= array(); 
			//$rm_type = array("Non A/C Single"=>"0", "A/C Single"=>"0","Non A/C Double"=>"0", "A/C Double"=>"0");
			
			
			$rm_type=array
			(
			array("type"=>"Non A/C Single", "qty"=>"0","price"=>"0","subprice"=>"0"),
			array("type"=>"A/C Single", 	"qty"=>"0","price"=>"0","subprice"=>"0"),
			array("type"=>"Non A/C Double", "qty"=>"0","price"=>"0","subprice"=>"0"),
			array("type"=>"A/C Double", 	"qty"=>"0","price"=>"0","subprice"=>"0"),
			
			);
			
			//print_r($rm_type);
			//echo $rm_type[0]['type'];
			//exit();
			foreach($ROOMS as $room){
				
				if($room['content']=='Single')
				{
					
					if($room['facility']=='A/C')
					{
						$rm_type[1]['qty']++;
						$rm_type[1]['subprice']=bcadd($rm_type[1]['price'],$room['price'],2);
						$rm_type[1]['price']=$room['price'];
					}
					else{
						
						$rm_type[0]['qty']++;
						$rm_type[0]['subprice']=bcadd($rm_type[0]['price'],$room['price'],2);
						$rm_type[0]['price']=$room['price'];
					}
					
					
				}
				else if($room['content']=='Double')
				{
					
					if($room['facility']=='A/C')
					{
						$rm_type[3]['qty']++;
						$rm_type[3]['subprice']=bcadd($rm_type[3]['price'],$room['price'],2);
						$rm_type[3]['price']=$room['price'];
					}
					else{
						
						$rm_type[2]['qty']++;
						$rm_type[2]['subprice']=bcadd($rm_type[2]['price'],$room['price'],2);
						$rm_type[2]['price']=$room['price'];
					}
				}
				
			}	
			
			foreach($rm_type as $x_value)
			{
				
				if($x_value['qty']>0){
					//echo $x_value['type'] ."=" .$x_value['qty'] ."=" .$x_value['price']/$x_value['qty']."=" .$x_value['price'];
					array_push($resv_data,array("Description"=>$x_value['type'], "Quantity"=>$x_value['qty'],
					"UPrice"=>$x_value['price'], "Subtotal"=>$x_value['subprice']));
					
				}
				
				
			}
			
			//print_r($resv_data);
			
			return $resv_data;
		}
		
		
		public function Kot($KOT)
		{
			$kot_data= array(); 
			
			$KOT_ids = array_column($KOT,'ticket_id');
			
			//print_r($KOT_ids);
			$KOTS=MainData::KOTdetails($KOT_ids);
			
			/* if($KOTS[0]['portion']=="L")
			{
				array_push($kot_data,array("Id"=>$KOTS[0]['res_item_id'],"Description"=>$KOTS[0]['item_name'],"Portion"=>$KOTS[0]['portion'], "Quantity"=>$KOTS[0]['qty'], "UPrice"=>$KOTS[0]['large_price'], "Subtotal"=>$KOTS[0]['large_price']*$KOTS[0]['qty']));
			}
			else{
				
				array_push($kot_data,array("Id"=>$KOTS[0]['res_item_id'],"Description"=>$KOTS[0]['item_name'],"Portion"=>$KOTS[0]['portion'], "Quantity"=>$KOTS[0]['qty'], "UPrice"=>$KOTS[0]['regular_price'], "Subtotal"=>$KOTS[0]['regular_price']*$KOTS[0]['qty']));
				
			}
			 */
			$KOT_id='';
			$Portion='';
			
			$q=0;
			for($i=1;$i<count($KOTS);$i++)
			{
				//echo count($KOTS)."<br/>";
				 
					
					//echo $KOTS[$i]['res_item_id']."-". $KOTS[$i]['portion']."- ". $KOTS[$i]['item_name']."- <br/>";
					
					if($KOTS[$i]['res_item_id']==$KOT_id && $KOTS[$i]['portion']==$Portion)
					{
						
						$kot_data[$q]['Quantity']=$kot_data[$q]['Quantity']+$KOTS[$i]['qty'];
						$new_list=bcmul($kot_data[$q]['UPrice'], $kot_data[$q]['Quantity'], 2);
						
						
						$kot_data[$q]['Subtotal']= $new_list;
						
						
						
						
					}
					else
					{
						$KOT_id=$KOTS[$i]['res_item_id'];
						$Portion=$KOTS[$i]['portion'];
						
						
						if($KOTS[$i]['portion']=="L")
						{
							array_push($kot_data,array("Id"=>$KOTS[$i]['res_item_id'],"Description"=>$KOTS[$i]['item_name'],"Portion"=>$KOTS[$i]['portion'], "Quantity"=>$KOTS[$i]['qty'], "UPrice"=>$KOTS[$i]['large_price'], "Subtotal"=>bcmul($KOTS[$i]['large_price'], $KOTS[$i]['qty'], 2)));
							
																																																							
						}
						else{
							
							array_push($kot_data,array("Id"=>$KOTS[$i]['res_item_id'],"Description"=>$KOTS[$i]['item_name'],"Portion"=>$KOTS[$i]['portion'], "Quantity"=>$KOTS[$i]['qty'], "UPrice"=>$KOTS[$i]['regular_price'], "Subtotal"=>bcmul($KOTS[$i]['regular_price'], $KOTS[$i]['qty'], 2)));
							
							//continue 2;
						}
						
						
					$q=count($kot_data)-1;	
					
				}
				
				
			} 
			
			
			//$kot_data = unset(array_column($KOT,'Id'));
			
			//print_r($kot_data);
			//exit();
			return $kot_data;
		}
		

		public function Bot($BOT)
		{
			$bot_data= array(); 
			
			$BOT_ids = array_column($BOT,'ticket_id');
			
			
			//print_r($KOT_ids);
			$BOTS=MainData::BOTdetails($BOT_ids);
				$vol=$BOTS[0]['volume'];
				
			
			array_push($bot_data,array("Id"=>$BOTS[0]['bar_item_id'],"Description"=>$BOTS[0]['beverage_name'],
			"Volume"=>$BOTS[0]['volume'], "Quantity"=>$BOTS[0]['qty'], "UPrice"=>$BOTS[0][$vol],
			"Subtotal"=>bcmul($BOTS[0][$vol], $BOTS[0]['qty'], 2)));
		
				
				//print_r($bot_data);
			
				
			
			
			
			for($i=1;$i<count($BOTS);$i++)
			{
				//echo count($BOTS)."<br/>";
				$vol=$BOTS[$i]['volume'];
				for($q=0;$q<count($bot_data);$q++)
				{
					//echo count($bot_data)."<br/>";
					
					if($BOTS[$i]['bar_item_id']==$bot_data[$q]['Id']&& $BOTS[$i]['volume']==$bot_data[$q]['Volume'])
					{
						
						$bot_data[$q]['Quantity']=$bot_data[$q]['Quantity']+$BOTS[$i]['qty'];
						$new_list=bcmul($bot_data[$q]['UPrice'], $bot_data[$q]['Quantity'], 2);
						
						$bot_data[$q]['Subtotal']= bcadd($bot_data[$q]['Subtotal'],$new_list,2);
						
						continue 2;
					}
					else
					{
						
						
							array_push($bot_data,array("Id"=>$BOTS[$i]['bar_item_id'],"Description"=>$BOTS[$i]['beverage_name'],"Volume"=>$BOTS[0]['volume'], "Quantity"=>$BOTS[$i]['qty'], "UPrice"=>$BOTS[$i][$vol], "Subtotal"=>bcmul($BOTS[$i][$vol], $BOTS[$i]['qty'], 2)));
							
							continue 2;																																																		
						
					}
				}
				
				
			} 
			
			
			
			
			//print_r($bot_data);
			
			return $bot_data;
		}
		
		public function loadModel($id)
		{
			$model=Invoice::model()->findByPk($id);
			if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}
		
		/**
			* Performs the AJAX validation.
			* @param Invoice $model the model to be validated
		*/
		protected function performAjaxValidation($model)
		{
			if(isset($_POST['ajax']) && $_POST['ajax']==='invoice-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
		}
	}
