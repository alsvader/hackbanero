<?php

class FiestaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('index',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		header('Content-type: application/json');
		if(isset($_POST['Fiesta'])){
			
			$model = new Fiesta();
			$model->= $_POST['Fiesta'];
			if ($model->save()) {
				$result=array('correct'=>true,'error'=>false,'msg'=>'success');
			} else {
				$data->password=$_POST['User']['password'];
				$result=array('correct'=>false,'error'=>true,'msg'=>'save_invalid');
			}

			#$result=array('correct'=>true,'error'=>false,'msg'=>'success');
			$data = array('fiesta'=>$model);
			$json = CJSON::encode(array('result'=>$result,'data'=>$data));

		}else{
			$json = CJSON::encode(array('result'=>array('correct'=>false,'error'=>true,'msg'=>'request_invalid'),'data'=>null));
		}
		Yii::app()->end($_GET['callback']."(".$json.")",true);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Fiesta']))
		{
			$model->attributes=$_POST['Fiesta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		header('Content-type: application/json');
		if(isset($_POST['user_id'])){
			$datos=User::model()->findByPk($_POST['user_id']);
			if ($datos!=null) {
				if($datos->superuser==1){
					$model = Fiesta::model()->findAll();
					$result=array('correct'=>true,'error'=>false,'msg'=>'success');						
				}else if ($datos->superuser==0){
					$model = Fiesta::model()->findAll("id_user=".$_POST['user_id']);
					$result=array('correct'=>true,'error'=>false,'msg'=>'success');
				}
				
			} else {
				$model = null;
				$result=array('correct'=>false,'error'=>true,'msg'=>'vacio');
			}
			$json = CJSON::encode(array('result'=>$result,'data'=>array('fiestas'=>$model)));
		}else{
			$json = CJSON::encode(array('result'=>array('correct'=>false,'error'=>true,'msg'=>'request_invalid'),'data'=>null));
		}
		Yii::app()->end($_GET['callback']."(".$json.")",true);
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Fiesta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Fiesta']))
			$model->attributes=$_GET['Fiesta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Fiesta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='fiesta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
