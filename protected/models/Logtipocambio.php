<?php

/**
 * This is the model class for table "{{logtipocambio}}".
 *
 * The followings are the available columns in table '{{logtipocambio}}':
 * @property string $id
 * @property string $fecha
 * @property string $dia
 * @property string $codmon
 * @property string $codmondef
 * @property integer $hidcambio
 * @property double $compra
 * @property double $venta
 * @property integer $iduser
 *
 * The followings are the available model relations:
 * @property Tipocambio $hidcambio0
 */
class Logtipocambio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{logtipocambio}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                     array('hidcambio+fecha', 'application.extensions.uniqueMultiColumnValidator','on'=>'insert'),
                    array('codmon','exist','allowEmpty' => false, 'attributeName' => 'codmon1', 'className' => 'Tipocambio','message'=>'Esta moneda no esta activa o no existe'),
			 array('codmondef','exist','allowEmpty' => false, 'attributeName' => 'codmondef', 'className' => 'Tipocambio','message'=>'Esta moneda no es la moneda por edefecto  o no existe'),
		
			array('compra, venta', 'required'),
			array('hidcambio, iduser', 'numerical', 'integerOnly'=>true),
			array('compra, venta', 'numerical'),
			array('fecha', 'length', 'max'=>20),
                    array('compra','verificacambio'),
                    array('fecha', 'match',  'pattern'=>'/(19|20)\d{2}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/','message'=>'La fecha no es correcta, debe de ser de la forma AAAA-MM-DD','on'=>'insert,update'),
			array('dia', 'length', 'max'=>1),
			array('codmon, codmondef', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha, dia, codmon, codmondef, hidcambio, compra, venta, iduser', 'safe', 'on'=>'search'),
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
			'tipocambio' => array(self::BELONGS_TO, 'Tipocambio', 'hidcambio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha' => 'Fecha',
			'dia' => 'Dia',
			'codmon' => 'Codmon',
			'codmondef' => 'Codmondef',
			'hidcambio' => 'Hidcambio',
			'compra' => 'Compra',
			'venta' => 'Venta',
			'iduser' => 'Iduser',
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
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('dia',$this->dia,true);
		$criteria->compare('codmon',$this->codmon,true);
		$criteria->compare('codmondef',$this->codmondef,true);
		$criteria->compare('hidcambio',$this->hidcambio);
		$criteria->compare('compra',$this->compra);
		$criteria->compare('venta',$this->venta);
		$criteria->compare('iduser',$this->iduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Logtipocambio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function verificacambio ($attribute,$params) {
            if(!($this->compra >0  and $this->venta >0  ))
                $this->adderror('compra','El tipo de cambio siempre es positivo');
		
		if ( $this->compra > $this->venta ) {
			$this->adderror('compra','La compra no puede ser mayor que la venta');
		}

	}
        
        PUBLIC function beforesave(){
            if(is_null($this->dia))
                $this->dia=date("w",strtotime($this->fecha));
            
            if(is_null($this->hidcambio))
                $this->hidcambio= Tipocambio::model()->find(
                        " codmondef=:vmonedadef and codmon1=:vcodmon ",
                        array(":vmonedadef"=>$this->codmondef,":vcodmon"=>$this->codmon)
                        )->id;
            return parent::beforesave();
        }
        
        
        public function search_por_fecha($fecha)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
//var_dump($fecha);
		$criteria=new CDbCriteria;
                if(preg_match('/(19|20)\d{2}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/',trim($fecha)))
                {
                    $criteria->addCondition("fecha='".trim($fecha)."'"); 
                    //var_dump($criteria->condition);  die();
                }else{
                    $criteria->addCondition("1=2");
                    //var_dump($criteria->condition);  die();
                }
                        
                   // var_dump($criteria->condition);  die();
		$criteria->compare('fecha',$this->fecha);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
}
