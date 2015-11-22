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
  <li class="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('orden/index'))?"active ":""?>">
    <a href="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('orden/index'))?"#":Yii::app()->createUrl('orden/index')?>">
      <i class="fa fa-file"></i> <span>Órdenes</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <li class="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('user/admin/personal'))?"active ":""?>">
    <a href="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('user/admin/personal'))?"#":Yii::app()->createUrl('user/admin/personal')?>">
      <i class="fa fa-users"></i> <span>Personal</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
</ul>