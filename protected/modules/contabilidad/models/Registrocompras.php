<?php


class Registrocompras extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
    
    const COD_IGV='100';
    const COD_ISC='300';
    public $camposfechas=array('femision','fvencimiento');
    //const MONEDA_REPORTE = yii::app()->settings->get('general','general_monedadef');
	
    public function init(){
        $this->documento='760';
        }
        
    ///CAMPOS PARES CON EL LIBRO DIARIO
        //  campodoc=>campolibrodiario en ese orden
    public $array_map_camposlibro=array(            
           'glosa'=>'glosa',
             'iduser'=>'iduser',
               'codocu'=>'codocu',
                 'idkey'=>'idkey',
                 'numerocomprobante'=>'docref',
                'id'=>'hidasiento'
          ); 
    
    public function tableName()
	{
		return '{{registrocompras}}';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	
        public function behaviors()
	{
		return array(
			                    
                    'tablasunat'=>array(
				'class'=>'contabilidad.behaviors.tablasSunatBehavior',
                                                           ),
                 'docucontable'=>array(
				'class'=>'contabilidad.behaviors.formatoNumeroBehavior',
                                                           ),
               );
                
                
                    
                   
                
	}
        
        public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    
                    
                    //para toods elos escenarios 
                    
                    array('femision','checkfecha'),
                    array('numerodocid','checkdoc'),
                   // array('hidperiodo','safe'),
                    //array('hidperiodo','required'),
                    
                    
                    
                    //ESCENARIO PARA COMRA DE SERVICIOS
                    /*--
                     * --mayor a 700 soles SE COBRA DETRACCION
                     * --puede ser 
                     * 
                     * 
                     * 
                     */
                    
                   // array('iduser,idkey,codocu,codcuenta', 'on'=>'temporal'),
			
                    
                    
                     //array('codmon','safe'),
                    ///compra local
                    array('femision, fvencimiento, tipo, numerocomprobante,'
                        . ' tipodocid, numerodocid, razpronombre, baseimpnograv, '
                        . 'igvnograv, isc, otrostributos, importetotal, numerodocnodomiciliado,codmon, '
                        . 'numconstdetraccion, fechaemidetra, tipocambio, reffechaorigen, reftipo,tipgrabado, '
                        . 'refserie, glosa,refnumero,importe,iduser,idkey, fechacre, socio, hidperiodo,codocuref,numdocref,hidref,hidcaja','safe', 'on'=>'ins_compralocal,upd_compralocal'),
			
                     array('femision,hidperiodo, tipo,glosa, numerocomprobante,codmon,'
                        . ' tipodocid, serie,esservicio,numerodocid, razpronombre,importe,tipgrabado,  '
                       . 'socio','required', 'on'=>'ins_compralocal,upd_compralocal'),
                    
                    
                    
			//array('femision, fvencimiento, tipo, codaduana, annodua, numerocomprobante, tipodocid, numerodocid, razpronombre, expobaseimpgrav, expigvgrav, expbaseimpnograv, expigvnograv, baseimpnograv, igvnograv, isc, otrostributos, importetotal, numerodocnodomiciliado, numconstdetraccion, fechaemidetra, tipocambio, reffechaorigen, reftipo, refserie, refnumero, fechacre, socio, hidperiodo', 'required'),
			array('hidperiodo', 'numerical', 'integerOnly'=>true),
			array('expobaseimpgrav, expigvgrav, expbaseimpnograv, expigvnograv, baseimpnograv, igvnograv, isc, otrostributos, importetotal, tipocambio', 'numerical'),
			array('femision, fvencimiento, annodua, fechaemidetra, reffechaorigen', 'length', 'max'=>10),
			array('tipo, codaduana, tipodocid, reftipo', 'length', 'max'=>3),
			array('numerocomprobante, numerodocnodomiciliado, numconstdetraccion, refnumero', 'length', 'max'=>20),
			array('numerodocid', 'length', 'max'=>15),
			array('razpronombre', 'length', 'max'=>100),
			array('refserie', 'length', 'max'=>4),
			array('socio', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, femision, fvencimiento, tipo, codaduana, annodua, numerocomprobante, tipodocid, numerodocid, razpronombre, expobaseimpgrav, expigvgrav, expbaseimpnograv, expigvnograv, baseimpnograv, igvnograv, isc, otrostributos, importetotal, numerodocnodomiciliado, numconstdetraccion, fechaemidetra, tipocambio, reffechaorigen, reftipo, refserie, refnumero, fechacre, socio, hidperiodo', 'safe', 'on'=>'search'),
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
                   //'sunat_tabla_10' => array(self::BELONGS_TO, array('tipo'=>'codigo'),'condition'=>"codocuref in('890','891')" ),
		   // 'sunat_tabla_2' => array(self::BELONGS_TO,'Sunatmaster', array('tipodocid'=>'codigo','tabla2'=>'codsunat') ),
                     //'sunat_tabla_10' => array(self::BELONGS_TO,'Sunatmaster', array('tipo'=>'codigo','tabla10'=>'codsunat') ),
                     //'sunat_tabla_11' => array(self::BELONGS_TO,'Sunatmaster', array('codaduana'=>'codigo','tabla11'=>'codsunat') ),
		 //'sunat_tabla_10_2' => array(self::BELONGS_TO, 'Tablassunat', array('reftipo'=>'codigo','tabla10'=>'codsunat') ),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'femision' => 'F .Emi',
			'fvencimiento' => 'F Venc',
			'tipo' => 'Tipo',
			'codaduana' => 'C Adua',
			'annodua' => 'A DUA',
			'numerocomprobante' => 'N Comprob',
			'tipodocid' => 'Tip Doc',
			'numerodocid' => 'N Doc',
			'razpronombre' => 'Razon',
			'expobaseimpgrav' => 'Base Imp',
			'expigvgrav' => 'IGV',
			'expbaseimpnograv' => 'Base Imp',
			'expigvnograv' => 'IGV',
			'baseimpnograv' => 'Base Imp',
			'igvnograv' => 'IGV',
			'isc' => 'Isc',
			'otrostributos' => 'Otros tributos',
			'importetotal' => 'Total',
			'numerodocnodomiciliado' => 'N nodomic',
			'numconstdetraccion' => 'N Const Det',
			'fechaemidetra' => 'F det',
			'tipocambio' => 'Cambio',
			'reffechaorigen' => 'Reffechaorigen',
			'reftipo' => 'Reftipo',
			'refserie' => 'Refserie',
			'refnumero' => 'Refnumero',
			'fechacre' => 'Fechacre',
			'socio' => 'Socio',
			'hidperiodo' => 'Hidperiodo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('id',$this->id,true);
		$criteria->compare('femision',$this->femision,true);
		$criteria->compare('fvencimiento',$this->fvencimiento,true);
		$criteria->compare('tipo',$this->tipo,true);
		//$criteria->compare('codaduana',$this->codaduana,true);
		//$criteria->compare('annodua',$this->annodua,true);
		$criteria->compare('numerocomprobante',$this->numerocomprobante,true);
		$criteria->compare('tipodocid',$this->tipodocid,true);
		$criteria->compare('numerodocid',$this->numerodocid,true);
		$criteria->compare('razpronombre',$this->razpronombre,true);
		/*$criteria->compare('expobaseimpgrav',$this->expobaseimpgrav);
		$criteria->compare('expigvgrav',$this->expigvgrav);
		$criteria->compare('expbaseimpnograv',$this->expbaseimpnograv);
		$criteria->compare('expigvnograv',$this->expigvnograv);
		$criteria->compare('baseimpnograv',$this->baseimpnograv);
		$criteria->compare('igvnograv',$this->igvnograv);
		$criteria->compare('isc',$this->isc);
		$criteria->compare('otrostributos',$this->otrostributos);
		$criteria->compare('importetotal',$this->importetotal);
		$criteria->compare('numerodocnodomiciliado',$this->numerodocnodomiciliado,true);
		$criteria->compare('numconstdetraccion',$this->numconstdetraccion,true);
		$criteria->compare('fechaemidetra',$this->fechaemidetra,true);
		$criteria->compare('tipocambio',$this->tipocambio);
		$criteria->compare('reffechaorigen',$this->reffechaorigen,true);
		$criteria->compare('reftipo',$this->reftipo,true);
		$criteria->compare('refserie',$this->refserie,true);
		$criteria->compare('refnumero',$this->refnumero,true);
		$criteria->compare('fechacre',$this->fechacre,true);
		$criteria->compare('socio',$this->socio,true);
		$criteria->compare('hidperiodo',$this->hidperiodo);
*/
                 if((isset($this->femision) && trim($this->femision) != "") && (isset($this->femision1) && trim($this->femision1) != ""))  {
		             //  $limite1=date("Y-m-d",strotime($this->d_fectra)-24*60*60); //UN DIA MENOS 
					 //  $limite2=date("Y-m-d",strotime($this->d_fectra)+24*60*60); //UN DIA mas 
		 
                        $criteria->addBetweenCondition('femision', ''.$this->femision.'', ''.$this->femision1.'');
						
						}
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Registrocompras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
         public function beforesave(){
            if(!$this->isNewRecord){
                $this->fechacre=date("Y-m-d H:i:s");
                $this->tipocambio=yii::app()->tipocambio->getventa(yii::app()->settings->get('general','general_monedadef'));
                
            }
            
            
            
            
                if($this->cambiomonto() or $this->isNewRecord){
                    $igv=yii::app()->impuestos->getImpuesto(self::COD_IGV);
                    //array(', expigvgrav,  expigvnograv,  igvnograv, isc,  importetotal  expbaseimpnograv'),			
                    $this->expigvgrav=$igv*$this->expobaseimpgrav;
                    $this->expigvnograv=$igv*$this->expbaseimpnograv;
                     $this->igvnograv=$igv*$this->baseimpnograv;
                     unset($igv);
                     $this->isc=yii::app()->impuestos->getImpuesto(self::COD_ISC)*$this->baseimpnograv;
                }
                
                return parent::beforesave();
           // }
        }
        public function cambiomonto(){
       
                
                return    ( 
                           ($this->isAttributeSafe('expobaseimpgrav') and $this->cambiocampo('expobaseimpgrav')) or
                           ($this->isAttributeSafe('baseimpnograv') and $this->cambiocampo('baseimpnograv')) or                          
                           ($this->isAttributeSafe('expbaseimpnograv') and $this->cambiocampo('expbaseimpnograv')) or
                           ($this->isAttributeSafe('otrostributos') and $this->cambiocampo('otrostributos'))
                           ) ? true:false;
			 
        }
        
       public static function insertaregistrocompra($escenario,$arraycampos){
           $registro=self::model();
           $registro->setScenario($escenario);
           $registro->setAttributes($arraycampos);
          if($registro->save()){
              return 1;
          }else{
              return yii::app()->mensajes->getErroresItem($registro->geterrors());
          }
           
       } 
       
       
   public function checkfecha($attribute,$params) {
       if(!yii::app()->periodo-> estadentroperiodo($this->femision,false,$this->hidperiodo))
       //if(is_null($this->hidperiodo))
          // $this->adderror('hidperiodo','Debe de especificar el periodo, es un valor nulo'); 
      // if(!yii::app()->periodo->estadentrodefechas($this->femision,$this->fechacontable,$this->fvencimiento))
               $this->addError ('femision', 'Revise la fecha de emisión no coindide con el periodo ');
	
      }
      
      public function checkdoc($attribute,$params) {
          $resultado=$this->validaNumerosDoc($this->tipodocid,$this->numerodocid);
         // var_dump($resultado);die();
          if(is_array($resultado))
            $this->addError ('numerodocid', $resultado['mal']);
	
      }
      
      /*
       * Esta funcion coge el registro de caja chica para incoprpralo a los de compras 
       */
      public static function cogeCajaChica($id){
          if(is_null(self::model()->find("hidcaja=:vhidcaja",array(":vhidcaja"=>$id)))){
          $dcaja= Dcajachica::model()->findByPk($id);
          if(!is_null($dcaja)){
             $regcompra=New Registrocompras('ins_compralocal'); 
             $regcompra->setAttributes(
                          array(
                              'socio'=>$dcaja->cabecera->fondo->socio,
                              'femision'=>$dcaja->fecha,
                               'numerocomprobante'=>$dcaja->referencia,
                               'razpronombre'=>$dcaja->razon,
                              'hidperiodo'=>yii::app()->periodo->getperiodo(),
                               'tipodocid'=>$dcaja->tipodocid,
                               'numerodocid'=>$dcaja->numdocid,
                              'glosa'=>$dcaja->glosa,
                               'codmon'=>$dcaja->monedahaber,
                               'importe'=>$dcaja->haber,
                              'serie'=>$dcaja->serie,
                               'esservicio'=>$dcaja->esservicio,
                               'tipo'=>$dcaja->codocu,
                              'tipgrabado'=>'1',
                              'hidcaja'=>$dcaja->id,
                          )
                             );
             $grabo=$regcompra->save();
             //if(!$grabo)
                 //print_r(yii::app()->mensajes->getErroresItem($regcompra->geterrors()));
                  //die();
            return ($grabo)?$regcompra:null;
          }else{
              return null;
          }
          }  
      }
}
