<?php

/**
 * This is the model class for table "{{dailywork}}".
 *
 * The followings are the available columns in table '{{dailywork}}':
 * @property integer $id
 * @property string $codresponsable
 * @property string $fecha
 * @property string $codturno
 * @property string $horacierre
 * @property string $codproyecto
 * @property string $codocu
 * @property string $codestado
 *
 * The followings are the available model relations:
 * @property Dailydet[] $dailydets
 * @property Estado $codestado0
 * @property Estado $codocu0
 * @property Trabajadores $codresponsable0
 */
class Dailywork extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
    const ESTADO_NUEVO='10';
    const ESTADO_PREVIO='10';
    const COD_DOCU='146';
    public $idot;
	public function tableName()
	{
		return '{{dailywork}}';
	}

        public function init(){
            $this->documento='146';
            $this->campoestado='codestado';
            $this->camposfechas=array('fecha');
             $this->campossensibles=array('fecha','hidturno','codproyecto');
            return parent::init();
        }
        
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codresponsable, fecha,  hidturno,codproyecto', 'required'),
			array('numero,codresponsable,mes,anno,dia,semana, fecha,   codproyecto','safe', 'on'=>'insert,update'),
                    array('codresponsable', 'length', 'max'=>6),
			array('fecha', 'length', 'max'=>10),
			array('codturno, codocu', 'length', 'max'=>3),
			array('horacierre', 'length', 'max'=>8),
			array('codproyecto', 'length', 'max'=>15),
			array('codestado', 'length', 'max'=>2),
                    array('fecha', 'checkfecha','on'=>'insert,update','message'=>Yii::t('app','Ya existe un documento en esta fecha  {valor1}',array('{valor1}'=>$this->fecha))),
			 array('numero', 'checkhorometros','on'=>'insert,update'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, codresponsable, fecha, codturno, horacierre, codproyecto, codocu, codestado', 'safe', 'on'=>'search'),
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
                    'ot'=>array(self::BELONGS_TO, 'Ot', 'codproyecto'),
			'regimen'=>array(self::BELONGS_TO, 'Regimen', 'hidturno'),
			'dailydet' => array(self::HAS_MANY, 'Dailydet', 'hidparte'),
			'estado' => array(self::BELONGS_TO, 'Estado', 'codestado'),
			'documentos' => array(self::BELONGS_TO, 'Estado', 'codocu'),
			'trabajadores' => array(self::BELONGS_TO, 'Trabajadores', 'codresponsable'),
		       'ndailydet' => array(self::STAT, 'Dailydet', 'hidparte'),
                    'avgutil' => array(self::STAT, 'Dailydet', 'hidparte','select'=>"avg(t.util)"),
                    'avgdispo' => array(self::STAT, 'Dailydet', 'hidparte','select'=>"avg(t.dispo)"),
			'nparadastotales'=> array(self::STAT, 'Dailydet', 'hidparte','select'=>"sum(t.ntt)"),
			
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codresponsable' => 'Codresponsable',
			'fecha' => 'Fecha',
			'codturno' => 'Codturno',
			'horacierre' => 'Horacierre',
			'codproyecto' => 'Codproyecto',
			'codocu' => 'Codocu',
			'codestado' => 'Codestado',
                    'mes' => 'Month',
			'anno' => 'Year',
			'dia' => 'day',
                    'numero'=>'Numero',
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
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('codturno',$this->codturno,true);
		$criteria->compare('horacierre',$this->horacierre,true);
		$criteria->compare('codproyecto',$this->codproyecto,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codestado',$this->codestado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dailywork the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforesave(){
            IF ($this->numero===null or empty($this->numero))
			{
				$this->numero=$this->correlativo('numero',null,$this->documento);
			}
            if ($this->isNewRecord) {
			$this->codestado=self::ESTADO_NUEVO;			
		}
		else
		{
			
			//var_dump($this->numero);die();
		
                }
           if($this->cambiocampo('fecha')){
               
               $vfecha=strtotime($this->cambiaformatofecha($this->fecha, false));
               $this->codocu=$this->documento;
            $this->codestado=self::ESTADO_NUEVO;           
            $this->semana=date('W',$vfecha);
            $this->mes=date('m',$vfecha);
             $this->dia=date('d',$vfecha);
            $this->anno=date('y',$vfecha);
           }else{
             
               
           }
            return parent::beforesave();
        }
        
        public function checkfecha($attribute,$params) {
            
		if(!$this->fecha===null or !empty($this->fecha)){
                    //no puede haber un parte fuera de la fecha del proyecto 
                   $fechainicioproyecto=$this->cambiaformatofecha(Ot::findByNumero($this->codproyecto)->fechainiprog,false);
                   $fechafinproyecto=$this->cambiaformatofecha(Ot::findByNumero($this->codproyecto)->fechafinprog,false);
                   //no puede haber partes dentro de estas fechas
                   if(!yii::app()->periodo->estadentrodefechas( $fechainicioproyecto,$this->cambiaformatofecha($this->fecha, false),$fechafinproyecto,true)){
                        $this->adderror('fecha',yii::t('errvalid','Can not create a new document because date {fecha}   is out of period proyect {proyecto} : ({inicio})-({fin}) ',array('{fecha}'=>$this->fecha,'{inicio}'=>$fechainicioproyecto,'{fin}'=>$fechafinproyecto,'{proyecto}'=>$this->codproyecto)));
                    return;
                   }
                    
                    
                   if($this->isNewRecord){
                      $registros= $this::model()->findAll("fecha=:vfecha and hidturno=:vhidturno ",
                            array(":vhidturno"=>$this->hidturno,":vfecha"=>$this->cambiaformatofecha($this->fecha,false)));
                    
                   }else{
                    $registros= $this::model()->findAll("fecha=:vfecha and hidturno=:vhidturno and id<>:vid",
                            array(":vhidturno"=>$this->hidturno,":vid"=>$this->id,":vfecha"=>$this->cambiaformatofecha($this->fecha,false)));
                   }
                  // var_dump($this->attributes);
                    //var_dump($this->cambiaformatofecha($this->fecha,false));die();
                   if(count($registros)>0){
                       $this->adderror('fecha',yii::t('app','Ya existe un documento en esta fecha  {valor1}',array('{valor1}'=>$this->fecha)));
                   
                      return; 
                   } 
                   
                } 
               // var_dump($this->getSecuencia());die();
              //verificaque las seuecnia de los tuirnos sean correctas
                $turnito=(INTEGER)$this->getSecuencia($this->cambiaformatofecha($this->fecha, false));
                
                if($turnito<>$this->hidturno){
                    $regi= Regimen::model()->findByPk($turnito)->desregimen;
                     $this->adderror('hidturno',yii::t('errvalid','The Shift is Premature, enter the previous Shift ('.$regi.') Before'));
                 return;
                }
                
                /*
               * Este pesazo de codigo se evalua siempre y cuando se haya activado la 
               * la restriccion en la configuracion del docmuento partes de operatividad
               */
                 
             if(Configuracion::valor(Dailywork::COD_DOCU, $this->getCentro(),'1125')=='1'){
                // var_dump(Configuracion::valor(Dailywork::COD_DOCU, $this->getCentro(),'1125'));die();
                //no puede haber un parte sin haber crado el dia anterior un previo
                 $ayer=date("Y-m-d",strtotime($this->cambiaformatofecha($this->fecha,false))-24*60*60);
                 //var_dump($this->cambiaformatofecha($this->fecha,false));var_dump($this->cambiaformatofecha($fechainicioproyecto,false));die();
                 if($this->cambiaformatofecha($this->fecha,false)==$this->cambiaformatofecha($fechainicioproyecto,false)){
                   //aqui no hay problema , se trata del primer dia
                     
                 }else{
                    //aqui si verificamos la secuencia del turno del dia anteriuor 
                     //var_dump($ayer);die();
                     $turnito2=(integer)$this->getSecuencia($ayer);
                     //var_dump($turnito2);die();
                     if($turnito2!=-1){//quiere decir que no se ha compeltado los partes el dia anterior 
                         $this->adderror('numero',yii::t('errvalid','Can not create a new Document Because has not completed all the shifts in the day {fecha}. First you must complete these',array('{fecha}'=>date("d/m/Y",strtotime($ayer)))));
                       return;
                     }
                 }
                 
              
                
             }	
	}
        public function checkhorometros($attribute,$params) {
		$registro=New Dailydet();
                if($registro->getHorometroAnterior('hmi',$this->fecha)==-1)
                    $this->adderror('numero',yii::t('app','You can not create the document because in previous document, there are hour meters to update'));
                if($registro->getHorometroAnterior('hmf',$this->fecha)==-1)
                    $this->adderror('numero',yii::t('app','You can not create the document because in previous document, there are hour meters to update'));
                    
			
	}
    public function afterfind(){
        $this->idot= $this->getot();
        //var_dump($this->numero);
        return parent::afterfind();
    }
    public function getot(){
       return  Ot::findByNumero($this->codproyecto)->id;
    }
    
    public function getSecuencia($fecha){
        //$fecha=$this->cambiaformatofecha($this->fecha, false);
        
        $secuencia=Dailyturnos::getSecuencia($this->codproyecto);        
        $turnoshechos=yii::app()->db->
                createCommand()->select('hidturno')->
                from($this->tableName())->where(
                        "fecha=:vfecha",array(":vfecha"=>$fecha)
                        )->order("numero asc")
                ->queryColumn();
        //var_dump($secuencia); var_dump($turnoshechos);die();
        if(count($turnoshechos)> 0){
            $diferencia=array_diff($secuencia,$turnoshechos);
            //var_dump($diferencia);die();
            if(count($diferencia)==0){//quiere decior qye ya secompltaron todos los turnos
                return -1;
            }else{
                //var_dump((integer)$diferencia[0]);die();
                foreach($diferencia as $clave=>$valor){ //este fopreach es para asegurarnos de no errores en la clave
                    //recordar que en diff array, las claves no se resetean se mantienen
                   return (integer)$diferencia[$clave]; 
                }
                
            }           
            
        }else{   //quiere decir que no necontro nanda 
            //veamos si se trata del primer dia (el dia de arranque del proyecto )
                RETURN $secuencia[0];
        }
    }
  
    public function getCentro(){
        return Ot::findByNumero($this->codproyecto)->codcen;
    }
    
    public function getNext(){
      if(Configuracion::valor($this::COD_DOCU, $this->getCentro(), '1125')){
        $siguiente=yii::app()->db->
                createCommand()->select('id')->
                from($this->tableName())->where(
                        "id >:vid",array(":vid"=>$this->id)
                        )->order("id asc")->limit(1)
                ->queryScalar();
        if($siguiente!=null){
            return $siguiente+0;
        }else{
            return -1;
        }
      }else{
        
         $siguiente=yii::app()->db->
                createCommand()->select('id')->
                from($this->tableName())->where(
                        "fecha =:vfecha and id >:vid",array(":vid"=>$this->id,":vfecha"=>$this->cambiaformatofecha($this->fecha,false))
                        )->order("fecha asc")->limit(1)
                ->queryScalar();
        if($siguiente!=null){
            return $siguiente+0;
        }else{
           $siguiente=yii::app()->db->
                createCommand()->select('id')->
                from($this->tableName())->where(
                        "fecha >:vfecha",array(":vfecha"=>$this->cambiaformatofecha($this->fecha,false))
                        )->order("fecha asc")->limit(1)
                ->queryScalar(); 
           if($siguiente!=null){
            return $siguiente+0;
                }else{
            return -1; //no hay siguiente
                }
        }
      } 
    }
     public function getPrev(){
      if(Configuracion::valor($this::COD_DOCU, $this->getCentro(), '1125')){
       $siguiente= yii::app()->db->
                createCommand()->select('id')->
                from($this->tableName())->where(
                        "id <:vid",array(":vid"=>$this->id)
                        )->order("id desc")->limit(1)
                ->queryScalar();
        if($siguiente!=null){
            return $siguiente+0;
        }else{
            return -1;
        }
      }else{
        
         $siguiente=yii::app()->db->
                createCommand()->select('id')->
                from($this->tableName())->where(
                        "fecha =:vfecha and id<:vid",array(":vid"=>$this->id,":vfecha"=>$this->cambiaformatofecha($this->fecha,false))
                        )->order("fecha desc")->limit(1)
                ->queryScalar();
        if($siguiente!=null){
            return $siguiente+0;
        }else{
           $siguiente=yii::app()->db->
                createCommand()->select('id')->
                from($this->tableName())->where(
                        "fecha <:vfecha",array(":vfecha"=>$this->cambiaformatofecha($this->fecha,false))
                        )->order("fecha asc")->limit(1)
                ->queryScalar(); 
           if($siguiente!=null){
            return $siguiente+0;
                }else{
            return -1; //no hay siguiente
                }
        }
      }
      
    }
    
    public function  isProbablyDataIncomplete(){
        if(($this->avgutil+0 < 0.2) or
            ($this->avgdispo+0 > 0.95) or
            ($this->nparadastotales+0 < 2) )
            return true;
        return false;
     }
}
