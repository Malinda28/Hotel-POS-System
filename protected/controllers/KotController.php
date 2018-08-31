<?php

class KotController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
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
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','kots'),
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
		//$id=231;
		$model=new Kot;
		$searchmodel=new Kot('search');
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
		$model=new Kot;
		$cc=0;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Kot']))
		{
			$model->attributes=$_POST['Kot'];
			$cc=1;
			if($model->save()){
			
			
						/*----Preinvoice------*/
						$gen_code= "T".Date('YmdHi').$model->table_no;
						
						$perinvoice=new PerInvoice;
						$perinvoice->gen_id=$gen_code;
						$perinvoice->ticket_id=$model->kot_id;
						$perinvoice->type="K";
						$perinvoice->invoice_status="N";
						$perinvoice->table_no=$model->table_no;
						$perinvoice->steward_id=$model->steward_id;
						$perinvoice->save();
						/*----Preinvoice END------*/
			$someObject=$this->getcookie();
			$this->auItems($someObject,$model->kot_id);
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
			'model'=>$model,'action'=>'create','cc'=>$cc
		));
	}

	
	public function actionKots($id)
	{
		$model=new Kot;
		$cc=0;
		$ex=1;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$tables=MainData::tabledata($id);
		$stewards=MainData::stewarddata($id);
		$rooms=MainData::PreInvoiceROOM($id);
		
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
			
			$this->redirect(array('dashboard/index','id'=>$model->kot_id));
		}
		
		if(isset($_POST['Kot']))
		{
			$model->attributes=$_POST['Kot'];
			$cc=1;
			if($model->save()){
			
			
						/*----Preinvoice------*/
						$gen_code= $id;
						
						$perinvoice=new PerInvoice;
						$perinvoice->gen_id=$gen_code;
						$perinvoice->ticket_id=$model->kot_id;
						$perinvoice->type="K";
						$perinvoice->invoice_status="N";
						$perinvoice->table_no=$model->table_no;
						$perinvoice->steward_id=$model->steward_id;
						$perinvoice->save();
						/*----Preinvoice END------*/
			$someObject=$this->getcookie();
			$this->auItems($someObject,$model->kot_id);
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
		$model=new Kot;
		//exit();
		$model=$this->loadModel($id);
		//
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kot']))
		{
			$model->attributes=$_POST['Kot'];
			if($model->save())
			{	$someObject=$this->getcookie();
				$this->auItems($someObject,$model->kot_id);
				MainData::Del_All_Cookie('restitems');
			}
		}

		$this->render('form',array(
			'model'=>$model,'action'=>'update',
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
		
		$model=new Kot;
		$searchmodel=new Kot('search');
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
		$model=new Kot('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kot']))
			$model->attributes=$_GET['Kot'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Kot::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Kot $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kot-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function getcookie()
	{
		$str_JSON='[';
			$this->itm_count=0;
				foreach ($_COOKIE as $key=>$val)
				{ 
					//echo $val;
				   
				   if (strpos($key,'restitems') !== false)
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
	
	public function auItems($someObject,$kot_id)
	{				
					echo $this->itm_count ."-".$kot_id."<br/>";
					
					
				
					$sql = "SELECT * FROM kot_detail WHERE kot_id=".$kot_id;
					
					$data_Items = Yii::app()->db->createCommand($sql)->queryAll();
					
					for($i=0; $i<=$this->itm_count -1 ; $i++ )
 
					{
						 
						foreach ($data_Items as $row)
						{
							if($row['res_item_id']==$someObject[$i]->id)
							{
								
								//$KotDetail=$this->load_detailModel($row['detail_id']);
								// echo $row['kot_id'].":".$row['res_item_id'].":".$row['portion']":".$row['qty']."<br/>";
								 echo $someObject[$i]->id.":".$someObject[$i]->portion.":".$someObject[$i]->qty."<br/>";
							
								KotDetail::model()->updateByPk($row['detail_id'],array("qty"=>$someObject[$i]->qty));
								continue 2;
							}
							
						}
								echo 'NEW <br/>';
								//echo $row['detail_id'].":".$someObject[$i]->qtyL."<br/>";
							 	$KotDetail = new KotDetail();
					
								$KotDetail->kot_id= $kot_id;
								$KotDetail->res_item_id=$someObject[$i]->id;
								$KotDetail->portion=$someObject[$i]->portion;
					
								$KotDetail->qty=$someObject[$i]->qty;
								$KotDetail->save();
						echo $KotDetail->kot_id.':'.$KotDetail->res_item_id.':'.$KotDetail->portion.':'.$KotDetail->qty."<br/>";

					
					}
					
		
	}
	
	
}
