<?php
//use yii\bootstrap\Modal;
/* @var $this yii\web\View */

$title = 'Dashboard';
?>

<section class="content-header">
   
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
		
	<?php endif?>
	<h1><?=$title?></h1>
</section>
<section class="content">

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box --><a href="#sss" >
          <div class="small-box bg-aqua">
		  
            <div class="inner">
               <h4>Cereate</h4>
			   <h3> KOT</h3>

             
            </div>
			
            <div class="icon">
              <i class="fa fa-ticket"></i>
            </div>
            <div  class="small-box-footer"><i class="fa  fa-arrow-circle-right"></i></div>
          </div></a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box --><a href="#" class="small-box-footer">
		  <div class="small-box bg-yellow">
          
            <div class="inner">
              <h4>Cereate</h4>
			   <h3>BOT</h3>
            </div>
            <div class="icon">
              <i class="fa fa-ticket"></i>
            </div>
            <div  class="small-box-footer"><i class="fa   fa-arrow-circle-right"></i></div>
          </div></a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box --><a href="#" >
           <div class="small-box bg-red">
            <div class="inner">
             <h4>Room</h4>
			   <h3>Reservation</h3>

            </div>
            <div class="icon">
              <i class="fa fa-bed"></i>
            </div>
           <div  class="small-box-footer"><i class="fa   fa-arrow-circle-right"></i></div>
          </div></a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box --><a href="#" class="small-box-footer">
		  <div class="small-box bg-green">
         
            <div class="inner">
			    <h4>Cereate</h4>
              <h3>Invoice</h3>

            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <div  class="small-box-footer"><i class="fa  fa-arrow-circle-right"></i></div>
          </div></a>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Current Customers - Restaurant</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Table No</th>
                  <th>No. of KOTs</th>
                  <th>No. of BOTs</th>
				  <th>Oreder Numbers</th>
				   <th>Total Amount(Rs.)</th>
				   
                  <th>Tools</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>1</td>
                  <td>2</td>
                   <td><span class="label label-info">102</span> <span class="label label-warning">10</span> <span class="label label-warning">15</span></td>
                 <td>2000.00</td>
				  <td>
				  
				  <button type="button" class="btn btn-default btn-sm btn-warning"><i class="fa fa-ticket"> BOT</i></button>
                  <button type="button" class="btn btn-default btn-sm btn-info"><i class="fa fa-ticket"> KOT</i></button>
				  <button type="button" class="btn btn-default btn-sm btn-success "><i class="fa fa-file-text"><b></b></i></button>
                </td>
                
                <!-- /.btn-group -->
                </tr>
                 <tr>
                  <td>183</td>
                  <td>1</td>
                  <td>2</td>
                  
				  <td><span class="label label-info">102</span> <span class="label label-warning">10</span> <span class="label label-warning">15</span></td>
                  <td>2000.00</td>
				    <td>
				  
				  <button type="button" class="btn btn-default btn-sm btn-warning"><i class="fa fa-ticket"> BOT</i></button>
                  <button type="button" class="btn btn-default btn-sm btn-info"><i class="fa fa-ticket"> KOT</i></button>
				  <button type="button" class="btn btn-default btn-sm btn-success "><i class="fa fa-file-text"></i></button>
                </td>
                </tr>
                 <tr>
                  <td>183</td>
                  <td>1</td>
                  <td>2</td>
                  <td><span class="label label-info">102</span> <span class="label label-warning">10</span> <span class="label label-warning">15</span></td>
                 <td>2000.00</td>
				   <td>
				  
				  <button type="button" class="btn btn-default btn-sm btn-warning"><i class="fa fa-ticket"> BOT</i></button>
                  <button type="button" class="btn btn-default btn-sm btn-info"><i class="fa fa-ticket"> KOT</i></button>
				  <button type="button" class="btn btn-default btn-sm btn-success "><i class="fa fa-file-text"></i></button>
                </td>
                </tr>
                 <tr>
                  <td>183</td>
                  <td>1</td>
                  <td>2</td>
                   <td><span class="label label-info">102</span> <span class="label label-warning">10</span> <span class="label label-warning">15</span></td>
                 <td>2000.00</td>
				   <td>
				  
				  <button type="button" class="btn btn-default btn-sm btn-warning"><i class="fa fa-ticket"> BOT</i></button>
                  <button type="button" class="btn btn-default btn-sm btn-info"><i class="fa fa-ticket"> KOT</i></button>
				  <button type="button" class="btn btn-default btn-sm btn-success "><i class="fa fa-file-text"></i></button>
                </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>    

  <div class="row">
  
        <div class="col-xs-12">
          <div class="box box-success">
		  
            <div class="box-header">
              <h3 class="box-title">Current Customers - Rooms</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Table No</th>
                  <th>No. of KOTs</th>
                  <th>No. of BOTs</th>
				  <th>Oreder Numbers</th>
				   <th>Total Amount(Rs.)</th>
				   
                  <th>Tools</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>1</td>
                  <td>2</td>
                   <td><span class="label label-info">102</span> <span class="label label-warning">10</span> <span class="label label-warning">15</span></td>
                 <td>2000.00</td>
				  <td>
				  
				  <button type="button" class="btn btn-default btn-sm btn-warning"><i class="fa fa-ticket"> BOT</i></button>
                  <button type="button" class="btn btn-default btn-sm btn-info"><i class="fa fa-ticket"> KOT</i></button>
				  <button type="button" class="btn btn-default btn-sm btn-success "><i class="fa fa-file-text"><b></b></i></button>
                </td>
                
                <!-- /.btn-group -->
                </tr>
                 <tr>
                  <td>183</td>
                  <td>1</td>
                  <td>2</td>
                  
				  <td><span class="label label-info">102</span> <span class="label label-warning">10</span> <span class="label label-warning">15</span></td>
                  <td>2000.00</td>
				    <td>
				  
				  <button type="button" class="btn btn-default btn-sm btn-warning"><i class="fa fa-ticket"> BOT</i></button>
                  <button type="button" class="btn btn-default btn-sm btn-info"><i class="fa fa-ticket"> KOT</i></button>
				  <button type="button" class="btn btn-default btn-sm btn-success "><i class="fa fa-file-text"></i></button>
                </td>
                </tr>
                 <tr>
                  <td>183</td>
                  <td>1</td>
                  <td>2</td>
                  <td><span class="label label-info">102</span> <span class="label label-warning">10</span> <span class="label label-warning">15</span></td>
                 <td>2000.00</td>
				   <td>
				  
				  <button type="button" class="btn btn-default btn-sm btn-warning"><i class="fa fa-ticket"> BOT</i></button>
                  <button type="button" class="btn btn-default btn-sm btn-info"><i class="fa fa-ticket"> KOT</i></button>
				  <button type="button" class="btn btn-default btn-sm btn-success "><i class="fa fa-file-text"></i></button>
                </td>
                </tr>
                 <tr>
                  <td>183</td>
                  <td>1</td>
                  <td>2</td>
                   <td><span class="label label-info">102</span> <span class="label label-warning">10</span> <span class="label label-warning">15</span></td>
                 <td>2000.00</td>
				   <td>
				  
				  <button type="button" class="btn btn-default btn-sm btn-warning"><i class="fa fa-ticket"> BOT</i></button>
                  <button type="button" class="btn btn-default btn-sm btn-info"><i class="fa fa-ticket"> KOT</i></button>
				  <button type="button" class="btn btn-default btn-sm btn-success "><i class="fa fa-file-text"></i></button>
                </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>    


	<!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-xs-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

         
    
        </section>
        
      </div>
	  
</section>	
      <!-- /.row (main row) -->

  
    <!-- /.content -->

  