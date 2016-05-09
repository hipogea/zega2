<?php

class OpcionescamposdocuController extends Controller
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
				'actions'=>array('create','update','view','admin','cargacampos','configurausuario','admin'),
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
		$model=new Opcionescamposdocu;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Opcionescamposdocu']))
		{
			$model->attributes=$_POST['Opcionescamposdocu'];
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

		if(isset($_POST['Opcionescamposdocu']))
		{
			$model->attributes=$_POST['Opcionescamposdocu'];
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
		$dataProvider=new CActiveDataProvider('Opcionescamposdocu');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Opcionescamposdocu('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Opcionescamposdocu']))
			$model->attributes=$_GET['Opcionescamposdocu'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Opcionescamposdocu the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Opcionescamposdocu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Opcionescamposdocu $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='opcionescamposdocu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actioncargacampos(){
		/*echo $_POST['coordocs']['modelo'];
        yii::app()->end();*/
		$nombremodelo=MiFactoria::cleanInput($_POST['Opcionescamposdocu']['nombredelmodelo']);

		$modelito=New $nombremodelo;
		/*var_dump($modelito);
        yii::app()->end();*/
		if(method_exists($modelito,'etiquetascampos')||function_exists('etiquetascampos')){
			$matri=$modelito->etiquetascampos();
		}else{
			$matri=$modelito->getAttributes();
		}


		foreach($matri as $clave =>$valor){
			echo CHtml::tag('option', array('value'=>$clave),CHtml::encode((method_exists($modelito,'etiquetascampos')||function_exists('etiquetascampos'))?$valor:$clave),true);
		}


	}


/*refresca los campos para cada usuario */
	public static function actualizacampos($docu){
		$docu=MiFactoria::cleanInput($docu);
		$matrizpadre=Opcionescamposdocu::Model()->findAll(" codocu=:cod",array(":cod"=>$docu));
		foreach($matrizpadre as $fila){
			$cantidadregistros=Yii::app()->db->createCommand()->select("id")
				->from( "{{opcionesdocumentos}}" )
				->where("idopdoc=:vidop AND idusuario=:vuser",array(":vidop"=>$fila->id,":vuser"=>yii::app()->user->id))
				->queryScalar();
			If (!$cantidadregistros) {
				$modex=new Opcionesdocumentos();
				$modex->setAttributes(array("idusuario"=>Yii::app()->user->id,"idopdoc"=>$fila->id),false);
				$modex->save();

			}
		}
		return true;
	}



	public function actionConfigurausuario(){

		$docu=MiFactoria::cleanInput(is_null($_GET['docu'])?'0':$_GET['docu']);
		$docuhijo=MiFactoria::cleanInput(is_null($_GET['docuhijo'])?'0':$_GET['docuhijo']);
		self::actualizacampos($docu);
		self::actualizacampos($docuhijo);
  /*
			$model = new Opcionescamposdocu();
			//$model->setScenario('INS_NUEVO');
			//$model->valorespordefecto($this->documentohijo);
			if (isset($_POST['Opcionescamposdocu'])) {
				$model->attributes = $_POST['Opcionescamposdocu'];
				if ($model->save())
					if (!empty($_GET['asDialog'])) {
						//Close the dialog, reset the iframe and update the grid
						echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		");
						Yii::app()->end();
					}
			}
			// if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';
			$this->render('_form_detalle', array(
				'model' => $model, 'codocu' => $docu
			));
*/
		$proveedor=VwOpcionesdocumentos::model()->search_us($docu,Yii::app()->user->id);
		$proveedor1=VwOpcionesdocumentos::model()->search_us($docuhijo,Yii::app()->user->id);
		$this->render('vw_admin_opciones',array(
			'proveedor'=>$proveedor,
			'proveedor1'=>$proveedor1,
			'codocu'=>$docu,
			'docuhijo'=>$docuhijo,
		));


		}




}
