<?php
class Cajachica extends ModeloGeneral
{
     const TIPO_FLUJO_GASTO='101';
      const TIPO_FLUJO_CARGO='102';
    const ESTADO_DETALLE_CAJA_CREADO='10';
    const ESTADO_DETALLE_CAJA_ANULADO='30';
    const ESTADO_DETALLE_CAJA_CERRADO='20';
    const ESTADO_DETALLE_CAJA_CONFIRMADO='40';
    const ESTADO_DETALLE_CAJA_PREVIO='99';
    const ESTADO_CAJA_CREADO='10';
    const ESTADO_CAJA_CERRADO='20';
    const ESTADO_CAJA_ANULADO='30';
    const ESTADO_CAJA_CONFIRMADO='40';
    const CODIGO_DOC='370';
    
    public $limiteinferior;
    public $limitesuperior;
    public $camposfechas=array('fechaini'=>'fechaini','fechafin'=>'fechafin');
    //const TIPO_DE_FLUJO_A_RENDIR='102';
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{cajachica}}';
    }
    
   
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
           array('hidperiodo,descripcion, fechaini,serie, fechafin, hidfondo, valornominal,codtra,codarea', 'required','message'=>'Este dato es obligatorio', 'on'=>'insert, update'),
            array('descripcion,liquidada,hidfondo,serie, hidperiodo, fechaini,valornominal, fechafin, codtra, codarea,codcen, iduser', 'safe', 'on'=>'insert,udpate'),
            array('serie','checksepuedeabrir','on'=>'insert'),
            array('fechaini, fechafin','checkfechas','on'=> 'insert,update'),
            array('hidperiodo, iduser', 'numerical', 'integerOnly'=>true),
            array('codtra, codcen', 'length', 'max'=>4),
             array('id, descripcion,liquidada,hidfondo, hidperiodo, fechaini, fechafin, codtra, codarea,codcen, iduser', 'safe', 'on'=>'search'),
        );
    }
    public function checkfechas($attribute,$params) {
        if( !Yii::app()->periodo->verificaFechas($this->fechaini,$this->fechafin))
            $this->adderror('fechaini','La fecha de inicio es mayor que la fecha de finalizacion');
    }
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'dcajachicas' => array(self::HAS_MANY, 'Dcajachica', 'hidcaja'),
            'fondo' => array(self::BELONGS_TO, 'Fondofijo', 'hidfondo'),
            'periodo' => array(self::BELONGS_TO, 'Periodos', 'hidperiodo'),
            'trabajadores' => array(self::BELONGS_TO, 'Trabajadores', 'codtra'),
            'estado'=> array(self::BELONGS_TO, 'Estado', array('codestado'=>'codestado', 'codocu'=>'codocu')),
            'monto_rendido' => array(self::STAT, 'Dcajachica', 'hidcaja','select'=>'sum(t.monto)','condition'=>"  t.tipoflujo not in ('".self::TIPO_FLUJO_CARGO."') AND codestado in ('".self::ESTADO_DETALLE_CAJA_CERRADO."','".self::ESTADO_DETALLE_CAJA_CONFIRMADO."') "),
            // 'monto_cargo' => array(self::STAT, 'Dcajachica', 'hidcaja','select'=>'sum(t.debe)','condition'=>"  t.tipoflujo not in ('".self::TIPO_FLUJO_CARGO."') AND codestado in ('".self::ESTADO_DETALLE_CAJA_CERRADO."','".self::ESTADO_DETALLE_CAJA_CONFIRMADO."') "),
           
