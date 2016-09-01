<?php

/**
 * This is the model class for table "{{detot}}".
 *
 * The followings are the available columns in table '{{detot}}':
 * @property string $id
 * @property string $hidorden
 * @property string $item
 * @property string $textoactividad
 * @property string $codresponsable
 * @property string $fechainic
 * @property string $fechafinprog
 * @property string $fechacre
 * @property string $flaginterno
 * @property string $codocu
 * @property string $tipo
 * @property string $codestado
 * @property string $codmaster
 * @property integer $idinventario
 * @property integer $iduser
 * @property integer $idusertemp
 * @property string $idtemp
 * @property integer $idstatus
 * @property string $txt
 *
 * The followings are the available model relations:
 * @property Ot $hidorden0
 * @property Trabajadores $codresponsable0
 */
class Detot extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{detot}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('id, hidorden, item, textoactividad, codresponsable, fechainic, fechafinprog, fechacre, flaginterno, codocu, tipo, codestado, codmaster, idinventario, iduser, idusertemp, idstatus, txt', 'required'),
			array('idinventario, iduser, idaux,idusertemp, idstatus', 'numerical', 'integerOnly'=>true),
			array('codocu,codestado,nhoras,idaux,nhombres,codmon,monto,tipo,txt,cc,codmaster,codgrupoplan', 'safe'),
			array('id, hidorden', 'length', 'max'=>20),
			array('item, codocu, codestado', 'length', 'max'=>3),
			array('textoactividad', 'length', 'max'=>40),
			array('codresponsable', 'length', 'max'=>8),
			array('flaginterno, tipo', 'length', 'max'=>1),
			array('codmaster', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidorden, item, textoactividad, codresponsable, fechainic, fechafinprog, fechacre, flaginterno, codocu, tipo, codestado, codmaster, idinventario, iduser, idusertemp, idtemp, idstatus, txt', 'safe', 'on'=>'search'),
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
			'ceco'=> array(self::BELONGS_TO, 'Cc', 'cc'),
			'ot' => array(self::BELONGS_TO, 'Ot', 'hidorden'),
			'trabajadores' => array(self::BELONGS_TO, 'Trabajadores', 'codresponsable'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidorden' => 'Hidorden',
			'item' => 'Item',
			'textoactividad' => 'Textoactividad',
			'codresponsable' => 'Codresponsable',
			'fechainic' => 'Fechainic',
			'fechafinprog' => 'Fechafinprog',
			'fechacre' => 'Fechacre',
			'flaginterno' => 'Flaginterno',
			'codocu' => 'Codocu',
			'tipo' => 'Tipo',
			'codestado' => 'Codestado',
			'codmaster' => 'Codmaster',
			'idinventario' => 'Idinventario',
			'iduser' => 'Iduser',
			'idusertemp' => 'Idusertemp',
			'idtemp' => 'Idtemp',
			'idstatus' => 'Idstatus',
			'txt' => 'Txt',
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
		$criteria->compare('hidorden',$this->hidorden,true);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('textoactividad',$this->textoactividad,true);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('fechainic',$this->fechainic,true);
		$criteria->compare('fechafinprog',$this->fechafinprog,true);
		$criteria->compare('fechacre',$this->fechacre,true);
		$criteria->compare('flaginterno',$this->flaginterno,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('codmaster',$this->codmaster,true);
		$criteria->compare('idinventario',$this->idinventario);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('idusertemp',$this->idusertemp);
		$criteria->compare('idtemp',$this->idtemp,true);
		$criteria->compare('idstatus',$this->idstatus);
		$criteria->compare('txt',$this->txt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function afterSave(){
		Tempdesolpe::model()->updateAll(array("hidlabor"=>$this->id),"hidlabor=:viden",array(":viden"=>$this->idtemp));
		return parent::afterSave();
    }


}
