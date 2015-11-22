<ul class="sidebar-menu">
  <li class="header"><?php echo $datos->profile->depto->nombre_departamento; ?></li>
  <li class="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('site/inicio'))?"active ":""?>">
    <a href="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('site/index'))?"#":Yii::app()->createUrl('site/index')?>">
      <i class="fa fa-bar-chart-o"></i> <span>Panel</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <li class="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('solicitud/index'))?"active ":""?>">
    <a href="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('solicitud/index'))?"#":Yii::app()->createUrl('solicitud/index')?>">
      <i class="fa fa-file"></i> <span>Solicitudes</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <!--<li class="<?#=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('orden/index'))?"active ":""?>">
    <a href="<?#=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('orden/index'))?"#":Yii::app()->createUrl('orden/index')?>">
      <i class="fa fa-file"></i> <span>Órdenes</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>-->
  <!--<li class="<?#=$this->uniqueid=='subdepto'?"active ":""?>">
    <a href="<?#=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('subdepto'))?"#":Yii::app()->createUrl('subdepto')?>">
      <i class="fa fa-building"></i> <span>Oficina</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>-->
  <li class="header">Opciones</li>
  <li class="<?=$this->uniqueid=='user/profile'?"active ":""?>">
    <a href="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('user/profile'))?"#":Yii::app()->createUrl('user/profile')?>">
      <i class="fa fa-cogs"></i> <span>Configuración</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
</ul>