<?php
class Almacendocs extends ModeloGeneral
{
	CONST ESTADO_EFECTUADO='20';
        CONST ESTADO_OC_PREVIO='99';
        CONST CODIGO_MOVIMIENTO_ANULA_SALIDA_AUTOMATICA_RQ='12';
        CONST CODIGO_MOVIMIENTO_SALIDA_AUTOMATICA_RQ='11';
CONST ESTADO_OC_MODIFICADA='20';
CONST ESTADO_OC_CREADA='10';
CONST ESTADO_OC_ANULADA='50';
CONST ESTADO_OC_APROBADA='30';
CONST ESTADO_OC_FACTURADA='40';
const ESTADO_VALE_CREADO='20';
CONST CODIGO_MOVIMIENTO_INGRESO_ACTIVIDAD='68';
CONST CODIGO_MOVIMIENTO_ANULAR_INGRESO_ACTIVIDAD='86';
CONST CODIGO_MOVIMIENTO_INICIA_TRASPASO='77';
CONST CODIGO_MOVIMIENTO_AJUSTE_FALTANTES='67';
CONST CODIGO_MOVIMIENTO_ANULA_AJUSTE_FALTANTES='18';
CONST CODIGO_MOVIMIENTO_AJUSTE_SOBRANTES='75';
CONST CODIGO_MOVIMIENTO_ANULA_AJUSTE_SOBRANTES='19';
    public  $identificadorpost;
	public $fechavale1;
	public $fechacre1;
	public $fechacont1;
	const PREFIJO_ESCENARIO='Escenario_'; //7EL prefijo para nombrar a los escenarios de los modelos
	private $escenariosmov=array(); ///El arrayq ei guarada los esenarios con los movoismientpos n

	private function loadArrayScenarios() {
		$this->escenariosmov=array(); //limpiamops
		$movs=MiFactoria::DevuelveAlmacenMovimientos();
		foreach( $movs as $row )		{
			$this->escenariosmov[$row->codmov]=self::PREFIJO_ESCENARIO.$row->codmovimiento;
			//array_push($this->escenariosmov,array($row->codmov=>self::PREFIJO_ESCENARIO.$row->codmov));
										}
		unset($movs);
		return $this->escenariosmov;
	                                 }

	public function setEscenarioMov() {
		if(!is_null($this->codmovimiento));
			$this->escenariosmov[$this->codmovimiento]=self::PREFIJO_ESCENARIO.$this->codmovimiento;
									}

	public function getEscenarioMov(){
		return $this->escenariosmov[$this->codmovimiento];
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yii::app()->params['prefijo'].'almacendocs';
	}


