<?php

class Procesosdocu extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{procesosdocu}}';
    }

    
    //public $codtefalsa; //7ATRIBUTO DE L ACODRTEENCIA PARA VALIDAR EL FORM MASIVO NADA MAS 
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            
            ///Escenario para proceso masivo   MASIVO
             array('hidproc,hidtra,fechanominal,codte','required','on'=>'masivo'),
             array('hiddoci,hidproc,hidtra,fechanominal,codte,codocuref,numdocref','safe','on'=>'masivo'),
            array('fechanominal','chkfecha','on'=>'masivo,insert,update,documentosreferencia'),
            
            
            //escenaripo solo para cambiar documentos y numero de referencia 
              array('codocuref,numdocref','required','on'=>'documentosreferencia'),
            
            array('codocuref,numdocref','safe','on'=>'documentosreferencia'),
            
            
             array('hiddoci,hidproc','required', 'on'=>'insert,update'),
            array('fechafinal','safe','on'=>'fechafinal'),
            array('hidproc','chkrequisitos' ,'on'=>'insert,update,cambiotenencia'),
            array('hiddoci,'
                . ' fechanominal,'
                . ' hidtra, hidproc'
                , 'required', 'on'=>'insert,cambiotenencia'),
            array('id, hiddoci, fechanominal,fechafin,iduser, hidtra, hidproc, codocuref, numdocref,codte', 'safe', 'on'=>'insert,update,cambiotenencia'),
            array('id, hiddoci,'
                . ' fechacrea, fechanominal,'
                . ' hidtra, hidproc'
                , 'safe', 'on'=>'rapido'),
            
           // array('id, hiddoci, fechacrea, fechanominal, hidtra, hidproc, codocuref', 'required'),
            array('hiddoci, hidtra, hidproc', 'numerical', 'integerOnly'=>true),
            // array('hiddoci+hidtra+hidproc', 'application.extensions.uniqueMultiColumnValidator','on'=>'insert,update,cambiotenencia'),
		
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, hiddoci, fechacrea, fechanominal, hidtra, hidproc, codocuref, numdocref', 'safe', 'on'=>'search'),
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
            'docingresados' => array(self::BELONGS_TO, 'Docingresados', 'hiddoci'),
            'tenenciasproc' => array(self::BELONGS_TO, 'Tenenciasproc', 'hidproc'),
            'tenenciastrab' => array(self::BELONGS_TO, 'Tenenciastraba', 'hidtra'),
            'documentos'=> array(self::BELONGS_TO, 'Documentos', 'codocuref'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'hiddoci' => 'Hiddoci',
            'fechacrea' => 'Fechacrea',
            'fechanominal' => 'Fechanominal',
            'hidtra' => 'Hidtra',
            'hidproc' => 'Hidproc',
            'codocuref' => 'Codocuref',
            'numdocref' => 'Numdocref',
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
        $criteria->compare('hiddoci',$this->hiddoci);
        $criteria->compare('fechacrea',$this->fechacrea,true);
        $criteria->compare('fechanominal',$this->fechanominal,true);
        $criteria->compare('hidtra',$this->hidtra);
        $criteria->compare('hidproc',$this->hidproc);
        $criteria->compare('codocuref',$this->codocuref,true);
        $criteria->compare('numdocref',$this->numdocref,true);

        return new CActiveDataProvider($this, array(
            
        ));
    }

    public function search_por_docu($id)
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        
        $criteria->addCondition("hiddoci=".$id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'criteria'=>$criteria,
            'sort'=>array(
            'defaultOrder'=>'id desc',
        ),
        ));
    }
    
    
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Procesosdocu the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    
    public function beforesave(){
        if($this->isNewRecord){
            $esfinal= Tenenciasproc::model()->findByPk($this->hidproc)->final;
            
            if($esfinal=='1') //si es un proceso final hay que matar el proceso
                $this->fechafin=date("Y-m-d H:i:s"); 
            
             $this->fechacrea=date("Y-m-d H:i:s");
                $this->iduser=yii::app()->user->name;
                $procesoactual= Docingresados::model()->findByPk($this->hiddoci)->procesoactivo[0];
                MiFactoria::mensaje('error',' procesosdocu -beforesave El id del proceso activo      '.$procesoactual->id.'  el  id del doci '.$procesoactual->hiddoci);
                if(!is_null( $procesoactual) ){ // ..y mataer el proceso anterior tambien
                    $procesoactual->setScenario("fechafinal");
                  $procesoactual->fechafin=date("Y-m-d H:i:s"); 
                  $procesoactual->save();
                  MiFactoria::mensaje('error',' procesosdocu -beforesave  se coloco fecha fin , se coloco escenario fechafinal  ');
                
                  
                }else{
                    MiFactoria::Mensaje('error','procesosdocu -beforesave  no existe proceso actual');
                }
                
        }
       
        return parent::beforesave();
    }
    
    public function horaspasadas(){
        
        $diferencia=time()-strtotime($this->fechacrea.'');
       // var_dump($diferencia);die();
        return round($diferencia/3600,2);
    }
    
    
    /* Esta funcio nverifica si para este nuevo proceso hay un resquisito de 
     * no s epude procesar asi por asi, x ejemplo para asignar OT dbe de haber un procesao previo de 
     * de FIRMA O aprobaCION 
     */
    private function cumplerequisitoprevio(){
        if($this->isNewRecord){
            //El proceso que s equiere efectuar 
            $teneproaefectuar= Tenenciasproc::model()->findByPk($this->hidproc);
            //el proceso actual
            $teneproactual= Docingresados::model()->findByPk($this->hiddoci)->procesoactivo[0]->tenenciasproc;
             //comparadnod si es requisito 
           //  var_dump($proactual->tenenciasproc);die();
             if($teneproaefectuar->hidprevio >0) //si tiene requisito 
             {
               //  var_dump($teneproactual);
                // var_dump($teneproaefectuar);
                 return ($teneproactual->id==$teneproaefectuar->hidprevio)?true:false;
             }else{//SI NOHAY REQUSITO COMO SI LAS HUEVAS
                RETURN  true;
             }
                 
            
        }else{
            /*if($this->tenenciasproc->hidprevio > 0) //si tiene requisito
            {
               return ($this->docingresados->procesoactivo[0]->tenenciasproc->hidprevio==$this->tenenciasproc->hidevento)?true:false;
              
            }else{*/
               return true; 
           /* }*/
        }
    }
    
    
    
    private function trabajadorestaentenencia(){
        //verificams q1ue el nuevo trabajador este en lanueva tenencia
        
       
        
        
      
    }
    
    private function procesovalidotenencia(){
        //verificams q1ue el nuevo trabajador este en lanueva tenencia
        
        
        
        //verificamos que la nueva tenencia ten
    }
    
    
    public function chkrequisitos($attribute,$params) {
           $cumple=$this->cumplerequisitoprevio();
		if(!$cumple){
                    
                    $requisito= Eventos::model()->findByPk(
                                                            Tenenciasproc::model()->findByPk(
                                                                                            Tenenciasproc::model()->findByPk($this->hidproc)->hidprevio
                                                                                            )->hidevento
                                                        )->descripcion;
                    /* var_dump( Tenenciasproc::model()->findByPk(
                               Tenenciasproc::model()->findByPk($this->hidproc)->hidprevio
                                                                                            )->id);die();*/
                   // var_dump(Tenenciasproc::model()->findByPk($this->hidproc)->hidprevio);die();
                   // var_dump(Tenencias::model()->findByPk($this->hidproc));die();
                   // var_dump($requisito);die();
                    $this->adderror('hidproc',' Hay un requisito previo que  cumplir :'.$requisito.'  Revise la configuracion de las reglas');
                }
                
                //ahora veamos si algun chistoso esta intennado procesar 
                // con un TENENCIAS PROC DISTINTO AL DOCUMENTO ACTUAL
                $regten=  Tenenciasproc::model()->findByPk($this->hidproc);
                $doci=Docingresados::model()->findByPk($this->hiddoci);
               /* var_dump($this->hidproc);
                var_dump($regten->codocu);var_dump($doci->tipodoc);
                var_dump(!$regten->codocu==$doci->tipodoc);*/
                if(!($regten->codocu==$doci->tipodoc))
                     $this->adderror('hidproc',' Este proceso de '.$regten->eventos->descripcion."  pertenece al documento ".$regten->documentos->desdocu."  Mientras que el documento a procesar es un documento ".$doci->docus->desdocu);
               
           
        
    }
      
    public function aftersave(){
        if(!is_null($this->codte) and strlen($this->codte)>0 
                and !($this->getScenario()=="fechafinal")
                ){
            //hay que cambiar de tenencia 
            $registro= $this->docingresados;
          $registro->setScenario('cambiotenencia');
          $registro->codtenencia=$this->codte;
         if( $registro->save()){
              MiFactoria::Mensaje('success','  procesosdocu -aftersave  '. $registro->id.'     Actualzio tenencia  '.$registro->codtenencia);
         
         }else{
             MiFactoria::Mensaje('notice','procesosdocu -aftersave '.$registro->id.'    NO  Actualzio tenencia  '.$registro->codtenencia.'   errroes '.yii::app()->mensajes->getErroresItem($registro->geterrors()));
         
         }
           //unset($registro);
        }else{
          MiFactoria::Mensaje('error', 'procesosdocu -aftersave'.$registro->id.'     Paso de largo ');
        }
        unset($registro);
        return parent::aftersave();
    }
    
    public function tiempopasado(){
        if(is_null($this->fechafin)){
             return MiFactoria::tiempopasado($this->fechanominal,$this->fechafin);
        }else{
             return MiFactoria::tiempopasado($this->fechanominal);
        }
      
    }
   
    
    public function chkfecha($attribute,$params) {
        ///que la fecha sea mayor a la fecha de ingreso del doci
        $docu=Docingresados::model()->findByPk($this->hiddoci);
        $fechaingreso= $docu->fechain;
		if(!yii::app()->periodo->verificafechas($fechaingreso,$this->fechanominal))
                    $this->adderror('fechanominal','La fecha 1 de proceso es  anterior a la fecha de ingreso del Documento ');
        if(!yii::app()->periodo->verificafechas($docu->procesoactivo[0]->fechanominal,$this->fechanominal))
                    $this->adderror('fechanominal','La fecha 2 de proceso es  anterior a la fecha del proceso activo a reemplazar ');
        
        if(!yii::app()->periodo->verificafechas($this->fechanominal,date("Y-m-d H:i:s",time()+60*15)))
                    $this->adderror('fechanominal','La fecha de proceso '.$this->fechanominal.'  es  POSTERIOR AL  a la fecha actual  '.date("Y-m-d H:i:s",time()+60*15));
        
    }
    
  // Esta funcion verifica si el cmpo codu, y coduref estan llenos para subir los archivo adjunts con nombre referenciado 
    PUBLIC function essubible(){
        if(!is_null($this->codocuref) and !is_null($this->numdocref))
            return true;
        return false;
    }
    
    
}