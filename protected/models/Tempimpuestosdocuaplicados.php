<?php

/**
 * This is the model class for table "{{tempimpuestosdocuaplicados}}".
 *
 * The followings are the available columns in table '{{tempimpuestosdocuaplicados}}':
 * @property string $idtemp
 * @property string $codocu
 * @property integer $column_3
 * @property string $iddocu
 * @property string $codimpuesto
 * @property string $valorimpuesto
 * @property integer $idusertemp
 * @property integer $idstatus
 */
class Tempimpuestosdocuaplicados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tempimpuestosdocuaplicados}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('codocu, column_3, iddocu, codimpuesto, valorimpuesto, idusertemp', 'required'),
			array('idusertemp, idstatus', 'numerical', 'integerOnly'=>true),
			array('codocu, codimpuesto', 'length', 'max'=>3),
			array('iddocu', 'length', 'max'=>20),
			array('valorimpuesto', 'length', 'max'=>5),
			array('idstatus', 'safe', 'on'=>'borra'),
			array('idstatus,id,idusertemp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
                    array('idtemp,codocu,iddocu,codimpuesto,valorimpuesto,idusertemp,idstatus', 'safe', 'on'=>'buffer'),
			array('idtemp,codocu, iddocu,codimpuesto,valorimpuesto,idusertemp,idstatus', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'documento' => array(self::BELONGS_TO, 'Documentos', array('codocu'=>'coddocu') ),
			'impuesto' => array(self::BELONGS_TO, 'Impuestos', array('codimpuesto'=>'codimpuesto') ),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtemp' => 'Idtemp',
			'codocu' => 'Codocu',
			'column_3' => 'Column 3',
			'iddocu' => 'Iddocu',
			'codimpuesto' => 'Codimpuesto',
			'valorimpuesto' => 'Valorimpuesto',
			'idusertemp' => 'Idusertemp',
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

		$criteria->compare('idtemp',$this->idtemp,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('column_3',$this->column_3);
		$criteria->compare('iddocu',$this->iddocu,true);
		$criteria->compare('codimpuesto',$this->codimpuesto,true);
		$criteria->compare('valorimpuesto',$this->valorimpuesto,true);
		$criteria->compare('idusertemp',$this->idusertemp);
		$criteria->compare('idstatus',$this->idstatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search_por_id($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
		$criteria->compare('iddocu',$this->iddocu,true);
		$criteria->compare('codocu',$this->codocu);
		$criteria->compare('codimpuesto',$this->codimpuesto,true);
		$criteria->addcondition("iddocu=".(int)$id);
		$criteria->addcondition("idstatus >=0");
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tempimpuestosdocuaplicados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