	public function Devuelvehijos($id) {
		$this->almacendocs_alkardex;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codcentro','checkcentroalmacen'), ////TODOS LOS ESCENARIOS
			//array('fechacont', 'checkfechacont'),///todos los escenarios
			array('codalmacen', 'checkmovper'),///todos los escenarios


			/****************ESCENARIO SALIDA PARA ORDEN DE SERVICIO*******
			/*********************************************/
			array('numdocref', 'required', 'message'=>'El numero de Os es obligatorio','on'=>self::PREFIJO_ESCENARIO.'43'),
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'43'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'43'),
			array('fechacont', 'chkfechasol', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'43'),
			array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'43'),
			//array('numdocref', 'checksolpe','on'=>self::PREFIJO_ESCENARIO.'43'),
			array('numdocref', 'checkot','on'=>self::PREFIJO_ESCENARIO.'43'),
			array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'43'),
			array('fechavale, fechacont,numero, fechacre,codalmacen,codcentro', 'safe','on'=>self::PREFIJO_ESCENARIO.'43'),
			/*********************************************/



			array('codmovimiento', 'required', 'message'=>'El tipo de movimiento es indispensable'),
			array('fechacont', 'required', 'message'=>'La fecha de contabilizacion es obligatoria'),
			array('fechacont', 'checkfechacont', 'message'=>'La fecha de contabilizacion es obligatoria'),
			//array('fechacont','checkcentroalmacen'),
			array('codalmacen','chkalmacen'),
			array('codcentro','required', 'message'=>'Indique elcentro'),

			//array('creadopor, modificadopor, creadoel, modificadoel', 'length', 'max'=>25),
			array('codmovimiento, codtipovale, cestadovale', 'length', 'max'=>2),
			//array('fechavale', 'required', 'message'=>'La fecha es obligatoria'),
			//array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion'),
			
			
			array('numvale', 'length', 'max'=>12),
			array('codtrabajador, codcentro', 'length', 'max'=>4),
			array('codalmacen, codocu, posic, codocuref', 'length', 'max'=>3),
			array('correlativo', 'length', 'max'=>8),
			array('numdocref', 'length', 'max'=>15),
			array('fechavale, fechacont,numero, fechacre', 'safe'),




			/****************ESCENARIO SALIDA RESERVA*******
			/*********************************************/
			array('numdocref', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'10'),
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'10'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'10'),
			array('fechacont', 'chkfechasol', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'10'),
			array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'10'),
			array('numdocref', 'checksolpe','on'=>self::PREFIJO_ESCENARIO.'10'),
			array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'10'),
			array('fechavale, fechacont,numero, fechacre,codalmacen,codcentro', 'safe','on'=>self::PREFIJO_ESCENARIO.'10'),
			/*********************************************/
			/****************ESCENARIO cambio de  nESTADO*******
			/*********************************************/

			array('cestadovale', 'safe','on'=>'cambioestado'),

			/*********************************************/
			/****************ESCENARIO anulaSALIDARESERVA*******
			/*********************************************/
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'20'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'20'),
			array('numdocref', 'required', 'message'=>'Indique El número de Vale a Anular','on'=>self::PREFIJO_ESCENARIO.'20'),
			array('numdocref', 'checkvaleaanular','on'=>self::PREFIJO_ESCENARIO.'20'),
			array('fechavale, fechacont,numero,numdocref,idref, fechacre,codalmacen,codcentro,', 'safe','on'=>self::PREFIJO_ESCENARIO.'20'),
			/*********************************************/

			/*********************************************/
			/****************ESCENARIO anulaSALIDARESERVA*******
			/*********************************************/
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'81'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'81'),
			array('numdocref', 'required', 'message'=>'Indique El número de Vale a Anular','on'=>self::PREFIJO_ESCENARIO.'81'),
			array('numdocref', 'checkvaleaanular','on'=>self::PREFIJO_ESCENARIO.'81'),
			array('fechavale, fechacont,numero,numdocref,idref, fechacre,codalmacen,codcentro,', 'safe','on'=>self::PREFIJO_ESCENARIO.'81'),
			/*********************************************/

			/****************ESCENARIO INGRESO POR COMRPA*******
			/*********************************************/
			//array('codmovimiento', 'required', 'message'=>'Ingresa el movimiento','on'=>self::PREFIJO_ESCENARIO.'30'),
			//array('codtipovale', 'required', 'message'=>'Indica el tipo de Mov.','on'=>self::PREFIJO_ESCENARIO.'30'),
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'30'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'30'),
			array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'30'),
			array('numdocref', 'checkcompra','on'=>self::PREFIJO_ESCENARIO.'30'),
			array('fechacont', 'chkfechacompra','on'=>self::PREFIJO_ESCENARIO.'30'),
			array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'30'),
			array('fechavale, fechacont,numero, fechacre,codalmacen,codcentro', 'safe','on'=>self::PREFIJO_ESCENARIO.'30'),
			/*********************************************/
				
				
				/****************ESCENARIO ANULA INGRESO COMPRA*******
			/*********************************************/
			//array('codmovimiento', 'required', 'message'=>'Ingresa el movimiento','on'=>self::PREFIJO_ESCENARIO.'40'),
			//array('codtipovale', 'required', 'message'=>'Indica el tipo de Mov.','on'=>self::PREFIJO_ESCENARIO.'40'),
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'40'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'40'),
			//array('fechacont', 'checkfecha','on'=>self::PREFIJO_ESCENARIO.'40'),
			//array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'40'),
			//array('numdocref', 'required', 'message'=>'Indica el numero de Vale que se va anular','on'=>self::PREFIJO_ESCENARIO.'40'),
			array('numdocref', 'checkvaleaanular','on'=>self::PREFIJO_ESCENARIO.'40'),

			array('numdocref', 'checkvaleingreso','on'=>self::PREFIJO_ESCENARIO.'40'),
			array('numdocref', 'checkfacturacion','on'=>self::PREFIJO_ESCENARIO.'40'),
			array('fechavale, fechacont,numero,numdocref,idref, fechacre,codalmacen,codcentro,', 'safe','on'=>self::PREFIJO_ESCENARIO.'40'),
			/*********************************************/

			/****************ESCENARIO INGRESO  CONSIGNACION *******
			/*********************************************/
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'13'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'13'),
			array('numdocref', 'checkcompra','on'=>self::PREFIJO_ESCENARIO.'13'),
			array('fechacont', 'chkfechacompra','on'=>self::PREFIJO_ESCENARIO.'13'),
			array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'30'),
			//array('numdocref', 'checkvaleingreso','on'=>self::PREFIJO_ESCENARIO.'13'),
		//	array('numdocref', 'checkfacturacion','on'=>self::PREFIJO_ESCENARIO.'13'),
			array('fechavale, fechacont,numero,numdocref,idref, fechacre,codalmacen,codcentro,', 'safe','on'=>self::PREFIJO_ESCENARIO.'13'),
			/*********************************************/


			/****************ESCENARIO REINGRESA *******
			/*********************************************/
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'70'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'70'),
			array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'70'),
			array('codalmacen', 'checkcentros','on'=>self::PREFIJO_ESCENARIO.'70'),
			array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'70'),
			array('numdocref', 'required','message'=>'Indique el numero de Vale','on'=>self::PREFIJO_ESCENARIO.'70'),
			array('numdocref', 'checkvalereingreso','on'=>self::PREFIJO_ESCENARIO.'70'),
			array('fechavale, fechacont,numero, fechacre,codalmacen,codcentro', 'safe','on'=>self::PREFIJO_ESCENARIO.'70'),
			/*********************************************/



            /****************ESCENARIO INGRESOCOMPRA*******
            /*********************************************/
            //array('codmovimiento', 'required', 'message'=>'Ingresa el movimiento','on'=>self::PREFIJO_ESCENARIO.'30'),
            //array('codtipovale', 'required', 'message'=>'Indica el tipo de Mov.','on'=>self::PREFIJO_ESCENARIO.'30'),
            array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'30'),
            array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'30'),
            array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'30'),
            array('codalmacen', 'checkcentros','on'=>self::PREFIJO_ESCENARIO.'30'),
            array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'30'),
            array('fechavale, fechacont,numero, fechacre,codalmacen,codcentro', 'safe','on'=>self::PREFIJO_ESCENARIO.'30'),
            array('numdocref','validacompra','on'=>self::PREFIJO_ESCENARIO.'30'),




			/****************ESCENARIO INGRESOCOMPRASERVICIOS*******
			/*********************************************/

			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'68'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'68'),
			//array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'68'),
			//array('codalmacen', 'checkcentros','on'=>self::PREFIJO_ESCENARIO.'68'),
			array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'68'),
			array('numdocref', 'required', 'message'=>'Indique la Orden de Compra','on'=>self::PREFIJO_ESCENARIO.'68'),
			array('numdocref', 'checkcompra', 'on'=>self::PREFIJO_ESCENARIO.'68'),
			array('fechavale, fechacont,numero,numdocref, fechacre,codalmacen,codcentro', 'safe','on'=>self::PREFIJO_ESCENARIO.'68'),
			array('numdocref','validacompra','on'=>self::PREFIJO_ESCENARIO.'68'),
			//array(' fechacont', 'verificafechaservicios','on'=>self::PREFIJO_ESCENARIO.'68'),
			array('numdocref','validaservicio','on'=>self::PREFIJO_ESCENARIO.'68'),


			/****************ESCENARIO ANULA_INGRESOCOMPRASERVICIOS*******
			 * 1) La fecha de contabilizacion no debe exceder a la tolerancia del periodo
			 * 2) El status del vale original debe de ser efectuado  no hay otro status valido
			 * 3) La fecha del vale a anular debe de ser posteriro o igual al vale original
			 * 4) El vale debe de ser un vale de INGRESO DE SERVICIOS *
			/*********************************************/

			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'86'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'86'),
			//array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'68'),
			//array('codalmacen', 'checkcentros','on'=>self::PREFIJO_ESCENARIO.'68'),
			array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'86'),
			//array('numdocref', 'required', 'message'=>'Indique la Orden de Compra','on'=>self::PREFIJO_ESCENARIO.'68'),
			array('fechavale, fechacont,numero,numdocref, fechacre,codalmacen,codcentro', 'safe','on'=>self::PREFIJO_ESCENARIO.'86'),
			//array('numdocref','validacompra','on'=>self::PREFIJO_ESCENARIO.'68'),
			array(' fechacont', 'verificafechaservicios','on'=>self::PREFIJO_ESCENARIO.'86'),



			/****************ESCENARIO TRASPASO*******
			/*********************************************/
			//array('codmovimiento', 'required', 'message'=>'Ingresa el movimiento','on'=>self::PREFIJO_ESCENARIO.'77'),
			//array('codtipovale', 'required', 'message'=>'Indica el tipo de Mov.','on'=>self::PREFIJO_ESCENARIO.'77'),
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'77'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'77'),
			array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'77'),
			array('codalmacen', 'checkcentros','on'=>self::PREFIJO_ESCENARIO.'77'),
			array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'77'),
			array('codaldestino', 'required', 'message'=>'Indique el almacen destino','on'=>self::PREFIJO_ESCENARIO.'77'),
			//array('codaldestino', 'checkcentros','on'=>self::PREFIJO_ESCENARIO.'77'),
			array('codcendestino', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'77'),
			array('fechavale, fechacont,numero, fechacre,codalmacen,codcentro,codcendestino,codaldestino', 'safe','on'=>self::PREFIJO_ESCENARIO.'77'),
			//array('numcot','validacompra','on'=>'ingresacompra'),

			/****************ESCENARIO INGRESA TRASPASO*******
			/*********************************************/
			//array('codmovimiento', 'required', 'message'=>'Ingresa el movimiento','on'=>self::PREFIJO_ESCENARIO.'77'),
			//array('codtipovale', 'required', 'message'=>'Indica el tipo de Mov.','on'=>self::PREFIJO_ESCENARIO.'77'),
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'78'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'78'),
			array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'78'),
			array('codalmacen', 'checkcentros','on'=>self::PREFIJO_ESCENARIO.'78'),
			array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'78'),
			array('numdocref', 'required', 'message'=>'Indique el vale emisor','on'=>self::PREFIJO_ESCENARIO.'78'),
			array('numdocref', 'chkvaletraspasa', 'message'=>'Indique el vale emisor','on'=>self::PREFIJO_ESCENARIO.'78'),
			//array('numdocref', 'checkvaletraspaso', 'on'=>self::PREFIJO_ESCENARIO.'78'),
			//array('codaldestino', 'required', 'message'=>'Indique el almacen destino','on'=>self::PREFIJO_ESCENARIO.'78'),
			//array('codaldestino', 'checkcentros','on'=>self::PREFIJO_ESCENARIO.'77'),
			//array('codcendestino', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'77'),
			array('fechavale, fechacont,numero, fechacre,codalmacen,codcentro,numdocref', 'safe','on'=>self::PREFIJO_ESCENARIO.'78'),
			//array('numcot','validacompra','on'=>'ingresacompra'),


			/****************ESCENARIO SALIDA PARA VENTA*******
			/*********************************************/
			//array('numdocref', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'79'),
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'79'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'79'),
			array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'79'),
			//array('numdocref', 'checksolpeventa','on'=>self::PREFIJO_ESCENARIO.'79'),
			array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'79'),
			array('fechavale, fechacont,numero, fechacre,codalmacen,codcentro', 'safe','on'=>self::PREFIJO_ESCENARIO.'79'),




			/****************ESCENARIO INGRESOSERVICIOS*******
			/*********************************************/
			//array('codmovimiento', 'required', 'message'=>'Ingresa el movimiento','on'=>self::PREFIJO_ESCENARIO.'80'),
			//array('codtipovale', 'required', 'message'=>'Indica el tipo de Mov.','on'=>self::PREFIJO_ESCENARIO.'80'),
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'80'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'80'),
			array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'80'),
			array('codalmacen', 'checkcentros','on'=>self::PREFIJO_ESCENARIO.'80'),
			array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'80'),
			array('fechavale, fechacont,numero, fechacre,codalmacen,codcentro', 'safe','on'=>self::PREFIJO_ESCENARIO.'80'),
			array('numdocref','validaservicio','on'=>self::PREFIJO_ESCENARIO.'80'),


			/****************ESCENARIO clonar*******
			/*********************************************/
			array('fechavale,codmovimiento,codalmacen,codcentro,codocu,
			fechacont,fechacre,numdocref,cestadovale,idref','safe','on'=>'clonar'),






			/****************ESCENARIO CARGAINICIAL*******
			/*********************************************/
			//array('codmovimiento', 'required', 'message'=>'Ingresa el movimiento','on'=>self::PREFIJO_ESCENARIO.'89'),
			//array('codtipovale', 'required', 'message'=>'Indica el tipo de Mov.','on'=>self::PREFIJO_ESCENARIO.'89'),
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'98'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'98'),
			array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'98'),
			array('codalmacen', 'checkcentros','on'=>self::PREFIJO_ESCENARIO.'98'),
			array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'98'),
			array('fechavale, fechacont,numero, fechacre,codalmacen,codcentro', 'safe','on'=>self::PREFIJO_ESCENARIO.'98'),
			/*********************************************/

			/****************ESCENARIO ANULA CARGAINICIAL*******
			/*********************************************/
			//array('codmovimiento', 'required', 'message'=>'Ingresa el movimiento','on'=>self::PREFIJO_ESCENARIO.'89'),
			//array('codtipovale', 'required', 'message'=>'Indica el tipo de Mov.','on'=>self::PREFIJO_ESCENARIO.'89'),
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'89'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'89'),
			array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'89'),
			array('codalmacen', 'checkcentros','on'=>self::PREFIJO_ESCENARIO.'89'),
			array('numdocref', 'required', 'message'=>'Indique El número de Vale a Anular','on'=>self::PREFIJO_ESCENARIO.'89'),
			array('numdocref', 'checkvaleaanular','on'=>self::PREFIJO_ESCENARIO.'89'),
			array('codcentro', 'required', 'message'=>'Indique el centro','on'=>self::PREFIJO_ESCENARIO.'89'),
			array('fechavale, fechacont,numero, fechacre,codalmacen,codcentro', 'safe','on'=>self::PREFIJO_ESCENARIO.'89'),
			/*********************************************/





			//array('fechacont', 'checkfecha','on'=>self::PREFIJO_ESCENARIO.'77'),
			//array('codalmacen', 'required', 'message'=>'Indique el almacen','on'=>self::PREFIJO_ESCENARIO.'77'),
			//array('numdocref', 'required', 'message'=>'Indica el numero de Vale que se va anular','on'=>self::PREFIJO_ESCENARIO.'77'),
			//array('numdocref', 'checkvaleaanular','on'=>self::PREFIJO_ESCENARIO.'77'),
			//array('fechavale, fechacont,numero,codmovimiento, numdocref,idref, fechacre,codalmacen,codcentro,', 'safe','on'=>self::PREFIJO_ESCENARIO.'77'),
			/*********************************************/


			/****************ESCENARIO SALIDA CECO*******
			/*********************************************/
			//array('codmovimiento', 'required', 'message'=>'Ingresa el movimiento','on'=>'cargainicial'),
			//array('codtipovale', 'required', 'message'=>'Indica el tipo de Mov.','on'=>'cargainicial'),
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'50'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'50'),
			array('codtrabajador', 'required', 'message'=>'La persona responsable de la recepcion es un dato obligatorio','on'=>self::PREFIJO_ESCENARIO.'50'),
			//array('numdocref', 'required', 'message'=>'Debes de llenar el colector','on'=>self::PREFIJO_ESCENARIO.'50'),
			//array('numdocref', 'checkceco', 'message'=>'El colector no es valido','on'=>self::PREFIJO_ESCENARIO.'50'),
			array('fechavale, fechacont,numero,codmovimiento, idref,ceco, codtrabajador,numdocref, fechacre,codalmacen,codcentro,', 'safe','on'=>self::PREFIJO_ESCENARIO.'50'),


			/****************ESCENARIO SALIDA ANULA CECO*******
			/*********************************************/
			//array('codmovimiento', 'required', 'message'=>'Ingresa el movimiento','on'=>'cargainicial'),
			//array('codtipovale', 'required', 'message'=>'Indica el tipo de Mov.','on'=>'cargainicial'),
			array('fechavale', 'required', 'message'=>'La fecha es obligatoria','on'=>self::PREFIJO_ESCENARIO.'60'),
			array('fechacont', 'required', 'message'=>'Indique la fecha contabilizacion','on'=>self::PREFIJO_ESCENARIO.'60'),
			//array('codtrabajador', 'required', 'message'=>'La persona responsable de la recepcion es un dato obligatorio','on'=>self::PREFIJO_ESCENARIO.'60'),
			array('numdocref', 'required', 'message'=>'Debes de llenar el vale a anular','on'=>self::PREFIJO_ESCENARIO.'60'),
			//array('numdocref', 'checkceco', 'message'=>'El colector no es valido','on'=>self::PREFIJO_ESCENARIO.'50'),
			array('fechavale, fechacont,numero,codmovimiento, idref,numdocref, fechacre,codalmacen,codcentro,', 'safe','on'=>self::PREFIJO_ESCENARIO.'60'),









			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fechavale,fechavale1,fechacont,fechacont1, fechacre,fechacre1,  codmovimiento, numvale, codtipovale, codtrabajador, codalmacen, codcentro, cestadovale, correlativo, codocu, numdocref, posic, codocuref', 'safe', 'on'=>'search'),
		);
	}

	public function chkvaletraspasa(){
		$valeref=$this->existevaleref();
		//var_dump($valeref);yii::app()->end();
		if(!is_null($valeref)){
			if($valeref->codmovimiento==CODIGO_MOVIMIENTO_INICIA_TRASPASO)
			{
				if($valeref->codaldestino==$this->codalmacen){

				}else{
					$this->adderror('numdocref','El vale referenciado no corresponde como destino  a este almacen');
				}

			}ELSE{
				$this->adderror('numdocref','El vale referenciado no corresponde a la operacion de traslado '.$valeref->codmovimiento.' <> '.CODIGO_MOVIMIENTO_INICIA_TRASPASO);
			}
		}else{
			$this->adderror('numdocref','No existe el vale referenciado');
		}
	}



    public function validacompra($attribute,$params) {
        $ordencompra=Ocompra::model()->findAll("numcot=:voi",array(":voi"=>trim($this->numdocref)));
       /* var_dump($ordencompra);
        yii::app()->end();*/
          if(count($ordencompra)==0)
             {  $this->adderror('numdocref','Esta orden de compra no existe');} else {
               if(IN_ARRAY($ordencompra[0]->codestado , ARRAY(ESTADO_OC_CREADA,ESTADO_OC_PREVIO,ESTADO_OC_MODIFICADA, ESTADO_OC_ANULADA)))
                  $this->adderror('numdocref','La Orden de Compra no tiene el status adecuado ');
             }
            //verificando el estado
               //$ordencompra->codestado
    }

	public function checkcentroalmacen($attribute,$params) {
		if(!MiFactoria::Validacentro($this->codcentro,$this->codalmacen)){
			if($this->codmovimiento=='68') //si es un servicio{
			{
				$this->codalmacen=$this->codcentro->almacenes[0]->codalm;
			}else{

				$this->adderror('codcentro','Verificar el centro ['.$this->codcentro .'] y el almacen  ['.$this->codalmacen .'] no son consistentes');
			}

		}

		if($this->almacenes->bloqueado=='1' and !in_array($this->codmovimiento,array('67','75','18','19','68','86')) )
			$this->adderror('codalmacen','En este almacen el inventario se encuentra bloqueado por conteo, no puede efectuar movimientos de materiales');

		//verificando el estado
		//$ordencompra->codestado
	}

	public function validaservicio($attribute,$params) {
		$ordencompra=Ocompra::model()->find("numcot=:nimi",array("nimi"=>trim($this->numdocref)));
		if($ordencompra===null)
			$this->adderror('numdocref','Esta orden de compra no existe');
		//verificando quie sea una OC de servicio
		//VAR_DUMP($ordencompra->tipologia);DIE();
		if(!$ordencompra->tipologia=='W')
			$this->adderror('numdocref','Esta orden de compra no es de servicios '.$ordencompra->tipologia.' *');


	}



	public function checkceco($attribute,$params) {
		//Verfiicando que exista primero
		$registro=Cc::model()->find("codc=:nimi",array("nimi"=>trim($this->numdocref)));
		if(is_null($registro)) {
			$this->adderror('ceco','Este colector no existe '.$this->numdocref.'-'.count($registro));
		}else{
			if( !$registro->clase->codclasecolector=='90')
				$this->adderror('ceco','Este colector : '.$registro->clase->codclasecolectorno.'  es de gastos');
			if( !$registro->verificafecha($this->fechacont))
			  $this->adderror('ceco','Este colector no es valido para la fecha indicada');
			if( !$registro->verificaesposible())
				$this->adderror('ceco','Este colector ya  no permite imputacion, consulte con el Admimistador');
			if( !$registro->verificacentro($this->codcentro))
			$this->adderror('ceco','Este colector no es de este centro');


		}
	}

