<?php

class Parametros extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{parametros}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			  array('codparam', 'match', 'pattern' => '/[1-9]{1}[0-9]{1}[0-9]{1}/'),
                     array('codparam', 'unique'),
                    
                    array('codparam, desparam, tipodato,longitud', 'required'),
			array('longitud', 'numerical', 'integerOnly'=>true),
			array('codparam', 'length', 'max'=>4),
			array('desparam', 'length', 'max'=>40),
			array('explicacion', 'length', 'max'=>100),
			array('tipodato, activo', 'length', 'max'=>1),
			array('lista', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codparam, desparam, explicacion, tipodato, longitud, lista, activo', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codparam' => 'Codparam',
			'desparam' => 'Desparam',
			'explicacion' => 'Explicacion',
			'tipodato' => 'Tipodato',
			'longitud' => 'Longitud',
			'lista' => 'Lista',
			'activo' => 'Activo',
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

		$criteria->compare('codparam',$this->codparam,true);
		$criteria->compare('desparam',$this->desparam,true);
		$criteria->compare('explicacion',$this->explicacion,true);
		$criteria->compare('tipodato',$this->tipodato,true);
		$criteria->compare('longitud',$this->longitud);
		$criteria->compare('lista',$this->lista,true);
		$criteria->compare('activo',$this->activo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Parametros the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
