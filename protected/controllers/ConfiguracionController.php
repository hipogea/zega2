<?php

class ConfiguracionController extends Controller
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
		return array('accessControl',array('CrugeAccessControlFilter'));
	}

	public function accessRules()
	{
		Yii::app()->user->loginUrl = array("/cruge/ui/login");
		return array(
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('editar','index','ver','creaconfig'),
				'users'=>array('@'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Settings;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Settings']))
		{
			$model->attributes=$_POST['Settings'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
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

		if(isset($_POST['Settings']))
		{
			$model->attributes=$_POST['Settings'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

private function pasadatos($model){
	foreach($model->getAttributes() as $clave=>$valor){
		$categoria=explode("_",$clave)[0];
		$nombreparametro=$clave;
		$valorparametro=$valor;
		Yii::app()->settings->set($categoria, $nombreparametro,$valorparametro, $toDatabase=true);

	}
	//$this->redirect(yii::app()->getBaseUrl(true));
	
}

	private function sacadatos($model){
		foreach($model->getAttributes() as $clave=>$valor){
			$categoria=explode("_",$clave)[0];
			//$nombreparametro=$clave;
			//$valorparametro=$valor;
			$model->{$clave}=Yii::app()->settings->get($categoria, $clave);

		}


	}

	public function actionIndex()
	{
		$model=New Configuraciongeneral();
		
		if(isset($_POST['Configuraciongeneral']))
		{

			//Yii::app()->end();
			$model->attributes=$_POST['Configuraciongeneral'];
			if(!$model->validate())
			{
				$this->pasadatos($model);
                                $this->render("ver",array("model"=>$model));
                                //$this->redirect(array($this->id."/ver"));
                                
			}
		} else {
			$this->sacadatos($model);
			$this->render('configuracion',array(
				'model'=>$model,
			));

		}
	}


public function actionver(){
    $model=New Configuraciongeneral();
    $this->sacadatos($model);
    $this->render("ver",array("model"=>$model));
    /*print_r(Yii::app()->settings->get('email'));
	echo "<br>";
	print_r(Yii::app()->settings->get('af'));
	echo "<br>";
	print_r(Yii::app()->settings->get('materiales'));
	echo "<br>";
	print_r(Yii::app()->settings->get('colectores'));
	echo "<br>";
	print_r(Yii::app()->settings->get('compras'));
	echo "<br>";
	print_r(Yii::app()->settings->get('Inventario'));
	echo "<br>";
	print_r(Yii::app()->settings->get('transporte'));
	echo "<br>";
	print_r(Yii::app()->settings->get('general'));
	echo "<br>";
	print_r(Yii::app()->settings->get('documentos'));
	echo "<br*/
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
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Configuracion('search');
                //var_dump($model);die();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Configuracion']))
			$model->attributes=$_GET['Configuracion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Settings the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Settings::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Settings $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='settings-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actioncreaparametro(){
            $model = new Configuracion();
        if (isset($_POST['Configuracion'])) {
            $model->attributes = $_POST['Configuracion'];
            if ($model->save())
                $this->redirect(array('admin'));
        }

        $this->render('_form_config', array(
            'model' => $model,
        ));
        
        
        
        }
        
        public function actioneditar($id){
            $id=(integer)  MiFactoria::cleanInput($id);
            
		$model=  Configuracion::model()->findByPk($id);
                if(is_null($model))
                      throw new CHttpException(500,'No se encontro un registro para este Id.');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Configuracion']))
		{
			$model->attributes=$_POST['Configuracion'];
			if($model->save()){
                            MiFactoria::Mensaje('success', 'Se modifico el parametro');
                            $this->redirect(array('view','id'=>$model->id));
                        }
				
		}

		$this->render('edicion',array(
			'model'=>$model,
		));
            
        
             }
        
}
