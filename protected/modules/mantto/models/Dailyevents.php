<?php

/**
 * This is the model class for table "{{dailyevents}}".
 *
 * The followings are the available columns in table '{{dailyevents}}':
 * @property integer $id
 * @property string $hidet
 * @property string $codcriticidad
 * @property string $fechahora
 * @property string $descripcion
 * @property string $detalle
 *
 * The followings are the available model relations:
 * @property Dailydet $hidet0
 */
class Dailyevents extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{dailyevents}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('hidet,hinicio,hfinal,tipmanoobra,codresponsable,tiempopasado,descripcion,abierto', 'safe', 'on'=>'insert,update'),
			 array('hidet,hinicio,hfinal,tipmanoobra,codresponsable,descripcion', 'required', 'on'=>'insert,update'),
		array('codresponsable','exist','allowEmpty' => false, 'attributeName' => 'codigotra', 'className' => 'Trabajadores','message'=>yii::t('errvalid','This value doesn\'t exists')),
		                    array('hfinal', 'checkhoras', 'on'=>'insert,update'),
		    array('hidet, fechahora', 'length', 'max'=>20),
			array('codcriticidad', 'length', 'max'=>2),
			array('descripcion', 'length', 'max'=>30),
			array('detalle', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidet, codcriticidad, fechahora, descripcion, detalle', 'safe', 'on'=>'search'),
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
			'dailydet' => array(self::BELONGS_TO, 'Dailydet', 'hidet'),
                    //'dailydet' => array(self::BELONGS_TO, 'Dailydet', 'hidet'),
                    'trabajadores' => array(self::BELONGS_TO, 'Trabajadores', 'codresponsable'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidet' => 'Hidet',
			'codcriticidad' => 'Codcriticidad',
			'fechahora' => 'Fechahora',
			'descripcion' => 'Descripcion',
			'detalle' => 'Detalle',
                        'abierto'=>'Over Shift'
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
		$criteria->compare('hidet',$this->hidet,true);
		$criteria->compare('codcriticidad',$this->codcriticidad,true);
		$criteria->compare('fechahora',$this->fechahora,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('detalle',$this->detalle,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dailyevents the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforesave(){
            $this->tiempopasado=yii::app()->periodo->diferenciahoras($this->hinicio,$this->hfinal,true);
            
            return parent::beforeSave();
            }
        
          public function aftersave(){
            //$this->tiempopasado=yii::app()->periodo->diferenciahoras($this->hinicio,$this->hfinal,true);
            
             $this->dailydet->save();
            return parent::afterSave();
            }   
            
           public function checkhoras($attribute,$params) {
               
               //sacamos primero los registros relacionados
               if($this->isNewRecord){
                        $registro= Dailydet::model()->findByPk($this->hidet);                        
               }else{
                        $registro= $this->dailydet;                        
               }
               
                        $parte=$registro->dailywork;
                        $fecha=$parte->cambiaformatofecha($parte->fecha,false);
                        $horaminimaturno=$parte->regimen->getLimiteInferior($fecha);
                        $horamaximaturno=$parte->regimen->getLimiteSuperior($fecha);
                      
                        $horasturno=$registro->gethorasturno();
                        $horasparadaacumulada=$registro->gethorasparada();
                        //ubicando las horas en la fecha correcta 
                        $horainicio=strtotime($fecha)+(strtotime($this->hinicio)-strtotime(date('Y-m-d')));
                        $horafin=strtotime($fecha)+(strtotime($this->hfinal)-strtotime(date('Y-m-d')));
                        $eventos=$registro->dailyevents;
                        //si tiene horoemtro de perforacion
                        $tienehorometroadicional=$registro->inventario->tienecarter;
                     $horastotales=$registro->hmt+$registro->tbd;//horas totales de trabajo con motor+paradas
                     $horastotales1=$registro->hpt+$registro->tbd;//horas totales de trabajo con perforadora+paradas
                     $elmayor=max($horastotales,$horastotales1);
                     
               unset($parte);unset($registro);unset($horastotales);unset($horastotales1);
                       
                        $estaenelmismodia=true; 
                       
             if(substr($horaminimaturno,0,10)==substr($horamaximaturno,0,10)){
                   //$puntocambiodia=strtotime($horaminimaturno)+24*60*60;
                  
               }else{//ene este caso hay que verificar y corregir la fecha de inicio y sumarle un dia
                  //verificando por donde se ubica la hora de inicio
                   $estaenelmismodia=false;
                   
                   if($horainicio < $horafin){ //si se conserva el orden de las horas ingresadas
                       //verificar si cae dentro del horario 
                          if($horainicio < strtotime($horaminimaturno)){//si no cae dentro del horario saltar 24 horas, las dos horas por estar en orden
                              $horainicio+=24*60*60;
                                $horafin+=24*60*60;
                          }else{//si cae dentro del horario no hay problema
                                
                          }
                   }else{//si no se conserva el orden quiere decir que ha habido cambio de dia durante el evento
                       if($horainicio < strtotime($horaminimaturno)){
                              //si no cae dentro del horario dejar  ai no mas, lo agasrranra las otras validaiones 
                          }else{//si cae dentro del horario 
                              if($horafin < strtotime($horaminimaturno) )
                                
                                $horafin+=24*60*60;
                          }
                   }
                   
                  
                  
               }
               $diferencia=round(($horafin-$horainicio)/3600,2);
               /* echo "----incio cambiados------<br>";
               var_dump(date('Y-m-d H:i:s',$horainicio));var_dump(date('Y-m-d H:i:s',$horafin));
                 echo "----------<br>";
               
               echo "fecha "; VAR_DUMP($fecha); echo "<br> ";
                 echo "horaminimaturno "; VAR_DUMP($horaminimaturno);
                  echo "horamaximaturno "; VAR_DUMP($horamaximaturno);
                   echo "horasturno "; VAR_DUMP($horasturno);
                    echo "horasparadaacumulada ";VAR_DUMP($horasparadaacumulada);
                  echo "horainicio ";VAR_DUMP($horainicio);
                  echo "horafin "; VAR_DUMP($horafin);
                    echo "difrencia ";VAR_DUMP($diferencia);
                    echo "estaen elmismodia";VAR_DUMP($estaenelmismodia);*/
               /*Buenos  ahora que tenemos ubicadas las horas de inicio y final y la fechas correctas 
                * procedemos recien a la validacion */
                
              
             //no puede haber una hora menor que la otra si esta en el mismo dia 
               if($estaenelmismodia && !yii::app()->periodo->verificahoras($this->hinicio,$this->hfinal,false) ){
                  $this->adderror('hfinal',yii::t('errvalid','El valor del campo "{campo}" = "{valorcampo}"  ',array('{valorcampo}'=>$this->hinicio,'{campo}'=>$this->getAttributeLabel('hfinal'))).yii::t('errvalid','es mayor que {valref}',array('{valref}'=>$this->hfinal)));
               return;
              }
            //no puede haber una suma de horas mayor al detl turno              
              if($diferencia > $horasturno ){
                  $this->adderror('hfinal',yii::t('errvalid','No puede haber un evento con duración mayor a las {nhoras} horas ',array('{nhoras}'=>$horasturno)));
              
                  return;
              }
              //no puede iniciar antes de la hora limite 
             if($horainicio < strtotime($horaminimaturno)){
                $this->adderror('hinicio',yii::t('errvalid','No puede haber un evento que empieze antes de las  {inicio} ',array('{inicio}'=>$horaminimaturno)));
              return;
             }
               //no puede finalizar despues la hora limite 
             if($horafin > strtotime($horamaximaturno)){
                $this->adderror('hfinal',yii::t('errvalid','No puede haber un evento que finalice despues  de las  {inicio} ',array('{inicio}'=>$horamaximaturno)));
               return;
             }
             //no puede haber un evento cuya duracion sumada a los eventos 
             //anteriores en el mismo turno ; exceda las hora del turno
              if($diferencia+$horasparadaacumulada > $horasturno){
                    $this->adderror('hfinal',yii::t('errvalid','Las horas de parada acumulada en este turno {acumuladas} y las horas de este evento {diferencia}, exceden las  {horasturno} horas  del turno  ',array('{acumuladas}'=>$horasparadaacumulada,'{diferencia}'=>$diferencia,'{horasturno}'=>$horasturno)));
               return;
              }
             
             //no puede haber eventos traslapados
              foreach($eventos as $filaevento){
                  if($filaevento->id <> $this->id){
                  if($horainicio >=$filaevento->fechamin($fecha) and 
                      $horainicio < $filaevento->fechamax($fecha)) {
                      $this->adderror('hinicio',yii::t('errvalid','{hora}  There is already an event "{evento}"  within this time frame {h1}  - {h2} ',array('{hora}'=>date('Y-m-d H:i:s',$horainicio),  '{evento}'=>$filaevento->descripcion,'{h1}'=>date('Y-m-d H:i',$filaevento->fechamin($fecha)),'{h2}'=>date('Y-m-d H:i',$filaevento->fechamax($fecha)))));
                       break;
                  }
                  if($horafin >=$filaevento->fechamin($fecha) and 
                      $horafin < $filaevento->fechamax($fecha)) {
                       $this->adderror('hfinal',yii::t('errvalid','{hora}  There is already an event "{evento}"  within this time frame {h1}  - {h2} ',array('{hora}'=>date('Y-m-d H:i:s',$horafin), '{evento}'=>$filaevento->descripcion,'{h1}'=>date('Y-m-d H:i',$filaevento->fechamin($fecha)),'{h2}'=>date('Y-m-d H:i',$filaevento->fechamax($fecha)))));
                       break;
                  }
                       }
              }
              
              
              //ahora relacionar con los horometros 
              if($diferencia + $elmayor  > $horasturno){
                    $this->adderror('hfinal',yii::t('errvalid','Las horas de parada acumulada en este turno {acumuladas} y las horas trabajadas + parada  {diferencia}, exceden las  {horasturno} horas  del turno  ',array('{acumuladas}'=>$diferencia,'{diferencia}'=>$elmayor,'{horasturno}'=>$horasturno)));
               return;
              }
              
           }
           
           public function search_por_detalle($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->addCondition("hidet=:vhidet");
                $criteria->params=array(":vhidet"=>$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        private function fechamin($fecha){
           return strtotime($fecha)+(strtotime($this->hinicio)-strtotime(date('Y-m-d')));
           // $horafin=strtotime($fecha)+(strtotime($this->hfinal)-strtotime(date('Y-m-d')));
                        
        }
        
        private function fechamax($fecha){
            //$horainicio=strtotime($fecha)+(strtotime($this->hinicio)-strtotime(date('Y-m-d')));
           return  strtotime($fecha)+(strtotime($this->hfinal)-strtotime(date('Y-m-d')));
                        
        }
           
}
