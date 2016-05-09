<?php

/**
 * This is the model class for table "vw_detercuentas".
 *
 * The followings are the available columns in table 'vw_detercuentas':
 * @property string $codop
 * @property string $codcatval
 * @property string $cuentadebe
 * @property string $cuentahaber
 * @property string $desop
 * @property string $descat
 * @property string $debe
 * @property string $haber
 */
class VwDetercuentas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_detercuentas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desop', 'required'),
			array('codop', 'length', 'max'=>3),
			array('codcatval', 'length', 'max'=>4),
			array('cuentadebe, cuentahaber', 'length', 'max'=>18),
			array('desop', 'length', 'max'=>50),
			array('descat', 'length', 'max'=>30),
			array('debe, haber', 'length', 'max'=>35),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codop, codcatval, cuentadebe, cuentahaber, desop, descat, debe, haber', 'safe', 'on'=>'search'),
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
			'codop' => 'Codop',
			'codcatval' => 'Codcatval',
			'cuentadebe' => 'Cuentadebe',
			'cuentahaber' => 'Cuentahaber',
			'desop' => 'Desop',
			'descat' => 'Descat',
			'debe' => 'Debe',
			'haber' => 'Haber',
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

		$criteria->compare('codop',$this->codop,true);
		$criteria->compare('codcatval',$this->codcatval,true);
		$criteria->compare('cuentadebe',$this->cuentadebe,true);
		$criteria->compare('cuentahaber',$this->cuentahaber,true);
		$criteria->compare('desop',$this->desop,true);
		$criteria->compare('descat',$this->descat,true);
		$criteria->compare('debe',$this->debe,true);
		$criteria->compare('haber',$this->haber,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pagesize'=>100),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwDetercuentas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
