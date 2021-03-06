<?php

/**
 * This is the model class for table "maestrogrupos".
 *
 * The followings are the available columns in table 'maestrogrupos':
 * @property string $codgrupo
 * @property string $descri1
 * @property string $descri2
 */
class Maestrogrupos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Maestrogrupos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'public_maestrogrupos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('codgrupo', 'required'),
			array('codgrupo', 'length', 'max'=>3),
			array('descri1', 'length', 'max'=>23),
			array('descri1', 'required'),
			//array('descri2', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('codgrupo, descri1, descri2', 'safe', 'on'=>'search'),
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

	
	public $maximovalor;
	//public $conservarvalor=0; //Opcionpa reaverificar si se quedan lo valores predfindos en sesiones 
	public function beforeSave() {
							if ($this->isNewRecord) {
									
									   //
										// $this->creadoel=Yii::app()->user->name;
									    $this->codgrupo=Numeromaximo::numero($this->model(),'codgrupo','maximovalor',3);
										//$this->cod_estado='01';
											//$this->c_salida='1';
									} else
									{
										
										//$this->ultimares=" ".strtoupper(trim($this->usuario=Yii::app()->user->name))." ".date("H:i")." :".$this->ultimares;
									}
									return parent::beforeSave();
				}
	
	
	
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codgrupo' => 'Codgrupo',
			'descri1' => 'Descri1',
			'descri2' => 'Descri2',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('codgrupo',$this->codgrupo,true);
		$criteria->compare('descri1',$this->descri1,true);
		$criteria->compare('descri2',$this->descri2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}