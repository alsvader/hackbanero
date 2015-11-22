<?php

class MaterialExtraController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
	public $url_server="hackbanero/server_party4u";
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('create','update','GeneratePdf','GenerateExcel'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new MaterialExtra;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['MaterialExtra'])){
			$model->idSolicitud=$_POST['MaterialExtra'];
			if(is_uploaded_file($_FILES['file']['tmp_name'])){
				$fileName = $_FILES['file']['name'];
				$model->nombre = date('Y-m-d').'__'.$fileName;
				if($model->save()){
					$model->nombre = date('Y-m-d').'__'.$fileName;
					$fileName = $model->nombre;
					$model->save();
					$dir = $_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl.'/archivos/solicitudes/'.$fileName;
					if(move_uploaded_file($_FILES['file']['tmp_name'],$dir)){
						echo "La imagen se subio correctamente";
					}
				}
			}
			/*$model->attributes=$_POST['MaterialExtra'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));*/
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}
	/*
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 
	public function actionCreate(){
		$model=new MaterialExtra;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['MaterialExtra'])){
			$model->attributes=$_POST['MaterialExtra'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		$this->render('create',array('model'=>$model,));
	}

	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MaterialExtra']))
		{
			$model->attributes=$_POST['MaterialExtra'];
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $session=new CHttpSession;
            $session->open();		
            $criteria = new CDbCriteria();            

                $model=new MaterialExtra('search');
                $model->unsetAttributes();  // clear any default values

                if(isset($_GET['MaterialExtra']))
		{
                        $model->attributes=$_GET['MaterialExtra'];
			
			
                   	
                       if (!empty($model->id)) $criteria->addCondition("id = '".$model->id."'");
                     
                    	
                       if (!empty($model->nombre)) $criteria->addCondition("nombre = '".$model->nombre."'");
                     
                    	
                       if (!empty($model->idSolicitud)) $criteria->addCondition("idSolicitud = '".$model->idSolicitud."'");
                     
                    			
                    $session['MaterialExtra_records']=MaterialExtra::model()->findAll($criteria); 
		}
       

                $this->render('index',array(
			'model'=>$model,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new MaterialExtra('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MaterialExtra']))
			$model->attributes=$_GET['MaterialExtra'];

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
		$model=MaterialExtra::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='material-extra-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
             if(isset($session['MaterialExtra_records']))
               {
                $model=$session['MaterialExtra_records'];
               }
               else
                 $model = MaterialExtra::model()->findAll();

		
		Yii::app()->request->sendFile(date('YmdHis').'.xls',
			$this->renderPartial('excelReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.extensions.bootstrap.gii.*');
		require_once('bootstrap/tcpdf/tcpdf.php');
		require_once('bootstrap/tcpdf/config/lang/eng.php');

             if(isset($session['MaterialExtra_records']))
               {
                $model=$session['MaterialExtra_records'];
               }
               else
                 $model = MaterialExtra::model()->findAll();



		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('MaterialExtra Report');
		$pdf->SetSubject('MaterialExtra Report');
		//$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Report", '');
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 0);
		$pdf->SetFont('dejavusans', '', 7);
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("MaterialExtra_002.pdf", "I");
	}
}
