<?php

class VwOcomprasimple extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_ocomprasimple';
	}
public $fecdoc1;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codpro, fecdoc, tipologia, moneda, descuento, coddocu, codtipofac, codsociedad, codgrupoventas, codtipocotizacion, validez, codobjeto, codart, disp, cant, punit, item, descri, tipoitem, estadodetalle, um', 'required'),
			array('descuento, validez, idguia', 'numerical', 'integerOnly'=>true),
			array('cant, punit, stock, descontado, totalneto, punitdes, subto, entregado', 'numerical'),
			array('numcot, desmon', 'length', 'max'=>10),
			array('codpro, codservicio', 'length', 'max'=>6),
			array('fecdoc, fechapresentacion, fechanominal', 'length', 'max'=>19),
			array('tipologia, codsociedad, codtipocotizacion, tipoitem, tipoimputacion', 'length', 'max'=>1),
			array('moneda, coddocu, codgrupoventas, codobjeto, codigoalma, item, um, simbolo', 'length', 'max'=>3),
			array('usuario', 'length', 'max'=>35),
			array('codtipofac, disp, estadodetalle', 'length', 'max'=>2),
			array('codcentro, codentro', 'length', 'max'=>4),
			array('id, hidguia, desum', 'length', 'max'=>20),
			array('codart', 'length', 'max'=>8),
			array('descri', 'length', 'max'=>40),
			array('estado', 'length', 'max'=>25),
			array('detalle', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('numcot, codpro,numsolpe, fecdoc,fecdoc1, tipologia, moneda, descuento, usuario, coddocu, codtipofac, codsociedad, codgrupoventas, codtipocotizacion, validez, codcentro, codobjeto, fechapresentacion, fechanominal, idguia, id, codentro, codigoalma, codart, disp, cant, punit, item, descri, stock, detalle, tipoitem, descontado, totalneto, estadodetalle, um, hidguia, codservicio, tipoimputacion,   estado,entregado', 'safe', 'on'=>'search'),
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
			'numsolpe' => 'Solicitud',
			'numcot' => 'Numero',
			'codpro' => 'Cod Provee',
			'fecdoc' => 'F Compra',
			'tipologia' => 'Tipologia',
			'moneda' => 'Moneda',
			'descuento' => 'Descuento',
			'usuario' => 'Usuario',
			'coddocu' => 'Coddocu',
			'codtipofac' => 'T Fac',
			'codsociedad' => 'Sociedad',
			'codgrupoventas' => 'C grupo',
			'codtipocotizacion' => 'Tipo',
			'validez' => 'Validez',
			'codcentro' => 'Centro',
			//'codobjeto' => 'Codobjeto',
			'fechapresentacion' => 'Fechapresentacion',
			'fechanominal' => 'Fechanominal',
			'idguia' => 'Idguia',
			'id' => 'ID',
			'codentro' => 'Codentro',
			'codigoalma' => 'Almac',
			'codart' => 'Cod Mat',
			'disp' => 'Disp',
			'cant' => 'Cant',
			'punit' => 'Punit',
			'item' => 'Item',
			'descri' => 'Descri',
			'stock' => 'Stock',
			'detalle' => 'Detalle',
			'tipoitem' => 'Tipoitem',
			'descontado' => 'Descontado',
			'totalneto' => 'Totalneto',
			'estadodetalle' => 'Estadodetalle',
			'um' => 'Um',
			'hidguia' => 'Hidguia',
			'codservicio' => 'Codservicio',
			'tipoimputacion' => 'Tipoimputacion',
			'punitdes' => 'Punitdes',
			'subto' => 'Subto',
			'desmon' => 'Desmon',
			'simbolo' => 'Simbolo',
			'estado' => 'Estado',
			'desum' => 'Desum',
			'entregado' => 'Entregado',
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

		$criteria->compare('numcot',$this->numcot,true);
		$criteria->compare('codpro',$this->codpro,true);
		//$criteria->compare('fecdoc',$this->fecdoc,true);
		//$criteria->compare('tipologia',$this->tipologia,true);
		//$criteria->compare('moneda',$this->moneda,true);
		//$criteria->compare('usuario',$this->usuario,true);
		//$criteria->compare('coddocu',$this->coddocu,true);
		$criteria->compare('codtipofac',$this->codtipofac,true);
		$criteria->compare('codsociedad',$this->codsociedad,true);
		$criteria->compare('codgrupoventas',$this->codgrupoventas,true);
	//	$criteria->compare('codtipocotizacion',$this->codtipocotizacion,true);
		$criteria->compare('codcentro',$this->codcentro,true);
		//$criteria->compare('codobjeto',$this->codobjeto,true);
		$criteria->compare('fechapresentacion',$this->fechapresentacion,true);
		$criteria->compare('fechanominal',$this->fechanominal,true);
		//$criteria->compare('idguia',$this->idguia);
		//$criteria->compare('id',$this->id,true);
		$criteria->compare('codentro',$this->codentro,true);
		$criteria->compare('codigoalma',$this->codigoalma,true);
	$criteria->compare('numsolpe',$this->numsolpe,true);
		$criteria->compare('disp',$this->disp,true);
		$criteria->compare('descri',$this->descri,true);
		$criteria->compare('stock',$this->stock);
		//$criteria->compare('estadodetalle',$this->estadodetalle,true);
		//$criteria->compare('hidguia',$this->hidguia,true);
		$criteria->compare('codservicio',$this->codservicio,true);
		$criteria->compare('tipoimputacion',$this->tipoimputacion,true);
		if(isset($_SESSION['sesion_Maestrocompo'])) {
			$criteria->addInCondition('codart', $_SESSION['sesion_Maestrocompo'], 'OR');
		} ELSE {
			$criteria->compare('codart',$this->codart,true);
		}
		if(isset($_SESSION['sesion_Clipro'])) {
			$criteria->addInCondition('codpro', $_SESSION['sesion_Clipro'], 'OR');
		} ELSE {
			$criteria->compare('codpro',$this->codpro,true);
		}
		if((isset($this->fecdoc) && trim($this->fecdoc) != "") && (isset($this->fecdoc1) && trim($this->fecdoc1) != ""))  {
				$criteria->addBetweenCondition('fecdoc', ''.$this->fecdoc.'', ''.$this->fecdoc1.'');
		}
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pagesize'=>100),
		));

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwOcomprasimple the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function search_liberacion()
	{

		$criteria=new CDbCriteria;


		$criteria->addcondition("codestado in ('".ESTADO_CREADO."','".ESTADO_MODIFICADO."')");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pagesize'=>100),
		));

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function search_por_material($codigo)
	{

		$criteria=new CDbCriteria;


		$criteria->addcondition("codart=:vcodart");
		$criteria->params=array(":vcodart"=>$codigo);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pagesize'=>10),
		));

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}
