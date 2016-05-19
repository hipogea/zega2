<?php

class InventariofisicopadreController extends Controller
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


	public function behaviors() {
		return array(

			'exportableGrid' => array(
				'class' => 'application.components.ExportableGridBehavior',
				'exportParam'=>'exportacion',
				'filename' => 'Inventario.csv',
				'csvDelimiter' =>(Yii::app()->user->isGuest)?",":Yii::app()->user->getField('delimitador') , //i.e. Excel friendly csv delimiter
			));
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('descargainventario','generadetalle','create','update'),
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
		$model=new Inventariofisicopadre;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inventariofisicopadre']))
		{
			$model->attributes=$_POST['Inventariofisicopadre'];
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

		if(isset($_POST['Inventariofisicopadre']))
		{
			$model->attributes=$_POST['Inventariofisicopadre'];
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
		$dataProvider=new CActiveDataProvider('Inventariofisicopadre');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Inventariofisicopadre('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Inventariofisicopadre']))
			$model->attributes=$_GET['Inventariofisicopadre'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Inventariofisicopadre the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Inventariofisicopadre::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Inventariofisicopadre $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='inventariofisicopadre-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function eseditable($codestado=null){
	 return true;
   }

	public function  actiongeneradetalle($id){

		$id=(integer)MiFactoria::cleanInput($id);
		$padre=$this->loadModel($id);
		$itemsinsertados=$padre->numeroitems;
		$inve=New Alinventario();
		$itemsiventario=$inve->getnumeroitems($padre->codcen,$padre->codal);
		unset($inve);
		if($itemsinsertados < $itemsiventario){
			$this->insertahijos($id);
		}else{
			MiFactoria::Mensaje('success','Se insertaron todos los registros ('.$itemsinsertados.') del stock ('.$itemsiventario.') ');
		}

	}


	private function insertahijos($id){
		//verificando que el inventario no este en le registro hijo
		$inventario=New Alinventario();
		$camposumas=$inventario->getsumas();
		$cadenacampos=$inventario->getcadenacampos();
		unset($inventario);
		$padre=$this->loadModel($id);
		$alma=$padre->codal;$centro=$padre->codcen;
		unset($padre);
		$idhijos=Yii::app()->db->createCommand()
			->select('hidinventario')
			->from('{{inventariofisico}} ')
			->where("hidinventario=:id",array(":id"=>$id))
			//->group('a.codalm,  a.codcen')
			->queryColumn();

			$criterio=New CDBCriteria;
			$criterio->addCondition(" ( ".$cadenacampos.") >0 ");
		  	$criterio->addCondition("codalm=:codalm and codcen=:codcen");
			$criterio->params=array(":codalm"=>$alma,"codcen"=>$centro);
			$criterio->addNotInCondition("id",$idhijos);
		$arrayinventario=Yii::app()->db->createCommand()
			->select('('.$cadenacampos.') as stock_total, a.id ')
			->from('{{alinventario}} a ')
			->where($criterio->condition,$criterio->params)
			->queryAll();
		unset($criterio);
		//var_dump($arrayinventario);
		foreach($arrayinventario as $fila){
			$registro=New Inventariofisico('padre');
			$registro->setAttributes(
				array(
				'hidinventario'=>$fila['id'],
				'hidpadre'=>$id,
					'cant'=>0,  ///CANTIDAD CEOR PORQUE AUN NOS E HA CONTYADO  OJO
					'cantstock'=>$fila['stock_total']+0,
					'fechacre'=>date("Y-m-d H:i:s"),
					'diferencia'=>0, ///DIREFENCIA

					));
			 if(!$registro->save())
				 print_r($registro->geterrors());

		}
	}

	public function actiondescargainventario($id){
		//$almacen=MiFactoria::cleanInput($_GET['codal']);$id=
		$id=(integer)MiFactoria::cleanInput($id);
		$mm=$this->loadModel($id);

		$model=New Inventariofisico();
		//var_dump($almacen);die();
		//var_dump($model->search_por_almacen_con_stock($almacen)->getdata());die();
		$camposaexportar=array(
			'id',
			'cantstock',
			'ubicacion',
			'inventario.codart',
			'inventario.maestro.maestro_ums.desum',
			'inventario.maestro.descripcion',

		);
		//$camposaexportar1=array_merge($camposaexportar,array_values($model->camposstock));
		//Inventariofisico::model()->search_por_padre($model->id);
		$this->exportCSV($model->search_por_padre($id),$camposaexportar);
	}
}
