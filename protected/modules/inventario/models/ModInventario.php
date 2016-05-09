<?php
class ModInventario extends CActiveRecord implements IInventarioTareasBasicas
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Inventario the static model class
	 */
	const FLAG_PRECIO_PROMEDIO_VARIABLE ='V';
	const FLAG_PRECIO_ESTANDAR ='S';
	const NOMBRE_CAMPO_PRECIO_UNITARIO='punit';
	const CAMPO_STOCK_LIBRE='cantlibre';
	 const CAMPO_STOCK_RESERVADO='cantres';
	 const CAMPO_STOCK_TRANSITO='canttran';
     const NOMBRE_CAMPO_CONTROL_PRECIO='controlprecio'; //NOmbre del campo de la tabla relaciondad maerto detalle
	const  NOMBRE_CAMPO_PRECIO_ESTANDAR='punitstd';//NOmbre del campo de la tabla relaciondad maerto detalle
       const     NOMBRE_CAMPO_PRECIO_DIFERENCIA_UNITARIA='punitdif';
	  const CAMPO_STOCK__RESERVADO='cantres';

	public $camposstock=array(
		self::CAMPO_STOCK_LIBRE=>self::CAMPO_STOCK_LIBRE,
		self::CAMPO_STOCK_RESERVADO=>self::CAMPO_STOCK__RESERVADO,
		self::CAMPO_STOCK_TRANSITO=>self::CAMPO_STOCK_TRANSITO
		);

	public $camposstockafectadosporprecio=array(
		self::CAMPO_STOCK_LIBRE=>self::CAMPO_STOCK_LIBRE,
		self::CAMPO_STOCK_RESERVADO=>self::CAMPO_STOCK__RESERVADO,
		self::CAMPO_STOCK_TRANSITO=>self::CAMPO_STOCK_TRANSITO
	);


	public $mensajes=array(); //guarada los mensajes de las operaciones relaizadas en epscial las advertencias y lso errores
	public $pttotal;
	public $cantidadmovida; //almacena en el Active record la cantidad movida (Convertida a unidad de medida base del material)  de cualquier transaccion,
	public $montomovido; //ALMACENA EL MONTO INVOLUCRADO EN LA TX , ///sin eimportar la Unidad de medida o el control del precio d S O V DE L AMATEIRAL
	protected $controldeprecio=NULL;

	/*public static function loadModel($id);
public static function stocklibre_a_reserva($cant);
public static function stocklibre_a_transito($id);
public static function stockreserva_a_libre($id);
public static function stocktransito_a_libre($id);
public static function create();
public static function grabar();
public function getPrimaryKey();*/

     protected  function getControlPrecio() {
		 if(!$this->isnewRecord){
			   return $this->alinventario_maestrodetalle->{self::NOMBRE_CAMPO_CONTROL_PRECIO};

		 }	else 	{
			 return self::FLAG_PRECIO_PROMEDIO_VARIABLE;
		 }
	  }

	public static function create()
	{
		$model = new Alinventario();
		return $model;
	}


	public function getPrimaryKey()
	{
		return $this->id;
	}

	public function grabar()
	{
		$retorno=false;
		if($this->save()){
			$this->insertamensaje(InventarioUtil::FLAG_SUCCESS,"Se grabo el registro".$this->getPrimaryKey());
		  $retorno=true;
		} else {
			$this->insertamensaje(InventarioUtil::FLAG_ERROR,"Hubo un problema al grabar el registro de Inventario :".$this->getPrimaryKey());
		    $retorno=false;
		}
		return $retorno;
	}

	public function haystocklibre(){
		return ($this->cantlibre > 0)?true:false;
	  }

	protected function insertamensaje($nivel,$mensaje){
		$ingreso= array_push($this->mensajes,array($nivel=>$mensaje));
        /* print_r($this->mensajes);
		echo "agrefgo  :".$ingreso;
		yii::app()->end();*/
		return $ingreso;
	}

	public function stocklibre_a_reserva($cant){
		if(InventarioUtil::verificarsignocant($cant)){
			   if($this->verificaconsistencia_stock(self::CAMPO_STOCK_LIBRE,$cant)){
		                $this->cantlibre-=$cant;
		                 $this->cantres+=$cant;
                           // $this->insertamensaje(InventarioUtil::FLAG_SUCCESS,$this->id." :  Ok,se paso ".$cant."  del stock libre a RESERVA");
			                return true;
		                } else {
							$this->insertamensaje(InventarioUtil::FLAG_ERROR,$this->id." :La cantidad que intenta mover es mayo q elk stock libre");
			                return false;
		                }

		       return true;
	               } else {
			    $this->insertamensaje(InventarioUtil::FLAG_ERROR,$this->id." :La cantidad no es posotiva");
			return false;
		         }
	}


	public function  stocklibre_a_transito($cant){
		if(InventarioUtil::verificarsignocant($cant)){
			   if($this->verificaconsistencia_stock(self::CAMPO_STOCK_LIBRE,$cant)){
				   $this->{self::CAMPO_STOCK_LIBRE}-=$cant;
				   $this->{self::CAMPO_STOCK_TRANSITO}+=$cant;
				  // $this->insertamensaje(InventarioUtil::FLAG_SUCCESS,$this->id." :  Ok,se paso ".$cant."  del stock libre a RESERVA");
				   return true;
			   } else {
				   $this->insertamensaje(InventarioUtil::FLAG_ERROR,$this->id." :La cantidad que intenta mover es mayo q elk stock libre");
				   return false;
			   }

		return true;
	} else {
			$this->insertamensaje(InventarioUtil::FLAG_ERROR,$this->id." :La cantidad es negativa");
			return false;
		}
	}

	public function  stocktransito_a_libre($cant){
		if(InventarioUtil::verificarsignocant($cant)){
			   if($this->verificaconsistencia_stock(self::CAMPO_STOCK_TRANSITO,$cant)){
				   $this->{self::CAMPO_STOCK_TRANSITO}-=$cant;
				   $this->{self::CAMPO_STOCK_LIBRE}+=$cant;
				   // $this->insertamensaje(InventarioUtil::FLAG_SUCCESS,$this->id." :  Ok,se paso ".$cant."  del stock libre a RESERVA");
				   return true;
			   } else {
				   $this->insertamensaje(InventarioUtil::FLAG_ERROR,$this->id." :La cantidad que intenta mover es mayo q lo del transito");
				   return false;
			   }

		return true;
	} else {
			$this->insertamensaje(InventarioUtil::FLAG_ERROR,$this->id." :cantidad negactova");
			return false;
		}
	}

	public function  stockreserva_a_libre($cant){
		if(InventarioUtil::verificarsignocant($cant)){
			   if($this->verificaconsistencia_stock(self::CAMPO_STOCK_RESERVA,$cant)){
				   $this->{self::CAMPO_STOCK_RESERVA}-=$cant;
				   $this->{self::CAMPO_STOCK_LIBRE}+=$cant;
				   // $this->insertamensaje(InventarioUtil::FLAG_SUCCESS,$this->id." :  Ok,se paso ".$cant."  del stock libre a RESERVA");
				   return true;
			   } else {
				   $this->insertamensaje(InventarioUtil::FLAG_ERROR,$this->id." :La cantidad que intenta mover es mayo q lo de LA RESERVA");
				   return false;
			   }

		return true;
	} else {
			$this->insertamensaje(InventarioUtil::FLAG_ERROR,$this->id." :cantidad negativa");
			return false;
		}
	}

