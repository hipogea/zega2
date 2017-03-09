<?php
const CODIGO_DOCUMENTO_RQ_COMPRA='800';
const CODIGO_DOCUMENTO_RESERVA='450';
const CODIGO_DOCUMENTO_DETALLE_COMPRA='220';
const CODIGO_DOCUMENTO_COMPRAS='210';
const ESTADO_VALE_EFECTUADO='20';
CONST SALIDA_RQ='11';
CONST ANULA_SALIDA_RQ='12';
CONST MOV_INGRESO_COMPRA='30';
CONST MOV_INGRESO_CONSIGNACION='13';
CONST MOV_ANULA_INGRESO_COMPRA='40';
CONST CODIGO_MOVIMIENTO_SALIDA_AUTOMATICA_RQ='11';
CONST CODIGO_MOVIMIENTO_ANULA_SALIDA_AUTOMATICA_RQ='12';
class Alkardex extends ModeloGeneral
{
    const COD_DOCU_KARDEX='460';

    private $_cantidadbase =null;
	private $_punitbase =null;
    //private $_conversionmoneda=null;
	private $_montobase=null;
	private function conversionmoneda()
	{
		return yii::app()->tipocambio->getcambio($this->codmoneda,
			yii::app()->settings->get('general', 'general_monedadef'));
	}
	public function  cantidadbase()
	{
		if(is_null($this->_cantidadbase)){
			if ($this->esservicio()) {
				$this->_cantidadbase=$this->cant;
			} else {
				$this->_cantidadbase= $this->cant * Alconversiones::convierte($this->codart, $this->um);
			}
		}
		return $this->_cantidadbase;
	}

	public function punitbase(){
		if(is_null($this->_punitbase)){
				$this->_punitbase= $this->preciounit  *$this->conversionmoneda()/ Alconversiones::convierte($this->codart, $this->um);
		}
		return $this->_punitbase;
	}

	public function montobase(){
		return (is_null($this->_montobase))?$this->cantidadbase()*$this->punitbase():$this->_montobase;
	}

	public function  preciounitariobase($codmoneda)
	{

		if ($codmoneda == $this->alkardex_alinventario->almacen->codmon) {
			//yii::app()->settings->get('general','general_monedadef'))
			$conversionmoneda = 1;
		} else {
			$conversionmoneda = yii::app()->tipocambio->getcambio($codmoneda, $this->alkardex_alinventario->almacen->codmon);

		}

		return $this->preciounit * $conversionmoneda / Alconversiones::convierte($this->codart, $this->um);
	}



	/**
	 * Regresa el valor deL MONTO MOVIDO
	 * EL PRECIO UNITARIO LO SACA DEL INVENTARIO , PUED DSER (+)  (-), TODO EXSPRESADO EN MONEDA BASE , CONVIERTE AUTOAMTICAMENTE
	 * observe que paraq anulaciones de vales idkardex <> null ; NO SE REALIZA LA CONVERSION ESTA DEMAS , TODO ES IGUAL AL KARDEX ORIGINAL
	 * EN OTRO CASO CADA QUE ANULAN UN VALE , estarian perdiendo por tipo de cambio
	 */
	public function getMonto($idkardex = NULL)
	{
		//$conversionmoneda = yii::app ()->tipocambio->getcambio ($this->alkardex_alinventario->almacen->codmon  , yii::app ()->settings->get ( 'general' , 'general_monedadef' ) );
		$conversionmoneda = $this->conversionmoneda() + 0;
		if (is_null($idkardex)) {
			/*Cuando tinene valoracion LIFO IFO, el monot movido se analiza con lostes			 */
			if (IN_ARRAY($this->maestrodetalle->controlprecio, ARRAY('F', 'L')) ) {
				     if($this->alkardex_almacenmovimientos->esconsumo=='1' AND !($this->codmov==CODIGO_MOVIMIENTO_SALIDA_AUTOMATICA_RQ)){ //sOLO EN LE CASO DE LA TENCION RQ NO SE CALCULA POR LOTES , SE CALULA DIRECTAMETNE DE LA COMPRA
						 $vasriab = $this->alkardex_alinventario->costealote( abs($this->cantidadbase()),
                                                                                                        $this->maestrodetalle->controlprecio
                                                                                                    ) *
                                                                                                $conversionmoneda*
                                                                                                $this->alkardex_almacenmovimientos->signo
                                                                                       // gmp_sign((integer)round($this->cantidadbase(),4)
                                                                                                 ;
						// echo "Esta ES LA OP1         ".$vasriab; die();
						 //$vasriab = $this->montobase();
					 }elseIF($this->codmov==CODIGO_MOVIMIENTO_SALIDA_AUTOMATICA_RQ){
					//	echo "Esta ES LA OP2"; die();
						 //$vasriab = $this->montobase();
						 $vasriab = $this->montobase();
					 }ELSE{
						// echo "Esta ES LA OP4"; die();
						// $vasriab = $this->montobase();
                                             //gmp_sig
						 $vasriab =($this->idotrokardex > 0)?Alkardex::model()->findByPk($this->idotrokardex)->montomovido*-1: $this->montobase(); //Se trata de anulaciones  O PARES
						 ///Si tiene par  se coloca le mismo noto base
						 //Si no tiene par colocar el monrto base
					 }
			} ELSE {
				//echo "Esta ES LA OP5"; die();
				$vasriab = $this->montobase();
				//echo "op 4";die();
			}
		} else {
			$vasriab = Self::model()->findByPk($idkardex)->montomovido; ///Caundo un kardezx
			// se graba el campo monot movido almacena autoamticamente el calculo y es identico no hay que conertri monedas ni nidades de medida
			//echo "op 5";die();
		}
		return $vasriab;
	}

	private function getcolector()
	{
		switch ($this->codocuref) {
			case '340':
			case '350':
				return Desolpe::model()->findByPk($this->idref)->imputacion;
				break;
			case '210':
			case '220':
				$idsolpe = Docompra::model()->findByPk($this->idref)->iddesolpe;
				return Desolpe::model()->findByPk($idsolpe)->imputacion;
				break;
			case '340':
			case '350':
				return null;
				break;
			default:
				return null;
		}

	}




	private function esservicio()
	{
		return ($this->codart == yii::app()->settings->get('materiales', 'materiales_codigoservicio'));
	}


	public function getPreciounitario()
	{
		RETURN $this->alkardex_alinventario->punit;
	}


	/**
	 * Regresa el valor de LA CANTIDAD consiugnad en el registro detalle de compra
	 *     */
	public static function cantidadcomprada($idref)
	{
		$modelo = Docompra::model()->findBypK($idref);
		if (is_null($modelo)) {
			return $modelo->cant;
		} else {
			throw new CHttpException(500, __CLASS__ . '->' . __FUNCTION__ . 'Intento buscar en una docompra que no existe ');

		}
	}


	/**
	 * Regresa el valor de LA CANTIDAD consiugnad en el registro detalle de LA RESERVA
	 * OJO QUE AUIQ SE TINEN  QUE FIJAR SUI ES UNA SOLPE PARTIDA EN RESERVA +RESERVA PARA COMPRA
	 *     */
	public static function cantidadreservada($idref)
	{
		$modelox = Desolpe::model()->findBypK($idref);
		$canti = null;
		foreach ($modelox->desolpe_alreserva as $row) {
			if ($row->codocu == '450') {
				$canti = $row->cant;
				break;
			}
		}


		if (!is_null($modelox)) {
			return $canti;
		} else {
			throw new CHttpException(500, __CLASS__ . '->' . __FUNCTION__ . 'Intento buscar en una DESOLpe que no existe el id= ' . $idref);
		}
	}



	public function mueveadicionales()
	{
   $codop=null;
		/*$monedacompras=null;
        if(in_array($this->codocuref,ARRAY(CODIGO_DOCUMENTO_COMPRAS,CODIGO_DOCUMENTO_DETALLE_COMPRA )))
            $monedacompras=Ocompra::model()->find("numcot=:ndoc",array(":ndoc"=>$this->numdocref))->moneda;
            $monedamain=yii::app()->settings->get('general','general_monedadef');*/
		switch ($this->codmov) {
			case "10":
				$this->InsertaAtencionReserva(CODIGO_DOCUMENTO_RESERVA);
				//$ceco = Desolpe::model()->findByPk($this->idref)->imputacion;
				//$ceco=$this->updatesolpe()->imputacion;
				$this->InsertaCcGastos(/*$ceco*/);
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), null, $this->id);
				$codop='100'; //Consumo interno
				break;

