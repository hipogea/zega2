<?php
/**
 * This is the model class for table "{{procesosdocu}}".
 *
 * The followings are the available columns in table '{{procesosdocu}}':
 * @property integer $id
 * @property integer $hiddoci
 * @property string $fechacrea
 * @property string $fechanominal
 * @property integer $hidtra
 * @property integer $hidproc
 * @property string $codocuref
 * @property string $numdocref
 *
 * The followings are the available model relations:
 * @property DocuIngresados $hiddoci0
 * @property Tenenciasproc $hidproc0
 * @property Tenenciastraba $hidtra0
 */
class Procesosdocu extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{procesosdocu}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
             array('hiddoci,hidproc','required'),
            array('hidproc','chkrequisitos'),
            array('hiddoci,'
                . ' fechanominal,'
                . ' hidtra, hidproc'
                , 'required', 'on'=>'insert,cambiotenencia'),
            array('id, hiddoci, fechanominal, hidtra, hidproc, codocuref, numdocref,codte', 'safe', 'on'=>'insert,update,cambiotenencia'),
            array('id, hiddoci,'
                . ' fechacrea, fechanominal,'
                . ' hidtra, hidproc'
                , 'safe', 'on'=>'rapido'),
            
           // array('id, hiddoci, fechacrea, fechanominal, hidtra, hidproc, codocuref', 'required'),
            array('hiddoci, hidtra, hidproc', 'numerical', 'integerOnly'=>true),
             array('hiddoci+hidtra+hidproc', 'application.extensions.uniqueMultiColumnValidator','on'=>'insert,update,cambiotenencia'),
		
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
            'criteria'=>$criteria,
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
        if($this->isNewRecord)
        $this->fechacrea=date("Y-m-d H:i:s");
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
            $proaefectuar= Tenenciasproc::model()->findByPk($this->hidproc);
            //el proceso actual
            $proactual= Docingresados::model()->findByPk($this->hiddoci)->procesoactivo[0]->tenenciasproc;
             //comparadnod si es requisito 
           //  var_dump($proactual->tenenciasproc);die();
             if($proaefectuar->hidprevio >0) //si tiene requisito 
             {
                 /*var_dump($proactual->tenenciasproc->hidprevio);
                 var_dump($proaefectuar->hidevento);die();*/
                 return ($proactual->hidevento==$proaefectuar->hidprevio)?true:false;
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
		if(!$this->cumplerequisitoprevio())
                    $this->adderror('hidproc','Este proceso no se puede efectuar porque hay un requisidto previo que cumplir ');
        
    }
      
    public function aftersave(){
        if(!is_null($this->codte) and strlen($this->codte)>0){
            //hay que cambiar de tenencia 
            $registro= $this->docingresados;
          $registro->setScenario('cambiotenencia');
          $registro->codtenencia=$this->codte;
          $registro->save();
          unset($registro);
        }
        return parent::aftersave();
    }
    
}