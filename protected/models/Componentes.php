<?php

/**
 * This is the model class for table "{{componentes}}".
 *
 * The followings are the available columns in table '{{componentes}}':
 * @property integer $id
 * @property integer $hidactivo
 * @property integer $parent_id
 * @property string $fecha
 * @property string $codlugar
 * @property string $codocu
 * @property string $numdoc
 * @property string $codmaster
 * @property string $acoplado
 *
 * The followings are the available model relations:
 * @property Lugares $codlugar0
 * @property Masterequipo $codmaster0
 * @property Documentos $codocu0
 */
class Componentes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{componentes}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('hidactivo, parent_id, fecha, codlugar, codocu, numdoc, codmaster, acoplado', 'required'),
			array('hidactivo, parent_id', 'numerical', 'integerOnly'=>true),
			array('codlugar', 'length', 'max'=>8),
			array('codocu', 'length', 'max'=>3),
			array('numdoc, codmaster', 'length', 'max'=>12),
			array('acoplado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidactivo, parent_id, fecha, codlugar, codocu, numdoc, codmaster, acoplado', 'safe', 'on'=>'search'),
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
			'lugares' => array(self::BELONGS_TO, 'Lugares', 'codlugar'),
			'master' => array(self::BELONGS_TO, 'Masterequipo', 'codmaster'),
			'documentos' => array(self::BELONGS_TO, 'Documentos', 'codocu'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidactivo' => 'Hidactivo',
			'parent_id' => 'Parent',
			'fecha' => 'Fecha',
			'codlugar' => 'Codlugar',
			'codocu' => 'Codocu',
			'numdoc' => 'Numdoc',
			'codmaster' => 'Codmaster',
			'acoplado' => 'Acoplado',
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
		$criteria->compare('hidactivo',$this->hidactivo);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('codlugar',$this->codlugar,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('numdoc',$this->numdoc,true);
		$criteria->compare('codmaster',$this->codmaster,true);
		$criteria->compare('acoplado',$this->acoplado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Componentes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function search_por_activo($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
			$id=(integer)MiFactoria::cleanInput($id);
		$criteria=new CDbCriteria;


		$criteria->addCondition("hidactivo=".$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
