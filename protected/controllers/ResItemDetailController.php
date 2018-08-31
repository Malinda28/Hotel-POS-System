<?php

class ResItemDetailController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('create','update','ingredients_details'),
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
	 
	public function actionIngredients_details($id)
	{
		//exit();
		$model=new ResItemDetail;
		$item=new Restaurant_items;
		
		
		if(isset($_POST['ResItemDetail']))
		{
			
			echo ResItemDetail->item_id;
			//exit();
			$str_JSON='[';
			$ing_count=0;
				foreach ($_COOKIE as $key=>$val)
				{ 
				
				   
				   if (strpos($key,'ingredient') !== false)
					{
					
						$str_JSON=$str_JSON.$val.',';
						$ing_count++;
					}
				}
			$str_JSON=substr($str_JSON, 0, -1);
			$str_JSON=$str_JSON.']';
			//$str_JSON='[{"name":"Carrotw","id":"1","qty":"2","unit":"g"},{"name":"Leaks","id":"8","qty":"32","unit":"g"}]';
			//echo $str_JSON;
			$someObject = json_decode($str_JSON);
					//echo $someObject[0]->id.":". $someObject[0]->qty."<br/>"; 
					//echo $someObject[1]->id.":". $someObject[1]->qty;
					//echo $someObject[2]->name; */
			
			  for($i=0; $i<=$ing_count-1 ; $i++ )
				{
					/* print_r($_POST['InvoiceDetail'][$i]);
					
					$checkfee = new InvoiceDetail();
					$checkfee ->attributes=$_POST['InvoiceDetail'][$i];
					$checkfee->Invoice_No=$model->Invoice_No;
					$checkfee->Paid_fee_type=$value; */
					echo $someObject[$i]->id.":". $someObject[$i]->qty."<br/>"; 
					//$checkfee->save();	
					
				} 		 

		}
			$this->render('itemdetails',array(
			'model'=>$model,'id'=>$id,'item'=>$this->loadModel($id),
			));
		
		
	}
	 
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
		$model=new ResItemDetail;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ResItemDetail']))
		{
			$model->attributes=$_POST['ResItemDetail'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->detail_id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['ResItemDetail']))
		{
			$model->attributes=$_POST['ResItemDetail'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->detail_id));
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
		$dataProvider=new CActiveDataProvider('ResItemDetail');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ResItemDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ResItemDetail']))
			$model->attributes=$_GET['ResItemDetail'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ResItemDetail the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		//$model=ResItemDetail::model()->findByPk($id);
		
		$model=Restaurant_items::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ResItemDetail $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='res-item-detail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
