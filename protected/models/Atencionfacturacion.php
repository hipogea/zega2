<?php

/**
 * This is the model class for table "{{atencionfacturacion}}".
 *
 * The followings are the available columns in table '{{atencionfacturacion}}':
 * @property string $id
 * @property double $cant
 * @property string $hidatenciones
 * @property string $hidfacturacion
 *
 * The followings are the available model relations:
 * @property Alentregas $hidatenciones0
 * @property Detingfactura $hidfacturacion0
 */
class Atencionfacturacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{atencionfacturacion}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidatenciones, hidfacturacion', 'required'),
			array('cant', 'numerical'),
			array('hidatenciones, hidfacturacion', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cant, hidatenciones, hidfacturacion', 'safe', 'on'=>'search'),
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
			'hidatenciones0' => array(self::BELONGS_TO, 'Alentregas', 'hidatenciones'),
			'hidfacturacion0' => array(self::BELONGS_TO, 'Detingfactura', 'hidfacturacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cant' => 'Cant',
			'hidatenciones' => 'Hidatenciones',
			'hidfacturacion' => 'Hidfacturacion',
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
		$criteria->compare('cant',$this->cant);
		$criteria->compare('hidatenciones',$this->hidatenciones,true);
		$criteria->compare('hidfacturacion',$this->hidfacturacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Atencionfacturacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
