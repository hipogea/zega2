<?php

class Embarcaciones extends ModeloGeneral
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Embarcaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		 return '{{embarcaciones}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('codep', 'unique','message'=>'Este código ya está en uso','on'=>'insert,update,BATCH_INS'),
			array('nomep,codep,cbodega,matricula', 'required','on'=>'insert,update'),
                    array('nomep,codep', 'required','on'=>'BATCH_INS'),
			array('codep', 'match', 'pattern'=>'/[1-9]{1}[0-9]{2}/','message'=>'El codigo es inválido, comience con un dígito','on'=>'insert,update,BATCH_INS'),
			//array('codep', 'numerical', 'integerOnly'=>true),
			array('cbodega', 'numerical', 'integerOnly'=>true,'on'=>'insert,update,BATCH_INS'),
			array('codep', 'length', 'max'=>3,'on'=>'insert,update,BATCH_INS'),
			array('nomep', 'length', 'max'=>25,'on'=>'insert,update,BATCH_INS'),
			array('matricula', 'length', 'max'=>15,'on'=>'insert,update,BATCH_INS'),
			array('activa', 'length', 'max'=>1,'on'=>'insert,update,BATCH_INS'),
			array('codsap', 'length', 'max'=>5,'on'=>'insert,update,BATCH_INS'),
			//array('creadoel, modificadoel', 'length', 'max'=>20),
			//array('codcentro', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('codep, nomep, matricula, cbodega, activa, codsap', 'safe', 'on'=>'search,BATCH_INS'),
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
			'codep' => 'Codigo',
			'nomep' => 'Nombre',
			'matricula' => 'Matricula',
			'cbodega' => 'Capacidad',
			'activa' => 'Activa?',
			'codsap' => 'Codsap',
			'codcentro' => 'Codcentro',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('codep',$this->codep,true);
		$criteria->compare('nomep',$this->nomep,true);
		$criteria->compare('matricula',$this->matricula,true);
		$criteria->compare('cbodega',$this->cbodega);
		$criteria->compare('activa',$this->activa,true);
		$criteria->compare('codsap',$this->codsap,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}