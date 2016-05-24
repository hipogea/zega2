<?php

/**
 * This is the model class for table "{{cargainventariofisico}}".
 *
 * The followings are the available columns in table '{{cargainventariofisico}}':
 * @property string $id
 * @property integer $hidpadre
 * @property string $fecha
 * @property integer $iduser
 * @property integer $nregistros
 *
 * The followings are the available model relations:
 * @property Inventariofisicopadre $hidpadre0
 */
class Cargainventariofisico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{cargainventariofisico}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidpadre', 'required'),
			array('hidpadre, iduser, nregistros', 'numerical', 'integerOnly'=>true),
			array('fecha,hidpadre, iduser, idinicio,nregistros', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidpadre, fecha, iduser, nregistros', 'safe', 'on'=>'search'),
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
			'padre' => array(self::BELONGS_TO, 'Inventariofisicopadre', 'hidpadre'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidpadre' => 'Hidpadre',
			'fecha' => 'Fecha',
			'iduser' => 'Iduser',
			'nregistros' => 'Nregistros',
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
		$criteria->compare('hidpadre',$this->hidpadre);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('nregistros',$this->nregistros);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search_por_inventario($id)
	{

		$criteria=new CDbCriteria;


		$criteria->addCondition("hidpadre=:id");
		$criteria->params=array(":id"=>(integer)MiFactoria::cleanInput($id));

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cargainventariofisico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
