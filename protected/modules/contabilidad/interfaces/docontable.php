<?php

/**
 * This is the model class for table "{{cuentas}}".
 *
 * The followings are the available columns in table '{{cuentas}}':
 * @property string $codcuenta
 * @property string $descuenta
 * @property string $clase
 * @property string $contrapartida
 * @property string $grupo
 * @property string $codigo
 * @property string $n2
 * @property string $n3
 * @property string $registro
 */
class Cuentas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    
    public $descriclase;
	public function tableName()
	{
		 return '{{cuentas}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codcuenta, descuenta, clase, contrapartida, grupo, codigo, n2, n3, registro', 'required'),
			array('codcuenta, contrapartida', 'length', 'max'=>18),
			array('descuenta', 'length', 'max'=>35),
			array('clase', 'length', 'max'=>2),
			array('grupo, registro', 'length', 'max'=>1),
			array('codigo', 'length', 'max'=>10),
			array('n2, n3', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codcuenta, elemento,descuenta, clase, contrapartida, grupo, codigo, n2, n3, registro', 'safe', 'on'=>'search'),
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
			'codcuenta' => 'Codcuenta',
			'descuenta' => 'Descuenta',
			'clase' => 'Clase',
			'contrapartida' => 'ContraP',
			'grupo' => 'Grupo',
			'codigo' => 'Codigo',
			'n2' => 'N2',
			'n3' => 'N3',
			'registro' => 'Registro',
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

		$criteria->compare('codcuenta',$this->codcuenta,true);
		$criteria->compare('descuenta',$this->descuenta,true);
		$criteria->compare('clase',$this->clase,true);
		$criteria->compare('contrapartida',$this->contrapartida,true);
		$criteria->compare('grupo',$this->grupo,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('n2',$this->n2,true);
		$criteria->compare('n3',$this->n3,true);
                $criteria->compare('elemento',$this->elemento,true);
		$criteria->compare('registro',$this->registro,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                    'pagination'=>array('pageSize'=>50),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cuentas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        ///devuelve el array de las clases
        public static function clases()
	{
		//return yii::app()->db->createCommand(" SELECT DISTINCT clase, desclase from {{cuentas}} ")->queryAll();
         return self::model()-> findAllBySql(" SELECT DISTINCT clase, desclase from {{cuentas}} order by clase ASC "); 
            
	}
        
        public function afterfind(){
            $this->descriclase="[".$this->clase."]  ".$this->desclase;
            return parent::afterfind();
        }
        
        
       
                
}
