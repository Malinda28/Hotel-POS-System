<?php 
	
	class MainData extends CFormModel
	{
		
		public function Ing_Cookies($item_id)
		{
			
			echo "<script> var cookies = document.cookie.split(';');
			
			for (var i = 0; i < cookies.length; i++) {
			
			var cookie = cookies[i];
			var eqPos = cookie.indexOf('=');
			
			var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
			
			
			if (name.indexOf('ingredient') >= 0)
			{	
			document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT';
			}
			
			}
			
			
			
			getcookie();</script> ";
			$Ing_data=MainData::Saved_Ing($item_id);
			
			//print_r($Ing_data);
			foreach($Ing_data as $item)
			{
				
				echo '<script> 
				
				
				var ItemId="'.$item['ingrediant_name'].'";
				var customObjects = {};
				
				
				customObjects.name ="'.$item['ingrediant_name'].'";
				customObjects.id = "'.$item['ingrediant_id'].'";
				customObjects.qtyL = "'.$item['large_qty'].'";
				customObjects.qtyR =" '.$item['regular_qty'].'";
				customObjects.unit = "'.$item['unit'].'";
				
				
				var jsonString = JSON.stringify(customObjects);
				
				document.cookie = "ingredient"+'.$item['ingrediant_id'].'+"=" + jsonString;
				</script>';
			}
			
			
			//sleep(5);
			foreach ($_COOKIE as $key=>$val)
			{ 
				
				//	echo "{$key} => {$val} ";
				
			}
		}
		
		
		public function Saved_Ing($item_id)
		{
			
			$sql = "SELECT ing.ingrediant_name, ing.ingrediant_id, res.regular_qty, res.large_qty, ing.unit 
			FROM res_item_detail res, kitchen_ingrediants ing 
			WHERE ing.ingrediant_id=res.ingrediant_id AND  res_item_id=".$item_id;
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			return $data;
		}
		
		
		public function Saved_ResItem()
		{
			
			//$sql = "SELECT * FROM res_items WHERE category".$cat_id;
			$sql = "SELECT * FROM res_items ";			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			return $data;
		}
		
		
		public function Res_Item_Category()
		{
			
			$sql = "SELECT * FROM res_item_category";
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			return $data;
		}
		
		public function Rooms($cdata)
		{
			if($cdata==0){
				$sql = "SELECT * FROM room";
			}
			else if($cdata==1){
				$sql = "SELECT * FROM room WHERE availability='Y'";
			}
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			return $data;
			
		}	
		
		public function Tables($cdata)
		{
			if($cdata==0){
				$sql = "SELECT * FROM res_table";
			}
			else if($cdata==1){
				$sql = "SELECT * FROM res_table WHERE availability='Y'";
			}
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			return $data;
			
		}	
		
		public function Stewards($cdata)
		{
			if($cdata==0){
				$sql = "SELECT * FROM steward";
			}
			else if($cdata==1){
				$sql = "SELECT * FROM steward WHERE status='Available'";
			}
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			return $data;
			
		}
		
		public function Del_All_Cookie($type)
		{
			echo "<script> var cookies = document.cookie.split(';');
			
			for (var i = 0; i < cookies.length; i++) {
			
			var cookie = cookies[i];
			var eqPos = cookie.indexOf('=');
			
			var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
			
			
			if (name.indexOf('".$type."') >= 0)
			{	
			document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT';
			}
			
			}
			
			</script> ";
			
		}
		
		public function Res_Item_Cookies($kot_id)
		{
			
			$sql = "SELECT detl.res_item_id, detl.portion, detl.qty, res.item_name
			FROM kot_detail detl, res_items res 
			WHERE res.res_item_id = detl.res_item_id AND kot_id=".$kot_id;
			
			$ResItem_data = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($ResItem_data);
			foreach($ResItem_data as $item)
			{
				
				$pi= $item['portion'].$item['res_item_id'];
				
				echo '<script> 
				
				
				
				var customObjects = {};
				var pi= "'.$item['portion'].$item['res_item_id'].'";
				
				customObjects.name ="'.$item['item_name'].'";
				customObjects.id = "'.$item['res_item_id'].'";
				customObjects.qty = "'.$item['qty'].'";
				customObjects.portion ="'.$item['portion'].'";
				
				
				var jsonString = JSON.stringify(customObjects);
				
				document.cookie = "restitems"+pi+"=" + jsonString;
				
				</script>';
			}
			
			
			
		}
		
		
		public function Saved_BarItem()
		{
			
			
			$sql = "SELECT * FROM bar_items ";			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			return $data;
		}
		
		
		public function Bar_Item_Category()
		{
			
			$sql = "SELECT * FROM bar_item_category";
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			return $data;
		}
		
		
		public function Volumes($bid)
		{
			$sql = "SELECT price_25ml ,price_50ml,price_100ml,price_300ml,price_750ml,price_1000ml FROM bar_items WHERE bar_item_id=".$bid;
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			return $data;
			
		}
		
		
		
		public function Bar_Item_Cookies($bot_id)
		{
			
			$sql = "SELECT detl.bar_item_id, detl.volume , detl.qty, bar.beverage_name
			FROM bot_detail detl, bar_items bar 
			WHERE bar.bar_item_id = detl.bar_item_id AND bot_id=".$bot_id;
			
			$ResItem_data = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($ResItem_data);
			foreach($ResItem_data as $item)
			{
				
				$pi= $item['volume'].'ml_'.$item['bar_item_id'];
				
				
				echo '<script> 
				
				
				
				var customObjects = {};
				var pi= "'.$item['volume'].'ml_'.$item['bar_item_id'].'";
				
				customObjects.name ="'.$item['beverage_name'].'";
				customObjects.id = "'.$item['bar_item_id'].'";
				customObjects.qty = "'.$item['qty'].'";
				customObjects.volume ="'.$item['volume'].'ml";
				
				
				var jsonString = JSON.stringify(customObjects);
				
				document.cookie = "baritems"+pi+"=" + jsonString;
				
				
				</script>';
				
				
			}
			
			
			
		}
		
		public function Avalible_Rooms($in_date_time,$out_date_time)
		{
			
			/* $rm_sql = "SELECT rm.room_no, rm.availability, rt.facility ,rt.content FROM room rm, room_type rt WHERE rm.type=rt.type_id" ;
				
			$Rooms_data = Yii::app()->db->createCommand($rm_sql)->queryAll(); */
			//echo $in_date_time;
			//echo $out_date_time;
			//exit();
			/* $avl_sql = "SELECT * FROM room rm left join reservation rev on
				rev.no_rooms=rm.room_no
				WHERE NOT ((check_in_date_time BETWEEN ".$in_date_time." and ".$out_date_time.") 
				OR (check_out_date_time BETWEEN ".$in_date." and ".$out_date_time.") 
				OR (check_in_date_time<".$in_date_time." and check_out_date_time>".$out_date_time."))
			OR rev.no_rooms IS NULL order by room_no" ; */
			
			$avl_sql = "SELECT room.room_no,room.availability,room_type.facility,room_type.content 
			FROM reservation,room_type, room  left join  reservation_detail on
			reservation_detail.room_no=room.room_no 
			WHERE NOT ((check_in_date_time BETWEEN '".$in_date_time."' AND '".$out_date_time."') 
			OR (check_out_date_time BETWEEN '".$in_date_time."' AND '".$out_date_time."') 
			OR (check_in_date_time<'".$in_date_time."' AND check_out_date_time>'".$out_date_time."')
			)AND reservation_detail.reservation_id=reservation.reservation_id AND room_type.type_id=room.type
			group by room.room_no;" ;
			
			
			
			$Aval_data = Yii::app()->db->createCommand($avl_sql)->queryAll();
			
			
			$Emty_res_sql="SELECT room.room_no,room.availability,room_type.facility,room_type.content FROM room_type, room  left join  reservation_detail on
			reservation_detail.room_no=room.room_no 
			WHERE room_type.type_id=room.type and 
			reservation_detail.room_no is null";
			
			$Emty_res = Yii::app()->db->createCommand($Emty_res_sql)->queryAll(); 
			
			$Aval_data=array_merge($Aval_data,$Emty_res);
			
			
			return $Aval_data;
			
		}
		
		public function Customers($nic)
		{
			
			$sql = "SELECT * FROM customer WHERE nic_no=".$nic;
			
			$cus_data = Yii::app()->db->createCommand($sql)->queryAll();
			
			return $cus_data;
			
			
			
		}
		
		public function Room_Detail($no)
		{
			
			$sql = "SELECT * FROM room rm, room_type ty WHERE rm.type=ty.type_id and rm.room_no=".$no;
			
			$room_data = Yii::app()->db->createCommand($sql)->queryAll();
			
			return $room_data;
			
			
			
		}
		
		
		public function PreOrders($cdata)
		{
			if($cdata==0){
				$sql = "SELECT * FROM per_invoice";
			}
			else if($cdata==1){
				$sql = "SELECT COUNT(id),gen_id
				FROM per_invoice 
				WHERE invoice_status='N'
				GROUP BY gen_id";
			}
			
			$data1 = Yii::app()->db->createCommand($sql)->queryAll();
			$resturn=array();
			foreach($data1 as $data){
				$gen_id= $data['gen_id'] ;
				$sql = "SELECT ticket_id, type
				FROM per_invoice pre, kot k, bot b
				WHERE gen_id = '".$gen_id."' AND (pre.ticket_id=k.kot_id OR pre.ticket_id=b.bot_id)
				GROUP BY ticket_id;";
				$data = Yii::app()->db->createCommand($sql)->queryAll();
				
				echo '<br/>';
				print_r($data);
			}
			
			
			return $data1;
			
			
		}
		
		public function PreInvoiceKOT($Gen_id)
		{
			/* if($cdata==0){
				$sql = "SELECT * FROM per_invoice";
			} */
			
			$sql = "SELECT pre.ticket_id, pre.type, k.table_no,k.room_no,k.date_time 
			FROM per_invoice pre, kot k
			WHERE gen_id = '".$Gen_id."' AND pre.type='K'AND pre.ticket_id=k.kot_id
			order by gen_id;";
			
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($data);
			return $data;
		}
		
		
		public function PreInvoiceBOT($Gen_id)
		{
			
			
			$sql = "SELECT pre.ticket_id, pre.type, b.table_no,b.room_no,b.date_time 
			FROM per_invoice pre, bot b
			WHERE gen_id = '".$Gen_id."' AND pre.type='B'AND pre.ticket_id=b.bot_id
			order by gen_id;";
			
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($data);
			return $data;
		}
		
		public function PreInvoiceROOM($Gen_id)
		{
			
			
			$sql = "SELECT pre.ticket_id, pre.type, revd.room_no, rty.facility, rty.content,revd.adults,revd.children,rty.price
			FROM per_invoice pre, reservation_detail revd, room_type rty, room rm
			WHERE gen_id = '".$Gen_id."' AND pre.type='R'AND pre.ticket_id=revd.reservation_id 
			AND revd.room_no=rm.room_no AND rm.type=rty.type_id
			order by gen_id;";
			
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($data);
			return $data;
		}
		
		public function PreInvoiceCustomer($Gen_id)
		{
			
			$sql = "SELECT pre.ticket_id, cus.customer_name, resv.check_in_date_time, resv.check_out_date_time
			FROM per_invoice pre, customer cus, reservation resv
			WHERE gen_id = '".$Gen_id."' 
			AND pre.type='R'AND pre.ticket_id=resv.reservation_id AND cus.nic_no=resv.cus_id;";
			
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($data);
			return $data;
		}
		
		public function KOTdetails($ids)
		{
			
			$sql = "SELECT kd.kot_id, kd.res_item_id, rt.item_name, kd.portion, kd.qty, rt.regular_price, rt.large_price 
			FROM kot_detail kd, res_items rt  
			WHERE kd.res_item_id=rt.res_item_id AND kd.kot_id IN (".implode(',',$ids).") order by res_item_id";
			
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			return $data;
			//print_r($data);
		}
		
		public function BOTdetails($ids)
		{
			
			//$ids=array(7,8);
			$sql = "SELECT  b.bot_id,b.bar_item_id,itm.beverage_name, b.volume, b.qty, 
			itm.price_25ml as '25',itm.price_50ml as '50',itm.price_100ml as '100',itm.price_300ml as '300',itm.price_750ml as '750',itm.price_1000ml as '1000'
			FROM bot_detail b, bar_items itm  WHERE b.bar_item_id=itm.bar_item_id and b.bot_id IN(".implode(',',$ids).")";
			
			
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($data);
			return $data;
			
		}
		
		
		public function DashRoomdata()
		{
			
			$sql = "SELECT * FROM per_invoice WHERE invoice_status='N' AND type='R';";
			
			//$sql = "SELECT * FROM per_invoice WHERE invoice_status='N';";
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($data);
			return $data;
			
		}
		
		
		public function OrderRoomdata($gen)
		{
			
			$sql = "SELECT * FROM per_invoice WHERE invoice_status='N' AND (type='B' or type='K') and gen_id='".$gen."';";
			
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($data);
			return $data;
			
		}
		
		public function DashResdata()
		{
			
			$sql = "SELECT * FROM per_invoice WHERE invoice_status='N' AND NOT type='R' GROUP BY gen_id";
			
			//$sql = "SELECT * FROM per_invoice WHERE invoice_status='N';";
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($data);
			return $data;
			
		}
		
		
		public function tabledata($gen)
		{
			
			$sql = "SELECT table_no as number FROM per_invoice WHERE invoice_status='N' AND (type='B' or type='K') and gen_id='".$gen."';";
			
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($data);
			return $data;
			
		}
		public function stewarddata($gen)
		{
			
			$sql = "SELECT per.steward_id,stw.Name FROM per_invoice per, steward stw WHERE stw.steward_id=per.steward_id AND invoice_status='N' AND (type='B' or type='K') and gen_id='".$gen."';";
			
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($data);
			return $data;
			
		}
		/* public function PreInvoiceROOM($Gen_id)
			{
			
			
			$sql = "SELECT pre.ticket_id, pre.type, revd.room_no, rty.facility, rty.content,revd.adults,revd.children,rty.price
			FROM per_invoice pre, reservation_detail revd, room_type rty, room rm
			WHERE gen_id = '".$Gen_id."' AND pre.type='R'AND pre.ticket_id=revd.reservation_id 
			AND revd.room_no=rm.room_no AND rm.type=rty.type_id
			order by gen_id;";
			
			
			$data = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($data);
			return $data;
		} */
		
		public function Alerts()
		{
			
			$Alerts= array();
			$sql1 = "SELECT * FROM kitchen_ingrediants WHERE 
			(unit='g' AND ingrediant_qty<1000) OR 
			(unit='ml' AND ingrediant_qty<1000) OR
			(unit='s' AND ingrediant_qty<100)";
			
			
			$Rest = Yii::app()->db->createCommand($sql1)->queryAll();
			
			$sql2 = "SELECT bar_item_id,beverage_name,volume FROM bar_items WHERE volume<5000;";
			
			
			$Bar = Yii::app()->db->createCommand($sql2)->queryAll();
			
			foreach($Rest as $rest){
				
				
				array_push($Alerts,array("type"=>'K',"item"=>$rest['ingrediant_name'],"qty"=>$rest['ingrediant_qty'].' '.$rest['unit']));
				
				}
			
				foreach($Bar as $bar){
				
				
				array_push($Alerts,array("type"=>'B',"item"=>$bar['beverage_name'],"qty"=>$bar['volume'].' ml'));
				
				}
			
			//print_r($Alerts);
			return $Alerts;
			
		}
		
	}					