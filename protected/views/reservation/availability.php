
<div class="col-xs-12">
	
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Check Availabilty</h3>
		</div>
		
        <div class="box-body ">
            <div class="row">
			<form action="<?php echo Yii::app()->createUrl('/reservation/create');?>" method="POST" onsubmit="return validate()">
					
				<div class="col-xs-6 check_avl">
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group pull-left">
								<label>Check in Date:</label>
								
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right datepicker" value="<?php echo $today;?>" id="date_in" name="DateTime[0][date_in]">
								</div>
								
							</div>
							
							<div class="form-group">
								<label>Check out Date:</label>
								
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>	
									</div>
									<input type="text" class="form-control pull-right datepicker" value="<?php echo $today;?>" id="date_out" name="DateTime[0][date_out]">
								</div>
								
							</div>
							
							<p class="errorMessage" id="date-error"></p>
						</div>
						
						
						<div class="col-xs-6">
							<div class="form-group">
								<label>Check in Time:</label>
								<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
									<input type="text" class="form-control time_input" value="00:00" id="time_in" name="DateTime[0][time_in]">
									
								</div>
								
							</div>
							
							<div class="form-group">
								<label>Check out Time:</label>
								<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
									<input type="text" class="form-control time_input" value="00:00" id="time_out" name="DateTime[0][time_out]">
									
								</div>
								
							</div>
							<p class="errorMessage" id="time-error"></p>
						</div>
					</div>
					
					<button type="button" class="btn  btn-success pull-right" id="check">Check</button>
					
				</div>
                <div class="col-xs-6" id="available">
						<div class="form-group rm">
							<label>A/C Rooms</label>
							<select class="form-control select2" multiple="multiple" data-placeholder="Select Rooms" style="width: 100%;"  id="available_AC" name="available_AC[]">
								
							</select>
						</div>
						
						
						<div class="form-group rm">
							<label>Non A/C Rooms</label>
							<select class="form-control select2" multiple="multiple" data-placeholder="Select Rooms" style="width: 100%;"  id="available_nonAC"  name="available_nonAC[]" >
								
							</select>
						</div>
						<!-- /.info-box-content -->
						<input  type="submit" class="btn  btn-success pull-right" id="contiune" value="Contiune >>" >
					
					
					<p class="errorMessage" id="room-error"></p>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	/* $(document).ready(function(){
		$("#check").click(function(){
        alert("sss");
		});
		
		});
	*/
	//	document.getElementById("contiune").style.display = "block";
	
	function validate()
	{
		
		AC=document.getElementById("available_AC").value;
		NON=document.getElementById("available_nonAC").value;
		
		if(AC=='' && NON==''){
			
			 document.getElementById('room-error').innerHTML='Please select a Room(s)';
			return false;
		}
		
		
	}
	
	
	
	
	$('.check_avl').on("click",'#check',function(e) {
    	// e.preventDefault();
		
    	
		var date_in =document.getElementById("date_in").value;
		
		var date_out =document.getElementById("date_out").value;
		
		var time_in =document.getElementById("time_in").value;
		
		var time_out =document.getElementById("time_out").value;
		
		
		document.getElementById('time-error').innerHTML='';		
		document.getElementById('date-error').innerHTML='';		
		
		var check_in_date_time=date_in+' '+time_in;
		var check_out_date_time=date_out+' '+time_out;
		
		var rmtype='A/C';
		
		
		$.ajax({
			url:'<?php echo Yii::app()->createUrl('/reservation/avalible_rooms') ?>',
			type: "POST",
			//data: {check_in_date_time: check_in_date_time, check_out_date_time:check_out_date_time},
			data: {din:check_in_date_time,dout:check_out_date_time,rmtype:rmtype},
			
			beforeSend: function() {
				
				
				//alert(check_in_date_time);
				if(date_in>date_out){
					//alert(date_in+"to"+date_out);
					document.getElementById('date-error').innerHTML='Date Range Error';
					return false;
				}  
				if(date_in==date_out && time_out<=time_in){
					//alert(date_in+"to"+date_out);
					document.getElementById('time-error').innerHTML='Time Range Error';
					return false;
				}  
				
			},
			success: function(data){
				
				document.getElementById("available_AC").innerHTML = data;
				//   $('#mail-modal').modal('show');
					NonAC();
				
				
			}
			
			
		});
		
		
		return false; 
	});
	
	
	
	
	function NonAC()
	{
		var date_in =document.getElementById("date_in").value;
		
		var date_out =document.getElementById("date_out").value;
		
		var time_in =document.getElementById("time_in").value;
		
		var time_out =document.getElementById("time_out").value;
		
		var check_in_date_time=date_in+' '+time_in;
		var check_out_date_time=date_out+' '+time_out;
		
		var rmtype='Non A/C';
		
		
		$.ajax({
			url:'<?php echo Yii::app()->createUrl('/reservation/avalible_rooms') ?>',
			type: "POST",
			//data: {check_in_date_time: check_in_date_time, check_out_date_time:check_out_date_time},
			data: {din:check_in_date_time,dout:check_out_date_time,rmtype:rmtype},
			
			beforeSend: function() {
				
				
				
				//alert(check_in_date_time);
				/*  if(date_in>date_out){
					alert(date_in+"to"+date_out);
					return false;
				}  */
			},
			success: function(data){
				
				document.getElementById("available_nonAC").innerHTML = data;
				//   $('#mail-modal').modal('show');
				
				// bootbox.alert(data);
				
			}
			
			
		});
		
		
		return false;
		
		
		
		
		
		
	}	
	
	
	$(function() {
		$('.time_input').keypress(function(event) {
			event.preventDefault();
			return false;
		});
	});
	
	$(function() {
		$('.datepicker').keypress(function(event) {
			event.preventDefault();
			return false;
		});
		
	});
</script>