public function getStockCamposAfectadosPrecio() {
	///Mucho cuidado aqui , para evitar confusiones , es mejor leer
	// ESTAS CANTIDAES DESDE UN REGISTRO DIFERENTE AL OBJETO,
	//PARA SEGURARNOS QUE SE LENA CANTIDADES ORIGINALES
	  $modeloprueba=ModInventario::loadModel($this->id);
	        $cantidadafectada=0;
	foreach($modeloprueba->camposstockafectadosporprecio as $clave=> $valor)
		{
			$cantidadafectada+=(is_null($modeloprueba->{$valor}))?0:$modeloprueba->{$valor};
			//echo "  el campo  :  ".$clave."    el valore  : ".
		}
	unset($modeloprueba);
	 return $cantidadafectada;
}

	public function getStockPrecioEstandar() {
		if(!$this->isnewRecord){
			return $this->alinventario_maestrodetalle->{self::NOMBRE_CAMPO_PRECIO_ESTANDAR};

		}	else 	{
			return 0;
		}
	}

///Solo vale para incrmeento de stocks, cuando sale algo no se actualiza los precios
public function actualizaprecio($cant,$punitnuevo,$campodestino) {
	if(InventarioUtil::verificarsignocant($cant)){
		     $cantidadafectada=$this->getStockCamposAfectadosPrecio();

		///Que pasa si la cantidad afectada es  cero
		      if( $cantidadafectada==0 ){
		 				///Aqui no hay mucho porblema
				 				 $this->{$campodestino}=$cant;

				 			 		if($this->getControlPrecio()==self::FLAG_PRECIO_PROMEDIO_VARIABLE ) {
				  						$this->{self::NOMBRE_CAMPO_PRECIO_UNITARIO}=$punitnuevo;
										 }
				                    if($this->getControlPrecio()==self::FLAG_PRECIO_ESTANDAR ) {
										     ///sI ES ESTANDAR SOLO BASTA CON COLOCAR EL NUEVO REP
										               $this->{self::NOMBRE_CAMPO_PRECIO_ESTANDAR}=$this->getStockPrecioEstandar();
										                // Se calcula la difrencia unitaria de precio
												       $this->{self::NOMBRE_CAMPO_PRECIO_DIFERENCIA_UNITARIA}=round(($punitnuevo-$this->{self::NOMBRE_CAMPO_PRECIO_ESTANDAR})/$cant,3);
				 						 }
				                     return true;
			                      } else { //aqui si hay chicha
				 							 $this->{$campodestino}+=$cant;
				 									 ///Depende del control de precio
				 											 if($this->getControlPrecio()==self::FLAG_PRECIO_PROMEDIO_VARIABLE ) {
																  //valor ponderado
																   $this->{self::NOMBRE_CAMPO_PRECIO_UNITARIO}=round(($punitnuevo*$cant+$this->{self::NOMBRE_CAMPO_PRECIO_UNITARIO}*$cantidadafectada)/($cant+$cantidadafectada),3);
				  													}
				 										 if($this->getControlPrecio()==self::FLAG_PRECIO_ESTANDAR ) {
					 										 ///sI ES ESTANDAR SOLO BASTA CON COLOCAR EL NUEVO REP
					 											 $this->{self::NOMBRE_CAMPO_PRECIO_ESTANDAR}=$this->getStockPrecioEstandar();
					 												 // Se calcula la difrencia unitaria de precio  OJO NO ES PONDERADO
					  											$this->{self::NOMBRE_CAMPO_PRECIO_DIFERENCIA_UNITARIA}=round(($punitnuevo-$this->{self::NOMBRE_CAMPO_PRECIO_ESTANDAR})/$cantidadafectada,3);
				 												 }
				                return true;
			                }

	} else {
		$this->insertamensaje(InventarioUtil::FLAG_ERROR,$this->id." :La cantidad no es positiva, debe de procesarse");
		return false;
	}

}


	public function getMensajes(){
		/*echo " ya hoa que caraqjo vas a decir ";
		print_r($this->mensajes);*/

		return $this->mensajes;
	}



	protected function verificaconsistencia_stock($nombrecampostockorigen, $cant){
		 $retorno=false;
		foreach ($this->camposstock as $clave=>$valor ) {
			   if($valor==$nombrecampostockorigen){
				   if( $this->{$valor} >= $cant ) {
                             $retorno=true;
					         break;
				      }
			   }
			 if($retorno)break;
		 }

           return $retorno;
	   }

	public static function loadModel($id)
	{
		return self::model()->findByPk($id);
	}



	public  static function encontrarregistro($centro,$almacen,$codigo)
	{
		$criteria=new CDbCriteria;
		$criteria->addcondition("codcen=:vcodcen",'AND');
		$criteria->addcondition("codalm=:vcodalm",'AND');
		$criteria->addcondition("codart=:vcodart");
		$criteria->params=Array(":vcodcen"=>trim($centro),":vcodalm"=>trim($almacen),":vcodart"=>trim($codigo));
		//$registro=$this->model()->find($criteria);
		 return self::model()->findByPk($criteria);

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
		return InventarioUtil::getTableName('Alinventario');
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codalm', 'required','message'=>'Debes de ingresar el almacen', 'on'=>'insert,update'),
			array('codcen', 'required','message'=>'Debes de ingresar el centro', 'on'=>'insert,update'),
			array('codmon', 'required','message'=>'Ingresa la moneda','on'=>'insert,update'),
			array('codart','required','message'=>'Debes de ingresar el material','on'=>'insert,update'),
			//array('codart','unique','message'=>'Este material ya esta registrado','on'=>'insert'),
			array('cantlibre, canttran, cantres', 'numerical','on'=>'insert,update'),
			array('codalm', 'length', 'max'=>3,'on'=>'insert,update'),
			array('periodocontable, codresponsable, codcen', 'length', 'max'=>4,'on'=>'insert,update'),
			array('codart, ubicacion, lote', 'length', 'max'=>10,'on'=>'insert,update'),
			array('ssiduser', 'length', 'max'=>30,'on'=>'insert,update'),
			array('creadopor, creadoel,punit, modificadopor, cantlibre, cantres, modificadoel,codmon, fechainicio, fechafin ', 'safe','on'=>'insert,update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('codalm, creadopor, creadoel, modificadopor, modificadoel, fechainicio, fechafin, periodocontable, codresponsable, id, codart, codcen, um, cantlibre, canttran, cantres, ubicacion, lote', 'safe', 'on'=>'search'),


			array('cantres,cantlibre,canttran,punit,punitdif','safe','on'=>'modificacantidad'),

			///para carga masiva
			array('id,cantlibre', 'safe','on'=>'cargamasiva'),
			array('id,cantlibre', 'required','message'=>'Validacion de carga masiva ha fallado', 'on'=>'cargamasiva'),
			//array('codcen', 'required','message'=>'Debes de ingresar el centro', 'on'=>'insert,update'),


		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'maestro' => array(self::BELONGS_TO, 'Maestrocompo', 'codart'),
			'alinventario_maestrodetalle'=> array(self::HAS_ONE, 'Maestrodetalle', array('codal'=>'codalm','codcentro'=>'codcen','codart'=>'codart')),
			'alinventario_centros' => array(self::BELONGS_TO, 'Centros', 'codcen'),
			'alinventario_docompra'=>array(self::BELONGS_TO,'Docompra', array('codalm'=>'codigoalma','codcen'=>'codentro','codart'=>'codart')),
			//'alinventario_ums'=>array(self::BELONGS_TO,'Ums', 'um'),
			'alinventario_alkardex_preciomedio'=>array(self::STAT,'Alkardex',array('codart'=>'codart','codalm'=>'alemi','codcen'=>'codcentro'),'select'=>'AVG(preciounit)'),
			'alinventario_alkardex_preciominimo'=>array(self::STAT,'Alkardex',array('codart'=>'codart','codalm'=>'alemi','codcen'=>'codcentro'),'select'=>'MIN(preciounit)'),
			'alinventario_alkardex_preciomaximo'=>array(self::STAT,'Alkardex',array('codart'=>'codart','codalm'=>'alemi','codcen'=>'codcentro'),'select'=>'MAX(preciounit)'),

			'subtotal'=>array(self::STAT, 'Docompra', 'hidguia','select'=>'sum(t.punit*t.cant)'),//el subtotal

		);
	}





	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codalm' => 'Almacen',
			'creadopor' => 'Creadopor',
			'creadoel' => 'Creadoel',
			'modificadopor' => 'Modificadopor',
			'modificadoel' => 'Modificadoel',
			'fechainicio' => 'Fechainicio',
			'fechafin' => 'Fechafin',
			'periodocontable' => 'Periodo',
			'codresponsable' => 'Codresponsable',
			'id' => 'ID',
			'codart' => 'Material',
			'codcen' => 'Centro',
			//	'um' => 'Um',
			'punit'=>'Prec Unit',
			'pttotal'=>'Prec Total',
			'cantlibre' => 'Stock Libre',
			'canttran' => 'Stock trans',
			'cantres' => 'Stock Reser',
			'ubicacion' => 'Ubicacion',
			'lote' => 'Lote',
			'siid' => 'Siid',
			'ssiduser' => 'Ssiduser',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('codalm',$this->codalm,true);




		$criteria->compare('fechainicio',$this->fechainicio,true);
		$criteria->compare('fechafin',$this->fechafin,true);
		$criteria->compare('periodocontable',$this->periodocontable,true);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('codcen',$this->codcen,true);
		//$criteria->compare('um',$this->um,true);
		$criteria->compare('cantlibre',$this->cantlibre);
		$criteria->compare('canttran',$this->canttran);
		$criteria->compare('cantres',$this->cantres);
		$criteria->compare('ubicacion',$this->ubicacion,true);
		$criteria->compare('lote',$this->lote,true);
		$criteria->compare('siid',$this->siid,true);
		$criteria->compare('codmon',$this->codmon,true);
		$criteria->compare('punit',$this->punit,true);
		$criteria->compare('ssiduser',$this->ssiduser,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getTotal($provider)
	{
		$total=0;
		foreach($provider->data as $data)
		{
			$t = $data->punit*$data->cantlibre;
			$total += $t;
		}
		return $total;
	}









	public function gettipostock($codigomovimiento){
		//$tipostock=array();
		switch ($codigomovimiento) {
			case '98': ///(+) Stock libre: Carga inicial , se incrementara el stock libre
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);

				break;
			case '99':
				array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);



				break;
			case '10': //(-) Stock reservado : salida reserva  , disminuira el stock reservado

				return array("campoafectadocantidad"=>"cantres",
					"camposafectadosprecio"=>array() //Elsacar materiales NO afecta precios
				);
				break;
			case '20': //(+) Stock reservado : Anular vale de salida reserva, se incrementara el stock reservado
				//return "cantres";
				return array("campoafectadocantidad"=>"cantres",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;

			case '30':///(+) Stock libre: Ingreso por compra, compra normal se incrementara el stock libre
				//return "cantlibre";
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;

			case '40': ///(-) Stock Libre: Anular ingreso por compra; compra normal se saca del stock libre
				//return "cantlibre";
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array()
				);
				break;


			case '50': ///(-) Stock libre : Salida para ceco, se saca del stock libre
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array()
				);
				break;

			case '60': //(+) Stock libre: anular salida para ceco, se incrementa el stock libre
				//return "cantlibre";
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;

			case '70': //(+)Stock libre : Reingreso de material, se incrementa el stock libre ,
				//return "cantlibre";
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;

			case '77': //(-)Stock libre : disminuye el stock libre y aumenta el stock en Transito ,
				//return "cantlibre";
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					),
					"campodestino"=>"canttran",
				);
				break;

			case '78': //  INGRESA TRASLADO
				// (+)Stock libre : Aumenta el stock libre y disminuye  el stock en Transito del inventario del otro almacen,
				//return "cantlibre";
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					),


				);
				break;

			case '80': //(+)Stock reservado:  Anukar salida reserva, se incrementa el stock reservado
				return array("campoafectadocantidad"=>"cantres",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;
			case '90': //(-)Stock en transito:  Envio por traslado : se saca el stock en transito
				//return "canttra";
				return array("campoafectadocantidad"=>"canttran",
					"camposafectadosprecio"=>array()
				);
				break;
			case '10': //(-)Stock libre : Reserva para Traslado a otro almacen  : Se  saca del stock libre y se coloca en el stock en rtansito
				//return "cantlibre";
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array()
				);
				break;
			case '11': //(+) Stock libre :  Ingreso por traslado  de otro almacen, se incrementa el stock libre
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;

			default:
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;
		}

	}


	public function distribuyecantidades($codigomovimiento){
		//$tipostock=array();
		switch ($codigomovimiento) {
			case '98': ///(+) Stock libre: Carga inicial , se incrementara el stock libre
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);

				break;
			case '99':
				array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);



				break;
			case '10': //(-) Stock reservado : salida reserva  , disminuira el stock reservado

				return array("campoafectadocantidad"=>"cantres",
					"camposafectadosprecio"=>array() //Elsacar materiales NO afecta precios
				);
				break;
			case '20': //(+) Stock reservado : Anular vale de salida reserva, se incrementara el stock reservado
				//return "cantres";
				return array("campoafectadocantidad"=>"cantres",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttra",
					)
				);
				break;

			case '30':///(+) Stock libre: Ingreso por compra, compra normal se incrementara el stock libre
				//return "cantlibre";
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;

			case '40': ///(-) Stock Libre: Anular ingreso por compra; compra normal se saca del stock libre
				//return "cantlibre";
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array()
				);
				break;


			case '50': ///(-) Stock libre : Salida para ceco, se saca del stock libre
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array()
				);
				break;

			case '60': //(+) Stock libre: anular salida para ceco, se incrementa el stock libre
				//return "cantlibre";
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;

			case '70': //(+)Stock libre : Reingreso de material, se incrementa el stock libre ,
				//return "cantlibre";
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;

			case '77': //(-)Stock libre : Traslado de materiales desde el almacen emisor, disminuye el stock libre ,
				//return "cantlibre";
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;


			case '80': //(+)Stock reservado:  Anukar salida reserva, se incrementa el stock reservado
				return array("campoafectadocantidad"=>"cantres",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;
			case '90': //(-)Stock en transito:  Envio por traslado : se saca el stock en transito
				//return "canttra";
				return array("campoafectadocantidad"=>"canttran",
					"camposafectadosprecio"=>array()
				);
				break;
			case '10': //(-)Stock libre : Reserva para Traslado a otro almacen  : Se  saca del stock libre y se coloca en el stock en rtansito
				//return "cantlibre";
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array()
				);
				break;
			case '11': //(+) Stock libre :  Ingreso por traslado  de otro almacen, se incrementa el stock libre
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;

			default:
				return array("campoafectadocantidad"=>"cantlibre",
					"camposafectadosprecio"=>array(
						"stock_libre"=>"cantlibre",
						"stock_reservado"=>"cantres",
						"stock_en_transito"=>"canttran",
					)
				);
				break;
		}

	}




	public function Actualizar($movimiento,$cantidad,$unidad,$punitario=null)
	{
		//obtenemos el signo del movimiento
		$signo=Almacenmovimientos::model()->findByPk($movimiento)->signo;
		$conversion=Alconversiones::model()->convierte($this->codart,$unidad);
		$this->cantidadmovida=$signo*abs($conversion)*abs($cantidad);
		$mensajitoinv="";
		//$nombrecampostock_a=gettipostock($movimiento)
		$nombrecampo_stock_a_incrementar_o_disminuir=$this->gettipostock($movimiento)['campoafectadocantidad'];
		$nombrecampo_stock_destino=$this->gettipostock($movimiento)['campodestino'];
		$array_campos_afectados_precio=
		$array_campos_stock_afectados_por_precio=$this->gettipostock($movimiento)['camposafectadosprecio'];


		///Pero de que stock moveremos ?, eso se lo dejamos a la funcion gettipostock() del modelo
		$stock_a_incrementar_o_disminuir=$this->{$nombrecampo_stock_a_incrementar_o_disminuir};  //es el stock que se va a ver (+) o (-)
		// con el movimeintos  puede ser EL VALOR DE CUALQUIER  DE ESTOS CAMPOS, SEGUN EL MOVEIMIENTO

		/*  STOCK RESERVADO    "CANTRES";
           STOCK EN TRANSITO   "CANTTRAN",
           STOCK LIBRE  "CANTLIBRE",
      */

		///LA SUMA DE STOCKS AFECTADOS POR EL PRECIO VIENE ASER  LA SUAM DE LOS STOCKS CON LOS QUE SE DIVIDIRA LA SUMA DE LOS PONDERADOS DE CANTIDADES Y PRECIOS
		$suma_de_stocks_afectados_por_el_precio=0;
		foreach( $array_campos_stock_afectados_por_precio as $key=>$valor ) {
			$suma_de_stocks_afectados_por_el_precio+=$this->{$valor};
		}



		// con el movimeintos  puede ser EL VALOR DE CUALQUIER  DE ESTOS CAMPOS, SEGUN EL MOVEIMIENTO

		/*  STOCK RESERVADO    "CANTRES";
           STOCK EN TRANSITO   "CANTTRAN",
           STOCK LIBRE  "CANTLIBRE",
      */
		//verificando la consistencia del movimiento
		//para estop verificamos que los que se quiere mover (En este caso solo "quitar")
		// no es mayor que el stock  arrojado por GETTIPOSTOCK(),
		//if($signo==-1){  ///Si es un movimieto que va a sacar cosas del almacen
		if( ($signo==-1) and  (abs($this->cantidadmovida) > $stock_a_incrementar_o_disminuir)   ) { //si lo que quiere es sacar hay que analizar bien  de que movimeitno se trata
			$mensajitoinv=$mensajitoinv."<br> Esta intentado sacar ".$this->cantidadmovida."  (".$this->maestro->um." s) del material ".$this->codart." Pero en ". $this->getAttributeLabel($nombrecampo_stock_a_incrementar_o_disminuir) ." solo hay ".$stock_a_incrementar_o_disminuir."   Verifique bien ";
		} else {  //En otro caso proceder
			//actualizamos la cantidad y el precio unitario
			//$this->cantlibre=$this->cantlibre+$this->cantidadmovida;
			//ECHO "CANTIDAD MOVIDA ".$cantidadmovida."  \N";
			//Yii::app()->end();
			//Buscamos el precio unitario
			///Verificando el comportamiento del precio del material en este centro y este almacen
			$controlprecio=$this->alinventario_maestrodetalle->controlprecio;
			if(is_null($controlprecio) or empty($controlprecio) or trim($controlprecio)=='') {
				$mensajitoinv=$mensajitoinv."<br> El material  ".$this->codart."  No tiene registrado el control de precio en el centro  ".$this->codcen." , y almacen  ".$this->codalm."  Verifique los datos maestros ";

			} else {
				if(is_null($punitario)){  ///Si  es nulo quiere decir que no es  dato   y debemos jalra el precio del mismo  inventario
					if($suma_de_stocks_afectados_por_el_precio>0 ) {   //Si hay stock se toma el valor del inventario del mismo
						$punitario=$this->punit;
					} else { /// ups... pero q pasa si no hay stock
						if($controlprecio=='V') {
							$mensajitoinv=$mensajitoinv."<br> Para el material  ".$this->codart."  No tiene stocks sensibles  en el centro  ".$this->codcen." , y almacen  ".$this->codalm." y no se ha suminsitrado el precio unitario en el movimiento, no es posible asignar un precio ";
						} else { /// Si es ESTANDAR  'S' , CABALLEOR NOMAS SE RESPETA EL QUE SE EUCNEUTRAEN  INVENITARIO ASI NO HAYA STOCK
							$punitario=$this->punit;
						}
					}
				}
				if($controlprecio=='V') {
					echo " <br>";
					echo " <br>";
					echo " <br>";
					echo " <br>";
					echo " <br>";
					echo " <br>";
					echo " <br>";
					echo " <br>";
					echo " <br>";
					echo " <br>";
					echo " CALCULO DEL PRECIO UNITARIO  :  Ppreciounitario x Pcantidad   x conversion :    (". $punitario.")  x (".$cantidad.") x ( ".$conversion.")  :    ".$punitario*$cantidad*$conversion."<br>";
					echo "   this->punit x suma de stocks afectados  : (". $this->punit.")  x (".$suma_de_stocks_afectados_por_el_precio.")  : ".$this->punit*$suma_de_stocks_afectados_por_el_precio." <br>";
					echo "  vsuma_de_stocks_afectados_por_el_precio  +  this--cantidadmovida (denominador) : ".$suma_de_stocks_afectados_por_el_precio." +  ".$this->cantidadmovida."     :". ($suma_de_stocks_afectados_por_el_precio + $this->cantidadmovida)."   <br>";
					$this->punit=abs(( abs($punitario*$cantidad*$conversion)+$this->punit*$suma_de_stocks_afectados_por_el_precio)/($suma_de_stocks_afectados_por_el_precio + abs($this->cantidadmovida))); //da
					echo " Al final se calcula el precio unitario asi: ( abs(vpunitario*vcantidad*vconversion)+ vthis->punit*vsuma_de_stocks_afectados_por_el_precio   )/(vsuma_de_stocks_afectados_por_el_precio + abs(vthis->cantidadmovida))) :   ". $this->punit."  <br>";

				}

				///Si es "S" estandar actualiuzar solo el campo de  la diferencia unitaria
				if($controlprecio=='S')
					$this->punitdif= $this->cantidadmovida*($punitario-$this->punit)  /($suma_de_stocks_afectados_por_el_precio+$this->cantidadmovida);//ntidadmovida


				$this->montomovido= $punitario*$cantidad*$conversion;

				$this->{$nombrecampo_stock_a_incrementar_o_disminuir}=$stock_a_incrementar_o_disminuir + $this->cantidadmovida;
				//OBSERVE QUE EN EL CASO QUE SEA UN MOVIMIETO QUE REQUIERA TRASLADAR UN TIPO DE STOCK A OTRO EN EL MISMO ALMACEN
				//POR EJEMPLO SEPARAR MATERIALES PARA UN TRASLADO  (CANTLIBRE -> CANTTRAN)
				if(!is_null($nombrecampo_stock_destino))
					$this->{$nombrecampo_stock_destino}=$this->{$nombrecampo_stock_destino} - $this->cantidadmovida;


				echo "convenrsion  :". $conversion." <br>";
				echo "cantidad movida  $ this->cantidadmovida  :  ". $this->cantidadmovida." <br>";

				echo "monto movido $ this->montomovido :   ".$this->montomovido." <br>";
				echo "nombrecampo a incrementar o disminuir $ nombrecampo_stock_a_incrementar_o_disminuir  : ". $nombrecampo_stock_a_incrementar_o_disminuir." <br>";
				echo "Stockq ue cambia    (". $nombrecampo_stock_a_incrementar_o_disminuir.") : ".$this->{$nombrecampo_stock_a_incrementar_o_disminuir}." <br>";
				echo "suma de stocks  afectados por precio  : ".$suma_de_stocks_afectados_por_el_precio."    <br>";
				echo "precio unitario   $ this->punit   ". $this->punit." <br>";
				echo "precio unitario dif  $ this->punitdif : ". $this->punitdif." <br>";
				echo " movimiento (Dato del kardex) : ". $movimiento." <br>";
				echo "cantidad  (Dato del kardex) :".$cantidad." <br>";
				echo "unidad  (Dato del kardex): ". $unidad." <br>";
				echo "preciounit (Dato del kardex)  : ".$punitario." <br>";
				echo "Finalmente queda ASI <br>";
				echo "$ this->cantlibre :".$this->cantlibre." <br>";
				echo "$ this->cantres :".$this->cantres." <br>";
				echo "$ this->canttran :".$this->canttran." <br>";
				echo "$ this->cantlibre :".$this->cantlibre." <br>";
				echo "$ this->punit :".$this->punit." <br>";
				echo "$ this->punitdif :".$this->punitdif." <br>";
				echo "$ idkardex :".$idkardex." <br>";
				//  Yii::app()->end();
				//  $row->codmov,$row->cant,$row->um,$row->preciounit


				///Fin del CASE SITCW Del movimiento
			}  //Fin del else : Es un material que tiene control de precio




		}
		//}

		return $mensajitoinv;
	}

	public static function getTotalcant($provider)
	{
		$total=0;
		foreach($provider->data as $data)
		{
			$t = $data->cantlibre;
			$total += $t;
		}
		return $total;
	}

	public function search_por_codigo($codigo)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('codalm',$this->codalm,true);




		$criteria->compare('fechainicio',$this->fechainicio,true);
		$criteria->compare('fechafin',$this->fechafin,true);
		$criteria->compare('periodocontable',$this->periodocontable,true);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('codcen',$this->codcen,true);
		//$criteria->compare('um',$this->um,true);
		$criteria->compare('cantlibre',$this->cantlibre);
		$criteria->compare('canttran',$this->canttran);
		$criteria->compare('cantres',$this->cantres);
		$criteria->compare('ubicacion',$this->ubicacion,true);
		$criteria->compare('lote',$this->lote,true);
		$criteria->compare('siid',$this->siid,true);
		$criteria->compare('codmon',$this->codmon,true);
		$criteria->compare('punit',$this->punit,true);
		$criteria->compare('ssiduser',$this->ssiduser,true);
		$criteria->addcondition("codart='".$codigo."'");


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}








	}