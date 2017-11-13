<?php

/**
 * This is the model class for table "{{opera_planes}}".
 *
 * The followings are the available columns in table '{{opera_planes}}':
 * @property string $id
 * @property string $codep
 * @property string $codsistema
 * @property string $labor
 * @property string $detalle
 * @property integer $frecuencia
 * @property string $tipo
 *
 * The followings are the available model relations:
 * @property Embarcaciones $codep0
 */
class OperaPlanes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{opera_planes}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('frecuencia', 'numerical', 'integerOnly'=>true),
			array('codep, codsistema, tipo', 'length', 'max'=>3),
			array('labor', 'length', 'max'=>40),
			array('detalle,codof', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, codep, codof,codsistema, labor, detalle, frecuencia, tipo', 'safe', 'on'=>'search'),
		array('id, codep, codof,codsistema, labor, detalle, frecuencia, tipo', 'safe', 'on'=>'search_por_mot'),
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
			'embarcaciones' => array(self::BELONGS_TO, 'Embarcaciones', 'codep'),
		       'trabajadores' => array(self::BELONGS_TO, 'Trabajadores', 'codigotra'),
		 'ultimafecha' => array(self::STAT, 'OperaLogtareas','hidplan', 'select'=>'max(t.fechaejec)'),
		
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codep' => 'Codep',
			'codsistema' => 'Codsistema',
			'labor' => 'Labor',
			'detalle' => 'Detalle',
			'frecuencia' => 'Frecuencia',
			'tipo' => 'Tipo',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('codep',$this->codep,true);
		$criteria->compare('codsistema',$this->codsistema,true);
		$criteria->compare('labor',$this->labor,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('frecuencia',$this->frecuencia);
		$criteria->compare('tipo',$this->tipo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        public function search_por_mot($codep,$codof)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('codep',$this->codep,true);
                $criteria->compare('codof',$this->codof,true);
		$criteria->compare('codsistema',$this->codsistema,true);
		$criteria->compare('labor',$this->labor,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('frecuencia',$this->frecuencia);
		$criteria->compare('tipo',$this->tipo,true);
             $criteria->compare('tipo',$this->tipo,true);
             $criteria->addCondition("codep=:vcodep",'and');
              $criteria->addCondition("codof=:vcodof");
              $criteria->params=array(":vcodep"=>$codep,":vcodof"=>$codof);
             //  $criteria->params=array();
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OperaPlanes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function createmp(){
            $registro=New OperaTempplan();
            $registro->setAttributes(array(
                'hidplan'=>$this->id,
                'porc'=>$this->porcentaje(),
                 'labor'=>$this->labor,
                //'tiempofalta'=>$this->porcentaje(),
                //'color'=>$this->porcentaje(),
            ));
           if (!$registro->save())
               print_r($registro->getErrors());
        }
        
        
        private function porcentaje(){
               if(is_null($this->ultimafecha)){
                  return 1;
               }else{
                 return round(yii::app()->periodo->horasentre($this->ultimafecha,date('Y-m-d H:i:s'))*100/$this->frecuencia,3);  
               }
            }
}


