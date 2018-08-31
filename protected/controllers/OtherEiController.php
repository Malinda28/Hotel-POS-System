<?php

class OtherEiController extends Controller
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
		$model=new OtherEi;
		$searchmodel=new OtherEi('search');
		$action = 'Create';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		echo 'dwdw';
		if(isset($_GET['OtherEi']))
			$model->attributes=$_GET['OtherEi'];
		
		if(isset($_POST['OtherEi']))
		{	
			
			$model->attributes=$_POST['OtherEi'];
			if($model->save()){
				Yii::app()->user->setFlash('success', "<script>
													window.onload = function gos()
													{
														document.getElementById('message-title').innerHTML= 'Success' ;
														document.getElementById('message-body').innerHTML= 'Other expenses successfully added !!' ;
														$('#myModal').modal('show');
													
													}</script>");
			$this->redirect(array('index'));}
		}

		$this->render('create',array(
			'model'=>$model,
			'searchmodel'=>$searchmodel, 'action'=>$action
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$searchmodel=new OtherEi('search');
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$action = 'Update';
		if(isset($_POST['OtherEi']))
		{
			$model->attributes=$_POST['OtherEi'];
			if($model->save()){
				Yii::app()->user->setFlash('success', "<script>
													window.onload = function gos()
													{
														document.getElementById('message-title').innerHTML= 'Success' ;
														document.getElementById('message-body').innerHTML= 'Other expenses successfully updated !!' ;
														$('#myModal').modal('show');
													
													}</script>");
			$this->redirect(array('index'));}
		}

		if(isset($_GET['OtherEi']))
			$model->attributes=$_GET['OtherEi'];
		$this->render('index',array(
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
		$model=new OtherEi;
		$searchmodel=new OtherEi('search');
		$action = 'Create';
		if(isset($_POST['OtherEi']))
		{
			$model->attributes=$_POST['OtherEi'];
			if($model->save()){
			Yii::app()->user->setFlash('success', "Successfully updated");
				
		$this->redirect(array('index'));}
		}
		
		$this->render('index',array(
			'model'=>$model,'searchmodel'=>$searchmodel,'action'=>$action
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new OtherEi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OtherEi']))
			$model->attributes=$_GET['OtherEi'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return OtherEi the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=OtherEi::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param OtherEi $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='other-ei-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
