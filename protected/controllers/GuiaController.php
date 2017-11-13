<?php

class GuiaController extends ControladorBase
{
	
    const ESTADO_PREVIO='99';
const ESTADO_CREADO='10';
const ESTADO_CONFIRMADO='20';
const ESTADO_AUTORIZADO='30';
const ESTADO_ENTREGADO='80';
const ESTADO_ANULADO='50';
const CODIGO_LUGAR_A_BORDO='000011';
const CODIGO_ESTADO_DETALLE_ANULADO='40';
    /**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	public function __construct() {
		parent::__construct($id='guia',Null);
		$this->documento='100';
		$this->modelopadre='Guia';
		$this->modeloshijos=array('Detgui'=>'Tempdetgui');
		$this->documentohijo='230';
		$this->campoestado="c_estgui";
		$this->ConfigArreglos();
		//$nuevo=new $this->modelopadre;
		//$this->campoenlace=$nuevo->getFieldLink($nuevo->relations(),$this->modelopadre,);

	}


	public function aprobarGuia($id){
		$modelo=$this->loadModel($id);

		if((is_null($modelo))) {
			$modelo->c_estado='30';
			$modelo->setScenario('cambiaestado');
			if($modelo->save()) {
				Yii::app()->user->setFlash('success', "El documento se ha procesado");
			} else {
				Yii::app()->user->setFlash('error', "No se pudo cambiar el status");
			}
		}else {
			Yii::app()->user->setFlash('error', "No se ha encontrado ningun documento para este identificador");
		}
		$this->render('update',array('model'=>$model));

	}


	public function DesaprobarGuia($id){
		$modelo=$this->loadModel($id);

		if((is_null($modelo))) {
			if($modelo->c_estado<>'30'){
				Yii::app()->user->setFlash('error', "No se puede efectuar este proceso no es un status adecuado");
			}else {
				$modelo->c_estado='10';
				$modelo->setScenario('cambiaestado');
				if($modelo->save()) {
					Yii::app()->user->setFlash('success', "El documento se ha procesado");
				} else {
					Yii::app()->user->setFlash('error', "No se pudo cambiar el status");
				}
			}


		}else {
			Yii::app()->user->setFlash('error', "No se ha encontrado ningun documento para este identificador");
		}
		$this->render('update',array('model'=>$model));

	}

	public function actionsalir($id){
		MiFactoria::getDesbloqueo($id,$this->documento);
		$this->redirect(array('admin'));
	}



	public function actionEditaDocumento($id)
	{
		$model=MiFactoria::CargaModelo($this->modelopadre,$id);
   if($model->c_salida=='0')
	   $this->redirect(array('ne/editadocumento','id'=>$model->id));

			//$model->{$this->campoestado}=ESTADO_CREADO;
		//$this->performAjaxValidation($model);
		/*ECHO isset($_POST[$this->modelopadre])?"<br><br><br><br><br><br><br><br>SI ES UN  POST['".$this->modelopadre."']":"<br><br><br><br><br><br><br><br>NO es un  POST";
			ECHO isset($_GET[$this->modelopadre])?"<BR> ES UN  GET(MODELOPADRE) ":"<BR> NO  ES UN  GET(MODELOPADRE)";
		ECHO isset($_GET['ajax'])?"<BR> ES UN  GET(ajax) ":"<BR> NO  ES UN  GET(ajax)";
		//ECHO isset($_GET['ajax'])?"<BR> ES UN  GET(ajax) ":"<BR> NO  ES UN  GET(ajax)";
		echo ($this->estasEnSesion($id))?"<BR> ESTAS EN SESION  ":"<BR> NO NO ESTAS EN SESION ";
	//	echo " this->es_refreshdegrilla  ".var_dump($this->es_refreshdegrilla($id))."  <br>";
		echo " this->IsRefreshUrlWithoutSubmit  ".var_dump($this->IsRefreshUrlWithoutSubmit($id))."  <br>";*/

