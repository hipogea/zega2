<?php

/**
 * This is the model class for table "{{activoot}}".
 *
 * The followings are the available columns in table '{{activoot}}':
 * @property integer $id
 * @property string $hidot
 * @property string $hidactivo
 * @property string $finicio
 * @property string $ffinal
 * @property string $comentario
 *
 * The followings are the available model relations:
 * @property Ot $hidot0
 * @property Inventario $hidactivo0
 */
class Activoot extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{activoot}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidot, hidactivo, finicio, ffinal, comentario', 'required'),
			array('hidot', 'length', 'max'=>20),
			array('hidactivo', 'length', 'max'=>11),
			array('finicio, ffinal', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidot, hidactivo, finicio, ffinal, comentario', 'safe', 'on'=>'search'),
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
			'hidot0' => array(self::BELONGS_TO, 'Ot', 'hidot'),
			'hidactivo0' => array(self::BELONGS_TO, 'Inventario', 'hidactivo'),
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
			'hidactivo' => 'Hidactivo',
			'finicio' => 'Finicio',
			'ffinal' => 'Ffinal',
			'comentario' => 'Comentario',
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
		$criteria->compare('hidot',$this->hidot,true);
		$criteria->compare('hidactivo',$this->hidactivo,true);
		$criteria->compare('finicio',$this->finicio,true);
		$criteria->compare('ffinal',$this->ffinal,true);
		$criteria->compare('comentario',$this->comentario,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Activoot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
