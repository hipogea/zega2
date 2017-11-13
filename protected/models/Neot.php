<?php

/**
 * This is the model class for table "{{neot}}".
 *
 * The followings are the available columns in table '{{neot}}':
 * @property string $id
 * @property string $hidne
 * @property string $hidot
 * @property double $cant
 * @property string $fecreacion
 * @property integer $iduser
 *
 * The followings are the available model relations:
 * @property Detgui $hidne0
 * @property Detot $hidot0
 */
class Neot extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $ordenitem;
	public function tableName()
	{
		return '{{neot}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('hidne, hidot, ordenitem, cant', 'safe','on'=>'nemasiva'),
			array('hidne, hidot, ordenitem, cant', 'required','on'=>'insert,update'),
			array('iduser', 'numerical', 'integerOnly'=>true),
                     array('hidot','exist','allowEmpty' => false, 'attributeName' => 'id', 'className' => 'Detot','message'=>'La referencia al detalle de la Ot no existe','on'=>'insert,update'),
                        array('hidne','exist','allowEmpty' => false, 'attributeName' => 'id', 'className' => 'Detgui','message'=>'La referncia al detalle de la Ne  no existe','on'=>'insert,update'),
                     
			array('cant', 'numerical'),
			array('hidne, hidot', 'length', 'max'=>20),
                    array('cant', 'checkcant','on'=>'insert,update'),
                     array('hidot', 'checkobjeto','on'=>'insert,update'), //checkar el remitente VS el cliente en la OT, ademeas checkar el objeto ne vs el Objeto de la OT
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidne, hidot, cant, fecreacion, iduser', 'safe', 'on'=>'search'),
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
			'detgui' => array(self::BELONGS_TO, 'Detgui', 'hidne'),
			'detot' => array(self::BELONGS_TO, 'VwOtdetalle', 'hidot'),
                         'detalleot'=>array(self::BELONGS_TO, 'Detot', 'hidot'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidne' => 'Hidne',
			'hidot' => 'Hidot',
			'cant' => 'Cant',
			'fecreacion' => 'Fecreacion',
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
		$criteria->compare('hidne',$this->hidne,true);
		$criteria->compare('hidot',$this->hidot,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('fecreacion',$this->fecreacion,true);
		$criteria->compare('iduser',$this->iduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        public function search_por_ne($hidne)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
                $hidne=(integer)  MiFactoria::cleanInput($hidne);
		$criteria=new CDbCriteria;

		//->compare('id',$this->id,true);
		$criteria->addCondition("hidne=:vhidne");
                $criteria->params=array(":vhidne"=>$hidne);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        public function search_por_ot($hidot)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
                $hidne=(integer)  MiFactoria::cleanInput($hidot);
		$criteria=new CDbCriteria;

		//->compare('id',$this->id,true);
		$criteria->addCondition("idot=:vhidne");
                $criteria->params=array(":vhidne"=>$hidot);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Neot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function checkcant($attribute,$params) {
            if($this->hidne >0){
                $detne=Detgui::model()->findByPk($this->hidne+0);
                if(!is_null($detne)){
                  if($this->cant >=0)
                    if( !(( $this->cant   >=   0 ) and
                          (   $this->cant <=  ( $detne->n_cangui-$detne->asignadosot) )  
                        ))
                       $this->adderror('n_cangui','Esta cantidad ['.$this->cant.' ] mas lo asignado a las Ots ['.$detne->asignadosot.' ]   ,sobrepasa a lo ingresado ['.$detne->n_cangui.' ] : '); 
                if($this->cant <0)
                    if((abs($this->cant)  > $detne->asignadosot ))
                       $this->adderror('n_cangui','No puede retirar  ['.ABS($this->cant).' ] de la OT,  lo asignado es : ['.$detne->asignadosot.' ]    '); 
               
                    
                    
                }else{
                    $this->adderror('n_cangui','La referencia al Ingreso no es la correcta');
                }
            }
		
	}
        
        
        public function beforesave(){
            if($this->hidot >0 and is_null($this->idot));
            $this->idot=Detot::model()->findByPk($this->hidot)->ot->id;
            $this->iduser=yii::app()->user->id;
            $this->fecreacion=date("Y-m-d H:i:s");
            return parent::beforesave();
        }
        
         public function checkobjeto($attribute,$params) {
            if($this->hidne >0){
                $detne=Detgui::model()->findByPk($this->hidne+0);
                if(!is_null($detne)){
                  $orden=Ot::model()->findByPk($this->hidot+0);
                    if(!is_null($orden)){
                        if(!(trim($orden->codpro)==trim($detne->ne->c_coclig)))
                            $this->adderror('hidot','La referencia al cliente en la Ot no coincide con el emisor del ingreso'); 
                           if(!(trim($orden->objetosmaster->objetoscliente->codobjeto)==trim($detne->codob)))
                               $this->adderror('hidot','La referencia al objeto en la Ot :  ['.$orden->objetosmaster->objetoscliente->codobjeto.'] ['.$orden->objetosmaster->objetoscliente->nombreobjeto.' ] no coincide con el objeto del emisor del ingreso [ '.$detne->codob.' ]      '); 
                               
                    }else{
                       $this->adderror('hidot','La referencia a la Ot no existe'); 
                    }
                    
                }else{
                    $this->adderror('n_cangui','La referencia al Ingreso no es la correcta');
                }
            }
		
	}
        
}
