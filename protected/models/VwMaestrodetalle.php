<?php

class VwMaestrodetalle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_maestrodetalle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo, codal, codcentro, sujetolote, tolerancia', 'required'),
			array('canteconomica, cantreorden', 'numerical'),
			array('codigo', 'length', 'max'=>10),
			array('marca, nparte', 'length', 'max'=>35),
			array('desum', 'length', 'max'=>20),
			array('descripcion', 'length', 'max'=>60),
			array('um, codal', 'length', 'max'=>3),
			array('codtipo, canaldist, tolerancia', 'length', 'max'=>2),
			array('esrotativo, supervisionautomatica, controlprecio, sujetolote', 'length', 'max'=>1),
			array('catval, codcentro', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codigo, marca, desum, descripcion, nparte, um, codtipo,  supervisionautomatica, catval, codal, codcentro, controlprecio', 'safe', 'on'=>'search'),
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
			'codigo' => 'Codigo',
			'marca' => 'Marca',
			'desum' => 'Um',
			'descripcion' => 'Descripcion',
			'nparte' => 'N Parte',
			'um' => 'Um',
			'codtipo' => 'Codtipo',
			'esrotativo' => 'Rotat',
			'canteconomica' => 'Cant Ec',
			'supervisionautomatica' => 'Sup Stock',
			'canaldist' => 'Canal',
			'cantreorden' => 'Reorden',
			'catval' => 'Grupo Val',
			'codal' => 'Alm',
			'codcentro' => 'Cent',
			'controlprecio' => 'Tipo Valor',
			'sujetolote' => 'Lote',
			'tolerancia' => 'Tol',
		);
	}


	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('marca',$this->marca,true);
		$criteria->compare('desum',$this->desum,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('nparte',$this->nparte,true);
		$criteria->compare('um',$this->um,true);
		$criteria->compare('codtipo',$this->codtipo,true);
		$criteria->compare('esrotativo',$this->esrotativo,true);
		$criteria->compare('canteconomica',$this->canteconomica);
		$criteria->compare('supervisionautomatica',$this->supervisionautomatica,true);
		$criteria->compare('canaldist',$this->canaldist,true);
		$criteria->compare('cantreorden',$this->cantreorden);
		$criteria->compare('catval',$this->catval,true);
		$criteria->compare('codal',$this->codal,true);
		$criteria->compare('codcentro',$this->codcentro,true);
		$criteria->compare('controlprecio',$this->controlprecio,true);
		$criteria->compare('sujetolote',$this->sujetolote,true);
		$criteria->compare('tolerancia',$this->tolerancia,true);
		if(isset($_SESSION['sesion_Maestrocompo'])) {
			$criteria->addInCondition('codigo', $_SESSION['sesion_Maestrocompo'], 'AND');
		} ELSE {
			$criteria->compare('codigo',$this->codigo,true);
		}

		if(isset($_SESSION['sesion_Catvaloracion'])) {
			$criteria->addInCondition('catval', $_SESSION['sesion_Catvaloracion'], 'AND');
		} ELSE {
			$criteria->compare('catval',$this->catval,true);
		}
           // var_dump($criteria->condition);yii::app()->end();
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwMaestrodetalle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
