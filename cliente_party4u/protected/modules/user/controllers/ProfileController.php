<?php

class ProfileController extends Controller
{
	public $defaultAction = 'profile';
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	/**
	 * Shows a particular model.
	 */
	public function actionProfile()
	{
		$this->render('edit');
	}
	public function crearThumb($imagen,$extension){ //OA 
		$img_original=$_SERVER['DOCUMENT_ROOT'].'images/perfiles/'.$imagen; //Ruta de la imagen
		$img_nueva =$_SERVER['DOCUMENT_ROOT'].'images/perfiles/thumbs/'.$imagen;
		$img_nueva_calidad = 100; 
		// crear imagen desde original
		switch($extension){
			case 'jpg':
				$img = imagecreatefromjpeg($img_original);
			break;
			case 'jpeg':
				$img = imagecreatefromjpeg($img_original);
			break;
			case 'gif':
				$img = imagecreatefromgif($img_original);
			break;
			case 'GIF':
				$img = imagecreatefromgif($img_original);
			break;
			case 'png':
				$img = imagecreatefrompng($img_original);
			break;
			case 'PNG':
				$img = imagecreatefrompng($img_original);
			break;
		}
		$r=1; $h=128;
		$original_w = imagesx($img);
		$original_h = imagesy($img);
		// Es resampleo vertical(por altura)
		if($r==1){
			if($w==0 && $h!=0){
				$img_nueva_altura = $h;
				$img_nueva_anchura = intval(($original_w/$original_h)*$h);
			}else{
				if($w!=0 && $h==0){
					$img_nueva_altura = intval(($original_h/$original_w)*$w);
					$img_nueva_anchura = $w;
				}else if($w!=0 && $h!=0){
					$img_nueva_altura = $h;			
					$img_nueva_anchura = $w;
				}
			}
		}else{
			$img_nueva_altura = $original_h;			
			$img_nueva_anchura = $original_w;
		}
		// Crear imagen nueva
		#$thumb = imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura);  
		$thumb = imagecreatetruecolor(128,128);  
		// Redimensionar imagen original copiandola en la imagen
		imagecopyresampled($thumb,$img,0,0,0,0,$img_nueva_anchura,$img_nueva_altura,imagesx($img),imagesy($img)); 
		// Guardar la imagen redimensionada donde indicia $img_nueva
		switch($extension){
			case 'jpg':
				imagejpeg($thumb,$img_nueva);
			break;
			case 'jpeg':
				imagejpeg($thumb,$img_nueva);
			break;
			case 'gif':
				imagegif($thumb,$img_nueva);
			break;
			case 'GIF':
				imagegif($thumb,$img_nueva);
			break;
			case 'png':
				imagepng($thumb,$img_nueva);
			break;
			case 'PNG':
				imagepng($thumb,$img_nueva);
			break;
		}
		imagedestroy($thumb);
	}
	public function actionSubirFoto(){
		$datos=Profile::model()->findByPk(Yii::app()->user->id);
		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			$fileName = $_FILES['file']['name'];
			$datos->foto = date('Y-m-d').'__'.$fileName;
			if($datos->save()){
				$datos->foto = date('Y-m-d').'__'.$fileName;
				$fileName = $datos->foto;
				$datos->save();
				$dir = $_SERVER['DOCUMENT_ROOT'].'images/perfiles/'.$fileName;
				$variable=Yii::app()->createUrl('/user/profile');
				if(move_uploaded_file($_FILES['file']['tmp_name'],$dir)){
					echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=$variable'>";
				}
				$nombre  = $fileName;
									$nombre = explode("__", $nombre);
									$extension  = $nombre[1];
									$extension = explode(".", $extension);
									$lugar = count($extension);
									$lugar = $lugar-1;
				$this->crearThumb($fileName,$extension[$lugar]);
			}
		}else{
			echo "ERROR no se pudo mover el archivo al directorio";
		}
	}
	public function actionEdit(){
		$model=$this->loadUser();
		$profile=$model->profile;
		// ajax validator
		/*if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form'){
			echo UActiveForm::validate(array($model,$profile));
			Yii::app()->end();
		}*/
		if(isset($_POST['User'])){
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];
			#if($model->validate()&&$profile->validate()){
				$model->save();
				$profile->save();
                // Yii::app()->user->updateSession();
				//Yii::app()->user->setFlash('success',UserModule::t("Changes are saved."));
				$this->redirect(array('/user/profile'));
			#} else $profile->validate();
		}
		$this->render('edit',array('model'=>$model,'profile'=>$profile,));
	}
	
	/**
	 * Change password
	 */
	public function actionChangepassword() {
		$model = new UserChangePassword;
		if (Yii::app()->user->id) {
			
			// ajax validator
			if(isset($_POST['ajax']) && $_POST['ajax']==='changepassword-form')
			{
				echo UActiveForm::validate($model);
				Yii::app()->end();
			}
			
			if(isset($_POST['UserChangePassword'])) {
					$model->attributes=$_POST['UserChangePassword'];
					if($model->validate()) {
						$new_password = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
						$new_password->password = UserModule::encrypting($model->password);
						$new_password->activkey=UserModule::encrypting(microtime().$model->password);
						$new_password->save();
						Yii::app()->user->setFlash('success',UserModule::t("New password is saved."));
						$this->redirect(array("profile"));
					}
			}
			$this->render('changepassword',array('model'=>$model));
	    }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser()
	{
		if($this->_model===null)
		{
			if(Yii::app()->user->id)
				$this->_model=Yii::app()->controller->module->user();
			if($this->_model===null)
				$this->redirect(Yii::app()->controller->module->loginUrl);
		}
		return $this->_model;
	}
}