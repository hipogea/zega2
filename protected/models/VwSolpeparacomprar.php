<?php
CONST ESTADO_OC_APROBADA='20';
class VwSolpeparacomprar extends CActiveRecord
{

	public function tableName()
	{
		return 'vw_solpeparacomprar';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('numero, estado, fechaent,fechaent1,fechacrea,fechacrea1, tipsolpe, centro, codal, codart, imputacion, cant, desum, txtmaterial, cantatendida, cant_pendiente', 'safe', 'on'=>'search'),
			//array('numero, estado, fechaent, tipsolpe, centro, codal, codart, imputacion, cant, desum, txtmaterial, cantatendida, cant_pendiente', 'safe', 'on'=>'search')
			array('numero, estado, fechaent,fechaent1,fechacrea,fechacrea1, tipsolpe, centro, codal, codart, imputacion, cant, desum, txtmaterial, cantatendida, cant_pendiente', 'safe', 'on'=>'search_servicio'),
		
                    );
	}
	public $fechaent1;
	public $fechacrea1;
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(

			'maestro' => array(self::BELONGS_TO, 'Maestrocompo', 'codart'),
			'cecos' => array(self::BELONGS_TO, 'Cc','imputacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'numero' => 'Numero',
			'estado' => 'Estado',
			'fechaent' => 'Fechaent',
			'tipsolpe' => 'Tipsolpe',
			'centro' => 'Centro',
			'codal' => 'Codal',
			'codart' => 'Codart',
			'imputacion' => 'Imputacion',
			'cant' => 'Cant',
			'desum' => 'Desum',
			'txtmaterial' => 'Txtmaterial',
			'cantatendida' => 'Cantatendida',
			'cant_pendiente' => 'Cant Pendiente',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('escompra',$this->escompra,true);
		//$criteria->compare('estado',$this->estado,true);
		//$criteria->compare('fechaent',$this->fechaent,true);
		$criteria->compare('tipsolpe',$this->tipsolpe,true);
		$criteria->compare('centro',$this->centro,true);
		$criteria->compare('codal',$this->codal,true);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('imputacion',$this->imputacion,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('desum',$this->desum,true);
		//$criteria->compare('txtmaterial',$this->txtmaterial,true);
		$criteria->compare('cantatendida',$this->cantatendida);
		$criteria->compare('cant_pendiente',$this->cant_pendiente);
		$criteria->addcondition(" est  in ('30') ");
		$criteria->addcondition(" txtmaterial like '%".MiFactoria::cleanInput($this->txtmaterial)."%' ");
                $criteria->addBetweenCondition('fechaent', ''.yii::app()->periodo->toISO($this->fechaent).'', ''.yii::app()->periodo->toISO($this->fechaent1).'');
		$criteria->addBetweenCondition('fechacrea', ''.yii::app()->periodo->toISO($this->fechacrea).'', ''.yii::app()->periodo->toISO($this->fechacrea1.''));

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 100,
			)
		));
	}

	public function search_servicio()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('escompra',$this->escompra,true);
		//$criteria->compare('estado',$this->estado,true);
		//$criteria->compare('fechaent',$this->fechaent,true);
		$criteria->compare('tipsolpe',$this->tipsolpe,true);
		$criteria->compare('centro',$this->centro,true);
		$criteria->compare('codal',$this->codal,true);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('imputacion',$this->imputacion,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('desum',$this->desum,true);
		//$criteria->compare('txtmaterial',$this->txtmaterial,true);
		$criteria->compare('cantatendida',$this->cantatendida);
		$criteria->compare('cant_pendiente',$this->cant_pendiente);
		$criteria->addcondition(" txtmaterial like '%".MiFactoria::cleanInput($this->txtmaterial)."%' ");
		$criteria->addcondition("tipsolpe='S' ");
		$criteria->addBetweenCondition('fechaent', ''.yii::app()->periodo->toISO($this->fechaent).'', ''.yii::app()->periodo->toISO($this->fechaent1).'');
		$criteria->addBetweenCondition('fechacrea', ''.yii::app()->periodo->toISO($this->fechacrea).'', ''.yii::app()->periodo->toISO($this->fechacrea1.''));

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 100,
			)
		));
	}


	public function findByPk($numero){
		$registros=self::model()->findAll("numero=:vnumero",array(":vnumero"=>$numero));
		if(!is_null($registros)){
			return $registros[0];
		}else {
			return null;
		}


	}

	public function search_aprobados()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fechaent',$this->fechaent,true);
		$criteria->compare('tipsolpe',$this->tipsolpe,true);
		$criteria->compare('centro',$this->centro,true);
		$criteria->compare('codal',$this->codal,true);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('imputacion',$this->imputacion,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('desum',$this->desum,true);
		$criteria->compare('txtmaterial',$this->txtmaterial,true);
		$criteria->compare('cantatendida',$this->cantatendida);
		$criteria->compare('cant_pendiente',$this->cant_pendiente);
		$criteria->addcondition("estado='".ESTADO_OC_APROBADA."'");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function  findById($id){
		$id=(integer)MiFactoria::cleanInput($id);
		$criterio=New CDBCriteria();
		$criterio->addCondition("id=:vid");
		$criterio->params=array(":vid"=>$id);
		return self::model()->find($criterio);
	}
}