		if($this->itsFirsTime($id))
		{
			if($this->getUsersWorkingNow($id))
			{ //si esta ocupado
				/* echo " es romer a vez y esta ocupado esta ocpado x otro   ";
				yii::app()->end();*/
				Yii::app()->user->setFlash('error', "El documento esta siendo modificado por otro usuario ");


				$this->redirect(array('view','id'=>$model->id));
			} else { // Si no lo esta renderizar sin mas
				/*echo " es primer avez y renderizar sin mas    ";
				  yii::app()->end();*/
				///Si se esta abriendo un documento que no ha sido compeltado por otro usuario...!BORRARLO
				if($model->{$this->campoestado}==self::ESTADO_PREVIO and $model->iduser != yii::app()->user->id){
						$model->delete();
					throw new CHttpException(400,'No se ha podido encontrar el documento');

				} ELSE {
					$this->setBloqueo($id) ; 	///bloquea
					$this->ClearBuffer($id); //Limpia temporal antes de levantar
					$this->IniciaBuffer($id); //Levanta temporales
					$this->render('update',array('model'=>$model));
					yii::app()->end();
				}

			}

		} else {
			if($this->isRefreshCGridView($id))
			{ //si esta refresh de grilla
				/*echo " NO es primera vez y  Es un refresh carajo";
				yii::app()->end();*/
				$this->render('update',array('model'=>$model));
				yii::app()->end();
			} else { // Si no lo es  tenemos que analizar los dos casos que quedan
				if($this->IsRefreshUrlWithoutSubmit($id))
				{ ///Solo refreso la pagina
					/* echo "NO es primera vez  y reresco si submit ";
					 yii::app()->end();*/
					Yii::app()->user->setFlash('notice', "No has confirmado los datos, solo haz refrescaod la pagina ");
					$this->render('update',array('model'=>$model));
					yii::app()->end();
				} else { 	 ///Ahora si recein se animo a hacer $_POST	, y confirmar los datos
					/*echo "se animo a ha hacer POST ";
					yii::app()->end();*/
					$this->performAjaxValidation($model);
					IF(isset($_POST[$this->modelopadre])) {
						$model->attributes=$_POST[$this->modelopadre];
						//$model->validate();
					 //	if($this->hubocambiodetalle($id) OR  $model->hacambiado()) {
						if(true) {
							if($model->save()){
								$this->ConfirmaBuffer($id); //Levanta temporales
								//$this->grabaitems($this->tempdpeticion_a_dpeticion($id)); //Graba temporales a la tabla Dpeticion
								$this->ClearBuffer($id);
								//$this->limpiatemporaldetalle(); //Limpia temporal
								$this->terminabloqueo($id);
								//$this->terminabloqueo($id); // Desbloquea
								Yii::app()->user->setFlash('success', "Se grabo el documento  ".$this->SQL);
								//$this->render('update',array('model'=>$model));
								$this->redirect(array('visualiza','id'=>$model->id));
							} else {
								//echo CActiveForm::validate($model);
								$this->render('update',array('model'=>$model));
								yii::app()->end();
								/*Yii::app()->end();
                                throw new CHttpException(500,'Hubo un error al momento de grabar la cabecera');*/
							}
						} else   {
							Yii::app()->user->setFlash('notice', "  Enviaste los datos pero no has modificado nada.... ");
							$this->render('update',array('model'=>$model));
							yii::app()->end();
						}
					} else  { //En este caso quiere decir que la sesion/bloqueo anterior no se ha cerrado correactmente
						// Y es posble que haya entrado despues de 2 dias, una semana asi
						$this->terminabloqueo($id);
						$this->SetBloqueo($id);
						Yii::app()->user->setFlash('notice', "NO cerraste correctamente, Ya tenías una sesion abierta en este domcuento,");
						$this->render('update',array('model'=>$model));
						yii::app()->end();

					}
				}
			}

		}
	}



		public function actionCreaDocumento()
	{
		/*ECHO isset($_POST[$this->modelopadre])?"<br><br><br><br><br><br><br><br>SI ES UN  POST['".$this->modelopadre."']":"<br><br><br><br><br><br><br><br>NO es un  POST";
		ECHO isset($_GET[$this->modelopadre])?"<BR> ES UN  GET(MODELOPADRE) ":"<BR> NO  ES UN  GET(MODELOPADRE)";
		ECHO isset($_GET['ajax'])?"<BR> ES UN  GET(ajax) ":"<BR> NO  ES UN  GET(ajax)";
		//ECHO isset($_GET['ajax'])?"<BR> ES UN  GET(ajax) ":"<BR> NO  ES UN  GET(ajax)";
		echo ($this->estasEnSesion($id))?"<BR> ESTAS EN SESION  ":"<BR> NO NO ESTAS EN SESION ";*/
		$this->ClearBuffer($id);

		//  echo "Ni identidad :". $this->Id;
		$model=new $this->modelopadre;
		$model->valorespordefecto($this->documento);
		$this->performAjaxValidation($model);
		$model->iduser=Yii::app()->user->id;

		//print_r($_POST[$this->modelopadre]);
		if(isset($_POST[$this->modelopadre]))
		{

			$model->attributes=$_POST[$this->modelopadre];
			$model->codocu=$this->documento;
			if($model->save()){

				$this->redirect(array('EditaDocumento','id'=>$model->id));
				//$this->limpiatemporal();
				//$model->refresh();
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

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
				'actions'=>array('tomafoto','agregadespacho',  'modificadetallecompo',  'CreadetalleCompo','subearchivo','CreaDocumento','prueba','salir','Imprimirsolo','cargadespacho','creadetalleActivo','agregardespacho','procesardocumento','EditaDocumento','Borraitems','imprimir','Configuraop',
					'Pide','Modificadetalle','modificadetalleactivo','Visualiza','Excel','imprimirsolo',
					'defaulte','pintamaterial','Libmasiva','pintaactivo','pintaequipo','Anularentrega',
					'creadetalle','relaciona','recibevalor','Verdetalle','create','update',
					'procesarguia','verificaproceso','aplicaproceso',
					'Aprobarguia','Anularguia','Confirmarguia','Desautorizarguia','admin','Confirmarentrega','Revertirdespachoguia', ///acciones de proceso
					'visualizaguia'),
				'users'=>array('@'),
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

 public function buildReport($id){
	 $modelreport=New VwGuia;
	 foreach($modelreport->Attributes as $clave=>$valor){
		$fila= Coordreporte::model()->find("codocu=:vcodocu and nombre_campo=:vcampo", array(":vcodocu"=>$this->documento,":vcampo"=>$clave));
		   if(is_null($fila)){
			   $filareporte=New Coordreporte();
			   $filareporte->codocu=$this->documento;
			   $filareporte->nombre_campo=$clave;
			   $filareporte->save();
		   }
	 }
 }

	public function jaladespachototal($id,$idcabeza){
		$matriz=VwDespacho::model()->findAll("hidvale=".$id);
		foreach($matriz as $fila){
			$detalle=new Tempdetgui();
			$detalle->valorespordefecto($this->documentohijo);
			$detalle->hidespacho=$fila->id ;
			$detalle->n_hguia=$idcabeza ;
			$detalle->idusertemp= Yii::app()->user->id;
			$detalle->idstatus=1;
			$detalle->iduser= Yii::app()->user->id;
			$detalle->codocu= $this->documentohijo;
			$detalle->iduser= Yii::app()->user->id;
			$detalle->c_codep= '100';
			$detalle->c_um= $fila->um;
			$detalle->c_descri= $fila->descripmaterial;
			$detalle->c_edgui= '10';
			$detalle->c_codgui= $fila->codart;
			$detalle->n_cangui= abs($fila->cant);
			$criterio=new CDbCriteria;
			$criterio->condition="n_hguia=:idguia and idusertemp= :usua";
			$criterio->params=array(':idguia'=>$idcabeza,":usua"=>yii::app()->user->id);
			$detalle->c_itguia=str_pad(Tempdetgui::model()->count($criterio)+1,3,"0",STR_PAD_LEFT);
               if(!$detalle->save()){
				   print_r($detalle->geterrors());
				   throw new CHttpException(500,'No se pudo grabar  ');
			   } else {

			   }
             unset($detalle);
		}

	}




	public function actionagregardespacho($id) {
			$model=new VwDespachogeneral();
			//$model->setscenario("agregaritemsdespacho");
			//$this->performAjaxValidation1($model);
			if(isset($_POST['VwDespachogeneral']))
			{
				//$idvale=Vwdes::model()->find("numero=:xnumero", array(":xnumero"=>$_POST['Solpe']['numero']));
				$transaccion=$model->dbConnection->beginTransaction();
				$model->hidvale=$_POST['VwDespachogeneral']['hidvale'];
				$this->jaladespachototal($model->hidvale,$id);
				//echo $_POST['VwDespachogeneral']['hidvale'];
				//yii::app()->end();
				// $mensaje.="sdsd";
				if(!$this->huboerror()){//si no hubo errores
					$transaccion->commit();
					if (!empty($_GET['asDialog']))
					{
							echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		window.parent.$.fn.yiiGridView.update('resumen-grid');
																		");
						Yii::app()->end();
					}
				} else {
					$transaccion->rollback();
					MiFactoria::Mensaje('error', "No se pudo grabar el documento, hay  errores ");
					$this->layout = '//layouts/iframe';
					$this->render('_form_despacho',array('model'=>$model));
					// $model->refresh();
					//$this->render('update',array('model'=>$model);
					yii::app()->end();
					//$model->refresh();
				}
			}

			if (!empty($_GET['asDialog']))
				$this->layout = '//layouts/iframe';

			$this->render('_form_despacho',array(
				'model'=>$model
			));


	}

public function actioncargadespacho(){
	$identidad=$_POST['VwDespachogeneral']['hidvale']+0;

	echo " este es el id         ".$identidad;
	//$this->render('_detalle',array(	'idvale'=>$identidad));
	echo $this->renderpartial("_detalle",array('idvale'=>$identidad), true);
}


	public function actionImprimirsolo($id)
	{

		//$this->redirect(array(),);
		/*$modelo=VwGuia::model()->find("id=:vid",array(":vid"=>$id));
		$this->buildReport($id);
		if(is_null($modelo))
		throw new CHttpException(404,'No se econtro ningun document');
		$usuario=Trabajadores::model()->findByPk(Yii::app()->user->um->getFieldValue(Yii::app()->user->id,'codtrabajador') );
	    $proveedorestilos=Coordreporte::model()->Search_por_doc($this->documento);

		$cadena=$this->renderpartial('reporteguia',array('proveedorestilos'=>$proveedorestilos,'modelo'=>$modelo,'usuario'=>$usuario),true,true);
		$mpdf=Yii::app()->ePdf->mpdf();
		$hojaestilo=file_get_contents('themes/abound/css'.DIRECTORY_SEPARATOR.'estiloguia.css');
		$mpdf->WriteHTML($hojaestilo,1);
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->WriteHTML($cadena,2);
		//$mpdf->Output();
		$vacr=md5(time());
		$mpdf->Output('assets/'.$vacr.'.pdf','F');

		return $vacr;*/

/*
		$this->layout="";
		$modelo=VwGuia::model()->find("id=:vid",array(":vid"=>$id));
		$this->buildReport($id);
		if(is_null($modelo))
			throw new CHttpException(404,'No se econtro ningun document');
		$usuario=Trabajadores::model()->findByPk(Yii::app()->user->um->getFieldValue(Yii::app()->user->id,'codtrabajador') );
		$proveedorestilos=Coordreporte::model()->Search_por_doc($this->documento);
		$hojaestilo=file_get_contents('themes/temita/css'.DIRECTORY_SEPARATOR.'estiloguia.css');
		//Yii::app()->clientScript->registerCssFile('themes/abound/css'.DIRECTORY_SEPARATOR.'estiloguia.css');
		$cadena=$this->renderpartial('reporteguia',array('proveedorestilos'=>$proveedorestilos,'modelo'=>$modelo,'usuario'=>$usuario),TRUE,true);
		//$cadena=$this->render('reporteguia',array('proveedorestilos'=>$proveedorestilos,'modelo'=>$modelo,'usuario'=>$usuario));

		$mpdf=Yii::app()->ePdf->mpdf();
		$hojaestilo=file_get_contents('themes/temita/css'.DIRECTORY_SEPARATOR.'estiloguia.css');
		$mpdf->WriteHTML($hojaestilo,1);
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->WriteHTML($cadena,2);
		$mpdf->Output();
		/*$vacr=md5(time());
		$mpdf->Output('assets/'.$vacr.'.pdf','F');

		return $vacr;*/




	}


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionImprimir($id)
	{
	/*****aegurandonos que nadi epueda imprimir asi no mas pore el URL
	 * */


		$this->redirect(array('coordocs/hacereporte','id'=>10,'idfiltrodocu'=>$id,'file'=>2));

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

	
	
	public function actionVisualizaguia()
	{
		//$id=$_POST['Guia']['id'];
		
		$this->layout='//layouts/iframe';
		$this->render('_view',array(
			'model'=>$this->loadModel(345),
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Guia;
		$model->{$this->campoestado}=self::ESTADO_PREVIO;
		//$model->valorespordefecto();
      // $this->layout='//layouts/column_inicio_chico';
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Guia']))
		{
			$model->attributes=$_POST['Guia'];
			if($model->save())
			   $model->refresh();
			   /// $modelodetalle=new Detgui;
				$this->redirect(array('update','id'=>$model->id));
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
			//$this->layout='//layouts/column_inicio_chico';
			if ($model->c_salida=='1')
		{
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Guia']))
		{
			$model->attributes=$_POST['Guia'];
			$estatus=$model->c_estgui;
			if($model->save())
			   {		
			   			//quiere decir que grabo 

			   			if ( $_POST['Guia']['c_estgui'] == '01') { //si es el primer update
			   					//asegurar de que ya paso y actualizar el status de los items
			   					$command = Yii::app()->db->createCommand(" update detgui set c_estado='01' where n_hguia='".$model->n_guia."' "); 											
								$command->execute();		


			   					//$this->redirect(array('update','id'=>$model->id));
			   				}
			   			$this->redirect(array('view','id'=>$model->id));
			   				

					}
				
				
		}
		
		
		$model=$model=$this->loadModel($id);
		$this->render('update',array(
			'model'=>$model,
		));
		 }else {

		 	throw new CHttpException(404,'No existe una guia de remision con este identficador');
		 }
		
	}

	public function actionVisualiza($id)	{
	   if( is_null($id)  or empty($id) ) 
	    throw new CHttpException(404,'No se encontro la guia especificada');
	  	$this->clearBuffer();
		$this->iniciaBuffer($id);
		$model=$model=$this->loadModel($id);
		$this->render('update',array(
			'model'=>$model,
		));
	}

	
	
		public function actionCreadetalleActivo($idcabeza,$cest)
	{
		$modelocabeza=$this->loadModel($idcabeza);
                    if($cest=='10' OR $cest=='99') {
		$model=new Tempdetgui;
		$model->setScenario('INS_ACTIVO');
		$model->valorespordefecto($this->documentohijo);
			$model->n_cangui=1;
			$model->c_um='120';
		if(isset($_POST['Tempdetgui']))		{
			$model->attributes=$_POST['Tempdetgui'];
			$model->codocu=$this->documentohijo; ///detalle guia
			$model->n_hguia=$idcabeza;
			//crietria para filtrar la cantidad de items del detalle
			
			$model->c_itguia=$modelocabeza->getNextItem();
			//str_pad($somevariable,$anchocampo,"0",STR_PAD_LEFT);
			////con esto calculamos el numero de items
			//echo "  El valor de  ".$idcabeza."       ".$model->n_hguia."   ";
			
			if($model->save())
					  if (!empty($_GET['asDialog']))
												{
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
		$this->render('_form_activo',array(
			'model'=>$model, 'idcabeza'=>$idcabeza
		));
		} else{ //si ya cambio el estado impisble agregar mas items
		   if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('vw_imposible',array(
			
		));	
		}
	}
	

	public function actionCreadetalle($idcabeza,$cest)
	{
		 $id= (integer) MiFactoria::cleanInput($idcabeza);
        if ($cest == '10' OR $cest == '99') {
     $modelocabeza=$this->loadModel($id);
			$model = new Tempdetgui();
			//var_dump($model->rules());die();
                        $tipo=  MiFactoria::cleanInput($_GET['tipo']);
                        if(!in_array($tipo,  MiFactoria::tiposmateriales()))
                                throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'  El tipo de material especificado {'.$tipo.'   } no existe ');
                                 $model->c_af=$tipo;
                         
                               $relaciones=$model->colocaescenario($tipo);
                               //var_dump($model->relations());die();
                                 $model->c_um=yii::app()->settings->get('transporte','transporte_umdefault');
			//$model->setScenario('INS_NUEVO');
			$model->valorespordefecto($this->documentohijo);
			if (isset($_POST['Tempdetgui'])) {
				$model->attributes = $_POST['Tempdetgui'];
				$model->codocu = $this->documentohijo; ///detalle guia
				$model->n_hguia = $idcabeza;
				//crietria para filtrar la cantidad de items del detalle
				
				$model->c_itguia = $modelocabeza->getNextItem();
				//str_pad($somevariable,$anchocampo,"0",STR_PAD_LEFT);
				////con esto calculamos el numero de items
				//echo "  El valor de  ".$idcabeza."       ".$model->n_hguia."   ";
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
			$this->render('_form_'.strtolower($tipo), array(
				'model' => $model, 'idcabeza' => $idcabeza,'relaciones'=>$relaciones
			));
		} else { //si ya cambio el estado impisble agregar mas items
			if (!empty($_GET['asDialog']))
				$this->layout = '//layouts/iframe';
			$this->render('vw_imposible', array());
		}

			/*$this->render('_form_detalle',array(
				'model'=>$model, 'idcabeza'=>$idcabeza
			));
		*/
	}

	public function actionModificadetalle($id)
	{
		//VERIFICADO PRIMERO SI ES POSIBLE AGREGAR MAS ITEMS
		
		//if($cest=='01' OR $cest=='99') {
             $tipo=  MiFactoria::cleanInput($_GET['tipo']);
		 $id= (integer) MiFactoria::cleanInput($id);
		$model=Tempdetgui::Model()->findByPk($id);
		 if ($model===null)
		 	  throw new CHttpException(404,'No se encontro ningun documento para estos datos');
	  	 if(!in_array($tipo,  MiFactoria::tiposmateriales()))
                                throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'  El tipo de material especificado {$tipo} no existe '.$tipo);
                               $relaciones= $model->colocaescenario($tipo);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation1($model);

		if(isset($_POST['Tempdetgui']))
		{
			$model->attributes=$_POST['Tempdetgui'];
			//$model->codocu='023'; ///detalle guia
			
			//crietria para filtrar la cantidad de items del detalle
			//$criterio=new CDbCriteria;			
			// $criterio->condition="n_hguia=:nguia  ";
			//$criterio->params=array(':nguia'=>$idcabeza);
			//$model->c_itguia=str_pad(Detgui::model()->count($criterio)+1,3,"0",STR_PAD_LEFT);
			//str_pad($somevariable,$anchocampo,"0",STR_PAD_LEFT);
			////con esto calculamos el numero de items
			
			
			if($model->save())
					  if (!empty($_GET['asDialog']))
												{
													//Close the dialog, reset the iframe and update the grid
													echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		");
														Yii::app()->end();
												}
				
				//$this->redirect(array('view','id'=>$model->n_guia));
		}
		
		 if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		
		$this->render('_form_'.strtolower($tipo),array(
			'model'=>$model, 'idcabeza'=>$model->n_hguia,'relaciones'=>$relaciones
		));
		
		/*} else{ //si ya cambio el estado impisble agregar mas items
			
		   if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('vw_imposible',array(
			
		));	
		}*/
		
	}
	
	public function actionAprobar()
	{
	        $idguia=$_POST['Guia']['n_guia'];
		$idevento=$_POST['Procesador'];
		//cargando los 2 modelos
		if($this->Verificaproceso($idguia,$idevento) and $this->Aplicaproceso($idguia,$idevento)) {
			
			///COLOCAR AQUI LAS VERIFICAIONES ANTES DE APROBAR
			
			
			
			////COLOCAr aqui LAS OTRAS COSAS DESPUES DE APROBAR
			
			
			
			
			} else {
				
				
			}
	}
	
	
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	+
	+	EVENTOS PARA PROCESAR LA GUIA DE REMISION, ASEGURESE DE QUE CADA EVENTO
	+	GENERADO EN TABLAS DEBE DE TENER UNA ACCION AQUI
	+
	+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
	
   ///esta funcion se repite para todas las acciones de procesar la guia
	public function verificaestado($id,$idevento){

						//sacando el estado de la guia,si no necuentra datos genera error
		        $modeloguia=$this->loadmodel($id);
		        $estado=$modeloguia->c_estgui;
		        $evento=Eventos::model()->findByPk($idevento);
		          if($evento->estadoinicial==$estado and $modeloguia->c_salida=='1') { //si el estado es el adecuado y ademas es una guia de remision
		          				return $evento->estadofinal; //devolver el nuevo estado ya que es valido 

		          }else {
		          			return null; //en caso de no proceder devolver null 

		          }

	          }


   //Idevento=2
	public function actionAprobarguia($id){
		         $sepuedeono=$this->verificaestado($id,2); //obteniendo el estado destino
		         							 if (!$sepuedeono==null) {
		         							 	///aprobar con pana y elegancia 
		         							 	$modelin=$this->loadmodel($id);
		         							 	$modelin->c_estgui=$sepuedeono;//colocar el estadodestino
		         							 	$modelin->save(); //luego grabar
		         							 	$this->render("vw_procesado");

		         							 }else{
		         							 	throw new CHttpException(404,'Este documento no se puede autorizar, no es una guia o no tiene el estado adecuado');	
		          										}


										}


 //Idevento=35
	public function actionAnularguia($id){
								$sepuedeono=$this->verificaeestado($id,35); //obteniendo el estado destino
		         							 if (!$sepuedeono==null) {
		         							 	///aprobar con pana y elegancia 
		         							 	$modelin=$this->loadmodel($id);
		         							 	$modelin->c_estgui=$sepuedeono;//colocar el estadodestino
		         							 	$modelin->save(); //luego grabar
		         							 	$this->render("vw_procesado");

		         							 }else{
		         							 	throw new CHttpException(404,'Este documento no se puede anular,no es una guia o no tiene el estado adecuado');	
		          										}


										}	



							




public function actionVerdetalle($id)
	{
		$model=new VwGuia;
		
		
		 if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('detalleguia',array(
			'model'=>$model, 'id'=>$id
		));

	}


	
	public function actionprocesardocumento($id)
	{
		$idevento=(integer)$_GET['ev'];
		$modelo=$this->loadModel((int)$id);
		$evento=VwEventos::model()->find("id=:vid",array(":vid"=>$idevento));
		if(!is_null($evento))
		{
			$cadena="";
			///Verificanod primero la consistencia del movimieto
			if((trim($modelo->c_estgui)==trim($evento->estadoinicial))){
				$modelo->c_estgui=$evento->estadofinal;
				$modelo->setScenario('cambiaestado');
				$transaccion=$modelo->dbConnection->beginTransaction();				
				if($modelo->save()) {
					$cadena=$this->proceso($idevento,(int)$id);
					if($cadena==""){
						 $transaccion->commit();
						 Yii::app()->user->setFlash('success', "El documento se ha procesado cambio de estado ".$evento->einicial."  a  ".$evento->efinal );
				
					} else {
						 $transaccion->rollback();
						Yii::app()->user->setFlash('error', " No se pudo procesar el documento Error: ".$cadena);
							//$this->render('editadocumento',array('model'=>$modelo));
							//yii::app()->end();
					}
					
					} else {
					$transaccion->rollback();
					Yii::app()->user->setFlash('error', "No se pudo cambiar el status");
				     
				}

			} else {
				Yii::app()->user->setFlash('error', " El documento ".$evento->desdocu."   no tiene el status ".$evento->einicial."  No se puede cambiar a ".$evento->efinal);
		    }



		} else {
			throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'  No se econtro ningun evento con el id {$id}'.$id);
	    }
		//$this->render('update',array('model'=>$modelo));
		$this->redirect(array('editadocumento','id'=>$modelo->id));
			
	}
	


	/****************************************************
	 *  muestra la vista de configuracion de los eventos
	 *+++++++++++++++++++++++++++++++++++++++++++++++++*/	
	
	public function actionConfiguraop()
	{
			$docu='001';  //guia de remision
			$docuhijo='023'; //detalle guia de remisio
				
				$command = Yii::app()->db->createCommand("select fn_opciones_documento(".Yii::app()->user->id." ,'".$docu."') "); 
				 $command->execute();
				$command = Yii::app()->db->createCommand("select fn_opciones_documento(".Yii::app()->user->id." ,'".$docuhijo."') "); 
				 $command->execute();
				 
				 $proveedor=VwOpcionesdocumentos::model()->search_us($docu,Yii::app()->user->id);
				  $proveedor1=VwOpcionesdocumentos::model()->search_us($docuhijo,Yii::app()->user->id);
				 $this->render('vw_admin_opciones',array(
							'proveedor'=>$proveedor,
							'proveedor1'=>$proveedor1, 
							));
	    
			
	}
	
	
	
	
	public function actionBorraitems()
	{

		$autoIdAll = $_POST['cajita'];
		$estado=$_POST[$this->modelopadre][$this->campoestado];
		 if(in_array($estado,array(self::ESTADO_CREADO,self::ESTADO_PREVIO)))
			 {
				 foreach($autoIdAll as $autoId)
					{

						$tempito= Tempdetgui::model()->findByPk($autoId);
                                                if(!is_null($tempito)){
                                                    $tempito->setScenario('cambioestado');
                                                    $tempito->c_estado=self::CODIGO_ESTADO_DETALLE_ANULADO;
                                                    if($tempito->save()){
                                                       
                                                        yii::app()->user->setFlash('success',' OK, Se borro la linea ');
                                                    }else{
                                                       yii::app()->user->setFlash('error','ERROR-  se pudo  borrar la linea '.yii::app()->mensajes->getErroresItem($tempito->geterrors())); 
                                                    }
                                                }
                                 
					}
                                         $tempito->guia->arreglaOrdenItems(self::CODIGO_ESTADO_DETALLE_ANULADO);
			} ELSE {
			 yii::app()->user->setFlash('error',' El estado del documento no permite borrar el Item');
		   }

		foreach(Yii::app()->user->getFlashes() as $key => $message) {
			echo "*)". $message . "\n";		}
	}
	
	/****************************************************
	 *	Retorna una cadena '' o 'disabled' para deshabilitar los controles del form de la vista
	 *   este es un flag para deshabilitar controles y no recarga Sqls , ES PLANO
	 ****************************************************/
	public function eseditable($estadodelmodelo)
	{
		if ($this->editable('') and ($estadodelmodelo=='10' or $estadodelmodelo=='99' or empty($estadodelmodelo) or is_null($estadodelmodelo))) {return '';} else{return 'disabled';}
	}
	

/****************************************************
	 *	Retorna una BOOEANO  para deshabilitar los controles del form de la vista
	 *   ESTE SI VERIFICA EN  LA BASE DE DATOS
	 ****************************************************/
	public function eseditablecab($id)

	{
		$modelin=$this->loadModel($id);
		$estadodelmodelo=$modelin->c_estgui;

		if ($estadodelmodelo=='10' or $estadodelmodelo=='99' or empty($estadodelmodelo) or is_null($estadodelmodelo)) {return 'si';} else{return 'no';}
	}
	
	
	
	
	
	public function ActionBorraitem($id)
	{
		$autoIdAll=array();
		if(  isset($_GET['cajita'])   ) //If user had posted the form with records selected
				{
				$autoIdAll = $_GET['cajita']; ///The records selecteds 
				};
				if(count($autoIdAll)>0)
										{
										  //Verificando que la guia este previo o creada
										  $estatus=$this->loadModel($id)->c_estgui;
										   if (  $estatus=='01' or $estatus=='99' )
										         foreach ($autoIdAll as $valor) {
																	Detgui::model()->findByPk($valor)->delete();		
																		}
													
										          echo CHtml::script("window.parent.$.fn.yiiGridView.update('detalle-grid');
																		");
														Yii::app()->end();
										}
									
		}
	
	
	
	

	public function actionAdmin()
	{
		$model=new VwGuia('search');
		$model->unsetAttributes();  // clear any default values
		
		 //$this->performAjaxValidation($model);
		if(isset($_GET['VwGuia'])) {
			//EN EL CASO DE QUE SEA UNA BUSQUEDA MEDIANTE EL FOMRUALARIO 
			//if ($model->validate()) {
			$model->attributes=$_GET['VwGuia'];
			//$model->validate();
			$proveedor=$model->search();
			 //  } else {
			  // echo "que carajo";
			  // }
		} else {
		 // $model->validate();
				$proveedor=$model->search();
		 }
		
		$this->render('admin',array(
			'model'=>$model,'proveedor'=>$proveedor,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Guia::model()->findByPk($id);
		if($model===null) {throw new CHttpException(404,'No se econtro ningun documento con el id {$id}'.$id);}	else 
		{return $model;}	
		
	}

	
	 /** Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation1($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='detgui-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='guia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}



	public function actionclonarguia() {
		$model=new VwDespachogeneral();
		//$model->setscenario("agregaritemsdespacho");
		//$this->performAjaxValidation1($model);
		if(isset($_POST['VwDespachogeneral']))
		{
			//$idvale=Vwdes::model()->find("numero=:xnumero", array(":xnumero"=>$_POST['Solpe']['numero']));
			$transaccion=$model->dbConnection->beginTransaction();
			$model->hidvale=$_POST['VwDespachogeneral']['hidvale'];
			$this->jaladespachototal($model->hidvale,$id);
			//echo $_POST['VwDespachogeneral']['hidvale'];
			//yii::app()->end();
			// $mensaje.="sdsd";
			if(!$this->huboerror()){//si no hubo errores
				$transaccion->commit();
				if (!empty($_GET['asDialog']))
				{
					echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		window.parent.$.fn.yiiGridView.update('resumen-grid');
																		");
					Yii::app()->end();
				}
			} else {
				$transaccion->rollback();
				MiFactoria::Mensaje('error', "No se pudo grabar el documento, hay  errores ");
				$this->layout = '//layouts/iframe';
				$this->render('_form_despacho',array('model'=>$model));
				// $model->refresh();
				//$this->render('update',array('model'=>$model);
				yii::app()->end();
				//$model->refresh();
			}
		}

		if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';

		$this->render('_form_despacho',array(
			'model'=>$model
		));


	}



	public function actionCargafavorito($id)

	{
		$modelohijo='Detgui';
		$modelodetalle=new $this->modeloshijos[$modelohijo];
		$modelodetalle->valorespordefecto();
		$modelocabeza=$this->loadModel($id);
		if(is_null($modelocabeza))
			throw new CHttpException(500,'No existe esta guia con este ID');
		if($this->eseditable($modelocabeza->{$this->campoestado})) {
			if(isset($_POST[$this->modeloshijos[$modelohijo]]))
			{

				$modelodetalle->attributes=$_POST[$this->modeloshijos[$modelohijo]];

				$criterio=New CDbcriteria;
				$criterio->addcondition("hidsolpe=:vhidsolpe");
				$criterio->params=Array(":vhidsolpe"=>$modelodetalle->idenfavorito);
				$listafavoritos=Desolpe::model()->findAll($criterio);
				// echo " esto es ".count($listafavoritos);
				//yii::app()->end();
				foreach ($listafavoritos as $fila){
					// if($fila['est'] <> '02' and $fila['est'] <> '99' ) //SIEMPRE QUE SEA UN ESTADO VALIDO
					// {
					$registro=New Desolpe();
					$registro->setScenario('insert');
					$registro->attributes=$modelodetalle->attributes;
					$registro->codart=$fila['codart'];
					$registro->um=$fila['um'];
					$registro->txtmaterial=$fila['txtmaterial'];
					$registro->cant=$fila['cant'];
					$registro->hidsolpe=$modelocabeza->id;
					$registro->codocu='350';
					if( $registro->save()){
						Yii::app()->user->setFlash('success', " Se Agrego la lista '".$registro->codart."' a la solicitud ");

					} else {
						// echo " NO grabo  \n";
						// print_r($registro->attributes);
					}

					//  }

				}


				//Close the dialog, reset the iframe and update the grid
				echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
									window.parent.$('#cru-detalle').attr('src','');
									window.parent.$.fn.yiiGridView.update('detalle-grid');
																		");
				Yii::app()->user->setFlash('success', " Se Agrego la lista  a la solicitud ");
				$this->render('update',array(
					'model'=>$modelocabeza, 'idcabeza'=>$modelocabeza->id
				));
				Yii::app()->end();



			}

			// if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';
			$this->render('_form_cargafavorito',array(
				'model'=>$modelodetalle,
			));
		} else {
			throw new CHttpException(500,'No se puede agregar mas items a esta solpe');
		}


	}


	private function proceso($idevento,$id) {
 $mensaje="";
   switch ($idevento) {
     case 2: ///APROBAR GUIA
     $filas=Guia::model()->findByPk($id)->detalle;
        foreach($filas as $row ) {
            if(!is_null($row->c_codactivo)){
                  $recInventario=Inventario::recordByPlate(trim($row->c_codactivo));

                  if(!is_null( $recInventario))
                     {
                        /*$recInventario->setScenario('cambiaestado');
                        $recInventario->rocoto='1';
                         $recInventario->save();*/
						 $guiaocupada=VwGuia::hayactivoentransporte($row->c_codactivo,$row->n_hguia);
						if(!is_null($guiaocupada))
							$mensaje.=" El activo ".$row->c_codactivo." ya esta registrado en la guia ".$guiaocupada;
					 }
                unset($recInventario);
            }
          }
     break;

	   case 64: ///revertir autorizacion
		  /* $filas=Guia::model()->findByPk($id)->detalle;
		   foreach($filas as $row ) {
			   if(!is_null($row->c_codactivo)){
				   $recInventario=Inventario::recordByPlate(trim($row->c_codactivo));
				   if(!is_null( $recInventario))
				   {
					   $recInventario->setScenario('cambiaestado');
					   $recInventario->rocoto='0';
					   $recInventario->save();
				   }
				   unset($recInventario);
			   }


		   }*/
		   break;

	   case 36: ///autorizar transporte
		    $filas=Guia::model()->findByPk($id)->detalle;
           foreach($filas as $row ) {
               if(!is_null($row->c_codactivo)){
                   $recInventario=Inventario::recordByPlate(trim($row->c_codactivo));
                   if(!is_null( $recInventario))
                   {
                       $recInventario->setScenario('cambiaestado');
                       $recInventario->rocoto='1';
                       $recInventario->save();
                   }
                   unset($recInventario);
               }


           }
		   break;

	 
	   case 68: ///deshacer confirmacion de transporte 
     $filas=Guia::model()->findByPk($id)->detalle;
        foreach($filas as $row ) {
            if(!is_null($row->c_codactivo)){
                  $recInventario=Inventario::recordByPlate(trim($row->c_codactivo));
                  if(!is_null( $recInventario))
                     {
                        $recInventario->setScenario('cambiaestado');
                        $recInventario->rocoto='0';
                         $recInventario->save();
                     }
                unset($recInventario);
            }
             
        
          }
     break;
     
      case 37: ///Confirmar entrega  20 -> 80 
	  $filaguia=Guia::model()->findByPk($id);
     $filas=$filaguia->detalle;
		 // var_dump( $filas);yii::app()->end();
        foreach($filas as $row ) {


			///actualizar despachos
			if($row->hidespacho >0)
			{
				$registroh=Despacho::model()->findByPk($row->hidespacho);
				$registroh->vigente='0';
				$registroh->save();
				unset($registroh);
			}




            if(!is_null($row->c_codactivo)){
                  $recInventario=Inventario::recordByPlate(trim($row->c_codactivo));

                  if(!is_null( $recInventario))
                     {
                        $recInventario->loguea($row->c_codep,$filaguia->codocu,$filaguia->id,$filaguia->c_numgui);
						$recInventario->setScenario('BATCH_UPD_INVENTARIO_FISICO');
						$recInventario->fecha=$filaguia->d_fectra;
						$recInventario->numerodocumento=$filaguia->c_numgui;
                        $recInventario->rocoto='0';
						$recInventario->iddocu=$filaguia->id;
						$recInventario->coddocu=$filaguia->codocu;
							/***************************************************
							*    AQUI LA CLAVE PARA ACTUALIZACION AUTOMATICA DEL LUGAR
							*****************************************************/
							 $filaslugares= $filaguia->direccionesllegada->lugares;
							  foreach($filaslugares as $filalugar ){
								    ///aqui debemos  de tener en cuenta el modo de envio 
									    if($row->modo=='2') {///EMBARQUE
										$recInventario->codlugar=CODIGO_LUGAR_A_BORDO;
										}
										 ELSE {///RETIORNO O DEFINITIVO 
										    $recInventario->codlugar=$filalugar->codlugar;
										
										}
								 BREAK;  //SOLO AGARRA EL PRIMNER VALOR DE LUGARES 
							  }
											
							/****************************************************/
							
                         
						if(!$recInventario->save())
							print_r($recInventario->geterrors());
						//echo " el documento ".$recInventario->coddocu. "  el docu de la guia ".$filaguia->codocu;
						//yii::app()->end();
							//$mensaje="No se pudo grabar el inventario ";
                     }
                unset($recInventario);
            }
             
        
          }
     break;
	 
	 
	 case 69: ///REVERTIR entrega  80 -> 20 
	   $filaguia=Guia::model()->findByPk($id);
	   //se podra rever tor siempre que nohay pASADO MUCHO TIEMPO Y ADEMAS EL ACTIVO ESTE EN ESE LUGAR
	      /// 1) SI ESTAMOS A TIEMPO , SEGUN PARAMETRO DE TIEMPO CONNFIGURABLE 
		     $diftiempo=strtotime('now')-strtotime($filaguia->d_fectra);
	     if($diftiempo <= yii::app()->params['guia_tmp_rever_entrega']) {
			
			   
	  
     $filas=$filaguia->detalle;
        foreach($filas as $row ) {
            if(!is_null($row->c_codactivo)){
                  $recInventario=Inventario::recordByPlate(trim($row->c_codactivo));
                  if(!is_null( $recInventario))
                     {
                        $criterio=new CDbCriteria;
						$criterio->addCondition(" hidinventario=:vidinventario");
						$criterio->addCondition(" iddocumov=:viddocu");
						$criterio->addCondition(" codocumov=:vcodocu");
						$criterio->params=array(  ":vidinventario"=>$recInventario->idinventario,
									           ":viddocu"=>$filaguia->id,
											    ":vcodocu"=>$filaguia->codocu,
						                    );
					  
					  $modelog=Loginventario::model()->find($criterio);

						 if (!is_null($modelog)){
							 //$mensaje.=" Encontro el log del activo ".$recInventario->idinventario."<br>";
						 } else {
							// $mensaje.=" NO Encontro el log del activo ".$recInventario->idinventario."<br>";
						 }
					/*  echo $criterio->condition;
					  echo "<br>";
					 echo  $recInventario->idinventario."<br>";
					 echo  $filaguia->id."<br>";
					echo  $filaguia->codocu."<br>";*/

						//2) si el activo permanece EN ALGUNLUGAR DE LALDIRECCION DE LLEGADA 
                                     $lugaresvalidos=array();
									 $filalugaresvalidos=$filaguia->direccionesllegada->lugares;
									/* var_dump($filalugaresvalidos);
									 yii::app()->end();*/
									 if (count($filalugaresvalidos)>0)
										foreach($filalugaresvalidos as $filadirelle)
										{
											$lugaresvalidos[]=$filadirelle->codlugar;
										}
							$seracierto=in_array($recInventario->codlugar,$lugaresvalidos) and $recInventario->rocoto=='0';


						
						
						if($seracierto)
						{
							//$mensaje.="  SI esta en lugares  ...procesando la recuparcion del log  ".$recInventario->idinventario."<br>";
						//$recInventario->loguea();
						$recInventario->setScenario('BATCH_UPD_INVENTARIO_FISICO');
						$recInventario->fecha=$modelog->fecha;
						$recInventario->numerodocumento=$modelog->numerodocumento;
                        $recInventario->rocoto='1';
						 $recInventario->codep=$modelog->codep;
						  $recInventario->codepanterior=$modelog->codepanterior;
						$recInventario->iddocu=$modelog->iddocu;
						$recInventario->coddocu=$modelog->coddocu;
						$recInventario->codlugar=$modelog->codlugar;
						 $recInventario->save();
						 $modelog->delete();
						} else {
							  $mensaje.=" El activo  ".$recInventario->idinventario."  ya ha cambiado de lugar ".$recInventario->codlugar." /  ".$modelog->codlugar."  o esta en trasnporte<br>";
						 
						}
                     }

				 
            }

          }
		 } else {
			 
			 $mensaje.=" No se puede revertir la entrega, ha pasado mas tiempo de la tolerancia <br>";
		 }
     break;
	 
	 
	 
     
     }
  return $mensaje;
 }

	public function actionmodificadetalleactivo($id)
	{
		$model=Tempdetgui::Model()->findByPk($id);
		$model->setScenario('UPD_ACTIVO');
		if ($model===null)
			throw new CHttpException(404,'No se encontro ningun documento para estos datos');
			$this->performAjaxValidation1($model);
		if(isset($_POST['Tempdetgui']))
		{
			$model->attributes=$_POST['Tempdetgui'];
			if($model->save())
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		");
					Yii::app()->end();
				}
			//$this->redirect(array('view','id'=>$model->n_guia));
		}
		if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';
		$this->render('_form_activo',array(
			'model'=>$model, 'idcabeza'=>$model->n_hguia,
		));

		/*} else{ //si ya cambio el estado impisble agregar mas items

		   if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('vw_imposible',array(

		));
		}*/

	}

	/*  Est funcio  inserta items de materiales codificados vaiondano segune l escenario
	   devuelv un aray de errores, en caso de tener exito en todos un array vavio
	    @arrayvalores :  Array de 3 columnas  codigo + cant + um , si solo
	    se pasa las dos columnas, se ausme que la unidad d eemdiad es la um base del material
	*/
	private function insertaitems($arrayvalores,$escenario){
				$modelohijo='Detgui';
		$mensa="";
		if(is_array($arrayvalores)){
			foreach ($arrayvalores  as $clave=>$valor){
				$modelodetalle=new $this->modeloshijos[$modelohijo];
				$modelodetalle->setScenario('INS_NUEVO');
				$modelodetalle->valorespordefecto();
				$modelodetalle->c_codgui=$valor[0];
				$modelodetalle->n_cangui=$valor[1];
				if(!is_null($valor[2])){
					$modelodetalle->c_um=$valor[2];
				}else{
					$maestro=Maestrocompo::model()->findByPk($valor[0]);
					if(!is_null($maestro)){
						$modelodetalle->c_um=$maestro->maestro_ums->um; unset($maestro);
					}else{
						$modelodetalle->c_um=null;
					}

				}
				$modelodetalle->save();
				$mensa.=yii::app()->mensajes->getErroresItem($modelodetalle->getErrors());


			}



		}

        Return $mensa;

	}

	public function editable($estadodelmodelo)
	{
		if (in_array(strtolower(substr($this->getAction()->id,0,4)),array('edit','crea')) )
		{return true;} else{return false;}
	}


        
        public function actionsubearchivo() {
            /* $encoded_data = $_POST['mydata'];
             $binary_data = base64_decode( $encoded_data );
             $result = file_put_contents( 'webcam.jpg', $binary_data );
            if (!$result) die("Could not save image!  Check file permissions.");*/
             //$foto=New Directoriofotos($this->documentohijo,$this->id,100,'/images','.jpg');
            move_uploaded_file($_FILES['webcam']['tmp_name'],Yii::getPathOfAlias('webroot').'/images/webcam.jpg');
            
        }
        
        
        public function actionCreadetalleCompo($idcabeza,$cest)
	{
		$idcabeza=(integer)  MiFactoria::cleanInput($idcabeza);
               $modelocabeza=$this->loadModel($idcabeza) ;
            if($cest=='10' OR $cest=='99') {
		$model=new Tempdetgui;
		$model->setScenario('INS_COMPO');
		$model->valorespordefecto($this->documentohijo);
			$model->n_cangui=1;
			$model->c_um='120';
		if(isset($_POST['Tempdetgui']))		{
			$model->attributes=$_POST['Tempdetgui'];
			$model->codocu=$this->documentohijo; ///detalle guia
			$model->n_hguia=$idcabeza;
			//crietria para filtrar la cantidad de items del detalle
			
			$model->c_itguia=$modelocabeza->getNextItem();
			//str_pad($somevariable,$anchocampo,"0",STR_PAD_LEFT)behaviors;
			////con esto calculamos el numero de items
			//echo "  El valor de  ".$idcabeza."       ".$model->n_hguia."   ";
			
			if($model->save())
					  if (!empty($_GET['asDialog']))
								{
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
		$this->render('_form_componente',array(
			'model'=>$model, 'idcabeza'=>$idcabeza
		));
		} else{ //si ya cambio el estado impisble agregar mas items
		   if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('vw_imposible',array(
			
		));	
		}
	}
	
        
	public function actionmodificadetallecompo($id)
	{
		$model=Tempdetgui::Model()->findByPk($id);
		$model->setScenario('UPD_COMPO');
		if ($model===null)
			throw new CHttpException(404,'No se encontro ningun documento para estos datos');
			$this->performAjaxValidation1($model);
		if(isset($_POST['Tempdetgui']))
		{
			$model->attributes=$_POST['Tempdetgui'];
			if($model->save())
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		");
					Yii::app()->end();
				}
			//$this->redirect(array('view','id'=>$model->n_guia));
		}
		if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';
		$this->render('_form_componente',array(
			'model'=>$model, 'idcabeza'=>$model->n_hguia,
		));

		/*} else{ //si ya cambio el estado impisble agregar mas items

		   if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('vw_imposible',array(

		));
		}*/

	}
        
        
        public function actionAgregadespacho($id){
            $idguia=(integer)  MiFactoria::cleanInput($id);
            // $idvale=(integer)  MiFactoria::cleanInput($_GET['idvale']);
             $guia=$this->loadModel($id);
             $registrodetalle=New Tempdetgui();
             //$vale=  Almacendocs::model()->findBypK($idvale);
            // if(is_null($vale))
               //  throw new CHttpException(500,'No se encontro ningun documento Vale para estos datos '.$idvale);
             //var_dump($_POST);
             if(isset($_POST['Tempdetgui'])){
                    $autoIdAll = $_POST['cajita'];
                    //$estado=$guia->{$this->campoestado};
		 if(in_array($guia->{$this->campoestado},array(self::ESTADO_CREADO,self::ESTADO_PREVIO)))
			 {
			//$logi="";
                        $mensaje="";	
                        //var_dump($autoIdAll);die();
                        $items=$guia->numeroitems;
                     foreach($autoIdAll as $autoId)
					{
                                            
                                            $modelodespacho=Despacho::model()->findBypK($autoId);
                                           $modelodetalle=New Tempdetgui('INS_VALE');
			
                                            $modelodetalle->setAttributes(
                                                    array(
                                                        'c_af'=>  MiFactoria::material_almacen(),
                                                        'c_itguia'=>str_pad($items+1,3,"0",STR_PAD_LEFT),
                                                        'n_hguia'=>$guia->id,
                                                        'hidref'=>$modelodespacho->id,
                                                        'n_cangui'=>$modelodespacho->getcantidadadespachar(),
                                                        'c_codgui'=>$modelodespacho->kardex->codart,
                                                         'c_edgui'=>$_POST['Tempdetgui']['c_edgui'],
                                                         'c_descri'=>$modelodespacho->kardex->maestro->descripcion,
                                                          'c_um'=>$modelodespacho->kardex->um,
                                                        'c_codep'=>$_POST['Tempdetgui']['c_codep'],
                                                         'c_estado'=>self::ESTADO_PREVIO,
                                                          'idusertemp'=>yii::app()->user->id,
                                                         'codocu'=>$this->documentohijo,
                                                            'codob'=>$_POST['Tempdetgui']['codob'],
                                                    )
                                                    );
					if($modelodetalle->save()){
                                            $items+=1;
                                           // $logi.="1";
                                        }else{
                                             //$logi.="0";
                                             $mensaje.=yii::app()->mensajes->getErroresItem($modelodetalle->getErrors());
                                             
                                            MiFactoria::Mensaje('error',yii::app()->mensajes->getErroresItem($modelodetalle->getErrors()));
                                        }
                                        
                                            unset($modelodetalle);
                                        
                                        
					}
                                        //var_dump($mensaje);die();
                                       //ahora si es que no hay errores a cerrar el cuadro de dialogo 
                                            if(strlen($mensaje)==0){  
                                                echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
                                                                 window.parent.$('#cru-detalle').attr('src','');
								window.parent.$.fn.yiiGridView.update('detalle-grid');
								");
                                                Yii::app()->end();
                                            }
													//Close the dialog, reset the iframe and update the grid
								
														//Yii::app()->end();
							  
                                        
			} ELSE {
			 yii::app()->user->setFlash('error',' El estado del documento no permite borrar el Item');
		   }
             
             }
            
             // if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('_form_despacho',array(
			'model'=>$registrodetalle, 'guia'=>$guia
		));
             
        }
        
        public function actiontomafoto($id){
      $detalle=  Tempdetgui::model()->findByPk((integer)  MiFactoria::cleanInput($id));  
      if(!is_null($detalle)){          
          if(isset($_FILES['webcam']['tmp_name']))
              {
              $nombretemp= Yii::getPathOfAlias('webroot').
                      yii::app()->settings->get('general','general_directorioimg').DIRECTORY_SEPARATOR;
              $nombretemp.=(microtime(true)*10000).yii::app()->user->id.'.jpg';
              //throw new CHttpException(500,'ver     '.$nombretemp); 
             if( move_uploaded_file(
                      $_FILES['webcam']['tmp_name'],
                     $nombretemp
                      ))
                   // throw new CHttpException(500,'eroor      '.$_FILES['webcam']['tmp_name']); 
              //echo $_FILES['webcam']['tmp_name'];die();
               $detalle->colocaarchivo($nombretemp);
               unlink($nombretemp);
              //move_uploaded_file($_FILES['webcam']['tmp_name'],Yii::getPathOfAlias('webroot').'/images/webcam.jpg');
                           
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script(     "window.parent.$('#cru-dialog3').dialog('close');
								window.parent.$('#cru-frame3').attr('src','');"
                                                            );
				
                                yii::app()->end();
                }            
                                
          if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('//site/subefotos',array('model'=>$detalle));
         
      }else{
         	throw new CHttpException(500,'No se encontro el item id del item de la Gr'); 
      }
    }
}