private function existevaleref() {
	return 	Almacendocs::model()->findAll("numvale=:nimi",array("nimi"=>trim($this->numdocref)))[0];
}
	/* Devuel si el vale ya aha iso anulado */

	/*private function esunvaleanulado() {
		$valeaanular=Almacendocs::model()->find("numvale=:nimi",array("nimi"=>trim($this->numdocref)));
		if(is_null($valeaanular))
		throw new CHttpException(500,__CLASS__.'=>'.__FUNCTION__.'     -Se ha tomado un movimiento que no es valido '.$opcionmovimiento);

	}*/



	public function checkmovper($attribute,$params)
	{
		//&ECHO "DIE";DIE();
		if(!(strtolower($this->getScenario())=='clonar')){
			if(!Almacenes::puedemover($this->codmovimiento,$this->codalmacen)){
				$this->adderror('codal','Este movimiento no esta permitido en este almacen');
			}

		}

	}

public function checkvaleaanular($attribute,$params) {
	  //Verfiicando que exista primero 
		if(is_null($this->existevaleref())) {
		    $this->adderror('numdocref','Este vale no existe '.$this->numdocref.'-');
			}else{

			$valeaanular=Almacendocs::model()->find("numvale=:nimi",array("nimi"=>trim($this->numdocref)));

			///AHORA NOS ASEGURAMOS QUE ESTE EN EL MISMO CENTRO  Y ALMACEN
			if($valeaanular->codcentro==$this->codcentro and $valeaanular->codalmacen==$this->codalmacen) {
				if ( ! ( trim ( $this->almacenmovimientos->anticodmov ) == trim ( $valeaanular->codmovimiento ) ) ) {//si no corresponde a su amntagonico ERROR
					$this->adderror ( 'numdocref' , 'Este      vale no   se puede anular con este movimiento ' . $this->almacenmovimientos->anticodmov );
				} ELSE {

					if ( $valeaanular->tienedespacho () )
						$this->adderror ( 'numdocref' , 'Este   Vale ya  tiene datos de expedición,   ' );
					if ( $valeaanular->cestadovale == '30' ) {//si Es un vale anulado
						$this->adderror ( 'numdocref' , 'Este   Vale ya se anulo   ' );
					}

					if ( ! Yii::app ()->periodo->verificaFechas ( $valeaanular->fechacont , $this->fechacont ) ) {//si Es un vale anulado
						$this->adderror ( 'numdocref' , 'El vale a anular tiene fecha posterior  :  ' . $valeaanular->fechacont );
					}

					switch ( $this->codmovimiento ) {

						case '89':  ///anular carga inicial
							$registroshijos = $valeaanular->almacendocs_alkardex;

							if ( count ( $registroshijos ) == 0 ) {
								$this->adderror ( 'numdocref' , 'El vale   ' . $valeaanular->numvale . '   no Tiene registros Hijos' );
							}
							break;
						case '20':  ///SALIDA RESERVA
							///BUSCAMOS LA SOLPE QUE GENERO EL VALE, ESTO PARA PODER UBICAR LOSOTORS VALES DE SALIDA (SI ES QUE LOS HUBIEREN)
							//RECORDAR QUE LA RELACION DE SOLPE-> VALES DE SALIDA RESERVA ES DE UNO A VARIOS (UNA SOLPE S EPUEDE ATENDER CON VARIOS VALES)
							if ( $valeaanular->codmovimiento == $this->codmovimiento )
								$this->adderror ( 'codmovimiento' , 'NO s epuede anular un vale que es de anulacion ' );
							//Primero hallamos un idref del kardex, que nos permita llegar a cualqueir itgem de esta solpe, solo necesitamos un dato
							//cualquiera de ellos, x practicidad escogereemos el primer elemento $matrizkardexhijos[0]['idref'] arbitrariamente
							// $matrizkardexhijos=Alkardex::model()->findAll("hidvale=:vhidvale",array(":vhidvale"=>$registro[0]['id']));
							$registroshijos = $valeaanular->almacendocs_alkardex;

							if ( count ( $registroshijos ) == 0 ) {
								$this->adderror ( 'numdocref' , 'Este vale no Tiene registros Hijos' );
							} else {
								///HALLANDO el ID DE ESTA SOLPE BUSCADA
								foreach ( $registroshijos as $rowx ) {
									$idsolpe = Desolpe::model ()->findByPk ( $rowx->idref )->desolpe_solpe->id;
									break;

								}

								///Ahora hallamos Todos los vales que estan AMARRADOS a esta solpe, de la siguiente manera
								$valesamarrados = Yii::app ()->db->createCommand ( "SELECT DISTINCT k.fechacre,k.numvale,k.fechacont,k.cestadovale,
																k.fechavale,k.codmovimiento , k.id  from public_almacendocs k , public_alkardex m WHERE k.id=m.hidvale AND
														         m.idref IN (SELECT t.id from public_desolpe t, public_solpe s
  																WHERE  t.hidsolpe=s.id and s.id=" . $idsolpe . " )and k.cestadovale in('20')
  																and k.codalmacen='".$valeaanular->codalmacen."' and k.codcentro='".$valeaanular->codcentro."'
  																  and k.codmovimiento <> '" . $this->codmovimiento . "' and k.id <> " . $valeaanular->id . " and k.codocuref in('340','350') order by k.numvale ASC " )->queryAll ();

								/*var_dump($valesamarrados);
                                    yii::app()->end();*/
								foreach ( $valesamarrados as $row ) {  // AHORA SI TENEMOS A TODOS LOS OTROS  VALES DE ESTA SOLPE  Y PODEMOS VALIDAR
									// IF($row['id']!=$registro->id)  ///Siempre y cuando no se trate del mismo vale q
									////SI HAY OTRO VALE CON FECHA DE CONTABILIZACION MENOR AL VALE A ANULAR
									 if( Yii::app()->periodo->verificaFechas($row['fechacont'],$valeaanular->fechacont)){
										 if (strtotime($row[ 'fechacont' ])==strtotime( $valeaanular->fechacont ) ) {
											 if ( ($valeaanular->numvale+0) > ($row[ 'numvale' ]+0)  )
												 $this->adderror ( 'numdocref' , 'Este vale  no se puede anular, Hay otro vale que lo precede :' . $row[ 'numvale' ]  );
											 break;
										 }
                                         $this->adderror('numdocref','Este vale  no se puede anular, Hay otro vale que lo precede, con el numero -> :'.$row['numvale'].' con contabilizacion  '.$row['fechacont'].' Se recomienda tratar la anulacion en orden cronologico');
												break;
                                        }
								}
								/*

                              // echo "el vale " .$row['numvale']. "  su fecha ".$row['fechacont'] ."    <br>";
                                 IF(!Yii::app()->periodo->verificaFechas($valeaanular->fechacont,$row['fechacont'])  and $row['cestadovale']  <> '30' and $row['cestadovale']  <> '99' and $row['codmovimiento']  <>$this->codmovimiento ) {
                                  $this->adderror('numdocref','Este vale con fecha '.$registro[0]['fechacont'].' no se puede anular, Hay otro vale que lo precede :'.$row['numvale'].' con contabilizacion  '.$row['fechacont'].' Se recomienda tratar la anulacion en orden cronologico');
                                       break;
                                }*/
								/*IF(strtotime($row->fechacont) ==strtotime($registro->fechacont) ) { //SI SE HICIERON EL MISMO DIA VERIFICAR LA FECHA DE CREACION DE LOS VALES
                                    // $this->adderror('numdocref','Este vale con fecha '.$registro->fechacont.' no se puede anular, Hay otro vale que lo precede :'.$row->numvale.' con contabilizacion  '.$row->fechacont.' Se recomienda tratar la anulacion en orden cronologico');
                                       break;*/


							}
							// yii::app()->end();


							break;
						case '40':  ///anular compra

							break;
						default:
							throw new CHttpException( 500 , '-Se ha tomado un movimiento que no es valido ' . $this->codmovimiento );
					}
				}

			}else {
				$this->adderror ( 'numdocref' , 'Este vale no coincide con el centro-almacen ' );

			}

					 				/*$matriz=Alkardex::model()->findAll( "idref=:mipa and valido='1' and codmov =:movi " ,array("mipa"=>$registro[0]['id'],"movi"=>$movimientoopuesto));
										if(count($matriz) >0 ) 
														$this->adderror('numdocref','Este vale ya ha sido anulado ');*/
				  
														//ahora verificando la fecha 

			/*if (strtotime($this->fechacont) < strtotime($registro[0]['fechacont']))
												$this->adderror('fechacont','La fecha de la anulación es menor que la fecha de creación del documento a anular ');
			                */

			                      }

}


	public function checkvalereingreso($attribute,$params) {
		//Verfiicando que exista primero
		if(is_null($this->existevaleref())) {
			$this->adderror('numdocref','Este vale no existe '.$this->numdocref.'-');
		}else{

			$valeareingresar=Almacendocs::model()->find("numvale=:nimi",array("nimi"=>trim($this->numdocref)));

			///AHORA NOS ASEGURAMOS QUE ESTE EN EL MISMO CENTRO  Y ALMACEN
			if($valeareingresar->codcentro==$this->codcentro and $valeareingresar->codalmacen==$this->codalmacen) {
				if ( $valeareingresar->almacenmovimientos->esconsumo!='1' ) {//si no corresponde a un consumo
					$this->adderror ( 'numdocref' , 'Este      vale no  es de consumo');
				} ELSE {

					if ( $valeareingresar->cestadovale == '30' ) {//si Es un vale anulado
						$this->adderror ( 'numdocref' , 'Este   Vale ya se anulo   ' );
					}

					if ( ! Yii::app ()->periodo->verificaFechas ( $valeareingresar->fechacont , $this->fechacont ) ) {//si Es un vale anulado
						$this->adderror ( 'numdocref' , 'El vale a reingresar tiene fecha posterior  :  ' . $valeareingresar->fechacont );
					}
						//si el vale refernciado  es de un movimeitno que tiene el ANTICODMOV==null
					if($valeareingresar->almacenmovimientos->anticodmov===null){
						$this->adderror ( 'numdocref' , 'Este vale es de un movimiento que no tiene movimietno de compensacion' );

					}

				}

			}else {
				$this->adderror ( 'numdocref' , 'Este vale no coincide con el centro-almacen ' );

			}

		}

	}


    public function checkvaleingreso($attribute,$params) {

        //Verfiicando que exista primero
        $registro=Almacendocs::model()->findAll("numvale=:nimi",array("nimi"=>trim($this->numdocref)));

        if(!(count($registro)>0)) {
            $this->adderror('numdocref','Este vale no existe '.$this->numdocref.'-'.count($registro));
        }else{
            // $this->adderror('numdocref','pasffdfdfdfdfdo');
            //verificando que sea un vale adecuado para anular, un vale solo puede anular a su antagonico opuesto
            $movimientoopuesto=Almacenmovimientos::model()->findByPk($registro[0]['codmovimiento'])->anticodmov ;
            if( trim($movimientoopuesto) <> trim($this->codmovimiento))  {//si no corresponde ERROR
                $this->adderror('numdocref','Este vale no se puede anular con este movimiento '.$this->codmovimiento);
            } ELSE {
                //verificando primero si es anulable, si ya s egeneraron los registros en le kardex, si ha habido anulacion
                $matriz=Alkardex::model()->findAll( "idref=:mipa and valido='1' and codmov =:movi " ,array("mipa"=>$registro[0]['id'],"movi"=>$movimientoopuesto));
                if(count($matriz) >0 )
                    $this->adderror('numdocref','Este vale ya ha sido anulado ');

                //ahora verificando la fecha
                if (!Yii::app()->periodo->verificaFechas($registro[0]['fechacont'],$this->fechacont))
                    $this->adderror('fechacont','La fecha de la anulación es menor que la fecha de creación del documento a anular ');
            }
        }
    }

public function checkfechacont(){
	if (!$this->esfechacontablevalida())
		$this->adderror('fechacont',' La fecha de contabilizacion esta fuera del rango del periodo activo');
}

public function checksolpe($attribute,$params) {
	  //Verfiicando que existan en una solpe 
	  $registro=Solpe::model()->findAll("numero=:nimi",array("nimi"=>trim($this->numdocref)));
		if(!(count($registro)>0)) {
		    $this->adderror('numdocref','Esta Solpe no existe '.$this->numdocref.' '.count($registro));
			}else{
			   ////Verfiicando que existan en esa solpe items que esten reservadas 
			  // $matriz=Desolpe::model()->findAll( "hidsolpe=:mipa and est='06' and cant > 0 ",array("mipa"=>$registro[0]['id']));
			
                           // var_dump($matriz);
			         if(!$this->haysolpespendientes($this->numdocref))  {
				 $this->adderror('numdocref','Esta Solpe no tiene items reservados, o ya han sido atendidos por completo ');
				  }
				  
			}
}

public function checkcompra($attribute,$params) {
	  //Verfiicando que existan una compra liberada 
	  $registro=Ocompra::model()->find("numcot=:nimi",array("nimi"=>trim($this->numdocref)));
		if(is_null($registro)) {
		    $this->adderror('numdocref','Esta Orden de compra no existe '.$this->numdocref.' '.count($registro));
			}else{
			    $aestadosoc=array(ESTADO_OC_CREADA,ESTADO_OC_ANULADA,ESTADO_OC_FACTURADA);
			     //NO TINEE QUE ESTAR CREADA NI ANULADA NI FACTURADA
			    IF(in_array($registro->codestado,$aestadosoc)){
					$this->adderror('numdocref','Esta Orden de compra no tiene status valido : '.$registro->estado->estado);
				}
			    ///sI ES COSIGNACI SOLO DEBE CORRESPONDE A UN IMGREOS DE CONSIGNACION
					IF($registro->tipologia =='H' AND !($this->codmov =='13')){
						$this->adderror('numdocref','Esta Orden de compra  es de consignación : '.$registro->estado->estado);
					}
			///sI ES COSIGNACI SOLO DEBE CORRESPONDE A UN IMGREOS DE CONSIGNACION


			IF(!yii::app()->periodo->verificaFechas($registro->fecdoc,$this->fechacont)){
				$this->adderror('fechacont','La Orden de compra tiene fecha posterior a este Vale');
			}



			IF($registro->estaatendida()){
				$this->adderror('numdocref','Esta Orden de compra Ya ha sido atendida completamente');
			}



			   ////Verfiicando que existan en esa solpe items que esten reservadas 
			  /* $matriz=Desolpe::model()->findAll( "hidsolpe=:mipa and est='60' and cant > 0 ",array("mipa"=>$registro[0]['id']));
			     if(count($matriz) ==0 )  {
				 $this->adderror('numdocref','Esta Solpe no tiene items reservados ');*/

				  
			}
}
	
	
public function checkcentros($attribute,$params) {
		$modeloalmacenes=Almacenes::model()->findByPk($this->codalmacen);
		 if (is_null($modeloalmacenes )) {
			    $this->adderror('codalmacen','Este almacen no existe');
							}else{
							if(!$modeloalmacenes->codcen === $this->codcentro)
							$this->adderror('codalmacen','Este almacen no existe en el centro seleccionado');	
							}

}


public function verificafechaservicios($attribute,$params){
	if(!yii::app()->periodo->estadentroperiodo($this->fechacont,true))
		$this->adderror('fechacont','La fecha de contabilizacion se encuentra fuera de la tolerancia del periodo');
}






	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			//'almacenes'=>array(self::BELONGS_TO, 'Almacenes', 'codsociedad'),
			'codsociedad0' => array(self::BELONGS_TO, 'Sociedades', 'codsociedad'),
			'almacenmovimientos' => array(self::BELONGS_TO, 'Almacenmovimientos', 'codmovimiento'),
			'almacenes' => array(self::BELONGS_TO, 'Almacenes', 'codalmacen'),
			'codcentro0' => array(self::BELONGS_TO, 'Centros', 'codcentro'),
			'almacendocs_estado' => array(self::BELONGS_TO, 'Estado', array('cestadovale'=>'codestado','codocu'=>'codocu')),
			'codocu0' => array(self::BELONGS_TO, 'Estado', 'codocu'),
            'docureferencia' => array(self::BELONGS_TO, 'Documentos', 'codocuref'),
			'almacendocs_alkardex' => array(self::HAS_MANY, 'Alkardex', 'hidvale'),
			'almacendocs_tempalkardex' => array(self::HAS_MANY, 'Tempalkardex', 'hidvale'),
			'almacendocs_almacenmovimientos' => array(self::BELONGS_TO, 'Almacenmovimientos', 'codmovimiento'),
			'numeroitems'=>array(self::STAT, 'Alkardex', 'hidvale'),//el campo foraneo
			'almacendocs_documentos'=>array(self::BELONGS_TO, 'Documentos', 'codocu'),
			'trabajadores'=>array(self::BELONGS_TO, 'Trabajadores', 'codtrabajador'),


   			
			);
	
	}

    public function esdeterministico(){
		return ($this->almacendocs_almacenmovimientos->itemsdeterministicos=='1')?true:false;
	}

	public function sepuedeborraritems(){
		return ($this->almacendocs_almacenmovimientos->borraritems=='1')?true:false;
	}

	public function sepuedeeditarcantidad(){
		return ($this->almacendocs_almacenmovimientos->editarcantidad=='1')?true:false;
	}



	public function tienedespacho() {
		$retorno = false;
		if ($this->almacendocs_almacenmovimientos->signo < 0) {
			$hijitos = $this->almacendocs_alkardex;
			foreach ( $hijitos as $fila ) {
				if ( count ( $fila->alkardex_despacho ) > 0 ) {
					$retorno = true;
					break;
				}
			}
		}
		return $retorno;
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fechavale' => 'Fecha ',
			'creadopor' => 'Creadopor',
			'modificadopor' => 'Modificadopor',
			'creadoel' => 'Creadoel',
			'modificadoel' => 'Modificadoel',
			'codmovimiento' => 'Movimie',
			'numvale' => 'Numero',
			'codtipovale' => 'Tip doc',
			'codtrabajador' => 'Cod Trab',
			'codalmacen' => 'Almacen',
                    'codestadovale' => 'Est.',
			'codcentro' => 'Centro',
			'cestadovale' => 'Estado',
			'correlativo' => 'Correl',
			'codocu' => 'Codocu',
			'id' => 'ID',
                                                'codaldestino'=>'Alm Dest.',
                     'codcendestino'=>'Cent dest.',
			'fechacont' => 'F. Cont',
			'fechacre' => 'F. cre',
			'numdocref' => 'Doc Ref',
			'posic' => 'Posic',
			'codocuref' => 'Doc Ref',
		);
	}

