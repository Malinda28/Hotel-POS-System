<?php 
	
	class ReportsData extends CFormModel
	{
		
		
		public function Sales($Start,$End)
		{
			
			$sql = "SELECT inv.invoice_id,left(inv.date_time,10) as date_time,inv.sub_total,inv.net_total,detl.description,detl.des_type,detl.price,detl.qty 
			FROM invoice inv, invoice_detail detl
			WHERE detl.invoice_id=inv.invoice_id
			AND left(inv.date_time,10) BETWEEN '".$Start."' AND '".$End."' order by inv.date_time;";
			
			$sale = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($Sales_data);
			//exit();
			
			$date='';
			$inv_id=0;
			$room_sale=0.00;
			$res_sale=0.00;
			$bar_sale=0.00;
			$sub_total=0.00;
			$net_total=0.00;
			$service=0.00;
			$SALES_array=array();
			
			$q=0;
			for($i=0;$i<Count($sale);$i++)
			{
				
				if($date==$sale[$i]['date_time'])
				{
					
					
					if($sale[$i]['des_type']=='R')
					{
						
						$subr=bcmul($sale[$i]['price'], $sale[$i]['qty'], 2);
						$room_sale=bcadd($room_sale,$subr,2);
						
						$SALES_array[$q]['Rooms']=$room_sale;
						
					}
					else if($sale[$i]['des_type']=='K')
					{
						$subk=bcmul($sale[$i]['price'], $sale[$i]['qty'], 2);
						$res_sale=bcadd($res_sale,$subk,2);
						
						$SALES_array[$q]['Resturant']=$res_sale;
					}
					else 
					{
						$subb=bcmul($sale[$i]['price'], $sale[$i]['qty'], 2);
						$bar_sale=bcadd($bar_sale,$subb,2);
						
						$SALES_array[$q]['Bar']=$bar_sale;
						
					}
					
					$sub_total=bcadd($room_sale,bcadd($res_sale,$bar_sale,2),2);
					$service= bcmul(bcdiv($sub_total,100,2),10,2);
					$net_total=bcadd($sub_total,$service,2);
					
					$SALES_array[$q]['Sub_total']=$sub_total;
					$SALES_array[$q]['Service']=$service;
					$SALES_array[$q]['Total']=$net_total;
					
					
				}
				else
				{
					$date=$sale[$i]['date_time'];
					
					$room_sale=number_format(0, 2, '.', '');
					$bar_sale=number_format(0, 2, '.', '');
					$res_sale=number_format(0, 2, '.', '');
					$sub_total=number_format(0, 2, '.', '');
					$net_total=number_format(0, 2, '.', '');
					
					
					if($sale[$i]['des_type']=='R')
					{
						$subr=bcmul($sale[$i]['price'], $sale[$i]['qty'], 2);
						$room_sale=bcadd($room_sale,$subr,2);
						$sub_total=bcadd($sub_total,$room_sale,2);
						
						
					}
					else if($sale[$i]['des_type']=='K')
					{
						$subk=bcmul($sale[$i]['price'], $sale[$i]['qty'], 2);
						$res_sale=bcadd($res_sale,$subk,2);
						$sub_total=bcadd($sub_total,$res_sale,2);
						
						
					}
					else 
					{
						$subb=bcmul($sale[$i]['price'], $sale[$i]['qty'], 2);
						$bar_sale=bcadd($bar_sale,$subb,2);
						$sub_total=bcadd($sub_total,$bar_sale,2);
						
						
					}
					
					$service= bcmul(bcdiv($sub_total,100,2),10,2);
					$net_total=bcadd($sub_total,$service,2);
					
					array_push($SALES_array,array("Date"=>$date, "Rooms"=>$room_sale, "Resturant"=>$res_sale,"Bar"=>$bar_sale,"Sub_total"=>$sub_total,"Service"=>$service,"Total"=>$net_total));
					
					
					
					
					$q=count($SALES_array)-1;
					
					
					
				}
				
				
			}
			
			//print_r($SALES_array);
			//exit();
			
			return $SALES_array;
			
		}
		
		
		public function Profit($Start,$End)
		{
			//exit($End.' '.$Start);
			$End_date=date_create($End);
			
			$End_date = $End_date->add(new DateInterval('P1M'));
			$End_date = $End_date->format('Y-m');
			
			$sale=ReportsData::Sales($Start,$End_date);
			
			$sql = "SELECT category,left(date,7) as date,amount FROM expenses WHERE left(date,7) BETWEEN '".$Start."' AND '".$End."' order by date;";			
			$Expense = Yii::app()->db->createCommand($sql)->queryAll();
			
			
			
			$q=0;
			$EXPEN_array=array();
			$month='';
			
			for($i=0;$i<Count($Expense);$i++)
			{
				
				
				$new_month=$Expense[$i]['date'];
				
				if($month==$new_month)
				{
					

					if($Expense[$i]['category']=='AE')
					{
						
						
						$AE=bcadd($AE,$Expense[$i]['amount'],2);
						
						$EXPEN_array[$q]['AE']=$AE;
						
					}
					else if($Expense[$i]['category']=='SDE')
					{
						
						$SDE=bcadd($SDE,$Expense[$i]['amount'],2);
						
						$EXPEN_array[$q]['SDE']=$SDE;
						
					}
					else if($Expense[$i]['category']=='FEO')
					{
						
						
						$FEO=bcadd($FEO,$Expense[$i]['amount'],2);
						
						$EXPEN_array[$q]['FEO']=$FEO;
						
					}
					
					$Expen_Total=bcadd($Expen_Total,$Expense[$i]['amount'],2);
					$EXPEN_array[$q]['Expen_Total']=$Expen_Total;
				}
				
				else{
					
					
					$month=$Expense[$i]['date'];
					
					$AE=number_format(0, 2, '.', '');
					$SDE=number_format(0, 2, '.', '');
					$FEO=number_format(0, 2, '.', '');
					$Expen_Total=number_format(0, 2, '.', '');
					
					
					if($Expense[$i]['category']=='AE')
					{
						$AE=bcadd($AE,$Expense[$i]['amount'],2);
						
					}
					else if($Expense[$i]['category']=='SDE')
					{
						
						$SDE=bcadd($SDE,$Expense[$i]['amount'],2);
						
					}
					else if($Expense[$i]['category']=='FEO')
					{
						
						$FEO=bcadd($FEO,$Expense[$i]['amount'],2);
						
					}
					
					$Expen_Total=bcadd(0.00,$Expense[$i]['amount'],2);
					
				
					array_push($EXPEN_array,array("Month"=>$month,"AE"=>$AE,"SDE"=>$SDE,"FEO"=>$FEO,"Expen_Total"=>$Expen_Total));
					
					$q=count($EXPEN_array)-1;
					
				}
			}
			
			
			
			$PROFIT_array=array();
			$date='';
			
			for($i=0;$i<Count($sale);$i++)
			{
				
				$new_date=date("Y-m", strtotime($sale[$i]['Date']));
				
				
				if($date==$new_date)
				{
					
					$net_total=bcadd($net_total,$sale[$i]['Total'],2);
					
					
					$PROFIT_array[$q]['Sales_Total']=$net_total;
					
					
				}
				
				else{
					
					$date=date("Y-m", strtotime($sale[$i]['Date']));
					//$net_total=number_format(0, 2, '.', '');
					
					$net_total=bcadd(0.00,$sale[$i]['Total'],2);
					$AE=number_format(0, 2, '.', '');
					$SDE=number_format(0, 2, '.', '');
					$FEO=number_format(0, 2, '.', '');
					$Expen_Total=number_format(0, 2, '.', '');
					$Profit=number_format(0, 2, '.', '');
					
					foreach($EXPEN_array as $EXPENs)
					{
							if($date==$EXPENs['Month'])
							{
								$AE=$EXPENs['AE'];
								$SDE=$EXPENs['SDE'];
								$FEO=$EXPENs['FEO'];
								$Expen_Total=$EXPENs['Expen_Total'];
								
							}
					}
					
					array_push($PROFIT_array,array("Month"=>$date,"Sales_Total"=>$net_total,"AE"=>$AE,"SDE"=>$SDE,"FEO"=>$FEO,"Expen_Total"=>$Expen_Total));
					
					$q=count($PROFIT_array)-1;
				}
			}
			
			
			
				
			
			//print_r($PROFIT_array);
			
			
			return $PROFIT_array;
			
			
		}
		
		
		public function Salesss_M($Start,$End)
		{
		
			$End_date=date_create($End);
			
			$End_date = $End_date->add(new DateInterval('P1M'));
			$End_date = $End_date->format('Y-m');
			
			$sale=ReportsData::Sales($Start,$End_date);
		
		
			$SALES_M=array();
			$date='';
			
			for($i=0;$i<Count($sale);$i++)
			{
				
				$new_date=date("Y-m", strtotime($sale[$i]['Date']));
				
				
				if($date==$new_date)
				{
					
					
					if($sale[$i]['des_type']=='R')
					{
						
						$subr=bcmul($sale[$i]['price'], $sale[$i]['qty'], 2);
						$room_sale=bcadd($room_sale,$subr,2);
						
						$SALES_M[$q]['Rooms']=$room_sale;
						
					}
					else if($sale['des_type'][$i]=='K')
					{
						$subk=bcmul($sale[$i]['price'], $sale['qty'][$i], 2);
						$res_sale=bcadd($res_sale,$subk,2);
						
						$SALES_M[$q]['Resturant']=$res_sale;
					}
					else 
					{
						$subb=bcmul($sale['price'][$i], $sale['qty'][$i], 2);
						$bar_sale=bcadd($bar_sale,$subb,2);
						
						$SALES_M[$q]['Bar']=$bar_sale;
						
					}
					
					$sub_total=bcadd($room_sale,bcadd($res_sale,$bar_sale,2),2);
					$service= bcmul(bcdiv($sub_total,100,2),10,2);
					$net_total=bcadd($sub_total,$service,2);
					
					$SALES_M[$q]['Sub_total']=$sub_total;
					$SALES_M[$q]['Service']=$service;
					$SALES_M[$q]['Total']=$net_total;
					
					
					
					
				}
				
				else{
					
					$date=date("Y-m", strtotime($sale[$i]['Date']));
					//$net_total=number_format(0, 2, '.', '');
					//$date=$sale[$i]['date_time'];
					
					$room_sale=number_format(0, 2, '.', '');
					$bar_sale=number_format(0, 2, '.', '');
					$res_sale=number_format(0, 2, '.', '');
					$sub_total=number_format(0, 2, '.', '');
					$net_total=number_format(0, 2, '.', '');
					
					
					if($sale[$i]['des_type']=='R')
					{
						$subr=bcmul($sale[$i]['price'], $sale[$i]['qty'], 2);
						$room_sale=bcadd($room_sale,$subr,2);
						$sub_total=bcadd($sub_total,$room_sale,2);
						
						
					}
					else if($sale['des_type'][$i]=='K')
					{
						$subk=bcmul($sale[$i]['price'], $sale['qty'][$i], 2);
						$res_sale=bcadd($res_sale,$subk,2);
						$sub_total=bcadd($sub_total,$res_sale,2);
						
						
					}
					else 
					{
						$subb=bcmul($sale['price'][$i], $sale['qty'][$i], 2);
						$bar_sale=bcadd($bar_sale,$subb,2);
						$sub_total=bcadd($sub_total,$bar_sale,2);
						
						
					}
					
					$service= bcmul(bcdiv($sub_total,100,2),10,2);
					$net_total=bcadd($sub_total,$service,2);
					
					array_push($SALES_M,array("Date"=>$date, "Rooms"=>$room_sale, "Resturant"=>$res_sale,"Bar"=>$bar_sale,"Sub_total"=>$sub_total,"Service"=>$service,"Total"=>$net_total));
					
					$q=count($SALES_M)-1;
				}
			}
		
		}
		
		
		public function Sales_M($Start,$End)
		{
			
			$sql = "SELECT inv.invoice_id,left(inv.date_time,7) as date_time,inv.sub_total,inv.net_total,detl.description,detl.des_type,detl.price,detl.qty 
			FROM invoice inv, invoice_detail detl
			WHERE detl.invoice_id=inv.invoice_id
			AND left(inv.date_time,7) BETWEEN '".$Start."' AND '".$End."' order by inv.date_time;";
			
			$sale = Yii::app()->db->createCommand($sql)->queryAll();
			
			//print_r($Sales_data);
			//exit();
			
			$date='';
			$inv_id=0;
			$room_sale=0.00;
			$res_sale=0.00;
			$bar_sale=0.00;
			$sub_total=0.00;
			$net_total=0.00;
			$service=0.00;
			$SALES_array=array();
			
			$q=0;
			for($i=0;$i<Count($sale);$i++)
			{
				
				
				if($date==$sale[$i]['date_time'])
				{
					
					
					if($sale[$i]['des_type']=='R')
					{
						
						$subr=bcmul($sale[$i]['price'], $sale[$i]['qty'], 2);
						$room_sale=bcadd($room_sale,$subr,2);
						
						$SALES_array[$q]['Rooms']=$room_sale;
						
					}
					else if($sale['des_type'][$i]=='K')
					{
						$subk=bcmul($sale[$i]['price'], $sale['qty'][$i], 2);
						$res_sale=bcadd($res_sale,$subk,2);
						
						$SALES_array[$q]['Resturant']=$res_sale;
					}
					else 
					{
						$subb=bcmul($sale['price'][$i], $sale['qty'][$i], 2);
						$bar_sale=bcadd($bar_sale,$subb,2);
						
						$SALES_array[$q]['Bar']=$bar_sale;
						
					}
					
					$sub_total=bcadd($room_sale,bcadd($res_sale,$bar_sale,2),2);
					$service= bcmul(bcdiv($sub_total,100,2),10,2);
					$net_total=bcadd($sub_total,$service,2);
					
					$SALES_array[$q]['Sub_total']=$sub_total;
					$SALES_array[$q]['Service']=$service;
					$SALES_array[$q]['Total']=$net_total;
					
					
				}
				else
				{
					$date=$sale[$i]['date_time'];
					
					$room_sale=number_format(0, 2, '.', '');
					$bar_sale=number_format(0, 2, '.', '');
					$res_sale=number_format(0, 2, '.', '');
					$sub_total=number_format(0, 2, '.', '');
					$net_total=number_format(0, 2, '.', '');
					
					
					if($sale[$i]['des_type']=='R')
					{
						$subr=bcmul($sale[$i]['price'], $sale[$i]['qty'], 2);
						$room_sale=bcadd($room_sale,$subr,2);
						$sub_total=bcadd($sub_total,$room_sale,2);
						
						
					}
					else if($sale['des_type'][$i]=='K')
					{
						$subk=bcmul($sale[$i]['price'], $sale['qty'][$i], 2);
						$res_sale=bcadd($res_sale,$subk,2);
						$sub_total=bcadd($sub_total,$res_sale,2);
						
						
					}
					else 
					{
						$subb=bcmul($sale['price'][$i], $sale['qty'][$i], 2);
						$bar_sale=bcadd($bar_sale,$subb,2);
						$sub_total=bcadd($sub_total,$bar_sale,2);
						
						
					}
					
					$service= bcmul(bcdiv($sub_total,100,2),10,2);
					$net_total=bcadd($sub_total,$service,2);
					
					array_push($SALES_array,array("Date"=>$date, "Rooms"=>$room_sale, "Resturant"=>$res_sale,"Bar"=>$bar_sale,"Sub_total"=>$sub_total,"Service"=>$service,"Total"=>$net_total));
					
					
					
					
					$q=count($SALES_array)-1;
					
					
					
				}
				
				
			}
			
			//print_r($SALES_array);
			//exit();
			
			return $SALES_array;
			
		}
		
	
	}									