			case "43":
				$this->InsertaAtencionReserva(CODIGO_DOCUMENTO_RESERVA);
				//$ceco = Desolpe::model()->findByPk($this->idref)->imputacion;
				//$ceco=$this->updatesolpe()->imputacion;
				$this->InsertaCcGastos(/*$ceco*/);
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), null, $this->id);
				$codop='101'; //Consumo PARA VENTAS
				break;



			case "20":
				$this->InsertaAtencionReserva(CODIGO_DOCUMENTO_RESERVA);
				///$ceco = Desolpe::model()->findByPk($this->idref)->imputacion;
				$this->InsertaCcGastos(/*$ceco*/);
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), null, $this->idotrokardex);
				$codop='100'; //Consumo interno
				break;

			case "11":
				//ECHO " 11  HAY  ".$this->alkardex_alinventario->cantlibre." unidades<br>";
				$this->gestionaRQ();
				//$this->InsertaAtencionReserva(CODIGO_DOCUMENTO_RQ_COMPRA);
				//$ceco = Desolpe::model()->findByPk($this->idref)->imputacion;
				//$this->InsertaCcGastos($ceco);
				///AQUI NO  SE ACTUALIZA EL STOCK DEL INVNETARIO PORQUE LA CANTIDAD PASA DIRECTAMENTE a  la atencion RQ y AL GASTO
				//$this->alkardex_alinventario->actualiza_stock($this->codmov,abs($this->cantidadbase()),null);
				$codop='100'; //Consumo interno
				break;
                            
                        case "14":  //ingreso de repuestos OT 
				$this->InsertaAtencionConsignacion();
				break;  
                            
                              case "15":  //ingreso de repuestos OT 
				$this->InsertaAtencionConsignacion();
				break;  
                            
			case "12":
				$this->gestionaRQ();
				$codop='100'; //Consumo interno
				//$this->alkardex_alinventario->actualiza_stock($this->codmov,abs($this->cantidadbase()),null);
				break;


			case MOV_INGRESO_CONSIGNACION:
				$this->InsertaAlentregasCompras();
				if(!$this->esatencionRQ())
					$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), $this->punitbase(), $this->id);
				$this->ocuparsedelosRq(); ///Si hay RQ de compras verifica y astender
				$codop='185'; //Ingreso CONSIGNACKON
				break;

			case '31':  //ANULAR INGRESO COSIGNACION
				$this->InsertaAlentregasCompras();
				if(!$this->esatencionRQ())
					$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()),  $this->punitbase(), $this->id);
				$this->ocuparsedelosRq(); ///Si hay RQ de compras verifica y astender
				$codop='185'; //Ingreso CONSIGNACKON
				break;

			case "30": //INGRESO COMPRA

				$this->InsertaAlentregasCompras();
				if(!$this->esatencionRQ())
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()),  $this->punitbase(), $this->id);
				$this->ocuparsedelosRq(); ///Si hay RQ de compras verifica y astender
				$this->actualizapreciosclipro();
                                $codop='357'; //Ingreso compras
				break;

			case "40": //ANULAR INGRESO COMPRA
				if( $this->alkardex_alentregas[0]->cantfacturada > 0  ){
					MiFactoria::Mensaje('error',$this->identidada().'  Este item ya tiene facturacion ' );
				}else{

					$this->InsertaAlentregasCompras();
					if(!$this->esvaleRQ())
						$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()),  $this->punitbase(), $this->id);
					//yii::app()->end();
					$this->ocuparsedelosRq(); ///Si hay RQ de compras verifica y astender
					$codop='357'; //Ingreso compras
					//$this->ocuparsedelosRq(); ///Si hay RQ de compras verifica y astender
				}

				break;


			case "79":
				//$this->preciounit = $this->getMonto();
				$this->InsertaCcGastos(/*$this->colector*/);
				//$this->$this->alkardex_alinventario->detallesmaterial()['precioventa'];
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), null , $this->id);

				$codop='101'; //Comsumo par aventyas
				break;

			case "67": //AJUSTE POR faltantes
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), $this->punitbase(), $this->id);
				break;

			case "18": //ANULAR AJUSTE POR faltantes
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), $this->punitbase(), $this->id);
				break;
			case "75": //AJUSTE POR SOBRANTES
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), $this->punitbase(), $this->id);
				break;

			case "19": //ANULAR AJUSTE POR SOBRANTES
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), $this->punitbase(), $this->id);
				break;


			case "81":
				$this->preciounit = $this->getMonto();
				$this->InsertaAtencionReserva();
				//$ceco = Dpeticion::model()->findByPk($this->idref)->imputacion;
				$this->InsertaCcGastos(/*$ceco*/);
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), null);
				$codop='101'; //Comsumo par aventyas
				break;
			case "98":
				$moneda = $this->alkardex_alinventario->almacen->codmon;
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), $this->punitbase(), $this->id);
			//	$codop='540'; //Inventario inicial
				break;
			case "89":
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), $this->punitbase(), $this->id);
			//	$codop='540'; //Inventario inicial
				break;

			case "77": //inica traslado

				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), null,$this->id);
				break;
			case "78": //acepta el traspaso
				$thisoriginal = Alkardex::model()->findByPk($this->idref); ///cone sto busca el kardex del almacen emisor
				//verifica la consistencia
				$thisoriginal->InsertaAlkardexTraslado($this->cant);
				// $thisoriginal->getMonto();
				$movimientoauxiliar = '45';
				$thisoriginal->alkardex_alinventario->actualiza_stock($movimientoauxiliar, abs($this->cantidadbase()), null, $thisoriginal->id);
				//verificamos la moneda del almacen que emite
				//$moneda=$thisoriginal->alkardex_alinventario->almacen->codmon;
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()),  $this->punitbase(), $this->id);
				//  yii::app()->end();
				break;

			case "68": //Ingreso de actividad
				$this->InsertaAlentregasCompras();
                            $this->InsertaCcGastosServ();
				//$this->InsertaCcGastos($this->getcolector());
				//$this->alkardex_alinventario->actualiza_stock($this->codmov,abs($this->cantidadbase()));
				$codop='575'; //Ingreso de actividad
				break;

			case "86": //Anular Ingreso de actividad
				$this->InsertaAlentregasCompras();
				 $this->InsertaCcGastosServ();
				//$this->alkardex_alinventario->actualiza_stock($this->codmov,abs($this->cantidadbase()));
				$codop='575'; //ingresod e actividad
                                 break;

			case "54": //ANULA EL INGRESO DEL TRASLADO
				$thisoriginal = Alkardex::model()->findByPk($this->idref); ///cone sto busca el kardex del almacen emisor
				$thisoriginal->InsertaAlkardexTraslado($this->cant);
				$movimientoauxiliar = '76';   //ANULA SALIDA TRASLADO EN KARDEX EMISOR
				$thisoriginal->alkardex_alinventario->actualiza_stock($movimientoauxiliar, abs($this->cantidadbase()), null, $thisoriginal->id);
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()),  $this->punitbase(), $this->id);
				break;
			case "70": //reingreso, solo vales de cosmumo
				//primero que nada el reingreso usa como referencia a los kardex originales que dioerom movimieto
				//al comsumo originalM
				$kardorigen = Alkardex::model()->findByPk($this->idotrokardex);
				//Siemrpe que no se ahya reingresado el total
				if (abs($kardorigen->cant) >= $kardorigen->reingreso_cant) {
					//echo "salio" ; yii::app()->end();
					$kardorigen->InsertaReingreso(abs($this->cant));

					//ahora tenemos que enconatrar el movimiento original y darle la contra
					$movimientoopuesto = $kardorigen->alkardex_almacenmovimientos->anticodmov;
					$campoafectadoinv = $kardorigen->alkardex_almacenmovimientos->campoafectadoinv;
					$inven = $this->alkardex_alinventario;
					$inven->actualiza_stock($movimientoopuesto, abs($this->cantidadbase()), $this->punitbase(),$this->idotrokardex);


					/*  NO SE DEBE DE INSERTAR NADA EN ATENCION RESERVA
					SE SUPONE QUE  NO SE ESTA RECONSTRUYENO LA RESERVA SE ESTA REINGFERSNADO EL MATERIALE BV
					TODO ESTO VA LA STOCK LIBRE */
					///pero tambiend ebe insertar atencion reserva
					//$this->InsertaAtencionReserva(CODIGO_DOCUMENTO_RESERVA);



					$ceco = Desolpe::model()->findByPk($kardorigen->idref)->imputacion;
					$this->insertaCcGastos($ceco);
					if ($campoafectadoinv == 'cantres') {
						if (
						!(
							($inven->stockreserva_a_libre($this->cantidadbase()))
							and $inven->save()
						)
						)
							MiFactoria::Mensaje('error', $this->identidada().'  No se puede pasar del stock reservado al libre');
					}
					/*$ceco=CcGastos::model()->find("hidref=:vid",array(":vid"=>$this->id));
                    $this->InsertaCcGastos($ceco);*/

					$codop='645';
				}else{
					MiFactoria::Mensaje('error', $this->identidada().'  No se puede reingresar [ '.abs($kardorigen->cant).' ]  mas de lo que se atendio  ['.$kardorigen->reingreso_cant.'] ');

				}


				break;

			case "50": //salida para ceco
				$this->InsertaCcGastos($this->colector);
				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), null , $this->id);

				//$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()));
				$codop='100';
				break;

			case "60": //Anula salida para ceco

				$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($this->cantidadbase()), null , $this->idotrokardex);
				$this->InsertaCcGastos($this->colector);
				$codop='100';
				break;
			default:
				throw new CHttpException(500, __CLASS__ . '  ' . __FUNCTION__ . '  No se ha definido este codigo de movimiento ' . $this->codmov);
		}


		/*INSERTA LOS ASIENTOS CONTABLES COMPROMETIDOS EN ESTA TRANSACCION*/
		if(Yii::app()->hasModule('contabilidad'))
		if(!is_null($codop)){
			//var_dump($this->maestrodetalle->catval);die();
			if(in_array($this->codmov,array('68','86'))){ //Si e servicio hay que encontrar la categoria de valor por el maste  de serviucios
						$grupo=Maestroservicios::model()->findByPk(Desolpe::model()->findByPk(Docompra::model()->
						findByPk($this->idref)->iddesolpe)->codservicio)->catval;

			}else{ //Si es una mateiral es automatico
				$grupo=$this->maestrodetalle->catval;
			}
                       // echo $this->codart;echo $codop;echo$grupo;
			yii::app()->librodiario->asiento($this->id,$this->coddoc,$codop,$grupo,$this->fecha,
				$this->numdocref,$this->alkardex_almacenmovimientos->movimiento,$this->montomovido);

		} ELSE{
			///EN ESTE CASO EL KARDEX NO HACE RNADA PARA LE CASO DE LOS AJUSTES DE INVENTARIO LOS ASINTOS DEL LIBRO LO HACEN
			//DESDE OTRA INTERFAZ PORQUE , LAS CUENTAS SON  DISTINTAS PARA CADA CASO Y LE CONTADOR DECIDE PCOMO AJUSTA

		}

	}

	public function InsertaReingreso($canti = null)
	{

		$reing = New Reingreso;
		if (is_null($canti)) {
			$cantidad = abs($this->cant);
		} else {
			$cantidad = abs($canti);
		}
		$reing->setAttributes(array('hidkardex' => $this->id, 'cant' => $cantidad));
		if (!$reing->save()) {
			print_r($reing->geterrors());
			yii::app()->end();
		}

	}


	public function afterSave()
	{
		//var_dump($this->montomovido);yii::app()->end();
		//if(in_array($this->alkardex_almacendocs->cestadovale,array(ESTADO_CREADO,ESTADO_PREVIO)) ) ///SOLO EN EL CASO DE QUE SEA CREADO

		/*  Nos aseguramos que no se dulpiquen los procesos, solo efectuarlos despues de la insercion
		del registro nuevo, mas no en los siguientes updates */
            if(!in_array($this->getScenario(),arrAy('transporte'))){
                   
	if(count($this->oldAttributes)==0)
		$this->mueveadicionales();
		//$this->refresh();
		//var_dump($this->attributes);yii::app()->end();
        
            }
		return parent::afterSave();
	}


	//public $conservarvalor=0; //Opcionpa reaverificar si se quedan lo valores predfindos en sesiones
	public function beforeSave()
	{
               if(!in_array($this->getScenario(),arrAy('transporte'))){
                   
               

		if ($this->isNewRecord) {
			$this->codestado = '10';
			$this->coddoc='460';
			$this->iduser = yii::app()->user->id;

		} else {
			$this->saldo=$this->alkardex_alinventario->getstockregistro();
			$this->umsaldo=$this->alkardex_alinventario->maestro->um;
			$this->cantbase=$this->cantidadbase();

			/* echo "saliop carajo";	//$this->ultimares=" ".strtoupper(trim($this->usuario=Yii::app()->user->name))." ".date("H:i")." :".$this->ultimares;
            */
		}
		//var_dump($this->alkardex_alinventario);die();
                    $this->montomovido = $this->getMonto();

		//if(!($this->codart==yii::app()->settings->get('materiales','materiales_codigoservicio')))
		//$sig=$this->alkardex_almacenmovimientos->signo;
		/*if($this->esatencionRQ())
		$sig = -1;*/
		//$sig=($this->codmov=='11')?-1:1;
		//var_dump($this->montomovido);
		
		//var_dump($this->id);
		//var_dump($this->montomovido);yii::app()->end();
		//print_r($this->attributes);yii::app()->end();
                
        }
		return parent::beforesave();
	}


	private function devuelvereserva($documento)
	{
		if (in_array($this->codmov, array(MOV_INGRESO_COMPRA, MOV_ANULA_INGRESO_COMPRA))) {
			$docompram = Docompra::model()->findByPk($this->idref);
			$modelosolpe = Desolpe::model()->findByPk($docompram->iddesolpe);
			$reserva = Alreserva::model()->findByPk($modelosolpe->idreserva);
		}
		elseif(in_array($this->codmov, array(CODIGO_MOVIMIENTO_SALIDA_AUTOMATICA_RQ,
			CODIGO_MOVIMIENTO_ANULA_SALIDA_AUTOMATICA_RQ))){
			$modelosolpe = Desolpe::model()->findByPk($this->idref);
			$reserva = $modelosolpe->rq[0];



		   } else {
			$modelosolpe = Desolpe::model()->findByPk($this->idref);
			//$reserva=$modelosolpe->desolpe_alreserva;
			if (is_null($modelosolpe))
				throw new CHttpException(500, __CLASS__ . ' - ' . __FUNCTION__ . ' ' . __LINE__ . '  Error no se pudo encontrar el detalle de Solpe ' . (int)$this->idref);
			//print_r($modelosolpe->attributes);
			//PRINT_R($modelosolpe->desolpe_alreserva);YII::APP()->END();
			//$cantacumulada=$modelosolpe->desolpe_alreserva[0]->alreserva_cantidadatendida;
			$reserva = Alreserva::model()->find("hidesolpe=:vidsolpe AND codocu in
			('" . $documento . "') AND estadoreserva <> '30' ", array(":vidsolpe" => $modelosolpe->id));

		}
		if (is_null($reserva))
			throw new CHttpException(500, __CLASS__ . ' - ' . __FUNCTION__ . '   Error no se pudo encontrar la reserva asociada a la desolpe');
		return $reserva;

	}


	public function cantidadconv($um)
	{

		/*var_dump($this->um);var_dump($um);
        var_dump(Alconversiones::convierte($this->codart,$this->um,$um));
        var_dump($this->cant*Alconversiones::convierte($this->codart,$this->um,$um));yii::app()->end();*/
		return $this->cant * Alconversiones::convierte($this->codart, $this->um, $um);
	}


	/**
	 * Verifica si es posibel agregar o quitar atenciones a la reserva
	 *
	 *     */
	public function VerificaCantAtenReservas($documento)
	{
		$retorno = "";
		$modreserva = $this->devuelvereserva($documento);
		$cantacumulada = $modreserva->alreserva_cantidadatendida;
		$cantsolicitada = $modreserva->cant;

		$cantmovida = $this->cantidadconv($modreserva->desolpe->um);///cantidad convertida a la UM de la reserva-Desolpe
		//VAR_DUMP($cantmovida);VAR_DUMP($cantacumulada);VAR_DUMP($cantsolicitada);YII::APP()->END();
		if ($cantmovida < 0) {  ///si es una atencion (salida)
			$diferencia = $cantsolicitada - $cantacumulada;
			if (round(abs($cantmovida), 4) > round($diferencia, 4)) {
				$retorno .= __CLASS__ . '-' . __FUNCTION__ . ' No puede atender mas de lo que se ha solicitado, revise <br>';
				MiFactoria::Mensaje('error', __CLASS__ . '-' . __FUNCTION__ . '  abs ' . abs($cantmovida) . '  difrencia ' . $diferencia . '  No puede atender mas de lo que se ha solicitado(' . $cantsolicitada . ': ' . $modreserva->desolpe->um . ' s), cant acumulada (' . $cantacumulada . ' : ' . $modreserva->desolpe->um . ' s) , cant movida (' . $cantmovida . '   ' . $this->um . ' s )  revise <br>');
			}
		} else { ///Si es una anulacion, ingreso
			if (abs($cantmovida) > abs($cantacumulada))
				$retorno = MiFactoria::Mensaje('error', __CLASS__ . '-' . __FUNCTION__ . '  abs cant movida (' . abs($cantmovida) . ')  abs cant acumulada( ' . $cantacumulada . ')   No puede retirar mas de lo que se ha acumulado en la atencion ');

		}
		return $retorno;

		}


	/**
	 * Verifica si es posibel agregar o quitar atenciones a la as entrwgas o compras
	 *
	 *     */

	public function VerificaCantAtenCompras()
	{
		$cantsolicitada = self::cantidadcomprada($this->idref);
		$cantacumulada = $this->cantcompras;
		$cantmovida = $this->cant;
		//$signomovimiento=$this->alkardex_almacenmovimientos->signo;

		if ($cantmovida < 0) {    //es una devolucion decompras , sign nmegativo
			//DEBEMOS ASEGURARNOS QUE NO RESTE MAS DE LO QUE SE HA ACUMULADO
			if (abs($cantmovida) > $cantacumulada) {
				//$this->insertamensaje(InventarioUtil::FLAG_ERROR,"No puede devolver mas de lo que ha ingresado POR COMPRA ");
				//MiFactoria::Mensaje('error','Material '.$this->codart.' No puede devolver  '.($cantmovida).'mas de lo que ha comprado '.$cantsolicitada.', ya se paso');

				$retorno = false;
			}


		} else { //sIGNO POSITIVO, ES UN IMGRESO DE COMPRAS AL INVENTARIO
			///DEBSMO ASEGURARNOS QUE NO SOBREPASE LO COMPRADO
			if ($cantmovida > $cantsolicitada - $cantacumulada) {
				//$this->insertamensaje(InventarioUtil::FLAG_ERROR,"No puede atender mas de lo que ha COMPRADO, ya se paso");
				//MiFactoria::Mensaje('error','Material '.$this->codart.' No puede atender '.($cantmovida+$cantacumulada).'mas de lo que ha solicitado '.$cantsolicitada.', ya se paso');

				$retorno = false;
			}

		}


	}

	/**
	 *Obiene la cantidad trasladada
	 *
	 *     */
	/*public static function cantidadtrasladada($idref) {
        return Alkardex::model()->findByPk($idref)->cant;
    }*/

	/**
	 * Verifica si es posibel agregar o quitar  a la tabla alkardex taslada
	 *
	 *     */
	public function VerificaCantTrasladoDestino($cantidaddelkardex)
	{
		$canttotaltrasladada = $this->cant;
		$cantacumulada = $this->alkardex_alkardextraslado_emisor_cant + 0;
		$cantmovida = $cantidaddelkardex;
		//$signomovimiento=$this->alkardex_almacenmovimientos->signo;
		/* ECHO "CANTOTALTRASLADADA ".$canttotaltrasladada."<BR>";
            ECHO "CANTACUMULADA ".$cantacumulada."<BR>";
            ECHO "CANTMOVIDA ".$cantmovida."<BR>";yii::app()->end();*/
		if ($cantmovida < 0) {
			//var_dump(abs($cantmovida));var_dump($cantacumulada);var_dump(abs($cantmovida) > $cantacumulada);
			///es una ANULACION DE LA ACEPTACION DEL TRASPASO , NEGATIVA
			//DEBEMOS ASEGURARNOS QUE NO RESTE MAS DE LO QUE SE HA ACUMULADO
			if (abs($cantmovida) > $cantacumulada) {

				//$this->insertamensaje(InventarioUtil::FLAG_ERROR,"No puede devolver mas de lo que ha TRASLADADO (ACUMULADO) ");
				MiFactoria::Mensaje('error', 'Material ' . $this->codart . ' No puede devolver ' . ($cantmovida + $cantacumulada) . 'mas de lo que ha trasladado ' . $canttotaltrasladada . ', ya se paso');

				$retorno = false;
			} else {

				$retorno = true;
			}


		} else { //sIGNO POSITIVO, ES UNA ACEPTACION DEL TRASALDAO
			//MiFactoria::Mensaje('error','ESTO ES UNA PRUENA  CANTMOVIDA '.$cantmovida.'  cantacumulada '.$cantacumulada.'   lo trasladado '.$canttotaltrasladada.',');
			//echo " fsfsfsfsfsf";var_dump(abs($cantmovida));var_dump($cantacumulada);yii::app()->end();
			///DEBSMO ASEGURARNOS QUE NO SOBREPASE LO QUE SE TRASLADO ORIGINALEMTNE
			if ($cantmovida > $canttotaltrasladada - $cantacumulada + 0) {
				//$this->insertamensaje(InventarioUtil::FLAG_ERROR,"No puede INGRESAR MAS DE LOS QUE SE  ha TRASLADADO, ya se paso");
				//MiFactoria::Mensaje('error','Material '.$this->codart.' No puede ingresar '.($cantmovida+$cantacumulada).'mas de lo que se ha trasladado '.$canttotaltrasladada.', ya se paso');

				$retorno = false;
			} else {
				$retorno = true;
			}

		}
		return $retorno;


	}

	public function InsertaAtencionReserva($documento = NULL)
	{
		//echo $this->id;yii::app()->end();
		$cadena = $this->VerificaCantAtenReservas($documento);
		if ($cadena == "") {
			$tipodoc = $documento; //RreEERVA PARA CONSUMO  O REQUISISON DE COMPRA
			//$signo=$this->alkardex_almacenmovimientos->signo;
			$modeloreserva = $this->devuelvereserva($documento);
			$model = new Atencionreserva();
		/*	if (in_array($this->codmov, array(MOV_ANULA_INGRESO_COMPRA))) //Solo en este caso siempre sera negativa en la reserva
			{
				$model->cant = -1 * abs($this->cantidadconv($modeloreserva->desolpe->um));
			} ELSE {*/
				$model->cant = -1*$this->cantidadconv($modeloreserva->desolpe->um);
			/*} //En el resto de casos va con el signo propio del movimiento*/

			//	print_r($this->attributes);yii::app()->end();
			//var_dump($documento);echo "<br>"; var_dump($modeloreserva->attributes);yii::app()->end();
			$model->hidkardex = $this->id;
			$model->hidreserva = $modeloreserva->id;
			$model->estadoatencion = Atencionreserva::ESTADO_CREADO;
			if (!$model->save())
				throw new CHttpException(500, "NO se Pudo insertar el registro de atenciones reservas ");
			unset($model);
			unset($matrix);
		}

		return $cadena;
	}


	//se debe de infgrear la cantida del  KARDEX RECEPTOR
	public function InsertaAlkardexTraslado($cantidad)
	{
		if ($this->VerificaCantTrasladoDestino($cantidad)) {
			MiFactoria::InsertaAlkardexTraslado($this->id, $cantidad);
		} else {

			MiFactoria::Mensaje('error', __CLASS__ . '   ' . __FUNCTION__ . ' HUBO UN PROBLEMA EN LA VERIFICAION DE LAS CANTIDADES');
			return null;
		}
	}

	/***************PARA INGRESO COMPRA**************************
	 * Esta funcion verifica que se esta atendiendo bien la compra
	 * en especial si existe     * una DESOLPE->Con una reserva  TIPO 800 (sOLCI COMPRA)
	 * para imputar al CECO/OT  original y el resto mandarlo al
	 * Srock libre     * , en otro caso solo se actualiza stock
	 *******************************************/
	private function esatencionRQ()
	{
		//buacando el detalle de la OC mediante el idref
		$docompram = Docompra::model()->findByPk($this->idref);
		//buscando el detalle de la Solpe
		/*var_dump($this->idref);
        var_dump($docompram->attributes);
        var_dump($docompram->id);
        var_dump($docompram->iddesolpe);yii::app()->end();*/
		$detallesolpe = Desolpe::model()->findByPk($docompram->iddesolpe);
		//var_dump($detallesolpe->attributes);yii::app()->end();
		//Buscando si tiene reserva , ES UNA SOLPE DE COMPRA IMPUTADA (atencion partida)
		RETURN $detallesolpe->idreserva; //que tega el campo idereserva lleno >0  signifia que esta edsolpe esta atendiendo una reserva 800
	}


	public function ocuparsedelosRq(/*$movimiento /*puede ser  SALIDA RESERVA '10' O ANULAR SSALIDA RESERVA '20'*/)
	{
		$valor = $this->esatencionRQ() + 0;
		if ($valor > 0) {
			if($this->codmov==MOV_INGRESO_COMPRA)$movop=CODIGO_MOVIMIENTO_SALIDA_AUTOMATICA_RQ;
			if($this->codmov==MOV_ANULA_INGRESO_COMPRA)$movop=CODIGO_MOVIMIENTO_ANULA_SALIDA_AUTOMATICA_RQ;
			//verificand primero si ya tine el vale de refencia creado
			//porque puede darse el caso que e n una mis a OC existan varios items
			//con atencion RQ, todas deben ir en un mismo vale
			$referencia=$this->alkardex_almacendocs->getreferencia();
			if($referencia < 0 ){
				$valeclonado=$this->alkardex_almacendocs->clonavale($movop);
			} else{
				$valeclonado=Almacendocs::model()->findByPk($referencia);
			}
			//ahora clonando el kardex w insertando en el vale
			$this->clonakardex($movop,
				$this->cant,/*$valeclonado->id,$this->alkardex_almacendocs->codocuref,
				/*$this->alkardex_almacendocs->numdocref,*/$valeclonado->id);
			return true;
		} else {
			return false;
		}
	}


	public function InsertaAlentregasCompras()
	{

		$model = new Alentregas();
		$model->cant = $this->cant;
		$model->idkardex = $this->id;
		$model->iddetcompra = $this->idref;
		$model->estado = Alentregas::ESTADO_CREADO;
		if (!$model->save())
			throw new CHttpException(500, "NO se Pudo insertar el registro de atenciones compras ");
		unset($model);
	}

	public function gestionaRQ()
	{
			//var_dump($reservaoriginal);
			$detallesolpeoriginal = Desolpe::model()->findByPk($this->idref);
			$reservaoriginal =$detallesolpeoriginal->rq[0];
			//var_dump($detallesolpeoriginal);
			$cantidadpendiente = $reservaoriginal->cant - $reservaoriginal->alreserva_cantidadatendida;
			///ojo aqui verificamos si esta cantidad pendiente es mayor que
			// la que se esta moveindo en este kardex, si es mayor  debe ser la cacntida del kardex
			//no s epude atender mas de lo que se esta moviendo actualmente en este kardex
			if ($detallesolpeoriginal->um <> $this->um) {
				$cantidadenestekardex = $this->cant * Alconversiones::convierte($this->codart, $this->um, $detallesolpeoriginal->um);
			} else {
				$cantidadenestekardex = $this->cant;
			}
			if ($cantidadenestekardex <= $cantidadpendiente) {
				$cantamover = $cantidadenestekardex;
			} ELSE { ///Si es mayor entondes la diferencia colocarlo en el stock libre
				$diferencia = $cantidadenestekardex - $cantidadpendiente;
				$cantamover = $diferencia * Alconversiones::convierte($this->codart, $detallesolpeoriginal->um, $this->um);
				}
		//	$this->alkardex_alinventario->actualiza_stock($this->codmov, abs($cantamover), $this->preciounitariobase($this->codmoneda), $this->id);
			//VAR_DUMP($cantidadenestekardex);VAR_DUMP($cantidadpendiente);YII::APP()->END();
			$this->InsertaAtencionReserva(CODIGO_DOCUMENTO_RQ_COMPRA);
			$ceco = $detallesolpeoriginal->imputacion;
			//VAR_DUMP($ceco);VAR_DUMP($cantidadpendiente);YII::APP()->END();
			$this->InsertaCcGastos($ceco);

	}

	public function InsertaCcGastos($ceco=null)
	{
		//$row=self::CargaModelo('Alkardex',$idkardex);
		//$row=$filakardex;
		$model = new CcGastos();
		
		$model->fechacontable = $this->fecha;
                if(is_null($ceco)){ //sie slibre buscar el ceco 
                   $desolpe=Desolpe::model()->findByPk($this->idref);
                    $tipoimputacion=$desolpe->tipimputacion;
                   // var_dump($desolpe->attributes);
                    $colector=$desolpe->imputacion;
                    //var_dump($desolpe->tipimputacion);die();
                    //$idref=$desolpe->hidot;
                    
                    if($tipoimputacion=='T')//ORDEN DE SERVICIO{
                                {  $model->codocuref='890';
                                   // $model->idref=$idref; 
                                    $colector=$desolpe->ot->numero;unset($desolpe); 
                                     }ELSEIF($tipoimputacion=='K'){
                                        $model->codocuref=self::COD_DOCU_KARDEX;
                                        // $model->idref=$this->id; 
                                     }
                        //$model->idref=$this->id; 
                      $model->ceco=$colector;
                } else{ //si es nulo entonces las cosas siguen como antes , n se modifica nada 
                   // $tipoimputacion='K';
                     $model->codocuref=self::COD_DOCU_KARDEX;
                    $model->ceco=$ceco;
                     
                }
		
			$signo = -1;
		$model->idref=$this->id;
		$model->monto = $signo * $this->montomovido; ///ok
		$model->iduser = Yii::app()->user->id;
		$model->tipo = 'M';
               // $model->ceco = $colector;
                
                
                 
		//$model->idref = $this->id;
               // $model->codocuref=self::COD_DOCU_KARDEX;
		//print_r($model->attributes);die();
		if (!$model->save())
			throw new CHttpException(500, "NO se Pudo insertar el registro de Costos ");
		//self::Mensaje('success','Se inserta los gastos  '.$model->monto.'  al ceco '.self::CargaModelo('Desolpe',$row->idref)->imputacion);
		unset($model);//unset($row);
	}


	public function InsertaCcGastosServ()
	{
		MiFactoria::InsertaCcGastosServ($this->id);
	}


	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yii::app()->params['prefijo'] . 'alkardex';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('textolargo,fecha,saldo,umsaldo,codmoneda,idotrokardex,preciounit,codmoneda,colector,montomovido', 'safe'),
			array('cant', 'numerical'),
			//array('codart','chkcatval'),
			array('codart', 'length', 'max' => 10),
			array('codmov, codestado, prefijo', 'length', 'max' => 2),
			array('alemi, aldes, coddoc, um, codocuref', 'length', 'max' => 3),
			array('numdoc, numdocref', 'length', 'max' => 15),
			array('usuario', 'length', 'max' => 25),
		//	array('creadoel, modificadoel, comentario', 'length', 'max' => 20),
			array('codcentro', 'length', 'max' => 4),
			array('correlativo', 'length', 'max' => 12),
			array('numkardex', 'length', 'max' => 14),
			array('solicitante', 'length', 'max' => 18),
			array('fecha,idref, fechadoc,valido,checki, hidvale,montomovido', 'safe'),

                        array('checki','safe','on'=>'transporte'),
                    
			/*  escenario para el buffer
			//escenario para el buffer*/
			array('codart,um,idstatus,numdocref,idref,idotrokardex,preciounit,codestado,
			codmov,alemi,textolargo,coddoc,fechadoc,valido,hidref,
			codocuref,codcentro,numdocref,fecha,checki,
			hidvale,preciounit', 'safe', 'on' => 'buffer'),


			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('codart, codmov, cant, alemi,lote, aldes,idref, fecha, coddoc, numdoc, usuario,  um, comentario, codocuref, numdocref, codcentro, id, codestado, prefijo, fechadoc, correlativo, numkardex, solicitante, hidvale', 'safe', 'on' => 'search'),

			/*********ESCENARIO  GENERAL POR DFAULT   *******/

			//array('cant', 'required'),
			//array('codmov,hidvale,numdocref,codart,cant,alemi,codcentro,iduser, idusertemp, idstatus,
			//fecha,codocuref,idref,preciounit,idtemp', 'safe'),
			/*********/


			/*********ESCENARIO   = SALIDARESERVA  *******/

			array('cant', 'required', 'on' => 'salidareserva'),
			array('codmov,hidvale,numdocref,codart,cant,alemi,codcentro,iduser, idusertemp, idstatus,
			fecha,codocuref,idref,preciounit', 'safe', 'on' => 'salidareserva'),
			/*********/

			/*********ESCENARIO   = CAMBIO D EEESTADO *******/
			array('codestado,valido', 'safe', 'on' => 'cambioestado'),
			/*********/


			/*********ESCENARIO   = CARGA INICIAL *******/
			array('codart', 'required', 'on' => 'cargainicial'),
			array('codart', 'checkcodigo', 'on' => 'cargainicial'),
			array('cant', 'required', 'on' => 'cargainicial'),
			array('um', 'required', 'on' => 'cargainicial'),
			array('um', 'checkum', 'on' => 'cargainicial'),
			array('codocuref,numdocref', 'required', 'on' => 'cargainicial'),

			array('codmov,hidvale,numdocref,codart,cant,alemi,codcentro,iduser, idusertemp, idstatus,
			fecha,codocuref,idref,preciounit', 'safe', 'on' => 'cargainicial'),
			/*********/


			/*********ESCENARIO   = REINGRESO *******/
			//array('codart', 'required','on'=>'reingreso'),
			array('um', 'checkum', 'on' => 'reingreso'),
			array('cant', 'required', 'on' => 'reingreso'),
			array('idref', 'required', 'on' => 'reingreso'),
			array('um', 'required', 'on' => 'reingreso'),
			array('numdocref', 'required', 'message' => 'Debes de indicar el vale de salida', 'on' => 'reingreso'),
			array('numdocref', 'checknumerovale', 'on' => 'reingreso'),
			array('cant', 'chekcantreingreso', 'on' => 'reingreso'),
			array('codcentro,codalmacen,codart,cant,um,idref,numdocref', 'safe', 'on' => 'reingreso'),
			/*********/


			/*********ESCENARIO   = TRASPASO*******/
			array('codart', 'required', 'on' => 'traspaso'),
			array('codart', 'checkcodigo', 'on' => 'traspaso'),
			array('um', 'checkumgeneral', 'on' => 'traspaso'),
			array('cant', 'required', 'on' => 'traspaso'),
			array('cant', 'checkcantidad', 'on' => 'traspaso'),
			//array('idref', 'required','on'=>'traspaso'),
			array('um', 'required', 'on' => 'traspaso'),
			//array('numdocref', 'required','message'=>'Debes de indicar el vale de salida','on'=>'reingreso'),
			//array('numdocref', 'checknumerovale','on'=>'reingreso'),
			//array('cant', 'chekcantreingreso','on'=>'reingreso'),
			array('codcentro,codalmacen,codart,cant,um,codcendestino,codaldestino,preciounit', 'safe', 'on' => 'traspaso'),
			/*********/


			/*********ESCENARIO   = ingresoTRASPASO*******/
			//array('codart', 'required','on'=>'ingresotraspaso'),
			//array('codart', 'checkcodigo','on'=>'ingresotraspaso'),
			//array('um', 'checkumgeneral','on'=>'ingresotraspaso'),
			//array('cant', 'required','on'=>'ingresotraspaso'),
			//array('cant', 'checkcantidad','on'=>'ingresotraspaso'),
			//array('idref', 'required','on'=>'traspaso'),
			//array('um', 'required','on'=>'ingresotraspaso'),
			//array('numdocref', 'required','message'=>'Debes de indicar el vale de salida','on'=>'reingreso'),
			//array('numdocref', 'checknumerovale','on'=>'reingreso'),
			//array('cant', 'chekcantreingreso','on'=>'reingreso'),
			array('codcentro,codalmacen,codart,cant,um,codcendestino,codaldestino,preciounit', 'safe', 'on' => 'ingresotraspaso'),


			/*********ESCENARIO   = ANULAR CARGA INICIAL *******/
			array('codart', 'required', 'on' => 'anulacargainicial'),
			//array('codart', 'checkcodigo','on'=>'cargainicial'),
			array('cant', 'required', 'on' => 'anulacargainicial'),
			array('um', 'required', 'on' => 'anulacargainicial'),
			//array('um', 'checkum','on'=>'cargainicial'),
			array('preciounit', 'required', 'on' => 'anulacargainicial'),
			array('codcentro,codalmacen,codmov,fecha,fechadoc', 'safe', 'on' => 'anulacargainicial'),
			/*********/
		);
	}

	public function checkcantidad($attribute, $params)
	{
		if ($this->isNewrecord) {

			$cantidadlibre = Alinventario::model()->encontrarregistro($this->codcentro, $this->alemi, $this->codart)->cantlibre;
		} else {

			$cantidadlibre = $this->alkardex_alinventario->cantlibre;
		}
		$conversion = Alconversiones::model()->convierte($this->codart, $this->um);
		if ($this->cant * $conversion > $cantidadlibre) {
			//$matriz2=Alconversiones::model()->findAll("um1='".trim($unidad)."'");
			$this->adderror('cant', 'No se puede mover : [' . $this->cant * $conversion . ']   mas de los que hay en stock libre : [' . $cantidadlibre . '] ');
		}
	}


	public function checkumgeneral($attribute, $params)
	{
		$um = Maestrocompo::model()->findByPk($this->codart)->um;
		if ($this->um != $um and is_null($um)) {
			//si no se encontro buscar en la tabla conversiones
			$matriz = Alconversiones::model()->findAll("um2='" . trim($this->um) . "' and codart='" . trim($this->codart) . "'");
			if (count($matriz) == 0) {
				//$matriz2=Alconversiones::model()->findAll("um1='".trim($unidad)."'");
				$this->adderror('um', 'No hay conversiones para esta Um');
			}
		}
	}


	public function checkum($attribute, $params)
	{
		if (!Alconversiones::validaum($this->codart, $this->um))
			$this->adderror('um', ' Esta unidad de medida no corresponde a este material');
	}


	public function chekcantreingreso($attribute, $params)
	{
		//verioficando los reingreso que hacen referencia al item del vale con el que salio el material ( original )
		//Estoq uiere decir para verificar que la suma de las cantidades reingresdas no debe exceder a la cantidad del item del vale de salida

		///verificando la suma de las cantidades
		$cantidadreingresada = Yii::app()->db->createCommand(" select sum(cant) as cantreingresada, idref from
 										" . Yii::app()->params['prefijo'] . "alkardex
	       							  where codestado not in ('98','99')
	       							    and codmov='70' and
	       							   idref=" . $this->idref . "
										group by idref")->queryScalar();
		$cantidadoriginal = Yii::app()->db->createCommand(" select cant   from
 										" . Yii::app()->params['prefijo'] . "alkardex
	       							  where codestado not in ('98','99') and
	       							   id=" . $this->idref)->queryScalar();
		//query scalar deuelve false si no encuentra nada,  asi que nos aseguramos
		if (!$cantidadreingresada)
			$cantidadreingresada = 0;
		if (!$cantidadoriginal)
			$cantidadoriginal = 0;
		//bien ya tenemos los reingresoas anteriores , ahora  la suma de estos mas la cantidad ingfresda no debe de excceder a
		//a la cantidad original
		if (abs($this->cant) + abs($cantidadreingresada) > abs($cantidadoriginal))
			$this->adderror('cant', 'Con esta cantidad se ha excedido lo que salio, en el vale original->' . $this->idref . "  cantidadingresada : " . $cantidadreingresada . " cant oriignal : " . $cantidadoriginal . "   cant cant colocada " . $this->cant);
	}

	public function checknumerovale($attribute, $params)
	{
		///verificando el nuemro de vale
		$criteria = new CDbCriteria();
		$criteria->addCondition("numvale=:vnumvale", 'AND');
		$criteria->addCondition("codmov in ('50','10')");
		$criteria->params = array(':vnumvale' => trim($this->numdocref));
		//$valor=$_POST['Eventos']['codocu'];
		$registros = VwKardex::model()->findAll($criteria);
		if (count($registros) == 0)
			$this->adderror('numdocref', 'El vale indicado no se ha encontrado o no es una vale de salida, verifique bien');
	}


	public function checkcodigo($attribute, $params)
	{

		$modelomaterial = Maestrocompo::model()->find("codigo=:codigox", array(":codigox" => TRIM($this->codart)));
		if (is_null($modelomaterial)) {
			$this->adderror('codart', 'Este material no existe');
		} else {
			$modelocabecera = Almacendocs::model()->findByPk($this->hidvale);
			$modinventario = Alinventario::model()->find("codart='" . trim($this->codart) . "' AND codalm='" . $modelocabecera->codalmacen . "' AND codcen='" . $modelocabecera->codcentro . "'");
			if (is_null($modinventario)) {
				//if($this->alkardex_alinventario===null) {
				$this->adderror('codart', 'Este material tiene que ser ampliado al centro -:  ' . $modelocabecera->codcentro . ' y almacen ' . $modelocabecera->codalmacen . ' ');


			} else {
				//veriicando la unidad de medida
				if ($this->um <> $modelomaterial->um) { //si es diferente a la unidad de medida base
					//revisar las conversiones
					$matrizunidades = Alconversiones::model()->findAll("codart=:codigox and um2=:unitas ", array(":codigox" => TRIM($this->codart), ":unitas" => $this->um));
					if (count($matrizunidades) == 0)
						$this->adderror('um', 'No existe conversiones para esta unidad de medida en este material ');
				}

			}


		}

	}


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'reingreso' => array(self::HAS_MANY, 'Reingreso', 'hidkardex'),
			'unidades' => array(self::BELONGS_TO, 'Ums', 'um'),
			'reingreso_cant' => array(self::STAT, 'Reingreso', 'hidkardex', 'select' => 'sum(t.cant)'),
			'codmov0' => array(self::BELONGS_TO, 'Almacenmovimientos', 'codmov'),
			'codcentro0' => array(self::BELONGS_TO, 'Centros', 'codcentro'),
			'coddoc0' => array(self::BELONGS_TO, 'Documentos', 'coddoc'),
			'codocuref0' => array(self::BELONGS_TO, 'Documentos', 'codocuref'),
			'maestro' => array(self::BELONGS_TO, 'Maestrocompo', 'codart'),
			'maestrodetalle' => array(self::BELONGS_TO, 'Maestrodetalle', array('codart' => 'codart', 'alemi' => 'codal', 'codcentro' => 'codcentro')),
			//'dlote'=>array(self::HAS_MANY, 'Lotes',

			'alkardex_atencionreservas' => array(self::HAS_MANY, 'Atencionreserva', 'hidkardex'),
			'alkardex_atencionesreservas' => array(self::STAT, 'Atencionreserva', 'hidkardex', 'select' => 'sum(t.cant)', 'condition' => "estadoatencion <> '20'"),
			'alkardex_alentregas' => array(self::HAS_MANY, 'Alentregas', 'idkardex'),
			'alkardex_almacendocs' => array(self::BELONGS_TO, 'Almacendocs', 'hidvale'),
			'alkardex_almacenmovimientos' => array(self::BELONGS_TO, 'Almacenmovimientos', 'codmov'),
			'alkardex_alkardextraslado_emisor' => array(self::HAS_MANY, 'Alkardextraslado', 'hidkardexemi'),
			'alkardex_alkardextraslado_destino' => array(self::HAS_MANY, 'Alkardextraslado', 'hidkardexdes'),
			'alkardex_alkardextraslado_emisor_cant' => array(self::STAT, 'Alkardextraslado', 'hidkardexemi', 'select' => 'sum(t.cant)', 'condition' => "codestado <> '30'"),
			'alkardex_alkardextraslado_destino_cant' => array(self::STAT, 'Alkardextraslado', 'hidkardexdes', 'select' => 'sum(t.cant)', 'condition' => "codestado <> '30'"),
			'cantcompras' => array(self::STAT, 'Desolpecompra', 'iddesolpe', 'select' => 'sum(t.cant)', 'condition' => "codestado <> '30'"),//el campo foraneo
			'alkardex_despacho' => array(self::HAS_MANY, 'Despacho', 'hidkardex'),
			//'alkardex_alkardextraslado_destino'=>array(self::HAS_MANY, 'Alkardextraslado', 'hidkardexdes'),
			//'alkardex_alinventario'=>array(self::BELONGS_TO, 'Alinventario', 'hidvale'),
			'alkardex_alinventario' => array(self::BELONGS_TO, 'Alinventario', array('codart' => 'codart', 'alemi' => 'codalm', 'codcentro' => 'codcen')),
			//'alkardex_alreserva'=>array(self::BELONGS_TO, 'Almacendocs', 'hidvale'),


		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codart' => 'Codart',
			'codmov' => 'Codmov',
			'cant' => 'Cant',
			'alemi' => 'Alemi',
			'aldes' => 'Aldes',
			'fecha' => 'Fecha',
			'coddoc' => 'Coddoc',
			'numdoc' => 'Numdoc',
			'usuario' => 'Usuario',
			'creadopor' => 'Creadopor',
			'creadoel' => 'Creadoel',
			'modificadopor' => 'Modificadopor',
			'modificadoel' => 'Modificadoel',
			'um' => 'Um',
			'comentario' => 'Comentario',
			'codocuref' => 'Codocuref',
			'numdocref' => 'Numdocref',
			'codcentro' => 'Codcentro',
			'id' => 'ID',
			'codestado' => 'Codestado',
			'prefijo' => 'Prefijo',
			'fechadoc' => 'Fechadoc',
			'correlativo' => 'Correlativo',
			'numkardex' => 'Numkardex',
			'solicitante' => 'Solicitante',
			'hidvale' => 'Hidvale',
		);
	}


	public function Clonaregistro()
	{
		if (!$this->isNewRecord) {
			$nuevoregistro = New Alkardex();
			$nuevoregistro->attributes = $this->attributes;
			Return $nuevoregistro;
		} ELSE {
			RETURN NULL;
		}

	}


	public function Actualizainventarioporcompras($codmovimiento = null)
	{
		//veriifcamos que es un valor promedio según la configruiacion
		// del material "precio variable"
		//$modelo=$this->loadModel($idinventario);
		//verificnado si la uinida de medida es la unidad de medida base

		// $this=
		//cargando el invietario
		$modeloinventario = Alinventario::model()->findByPk($this->alkardex_alinventario->id);
		if ($modeloinventario === null)
			throw new CHttpException(404, 'No se pudo cargar el inventario con la llave:' . $this->alkardex_alinventario->id . '- ' . $this->codart . '-' . $this->alemi . '-' . $this->codcentro);
		$cantidadmovida = $this->cant; ///siempre estara en unidad de medida base
		//$cantidadactual=$modeloinventario->cantlibre;

		$modeloinventario->setscenario('modificacantidad');
		$nuevoprecio = ($this->preciounit * $cantidadmovida + $modeloinventario->punit * ($modeloinventario->cantlibre + $modeloinventario->cantres + $modeloinventario->canttran)) / ($cantidadmovida + $modeloinventario->cantlibre + $modeloinventario->cantres + $modeloinventario->canttran);
		$modeloinventario->punit = round($nuevoprecio, 2);
		$modeloinventario->cantlibre = $modeloinventario->cantlibre + $cantidadmovida;

		return ($modeloinventario->save()) ? 1 : 0;


	}

	public function FrecuenciaMaterial($codmov, $codart, $fecha1 = null, $fecha2 = null)
	{
		if (!is_null($fecha1))
			$fecha1 = Yii::app()->db->createCommand(" SELECT min(fechadoc) from public_alkardex ")->queryScalar();
		if (!is_null($fecha2))
			$fecha2 = date("Y-m-d H:i:s") . "";

		$fecha1 = $fecha1 . "";
		$fecha2 = $fecha2 . "";

		///Calculando los dias entre fechas
		$diaspasados = (strtotime($fecha2) - strtotime($fecha1)) / (3600 * 24);

		//calculando el comsumo
		$consumo = Yii::app()->db->createCommand(" SELECT sum(cant) from public_alkardex where codestado <> '99' and codart= '" . $codart . "' and (fechadoc < '" . $fecha2 . "' and fechadoc > '" . $fecha1 . "' ) and codmov='" . $codmov . "' ")->queryScalar();

		if (is_null($consumo))
			$consumo = 0;

		if ($diaspasados == 0 or is_null($diaspasados)) {
			return 0;

		} else {
			return $consumo / $diaspasados;

		}


	}


	public function Actualizaprecioinventario($codmovimiento = null)
	{
		//veriifcamos que es un valor promedio según la configruiacion
		// del material "precio variable"
		//$modelo=$this->loadModel($idinventario);
		//verificnado si la uinida de medida es la unidad de medida base

		// $this=
		//cargando el invietario
		$modeloinventario = Alinventario::model()->findByPk($this->alkardex_alinventario->id);

		$cantidadmovida = $this->cant * Alconversiones::model()->convierte($this->codart, $this->um); ///
		//$cantidadactual=$modeloinventario->cantlibre;
		if ($cantidadmovida + $modeloinventario->cantlibre < 0) {
			return 0; //Se intento mover materiales que  ya noestan en stock
		} else {
			$modeloinventario->setscenario('modificacantidad');
			$nuevoprecio = ($this->preciounit * $cantidadmovida + $modeloinventario->punit * ($modeloinventario->cantlibre + $modeloinventario->cantres + $modeloinventario->canttran)) / ($cantidadmovida + $modeloinventario->cantlibre + $modeloinventario->cantres + $modeloinventario->canttran);
			$modeloinventario->punit = round($nuevoprecio, 2);
			$modeloinventario->cantlibre = $modeloinventario->cantlibre + $cantidadmovida;

			return ($modeloinventario->save()) ? 1 : 0;
		}

	}

	/**
	 * @param null $codmovimiento
     */
	public function Actualizacantidadinventario($codmovimiento = null)
	{

		$mensajero = "";
		$modeloinventario = Alinventario::model()->findByPk($this->alkardex_alinventario->id);
		if (is_null($modeloinventario)) {
			$mensajero = $mensajero . " No se encontro el registro de inventario relacionado  al kardex " . $this->numkardex . "(" . $this->id . ") <br>";
		} else {
			$resultado = $modeloinventario->actualizar($this->codmov, $this->cant, $this->um);
			if (strlen($resultado) > 0) {  //hubo error
				$mensajero = $mensajero . " No se pudo actualizar el inventario " . $resultado . "<br>";

			}
		}

		/*$cantidadmovida=$this->cant*Alconversiones::model()->convierte($this->codart,$this->um); ///
		//$cantidadactual=$modeloinventario->cantlibre;
		echo "cantidad kardex".$this->cant."\n";
		echo "coversion ".Alconversiones::model()->convierte($this->codart,$this->um)."\n";
		echo "canti movida".$cantidadmovida."\n";
		echo "canti lubre  ".$modeloinventario->cantlibre."\n";

		if ($cantidadmovida + $modeloinventario->cantlibre <0 ) {
			return 0; //Se intento mover materiales que  ya noestan en stock
		}else {
			$modeloinventario->cantlibre=$modeloinventario->cantlibre+$cantidadmovida;

			if($modeloinventario->save()) {
				echo " grab o   ".$modeloinventario->save();
			} else   {
				echo " no grabo    ".$modeloinventario->save();
			}
			yii::app()->end();
		}
                */
	}

	public function Actualizareservainventario($codmovimiento = null)
	{
		$modeloinventario = Alinventario::model()->findByPk($this->alkardex_alinventario->id);

		$modeloinventario->setscenario('modificacantidad');
		$modeloinventario->cantres = $modeloinventario->cantres + $this->cant * Alconversiones::model()->convierte($this->codart, $this->um); ///;
		return ($modeloinventario->save()) ? 1 : 0;


	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('codart', $this->codart, true);
		$criteria->compare('codmov', $this->codmov, true);
		$criteria->compare('cant', $this->cant);
		$criteria->compare('alemi', $this->alemi, true);
		$criteria->compare('aldes', $this->aldes, true);
		$criteria->compare('fecha', $this->fecha, true);
		$criteria->compare('coddoc', $this->coddoc, true);
		$criteria->compare('numdoc', $this->numdoc, true);
		$criteria->compare('usuario', $this->usuario, true);

		$criteria->compare('um', $this->um, true);
		$criteria->compare('comentario', $this->comentario, true);
		$criteria->compare('codocuref', $this->codocuref, true);
		$criteria->compare('numdocref', $this->numdocref, true);
		$criteria->compare('codcentro', $this->codcentro, true);
		$criteria->compare('id', $this->id);
		$criteria->compare('codestado', $this->codestado, true);
		$criteria->compare('prefijo', $this->prefijo, true);
		$criteria->compare('fechadoc', $this->fechadoc, true);
		$criteria->compare('correlativo', $this->correlativo, true);
		$criteria->compare('numkardex', $this->numkardex, true);
		$criteria->compare('solicitante', $this->solicitante, true);
		$criteria->compare('hidvale', $this->hidvale, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search_por_vale($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;


		$criteria->addCondition('hidvale=' . $id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}


	public function clonakardex($movimiento,$cant,$hidvale=null,$codocuref=NULL,$numdocref=null,$idref=null)
	{
           $valor=  $this->esatencionRQ();
		if($valor > 0)
		{
		$signo=Almacenmovimientos::model()->findByPk($movimiento)->signo+0;



			///aqui tenemos que insertar otro KARDEX PARA LA SALIDA ATENDIENDO LA RESERVA TIPO 800
			$nuevokardex=New Alkardex();
			$nuevokardex->SetAttributes(
				array(
					'codart'=>$this->codart,
					'codmov'=>$movimiento,
					'cant'=>$signo*abs($cant), //obenener le signo correcto
					'alemi'=>$this->alemi,
					'fecha'=>$this->fecha,
					'coddoc'=>$this->coddoc,
					'numdoc'=>$this->numdoc,
					'um'=>$this->um,
					'codocuref'=>'340',
					'numdocref'=>Alreserva::model()->findByPk($valor)->desolpe->desolpe_solpe->numero,
					'codcentro'=>$this->codcentro,
					'hidvale'=>$hidvale,
					'fechadoc'=>$this->fechadoc,
					'idref'=>Alreserva::model()->findByPk($valor)->desolpe->id,
					'lote'=>$this->lote,
					'preciounit'=>$this->preciounit,
					'codmoneda'=>$this->codmoneda,

				)
			);
		//$nuevokardex->save();
		if(!$nuevokardex->save()){
			//echo yii::app()->mensajes->getErroresItem($nuevokardex->geterrors());die();
			MiFactoria::Mensaje('error',yii::app()->mensajes->getErroresItem($nuevokardex->geterrors()));
		}

	}else {
			MiFactoria::Mensaje('error','Esta intentado clonar un Kardex que dentro de un movimieto que no es TENCION DE RQ');
		}
	}


	/*FUNCIONQ UE PERMITE EVALUAR SI EL VALE DE INGRESO DE COMPRA DE UN KARDEX ES UNA VALE
        QUE HACE REFERENCIA A OTRO VALE DE ATENCION RQ
         O RQU*/
	public function esvaleRQ(){
		$idvalereferenciado=Almacendocs::valepornumero($this->alkardex_almacendocs->numdocref)->id;
		$idvale=Almacendocs::model()->find("idref=:vref",array(":vref"=>$idvalereferenciado));
		return (!is_null($idvale))?true:false;
	}

	private function identidada(){
		return '[ Objeto :'.__CLASS__.'] [ Funcion :'.__FUNCTION__.']  [ Linea :  '.__LINE__.']      Material : '.$this->codart.'- Almacen : '.$this->alemi.'  ';
	}

 public function insertaatencionconsignacion(){
     $model=New Atencionconsignaciones();
     $model->setAttributes(
             array(
                 'hidkardex'=>$this->id,
                  'hidconsi'=>$this->idref,     
                 'cant'=>$this->cant,
             )
             );
            $model->save();                
          }


    /*Esta fucniona ctualiza los precios de los materiales 
         * en la tabla maestroclipro segun cada OC atendida 
         * ColocAL EL ULTIMO PRECIO 
         */
        public  function actualizapreciosclipro(){
            $regdetallecompra= Docompra::model()->findByPk($this->idref);
            if(!is_null( $regdetallecompra)){
                $existe= Maestroclipro::model()->
                        findByAttributes(array(
                            'codart'=>$this->codart,
                            'codpro'=>$regdetallecompra->ocompra->codpro,
                             'centro'=>$this->codcentro,
                        ));
                if(!is_null($existe)){
                    if(is_array($existe)){
                        $model=$existe[0];
                    }else{
                        $model=$existe;
                    }
                        unset($existe);
                         $model->setAttributes(array(                    
                    'precio'=>$regdetallecompra->punit,                    
                    'um'=>$regdetallecompra->um,
                ));
                }else{
                    $model=New Maestroclipro();
                     $model->setAttributes(array(
                    'codart'=>$this->codart,
                    'codpro'=>$regdetallecompra->ocompra->codpro,
                    'codmon'=>$regdetallecompra->ocompra->moneda,
                    'precio'=>$regdetallecompra->punit,
                    'centro'=>$this->codcentro,
                    'um'=>$regdetallecompra->um,
                ));
                }
                
               
                $model->save();
                  
                
                unset($regdetallecompra);
            }
            
            
        } 
        
        
        //esta funcion verifica si existe un registro maestro 
        // de kardex para poder cumplir con la regla de normalizacion
        // ena laltabla de CCGASTOS , esto apra el caso de gastos de caja chica 
        // que no tienen movim,ietnos de kardex formales.
        ///por esto se ccrea un registro oculto de KARDEX para cumplir la nirmlizacion
    
     public function existeregistromaestrocajachica()   {
         
     }  
}