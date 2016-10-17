<?php

/**
 * This is the model class for table "{{solcot}}".
 *
 * The followings are the available columns in table '{{solcot}}':
 * @property string $codpro
 * @property integer $idcontacto
 * @property string $numero
 * @property string $fecha
 * @property integer $vigencia
 * @property string $codmon
 * @property string $codocu
 * @property string $codestado
 * @property integer $iduser
 * @property integer $descripcion
 * @property string $indicaciones
 * @property integer $id
 *
 * The followings are the available model relations:
 * @property Contactos $idcontacto0
 * @property Clipro $codpro0
 */
class Solcot extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{solcot}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codpro, idcontacto,  fecha, vigencia, codmon, descripcion', 'required'),
			array('codpro','exist','allowEmpty' => false, 'attributeName' => 'codpro', 'className' => 'Clipro','message'=>'Esta empresa no existe'),

			array('idcontacto, vigencia, iduser', 'numerical', 'integerOnly'=>true),
			array('idcontacto','chkcontacto'),
			array('codpro', 'length', 'max'=>8),
			array('numero', 'length', 'max'=>15),
			array('codmon, codocu', 'length', 'max'=>3),
			array('codestado', 'length', 'max'=>2),
			array('descripcion,codestado,mail', 'safe'),
			array('codestado', 'safe','on'=>'cambiaestado'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codpro, idcontacto, numero, fecha, vigencia, codmon, codocu, codestado, iduser, descripcion, indicaciones, id', 'safe', 'on'=>'search'),
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
			'contacto' => array(self::BELONGS_TO, 'Contactos', 'idcontacto'),
			'clipro' => array(self::BELONGS_TO, 'Clipro', 'codpro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codpro' => 'Codpro',
			'idcontacto' => 'Idcontacto',
			'numero' => 'Numero',
			'fecha' => 'Fecha',
			'vigencia' => 'Vigencia',
			'codmon' => 'Codmon',
			'codocu' => 'Codocu',
			'codestado' => 'Codestado',
			'iduser' => 'Iduser',
			'descripcion' => 'Descripcion',
			'indicaciones' => 'Indicaciones',
			'id' => 'ID',
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

		$criteria->compare('codpro',$this->codpro,true);
		$criteria->compare('idcontacto',$this->idcontacto);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('vigencia',$this->vigencia);
		$criteria->compare('codmon',$this->codmon,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('descripcion',$this->descripcion);
		$criteria->compare('indicaciones',$this->indicaciones,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Solcot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function chkcontacto($attribute,$params) {
		$matriz= Contactos::model()->findAll("id=:idx and c_hcod=:vcdf",array(":vcdf"=>$this->codpro,":idx"=>$this->idcontacto));
		if (count($matriz)==0)
		{
			// if(!$this->codpro==$fila->c_hcod)
			$this->adderror('idcontacto','Este contacto no pertenece a la empresa '.$this->codpro.' o no existe ');

		}

	}

	public function beforeSave() {
		if ($this->isNewRecord) {

			$this->iduser=yii::app()->user->id;
			$this->codocu='421';
			$this->codestado=ESTADO_CREADO;
			//$this->fecdoc=date("Y-m-d");	}
			$this->numero=$this->correlativo('numero');

		}

		return parent::beforeSave();
				}



}