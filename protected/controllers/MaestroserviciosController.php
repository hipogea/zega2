<?php

class MaestroserviciosController extends ControladorBase
{

	public $eseditable= true;
	public $campoestado= 'cestadovale';
const CODIGO_MOVIMIENTO_INGRESO_ACTIVIDAD='68';
const CODIGO_MOVIMIENTO_ANULAR_INGRESO_ACTIVIDAD='86';
const CODIGO_DOC_VALE_ALMACEN='101';
const ESTADO_EFECTUADO='20';
const ESTADO_CREADO='10';
const ESTADO_PREVIO='99';


	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';


	public function __construct() {
		parent::__construct($id='maestroservicios',Null);
		$this->documento=CODIGO_DOC_VALE_ALMACEN;
		$this->modelopadre='Almacendocs';
		$this->modeloshijos=array('Alkardex'=>'Tempalkardex');
		$this->documentohijo='460';
		$this->campoestado='cestadovale';
		$this->ConfigArreglos();
		//$nuevo=new $this->modelopadre;
		//$this->campoenlace=$nuevo->getFieldLink($nuevo->relations(),$this->modelopadre,);

	}


	public function filters()
	{
		return array('accessControl',array('CrugeAccessControlFilter'));
	}

	private function Verificamov($mov){
		if(is_null(Almacenmovimientos::model()->findByPk($mov)) )
			throw new CHttpException(500,' No se encontro el movimiento ');
	}


