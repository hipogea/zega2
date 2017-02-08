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
				'filename' => 'conteo.csv',
				'csvDelimiter' =>(Yii::app()->user->isGuest)?",":Yii::app()->user->getField('delimitador') , //i.e. Excel friendly csv delimiter
			),

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
				'actions'=>array('pickdata','pickerCodeBar', 'cierraconteo','descargainventario','generadetalle','create','update'),
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


		if(isset($_POST['Inventariofisicopadre']))
		{
			$model->attributes=$_POST['Inventariofisicopadre'];
			if(!is_null($model->findInventarioabierto($model->codcen,$model->codal))){//verificanosd primero si se han cerrado los otros inventarios
				MiFactoria::Mensaje('error','Ya existe un conteo abierto, cierrelo e intente nuevamente ');
				$this->render('create',array(
					'model'=>$model,
				));
				yii:app()->end();
			}

			if($model->save()){
				MiFactoria::Mensaje('success','Se ha creado el conteo');
				if(yii::app()->settings->get('inventario','inventario_bloqueado')=='1'){
					$registro=$model->almacen;
					$registro->setScenario('bloqueo');
					$registro->bloqueado='1';$registro->save();unset($registro);
					MiFactoria::Mensaje('notice','El conteo mantendrá bloqueado el inventario deeste almacen, no podrá efectuar movimietos de materiales
					durante el mismo hasta su cierre o anulación');
				}
				$this->redirect(array('update','id'=>$model->id));
			}
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
		if(!isset($_POST['ajax'])){



		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(!is_null($model->carga->numeroexitos > 0)){
			$inicio=$model->carga->logcarga[0]->id;
			if(!in_array($inicio,$model->idcargas()))
			$this->insertadetallecarga($model->id,$model->carga->numeroexitos,$inicio);

		}

		////para filtrar datos del listado
		$modelhijo=new Inventariofisico('search_por_padre');
		$modelhijo->unsetAttributes();  // clear any default values
		if(isset($_GET['Inventariofisico'])){
			$modelhijo->attributes=$_GET['Inventariofisico'];
			//var_dump($modelhijo->attributes);die();
		}


		///paral a funcion exportar
		$camposaexportar=array(
			'id',
			'cant',
			'ubicacion',
			'inventario.codart',
			'inventario.maestro.maestro_ums.desum',
			'inventario.maestro.descripcion',
			'inventario.ubicacion',
			'ubicacion',
			'diferencia',

		);
		if($model->esciego=='1')
			$camposaexportar[]='cantstock';
		//$camposaexportar1=array_merge($camposaexportar,array_values($model->camposstock));
		//Inventariofisico::model()->search_por_padre($model->id);
		//var_dump($model->search());die();
		$this->exportCSV($modelhijo->search_por_padre($id),$camposaexportar);




		if(isset($_POST['Inventariofisicopadre']))
		{
			$model->attributes=$_POST['Inventariofisicopadre'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,'modelhijo'=>$modelhijo
		));
	} //finde l ajax
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
		$fechaprog=$padre->fechaprog;
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
					'fecha'=>$fechaprog,
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
			'cant',
			'ubicacion',
			'inventario.codart',
			'inventario.maestro.maestro_ums.desum',
			'inventario.maestro.descripcion',
			'inventario.ubicacion',

		);
		if($mm->esciego=='1')
			$camposaexportar[]='cantstock';
		//$camposaexportar1=array_merge($camposaexportar,array_values($model->camposstock));
		//Inventariofisico::model()->search_por_padre($model->id);
		//var_dump($model->search());die();
		$this->exportCSV($model->search_por_padre($id),$camposaexportar);
	}



	private function insertadetallecarga($id,$nregistros,$inicio){
		$mn=New Cargainventariofisico();
		$mn->setAttributes(array(
			'hidpadre'=>$id,
			'fecha'=>date("Y-m-d H:i:s"),
			'iduser'=>yii::app()->user->id,
			'nregistros'=>$nregistros,
			'idinicio'=>$inicio
		));
		$mn->save(); unset($mn);
	}

  public function actioncierraconteo($id){
	  //para cerrar conteo debemos primero aegurarnos que se han ajustado todas las diferencias
		$modelo=$this->loadModel($id);
	  if(in_array($modelo->codestado,array('50','20'))){ //ANUALDO O CERRADO
		  MiFactoria::Mensaje('error','El status del registro no es válido para efectuar el cierre '.MiFactoria::linkregreso());
	  } ELSE {
		  ///El conteo no dee de tener ajustes pendientes
		  if($modelo->ajustespendientes >0){
			  MiFactoria::Mensaje('error','No se puede cerrar el conteo, aun existen ajustes pendientes '.MiFactoria::linkregreso());
		  }else{
			  $modelo->setScenario('estado');
			   $modelo->codestado='20';
			  $transaccion=$modelo->dbConnection->beginTransaction();
			  //ahora liebral os almacenews
			  if(yii::app()->settings->get('inventario','inventario_bloqueado')=='1'){
				  $registro=$modelo->almacen;
				  $registro->setScenario('bloqueo');
				  $registro->bloqueado=null ;$registro->save();unset($registro);
				  MiFactoria::Mensaje('notice','El cierre del conteo ha desbloqueado los movimientos del almacen '.MiFactoria::linkregreso());

			  }
			  $cantidad=$modelo->actualizaubicaciones();
			  $modelo->save();
			  $transaccion->commit();
			  MiFactoria::Mensaje('success','Se ha efectuado el cierre del conteo, se actualizaron ('.$cantidad.')  Ubicaciones ');
		  }
	  }
	  $this->render('view',array('model'=>$modelo));
  }

  ///Coge el codg de un text box y lo envia mefiante ajax al aservidor 
  ///posible uso LECTOR OPTICO DE CODIGO DE BARRAS 
  public function actionpickerCodeBar(){
      
      $this->render('codigobarras');
  }
  
  public function actionpickdata(){
      if(yii::app()->request->isAjaxRequest){  
         // var_dump($_POST);
          if(isset($_POST['codigo'])){    
              $id= MiFactoria::cleanInput($_POST['codigo']);   
              $registro= Maestrocompo::model()->findByPk($id); 
              if(is_null($registro))             
                  throw new CHttpException(500,'NO se encontro el registro con el id '.$id);        
               
              $registro->setScenario('prueba');
              $registro->detalle="modifico";
              if($registro->save()){
                   echo "grabo";
              }else{
                  echo yii::app()->mensajes->getErroresItem($registro->geterrors());
              }
                 
              
          }     
              }
      
  }
  
}
