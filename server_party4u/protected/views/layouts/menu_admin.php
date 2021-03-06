<ul class="sidebar-menu">
  <li class="header"><?php echo $datos->profile->depto->nombre_departamento; ?></li>
  <li class="<?=$this->uniqueid=='site'?"active ":""?>">
    <a href="<?=Yii::app()->createUrl('site/inicio',array())?>">
      <i class="fa fa-bar-chart-o"></i> <span>Panel</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <li class="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('solicitud/index'))?"active ":""?>">
    <a href="<?=Yii::app()->createUrl('solicitud/index')?>">
      <i class="fa fa-file"></i> <span>Solicitudes</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <li class="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('orden/index'))?"active ":""?>">
    <a href="<?=Yii::app()->createUrl('orden/index')?>">
      <i class="fa fa-file"></i> <span>Órdenes</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <li class="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('user/admin/personal2'))?"active ":""?>">
    <a href="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('user/admin/personal2'))?"#":Yii::app()->createUrl('user/admin/personal2')?>">
      <i class="fa fa-users"></i> <span>Mi Departamento</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <?php /* ?>
  <li class="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('user/admin/personal'))?"active ":""?>">
    <a href="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('user/admin/personal'))?"#":Yii::app()->createUrl('user/admin/personal')?>">
      <i class="fa fa-users"></i> <span>Personal</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <li class="<?=$this->uniqueid=='subdepto'?"active ":""?>">
    <a href="<?=Yii::app()->createUrl('subdepto')?>">
      <i class="fa fa-building"></i> <span>Oficinas</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <?php */ ?>
  <li class="header">Opciones</li>
  <li class="<?=$this->uniqueid=='departamento'?"active ":""?>">
    <a href="<?=Yii::app()->createUrl('departamento')?>">
      <i class="fa fa-building"></i> <span>Departamentos</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <li class="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('user/admin'))?"active ":""?>">
    <a href="<?=Yii::app()->createUrl('user/admin')?>">
      <i class="fa fa-users"></i> <span>Usuarios</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-files-o"></i> <span>Documentos</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li class=""><a href="<?=Yii::app()->createUrl('documentos/solicitudes',array())?>"><i class="fa fa-circle-o"></i> Solicitudes</a></li>
      <li class=""><a href="<?=Yii::app()->createUrl('documentos/ordenes',array())?>"><i class="fa fa-circle-o"></i> Órdenes</a></li>
      <li class=""><a href="<?=Yii::app()->createUrl('documentos/solicitudBajaes',array())?>"><i class="fa fa-circle-o"></i> Bajas</a></li>
    </ul>
  </li>
  <li class="<?=$this->uniqueid=='transferencia'?"active ":""?>">
    <a href="<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('transferencia'))?"#":Yii::app()->createUrl('transferencia')?>">
      <i class="fa fa-exchange"></i> <span>Transferencias</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <?php /* ?>
  <li class="<?=$this->uniqueid=='user/profile'?"active ":""?>">
    <a href="<?=Yii::app()->createUrl('user/profile')?>">
      <i class="fa fa-cogs"></i> <span>Configuración</span> <i class="fa fa-angle-right pull-right"></i>
    </a>
  </li>
  <?php */ ?>
</ul>