<?php

/**
 * This is the model class for table "{{asisobra}}".
 *
 * The followings are the available columns in table '{{asisobra}}':
 * @property string $id
 * @property integer $hidreg
 * @property string $calific
 * @property string $hidlibro
 * @property string $codtra
 * @property string $hingreso
 * @property string $hsalida
 * @property string $codtipo
 *
 * The followings are the available model relations:
 * @property Libroobra $hidlibro0
 * @property Trabajadores $codtra0
 */
class Asisobra extends ModeloGeneral
{
	
    
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{asisobra}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                     array('hidlibro,codtra,codtipo,hingreso,montodiario,montoextras,montodominical','safe','on'=>'masivo'),
			array('hidlibro,codtra,hingreso,hsalida', 'required','on'=>'insert,update'),
			//array('hidreg', 'numerical', 'integerOnly'=>true),
			//array('calific', 'length', 'max'=>3),
			//array('hidlibro', 'length', 'max'=>20),
			//array('codtra, hingreso, hsalida', 'length', 'max'=>5),
			//array('codtipo', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,hidlibro,codtra,hingreso,hsalida,codtipo', 'safe', 'on'=>'search'),
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
			'libroobra' => array(self::BELONGS_TO, 'Libroobra', 'hidlibro'),
			'trabajadores' => array(self::BELONGS_TO, 'Trabajadores', 'codtra'),
		      // 'regimen'=>array(self::BELONGS_TO, 'Regimen', 'hidreg'),
                        'grupoplan'=>array(self::BELONGS_TO, 'Grupoplan', array('codcen'=>'codcen','calific'=>'codgrupo')),
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidreg' => 'Hidreg',
			'calific' => 'Calific',
			'hidlibro' => 'Hidlibro',
			'codtra' => 'Codtra',
			'hingreso' => 'Hingreso',
			'hsalida' => 'Hsalida',
			'codtipo' => 'Codtipo',
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
		$criteria->compare('hidreg',$this->hidreg);
		$criteria->compare('calific',$this->calific,true);
		$criteria->compare('hidlibro',$this->hidlibro,true);
		$criteria->compare('codtra',$this->codtra,true);
		$criteria->compare('hingreso',$this->hingreso,true);
		$criteria->compare('hsalida',$this->hsalida,true);
		$criteria->compare('codtipo',$this->codtipo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Asisobra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
    public static function datostipo(){
            return array('10'=>'ASISTENCIA NORMAL','20'=>'INASISTENCIA','30'=>'LICENCIA');
        }
public static function getCodTipo(){
    $claves=array_keys(self::datostipo());
            return $claves[1]; //INASITENCIA
        }
        
        public static function getCodTipoInasistencia(){
    $claves=arry_keys(self::datostipo());
            return $claves[1]; //INASITENCIA
        }
        
   public static function getRegimen(){
      if((Regimen::model()->findAll()[0]->id)>0)
          return Regimen::model()->findAll()[0]->id;
      throw new CHttpException(500,'NO hay registro en la tabla regimen llenelos por favor  '.$id);     
                    
  } 
  
  public function search_por_libro($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->addCondition("hidlibro=".$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
  public function horastrabajadas(){
      if(is_null($this->hingreso) and is_null($this->hsalida)){
          return 0;
      }elseif(is_null($this->hingreso) and !is_null($this->hsalida)){
          return 0;
      }elseif(!is_null($this->hingreso) and is_null($this->hsalida)){
          return 0;
      }elseif(!is_null($this->hingreso) and !is_null($this->hsalida)){
          //var_dump($this->hsalida);
         
          return  yii::app()->periodo->diferenciahoras($this->hingreso,$this->hsalida);
      }else{
          return 0;
      }
  }  
  
   
  
  
  public function horasnormales(){
      if($this->horastrabajadas() <= $this->libroobra->detot->regimen->horasdia)
        return  $this->horastrabajadas();
    else {
        return $this->libroobra->detot->regimen->horasdia;
    }
      /*if(is_null($this->hingreso) and is_null($this->hsalida)){
          return 0;
      }elseif(is_null($this->hingreso) and !is_null($this->hsalida)){
          return 0;
      }elseif(!is_null($this->hingreso) and is_null($this->hsalida)){
          return 0;
      }elseif(!is_null($this->hingreso) and !is_null($this->hsalida)){
          //var_dump($this->hsalida);
        if($this->libroobra->esnolaborable=='1'){
            return $this->horastrabajadas();
        }else{
            if(yii::app()->periodo->verificahoras($this->libroobra->hfinal,$this->hsalida)){
                return yii::app()->periodo->diferenciahoras($this->libroobra->hfinal,$this->hsalida);
    
            }else{
                return 0;
            }
             
        }
      }else{    
          
          return 0;
      }*/
      
  }
   public function horasextras(){
     if($this->horastrabajadas() <= $this->libroobra->detot->regimen->horasdia)
        return  0;
    else {
        return $this->horastrabajadas()-$this->libroobra->detot->regimen->horasdia;
        }
        //return $this->libroobra->detot->regimen->horasdia;
   }
   
  
   
   
  public static function getTotalHoras($provider)
	{
		//$descuento=$this->ocompra->descuento/100;
		$totalhoras=0;
                $totalhorasextras=0;
		$horas=0;
                $horasextras=0;
		foreach($provider->data as $data)
		{
			if (self::getCodTipo()==$data->codtipo)
			{				
				$totalhorasextras += $data->horasextras();
				$totalhoras += $data->horastrabajadas();
			}
		}
		return array('horasextras'=>$totalhorasextras,'horas'=>$totalhoras);
	}
        
        
    public function costodianormal()    {
        if($this->libroobra->esnolaborable=='1'){//si esdomeingo 
            
            return 0;
            /*return round($this->horastrabajadas()*$this->grupoplan->tarifamonedadef()
                    *(1+$this->regimen->porcdom/100),2);  */
        }else{
            
            
            return round($this->horasnormales()*$this->grupoplan->tarifamonedadef(),2);  
        }
      
    }
    
    
    public function costodiaextra()    {
        if($this->libroobra->esnolaborable=='1'){//si esdomeingo 
            return round($this->horastrabajadas()*$this->grupoplan->tarifamonedadef()
                    *(1+$this->regimen->porcdom/100),2);  
        }else{
            return round($this->horasextras()*$this->grupoplan->tarifamonedadef()*(1+$this->regimen->porcextras/100),2);  
        }
      
    }
    
    //cALCULA LA FRACCION HORA DEL DOMINICAL para agregarla como el domingo acumulable por dia
    //PARA ELLO DIVIDE LAS (8?? ) horas entre los 5 o 6 dias laborables
    public function costodominicalhora()    { //
        //verifica si el regimen trabaja sabados 
        if($this->regimen->dias > 5.5 ) //si se trabaja sabados
        {
            $diassemana=6; //Lunes, martes...sabado
        }else{
           $diassemana=5; //Lunes , martes,...viernes  
        }
         if(date('w',strtotime($this->libroobra->fecha))=='7'){//si esdomeingo 
           return 0; 
        }else{
        return round($this->libroobra->detot->regimen->horasdia/$diassemana,2);
    }
    }
    
    
    private function getTarifaNormal(){
        
    }
    private function getTarifaExtras(){
        
    }
    private function getTarifaNoLaborable(){
        
    }
    
    public function costodiaextras()    {
        
    }
  
    //checkea si un trabajador puede estar en dos o mas obras siempre que sus horarios no se traslapen
    public function checkduplicidad($attribute,$params) {
        //ENCONTRADNO LOS OTROS REGISTROS EN LA MISMA FECHA , LAS OBRAS EN LAS QUE HA ESTADO 
        if(!is_null($this->hsalida)){
             $fecha=$this->libroobra->fecha;        
                     $filas=Yii::app()->db->createCommand()
			->select('b.hingreso,b.hsalida')
			->from('{{libroobra}} a, {{asisobra}} b')
			->where('a.id=b.hidlibro and b.codtra=c.codtipo and:vcodtra and a.fecha=:vfecha and a.id <> :vid',array(":vid"=>$this->libroobra->id,":vfecha"=>$fecha,":vcodtra"=>$this->codtra))
			//->group('a.codalm,  a.codcen')
			->queryAll();
        if(count($valor)>0){
            foreach($filas as $fila){
                  if(is_null($fila['hsalida'])){ //si esta abierto no pasa nada , seguro l han aegado por agregar 
                       
                  }else{//si aya esta ppgramado ahi si hay chicha
                     if(!(yii::app()->periodo->verificahoras($this->inicio,$fila['hsalida'])
                             or
                          yii::app()->periodo->verificahoras($this->hsalida,$fila['hinicio'])   
                             )){ ///comparando que no exista traslape de horas 
                        
                            $this->adderror("hsalida","Existe otra programacación para este trabajador que TRASLAPA el horario especificado ".$this->libro);return;
                               }
                       
                  }
                       
                                }
                        }            
        }      
        
    }
    ///OBTIENE LA TARIFA DE ACUERDO A LA CALIFICACION DE LA MANO DE OBRA POR HORA
    //// de la tabla GRUPO PLAN
    private function getTarifa(){
        //obteniendo el ESCENARIO, OFICIO, Y EL CENTRO , el factor fiesta (doble o triple feridos uy domingos)
        // y   EL PORCENTAJE ADICIONAL PARTICULAR DE CADA OBRERO
        $escenar=$this->libroobra->orden->escenario;
        $codgrupo=$this->trabajadores->codpuesto;
        $centr=$this->libroobra->orden->codcen;
        $porcad=$this->trabajadores->porcadicional;
        //calculando la tarifa del dia 
        $factorfiesta=($this->esfiesta())?$this->libroobra->detot->regimen->facdominical:1;        
        $croterio=New CDBcriteria();
        $croterio->addCondition("codgrupo=:pcodgrupo and codcen =:pcodcen"
                . " and escenario =:pescenario");
                $croterio->params=array(":pcodgrupo"=>$codgrupo,
                    ":pcodcen"=>$centr,":pescenario"=>$escenar);
        
        //hallando el registro de la tarifa
        $gru=Grupoplan::model()->find($croterio);
        if(is_null($gru)){
            return -1;
        }else{
            IF(is_null($porcad) or empty($porcad))
                $porcad=0;
            
            return round($gru->tarifamonedadef()*$factorfiesta*(1+$porcad/100),3);
        }
       
    }
    
    //funcion para saber si es fiesta 
    private function esfiesta(){
         if(date('w',strtotime($this->libroobra->fecha))=='7' or 
               $this->libroobra->esnolaborable=='1'  ){//si esdomeingo 
           return true; 
        }else{
        return false;
    }
    }
    
    
    ///calcula el jornal diario 
    public function jornaldiario(){
        
        //la tarifa hora
         $tarifahora=$this->getTarifa();
         
        
            //costo dominical
        $this->montodominical=$this->costodominicalhora()*$tarifahora;
        
        ///Si hubo alguna gratificacion de horas para esta persona en este dia
        $gratificacion=is_null($this->bonificacion)?0:$this->bonificacion;
       
        //horas trabajadas normales
        $this->montodiario=($this->horasnormales()+$gratificacion)*$tarifahora;
        
        ///horas extras
        $this->montoextras=$this->horasextras()*$tarifahora;
        return 1;
        
    }
    
    public function beforeSave(){
       /* $this->montodiario=$this->costodianormal();
         $this->montoextras=$this->costodiaextra();
          $this->montodominical=$this->costodominical();*/
        if($this->cambiocampo('codtra') or $this->cambiocampo("hingreso") or $this->cambiocampo("hsalida"))
        $this->jornaldiario();
        return parent::beforesave();
    }
}