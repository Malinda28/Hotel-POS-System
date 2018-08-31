
				<select class="form-control" id="volume-id">
										<option value="0">Select</option>
										<?php
										
										for($i=0;$i<count($volumes);$i++)
										{
											if($selectvol==$volumes[$i])
											{
												echo '<option value="'.$volumes[$i].'" id="'.$volumes[$i].'" Selected>'.$volumes[$i].'</option>';
											}
											else 
											{
												echo '<option value="'.$volumes[$i].'" id="'.$volumes[$i].'">'.$volumes[$i].'</option>';
											}
										}
										?>	
										
				</select>