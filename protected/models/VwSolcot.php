<?php

/**
 * This is the model class for table "vw_solcot".
 *
 * The followings are the available columns in table 'vw_solcot':
 * @property string $numero
 * @property string $fecha
 * @property integer $vigencia
 * @property string $id
 * @property double $preciounit
 * @property string $indicaciones
 * @property double $cant
 * @property string $dedispo
 * @property string $um
 * @property string $txtmaterial
 * @property string $codart
 * @property string $desum
 */
class VwSolcot extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_solcot';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('numero, fecha, vigencia, preciounit, indicaciones, cant, txtmaterial, codart', 'required'),
			array('vigencia', 'numerical', 'integerOnly'=>true),
			array('preciounit, cant', 'numerical'),
			array('numero', 'length', 'max'=>15),
			array('id, desum', 'length', 'max'=>20),
			array('dedispo, txtmaterial', 'length', 'max'=>40),
			array('um', 'length', 'max'=>3),
			array('codart', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('numero, fecha, vigencia, id, preciounit, indicaciones, cant, dedispo, um, txtmaterial, codart, desum', 'safe', 'on'=>'search'),
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
			'numero' => 'Numero',
			'fecha' => 'Fecha',
			'vigencia' => 'Vigencia',
			'id' => 'ID',
			'preciounit' => 'Preciounit',
			'indicaciones' => 'Indicaciones',
			'cant' => 'Cant',
			'dedispo' => 'Dedispo',
			'um' => 'Um',
			'txtmaterial' => 'Txtmaterial',
			'codart' => 'Codart',
			'desum' => 'Desum',
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

		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('vigencia',$this->vigencia);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('preciounit',$this->preciounit);
		$criteria->compare('indicaciones',$this->indicaciones,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('dedispo',$this->dedispo,true);
		$criteria->compare('um',$this->um,true);
		$criteria->compare('txtmaterial',$this->txtmaterial,true);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('desum',$this->desum,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function search_clipro($codpro)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;


		$criteria->addCondition("codpro='".$codpro."'");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwSolcot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
