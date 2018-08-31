<?php
/* @var $this RestaurantItemsController */
/* @var $model Restaurant_items */
/* @var $form CActiveForm */
MainData::Ing_Cookies($id);
$colspan=2;
//$item->regular_price=3;
//$item->large_price=0;

?>

<style>#Restaurant_items_category{
	display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
}
	   </style>
<section class="content-header" onload="listIngredients()">
   
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
		
	<?php endif?>
	<h1>Restaurant Menu Items</h1>
</section>
<section class="content">
<div class="row">
<div class="col-xs-8">
    <div class="box box-success">
		<div class="box-header with-border">
         <h3 class="box-title">Add Ingredients to <b><?php echo $item->item_name; ?></b></h3>
			
            </div>
			
<div class="box-body " id="box-body">			


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'restaurant-items-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); $model->res_item_id =$item->res_item_id;  
	echo $form->hiddenField($model , 'res_item_id'); 
	
?>

	
			<div class="table-responsive">
                <table class="table table-hover" id="compareul">
                <tr>
				<th>Ingredient</th> 
              
			  <?php if($item->regular_price>0)
					{	
						echo '<th>Qty R</th>';
						$colspan++;
						

					}
					if($item->large_price>0)
					{	
						echo '<th>Qty L</th>';
						$colspan++;
						
					}
			  ?>
			  
                            
               <th>Tools</th>
                </tr>
                <tr>
                  <td colspan="<?php echo $colspan;?>" align="center">No Ingredients selected</td>  
				  
				  
                </tr>
							
				
              </table>
           </div>
	</div>
			
	<div class="box-footer clearfix"  id="box-footer">
		
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn  btn-success pull-right' ,'id'=>'submit_btn')); ?>
	<input type="button" class="btn  btn-success pull-left"  onclick="confirmbox()" id="clear_all_btn" value="Clear Ingredients"/> 
</div>


<?php $this->endWidget(); ?>

	<!-- form -->
	</div>
</div>
	<div class="col-xs-4">
		<?php  $this->renderPartial('_ingrediants'); ?>
	</div>
</div>
</section>

<!-- Modal content-->
 <div class="modal fade box-success" id="popupa" role="dialog">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="Ititle"></h4>
        </div>
        <div class="modal-body">
			<form name="QtyForm"  >
			<span class="text-red" Id="errorMessage"></span>
					<div class="row" id="Regular_row">
			
							<div class="col-xs-6">	
								<label>Qty for Regular</label>
							</div>
							<div class="col-xs-6">
								<div class="input-group">
									<input type="number" class="form-control input-sm" placeholder="Enter Regular Qty" id="Rqty">
										<span class="input-group-addon unit-addon" id="basic-addon2"></span>
										
								</div>
							</div>
					</div>
					
					<div class="row" id="Large_row">	
								<div class="col-xs-6">
									<label>Qty for Large</label>
								</div>
						<div class="col-xs-6">
							<div class="input-group">
								<input type="number" class="form-control input-sm required" placeholder="Enter Large Qty" id="Lqty">
								<span class="input-group-addon unit-addon" id="basic-addon3"></span>
							</div>
						</div>
					</div>
			</form>		
        </div>
        <div class="modal-footer" >
          <button type="button" class="btn btn-success"  onclick="listIngredients()">Add as Ingredient</button>
        </div>
      </div>
   </div>
 </div>
 
 
  <div class="modal fade box-success" id="confirmYN" role="dialog">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <div class="modal-body">
		
			<div class="row">
		 
				<div class="col-xs-12">
					<p>Are you sure you wish to clear all selected Ingredients?</p>
					
				</div>
			</div>
        </div>
        <div class="modal-footer" >
		
         <button type="button" class="btn btn-success " data-dismiss="modal" onclick="clearall()">Yes</button> &nbsp;
		  <button type="button" class="btn btn-success "  data-dismiss="modal">No</button>
					
        </div>
      </div>
   </div>
 </div>


 
