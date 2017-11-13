<?php

/**
 * This is the model class for table "vw_parteeventos".
 *
 * The followings are the available columns in table 'vw_parteeventos':
 * @property string $fecha
 * @property string $codturno
 * @property integer $hidturno
 * @property string $horacierre
 * @property string $codproyecto
 * @property string $codocu
 * @property string $codestado
 * @property string $codigo
 * @property string $mes
 * @property integer $semana
 * @property integer $dia
 * @property integer $anno
 * @property string $numero
 * @property string $id
 * @property integer $hidparte
 * @property string $hidequipo
 * @property string $hp
 * @property string $hpp
 * @property string $hmi
 * @property string $hmf
 * @property string $hmt
 * @property string $tbd
 * @property string $hpi
 * @property string $hpf
 * @property string $hpt
 * @property string $hd
 * @property string $dispo
 * @property string $util
 * @property integer $iduser
 * @property integer $np
 * @property integer $ns
 * @property string $htt
 * @property integer $ntt
 * @property string $codtipo
 * @property string $textocorto
 * @property string $codcen
 * @property string $codigoaf
 * @property string $ap
 * @property string $nombres
 * @property string $nombreobjeto
 * @property string $destipo
 * @property string $descripcion
 * @property string $codresponsable
 * @property string $tipmanoobra
 * @property string $hinicio
 * @property string $hfinal
 * @property string $tiempopasado
 * @property integer $idevento
 */
class VwParteeventos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    
    public $fecha1;
	public function tableName()
	{
		return 'vw_parteeventos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha, codturno, hidturno, horacierre, codproyecto, hidparte, hidequipo, textocorto, codcen, destipo', 'required'),
			array('hidturno, semana, dia, anno, hidparte, iduser, np, ns, ntt, idevento', 'numerical', 'integerOnly'=>true),
			array('fecha, numero', 'length', 'max'=>10),
			array('codturno, codocu', 'length', 'max'=>3),
			array('horacierre', 'length', 'max'=>8),
			array('codproyecto', 'length', 'max'=>15),
			array('codestado, mes, codtipo', 'length', 'max'=>2),
			array('codigo, codigoaf', 'length', 'max'=>14),
			array('id, hidequipo', 'length', 'max'=>20),
			array('hp, hpp, tbd, hd, htt, codcen, codresponsable, tiempopasado', 'length', 'max'=>4),
			array('hmi, hmf, hmt, hpi, hpf, hpt, dispo, util', 'length', 'max'=>6),
			array('textocorto, nombreobjeto, destipo', 'length', 'max'=>40),
			array('ap, descripcion', 'length', 'max'=>30),
			array('nombres', 'length', 'max'=>25),
			array('tipmanoobra', 'length', 'max'=>1),
			array('hinicio, hfinal', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('fecha, descripcion,codturno, hidturno, horacierre, codproyecto, codocu, codestado, codigo, mes, semana, dia, anno, numero, id, hidparte, hidequipo, hp, hpp, hmi, hmf, hmt, tbd, hpi, hpf, hpt, hd, dispo, util, iduser, np, ns, htt, ntt, codtipo, textocorto, codcen, codigoaf, ap, nombres, nombreobjeto, destipo, descripcion, codresponsable, tipmanoobra, hinicio, hfinal, tiempopasado, idevento', 'safe', 'on'=>'search'),
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
			'fecha' => 'Fecha',
			'codturno' => 'Codturno',
			'hidturno' => 'Hidturno',
			'horacierre' => 'Horacierre',
			'codproyecto' => 'Codproyecto',
			'codocu' => 'Codocu',
			'codestado' => 'Codestado',
			'codigo' => 'Codigo',
			'mes' => 'Mes',
			'semana' => 'Semana',
			'dia' => 'Dia',
			'anno' => 'Anno',
			'numero' => 'Numero',
			'id' => 'ID',
			'hidparte' => 'Hidparte',
			'hidequipo' => 'Hidequipo',
			'hp' => 'Hp',
			'hpp' => 'Hpp',
			'hmi' => 'Hmi',
			'hmf' => 'Hmf',
			'hmt' => 'Hmt',
			'tbd' => 'Tbd',
			'hpi' => 'Hpi',
			'hpf' => 'Hpf',
			'hpt' => 'Hpt',
			'hd' => 'Hd',
			'dispo' => 'Dispo',
			'util' => 'Util',
			'iduser' => 'Iduser',
			'np' => 'nuemro de parasa por mano de obra interna',
			'ns' => 'numero de paradas por servicios',
			'htt' => 'horas de trabajo total ',
			'ntt' => 'Ntt',
			'codtipo' => 'Codtipo',
			'textocorto' => 'Textocorto',
			'codcen' => 'Codcen',
			'codigoaf' => 'Codigoaf',
			'ap' => 'Ap',
			'nombres' => 'Nombres',
			'nombreobjeto' => 'Nombreobjeto',
			'destipo' => 'Destipo',
			'descripcion' => 'Descripcion',
			'codresponsable' => 'Codresponsable',
			'tipmanoobra' => 'Tipmanoobra',
			'hinicio' => 'Hinicio',
			'hfinal' => 'Hfinal',
			'tiempopasado' => 'Tiempopasado',
			'idevento' => 'Idevento',
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
$criteria->compare('hidturno',$this->hidturno);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('dispo',$this->dispo,true);
		$criteria->compare('util',$this->util,true);
		$criteria->compare('descripcion',$this->descripcion);
		$criteria->compare('np',$this->np);
		$criteria->compare('ns',$this->ns);
		$criteria->compare('htt',$this->htt,true);
		$criteria->compare('ntt',$this->ntt);
		$criteria->compare('textocorto',$this->textocorto,true);
		$criteria->compare('codcen',$this->codcen,true);
		$criteria->compare('codtipo',$this->codtipo,true);
		$criteria->compare('ap',$this->ap,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('nombreobjeto',$this->nombreobjeto,true);

		if(isset($_SESSION['sesion_Trabajadores'])) {
			$criteria->addInCondition('codresponsable', $_SESSION['sesion_Trabajadores'], 'OR');
		} ELSE {
			$criteria->compare('codresponsable',$this->codresponsable,true);
		}
                if(isset($_SESSION['sesion_Ot'])) {
			$criteria->addInCondition('codproyecto', $_SESSION['sesion_Ot'], 'AND');
		} ELSE {
			$criteria->compare('codproyecto',$this->codproyecto,true);
		}
                if(isset($_SESSION['sesion_Inventario'])) {
			$criteria->addInCondition('codigoaf', $_SESSION['sesion_Inventario'], 'AND');
		} ELSE {
			$criteria->compare('codigoaf',$this->codigoaf,true);
		}
                
                
                
		if((isset($this->fecha) && trim($this->fecha) != "") && (isset($this->fecha1) && trim($this->fecha1) != ""))  {
				$criteria->addBetweenCondition('fecha', ''.$this->fecha.'', ''.$this->fecha1.'');
		}
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwParteeventos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
