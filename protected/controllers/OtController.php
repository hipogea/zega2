<?php
        

class OtController extends ControladorBase
{
	
        CONST ESTADO_PREVIO='99';
	CONST ESTADO_CREADO='10';
	CONST ESTADO_ANULADO='50';
	CONST ESTADO_MODIFICADO='20';
	CONST ESTADO_ACEPTADO='30';
	CONST ESTADO_CON_ENTREGAS='30';
	CONST ESTADO_FACTURADO_PARCIAL='70';
	CONST ESTADO_FACTURADO_TOTAL='40';
	CONST ESTADO_DESOLPECOMPRA_NUEVO='10';  // DESOLPECOMRPA CREADO
	CONST ESTADO_DESOLPECOMPRA_APROBADO='20';// DESOLPECOMRPA APROBADO
	CONST ESTADO_DESOLPECOMPRA_ANULADO='30';// DESOLPECOMRPA ANULADO
	CONST ESTADO_DOCOMPRA_NUEVO='10';  // DESOLPECOMRPA CREADO
	CONST ESTADO_DOCOMPRA_APROBADO='20';// DESOLPECOMRPA APROBADO
	CONST ESTADO_DOCOMPRA_ANULADO='40';// DESOLPECOMRPA ANULADO
	const ESTADO_DOCOMPRA_CREADO='10';
    const ESTADO_DETALLE_ANULADO='98';
    
    
    
      const ESTADO_DETALLE_CONSIGNACIONES_ANULADA='40';    
        const COD_MOV_CONSIGNACION='14';  
         const COD_MOV_ANULA_CONSIGNACION='15';   

	public $layout='//layouts/column2';


	public function __construct() {
		parent::__construct($id='ot',Null);
		$this->documento='890';
		$this->modelopadre='Ot';
		$this->modeloshijos=array('Detot'=>'Tempdetot','Desolpe'=>'Tempdesolpe','Otconsignacion'=>'Tempotconsignacion');
		//$this->modeloshijos=array('Desolpe'=>'Tempdesolpe');
		$this->documentohijo='891';
		$this->campoestado="codestado";
		$this->ConfigArreglos();
		//$nuevo=new $this->modelopadre;
		//$this->campoenlace=$nuevo->getFieldLink($nuevo->relations(),$this->modelopadre,);

	}




