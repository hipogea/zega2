<?php

/**
 * This is the model class for table "{{cuadrilla}}".
 *
 * The followings are the available columns in table '{{cuadrilla}}':
 * @property string $id
 * @property integer $hidregimen
 * @property string $hidetot
 * @property string $tarifa
 * @property string $codmon
 * @property string $codof
 * @property string $codtra
 *
 * The followings are the available model relations:
 * @property Trabajadores $codtra0
 * @property Detot $hidetot0
 * @property Regimen $hidregimen0
 */
class Cuadrilla extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{cuadrilla}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidregimen, hidetot, codtra', 'required'),
			array('hidregimen', 'numerical', 'integerOnly'=>true),
			array('hidetot', 'length', 'max'=>20),
			array('tarifa', 'length', 'max'=>5),
			array('codmon, codof', 'length', 'max'=>3),
			array('codtra', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidregimen, hidetot, tarifa, codmon, codof, codtra', 'safe', 'on'=>'search'),
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
			'codtra0' => array(self::BELONGS_TO, 'Trabajadores', 'codtra'),
			'hidetot0' => array(self::BELONGS_TO, 'Detot', 'hidetot'),
			'hidregimen0' => array(self::BELONGS_TO, 'Regimen', 'hidregimen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidregimen' => 'Hidregimen',
			'hidetot' => 'Hidetot',
			'tarifa' => 'Tarifa',
			'codmon' => 'Codmon',
			'codof' => 'Codof',
			'codtra' => 'Codtra',
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
		$criteria->compare('hidregimen',$this->hidregimen);
		$criteria->compare('hidetot',$this->hidetot,true);
		$criteria->compare('tarifa',$this->tarifa,true);
		$criteria->compare('codmon',$this->codmon,true);
		$criteria->compare('codof',$this->codof,true);
		$criteria->compare('codtra',$this->codtra,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cuadrilla the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
