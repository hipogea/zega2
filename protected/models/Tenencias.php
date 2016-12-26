<?php

class Tenencias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tenencias}}';
	}

         public function behaviors()
	{
		return array(
			
			//'ActiveRecordLogableBehavior'=>	'application.behaviors.ActiveRecordLogableBehavior',
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
                        array('codte,codcen,listamail,horasfrecuencialerta,horaspreviasalerta', 'required','message'=>'Este dato es obligatorio'),
			array('codte, codcen', 'length', 'max'=>4),
                     //array('horasfrecuencialerta,horaspreviasalerta', 'chkhoras','on'=>'insert,update'),
                    array('codte, codcen', 'length', 'max'=>4),
                      array('codte', 'match', 'pattern'=>'/[1-9]{1}[0-9]{1}/','message'=>'El codigo  no es el correcto, deben ser 2 digitos y el primero no puede ser cero','on'=>'insert'),			
			 
			array('deste', 'length', 'max'=>35),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codte, deste, codcen', 'safe', 'on'=>'search'),
                    array('codte,listamail,alerta, deste,codocu, codcen,horaspreviasalerta,horasfrecuencialerta', 'safe', 'on'=>'insert,update'),
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
			'centros' => array(self::BELONGS_TO, 'Centros', 'codcen'),
			'tenenciasproc' => array(self::HAS_MANY, 'Tenenciasproc', 'codte'),
			'tenenciastraba' => array(self::HAS_MANY, 'Tenenciastraba', 'codte'),
                        'tenenciaprocauto' => array(self::HAS_MANY, 'Tenenciasproc','codte','condition'=>" automatico='1'  "),
                       
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codte' => 'Codte',
			'deste' => 'Descripcion',
			'codcen' => 'Centro',
                       'horaspreviasalerta'=>'H. Alerta',
                      'horasfrecuencialerta'=>'H. frec',
                     'listamail'=>'Dest',
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

		$criteria->compare('codte',$this->codte,true);
		$criteria->compare('deste',$this->deste,true);
		$criteria->compare('codcen',$this->codcen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tenencias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
       
	
            public function chkhoras($attribute,$params) {
                if($this->horasfrecuencialerta < 24 ){
                     $this->adderror('horasfrecuencialerta','Este valor es muy pequeño no pasa de un dia ');
              return;
                }
                
                if($this->horaspreviasalerta < 24 ){
                     $this->adderror('horaspreviasalerta','Este valor es muy pequeño no pasa de un dia ');
            return;
                }
                
	      if($this->horasfrecuencialerta < $this->horaspreviasalerta)
            
                  $this->adderror('horasfrecuencialerta','Las horas de frecuencia deben ser mayores a las horas previas de alerta ');
                 return;   
             }
         
	//FUNCION QUE PERMITE AGREGAR DINAMICAMENTE EL LOG DE AUDITORIA, ESTO PARA  NO 
             //SOBRECARGAR  LOS EVENTOS AFTERFIND DE CADA REGISTRO DEL FINDALL();
        public function preparaAuditoria(){
            if(!in_array('auditoriaBehavior',$this->behaviors())){
               yii::import('application.behaviors.ActiveRecordLogableBehavior');
                   $this->attachbehavior('auditoriaBehavior', new ActiveRecordLogableBehavior);
                   if(!$this->isNewRecord)
                    $this->setOldAttributes($this->getAttributes());
            }
            
        }     
             
	
	
}
