	<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Menu Items<b></b></h3>
			
				</div>
			
				<div class="box-body " id="box-body">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
						<?php 
								$Item_cat= MainData::Bar_Item_Category();
								$BarItem= MainData::Saved_BarItem();
								$tab=1;
								foreach($Item_cat as $cat)
								{
									foreach($BarItem as $item)
									{
												
										if($cat['bcat_id']==$item['category'])
										{
											if($tab==1)
											{
											echo '<li class="active"><a href="#tab_'.$tab.'" data-toggle="tab">'.$cat['b_category'].'</a></li>';
											}
											else
											{
											echo '<li ><a href="#tab_'.$tab.'" data-toggle="tab">'.$cat['b_category'].'</a></li>';	
											}
											$tab++;
											continue 2;
										}
									}	
								}	
						?>
							        
						</ul>
							<div class="tab-content">
							<?php $tab=1;
							foreach($Item_cat as $cat){
									
								if($tab==1){
								echo ' <div class="tab-pane active" id="tab_'.$tab.'">';
								}
								else{
								echo ' <div class="tab-pane" id="tab_'.$tab.'">';
								}
								?>	
								
									<div class="direct-chat-messages">
										<ul class="products-list product-list-in-box ">
										<?php 
										
											foreach($BarItem as $item){
												
												if($cat['bcat_id']==$item['category'])
												{
												?>	
												<li class="item" style="cursor: pointer" onclick='additems("<?php echo $item['bar_item_id'];?>","<?php echo $item['beverage_name'];?>","0","0")'>
														
															<div class="product-img">
																<img src="dist/img/default-50x50.gif" alt="Product Image">
															</div>
														<div class="product-info">
														<?php echo $item['beverage_name'];
														
														if ($item['price_25ml']>0)
														{
															//echo "<span class='label label-success pull-right' >R: Rs.".$item['price_25ml']."</span><br/>";
														}
														if ($item['price_25ml']>0)
														{
															//echo "<span class='label label-success pull-right' >L: Rs.".$item['price_25ml']."</span>";
														}
														?>					
														<span class="product-description">
															
														</span>
													</div>
												
											</li>

													
											<?php  	}	
											
											
											}	?>										
											
										
											
										</ul>
									</div>
								</div>
									
										
							<?php $tab++;}?>

							
							
						
						
					</div><!--/tab-content-->
				</div><!--/nav-tabs-custom-->
					
			</div>	<!--/box-success-->
			<div class="box-footer clearfix"  id="box-footer">
						
					 
			</div>
		
			
				
		</div>