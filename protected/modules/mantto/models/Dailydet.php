<?php

/**
 * This is the model class for table "{{dailydet}}".
 *
 * The followings are the available columns in table '{{dailydet}}':
 * @property string $id
 * @property integer $hidparte
 * @property string $hidequipo
 * @property integer $hp
 * @property integer $hpp
 * @property integer $hmi
 * @property integer $hmf
 * @property integer $hmt
 * @property integer $hpi
 * @property integer $hpf
 * @property integer $hpt
 * @property string $dispo
 * @property string $util
 * @property integer $iduser
 *
 * The followings are the available model relations:
 * @property Dailywork $hidparte0
 * @property Inventario $hidequipo0
 */
class Dailydet extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{dailydet}}';
	}

        public $_horasturno;
         public $_horasparada=null;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('id,hidparte,hidequipo,hp,hpp,hps,hmi,hmf,hmt,hpi,hpf,hpt,dispo,util,np,ns,npp,ntt,hd,htt,htdb,iduser', 'safe', 'on'=>'update'),
		array('np,ns,ntt','numerical','integerOnly'=>true),
                  /*array('hp,hpp,hmi,hmt,hpi,hpf,hpt,np,ns,ntt,hd,htt', 'numerical',
                      'min'=>0,
                      'tooSmall'=>'You must enter values > 0',
                        //'tooBig'=>'You cannot order more than 250 pieces at once'
                    ),*/
                    
                  array('hp,hpp','checkhorasparada','on'=>'update'),
                  array('hmi,hmf','checkhorasmotor','on'=>'update'),
                    //array('hpi,hpf','checkhorasperfo','on'=>'update'),
                    
                    array('hidparte, hidequipo,codtipo,hmi,hmf,hpi,hpf', 'safe','on'=>'minimo'),
			array('hidparte, hidequipo', 'required'),
			//array('hidparte, hp, hpp, hmi, hmf, hmt, hpi, hpf, hpt, iduser', 'numerical', 'integerOnly'=>true),
			array('hidequipo', 'length', 'max'=>20),
			//array('dispo, util', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidparte, hidequipo, hp, hpp, hmi, hmf, hmt, hpi, hpf, hpt, dispo, util, iduser', 'safe', 'on'=>'search'),
		array('id, hidparte, hidequipo, hp, hpp, hmi, hmf, hmt, hpi, hpf, hpt, dispo, util, iduser,codparte', 'safe', 'on'=>'search_por_parte'),
		
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
                    //'machineswork' => array(self::BELONGS_TO, 'Machineswork', array('hidequipo'=>'hidinventario')),
                    'dailywork' => array(self::BELONGS_TO, 'Dailywork', 'hidparte'),
			'inventario' => array(self::BELONGS_TO, 'Inventario', 'hidequipo'),
                   	'dailyevents' => array(self::HAS_MANY, 'Dailyevents', 'hidet'), 
		'neventos' => array(self::STAT, 'Dailyevents', 'hidet'),
                    'nparadasint' => array(self::STAT, 'Dailyevents', 'hidet','condition'=>"t.tipmanoobra='I' "),
		'nparadasext' => array(self::STAT, 'Dailyevents', 'hidet','condition'=>"  t.tipmanoobra='E'  "),
		 'nparadasprog' => array(self::STAT, 'Dailyevents', 'hidet','condition'=>"t.tipmanoobra='P' "),
		
                    'nhorasparada' => array(self::STAT, 'Dailyevents', 'hidet','select'=>'sum(t.tiempopasado)'),
                    'nhorasparadainterna' => array(self::STAT, 'Dailyevents', 'hidet','select'=>'sum(t.tiempopasado)', 'condition'=>"t.tipmanoobra='I'"),
                    'nhorasparadaexterna' => array(self::STAT, 'Dailyevents', 'hidet','select'=>'sum(t.tiempopasado)', 'condition'=>"t.tipmanoobra='E'"),
		    'nhorasparadaprogramada' => array(self::STAT, 'Dailyevents', 'hidet','select'=>'sum(t.tiempopasado)', 'condition'=>"t.tipmanoobra='P'"),
                    'hultimaparada'=> array(self::STAT, 'Dailyevents', 'hidet','select'=>'max(t.hfinal)'),
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidparte' => 'Hiparte',
			'hidequipo' => 'Hidequipo',
			'hp' => 'BD (hr)',
			'hpp' => 'DS (hr)',
			'hmi' => 'H.M.o',
			'hmf' => 'H.M.f',
			'hmt' => 'Hmt',
			'hpi' => 'Hpi',
			'hpf' => 'Hpf',
                    'hd' => 'Av Hr',
			'hpt' => 'Hpt',
			'dispo' => '%Disp',
			'util' => '%Util',
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
		$criteria->compare('hidparte',$this->hidparte);
		$criteria->compare('hidequipo',$this->hidequipo,true);
		$criteria->compare('hp',$this->hp);
		$criteria->compare('hpp',$this->hpp);
		$criteria->compare('hmi',$this->hmi);
		$criteria->compare('hmf',$this->hmf);
		$criteria->compare('hmt',$this->hmt);
		$criteria->compare('hpi',$this->hpi);
		$criteria->compare('hpf',$this->hpf);
		$criteria->compare('hpt',$this->hpt);
		$criteria->compare('dispo',$this->dispo,true);
		$criteria->compare('util',$this->util,true);
		$criteria->compare('iduser',$this->iduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dailydet the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function search_por_parte($idparte)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		
		$criteria->addCondition("hidparte=:vhidparte");
$criteria->params=array(":vhidparte"=>$idparte);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                    'sort'=>array(
                'defaultOrder'=>'t.codtipo,t.hidequipo ASC',
            ),
		));
	}

        
      public function afterfind(){
          $this->refrescacampos();
          return parent::afterfind();
      }  
        
      public function beforesave(){
         
          $this->refrescacampos();
          return parent::beforesave();
      }  
        
      public function beforeValidate(){
           //para compensar la validacion de los horometros en banco
          if(is_null($this->hmf) or $this->hmf==0)              
              $this->hmf=$this->hmi;
          if(!$this->isNewRecord)
            if($this->inventario->tienecarter=='1')
          if(is_null($this->hpf) or $this->hpf==0)              
              $this->hpf=$this->hpi;
           return parent::beforeValidate();
      }
      
     public function gethorasparada(){
         $valor=$this->nhorasparada;
         return is_null($valor)?0:$valor;
     }
      
        
      public function  horasdisponibles(){
          //horas de prod del turno - (horas parada breakdown + horas parada programadas)
          return round($this->gethorasturno()-($this->gethorasparada() /*+$this->hpp*/),2);
          
      }  
      
      public function  horasmotor(){
          //HOormeto fi9nal del turno -horometro nicio turno del motor
          return round($this->hmf-$this->hmi,2);
          
      }  
      
       public function  horasperfo(){
          //HOormeto fi9nal del turno -horometro nicio turno de la perforadora
           if($this->isNewRecord){
               $tienecontrol= Inventario::model()->findByPk($this->hidequipo)->tienecarter;
           }else{
               $tienecontrol= $this->inventario->tienecarter;
           }
           //var_dump(round(is_null($this->hpf)?0:$this->hpf-is_null($this->hpi)?0:$this->hpi,2));die();
           //var_dump($this->hpf); var_dump($this->hpi);
              if($tienecontrol=='1') {
                  $x1=is_null($this->hpi)?0:(double)$this->hpi;
                   $x2=is_null($this->hpf)?0:(double)$this->hpf;
                  /* $x1=(double)$this->hpi;
                   $x2=(double)$this->hpf;
                   var_dump($x2);var_dump($x1);
                    var_dump(round($x2-$x1,2));*/
                return round($x2-$x1,2);
                
              }
               
              return 0;
          
      }  
      
      
       
       public function  porcdispo(){
          //didspnibilidad del turno
           if($this->gethorasturno() >0)
          return round($this->horasdisponibles()/$this->gethorasturno(),2);
          return 0;
      }  
      
      public function porcutil(){
          if($this->gethorasturno() >0)
              return round(($this->horasmotor()+$this->horasperfo())/($this->gethorasturno ()),2);
          return 0;
      }
         
      public function nparadastotales(){
          $this->np=$this->nparadasint;
           $this->ns=$this->nparadasext;
          if(is_null($this->np) or empty($this->np))
              $this->np=0;
          if(is_null($this->ns) or empty($this->ns))
              $this->ns=0;
          
          return $this->ns+$this->np;
      }
      
      /*rellena los campos calculados del modelo*/
      public function refrescacampos(){
          $this->hp=$this->nhorasparadainterna; //horas parada por mo interna o break dowwna
          $this->hpp=$this->nhorasparadaprogramada; //hora spdara programada precheck
           $this->hps=$this->nhorasparadaexterna; //horas prada por servicios
           $this->hd=$this->horasdisponibles();
          $this->hmt=$this->horasmotor();
           $this->hpt=$this->horasperfo();
           $this->tbd=$this->gethorasparada();//horas de parada total
           $this->np=$this->nparadasint;
           $this->ns=$this->nparadasext;
           $this->npp=$this->nparadasprog;
           $this->npp=$this->ns+$this->np+$this->npp;///veces parada servicio+veces parada interno, +veces parada programnada
          $this->ntt=$this->nparadastotales();
           $this->htt=$this->horasmotor()+$this->horasperfo();
          $this->dispo=$this->porcdispo();
           $this->util=$this->porcutil();
      }
      
      pUBLIC function gethorasturno(){
         if(!$this->isNewRecord){
          if(is_null($this->_horasturno) or empty($this->_horasturno) or $this->_horasturno==0){
            $this->_horasturno=$this->dailywork->regimen->horasdia+0;
               
          }else{
             
          }
             
            return $this->_horasturno;
      }else{
         return 0; 
      }
      }
      
       /**************************
	 * Checkea que las horas de parada san consisitenes con el turno 
         * y los valores depèndientes de hp, hpp 	
	 */
	public function checkhorasparada($attribute,$params) {
            $this->refrescacampos();
           if($this->hp+0 > $this->gethorasturno())
               $this->adderror('hp',yii::t('errvalid','El valor del campo "{campo}" = "{valorcampo}"  ',array('{valorcampo}'=>$this->hp,'{campo}'=>$this->getAttributeLabel('hp'))).yii::t('errvalid','es mayor que {valref}',array('{valref}'=>$this->gethorasturno())));
            if($this->hpp+0 >$this->gethorasturno())
               $this->adderror('hpp',yii::t('errvalid','El valor del campo "{campo}" = "{valorcampo}"  ',array('{valorcampo}'=>$this->hpp,'{campo}'=>$this->getAttributeLabel('hpp'))).yii::t('errvalid','es mayor que {valref}',array('{valref}'=>$this->gethorasturno())));
            if($this->hp+$this->hpp > $this->gethorasturno())
               $this->adderror('hp',yii::t('errvalid','Los campos  "{campo}" = "{valorcampo} y  "{campo1}" ="{valorcampo1}"  ',array('{valorcampo1}'=>$this->hpp,'{campo1}'=>$this->getAttributeLabel('hpp'),'{valorcampo}'=>$this->hp,'{campo}'=>$this->getAttributeLabel('hp'))).yii::t('errvalid','es mayor que {valref}',array('{valref}'=>$this->gethorasturno())));
              return;  
           }
           
        public function checkhorasperfo($attribute,$params) {
            $this->refrescacampos();
          /* if($this->hpi+0 >$this->gethorasturno())
               $this->adderror('hpi',yii::t('errvalid','El valor del campo "{campo}" = "{valorcampo}"  ',array('{valorcampo}'=>$this->hpi,'{campo}'=>$this->getAttributeLabel('hpi'))).yii::t('errvalid','es mayor que {valref}',array('{valref}'=>$this->gethorasturno())));
            if($this->hpf+0 >$this->gethorasturno())
               $this->adderror('hpf',yii::t('errvalid','El valor del campo "{campo}" = "{valorcampo}"  ',array('{valorcampo}'=>$this->hpf,'{campo}'=>$this->getAttributeLabel('hpf'))).yii::t('errvalid','es mayor que {valref}',array('{valref}'=>$this->gethorasturno())));
            */
            if($this->hpt+0 >$this->gethorasturno())
               $this->adderror('hpt',yii::t('errvalid','El valor del campo "{campo}" = "{valorcampo}"  ',array('{valorcampo}'=>$this->hpt,'{campo}'=>$this->getAttributeLabel('hpt'))).yii::t('errvalid','es mayor que {valref}',array('{valref}'=>$this->gethorasturno())));
            
            if($this->hpi+0 >0 and $this->hpf+0 >0){
               if($this->hpi+0 > $this->hpf+0)
               $this->adderror('hpf',yii::t('errvalid','El valor del campo "{campo}" = "{valorcampo}"  ',array('{valorcampo}'=>$this->hpi,'{campo}'=>$this->getAttributeLabel('hpi'))).yii::t('errvalid','es mayor que {valref}',array('{valref}'=>$this->hpf)));
              
                if($this->htt+0 >$this->gethorasturno())
               $this->adderror('htt',yii::t('errvalid','El valor del campo "{campo}" = "{valorcampo}"  ',array('{valorcampo}'=>$this->htt,'{campo}'=>$this->getAttributeLabel('htt'))).yii::t('errvalid','es mayor que {valref}',array('{valref}'=>$this->gethorasturno())));
            
            }
            
            
           }   
           
            public function checkhorasmotor($attribute,$params) {
                     
             
             if(!is_null($this->hmi) and !is_null($this->hmf)){
              
                 
              /*
               * Este pesazo de codigo se evalua siempre y cuando se haya activado la 
               * la restriccion en la configuracion del docmuento partes de operatividad
               */
                 $centro=$this->dailywork->ot->codcen;
             if(Configuracion::valor(Dailywork::COD_DOCU, $centro,'1125')=='1'){
                //no puede llenarse un horoemtor de inicio sin haber 
               //haber llenado el horometor  final del turno anterior
              $lecturaanthmi= $this->getHorometroAnterior('hmf');
              if($lecturaanthmi==-1) {//si no se ha llenado el horometro hmf del registro anterior
                 $this->adderror('hmi',yii::t('errvalid','In the previous document, there is a value {hmf} that has not been entered. This value must be filled first',array('{hmi}'=>$this->getAttributeLabel('hmi'))));
                return;
                 }
               //no puede haber horometro en retroceso
               if($this->hmi < $lecturaanthmi){
               $this->adderror('hmi',yii::t('errvalid','There XX is a horometer {lecturaprevia} with greater value {lectura} in the previous document',array('{lecturaprevia}'=>$lecturaanthmi,'{lectura}'=>$this->hmi)));
               return;}
               
               //no puede haber horometro final mayor que el horometro inicial del documento siguiente
               $lecturasiguiente= $this->getHorometroSiguiente('hmi');
               //echo $lecturasiguiente;die();
               if($this->hmf > $lecturasiguiente){
               $this->adderror('hmf',yii::t('errvalid','There XXi is a horometer {lecturaprevia} with less value {lectura} in the next document',array('{lecturaprevia}'=>$lecturasiguiente,'{lectura}'=>$this->hmf)));
               return;}
               
              }
              /*------fin del fragmento 
               * Hasta aqui el resto es geeneral
               * ------------------------
               */
              
                 //el horoemtrop final no puede ser menor al inicial 
                 if($this->hmi > $this->hmf){
               $this->adderror('hmf',yii::t('errvalid','El valor del campo "{campo}" = "{valorcampo}"  ',array('{valorcampo}'=>$this->hmi,'{campo}'=>$this->getAttributeLabel('hmi'))).yii::t('errvalid','es mayor que {valref}',array('{valref}'=>$this->hmf)));
                 return;}
                
                 //$this->refrescacampos();
                //analizando los campos de horometros aicinal de peroforacion
                 if($this->inventario->tienecarter=='1'){
                      if(!is_null($this->hpi) and !is_null($this->hpf))
                                {
                           /*
               * Este pesazo de codigo se evalua siempre y cuando se haya activado la 
               * la restriccion en la configuracion del docmuento partes de operatividad
               */
             if(Configuracion::valor(Dailywork::COD_DOCU, $centro,'1125')=='1'){
                           //no puede llenarse un horoemtor de inicio sin haber 
                            //haber llenado el horometor  final del turno anterior
                                $lecturaanthmi= $this->getHorometroAnterior('hpf');
                                    if($lecturaanthmi==-1) {//si no se ha llenado el horometro hmf del registro anterior
                                                     $this->adderror('hpi',yii::t('errvalid','In the previous document, there is a value {hmf} that has not been entered. This value must be filled first',array('{hmi}'=>$this->getAttributeLabel('hpi'))));
                                                     return;
                                                    }
                                                            //no puede haber horometro en retroceso
                                        if($this->hpi < $lecturaanthmi){
                                                $this->adderror('hpi',yii::t('errvalid','There is a BH horometer {lecturaprevia} with greater value {lectura} in the previous document',array('{lecturaprevia}'=>$lecturaanthmi,'{lectura}'=>$this->hpi)));
                                                        return;
                                                    }
                                                    
                 //no puede haber horometro final mayor que el horometro inicial del documento siguiente
               $lecturasiguiente= $this->getHorometroSiguiente('hpi');
               if($this->hpf > $lecturasiguiente){
               $this->adderror('hpf',yii::t('errvalid','There XXiu is a horometer {lecturaprevia} with less value {lectura} in the next document',array('{lecturaprevia}'=>$lecturasiguiente,'{lectura}'=>$this->hpf)));
               return;}                                
                                                    
             }/*------fin del fragmento 
               * Hasta aqui el resto es geeneral
               * ------------------------
               */
                                                //el horoemtrop final no puede ser menor al inicial 
                                        if($this->hpi > $this->hpf){
                                             $this->adderror('hpf',yii::t('errvalid','El valor del campo "{campo}" = "{valorcampo}"  ',array('{valorcampo}'=>$this->hpi,'{campo}'=>$this->getAttributeLabel('hpi'))).yii::t('errvalid','es mayor que {valref}',array('{valref}'=>$this->hpf)));
                                                return;
                                                    }
                                             
                                       
                                                    
                                                    
                
                                     }else{
                                            $this->adderror('hpt',yii::t('errvalid','The ss data of the meter hours must be complete'));
                
                                    }
                     
                 }
                 $this->refrescacampos();
                 $elmayor=0;
                 if($this->inventario->tienecarter=='1'){
                     $horastotales=$this->hmt+$this->tbd;//horas totales de trabajo con motor+paradas
                     $horastotales1=$this->hpt+$this->tbd;//horas totales de trabajo con perforadora+paradas
                     $elmayor=max($horastotales,$horastotales1);
                     /*  echo "this->hpi ".$this->hpi."<br>";
                        echo "this->hpf".$this->hpf."<br>";
                   echo "this->hmt ".$this->hmt."<br>";
                   echo "this->tbd ".$this->tbd."<br>";
                    echo "this->hpt ".$this->hpt."<br>";                     
                     echo "horastotales ".$horastotales."<br>";
                     echo "horastotales1 ".$horastotales1."<br>";
                    die();*/
                 }else{
                    $elmayor=$this->hmt+$this->tbd;//horas totales de trabajo de motor + horas de parada total total
                 }
                 
                //$centro=$this->dailywork->ot->codcen;
             $tolerancia=Configuracion::valor(Dailywork::COD_DOCU, $centro,'1123');
             $tolerancia=(is_null($tolerancia))?0:$tolerancia+0;
                 
             
                 
                 //El tiemppo de trabajo (horometros) mas los break downs no pueden ser mayores a las horas del turno
                 if($elmayor >$this->gethorasturno()+$tolerancia){
               $this->adderror('hmt',yii::t('errvalid','The meter hours difference  added to the break down hours ({parada}), is greater than the hours ({turno}) of the shift ',array('{parada}'=>$this->tbd   ,'{turno}'=>$this->gethorasturno())));
              return;
                 }
               //El tiempo de trabajo  mas llas hroas de hroometro no pueden menores al turno 
                 if($elmayor +$tolerancia < $this->gethorasturno()){
               $this->adderror('hmt',yii::t('errvalid','The meter hours difference  added to the break down hours ({parada}), is less than the hours ({turno}) of the shift ',array('{parada}'=>$this->tbd   ,'{turno}'=>$this->gethorasturno())));
                  return;
                 }
                 
                 
                 
                 //Si elq equipo no puede descansar; los horometros tineen que haber corrido
                 /// noo puede haber descanso 
                 $verifica=false;
               if($this->inventario->tienecarter=='1'){
                   //equipos con dos horometros 
                   if($this->hmt==0 and $this->hpt==0)
                       $verifica=true;                       
               }else{
                   if($this->hmt==0)
                       $verifica=true;                        
               }
               if($verifica)
               if(!$this->canRest()){
                   $this->adderror('hidequipo',yii::t('errvalid','The meter hours difference is zero. Machine {maquina} can not rest ',array('{maquina}'=>$this->inventario->codigoaf)));
                   return;
               }
                
               
               
                 
               
                
            }   else{
               $this->adderror('hmt',yii::t('errvalid','The data of the meter hours must be complete'));
              
            }
            
           }    
      
        public function color(){
                return 1;
            }
            
       
           //DEVUELVE EL HOROMETRO INMEDIATO ANTERIOR (A NIVEL DE REGISTRO, ES DECIR NO COMPARA 
           // HOROMETRO FINAL VS  INICIAL
            //
        public function getHorometroAnterior($nombrecampo,$fechax=null){
           // echo"hola";die();
            
            if(in_array($nombrecampo,$this->attributeNames())){
            //BUSCANDO EL REGISTRO Inmediato anterior
             if(!$this->isNewRecord){
                 $fecha=$this->cambiaformatofecha($this->dailywork->fecha,false);
             }else{
                 if(is_null($fechax)){
                     $fecha=$this->cambiaformatofecha(Dailywork::model()->findByPk($this->hidparte)->fecha,false);
                 }else{
                     $fecha=$fechax;
                 }
                 
             }
             //var_dump($fecha);die();
                $nombrecampo= str_replace("'", "", $nombrecampo);
                $nombrecampo= str_replace('"', '', $nombrecampo);
            $maximo=yii::app()->db->createCommand()->select('max('.$nombrecampo.')')
              ->from('vw_parteopdetalle')->
                    where("fecha <=:vfecha and hidequipo=:vhidequipo and hidparte < :vid",
                            array(":vid"=>$this->hidparte, ":vhidequipo"=>$this->hidequipo,":vfecha"=>$fecha))
            ->order("hidparte desc")->limit(1)->queryScalar();
            if($maximo !=false){
                if(is_null($maximo))
                    return -1;
                //if($maximo==$this->hmf)
                 return ($maximo);
            }else{
                
               return 0;
            }
            }else{
                echo "error";
             //throw new CHttpException(500,'The property {propiedad} doesn\'t exists ',array('{propiedad}'=>$nombrecampo));   
            }
            
        }
            
      public function getHorometroSiguiente($nombrecampo,$fechax=null){
           // echo"hola";die();
            
            if(in_array($nombrecampo,$this->attributeNames())){
            //BUSCANDO EL REGISTRO Inmediato SIGUIENTE
             if(!$this->isNewRecord){
                 $fecha=$this->cambiaformatofecha($this->dailywork->fecha,false);
             }else{
                 if(is_null($fechax)){
                     $fecha=$this->cambiaformatofecha( Dailywork::model()->findByPk($this->hidparte)->fecha,false);
                 }else{
                     $fecha=$fechax;
                 }
                 
             }
                $nombrecampo= str_replace("'", "", $nombrecampo);
                $nombrecampo= str_replace('"', '', $nombrecampo);
                
            $minimo=yii::app()->db->createCommand()->select($nombrecampo)
              ->from('vw_parteopdetalle')->
                    where("fecha >=:vfecha and hidequipo=:vhidequipo and hidparte > :vid",
                            array(":vid"=>$this->hidparte, ":vhidequipo"=>$this->hidequipo,":vfecha"=>$fecha))
            ->order("hidparte asc")->limit(1)->queryScalar();
            if($minimo !=false){
                //var_dump($minimo);
                if(is_null($minimo))
                    return -1;
                if($minimo==0)
                    return 10000000;
                 return ($minimo);
            }else{
               return 10000000; //un valor muy grande
            }
            }else{
                echo "error";
             //throw new CHttpException(500,'The property {propiedad} doesn\'t exists ',array('{propiedad}'=>$nombrecampo));   
            }
            
        }
    
     public function getMachineWork(){
       if(!$this->isNewRecord)
         $idot=$this->dailywork->getOt();
        return  Machineswork::model()->find(
                 "hidinventario=:vhidinventario and hidot=:vhidot",
                 array(":vhidinventario"=>$this->hidequipo,
                     ":vhidot"=>$idot,
                     ));
        return null;         
         
     }
     
     public function canRest(){
         $registro=$this->getMachineWork();
         if(!is_null($registro))
                 return ($registro->condescanso=='1')?true:false;
         
         return false;
     }
        
}
 