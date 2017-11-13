<?php

/**
 * This is the model class for table "t_moneda".
 *
 * The followings are the available columns in table 't_moneda':
 * @property string $codmoneda
 * @property string $simbolo
 * @property string $desmon
 * @property string $creadopor
 * @property string $creadoel
 * @property string $modificadopor
 * @property string $modificadoel
 *
 * The followings are the available model relations:
 * @property Factu[] $factus
 * @property Coti[] $cotis
 */
class TMoneda extends ModeloGeneral
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TMoneda the static model class
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
                return '{{monedas}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codmoneda', 'required'),
			array('codmoneda, simbolo', 'length', 'max'=>3),
			//array('desmon', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
                    array('habilitado', 'safe', 'on'=>'insert,update'),
		
			array('codmoneda, simbolo, desmon, modificadopor, modificadoel', 'safe', 'on'=>'search'),
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
			'factus' => array(self::HAS_MANY, 'Factu', 'moneda'),
			'cotis' => array(self::HAS_MANY, 'Coti', 'moneda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codmoneda' => 'Codmoneda',
			'simbolo' => 'Simbolo',
			'desmon' => 'Desmon',
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

		$criteria->compare('codmoneda',$this->codmoneda,true);
		$criteria->compare('simbolo',$this->simbolo,true);
		$criteria->compare('desmon',$this->desmon,true);





		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
      public STATIC function findByCodMon($cod){
          //VAR_DUMP($cod);die();
         return self::model()->findByPk($cod);
      
            
         
      }
    public function beforesave() {
        if($this->cambiocampo("habilitado") and $this->habilitado=='1')
        yii::app()->tipocambio->agregarmoneda($this->codmoneda,$seguir=false);
        return parent::beforeSave();
    }    
}