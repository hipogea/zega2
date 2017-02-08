<?php

class VwStockSupervision extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_stock_supervision';
	}
	public $color;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codart, codcentro, codal', 'required'),
			array('canteconomica, cantreposic, cantreorden, cantlibre, cantres, canttran, punit', 'numerical'),
			array('codart', 'length', 'max'=>8),
			array('codcentro', 'length', 'max'=>4),
			array('codal, um', 'length', 'max'=>3),
			array('descripcion', 'length', 'max'=>60),
			array('desum', 'length', 'max'=>20),
			array('supervisionautomatica', 'length', 'max'=>1),
			// The following rulcolore is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codart,codcentro, color,codal', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(

			'maestro' => array(self::BELONGS_TO, 'Maestrocompo', 'codart'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codart' => 'Codart',
			'codcentro' => 'Codcentro',
			'codal' => 'Codal',
			'canteconomica' => 'Canteconomica',
			'cantreposic' => 'Cantreposic',
			'cantreorden' => 'Cantreorden',
			'descripcion' => 'Descripcion',
			'um' => 'Um',
			'desum' => 'Desum',
			'supervisionautomatica' => 'Supervisionautomatica',
			'cantlibre' => 'Cantlibre',
			'cantres' => 'Cantres',
			'canttran' => 'Canttran',
			'punit' => 'Punit',
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
		$criteria=new CDbCriteria;
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('codcentro',$this->codcentro,true);
		$criteria->compare('codal',$this->codal,true);
		$criteria->compare('color',$this->color,true);
                
			return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
				
		));
	}

	public function colorstatus(){
		if($this->cantlibre > $this->canteconomica)
		{return 4;}
		elseif($this->cantlibre <= $this->canteconomica and $this->cantlibre > $this->cantreorden )
		{return 2;}
		elseif($this->cantlibre <= $this->cantreorden and $this->cantlibre >= $this->cantreposic)
		{return 3;}
		elseif($this->cantlibre < $this->cantreposic and $this->cantlibre >= 0)
		{return 1;}

	}


        public function afterfind(){
            $this->color=$this->colorstatus();
        }




	public function search_por_almacen($codal,$codcen)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('codcentro',$this->codcentro,true);
		$criteria->compare('codal',$this->codal,true);
		$criteria->compare('canteconomica',$this->canteconomica);
		$criteria->compare('cantreposic',$this->cantreposic);
		$criteria->compare('cantreorden',$this->cantreorden);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('um',$this->um,true);
		$criteria->compare('desum',$this->desum,true);
		$criteria->compare('supervisionautomatica',$this->supervisionautomatica,true);
		$criteria->compare('cantlibre',$this->cantlibre);
		$criteria->compare('cantres',$this->cantres);
		$criteria->compare('canttran',$this->canttran);
		$criteria->compare('punit',$this->punit);
		$criteria->addcondition("codcentro='".$codcen."'");
		$criteria->addcondition("codal='".$codal."'");
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,'pagination' => array(
				'pageSize' => 500,
			),
		));


	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwStockSupervision the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