public function esfechacontablevalida (){
	return Yii::app()->periodo->getModel()->FechaDentroPeriodo($this->fechacont);
}


public $maximovalor;
	//public $conservarvalor=0; //Opcionpa reaverificar si se quedan lo valores predfindos en sesiones 
	public function beforeSave() {
							if ($this->isNewRecord) {

								if(in_array($this->codmovimiento,array( 
                                                                    self::CODIGO_MOVIMIENTO_ANULA_SALIDA_AUTOMATICA_RQ, 
                                                                    self::CODIGO_MOVIMIENTO_SALIDA_AUTOMATICA_RQ,
									self::CODIGO_MOVIMIENTO_AJUSTE_FALTANTES,
                                                                    self::CODIGO_MOVIMIENTO_ANULA_AJUSTE_FALTANTES,
									self::CODIGO_MOVIMIENTO_AJUSTE_SOBRANTES,
                                                                    self::CODIGO_MOVIMIENTO_ANULA_AJUSTE_SOBRANTES,
									))){
								$this->numvale = Numeromaximo::numero ( $this , 'correlativo' , 'maximovalor' , 8 , 'codcentro' );
								$this->fechacre = date ( "Y-m-d H:i:s" );
									$this->cestadovale=self::ESTADO_EFECTUADO;
								}
								elseif($this->codmovimiento==self::CODIGO_MOVIMIENTO_ANULAR_INGRESO_ACTIVIDAD){
									$criterio=New CDBCriteria();
									$criterio->addcondition('codcentro=:vcentro');
                                                                        $criterio->params=array(':vcentro'=>$this->codcentro);
                                                                        $criterio->addInCondition('codmovimiento',array(
                                                                            self::CODIGO_MOVIMIENTO_ANULAR_INGRESO_ACTIVIDAD,
                                                                            self::CODIGO_MOVIMIENTO_INGRESO_ACTIVIDAD));
									
									/*$criterio->addcondition(' codmovimiento=:vmovimiento');
                                    $criterio->params=array(':vmovimiento'=>$this->codmovimiento);*/
									$this->numvale=$this->correlativo('numvale',$criterio,'507',null);

								}else{
                                                                    $this->cestadovale='99';
                                                                }

									
                                                                
                                                                
                                                                $this->codtrabajador=yii::app()->user->um->getFieldValue(Yii::app()->user->id,'codtra');
									//$this->codigo='34343434';
									$this->codocu='101';
									




											//$this->codobjeto='001';
											//$gg=new Numeromaximo;


									
									} else
									{

										if($this->codmovimiento==self::CODIGO_MOVIMIENTO_INGRESO_ACTIVIDAD ){
											$criterio=New CDBCriteria();
									$criterio->addcondition('codcentro=:vcentro');
                                                                        $criterio->params=array(':vcentro'=>$this->codcentro);
                                                                        $criterio->addInCondition('codmovimiento',array(
                                                                            self::CODIGO_MOVIMIENTO_ANULAR_INGRESO_ACTIVIDAD,
                                                                            self::CODIGO_MOVIMIENTO_INGRESO_ACTIVIDAD));
									
											$this->numvale=$this->correlativo('numvale',$criterio,'507',null);

										}else {
											if($this->oldAttributes['cestadovale']<> $this->cestadovale  and $this->cestadovale==self::ESTADO_VALE_CREADO )
											{
												$this->numvale = Numeromaximo::numero ( $this , 'correlativo' , 'maximovalor' , 8 , 'codcentro' );
												$this->fechacre = date ( "Y-m-d H:i:s" );
											}
										}








										}

										//if ($this->cestadovale=='01')
												//$this->numvale=Numeromaximo::numero($this->model(),'correlativo','maximovalor',8,'codcentro');
										//$this->ultimares=" ".strtoupper(trim($this->usuario=Yii::app()->user->name))." ".date("H:i")." :".$this->ultimares;

									return parent::beforeSave();
				}
	
	
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('codmovimiento',$this->codmovimiento,true);
		$criteria->compare('numvale',$this->numvale,true);
		$criteria->compare('codtrabajador',$this->codtrabajador,true);
		$criteria->compare('codalmacen',$this->codalmacen,true);
		$criteria->compare('codcentro',$this->codcentro,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('numdocref',$this->numdocref,true);
		$criteria->compare('codocuref',$this->codocuref,true);
		//$criteria->addcondition('codmovimiento <> :codmovimiento');
		//$criteria->params=array(':codmovimiento'=>CODIGO_MOVIMIENTO_INGRESO_ACTIVIDAD);
		if((isset($this->fechavale) && trim($this->fechavale) != "") && (isset($this->fechavale1) && trim($this->fechavale1) != ""))  {
				$criteria->addBetweenCondition('fechavale', ''.$this->fechavale.'', ''.$this->fechavale1.'');
		}
		if((isset($this->fechacont) && trim($this->fechacont) != "") && (isset($this->fechacont1) && trim($this->fechacont1) != ""))  {
			$criteria->addBetweenCondition('fechacont', ''.$this->fechacont.'', ''.$this->fechacont1.'');
		}


		//$criteria->addBetweenCondition('fechacre', ''.$this->fechacre.'', ''.$this->fechacre1.'');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getreferencia(){
		$vectores=Almacendocs::model()->findAll("idref=:vid and cestadovale IN('".ESTADO_CREADO."','".ESTADO_EFECTUADO."'    )",array(":vid"=>$this->id));
		IF(COUNT($vectores)>0)
		{
			RETURN $vectores[0]['id'];
	}ELSE{
			RETURN -1;
		}
	}

	public function clonavale($codmovimiento){
		$clon=New Almacendocs('clonar');
		$clon->setAttributes(
			array(
				'fechavale'=>$this->fechavale,
				'codmovimiento'=>$codmovimiento,
				'codalmacen'=>$this->codalmacen,
				'codcentro'=>$this->codcentro,
				'codocu'=>$this->codocu,
				'fechacont'=>$this->fechacont,
				'idref'=>$this->id,
				//'cestadovale'
				'fechacre'=>date("Y-m-d H:m:s"),
				'numdocref'=>$this->numvale,	)
		);
		    if(!$clon->save()){
				yii::app()->user->setFlash('error',yii::app()->mensajes->getErroresItem($clon->geterrors()));
			}

		$clon->setScenario('cambioestado');
		    $clon->cestadovale=ESTADO_CREADO;
		$clon->save();
		return $clon;
	}

	public static function valepornumero($numero){
		$numero=MiFactoria::cleanInput($numero);
		return self::model()->find("numvale=:vnumvale",array(":vnumvale"=>$numero));
	}

	public static function limpiar(){
		$criterio=New CDbCriteria;
		$criterio->addcondition(" cestadovale = '99' ");
		$criterio->addNotInCondition("id",Bloqueos::documentosenproceso('101'));
		//$criterio->params=array(":fechalimite"=>$fechalimite);
		/*	echo "fecha actual ".date("Y-m-d H:i:s")."<br>";
                echo  "fechalimite  ".	$fechalimite."<br>";*/
		$filasborradas=Yii::app()->db->createCommand()->delete(self::tableName(),$criterio->condition,$criterio->params);
		/*var_dump($criterio);*/
		return $filasborradas;
	}

		public function chkfechasol($attribute,$params){
	      //verifica r que la fecha de solpe no sea posterior al del vale
			$razon=Solpe::model()->findByPk($this->numdocref);
			if(!is_null($razon))
			{
				if($razon->numeroitems > 0 )
					if( strtotime(date("Y-m-d",$razon->numeroitems[0]->fechacrea)) > strtotime($this->fechacont))
						$this->adderror('fechacont','Esta fecha es anterior a la solicitud');
			}
		}

	public function chkfechacompra($attribute,$params){
		//verifica r que la fecha de Compra no sea posterior al del vale
		$razon=Ocompra::model()->findByPk($this->numdocref);
		if(!is_null($razon))
		{

				if( strtotime(date("Y-m-d",$razon->fecdoc)) > strtotime($this->fechacont))
					$this->adderror('fechacont','Esta fecha es anterior a la compra');
		}
	}

	public function checkfacturacion($attribute,$params){
		//verifica  que el vale a anualr no este dfacturado
		$valeaanular=Almacendocs::model()->find("numvale=:nimi",array("nimi"=>trim($this->numdocref)));
		$kardis=$valeaanular->almacendocs_alkardex;
                if(is_array($kardis)){
                    foreach( $kardis as $filakardex ){
			if($filakardex->alkardex_alentregas[0]->cantfacturada > 0){
				$this->adderror('numdocref','Este vale no puede anularse, ya tiene items facturados');
				break;
			}

		}
                }
                

	}


	public function chkalmacen($attribute,$params){
		if($this->codmovimiento=='68'){

		}else{
			if($this->codalmacen===null or empty($this->codalmacen))
				$this->adderror('codalmacen','Indique el almacen');
		}
	}

	public function checkot($attribute,$params){
		$registro=Ot::model()->findByNumero(trim($this->numdocref));
		if(is_null($registro)){
			$this->adderror('numdocref','Este numero de OT no existe ');
		}else{
			if ($registro->nrecursosfirme >0){ ///SI TIENE ITEMS DE MATERIALES ESTA ORDEN
					//verifdicando ahora la Solpe asociada a esta OT
				$regsolpe=$registro->desolpe[0]->desolpe_solpe;
				$matriz = Yii::app()->db->createCommand(" select t.id, t.codart,t.um, s.cant,r.punit from
  																{{desolpe}} t,
  																 {{alreserva}}  s ,
  																{{alinventario}}  r
  																 where
  																 t.codal=r.codalm and
  																 t.centro=r.codcen and
  																 t.codart=r.codart and
  																 s.hidesolpe=t.id and
  																 s.codocu='450' and
  																 t.hidsolpe=".$regsolpe->id." and
  																  s.estadoreserva in ('10' ,'40') ")->queryAll();

				if(count($matriz) ==0 )  {
					$this->adderror('numdocref','Esta OT no tiene items reservados ');
				}
			}else{
				$this->adderror('numdocref','Esta  OT no tiene materiales que solicitar ');
			}

		}



	}
        
        
public function checksolpecompra($attribute,$params) {
	  //Verfiicando que existan en una solpe 
	  $registro=Solpe::model()->findAll("numero=:nimi",array("nimi"=>trim($this->numdocref)));
		if(!(count($registro)>0)) {
		    $this->adderror('numdocref','Esta Solpe no existe '.$this->numdocref.' '.count($registro));
			}else{
                            if(!($registro->escompra=='V')){
                              $this->adderror('numdocref','Esta Solpe no es del tipo Ventas ');
                                                RETURN;
				  }  
			   ////Verfiicando que existan en esa solpe items que esten reservadas 
			  // $matriz=Desolpe::model()->findAll( "hidsolpe=:mipa and est='06' and cant > 0 ",array("mipa"=>$registro[0]['id']));
			$matriz = Yii::app()->db->createCommand(" select t.id, t.codart,t.um, s.cant,r.punit from
  																{{desolpe}} t,
  																 {{alreserva}}  s ,
  																{{alinventario}}  r
  																 where
  																 t.codal=r.codalm and
  																 t.centro=r.codcen and
  																 t.codart=r.codart and
  																 s.hidesolpe=t.id and
  																 s.codocu='450' and
  																 t.hidsolpe=".$registro[0]['id']." and
  																  s.estadoreserva in ('10' ,'40') ")->queryAll();

			         if(count($matriz) ==0 )  {
				 $this->adderror('numdocref','Esta Solpe no tiene items reservados ');
				  }
				  
			}
                    
          }
          /*retorna el mov opuesto del vale*/
          public function movimientoopuesto(){
              
              
          }
          
          //esta fucnion verifica :
          //1) que le numero de solpe exista 
          // 2) que la solpe tenga items pendientes de atencion
          //3) que lasolpe tenga el esrado adecuado o reservado 
          public function verificasolpe(){
              
          }
          
          public function haysolpespendientes($referencia){
              $solpe=Solpe::model()->findAll("numero=:vnumero",array(":vnumero"=>$referencia));
              if(count($solpe)>0){
                  $idsolpe=$solpe[0]->id;
                  
                  
                  
                   $registros=  Yii::app()->db->createCommand("select t.id,s.cant,x.cant 
                                from {{desolpe}}  t
INNER JOIN {{alreserva}} s ON s.hidesolpe=t.id
INNER JOIN {{solpe}}  w ON  t.hidsolpe=w.id
LEFT JOIN {{atencionreserva}} x ON s.id=x.hidreserva
WHERE ( (t.centro='".$this->codcentro."'   and t.codal='".$this->codalmacen."') and
        ( ( t.codart <> '".yii::app()->settings->get('materiales','materiales_codigoservicio')."' AND   s.estadoreserva not in('30','70') AND s.codocu IN('450') and t.hidsolpe=".$idsolpe." )
 	 or(  t.codart <> '".yii::app()->settings->get('materiales','materiales_codigoservicio')."' AND s.estadoreserva = '40' AND   s.codocu IN('800') and t.hidsolpe=".$idsolpe."  ) )    )
 group by t.id,s.cant,x.cant 
 HAVING sum(x.cant) < s.cant or sum(x.cant) is null")->queryAll();
            return (count($registros)>0)?true:false;
              }else{
                  return false;
              }
           
          }
}