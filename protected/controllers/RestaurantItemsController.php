<?php

class RestaurantItemsController extends Controller
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
	public function actionIndex()
	{
		$model=new Restaurant_items;
		$searchmodel=new Restaurant_items('search');
		$action = 'Create';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_GET['Restaurant_items']))
			$model->attributes=$_GET['Restaurant_items'];
		
		if(isset($_POST['Restaurant_items']))
		{
			
			$model->attributes=$_POST['Restaurant_items'];
			if($model->save()){
					Yii::app()->user->setFlash('success', "<script>
													window.onload = function gos()
													{
														document.getElementById('message-title').innerHTML= 'Success' ;
														document.getElementById('message-body').innerHTML= 'Menu item successfully added !!' ;
														$('#myModal').modal('show');
													
													}</script>");
			$this->redirect(array('Ingredients_details','id'=>$model->res_item_id));}
		}

		
		
		$this->render('index',array(
			'model'=>$model,'searchmodel'=>$searchmodel, 'action'=>$action
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		
		MainData::Ing_Cookies($id);
		$searchmodel=new Restaurant_items('search');
		//exit();
				
		$model=$this->loadModel($id);
		$action = 'Update';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Restaurant_items']))
		{
			$model->attributes=$_POST['Restaurant_items'];
			if($model->save()){
					Yii::app()->user->setFlash('success', "<script>
													window.onload = function gos()
													{
														document.getElementById('message-title').innerHTML= 'Success' ;
														document.getElementById('message-body').innerHTML= 'Menu item successfully updated !!' ;
														$('#myModal').modal('show');
													
													}</script>");
			$this->redirect(array('index'));}
		}
		if(isset($_GET['Restaurant_items']))
			$model->attributes=$_GET['Restaurant_items'];
		
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

	public function actionIngredients_details($id)
	{
		
		$model=new ResItemDetail;
		$item=new Restaurant_items;
		
	
		if(isset($_POST['ResItemDetail']))
		{		//$item->res_item_id=$id;
			$model->attributes=$_POST['ResItemDetail'];
			
			//$i_id=$item->res_item_id;
			//echo $i_id;
			//echo $model->res_item_id;
			//exit();
			$str_JSON='[';
			$ing_count=0;
				foreach ($_COOKIE as $key=>$val)
				{ 
					//echo $val;
				   
				   if (strpos($key,'ingredient') !== false)
					{
					
						$str_JSON=$str_JSON.$val.',';
						$ing_count++;
					}
				}
			//	echo $ing_count;
			$str_JSON=substr($str_JSON, 0, -1);
			$str_JSON=$str_JSON.']';
			//$str_JSON='[{"name":"Carrotw","id":"1","qty":"2","unit":"g"},{"name":"Leaks","id":"8","qty":"32","unit":"g"}]';
			//echo $str_JSON;
			$someObject = json_decode($str_JSON);
				//	echo $someObject[0]->id.":". $someObject[0]->qtyR."<br/>"; 
					//echo $someObject[1]->id.":". $someObject[1]->qty;
					//echo $someObject[2]->name; */
			$this->auIngredients($someObject,$model->res_item_id,$ing_count);
			//  for($i=0; $i<=$ing_count -1 ; $i++ )
			//	{
					//print_r($_POST['InvoiceDetail'][$i]);
					
					/* $ResItemDetail = new ResItemDetail();
					
					$ResItemDetail->res_item_id= $model->res_item_id;
					$ResItemDetail->ingrediant_id=$someObject[$i]->id;
					$ResItemDetail->regular_qty=$someObject[$i]->qtyR;
					
					$ResItemDetail->large_qty=$someObject[$i]->qtyL;
					
					//	echo $someObject[$i]->id.":". $someObject[$i]->qtyR."<br/>"; 
					$ResItemDetail->save();	 */
					//$this->auIngredients($model->res_item_id,$someObject[$i]->id,$someObject[$i]->qtyR,$someObject[$i]->qtyL);
					
					
				//} 		 
				$this->redirect(array('view','id'=>$model->res_item_id));
		}
		
			$this->render('itemdetails',array(
			'model'=>$model,'id'=>$id,'item'=>$this->loadModel($id),
			));
		
		
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex1()
	{
		$dataProvider=new CActiveDataProvider('Restaurant_items');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Restaurant_items('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Restaurant_items']))
			$model->attributes=$_GET['Restaurant_items'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Restaurant_items the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Restaurant_items::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function load_detailModel($id)
	{
		$model=ResItemDetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	//public function auIngredients($res_item_id,$ingr_id,$qtyR,$qtyL)
	public function auIngredients($someObject,$res_item_id,$ing_count)
	
	{
					$sql = "SELECT * FROM res_item_detail WHERE res_item_id=".$res_item_id;
					
					$data_Ingredients = Yii::app()->db->createCommand($sql)->queryAll();
					
					for($i=0; $i<=$ing_count -1 ; $i++ )
 
					{
						 
						
						
						foreach ($data_Ingredients as $row)
						{
							if($row['ingrediant_id']==$someObject[$i]->id)
							{
								$ResItemDetail=$this->load_detailModel($row['detail_id']);
								
								//echo $row['detail_id'].":".$someObject[$i]->qtyL."<br/>";
							
							ResItemDetail::model()->updateByPk($row['detail_id'],array("regular_qty"=>$someObject[$i]->qtyR,"large_qty"=>$someObject[$i]->qtyL));
								continue 2;
							}
							
						}
								//echo 'NEW <br/>';
								//echo $row['detail_id'].":".$someObject[$i]->qtyL."<br/>";
							 	$ResItemDetail = new ResItemDetail();
					
								$ResItemDetail->res_item_id= $res_item_id;
								$ResItemDetail->ingrediant_id=$someObject[$i]->id;
								$ResItemDetail->regular_qty=$someObject[$i]->qtyR;
					
								$ResItemDetail->large_qty=$someObject[$i]->qtyL;
								
										$ResItemDetail->save();
							
					
					
					}
					
					
					
					
		
	}
	
	/**
	 * Performs the AJAX validation.
	 * @param Restaurant_items $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='restaurant-items-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
