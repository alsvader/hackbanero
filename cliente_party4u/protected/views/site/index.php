<div class="content-wrapper">
  <div class="container-fluid">
    <section class="content-header">
      <h1>Top Navigation<small>Example 2.0</small></h1>
    </section>
    <section class="content">
      <div class="col-md-12"></div>
      <div class="col-md-12">
        <center>
          <?php if (Yii::app()->user->isGuest) { ?>
            <a class="btn btn-app bg-green" style="width:200px;height:80px;" href="<?=Yii::app()->createUrl('user/login',array());?>">
              <i class="fa fa-sign-in" style="font-size:40px;"></i> Iniciar Sesión
            </a>
          <?php } else { ?>
            <a class="btn btn-app bg-green" style="width:200px;height:80px;" href="<?=Yii::app()->createUrl('user/logout',array());?>">
              <i class="fa fa-sign-out" style="font-size:40px;"></i> Salir
            </a>
          <?php } ?>
        </center>
      </div>
    </section>
  </div>
</div>