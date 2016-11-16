<?php


class Tenenciasproc extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tenenciasproc}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidevento', 'numerical', 'integerOnly'=>true),
                     array('codte,nhorasnaranja,final,automatico,nhorasverde,hidprevio, hidevento', 'safe', 'on'=>'insert,update'),
			
                     array('codte,nhorasnaranja,nhorasverde, hidevento', 'required', 'on'=>'insert,update'),
			array('codte', 'length', 'max'=>4),
                    array('hidprevio', 'chkvalores'),
                    array('hidevento+codte', 'application.extensions.uniqueMultiColumnValidator','on'=>'insert,update'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, codte, hidevento', 'safe', 'on'=>'search'),
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
			'eventos' => array(self::BELONGS_TO, 'Eventos', 'hidevento'),
			'tenencias' => array(self::BELONGS_TO, 'Tenencias', 'codte'),
                     'nprocesosdocu'=>array(self::STAT, 'Procesosdocu', 'hidproc'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codte' => 'Codte',
			'hidevento' => 'Hidevento',
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
	public function search_por_tenencia($codte)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
       $parametro=  MiFactoria::cleanInput($codte);
		$criteria=new CDbCriteria;

		
		$criteria->addCondition('codte=:VCODTE');
                $criteria->params=array(':VCODTE'=>$codte);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tenenciasproc the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
      public function beforesave(){
          if($this->automatico=='1'){ //Solo uno puede tener le heck actuivo por default 
              $this->updateAll(array('automatico'=>'0'),"codte=:vcodte",array(":vcodte"=>$this->codte));
           $this->automatico='1';
              
          }
          
         
          if(is_null($this->final))
              $this->final='0';
          return parent::beforesave();
      }  
      
      
      
	public function chkvalores($attribute,$params) {
		if($this->hidprevio==$this->hidevento )
			$this->adderror('hidprevio','No puede ser igual al  proceso original');
	}
        
}
