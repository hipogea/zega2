<?php
CONST ESTADO_PREVIO='99';
CONST ESTADO_CREADO='10';
CONST ESTADO_ANULADO='50';
//CONST ESTADO_MODIFICADO='50';
CONST ESTADO_ACEPTADO='30';
CONST ESTADO_CON_ENTREGAS='30';
CONST ESTADO_FACTURADO_PARCIAL='70';
CONST ESTADO_FACTURADO_TOTAL='40';


class Ocompra extends ModeloGeneral
{
	CONST ROL_AUTORIZACION_COMPRAS='TAREA_AUTORIZAR_COMPRAS'; //rOL DE AUTORIZACIOND E OMPRA PARA VER EL CHECKACCESS

	PUBLIC $resumen=array();

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Coti the static model class
	 */


         public function init(){
          $this->documento='210';
         
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
		return '{{ocompra}}';
	}

	public function behaviors()
	{
		return array(
			// Classname => path to Class
			'ActiveRecordLogableBehavior'=>
				'application.behaviors.ActiveRecordLogableBehavior',
		);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
				//array('codpro','required','message'=>'LLena el cliente'),
			array('moneda','exist','allowEmpty' => false, 'attributeName' => 'codmoneda', 'className' => 'Monedas','message'=>'Esta moneda no es valida'),
			array('codresponsable','exist','allowEmpty' => false, 'attributeName' => 'codigotra', 'className' => 'Trabajadores','message'=>'Este trabajador no existe'),
			array('codpro','exist','allowEmpty' => false, 'attributeName' => 'codpro','className' => 'Clipro','message'=>'Este proveedor no existe'),

			array('direcentrega','required','message'=>'Coloque una direccion de entrega'),
			array('tenorsup,tenorinf','chktenores','on'=>'update'),
			//array('tenorinf','required','message'=>'Coloque una direccion de entrega'),
			array('codresponsable','required','message'=>'Coloque un responsable de la compra'),
			array('descuento','numerical',
				'allowEmpty'=>true,
				'min'=>0,
				'max'=>99,
				'tooSmall'=>'Debe ser menor o igual a 0.5% ',
				'tooBig'=>'Debe de ser menor a 99% '),
				array('idcontacto','required','message'=>'No figura el contacto'),
				array('idcontacto','checkcontacto'),
				//array('moneda','required','message'=>'Indicar el tipo de moneda'),
				array('tipologia','required','message'=>'Indica el tipo de Compra'),
				array('codtipofac','required','message'=>'Falta indicar la forma de pago'),
				array('codsociedad','required','message'=>'Indica la sociedad'),
				array('codgrupoventas','required','message'=>'El grupo de ventas esta vacio'),
					array('tenorsup,tenorinf','required','message'=>'LLene los tenores'),
				//array('codcentro','required','message'=>'El centro esta vacio'),
				array('fechanominal','required','message'=>'Indica la fecha del documento'),
			//array('tipologia','in','range'=>range('S','T'),'message'=>'No es un tipo valido, ingresa T o S'),

			array('codestado','safe','on'=>'cambiaestado'),
			
			
			
			array('descuento', 'numerical', 'integerOnly'=>true),
			array('nigv, montototal', 'numerical'),
			array('numcot', 'length', 'max'=>12),
			array('numcot', 'checkitems','on'=>'update'),
			array('codpro','checkvalores'),
			array('codpro', 'length', 'max'=>6),
			array('codcon', 'length', 'max'=>5),
			//array('codestado, codtipofac', 'length', 'max'=>2),
			array('texto', 'length', 'max'=>40),
			array('tipologia, codsociedad, codtipocotizacion, tenorsup, tenorinf', 'length', 'max'=>1),
			array('moneda, coddocu, codgrupoventas, codobjeto', 'length', 'max'=>3),
			array('orcli', 'length', 'max'=>12),
			array('usuario', 'length', 'max'=>35),
			//array('creado, modificado, creadoel, modificadoel', 'length', 'max'=>20),
			//array('creadopor, modificadopor', 'length', 'max'=>25),
			array('textolargo,iduser,numcot,direcentrega,codresponsable,idreporte,coddocu' , 'safe'),
			//array('fechapresentacion','safe', 'on')
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('numcot,iduser, codpro,idcontacto, fecdoc, codcon, codestado, texto, textolargo, tipologia, moneda, orcli, descuento, usuario, coddocu,  codtipofac, codsociedad, codgrupoventas, codtipocotizacion, validez,  nigv, codobjeto, fechapresentacion, fechanominal, idguia, tenorsup, tenorinf, montototal', 'safe', 'on'=>'search'),
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
			//'codpro0' => array(self::BELONGS_TO, 'Contactos', 'codpro'),
			'estado' => array(self::BELONGS_TO, 'Estado', array('codestado'=>'codestado','coddocu'=>'codocu')),

			//'peticion_estado' => array(self::BELONGS_TO, 'Estado', 'codestado'),
			'codgrupoventas0' => array(self::BELONGS_TO, 'Grupoventas', 'codgrupoventas'),
			'sociedades' => array(self::BELONGS_TO, 'Sociedades', 'codsociedad'),
			'codtipofac0' => array(self::BELONGS_TO, 'Tipofacturacion', 'codtipofac'),
			'contactos' => array(self::BELONGS_TO, 'Contactos', 'idcontacto'),
			'codocu0' => array(self::BELONGS_TO, 'Tenores', 'coddocu'),
            'fpago'=>array(self::BELONGS_TO, 'Tipofacturacion', 'codtipofac'),
			'monedita' => array(self::BELONGS_TO, 'TMoneda', 'moneda'),
			'ocompra_tenorsup' => array(self::BELONGS_TO, 'Tenores', array('codsociedad'=>'sociedad','tenorsup'=>'posicion','coddocu'=>'coddocu') ),
            'ocompra_tenorinf' => array(self::BELONGS_TO, 'Tenores', array('codsociedad'=>'sociedad','tenorinf'=>'posicion','coddocu'=>'coddocu') ),

            'ocompra_documentos' => array(self::BELONGS_TO, 'Documentos', 'coddocu' ),
			'clientes' => array(self::BELONGS_TO, 'Clipro', 'codpro'),
            'ocompra_centros'=>array(self::BELONGS_TO, 'Centros', 'codcentro'),
			//'clientes' => array(self::HAS_MANY, 'Docompra', 'idguia'),
			'numeroitems'=>array(self::STAT, 'Docompratemp', 'hidguia'),//el campo foraneo
			'subtotal'=>array(self::STAT, 'Docompra', 'hidguia','select'=>'sum(t.punit*t.cant)','condition'=>'estadodetalle not IN '.Estado::listaestadosnocalculables("220").'  '),//el subtotal
			'subtotaltemp'=>array(self::STAT, 'Docompratemp', 'hidguia','select'=>'sum(t.punit*t.cant)','condition'=>'estadodetalle not IN '.Estado::listaestadosnocalculables("220").'  '),//el subtotal

			'itemmaximo'=>array(self::STAT, 'Docompratemp', 'hidguia','select'=>'max(item)'),//el mayor de los items

			'ocompra_docompra'=>array(self::HAS_MANY, 'Docompra', 'hidguia'),
			'detalle'=>array(self::HAS_MANY, 'Docompratemp', 'hidguia'),
			'detallefirme'=>array(self::HAS_MANY, 'Docompra', 'hidguia'),
			'responsable'=> array(self::BELONGS_TO, 'VwTrabajadores', 'codresponsable'),
			'responsable1'=> array(self::BELONGS_TO, 'Trabajadores', 'codresponsable'),
			'impuestos'=>array(self::HAS_MANY, 'Impuestosdocuaplicado','iddocu'),

			'valorimpuestos'=>array(self::STAT, 'Impuestosaplicados','hidocupadre','select'=>'sum(t.valor)'),
		//	'valorimpuestostemp'=>array(self::STAT, 'Tempimpuestosaplicados','hidocupadre','select'=>'sum(t.valor)'),
			//'peticion_estado' => array(self::BELONGS_TO, 'Estado', array('codestado'=>'codestado','codocu'=>'codocu')),
			'cant_solicitada'=>array(self::STAT, 'Alreserva', 'hidesolpe','select'=>'sum(t.cant)','condition'=>"estadoreserva <> '30' AND codocu IN ('800') "),//el campo foraneo
			'tempimpuestos'=>array(self::HAS_MANY,'Tempimpuestosdocuaplicados','iddocu'),
			'sumtempimpuestos'=>array(self::STAT,'Tempimpuestosdocuaplicados','iddocu','select'=>'sum(valorimpuesto)'),
			// 'ocompra_direcciones'=>array(self::HAS_MANY, 'Docompra', 'hidguia'),


		);
	}


    /* funion para verificar desde la OC, si ya hay un item de IDDESOLPE*/
    public function hayitemsolpe($iddesolpe,$idcompra) {  //como parametro el IDDSOLPE
        $matrizv=Docompratemp::model()->findAll("hidguia=:vidguia and    iddesolpe=:xido and idusertemp=:sesione",
            array(":vidguia"=>$idcompra,  ":sesione"=>Yii::app()->user->id,":xido"=>$iddesolpe));
        return (count($matrizv)==0)?false:true;


    }

