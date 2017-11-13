<?php

/**
 * This is the model class for table "{{dailyturnos}}".
 *
 * The followings are the available columns in table '{{dailyturnos}}':
 * @property integer $id
 * @property integer $hidturno
 * @property string $codproyecto
 * @property integer $secuencia
 *
 * The followings are the available model relations:
 * @property Ot $codproyecto0
 * @property Regimen $hidturno0
 */
class Dailyturnos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    
    public $regimen_inicio;
	public function tableName()
	{
		return '{{dailyturnos}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('hidturno,color, codproyecto', 'required', 'on'=>'insert,update'),
                   array('codproyecto','exist','allowEmpty' => false, 'attributeName' => 'numero', 'className' => 'Ot','message'=>yii::t('errvalid','This value doesn\'t exists')),
			
                    array('hidturno', 'checkregimen', 'on'=>'insert,update'),
			array('hidturno, secuencia', 'numerical', 'integerOnly'=>true),
			array('codproyecto', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidturno,color, codproyecto, secuencia', 'safe', 'on'=>'search,insert'),
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
			'ot' => array(self::BELONGS_TO, 'Ot', 'codproyecto'),
			'regimen' => array(self::BELONGS_TO, 'Regimen', 'hidturno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidturno' => 'Hidturno',
			'codproyecto' => 'Codproyecto',
			'secuencia' => 'Secuencia',
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
		$criteria->compare('hidturno',$this->hidturno);
		$criteria->compare('codproyecto',$this->codproyecto,true);
		$criteria->compare('secuencia',$this->secuencia);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function search_por_ot($numero)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
     $criteria=new CDbCriteria;
     $criteria->addCondition("codproyecto=:vcodproyecto");
            if(is_null($numero) or $numero==''){
                    $numero='ALFA';
                     }else{
		
               }         
            $criteria->params=array(":vcodproyecto"=>$numero);
        
            
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,/*'sort'=>$sort,*/ 
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dailyturnos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
       
        
        public  function turnos(){
            return $this->search_por_ot($this->codproyecto)->getData();
        }
        
        private function getHorasTotales(){
            $acumulado=0;
           // var_dump($this->hidturno);die();
             $modeloregimen=Regimen::model()->findByPk($this->hidturno);
           foreach($this->turnos() as $fila){
                $acumulado+=$fila->regimen->horasdia;
            } 
            return $acumulado+$modeloregimen->horasdia;
        }
        
        private function interfiere(){
            $cumple=true;
            $turnos=$this->turnos();
            if(count($turnos) == 0)return false;
            $modeloregimen=Regimen::model()->findByPk($this->hidturno);
            $fecha=date('Y-m-d');
            $fmin=$modeloregimen->getLimiteInferior($fecha);
            $fmax=$modeloregimen->getLimiteSuperior($fecha);
           foreach( $turnos as $fila){
             $finicio= $fila->regimen->getLimiteInferior($fecha);
             $filafin=$fila->regimen->getLimiteSuperior($fecha);
              if((strtotime($finicio)> strtotime($fmax)) or
                  (strtotime($fmin)> strtotime($filafin))    ){ 
                  $cumple=false;
            } else{
               
                break;
           } }
            return $cumple;
        }
        public static function getSecuencia($numero){
        return  Yii::app()->db->createCommand()
  ->select('a.hidturno')
  ->from(self::tableName().' a')
  ->join('{{regimen}} b', 'a.hidturno=b.id')  
  ->where('a.codproyecto=:vcodproyecto', array(':vcodproyecto'=>$numero))
  ->order('b.hinicio')
  ->queryColumn();
        }
     
        
        public function checkregimen($attribute,$params) {
            
            //primerom verifica que no exced las horas del dia 
            if($this->hidturno=='' or is_null($this->hidturno))
            {$this->adderror('hidturno',yii::t('errvalid','The  ({attribute})  can\'t be blank',array('{attribute}'=>$this->getAttributeLabel('hidturno'))));
            return;}
            $ht=$this->getHorasTotales() ;
            if($ht > 24 ){
                $this->adderror('hidturno',yii::t('errvalid','The total hours ({horas})  from shifts, are greater than one day (24)',array('{horas}'=>$ht)));
              return;
            }
               
            //verificar que el turno a insertar quepa en las horas libres del dia 
           if($this->interfiere()){
                $this->adderror('hidturno',yii::t('errvalid','The Shift you try to add, interferes with the schedule of the others '));
              return;
           }
              
	} 
        
}
