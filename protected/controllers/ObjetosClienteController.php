<?php

class ObjetosClienteController extends Controller
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
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		Yii::app()->user->loginUrl = array("/cruge/ui/login");
			return array(

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin','view','Ajaxborraequipo','agregarequipo','create','update'),
				'users'=>array('@'),
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
		$model=new ObjetosCliente;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ObjetosCliente']))
		{
			$model->attributes=$_POST['ObjetosCliente'];
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

		if(isset($_POST['ObjetosCliente']))
		{
			$model->attributes=$_POST['ObjetosCliente'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('ObjetosCliente');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ObjetosCliente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ObjetosCliente']))
			$model->attributes=$_GET['ObjetosCliente'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ObjetosCliente the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ObjetosCliente::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ObjetosCliente $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='objetos-cliente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAgregarequipo($idcabeza)
	{
		$idcabeza=(int)$idcabeza;
		$modelocabeza=ObjetosCliente::model()->findbypk($idcabeza);
		if(is_null($modelocabeza))
			throw new CHttpException(500,'No existe este objeto con este ID');
		$model=new Objetosmaster();
		$model->hidobjeto=$modelocabeza->id;
		if(isset($_POST['Objetosmaster']))
		{
			$model->attributes=$_POST['Objetosmaster'];
			if($model->save())
				//if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialog').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		");
					Yii::app()->end();
				}


		}
		// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('_formmaster',array(
			'model'=>$model, 'idcabeza'=>$idcabeza
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAjaxborraequipo()
	{
		$identidad=(int)$_GET['id'];
		$modeloaborrar=Objetosmaster::model()->findByPk($identidad);
		if(!is_null($modeloaborrar)){
			$modeloaborrar->delete();
			ECHO "BORRO";
		} ELSE {
			ECHO "NO ENCONTRO";
		}
	}


}
