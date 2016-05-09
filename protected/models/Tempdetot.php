<?php

/**
 * This is the model class for table "{{tempdetot}}".
 *
 * The followings are the available columns in table '{{tempdetot}}':
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
 * @property string $codestado
 * @property string $codmaster
 * @property integer $idinventario
 * @property integer $iduser
 * @property integer $idusertemp
 * @property string $idtemp
 * @property integer $idstatus
 */
class Tempdetot extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tempdetot}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, hidorden, item, textoactividad, codresponsable, fechainic, fechafinprog, fechacre, flaginterno, codocu, codestado, codmaster, idinventario, iduser, idusertemp, idstatus', 'required'),
			array('idinventario, iduser, idusertemp, idstatus', 'numerical', 'integerOnly'=>true),
			array('id, hidorden', 'length', 'max'=>20),
			array('item, codocu', 'length', 'max'=>3),
			array('textoactividad', 'length', 'max'=>40),
			array('codresponsable', 'length', 'max'=>8),
			array('flaginterno', 'length', 'max'=>1),
			array('codestado', 'length', 'max'=>2),
			array('codmaster', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidorden, item, textoactividad, codresponsable, fechainic, fechafinprog, fechacre, flaginterno, codocu, codestado, codmaster, idinventario, iduser, idusertemp, idtemp, idstatus', 'safe', 'on'=>'search'),
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
			'hidorden' => 'Hidorden',
			'item' => 'Item',
			'textoactividad' => 'Textoactividad',
			'codresponsable' => 'Codresponsable',
			'fechainic' => 'Fechainic',
			'fechafinprog' => 'Fechafinprog',
			'fechacre' => 'Fechacre',
			'flaginterno' => 'Flaginterno',
			'codocu' => 'Codocu',
			'codestado' => 'Codestado',
			'codmaster' => 'Codmaster',
			'idinventario' => 'Idinventario',
			'iduser' => 'Iduser',
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
		$criteria->compare('hidorden',$this->hidorden,true);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('textoactividad',$this->textoactividad,true);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('fechainic',$this->fechainic,true);
		$criteria->compare('fechafinprog',$this->fechafinprog,true);
		$criteria->compare('fechacre',$this->fechacre,true);
		$criteria->compare('flaginterno',$this->flaginterno,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('codmaster',$this->codmaster,true);
		$criteria->compare('idinventario',$this->idinventario);
		$criteria->compare('iduser',$this->iduser);
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
	 * @return Tempdetot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
