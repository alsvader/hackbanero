<ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li class="<?=$this->uniqueid=='site'?"active ":""?>">
              <a href="<?=Yii::app()->createUrl('site/inicio',array())?>">
                <i class="fa fa-bar-chart-o"></i> <span>Panel</span> <i class="fa fa-angle-right pull-right"></i>
              </a>
            </li>
            <li class="<?=$this->uniqueid=='departamento'?"active ":""?>">
              <a href="<?=Yii::app()->createUrl('departamento')?>">
                <i class="fa fa-building"></i> <span>Departamento</span> <i class="fa fa-angle-right pull-right"></i>
              </a>
            </li>
            <li class="<?=$this->uniqueid=='user/admin'?"active ":""?>">
              <a href="<?=Yii::app()->createUrl('user/admin')?>">
                <i class="fa fa-users"></i> <span>Usuarios</span> <i class="fa fa-angle-right pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i> <span>Documentos</span> <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?=Yii::app()->createUrl('solicitud',array())?>"><i class="fa fa-circle-o"></i> Solicitudes</a></li>
                <li class=""><a href="<?=Yii::app()->createUrl('orden',array())?>"><i class="fa fa-circle-o"></i> Órdenes</a></li>
                <li class=""><a href="<?=Yii::app()->createUrl('solicitudBaja',array())?>"><i class="fa fa-circle-o"></i> Bajas</a></li>
              </ul>
            </li>
            <li class="<?=$this->uniqueid=='user/profile'?"active ":""?>">
              <a href="<?=Yii::app()->createUrl('user/profile')?>">
                <i class="fa fa-cogs"></i> <span>Configuración</span> <i class="fa fa-angle-right pull-right"></i>
              </a>
            </li>
          </ul>