public function editable() {
	$arregloestados=array(
		ESTADO_PREVIO,
		ESTADO_CREADO,

	);
	return in_array($this->codestado,$arregloestados);


}



	
	
	public function checkitems($attribute,$params) {
	    //  $matriz= Docomprat::model()->findAll("idsesion=:idsesionx",array("idsesionx"=>Yii::app()->user->getId())); 
		   if ($this->numeroitems==0)
			$this->adderror('numcot','Esta OC no tiene items');
           //VERIFICANDO QUE NO HAYA ITEMS CERO.
        for ($i=0; $i < count($matriz); $i++) {
                  if($matriz[$i]['cant']==0) {
                      $this->adderror('numcot','El item '.$matriz[$i]['item'].'  Tiene cantidad cero');
                      break;
                    }
            if($matriz[$i]['punit']==0) {
                $this->adderror('numcot','El item '.$matriz[$i]['item'].'  Tiene Precio cero');
                break;
            }

                                }
        }


	public function chktenores($attribute,$params) {
		if(is_null($this->codsociedad))
			$this->adderror('tenorsup','No ha especificado la sociedad');
		$criteria=new CDBcriteria;
		$criteria->addcondition("coddocu=:vcoddocu AND posicion=:vposicion and sociedad=:vsociedad");
		$criteria->params=array(":vcoddocu"=> $this->coddocu, ":vposicion"=>$this->tenorsup, ":vsociedad"=>$this->codsociedad);
		 if(is_null(Tenores::model()->find($criteria)))
		 $this->adderror('tenorsup','Este tenor no esta habilitado para este documento');
		$criteria->params=array(":vcoddocu"=> $this->coddocu, ":vposicion"=>$this->tenorinf, ":vsociedad"=>$this->codsociedad);
		if(is_null(Tenores::model()->find($criteria)))
			$this->adderror('tenorinf','Este tenor no esta habilitado para este documento');
	}


	public function checkcontacto($attribute,$params) {
	       $matriz= Contactos::model()->findAll("id=:idx and c_hcod=:vcdf",array(":vcdf"=>$this->codpro,":idx"=>$this->idcontacto));
		   if (count($matriz)==0)
		   {
				  		// if(!$this->codpro==$fila->c_hcod)
					   			$this->adderror('idcontacto','Este contacto no pertenece a la empresa '.$this->codpro.' o no existe ');

		   }




			}



		public function checkvalores($attribute,$params) {
	  	$modeloprueba=Clipro::model()->find("codpro=:micodpro",array(":micodpro"=>is_null($this->codpro)?'':$this->codpro)) ;
			 if (is_null($modeloprueba )) {
			    			$this->adderror('codpro','Este cliente no existe');										
												} else {
												}
			}




		/*public function valorespordefecto(){ 
						//Vamos a cargar los valores por defecto
						$matriz=VwOpcionesdocumentos::Model()->search_d('210')->getData();
						//recorreindo la matriz
						
						 $i=0;
					
							 for ($i=0; $i <= count($matriz)-1;$i++) {								
											     if ($matriz[$i]['tipodato']=="N" ) {
												$this->{$matriz[$i]['campo']}=!empty($matriz[$i]['valor'])?$matriz[$i]['valor']+0:'';
											     }ELSE {
												 $this->{$matriz[$i]['campo']}=!empty($matriz[$i]['valor'])?$matriz[$i]['valor']:'';
											   
											     }
												
												}		
					return 1;						
											
											
										
					}*/
						
						
