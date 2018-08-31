<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>
<style>#Room_type{display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
border: 1px solid #ccc;}
</style>
<div class="row">
<div class="col-md-12">
	<div class="col-md-6">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Create Rooms</h3>

				</div>

	<div class="box-body ">			
		
		
	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="col-md-6">
	<div class="form-group">
	
	
		<?php echo $form->labelEx($model,'room_no'); ?>
		<?php echo $form->textField($model,'room_no',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'room_no'); ?>
	</div>
	</div>
	
	
	<div class="col-md-6">
				<div class="form-group">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model, 'type',
      array('1' => ' Non A/C Single', '2' => 'A/C Single', '3' => 'Non A/C Double','4' => 'A/C Double',), array('empty' => 'Select a Type'),array('class'=>'form-control'));?>
		<?php echo $form->error($model,'type'); ?>
	</div>
	</div>
	
	
	</div>

<div id = "footer" class="modal-footer" >
<div class="form-group">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('class'=>'btn  btn-success pull-right')); ?>
	</div>
	</div>
<?php $this->endWidget(); ?>
<!-- form -->

</div></div>


<div class="col-md-6">
<div class="box box-success">
		<div class="box-header with-border">
         <h3 class="box-title">Update Price</h3>
		  </div>
		  
			<table id="customer_table" class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr><th>Type</th>
							<th>Content</th>
							<th>Price</th>
							
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1 = "SELECT * FROM room_type";
                            //$resultList = mysqli_query($connection->getConnection(), $userList);
							$data1 = Yii::app()->db->createCommand($sql1)->queryAll();
                            //while ($row1 = mysqli_fetch_array($data1)) 
							 foreach ($data1 as $row1)
								{
                                ?>
                                    <td><?php echo $row1['facility']; ?></td>
									<td><span class = 'label-success label'><?php echo $row1['content'];?></span></td>
									<td><?php echo $row1['price']; ?></td>
				   
									<td><button type = "submit" class="btn btn-default btn-sm btn-success" onclick="editRoomPrice('<?php echo $row1['type_id'];?>','<?php echo $row1['price'];?>')"><i class="fa fa-pencil"></i></button>
									
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
								<label>Price</label>
							</div>
							<div class="col-xs-6">
								
								<input type="text" class="form-control input-sm required" id="roomPrice">	
								
							</div>
					</div>
					
					
			</form>		
        </div>
        <div id = "footer" class="modal-footer" >
          <button id = "saveDataButton" type="button" class="btn btn-success"  onclick="Pricesave()">Add</button>
        </div>
      </div>
   </div>
 </div>


 <script>	
function editRoomPrice(roomId,price){
	document.getElementById("Value_Raw").style.display = "block";
	//alert(catName);
	$('#itemadd').modal('show');
	document.getElementById("Ititle").innerHTML='Edit Price';
	document.getElementById("roomPrice").value=price;
	document.getElementById("saveDataButton").setAttribute("onclick", "saveData('"+roomId+"')");
}

function saveData(roomId){
	
	
	rPrice = document.getElementById("roomPrice").value;
	//alert(cname);
	//return false;
	$.ajax({
   url:'<?php echo Yii::app()->createUrl('/Room/Pricesave') ?>',
   type:"POST",
   data: {rPrice:rPrice, id:roomId},
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

 function Redirect() {
               window.location="<?php echo Yii::app()->createUrl('Room/create') ?>";
            }

</script>