<?php

/**
 * This is the model class for table "{{impuestosaplicados}}".
 *
 * The followings are the available columns in table '{{impuestosaplicados}}':
 * @property string $id
 * @property string $hidocu
 * @property string $codocu
 * @property string $codimpuesto
 * @property string $valor
 * @property string $hidocupadre
 * @property string $codmon
 */
class Impuestosaplicados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{impuestosaplicados}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidocu, codocu, codimpuesto, valor, hidocupadre, codmon', 'required'),
			//array('idsatus,id,idusertemp', 'safe'),

			// @todo Please remove those attributes that should not be searched.
			array('id, hidocu, codocu, codimpuesto, valor, hidocupadre, codmon', 'safe', 'on'=>'search'),
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
			//'tempdpeticion' => array(self::BELONGS_TO, 'dpeticion', array('hidocu'=>'id','codocu'=>'codocu')),
			//'dpeticion' => array(self::BELONGS_TO, 'Tempdpeticion', array('hidocu'=>'id','codocu'=>'codocu')),
			'Impuestos'=>array(self::BELONGS_TO, 'Impuestos', array('codimpuesto'=>'codimpuesto')),

		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidocu' => 'Hidocu',
			'codocu' => 'Codocu',
			'codimpuesto' => 'Codimpuesto',
			'valor' => 'Valor',
			'hidocupadre' => 'Hidocupadre',
			'codmon' => 'Codmon',
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
		$criteria->compare('hidocu',$this->hidocu,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codimpuesto',$this->codimpuesto,true);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('hidocupadre',$this->hidocupadre,true);
		$criteria->compare('codmon',$this->codmon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Impuestosaplicados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
