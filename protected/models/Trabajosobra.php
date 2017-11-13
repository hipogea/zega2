<?php

/**
 * This is the model class for table "{{trabajosobra}}".
 *
 * The followings are the available columns in table '{{trabajosobra}}':
 * @property string $id
 * @property string $hidparte
 * @property string $tipo
 * @property string $horarep
 * @property string $descripcion
 * @property integer $iduser
 * @property string $texto
 * @property string $dependencia
 * @property string $codpro
 * @property string $horafin
 */
class Trabajosobra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{trabajosobra}}';
	}

        
        public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'libroobra' => array(self::BELONGS_TO, 'Libroobra',  'hidparte'),
                     'tipoeventos' => array(self::BELONGS_TO, 'Tipoeventos',  'tipo'),
                     'clipro' => array(self::BELONGS_TO, 'Clipro',  'codpro'),
                     'asisobra' => array(self::HAS_MANY, 'Asisobra',  'codpro'),
		);
	
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iduser', 'numerical', 'integerOnly'=>true),
			array('hidparte', 'length', 'max'=>20),
			array('tipo', 'length', 'max'=>3),
			array('horarep, codpro, horafin', 'length', 'max'=>8),
			array('descripcion', 'length', 'max'=>50),
			array('dependencia', 'length', 'max'=>40),
			array('texto', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidparte, tipo, horarep, descripcion, iduser, texto, dependencia, codpro, horafin', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidparte' => 'Hidparte',
			'tipo' => 'Tipo',
			'horarep' => 'Horarep',
			'descripcion' => 'Descripcion',
			'iduser' => 'Iduser',
			'texto' => 'Texto',
			'dependencia' => 'Dependencia',
			'codpro' => 'Codpro',
			'horafin' => 'Horafin',
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
		$criteria->compare('hidparte',$this->hidparte,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('horarep',$this->horarep,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('dependencia',$this->dependencia,true);
		$criteria->compare('codpro',$this->codpro,true);
		$criteria->compare('horafin',$this->horafin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        
        public function search_por_parte($idparte)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
$idparte=(integer) MiFactoria::cleanInput($idparte);
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('hidparte',$this->hidparte,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('horarep',$this->horarep,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('dependencia',$this->dependencia,true);
		$criteria->compare('codpro',$this->codpro,true);
		$criteria->compare('horafin',$this->horafin,true);
                $criteria->addCondition("hidparte=".$idparte);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Trabajosobra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
