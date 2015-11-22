<?php

class PartiesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $url_server="/server_party4u";
	public $layout='//layouts/column2';
	public $uniqueid="Fiestas";
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
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('fondeos', 'ver'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex(){
		if (isset($_POST['data'])) {
			$this->render('_index', array('datos'=>$_POST['data']['fiestas']));
		} else {
			$fiestas = Fiesta::model()->findAll("fecha_ini>=".date('Y-m-d'));
			$this->render('index', array('fiestas'=>$fiestas));
		}
	}

	public function actionFondeos() {
		$this->render('fondeos', array());
	}

	public function actionVer(){
		$this->render('ver', array());	
	}

	public function actionCreate() {
		$this->render('create', array());
	}
	
}
