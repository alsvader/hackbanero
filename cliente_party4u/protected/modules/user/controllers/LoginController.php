<?php
class LoginController extends Controller
{
	public $layout='//layouts/main_login';
	public $defaultAction = 'login';

	/**
	 * Displays the login page
	 */
	public function actionLogin(){
		if(isset($_POST['UserLogin'])&&isset($_GET['callback'])){
			header('Content-type: application/json');
			$model=new UserLogin;
			$model->attributes=$_POST['UserLogin'];
			if($model->validate()){
				$this->lastViset();
				$result=array('correct'=>true,'error'=>false,'msg'=>'success');
			}else{
				$model = null;
				$result=array('correct'=>false,'error'=>true,'msg'=>'validation');
			}
			$json = CJSON::encode(array('result'=>$result,'data'=>$model));
			Yii::app()->end($_GET['callback']."(".$json.")",true);
		}else{
			$this->render('/user/login',array('model'=>$model));
		}
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}

}