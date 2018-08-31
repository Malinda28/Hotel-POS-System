<?php
/* @var $this KotController */
/* @var $model Kot */

$this->breadcrumbs=array(
	'Kots'=>array('index'),
	'Create',
);
$colspan=4;

if ($action=='update'){
	MainData::Del_All_Cookie('restitems');
	MainData::Res_Item_Cookies($model->kot_id);
	$title="Update KOT : <b>".$model->kot_id."</b>";
	//echo '<script> getcookie();</script>'; 
}
else{
	
	if($cc==0)
	{
	MainData::Del_All_Cookie('restitems');
	}
	$title="Create KOT";
}
?>
<style>
	tbody{
    height:25px;
    overflow-y:auto;
    width: 100%;
    }
	
	.direct-chat-messages {
	
    height: 345px;
	}
</style>
<section class="content-header" onload="">
<h1>Kicthen Order Ticket</h1>
</section>

<section class="content">
<div class="row">
<div class="col-xs-7">
    <div class="box box-success">
		<div class="box-header with-border">
         <h3 class="box-title"><?php echo $title; ?></h3>
			
           </div>
			<!-- form -->	
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'kot-form',
				'enableAjaxValidation'=>true,
			)); ?>
			<div class="box-body " id="box-body">	
			
			<?php echo $form->errorSummary($model); ?>
			
		<?php	$rooms= MainData::Rooms(1); 
				$tables= MainData::Tables(1); 
				$stewards= MainData::Stewards(1); 
		?>
		<div class="row">
			<div class="col-xs-8">
				<div class="row">
					<div class="col-xs-6">
				
						<div class="form-group">
							<label>Room No:</label>
					
							<?php echo $form->dropDownList($model,'room_no', CHtml::listData($rooms,'room_no','room_no'),array(
							'empty'=>'--Select Room No--','class'=>'form-control')); ?>
						</div>  
					
					</div>
					<div class="col-xs-6">
						<div class="form-group">
						<label>Table No:</label>
				
					  <?php echo $form->dropDownList($model,'table_no', CHtml::listData($tables,'number','number'),array(
						'empty'=>'--Select Table No--','class'=>'form-control')); ?>
						 
						</div>  
					</div>
					
				</div>	
				<?php echo $form->error($model,'room_no'); ?>
			</div>
			<div class="col-xs-4">
				 <div class="form-group ">
			<label>Steward Name:</label>
				<?php echo $form->dropDownList($model,'steward_id', CHtml::listData($stewards,'steward_id','Name'),array(
				'empty'=>'--Select Steward --','class'=>'form-control')); ?>
				  </div>
			<?php echo $form->error($model,'steward_id'); ?>
			</div>
		</div>
				
			<div class="table-responsive">
                <table class="table table-hover" id="compareul">
                <tr>
				<th>Item</th>               
				<th>Portion</th> 	
				<th>Qty</th>                            
                <th>Tools</th>
                </tr>
                <tr>
                  <td colspan="<?php echo $colspan;?>" align="center">No Items selected</td>  
				  
				  
                </tr>
							
				
              </table>
           </div>
		
			</div>
			<div class="box-footer clearfix"  id="box-footer">
		
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn  btn-success pull-right' ,'id'=>'submit_btn')); ?>
			<input type="button" class="btn  btn-success pull-left"  onclick="confirmbox()" id="clear_all_btn" value="Clear Items"/> 

			</div>
			   <?php $this->endWidget(); ?>
	<!-- /form -->
		</div>
	</div>
	
	<div class="col-xs-5">
		<?php  $this->renderPartial('_res_items'); ?>
	</div>
</div>	
</section>

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
					<div class="row" id="Regular_row">
			
							<div class="col-xs-6">	
								<label>Portion</label>
							</div>
							<div class="col-xs-6">
								
									<select class="form-control" id="portion">
										<option value="0">Select</option>
										<option value="R" id="op1">Regular</option>
										<option value="L" id="op2">Large</option>
										
									</select>
								
							</div>
					</div>
					
					<div class="row" id="Large_row">	
								<div class="col-xs-6">
									<label>Quantity</label>
								</div>
						<div class="col-xs-6">
							<div class="input-group">
								<input type="number" class="form-control input-sm required" placeholder="Enter Large Qty" id="qty">
								
							</div>
						</div>
					</div>
			</form>		
        </div>
        <div class="modal-footer" >
          <button type="button" class="btn btn-success"  onclick="listItems()">Add to KOT</button>
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
					<p>Are you sure you wish to clear all selected Items?</p>
					
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
var Id;
var Name; 
var Qty; 
var Portion;
var customObject;
var table = document.getElementById("compareul");

window.onload = function cheklist(){
	
	//clearall();
	var cookies = document.cookie.split(";");
	//alert(cookies);
	getcookie();
	//if(Regular_price>0){
	//document.getElementById("Regular_row").style.display = "none";
	//}
}	
	
