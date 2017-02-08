<?php

class Docingresados extends ModeloGeneral
{
	public $nomep; ///campo para ofredenar en el fgrid view
    CONST PARAM_TENENCIA_POR_DEFECTO='1012';
    CONST PARAMETRO_TITULO_CORREO_PEDIDO='1248';
    CONST PARAMETRO_CONFIRMAR_LECTURA_CORREO='1247';
    const PARAMETRO_COD_TENENCIA_VISUALIZAR_CERTIFICADOS='1238';
     const COD_DOCUMENTO_REGISTRO='280';
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
        public $diasfaltan;
        
        public function init(){
            $this->campoestado='cod_estado';
            $this->documento=self::COD_DOCUMENTO_REGISTRO;
            
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
			/*'ActiveRecordLogableBehavior'=>
				'application.behaviors.ActiveRecordLogableBehavior',*/
                    
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
                    
                    
                    //CERTIFICADOS
                     array('numero+tipodoc+codprov+codtenencia', 'application.extensions.uniqueMultiColumnValidator','on'=>'insert_certi,update_certi'),
                        array('codtenencia', 'safe','on'=>'insert_certi,update_certi'),
			//array('monto', 'numerical','on'=>'insert,update'),
                    array('tipodoc', 'checkcambiodoc','on'=>'update_certi'),
                    array('codtenencia', 'required','message'=>'Llenar la tenencia','on'=>'insert_certi,_certi'),
                    array('codepv', 'required','message'=>'...Que paso con la referencia?','on'=>'insert_certi,update_certi'),
			//array('monto', 'required','message'=>'Debes de llenar el monto','on'=>'insert,update'),
			//array('codlocal', 'required','message'=>'Debes de llenar el centro','on'=>'insert,update'),
			array('numero', 'required','message'=>'Debes de llenar el numero','on'=>'insert_certi,update_certi'),
                    array('fecha', 'required','message'=>'La fecha es obligatoria','on'=>'insert_certi,update_certi'),
                     array('codgrupo,codresponsable', 'required','message'=>'Este dato es obligatorio','on'=>'insert_certi,update_certi'),
			array('codprov', 'required','message'=>'Llena la empresa','on'=>'insert_certi,update_certi'),
			array('tipodoc', 'required','message'=>'Ingresa el tipo de documento','on'=>'insert_certi,update_certi'),
                   array('tipodoc', 'checktenencias','on'=>'insert_certi,update_certi'),
                   array('fecha,montomoneda,codteniente,docref,numero,codlocal, fechain,conservarvalor,codteniente,codprov,codgrupo,codresponsable, codtenencia, texv', 'safe','on'=>'insert_certi'),
		 array('fecha,codteniente,docref,numero,codlocal, conservarvalor,codteniente, codtenencia,codepv,codgrupo,codresponsable, texv', 'safe','on'=>'update_certi'),
				
                    
                    
                    
                    
                    ///CAMBIO TENENCIA
                    array('codtenencia', 'safe','on'=>'cambiotenencia'),
                   
                    
                    array('fecha','checkfechas','on'=>'insert,update'),  ///Todos los escenarios 
                    
                    
                      array('numero+tipodoc+codprov+codtenencia', 'application.extensions.uniqueMultiColumnValidator','on'=>'insert,update'),
                        array('codtenencia,espeabierto', 'safe','on'=>'insert,update'),
			array('monto', 'numerical','on'=>'insert,update'),
                    array('tipodoc', 'checkcambiodoc','on'=>'update'),
                    array('codtenencia', 'required','message'=>'Llenar la tenencia','on'=>'insert,update'),
			array('monto', 'required','message'=>'Debes de llenar el monto','on'=>'insert,update'),
			//array('codlocal', 'required','message'=>'Debes de llenar el centro','on'=>'insert,update'),
			array('numero', 'required','message'=>'Debes de llenar el numero','on'=>'insert,update'),
			array('codprov', 'required','message'=>'Llena el proveedor','on'=>'insert,update'),
			array('tipodoc', 'required','message'=>'Ingresa el tipo de documento','on'=>'insert,update'),
                   array('tipodoc', 'checktenencias','on'=>'insert,update'),
                    //array('codtenencia', 'safe','on'=>'cambiotenencia'),
                   
                   // checktenencias
			array('codresponsable', 'required','message'=>'...Quien es el responsable?','on'=>'insert,update'),
			array('fecha', 'required','message'=>'...La fecha del documento?','on'=>'insert,update'),
			array('fechain', 'required','message'=>'...La fecha de ingreso?','on'=>'insert,update'),
			array('fechain', 'checkfechaing','on'=>'update'),                    
                    array('moneda', 'required','message'=>'...Que paso con la moneda?','on'=>'insert,update'),
			array('codepv', 'required','message'=>'...Que paso con la referencia?','on'=>'insert,update'),
			array('codprov', 'length', 'max'=>6,'on'=>'insert,update'),
			array('codprov', 'checkvalores','on'=>'insert,update'),
                    array('fechavencimiento', 'safe','on'=>'escfechavencimiento'),
			array('correlativo', 'length', 'max'=>8,'on'=>'insert,update'),
			array('tipodoc, codepv, codgrupo', 'length', 'max'=>3,'on'=>'insert,update'),
			array('moneda', 'length', 'max'=>3,'on'=>'insert,update'),
			array('descorta', 'length', 'max'=>25,'on'=>'insert,update'),
			array('codresponsable', 'length', 'max'=>4,'on'=>'insert,update'),
			array('creadopor', 'length', 'max'=>23,'on'=>'insert,update'),
			array('creadoel', 'length', 'max'=>15,'on'=>'insert,update'),
			array('fecha,fechavencimiento,montomoneda,codteniente,docref,numero,codlocal, fechain,conservarvalor,codteniente, codtenencia, texv', 'safe','on'=>'insert,update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fechavencimiento,codprov,conservarvalor, fecha, fechain, correlativo, tipodoc, moneda, descorta, codepv, monto, codgrupo, codresponsable, creadopor, creadoel, texv, docref', 'safe', 'on'=>'search'),
                        array('nomep,id,diasfaltan, fechavencimiento,codprov,conservarvalor, fecha, fechain, correlativo, tipodoc, moneda, descorta, codepv, monto, codgrupo, codresponsable, creadopor, creadoel, codtenencia, docref', 'safe', 'on'=>'search_por_dicapi'),
		
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
        
        
        
        public function checkfechaing($attribute,$params) {
	 if(!$this->isNewRecord){
             if($this->cambiocampo('fechain')){
                 //verificar que los procesos subyacentes no tengan fecha posteriro a la acatual
                 $valoractual=$this->fechain;
                 $fechaminima=$this->fechaminima;
                 if(!is_null($fechaminima))
                if(yii::app()->periodo->verificafechas($fechaminima,$valoractual))
                  $this->adderror('fechain','Este documento tiene procesos con fechas posteriores a la fecha de ingreso, anule estos procesos y luego intente nuevamente');
                    
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
			'centros'=>array(self::BELONGS_TO, 'Centros', 'codlocal'),
			'clipro' => array(self::BELONGS_TO, 'Clipro', 'codprov'),
			'docus' => array(self::BELONGS_TO, 'Documentos', 'tipodoc'),
			'trabajador' => array(self::BELONGS_TO, 'Trabajadores', 'codresponsable'),
			'trabajador1' => array(self::BELONGS_TO, 'Trabajadores', 'codteniente'),
			'barcos'=> array(self::BELONGS_TO, 'Embarcaciones', 'codepv'),
                        'tenencias'=>array(self::BELONGS_TO, 'Tenencias', 'codtenencia'),
                        'procesosdocu'=>array(self::HAS_MANY, 'Procesosdocu', 'hiddoci','order'=>' id DESC '),
                     'procesosdocusinanular'=>array(self::HAS_MANY, 'Procesosdocu','hiddoci','condition'=>'anulado<>"1" ','order'=>' id DESC '),
                    'procesoactivo'=>array(self::HAS_MANY, 'Procesosdocu','hiddoci','condition'=>'anulado<>"1" ',  'limit'=>'1','order'=>'id DESC'),
                    'tenores' => array(self::BELONGS_TO, 'Tenores', array('codsoc'=>'sociedad','codocu'=>'coddocu') ),
            'fechamaxima' => array(self::STAT, 'Procesosdocu','hiddoci', 'select'=>'max(fechanominal)','condition'=>"anulado <>'1'"),
         'fechaminima' => array(self::STAT, 'Procesosdocu','hiddoci', 'select'=>'min(fechanominal)','condition'=>"anulado <>'1'"),
       
//  'alkardex_gastos'=>array(self::STAT, 'Alkardex', 'idref','select'=>'sum(montomovido*-1)','condition'=>"codocuref in('340','350')"),//el campo foraneo
             
                    
                    
                    
                    
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
			'codepv' => 'Embarc',
			'monto' => 'Monto',
			'codgrupo' => 'Grupo',
			'codresponsable' => 'Resp',
			'creadopor' => 'Creadopor',
			'creadoel' => 'Creadoel',
			'texv' => 'Detalle',
			'docref' => 'Ref.',
			'codlocal' => 'Centro',
			'codteniente' => 'Pers.',
                     'fechavencimiento' => 'F. Venci',
                    'codtenencia' => 'Tenencia',
				'conservarvalor' => 'Preservar valores ', 
			'numero'=>'Numero',
                    'espeabierto'=>'P. Ab',
		);
	}

	public $maximovalor;
	public $conservarvalor=0; //Opcionpa reaverificar si se quedan lo valores predfindos en sesiones 
	public function beforeSave() {
		if ($this->isNewRecord) {	// $this->creadoel=Yii::app()->user->name;
                   if($this->escertificado()){
                       $this->fechain=date('Y-m-d',strtotime($this->fecha)+24*60*60);
                   }
		$this->correlativo=Numeromaximo::numero($this->model(),'correlativo','maximovalor',8);
		$this->cod_estado='10';
                //$this->espeabierto='0';
		$this->codocu=self::COD_DOCUMENTO_REGISTRO;
                //$this->codtenencia=$this->getparametro(self::PARAM_TENENCIA_POR_DEFECTO);
              // VAR_DUMP( $this->codtenencia);DIE();
               // if(is_null($this->codteniente))
               $this->codteniente= Yii::app()->user->getField('codtra');
                   if(is_null($this->codtenencia))
                $this->codtenencia=Configuracion::valor($this->codocu,
                    $this->codlocal, 
                    self::PARAM_TENENCIA_POR_DEFECTO);
            $this->codlocal=Tenencias::model()->findByPk($this->codtenencia)->codcen;
               // MiFactoria::Mensaje('error', 'DOCINGFRESADO-BEFORESAVE   , COLOCANDO VALORES POR DEFAULT');
                
            if(!($this->moneda==yii::app()->settings->get('general','general_monedadef'))){
                     $this->montomoneda=yii::app()->tipocambio->getCambio(
                                $this->moneda,
                                yii::app()->settings->get('general','general_monedadef')
                                )*$this->monto; 
                }else{
                    $this->montomoneda=$this->monto;
                }
            
                }                 
                else{
                   IF($this->cambiocampo("monto") or $this->cambiocampo("moneda"))
                if(!($this->moneda==yii::app()->settings->get('general','general_monedadef'))){
                     $this->montomoneda=yii::app()->tipocambio->getCambio(
                                $this->moneda,
                                yii::app()->settings->get('general','general_monedadef')
                                )*$this->monto; 
                }else{
                    $this->montomoneda=$this->monto;
                }
                       
                    
                    
                }
                
                
                
                
                
	return parent::beforeSave();
				}
	
	
	public function afterSave() {
	     if ($this->isNewRecord) {
                 
                 $regpro= Tenenciasproc::model()->findAll("codocu=:vcodocu and codte=:vcodte and automatico='1'", array(":vcodocu"=>$this->tipodoc,":vcodte"=>$this->codtenencia ));
                    $regtra=Tenenciastraba::model()->findAll("codtra=:vcodtra and codte=:vcodte ", array(":vcodtra"=>$this->codteniente,":vcodte"=>$this->codtenencia ));
                 
                 if(count($regpro) >0 
                        and count($regtra)>0)
                {
                  if( !$this->procesarcorto(
                                   $regtra[0]->id,
                                   $regpro[0]->id, 
                                   $this->fechain
                           ))
                       MiFactoria::mensaje('error','No se pudo grabar el registro hijo ');
                                          
                       
                   } else{
                       
                       //var_dump($this->codteniente);var_dump($this->codtenencia);
                      // echo "no se granbo registro hijo carajo"; die();
                   }
                    
                }
		 else
			{
			//MiFactoria::Mensaje('error','DOCINGFRESADO-AFTERSAVE   se dertecto ggrabado')	;							
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
            /*$configuracion=Configuracion::valor($this->codocu,
                    $this->codlocal, 
                    self::PARAM_TENENCIA_POR_DEFECTO);
            if(is_null($configuracion))
            {
                $this->adderror('tipodoc','No existe una tenencia configurada para este centro  ( '.$this->codlocal.' )  y documento  (  '.$this->codocu.'    )  , agregue una por favor');
            }
            */
            
            //primero que el tipo de documento a ingresar esta registrado en algn proceso de la tenencia
            $cuantos=count(Tenenciasproc::model()->findAllByAttributes(array('codte' => $this->codtenencia,'codocu'=>$this->tipodoc)));
             if($cuantos==0)
             $this->adderror('tipodoc','La tenencia   ( '.$this->codtenencia.' )  no tiene ningun proceso registrado para este documento  (  '.$this->tipodoc.'   '.$this->docus->desdocu.'  )  , agregue una por favor');
         
            
            
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
           if($registro->save()){
               return true;
           }else{
               MiFactoria::mensaje('error', yii::app()->mensajes->getErroresItem($registro->geterrors()));
               return false;
           }
           //MiFactoria::mensaje('error','procesarcorto');
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
   
   
   public function getcolor(){
       $hayobjeto=$this->procesoactivo[0];
       if(!is_null($hayobjeto)){
          return  $hayobjeto->getcolor();
       }else{
          return '#d8d5d2';   
       }
   }
   
   public function search_por_dicapi($tenencia=null)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		//$criteria->compare('codprov',$this->codprov,true);
		//$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('fechain',$this->fechain,true);
		$criteria->compare('correlativo',$this->correlativo,true);
		//$criteria->compare('tipodoc',$this->tipodoc,true);
		//$criteria->compare('moneda',$this->moneda,true);
		$criteria->compare('descorta',$this->descorta,true);
		//$criteria->compare('codepv',$this->codepv,true);
		//$criteria->compare('monto',$this->monto);
		//$criteria->compare('codgrupo',$this->codgrupo,true);
		//$criteria->compare('codresponsable',$this->codresponsable,true);


		$criteria->compare('texv',$this->texv,true);
		$criteria->compare('docref',$this->docref,true);
                
                
                if(!is_null($this->diasfaltan) and strlen(trim($this->diasfaltan))>0){
                    $criteria->addInCondition('id',VwDoci::vencimientocertificadosId($tenencia, $this->diasfaltan) , 'AND');
                }
                   
                
                if(!is_null($tenencia))
                 $criteria->addCondition("codtenencia='".$tenencia."'");
                         
                if(isset($_SESSION['sesion_Docingresados']))
                    {
			$criteria->addInCondition('id', $_SESSION['sesion_Docingresados'], 'AND');
			  } ELSE {
				$criteria->compare('id',$this->id,true);
                      }      
                      
                  if(isset($_SESSION['sesion_Documentos']))
                    {
			$criteria->addInCondition('tipodoc', $_SESSION['sesion_Documentos'], 'AND');
			  } ELSE {
				$criteria->compare('tipodoc',$this->tipodoc,true);
                      }      
                      
               if(isset($_SESSION['sesion_Embarcaciones']))
                    {
			$criteria->addInCondition('codepv', $_SESSION['sesion_Embarcaciones'], 'AND');
			  } ELSE {
				$criteria->compare('codepv',$this->codepv,true);
                      } 
                      
                       if((isset($this->fechain) && trim($this->fechain) != "") && (isset($this->d_fechain1) && trim($this->d_fechain1) != ""))  {
		           
                        $criteria->addBetweenCondition('fechain', ''.$this->fechain.'', ''.$this->d_fechain1.''); 
						//VAR_DUMP($criteria->params);DIE();
						}
                 $criteria->together  =  true;
		$criteria->with = array('barcos');
                $criteria->compare('barcos.nomep', $this->nomep, true);  //Agregamos a $criteria nuestro nuevo campo, esto nos sirve para realizar búsquedas dentro del CGridView

        


        //Creamos un nuevo sort y añadimos nuestro campo relacionado

        $sort = new CSort();
        $sort->attributes = array(
                        
                        'nomep' => array(   //<---------------- Aqui agregamos el campo relacionado
                            'asc'=>'barcos.nomep ASC ',
                            'desc'=>'barcos.nomep DESC',
                        ),
                );

//var_dump( $tenencia);die();
               //  $criteria->addCondition("hiddoci=" . $id);        
        $dependecy = new CDbCacheDependency('SELECT count(*) FROM '.$this->tableName()); 
return new CActiveDataProvider($this->cache(600, $dependecy, 2), array ( 
    'criteria'=>$criteria,
     'sort'=>$sort,
     'pagination' => array (
                             'pageSize' => 100 //edit your number items per page here
                               
                       ),
));
                 
                 
                 
                 
		/*return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                     'sort'=>array(
                                 'defaultOrder'=>'codepv ASC',
                                 ),
                    'pagination' => array (
                             'pageSize' => 100 //edit your number items per page here
                       ),
		));*/
	}
        
    public function checkcambiodoc($attribute,$params){
        ///compronbado si ha cambiado de tipodoco, eso si es delicado 
                    if($this->cambiocampo("tipodoc")){
                        ///el documento nuevo campobiado sebe de ser compatible con el ultimo proceso
                        if(count($this->procesoactivo)>0){
                            if(!$this->tipodoc==$this->procesoactivo[0]->tenenciasproc->codocu){
                                $this->adderror('tipodoc','Este nuevo documento, es distinto a lo que ya has procesado ');
                            }
                        }
                    }
    }   
   
    
 public static function clipro_from_ids($arrayids){
     $criterio=New CDBCriteria;
		//$criterio->addCondition("a.id=b.hidvale AND b.id=c.idkardex AND b.numdocref=:numocompra");
		$criterio->addInCondition('id',$arrayids);
     return yii::app()->db->createCommand()->selectDistinct("codprov")->
             from("{{docu_ingresados}}")->where($criterio->condition,$criterio->params)->queryColumn();
 }   
    
 
        PUBLIC function checkfechas(){
            if(!yii::app()->periodo->verificaFechas($this->fecha,$this->fechain)){
                $this->adderror('fechain','La fecha de ingreso,  ['.$this->fechain.'] es menor que la fecha de Registro  ['.$this->fecha.' ]');
                 return ; 
            }    
            
            if(!yii::app()->periodo->verificaFechas($this->fechain,date('Y-m-d'))){
               $this->adderror('fechain','La fecha de ingreso,  ['.$this->fechain.'] es posterior a la fecha actual  ['.date('Y-m-d').' ]');
               return ; 
            }
                      }
 
 public function escertificado(){
    if($this->getScenario()=='insert_certi' or $this->getScenario()=='update_certi'){
                       return true;
                   }else{
                       return false;
                   }
 }
}