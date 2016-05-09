<?php

class VwEntregas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_entregas';
	}
public $fechacont1;
	public $fechaoc1;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('montomovido, codmoneda, tipologia, iduser, item, descri, rucpro, codpro', 'required'),
			array('iduser', 'numerical', 'integerOnly'=>true),
			array('montomovido, preciounit, cant', 'numerical'),
			array('numvale', 'length', 'max'=>12),
			array('codmoneda, alemi, aldes, coddoc, um, codocuref, item', 'length', 'max'=>3),
			array('cestadovale, codmov, codestado', 'length', 'max'=>2),
			array('idvale, idref, id, hidvale, desum', 'length', 'max'=>20),
			array('codart, numcot', 'length', 'max'=>10),
			array('fecha, fechadoc', 'length', 'max'=>19),
			array('comentario, descri', 'length', 'max'=>40),
			array('numdocref', 'length', 'max'=>15),
			array('codcentro', 'length', 'max'=>4),
			array('tipologia', 'length', 'max'=>1),
			array('despro', 'length', 'max'=>100),
			array('rucpro', 'length', 'max'=>11),
			array('codpro', 'length', 'max'=>6),
			array('fechacont, fechacre, textolargo,idguia, fechavale', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('numvale,idguia, montomovido,despro,codmoneda, cestadovale, fechacont,fechacont1, fechaoc, fechaoc1, fechacre, idvale, textolargo, fechavale, codart, codmov, preciounit, cant, idref, alemi, aldes, fecha, coddoc, um, comentario, codocuref, numdocref, codcentro, id, codestado, tipologia, fechadoc, hidvale, desum, iduser, numcot, item, descri, despro, rucpro, codpro', 'safe', 'on'=>'search_servicios'),
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
			'numvale' => 'N Doc',
			'montomovido' => 'Monto',
			'codmoneda' => 'Mon',
			'cestadovale' => 'Cestadovale',
			'fechacont' => 'F Cont',
			'fechacre' => 'Fechacre',
			'idvale' => 'Idvale',
			'textolargo' => 'Texto',
			'fechavale' => 'F Doc',
			'codart' => 'Cod',
			'codmov' => 'mov',
			'preciounit' => 'P unit',
			'cant' => 'Cant',
			'idref' => 'Idref',
			'alemi' => 'Alemi',
			'aldes' => 'Aldes',
			'fecha' => 'Fecha',
			'coddoc' => 'Coddoc',
			'um' => 'Um',
			'comentario' => 'Comentario',
			'codocuref' => 'Codocuref',
			'numdocref' => 'Numdocref',
			'codcentro' => 'Codcentro',
			'id' => 'ID',
			'codestado' => 'Codestado',
			'tipologia' => 'Tipologia',
			'fechadoc' => 'Fechadoc',
			'hidvale' => 'Hidvale',
			'desum' => 'Desum',
			'iduser' => 'Iduser',
			'numcot' => 'O.c.',
			'item' => 'Item',
			'descri' => 'Descri',
			'despro' => 'Proveedor',
			'rucpro' => 'RUC',
			'codpro' => 'Codpro',
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
	public function search_servicios()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('numvale',$this->numvale,true);
		$criteria->compare('montomovido',$this->montomovido);
		$criteria->compare('codmoneda',$this->codmoneda,true);
		$criteria->compare('cestadovale',$this->cestadovale,true);
		//$criteria->compare('fechacont',$this->fechacont,true);
		$criteria->compare('fechacre',$this->fechacre,true);
		$criteria->compare('idvale',$this->idvale,true);
		$criteria->compare('textolargo',$this->textolargo,true);
		$criteria->compare('fechavale',$this->fechavale,true);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('codmov',$this->codmov,true);
		$criteria->compare('preciounit',$this->preciounit);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('idref',$this->idref,true);
		$criteria->compare('alemi',$this->alemi,true);
		$criteria->compare('aldes',$this->aldes,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('coddoc',$this->coddoc,true);
		$criteria->compare('um',$this->um,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('codocuref',$this->codocuref,true);
		$criteria->compare('numdocref',$this->numdocref,true);
		$criteria->compare('codcentro',$this->codcentro,true);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('codestado',$this->codestado,true);
		///$criteria->compare('tipologia',$this->tipologia,true);
		//$criteria->compare('fechadoc',$this->fechadoc,true);
		$criteria->compare('hidvale',$this->hidvale,true);
		$criteria->compare('desum',$this->desum,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('numcot',$this->numcot,true);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('descri',$this->descri,true);
		$criteria->compare('despro',$this->despro,true);
		$criteria->compare('rucpro',$this->rucpro,true);
		$criteria->compare('codpro',$this->codpro,true);
		$criteria->addCondition("tipologia='W'");//COMPRA DE SERVICIOS
		$criteria->addBetweenCondition('fechacont', ''.$this->fechacont.'', ''.$this->fechacont1.'');
		$criteria->addBetweenCondition('fechaoc', ''.$this->fechaoc.'', ''.$this->fechaoc1.'');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search_materiales()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('numvale',$this->numvale,true);
		$criteria->compare('montomovido',$this->montomovido);
		$criteria->compare('codmoneda',$this->codmoneda,true);
		$criteria->compare('cestadovale',$this->cestadovale,true);
		$criteria->compare('fechacont',$this->fechacont,true);
		$criteria->compare('fechacre',$this->fechacre,true);
		$criteria->compare('idvale',$this->idvale,true);
		$criteria->compare('textolargo',$this->textolargo,true);
		$criteria->compare('fechavale',$this->fechavale,true);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('codmov',$this->codmov,true);
		$criteria->compare('preciounit',$this->preciounit);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('idref',$this->idref,true);
		$criteria->compare('alemi',$this->alemi,true);
		$criteria->compare('aldes',$this->aldes,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('coddoc',$this->coddoc,true);
		$criteria->compare('um',$this->um,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('codocuref',$this->codocuref,true);
		$criteria->compare('numdocref',$this->numdocref,true);
		$criteria->compare('codcentro',$this->codcentro,true);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('codestado',$this->codestado,true);
		///$criteria->compare('tipologia',$this->tipologia,true);
		$criteria->compare('fechadoc',$this->fechadoc,true);
		$criteria->compare('hidvale',$this->hidvale,true);
		$criteria->compare('desum',$this->desum,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('numcot',$this->numcot,true);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('descri',$this->descri,true);
		$criteria->compare('despro',$this->despro,true);
		$criteria->compare('rucpro',$this->rucpro,true);
		$criteria->compare('codpro',$this->codpro,true);
		$criteria->addCondition("tipologia<>'W'");//COMPRA DE SERVICIOS

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwEntregas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