	public function actionCreaDocumento()
	{

		$this->ClearBuffer(null);
		$model=new $this->modelopadre;
		$model->valorespordefecto();
		$this->performAjaxValidation($model);
		$model->iduser=Yii::app()->user->id;
		if(isset($_POST[$this->modelopadre]))
		{

			$model->attributes=$_POST[$this->modelopadre];
			$model->codocu=$this->documento;
                        
			if($model->save()){

				$this->redirect(array('editadocumento','id'=>$model->id));
				//$this->limpiatemporal();
				//$model->refresh();
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}


	public function actionEditaDocumento($id)
	{
		     
            $model=MiFactoria::CargaModelo($this->modelopadre,$id);
		$modelolabor=new Tempdesolpe('search_por_ot');
		$modelolabor->unsetAttributes();  // clear any default values 
                $modeloconsi=new Tempotconsignacion('search_por_ot');
		$modeloconsi->unsetAttributes();  // clear any default values
     
		if(isset($_GET['Tempdesolpe'])){
			$modelolabor->attributes=$_GET['Tempdesolpe'];
			//var_dump($modelhijo->attributes);die();
		}
                if(isset($_GET['Tempotconsignacion'])){
			$modeloconsi->attributes=$_GET['Tempotconsignacion'];
			//var_dump($modelhijo->attributes);die();
		}
		if($model->{$this->campoestado}==self::ESTADO_PREVIO)
			$model->{$this->campoestado}=self::ESTADO_CREADO;                       
		if($this->itsFirsTime($id))
		{
			$uintruso=$this->getUsersWorkingNow($id);
			if($uintruso)
			{ //si esta ocupado
				MiFactoria::Mensaje('error', "Solo puede visualizar, este documento, esta siendo modificado por el usuario    :     <b>". Yii::app()->user->um->loadUserById($uintruso)->username." </b>");
				$this->out($id);
				$this->redirect(array('VerDocumento','id'=>$model->id));
			} else { // Si no lo esta renderizar sin mas
				
                            $this->setBloqueo($id) ; 	///bloquea                           
				$this->ClearBuffer($id); //Limpia temporal antes de levantar
                    
                                $this->IniciaBuffer($id); //Levanta temporales
                                $this->render('update',array('modeloconsi'=>$modeloconsi,'modelolabor'=>$modelolabor,'model'=>$model,'editable'=>true));
				yii::app()->end();
			}

		} else {
			if($this->isRefreshCGridView($id))
			{ //si esta refresh de grilla
				$this->render('update',array('modeloconsi'=>$modeloconsi,'modelolabor'=>$modelolabor,'model'=>$model,'editable'=>true));
				yii::app()->end();
			} else { // Si no lo es  tenemos que analizar los dos casos que quedan
				if($this->IsRefreshUrlWithoutSubmit($id))
				{ ///Solo refreso la pagina
                                        
					MiFactoria::Mensaje('notice', "No has confirmado los datos, solo has refrescado la pagina ");
					$this->render('update',array('modeloconsi'=>$modeloconsi,'modelolabor'=>$modelolabor,'model'=>$model,'editable'=>true));
					yii::app()->end();
				} else {
                                      
					$this->performAjaxValidation($model);
					IF(isset($_POST[$this->modelopadre])) {
						$model->attributes=$_POST[$this->modelopadre];
						if($this->hubocambiodetalle($id) OR  $model->hacambiado()) {
							$transacc=Yii::app()->db->beginTransaction();
							if($model->save()){
								$this->ConfirmaBuffer($id); //Levanta temporales
								$this->terminabloqueo($id);
								$this->ClearBuffer($id);
							}ELSE{
                                                            MiFactoria::mensaje('error',yii::app()->mensajes->getErroresItem($model->geterrors()));
                                                            }
							if(!$this->detectaerrores()){
								$transacc->commit();
								MiFactoria::Mensaje('success', "Se grabo el documento  ".$this->SQL);
								$this->out($id);
								//$this->redirect(array('VerDocumento','id'=>$model->id));
								$this->redirect(array('verdocumento','id'=>$model->id));
							}else{
								$transacc->rollback();
								$this->render('update',array('modeloconsi'=>$modeloconsi,'modelolabor'=>$modelolabor,'model'=>$model,'editable'=>true));
								yii::app()->end();
							}
						} else   {
							MiFactoria::Mensaje('notice', "  Enviaste los datos pero no has modificado nada.... ");
							$this->render('update',array('modeloconsi'=>$modeloconsi,'modelolabor'=>$modelolabor,'model'=>$model,'editable'=>true));
							yii::app()->end();
						}
					} else  { //En este caso quiere decir que la sesion/bloqueo anterior no se ha cerrado correactmente
						// Y es posble que haya entrado despues de 2 dias, una semana asi
						$this->terminabloqueo($id);
						$this->SetBloqueo($id);
						MiFactoria::Mensaje('notice', "NO cerraste correctamente, Ya tenÃ­as una sesion abierta en este domcuento,");
						$this->render('update',array('modeloconsi'=>$modeloconsi,'modelolabor'=>$modelolabor,'model'=>$model,'editable'=>true));
						yii::app()->end();
					}
				}
			}
		}
	}


	public function actionVerDocumento($id){
		$editable=false;
		$model= $this->loadModel((int)$id);
		// $this->ClearBuffer($id); //Limpia temporal antes de levantar
		//  $this->IniciaBuffer($id); //Levanta temporales
		$this->render('view',array(
			'model'=>$model,'editable'=>$editable,
		));



	}

	public function actionRefrescadescuento(){
		$idguia=MiFactoria::cleanInput($_POST['Ocompra']['idguia']);
		// $modelocompra=$this->loadModel($idguia);

		$descuento=MiFactoria::cleanInput($_POST['Ocompra']['descuento']);
		Yii::app()->db->createCommand()
			->update(
				'{{Docompratemp}}',array(
				"punitdes"=> new CDbExpression('punit*(1-:vdescuento/100)',array(":vdescuento"=>$descuento))
			),
				"hidguia=:vid",
				array(":vid"=>$idguia)
			);
		//$model=$this->loadModel($idguia);
		//$model->actualizadescuento(MiFactoria::cleanInput($_POST['Ocompra']['descuento']));
		// echo "salio    ".$idguia;*/
	}




	public function actionCreadetalle($idcabeza,$cest)
	{
		
            $modelopadre=$this->loadModel($idcabeza);
              
		//$descuento=(is_null($modelopadre->descuento))?0:(1-$modelopadre->descuento/100);
		$model=new Tempdetot();
              // die();
		$model->hidorden=$idcabeza;
		$model->codestado=self::ESTADO_PREVIO;
		$model->idusertemp=Yii::app()->user->id;
		$model->idaux=round(microtime(true) * 1000);
                
		$model->codocu=$this->documentohijo; ///detalle guia
		$model->valorespordefecto($this->documentohijo);
		//$model->tipoitem='M';
               
		if(isset($_POST['Tempdetot']))		{
			$model->attributes=$_POST['Tempdetot'];


			//$model->punitdes=$model->punit*$descuento;
			//crietria para filtrar la cantidad de items del detalle
			$criterio=new CDbCriteria;
			$criterio->condition="hidorden=:idguia  ";
			$criterio->params=array(':idguia'=>$idcabeza);
			$model->item=str_pad(Tempdetot::model()->count($criterio)+1,3,"0",STR_PAD_LEFT);
			//str_pad($somevariable,$anchocampo,"0",STR_PAD_LEFT);
			////con esto calculamos el numero de items
			//echo "  El valor de  ".$idcabeza."       ".$model->n_hguia."   ";
			$this->performAjaxValidationdetalle($model);
			if($model->save()){
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		window.parent.$.fn.yiiGridView.update('resumenoc-grid');
																		");

				}
			}

		}
		// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
                
		$this->render('_form_detalle',array(
			'model'=>$model, 'idcabeza'=>$idcabeza,'editable'=>true
		));
	}


	public function actionCreadetallerecurso($idcabeza,$cest)
	{
		
            $modelopadre=$this->loadModel($idcabeza);
		//$descuento=(is_null($modelopadre->descuento))?0:(1-$modelopadre->descuento/100);
		$model=new Tempdesolpe('buffer');
		$model->hidot=$idcabeza;
		$model->est=self::ESTADO_PREVIO;
		$model->idusertemp=Yii::app()->user->id;
		$model->hcodoc=$this->documento; //
                $model->tipimputacion='T';
                $model->codocu='350'; //
		$model->tipsolpe='M';
		
		$model->imputacion=$modelopadre->objetosmaster->objetoscliente->cebe;

		$model->valorespordefecto('350');
		//$model->tipoitem='M';
		if(isset($_POST['Tempdesolpe']))		{
			$model->attributes=$_POST['Tempdesolpe'];


			//$model->punitdes=$model->punit*$descuento;
			//crietria para filtrar la cantidad de items del detalle
			$criterio=new CDbCriteria;
			$criterio->condition="hidot=:idguia  ";
			$criterio->params=array(':idguia'=>$idcabeza);
			$model->item=str_pad(Tempdesolpe::model()->count($criterio)+1,3,"0",STR_PAD_LEFT);
			//str_pad($somevariable,$anchocampo,"0",STR_PAD_LEFT);
			////con esto calculamos el numero de items
			//echo "  El valor de  ".$idcabeza."       ".$model->n_hguia."   ";
			$this->performAjaxValidationdetalle($model);
			if($model->save()){
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script(
                                                "window.parent.$('#cru-dialogdetalle').dialog('close');
							window.parent.$('#cru-detalle').attr('src','');
                                                        window.parent.$.fn.yiiGridView.update('detalle-recursos-grid');	
                                                        ");

				}
			}

		}
		// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('_form_detalle_recursos',array('modelopadre'=>$modelopadre,
			'model'=>$model, 'idcabeza'=>$idcabeza,'editable'=>true
		));
	}

	public function actionmodificadetallerecurso($id)
	{

		$model=Tempdesolpe::model()->findByPk(MiFactoria::cleanInput($id));
		$model->setScenario('buffer');
		//$model->tipoitem='M';
		if(isset($_POST['Tempdesolpe']))		{
			$model->attributes=$_POST['Tempdesolpe'];


			//$model->punitdes=$model->punit*$descuento;
			//crietria para filtrar la cantidad de items del detalle

			//str_pad($somevariable,$anchocampo,"0",STR_PAD_LEFT);
			////con esto calculamos el numero de items
			//echo "  El valor de  ".$idcabeza."       ".$model->n_hguia."   ";
			$this->performAjaxValidationdetalle($model);
			if($model->save()){
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
			echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
				window.parent.$('#cru-detalle').attr('src','');
                                window.parent.$.fn.yiiGridView.update('detalle-recursos-grid');
				
			");

				}
			}

		}
		// if (!empty($_GET['asDialog']))
		$formulario=($model->tipsolpe=='M')?'_form_detalle_recursos':'_form_servicio';
		$this->layout = '//layouts/iframe';
		$modelopadre=Ot::model()->findByPk($model->hidot);
		$this->render($formulario,array('modelopadre'=>$modelopadre,
			'model'=>$model, 'idcabeza'=>$modelopadre->id,'editable'=>true
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
				'actions'=>array('AjaxUpadteTextosImg','Editatarifas','updatecuadrilla','ajaxborratrabajadores',  'AjaxAgregaTrabajadores','ajaxcompo','AgregaDetalleOtCompo','muestrakardex', 'modificadetalleconsignacion',   'Borraitemsconsignaciones',   'JalaMaterialesExt',   'ajaxobjetosporclipro',    'ajaxmuestralistamateriales','JalaMateriales','view','imputa','cargagaleria','tomafoto','creaconsignacion','borraitemsdesolpe','nadax','creaservicio','modificadetallerecurso','creadetallerecurso','verprecios','crearpdf','verDetoc','firmar','aprobar','cargaprecios','enviarpdf','admin','borrarimpuesto','reporte','agregarmasivamente','cargadirecciones','borraitems','sacaitem','sacaum','salir','agregaimpuesto','agregaritemsolpe','procesardocumento','refrescadescuento','VerDocumento','EditaDocumento','creadocumento','Agregardelmaletin','borraitem','imprimirsolo','cargaentregas','agregarsolpe','agregarsolpetotal','pasaatemporal','create','imprimirsolo','imprimir','imprimir2','enviarmail',
					'procesaroc','hijo','Aprobaroc','Reporteoc','Anularoc','Configuraop','Revertiroc', ///acciones de proceso
					'libmasiva','creadetalle','Verdetalle','muestraimput','update','nada','Modificadetalle'),
				'users'=>array('@'),
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}



	public function actionborrarimpuesto($id) {
		$idtemp=(int)MiFactoria::cleanInput($id);
		$reg=Tempimpuestosdocuaplicados::model()->findByPk($idtemp);

		$criteriox=New CDBCriteria();
		$criteriox->addCondition("hidocupadre=:viddocu AND codocu=:vcodocu AND codimpuesto=:vcodimpuesto");
		$criteriox->params=array(":viddocu"=>$reg->iddocu,  ":vcodocu"=>$reg->codocu,":vcodimpuesto"=>$reg->codimpuesto);
		///tambien en la tabla impuesiosaplicados
		//$transaccion=$reg->dbConnection->beginTransaction();
		// Impuestosaplicados::model()->deleteAll($criteriox);
		// $reg->delete();
		$reg->setScenario('borra');
		$reg->idstatus=-1;$reg->save();
		//$transaccion->commit();

	}



	///ESTA FUNCION SE ENCARGA DE AGREAR UN REGISTRO DE DOCOMPRA Y LO DEJA
	/// LISTO PARA VALIDARLO EN LE PROCESO SAVE() DEL ACTION CREADETALE DEL DOCUMENTO PADRE
	///RESUMEN: COLOCARLO INMEDIATAMENTE DESPUES DE:  ACTIONCREDETALLE()
	///RESUELVE TODOS LOS CASOS DE LA COMPRA
	///parametro $modelodetalle : Un registro original de Docompra ,
	//a

	public function preparaitem($modelodetalle,$modelocompra,$iddesolpe=null) {
		$mensa="";
		if($modelodetalle->isNewRecord){
			$registro=New Docomprat;
			$registro->iddocompra=-1;
			$registro->valorespordefecto();
			$registro->hidguia=$modelocompra->idguia;
			if(!is_null($iddesolpe));
			$registro->iddesolpe=$iddesolpe;

		}  else {/// sI ES UN REGISTRO EXISTENTE
			///Verificar si el status de la OC lo permite
			if($modelodetalle->desolpe_solpe->codestado =='10' or $modelodetalle->desolpe_solpe->codestado =='20'){
				///Clonar el registro a Docomprat;
				$registro=$this->clonaDocomprat($modelodetalle,$iddesolpe);
				return $registro;

			} else {
				$mensa.=" El status de la OC no permite agregar mas items <br>";
				Return $mensa;
			}
			// $mensa.=" El status de la OC no permite agregar mas items <br>";
		}
	}



	public function clonaDocompra($modelodetalle)  {
		$mensa="";
		if(!is_null($modelodetalle) and  !$modelodetalle->IsNewRecord) {
			$docompratemporal=new Docompra;
			$docompratemporal->tipoimputacion= $modelodetalle->tipoimputacion;
			$docompratemporal->codentro= $modelodetalle->codentro;
			$docompratemporal->codigoalma= $modelodetalle->codigoalma;
			$docompratemporal->descri=$modelodetalle->descri;
			$docompratemporal->detalle=$modelodetalle->detalle;
			$docompratemporal->ceco=$modelodetalle->ceco;
			$docompratemporal->um=$modelodetalle->um;
			$docompratemporal->tipoitem=$modelodetalle->tipoitem;
			$docompratemporal->cant=$modelodetalle->cant;
			$docompratemporal->codart=$modelodetalle->codart;
			$docompratemporal->punit=0;
			$docompratemporal->iddesolpe=$iddesolpe;///es un  parametro para indincar que Docompra es libre o relacopnada
			// $docompratemporal->iddocompra=$modelodetalle->iddocompra; //importante para que pueda pasar al terompral como un regiustro agregado
			$docompratemporal->hidguia=$hidguia; //importante para que pueda pasar al terompral como un regiustro agregado
			$docompratemporal->setscenario('clonasolpe');
			// $docompratemporal->save();
			return $docompratemporal;
		} else {
			$mensa.=" El registro o modelo pasado como para metro para clonar el detalle de la Solpe no existe o es un registro recien creado <br>";
			return $mensa;
		}

	}

	public function actionsalir($id){
		$this->out($id);
		$this->redirect(array('admin'));
	}



	public function hubocambios($modelo) {

		return $modelo->hubocambios();










	}




	///
	//BOOLEAN: verifica si se han mdificado algunso de lso campos pasados como paramertos en el array $campossensibles
	public function hubocambiossensibles($modelo,$campossensibles) {
		$retorno=false;
		$camposmodificados=$modelo->cambios();
		foreach ($camposmodificados as  $value) {
			if(in_array($value,$campossensibles) )
				$retorno=true;
			break;


		}
		return $retorno;
	}

//El parametro $iddesolpe detrermina si es un item libre o esta relacionado a una solpe
///de aprovisionamiento
	public function preparaantesdeguardaritemcompra($modelodetalle){
		$cadenita="";

		if(($modelodetalle->docompra_ocompra->codestado='10') or ($modelodetalle->docompra_ocompra->codestado='20')){
			if($modelodetalle->cambio()) {
				if($this->hubocambiossensibles($modelodetalle,array('codart','punit','cant','estadodetalle'))) {
					if($modelodetalle->cantidadentregada == 0) {
						if(!is_null($modelodetalle->iddesolpe)) { ///NO ES UN ITEM LIBRE

							///vERIFICAR LA CONSIUSTENCIA DEL VALOR DEL PARAMETRO ENTREGADO
							$registrodetallesolpe=Desolpe::model()->findByPk($modelodetalle->iddesolpe);
							if(!is_null($registrodetallesolpe)){
								if($registrodetallesolpe->desolpe_solpe->escompra !='1' or is_null($registrodetallesolpe->idreserva) ){
									///Actualizar los datos aguas arriba (SOLPES Y RESERVAS)


									$registrodetallesolpe->SetScenario('cambiaestado');
									$registroreserva=Alreserva::model()->findByPk($registrodetallesolpe->idreserva);
									if( !is_null($registroreserva)) {
										$registroreserva->SetScenario('cambiaestado');
										//Ahora vamos por la solpe que genero la reserva
										$registrodetallesolpeoriginal=Desolpe::model()->findByPk($registroreserva->hidesolpe);
										if( !is_null($registrodetallesolpeoriginal)) {

											$registrodetallesolpeoriginal->SetScenario('cambiaestado');

											///Verificando las compras en DESOLPECOMPRA
											$cantidad_comprada=$registrodetallesolpe->cantcompras;
											if($cantidad_comprada > 0)   ///SI YA HABIDO ATENCIONES EN LA TABLA DESOLPECOMPRA
											{

												$setratadeanulacion=false;
												if(($modelodetalle->oldattributes['estadodetalle'] <> '40') and ($modelodetalle->estadodetalle=='40'))
												{  ///Si se trata de una anulacion hay que anular el registro de DESOLPECOMPRA
													$nuevocriterio=New CDbcriteria;
													$nuevocriterio->addCondition("iddesolpe=:xiddesolpe AND iddocompra=:xiddocompra ");
													$nuevocriterio->params=array(':xiddesolpe'=>$modelodetalle->iddesolpe,':xiddocompra'=>$modelodetalle->id);
													$modelodesolpecompra=Desolpecompra::model()->find($nuevocriterio);
													$modelodesolpecompra->codestado='30'; //ANULAR  ......!!!!
													if(!$modelodesolpecompra->save())
														$cadena.=" El item ".$modelodetalle->item." - ".$modelodetalle->descri."  : No se pudo anular el registro de Detalles-solicitudes/Detalle-compras  <br>";
													$setratadeanulacion=true;
												}


												if( $cantidad_comprada +$modelodetalle->cant ==$registrodetallesolpe->cant)
												{
													//Es una atencion unica el caso mas simple, uno a uno
													///Verificar si se trata de una anulacion
													if($setratadeanulacion)
													{
														///El proceso retrocede, hayq ue anular tambien el registro de la tab la puente DESOLPECOMPRA
														/// y revertir los estados
														$registrodetallesolpe->est='30'; //APROBADO
														$registroreserva->estadoreserva='20'; //EN PROICESO DE COMPRA X Q LA SOLPE AUN PERMANECE COMO APROBADA
														$registrodetallesolpeoriginal->est='70'; ///EN PROCESO DE COMPRA X Q LA RESERVA Y LA SOLPE AUN ESTAN VIGENTES


													} else { ///Si no se trata de una anulacion el proceso "evoluciona"
														$registrodetallesolpe->est='40'; //ATENDIDO
														$registroreserva->estadoreserva='50'; //COMPRADO TOTALMENTE
														$registrodetallesolpeoriginal->est='90'; ///Comprado totalmente
													}




												} else { //Significa que conn esta compra aun falta o se han excedido..veamos
													if( $cantidad_comprada +$modelodetalle->cant < $registrodetallesolpe->cant) {
														// En este caso se esta comprando pero aun falta completar, un abastecimiento parcial
														$registrodetallesolpe->est='70'; //EN COMPRA
														$registroreserva->estadoreserva='60'; //EN COMPRA

													} else { ///Error se pasaron de la cantidad solicitada
														///Error
														$cadena.=" El item ".$modelodetalle->item." - ".$modelodetalle->descri."  : Se esta comprando : (".($cantidad_comprada +$modelodetalle->cant).")   mas de lo que se solicito :(".$registrodetallesolpe->cant.")  en la solicitud ".$registrodetallesolpe->desolpe_solpe->nunero."-".$registrodetallesolpe->item."    <br>";


													}

												}

											} else { ///qUIER DECIR QUE ES LA PRIMERA VEZ QUE SE ATENDERIA ESTE ITEM

											}
											$registrodetallesolpeoriginal->save();
										} else { //Error no se pudo ubicar el detalle de la Solpe Padre
											//eRRROR
											$cadena.=" El item ".$modelodetalle->item." - ".$modelodetalle->descri."  : No se pudo encontrar la solicitud original (Imputada) asociada (".$registroreserva->hidesolpe.")  <br>";

										}
										$registroreserva->save();
									} else { //Error no se ecnontro la reserva que genero la solpe de aprovisionamiento
										$cadena.=" El item ".$modelodetalle->item." - ".$modelodetalle->descri."  : No se pudo encontrar la reserva asociada <br>";

									}
									$registrodetallesolpe->save();
								} else {///Error , La solpe no es de aprovisionamiento o tiene el campo idererva vacio  lo qaue quiere decir que no es una solpe de aprovisionamiento
									///Error
									$cadena.=" El item ".$modelodetalle->item." - ".$modelodetalle->descri."  : La solicitud asociada ".$registrodetallesolpe->desolpe->solpe->numero."-".$registrodetallesolpe->item."  no es de Ã provisionamiento <br>";

								}
							} else {///Error , este detakke de solped no existe
								$cadena.=" El item ".$modelodetalle->item." - ".$modelodetalle->descri."  : No se pudo encontrar la solicitud asociada -> (".$modelodetalle->iddesolpe.")  <br>";

							}
							/*}else{ // ($modelodetalle->cantsolpes) =0 ES LA PRIMERA ATENCION , OSEA NO HAY REGISTROS EN DESOLPECOMPRA

                                 }*/

						} else { //ES UN ITEM LIBRE

							return $cadena;
						}


					} else { //HAY enetregas
						$cadena.=" El item ".$modelodetalle->item." - ".$modelodetalle->descri." :  Ya tiene entregas y no es posible modificar estos datos sensibles <br>";


					}

				} else { //No ha habido cambios sensibles
					///Dara fin al procedimiento
					return $cadena;
				}

			} else { //Terminar el procediiento
				///Dara fin al procedimiento
				return $cadena;
			}
		}

	}


	public function clonaDocomprat($modelodetalle)  {
		$mensa="";
		if(!is_null($modelodetalle) and  !$modelodetalle->IsNewRecord) {
			$docompratemporal=new Docomprat;
			$docompratemporal->tipoimputacion= $modelodetalle->tipoimputacion;
			$docompratemporal->codentro= $modelodetalle->codentro;
			$docompratemporal->codigoalma= $modelodetalle->codigoalma;
			$docompratemporal->descri=$modelodetalle->descri;
			$docompratemporal->detalle=$modelodetalle->detalle;
			$docompratemporal->ceco=$modelodetalle->ceco;
			$docompratemporal->um=$modelodetalle->um;
			$docompratemporal->tipoitem=$modelodetalle->tipoitem;
			$docompratemporal->cant=$modelodetalle->cant;
			$docompratemporal->codart=$modelodetalle->codart;
			$docompratemporal->punit=0;
			$docompratemporal->iddesolpe=$iddesolpe;///es un  parametro para indincar que Docompra es libre o relacopnada
			$docompratemporal->iddocompra=$modelodetalle->iddocompra; //importante para que pueda pasar al terompral como un regiustro agregado
			$docompratemporal->hidguia=$hidguia; //importante para que pueda pasar al terompral como un regiustro agregado
			$docompratemporal->setscenario('clonasolpe');
			// $docompratemporal->save();
			return $docompratemporal;
		} else {
			$mensa.=" El registro o modelo pasado como para metro para clonar el detalle de la Solpe no existe o es un registro recien creado <br>";
			return $mensa;
		}

	}






	public function actionsacaitem(){

		$registrosolpe=Solpe::recordByNumero(MiFactoria::cleanInput($_POST['Solpe']['numero']));
		if(!is_null($registrosolpe)){
			foreach($registrosolpe->solpe_desolpe as $fila){

				echo CHtml::tag('option', array('value'=>$fila->id),CHtml::encode($fila->item." - ".$fila->txtmaterial),true);

			}
		}else {
			echo "";
		}


	}

	public function actionsacaum(){

		$registro=Desolpe::model()->findByPk((MiFactoria::cleanInput($_POST['idsolpex'])));
		if(!is_null($registro)){
			$unidades=Alconversiones::Listadoums($registro->codart);
			foreach($unidades as $clave=>$valor){

				echo CHtml::tag('option', array('value'=>$clave),CHtml::encode($valor),true);

			}
		}else {
			echo "";
		}


	}



	public function actioncargadirecciones(){

		$registros=Sociedades::model()->findAll( "socio=:vc_hcod",array(":vc_hcod"=>(MiFactoria::cleanInput($_POST['socito'])) ));


		foreach($registros as $fila){
			$modelclipro=Clipro::model()->find("rucpro=:vrucpro",array(":vrucpro"=>trim($fila->rucsoc)));
			if( !is_null($modelclipro)){
				foreach($modelclipro->direcciones as $filadireccion){
					echo CHtml::tag('option', array('value'=>$filadireccion->n_direc),CHtml::encode($filadireccion->c_direc),true);
				}
			}else {

			}

			break;
		}



	}

	public function devuelvehijos($id){
		$registroshijos =Docompra::model()->findAllBySql(" select *from
  																".Yii::app()->params['prefijo']."docompra
  																 where
  																 hidguia=".$id." ");
		Return  $registroshijos;

	}

	//agraga itesm masivamente doirectamertne de la vistra VW_SOLPEPARACOMPRAR
	public function actionagregarmasivamente($idguia){
		$modelocabeza= $this->loadModel(MiFactoria::cleanInput($idguia));
		if(isset($_POST['Ocompra']))
		{  $grupoid = $_POST['cajita'];
			$criterio=New CDBcriteria();
			$criterio->addInCondition('id',$grupoid);
			$registros=VwSolpeparacomprar::model()->findAll($criterio);
			foreach($registros as $filadesolpe){
				$registroitemcompra=New Docompratemp('ingresodesolpe');
				$this->pasadatosacompra($filadesolpe,$registroitemcompra,$idguia);
				//ahora verificando las
				$registroitemcompra->save();
				IF(count($registroitemcompra->geterrors())>0)
				{
					print_r($registroitemcompra->geterrors());
					yii::app()->end();
				}
			}
			unset($registroitemcompra);
			if (!empty($_GET['asDialog']))
			{
				//echo " SON LOS HIJOS  ".count($this->jalasolpetotal($model2->id));
				echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		");
				Yii::app()->end();
			}

		}

		if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';
		IF($modelocabeza->tipologia=='W'){
			$model=New VwSolpeparacomprar('search');
		} ELSE{
			$model=New VwSolpeparacomprar('search');
		}

		if(isset($_GET['VwSolpeparacomprar']))
			$model->attributes=$_GET['VwSolpeparacomprar'];

		//$model->unsetAttributes();
		$this->render('_formvariositems',array(
			'modelocabeza'=>$modelocabeza,'model'=>$model,
		));
	}


	///AGREGA ITEMS A LA OC, autoamticamente desde
	//una solpe de ap`rovisionamiento
	public function jalasolpetotal($id) {
		$mensaje="";
		$modelosolpe=Solpe::model()->findByPk($id);
		if(!is_null($modelosolpe)) {
			if($modelosolpe->escompra=='1'){
				$filasdesolpe=Desolpe::model()->findAllBySql(" select *from
  																".Yii::app()->params['prefijo']."desolpe
  																 where
  																 hidsolpe=".$id." ");
				foreach  ( $filasdesolpe as $row) {
					///Veroificando que el detalle de la solpe sea el adecuado y esta habilkitado apra comprar
					//No tiene que estar anulado, ademas la canrtidad atendida no debe de exceder a la cantidad original solicitada
					if($row->est <> '20' and ($row->cant > $row->cantcompras) ) {
						$mensaje.=$this->jaladetallesolpe($row);
						//$mensaje.=" se ejecuto el item ".$row->item."<br>";
					}
				} //Fin del for
			} else {
				$mensaje.="La x solicitud ".$modelosolpe->numero." no es de aprovisionamiento ".$modelosolpe->escompra."<br>";
			}

		} else  {
			$mensaje.="No se ha podido encotrar la solicitud indicada  ".$id." <br>";
		}
		return $mensaje;
	}

	public function jaladetallesolpe($row) {
		$mensajex="";

		// $r=Desolpe::Model()->findByPk($identidaddetalle);
		$docompratemporal=Docomprat::Model()->find("iddesolpe=:xiddesolpe and estadodetalle not in ('40')",array(":xiddesolpe"=> $row->id));
		if(is_null($docompratemporal))
		{
			$docompratemporal=new Docomprat;
			$docompratemporal->tipoimputacion= $row->tipimputacion;
			$docompratemporal->codentro= $row->centro;
			$docompratemporal->codigoalma= $row->codal;
			$docompratemporal->descri=$row->txtmaterial;
			$docompratemporal->detalle=$row->textodetalle;
			$docompratemporal->ceco=$row->imputacion;
			$docompratemporal->um=$row->um;
			$docompratemporal->tipoitem=$row->tipsolpe;
			$docompratemporal->cant=$row->cant;
			$docompratemporal->codart=$row->codart;
			$docompratemporal->punit=0;
			$docompratemporal->iddesolpe=$row->id;
			$docompratemporal->iddocompra=-1; //importante para que pueda pasar al terompral como un regiustro agregado
			$docompratemporal->hidguia=$hidguia; //importante
			$docompratemporal->setscenario('clonasolpe');
			//crietria para filtrar la cantidad de items del detalle
			$criterio=new CDbCriteria;
			$criterio->condition="hidguia=:nguia  AND idsesion=:idsesionx";
			$criterio->params=array(':nguia'=>$hidguia,':idsesionx'=>Yii::app()->user->getId());
			$docompratemporal->item=str_pad(Docomprat::model()->count($criterio)+1,3,"0",STR_PAD_LEFT);
			//$docompratemporal->estadodetalle='99';
			if(!$docompratemporal->save())
				$mensajex.="No se pudo clonar el item de ".$row->item."  ".$row->txtmaterial." Error al tratar de grabar el detalle de la OC ";
			//echo $docompratemporal->save();
			//Yii::app()->end();

		}
		return $mensajex;
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

	public function actionHijo(){
		$modelo=Docompra::model()->findBypK(3);
		$modelo->cant=3;
		$modelo->codart='1d800560';

		$campos=array('codart','cant','punit');
		$boleano=$this->hubocambiossensibles($modelo,$campos);
		/* print_r($array_modificados);
            echo "<br>";
            print_r($modelo->getAttributes());
            echo "<br>";
            print_r($modelo->getOldAttributes());*/
		echo " se modsidfico campoos sensibles ".$boleano;
		Yii::app()->end();

		$fecha1 = Yii::app()->db->createCommand(" SELECT min(fechadoc) from public_alkardex ")->queryScalar();
		echo gettype($fecha1)." -  ".$fecha1;
	}


	/****************************************************
	 *	crea un item segun  solpe
	 ****************************************************/
	public function actionAgregarsolpetotal($idcabeza,$cest)
	{
		if($cest=='10' OR $cest=='99') {
			$model=new Solpe;
			$model->setscenario("agregaritemscompra");
			$this->performAjaxValidation1($model);
			if(isset($_POST['Solpe']))
			{
				$model2=Solpe::model()->find("numero=:xnumero", array(":xnumero"=>$_POST['Solpe']['numero']));
				$transaccion=$model2->dbConnection->beginTransaction();
				//$model->setscenario("xxx");
				$mensaje.=$this->jalasolpetotal($model2->id);
				// $mensaje.="sdsd";
				if(strlen(trim($mensaje))==0){//si no hubo errores
					$transaccion->commit();
					if (!empty($_GET['asDialog']))
					{
						//echo " SON LOS HIJOS  ".count($this->jalasolpetotal($model2->id));
						//  print_r($this->devuelvehijos($model2->id));
						//Yii::app()->end();
						//Close the dialog, reset the iframe and update the grid
						echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		window.parent.$.fn.yiiGridView.update('resumen-grid');
																		");
						Yii::app()->end();
					}
				} else {
					$transaccion->rollback();
					MiFactoria::Mensaje('error', "No se pudo grabar el documento, hay  errores  :".$mensaje);
					$this->layout = '//layouts/iframe';

					$this->render('_form_detalle_solpe_total',array(
						'model'=>$model2, 'mensaje'=>$mensaje
					));
					// $model->refresh();
					//$this->render('update',array('model'=>$model);
					yii::app()->end();
					//$model->refresh();
				}
			}

			if (!empty($_GET['asDialog']))
				$this->layout = '//layouts/iframe';

			$this->render('_form_detalle_solpe_total',array(
				'model'=>$model, 'idcabeza'=>$idcabeza
			));

		} else{ //si ya cambio el estado impisble agregar mas items

			if (!empty($_GET['asDialog']))
				$this->layout = '//layouts/iframe';
			$this->render('vw_imposible',array(

			));
		}

	}
	private function pasadatosacompra($desolp,$docomp,$idguia){
		$docomp->setAttributes(
			array(
				'tipoitem'=>$desolp->tipsolpe,
				'tipoimputacion'=>$desolp->tipimputacion,
				'hidguia'=>$idguia,
				'iddesolpe'=>$desolp->id,
				'codentro'=>$desolp->centro,
				'codigoalma'=>$desolp->codal,
				'codart'=>$desolp->codart,
				'descri'=>$desolp->txtmaterial,
				'detalle'=>$desolp->textodetalle,
				//'tipoimputacion'=>$desolp->tipimputacion,
				//'tipoitem'=>$desolp->tipsolpe,
				'cant'=>$desolp->cant-(is_null($desolp->cantatendida)?0:$desolp->cantatendida),
				'um'=>$desolp->um,
				'punit'=>$desolp->punitplan,
			),true);
	}

	public function Actionagregaritemsolpe($idguia){
		$model=New Solpe;
		$this->layout='//layouts/iframe';
		$modelocompra=$this->loadModel($idguia);
		$detallecompra=New Docompratemp();
		$model->setScenario('jalaitemparacompras');
		if(isset($_POST['Solpe']))
		{

			$itemsolpe=Solpe::recordByNumeroItem(MiFactoria::cleanInput($_POST['Solpe']['numero']),MiFactoria::cleanInput($_POST['Solpe']['item']));
			$itemsolpe->setScenario('ingresodesolpe');
			$model=$itemsolpe->desolpe_solpe;
			$model->setScenario('jalaitemparacompras');
			$model->attributes=$_POST['Solpe'];
			if($model->validate()){
				$detallecompra->setScenario('ingresodesolpe');
				$detallecompra->attributes=$_POST['Docompratemp'];
				$this->pasadatosacompra($itemsolpe,$detallecompra,$idguia);
				$criterio=new CDbCriteria;
				$criterio->condition="hidguia=:idguia  ";
				$criterio->params=array(':idguia'=>$idguia);
				$detallecompra->setattributes(
					array(
						'estadodetalle'=>self::ESTADO_PREVIO,
						'codocu'=>$this->documentohijo,
						'hidguia'=>$idguia,
						'idusertemp'=>Yii::app()->user->id,
						//'idstatus'=>1,
						'item'=>str_pad(Docompratemp::model()->count($criterio)+1,3,"0",STR_PAD_LEFT),
					),
					true
				);

				//$detallecompra->validate();
				if($detallecompra->save()) {
					if (!empty($_GET['asDialog']))
					{
						//Close the dialog, reset the iframe and update the grid
						echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
                                                                             window.parent.$('#cru-detalle').attr('src','');
                                                                             window.parent.$.fn.yiiGridView.update('detalle-grid');
                                                                             window.parent.$.fn.yiiGridView.update('resumen-grid');
                                                                             ");
						Yii::app()->end();
					}
					/*var_dump ( $detallecompra->geterrors () );
                    yii::app ()->end ();*/
				}




			}else {
				/*print_r($model->geterrors());
                yii::app()->end();*/
			}


		}
		if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';

		$this->render('_form_detalle_solpe_item',array(
			'model'=>$model,'modelocompra'=>$detallecompra
		));


	}



	/****************************************************
	 *	crea un item segun  solpe y la posicion
	 ****************************************************/
	public function actionAgregaitemsolpe($idcabeza,$cest)
	{
		if($cest=='10' OR $cest=='99') {
			$model=new Solpe;
			$model->setscenario("agregaritemscompra");
			$this->performAjaxValidation1($model);
			if(isset($_POST['Solpe']))
			{
				$model2=Desolpe::model()->find("numero=:xnumero", array(":xnumero"=>$_POST['Solpe']['numero']));
				//$model->setscenario("xxx");
				$model->Pasacompra($model2->hidsolpe,$idcabeza);
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		window.parent.$.fn.yiiGridView.update('resumen-grid');
																		");
					Yii::app()->end();
				}
			}

			if (!empty($_GET['asDialog']))
				$this->layout = '//layouts/iframe';

			$this->render('_form_detalle_solpe_total',array(
				'model'=>$model, 'idcabeza'=>$idcabeza
			));

		} else{ //si ya cambio el estado impisble agregar mas items

			if (!empty($_GET['asDialog']))
				$this->layout = '//layouts/iframe';
			$this->render('vw_imposible',array(

			));
		}

	}

	/****************************************************
	 *	crea items que toma del maletin,
	 * REFERENCIA SOLO  PARA SOLPES DE APROVISIONAMIENTO
	 *
	 ****************************************************/
	public function actionAgregardelmaletin(){
		$id=$_GET['id'];
		$id=(integer)MiFactoria::cleanInput($id);
		$registrocompra=$this->loadModel($id);
		$mensaje="";
		$filas=yii::app()->maletin->getvalues('Desolpe');

		if(count($filas)>0 ){

			foreach($filas as $fila){

				$registroitemcompra=New Docompratemp('ingresodesolpe');
				$filadesolpe=VwSolpeparacomprar::model()->findById($fila['idregistro']);
				//verificando la consistencia de la solpe

				if(is_null($filadesolpe))
					continue;
				if(
				is_null($filadesolpe->cant_pendiente)?0:$filadesolpe->cant_pendiente+
				is_null($filadesolpe->cantatendida)?0:$filadesolpe->cantatendida >
					$filadesolpe->cant
				)continue;

				$this->pasadatosacompra($filadesolpe,$registroitemcompra,$id);
				if(!$registroitemcompra->save())
				{
					$mensaje.=yii::app()->mensajes->getErroresItem($registroitemcompra->geterrors());
				}
			}


		}else{
			$mensaje.=" No hay registros de solicitudes en el MaletÃ­n<br>";
		}


		echo $mensaje;
		/* echo "salio";
            yii::app()->end();*/
		/*   $id=(int)MiFactoria::cleanInput($_POST['idcompra']);
    $cadena="";
              $modelocompra=$this->loadModel($id);
              $cest=$modelocompra->codestado;
              /*$desolpe=Desolpe::Model()->findBypK($_SESSION['350'][0]);
              $modelosolpe=Solpe::model()->findByPk($desolpe->hidsolpe);*/

		/*   if($cest=='10' OR $cest=='99') {
                  //RECORRIENDO LAS DESOLPES DEL MALETIN
                  foreach (Yii::app()->session['DOC350'] as $clave=>$valor) {

                      if(!$modelocompra->hayitemsolpe($valor,$modelocompra->idguia))  // si no se ha agregado antes esta IDDesolpe
                          {
                              $NUEV=NEW Docompratemp();
                             if($NUEV->importadesolpe($valor,$modelocompra->idguia))
                              $cadena.="se agrego ...<br>";
                          }


                    }



              }
            echo $cadena;*/
	}


	public function Anulaitem($id) { ///Esta accion se encarga de actualizar las tablas relcionadas
		//luego de anular el documento de compras
		$detallecompra=Docompra::model()->findByPk($id);
		if( $detallecompra->iddesolpe > 0) { // Si este detalle esta relacionada con un detalle solpe
			//Borrar el registro de la tabla puente
			$command = Yii::app()->db->createCommand(" DELETE FROM ".Yii::app()->params['prefijo']."desolpecompra  where iddocompra=".$detallecompra->id);
			$command->execute();
		}
		$command1 = Yii::app()->db->createCommand(" DELETE FROM ".Yii::app()->params['prefijo']."alentregas  where iddetcompras=".$detallecompra->id);
		$command1->execute();

		$command2 = Yii::app()->db->createCommand(" UPDATE ".Yii::app()->params['prefijo']."Docompra SET estadodetalle='40' where id=".$detallecompra->id);
		$command2->execute();
	}


	/*funcion para borra un registro detalle de laorden de compra
      loq ue se hace es verificar que el registro Docompratemp
      no tenga ninguna imagen del registro Docompra correspondiente osea
     que se haya agregado recien

    En el caso que tenag una imagen; lo que hay que hacer es verificar que :
    OJO : El registro Docompra correspondinete  y no el Docompratemp
      1) NO tenga entregas (Flujo futuro)
      2) No tenga detalles de Solpe asociadas (Flujo pasado)


    */
	public function borradetalle($id /*idtemp*/) {

		$detalletemp=Tempdetot::model()->findByPk($id /*idtemp*/);

		$mensaje="";
		if(!is_null($detalletemp)) {
			///verificamos primero si es un registro agregado
			if (is_null($detalletemp->id) or $detalletemp->id==0 ) { ///quier decir que no existe una imagen en la tabla opriginal, osea se ha agregado recientemente
				//si es un registro agergado 
                        ///puede tener recursos asociados veamos...
                            IF($detalletemp->nrecursos > 0 ){
                                $mensaje .= " El item  " . $detalletemp->item . " Ya tiene recursos, no puede ser borrado <br>";
 
                            }else{
                                 $detalletemp->delete();
                            }
                               
                            
                           
				//$detalletemp->save();
				$mensaje.="Se borro el registro";
			} else {// si ya se ha grabado o confirmado en la tabla original
				//buscar en le registro orignal el firma
				$detallefirme=Detot::model()->findByPk($detalletemp->id);
				
				if ($detallefirme->tempdetot->nrecursos() > 0) {
					$mensaje .= " El item  " . $detalletemp->item . "  Ya tiene recursos y no puede ser anulado <br>";

				} else { ///si no tiene entrgas aun no cantemos victoria
					//OJO QUE ALMOMENTO DE CONFIRMAR EL BUFFER DEBEMOS AEGURARNOQ UE EN EL EVENTO
					//AFTERSAVE() DEL REGISTRO DOCOMPRA
                                        $detalletemp->idstatus=-1;
					/*$detalletemp->setScenario('cambiaestado');*/
					$detalletemp->codestado = self::ESTADO_DETALLE_ANULADO;
					$mensaje .= ($detalletemp->save()) ? "Se anulo el item de la Ot" : " No se pudo anular el item " . $detalletemp->item . "<br>";
				}

			}

		} else {
			$mensaje.="No se encontro ningun registro para borrar con el ID=".$id;
		}

		echo $mensaje;

	}





	public function borraitem($id) { //ojo es el id de la tabla temporal Docomprat
		//para borrar u item hay varias escenarios
		$detalletemp=Tempdetot::model()->findByPk($id);
		if($detalletemp===null) {
			throw new CHttpException(500,'No se encontro el item id del item de la compra');
		} else{
			
                       if($detalletemp->checkcompromisos())
                           $detalletemp->delete();

			
		}
	}










	public function actionmuestraimput(){

		$valor=$_POST['Docompra']['tipoimputacion'];
		//echo "hola amigos";
		//	if ($valor=='F')
		echo CHtml::textField('Docompra_orden','',array('value'=>'hola'));
		//if ($valor=='K')
		//echo CHtml::textField('[Docompra][orden]','',array('value'=>'hola'));
		//echo "<imput size='12' />";


	}

	public function actionImprimir($id){
		$nombrearch= $this->Imprimirsolo($id);
		echo CHtml::link("Lista para imprimir",Yii::app()->createUrl('/assets/'.$nombrearch.'.pdf'),array('target'=>'_blank'));
		echo CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.'/img/pdf.png','',array('height'=>'30','width'=>'30')),Yii::app()->createUrl('/assets/'.$nombrearch.'.pdf'),array('target'=>'_blank'));
	}


	public function Imprimirsolo($id)
	{

		$ocompra=$this->loadModel($id);

		$usuario=Trabajadores::model()->findByPk(Yii::app()->user->um->getFieldValue(Yii::app()->user->id,'codtrabajador') );
		$cadena=$this->renderpartial('reporteoc',array('ocompra'=>$ocompra,'usuario'=>$usuario),true,true);
		/* echo $cadena;
            yii::app()->end();*/
		$mpdf=Yii::app()->ePdf->mpdf();
		$hojaestilo=file_get_contents('themes/abound/css'.DIRECTORY_SEPARATOR.'estilooc.css');
		$mpdf->WriteHTML($hojaestilo,1);
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->WriteHTML($cadena,2);
		// $mpdf->Output();
		$vacr=md5(time());
		$mpdf->Output('assets/'.$vacr.'.pdf','F');

		return $vacr;


	}



	public function actionImprimir2($id)
	{



		return "hola";


	}



	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	+
	+	EVENTOS PARA PROCESAR LA GUIA DE REMISION, ASEGURESE DE QUE CADA EVENTO
	+	GENERADO EN TABLAS DEBE DE TENER UNA ACCION AQUI
	+     'Aprobaroc','Anularoc','Revertiroc', ///acciones de proceso
	+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

	///esta funcion se repite para todas las acciones de procesar la guia
	public function verificaestado($id,$idevento){

		//sacando el estado de la guia,si no necuentra datos genera error
		$modeloguia=$this->loadmodel($id);
		$estado=$modeloguia->codestado;
		$evento=Eventos::model()->findByPk($idevento);
		if($evento->estadoinicial==$estado ) { //si el estado es el adecuado
			return $evento->estadofinal; //devolver el nuevo estado ya que es valido

		}else {
			return null; //en caso de no proceder devolver null

		}

	}


	public function actionenviarmail($id) {
		// $id=$_GET['idguia'];
		//mail('hipogea@hotmail.com','rtrt','mimensaje');
		// Yii::app()->crugemailer->mail_attachment('hipogea@hotmail.com' , 'hipogea@hotmail.com', 'adrain ,ariano', 'hipogea@hotmail', 'contesta', 'este esun m,ejase',$this->Imprimirsolo(26));
		// mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )
		//Yii::app()->crugemailer->mail_con_archivo('hipogea@hotmail.com','elena@hotmail.com','esto es');
		//Yii::app()->crugemailer->mail_con_archivo('hipogea@hotmail.com','elena@hotmail.com','esto es','casa');
		$ocompra= $this->loadModel($id);

		//haciendo las verifiaciones primero
		if($ocompra->codestado=='30') {
			$nombrearch= $this->Imprimirsolo($id);
			// echo $this->Imprimirsolo($id);
			$filename=Yii::app()->params['rutaraiz'].'recurso/assets/'.$nombrearch.'.pdf';
			//echo CHtml::link("Lista para imprimir",Yii::app()->createUrl('/assets/'.$nombrearch.'.pdf'),array('target'=>'_blank'));
			$usuario=Trabajadores::model()->findByPk(Yii::app()->user->um->getFieldValue(Yii::app()->user->id,'codtrabajador') );
			$asunto="Orden de compra".$ocompra->numcot."-".$ocompra->codsociedad0->dsocio;
			$nombrecompleto=$usuario->nombres." ".$usuario->ap;
			$mensaje="Este es un correo automÃ¡tico";
			//el mail del contacto
			$mail=$ocompra->contactos->getmails($this->documento);

			Yii::app()->crugemailer->mail_attachment($mail,Yii::app()->user->email, $nombrecompleto, '', $asunto, $mensaje,$filename);


			$transaccion=$ocompra->dbConnection->beginTransaction();

			/* registrar el log de impresiones*/
			$mensa=New Mensajes();
			$mensa->usuario=Yii::app()->user->name;
			$mensa->cuando= date("Y-m-d H:i:s");
			$mensa->nombrefichero= $nombrearch;
			$mensa->codocu='210';
			$mensa->hidocu=$id;

			if ($mensa->save()) {
				$transaccion->commit();


			} else {
				$transaccion->rollback();
				throw new CHttpException(404,'No se pudo grabar el mensaje ');
			}
		} else {
			echo "Este documento no posee el status de APROBADO para efectuar esta acciÃ³n";
		}
		//Yii::app()->crugemailer->mail_prueba('hipogea@hotmail.com', 'jramirez@neologys.com', 'JORGE ARMAS','jramirez@neologys.com', 'MENSAJE DE', 'SDHKSD SFKSFK FSJFKSF','casa')	;
		//echo "Correo enviado";
	}


	public function actioncargaentregas()
	{

		$valor=$_POST['selector_item']+0;
		$idcompra=$_POST['idguia'];
		//  echo var_dump($valor);
		echo  $this->renderPartial('vw_historial', array('ide'=>$valor),TRUE);


	}


	//Idevento=50
	public function actionAprobaroc($id){
		$sepuedeono=$this->verificaestado($id,50); //obteniendo el estado destino
		if (!$sepuedeono==null) {
			///aprobar con pana y elegancia
			$modelin=$this->loadmodel($id);
			$modelin->codestado=$sepuedeono;//colocar el estadodestino
			$transaccion=$modelin->dbConnection->beginTransaction();

			/* registrar el log de impresiones*/
			$mensa=New Mensajes();
			$mensa->usuario=Yii::app()->user->name;
			$mensa->cuando= date("Y-m-d H:i:s");
			$mensa->nombrefichero=$this->Imprimirsolo($id);
			$mensa->codocu='210';
			$mensa->hidocu=$id;
			//actualizar tambien los items
			$command = Yii::app()->db->createCommand(" UPDATE {{docompra}} set estadodetalle='20' where hidguia=".$modelin->idguia);
			$command->execute();


			//Yii::app()->crugemailer->mail_con_archivo('hipogea@hotmail.com','elena@hotmail.com','esto es');
			//Yii::app()->crugemailer->mail_attachment('hipogea@hotmail.com','elena@hotmail.com', 'julito','hipogea@hotmail.com', 'mensaje para ti', 'este es el mensaje');


			if ($modelin->save() and $mensa->save()) {
				$transaccion->commit();
				MiFactoria::Mensaje('success', "..La Oc de compra se ha autorizado!");
				//$this->render("update");

			} else {
				MiFactoria::Mensaje('error', "..No se ha podido grabar la autorizacion!");
				$transaccion->rollback();
				// $this->render("update");
				//throw new CHttpException(404,'No se pudieron grabar los datos ');
			}

		}else{
			MiFactoria::Mensaje('error', "..Este documento no se puede autorizar por que no tiene el estado adecuado");
			// $transaccion->rollback();



		}
		$this->render('update',array(
			'model'=>$modelin,
		));

	}

	



	//Idevento=52
	public function actionRevertiroc($id){
		$sepuedeono=$this->verificaestado($id,52); //obteniendo el estado destino
		if (!$sepuedeono==null) {
			///aprobar con pana y elegancia
			$modelin=$this->loadmodel($id);
			$modelin->codestado=$sepuedeono;//colocar el estadodestino
			$modelin->save(); //luego grabar



			$this->render("vw_procesado");

		}else{
			throw new CHttpException(404,'Este documento no se puede confirmar, no es una guia o no tiene el estado adecuado');
		}

	}



	public function actionprocesaroc($id)
	{
		$idevento=$_GET['ev'];


		switch ($idevento) {   ///Luego hacer los procedimientos segun sea el caso

			case 50 : //autorizar guia
				//$this->redirect("Aprobarguia",array("id"=>$id));
				$this->redirect(array("Aprobaroc",'id'=>$id));
				break;
			case 51: // anular guia
				$this->redirect(array("Anularoc",'id'=>$id));

				break;
			case 52: //Confirmar
				$this->redirect(array("Revertiroc",'id'=>$id));
				break;


			default:
				throw new CHttpException(404,'No existe este procedimiento para el documento');

		}




	}



	/****************************************************
	 *  muestra la vista de configuracion de los eventos
	 *+++++++++++++++++++++++++++++++++++++++++++++++++*/

	public function actionConfiguraop()
	{
		$docu=$this->documento;  //guia de remision
		$docuhijo=$this->documentohijo; //detalle guia de remisio


		$matrizpadre=Opcionescamposdocu::Model()->findAll(" codocu=:cod",array(":cod"=>$docu));
		for ($i=0; $i < count($matrizpadre); $i++){
			$cantidadregistros=Yii::app()->db->createCommand("SELECT id FROM  ".Yii::app()->params['prefijo']."opcionesdocumentos WHERE IDOPDOC=".$matrizpadre[$i]['id']."")->QueryScalar();
			If (!$cantidadregistros) {
				$command = Yii::app()->db->createCommand("INSERT INTO ".Yii::app()->params['prefijo']."opcionesdocumentos (IDUSUARIO,IDOPDOC,valor) VALUES (".Yii::app()->user->id.",".$matrizpadre[$i]['id'].",'') ");
				$command->execute();
			}
		}

		$matrizpadre1=Opcionescamposdocu::Model()->findAll(" codocu=:cod",array(":cod"=>$docuhijo));
		for ($i=0; $i < count($matrizpadre1); $i++){
			$cantidadregistros=Yii::app()->db->createCommand("SELECT id FROM  ".Yii::app()->params['prefijo']."opcionesdocumentos WHERE IDOPDOC=".$matrizpadre1[$i]['id']."")->QueryScalar();
			If (!$cantidadregistros) {
				$command = Yii::app()->db->createCommand("INSERT INTO ".Yii::app()->params['prefijo']."opcionesdocumentos (IDUSUARIO,IDOPDOC,valor) VALUES (".Yii::app()->user->id.",".$matrizpadre1[$i]['id'].",'') ");
				$command->execute();
			}
		}

		$proveedor=VwOpcionesdocumentos::model()->search_us($docu,Yii::app()->user->id);
		$proveedor1=VwOpcionesdocumentos::model()->search_us($docuhijo,Yii::app()->user->id);
		$this->render('vw_admin_opciones',array(
			'proveedor'=>$proveedor,
			'proveedor1'=>$proveedor1,
		));


	}











	public function actionborraitems()
	{
		/*var_dump($_POST['Ot']);
            yii::app()->end();*/
		$modelocabeza=$this->loadModel($_POST['Ot']['id']);
		if(is_null($modelocabeza))
			throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'  No se econtro ningun evento con el id  '.$_POST['Ot']['idt']);

		if($modelocabeza->editable())
		{
			$autoIdAll = $_POST['cajita'];
			$estado=$_POST['Ot']['codestado'];
			echo $autoIdAll;
			// Yii::app()->end();
			if(count($autoIdAll)>0 ) //and ($this->eseditable($estado)==''))
			{
				foreach($autoIdAll as $autoId)
				{
					$this->borradetalle($autoId);

				}
			}
		}else
		{
			echo " El documento no se puedfe modificar <br>" ;
		}


	}



	public function hayacceso($id) {
		$matri=Docomprat::model()->findall(" hidguia= ".$id."  and idsesion <>".Yii::app()->user->getId()." ");
		return  (count($matri)==0)?true:false;
	}

	
	public function actionModificadetalle($id)
	{		
          // echo"ss";
            $model=Tempdetot::Model()->findByPk(MiFactoria::cleanInput((int)$id));
             //echo "ggererererererere";
		if ($model===null)
			throw new CHttpException(404,'No se encontro ningun documento para estos datos');
		//colocar el escenario correcto
		if(isset($_POST['Tempdetot']))		{
			$model->attributes=$_POST['Tempdetot'];
			if($model->save()){
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("
                window.parent.$('#cru-dialogdetalle').dialog('close');
		window.parent.$('#cru-detalle').attr('src','');                            
                window.parent.$('#cru-detalle').attr('src','');                                            
                window.parent.$.fn.yiiGridView.update('detalle-grid');");
					Yii::app()->end();
				}
			}else{
				print_r($model->geterrors());
			}

		}

		if (!empty($_GET['asDialog'])){
                    
                    $this->layout = '//layouts/iframe';
                }
			

		$this->render('_form_detalle',array(
			'model'=>$model,'editable'=>true
		));



	}

	public function actionverdetoc($id)
	{
		$acv=MiFactoria::cleanInput($_GET['action']);
		if($acv=='editadocumento')
			$model=Docompratemp::Model()->findByPk(MiFactoria::cleanInput((int)$id));
		if($acv=='verdocumento')
			$model=Docompra::Model()->findByPk(MiFactoria::cleanInput((int)$id));

		if ($model===null)
			throw new CHttpException(404,'No se encontro ningun documento para estos datos');


		if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';

		$this->render('_form_detalle',array(
			'model'=>$model,'editable'=>false
		));



	}




	public function actionNada() {
		if (isset($_POST['Ocompra']['descuento'])){
			$descuento=	$_POST['Ocompra']['descuento']/100;
			$factori=1-$descuento;
			$command = Yii::app()->db->createCommand(" update docompra_t set punitdes=punit*".$factori." where idsesion=".Yii::app()->user->getId());
			//$command = Yii::app()->db->createCommand(" update docompra_t set punitdes=1.35 " );
			$command->execute();
		}

		//echo "el resultado es ".$_POST['Ocompra']['descuento'];
		Yii::app()->end();
		return 1;

	}















	/****************************************************
	 *	Retorna una cadena '' o 'disabled' para deshabilitar los controles del form de la vista
	 ****************************************************/
	public function eseditable($estadodelmodelo)
	{
		$retorna='disabled';
		iF(in_array($estadodelmodelo , ARRAY(self::ESTADO_CREADO,self::ESTADO_PREVIO,NULL,'',self::ESTADO_MODIFICADO)) and strtolower($this->action->id) <> 'verdocumento')
			$retorna='';

		RETURN $retorna;
		// if ($estadodelmodelo=='10' or $estadodelmodelo=='99' or empty($estadodelmodelo) or is_null($estadodelmodelo)) {return '';} else{return 'disabled';}
	}


	/****************************************************
	 *	Retorna una cadena '' o 'disabled' para deshabilitar los controles del form de la vista
	 ****************************************************/
	public function eseditablebase($estadodelmodelo)
	{
		$retorna='disabled';
		iF(in_array($estadodelmodelo , ARRAY(self::ESTADO_PREVIO,NULL,'')))
			$retorna='';

		RETURN $retorna;
		// if ($estadodelmodelo=='10' or $estadodelmodelo=='99' or empty($estadodelmodelo) or is_null($estadodelmodelo)) {return '';} else{return 'disabled';}
	}


	/****************************************************
	 *	crea un item segun  solpe
	 ****************************************************/
	public function actionAgregarsolpe($idcabeza,$cest)	{
		//VERIFICADO PRIMERO SI ES POSIBLE AGREGAR MAS ITEMS
		if($cest=='10' OR $cest=='99') {
			$model=new Docomprat;
			//$model->valorespordefecto();
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation1($model);
			if(isset($_POST['Docomprat']))
			{
				$model->attributes=$_POST['Docomprat'];
				//$model->codocu='024'; ///detalle OcompraZACION
				//crietria para filtrar la cantidad de items del detalle
				$criterio=new CDbCriteria;
				$criterio->condition="hidguia=:nguia  AND idsesion=:idsesionx";
				$criterio->params=array(':nguia'=>$idcabeza,':idsesionx'=>Yii::app()->user->getId());
				$model->item=str_pad(Docomprat::model()->count($criterio)+1,3,"0",STR_PAD_LEFT);
				//str_pad($somevariable,$anchocampo,"0",STR_PAD_LEFT);
				////con esto calculamos el numero de items

				$model->setscenario("solpe");

				if($model->save())
					if (!empty($_GET['asDialog']))
					{
						//Close the dialog, reset the iframe and update the grid
						echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		window.parent.$.fn.yiiGridView.update('resumen-grid');
																		");
						Yii::app()->end();
					}
			}

			if (!empty($_GET['asDialog']))
				$this->layout = '//layouts/iframe';
			$this->render('_form_detalle_solpe',array(
				'model'=>$model, 'idcabeza'=>$idcabeza
			));

		} else{ //si ya cambio el estado impisble agregar mas items

			if (!empty($_GET['asDialog']))
				$this->layout = '//layouts/iframe';
			$this->render('vw_imposible',array(

			));
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
		$dataProvider=new CActiveDataProvider('Ocompra');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new VwOtsimple('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VwOtsimple'])) {
			$model->attributes=$_GET['VwOtsimple'];
			$proveedor=$model->search();
		}else
                {
                    $proveedor=array();
                }
		$this->render('admin',array(
			'model'=>$model,'proveedor'=>$proveedor,
		));
	}




	public function actionVerdetalle($id)
	{
		$model=new VwOcompra;


		if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';
		$this->render('detalleoc',array(
			'model'=>$model, 'id'=>$id
		));

	}


	/**
	 * Manages all models.
	 */
	public function actionLibmasiva()
	{
		$model=new VwOcompratotalizado('search');
		$model->unsetAttributes();  // clear any default values

		//$this->performAjaxValidation($model);
		if(isset($_GET['VwOcompratotalizado'])) {
			//EN EL CASO DE QUE SEA UNA BUSQUEDA MEDIANTE EL FOMRUALARIO
			//if ($model->validate()) {
			$model->attributes=$_GET['VwOcompratotalizado'];
			//$model->validate();s
			$proveedor=$model->search();
			//  } else {
			// echo "que carajo";
			// }
		} else {
			// $model->validate();
			$proveedor=$model->search();
		}

		$this->render('liberacionmasiva',array(
			'model'=>$model,'proveedor'=>$proveedor,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ocompra the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ot::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(500,'No se encontro este documento de Ot');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ocompra $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='Ocompra-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function performAjaxValidationdetalle($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='detalleoc-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionprocesardocumento($id)
	{
		$id=MiFactoria::cleanInput($id);
		$idevento=(integer)$_GET['ev'];
		$modelo=$this->loadModel((int)$id);
		if($this->sepuedeprocesar($id)){
			$evento=VwEventos::model()->find("id=:vid",array(":vid"=>$idevento));
			if(!is_null($evento))
			{

				//verificansdo primero que haya grabado los datos
				if($this->hubocambiodetalle($id)){
					MiFactoria::Mensaje('error','Debe de grabar los cambios primero');
				}else{


					///Verificanod primero la consistencia del movimieto
					if((trim($modelo->{$this->campoestado})==trim($evento->estadoinicial))){
						$modelo->{$this->campoestado}=$evento->estadofinal;
						$modelo->setScenario('cambiaestado');
						$transaccion=$modelo->dbConnection->beginTransaction();

						if($modelo->save()) {
							$cadena=$this->proceso($idevento,(int)$id);
							if(!$this->detectaerrores()){
								$transaccion->commit();
								IF( Yii::app()->request->isAjaxRequest){
									echo  "El documento se ha aprobado " ;
								}else{
									MiFactoria::Mensaje('success', "El documento se ha procesado cambio de estado ".$evento->einicial."  a  ".$evento->efinal );
								}

							} else {
								$transaccion->rollback();
								IF( Yii::app()->request->isAjaxRequest){
									echo  " No se pudo procesar el documento Error: ".$cadena ;
								}else{
									$this->out($id);
									MiFactoria::Mensaje('error', " No se pudo procesar el documento Error: ".$cadena);

								}
								//$this->render('editadocumento',array('model'=>$modelo));
								//yii::app()->end();
							}

						} else {
							$transaccion->rollback();
							// MiFactoria::Mensaje('error', " No se pudo procesar el documento Error: ".$cadena);
							IF( Yii::app()->request->isAjaxRequest){
								echo  " No se pudo procesar el documento Error: ".Yii::app()->mensajes->getErroresItem($modelo->geterrors()) ;
							}else{ $this->out($id);
								MiFactoria::Mensaje('error', " No se pudo procesar el documento Error: ".Yii::app()->mensajes->getErroresItem($modelo->geterrors()));

							}


						}

					} else {
						$this->out($id);
						IF( Yii::app()->request->isAjaxRequest){
							echo " El documento ".$evento->desdocu."   no tiene el status ".$evento->einicial."  No se puede cambiar a ".$evento->efinal;
						}else{ $this->out($id);
							MiFactoria::Mensaje('error', " El documento ".$evento->desdocu."   no tiene el status ".$evento->einicial."  No se puede cambiar a ".$evento->efinal);
						}
						//  echo $modelo->{$this->campoestado}."sfxaqwfsfs  ".$evento->estadoinicial;yii::app()->end();
					}
				}


			} else {
				throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'  No se econtro ningun evento con el id {$id}'.$id);
			}
			//$this->render('update',array('model'=>$modelo));
			IF(! Yii::app()->request->isAjaxRequest)
			{
				if(!$this->detectaerrores()){
					$this->out($id);
					$this->redirect(array('verdocumento','id'=>$modelo->idguia));
				}else{
					$this->redirect(array('editadocumento','id'=>$modelo->idguia));
					yii::app()->end();
				}


			}
		}else{
			MiFactoria::Mensaje('error','Para autorizar esta orden, confirme ls cambios primero');
			$this->redirect(array('editadocumento','id'=>$modelo->idguia));
			yii::app()->end();
		}



	}




	private function proceso($idevento,$id) {
		$mensaje="";
		$compra=Ocompra::model()->findByPk($id);
		switch ($idevento) {
			case 65: ///APROB
				$this->insertamensaje($id,'O',NULL);
				if(Ocompra::puedeautorizar()) {
					$filas=$compra->detallefirme;
					if(count($filas)>0){
						foreach($filas as $row ) {
							// $filafirme=Docompra::model()->findByPk($row->id);//solo si
							//Solo si no esta anulado
							$row->setScenario('cambiaestado');
							if( !in_array($row->estadodetalle,Estado::estadosnocalculablesdetalle($compra->codocu)))
								$row->estadodetalle=self::ESTADO_DOCOMPRA_APROBADO;
							if(!$row->save())
								$mensaje.=" OcurriÃ³ un error  en el item ".$row->item." al guardar los datos del estado detalle  <br>";

						}
					}else{
						$mensaje.=" No hay item hijos para aporbar este documento <br>";
					}

				}else{
					$mensaje.=" No tiene permisos para efectuar esta acciÃ³n <br>";
				}
				break;

			case 67: ///deshacer APROBACIOPN

				///AQUI YA NNOS ETRABAJA CON EL BUFFER SE TRABAJADA CON LA TABAL ORIIGNAL
				$filas=$compra->detallefirme;
				$this->insertamensaje($id,'U',NULL);
				foreach($filas as $row ) {
					//$filafirme=Docompra::model()->findByPk($row->id);
					if ( $row->cantidadentregada > 0) {
						$mensaje.="  El item ".$row->item."  Ya tiene ingreso de almacen <br>";
					} else { //si no tiene atenciones entonces normal no mas Revertimos

						$row->setScenario('cambiaestado');
						if( !in_array($row->estadodetalle,Estado::estadosnocalculablesdetalle($compra->codocu)))
							$row->estadodetalle=self::ESTADO_DOCOMPRA_CREADO;
						$mensaje .= ($row->save()) ? "" : " No se pudo revertir  el item " . $row->item . "<br>";
						/*print_r($row->geterrors());
                           print_r($row->geterrors());yii::app()->end();*/


					}
					//refrescar el buffer
					$this->ClearBuffer($id); //Limpia temporal
					$this->IniciaBuffer($id); //Levanta temporales
				}
				break;

			case 66: ///aNULAR
				//aqui hayq ue tabajar directametne cn la tabla firme DOCOMPRA
				$filas=$compra->detallefirme;
				//aqui hayq ue tabajar directametne cn la tabla firme DOCOMPRA
				foreach($filas as $row ) {

					if ( $row->cantidadentregada > 0) {
						$mensaje.="  El item ".$row->item."  Ya tiene ingresos de almacen <br>";
					} else { //si no tiene atenciones entonces normal no mas Revertimos
						$row->setScenario('cambiaestado');
						$row->estadodetalle = self::ESTADO_DOCOMPRA_ANULADO;
						$mensaje .= ($row->save()) ? "" : " No se pudo anular el item " . $row->item . "<br>";

					}
				}
				//refrescar el buffer
				$this->ClearBuffer($id); //Limpia temporal
				$this->IniciaBuffer($id); //Levanta temporales

				break;
		}
		return $mensaje;
	}


	/** Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation1($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='Solpe-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionAgregaimpuesto($idguia){
		$model=new Tempimpuestosdocuaplicados();
		$modelocabeza=$this->loadModel($idguia);
		if(isset($_POST['Tempimpuestosdocuaplicados']))            {
			// $model->setAttributes(array('valorimpuesto'=>Valorimpuestos::getimpuesto ($_POST['Impuestosdocuaplicado']['codimpuesto'] ),'iddocu'=>$modelocabeza->idguia,'codocu'=>$modelocabeza->codocu,'codimpuesto'=>$_POST['Impuestosdocuaplicado']['codimpuesto']),true);
			/* echo "post impuesto". $_POST['Impuestosdocuaplicado']['codimpuesto'];
                 Yii::app()->end();*/
			if( yii::app()->impuestos->insertaplantilla($modelocabeza->idguia,$modelocabeza->codocu,$_POST['Tempimpuestosdocuaplicados']['codimpuesto'])=="")
			{

				if (!empty($_GET['asDialog']))
				{
					echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('impuestos-grid');
																		window.parent.$.fn.yiiGridView.update('resumen-grid');
																		");
					Yii::app()->end();
				}
			} else{
				MiFactoria::Mensaje('error',yii::app()->impuestos->insertaplantilla($modelocabeza->idguia,$modelocabeza->codocu,$_POST['Tempimpuestosdocuaplicados']['codimpuesto']));
			}
		}
		if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';
		//$modeloaux=$modelo
		$this->render('_form_impuesto',array('impuestosyaregistrados'=>$modelocabeza->impuestosaplicados(),
			'modeloimpuesto'=>$model, 'codigodoc'=>$modelocabeza->codocu,'idcabeza'=>$idguia
		));
	}

	public function actionReporte($id){
		$id=(integer)MiFactoria::cleanInput($id);
		$model=$this->loadModel($id);
		if($this->sepuedeprocesar($id)){
			$this->insertamensaje($id,'V',NULL);
			$this->redirect($this->createUrl("coordocs/hacereporte/",array("id"=>$model->idreporte,"idfiltrodocu"=>$id,"file"=>0)));
		}else{
			echo "Confirme los cambios primero";
		}

	}


	public function actioncrearpdf($id){
		$id=(integer)MiFactoria::cleanInput($id);
		$model=$this->loadModel($id);
		if($this->sepuedeprocesar($id)){
			// $this->insertamensaje($id,'C',NULL);
			echo "Se ha generado el PDF";
			$this->redirect($this->createUrl("coordocs/hacereporte/",array("id"=>$model->idreporte,"idfiltrodocu"=>$id,"file"=>1)));

		}else{
			echo "Confirme los cambios primero";
		}
	}



	public function actionenviarpdf($id){
		$model=$this->loadModel((int)MiFactoria::cleanInput($id));
		if( $this->sepuedeprocesar($id)){
			$nombrefichero=Yii::getPathOfAlias('webroot').'/assets/'.yii::app()->user->id.DIRECTORY_SEPARATOR.$this->documento.DIRECTORY_SEPARATOR.yii::app()->user->name.'.pdf';
			// $this->redirect($this->createUrl("coordocs/hacereporte/",array("id"=>$model->idreporte,"idfiltrodocu"=>$id,"file"=>0)));
			if(is_file($nombrefichero) and (time()-filemtime( $nombrefichero ))< 60  )
			{
				//echo date("Y-m-d H:i:s",filemtime ( $nombrefichero ));die();
				$mensajeerror= yii::app()->correo->correo_adjunto(
					Contactos::getListMailContacto($model->idcontacto,$this->documento),
					Yii::app()->user->email,
					Yii::app()->params['compras_titulomensaje'],
					'Este es un correo automatico',
					$nombrefichero
				);
				$this->insertamensaje($id,'M',Contactos::getListMailContacto($model->idcontacto,$this->documento));
				if($mensajeerror==""){
					ECHO "Se ha enviado el correo  a los siguientes destinatarios :  ". Contactos::getListMailContacto($model->idcontacto,$this->documento);
				}else{
					ECHO "No se pudo enviar el correo ".$mensajeerror;
				}
			}else{
				Echo "No se encontro el archivo para enviar, por favor genere el archivo" ;
			}
		}else{
			Echo "Confirme los cambios antes de procesar " ;
		}

	}


	public function actioncargaprecios(){
		//echo "maerial ".$_POST['codigomaterial']."<br>";
		// echo "prove ".$_POST['codigoprove']."<br>";
		// yii::app()->end();
		$codigo = (string)MiFactoria::cleanInput($_POST['codigomaterial']);
		$codigopro = (string)MiFactoria::cleanInput($_POST['codigoprove']);
		$codigocen = (string)MiFactoria::cleanInput($_POST['codentro']);
		$codigoalma = (string)MiFactoria::cleanInput($_POST['codigoalma']);

		//var_dump($codigo); var_dump($codigopro); var_dump($codigocen);die();
		// var_dump(Ocompra::historicoprecios($codigo,$codigopro,$codigocen,$limit=null));
		echo   $this->renderpartial('precios',array('codigom'=>$codigo,'codprov'=>$codigopro,'codentro'=>$codigocen,'codigoalma'=>$codigoalma),true,true);


	}

	public function actionAprobar()
	{
		$model=new VwOcompra('search');
		$proveedor=$model->search_por_liberar();

		$this->render('liberacion',array(
			'model'=>$model,'proveedor'=>$proveedor,
		));
	}

	/* public function actionVerdetoc($id){
            $id=(integer)MiFactoria::cleanInput($id);
            $detalle=Docompra::model()->findByPk($id);
            if(is_null($detalle)){
                throw new CHttpException(400,'No se ha encontrado ninigun registro ');

            }else{
                $this->redirect(array('verDocumento','id'=>$detalle->hidguia));
            }
        }*/

	public function actionFirmar()
	{
		$model=new VwOcomprasimple('search_liberacion');
		$model->unsetAttributes();  // clear any default values
		$proveedor=$model->search_liberacion();
		//$this->performAjaxValifdation($model);
		if(isset($_GET['VwOcomprasimple'])) {
			//EN EL CASO DE QUE SEA UNA BUSQUEDA MEDIANTE EL FOMRUALARIO
			//if ($model->validate()) {
			$model->attributes=$_GET['VwOcomprasimple'];
			//$model->validate();

			//  } else {
			// echo "que carajo";
			// }
		}
		$this->render('liberacion',array(
			'model'=>$model,'proveedor'=>$proveedor,
		));
	}

	public function insertamensaje($id,$tipo,$nombrefichero=null){
		$mensa=New Mensajes();
		$mensa->usuario=Yii::app()->user->name;
		$mensa->cuando= date("Y-m-d H:i:s");
		if(!is_null($nombrefichero)){
			$mensa->nombrefichero= substr($nombrefichero,0,20);
		}else{
			$mensa->nombrefichero= null;
		}
		$mensa->codocu=$this->documento;
		$mensa->hidocu=$id;
		$mensa->tipo=$tipo;
		IF(!$mensa->save())
			ECHO "FALLO CARAY".yii::app()->mensajes->getErroresItem($mensa->geterrors());
	}

	public function sepuedeprocesar($id){
		if($this->estasEnSesion($id)){
			if($this->hubocambiodetalle($id)){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}


	public function actionverprecios($codigomaterial){
		$codigomaterial=$_GET['codigomaterial'];
		// var_dump($codigomaterial);die();
		$codigomaterial=MiFactoria::cleanInput($codigomaterial);
		$registro=Maestrocompo::model()->findByPk($codigomaterial);
		if(!is_null($registro)){
			$model=new VwOcomprasimple('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['VwOcomprasimple'])) {
				$model->attributes=$_GET['VwOcomprasimple'];

			}
			$proveedor=$model->search_por_material($codigomaterial);
			$this->layout = '//layouts/iframe';
			$this->render('verprecios',array(
				'model'=>$model,'proveedor'=>$proveedor,
			));

		}else{
			throw new CHttpException(500,'No se encontro nimgun material con codigo  '.$codigomaterial);

		}

	}


	public function actionCreaservicio($id)
	{
		//VERIFICADO PRIMERO SI ES POSIBLE AGREGAR MAS ITEMS

		$modelocabeza=$this->loadModel((integer)MiFactoria::cleanInput($id));
		$model=new Tempdesolpe('buffer');
		$model->hidot=$id;
		$model->est=self::ESTADO_PREVIO;
		$model->idusertemp=Yii::app()->user->id;
		$model->hcodoc=$this->documento; ///detalle guia
		$model->tipsolpe='S';
                    
		//$model->imputacion=$modelocabeza->objetosmaster->objetoscliente->cebe;

		$model->valorespordefecto('350');

			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);

			if(isset($_POST['Tempdesolpe']))
			{
				$model->attributes=$_POST['Tempdesolpe'];
				$model->codocu='350'; ///detalle guia
				$model->tipsolpe='S';  //SERVICIO
				$model->codart=yii::app()->settings->get('materiales','materiales_codigoservicio');
				/*var_dump($model->codart);
				yii::app()->end();*/
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
			$this->render('_form_servicio',array(
				'model'=>$model, 'idcabeza'=>$id
			));



	}

    public function actionajaxprocesarothija(){
        if(yii::app()->request->isAjaxRequest){
            $opcion=  MiFactoria::cleanInput($_POST['opcion']);
            $identidad=  (integer)MiFactoria::cleanInput($_POST['id']);
            $registro=  Tempdetot::model()->findByPk($identidad);
            if(!is_null($registro)){
              switch ($opcion){
                case 'PROG'://programarla
                    $registro->programar();
                    
                    break;
                case 'AUT': //autorizarla
                     $registro->autorizar();
                    break;
                 case 'ANU'://anularla
                     $registro->anular();
                    break;
                 case 'TERM'://terminarla
                     $registro->terminar();
                    break;
                default:
                    break;  
            }
            
            }
                
            
        }
    }    
      
    
    public function actionBorraitemsdesolpe()
	{
	
        if(yii::app()->request->isAjaxRequest){
		$autoIdAll = $_POST['cajitarecursos'];		
		 if(count($autoIdAll)>0 )
			 {
			 	
                                  // $modelin=$autoIdAll[0]->solpe;  
                                    //coger la cabecera del primer hijo basta 
					// $transaccion = $modelin->dbConnection->beginTransaction();
					 foreach ($autoIdAll as $autoId) {
						 $this->borraitemdesolpe($autoId);
					 }
					
					// $transaccion->commit();
					 //$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array(index));
				 
				// Yii::app()->end();
			} ///luego actualizar yodos los cambos
        }
	}

public function actionBorraitemsconsignaciones()
	{
	$mensaje="ok";
        if(yii::app()->request->isAjaxRequest){
		$autoIdAll = $_POST['cajitaconsignaciones'];		
		 if(count($autoIdAll)>0 )
			 {
			 	
                                  // $modelin=$autoIdAll[0]->solpe;  
                                    //coger la cabecera del primer hijo basta 
					// $transaccion = $modelin->dbConnection->beginTransaction();
					 foreach ($autoIdAll as $autoId) {
						$mensaje.= $this->borraitemconsignacion($autoId)."<br>";
					 }
					
					// $transaccion->commit();
					 //$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array(index));
				 
				// Yii::app()->end();
			} ///luego actualizar yodos los cambos
        }
        echo $mensaje;
	}
	
public function borraitemconsignacion($autoId) //Borra un registro de coinsnaciones
	//para borrar  un registro tenemso 	ue tener en cuenta los criterios siguiertentes:
	//  1) No debe de haber reservas activas, esto se logra contandolas con la propiedad "numerodereservas" del objeto modelo
	{
		$modelito=Tempotconsignacion::model()->findByPk($autoId);
			if($modelito->id >0)  { ///Si ya tiene relacion con la tabla Desolpe firme
                            //si ya tiene
                            $modelito1=$modelito->otconsignacion;				
				if($modelito1->cantatendida==0 ){//Si no ha habido atenciones anularala
                                     //SOLAMNET COLOCAR EL ESTADI AULADO 
                                      $modelito->setScenario('estado');  
                                    $modelito->est=self::ESTADO_DETALLE_CONSIGNACIONES_ANULADA;
                                    $modelito->idstatus=-1;
                                    $modelito->save();
                                     $mensaje.="Se anulo el registro <br>";
				} else {
                                    $mensaje.="Este registro presenta atenciones no puede borrarlo<br>";
                                    //MiFactoria::Mensaje('error', "Este item no puede ser anulado porque ya tiene atenciones");
				}
                                
                                
				} else {
                                  
                            $command = Yii::app()->db->createCommand("delete from  {{tempotconsignacion}}   where idtemp =".$autoId."   ");
				$command->execute();
				//MiFactoria::Mensaje('succcess', "El registro de cosignacion ".$modelito1->solpe->numero."-".$modelito1->item. " se ha borrado");
			    $mensaje.="Se borro el registro <br>";
                            
                            
			}
                        return $mensaje;
		/*foreach(Yii::app()->user->getFlashes() as $key => $message) {
			echo "*)". $message . "\n";		}*/
		//echo $this->renderpartial("vw_mensajes",array());
	}
   public function borraitemdesolpe($autoId) //Borra un registro de solpe
	//para borrar  un registro tenemso 	ue tener en cuenta los criterios siguiertentes:
	//  1) No debe de haber reservas activas, esto se logra contandolas con la propiedad "numerodereservas" del objeto modelo
	{
		$modelito=Tempdesolpe::model()->findByPk($autoId);
                $mensaje="";
			if($modelito->id >0) { ///Si ya tiene relacion con la tabla Desolpe firme
                            //si ya tiene
                            $modelito1=$modelito->desolpe;
				$modelito1->setscenario('Atencionreserva');
				if($modelito1->numeroreservas==0 ){
					if($modelito->est=='20'){ //si ya estaba nulado
						$mensaje.="El registro de solicitud ".$modelito1->desolpe_solpe->numero."-".$modelito1->item. "Ya fue anulado <br>";
					} else {
						$modelito->est='20';
						$modelito->save();
						$mensaje.="El registro de solicitud ".$modelito1->desolpe_solpe->numero."-".$modelito1->item. " se ha anulado sin problemas <br>";
					}
				} else {
					$mensaje.="El registro de solicitud ".$modelito1->desolpe_solpe->numero."-".$modelito1->item. " No puede ser anulado  por que presenta reservas activas<br>";
				}
                                
                                
				} else {
                            
                            $command = Yii::app()->db->createCommand("delete from  {{tempdesolpe}}   where idtemp =".$autoId."   ");
				$command->execute();
				$mensaje.="El registro de solicitud ".$modelito1->solpe->numero."-".$modelito1->item. " se ha borrado<br>";
			   
                            
			}
		
			echo $mensaje;		
		//echo $this->renderpartial("vw_mensajes",array());
	} 
    public function actionCreaconsignacion($idcabeza,$cest)
            
	{
        
        if(!yii::app()->request->isAjaxRequest){
		$modelopadre=$this->loadModel($idcabeza);
		//$descuento=(is_null($modelopadre->descuento))?0:(1-$modelopadre->descuento/100);
        $model=new Tempotconsignacion();
		$model->hidot=$idcabeza;
		$model->est=self::ESTADO_PREVIO;
		$model->idusertemp=Yii::app()->user->id;
		//$model->hcodoc=$this->documento; //
               // $model->codocu='350'; //
		//$model->tipsolpe='M';
		$model->setScenario('buffer');
		//$model->imputacion=$modelopadre->objetosmaster->objetoscliente->cebe;

		//$model->valorespordefecto('350');
		//$model->tipoitem='M';
		if(isset($_POST['Tempotconsignacion']))		{
			$model->attributes=$_POST['Tempotconsignacion'];


			$model->item=$modelopadre->getNextItemConsignacion();
			//$model->item=str_pad(Tempotconsignacion::model()->count($criterio)+1,3,"0",STR_PAD_LEFT);
			//str_pad($somevariable,$anchocampo,"0",STR_PAD_LEFT);
			////con esto calculamos el numero de items
			//echo "  El valor de  ".$idcabeza."       ".$model->n_hguia."   ";
			//$this->performAjaxValidationconsignacion($model);
			if($model->save()){
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-consignaciones-grid');
																		");

				}
			}

		}
		// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('_form_consignacion',array('modelopadre'=>$modelopadre,
			'model'=>$model, 'idcabeza'=>$idcabeza,'editable'=>true
		));
        }
	}
    
 public function actiontomafoto($id){
      $detalle=  Tempdetot::model()->findByPk((integer)  MiFactoria::cleanInput($id));  
      if(!is_null($detalle)){          
          if(isset($_FILES['webcam']['tmp_name']))
              {
                var_dump($_FILES['webcam']['tmp_name']);die();
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
                      Yii::log(' sew jecuta el controlador de OT CONTORTRLLLER  ','error');
            Yii::log(' el filenama    '.$filename,'error');
               $detalle->colocaarchivo($nombretemp);
               unlink($nombretemp);
              //move_uploaded_file($_FILES['webcam']['tmp_name'],Yii::getPathOfAlias('webroot').'/images/webcam.jpg');
                           
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script(     "window.parent.$('#cru-dialog3').dialog('close');
								window.parent.$('#cru-frame3').attr('src','');"
                                                            );
				
                                yii::app()->end();
                }            
                    // var_dump('ahora que ');die();           
          if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('//site/subefotos',array('model'=>$detalle));
         
      }else{
         	throw new CHttpException(500,'No se encontro el item id del item de la Ot'); 
      }
    }
    
   
    public function actionCargagaleria(){
        IF(yii::app()->request->isAjaxrequest){
            if(isset($_GET['id'])){
                $id= (integer)MiFactoria::cleanInput($_GET['id']);
                 $detalle= Tempdetot::model()->findByPk($id);
                 $detalle->agregacomportamientoarchivo('.jpg');
                 if(!is_null($detalle)){
              // var_dump($detalle->fotosparagaleria());die();
                     /* $this->renderpartial('//site/galeria',
                              array(
                                    'titulo'=>$detalle->textoactividad,
                                   'modo'=>3,
                                     'mensajegeneral'=>$detalle->ot->textocorto,                                   
                                   'fotos'=>$detalle->fotosparagaleria(),
                              )
                              );*/
                     $this->renderpartial('//site/tab_imggrilla',
                              array(
                                    'model'=>$detalle,
                                  'id'=>$detalle->id,
                                  'codocu'=>$detalle->documento,
                                   ),false,true
                              );
         
                 }else{
                    throw new CHttpException(500,'No se encontro el registro de la OT PARA ESTE ID'.$id); 
         
                 }
            }else{
               throw new CHttpException(500,'No se encontro el item id del item de la Ot'); 
       
            }
           
           
        }
    }
    
    
    public function actionimputa ($id){ ///ojo es el idtemp
        $idtemp=(integer)MiFactoria::cleanInput($id);        
        $modelodetalle=Tempdetot::model()->findByPk($idtemp);
		//$descuento=(is_null($modelopadre->descuento))?0:(1-$modelopadre->descuento/100);
        $model=new Dcajachica();
		$model->hidref=$modelodetalle->id;
                $model->codocuref=$modelodetalle->codocu;
                $model->codtra=$modelodetalle->codresponsable;
                  $model->ceco=$modelodetalle->cc;
		if(isset($_POST['Dcajachica']))		{
			$model->attributes=$_POST['Dcajachica'];
			if($model->save()){
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialog3').dialog('close');
                                                            window.parent.$('#cru-frame3').attr('src','');
							window.parent.$.fn.yiiGridView.update('detalle-consignaciones-grid');
							");

				}
			}else {
                          echo "fallo";die();
                            print_r($model->geterrors());
                        }

		}
		// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('_cajachica',array('model'=>$model,
			'modelodetalle'=>$modelodetalle
		));
        
        
        
    }
    
    public function sepuedeanular($id){
        $id= (integer)MiFactoria::cleanInput($id);
        $registroot=$this->loadModel($id);
        
        
        //verificndo primero qu este en sesion y 
       
        if($this->estasEnSesion($id)){ //Si esta en sesion primeramente
            //no se haya modiifcado nada del cenxaezado y el detalle 
            if(!$this->hubocambio($registroot)){
                if(!$this->hubocambiodetalle($id)){
                    
                }else{
                    
                }
            }else{
                
            }
        }else{
            
        }
        
        
    }
    
   
    
    public function actionJalaMateriales($id)
	{		
          $this->layout = '//layouts/iframe';  
           $modelopadre=$this->loadModel($id);
           
              if(isset($_POST['Tempdesolpe']))  {
                  //var_dump($_POST['Tempdesolpe']);
                  $registroelegido= Tempdetot::model()->
                          findByPk((integer)$_POST['Tempdesolpe']['hidlabor']);
                  //var_dump( $registroelegido);
                  if(!is_null($registroelegido)){
                     $atributos=array(
                                    'fechaent'=>$_POST['Tempdesolpe']['fecahent'],
                                    'centro'=>$_POST['Tempdesolpe']['centro'],
                                    'codal'=>$_POST['Tempdesolpe']['codal'],
                                    'textodetalle'=>$_POST['Tempdesolpe']['textodetalle'],
                                    'solicitanet'=>$_POST['Tempdesolpe']['solicitanet'],
                                  );
                     $idlista=$_POST['Tempdesolpe']['hidsolpe'];
                     //var_dump($idlista);die();
                  $registroelegido->cargarecursos($idlista,$atributos);
                 
                      
                  }
                  
                   echo CHtml::script(
                          "window.parent.$('#cru-dialog3').dialog('close');
                             window.parent.$('#cru-frame3').attr('src','');
			window.parent.$.fn.yiiGridView.update('detalle-recursos-grid');
				");
                  
                  yii::app()->end(); 
                  
              }else{
                  $criteria=New CDBcriteria();
            $criteria->addCondition("hidorden=:vorden and codmaster is not null  and idusertemp=:viduser");
            $criteria->params=array(":vorden"=>$modelopadre->id,":viduser"=>yii::app()->user->id);
           $datoscombo= CHtml::listData(Tempdetot::model()->findAll($criteria),'idtemp','textoactividad');
           //var_dump($datoscombo);
		 
              }
                
                
                
                $model=new Tempdesolpe;
		$this->render('_form_jalamateriales',array(
                    'model'=>$model,
                    'modelopadre'=>$modelopadre,
                    'datoscombo'=>$datoscombo,
			//'model'=>$model, 'idcabeza'=>$idcabeza,'editable'=>true
		                     ));
                
                
	}
      public function actionJalaMaterialesExt($id)
	{		
          $this->layout = '//layouts/iframe';  
           $modelopadre=$this->loadModel($id);
           
              if(isset($_POST['Tempdesolpe']))  {
                  //var_dump($_POST['Tempdesolpe']);
                  $registroelegido= Tempdetot::model()->
                          findByPk((integer)$_POST['Tempdesolpe']['hidlabor']);
                  //var_dump( $registroelegido);
                  if(!is_null($registroelegido)){
                     $atributos=array(
                                    'fechaent'=>$_POST['Tempdesolpe']['fecahent'],
                                    'centro'=>$_POST['Tempdesolpe']['centro'],
                                    'codal'=>$_POST['Tempdesolpe']['codal'],
                                    'textodetalle'=>$_POST['Tempdesolpe']['textodetalle'],
                                    'solicitanet'=>$_POST['Tempdesolpe']['solicitanet'],
                                    
                                  );
                     $idlista=$_POST['Tempdesolpe']['hidsolpe'];
                     //var_dump($idlista);die();
                  $registroelegido->cargarecursosext($idlista,$atributos);
                 
                      
                  }
                  
                   echo CHtml::script(
                          "window.parent.$('#cru-dialog3').dialog('close');
                             window.parent.$('#cru-frame3').attr('src','');
			window.parent.$.fn.yiiGridView.update('detalle-consignaciones-grid');
				");
                  
                  yii::app()->end(); 
                  
              }else{
                  $criteria=New CDBcriteria();
            $criteria->addCondition("hidorden=:vorden and codmaster is not null  and idusertemp=:viduser");
            $criteria->params=array(":vorden"=>$modelopadre->id,":viduser"=>yii::app()->user->id);
           $datoscombo= CHtml::listData(Tempdetot::model()->findAll($criteria),'idtemp','textoactividad');
           //var_dump($datoscombo);
		 
              }
                
                
                
                $model=new Tempdesolpe;
		$this->render('_form_jalamateriales',array(
                    'model'=>$model,
                    'modelopadre'=>$modelopadre,
                    'datoscombo'=>$datoscombo,
			//'model'=>$model, 'idcabeza'=>$idcabeza,'editable'=>true
		                     ));
                
                
	} 
    public function actionajaxmuestralistamateriales(){
        //var_dump($_POST);die();
         if(isset($_POST['datopost'])){
                $id= (integer)MiFactoria::cleanInput($_POST['datopost']);
                 $detalle= Tempdetot::model()->findByPk($id);  
               
                 if(!is_null($detalle)){
                     //echo "jajaj"; die();
                      // var_dump($detalle->ot->vwobjetos);die();
                     $condiciones=array($detalle->codmaster);
                     $criteria = new CDbCriteria();
		     $criteria->addInCondition("codigo",$condiciones);                     
                     $listaids=yii::app()->db->createCommand()->select("hidlista")->
                             from("{{masterlistamateriales}}")->
                             where($criteria->condition, $criteria->params)->
                             queryColumn();
                     $criterio = new CDbCriteria();
		     $criterio->addInCondition("id", $listaids);
                       
                     $data=CHtml::listData(Listamateriales::model()->findAll($criterio),
                                                                 "id",
                                                            "nombrelista"											
                                            ); 
                 
                     echo CHtml::tag('option', array('value'=>null),CHtml::encode('Escoja una lista'),true);
			foreach($data as $value=>$name) { 
			    echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
			   } 
                 }else{
                      echo "jaxxx"; die();
                 }
                     
		
		
			
                     
                 }
         }
    
                 
      
        
 public function actionajaxobjetosporclipro(){
    if(yii::app()->request->isAjaxRequest){ 
        if(isset($_POST['identidad'])){     
            $id= MiFactoria::cleanInput($_POST['identidad']); 
          // VAR_DUMP($id);DIE();
            $registros= ObjetosCliente::model()->findAll("codpro='".$id."'");    
            
             //var_dump($registros);die();
            foreach($registros as $filaobjeto){
               // var_dump($filaojeto->id);
                echo CHtml::tag('option', array('value'=>$filaobjeto->codobjeto),CHtml::encode($filaobjeto->nombreobjeto),true);

            }
         }
            
            } 
            
   }       
   	public function actionmodificadetalleconsignacion($id)
	{

		$model= Tempotconsignacion::model()->findByPk((integer)MiFactoria::cleanInput($id));
		$model->setScenario('buffer');
		//$model->tipoitem='M';
		if(isset($_POST['Tempotconsignacion']))		{
			$model->attributes=$_POST['Tempotconsignacion'];


			//$model->punitdes=$model->punit*$descuento;
			//crietria para filtrar la cantidad de items del detalle

			//str_pad($somevariable,$anchocampo,"0",STR_PAD_LEFT);
			////con esto calculamos el numero de items
			//echo "  El valor de  ".$idcabeza."       ".$model->n_hguia."   ";
			$this->performAjaxValidationdetalle($model);
			if($model->save()){
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
			echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
				window.parent.$('#cru-detalle').attr('src','');
                                window.parent.$.fn.yiiGridView.update('detalle-consignaciones-grid');
				
			");

				}
			}

		}
		// if (!empty($_GET['asDialog']))
		//$formulario=($model->tipsolpe=='M')?'_form_detalle_recursos':'_form_servicio';
		$this->layout = '//layouts/iframe';
		$modelopadre=Ot::model()->findByPk($model->hidot);
		$this->render('_form_consignacion',array('modelopadre'=>$modelopadre,
			'model'=>$model, 'idcabeza'=>$modelopadre->id,'editable'=>true
		));
	}
 
     public function actionmuestrakardex(){
         $codmov= array(self::COD_MOV_CONSIGNACION,self::COD_MOV_ANULA_CONSIGNACION);
         $idref= (integer)MiFactoria::cleanInput($_GET['idref']);
         $proveedor= VwKardex::model()->search_por_movimiento_idref($codmov, $idref);
         $this->layout = '//layouts/iframe';
         $this->render('//alinventario/vistakardex',array('proveedor'=>$proveedor));
         
     }
   
public function actionAgregaDetalleOtCompo($id){
    
    $modelopadre=$this->loadModel($id);
              
		//$descuento=(is_null($modelopadre->descuento))?0:(1-$modelopadre->descuento/100);
		$model=new Tempdetot('ingreso');
              // die();
		$model->hidorden=$id;
		$model->codestado=self::ESTADO_PREVIO;
		$model->idusertemp=Yii::app()->user->id;
		$model->idaux=round(microtime(true) * 1000);                
		$model->codocu=$this->documentohijo; 
		$model->valorespordefecto($this->documentohijo);
		if(isset($_POST['Tempdetot']))		{
                        $model->attributes=$_POST['Tempdetot'];
			$model->item=$modelopadre->getNextItem();
			$this->performAjaxValidationdetalle($model);
			if($model->save()){
				if (!empty($_GET['asDialog']))
				{
					echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
                                                             window.parent.$('#cru-detalle').attr('src','');
								window.parent.$.fn.yiiGridView.update('detalle-grid');
								window.parent.$.fn.yiiGridView.update('resumenoc-grid');
								");
				}
			}
		}
		$this->layout = '//layouts/iframe';                
		$this->render('_form_detalle_compo',array(
			'model'=>$model, 'idcabeza'=>$modelopadre->id,'editable'=>true
		));
    
       }
     
       
        public function actionajaxcompo(){
        if(yii::app()->request->isAjaxRequest){
            $opcion=  MiFactoria::cleanInput($_POST['codigocompo']);
            //$identidad=  (integer)MiFactoria::cleanInput($_POST['id']);
            $registro= Masterequipo::findByCodigo($opcion);
            if(!is_null($registro)){
                echo $registro->descripcioncompleta ;
            }else{
               echo "El código ingresado no pertenece a ningún componente" ;
            
            }
                
            
        }
    }    
     
    public function actionAdminDetalle()
	{
		$model=new VwOtdetalle('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VwOtdetalle'])) {
			$model->attributes=$_GET['VwOtdetalle'];
			$proveedor=$model->search();
		}
		$this->render('admindetalle',array(
			'model'=>$model,'proveedor'=>$proveedor,
		));
	}
    
    
     public function actionAjaxAgregaTrabajadores($id){
         $model= Ot::model()->findByPk((integer)MiFactoria::cleanInput($id));
         //var_dump($model);die();
         if(!is_null($model)){
             if(isset($_POST['cajita'])){
			
                        $autoIdAll = $_POST['cajita'];			
			if(count($autoIdAll)>0 ) 
			{
                            
				foreach($autoIdAll as $autoId)
				{
					// verificando si ya exoste
                                    $registro= Ottraba::model()->findByPk($autoId);
                                  if(is_null($registro)){
                                     $modelo=New Ottraba();
                                    $modelo->setAttributes(
                                                array(
                                                    'hidot'=>$model->id,
                                                    'codtra'=>$autoId,                                                    
                                                )
                                                );                                               
                                        $modelo->save(); 
                                  }
                                    
                                    
				}
			}
                    
                    
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
                                echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
                                                    window.parent.$('#cru-detalle').attr('src','');
                                                    window.parent.$.fn.yiiGridView.update('detalle-trabajadores');				
                                                    ");
			}

		}
                
               $this->layout = '//layouts/iframe';		
		$this->render('_form_trabajadores',arraY('identidad'=>$modelo->id)); 
         }else{
             
         }
		
		
     }   
        
   public function actionajaxborratrabajadores(){
       IF( Yii::app()->request->isAjaxRequest){
	if(isset($_POST['cajita'])){            
            $autoIdAll = $_POST['cajita'];
			
			if(count($autoIdAll)>0 ) //and ($this->eseditable($estado)==''))
			{
				foreach($autoIdAll as $autoId)
				{
					$registro= Ottraba::model()->findByPk($autoId);
                                        $registro->delete();
				}
			}
                              }           
		  }
            }
            
   public function actionupdatecuadrilla(){
       IF( Yii::app()->request->isAjaxRequest){
	if(isset($_POST['cajita'])){            
            $autoIdAll = $_POST['cajita'];
			
			if(count($autoIdAll)>0 ) //and ($this->eseditable($estado)==''))
			{
				foreach($autoIdAll as $autoId)
				{
					$registro= Cuadrilla::model()->findByPk($autoId);
                                        $registro->delete();
				}
			}
                              }           
		  }
   }
   
   public function actionEditatarifas($id)
	{		
          // echo"ss";
            $model= Ottraba::Model()->findByPk(MiFactoria::cleanInput((int)$id));
             //echo "ggererererererere";
		if ($model===null)
			throw new CHttpException(404,'No se encontro ningun documento para estos datos');
		//colocar el escenario correcto
		if(isset($_POST['Ottraba']))		{
			$model->attributes=$_POST['Ottraba'];
			if($model->save()){
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("
                window.parent.$('#cru-dialogdetalle').dialog('close');
		window.parent.$('#cru-detalle').attr('src','');                            
                window.parent.$.fn.yiiGridView.update('trabajadores-grid');");
					Yii::app()->end();
				}
			}else{
				print_r($model->geterrors());
			}

		}

		if (!empty($_GET['asDialog'])){
                    
                    $this->layout = '//layouts/iframe';
                }
			

		$this->render('_form_tarifa',array(
			'model'=>$model,'editable'=>true
		));



	}
   
   
  /*
   * ESTA FUNCION ACTUALZIA LOS TEXTOS DFE LAS IMAGENES
   */   
public function actionAjaxUpadteTextosImg(){
        
        if(yii::app()->request->isAjaxRequest){ 
            $titulo=unserialize(base64_decode($_GET['titulo']));
             $mensajegeneral=unserialize(base64_decode($_GET['texto']));  
            
                $id= (integer)MiFactoria::cleanInput($_GET['id']);  
                $idadjunto= (integer)MiFactoria::cleanInput($_GET['idadjunto']); 
                $registro= Detot::model()->findByPk($id);        
                if(is_null($registro))                 
                    throw new CHttpException(500,'NO se encontro el registro con el id '.$id);       
                 $registro->ActualizaTextos($id,$idadjunto,$titulo,$textos);   
                
         }
    }
     
} 
    

/**
	 * Manages all models.
	 */
	


?>
