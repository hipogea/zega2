<?php

/**
 * This is the model class for table "vw_detalleingresofacturafirme".
 *
 * The followings are the available columns in table 'vw_detalleingresofacturafirme':
 * @property string $id
 * @property string $hidfactura
 * @property string $item
 * @property string $hidkardex
 * @property integer $iduser
 * @property string $fechacrea
 * @property string $hidalentrega
 * @property string $identrega
 * @property string $iddetcompra
 * @property double $cant
 * @property string $fechaentrega
 * @property string $idkardex
 * @property double $punitentrega
 * @property string $codart
 * @property double $cantcompras
 * @property double $punitcompra
 * @property string $itemcompra
 * @property string $descri
 * @property string $codentro
 * @property string $desum
 */
class VwDetalleingresofacturafirme extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_detalleingresofacturafirme';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidfactura, item, hidkardex, iduser, fechacrea, hidalentrega, punitentrega, codart, cantcompras, punitcompra, itemcompra, descri', 'required'),
			array('iduser', 'numerical', 'integerOnly'=>true),
			array('cant, punitentrega, cantcompras, punitcompra', 'numerical'),
			array('id, hidfactura, hidkardex, hidalentrega, identrega, iddetcompra, idkardex, desum', 'length', 'max'=>20),
			array('item, itemcompra', 'length', 'max'=>3),
			array('fechaentrega', 'length', 'max'=>19),
			array('codart', 'length', 'max'=>8),
			array('descri', 'length', 'max'=>40),
			array('codentro', 'length', 'max'=>4),
			array('fechacrea,fechaentrega, codart,codpro,numocompra,numrecepcion,numerodoc,
			  codentro', 'safe', 'on'=>'search'),

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
			'id' => 'ID',
			'hidfactura' => 'Hidfactura',
			'item' => 'Item',
			'hidkardex' => 'Hidkardex',
			'iduser' => 'Iduser',
			'fechacrea' => 'Fechacrea',
			'hidalentrega' => 'Hidalentrega',
			'identrega' => 'Identrega',
			'iddetcompra' => 'Iddetcompra',
			'cant' => 'Cant',
			'fechaentrega' => 'Fechaentrega',
			'idkardex' => 'Idkardex',
			'punitentrega' => 'Punitentrega',
			'codart' => 'Codart',
			'cantcompras' => 'Cantcompras',
			'punitcompra' => 'Punitcompra',
			'itemcompra' => 'Itemcompra',
			'descri' => 'Descri',
			'codentro' => 'Codentro',
			'desum' => 'Desum',
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

		//$criteria->compare('id',$this->id,true);
		//$criteria->compare('hidfactura',$this->hidfactura,true);
		//$criteria->compare('item',$this->item,true);
		//$criteria->compare('hidkardex',$this->hidkardex,true);
		//$criteria->compare('iduser',$this->iduser);
		$criteria->compare('fechacrea',$this->fechacrea,true);
		//$criteria->compare('hidalentrega',$this->hidalentrega,true);
		//$criteria->compare('identrega',$this->identrega,true);
		//$criteria->compare('iddetcompra',$this->iddetcompra,true);
	//	$criteria->compare('cant',$this->cant);
		$criteria->compare('fechaentrega',$this->fechaentrega,true);
		//$criteria->compare('idkardex',$this->idkardex,true);
		//$criteria->compare('punitentrega',$this->punitentrega);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('codpro',$this->codpro,true);
		$criteria->compare('codentro',$this->codentro,true);
		$criteria->compare('numocompra',$this->numocompra,true);
		$criteria->compare('numrecepcion',$this->numrecepcion,true);
		$criteria->compare('numerodoc',$this->numerodoc,true);
		//$criteria->compare('cantcompras',$this->cantcompras);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search_cabecera($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('hidfactura',$this->hidfactura,true);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('hidkardex',$this->hidkardex,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('fechacrea',$this->fechacrea,true);
		$criteria->compare('hidalentrega',$this->hidalentrega,true);
		$criteria->compare('identrega',$this->identrega,true);
		$criteria->compare('iddetcompra',$this->iddetcompra,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('fechaentrega',$this->fechaentrega,true);
		$criteria->compare('idkardex',$this->idkardex,true);
		$criteria->compare('punitentrega',$this->punitentrega);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('cantcompras',$this->cantcompras);
		$criteria->compare('punitcompra',$this->punitcompra);
		$criteria->compare('itemcompra',$this->itemcompra,true);
		$criteria->compare('descri',$this->descri,true);
		$criteria->compare('codentro',$this->codentro,true);
		$criteria->addCondition("hidfactura=:identidad");
		$criteria->params=array(":identidad"=>(int)$id);
		$criteria->order="itemcompra ASC ";


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,

		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwDetalleingresofacturafirme the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
