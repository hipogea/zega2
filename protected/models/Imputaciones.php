<?php
class Imputaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{imputaciones}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidcaja, codocucaja', 'numerical', 'integerOnly'=>true),
			array('monto', 'numerical'),
                    array('id, hidcaja, '
                        . 'codocucaja, monto, '
                        . 'codmon, tipimputacion,'
                        . ' idcolector, numerocolector, codoperador', 
                        'safe', 'on'=>'search'),
                    array('hidcaja, '
                        . 'codocucaja, monto, idcolectorpadre,'
                        . 'codmon, tipimputacion,'
                        . ' idcolector, numerocolector,codocuref, codoperador', 
                        'safe'),
			array('codmon, codoperador', 'length', 'max'=>3),
			array('tipimputacion', 'length', 'max'=>1),
			array('numerocolector', 'length', 'max'=>14),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidcaja, codocucaja, monto, codmon, tipimputacion, idcolector, numerocolector, codoperador', 'safe', 'on'=>'search'),
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
                    'dcajachica' => array(self::BELONGS_TO, 'Dcajachica', 'hidcaja'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidcaja' => 'Hidcaja',
			'codocucaja' => 'Codocucaja',
			'monto' => 'Monto',
			'codmon' => 'Codmon',
			'tipimputacion' => 'Tipimputacion',
			'idcolector' => 'Idcolector',
			'numerocolector' => 'Numerocolector',
			'codoperador' => 'Codoperador',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('hidcaja',$this->hidcaja);
		$criteria->compare('codocucaja',$this->codocucaja);
		$criteria->compare('monto',$this->monto);
		$criteria->compare('codmon',$this->codmon,true);
		$criteria->compare('tipimputacion',$this->tipimputacion,true);
		$criteria->compare('idcolector',$this->idcolector,true);
		$criteria->compare('numerocolector',$this->numerocolector,true);
		$criteria->compare('codoperador',$this->codoperador,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        public function search_por_ot($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		
            
            $criteria=new CDbCriteria;

		$criteria->addCondition(
                        "codocuref='891'"
                        );
                $criteria->addCondition(
                        "idcolectorpadre=".$id
                        );

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Imputaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave() {
            if(!(yii::app()->settings->get('general','general_monedadef')==$this->codmon))
            {
                $this->montosoles=yii::app()->tipocambio->cambio(
                        $this->codmon,yii::app()->settings->
                        get('general','general_monedadef')
                        )*$this->monto;
            }
            
            return parent::beforeSave();
        }
}
