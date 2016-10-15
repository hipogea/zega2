<?php


class Tabular extends CActiveRecord
{
	public $nombreclase;
   public $valor1;
    public $valor2;
     public $valor3;
      public $valor4;
      public $valor5;
       public $valor6;
        public $valor7;
    public $valor8;
     public $valor9;
      public $valor10;
      public $valor11;
       public $valor12;
       public $valor13;
    public $valor14;
     public $valor15;
      public $valor16;
      public $valor17;
       public $valor18;
      public $valor19;
     public $valor20;
      public $valor21;
      public $valor22;
       public $valor23;
       public $valor24;
    public $valor25;
     public $valor26;
      public $valor27;
      public $valor28;
       public $valor29;
        public $valor30;
     
   
    
    
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tabular';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    
                        array('valor1,valor2,valor3,valor4,valor5,valor6,valor7,valor8,valor9,valor10,valor11,valor12,valor13,valor14,valor1,valor16,valor17,valor18,valor19,valor20,valor21,valor22,valor23,valor24,valor25,valor26,valor27,valor28,valor29,valor30'=>'numerical'),
                        array('nombreclase,valor1,valor2,valor3,valor4,valor5,valor6,valor7,valor8,valor9,valor10,valor11,valor12,valor13,valor14,valor1,valor16,valor17,valor18,valor19,valor20,valor21,valor22,valor23,valor24,valor25,valor26,valor27,valor28,valor29,valor30','safe','on'=>'insert'),
                    
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
			'nombre' => 'Nombre',
			'marca' => 'Marca',
			'prop1' => 'Prop1',
			'comaterial' => 'Comaterial',
			'creadopor' => 'Creadopor',
			'creadoel' => 'Creadoel',
			'modificadopor' => 'Modificadopor',
			'modificadoel' => 'Modificadoel',
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

		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('marca',$this->marca,true);
		$criteria->compare('prop1',$this->prop1,true);
		$criteria->compare('comaterial',$this->comaterial,true);





		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	 /** Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	
	
	
	
	
	
	
}