	/****************************************************
	 *	Retorna una cadena '' o 'disabled' para deshabilitar los controles del form de la vista
	 *   este es un flag para deshabilitar controles y no recarga Sqls , ES PLANO
	 ****************************************************/
	public function eseditable($estadodelmodelo)
	{
		if ( $estadodelmodelo=='99' or empty($estadodelmodelo) or is_null($estadodelmodelo)) {return '';} else{return 'disabled';}
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
				'actions'=>array('anulaconformidad','conformidades','borraitems','admin','editar','ver','anular','listado','confirmar','creaconformidad','create','update'),
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
		$model=new Maestroservicios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Maestroservicios']))
		{
			$model->attributes=$_POST['Maestroservicios'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function efectuamovimiento($model /*$id*/){

		$kardexhijos=$model->almacendocs_alkardex;
		foreach ( $kardexhijos as $filakardex )
		{


					//$filakardex->VerificaCantAtenReservas();
			         $filakardex->InsertaAlentregasCompras($filakardex->id);

					//$filakardex->InsertaCcGastosServ();


		}

	}



	public function actionConfirmar($id)
	{
		$model=MiFactoria::CargaModelo('Almacendocs',$id);

		$this->performAjaxValidation($model);
		if($this->itsFirsTime($id))
		{
			if($this->getUsersWorkingNow($id))
			{ //si esta ocupado
				$this->redirect(array('view','id'=>$model->codserv));
			} else { // Si no lo esta renderizar sin mas
				$this->setBloqueo($id) ; 	///bloquea
				$this->ClearBuffer($id); //Limpia temporal antes de levantar
                               // var_dump($model->codmovimiento);var_dump($model->numdocref);die();
				MiFactoria::insertadetalles($model->id,$model->codmovimiento,$model->numdocref);
				/*echo "<br><br><br><br>";
				print_r(yii::app()->user->getFlashes());*/
				$this->render('n_form',array('model'=>$model));
				yii::app()->end();
			}
		} else {
			if($this->isRefreshCGridView($id))
			{ //si esta refresh de grilla
				$this->render('n_form',array('model'=>$model));
				yii::app()->end();
			} else { // Si no lo es  tenemos que analizar los dos casos que quedan
				if($this->IsRefreshUrlWithoutSubmit($id))
				{ ///Solo refreso la pagina
					Yii::app()->user->setFlash('notice', "No has confirmado los datos, solo haz refrescaod la pagina ");
					$this->render('n_form',array('model'=>$model));
					yii::app()->end();
				} else { 	 ///Ahora si recein se animo a hacer $_POST	, y confirmar los datos
					IF(isset($_POST['Almacendocs'])) {
						$model->attributes=$_POST['Almacendocs'];
						$model->cestadovale='20';
						if($model->save()){
							$this->ConfirmaBuffer($id); //Levanta temporales
							$transacc=$model->dbConnection->beginTransaction();
							//$this->efectuamovimiento($model/*$id*/); //oJO SOLO DESPUES DE COFIRMAR BUFFER
							if(!$this->detectaerrores())
							{ $transacc->commit();
								Yii::app()->user->setFlash('success', "Se grabo el documento  ".$this->SQL);
								$this->ClearBuffer($id);
								$this->terminabloqueo($id);
								//$this->render('ver',array('model'=>$model));yii::app()->end();
								$this->redirect(array('ver','id'=>$model->id));
							} else {//print_r(yii::app()->user->getFlashes());
								Yii::app()->user->setFlash('error', "Se ha presentado algunos inconvenientes ".$this->displaymensajes('error'));
								$transacc->rollback();
								//$this->borrakardexhijos($id);
								//$this->ClearBuffer($id);
								$this->terminabloqueo($id);
								$this->render('n_form',array('model'=>$model));
								yii::app()->end();
							}
						} else {
							Yii::app()->user->setFlash('error', " No se pudo grabar el documento  ".$this->SQL);
							//$transacc->rollback();
							$this->render('n_form',array('model'=>$model));
							yii::app()->end();
							/*Yii::app()->end();
                            throw new CHttpException(500,'Hubo un error al momento de grabar la cabecera');*/
						}

					} else  { //En este caso quiere decir que la sesion/bloqueo anterior no se ha cerrado correactmente
						// Y es posble que haya entrado despues de 2 dias, una semana asi
						$this->terminabloqueo($id);
						$this->SetBloqueo($id);
						Yii::app()->user->setFlash('notice', "NO cerraste correctamente, Ya tenías una sesion abierta en este domcuento,");
						$this->render('n_form',array('model'=>$model));
						yii::app()->end();

					}
				}
			}

		}

	}


	public function actionEditar($id)
	{
		$id=(integer)MiFactoria::cleanInput($id);
		$model=Almacendocs::model()->findByPk($id);
		if (!is_null($model))
		{
			$this->render('n_editar',array('model'=>$model));
		}else{

		}


	}


	public function actionAnular($id)
	{
		$id=(integer)MiFactoria::cleanInput($id);
		$model=Almacendocs::model()->findByPk($id);
		$mensaje="";
		if (!is_null($model))
		{
			$movanular=$model->almacenmovimientos->anticodmov;
			$transacc=$model->dbConnection->beginTransaction();
			$model->cestadovale=ESTADO_ANULADO;
			$nuevomodelo=new Almacendocs();
			$nuevomodelo->codmovimiento=$movanular;
			$nuevomodelo->setEscenarioMov();
			$nuevomodelo->setScenario($model->getEscenarioMov());
			$nuevomodelo->attributes=$model->attributes;

			$nuevomodelo->setAttributes(array(
				'codmovimiento'=>$movanular, //Sobreescribir
				'fechavale'=>date('Y-m-d'),
				'cestadovale'=>ESTADO_EFECTUADO,
				'fechacont'=>date('Y-m-d'),
				'numdocref'=>$model->numvale,
				'codocuref'=>$model->codocu,
			));
			$nuevomodelo->save();
			$mensaje.=yii::app()->mensajes->getErroresItem($nuevomodelo->geterrors());
			$hijos=$model->almacendocs_alkardex;
			 foreach($hijos as $fila){
				$kardexhijo= new Alkardex();
				 $kardexhijo->attributes=$fila->attributes;
				 $kardexhijo->setAttributes(array(
					 'hidvale'=>$nuevomodelo->id,
						 'codmov'=>$movanular, //El opuesto de todo
					 'cant'=>$fila->cant*-1, //El opuesto de todo
				 ));
				 $kardexhijo->save();
				$mensaje.=yii::app()->mensajes->getErroresItem($kardexhijo->geterrors());
				 unset($kardexhijo);
			 }

			if($mensaje==""){
				$transacc->commit();
				yii::app()->user->setFlash('success',' Se anuló el ingreso de Actividad con documento :  '.$nuevomodelo->numvale);
				$this->redirect(array('ver','id'=>$nuevomodelo->id));
			}else{

				$transacc->rollback();
				yii::app()->user->setFlash('error',' Se han presentado los siguientes errores :  '.$mensaje);
				$this->render('ver',array('model'=>$model));yii::app()->end();
			}


		}else{

		}
	}


	public function actionVer($id)
	{
		$id=(integer)MiFactoria::cleanInput($id);
		$model=Almacendocs::model()->findByPk($id);
		if (!is_null($model))
		{

			$this->render('ver',array('model'=>$model));
		}else{

		}
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

		if(isset($_POST['Maestroservicios']))
		{
			$model->attributes=$_POST['Maestroservicios'];
			if($model->save())
				$this->redirect(array('editar','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Maestroservicios');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Maestroservicios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Maestroservicios']))
			$model->attributes=$_GET['Maestroservicios'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function actionlistado()
	{
		$model=new VwHojaentrada;
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VwHojaentrada']))
			$model->attributes=$_GET['VwHojaentrada'];

		$this->render('hojasentrada',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Maestroservicios the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Maestroservicios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Maestroservicios $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='maestroservicios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionCreaConformidad()
	{
		$model=new Almacendocs;
		$model->valorespordefecto(CODIGO_DOC_VALE_ALMACEN);
		$this->Verificamov(CODIGO_MOVIMIENTO_INGRESO_ACTIVIDAD);
		$model->codmovimiento=CODIGO_MOVIMIENTO_INGRESO_ACTIVIDAD;
		$model->setEscenarioMov();
		$model->setScenario($model->getEscenarioMov());
		$model->codocuref=Almacenmovimientos::model()->findByPk($model->codmovimiento)->codocu;
		
                /*echo "<br><br><br><br> El escenario es   ".$model->getScenario()."<BR>";
        PRINT_R($model->rules());
        YII::APP()->END();*/
		$this->ClearBuffer($id);
		$model->iduser=Yii::app()->user->id;
		if(isset($_POST['Almacendocs']))
		{$model->attributes=$_POST['Almacendocs'];
                
			if($model->save()){
				$this->redirect(array('confirmar','id'=>$model->id));
			}
		}
		//echo "<br><br><br><br> al final   ".($model->isnewRecord)?"ES NUEVO ":"YA NO ES NUVEO";
		$this->render('n_create',array('model'=>$model));
	}


public function actionAnulaConformidad()
	{
		$model=new Almacendocs;
                //var_dump($model->hasValueDefault('codalmacen'));die();
                if(!$model->hasValueDefault('codalmacen'))
                   throw new CHttpException(500,'Para hacer esta op, configure los valores por defecto de este modelo');
		 
                $model->valorespordefecto();
		$this->Verificamov(CODIGO_MOVIMIENTO_INGRESO_ACTIVIDAD);
		$model->codmovimiento=CODIGO_MOVIMIENTO_ANULAR_INGRESO_ACTIVIDAD;
		$model->setEscenarioMov();
		$model->setScenario($model->getEscenarioMov());
		$model->codocuref=Almacenmovimientos::model()->findByPk($model->codmovimiento)->codocu;
		/*echo "<br><br><br><br> El escenario es   ".$model->getScenario()."<BR>";
        *//*
                 * );
        YII::APP()->END();*/
		$this->ClearBuffer($id);
		$model->iduser=Yii::app()->user->id;
		if(isset($_POST['Almacendocs']))
		{$model->attributes=$_POST['Almacendocs'];
                 //var_dump($_POST['Almacendocs']['numdocref']);die();
              // PRINT_R($model->attributes);die();
               // var_dump(Almacendocs::valepornumero($_POST['Almacendocs']['numdocref'])->codalmacen);die();
                //$model->codalmacen=Almacendocs::valepornumero($_POST['Almacendocs']['numdocref'])->codalmacen;
		
			if($model->save()){
                            
				$this->redirect(array('confirmar','id'=>$model->id));
			}
		}
		//echo "<br><br><br><br> al final   ".($model->isnewRecord)?"ES NUEVO ":"YA NO ES NUVEO";
		$this->render('n_create',array('model'=>$model));
	}

	public function Borraitem($id) {
		//$identidad=$_GET["id"];
		$mensaje="";
		$model=Tempalkardex::model()->findByPk($id);
		if(!is_null($model)){
			//verificar si el movimietno permite borrar Items
			if($model->alkardex_almacenmovimientos->borraritems=='1'){
				if($model->delete())
				{$mensaje.="Se elimino el item sin problemas <br>";}  else{
					$mensaje.="No se pudo eliminar el registro  <br>";
				}
			}else{
				$mensaje.=" Este movimiento no permite borrar registros <br>";
			}
		}else {
			$mensaje.=" No se encotro un registro con ese ID <br>";
		}
		RETURN $mensaje;
	}

	public function actionBorraitems()
	{
		$cadeni="";
		$autoIdAll = $_POST['cajita'];
		foreach($autoIdAll as $autoId)
		{
			$cadeni.=$this->Borraitem($autoId);
		}
		echo $cadeni."<BR><BR>";
	}

	public function actionConformidades()
	{
		$model=new VwEntregas('search_servicios');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VwEntregas']))
			$model->attributes=$_GET['VwEntregas'];

		$this->render('conformidades',array(
			'model'=>$model,
		));
	}

}