function additems(id,name,portion,qty,Rprice,Lprice)
{
	
	 $('#itemadd').modal('show');
	
	Name=name;
	Id=id;
	Portion=portion;
	
	document.getElementById("Ititle").innerHTML= name ;
				
	
	if (Portion!=0){
		document.getElementById("portion").value=Portion;
		
		//alert(qtyR);
	}
	else{
		document.getElementById("portion").value='0';
		
	}
	
	if (Qty!=0){
		document.getElementById("qty").value= Qty ;
	}
	else{
		document.getElementById("qty").value='';
		
	}
		
			
	if(Rprice>0)
	{
		document.getElementById("op1").style.display = "block";
		
	}	
	else
	{
		document.getElementById("op1").style.display = "none";
		
	}
	
	if(Lprice>0)
	{
		document.getElementById("op2").style.display = "block";
		
	}	
	else
	{
		document.getElementById("op2").style.display = "none";
		
	}
	
	
}

function delrows () {
        
            $("#compareul").find("tr:not(:first)").remove();
        }
 

function delcookie(Idd,Por)
{
		alert(Por);
		if(Por=="R"){
		document.cookie ="restitemsR"+Idd+ '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
		}//delete_cookie('cookieObject'+Idd+);
		else if(Por=="L"){
		document.cookie ="restitemsL"+Idd+ '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
		}
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
		
		
		if (name.indexOf("restitems") >= 0)
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
function listItems()
	{
	
	//alert(Name+" "+Id+" "+Unit );
	Portion=document.getElementById("portion").value;
	Qty=document.getElementById("qty").value;	
	
		
	if (Qty < 0 || Qty =="" || Portion == 0 || Portion =="") 
	{

	document.getElementById("errorMessage").innerHTML="<center>Quantity cannot be blank or negetive value</center>";
	return false;
	}
	
	$("#itemadd").modal("hide");
	document.getElementById("errorMessage").innerHTML="";
	var customObjects = {};

	customObjects.name = Name;
	customObjects.id = Id;
	customObjects.qty = Qty;
	customObjects.portion = Portion;
	
	
	//alert(customObjects.name+","+customObjects.id+","+customObjects.qty+","+customObjects.portion);
	var jsonString = JSON.stringify(customObjects);
	
	if(Portion=="R"){
	document.cookie = "restitemsR"+Id+"=" + jsonString;
	}
	else{
		
	document.cookie = "restitemsL"+Id+"=" + jsonString;	
	}
	
	getcookie();
		
}	

function getcookie()

{
		var itemArray =[];
		
		var ca = document.cookie.split(';');
		
		
		 var selected_count =0;
		  for (var i = 0; i < ca.length; i++) 
		  {
			var cookie = ca[i];
			var eqPos = cookie.indexOf("=");
			var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
			if (name.indexOf("restitems") >= 0)
			{				
				selected_count=selected_count+1;
				var res = ca[i].split("=");
				itemArray.push(res[1]);
			}
          }
	
		delrows ();
	
		//alert(ca);
		if(itemArray.length>0){
			for(n=0;n<itemArray.length;n++)
			 {
					
				cn=0;
					
					
					customObject = JSON.parse(itemArray[n]);
					//alert(customObject);
					//alert(customObject.name+","+customObject.id +","+customObject.qty+","+customObject.unit);
					
					
					var vals="'"+customObject.id+"','"+customObject.name+"','"+customObject.qty+"','"+customObject.portion+"'";
					
					var e_btn='<button type="button" class="btn btn-default btn-sm btn-success" onclick="addItems('+vals+')"><i class="fa fa-pencil"></i></button>'; 
					//alert(itemArray[n]);
					var d_btn="'"+customObject.id+"'";
					row = table.insertRow(n+1);
					
					
					cell_N = row.insertCell(0);
					cell_P = row.insertCell(1);
					cell_Q = row.insertCell(2);
					cell_T = row.insertCell(3);	
						
					
					cell_N.innerHTML=customObject.name;
					
					if(customObject.portion=="R")
					{
						
						cell_P.innerHTML='<span class="label label-success">Regular</span>';
					
					}
					else if(customObject.portion=="L")
					{
						
						cell_P.innerHTML='<span class="label label-success">Large</span>';
					}
					
					cell_Q.innerHTML=customObject.qty;
					cell_T.innerHTML=e_btn+' <button type="button" class="btn btn-default btn-sm btn-danger " onclick=delcookie('+d_btn+',"'+customObject.portion+'")><i class="fa fa-trash"></i></button>';
					
					
			 }
			 
			 
			//alert(itemArray.length);
			//for(i=0; i<itemArray ; i++)
			
			document.getElementById("clear_all_btn").style.display = "block";
			document.getElementById("submit_btn").style.display = "block";
		}
		else{
			
			row = table.insertRow(1);
			cell0 = row.insertCell(0);
			//document.getElementById("compareul").innerHTML ='<tr><td colspan="3" align="center">No Ingredients selected</td></tr>';
			cell0.innerHTML='<center>No Items selected</center>';
			cell0.colSpan = 4;
			document.getElementById("clear_all_btn").style.display = "none";
			document.getElementById("submit_btn").style.display = "none";
			cell0.classList="center_class";
			
		}
}
		
	
	</script>