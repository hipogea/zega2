<?php

/**
 * This is the model class for table "vw_rendiciontrabajador".
 *
 * The followings are the available columns in table 'vw_rendiciontrabajador':
 * @property string $id
 * @property integer $hidcaja
 * @property integer $hidcargo
 * @property string $fecha
 * @property string $glosa
 * @property string $referencia
 * @property string $debe
 * @property string $haber
 * @property string $monedahaber
 * @property string $saldo
 * @property string $codtra
 * @property string $ceco
 * @property string $fechacre
 * @property integer $iduser
 * @property string $codocu
 * @property string $coddocu
 * @property string $tipoflujo
 * @property string $codestado
 * @property string $monto
 * @property string $tipimputacion
 * @property string $estado
 * @property string $desdocu
 * @property string $area
 * @property string $ap
 * @property string $am
 * @property string $nombres
 * @property string $hidhijo
 * @property integer $hidcajahijo
 * @property integer $hidcargohijo
 * @property string $fechahijo
 * @property string $glosahijo
 * @property string $referenciahijo
 * @property string $debehijo
 * @property string $haberhijo
 * @property string $monedahaberhijo
 * @property string $saldohijo
 * @property string $codtrahijo
 * @property string $cecohijo
 * @property string $fechacrehijo
 * @property integer $iduserhijo
 * @property string $codocuhijo
 * @property string $coddocuhijo
 * @property string $tipoflujohijo
 * @property string $codestadohijo
 * @property string $montohijo
 * @property string $tipimputacionhijo
 * @property string $desceco
 * @property string $destipohijo
 */
