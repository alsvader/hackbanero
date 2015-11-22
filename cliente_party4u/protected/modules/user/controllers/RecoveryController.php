<?php

class RecoveryController extends Controller
{
	public $defaultAction = 'recovery';
	public $layout='//layouts/main_login';
	/**
	 * Recovery password
	 */
	public function actionHecho(){
		$this->render('hecho', array('error'=>0));
	}
	public function actionRecovery(){
		$form = new UserRecoveryForm;
		/*if(!Yii::app()->user->id){ #tiene que estár logeado el jefe
			$this->redirect(Yii::app()->controller->module->returnUrl);
		}else{*/
			$email = ((isset($_GET['email']))?$_GET['email']:'');
			$activkey = ((isset($_GET['activkey']))?$_GET['activkey']:'');
			if($email&&$activkey){
				$form2 = new UserChangePassword;
	    		$find = User::model()->notsafe()->findByAttributes(array('email'=>$email));
	    		if(isset($find)&&$find->activkey==$activkey){
		    		if(isset($_POST['UserChangePassword'])){
						$form2->attributes=$_POST['UserChangePassword'];
						if($form2->validate()) {
							$find->password = Yii::app()->controller->module->encrypting($form2->password);
							$find->activkey=Yii::app()->controller->module->encrypting(microtime().$form2->password);
							if($find->status==0){
								$find->status = 1;
							}
							$find->save();
							Yii::app()->user->setFlash('success',UserModule::t("New password is saved."));
							$registro = RecoveryPassword::model()->findByAttributes(array('email'=>$email));
							$registro->delete();
							#$this->redirect(Yii::app()->controller->module->recoveryUrl);
							$this->redirect(array('/RecoveryPassword/index'));
						}
					} 
					$this->render('changepassword',array('model'=>$form2));
	    		}else{
	    			Yii::app()->user->setFlash('error',UserModule::t("Incorrect recovery link."));
					$this->redirect(Yii::app()->controller->module->recoveryUrl);
	    		}
	    	}else{
		    	if(isset($_POST['UserRecoveryForm'])) {
		    		$form->attributes=$_POST['UserRecoveryForm'];
		    		if($form->validate()) {
		    			$user = User::model()->notsafe()->findbyPk($form->user_id);
						$activation_url = 'http://' . $_SERVER['HTTP_HOST'].$this->createUrl(implode(Yii::app()->controller->module->recoveryUrl),array("activkey" => $user->activkey, "email" => $user->email));
		    			$activation_url = 'http://' . $_SERVER['HTTP_HOST'].$this->createUrl('/user/recovery/recovery',array("activkey" => $user->activkey, "email" => $user->email));
						##
						$recoveryPass = new RecoveryPassword;
						$recoveryPass->idUser = $user->id;
						$recoveryPass->email = $user->email;
						$recoveryPass->link = $activation_url;
						$recoveryPass->save();
						$this->redirect(array('Recovery/hecho'));
						/*$subject = UserModule::t("You have requested a password recovery of {site_name}",
		    					array(
		    						'{site_name}'=>Yii::app()->name,
		    					));
		    			$message = UserModule::t("You have requested our password recovery services. To receive a new password, go to {activation_url}. Sincerely, Team of {site_name}",
		    					array(
		    						'{site_name}'=>Yii::app()->name,
		    						'{activation_url}'=>$activation_url,
		    					));
						
		    			UserModule::sendMail($user->email,$subject,$message);*/
		    			##
						#Yii::app()->user->setFlash('info',UserModule::t("Please check your email. Further instructions are sent to your email address."));
		    			#$this->refresh();
		    		}
		    	}
	    		$this->render('recovery',array('model'=>$form));
	    	}
	    #}
	}

}