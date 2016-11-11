<?php

class Docingresados extends ModeloGeneral
{
	
    CONST PARAM_TENENCIA_POR_DEFECTO='1012';
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Docingresados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public $d_fechain1=null;
        
        public function init(){
            $this->campoestado='cod_estado';
            
           /* $this->campossensibles=array(
                'tipodoc'=>array(self::ESTADO_REGISTRO_NUEVO,self::ESTADO_PREVIO,self::ESTADO_CREADO),
                'codlocal'=>array(self::ESTADO_REGISTRO_NUEVO,self::ESTADO_PREVIO,self::ESTADO_CREADO),
            'numero'=>array(self::ESTADO_PREVIO,self::ESTADO_CREADO),
                'cant'=>array(self::ESTADO_REGISTRO_NUEVO,self::ESTADO_PREVIO,self::ESTADO_CREADO),
            'um'=>array(self::ESTADO_REGISTRO_NUEVO,self::ESTADO_PREVIO,self::ESTADO_CREADO),
               // 'txtmaterial'=>array(SELF::ESTADO_PREVIO,SELF::ESTADO_CREADO),
           
                
                ); */
        }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{docu_ingresados}}';
	}

        public function behaviors()
	{
		return array(
			// Classname => path to Class
			'ActiveRecordLogableBehavior'=>
				'application.behaviors.ActiveRecordLogableBehavior',
                    
                    'imagenesjpg'=>array(
				'class'=>'ext.behaviors.TomaFotosBehavior',
                            '_codocu'=>'280',
                            '_ruta'=>yii::app()->settings->get('general','general_directorioimg'),
                            '_numerofotosporcarpeta'=>yii::app()->settings->get('general','general_nregistrosporcarpeta')+0,
                            '_extensionatrabajar'=>'.pdf',
                            '_id'=>$this->getPrimarykey(),
                                ),
                
                'parametros'=>array(
				'class'=>'ext.behaviors.ParametrosBehavior',
                            'nombrecampodocu'=>'tipodoc',
                             'nombrecampocentro'=>'codlocal',
                                ));
                
                    
                   
                
	}
        
        
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('monto', 'numerical'),
			array('monto', 'required','message'=>'Debes de llenar el monto'),
			array('codlocal', 'required','message'=>'Debes de llenar el centro'),
			array('numero', 'required','message'=>'Debes de llenar el numero'),
			array('codprov', 'required','message'=>'Llena el proveedor'),
			array('tipodoc', 'required','message'=>'Ingresa el tipo de documento'),
                   array('tipodoc', 'checktenencias'),
                    array('codtenencia', 'safe','on'=>'cambiotenencia'),
                   
                   // checktenencias
			array('codresponsable', 'required','message'=>'...Quien es el responsable?'),
			array('fecha', 'required','message'=>'...La fecha del documento?'),
			array('fechain', 'required','message'=>'...La fecha de ingreso?'),
			array('moneda', 'required','message'=>'...Que paso con la moneda?'),
			array('codepv', 'required','message'=>'...Que paso con la referencia?'),
			array('codprov', 'length', 'max'=>6),
			array('codprov', 'checkvalores'),
			array('correlativo', 'length', 'max'=>8),
			array('tipodoc, codepv, codgrupo', 'length', 'max'=>3),
			array('moneda', 'length', 'max'=>3),
			array('descorta', 'length', 'max'=>25),
			array('codresponsable', 'length', 'max'=>4),
			array('creadopor', 'length', 'max'=>23),
			array('creadoel', 'length', 'max'=>15),
			array('fecha,codteniente,docref,numero,codlocal, fechain,conservarvalor,codteniente, codtenencia, texv', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, codprov,conservarvalor, fecha, fechain, correlativo, tipodoc, moneda, descorta, codepv, monto, codgrupo, codresponsable, creadopor, creadoel, texv, docref', 'safe', 'on'=>'search'),
		);
	}

	
	public function checkvalores($attribute,$params) {
	   //verificando que se a el unico 
	    	//Comporbando si existen valores en los matchcodes
			
			//En el modelo transportista 
			$modeloprueba=Clipro::model()->find("codpro=:micodpro",array(":micodpro"=>is_null($this->codprov)?'':$this->codprov)) ;
			 if (is_null($modeloprueba )) 
			    $this->adderror('codprov','Esta empresa no existe');
			//En el modelo destinatario
							
	} 
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		
		return array(
			'clipro' => array(self::BELONGS_TO, 'Clipro', 'codprov'),
			'docus' => array(self::BELONGS_TO, 'Documentos', 'tipodoc'),
			'trabajador' => array(self::BELONGS_TO, 'Trabajadores', 'codresponsable'),
			'trabajador1' => array(self::BELONGS_TO, 'Trabajadores', 'codteniente'),
			'barcos'=> array(self::BELONGS_TO, 'Embarcaciones', 'codepv'),
                        'tenencias'=>array(self::BELONGS_TO, 'Tenencias', 'codtenencia'),
                        'procesosdocu'=>array(self::HAS_MANY, 'Procesosdocu', 'hiddoci'),
                     'procesoactivo'=>array(self::HAS_MANY, 'Procesosdocu','hiddoci','limit'=>'1','order'=>'id DESC'),
                    
                    
                    
                    
                    
		);
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codprov' => 'Remitente',
			'fecha' => 'Fecha Doc',
			'fechain' => 'Fecha ingreso',
			'correlativo' => ' Numero de ingreso',
			'tipodoc' => 'Documento',
			'moneda' => 'Moneda',
			'descorta' => 'Descripcion',
			'codepv' => 'Referencia',
			'monto' => 'Monto',
			'codgrupo' => 'Grupo',
			'codresponsable' => 'Responsable',
			'creadopor' => 'Creadopor',
			'creadoel' => 'Creadoel',
			'texv' => 'Detalle',
			'docref' => 'Referencia u OM',
			'codlocal' => 'Centro',
			'codteniente' => 'Apoderado',
				'conservarvalor' => 'Preservar valores ',
			'numero'=>'Numero Doc.',
		);
	}

	public $maximovalor;
	public $conservarvalor=0; //Opcionpa reaverificar si se quedan lo valores predfindos en sesiones 
	public function beforeSave() {
		if ($this->isNewRecord) {	// $this->creadoel=Yii::app()->user->name;
		$this->correlativo=Numeromaximo::numero($this->model(),'correlativo','maximovalor',8);
		$this->cod_estado='10';
		$this->codocu='280';
                //$this->codtenencia=$this->getparametro(self::PARAM_TENENCIA_POR_DEFECTO);
              // VAR_DUMP( $this->codtenencia);DIE();
               // if(is_null($this->codteniente))
               $this->codteniente= Yii::app()->user->getField('codtra');
                   
                $this->codtenencia=Configuracion::valor($this->codocu,
                    $this->codlocal, 
                    self::PARAM_TENENCIA_POR_DEFECTO);
              
                
                 }
                else{
                    
                                    
                    
                }
	return parent::beforeSave();
				}
	
	
	public function afterSave() {
	     if ($this->isNewRecord) {
		  $tenencia= Tenencias::model()->findByPk($this->codtenencia);
                 if(count($tenencia->tenenciaprocauto) >0 
                        and count($tenencia->tenenciastraba)>0)
                {
                   foreach($tenencia->tenenciastraba as $fila){
                       
                       if($fila->codtra==$this->codteniente){
                          if( !$this->procesarcorto(
                                   $fila->id,
                                   $tenencia->tenenciaprocauto[0]->id, 
                                   date("Y-m-d")))
                                  //die();
                           break;
                       }
                       
                   } 
                    
                }
									   		//$this->c_salida='1';
		} else
			{
										
										//$this->ultimares=" ".strtoupper(trim($this->usuario=Yii::app()->user->name))." ".date("H:i")." :".$this->ultimares;
			}
									return parent::afterSave();
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

		$criteria->compare('id',$this->id);
		$criteria->compare('codprov',$this->codprov,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('fechain',$this->fechain,true);
		$criteria->compare('correlativo',$this->correlativo,true);
		$criteria->compare('tipodoc',$this->tipodoc,true);
		$criteria->compare('moneda',$this->moneda,true);
		$criteria->compare('descorta',$this->descorta,true);
		$criteria->compare('codepv',$this->codepv,true);
		$criteria->compare('monto',$this->monto);
		$criteria->compare('codgrupo',$this->codgrupo,true);
		$criteria->compare('codresponsable',$this->codresponsable,true);


		$criteria->compare('texv',$this->texv,true);
		$criteria->compare('docref',$this->docref,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        /* funcio que verifica que exista un valor predefinoido por defual 
         * para TENENCIAS  en el momento de crear un documento
         *
         */
        public function checktenencias($attribute,$params) {
            $configuracion=Configuracion::valor($this->codocu,
                    $this->codlocal, 
                    self::PARAM_TENENCIA_POR_DEFECTO);
            if(is_null($configuracion))
            {
                $this->adderror('tipodoc','No existe una tenencia configurada para este centro  ( '.$this->codlocal.' )  y documento  (  '.$this->codocu.'    )  , agregue una por favor');
            }
            
            
            
           
            
            
            
        }
        
        
        public function procesarcorto($hidtra, $hidproc, $fecha){
            if(!$this->isNewRecord)
                $this->refresh();
                 $registro=New Procesosdocu('rapido');
            $registro->setAttributes(
                    array(
                        'hiddoci'=>$this->id,
         'fechanominal' =>$fecha,
	'hidtra'=>$hidtra,
	'hidproc'=>$hidproc,
                            )
                    );
            //ECHO "SALIO4";DIE();
           return ($registro->save());
           /* }else{
                ECHO "SALIO";DIE();
               return false; 
            }*/
           
            
        }
        
         public function colocaarchivox($fullFileName,$userdata=null) {
       // $filename=$fullFileName;
        
       // $path_parts = pathinfo($fullFileName);
       // var_dump($fullFileName); die();
      // Yii::log(' ejecutando '.serialize($fullFileName),'error');
      // var_dump(self::model()->findByPk((integer)$userdata)->id); die();
       self::model()->findByPk($userdata)->colocaarchivo($fullFileName);
       
    }
        
        
        
}