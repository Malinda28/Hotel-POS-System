<?php
/* @var $this RestaurantItemsController */
/* @var $model Restaurant_items */

$this->breadcrumbs=array(
	'Restaurant Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Restaurant_items', 'url'=>array('index')),
	array('label'=>'Manage Restaurant_items', 'url'=>array('admin')),
);
?>

<style>
.breadcrumbs{
	float: right;
	
}</style>
<section class="content-header">
   
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
		
	<?php endif?>
	<h1>Restaurant Items</h1>
</section>


<section class="content">

<div class="row">
<div class="col-xs-12">
        <?php if(Yii::app()->user->hasFlash('success')):{?>
 <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
		<?php echo Yii::app()->user->getFlash('success');} ?>
              </div>
<?php endif; ?>
   </div>
   </div>
<div class="row">
<?php $this->renderPartial('_form', array('model'=>$model,'action'=>$action)); ?>
</div>

<div class="row">
<?php $this->renderPartial('_data', array('model'=>$model,'searchmodel'=>$searchmodel,)); ?>
</div>
</section>