<?php

/**
 * This is the model class for table "{{maestroequivalente}}".
 *
 * The followings are the available columns in table '{{maestroequivalente}}':
 * @property string $id
 * @property string $codart
 * @property string $codart2
 *
 * The followings are the available model relations:
 * @property Maestrocomponentes $codart0
 * @property Maestrocomponentes $codart20
 */
class Maestroequivalente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{maestroequivalente}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codart, codart2', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, codart, codart2', 'safe', 'on'=>'search'),
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
			'codart20' => array(self::BELONGS_TO, 'Maestrocomponentes', 'codart2'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codart' => 'Codart',
			'codart2' => 'Codart2',
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
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('codart2',$this->codart2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Maestroequivalente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
