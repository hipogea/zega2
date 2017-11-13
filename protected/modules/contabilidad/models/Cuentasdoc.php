<?php

/**
 * This is the model class for table "{{cuentasdoc}}".
 *
 * The followings are the available columns in table '{{cuentasdoc}}':
 * @property string $codocu
 * @property string $debehaber
 * @property string $codcuenta
 */
class Cuentasdoc extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{cuentasdoc}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codocu', 'length', 'max'=>3),
			array('debehaber', 'length', 'max'=>1),
			array('codcuenta', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codocu, debehaber, codcuenta', 'safe', 'on'=>'search'),
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
                    'cuentas' => array(self::BELONGS_TO, 'Cuentas', 'codcuenta'),
			//'sociedades' => array(self::BELONGS_TO, 'Sociedades', 'codsociedad'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codocu' => 'Codocu',
			'debehaber' => 'Debehaber',
			'codcuenta' => 'Codcuenta',
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

		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('debehaber',$this->debehaber,true);
		$criteria->compare('codcuenta',$this->codcuenta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        public function search_por_docu($codocu)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
$criteria->addCondition("codocu=:vocodu");
$criteria->params=array(":vocodu"=>$codocu);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cuentasdoc the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
