
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - FREE Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE_DIR?>Public/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <script src="<?php echo BASE_DIR?>Public/assets/js/jquery.js"></script>

    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link href="<?php echo BASE_DIR?>Public/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_DIR?>Public/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_DIR?>Public/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_DIR?>Public/assets/lineicons/style.css">    
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">    
    <!-- Custom styles for this template -->
    <link href="<?php echo BASE_DIR?>Public/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo BASE_DIR?>Public/assets/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo BASE_DIR?>Public/datatable/cssdatatable.css" rel="stylesheet">
    <script src="<?php echo BASE_DIR?>Public/assets/js/chart-master/Chart.js"></script>
    
    <!--to do list style -->
     <link href="<?php echo BASE_DIR?>Public/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo BASE_DIR?>Public/assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_DIR?>Public/assets/css/to-do.css">
    
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="#" class="logo"><b>MNTIME <i class="fa fa-clock-o" aria-hidden="true"></i></b></a>
            <!--logo end-->
 
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?=BASE_DIR?>index/changepass">Change Password </a></li>
                    <li><a class="logout" href="<?=BASE_DIR?>index/logout">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
         <?php include 'View/function/menu.php';?>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            
              <div class="row">
                  <div class="col-lg-9 main-chart">
                      <?php 
                      if($this->current_action=="trangchu") {?>
                  	<div class="row mtbox">
                  	 <?php include "View/function/mtbox.phtml"; ?>
                  	</div><!-- /row mt -->
                        
                         <div class="row mt">                   
                         <?php include "View/function/managetime.php"; ?>
                        </div><!-- /row mt -->
                        
                        <div class="row mt">
                    
                         <?php include "View/function/todolist.phtml"; ?>
                        </div><!-- /row mt -->
                  
                        
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
              
                       <?php  include "View/function/notification.php";
                      } ?>
                      <?php if(isset($_SESSION['errbk'])) echo $_SESSION['errbk'];?>
                        <form method="post" action="<?=BASE_DIR?>forgot/mail">
                            <h2>Reset password My Account</h2>
                            <span>Email: </span>
                            <input type="email" name="email" id="email">
                            <input type="submit" name="submit"> 
                        </form>
      
                        
      
              </div>
      
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    
    
    
    
    <script src="<?php echo BASE_DIR?>Public/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo BASE_DIR?>Public/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo BASE_DIR?>Public/assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo BASE_DIR?>Public/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo BASE_DIR?>Public/assets/js/jquery.sparkline.js"></script>
    <script src="<?php echo BASE_DIR?>Public/datatable/datatable.js"></script>

    <!--common script for all pages-->
    
    <script type="text/javascript" src="<?php echo BASE_DIR?>Public/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?php echo BASE_DIR?>Public/assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="<?php echo BASE_DIR?>Public/assets/js/sparkline-chart.js"></script>    
     <script src="<?php echo BASE_DIR?>Public/assets/js/zabuto_calendar.js"></script>	
     <!--script for todolist -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="<?php echo BASE_DIR?>Public/assets/js/tasks.js" type="text/javascript"></script>
    <script src="<?php echo BASE_DIR?>Public/assets/js/morris-conf.js"></script>
    
    <script src="<?php echo BASE_DIR?>Public/assets/js/common-scripts.js"></script>

        <script>
      jQuery(document).ready(function() {
          TaskList.initTaskWidget();
      });

      $(function() {
          $( "#sortable" ).sortable();
          $( "#sortable" ).disableSelection();
      });

    </script>
  </body>
</html>
