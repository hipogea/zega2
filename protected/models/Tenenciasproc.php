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
public $auxiliar;
public $nombrecompleto;
	/**
	 * @return array validation rules for model attributes.
	 */

 public function behaviors()
	{
		return array(
			// Classname => path to Class
			'ActiveRecordLogableBehavior'=>
				'application.behaviors.ActiveRecordLogableBehavior'
               );
                
	} 



	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidevento', 'numerical', 'integerOnly'=>true),
                     array('codte,nhorasnaranja,subproceso,esmensaje,msgexterno,final,codocu,automatico,nhorasverde,renuevavencimiento,hidprevio, hidevento', 'safe', 'on'=>'insert,update'),
			
                     array('codte,nhorasnaranja,codocu,nhorasverde, hidevento', 'required', 'on'=>'insert,update'),
			array('codte', 'length', 'max'=>4),
                   // array('hidprevio', 'chkvalores'),
                     array('hidevento+codte+codocu', 'application.extensions.uniqueMultiColumnValidator','on'=>'insert,update'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codte,nhorasnaranja,codocu,nhorasverde, hidevento',
                            'safe', 'on'=>'search_por_tenencia,search'),
                    
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
                    
                    'documentos' => array(self::BELONGS_TO, 'Documentos', 'codocu'),
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
                    'nhorasverde' => 'H. Aler',
            'nhorasnaranja' => 'H. Venc',
        
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

		$criteria->compare('codocu', $this->codocu);
       $criteria->compare('codte', $this->codte);
       $criteria->compare('nhorasnaranja', $this->nhorasnaranja);
       $criteria->compare('nhorasverde', $this->nhorasverde);
       $criteria->compare('hidevento', $this->hidevento);
        
       
		$criteria->addCondition("codte=".$parametro);
               // $criteria->params=array(':VCODTE'=>$parametro);

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
             // var_dump($this->codte);var_dump($this->codocu);die();
              $this->updateAll(
                      array('automatico'=>'0'),
                      "codte=:vcodte and codocu=:vcodocu",array(":vcodte"=>$this->codte,":vcodocu"=>$this->codocu)
                      );
           $this->automatico='1';
              
          }
          
         
          if(is_null($this->final))
              $this->final='0';
          return parent::beforesave();
      }  
      
      
      
	public function chkvalores($attribute,$params) {
		/*if($this->hidprevio==$this->hidevento )
			$this->adderror('hidprevio','No puede ser igual al  proceso original');
                 * */
                 
	}
     public function afterfind(){
    $this->auxiliar=$this->eventos->descripcion.'  -  [ '.$this->tenencias->deste.' ]';
    $this->nombrecompleto='[ '.$this->documentos->desdocu.' ] - '.$this->eventos->descripcion;
    return parent::afterfind();
}
        
     public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

       
        $criteria->compare('codocu', $this->codocu);
       $criteria->compare('codte', $this->codte);
       $criteria->compare('nhorasnaranja', $this->nhorasnaranja);
       $criteria->compare('nhorasverde', $this->nhorasverde);
       $criteria->compare('hidevento', $this->hidevento);
        
       

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }




}