class VwRendiciontrabajador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_rendiciontrabajador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidcaja, fecha, glosa, referencia, monedahaber, codtra, ceco, fechacre, iduser, codocu, coddocu, tipoflujo, codestado, monto, tipimputacion, hidcajahijo, fechahijo, glosahijo, referenciahijo, monedahaberhijo, codtrahijo, cecohijo, fechacrehijo, iduserhijo, codocuhijo, coddocuhijo, tipoflujohijo, codestadohijo, montohijo, tipimputacionhijo, destipohijo', 'required'),
			array('hidcaja, hidcargo, iduser, hidcajahijo, hidcargohijo, iduserhijo', 'numerical', 'integerOnly'=>true),
			array('id, hidhijo', 'length', 'max'=>20),
			array('glosa, referencia, glosahijo, referenciahijo', 'length', 'max'=>60),
			array('debe, haber, saldo, debehijo, haberhijo, saldohijo', 'length', 'max'=>10),
			array('monedahaber, codocu, coddocu, tipoflujo, monedahaberhijo, codocuhijo, coddocuhijo, tipoflujohijo', 'length', 'max'=>3),
			array('codtra, codtrahijo', 'length', 'max'=>4),
			array('ceco, cecohijo', 'length', 'max'=>12),
			array('codestado, codestadohijo', 'length', 'max'=>2),
			array('monto, montohijo', 'length', 'max'=>9),
			array('tipimputacion, tipimputacionhijo', 'length', 'max'=>1),
			array('estado, area, nombres', 'length', 'max'=>25),
			array('desdocu', 'length', 'max'=>45),
			array('ap', 'length', 'max'=>30),
			array('am, desceco', 'length', 'max'=>35),
			array('destipohijo', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidcaja, hidcargo, fecha, glosa, referencia, debe, haber, monedahaber, saldo, codtra, ceco, fechacre, iduser, codocu, coddocu, tipoflujo, codestado, monto, tipimputacion, estado, desdocu, area, ap, am, nombres, hidhijo, hidcajahijo, hidcargohijo, fechahijo, glosahijo, referenciahijo, debehijo, haberhijo, monedahaberhijo, saldohijo, codtrahijo, cecohijo, fechacrehijo, iduserhijo, codocuhijo, coddocuhijo, tipoflujohijo, codestadohijo, montohijo, tipimputacionhijo, desceco, destipohijo', 'safe', 'on'=>'search'),
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
			'hidcaja' => 'Hidcaja',
			'hidcargo' => 'Hidcargo',
			'fecha' => 'Fecha',
			'glosa' => 'Glosa',
			'referencia' => 'Referencia',
			'debe' => 'Debe',
			'haber' => 'Haber',
			'monedahaber' => 'Moneda',
			'saldo' => 'Saldo',
			'codtra' => 'Codtra',
			'ceco' => 'Ceco',
			'fechacre' => 'Fechacre',
			'iduser' => 'Iduser',
			'codocu' => 'Codocu',
			'coddocu' => 'Coddocu',
			'tipoflujo' => 'Flujo',
			'codestado' => 'Estado',
			'monto' => 'Monto',
			'tipimputacion' => 'Imp',
			'estado' => 'Estado',
			'desdocu' => 'Docum',
			'area' => 'Area',
			'ap' => 'Ap',
			'am' => 'Am',
			'nombres' => 'Nombres',
			'hidhijo' => 'Hidhijo',
			'hidcajahijo' => 'Hidcajahijo',
			'hidcargohijo' => 'Hidcargohijo',
			'fechahijo' => 'Fechahijo',
			'glosahijo' => 'Glosa',
			'referenciahijo' => 'Referencia',
			'debehijo' => 'Debe',
			'haberhijo' => 'Haber',
			'monedahaberhijo' => 'Moneda',
			'saldohijo' => 'Saldo',
			'codtrahijo' => 'Codtrahijo',
			'cecohijo' => 'Ceco',
			'fechacrehijo' => 'Fec',
			'iduserhijo' => 'Iduserhijo',
			'codocuhijo' => 'Codocuhijo',
			'coddocuhijo' => 'Coddocuhijo',
			'tipoflujohijo' => 'Tipoflujo',
			'codestadohijo' => 'Codestado',
			'montohijo' => 'Monto',
			'tipimputacionhijo' => 'Imputac',
			'desceco' => 'Ceco',
			'destipohijo' => 'Flujo',
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
		$criteria->compare('hidcaja',$this->hidcaja);
		$criteria->compare('hidcargo',$this->hidcargo);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('glosa',$this->glosa,true);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('debe',$this->debe,true);
		$criteria->compare('haber',$this->haber,true);
		$criteria->compare('monedahaber',$this->monedahaber,true);
		$criteria->compare('saldo',$this->saldo,true);
		$criteria->compare('codtra',$this->codtra,true);
		$criteria->compare('ceco',$this->ceco,true);
		$criteria->compare('fechacre',$this->fechacre,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('coddocu',$this->coddocu,true);
		$criteria->compare('tipoflujo',$this->tipoflujo,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('tipimputacion',$this->tipimputacion,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('desdocu',$this->desdocu,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('ap',$this->ap,true);
		$criteria->compare('am',$this->am,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('hidhijo',$this->hidhijo,true);
		$criteria->compare('hidcajahijo',$this->hidcajahijo);
		$criteria->compare('hidcargohijo',$this->hidcargohijo);
		$criteria->compare('fechahijo',$this->fechahijo,true);
		$criteria->compare('glosahijo',$this->glosahijo,true);
		$criteria->compare('referenciahijo',$this->referenciahijo,true);
		$criteria->compare('debehijo',$this->debehijo,true);
		$criteria->compare('haberhijo',$this->haberhijo,true);
		$criteria->compare('monedahaberhijo',$this->monedahaberhijo,true);
		$criteria->compare('saldohijo',$this->saldohijo,true);
		$criteria->compare('codtrahijo',$this->codtrahijo,true);
		$criteria->compare('cecohijo',$this->cecohijo,true);
		$criteria->compare('fechacrehijo',$this->fechacrehijo,true);
		$criteria->compare('iduserhijo',$this->iduserhijo);
		$criteria->compare('codocuhijo',$this->codocuhijo,true);
		$criteria->compare('coddocuhijo',$this->coddocuhijo,true);
		$criteria->compare('tipoflujohijo',$this->tipoflujohijo,true);
		$criteria->compare('codestadohijo',$this->codestadohijo,true);
		$criteria->compare('montohijo',$this->montohijo,true);
		$criteria->compare('tipimputacionhijo',$this->tipimputacionhijo,true);
		$criteria->compare('desceco',$this->desceco,true);
		$criteria->compare('destipohijo',$this->destipohijo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwRendiciontrabajador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
