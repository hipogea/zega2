<?php

/**
 * This is the model class for table "{{masterlistamateriales}}".
 *
 * The followings are the available columns in table '{{masterlistamateriales}}':
 * @property string $id
 * @property string $codigo
 * @property string $hidlista
 * @property string $activo
 *
 * The followings are the available model relations:
 * @property Listamateriales $hidlista0
 * @property Masterequipo $codigo0
 */
class Masterlistamateriales extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{masterlistamateriales}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo', 'length', 'max'=>18),
			array('hidlista', 'length', 'max'=>20),
			array('activo', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, codigo, hidlista, activo', 'safe', 'on'=>'search'),
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
			'listamateriales' => array(self::BELONGS_TO, 'Listamateriales', 'hidlista'),
			'masterequipo' => array(self::BELONGS_TO, 'Masterequipo', 'codigo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codigo' => 'Codigo',
			'hidlista' => 'Hidlista',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('hidlista',$this->hidlista,true);
		$criteria->compare('activo',$this->activo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        public function search_por_codigo($codigo)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
                $codigo=  MiFactoria::cleanInput($codigo);
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('hidlista',$this->hidlista,true);
		$criteria->compare('activo',$this->activo,true);
                $criteria->addCondition("codigo=:vcodigo");
                $criteria->params=array(":vcodigo"=>$codigo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Masterlistamateriales the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
