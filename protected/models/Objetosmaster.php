<?php

/**
 * This is the model class for table "{{objetosmaster}}".
 *
 * The followings are the available columns in table '{{objetosmaster}}':
 * @property integer $id
 * @property string $hcodobmaster
 * @property integer $hidobjeto
 * @property string $activo
 */
class Objetosmaster extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{objetosmaster}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hcodobmaster, hidobjeto', 'required'),
			array('hidobjeto', 'numerical', 'integerOnly'=>true),
			array('hcodobmaster', 'length', 'max'=>15),
			array('activo', 'length', 'max'=>1),
			array('hidobjeto+hcodobmaster', 'application.extensions.uniqueMultiColumnValidator','on'=>'insert,update'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hcodobmaster, hidobjeto, activo', 'safe', 'on'=>'search'),
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

				'objetos'=> array(self::BELONGS_TO, 'ObjetosCliente', 'hidobjeto'),
				'master'=> array(self::BELONGS_TO, 'Masterequipo', 'hcodobmaster'),

			);

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hcodobmaster' => 'Hcodobmaster',
			'hidobjeto' => 'Hidobjeto',
			'activo' => 'Activo',
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
		$criteria->compare('hcodobmaster',$this->hcodobmaster,true);
		$criteria->compare('hidobjeto',$this->hidobjeto);
		$criteria->compare('activo',$this->activo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function search_por_objeto($id)
	{
		$identidad=(int)MiFactoria::cleanInput($id);
			$criteria=new CDbCriteria;
		$criteria->addCondition("hidobjeto=".$identidad);



		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}




	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Objetosmaster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}




}
