<?php

class Docingresados extends ModeloGeneral
{
	
    CONST PARAM_TENENCIA_POR_DEFECTO='1012';
    CONST PARAMETRO_TITULO_CORREO_PEDIDO='1248';
    CONST PARAMETRO_CONFIRMAR_LECTURA_CORREO='1247';
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
            $this->documento='280';
            
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
			array('monto', 'numerical','on'=>'insert,update'),
			array('monto', 'required','message'=>'Debes de llenar el monto','on'=>'insert,update'),
			array('codlocal', 'required','message'=>'Debes de llenar el centro','on'=>'insert,update'),
			array('numero', 'required','message'=>'Debes de llenar el numero','on'=>'insert,update'),
			array('codprov', 'required','message'=>'Llena el proveedor','on'=>'insert,update'),
			array('tipodoc', 'required','message'=>'Ingresa el tipo de documento','on'=>'insert,update'),
                   array('tipodoc', 'checktenencias','on'=>'insert,update'),
                    array('codtenencia', 'safe','on'=>'cambiotenencia'),
                   
                   // checktenencias
			array('codresponsable', 'required','message'=>'...Quien es el responsable?','on'=>'insert,update'),
			array('fecha', 'required','message'=>'...La fecha del documento?','on'=>'insert,update'),
			array('fechain', 'required','message'=>'...La fecha de ingreso?','on'=>'insert,update'),
			array('moneda', 'required','message'=>'...Que paso con la moneda?','on'=>'insert,update'),
			array('codepv', 'required','message'=>'...Que paso con la referencia?','on'=>'insert,update'),
			array('codprov', 'length', 'max'=>6,'on'=>'insert,update'),
			array('codprov', 'checkvalores','on'=>'insert,update'),
			array('correlativo', 'length', 'max'=>8,'on'=>'insert,update'),
			array('tipodoc, codepv, codgrupo', 'length', 'max'=>3,'on'=>'insert,update'),
			array('moneda', 'length', 'max'=>3,'on'=>'insert,update'),
			array('descorta', 'length', 'max'=>25,'on'=>'insert,update'),
			array('codresponsable', 'length', 'max'=>4,'on'=>'insert,update'),
			array('creadopor', 'length', 'max'=>23,'on'=>'insert,update'),
			array('creadoel', 'length', 'max'=>15,'on'=>'insert,update'),
			array('fecha,montomoneda,codteniente,docref,numero,codlocal, fechain,conservarvalor,codteniente, codtenencia, texv', 'safe','on'=>'insert,update'),
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
			'centros'=>array(self::BELONGS_TO, 'Centros', 'codlocal'),
			'clipro' => array(self::BELONGS_TO, 'Clipro', 'codprov'),
			'docus' => array(self::BELONGS_TO, 'Documentos', 'tipodoc'),
			'trabajador' => array(self::BELONGS_TO, 'Trabajadores', 'codresponsable'),
			'trabajador1' => array(self::BELONGS_TO, 'Trabajadores', 'codteniente'),
			'barcos'=> array(self::BELONGS_TO, 'Embarcaciones', 'codepv'),
                        'tenencias'=>array(self::BELONGS_TO, 'Tenencias', 'codtenencia'),
                        'procesosdocu'=>array(self::HAS_MANY, 'Procesosdocu', 'hiddoci'),
                     'procesoactivo'=>array(self::HAS_MANY, 'Procesosdocu','hiddoci','limit'=>'1','order'=>'id DESC'),
                    'tenores' => array(self::BELONGS_TO, 'Tenores', array('codsoc'=>'sociedad','codocu'=>'coddocu') ),
           
                    
                    
                    
                    
		);
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codprov' => 'Empresa',
			'fecha' => 'F. Doc',
			'fechain' => 'F. ingr',
			'correlativo' => 'Correlativo',
			'tipodoc' => 'Docum',
			'moneda' => 'Moneda',
			'descorta' => 'Descripcion',
			'codepv' => 'Ref',
			'monto' => 'Monto',
			'codgrupo' => 'Grupo',
			'codresponsable' => 'Resp',
			'creadopor' => 'Creadopor',
			'creadoel' => 'Creadoel',
			'texv' => 'Detalle',
			'docref' => 'Ref.',
			'codlocal' => 'Centro',
			'codteniente' => 'Pers.',
                    'codtenencia' => 'Tenencia',
				'conservarvalor' => 'Preservar valores ',
			'numero'=>'Numero',
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
                MiFactoria::Mensaje('error', 'DOCINGFRESADO-BEFORESAVE   , COLOCANDO VALORES POR DEFAULT');
                
                 }
                else{
                    
                                    
                    
                }
                if(!($this->moneda==yii::app()->setings->get('moneda','moneda_default')))
                        $this->montomoneda=yii::app()->tipocambio->getCambio(
                                $this->moneda,
                                yii::app()->setings->get('moneda','moneda_default')
                                )*$this->monto;
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
                            MiFactoria::Mensaje('error', 'DOCINGFRESADO-AFTERSAVE   , PROCESANDO CORTO');
                
                          if( !$this->procesarcorto(
                                   $fila->id,
                                   $tenencia->tenenciaprocauto[0]->id, 
                                   date("Y-m-d H:i:s")))
                                  //die();
                           break;
                       }
                       
                   } 
                    
                }
		MiFactoria::Mensaje('error','DOCINGFRESADO-AFTERSAVE se detecto nuevo')	;						   		//$this->c_salida='1';
		} else
			{
			MiFactoria::Mensaje('error','DOCINGFRESADO-AFTERSAVE   se dertecto ggrabado')	;							
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
           MiFactoria::mensaje('error','procesarcorto');
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
             $registro=self::model()->findByPk($userdata);
       $archivo=$registro->colocaarchivo($fullFileName);
       $procesoactivo=$registro->procesoactivo[0];
       //var_dump($procesoactivo);
       if(!is_null($procesoactivo)){
           if($procesoactivo->essubible()){
               $nombredocumento= Documentos::model()->findByPk($procesoactivo->codocuref)->desdocu."-";
                $nombredocumento.= $procesoactivo->numdocref;               
                if( $registro->renombraarchivo($archivo,$nombredocumento)){
                    yii::log('    SI TUVO EXITO  el renombarnieto  ','error');
                }else{
                   yii::log('    fallo el renombramnieto    ','error');  
                }
                }
           // $nombredocumento=$procesoactivo->documentos->desdocu."-".(is_null($procesoactivo->numdocref))?"":$procesoactivo->numdocref;
           // var_dump($nombredocumento);die();
           
       }else{
           echo "fallo";die();
       }
      
      
       
       
       //$this->colocaarchivo($fullFileName);
    }
        
     //funcion que devuelve el cuerpo de l mensaje de correo 
    //desde la tabla TENORES 
    //$token: Id del mensaje a enviar para link de conrimacion de lectura
    public function getmensajemail($token=null){
       $this->centros->sociedades->codsoc;
       $this->codocu;
       $this->codtenor;
        $conf=Configuracion::valor(
               $this->codocu,
               $this->codlocal, 
               self::PARAMETRO_CONFIRMAR_LECTURA_CORREO
               ); 
        
         $confirmarecepcion=false; 
       if($conf=="1")
           if(!is_null($token))
          $confirmarecepcion=true; 
           
       
       
           
        //  var_dump( $conf);
             return yii::app()->getController()->renderpartial(
                       'vw_mail',
                       array(
                           'docu'=> $this->codocu,
                           'pos'=>$this->codtenor,
                           'sociedad'=> $this->centros->codsoc,
                           'confirmarecepcion'=>$confirmarecepcion,
                           'token'=>$token,
                       ), true,false
                       );
    }
    
   public static function reporteclipro(){
      return yii::app()->db->createCommand()->select(
              "count(t.id) as cantidad,t.codprov "
              )->from("{{".$this->tableName()."}} t, {{procesosdocu}} a"
                      )->where(
                              ""
                              )->group("codprov")->queryAll();
   } 
   
   
   
   
}