<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Party4U</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?=Yii::app()->baseUrl;?>/assets/libs/assets/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?=Yii::app()->baseUrl;?>/assets/libs/assets/font-awesome/css/font-awesome.css" type="text/css" />
  <link rel="stylesheet" href="<?=Yii::app()->baseUrl;?>/assets/libs/jquery/waves/dist/waves.css" type="text/css" />
  <link rel="stylesheet" href="<?=Yii::app()->baseUrl;?>/assets/styles/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="<?=Yii::app()->baseUrl;?>/assets/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?=Yii::app()->baseUrl;?>/assets/styles/font.css" type="text/css" />
  <link rel="stylesheet" href="<?=Yii::app()->baseUrl;?>/assets/styles/app.css" type="text/css" />

</head>
<?php $datos= User::model()->findByPk(Yii::app()->user->id);?>
<body>
<div class="app">
  <!-- aside -->
  <aside id="aside" class="app-aside modal fade folded" role="menu">
    <div class="left">
      <div class="box bg-white">
        <div class="navbar md-whiteframe-z1 no-radius blue">
            <!-- brand -->
            <a class="navbar-brand">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" style="
                    width: 24px; height: 24px;">
                  <path d="M 50 0 L 100 14 L 92 80 Z" fill="rgba(139, 195, 74, 0.5)"></path>
                  <path d="M 92 80 L 50 0 L 50 100 Z" fill="rgba(139, 195, 74, 0.8)"></path>
                  <path d="M 8 80 L 50 0 L 50 100 Z" fill="#f3f3f3"></path>
                  <path d="M 50 0 L 8 80 L 0 14 Z" fill="rgba(220, 220, 220, 0.6)"></path>
                </svg>
              <img src="images/logo.png" alt="." style="max-height: 36px; display:none">
              <span class="hidden-folded m-l inline">Party4U</span>
            </a>
            <!-- / brand -->
        </div>
        <div class="box-row">
          <div class="box-cell scrollable hover">
            <div class="box-inner">
              <div class="p hidden-folded blue-50" style="background-image:url(images/bg.png); background-size:cover">
                <div class="rounded w-64 bg-white inline pos-rlt">
                  <img src="images/a0.jpg" class="img-responsive rounded">
                </div>
                <a class="block m-t-sm" href="#">
                  <span class="block font-bold"><?php echo $datos->username; ?></span>
                  <?php echo $datos->email; ?>
                </a>
              </div>
              <div id="nav">
                <nav ui-nav>
                  <ul class="nav">
                      <li>
                      <a md-ink-ripple href="ui.chart.html">
                        <i class="pull-right up"></i> 
                        <i class="icon mdi-action-home i-20"></i>
                        <span class="font-normal">Inicio</span>
                      </a>
                    </li>
                      <li>
                      <a md-ink-ripple href="<?php echo Yii::app()->createUrl('parties/index');?>">
                        <i class="pull-right up"></i> 
                        <i class="icon mdi-social-cake i-20"></i>
                        <span class="font-normal">Parties</span>
                      </a>
                    </li>
                      <li>
                      <a md-ink-ripple href="ui.chart.html">
                        <i class="pull-right up"></i> 
                        <i class="icon mdi-editor-attach-money i-20"></i>
                        <span class="font-normal">Fondeos</span>
                      </a>
                    </li>
                      <li>
                      <a md-ink-ripple href="ui.chart.html">
                        <i class="pull-right up"></i> 
                        <i class="icon mdi-action-favorite i-20"></i>
                        <span class="font-normal">Siguiendo</span>
                      </a>
                    </li>
                      <li>
                      <a md-ink-ripple href="ui.chart.html">
                        <i class="pull-right up"></i> 
                        <i class="icon mdi-action-stars i-20"></i>
                        <span class="font-normal">Seguidores</span>
                      </a>
                    </li>
                      <?php if (Yii::app()->user->isAdmin()) { ?>
                      <li>
                      <a md-ink-ripple href="<?=Yii::app()->createUrl('usuarios/index');?>">
                        <i class="pull-right up"></i> 
                        <i class="icon mdi-social-group i-20"></i>
                        <span class="font-normal">Usuarios</span>
                      </a>
                    </li>
                    <?php } ?>
                  </ul>
                </nav>
              </div>
              <div id="account" class="hide m-v-xs">
                <nav>
                  <ul class="nav">
                    <li>
                      <a md-ink-ripple href="page.profile.html">
                        <i class="icon mdi-action-perm-contact-cal i-20"></i>
                        <span>My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a md-ink-ripple href="page.settings.html">
                        <i class="icon mdi-action-settings i-20"></i>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li>
                      <a md-ink-ripple href="lockme.html">
                        <i class="icon mdi-action-exit-to-app i-20"></i>
                        <span>Logout</span>
                      </a>
                    </li>
                    <li class="m-v-sm b-b b"></li>
                    <li>
                      <div class="nav-item" ui-toggle-class="folded" target="#aside">
                        <label class="md-check">
                          <input type="checkbox">
                          <i class="purple no-icon"></i>
                          <span class="hidden-folded">Folded aside</span>
                        </label>
                      </div>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </aside>
  <!-- / aside -->
  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="box">
      <!-- Content Navbar -->
      <div class="navbar md-whiteframe-z1 no-radius blue">
        <!-- Open side - Naviation on mobile -->
        <a md-ink-ripple  data-toggle="modal" data-target="#aside" class="navbar-item pull-left visible-xs visible-sm"><i class="mdi-navigation-menu i-24"></i></a>
        <!-- / -->
        <!-- Page title - Bind to $state's title -->
        <div class="navbar-item pull-left h4">Party4U</div>
        <!-- / -->
        <!-- Common tools -->
        <ul class="nav nav-sm navbar-tool pull-right">
          <li class="dropdown">
            <a md-ink-ripple data-toggle="dropdown">
              <i class="mdi-action-settings i-24"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-scale pull-right pull-up text-color">
              <li>
                <a href>
                  <i class="pull-right up"></i> 
                  <i class="icon mdi-social-person i-20"></i>
                  <span class="font-normal">Perfil</span>
                </a>
              </li>
              <li>
                <a href>
                  <i class="pull-right up"></i> 
                  <i class="icon mdi-action-lock i-20"></i>
                  <span class="font-normal">Cambair contraseña</span>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="<?php echo Yii::app()->createUrl('user/logout');?>">
                  <i class="pull-right up"></i> 
                  <i class="icon mdi-action-exit-to-app i-20"></i>
                  <span class="font-normal">Salir</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <div class="pull-right" ui-view="navbar@"></div>
        <!-- / -->
        <!-- Search form -->
        <div id="search" class="pos-abt w-full h-full blue hide">
          <div class="box">
            <div class="box-col w-56 text-center">
              <!-- hide search form -->
              <a md-ink-ripple class="navbar-item inline"  ui-toggle-class="show" target="#search"><i class="mdi-navigation-arrow-back i-24"></i></a>
            </div>
            <div class="box-col v-m">
              <!-- bind to app.search.content -->
              <input class="form-control input-lg no-bg no-border" placeholder="Search" ng-model="app.search.content">
            </div>
            <div class="box-col w-56 text-center">
              <a md-ink-ripple class="navbar-item inline"><i class="mdi-av-mic i-24"></i></a>
            </div>
          </div>
        </div>
        <!-- / -->
      </div>
      <!-- Content -->
      <?php echo $content; ?>
      <!-- / content -->
      <div class="modal fade" id="user" data-backdrop="false">
        <div class="right w-xl bg-white md-whiteframe-z2">
          <div class="box">
            <div class="p p-h-md">
              <a data-dismiss="modal" class="pull-right text-muted-lt text-2x m-t-n inline p-sm">&times;</a>
              <strong>Members</strong>
            </div>
            <div class="box-row">
              <div class="box-cell">
                <div class="box-inner">
                  <div class="list-group no-radius no-borders">
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                      <img src="images/a1.jpg" class="pull-left w-40 m-r img-circle">
                      <div class="clear">
                        <span class="font-bold block">Jonathan Doe</span>
                        <span class="clear text-ellipsis text-xs">"Hey, What's up"</span>
                      </div>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                      <img src="images/a2.jpg" class="pull-left w-40 m-r img-circle">
                      <div class="clear">
                        <span class="font-bold block">James Pill</span>
                        <span class="clear text-ellipsis text-xs">"Lorem ipsum dolor sit amet onsectetur adipiscing elit"</span>
                      </div>
                    </a>
                    <div class="p-h-md m-t p-v-xs">Work</div>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-success text-xs m-r-xs"></i>
                        <span>Jonathan Morina</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-success text-xs m-r-xs"></i>
                        <span>Mason Yarnell</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-warning text-xs m-r-xs"></i>
                        <span>Mike Mcalidek</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-muted-lt text-xs m-r-xs"></i>
                        <span>Cris Labiso</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-muted-lt text-xs m-r-xs"></i>
                        <span>Daniel Sandvid</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-muted-lt text-xs m-r-xs"></i>
                        <span>Helder Oliveira</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-muted-lt text-xs m-r-xs"></i>
                        <span>Jeff Broderik</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-muted-lt text-xs m-r-xs"></i>
                        <span>Daniel Sandvid</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-muted-lt text-xs m-r-xs"></i>
                        <span>Helder Oliveira</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-muted-lt text-xs m-r-xs"></i>
                        <span>Jeff Broderik</span>
                    </a>
                    <div class="p-h-md m-t p-v-xs">Partner</div>            
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-success text-xs m-r-xs"></i>
                        <span>Mason Yarnell</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-warning text-xs m-r-xs"></i>
                        <span>Mike Mcalidek</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-muted-lt text-xs m-r-xs"></i>
                        <span>Cris Labiso</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-muted-lt text-xs m-r-xs"></i>
                        <span>Jonathan Morina</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-muted-lt text-xs m-r-xs"></i>
                        <span>Daniel Sandvid</span>
                    </a>
                    <a data-toggle="modal" data-target="#chat" data-dismiss="modal"  class="list-group-item p-h-md">
                        <i class="fa fa-circle text-muted-lt text-xs m-r-xs"></i>
                        <span>Helder Oliveira</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-h-md p-v">
              <p>Invite People</p>
              <a href class="text-muted"><i class="fa fa-fw fa-twitter"></i> Twitter</a>
              <a href class="text-muted m-h"><i class="fa fa-fw fa-facebook"></i> Facebook</a>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="chat" data-backdrop="false">
        <div class="right w-xxl bg-white md-whiteframe-z2">
            <div class="box">
              <div class="p p-h-md">
                <a data-dismiss="modal" class="pull-right text-muted-lt text-2x m-t-n inline p-sm">&times;</a>
                <strong>Chat</strong>
              </div>
              <div class="box-row bg-light lt">
                <div class="box-cell">
                  <div class="box-inner">
                    <div class="p-md">
                      <div class="m-b">
                        <a href class="pull-left w-40 m-r-sm"><img src="images/a2.jpg" alt="..." class="w-full img-circle"></a>
                        <div class="clear">
                          <div class="p p-v-sm bg-warning inline r">
                            Hi John, What's up...
                          </div>
                          <div class="text-muted-lt text-xs m-t-xs"><i class="fa fa-ok text-success"></i> 2 minutes ago</div>
                        </div>
                      </div>
                      <div class="m-b">
                        <a href class="pull-right w-40 m-l-sm"><img src="images/a3.jpg" class="w-full img-circle" alt="..."></a>
                        <div class="clear text-right">
                          <div class="p p-v-sm bg-info inline text-left r">
                            Lorem ipsum dolor soe rooke..
                          </div>
                          <div class="text-muted-lt text-xs m-t-xs">1 minutes ago</div>
                        </div>
                      </div>
                      <div class="m-b">
                        <a href class="pull-left w-40 m-r-sm"><img src="images/a2.jpg" alt="..." class="w-full img-circle"></a>
                        <div class="clear">
                          <div class="p p-v-sm bg-warning inline r">
                            Good!
                          </div>
                          <div class="text-muted-lt text-xs m-t-xs"><i class="fa fa-ok text-success"></i> 5 seconds ago</div>
                        </div>
                      </div>
                      <div class="m-b">
                        <a href class="pull-right w-40 m-l-sm"><img src="images/a3.jpg" class="w-full img-circle" alt="..."></a>
                        <div class="clear text-right">
                          <div class="p p-v-sm bg-info inline text-left r">
                            Dlor soe isep..
                          </div>
                          <div class="text-muted-lt text-xs m-t-xs">Just now</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-h-md p-v">
                <a class="pull-left w-32 m-r"><img src="images/a3.jpg" class="w-full img-circle" alt="..."></a>
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Say something">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">SEND</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?=Yii::app()->baseUrl;?>/assets/libs/jquery/jquery/dist/jquery.js"></script>
<script src="<?=Yii::app()->baseUrl;?>/assets/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?=Yii::app()->baseUrl;?>/assets/libs/jquery/waves/dist/waves.js"></script>

<script src="<?=Yii::app()->baseUrl;?>/assets/scripts/ui-load.js"></script>
<script src="<?=Yii::app()->baseUrl;?>/assets/scripts/ui-jp.config.js"></script>
<script src="<?=Yii::app()->baseUrl;?>/assets/scripts/ui-jp.js"></script>
<script src="<?=Yii::app()->baseUrl;?>/assets/scripts/ui-nav.js"></script>
<script src="<?=Yii::app()->baseUrl;?>/assets/scripts/ui-toggle.js"></script>
<script src="<?=Yii::app()->baseUrl;?>/assets/scripts/ui-form.js"></script>
<script src="<?=Yii::app()->baseUrl;?>/assets/scripts/ui-waves.js"></script>
<script src="<?=Yii::app()->baseUrl;?>/assets/scripts/ui-client.js"></script>

</body>
</html>
