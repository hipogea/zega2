<?php

class Dlote extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{dlote}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('hidlote, cant, hidkardex, iduser', 'required'),
			array('iduser', 'numerical', 'integerOnly'=>true),
			array('cant', 'numerical'),
			array('hidlote, hidkardex', 'length', 'max'=>20),
			array('hidlote, cant, hidkardex', 'safe','on'=>'auto'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidlote, cant, hidkardex, iduser', 'safe', 'on'=>'search'),
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
			'kardex' => array(self::BELONGS_TO, 'Alkardex', 'hidkardex'),
			'lote' => array(self::BELONGS_TO, 'Lotes', 'hidlote'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidlote' => 'Hidlote',
			'cant' => 'Cant',
			'hidkardex' => 'Hidkardex',
			'iduser' => 'Iduser',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('hidlote',$this->hidlote,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('hidkardex',$this->hidkardex,true);
		$criteria->compare('iduser',$this->iduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dlote the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
