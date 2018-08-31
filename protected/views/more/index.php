<?php
/* @var $this MoreController */

$this->breadcrumbs=array(
	'More',
);
?>
<!-- <h1><?php echo $this->id . '/' . $this->action->id; ?></h1>-->


	<section class="content">
	
	 <div class="row">
	
	  <div class="col-md-4">
	  
	   <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Table Category</h3>
            </div>
			
			
              <div class="box-body">
			<form action="<?php echo Yii::app()->createUrl('/more/Table') ?>" method="post" onsubmit = "return validationTable()">
			   
			<div class="form-group">
			
			<label for="name">Table No </label>
                    <input type="number" class="form-control"  min="1" max="100" id = "tname" name="number">
					<span class = 'errorMessage' id="terror"></span>
			</div>
			
				   

                <input type="submit" class="btn btn-success pull-right"  value ="ADD" >
				
            
                   
             
			 
			</div>
			</form>
			<div class="box-header">
			  <h3 class="box-title">Manage Tables<?//=$action ?></h3>
			  </div>
			  <div class="direct-chat-messages">
			<table id="customer_table" class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr><th>Table No</th>
							<th>Availability</th>
							
                                 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1 = "SELECT * FROM res_table";
                            //$resultList = mysqli_query($connection->getConnection(), $userList);
							$data1 = Yii::app()->db->createCommand($sql1)->queryAll();
                            //while ($row1 = mysqli_fetch_array($data1)) 
							 foreach ($data1 as $row1)
								{
                                ?>
                                <tr>
                                    <td>Table  <?php echo $row1['number']; ?></td>
									
									<td > <?php 
									
									if($row1['availability']=="Y")
										
									{
										echo CHtml::link("<span class = 'label-success label'> Available</span>",array('more/table_d',
                                         'id'=>$row1['number'] ));
										 
                                     
										} 
									else {echo CHtml::link("<span class = 'label-danger label'> Not Available</span>",array('more/table_a',
                                         'id'=>$row1['number'] ));
									
									}?></td>
                   
									
                                </tr>
								
								
								
                            <?php }
                            ?>
                        </tbody>
                    </table>
					</div>
			
			
			
			</div>
			
			
	  </div>
	  
	   <div class="col-md-4">
	  
	   <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"> Restuarant Menu Category </h3>
            </div>
			
			
              <div class="box-body">
			   
			<form name = "form1" action="<?php echo Yii::app()->createUrl('/more/Kcategory')?>" method="post" onsubmit = "return validationKitchen()">
			
			<div class="form-group">
			
			<label for="KitchenCategoryName">Category Name</label>
                    <input type="text" class="form-control" id = "KitchenCategoryName" name="category">
					<span class = 'errorMessage' id="kerror"></span>
			</div>
				   
				    
                <input type="submit" class="btn btn-success pull-right"  value ="ADD">
				
       
			</div>
			</form>
			
			<div class="box-header">
			  <h3 class="box-title">Manage Kitchen Categories<?//=$action ?></h3>
			  </div>
			  <div class="direct-chat-messages">
			<table id="customer_table" class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr><th>ID</th>
							<th>Category</th>
							<th>Availability</th>
							<th>Tools</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1 = "SELECT * FROM res_item_category";
                            //$resultList = mysqli_query($connection->getConnection(), $userList);
							$data1 = Yii::app()->db->createCommand($sql1)->queryAll();
                            //while ($row1 = mysqli_fetch_array($data1)) 
							 foreach ($data1 as $row1)
								{
                                ?>
                                
                                    <td><?php echo $row1['id']; ?></td>
									<td><label class = 'lable-success'> <?php echo $row1['category'];?></label></td>
									<td >
									<?php 
									if($row1['status']=="Y")
										
									{
										echo CHtml::link("<span class = 'label-success label'> Available</span>",array('more/Item_d',
                                         'id'=>$row1['id'] ));
										 
                                     
										} 
									else {echo CHtml::link("<span class = 'label-danger label'> Not Available</span>",array('more/Item_a',
                                         'id'=>$row1['id'] ));
									
									}?></td>
				   
									<td><button type = "submit" class="btn btn-default btn-sm btn-success" onclick="editRestCat('<?php echo $row1['id'];?>','<?php echo $row1['category'];?>')"><i class="fa fa-pencil"></i></button>
									</td>
				    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
			</div>
			</div>

	  </div>
	  
	   <div class="col-md-4">
	  
	   <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Item Category</h3>
            </div>
			
			
              <div class="box-body">
			   
			<form action="<?php echo Yii::app()->createUrl('/more/Bcategory') ?>" method="post" onsubmit = "return validationBar()">
			
			<div class="form-group">
			
			<label for="BarCategory">Category Name</label>
                    <input type="text" class="form-control" id = "BarCategory" name="name">
					<span class = 'errorMessage' id="berror"></span>
			</div>
			    
                <input type="submit" class="btn btn-success pull-right" value ="ADD">
			
			</div>
			</form>
			
			<div class="box-header">
			  <h3 class="box-title">Manage Bar Categories<?//=$action ?></h3>
			  </div>
			  <div class="direct-chat-messages">
			<table id="customer_table" class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr><th>ID</th>
							<th>Category</th>
							<th>Availability</th>
							<th>Tools</th>
							
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1 = "SELECT * FROM bar_item_category";
                            //$resultList = mysqli_query($connection->getConnection(), $userList);
							$data1 = Yii::app()->db->createCommand($sql1)->queryAll();
                            //while ($row1 = mysqli_fetch_array($data1)) 
							 foreach ($data1 as $row1)
								{
                                ?>
                                
                                    <td><?php echo $row1['bcat_id']; ?></td>
									<td><label class = 'lable-success'> <?php echo $row1['b_category'];?></label></td>
									<td >
									<?php 
									if($row1['status']=="Y")
										
									{
										echo CHtml::link("<span class = 'label-success label'> Available</span>",array('more/Bar_d',
                                         'id'=>$row1['bcat_id'] ));
										 
                                     
										} 
									else {echo CHtml::link("<span class = 'label-danger label'> Not Available</span>",array('more/Bar_a',
                                         'id'=>$row1['bcat_id'] ));
									
									}?></td>
				   
									<td><button type = "submit" class="btn btn-default btn-sm btn-success" onclick="editBarCat('<?php echo $row1['bcat_id'];?>','<?php echo $row1['b_category'];?>')"><i class="fa fa-pencil"></i></button>
									</td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
			</div>
			</div>
			
			
			
			
			
	  </div>
	  
	  
	
	 
	 </div>
	 
	 <div class="modal fade box-success" id="itemadd" role="dialog">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="Ititle"></h4>
        </div>
        <div class="modal-body">
			<form name="QtyForm"  >
			<span class="text-red" Id="errorMessage"></span>
					<div class="row" id="Value_Raw">
			
							<div class="col-xs-6">	
								<label>Category</label>
							</div>
							<div class="col-xs-6">
								
								<input type="text" class="form-control input-sm required" id="cat_name">	
								
							</div>
					</div>
					
					
			</form>		
        </div>
        <div id = "footer" class="modal-footer" >
          <button id = "saveDataButton" type="button" class="btn btn-success"  onclick="saveData()">Add</button>
        </div>
      </div>
   </div>
 </div>
 
  <div class="modal fade box-success" id="itemdelete" role="dialog">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="Ititle2"></h4>
        </div>
        <div class="modal-body">
			<form name="QtyForm"  >
			<span class="text-red" Id="errorMessage"></span>
					<div class="row" id="Value_Raw">
					
							<div class="col-xs-6">	
								<label>Table No</label>
							</div>
							<div class="col-xs-6">
								
								<input type="text" class="form-control input-sm required" id="cat_no">	
								
							</div>
			
					</div>
					
					
			</form>		
        </div>
        <div id = "footer" class="modal-footer" >
          <button id = "deleteDataButton" type="button" class="btn btn-success"  onclick="deleteData()">Delete</button>
        </div>
      </div>
   </div>
 </div>
 
	 </section>
	
<script>	
function editRestCat(catId, catName){
	document.getElementById("Value_Raw").style.display = "block";
	//alert(catName);
	$('#itemadd').modal('show');
	document.getElementById("Ititle").innerHTML='Kitchen Category';
	document.getElementById("cat_name").value=catName;
	document.getElementById("saveDataButton").setAttribute("onclick", "saveData('"+catId+"','K')");
	
}
function editBarCat(catId, catName){
	document.getElementById("Value_Raw").style.display = "block";
	$('#itemadd').modal('show');
	document.getElementById("Ititle").innerHTML='Bar Category';
	document.getElementById("cat_name").value=catName; 
	document.getElementById("saveDataButton").setAttribute("onclick", "saveData('"+catId+"','B')");
	
}

function deleteTableNo(TableNo){
	
	$('#itemdelete').modal('show');
	//document.getElementById("Ititle2").innerHTML='Are you sure delete this table no';
	document.getElementById("cat_no").value = TableNo; 
	document.getElementById("deleteDataButton").setAttribute("onclick", "deleteData('"+TableNo+"')");
}



function saveData(catId, type){
	
	cname = document.getElementById("cat_name").value;
	//alert(cname);
	//return false;
	$.ajax({
   url:'<?php echo Yii::app()->createUrl('/more/Datasave') ?>',
   type:"POST",
   data: {cname:cname, id:catId, type:type},
   success:function(cus){
	showMessages(cus);
	//cus.forEach
	//alert(cus);
   },
   
  // dataType:"json"
	});
	
}

function deleteData(TableNo){
	id = document.getElementById("cat_no").value;
	$.ajax({
   url:'<?php echo Yii::app()->createUrl('/more/Datadelete') ?>',
   
   type:"POST",
   data: {id:id},
   success:function(cus){
	showMessages(cus);
	//cus.forEach
	//alert(cus);
   },
   
  // dataType:"json"
	});
	
	
}

function showMessages(message){
	if(message == "Success"){
	document.getElementById("Value_Raw").style.display = "none";
	document.getElementById("footer").style.display = "none";
	document.getElementById("Ititle").innerHTML='success';
	
	setTimeout('Redirect()', 1000);}
	else{
		document.getElementById("Value_Raw").style.display = "none";
	document.getElementById("Ititle").innerHTML='Error';
	document.getElementById("footer").style.display = "none";
	}
	
}
//validations
function validationTable(){
	var x = document.getElementById('tname').value;
	if (x == ""){
		document.getElementById('terror').innerHTML = "Table number could not be blanked";
		return false;
		}
	
}

function validationKitchen(){
	
	var x = document.getElementById('KitchenCategoryName').value;
	
	if (x == ""){
		document.getElementById('kerror').innerHTML = "category could not be blanked";
		return false;
		
		}
	
}

function validationBar(){
	
	var x = document.getElementById('BarCategory').value;
	
	if (x == ""){
		document.getElementById('berror').innerHTML = "category could not be blanked";
		return false;
		
		}
	
}

function checkAvailability(){
	
}

 function Redirect() {
               window.location="<?php echo Yii::app()->createUrl('more/index') ?>";
            }
            
</script>