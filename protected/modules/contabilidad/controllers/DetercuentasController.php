<?php

class DetercuentasController extends Controller
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Detercuentas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Detercuentas']))
		{
			$model->attributes=$_POST['Detercuentas'];
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

		if(isset($_POST['Detercuentas']))
		{
			$model->attributes=$_POST['Detercuentas'];

			if($model->save()){
				if (!empty($_GET['asDialog']))
				{

					echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('grid-detercuentas');
							");


					Yii::app()->end();

				}
			}ELSE{
				//yii::app()->user->setFlash('error','Se han presentado los errores '.Yii::app()->mensajes->getErroresItem($model->geterrors()));

			}

		}
		if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';
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
		$dataProvider=new CActiveDataProvider('Detercuentas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->refrescar();
		$model=new VwDetercuentas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Detercuentas']))
			$model->attributes=$_GET['Detercuentas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Detercuentas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Detercuentas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Detercuentas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='detercuentas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function refrescar()
	{
		foreach(Catvaloracion::model()->findAll("tipo='M'") as $fila){
			foreach(Opcontables::model()->findAll("tipo='M'") as $filax){
				$registro=Detercuentas::model()->find(
					"codop=:vcodop and codcatval=:vcodcatval  ",
					array(":vcodop"=>$filax->codop,":vcodcatval"=>$fila->codcatval));
				if(is_null($registro)){
					$re=New Detercuentas('masivo');
					$re->setAttributes(
						array(
							'codop'=>$filax->codop,
							'codcatval'=>$fila->codcatval,
						)
					);
					$re->save();
				}
			}
		}

		foreach(Catvaloracion::model()->findAll("tipo='S'") as $fila){
			foreach(Opcontables::model()->findAll("tipo='S'") as $filax){
				$registro=Detercuentas::model()->find(
					"codop=:vcodop and codcatval=:vcodcatval  ",
					array(":vcodop"=>$filax->codop,":vcodcatval"=>$fila->codcatval));
				if(is_null($registro)){
					$re=New Detercuentas('masivo');
					$re->setAttributes(
						array(
							'codop'=>$filax->codop,
							'codcatval'=>$fila->codcatval,
						)
					);
					$re->save();
				}
			}
		}


	}
}
