<?php

class Tenencias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tenencias}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('codte,codcen', 'required','message'=>'Este dato es obligatorio'),
			array('codte, codcen', 'length', 'max'=>4),
                    array('codte, codcen', 'length', 'max'=>4),
                      array('codte', 'match', 'pattern'=>'/[1-9]{1}[0-9]{1}/','message'=>'El codigo  no es el correcto, deben ser 2 digitos y el primero no puede ser cero','on'=>'insert'),			
			 
			array('deste', 'length', 'max'=>35),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codte, deste, codcen', 'safe', 'on'=>'search'),
                    array('codte, deste,codocu, codcen', 'safe', 'on'=>'insert,update'),
		);
	}

          public function behaviors()
	{
		return array(
			// Classname => path to Class
			'ActiveRecordLogableBehavior'=>
				'application.behaviors.ActiveRecordLogableBehavior',
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
			'centros' => array(self::BELONGS_TO, 'Centros', 'codcen'),
			'tenenciasproc' => array(self::HAS_MANY, 'Tenenciasproc', 'codte'),
			'tenenciastraba' => array(self::HAS_MANY, 'Tenenciastraba', 'codte'),
                        'tenenciaprocauto' => array(self::HAS_MANY, 'Tenenciasproc','codte','condition'=>" automatico='1'  "),
                       
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codte' => 'Codte',
			'deste' => 'Descripcion',
			'codcen' => 'Centro',
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

		$criteria->compare('codte',$this->codte,true);
		$criteria->compare('deste',$this->deste,true);
		$criteria->compare('codcen',$this->codcen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tenencias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
       
	
	
	
}
