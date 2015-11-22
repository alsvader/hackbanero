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
  <li class="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('user/admin/personal2'))?"active ":""?>">
    <a href="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('user/admin/personal2'))?"#":Yii::app()->createUrl('user/admin/personal2')?>">
      <i class="fa fa-users"></i> <span>Mi Departamento</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <li class="<?=$this->uniqueid=='recoveryPassword'?"active ":""?>">
    <a href="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('recoveryPassword'))?"#":Yii::app()->createUrl('recoveryPassword')?>">
      <i class="fa fa-unlock"></i> <span>Contraseñas</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <li class="<?=$this->uniqueid=='transferencia'?"active ":""?>">
    <a href="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('transferencia'))?"#":Yii::app()->createUrl('transferencia')?>">
      <i class="fa fa-exchange"></i> <span>Transferencias</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
</ul>