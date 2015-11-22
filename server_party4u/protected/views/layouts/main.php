<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sistema GAR</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?=Yii::app()->request->baseUrl;?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?=Yii::app()->request->baseUrl;?>/assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?=Yii::app()->request->baseUrl;?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?=Yii::app()->request->baseUrl;?>/assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?=Yii::app()->request->baseUrl;?>/assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?=Yii::app()->request->baseUrl;?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=Yii::app()->request->baseUrl;?>/assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=Yii::app()->request->baseUrl;?>/assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?=Yii::app()->request->baseUrl;?>/assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <link href="<?=Yii::app()->request->baseUrl;?>/assets/plugins/lightbox/css/lightbox.css" rel="stylesheet"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php require_once 'Mobile_Detect.php';$detect = new Mobile_Detect; ?>
  <?php if ($detect->isMobile()): ?>
    <style type="text/css">
      .fixed .content-wrapper, .fixed .right-side {padding-top: 50px;}
    </style>
    <body class="skin-black sidebar-collapse fixed">
  <?php else: ?>
    <body class="skin-black sidebar-open fixed">
  <?php endif ?>
  <?php $datos=User::model()->findByPk(Yii::app()->user->id); ?>
    <div class="wrapper">
      <header class="main-header" style="box-shadow: 0 0 10px 0px rgba(0,0,0,0.6);">
        <a href="<?=Yii::app()->createUrl('index')?>" class="logo hidden-xs hidden-md"><b>Sistema</b> GAR</a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?=$datos->username?></span>&nbsp;&nbsp;<i class="fa fa-cogs"></i>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <?php if(isset($datos->profile->foto)): ?>
                      <img src="<?=Yii::app()->request->baseUrl.'/images/perfiles/thumbs/'.$datos->profile->foto?>" class="img-circle" alt="User Image" />
                    <?php else: ?>
                      <img src="<?=Yii::app()->request->baseUrl.'/images/perfiles/thumbs/no_disponible.jpg';?>" class="img-circle" alt="User Image" />
                    <?php endif ?>
                    <p>
                      <?=$datos->profile->nombres." ".$datos->profile->apellido_paterno." ".$datos->profile->apellido_materno?>
                      <small>Miembro desde <?=date("d/m/Y",strtotime($datos->create_at));?></small>
                    </p>
                  </li>
                  <li class="user-footer bg-gray">
                    <div class="text-center pull-left">
                      <a href="<?=Yii::app()->createUrl('user/profile')?>" class="btn btn-md bg-blue" <?=$this->uniqueid=='user/profile'?"disabled":""?>>Perfil</a>
                    </div>
                    <div class="text-center pull-right">
                      <a href="<?=Yii::app()->createUrl('user/logout')?>" class="btn btn-md bg-red">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="text-center image">
              <?php if(isset($datos->profile->foto)): ?>
                <img src="<?=Yii::app()->request->baseUrl.'/images/perfiles/thumbs/'.$datos->profile->foto?>" class="img-circle" alt="User Image" />
              <?php else: ?>
                <img src="<?=Yii::app()->request->baseUrl.'/images/perfiles/thumbs/no_disponible.jpg';?>" class="img-circle" alt="User Image" />
              <?php endif ?>
            </div>
            <div class="text-center info" style="padding:0px;margin:0px;">
              <p style="color:white;">
                <?=$datos->username;?>
              </p>
            </div>
          </div>
          <?php 
            switch($datos->profile->id_privilegio){
              case "Personal de departamento":
                include('menu_personalDepto.php');
              break;
              case "Secretario de departamento":
                if(Yii::app()->user->isAdmin()){
                  include('menu_admin.php');
                }else{
                  include('menu_jefeDepto.php');
                }
              break;
              case "Jefe de departamento":
                if(Yii::app()->user->isAdmin()){
                  include('menu_admin.php');
                }else{
                  include('menu_jefeDepto.php');
                }
              break;
              case "Jefe de oficina":
                include('menu_jefeOficina.php');
              break;
              default:
                if(Yii::app()->user->isAdmin()){
                  include('menu_admin.php');
                }else{
                  include('menu_desconocido.php');
                }
              break;
            }
        ?>
        </section>
      </aside>
      <div class="content-wrapper">
        <?php echo $content; ?>
      </div>
      <!--<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>-->
    </div>
    <!-- jQuery 2.1.3 -->
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <!--<script src="<?#=Yii::app()->request->baseUrl;?>/assets/plugins/morris/morris.min.js" type="text/javascript"></script>-->
    <!-- Sparkline -->
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- input.Masks -->
    <script src="<?=Yii::app()->baseUrl;?>/assets/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

    <!-- AdminLTE App -->
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?=Yii::app()->request->baseUrl;?>/assets/plugins/lightbox/js/lightbox.min.js"></script>
    <script type="text/javascript">
      /*$(document).ready(function() {
        if ("<?=$this->uniqueid?>"=="site") {
          $("body").removeClass("sidebar-collapse");
          $("body").addClass("sidebar-open");
          $("#modal_rechazar").modal("show");
        }
      });*/
    </script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="<?#=Yii::app()->request->baseUrl;?>/assets/dist/js/pages/dashboard.js" type="text/javascript"></script>-->
    <!-- AdminLTE for demo purposes -->
    <!--<script src="<?#=Yii::app()->request->baseUrl;?>/assets/dist/js/demo.js" type="text/javascript"></script>-->
      <!--
      <script type="text/javascript">
        $(document).ready(function() {
          function change_layout() {
            $("body").toggleClass("sidebar-collapse");
            $.AdminLTE.layout.fixSidebar();  
          }
        });
      </script>
      -->
      <!--<script type="text/javascript">
        $(document).ready(function() {
          change_layout("");
        });
      </script>-->
      <!--*7526-->
  </body>
</html>