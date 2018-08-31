<?php

class MoreController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionDatasave()
	{ 
		if( $_POST['type'] == "K"){
			
			 $cat = ResCategory::model()->findByPk($_POST['id']);
				$cat->category = $_POST['cname'];
			$cat->save();
				//echo "ado3";
			
			
			echo "Success";
			
		}
		else if( $_POST['type'] == "B"){
			
			
			
			$cat = BarItemCategory::model()->findByPk($_POST['id']);
			$cat->b_category = $_POST['cname'];
			$cat->save();
			echo "Success";
			
		}else 
			echo "unsuccess";
	}
	
	public function actionDatadelete()
	{
	//echo $_POST['id'];		
	if (isset ($_POST['id'])){
	$command = Yii::app()->db->createCommand();
	$command->delete('res_table', 'number=:number', array(':number'=> $_POST['id']));
	echo "Success";
	
	}else 
		echo "unsuccess";

	}
	
	
	public function actionTable()
    {
        $model=new ResTable;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

            $model->number=$_POST['number'];
			$model->availability="N";
            if($model->save()){
				
			Yii::app()->user->setFlash('success', "<script>
             window.onload = function gos()
             {
              document.getElementById('message-title').innerHTML= 'Success' ;
              document.getElementById('message-body').innerHTML= 'Table Number Successfully Added' ;
              $('#myModal').modal('show');
             
             }</script>");
                $this->redirect(array('more/index'));
        }

        $this->render('create',array(
            'model'=>$model,
	));
    
}

	public function actionTable_a($id)
    {
		
		ResTable::model()->updateByPk($id, array('availability' =>'Y'));
		  $this->redirect(array('more/index'));
	}
	
	public function actionTable_d($id)
    {
		//exit($id);
		ResTable::model()->updateByPk($id, array('availability' =>'N'));
		  $this->redirect(array('more/index'));
	}
	public function actionItem_a($id)
    {
		
		ResCategory::model()->updateByPk($id, array('status' =>'Y'));
		  $this->redirect(array('more/index'));
	}
	
	public function actionItem_d($id)
    {
		//exit($id);
		ResCategory::model()->updateByPk($id, array('status' =>'N'));
		  $this->redirect(array('more/index'));
	}
	
	public function actionBar_a($id)
    {
		
		BarItemCategory::model()->updateByPk($id, array('status' =>'Y'));
		  $this->redirect(array('more/index'));
	}
	
	public function actionBar_d($id)
    {
		//exit($id);
		BarItemCategory::model()->updateByPk($id, array('status' =>'N'));
		  $this->redirect(array('more/index'));
	}
	
	
	
	 public function actionKcategory()
    {	echo "okay";
        $model=new ResCategory;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['category']))
        {	echo "inside";
			//echo $_POST['ResCategory'];
            $model->category= $_POST['category'];
            if($model->save()){
				
				Yii::app()->user->setFlash('success', "<script>
             window.onload = function gos()
             {
              document.getElementById('message-title').innerHTML= 'Success' ;
              document.getElementById('message-body').innerHTML= 'Restaurant Category Successfully Added' ;
              $('#myModal').modal('show');
             
             }</script>");
				
			$this->redirect(array('more/index'));}
        }

       
    }

	public function actionBcategory()
    {echo "okay";
        $model=new BarItemCategory;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['name']))
        {	echo $_POST['name'];
            $model->b_category = $_POST['name'];
            if($model->save()){
			Yii::app()->user->setFlash('success', "<script>
             window.onload = function gos()
             {
              document.getElementById('message-title').innerHTML= 'Success' ;
              document.getElementById('message-body').innerHTML= 'Bar Category Successfully Added' ;
              $('#myModal').modal('show');
             
             }</script>");
			$this->redirect(array('more/index'));}
        }

       
    }
	
	
	
	

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	
	
}