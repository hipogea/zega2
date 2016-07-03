<?php

/**
 * This is the model class for table "{{tempdesolpe}}".
 *
 * The followings are the available columns in table '{{tempdesolpe}}':
 * @property string $id
 * @property string $numero
 * @property string $tipimputacion
 * @property string $centro
 * @property string $codal
 * @property string $codart
 * @property string $txtmaterial
 * @property string $grupocompras
 * @property string $usuario
 * @property string $textodetalle
 * @property string $fechacrea
 * @property string $fechaent
 * @property string $fechalib
 * @property string $imputacion
 * @property string $hidsolpe
 * @property string $codocu
 * @property string $tipsolpe
 * @property string $est
 * @property double $cant
 * @property string $item
 * @property double $cantaten
 * @property integer $posicion
 * @property string $estadolib
 * @property string $solicitanet
 * @property string $um
 * @property string $firme
 * @property string $idreserva
 * @property double $punitplan
 * @property double $punitreal
 * @property string $codservicio
 * @property integer $iduser
 * @property string $hidot
 * @property string $hcodoc
 * @property integer $idusertemp
 * @property string $idtemp
 * @property integer $idstatus
 *
 * The followings are the available model relations:
 * @property Solpe $hidsolpe0
 * @property Maestrocomponentes $codart0
 * @property Ums $um0
 * @property Estado $codocu0
 * @property Estado $est0
 */