<script>
var ItemId=<?php echo $id;?>;
var cols=<?php echo $colspan;?>;
var Id;
var Name; 
var Qty; 
var Unit;
var QtyL=0;
var QtyR=0;
var table = document.getElementById("compareul");
var cell_N;
var cell_R;
var cell_L;
var cell_T;
var row;

window.onload = function cheklist(){
	
	//clearall();
	var cookies = document.cookie.split(";");
	//alert(cookies);
	getcookie();
	//if(Regular_price>0){
	//document.getElementById("Regular_row").style.display = "none";
	//}
}

	function validateQTY()
	{
		
		var L = document.forms["QtyForm"]["LVali"].value;
		
		
		
	}
	
	function addIngredients(id,name,qtyR,qtyL,unit) 
	{
				
			    $('#popupa').modal('show');
                   
                  
				Name=name;
				Id=id;
				Unit=unit;
				
				//alert(name);

				<?php 
				if($item->large_price>0 && $item->regular_price>0)
				{
					echo 'document.getElementById("basic-addon3").innerHTML=unit;
						  document.getElementById("basic-addon2").innerHTML=unit;';
				}
				else if($item->regular_price>0)
				{	echo 'document.getElementById("basic-addon2").innerHTML=unit;
						document.getElementById("Regular_row").style.display = "block";
						document.getElementById("Large_row").style.display = "none";';
				}
				else if($item->large_price>0)
				{
					echo 'document.getElementById("basic-addon3").innerHTML=unit ;
						document.getElementById("Large_row").style.display = "block";
					document.getElementById("Regular_row").style.display = "none";';
				}

				?>
				
				document.getElementById("Ititle").innerHTML= name ;
				//document.getElementById("Iid").value= id ;
				
				if (qtyR!=0){
					document.getElementById("Rqty").value=qtyR;
					
					//alert(qtyR);
				}
				else{
					document.getElementById("Rqty").value='';
					
				}
				
				if (qtyL!=0){
					document.getElementById("Lqty").value= qtyL ;
				}
				else{
					document.getElementById("Lqty").value='';
					
				}
				
				//document.getElementById("basic-addon2").value= unit ;
				//document.getElementById("modal-footer").setAttribute("thisID",id);

	}
				   
	function delrows () {
        
            $("#compareul").find("tr:not(:first)").remove();
        }
    
	function delcookie(Idd)
	{
		
		document.cookie ="ingredient"+Idd+ '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
		 //delete_cookie('cookieObject'+Idd+);

		getcookie();
	}
	
	function clearall()
	{
		var cookies = document.cookie.split(";");
		//alert(cookies);
		for (var i = 0; i < cookies.length; i++) {
		
    	var cookie = cookies[i];
    	var eqPos = cookie.indexOf("=");
		//alert(eqPos);
    	var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
		
		
		if (name.indexOf("ingredient") >= 0)
			{	
				document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:01 GMT";
			}
    	
			}
		  
		//var cookie = document.cookie.split(";");
		  
		getcookie();
		//alert(cookie); 
		
	}

	function confirmbox()
	{
	 $('#confirmYN').modal('show');
		
	}

	function listIngredients()
	{
	
	//alert(Name+" "+Id+" "+Unit );
	QtyL=document.getElementById("Lqty").value;
	QtyR=document.getElementById("Rqty").value;	
	
		<?php 
				if($item->large_price>0 && $item->regular_price>0)
				{
					
					echo' if (QtyL < 0 || QtyL =="" || QtyR < 0 || QtyR =="") 
					{
			
					document.getElementById("errorMessage").innerHTML="<center>Quantity cannot be blank or negetive value</center>";
					return false;
					}';
					
				}
				
				else if($item->regular_price>0)
				{
					
					echo' if(QtyR < 0 || QtyR ==""){
		
					
					document.getElementById("errorMessage").innerHTML="<center>Quantity cannot be blank or negetive value</center>";
					return false;
					}'; 
					
					
					
				}
				
				else if($item->large_price>0)
				{
					
					
					echo' if (QtyL < 0 || QtyL =="") 
					{
						
					 
					document.getElementById("errorMessage").innerHTML="<center>Quantity cannot be blank or negetive value</center>";
					return false;
					}';
					
					
				}
				
		?>
	
	
	$("#popupa").modal("hide");
	document.getElementById("errorMessage").innerHTML="";
	var customObjects = {};

	customObjects.name = Name;
	customObjects.id = Id;
	customObjects.qtyL = QtyL;
	customObjects.qtyR = QtyR;
	customObjects.unit = Unit;
	
	//alert(customObjects.name+","+customObjects.id+","+customObjects.qty);
	var jsonString = JSON.stringify(customObjects);
		
	document.cookie = "ingredient"+Id+"=" + jsonString;
	
	getcookie();
		
}	

	var customObject;

	function getcookie()
	{
	
		var ingreArray =[];
		
		var ca = document.cookie.split(';');
	 //alert(ca);
	
		 var selected_count =0;
		  for (var i = 0; i < ca.length; i++) 
		  {
			var cookie = ca[i];
			var eqPos = cookie.indexOf("=");
			var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
			if (name.indexOf("ingredient") >= 0)
			{				
				selected_count=selected_count+1;
				var res = ca[i].split("=");
				ingreArray.push(res[1]);
			}
          }
	//	alert(ingreArray);
		//alert(selected_count);
	
	delrows ();
	
	 
	if(ingreArray.length>0){
		for(n=0;n<ingreArray.length;n++)
		 {
				
			cn=0;
				//alert(ingreArray[n]);
				customObject = JSON.parse(ingreArray[n]);
				//alert(customObject);
				//alert(customObject.name+","+customObject.id +","+customObject.qty+","+customObject.unit);
				
				
				var vals="'"+customObject.id+"','"+customObject.name+"','"+customObject.qtyR+"','"+customObject.qtyL+"','"+customObject.unit+"'";
				
				var e_btn='<button type="button" class="btn btn-default btn-sm btn-success" onclick="addIngredients('+vals+')"><i class="fa fa-pencil"></i></button>'; 
				var d_btn="'"+customObject.id+"'";
				row = table.insertRow(n+1);
				
				
				cell_N = row.insertCell(0);
				if(customObject.qtyR>0){
					//alert(customObject.qtyR+'R');
					cell_R = row.insertCell(1);
					cell_R.innerHTML=customObject.qtyR+" "+customObject.unit;
					T_Cell=2;
					cn++;
				}
				if(customObject.qtyL>0)
				{
				//	alert(customObject.qtyL+'L');
					cell_L = row.insertCell(cn+1);
					cell_L.innerHTML=customObject.qtyL+" "+customObject.unit;
					T_Cell=cn+2;
				}
				cell_T = row.insertCell(T_Cell);
				
				cell_N.innerHTML=customObject.name;
				
				
				cell_T.innerHTML=e_btn+' <button type="button" class="btn btn-default btn-sm btn-danger " onclick="delcookie('+d_btn+')"><i class="fa fa-trash"></i></button>';
				
				
		 }
		 
		 
		//alert(ingreArray.length);
		//for(i=0; i<ingreArray ; i++)
		
		document.getElementById("clear_all_btn").style.display = "block";
		document.getElementById("submit_btn").style.display = "block";
	}
	else{
		
		row = table.insertRow(1);
		cell0 = row.insertCell(0);
		//document.getElementById("compareul").innerHTML ='<tr><td colspan="3" align="center">No Ingredients selected</td></tr>';
		cell0.innerHTML='<center>No Ingredients selected</center>';
		cell0.colSpan = cols;
		document.getElementById("clear_all_btn").style.display = "none";
		document.getElementById("submit_btn").style.display = "none";
		cell0.classList="center_class";
		
	}

}				   
	//var arrayJson = JSON.stringify(customObject);			   
/* 	var json = js0bj2php0bj(customObject);	
	$.post(echo $_SERVER['PHP_SELF'],{json:json},function(data){

		console.log(data);
	});	 */

</script> 