public function Verificaservicio() {

}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'numcot' => 'Numero',
			'codpro' => 'Proveedor',
			'fecdoc' => 'Fec Comp',
			'codcon' => 'Contacto',
			'codestado' => 'Estado',
			'texto' => 'Comentario',
			'textolargo' => 'Comentario',
			'tipologia' => 'Tipo',
			'moneda' => 'Moneda',
			'orcli' => 'Cotizac Prov',
			'descuento' => 'Desc (%)',
			//'usuario' => 'Usuario',
			//'coddocu' => 'Coddocu',
			'creado' => 'Creado',
            'creadoel' => 'F. crea',
			'modificado' => 'Modificado',

			'codtipofac' => 'F. pago',
			'codsociedad' => 'Sociedad',
			'codgrupoventas' => 'Gr. Compras',
			'codtipocotizacion' => 'Tipo',
			'validez' => 'Validez',
			'codcentro' => 'Centro',
			'nigv' => 'IGV',
			'codobjeto' => 'Refer',
			'fechapresentacion' => 'Fec Pre',
			'fechanominal' => 'Fec Oc',
			'idguia' => 'Idguia',
			'tenorsup' => 'Tenorsup',
			'tenorinf' => 'Tenorinf',
			'montototal' => 'Montototal',
			'idcontacto'=>'Contacto',
		);
	}

