<?php

/**
 * This is the model class for table "{{comprobantes}}".
 *
 * The followings are the available columns in table '{{comprobantes}}':
 * @property string $id
 * @property string $femision
 * @property string $fvencimiento
 * @property string $tipo
 * @property string $serie
 * @property string $numero
 * @property string $tipodocid
 * @property string $numdocid
 * @property string $razon
 * @property double $monto
 * @property string $codmon
 * @property string $flag
 * @property integer $iduser
 * @property string $esservicio
 * @property string $internacional
 */
class Comprobantes extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{comprobantes}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
array('femision,tipo,socio, serie, numero, tipodocid, numdocid, razon, monto, codmon, '
                            . ' esservicio', 'required'),
			array('iduser', 'numerical', 'integerOnly'=>true),
			array('monto', 'numerical'),
                    array('socio','safe'),
			array('femision, fvencimiento', 'length', 'max'=>10),
			array('tipo, tipodocid, codmon', 'length', 'max'=>3),
			array('serie, numero', 'length', 'max'=>20),
			array('numdocid', 'length', 'max'=>15),
			array('razon', 'length', 'max'=>100),
			array('flag, esservicio, internacional', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, femision, fvencimiento, tipo, serie, numero, tipodocid, numdocid, razon, monto, codmon, flag, iduser, esservicio, internacional', 'safe', 'on'=>'search'),
		);
	}

        
        public function init(){
            $this->camposfechas=array('femision','fvencimiento');
            return parent::init();
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
			'femision' => 'Femision',
			'fvencimiento' => 'Fvencimiento',
			'tipo' => 'Tipo',
			'serie' => 'Serie',
			'numero' => 'Numero',
			'tipodocid' => 'Tipodocid',
			'numdocid' => 'Numdocid',
			'razon' => 'Razon',
			'monto' => 'Monto',
			'codmon' => 'Codmon',
			'flag' => 'Flag',
			'iduser' => 'Iduser',
			'esservicio' => 'Esservicio',
			'internacional' => 'Internacional',
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
		$criteria->compare('femision',$this->femision,true);
		$criteria->compare('fvencimiento',$this->fvencimiento,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('tipodocid',$this->tipodocid,true);
		$criteria->compare('numdocid',$this->numdocid,true);
		$criteria->compare('razon',$this->razon,true);
		$criteria->compare('monto',$this->monto);
		$criteria->compare('codmon',$this->codmon,true);
		$criteria->compare('flag',$this->flag,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('esservicio',$this->esservicio,true);
		$criteria->compare('internacional',$this->internacional,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comprobantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave() {
            $this->flag='C';
            return parent::beforeSave();
        }
}
