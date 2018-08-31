						
							
					<?php /* $con='Single';	
						echo '<optgroup label="Single">';
						
						foreach ($Aval_rooms as $room)
						{
							
							//echo  $room['room_no'].'-'.$Rmtype.'-'.$room['facility'].'<br/>';
							
							if($Rmtype==$room['facility'] && $con==$room['content'])
							{
						
							//echo  $room['room_no'].'-'.$Rmtype.'-'.$room['facility'].'<br/><br/>';
							
							echo  '<option>'.$room['room_no'].'</option>';

							}
	
						}
						
						echo '</optgroup>'; */
						
						$Single_opt='';
						$Double_opt='';
						
						
						foreach ($Aval_rooms as $room)
						{
							
							//echo  $room['room_no'].'-'.$Rmtype.'-'.$room['facility'].'<br/>';
							if($Rmtype==$room['facility'] && $room['content']=='Single')
							{
						
							
							$Single_opt=$Single_opt.'<option>'.$room['room_no'].'</option>';
						

							}
							
							if($Rmtype==$room['facility'] && $room['content']=='Double')
							{

							$Double_opt=$Double_opt.'<option>'.$room['room_no'].'</option>';
							
							}
							
							
							
						}
						//echo $Single_opt;
						if($Single_opt=='')
						{
							echo '<optgroup label="No Avabile Single Rooms">';
							echo '</optgroup>';
							}
						else{
							echo '<optgroup label="Single Rooms">';
							echo $Single_opt;
							echo '</optgroup>';
							}
						if($Double_opt=='')
						{
							echo '<optgroup label="No Avabile Double Rooms">';
							echo '</optgroup>';
							}
						else{
							echo '<optgroup label="Double Rooms">';
							echo $Double_opt;
							echo '</optgroup>';
							}	
						
						
						