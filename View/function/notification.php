          <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>NOTIFICATIONS</h3>
                                        
                      <!-- First Action -->
                      <?php foreach($managetime as $t){?>
                      <div class="desc">
                      	<div class="thumb">
                      		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                      	</div>
                      	<div class="details">
                            <p style="font-weight: bolder;"><muted> <?= $t['tentag'];?></muted><br/></p>
                      		   <a href="<?=BASE_URL?>index/managetime">Time Start: </a><?php echo $t['timestart'];?> <br/>
                      		
                      	</div>
                      </div>

                      <?php }?>


	
                      
                  </div><!-- /col-lg-3 -->