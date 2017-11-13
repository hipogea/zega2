<?php

/**
 * This is the model class for table "{{dpeticionot}}".
 *
 * The followings are the available columns in table '{{dpeticionot}}':
 * @property string $id
 * @property string $hidetot
 * @property string $hidpeticion
 * @property string $hidecuot
 * @property string $hidrecuexot
 * @property string $um
 * @property string $codart
 * @property double $punit
 * @property double $plista
 * @property double $igv_monto
 * @property double $descuento
 * @property double $pventa
 * @property double $cant
 * @property string $comentario
 * @property string $codestado
 * @property string $codcen
 * @property string $codal
 * @property string $codocu
 * @property integer $iduser
 * @property string $disponibilidad
 * @property string $item
 * @property string $descripcion
 * @property string $tipo
 * @property string $imputacion
 *
 * The followings are the available model relations:
 * @property Ums $um0
 * @property Estado $codestado0
 * @property Documentos $codocu0
 */
class Dpeticionot extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{dpeticionot}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidetot, hidpeticion, hidecuot, hidrecuexot, um, codart, punit, plista, igv_monto, descuento, pventa, cant, comentario, codestado, codcen, codal, codocu, iduser, disponibilidad, descripcion, imputacion', 'required'),
			array('iduser', 'numerical', 'integerOnly'=>true),
			array('punit, plista, igv_monto, descuento, pventa, cant', 'numerical'),
			array('hidetot, hidpeticion, hidecuot, hidrecuexot', 'length', 'max'=>20),
			array('um, codal, codocu, item', 'length', 'max'=>3),
			array('codart', 'length', 'max'=>10),
			array('codestado, disponibilidad', 'length', 'max'=>2),
			array('codcen', 'length', 'max'=>4),
			array('descripcion', 'length', 'max'=>40),
			array('tipo', 'length', 'max'=>1),
			array('imputacion', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidetot, hidpeticion, hidecuot, hidrecuexot, um, codart, punit, plista, igv_monto, descuento, pventa, cant, comentario, codestado, codcen, codal, codocu, iduser, disponibilidad, item, descripcion, tipo, imputacion', 'safe', 'on'=>'search'),
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
			'um0' => array(self::BELONGS_TO, 'Ums', 'um'),
			'codestado0' => array(self::BELONGS_TO, 'Estado', 'codestado'),
			'codocu0' => array(self::BELONGS_TO, 'Documentos', 'codocu'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidetot' => 'Hidetot',
			'hidpeticion' => 'Hidpeticion',
			'hidecuot' => 'Hidecuot',
			'hidrecuexot' => 'Hidrecuexot',
			'um' => 'Um',
			'codart' => 'Codart',
			'punit' => 'Punit',
			'plista' => 'Plista',
			'igv_monto' => 'Igv Monto',
			'descuento' => 'Descuento',
			'pventa' => 'Pventa',
			'cant' => 'Cant',
			'comentario' => 'Comentario',
			'codestado' => 'Codestado',
			'codcen' => 'Codcen',
			'codal' => 'Codal',
			'codocu' => 'Codocu',
			'iduser' => 'Iduser',
			'disponibilidad' => 'Disponibilidad',
			'item' => 'Item',
			'descripcion' => 'Descripcion',
			'tipo' => 'Tipo',
			'imputacion' => 'Imputacion',
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
		$criteria->compare('hidetot',$this->hidetot,true);
		$criteria->compare('hidpeticion',$this->hidpeticion,true);
		$criteria->compare('hidecuot',$this->hidecuot,true);
		$criteria->compare('hidrecuexot',$this->hidrecuexot,true);
		$criteria->compare('um',$this->um,true);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('punit',$this->punit);
		$criteria->compare('plista',$this->plista);
		$criteria->compare('igv_monto',$this->igv_monto);
		$criteria->compare('descuento',$this->descuento);
		$criteria->compare('pventa',$this->pventa);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('codcen',$this->codcen,true);
		$criteria->compare('codal',$this->codal,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('disponibilidad',$this->disponibilidad,true);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('imputacion',$this->imputacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dpeticionot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
