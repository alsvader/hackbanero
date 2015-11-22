<?php
class LoginController extends Controller
{
	public $layout='//layouts/main_login';
	public $defaultAction = 'login';

	/**
	 * Displays the login page
	 */
	public function actionLogin(){
		header('Content-type: application/json');
		if(isset($_POST['UserLogin'])&&isset($_GET['callback'])){
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
		}else{
			$json = CJSON::encode(array('result'=>array('correct'=>false,'error'=>true,'msg'=>'request_invalid'),'data'=>null));
		}
		Yii::app()->end($_GET['callback']."(".$json.")",true);
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}

}