public function actualizadescuento($valordesc){
	if (is_null($valordesc) or empty($valordesc))
	{$valordesc=0;}else{
		if($valordesc<0)
			$valordesc=0;
		if($valordesc>99.99)
			$valordesc=99.99;
		$valordesc=($valordesc+0);
	}

	$filashijas=$this->detalle;
	$contador=0;
	foreach($filashijas as $fila){
		   $fila->setScenario('descuento');
			$fila->punitdes=$fila->punit*(1-$valordesc/100);
		    if($fila->save())
				$contador+=1;

	    }
	echo " grabo ".$contador."  veces ".$valordesc;
}	

public function actualizaimpuestos(){
	$items=$this->detallefirme;
	foreach($items as $item) {
		$filashijas = $this->impuestos;
		foreach ( $filashijas as $fila ) {
			$item->colocaimpuesto($fila->codimpuesto);
		}
	}
 }
	
//devuel un array de ids de impuestos aplicados al modelo
public function impuestosaplicados(){
	return array();

	/*return MiFactoria::arrayColumnaSQL(Impuestosdocuaplicado::model()->tableName(),
		'codimpuesto',
	    ARRAY("iddocu=:vidocu  AND codocu=:vcodocu"),
	   ARRAY(":vidocu "=>$this->idguia,":vcodocu"=>$this->coddocu),
		);*/
}

	
public function agregaopcionimpuestos($codimpuesto=null)
{
		
		if(is_null($codimpuesto)){
			$impuestos = Impuestosdocu::model ()->findAll ( "codocu=:vcodocu AND obligatorio='1' " , array ( ":vcodocu" =>$this->coddocu ));
		
		}else {
			  $impuestos = Impuestosdocu::model ()->findAll ( "codocu=:vcodocu AND codimpuesto=:vcodimpuesto" , array ( ":vcodocu" =>$this->coddocu ,":vcodimpuesto" =>$codimpuesto ));
		
		}
		/*var_dump($this->coddocu);*/
		/*print_r($impuestos);
			yii::app()->end();*/
		
		foreach($impuestos as $fila) {
			$criter=new CDBCriteria;
			$criter->addcondition("codocu=:vcodocu AND codimpuesto=:vcodimpuesto AND iddocu=:viddocu ");
			$criter->params=array(":vcodocu"=>$this->coddocu,":vcodimpuesto"=>$fila->codimpuesto ,":viddocu"=>$this->idguia);
			if(is_null(Impuestosdocuaplicado::model()->find($criter))){
				$modelo=new Impuestosdocuaplicado();
				$modelo->codocu=$this->coddocu;
				$modelo->codimpuesto=$fila->codimpuesto;
				$modelo->iddocu=$this->idguia;
				$modelo->valorimpuesto= Valorimpuestos::getimpuesto ($fila->codimpuesto );

				IF(!$modelo->save())
					throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'   '.__LINE__.' NO SE GRABO EL IMPUESTOS ');

			}

			
		}
		

}
	
	
	public function afterSave() {

							   //   $this->agregaopcionimpuestos();
									return parent::afterSave();
				}
	
	
	
