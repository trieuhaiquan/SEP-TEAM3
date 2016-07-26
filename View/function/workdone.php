
  <section class="wrapper" style="margin-top:0px;">
    <h3><i class="fa fa-tags" aria-hidden="true"></i>Your Work Done</h3>
  <div class="row mt">
    <div class="col-lg-12">
              <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> List Work Done</h4>
                  <section id="unseen">
                    <table class="display">
                      <thead>
                      <tr>
                          <th style="text-align: center;" class="numeric">Number</th>
                          <th style="text-align: center;" class="numeric">Name Of Tag</th>
                          <th style="text-align: center;" class="numeric">Real Time End</th>
                          <th style="text-align: center;" class="numeric">Total Time Used</th>
                          <th style="text-align: center;" class="numeric">Status</th>
                          <th class="numeric">Edit</th>
                      </tr>
                      </thead>
                      <tbody>
                      
               <?php 
               $stt=1;
               foreach($workdone as $t)
               {
                   $endreal = strtotime($t['timeendreal']);
                   $timest = strtotime($t['timestartreal']);
                   $timee = strtotime($t['timeend']);
                   $total = $endreal - $timest;
                   $total2 = floor((($total)/60/60))." Hours ".Round((($total)/60%60))." Mins";
                   
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $stt++;?></td>
                            <td style="text-align: center;"><?php echo $t['tentag'];?></td>
                            <td style="text-align: center;"><?php echo $t['timeendreal'];?></td>
                            <td style="text-align: center;"><?php echo $total2 ?></td>
                    
                            <td style="text-align: center;">
                               <?php if($t['totaltime']<=$t['totalestimate'])
                                   echo '<i class="fa fa-smile-o" aria-hidden="true" style="color:green;"> Congratulations!! You are doing well</i>!';
                                   else echo '<i class="fa fa-frown-o" aria-hidden="true" style="color:red;"> Sorry you are late!!! Get better</i>';
                                   ?>
                            </td>
                            <td> 
                                <a href='#' class="xoa" onclick="myFunction(this)" id="<?php echo $t['id']; ?>"> <i class="fa fa-trash-o" aria-hidden="true" style="font-size: 20px; color: red;"></i> </a>
                            </td>
                        </tr>
               <?php }?>
                  
                          
                     

                    
                      </tbody>
                  </table>
                  </section>
          </div><!-- /content-panel -->
       </div><!-- /col-lg-4 -->     
</div><!-- /row -->


</section>
<script>
$(document).ready(function() {
$('table.display').DataTable();
} );
</script>
<script>

                function myFunction(oObject)
                 {
                       var id = oObject.id;
                       var hoi =confirm("Are you sure to delete?");
                       if(hoi==true)
                       {
                       window.location="<?php echo BASE_DIR?>index/xoadone/" +id;
                        }
                        else return false;
                 }
</script>
