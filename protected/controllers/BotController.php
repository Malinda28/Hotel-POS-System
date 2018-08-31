<?php

class BotController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	
	public $itm_count=0;
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
				'actions'=>array('index','view','volumes'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','Bots'),
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
	public function actionView()
	{
		
		$id=$_POST['id'];
		$model=new Bot;
		$searchmodel=new Bot('search');
		//$action = 'id';
		
		
		
		$this->renderpartial('view',array(
			'model'=>$model,'searchmodel'=>$searchmodel,'id'=>$id
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Bot;
		$cc=0;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bot']))
		{
			$cc=1;
			$model->attributes=$_POST['Bot'];
			
			 if($model->save())
			{  	
				
				
				/*----Preinvoice------*/
						$gen_code= "T".Date('YmdHi').$model->table_no;
						
						$perinvoice=new PerInvoice;
						$perinvoice->gen_id=$gen_code;
						$perinvoice->ticket_id=$model->bot_id;
						$perinvoice->type="B";
						$perinvoice->invoice_status="N";
						$perinvoice->table_no=$model->table_no;
						$perinvoice->save();
						/*----Preinvoice END------*/
						
				$someObject=$this->getcookie();

				$this->auItems($someObject,$model->bot_id);
				
				MainData::Del_All_Cookie('baritems');		
					Yii::app()->user->setFlash('success', "<script>
													window.onload = function gos()
													{
														document.getElementById('message-title').innerHTML= 'Success' ;
														document.getElementById('message-body').innerHTML= 'Successfully Added !!' ;
														$('#myModal').modal('show');
														
													
													}</script>");
													
				$this->redirect(array('view','id'=>$model->bot_id));
			}
			//exit();
		}

		$this->render('form',array(
			'model'=>$model,'action'=>'create','cc'=>$cc
		));
	}

	
	 /* ---------------- */
	 
	 public function actionBots($id)
	{
		$model=new Bot;
		$cc=0;
		$ex=1;
		
		
		$tables=MainData::tabledata($id);
		$rooms=MainData::PreInvoiceROOM($id);
		$stewards=MainData::stewarddata($id);
		//$rooms = array_column($roomdata,'room_no');
		//$tables = array_column($predatat,'number');
		//$rooms=array();
		
		/* if(count($tables2)>0)
		{
			for($i=0;$i(count($tables2));$i++){
			
			array_push($kot_data,array("number"=>$KOTS[$i]['res_item_id']));
							
			$tables=$predatat[0]['table_no'];
			}
		} */
		if(count($tables)<1 && count($rooms)<1)
		{
			Yii::app()->user->setFlash('success', "<script>
													window.onload = function gos()
													{
														document.getElementById('message-title').innerHTML= 'Error!!' ;
														document.getElementById('message-body').innerHTML= 'Invoiced Data' ;
														$('#myModal').modal('show');
														document.getElementById('head').className = 'head-red';
													}</script>");
			
			$this->redirect(array('dashboard/index'));
		}
		
		if(isset($_POST['Bot']))
		{
			$model->attributes=$_POST['Bot'];
			$cc=1;
			if($model->save()){
			
			
						/*----Preinvoice------*/
						$gen_code= $id;
						
						$perinvoice=new PerInvoice;
						$perinvoice->gen_id=$gen_code;
						$perinvoice->ticket_id=$model->bot_id;
						$perinvoice->type="B";
						$perinvoice->invoice_status="N";
						$perinvoice->table_no=$model->table_no;
						$perinvoice->steward_id=$model->steward_id;
						$perinvoice->save();
						/*----Preinvoice END------*/
			$someObject=$this->getcookie();
			$this->auItems($someObject,$model->bot_id);
			MainData::Del_All_Cookie('restitems');
			
			
			
			Yii::app()->user->setFlash('success', "<script>
													window.onload = function gos()
													{
														document.getElementById('message-title').innerHTML= 'Success' ;
														document.getElementById('message-body').innerHTML= 'Successfully Added !!' ;
														$('#myModal').modal('show');
													
													}</script>");
													
				$this->redirect(array('invoice/preview','id'=>$perinvoice->gen_id));
			}
			
				
		}

		$this->render('form',array(
			'model'=>$model,'action'=>'create','cc'=>$cc,'ex'=>$ex,'tables'=>$tables,'rooms'=>$rooms,'stewards'=>$stewards
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

		if(isset($_POST['Bot']))
		{
			$model->attributes=$_POST['Bot'];
			 if($model->save())
			{  	
				$someObject=$this->getcookie();

				$this->auItems($someObject,$model->bot_id);
				
				MainData::Del_All_Cookie('baritems');
			}
		}

		$this->render('form',array(
			'model'=>$model,'action'=>'update'
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
		$model=new Bot;
		$searchmodel=new Bot('search');
		$action = 'Update';
		
		
		
		$this->render('index',array(
			'model'=>$model,'searchmodel'=>$searchmodel,'action'=>$action
		));
	}

	
	public function actionVolumes($Bid,$Volu)
	{
		
		$volArray = array();
		
		$volumes= MainData::Volumes($Bid);
		
		
		foreach($volumes as $volume)
		{
			foreach($volume as $vol => $vol_value)
			{
				if($vol_value>0){
				//echo "Key=" . $vol . ", ";
				$vol=trim($vol,"price_");
				array_push($volArray,$vol);
				
				}
			}
		
		}

		$this->renderPartial('volumes', array('volumes'=>$volArray,'selectvol'=>$Volu));
		
		Yii::app()->end();

	}
	/**
	 * Manages all models.
	 */
	 
	public function getcookie()
	{
		$str_JSON='[';
			$this->itm_count=0;
				foreach ($_COOKIE as $key=>$val)
				{ 
					//echo $val;
				   
				   if (strpos($key,'baritems') !== false)
					{
						
						$str_JSON=$str_JSON.$val.',';
						$this->itm_count++;
					}
				}
			//	echo $ing_count;
			$str_JSON=substr($str_JSON, 0, -1);
			$str_JSON=$str_JSON.']';
			
			
			$someObject = json_decode($str_JSON);
		
		return $someObject;

	}
	
	public function auItems($someObject,$bot_id)
	{				
					echo $this->itm_count ."-".$bot_id."<br/>";
					
					
				
					$sql = "SELECT * FROM bot_detail WHERE bot_id=".$bot_id;
					
					$data_Items = Yii::app()->db->createCommand($sql)->queryAll();
					
					for($i=0; $i<$this->itm_count ; $i++ )
 
					{
						$someObject[$i]->volume=trim($someObject[$i]->volume,"ml");
						
						foreach ($data_Items as $row)
						{
							 //echo $row['bar_item_id'].":".$row['volume'].":".$row['qty']."<br/>";
							//echo $someObject[$i]->id.":".$someObject[$i]->volume.":".$someObject[$i]->qty."<br/> <br/>";
							if($row['bar_item_id']==$someObject[$i]->id &&  $row['volume']==$someObject[$i]->volume)
							{
								
								//$BotDetail=$this->load_detailModel($row['detail_id']);
								// echo $row['bot_id'].":".$row['res_item_id'].":".$row['portion']":".$row['qty']."<br/>";
								 //echo $someObject[$i]->id.":".$someObject[$i]->volume.":".$someObject[$i]->qty."<br/> <br/>";
								
							BotDetail::model()->updateByPk($row['detail_id'],array("qty"=>$someObject[$i]->qty,"volume"=>$someObject[$i]->volume));
								continue 2;
							}
							
						}
								//echo 'NEW <br/>';
								//echo $row['detail_id'].":".$someObject[$i]->qtyL."<br/>";
							 	$BotDetail = new BotDetail();
					
								$BotDetail->bot_id= $bot_id;
								$BotDetail->bar_item_id=$someObject[$i]->id;
								
								
								//echo $vol;
								//exit();
								$BotDetail->volume=$someObject[$i]->volume;
								$BotDetail->qty=$someObject[$i]->qty;
								$BotDetail->save();
							//	echo $BotDetail->bot_id.':'.$BotDetail->bar_item_id.':'.$BotDetail->volume.':'.$BotDetail->qty."<br/>";

					
					}
					
		
	}
	 
	public function actionAdmin()
	{
		$model=new Bot('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Bot']))
			$model->attributes=$_GET['Bot'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Bot the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Bot::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Bot $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bot-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
