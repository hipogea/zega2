<?php

/**
 * This is the model class for table "vw_imputaciones".
 *
 * The followings are the available columns in table 'vw_imputaciones':
 * @property string $codc
 * @property string $clasecolector
 * @property string $desceco
 * @property string $desimputa
 */
class VwImputaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_imputaciones';
	}

	public function findByPk($valor){
		return self::model()->find("codc=:valore", array(":valore"=>$valor));

	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codc', 'length', 'max'=>12),
			array('clasecolector', 'length', 'max'=>1),
			array('desceco', 'length', 'max'=>40),
			array('desimputa', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codc,codclase, clasecolector, desceco, desimputa', 'safe', 'on'=>'search'),
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
			'codc' => 'Codc',
			'clasecolector' => 'Clasecolector',
			'desceco' => 'Desceco',
			'desimputa' => 'Desimputa',
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

		$criteria->compare('codc',$this->codc,true);
		$criteria->compare('clasecolector',$this->clasecolector,true);
                $criteria->compare('codclase',$this->codclase,true);
		$criteria->compare('desceco',$this->desceco,true);
		$criteria->compare('desimputa',$this->desimputa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,'pagination' => array(
				'pageSize' => 100,
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwImputaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