//Monot planificado aquel monfot que se esta pensando gastar sin comnfirmar ,es importante para restringir el % de exceso de la caja
            'monto_planificado' => array(self::STAT, 'Dcajachica', 'hidcaja','select'=>'sum(t.monto)','condition'=>" codestado not in ('".self::ESTADO_DETALLE_CAJA_ANULADO."') "),
            'hijospendientes'=>array(self::STAT, 'Dcajachica', 'hidcaja','condition'=>"tipoflujo not in ('".self::TIPO_FLUJO_CARGO."')  and codestado in ('".self::ESTADO_DETALLE_CAJA_PREVIO."','".self::ESTADO_DETALLE_CAJA_CREADO."') "),//el campo
            'hijos_cargo_por_cerrar' => array(self::STAT, 'Dcajachica', 'hidcaja','select'=>'count(t.id)','condition'=>" hidcargo >0 and codestado in ('".self::ESTADO_DETALLE_CAJA_PREVIO."','".self::ESTADO_DETALLE_CAJA_CREADO."')  "),
           'hijosconproceso'=>array(self::STAT, 'Dcajachica', 'hidcaja','select'=>'count(t.id)','condition'=>"  codestado not in ('".self::ESTADO_DETALLE_CAJA_PREVIO."','".self::ESTADO_DETALLE_CAJA_CREADO."')  "),
           'rendido'=>array(self::STAT, 'Dcajachica', 'hidcaja','select'=>'sum(t.monto)','condition'=>"  codestado not in ('".self::ESTADO_DETALLE_CAJA_PREVIO."','".self::ESTADO_DETALLE_CAJA_CREADO."') and revisado <> '1' "),
            );
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'hidperiodo' => 'Periodo',
            'hidfondo' => 'Fondo',
            'fechaini' => 'F inicio',
            'fechafin' => 'F Finaliz',
            'codtra' => 'Respon.',
            'codcen' => 'Centro',
            'codarea' => 'Area',
             'descripcion' => 'Descrip.',
            'codestado' => 'Estado',
            'valornominal' => 'Valor',
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
        $criteria->compare('hidperiodo',$this->hidperiodo);
        $criteria->compare('fechaini',$this->fechaini,true);
        $criteria->compare('fechafin',$this->fechafin,true);
        $criteria->compare('codtra',$this->codtra,true);
        $criteria->compare('iduser',$this->iduser);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    public function checksepuedeabrir($attribute,$params) {
        if(yii::app()->settings->get("conta","conta_abrecajasinrequisitos")=="1"){
             $devolver=false;
        $valorultimo=Yii::app()->db->createCommand()
            ->select('max(a.id)')
            ->from('{{cajachica}} a')
            ->where(' a.serie=:vserie and codestado <>:vanulado and codestado =:vestadocreado  ',array(':vestadocreado'=>self::ESTADO_CAJA_CREADO,":vserie"=>$this->serie,":vanulado"=>self::ESTADO_CAJA_ANULADO))
            ->queryScalar();
        if($valorultimo!=false){
             // var_dump(self::ESTADO_CAJA_ANULADO); var_dump($this->serie);die();
                $devolver=false;
        }else{
            // echo "no salio algo ";die();
            $devolver=true; //se puede abrir no hay registro anteriores
        }
        if(!$devolver)
            $this->adderror('serie'," Aun existe una caja en esta serie pendiente de liquidar  ");
        
        }else{
            return true;
        }
       
    }
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Cajachica the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public $maximovalor;
//public $conservarvalor=0; //Opcionpa reaverificar si se quedan lo valores predfindos en sesiones
    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->codestado=self::ESTADO_CAJA_CREADO;
            $this->codocu=self::CODIGO_DOC;
        } else
        {
            /* echo "saliop carajo";	//$this->ultimares=" ".strtoupper(trim($this->usuario=Yii::app()->user->name))." ".date("H:i")." :".$this->ultimares;
            */
        }
        return parent::beforesave();
    }

    public function excedeplan(){
            return($this->monto_planificado >
                $this->limitesuperior)?true:false;

     }
     
     
      
     
     public function puedecerrarse(){
         $valor=false;
         //if(!$this->excedeplan())///Primero que no tiene qu estar en defecto
         if($this->hijospendientes==0){
             
       
          if($this->monto_rendido >= $this->limiteinferior){
              if($this->monto_rendido <= $this->limitesuperior){
                 $valor=true;   
              }ELSE{
                  MiFactoria::mensaje('error','El monto rendido ['.$this->monto_rendido.']  es igual o supera el limite superior  ['.$this->limitesuperior.']');  
              }
                  
          }ELSE{
             MiFactoria::mensaje('error','El monto rendido ['.$this->monto_rendido.']  no supera el limite inferior  ['.$this->limiteinferior.']');  
               
          }
          
         }else{
            MiFactoria::mensaje('error','Existen registros hijos pendientes de cierre');  
                
         }
                     
        return $valor;
  
     }
public function afterfind(){
      $this->limiteinferior=$this->valornominal*(1-yii::app()->settings->get('general','general_porcexcesocaja') /100);
    $this->limitesuperior=$this->valornominal*(1+yii::app()->settings->get('general','general_porcexcesocaja') /100);
    
    return parent::afterfind();
}

