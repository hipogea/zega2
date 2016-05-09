<?php

/**
 * This is the model class for table "{{catvaloracion}}".
 *
 * The followings are the available columns in table '{{catvaloracion}}':
 * @property string $codcatval
 * @property string $descat
 *
 * The followings are the available model relations:
 * @property Detercuentas[] $detercuentases
 * @property Maestrodetalle[] $maestrodetalles
 */
class Catvaloracion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{catvaloracion}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codcatval', 'required'),
			array('codcatval', 'length', 'max'=>4),
			array('descat', 'length', 'max'=>30),
			array('tipo', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codcatval, tipo, descat', 'safe', 'on'=>'search'),
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
			'detercuentases' => array(self::HAS_MANY, 'Detercuentas', 'codcatval'),
			'maestrodetalles' => array(self::HAS_MANY, 'Maestrodetalle', 'catval'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codcatval' => 'Codcatval',
			'descat' => 'Descat',
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

		$criteria->compare('codcatval',$this->codcatval,true);
		$criteria->compare('descat',$this->descat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Catvaloracion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
