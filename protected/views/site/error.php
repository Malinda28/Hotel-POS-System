<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<section class="content">
      <div class="error-page">
        <h2 class="headline text-red"><?php echo $code; ?></h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i>Oops! Something went wrong.</h3>

          <p><?php //echo CHtml::encode($message); ?>
            We could not find the page you were looking for.
            Meanwhile, you may return to <?php  if (Yii::app()->user->isGuest){echo'<a href="'.Yii::app()->createUrl('/dashboard').'">Login</a>';}else{echo '<a href="'.Yii::app()->createUrl('/dashboard').'">dashboard</a>';}?>
          </p>

          
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>

<style>
h2{
    margin-top: -10px;
}
.error-page{    margin-top: 70px;}
</style>	