<?php

class RoomController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','Pricesave','room_a','room_d'),
				'roles'=>array('Admin','Manager'),
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
		$model=new Room;
		$searchmodel=new Room('search');
		
		if(isset($_GET['Room']))
		$model->attributes=$_GET['Room'];
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Room']))
		{
			$model->attributes=$_POST['Room'];
			if($model->save()){
					Yii::app()->user->setFlash('success', "<script>
													window.onload = function gos()
													{
														document.getElementById('message-title').innerHTML= 'Success' ;
														document.getElementById('message-body').innerHTML= 'Room successfully added !!' ;
														$('#myModal').modal('show');
													
													}</script>");
			$this->redirect(array('create','id'=>$model->room_no));}
		}
		
		
		
		$this->render('create',array(
			'model'=>$model,'searchmodel'=>$searchmodel
		));
	}
	
	public function actionPricesave(){
		//echo "okay";
		//echo $_POST['id'];
		//$_POST['id']= 1;
		//$_POST['rPrice'] = 2500;
		 // exit();
		if( $_POST['id'] == "1"){
			
			 $cat = RoomType::model()->findByPk($_POST['id']);
				$cat->price = $_POST['rPrice'];
			$cat->save();
				//echo "ado3";
			
			
			echo "Success";
			
		}
		else if( $_POST['id'] == "2"){
		
			$cat = RoomType::model()->findByPk($_POST['id']);
			$cat->price = $_POST['rPrice'];
			$cat->save();
			echo "Success";
			
		}else if( $_POST['id'] == "3"){
		
			$cat = RoomType::model()->findByPk($_POST['id']);
			$cat->price = $_POST['rPrice'];
			$cat->save();
			echo "Success";
			
		}else if( $_POST['id'] == "4"){
			
		$cat = RoomType::model()->findByPk($_POST['id']);
			$cat->price = $_POST['rPrice'];
			$cat->save();
			echo "Success";
			
		}else 
			echo "unsuccess";
		
	}
	
	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		//$model=new KitchenIngrediants;
		$searchmodel=new Room('search');
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);
		$action = 'Update';
		

		if(isset($_POST['Room']))
		{
			$model->attributes=$_POST['Room'];
			if($model->save()){
					Yii::app()->user->setFlash('success', "<script>
													window.onload = function gos()
													{
														document.getElementById('message-title').innerHTML= 'Success' ;
														document.getElementById('message-body').innerHTML= 'Room successfully updated !!' ;
														$('#myModal').modal('show');
													
													}</script>");
			$this->redirect(array('create'));}
		}
		if(isset($_GET['Room']))
			$model->attributes=$_GET['Room'];
		
		
		$this->render('create',array(
			'model'=>$model,'searchmodel'=>$searchmodel,'action'=>$action
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
		$dataProvider=new CActiveDataProvider('Room');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Room('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Room']))
			$model->attributes=$_GET['Room'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionRoom_a($id)
    {
		
		
		Room::model()->updateByPk($id, array('availability' =>'Y'));
		 $this->redirect(array('room/create'));
	}
	
	public function actionRoom_d($id)
    {
		//exit($id);
		Room::model()->updateByPk($id, array('availability' =>'N'));
		$this->redirect(array('room/create'));
	}
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Room the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Room::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Room $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='room-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
