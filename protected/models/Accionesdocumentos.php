<?php

/**
 * This is the model class for table "{{accionesdocumentos}}".
 *
 * The followings are the available columns in table '{{accionesdocumentos}}':
 * @property string $id
 * @property integer $hidevento
 * @property string $hidref
 * @property string $numero
 * @property string $fechaproceso
 * @property integer $iduser
 * @property string $comentario
 * @property string $codocuref
 * @property string $numdocref
 *
 * The followings are the available model relations:
 * @property Documentos $codocuref0
 * @property Eventos $hidevento0
 */
class Accionesdocumentos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{accionesdocumentos}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidevento, iduser', 'numerical', 'integerOnly'=>true),
			array('hidref, numero, numdocref', 'length', 'max'=>20),
			array('codocuref', 'length', 'max'=>3),
			array('fechaproceso, comentario', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidevento, hidref, numero, fechaproceso, iduser, comentario, codocuref, numdocref', 'safe', 'on'=>'search'),
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
			'documentos' => array(self::BELONGS_TO, 'Documentos', 'codocuref'),
			'eventos' => array(self::BELONGS_TO, 'Eventos', 'hidevento'),
                       
                
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidevento' => 'Hidevento',
			'hidref' => 'Hidref',
			'numero' => 'Numero',
			'fechaproceso' => 'Fechaproceso',
			'iduser' => 'Iduser',
			'comentario' => 'Comentario',
			'codocuref' => 'Codocuref',
			'numdocref' => 'Numdocref',
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
		$criteria->compare('hidevento',$this->hidevento);
		$criteria->compare('hidref',$this->hidref,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('fechaproceso',$this->fechaproceso,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('codocuref',$this->codocuref,true);
		$criteria->compare('numdocref',$this->numdocref,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Accionesdocumentos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
