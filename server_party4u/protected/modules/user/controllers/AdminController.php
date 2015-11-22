<?php

class AdminController extends Controller
{
	public $defaultAction = 'admin';
	public $layout='//layouts/column2';
	
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(),array(
			'accessControl', // perform access control for CRUD operations
		));
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
				// 'users'=>UserModule::getAdmins(),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('personal','personal2','admin','delete','create','update','AgregarUsuarioAOficina'),
				#'users'=>UserModule::getAdmins(),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	 * Manages all models.
	 */
	public function actionIndex(){
		header('Content-type: application/json');
		if(isset($_POST['user_id'])){
			$datos=User::model()->findByPk($_POST['user_id']);
			if($datos->superuser==1){
				$model = User::model()->findAll();
				$result=array('correct'=>true,'error'=>false,'msg'=>'success');
			}else{
				$model = null;
				$result=array('correct'=>false,'error'=>true,'msg'=>'validation');
			}
			$json = CJSON::encode(array('result'=>$result,'data'=>array('usuarios'=>$model)));
		}else{
			$json = CJSON::encode(array('result'=>array('correct'=>false,'error'=>true,'msg'=>'request_invalid'),'data'=>null));
		}
		Yii::app()->end($_GET['callback']."(".$json.")",true);
	}
	public function actionAdmin(){
		$datos=User::model()->findByPk(Yii::app()->user->id);
		$criteria = new CDbCriteria();
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User'])){
			$model->attributes=$_GET['User'];
		}else{
			/*switch($datos->profile->id_privilegio){
				case 'Jefe de departamento':
					if(Yii::app()->user->isAdmin()){*/
						$criteria->addCondition("status=1");
						$count=User::model()->count($criteria);
						$pages=new CPagination($count);
						$pages->pageSize=5;
						$pages->applyLimit($criteria);
						$modelCel=User::model()->findAll($criteria);
						$model=User::model()->findAll("status=1");
						$count=count($model);
			/*		}else{
						echo "ERROR";#ERROR
					}
				break;
				case 'Secretario de departamento':
					if(Yii::app()->user->isAdmin()){
						$model=User::model()->findAll();
					}else{
						echo "ERROR";#ERROR
					}
				break;
			}*/
		}
		#$this->render('index',array('model'=>$model,));
		$this->render('index',array('model'=>$model,'modelCel'=>$modelCel,'pages' => $pages,'pageSize'=>5,'count'=>$count));
	}

	/*public function action(){
		$model=;
		if(isset($_POST['Subdepto'])){
			$model->attributes=$_POST['Subdepto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
	}*/
	public function actionAgregarUsuarioAOficina(){
		Profile::model()->updateByPk($_POST['id'], array('idSub'=>$_POST['idSub'],'idDepartamento'=>$_POST['idDepartamento']));
		$this->redirect(array('admin/personal2'));
	}
	public function actionPersonal2(){
		$datos=User::model()->findByPk(Yii::app()->user->id);
		$criteria = new CDbCriteria();
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User'])){
			$model->attributes=$_GET['User'];
		}else{
			switch($datos->profile->privilegio){
				case 'Jefe de departamento':
					// results per page
					#################
					$modell=array();
					$model=User::model()->findAll();
					foreach ($model as $key) {
						if ($key->profile->idDepartamento==$datos->profile->idDepartamento) {
							$var=User::model()->findByPk($key->id);
							array_push($modell, $var);
						}
					}
					$model=$modell;
					$count=count($model);
					$pages=new CPagination($count);
					$pages->pageSize=5;
					#$pages->applyLimit();
					$modelCel=$modell;
					break;
				case 'Secretario de departamento':
					$modell=array();
					$model=User::model()->findAll();
					foreach ($model as $key) {
						if ($key->profile->idDepartamento==$datos->profile->idDepartamento) {
							$var=User::model()->findByPk($key->id);
							array_push($modell, $var);
						}
					}
					$model=$modell;
					break;
				case 'Jefe de oficina':
					$modell=array();
					$model=User::model()->findAll();
					foreach ($model as $key) {
						if ($key->profile->idSub==$datos->profile->idSub) {
							$var=User::model()->findByPk($key->id);
							array_push($modell, $var);
						}
					}
					$model=$modell;
					break;
			}
		}
		$this->render('miDepartamento',array('model'=>$model,'modelCel'=>$modelCel,'pages' => $pages,'pageSize'=>5,'count'=>$count));
	}
	public function actionPersonal(){
		$datos=User::model()->findByPk(Yii::app()->user->id);
		$criteria = new CDbCriteria();
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User'])){
			$model->attributes=$_GET['User'];
		}else{
			switch($datos->profile->privilegio){
				case 'Jefe de departamento':
					// results per page
					#################
					$modell=array();
					$model=User::model()->findAll();
					foreach ($model as $key) {
						if ($key->profile->idDepartamento==$datos->profile->idDepartamento) {
							$var=User::model()->findByPk($key->id);
							array_push($modell, $var);
						}
					}
					$model=$modell;
					$count=count($model);
					$pages=new CPagination($count);
					$pages->pageSize=5;
					#$pages->applyLimit();
					$modelCel=$modell;
					break;
				case 'Secretario de departamento':
					$modell=array();
					$model=User::model()->findAll();
					foreach ($model as $key) {
						if ($key->profile->idDepartamento==$datos->profile->idDepartamento) {
							$var=User::model()->findByPk($key->id);
							array_push($modell, $var);
						}
					}
					$model=$modell;
					break;
				case 'Jefe de oficina':
					$modell=array();
					$model=User::model()->findAll();
					foreach ($model as $key) {
						if ($key->profile->idSub==$datos->profile->idSub) {
							$var=User::model()->findByPk($key->id);
							array_push($modell, $var);
						}
					}
					$model=$modell;
					break;
			}
		}
		$this->render('index',array('model'=>$model,'modelCel'=>$modelCel,'pages' => $pages,'pageSize'=>5,'count'=>$count));
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView(){
		$datos = User::model()->findByPk(Yii::app()->user->id);
		$model = $this->loadModel();
		if(Yii::app()->user->isAdmin()){
			$this->render('view',array(
				'model'=>$model,
			));
		}else{
			switch($datos->profile->privilegio){
				case 'Jefe de departamento':
					//codigo para verificar si es que puede ver: checar si la solicitud está en su debido area
					if($model->profile->idDepartamento==$datos->profile->idDepartamento){
						$this->render('view',array('model'=>$model));
					}else{
						$var = Yii::app()->createUrl("/error/noTienesPermisosSuficientes");
						header('Location:'.$var);
						#Yii::app()->getController()->redirect(array("/error/noTienesPermisosSuficientes"));
						#$this->redirect(array('error/noTienesPermisosSuficientes'));
					}
					break;
				case 'Secretario de departamento':
					//codigo para verificar si es que puede ver: checar si la solicitud está en su debido area
					if($model->profile->idDepartamento==$datos->profile->idDepartamento){
						$this->render('view',array('model'=>$model));
					}else{
						$var = Yii::app()->createUrl("/error/noTienesPermisosSuficientes");
						header('Location:'.$var);
						#Yii::app()->getController()->redirect(array("/error/noTienesPermisosSuficientes"));
						#$this->redirect(array('error/noTienesPermisosSuficientes'));
					}
					break;
				case 'Personal de departamento':
					//codigo para verificar si es que puede ver: checar si la solicitud está en su debido area
					if($model->id==$datos->id){
						$this->render('view',array('model'=>$model));
					}else{
						$var = Yii::app()->createUrl("/error/noTienesPermisosSuficientes");
						header('Location:'.$var);
						#Yii::app()->getController()->redirect(array("/error/noTienesPermisosSuficientes"));
						#$this->redirect(array('error/noTienesPermisosSuficientes'));
					}
					break;
				case 'Jefe de oficina':
					//codigo para verificar si es que puede ver : checar si tiene la asignacion a la oficina respectiva
					if($model->profile->idSub==$datos->profile->idSub){
						$this->render('view',array('model'=>$model));
					}else{
						$var = Yii::app()->createUrl("/error/noTienesPermisosSuficientes");
						header('Location:'.$var);
						#Yii::app()->getController()->redirect(array("/error/noTienesPermisosSuficientes"));
						#$this->redirect(array('error/noTienesPermisosSuficientes'));
					}
					break;
				default:
			#$var = Yii::app()->createUrl("/error/noTienesPermisosSuficientes");
			#header('Location:'.$var);
					#Yii::app()->getController()->redirect(array("/error/noTienesPermisosSuficientes"));
			#	#$this->redirect(array('error/noTienesPermisosSuficientes'));
					break;
			}
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate(){
		header('Content-type: application/json');
		$model=new User;
		$profile=new Profile;
		$this->performAjaxValidation(array($model,$profile));
		if(isset($_POST['User'])){
			$model->attributes=$_POST['User'];
			$model->activkey=Yii::app()->controller->module->encrypting(microtime().$_POST['User']['password']);
			$model->password=Yii::app()->controller->module->encrypting($_POST['User']['password']);
			$model->status=1;
			$model->superuser=0;
			$profile->attributes=$_POST['Profile'];
			$profile->user_id=0;
			$profile->id_sub=1;
			$profile->foto=null;
			if($model->validate()&&$profile->validate()){
				if($model->save()){
					$profile->user_id=$model->id;
					$profile->save();
					$result=array('correct'=>true,'error'=>false,'msg'=>'success');
				}else{
					$data->password=$_POST['User']['password'];
					$result=array('correct'=>false,'error'=>true,'msg'=>'save_invalid');
				}
				#$result=array('correct'=>true,'error'=>false,'msg'=>'success');
				$data = array('user'=>$model,'profile'=>$profile);
				$json = CJSON::encode(array('result'=>$result,'data'=>$data));
			}else{
				$json = CJSON::encode(array('result'=>array('correct'=>false,'error'=>true,'msg'=>'request_invalid'),'data'=>null));
			}
		}else{
			$json = CJSON::encode(array('result'=>array('correct'=>false,'error'=>true,'msg'=>'request_invalid'),'data'=>null));
		}
		Yii::app()->end($_GET['callback']."(".$json.")",true);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		$profile=$model->profile;
		$this->performAjaxValidation(array($model,$profile));
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];
			
			if($model->validate()&&$profile->validate()) {
				$old_password = User::model()->notsafe()->findByPk($model->id);
				if ($old_password->password!=$model->password) {
					$model->password=Yii::app()->controller->module->encrypting($model->password);
					$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
				}
				$model->save();
				$profile->save();
				$this->redirect(array('view','id'=>$model->id));
			} else $profile->validate();
		}

		$this->render('update',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model = $this->loadModel();
			$profile = Profile::model()->findByPk($model->id);
			$profile->delete();
			$model->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('/user/admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	/**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($validate)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
        {
            echo CActiveForm::validate($validate);
            Yii::app()->end();
        }
    }
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->notsafe()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
}