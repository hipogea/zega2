<?php
    
class Tempdetgui extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tempdetgui}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		////escenarios
		///INS_LIBRE
		///INS_AF
		///INS_NUEVO


		///UPD_LIBRE
		///UPD_AF
		///UPD_NUEVO





		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		$reglas= array(

			///PARA TODOS LOS ESCENARIOS
                    
                    array('n_hguia,m_obs,modo,codocu,c_itguia,c_codactivo,c_um,modo,c_codgui,hidref,
			c_um,c_itguia,n_cangui,c_descri,c_estado,c_edgui,c_codep,n_hconformidad,docref,c_af,
			cargodevolucion,codlugar', 'safe','on'=>'buffer'),
                    
                    
                    array('c_af', 'required','message'=>'Llene el tipo de material a mover'),
                    array('c_af,c_estado', 'safe'),
			//array('c_codep', 'required','message'=>'Sin referencia'),
			array('c_edgui', 'required','message'=>'Llene el destino'),
			//array('modo', 'required','message'=>'Llene el modo'),
			array('c_descri', 'length', 'max'=>40),
			array('c_descri', 'length', 'min'=>5),
			 
//ESCENARIO ca,bpo de stado //
      array('c_estado', 'safe','on'=>'cambioestado'),   
                    			 
//ESCENARIO ca,bpo de stado //
      array('c_itguia', 'safe','on'=>'cambioitems'),    
                    

			//ESCENARIO DE ACTIVO FIJO //
			array('c_codactivo,n_cangui,c_itguia,c_descri,c_um,c_edgui,c_codep','safe','on'=>'INS_ACTIVO,UPD_ACTIVO'),
			array('c_codactivo', 'exist','allowEmpty' => false,'attributeName' => 'codigoaf', 'className' => 'Inventario','message'=>'Este códIgo de activo no existe', 'on'=>'INS_ACTIVO,UPD_ACTIVO'),
			array('c_codactivo', 'match', 'pattern'=>yii::app()->settings->get('af','af_afmascara'),'message'=>'El codigo de placa no es el correcto', 'on'=>'INS_ACTIVO,UPD_ACTIVO'),
			array('n_cangui', 'required', 'message'=>'La cantidad', 'on'=>'INS_ACTIVO,UPD_ACTIVO'),
                    array('c_descri', 'required','message'=>'Sin descripcion','on'=>'insert,update,INS_ACTIVO,UPD_ACTIVO,INS_COMPO,UPD_COMPO,INS_VALE,UPD_VALE'),
                       array('n_cangui', 'required', 'message'=>'La cantidad es obligatoria','on'=>'insert,update,INS_ACTIVO,UPD_ACTIVO,INS_COMPO,UPD_COMPO,INS_VALE,UPD_VALE'),
			array('c_codactivo','checkmovimiento','on'=>'INS_ACTIVO','UPD_ACTIVO'),
			//array('c_codactivo','cargodevolver','on'=>'INS_ACTIVO','UPD_ACTIVO'),
			array('c_codactivo','checkcantidaddescripcion','on'=>'INS_ACTIVO,UPD_ACTIVO'),
			array('c_codactivo+n_hguia', 'application.extensions.uniqueMultiColumnValidator','message'=>'Este Activo ya se encuentra Registrado en el documento ','on'=>'INS_ACTIVO,UPD_ACTIVO'),

//ESCENARIO  DE COMPONENTE  //
                       /* array('c_codgui','exist','allowEmpty' => false, 'attributeName' => 'codigo', 'className' => 'Masterequipo','message'=>'Este componente o equipo no existe','on'=>'INS_COMPO,UPD_COMPO'),
                        array('c_codgui,n_cangui,c_itguia,c_descri,c_um,hidref,c_edgui,c_codep','safe','on'=>'INS_COMPO,UPD_COMPO'),
			

//ESCENARIO  DE VALE  //
                        array('c_codgui','exist','allowEmpty' => false, 'attributeName' => 'codigo', 'className' => 'Maestrocompo','message'=>'Este material no existe','on'=>'INS_VALE,UPD_VALE'),
                        array('n_hguia,c_codgui,n_cangui,c_itguia,c_descri,c_um,hidref,c_edgui,c_codep,c_estado,idusertemp,codocu','safe','on'=>'INS_VALE,UPD_VALE'),
                        array('n_cangui','chkcantidad','on'=>'INS_VALE,UPD_VALE'),
			
//ESCENARIO  SOLO PARA SIMULAR, EL FORM AGREGANDO DESPACHOS   //
                         array('c_edgui,c_codep,codob','safe','on'=>'INS_VALEMASIVO'),
                         array('c_edgui,c_codep,codob','required','on'=>'INS_VALEMASIVO'),
                      */

			array('c_codgui', 'exist','allowEmpty' => true,'attributeName' => 'codigo', 'className' => 'Maestrocompo','message'=>'Este códIgo de material no existe', 'on'=>'INS_NUEVO,UPD_NUEVO'),
			array('c_um', 'required','message'=>'Sin unidad de medida','on'=>'INS_NUEVO,UPD_NUEVO'),
			//array('c_codactivo', 'checkplaca','on'=>'INS_ACTIVO,UPD_ACTIVO'),
			array('c_codgui','safe','on'=>'INS_NUEVO,UPD_NUEVO'),

			array('n_hguia,m_obs,modo,codocu,c_codgui,c_itguia,c_codactivo,hidref,c_um,c_codgui,c_um,c_itguia,n_cangui,c_descri,c_edgui,c_codep,cargodevolucion,codlugar', 'safe'),


            array('idstatus,cargodevolucion','safe', 'on'=>'escenario_idstatus'),
			array('n_libre', 'numerical', 'integerOnly'=>true),
			array('n_cangui', 'numerical'),
			array('n_cangui', 'required','message'=>'Cantidad vacia'),

			array('docrefext', 'length', 'max'=>15),
			array('n_hguia,m_obs, codlugar,id,idusertemp,idstatus,modo,docref,n_hconformidad,iduser', 'safe'),

			//array('c_codsap', 'checkplaca','on'=>'insert,update'),
			//array('c_codgui', 'checkcodigo','on'=>'insert,update'),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('n_hguia, c_itguia, n_cangui, c_codgui, c_edgui, c_descri, m_obs, c_um, c_codep, ndeenvio, n_detgui, l_libre, creadopor, creadoel, modificadopor, modificadoel, n_hconformidad, c_estado, n_libre, n_idconformidad, c_af, c_codactivo, c_img, c_codsap, docref, docrefext, hidref, codocu', 'safe', 'on'=>'search'),


		);
                
                 
                
                

		if(yii::app()->settings->get('transporte','transporte_objenguia')=='1'){
			$reglas[]=array('codob','safe');
			$reglas[]=array('codob','required','message'=>'Coloque el objeto referencia');
		}
                
                if(yii::app()->settings->get('transporte','transporte_objinterno')=='1'){
			$reglas[]=array('c_codep','safe');
			$reglas[]=array('c_codep','required','message'=>'Coloque el objeto interno referencia');
		}
		return $reglas;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		$relaciones= array(
			'guia' => array(self::BELONGS_TO, 'Guia', 'n_hguia'),
		'ne' => array(self::BELONGS_TO, 'Guia', 'n_hguia'),
		
//'materiales' => array(self::BELONGS_TO, 'Maestrocompo', 'c_codgui'),
			'inventario'=>array(self::BELONGS_TO, 'Inventario', 'c_codactivo'),                    
                      'detgui'=>array(self::HAS_ONE, 'Detgui', 'idtemp'),
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.

		);
                //VAR_DUMP($this);die();
                return $relaciones;
	}

        public function behaviors()
	{
		//var_dump(yii::app()->settings->get('general','general_nregistrosporcarpeta'));die();
            
            return array(
			// Classname => path to Class
			'imagenesjpg'=>array(
				'class'=>'ext.behaviors.TomaFotosBehavior',
                            '_codocu'=>'230',
                            '_ruta'=>yii::app()->settings->get('general','general_directorioimg'),
                            '_numerofotosporcarpeta'=>yii::app()->settings->get('general','general_nregistrosporcarpeta')+0,
                            '_extensionatrabajar'=>'.jpg',
                            '_id'=>$this->id,
                                ));

	}          

	public function checkmovimiento($attribute,$params) {
		//si se puede mover o el innteot de trsnportarlo es licito
		if(!$this->guia->canMove($this->c_codactivo)){
			$this->adderror('c_codactivo','Este activo no se puede mover desde este punto de partida, es posible que en inventario Físico no aparezca aquí ');
		}
	}


	public function cargodevolver($attribute,$params) {
		//si se puede mover o el innteot de trsnportarlo es licito

		if(!$this->guia->canMove($this->c_codactivo)){
			$this->adderror('c_codactivo','Este activo no se puede mover desde este punto de partida, es posible que en inventario Físico no aparezca aquí ');
		}
	}

	///verifica que el activo A MOVER, NMO SE ENCUENTRA EN TRANSPORTE
	public function checksiestaenotraguia($attribute,$params) {

		$inve=Inventario::recordByPlate($this->c_codactivo);
		if($inve->rocoto=='1'){
			$this->adderror('c_codactivo','Este activo yA esta en transporte ');

		}


	}


	public function checkcantidaddescripcion($attribute,$params) {
			//si se puede mover o el innteot de trsnportarlo es licito

			 $inve=Inventario::recordByPlate($this->c_codactivo);
			$descripcion=(is_null($inve))?'':$inve->descripcion;
			if (!strtolower(trim($this->c_descri))==strtolower(trim($this->c_descri)))
				$this->adderror('c_descri','La descripcion del activo y del documenrto no coinciden');


		}

        public function chkcantidad($attribute,$params) {
			//Verificamos primero si es del tipo 'V'
                    if(!$this->c_af==MiFactoria::material_almacen())			
				$this->adderror('c_codgui','Item '.$this->c_itguia.' :    Este escenario es inadecuado, solo es para materiales de almacen');
                    //veriidfcamos cuanto ya se ha despachado
                    if($this->hidref===null)
                        $this->adderror('c_codgui','Item '.$this->c_itguia.' :    Es necesario referenciar al registro de despachos ');
                    $cantdespachada=  Despacho::model()->findByPk($this->hidref)->cantdespachada;
                    $diferencia=abs(Despacho::model()->findByPk($this->hidref)->kardex->cant)-Despacho::model()->findByPk($this->hidref)->cantdespachada;
                    if(!($this->n_cangui <=$diferencia))
                        {
                            $this->adderror('n_cangui','Item '.$this->c_itguia.' :    No puede despachar [ '.$this->n_cangui.' ]  
                                    mas de lo que debe  '.$diferencia.'    ; Despacho original ['.abs(Despacho::model()->findByPk($this->hidref)->kardex->cant).' ]  
                                      ; Ya Despachado  [  '.Despacho::model()->findByPk($this->hidref)->cantdespachada. ' ]   ');
                   
                        }
                    
            }



	public function beforeSave() {
		if ($this->isNewRecord){
                    if(is_null($this->c_estado))
			$this->c_estado='99';
			$this->idusertemp=yii::app()->user->id;
                        if(!(yii::app()->settings->get('transporte','transporte_objenguia')=='1')
                                and is_null($this->codob)){
                            $this->codob= Guia::getobjetocliente();
                        }
                        if(!(yii::app()->settings->get('transporte','transporte_objinterno')=='1')
                            and is_null($this->c_codep)    ){
                             $this->c_codep=Guia::getobjetointerno();
                        }
                        

		}



		return parent::beforeSave();
	}





	public function checkcodigo($attribute,$params) {
		//Primero debemos verificar que el codigo SAP y el codigo de AF son los correctos
		$codigo=$this->c_codgui;
		if ( !is_null($codigo) or !empty($codigo))
		{
			$vari=Maestrocompo::model()->find('codigo=:codito',array(':codito'=>$codigo));
			$comp=is_null($vari)?'':$vari->codigo;
			if(!(trim($codigo)==trim($comp )))
				$this->adderror('c_codgui','El codigo de material no Existe');
		} else {

		}

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'n_hguia' => 'N Hguia',
			'c_itguia' => 'Item',
			'n_cangui' => 'Cantidad',
			'c_codgui' => 'Codigo',
			'c_edgui' => 'Destino',
			'c_descri' => 'Descripcion',
			'm_obs' => 'Detalle',
			'c_um' => 'Um',
			'c_codep' => 'Referencia',
			'ndeenvio' => 'Ndeenvio',
			//	'n_detgui' => 'N Detgui',
			'l_libre' => 'L Libre',
			'n_hconformidad' => 'N Hconformidad',
			'c_estado' => 'Estado',
			'n_libre' => 'N Libre',
			'n_idconformidad' => 'N Idconformidad',
			'c_af' => 'Es activo?',
			'c_codactivo' => 'Codigo de placa',
			'c_img' => 'C Img',
			'c_codsap' => 'Codigo SAP',
			'docref' => 'Doc. Referencia',
			'docrefext' => 'Docrefext',
			'hidref' => 'Hidref',
			'codocu' => 'Codocu',
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

		$criteria->compare('n_hguia',$this->n_hguia,true);
		$criteria->compare('c_itguia',$this->c_itguia,true);
		$criteria->compare('n_cangui',$this->n_cangui);
		$criteria->compare('c_codgui',$this->c_codgui,true);
		$criteria->compare('c_edgui',$this->c_edgui,true);
		$criteria->compare('c_descri',$this->c_descri,true);
		$criteria->compare('m_obs',$this->m_obs,true);
		$criteria->compare('c_um',$this->c_um,true);
		$criteria->compare('c_codep',$this->c_codep,true);
		$criteria->compare('ndeenvio',$this->ndeenvio,true);
		$criteria->compare('l_libre',$this->l_libre,true);




		$criteria->compare('n_hconformidad',$this->n_hconformidad,true);
		$criteria->compare('c_estado',$this->c_estado,true);
		$criteria->compare('n_libre',$this->n_libre);
		$criteria->compare('n_idconformidad',$this->n_idconformidad,true);
		$criteria->compare('c_af',$this->c_af,true);
		$criteria->compare('c_codactivo',$this->c_codactivo,true);
		$criteria->compare('c_img',$this->c_img,true);
		$criteria->compare('c_codsap',$this->c_codsap,true);
		$criteria->compare('docref',$this->docref,true);
		$criteria->compare('docrefext',$this->docrefext,true);
		$criteria->compare('hidref',$this->hidref,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codlugar',$this->codlugar,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('idtemp',$this->idtemp,true);
		$criteria->compare('idstatus',$this->idstatus);
		$criteria->compare('id',$this->id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tempdetgui the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function colocaescenario($tipo=null){
            if(!is_null($tipo)){
                switch ($tipo) {
                    case MiFactoria::material_general(): //EL CAOS GFENERAL DE MATERIALES CODIFICADOS Y MATERIALES LIBRES
                        $relaciones=$this->relations();
                        $this->setScenario(($this->isNewRecord)?'INS_NUEVO':'UPD_NUEVO');
                        $relaciones['materiales']=array(self::BELONGS_TO, 'Maestrocompo', 'c_codgui');
            //            $this->relations()=$relaciones;
                           return     $relaciones;
                       
                    case MiFactoria::material_almacen(): ///e NE L CASO DE VALES RELACINADOS  RLACIONADOS S, ES OBLIGATORIO EL CODIGO DE MATERIAL 
                        $relaciones=$this->relations();
                        $this->setScenario(($this->isNewRecord)?'INS_VALE':'UPD_VALE');
                        $relaciones['materiales']=array(self::BELONGS_TO, 'Maestrocompo', 'c_codgui');
            //            $this->relations()=$relaciones;
                           return     $relaciones;
               
                
                    break;///EL CASO DE COMPOENTRNES ROTATIVOS
                case MiFactoria::material_rotativo():
                          $relaciones=$this->relations();
                                $relaciones['masterequipo']=array(self::BELONGS_TO, 'Masterequipo', 'c_codgui');
                                $this->setScenario(($this->isNewRecord)?'INS_COMPO':'UPD_COMPO');
                              //   $this->relations()=$relaciones;
                         RETURN  $relaciones;
                         
                    break;
                
                ///EL CASO DE ACTIVO FIJOS
                case MiFactoria::material_activo():
                          $relaciones=$this->relations();
                                $relaciones['inventario']=array(self::BELONGS_TO, 'Inventario', 'c_codactivo');
                                $this->setScenario(($this->isNewRecord)?'INS_ACTIVO':'UPD_ACTIVO');
                              //   $this->relations()=$relaciones;
                         RETURN  $relaciones;
                         
                    break;
                    
                           
                        default:
       throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'  Defina el tipo de material movido, al usar esta funcion  ');
                 
}
            }else{
                 throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'  Defina el tipo de material movido, al usar esta funcion  ');
                               
            }
                
            
        }
        
        
        public function colocaarchivox($fullFileName,$userdata=null) 
                {
                   // Yii::log(' ejecutando '.serialize($fullFileName),'error');
                    $this->colocaarchivo($fullFileName);
             }
             
             
          public function anula(){
              
          }
        
}