public static function deudaTrabajador($codtra){
    
    //echo $codtra; die();
    $codtra= MiFactoria::cleanInput($codtra);
    $criterio=New CDbCriteria();
    $criterio->addCondition("codtra=:vcodtra and debe <> haber and monto <> 0
        and hidcaja>0 and 
        codestado='".self::ESTADO_DETALLE_CAJA_ANULADO."' ");
    $criterio->params=array(":vcodtra"=>$codtra);
    return  Yii::app()->db->createCommand()
			->select("sum(a.monto)")
			->from('{{dcajachica}} a')
			->where($criterio->condition,
				$criterio->params)
			->queryScalar();
}

    public function rendido(){
        $criterio=New CDbCriteria();
          $criterio->addCondition("hidcaja=:vhidcaja and tipoflujo = :vtipoflujo");
          $criterio->params=array(":vhidcaja"=>$this->id,":vtipoflujo"=>self::TIPO_FLUJO_GASTO);
            $criterio->addInCondition("codestado",array(
        self::ESTADO_CAJA_CERRADO,self::ESTADO_CAJA_CONFIRMADO)
            );
    
                $rendidonormal= Yii::app()->db->createCommand()
			->select("sum(a.monto)")
			->from('{{dcajachica}} a')
			->where($criterio->condition,
			$criterio->params)
			->queryScalar();
                  $rendidonormal=is_null($rendidonormal)?0:$rendidonormal+0;
                return $rendidonormal;
    //var_dump($rendidonormal);
       
       /*  $criterio2=New CDbCriteria();
            $criterio2->addCondition("hidcargo >0 and  hidcaja=:vhidcaja");
          $criterio2->params=array(":vhidcaja"=>$this->id);
            $criterio2->addInCondition("codestado",array(
        self::ESTADO_CAJA_CERRADO,self::ESTADO_CAJA_CONFIRMADO)
            );
           $rendidohijos= Yii::app()->db->createCommand()
			->select("sum(a.monto) as rendid")
			->from('{{dcajachica}} a')
			->where($criterio2->condition,
			$criterio2->params)
			->queryScalar()+0;
          // var_dump($rendidohijos);
         
           $rendidohijos=is_null($rendidohijos)?0:$rendidohijos+0;
            return round($rendidonormal+ $rendidohijos,2);
           */
            }
           
    public function heredagastos(){
      $valorultimo=Yii::app()->db->createCommand()
            ->select('max(a.id)')
            ->from('{{cajachica}} a')
            ->where('a.id <> :vid  and   a.serie=:vserie and codestado =:vcodestado   ',array(':vid'=>$this->id,':vcodestado'=>self::ESTADO_CAJA_CERRADO,":vserie"=>$this->serie))
            ->queryScalar();
       //VAR_DUMP($valorultimo);DIE();
        if(!is_null($valorultimo)){
            $cajaanterior= Cajachica::model()->findByPk($valorultimo+0);
           // VAR_DUMP($valorultimo);DIE();
            foreach($cajaanterior->rendicionesexcedentes() as $fila){
                $nuevafila=New Dcajachica();
                $nuevafila->attributes=$fila->attributes;
                $nuevafila->codestado=self::ESTADO_DETALLE_CAJA_CREADO;
                $nuevafila->tipoflujo= self::TIPO_FLUJO_GASTO;
                $nuevafila->hidcaja=$this->id;
                $nuevafila->fecha=$this->fechaini;
                $nuevafila->glosa='Reembolso:'.substr($fila->glosa,0,30);
                if(!$nuevafila->save()){
                    MiFactoria::Mensaje('error', yii::app()->mensajes->getErroresItem($nuevafila->geterrors()));
                }
            }
        }  
        
    }  
    
    
    public function rendicionesexcedentes(){
        $corel=New CDbCriteria();
        $corel->addCondition("hidcaja=:vhidcaja");
        $corel->addCondition("tipoflujo=:vtipoflujo");
         //$corel->addCondition("tipoflujo=:vtipoflujo");
         $corel->params=array(
             ":vhidcaja"=>$this->id,
             ":vtipoflujo"=>self::TIPO_FLUJO_CARGO,
             ":vhidcaja"=>$this->id,
             );
         $filasadevolver=array();
          $corel->addInCondition("codestado",array(self::ESTADO_DETALLE_CAJA_CERRADO,self::ESTADO_DETALLE_CAJA_CONFIRMADO));
        $filas=Dcajachica::model()->findAll($corel);
        
        foreach ($filas as $fila){
            if($fila->monto < $fila->rendido){
                
                $fila->debe=$fila->rendido-$fila->monto;                
                $filasadevolver[]=$fila;
            }
        }
        return $filasadevolver;
    }
}