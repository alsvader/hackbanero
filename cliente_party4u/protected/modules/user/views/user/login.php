<div class="app">
  <div class="center-block w-xxl w-auto-xs p-v-md">
    <div class="navbar">
      <div class="navbar-brand m-t-lg text-center">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" style="
                width: 24px; height: 24px;">
          <path d="M 50 0 L 100 14 L 92 80 Z" fill="rgba(139, 195, 74, 0.5)"></path>
          <path d="M 92 80 L 50 0 L 50 100 Z" fill="rgba(139, 195, 74, 0.8)"></path>
          <path d="M 8 80 L 50 0 L 50 100 Z" fill="#fff"></path>
          <path d="M 50 0 L 8 80 L 0 14 Z" fill="rgba(255, 255, 255, 0.6)"></path>
        </svg>
        <span class="m-l inline">P A R T Y 4 U</span>
      </div>
    </div>
    <div class="p-lg panel md-whiteframe-z1 text-color m">
      <form id="form-login" method="post">
        <div class="md-form-group float-label">
          <input type="text" class="md-input" name="UserLogin[username]" required>
          <label>Nombre de Usuario</label>
        </div>
        <div class="md-form-group float-label">
          <input type="password" class="md-input" name="UserLogin[password]" required>
          <label>Constraseña</label>
        </div>      
        <div class="m-b-md">        
          <label class="md-check">
            <input type="checkbox" name="UserLogin[rememberMe]"><i class="indigo"></i> no cerrar sesion
          </label>
        </div>
        <button md-ink-ripple type="button" class="md-btn md-raised pink btn-block p-h-md iniciar">Sign in</button>
      </form>
    </div>
    <div class="p-v-lg text-center">
      <div>Aún no tienes una cuenta? <br><a href="<?=Yii::app()->createUrl('user/registration');?>" class="md-btn">Crear una cuena</a></div>
    </div>
  </div>
</div>

<?php
Yii::app()->clientScript->registerScript(
    'auth-login',
    '$("input").required=true;$("body").on("click",".iniciar",function(){
        $(".message").hide();
        $.ajax({
            //url: "http://'.$_SERVER['SERVER_NAME'].'/cliente_party4u/user/login.html",
            url: "http://'.$_SERVER['SERVER_NAME'].'/cliente_party4u/user/login.html",
            type: "post",
            dataType: "jsonp",
            data: $("#form-login").serialize(),
            success: function(data){
                console.log(data);
                if(data.result.correct==true){
                	//alert("HOLA estas logeado");
                    window.location.href = "'.Yii::app()->createUrl('/home/index').'";
                }else{
                    if(data.result.msg=="validation"){
                        $(".message").show();
                    }else{
                        console.log("error 500");
                    }
                }
            }
        });
    });',
    CClientScript::POS_READY
);
?>