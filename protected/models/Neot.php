<?php

/**
 * This is the model class for table "{{neot}}".
 *
 * The followings are the available columns in table '{{neot}}':
 * @property string $id
 * @property string $hidot
 * @property string $fec
 * @property string $hidne
 * @property integer $cant
 *
 * The followings are the available model relations:
 * @property Detgui $hidot0
 * @property Detot $hidne0
 */
class Neot extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{neot}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cant', 'numerical', 'integerOnly'=>true),
			array('hidot, fec, hidne', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidot, fec, hidne, cant', 'safe', 'on'=>'search'),
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
			//'detot' => array(self::BELONGS_TO, 'Detgui', 'hidot'),
			'detgui' => array(self::BELONGS_TO, 'Detot', 'hidne'),
			'detot' => array(self::BELONGS_TO, 'VwOtsimple', 'hidot'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidot' => 'Hidot',
			'fec' => 'Fec',
			'hidne' => 'Hidne',
			'cant' => 'Cant',
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
		$criteria->compare('hidot',$this->hidot,true);
		$criteria->compare('fec',$this->fec,true);
		$criteria->compare('hidne',$this->hidne,true);
		$criteria->compare('cant',$this->cant);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Neot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