public $maximovalor;

	public function beforeSave() {
							if ($this->isNewRecord) {
									
									//buscano el igv
									//$this->nigv=Igv::model()->findByPk(1)->valor;
									//
									$this->codestado='99';
									$this->coddocu='210';
									$this->fecdoc=date("Y-m-d");
									//$this->agregaopcionimpuestos();
									


									///$this->usuario=Yii::app()->user->name;
											
									  
										//	$this->c_salida='1';
											//$command = Yii::app()->db->createCommand(" select nextval('sq_guias') "); 											
											//$this->n_guia= $command->queryScalar();
											//$this->codestado='99'; //para que no lo agarre la vista VW-GUIA  HASTA QUE GRABE TODO EL DETALLE
									} else
									{
										 IF ($this->numcot===null) {
												//$this->codestado=ESTADO_CREADO;

                                            /* $gg=new Numeromaximo;
                                             $this->numcot=$gg->numero($this,'correlativ','maximovalor',5,'coddocu');


													//$this->numcot=Numeromaximo::numero($this->model(),'numcot','maximovalor',8);
                                             */

                                            	// $this->creadoel=''.date("Y-m-d H:i:s");
											 	$this->numcot=$this->correlativo('numcot');
											
											}	//$this->ultimares=" ".strtoupper(trim($this->usuario=Yii::app()->user->name))." ".date("H:i")." :".$this->ultimares;
									}
									return parent::beforeSave();
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

		$criteria->compare('numcot',$this->numcot,true);
		$criteria->compare('codpro',$this->codpro,true);
		$criteria->compare('fecdoc',$this->fecdoc,true);
		$criteria->compare('codcon',$this->codcon,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('textolargo',$this->textolargo,true);
		$criteria->compare('tipologia',$this->tipologia,true);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('moneda',$this->moneda,true);
		$criteria->compare('orcli',$this->orcli,true);
		$criteria->compare('descuento',$this->descuento);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('coddocu',$this->coddocu,true);
		$criteria->compare('creado',$this->creado,true);
		$criteria->compare('modificado',$this->modificado,true);




		$criteria->compare('codtipofac',$this->codtipofac,true);
		$criteria->compare('codsociedad',$this->codsociedad,true);
		$criteria->compare('codgrupoventas',$this->codgrupoventas,true);
		$criteria->compare('codtipocotizacion',$this->codtipocotizacion,true);
		$criteria->compare('validez',$this->validez);
		$criteria->compare('codcentro',$this->codcentro,true);
		$criteria->compare('nigv',$this->nigv);
		$criteria->compare('codobjeto',$this->codobjeto,true);
		$criteria->compare('fechapresentacion',$this->fechapresentacion,true);
		$criteria->compare('fechanominal',$this->fechanominal,true);
		$criteria->compare('idguia',$this->idguia,true);
		$criteria->compare('tenorsup',$this->tenorsup,true);
		$criteria->compare('tenorinf',$this->tenorinf,true);
		$criteria->compare('montototal',$this->montototal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function findByNumero($numero){
		$numero=(string)MiFactoria::cleanInput($numero);
		return self::model()->find("numcot=:vnumcot",array(":vnumcot"=>$numero));

	}

	//verifica si esta OC tiene facturas presentadas
	public  function tieneentregas(){
		$valor=false;
       foreach($this->detalle as $filadetalle){
		   if($filadetalle->tieneentregas()){$valor=true;break;}
	   		}
		return $valor;
	}

	//verifica si esta OC tiene facturas presentadas
	public  function tienefacturacion(){
		$valor=false;
		foreach($this->detalle as $filadetalle){
			if($filadetalle->tienefacturacion()){$valor=true;break;}
		}
		return $valor;
	}

	private function criteriofiltro (){
		$criterio=New CDBCriteria();
		$criterio->addCondition('codestado',array(ESTADO_PREVIO,ESTADO_ANULADO)) ;
		$criterio->addNotInCondition('codestado',array(ESTADO_PREVIO,ESTADO_ANULADO)) ;

	}
	public static function historicoprecios($codart,$codpro=null,$codcen=null,$limit=null){
		$codart=MiFactoria::cleanInput($codart);
                //var_dump($codart);var_dump($codpro);var_dump($codcen);die();
		/******
		 *
		 * funcioque regresa un data provider de datos de precios para un material especificado
		 */
  if($limit===null)$limit=10;
		if(is_null($codart) and
			is_null($codpro) and
			is_null($codcen) )
			$rawData=array();

		if(!is_null($codart) and
			is_null($codpro) and
			is_null($codcen) ){
			$codart=MiFactoria::cleanInput($codart);
			$rawData = Yii::app()->db->createCommand()
				->selectDistinct('a.numcot,a.codpro,a.moneda,a.fecdoc,b.codentro,b.codigoalma,b.codart,b.punit,b.um,y.desum as desumbase,z.desum as desum
				    ,c.descripcion,c.um as umbase')
				->from('{{ocompra}} a ,{{docompra b}},{{alentregas}} x,{{maestrocomponentes}} c,{{ums}} z,{{ums}} y ')
				->limit($limit)
				->where(
					"a.idguia=b.hidguia and b.id=x.iddetcompra and b.codart=c.codigo
					and c.um=y.um and b.um =z.um and b.codart=:vcodigo",
					array(":vcodigo" => $codart))
				->order("a.fecdoc DESC")
				->queryAll();
		}

		if(!is_null($codart) and
			is_null($codpro) and
			!is_null($codcen) ){
			$codart=MiFactoria::cleanInput($codart);
			$codcen=MiFactoria::cleanInput($codcen);
			$rawData = Yii::app()->db->createCommand()
				->selectDistinct('f.despro,a.numcot,a.codpro,a.moneda,a.fecdoc,b.codentro,b.codigoalma,b.codart,b.punit,b.um,y.desum as desumbase,z.desum as desum
				    ,c.descripcion,c.um as umbase')
				->from('{{ocompra}} a ,{{docompra b}},{{alentregas}} x,{{maestrocomponentes}} c,{{ums}} z,{{ums}} y ,{{clipro}} f')
				->limit($limit)
				->where(
					"f.codpro=a.codpro and a.idguia=b.hidguia and b.id=x.iddetcompra and b.codart=c.codigo
					and c.um=y.um and b.um =z.um and b.codart=:vcodigo and b.codentro=:vcentro ",
					array(":vcodigo" => $codart,":vcentro"=>$codcen))
				->order("a.fecdoc DESC")
				->queryAll();
		}

		if(!is_null($codart) and
			!is_null($codpro) and
			is_null($codcen) ){
			$codart=MiFactoria::cleanInput($codart);
			$codpro=MiFactoria::cleanInput($codpro);
			$rawData = Yii::app()->db->createCommand()
				->selectDistinct('f.despro,a.numcot,a.codpro,a.moneda,a.fecdoc,b.codentro,b.codigoalma,b.codart,b.punit,b.um,y.desum as desumbase,z.desum as desum
				    ,c.descripcion,c.um as umbase')
				->from('{{ocompra}} a ,{{docompra b}},{{alentregas}} x,{{maestrocomponentes}} c,{{ums}} z,{{ums}} y ,{{clipro}} f')
				->limit($limit)
				->where(
					" f.codpro=a.codpro,a.idguia=b.hidguia and b.id=x.iddetcompra and b.codart=c.codigo
					and c.um=y.um and b.um =z.um and b.codart=:vcodigo and a.codpro=:vcodpro ",
					array(":vcodigo" => $codart,":vcodpro"=>$codpro))
				->order("a.fecdoc DESC")
				->queryAll();
		}

		if(!is_null($codart) and
			!is_null($codpro) and
			!is_null($codcen) ){
			$codart=MiFactoria::cleanInput($codart);
			$codpro=MiFactoria::cleanInput($codpro);
			$codcen=MiFactoria::cleanInput($codcen);
			$rawData = Yii::app()->db->createCommand()
				->selectDistinct('f.despro,a.numcot,a.codpro,a.moneda,a.fecdoc,b.codentro,b.codigoalma,b.codart,b.punit,b.um,y.desum as desumbase,z.desum as desum
				    ,c.descripcion,c.um as umbase')
				->from('{{ocompra}} a ,{{docompra b}},{{alentregas}} x,{{maestrocomponentes}} c,{{ums}} z,{{ums}} y ,{{clipro}} f')
				->limit($limit)
				->where(
					"f.codpro=a.codpro and a.idguia=b.hidguia and b.id=x.iddetcompra and b.codart=c.codigo
					and c.um=y.um and b.um =z.um and b.codart=:vcodigo and a.codpro=:vcodpro and b.codentro=:vcentro ",
					array(":vcodigo" => $codart,":vcodpro"=>$codpro,":vcentro"=>$codcen))
				->order("a.fecdoc DESC")
				->queryAll();
                      
		}


				//$cr=$this->criterimp($codocu,$idocu);
		if(!is_null($codpro)){
			$codpro=MiFactoria::cleanInput($codpro);
			$rawData=Yii::app()->db->createCommand()
				->selectDistinct('a.numcot,a.codpro,a.moneda,a.fecdoc,b.codentro,b.codigoalma,b.codart,b.punit,b.um,y.desum as desumbase,z.desum as desum
				    ,c.descripcion,c.um as umbase')
				->from('{{ocompra}} a ,{{docompra b}},{{alentregas}} x,{{maestrocomponentes}} c,{{ums}} z,{{ums}} y ')
				->where(
					"a.idguia=b.hidguia and b.id=x.iddetcompra and b.codart=c.codigo
					and c.um=y.um and b.um =z.um and b.codart=:vcodigo and a.codpro=:vcodpro",
					array(":vcodigo"=>$codart,":vcodpro"=>$codpro)
				)->queryAll();

		}


			//return  $rawData;

			return new CArrayDataProvider
			($rawData,
				array(
					'sort'=>array(
						'attributes'=>array(
							'despro','codpro','numcot', 'moneda','fecdoc','codentro','codigoalma','codart','punit', 'umbase','um','desum','desumbase','descripcion',
						),
					),

				)
			);
		}

public static  function puedeautorizar(){
	//echo self::ROL_AUTORIZACION_COMPRAS;
	return yii::app()->user->checkAccess(self::ROL_AUTORIZACION_COMPRAS);
}

	 public function estaatendida(){
		 //Asumimos que no esta atendida
		 $atendida=false;
		 $hijos=$this->detallefirme;
		 foreach($hijos as $fila){
			 if($fila->cantidadentregada >=$fila->cant and $fila->estadodetalle!=ESTADO_DETALLE_ANULADO)
			 {$atendida=true;
			}else{$atendida=false;
				 break;
			 }

		 }
		 return $atendida;
	 }

public function total($controlador){
	return $this->valorimpuestos+$this->subtotal($controlador)-$this->subtotal($controlador)*$this->descuento/100;
}

public function subtotal($controlador){
	if(get_parent_class($controlador)=='ControladorBase'){
		if($controlador->estasEnSesion($this->idguia)){
           // ECHO $this->subtotaltemp;
			return $this->subtotaltemp;

		} ELSE{

			return $this->subtotal;

		}
	}ELSE{
		throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'   '.__LINE__.' Debe des usar esta funcion , bajo un controlador derivaod de la clase CONTROLADOR BASE '.get_parent_class($controlador));

	}

}

	public function impuestos($controlador){
		if(get_parent_class($controlador)=='ControladorBase'){
			if($controlador->estasEnSesion($this->idguia)){
				// ECHO $this->subtotaltemp;
				return $this->sumtempimpuestos*$this->neto($controlador);

			} ELSE{

				return $this->valorimpuestos;

			}
		}ELSE{
			throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'   '.__LINE__.' Debe des usar esta funcion , bajo un controlador derivaod de la clase CONTROLADOR BASE '.get_parent_class($controlador));

		}

	}


	public function totaldescuento($controlador){
		return $this->subtotal($controlador)*$this->descuento/100;
	}
	public function neto($controlador){
		return $this->subtotal($controlador)*(1-$this->descuento/100);
	}

public function refrescaresumen($controlador){
		//$arreglo=array();
	     $this->resumen[0]['param']='Subtotal';
		$this->resumen[0]['valor']=$this->subtotal($controlador);
		$this->resumen[1]['param']='Descuento';
		$this->resumen[1]['valor']=$this->totaldescuento($controlador);
		$this->resumen[2]['param']='Neto';
		$this->resumen[2]['valor']=$this->neto($controlador);
		$this->resumen[3]['param']='Impuestos';
		$this->resumen[3]['valor']=$this->impuestos($controlador);
		$this->resumen[4]['param']='Total';
		$this->resumen[4]['valor']=$this->total($controlador);


         }
   public function proveedorresumen($controlador){
	   $this->refrescaresumen($controlador);
	 return  new CArrayDataProvider($this->resumen,array('keyField' => 'param'));

              }
              
          
              
}