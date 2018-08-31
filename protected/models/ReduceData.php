<?php 
	
	class ReduceData extends CFormModel
	{
		
		public function Left_KI()
		{
			
			$sql = "SELECT k.res_item_id,k.portion,SUM(k.qty) as qty
			FROM per_invoice per, kot_detail k
			WHERE k.kot_id=per.ticket_id AND per.invoice_status='N'  GROUP BY  k.res_item_id, portion;";
			
			$Kdata = Yii::app()->db->createCommand($sql)->queryAll();
			
			//return $data;
			$Res_ids=array_unique(array_column($Kdata,'res_item_id'));
			
			
			/* print_r($Res_ids); */
			//$Res_ids=implode(',',$Res_ids);
			
			
			$sql2 = "SELECT res_item_id,ingrediant_id,regular_qty,large_qty 
			FROM pos.res_item_detail 
			WHERE res_item_id IN (".implode(',',$Res_ids).") order by res_item_id";
			
			$Rdata = Yii::app()->db->createCommand($sql2)->queryAll();	
			
			
			
			
			//print_r($Rdata);
			
			
			
			$REDUC_ing=array();
			for($i=0;$i<Count($Rdata);$i++)
			{
				
				for($q=0;$q<Count($Kdata);$q++)
				{
					
					if($Kdata[$q]['res_item_id']==$Rdata[$i]['res_item_id'])
					{
						
						
						$ing_id=$Rdata[$i]['ingrediant_id'];
						
						if($Kdata[$q]['portion']=="L"){
							
							
							$reduce_qty=$Kdata[$q]['qty']*$Rdata[$i]['large_qty'];
						}
						else{
							
							$reduce_qty=$Kdata[$q]['qty']*$Rdata[$i]['regular_qty'];
						}
						
						array_push($REDUC_ing,array("ingrediant_id"=>$ing_id, "ingrediant_qty"=>$reduce_qty));
						
					}
					
					
				}
				
				
			}
			$sum = array_reduce($REDUC_ing, function ($a, $b) {
				isset($a[$b['ingrediant_id']]) ? $a[$b['ingrediant_id']]['ingrediant_qty'] += $b['ingrediant_qty'] : $a[$b['ingrediant_id']] = $b;  
				return $a;
			});
			
			
			//ResTable::model()->updateByPk($id, array('availability' =>'N'));
			//print_r($sum);
			
			$sql3 = "SELECT ingrediant_id,ingrediant_qty FROM kitchen_ingrediants;";
			
			$Idata = Yii::app()->db->createCommand($sql3)->queryAll();
			
		
			
			
			foreach($sum as $use)
			{
				
				foreach($Idata as $left)
				{
					
					if($left['ingrediant_id']==$use['ingrediant_id'])
					{
						
						$newLeft= bcsub($left['ingrediant_qty'],$use['ingrediant_qty']);
						echo'<br/>';
						exit($left['ingrediant_id']);
						
						//if($newLeft)
					}
					
				}
				
				
			}
			
			
			
			print_r($subtracted );
			exit();
		}
		
		
		
		public function Reduce_ING($Kdata)
		{	
			
			
			/* ResTable::model()->updateByPk($id, array('availability' =>'N'));
			$this->redirect(array('more/index')); */
			
			$Res_ids=array_unique(array_column($Kdata,'Id'));
			
			//print_r($Kdata);
			//exit();
			$sql3 = "SELECT res_item_id,ingrediant_id,regular_qty,large_qty 
			FROM pos.res_item_detail 
			WHERE res_item_id IN (".implode(',',$Res_ids).") order by ingrediant_id";
			
			$Rdata = Yii::app()->db->createCommand($sql3)->queryAll();
			
			
				
			$REDUC_ing=array();
			for($i=0;$i<Count($Rdata);$i++)
			{
				
				for($q=0;$q<Count($Kdata);$q++)
				{
					
					if($Kdata[$q]['Id']==$Rdata[$i]['res_item_id'])
					{
						
						
						$ing_id=$Rdata[$i]['ingrediant_id'];
						
						if($Kdata[$q]['Portion']=="L"){
							
							
							$reduce_qty=$Kdata[$q]['Quantity']*$Rdata[$i]['large_qty'];
						}
						else{
							
							$reduce_qty=$Kdata[$q]['Quantity']*$Rdata[$i]['regular_qty'];
						}
						
						array_push($REDUC_ing,array("ingrediant_id"=>$ing_id, "ingrediant_qty"=>$reduce_qty));
						
					}
					
					
				}
				
				
			}
			
			$RE_Ing = array_reduce($REDUC_ing, function ($a, $b) {
				isset($a[$b['ingrediant_id']]) ? $a[$b['ingrediant_id']]['ingrediant_qty'] += $b['ingrediant_qty'] : $a[$b['ingrediant_id']] = $b;  
				return $a;
			});
			
			
			$Ing_ids=array_unique(array_column($RE_Ing,'ingrediant_id'));
			
			$sql3 = "SELECT ingrediant_id,ingrediant_qty FROM kitchen_ingrediants WHERE ingrediant_id IN (".implode(',',$Ing_ids).");";
			
			$Idata = Yii::app()->db->createCommand($sql3)->queryAll();
			
			
			for($i=0;$i<Count($Idata);$i++)
			{
				
				foreach($RE_Ing as $_Ing)
				{	
					if($_Ing['ingrediant_id']==$Idata[$i]['ingrediant_id'])
					{
						//echo $_Ing['ingrediant_id']." ";
						$newqty= bcsub($Idata[$i]['ingrediant_qty'], $_Ing['ingrediant_qty'],0). '<br/>';
						
						KitchenIngrediants::model()->updateByPk($Idata[$i]['ingrediant_id'], array('ingrediant_qty' =>$newqty));
						
						
					}
					
					
				}
				
				
			}
			
			//	exit();
		}
		
	}
?>