class Tempdesolpe extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tempdesolpe}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//
			array('centro, codal, codart, txtmaterial,hidlabor', 'required','on'=>'buffer'),
			array('codart', 'checkvalores'),
			array('codal', 'checkal'),
			array('posicion, iduser, idusertemp, idstatus', 'numerical', 'integerOnly'=>true),
			array('cant, cantaten, punitplan, punitreal', 'numerical'),
			array('id, hidsolpe, idreserva, hidot, idtemp', 'length', 'max'=>20),
			array('numero', 'length', 'max'=>10),
			array('tipimputacion, tipsolpe, estadolib, firme', 'length', 'max'=>1),
			array('centro, grupocompras', 'length', 'max'=>4),
			array('codal, codocu, item, um, hcodoc', 'length', 'max'=>3),
			array('codart, imputacion', 'length', 'max'=>12),
			array('txtmaterial', 'length', 'max'=>40),
			array('usuario', 'length', 'max'=>35),
			array('est', 'length', 'max'=>2),
			array('solicitanet', 'length', 'max'=>25),
			array('codservicio', 'length', 'max'=>8),
			array('textodetalle, fechacrea, fechaent, fechalib', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, numero, tipimputacion, centro, codal, codart, txtmaterial, grupocompras, usuario, textodetalle, fechacrea, fechaent, fechalib, imputacion, hidsolpe, codocu, tipsolpe, est, cant, item, cantaten, posicion, estadolib, solicitanet, um, firme, idreserva, punitplan, punitreal, codservicio, iduser, hidot, hcodoc, idusertemp, idtemp, idstatus', 'safe', 'on'=>'search'),
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
			'solpe' => array(self::BELONGS_TO, 'Solpe', 'hidsolpe'),
			'maestro' => array(self::BELONGS_TO, 'Maestrocompo', 'codart'),
			'um' => array(self::BELONGS_TO, 'Ums', 'um'),
			'estado'=>array(self::BELONGS_TO,'Estado',array('est'=>'codestado','codocu'=>'codocu')),
			'almac' => array(self::BELONGS_TO, 'Almacenes', 'codal'),


		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'numero' => 'Numero',
			'tipimputacion' => 'Tipimputacion',
			'centro' => 'Centro',
			'codal' => 'Codal',
			'codart' => 'Codart',
			'txtmaterial' => 'Txtmaterial',
			'grupocompras' => 'Grupocompras',
			'usuario' => 'Usuario',
			'textodetalle' => 'Textodetalle',
			'fechacrea' => 'Fechacrea',
			'fechaent' => 'Fechaent',
			'fechalib' => 'Fechalib',
			'imputacion' => 'Imputacion',
			'hidsolpe' => 'Hidsolpe',
			'codocu' => 'Codocu',
			'tipsolpe' => 'Tipsolpe',
			'est' => 'Est',
			'cant' => 'Cant',
			'item' => 'Item',
			'cantaten' => 'Cantaten',
			'posicion' => 'Posicion',
			'estadolib' => 'Estadolib',
			'solicitanet' => 'Solicitanet',
			'um' => 'Um',
			'firme' => 'Firme',
			'idreserva' => 'Idreserva',
			'punitplan' => 'Punitplan',
			'punitreal' => 'Punitreal',
			'codservicio' => 'Codservicio',
			'iduser' => 'Iduser',
			'hidot' => 'Hidot',
			'hcodoc' => 'Hcodoc',
			'idusertemp' => 'Idusertemp',
			'idtemp' => 'Idtemp',
			'idstatus' => 'Idstatus',
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
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('tipimputacion',$this->tipimputacion,true);
		$criteria->compare('centro',$this->centro,true);
		$criteria->compare('codal',$this->codal,true);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('txtmaterial',$this->txtmaterial,true);
		$criteria->compare('grupocompras',$this->grupocompras,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('textodetalle',$this->textodetalle,true);
		$criteria->compare('fechacrea',$this->fechacrea,true);
		$criteria->compare('fechaent',$this->fechaent,true);
		$criteria->compare('fechalib',$this->fechalib,true);
		$criteria->compare('imputacion',$this->imputacion,true);
		$criteria->compare('hidsolpe',$this->hidsolpe,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('tipsolpe',$this->tipsolpe,true);
		$criteria->compare('est',$this->est,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('cantaten',$this->cantaten);
		$criteria->compare('posicion',$this->posicion);
		$criteria->compare('estadolib',$this->estadolib,true);
		$criteria->compare('solicitanet',$this->solicitanet,true);
		$criteria->compare('um',$this->um,true);
		$criteria->compare('firme',$this->firme,true);
		$criteria->compare('idreserva',$this->idreserva,true);
		$criteria->compare('punitplan',$this->punitplan);
		$criteria->compare('punitreal',$this->punitreal);
		$criteria->compare('codservicio',$this->codservicio,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('hidot',$this->hidot,true);
		$criteria->compare('hcodoc',$this->hcodoc,true);
		$criteria->compare('idusertemp',$this->idusertemp);
		$criteria->compare('idtemp',$this->idtemp,true);
		$criteria->compare('idstatus',$this->idstatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tempdesolpe the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function search_por_ot($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;


		$criteria->addCondition("hidot=".$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function checkvalores($attribute,$params) {
		$codigoserv=yii::app()->settings->get('materiales','materiales_codigoservicio');
		$modelomaterial=Maestrocompo::model()->find("codigo=:codigox",array(":codigox"=>TRIM($this->codart)));

		/*******************************************
		+		Debe de exigir el tipo de solpe
		+		la combinacion de valores del tipo de solpe-material
		 ***********************************************/
		if ($this->tipsolpe=='M')		{
			if ($this->codart==$codigoserv)
				$this->adderror('codart','Este es un servicio, usted esta solicitando un material' );


			if (is_null($modelomaterial)) {
				$this->adderror('codart','Este material no existe ...' );
			} else {

				if($this->desolpe_alinventario===null)
					$this->adderror('codart','Este material tiene que ser ampliado al centro '.$this->centro.' y almacen '.$this->codal.' ' );
			}

		}	else { //Si es un servicio
			if (is_null($modelomaterial)) {
				if (!empty($this->codart)) {
					$this->adderror('codart','Este material no existe ->' );
				}else {
					// $this->adderror('codart','Este material no existe' );
					$this->codart=$codigoserv;
				}

			}else {
				if (TRIM($this->codart) <> $codigoserv )
					$this->adderror('tipsolpe','Este es un servicio, usted esta solicitando un material' );


			}

		}

	}

	public function checkal($attribute,$params) {
		if($this->almac->codcen <> $this->centro)
			$this->adderror('codal','No se permite un almacen que no este en el centro' );
		//SI ES UN SERVICIO Y LA SOLPE NO ES COMPRA
		if ($this->solpe->escompra!='1' and $this->tipsolpe=='S')
			$this->adderror('tipsolpe','La solicitud debe de tener activado el flag de compras' );




	}
}
