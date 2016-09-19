<?php
class Maestrodetalle extends ModeloGeneral
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Maestrodetalle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{maestrodetalle}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
                    array('codart,codcentro, codal,controlprecio,catval', 'required','on'=>'BATCH_UPD'),
			
                    array('codart','exist','allowEmpty' => false, 'attributeName' => 'codigo', 'className' => 'Maestrocompo','message'=>'Este material no existe','on'=>'BATCH_UPD,BATCH_UPD_CATVAL,BATCH_UPD_CONTROL_PRECIO,BATCH_UPD_CATVAL_CONTROLPRECIO'),
			array('codal','exist','allowEmpty' => false, 'attributeName' => 'codalm', 'className' => 'Almacenes','message'=>'Este almacen existe','on'=>'BATCH_UPD,BATCH_UPD_CATVAL,BATCH_UPD_CONTROL_PRECIO,BATCH_UPD_CATVAL_CONTROLPRECIO'),
			array('codcentro','exist','allowEmpty' => false, 'attributeName' => 'codcen', 'className' => 'Centros','message'=>'Este centro no existe','on'=>'BATCH_UPD,BATCH_UPD_CATVAL,BATCH_UPD_CONTROL_PRECIO,BATCH_UPD_CATVAL_CONTROLPRECIO'),
			
                    array('codart,codcentro, codal,catval','safe','on'=>'BATCH_UPD_CATVAL'),
			array('codart,codcentro, codal,controlprecio','safe','on'=>'BATCH_UPD_CONTROL_PRECIO'),
                    
                    array('codart,codcentro, codal,controlprecio,catval','safe','on'=>'BATCH_UPD_CATVAL_CONTROLPRECIO'),
                    
                    array('controlprecio','checkcontrolprecio','on'=>'BATCH_UPD,BATCH_UPD_CONTROL_PRECIO,BATCH_UPD_CATVAL_CONTROLPRECIO'),                       
                    array('catval','exist','allowEmpty' => false, 'attributeName' => 'codcatval', 
                        'className' => 'Catvaloracion','message'=>'Este grupo de valor no existe','on'=>'BATCH_UPD,BATCH_UPD_CATVAL,BATCH_UPD_CATVAL_CONTROLPRECIO'),
                    
                    
			
                    array('canteconomica, cantreposic, cantreorden', 'numerical','on'=>'BATCH_UPD'),
			array('canteconomica, cantreposic, cantreorden', 'checkauto','on'=>'BATCH_UPD'),
			array('cantsol,repautomatica,supervisionautomatica,codart,codcentro, codal,controlprecio,catval,canteconomica, cantreposic, cantreorden,leadtime', 'safe','on'=>'BATCH_UPD'),


			array('canteconomica, cantreposic, cantreorden', 'checkauto','on'=>'BATCH_UPD_SUPERVISION'),
			array('cantsol,repautomatica,codart,codcentro, codal,supervisionautomatica,canteconomica, cantreposic, cantreorden', 'safe','on'=>'BATCH_UPD_SUPERVISION'),

			array('codart,controlprecio', 'required','on'=>'insert,update'),
			array('codart','exist','allowEmpty' => false, 'attributeName' => 'codigo', 'className' => 'Maestrocompo','message'=>'Este material no existe','on'=>'insert,update'),
			array('cantsol,repautomatica,codart, codcentro, codal,controlprecio, catval,supervisionautomatica', 'safe','on'=>'insert,update'),
			array('controlprecio', 'checkcontrolprecio','on'=>'insert,update'),
			array('leadtime', 'numerical', 'integerOnly'=>true,'on'=>'insert,update'),
			array('canteconomica, cantreposic, cantreorden', 'numerical','on'=>'insert,update'),
			array('canteconomica, cantreposic, cantreorden', 'checkauto','on'=>'update'),
			array('catval,controlprecio', 'required','on'=>'update'),
			array('codart', 'length', 'max'=>8,'on'=>'insert,update'),
			array('codcentro', 'length', 'max'=>4,'on'=>'insert,update'),
			array('codal, codgrupoventas', 'length', 'max'=>3,'on'=>'insert,update'),
			array('canaldist', 'length', 'max'=>2,'on'=>'insert,update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('codart, codcentro, codal, catval,controlprecio,supervisionautomatica', 'safe','on'=>'search'),
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
			'codart0' => array(self::BELONGS_TO, 'Maestrocomponentes', 'codart'),
			'codal0' => array(self::BELONGS_TO, 'Almacenes', 'codal'),
			'codcentro0' => array(self::BELONGS_TO, 'Centros', 'codcentro'),
			'maestro'=>array(self::BELONGS_TO, 'Maestrocompo', 'codart'),
			'kardexhijos'=>array(self::HAS_MANY,'Alkardex',array('codart'=>'codart','codcentro'=>'codcentro','alemi'=>'codal')),
			'inventario'=>array(self::HAS_ONE,'Alinventario',array('codart'=>'codart','codcen'=>'codcentro','codalm'=>'codal')),
			//'categorias'=>array(self::BELONGS_TO, 'Maestrocompo', 'codart'),
			//'desolpe_alinventario'=> array(self::BELONGS_TO, 'Alinventario', array('codal'=>'codalm','centro'=>'codcen','codart'=>'codart')),

		);
	}

	public function checkcontrolprecio($attribute,$params) {
		$control=''.trim($this->controlprecio);
		if(!in_array($this->controlprecio,array('L','F','V','S')))
			$this->adderror('controlprecio','No es un dato correcto   ');


	}
	public function checkvalores($attribute,$params) {

	      IF($this->supervisionautomatica=='1')
			if(!(($this->canteconomica > $this->cantreorden) and
			 ( $this->cantreorden > $this->cantreposic )))
			$this->adderror('cantreorden','Revise las cantidades, Cantidad ecónomica es mayor que reorden y a su vez mayor que reposicion');


	}
        
        
       
        
        
        
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codart' => 'Cod',
			'codcentro' => 'Centro',
			'codal' => 'Almacen',
			'codgrupoventas' => 'Gr.ventas',
			'canaldist' => 'Canal dist.',
			'canteconomica' => 'Cant Ec',
			'controlprecio' => 'T Valorac',
			'cantreposic' => 'P. Repo',
			'cantreorden' => 'P. Reorden',
			'leadtime' => 'Lead time',
            'supervisionautomatica'=>'Sup. Autom.?',
			'tolerancia'=>'% Tol merma',
		    'bloqueo'=>'Bloq',
			'catval'=>'Gr. valor'


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

		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('codcentro',$this->codcentro,true);
		$criteria->compare('codal',$this->codal,true);
		$criteria->compare('codgrupoventas',$this->codgrupoventas,true);
		$criteria->compare('canaldist',$this->canaldist,true);
		$criteria->compare('canteconomica',$this->canteconomica);
		$criteria->compare('cantreposic',$this->cantreposic);
		$criteria->compare('cantreorden',$this->cantreorden);
		$criteria->compare('leadtime',$this->leadtime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search_por_codigo($codigo)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;


		$criteria->addcondition('codart=:vcod');
		$criteria->params=array(':vcod'=>$codigo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function beforeSave() {


		return parent::beforeSave();
	}


	public function afterSave() {
   $da=1;
		return parent::afterSave();
	}


public function tienecompras(){


}
	public function tienesolpes(){


	}
	public function tieneventas(){

	}

	public function tieneinventario(){
         return ($this->inventario->getstockregistro() >0)?true:false;
	}


	public function tienekardex(){

	}

	public static function tienecatvaloracion($codart,$codal,$codcen){
		$retorno=true;
		if($codart==yii::app()->settings->get('materiales','materiales_codigoservicio'))
			return true;
		if(Yii::app()->hasModule('contabilidad')){

		$registro=self::model()->findByPk(array('codart'=>$codart,'codal'=>$codal,'codcentro'=>$codcen));
			//var_dump($registro->attributes);die();
			if(is_null($registro)){
				return false;
			}else{
				if(empty($registro->catval) or is_null($registro->catval))
					return false;
			}
		}
		return $retorno;
	}

//Chequea las reposiciones automaticas
	public function checkauto($attribute,$params) {
		if(yii::app()->settings->get('inventario','inventario_auto')=='1'){
			if($this->repautomatica=='1'){
							//Aqui si deben de estar activo el check de superevision autoamtica ademas debe de validarse los valores
							if(!$this->supervisionautomatica=='1'){
										$this->adderror('supervisionautomatica','Debe de activar la opcion de supervision');
								}else{
									if(!(($this->canteconomica > $this->cantreorden) and
									( $this->cantreorden > $this->cantreposic )))
									$this->adderror('cantreorden','Revise las cantidades, Cantidad ecónomica es mayor que reorden y a su vez mayor que reposicion');
									}
									//ahora si la cantidad ecomonica de pedido debe de estar llena
									if(!$this->cantsol >0)
										$this->adderror('cantsol','Para reposiciones automaticas debe indicar al sistema la cantidad de pedido en unidad de medidas base');


			    			}else{
								//ok
											if($this->supervisionautomatica=='1')
													if(!(($this->canteconomica > $this->cantreorden) and
														( $this->cantreorden > $this->cantreposic )))
														$this->adderror('cantreorden','Revise las cantidades, Cantidad ecónomica es mayor que reorden y a su vez mayor que reposicion');



								}
			}else{
						if($this->repautomatica=='1') {
							$this->adderror('repautoamtica','La opcion general del sistema no permite reposiciones autoamticas, habiite esta opcion en la configuracion general');
						}else{
							if($this->supervisionautomatica=='1')
							if(!(($this->canteconomica > $this->cantreorden) and
								( $this->cantreorden > $this->cantreposic )))
								$this->adderror('cantreorden','Revise las cantidades, Cantidad ecónomica es mayor que reorden y a su vez mayor que reposicion');
						}

			}

	}



}