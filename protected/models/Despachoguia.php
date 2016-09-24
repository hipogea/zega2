<?php

/**
 * This is the model class for table "{{despachoguia}}".
 *
 * The followings are the available columns in table '{{despachoguia}}':
 * @property string $id
 * @property string $hidespacho
 * @property string $hiddetgui
 * @property string $cant
 * @property string $fecha
 * @property integer $iduser
 *
 * The followings are the available model relations:
 * @property Despacho $hidespacho0
 * @property Detgui $hiddetgui0
 */
class Despachoguia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{despachoguia}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iduser', 'numerical', 'integerOnly'=>true),
			array('hidespacho, hiddetgui, cant', 'length', 'max'=>20),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidespacho, hiddetgui, cant, fecha, iduser', 'safe', 'on'=>'search'),
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
			'hidespacho0' => array(self::BELONGS_TO, 'Despacho', 'hidespacho'),
			'hiddetgui0' => array(self::BELONGS_TO, 'Detgui', 'hiddetgui'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidespacho' => 'Hidespacho',
			'hiddetgui' => 'Hiddetgui',
			'cant' => 'Cant',
			'fecha' => 'Fecha',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('hidespacho',$this->hidespacho,true);
		$criteria->compare('hiddetgui',$this->hiddetgui,true);
		$criteria->compare('cant',$this->cant,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('iduser',$this->iduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Despachoguia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforesave(){
            $this->iduser=yii::app()->user->id;
            $this->fecha=date("Y-m-d H:i:s");
            return parent::beforesave();
        }
}
