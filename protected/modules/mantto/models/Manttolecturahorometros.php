<?php

/**
 * This is the model class for table "{{manttolecturahorometros}}".
 *
 * The followings are the available columns in table '{{manttolecturahorometros}}':
 * @property string $id
 * @property integer $hidhorometro
 * @property string $lectura
 * @property string $fecha
 *
 * The followings are the available model relations:
 * @property Manttohorometros $hidhorometro0
 */
class Manttolecturahorometros extends ModeloGeneral
{
    
    public $_signo=0;
   
    public function init(){
        $this->camposfechas=array('fecha');
        return parent::init();
    }
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{manttolecturahorometros}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hidhorometro', 'numerical', 'integerOnly'=>true),
                    array('lectura', 'checkLectura', 'on'=>'insert,update'),
                    array('hidhorometro,lectura,fecha', 'safe', 'on'=>'insert,update'),
		
			array('lectura', 'length', 'max'=>20),
			array('fecha', 'length', 'max'=>19),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidhorometro, lectura, fecha', 'safe', 'on'=>'search'),
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
			'manttohorometros' => array(self::BELONGS_TO, 'Manttohorometros', 'hidhorometro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidhorometro' => 'Hidhorometro',
			'lectura' => 'Lectura',
			'fecha' => 'Fecha',
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
		$criteria->compare('hidhorometro',$this->hidhorometro);
		$criteria->compare('lectura',$this->lectura,true);
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function search_por_horometro($id)
	{
		$criteria=new CDbCriteria;

		$criteria->addCondition("hidhorometro=:vhidhorometro");
        $criteria->params=array(":vhidhorometro"=>$id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Manttolecturahorometros the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function previous(){
            $identidad=$this->getIdVecino();
            if($identidad!=false){
                return $this::model()->findByPk($identidad);
            }else{
                return null;
            }
        }
        
        public function next(){
            $identidad=$this->getIdVecino(false);
            if($identidad!=false){
                return $this::model()->findByPk($identidad);
            }else{
                return null;
            }
        }
        
        public function isLast(){
           return(is_null($this->getIdVecino(false)))?true:false;
        }
        public function isFirst(){
           return(is_null($this->getIdVecino()))?true:false;
        }
        
        
        private function getIdVecino($anterior=true){
           // $compare=($anterior)?"<":">";
           $identidad=yii::app()->db->createCommand()-> 
            select('id')->from($this->tableName())-> 
                    where($this->criteria($anterior)->condition,
                          $this->criteria($anterior)->params )->limit(1)->queryScalar(); 
            
        }
        
        //deuvelve las filas delante de esta lectura
        public function getForward(){
            if(!$this->isLast()){
                return $this->findAll($this->criteria(false));
            }else{
               return array();
            }
        }
        
        
         //deuvelve las filas delante de esta lectura
        public function getBack(){
            if(!$this->isFirst()){
               return  $this->findAll($this->criteria(true));
            }else{
               return array();
            }
        }
        
        //Esta funcion corre las lecturas hacia adelante
        //para posibles correciones de lecturas fuera de fecha 
        // $diferece pude ser negativo tambien
       public function runForward($difference){
           
           if(!$this->isLast()){
               $neighbours=$this->getForward();
               if(count($neighbours)>0){
                   $signo=$neighbours[0]->manttohorometros->incremental+0;
               }else{
                   return;
               }
               $transaction = Yii::app()->db->beginTransaction();
				
               foreach($neighbours as $filaFwd){
                  $this->setScenario('onlyread'); 
                  
                  $filaFwd->lectura=$filaFwd->lectura+$signo*$difference;
                  $filaFwd->save();
               }
               //AHORA ACTAULZIAR EL HOROMETRO
               $this->getPoint()->updatePoint($difference);
         
               $transaction->commit();
           }
           
       }
       
         //Esta funcion corre las lecturas hacia atras
        //para posibles correciones de lecturas fuera de fecha 
       public function runBack($difference){
           if(!$this->isLast()){
               $neighbours=$this->getBack();
               if(count($neighbours)>0){
                   $signo=$neighbours[0]->manttohorometros->incremental+0;
               }else{
                   return;
               }
               $transaction = Yii::app()->db->beginTransaction();
				
               foreach($neighbours as $filaFwd){
                  $this->setScenario('onlyread'); 
                  
                  $filaFwd->lectura=$filaFwd->lectura+$signo*$difference;
                  $filaFwd->save();
               }
               $transaction->commit();
           }
           
       }
       
       private function criteria($anterior=true){
           $compare=($anterior)?"<":">";
           $criteria=New CDbCriteria();
           $criteria->addCondition("fecha ".$compare.":vfecha and"
                   . " hidhorometro=:vhidhorometro"
                   . "  and id <> :vid");
           $criteria->params=array(":vfecha"=>$this->cambiaformatofecha($this->fecha,false),
                                ":vhidhorometro"=>$this->hidhorometro,
                                ":vid"=>$this->id);
           return $criteria;
       }
     
       private function getSigno(){
           if($this->_signo==0){
             $this->_signo= $this->manttohorometros->incremental+0;
           }
       }
      
       public function difference(){
           return ($this->lectura+0)-($this->previous()->lectura+0);
       }
       
       //aCTUALIZA SU HOROEMTRO 
       public function updateHorometro(){
           $registro=$this->manttohorometro->updatePoint($this->difference());
           //$registro->setScenario('updatesimple');
           //$registro->
       }
       
       private function isFuture(){
           $fecha=$this->cambiaformatofecha($this->fecha, false);
           //var_dump($fecha);die();
           if(strtotime(date('Y-m-d H:i:s'))< strtotime($fecha) )
                   return true;
           return false;
       }
    
         public function checkLectura($attribute,$params) {
             if($this->isFuture())
                  $this->adderror('lectura',yii::t('errvalid','The data of the meter hours is on the future'));
             if($this->isPointTime())
             $this->validateTimes($this->manttohorometros->ums->escala+0);
            
           }  
           
           
       /*Esta funcion es exclusiv para putnows de medida basados en tiempo
        * es decir horoemtros y otros contadores  simialres 
        * retirna una serie de mesdanejes de acuerdo a las validacioene en el tiempo
        */
      private function validateTimes($scale){
          //$mensajes=array();
          //El delta de lecturas no puede ser mayor al delta de fechas 
         if($this->differenceValuesBack($this->manttohorometros->ums->escala+0) > 
                 $this->differenceTimeBack($this->manttohorometros->ums->escala+0))
             $this->adderror('lectura',yii::t('errvalid','The diference between last value is greater than the time difference  '));
         ///incremental= 1 la lectura no debe ser menor que la lectura anterior
          if($this->getPoint()->incremental==1){
            if(!$this->isFirst())
            if($this->lectura < $this->previous()->lectura)
             $this->adderror('lectura',yii::t('errvalid','The last value is less than the previous value  '));
          if(!$this->isLast())
            if($this->lectura > $this->next()->lectura)
             $this->adderror('lectura',yii::t('errvalid','This value is greater  than the next value  '));
         
         
          }
          if($this->getPoint()->incremental==-1){
              if(!$this->isFirst())
            if($this->lectura > $this->previous()->lectura)
             $this->adderror('lectura',yii::t('errvalid','The last value is greater than the previous value  '));
        if(!$this->isLast())
            if($this->lectura < $this->next()->lectura)
             $this->adderror('lectura',yii::t('errvalid','This value is less  than the next value  '));
         
         
          }
         
      }
      
      ///dIFENRECIA EN TRE la fecha de lectuar  ACTUAL Y LA INMEDIATA ANTERIOR
      public function differenceTimeBack(){
          IF($this->isPointTime()){
              IF($this->isFirst())
                  return null;
               IF($this->isLast())
                   return null;
               return strtotime($this->cambiaformatofecha($this->fecha,false))-strtotime($this->cambiaformatofecha($this->previous()->fecha,false));
         
               
          }ELSE{
              RETURN NULL;
          }
      }
      
       ///dIFENRECIA EN TRE LA fecha de lectura LECTURA ACTUAL Y LA INMEDIATA POSTERIOR
      public function differenceTimeForward(){
          IF($this->isPointTime()){
              IF($this->isLast())
                  return null;
               IF($this->isLast())
                   return null;
                return strtotime($this->cambiaformatofecha($this->next()->fecha-strtotime($this->cambiaformatofecha($this->fecha,false)),false));
         
              }ELSE{
              RETURN NULL;
          }
      }
      
        ///dIFENRECIA EN TRE LA LECTURA ACTUAL Y LA INMEDIATA ANTERIOR, ens egudnos 
      public function differenceValuesBack($escala){
          
              IF($this->isFirst())
                  return null;
               IF($this->isLast())
                   return null;
               return abs(($this->lectura+0)-($this->previous()->lectura+0))*$escala;
               
          
      }
      
       ///dIFENRECIA EN TRE LA LECTURA ACTUAL Y LA INMEDIATA POSTERIOR en segundos 
      public function differenceValuesForward($escala){
          
              IF($this->isLast())
                  return null;
               IF($this->isLast())
                   return null;
                 return abs(($this->lectura+0)-($this->next()->lectura+0))*$escala;
              
      }
      
      
      
      private function isPointTime(){
         // var_dump($this->getPoint());die();
          RETURN ($this->getPoint()->ums->dimension=='T');
      }
      
      private function getPoint(){
          return ($this->isNewRecord)?Manttohorometros::model()->findByPk($this->hidhorometro):$this->manttohorometros;
      }
      
      public function aftersave(){
     //en le caso de editar soloactualziar de maner asimple si es el ultimo registro
              if($this->isLast() and $this->cambiocampo('lectura'))
                  $this->getPoint()->updatePoint($this->differenceValuesBack($this->manttohorometros->ums->escala+0));
         
          return parent::aftersave();
      }
}
