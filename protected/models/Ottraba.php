<?php

/**
 * This is the model class for table "{{ottraba}}".
 *
 * The followings are the available columns in table '{{ottraba}}':
 * @property string $id
 * @property string $hidot
 * @property string $codtra
 * @property integer $hidreg
 */
class Ottraba extends CActiveRecord
{
	
    public $trabajadores_ap;
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ottraba}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidreg', 'numerical', 'integerOnly'=>true),
			array('hidot', 'length', 'max'=>20),
			array('codtra', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
                    array('hidot, codtra, hidreg,tarifa,codmon,codof', 'safe', 'on'=>'insert,update'),
			array('id, hidot, codtra, hidreg', 'safe', 'on'=>'search'),
                    array('codtra, hidreg,trabajadores_ap', 'safe', 'on'=>'search_por_ot'),
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
			'trabajadores' => array(self::BELONGS_TO,'Trabajadores', 'codtra'),
                        'regimen' => array(self::BELONGS_TO,'Regimen', 'hidreg'),
                        'oficios' => array(self::BELONGS_TO,'Oficios', 'codof'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidot' => 'Hidot',
			'codtra' => 'Codtra',
			'hidreg' => 'Hidreg',
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
		$criteria->compare('hidot',$this->hidot,true);
		$criteria->compare('codtra',$this->codtra,true);
		$criteria->compare('hidreg',$this->hidreg);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        public function search_por_ot($identidad)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
  $identidad= (integer)MiFactoria::cleanInput($identidad);
		$criteria=new CDbCriteria;

		//$criteria->compare('id',$this->id,true);
		//$criteria->compare('hidot',$this->hidot,true);
		$criteria->compare('codtra',$this->codtra,true);
                $criteria->compare('codtra',$this->codtra,true);
		$criteria->compare('hidreg',$this->hidreg);
$criteria->addCondition("hidot=".$identidad);

$criteria->together  =  true;
		$criteria->with = array('trabajadores');
		 if($this->trabajadores){
				$criteria->compare('trabajadores.ap',$this->trabajadores_ap,true);
			}
	  $sort=new CSort;
    $sort->attributes=array(
      'codep',
      // For each relational attribute, create a 'virtual attribute' using the public variable name
      'trabajadores_ap' => array(
        'asc' => 'trabajadores.ap',
        'desc' => 'trabajadores.ap DESC',
        'label' => 'Apellido',
      ),
      '*',
    );



		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                    'sort'=>$sort,
                    'pagination' => array(
                'pageSize' => 100,
            ),
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ottraba the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
