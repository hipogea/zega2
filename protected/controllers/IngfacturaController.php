<?php

class IngfacturaController extends ControladorBase
{

	const ESTADO_PREVIO='99';
const ESTADO_CREADO='10';
const ESTADO_ANULADO='20';
    public function __construct() {
		parent::__construct($id='ingfactura',Null);
		$this->documento='857';
		$this->modelopadre='Ingfactura';
		$this->modeloshijos=array('Detingfactura'=>'Tempdetingfactura');
		$this->documentohijo='858';
		$this->campoestado='codestado';
		$this->ConfigArreglos();
		//$nuevo=new $this->modelopadre;
		//$this->campoenlace=$nuevo->getFieldLink($nuevo->relations(),$this->modelopadre,);

	}



	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('anularingreso','verdocumento','modificadetalle','Editadocumento','admin','create','salir','crearingreso','confirmaringreso','update'),
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
	public function actionVerdocumento($id)
	{
		$id=MiFactoria::cleanInput($id);
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
		$model=new Ingfactura;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ingfactura']))
		{
			$model->attributes=$_POST['Ingfactura'];
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

		if(isset($_POST['Ingfactura']))
		{
			$model->attributes=$_POST['Ingfactura'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionEditaDocumento($id)
	{
		$model=MiFactoria::CargaModelo($this->modelopadre,$id);
		/*if($model->{$this->campoestado}==ESTADO_PREVIO)
			$model->{$this->campoestado}=ESTADO_CREADO;*/
		if($this->itsFirsTime($id))
		{
			$uintruso=$this->getUsersWorkingNow($id);
			if($uintruso)
			{ //si esta ocupado
				Yii::app()->user->setFlash('error', "Solo puede visualizar, este documento, esta siendo modificado por el usuario    :     <b>". Yii::app()->user->um->loadUserById($uintruso)->username." </b>");
				$this->out($id);
				$this->redirect(array('VerDocumento','id'=>$model->id));
			} else { // Si no lo esta renderizar sin mas
				$this->setBloqueo($id) ; 	///bloquea
				$this->ClearBuffer($id); //Limpia temporal antes de levantar
				$this->IniciaBuffer($id); //Levanta temporales
				$this->render('update',array('model'=>$model,'editable'=>true));
				yii::app()->end();
			}

		} else {
			if($this->isRefreshCGridView($id))
			{ //si esta refresh de grilla

				$this->render('update',array('model'=>$model,'editable'=>true));
				yii::app()->end();
			} else { // Si no lo es  tenemos que analizar los dos casos que quedan
				if($this->IsRefreshUrlWithoutSubmit($id))
				{ ///Solo refreso la pagina

					Yii::app()->user->setFlash('notice', "No has confirmado los datos, solo haz refrescaod la pagina ");
					$this->render('update',array('model'=>$model,'editable'=>true));
					yii::app()->end();
				} else {
					$this->performAjaxValidation($model);
					IF(isset($_POST[$this->modelopadre])) {
						$model->attributes=$_POST[$this->modelopadre];
						//$model->validate();
						//	if($this->hubocambiodetalle($id) OR  $model->hacambiado()) {
						if(true) {
							if($model->save()){
								$this->ConfirmaBuffer($id); //Levanta temporales
								$this->terminabloqueo($id);
								//$this->terminabloqueo($id); // Desbloquea
								//$this->grabaitems($this->tempdpeticion_a_dpeticion($id)); //Graba temporales a la tabla Dpeticion
								$this->ClearBuffer($id);
								//$this->limpiatemporaldetalle(); //Limpia temporal


								Yii::app()->user->setFlash('success', "Se grabo el documento  ".$this->SQL);
								//$this->render('update',array('model'=>$model));
								$this->out($id);

								$this->redirect(array('VerDocumento','id'=>$model->id));
							} else {
								//echo CActiveForm::validate($model);
								$this->render('update',array('model'=>$model,'editable'=>true));
								yii::app()->end();
								/*Yii::app()->end();
                                throw new CHttpException(500,'Hubo un error al momento de grabar la cabecera');*/
							}
						} else   {
							Yii::app()->user->setFlash('notice', "  Enviaste los datos pero no has modificado nada.... ");
							$this->render('update',array('model'=>$model,'editable'=>true));
							yii::app()->end();
						}
					} else  { //En este caso quiere decir que la sesion/bloqueo anterior no se ha cerrado correactmente
						// Y es posble que haya entrado despues de 2 dias, una semana asi
						$this->terminabloqueo($id);
						$this->SetBloqueo($id);
						Yii::app()->user->setFlash('notice', "NO cerraste correctamente, Ya tenías una sesion abierta en este domcuento,");
						$this->render('update',array('model'=>$model,'editable'=>true));
						yii::app()->end();

					}
				}
			}

		}
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
		$dataProvider=new CActiveDataProvider('Ingfactura');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new VwDetalleingresofacturafirme('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VwDetalleingresofacturafirme']))
			$model->attributes=$_GET['VwDetalleingresofacturafirme'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionanularingreso($id)
	{
		$modelo = $this->loadModel(MiFactoria::cleanInput($id));
		if ($modelo === null)
			throw new CHttpException(404, 'No se encontro ningun documento para estos datos');
		$modelo->setScenario('estado');
		$transaccion = $modelo->dbConnection->beginTransaction();
		$modelo->codestado = '20';//ANULADO
		$grabo = $modelo->save();
		$salio = true;
		foreach ($modelo->detalle as $hijo) {
			$hijo->setScenario('estado');
			$hijo->codestado = '20';//ANULADO
			if (!$hijo->save()) {
				MiFactoria::Mensaje('error', ' '.yii::app()->mensajes->getErroresItem($hijo->geterrors()));
				$salio = false;
				exit;
			}
		}

		if (!($salio and $grabo)) {

			MiFactoria::Mensaje('error', 'Hubo bg errores al grabar el estado '.yii::app()->mensajes->getErroresItem($modelo->geterrors()));

		}

		if (is_null(yii::app()->user->getFlash('error', null, false)))
		{
			$transaccion->commit();
			MiFactoria::Mensaje('success', 'Se proceso el documento');
		}	 else {
			$transaccion->rollback();
			MiFactoria::Mensaje('error', 'Hubo errores al grabar el estado');
		}
		$this->redirect(array('verdocumento','id'=>$modelo->id));

	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ingfactura the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ingfactura::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ingfactura $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ingfactura-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionCrearingreso()
	{
		$model=new $this->modelopadre;
		$model->codestado= ESTADO_PREVIO;
		$model->codocu=$this->documento;
		$this->ClearBuffer($id=null);
		$model->iduser=Yii::app()->user->id;
		if(isset($_POST[$this->modelopadre]))
		{$model->attributes=$_POST[$this->modelopadre];

			if($model->save()){
				$this->redirect(array('confirmaringreso','id'=>$model->id));
			}
		}
		//echo "<br><br><br><br> al final   ".($model->isnewRecord)?"ES NUEVO ":"YA NO ES NUVEO";
		$this->render('update',array('model'=>$model));
	}

	public function actionConfirmaringreso($id)
	{
		$model=MiFactoria::CargaModelo($this->modelopadre,$id);
		$this->performAjaxValidation($model);
		if($this->itsFirsTime($id))
		{

			if($this->getUsersWorkingNow($id))
			{ //si esta

				$this->redirect(array('view','id'=>$model->id));
			} else { // Si no lo esta renderizar sin mas

				$this->setBloqueo($id) ; 	///bloquea
				$this->ClearBuffer($id); //Limpia temporal antes de levantar

				/*echo "si vino";
				yii::app()->end();*/
				if($model->codestado==ESTADO_PREVIO){

					MiFactoria::insertadetallesrecepfactura($model);
				}ELSE{
					$this->IniciaBuffer($id); //Levanta temporales
				}

				$this->render('_form',array('model'=>$model));
				yii::app()->end();
			}
		} else {
			if($this->isRefreshCGridView($id))
			{ //si esta refresh de grilla

				$this->render('_form',array('model'=>$model));
				yii::app()->end();
			} else { // Si no lo es  tenemos que analizar los dos casos que quedan
				if($this->IsRefreshUrlWithoutSubmit($id))
				{ ///Solo refreso la pagina

					Yii::app()->user->setFlash('notice', "No has confirmado los datos, solo haz refrescaod la pagina ");
					$this->render('_form',array('model'=>$model));
					yii::app()->end();
				} else { 	 ///Ahora si recein se animo a hacer $_POST	, y confirmar los datos
					IF(isset($_POST[$this->modelopadre])) {

						$model->attributes=$_POST[$this->modelopadre];
						$model->codestado=ESTADO_CREADO;
						//$model->cestadovale='20';
						$transacc=$model->dbConnection->beginTransaction();
						if($model->save()){
							$this->ConfirmaBuffer($id); //Levanta temporales
							//$this->efectuamovimiento($model/*$id*/); //oJO SOLO DESPUES DE COFIRMAR BUFFER
							if(!$this->detectaerrores())
							{ $transacc->commit();
								Yii::app()->user->setFlash('success', "Se grabo el documento  ".$this->SQL);
								$this->ClearBuffer($id);
								$this->terminabloqueo($id);
								$this->redirect(array('verdocumento','id'=>$model->id));
							} else {//print_r(yii::app()->user->getFlashes());
								Yii::app()->user->setFlash('error', "Se ha presentado algunos inconvenientes ".$this->displaymensajes('error'));
								$transacc->rollback();
								//$this->borrakardexhijos($id);
								//$this->ClearBuffer($id);
								$this->terminabloqueo($id);

								$this->render('_form',array('model'=>$model));
								yii::app()->end();
							}
						} else {
							Yii::app()->user->setFlash('error', " No se pudo grabar el documento  ");
							//$transacc->rollback();
							$this->render('_form',array('model'=>$model));
							yii::app()->end();
							/*Yii::app()->end();
                            throw new CHttpException(500,'Hubo un error al momento de grabar la cabecera');*/
						}

					} else  { //En este caso quiere decir que la sesion/bloqueo anterior no se ha cerrado correactmente
						// Y es posble que haya entrado despues de 2 dias, una semana asi
						$this->terminabloqueo($id);
						$this->SetBloqueo($id);
						Yii::app()->user->setFlash('notice', "NO cerraste correctamente, Ya tenías una sesion abierta en este domcuento,");
						$this->render('_form',array('model'=>$model));
						yii::app()->end();

					}
				}
			}

		}

	}


	//hacer las cosas adicionales en las tabas relacionadas
public function efectuamovimiento($model/*$id*/){
	$crote=New CDBCriteria;
	$model->documento=$this->documento;
	$crote->addCondition("codcentro=:vcentro");
	$crote->params=array(":vcentro"=>$model->codcentro);
	$model->numerodoc=$model->Correlativo('numerodoc',$crote,null,8);
	//primero actualizar la OC para que salga efectuado
	//$registrocompra=Ocompra::findByNumero($model->numocompra);
	//$registrocompra->codestado=ESTADO_OC_FACTURADA_PARCIAL;




				}

	public function actionModificadetalle($id)
	{

		$model=Tempdetingfactura::Model()->findByPk($id);
		if ($model===null)
			throw new CHttpException(404,'No se encontro ningun documento para estos datos');
		$model->setScenario('cantidad');
			if(isset($_POST['Tempdetingfactura']))
		{
			$model->attributes=$_POST['Tempdetingfactura'];

			if($model->save())
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialog3').dialog('close');
													                    window.parent.$('#cru-frame3').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		");
					Yii::app()->end();
				}

			//$this->redirect(array('view','id'=>$model->n_guia));
		}

		if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';

		$this->render('_form_detalle',array(
			'model'=>$model, 'idcabeza'=>$model->hidfactura,
		));

		/*} else{ //si ya cambio el estado impisble agregar mas items

		   if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('vw_imposible',array(

		));
		}*/

	}

public function actionsalir($id){
	$this->out($id);
	$this->redirect(array("admin"));
}
}
