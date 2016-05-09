<?php

/**
 * This is the model class for table "{{desolcot}}".
 *
 * The followings are the available columns in table '{{desolcot}}':
 * @property string $id
 * @property integer $hidsolcot
 * @property string $hiddesolpe
 * @property string $codispo
 * @property double $cant
 * @property double $preciounit
 * @property string $indicaciones
 */
class Desolcot extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{desolcot}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidsolcot, hiddesolpe, codispo, cant', 'required'),
			array('hidsolcot', 'numerical', 'integerOnly'=>true),
			array('cant, preciounit', 'numerical'),
			array('hiddesolpe', 'length', 'max'=>20),
			array('codispo', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidsolcot, hiddesolpe, codispo, cant, preciounit, indicaciones', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			//'hidsolpe0' => array(self::BELONGS_TO, 'Solpe', 'hidsolpe'),
			'desolpe' => array(self::BELONGS_TO, 'Desolpe', 'hiddesolpe'),
				// 'desolpe_alinventario'=>array(self::BELONGS_TO,'Alinventario',array('codal'=>'codalm','centro'=>'codcen','codart'=>'codart')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidsolcot' => 'Hidsolcot',
			'hiddesolpe' => 'Hiddesolpe',
			'codispo' => 'Codispo',
			'cant' => 'Cant',
			'preciounit' => 'Preciounit',
			'indicaciones' => 'Indicaciones',
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
		$criteria->compare('hidsolcot',$this->hidsolcot);
		$criteria->compare('hiddesolpe',$this->hiddesolpe,true);
		$criteria->compare('codispo',$this->codispo,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('preciounit',$this->preciounit);
		$criteria->compare('indicaciones',$this->indicaciones,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

public function search_por_solcot($id){
	$criteria=new CDbCriteria;


	$criteria->addcondition("hidsolcot=".$id);

	return new CActiveDataProvider($this, array(
		'criteria'=>$criteria,
	));

}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Desolcot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
