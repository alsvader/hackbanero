<?php $datos = User::model()->findByPk(Yii::app()->user->id); ?>
<div class="box-row">
    <div class="box-cell">
        <div class="box-inner padding">
          <div class="padding-out">
            <div class="p-h-md p-v bg-white box-shadow pos-rlt">
              <h3 class="no-margin">Mi Perfil</h3>
            </div>
            <div class="box">
              <div class="col-md-3">
                <div style="background:url(images/a1.jpg) center center; background-size:cover">
                  <div class="p-lg bg-white-overlay text-center">
                    <a href class="w-xs inline">
                      <img src="<?=Yii::app()->baseUrl.'/images/perfiles/no_disponible.jpg'?>" alt="" class="img-circle img-responsive" style="border:3px solid #ccc;">
                    </a>
                    <div class="m-b m-t-sm h2">
                      <span class="text-black"><?=$datos->username;?></span>
                    </div>
                  </div>
                </div>
                <ul class="nav nav-lists b-t" ui-nav>
                  <li class="active">
                    <a href>Perfil Público</a>
                  </li>
                  <li>
                    <a href>Cambiar Contraseña</a>
                  </li>
                </ul>
              </div>
              <div class="col-md-9 b-l bg-white bg-auto">
                <div class="p-md bg-light lt b-b font-bold">Perfil Público</div>
                <form role="form" class="p-md col-md-6">
                  <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" class="form-control" value="<?=$datos->profile->nombres?>">
                  </div>
                  <div class="form-group">
                    <label>Apellido Paterno</label>
                    <input type="text" class="form-control" value="<?=$datos->profile->apellido_paterno?>">
                  </div>
                  <div class="form-group">
                    <label>Apellido Materno</label>
                    <input type="text" class="form-control" value="<?=$datos->profile->apellido_materno?>">
                  </div>
                  <div class="form-group">
                    <label>Correo Electrónico</label>
                    <input type="email" class="form-control" value="<?=$datos->email;?>">
                  </div>
                  <button type="submit" class="btn btn-info m-t">Guardar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>