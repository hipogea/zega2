<?php
CONST ESTADO_PREVIO='99';
CONST ESTADO_CREADO='10';

class Ot extends  ModeloGeneral
{
	//CONST ESTADO_DETALLE_CONSIGNACION_ANULADO='10';
    CONST CODIGO_DOCUMENTO_DETALLE_SOLPE='350';
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ot}}';
	}
	public function init(){
		$this->documento='890';
                $this->campoestado='codestado';

	}
        public $desobjeto; //campo auxiliar para mostrar la descripcion del objeto del  a cabecera
        
        public $camposfechas=array('fechafinprog', 'fechainiprog','fechainicio', 'fechafin');
        public $campossensibles=array('codobjeto','codcompo');
        public function behaviors()
	{
		return array(
			// Classname => path to Class
			'ActiveRecordLogableBehavior'=>
				'application.behaviors.ActiveRecordLogableBehavior',
                    
                   
                
               /* 'parametros'=>array(
				'class'=>'ext.behaviors.ParametrosBehavior',
                            'nombrecampodocu'=>'codocu',
                             'nombrecampocentro'=>'codcen',
                                )   */  );
                
                    
                   
                
	}
        
        
        
        
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
	
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('codcompo','exist','allowEmpty' => true, 'attributeName' => 'codigo', 'className' => 'Masterequipo','message'=>'Este componente no existe'),
		       array('fechainiprog, codpro,codresponsable, textocorto, codcen', 'required'),
                        array('codobjeto','required','message'=>'Debe especificar un objeto','on'=>'update'),
			 array('codobjeto','checkobjeto','on'=>'update'),
                     array('numero','checkitems','on'=>'update'),
			
			array('fechafinprog, fechainiprog,fechainicio, fechafin','checkfechas'),
                    array('codpro','exist','allowEmpty' => false, 'attributeName' => 'codpro', 'className' => 'Clipro','message'=>'Esta empresa no existe'),
	            array('idcontacto','checkcontacto','on' => 'insert,update'),			 
                    array('codpro1','exist','allowEmpty' => true, 'attributeName' => 'codpro', 'className' => 'Clipro','message'=>'Esta empresa no existe'),
		                   // array('idobjeto', 'checkobjeto','on'=>'insert'),
                            array('textolargo,codobjeto,codcompo,desobjeto,serie,identificador,codsap','safe','on'=>'insert,update'),
			array('idobjeto, iduser', 'numerical', 'integerOnly'=>true),
			array('numero', 'length', 'max'=>12),
			array('codpro', 'length', 'max'=>8),
			array('fechainicio,fechafin', 'safe'),
			array('codresponsable', 'length', 'max'=>6),
			array('textocorto', 'length', 'max'=>40),
			array('grupoplan, codocu', 'length', 'max'=>3),
			array('codcen', 'length', 'max'=>4),
			array('codestado', 'length', 'max'=>2),
			array('clase', 'length', 'max'=>1),
			array('hidoferta', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, numero, fechacre, fechafinprog, codpro, idobjeto,
			 codresponsable, textocorto, textolargo, grupoplan,
			 codcen, iduser, codocu, codestado, clase, hidoferta', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'detot' => array(self::HAS_MANY, 'Detot', 'hidorden'),
			'tempdetot' => array(self::HAS_MANY, 'Tempdetot', 'hidorden'),
                    'tempotconsignacion' => array(self::HAS_MANY, 'Tempotconsignacion', 'hidot'),
                    'otconsignacion' => array(self::HAS_MANY, 'Otconsignacion', 'hidot'),
			'desolpe' => array(self::HAS_MANY, 'Desolpe', 'hidot','condition'=>"tipsolpe='M' "),
			'desolpeserv' => array(self::HAS_MANY, 'Desolpe', 'hidot','condition'=>"tipsolpe='S' "),
			'tempdesolpe' => array(self::HAS_MANY, 'Tempdesolpe','hidot'),
			//'cant_solicitada'=>array(self::STAT, 'Alreserva', 'hidesolpe','select'=>'sum(t.cant)','condition'=>"estadoreserva <> '30' AND codocu IN ('800') "),//el campo foraneo
                        'numeroitems' => array(self::STAT, 'Tempdetot','hidorden','condition'=>" idusertemp =".yii::app()->user->id." "),
			'nrecursos' => array(self::STAT, 'Tempdesolpe','hidot','condition'=>"tipsolpe='M' and idusertemp =".yii::app()->user->id." "),
			'nrecursosfirme' => array(self::STAT, 'Desolpe','hidot','condition'=>"tipsolpe='M' " ),
			'nrecursosserv' => array(self::STAT, 'Tempdesolpe','hidot','condition'=>"tipsolpe='S' and idusertemp =".yii::app()->user->id." "),
			'nrecursosfirmeserv' => array(self::STAT, 'Desolpe','hidot','condition'=>"tipsolpe='S'  " ),
			'nconsignaciones' => array(self::STAT, 'Tempotconsignacion','hidot','condition'=>" idusertemp =".yii::app()->user->id." " ),
			
                    'clipro' => array(self::BELONGS_TO, 'Clipro', 'codpro'),
                    'clipro1' => array(self::BELONGS_TO, 'Clipro', 'codpro1'),
			//'objetosmaster' => array(self::BELONGS_TO, 'Objetosmaster', 'idobjeto'),
			'vwobjetos' => array(self::BELONGS_TO, 'VwObjetos', 'idobjeto'),
			'objetosmaster' => array(self::BELONGS_TO, 'Objetosmaster', 'idobjeto'),
			'trabajadores' => array(self::BELONGS_TO, 'Trabajadores', 'codresponsable'),
                    'estado'=>array(self::BELONGS_TO,'Estado',array('codestado'=>'codestado','codocu'=>'codocu')),
                    'neot'=>array(self::HAS_MANY,'Neot','hidot'),
                   // 'ncomponentes'=>array(self::STAT,'Neot','hidot','Select'=>'sum(t.cant)'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'numero' => 'Numero',
			'fechacre' => 'F. Crea',
                    'fechainiprog' => 'F. in Prog',
                        'fechainicio'=>'F. inic',
			'fechafinprog' => 'F.fin Prg',
			'codpro' => 'Cli final',
                    'codobjeto'=>'Referencia',
                    'codpro1' => 'Cli ',
			'idobjeto' => 'Idobjeto',
			'codresponsable' => 'Respons',
			'textocorto' => 'Descrip',
			'textolargo' => 'Detalles',
			'grupoplan' => 'G Plan',
			'codcen' => 'Centro',
			'iduser' => 'Usuario',
			'codocu' => 'Doc',
			'codestado' => 'Estado', 
			'clase' => 'Clase',
			'hidoferta' => 'Hidoferta',
                    'codobjeto' => 'Hidoferta',
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
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('fechacre',$this->fechacre,true);
		$criteria->compare('fechafinprog',$this->fechafinprog,true);
		$criteria->compare('codpro',$this->codpro,true);
		$criteria->compare('idobjeto',$this->idobjeto);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('textocorto',$this->textocorto,true);
		$criteria->compare('textolargo',$this->textolargo,true);
		$criteria->compare('grupoplan',$this->grupoplan,true);
		$criteria->compare('codcen',$this->codcen,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('clase',$this->clase,true);
		$criteria->compare('hidoferta',$this->hidoferta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	/**************************
	 * Checkea el objeto y le clipro si es deun determinada empresa
	 * @param $attribute
	 * @param $params
	 *
	 */
	/*public function checkobjeto($attribute,$params) {
            //var_dump($this->idobjeto);var_dump(Objetosmaster::model()->findByPk($this->idobjeto));die();
            if($this->isNewRecord){
                $codigocli= Objetosmaster::model()->findByPk($this->idobjeto)->objetoscliente->codpro;
            }else{
                 $codigocli= $this->objetosmaster->objetoscliente->codpro;
            }
             if($this->codpro!=$codigocli)
                $this->adderror('idobjeto','Este equipo no pertenece a la organizacion '.$this->clipro->despro);
	  
		}
*/

	/**************************
	 * Checkea las fechas de inicio y programacion no son consistentes
	 * @param $attribute
	 * @param $params
	 *
	 */
	public function checkfechas($attribute,$params) {
		if(!is_null($this->fechainiprog) and !is_null($this->fechafinprog))
		if(!yii::app()->periodo->verificaFechas($this->fechainiprog,$this->fechafinprog))
		$this->adderror('fechainiprog','La Fecha de inicio programada es mayor que la de fin programada');
		if(!is_null($this->fechainicio) and !is_null($this->fechafin))
		if(!yii::app()->periodo->verificaFechas($this->fechainicio,$this->fechafin))
			$this->adderror('fechainicio','La Fecha de inicio  es mayor que la de fin');

		}

	public function beforeSave() {
          //echo "beofres";die();
		if ($this->isNewRecord) {
			$this->codestado='10';
			$this->codocu='890';
			$this->fechacre=date("Y-m-d H:i:s");
		}
		else
		{
			IF ($this->numero===null or empty($this->numero))
			{
				$this->numero=$this->correlativo('numero');
			}
			//var_dump($this->numero);die();
		}
		return parent::beforeSave();
	}

public static function findByNumero($numero){
  return self::model()->find("numero=:vnumero",array(":vnumero"=>MiFactoria::cleanInput($numero)));

}

public function editable() {
	$arregloestados=array(
		ESTADO_PREVIO,
		ESTADO_CREADO,

	);
	return in_array($this->codestado,$arregloestados);


}




public function tienesolpeabierta($tipo) {
       $retorno=NULL;
        $criteria = new CDbCriteria();
        $criteria->distinct=true;
        $criteria->addCondition ("hidot=".$this->id);  
        $criteria->addCondition ("tipsolpe='".$tipo."'" );  
        $criteria->addCondition ("iduser=".yii::app()->user->id );  
        $criteria->select = 'hidsolpe';
        $desolpes=Desolpe::model()->findAll($criteria);
       if($tipo=='M'){
          IF($this->nrecursosfirme >0){
               foreach($desolpes as $registro){
            if($registro->desolpe_solpe->estado=='10'){
                $retorno=$registro;
                 break; 
            }
          }
			
       }
        if($tipo=='S'){
           IF($this->nrecursosfirmeserv >0){
               foreach($desolpes as $registro){
            if($registro->desolpe_solpe->estado=='10'){
                $retorno=$registro;
                 break; 
            }
       }
           }
        }
       return $retorno;
            
      }
   }

   
 public  function  resumenCostosPorTipo($temp=false){
    $arrayrotulos=array("Costo de materiales : ","Costo de Servicios : ","Costo de Imputaciones Externas :");
   
    if($temp){
        $tabla="{{tempdesolpe}}";
        }else {
          $tabla="{{desolpe}}";   
        }
       $filas=yii::app()->db->createCommand(
                 " SELECT sum(punitplan) as mplan, 
                     sum(punitreal) as mreal from 
                     ".$tabla."  where hidot =".$this->id." and  est not in"
               . "   ".Estado::listaestadosnocalculables(self::CODIGO_DOCUMENTO_DETALLE_SOLPE)."  group by tipsolpe 
                            union 
                    select sum(montosoles) as mplan , sum(montosoles)
                    as mreal from {{imputaciones}} where idcolectorpadre=".$this->id." "
                 )->queryAll();
       
     
     $filas[0]['designacion']=$arrayrotulos[0];
     $filas[1]['designacion']=$arrayrotulos[1];
     $filas[2]['designacion']=$arrayrotulos[2];
    return new CArrayDataProvider($filas, array(
                    'id'=>'costosporcategoria',
                ));
}


public  function  resumenCostosPorCeCo($temp=false){
   // $arrayrotulos=array("Costo de materiales : ","Costo de Servicios : ","Costo de Imputaciones Externas :");
    if($temp){
        $tabla="{{tempdesolpe}}";
        }else {
          $tabla="{{desolpe}}";   
        }
       $filas=yii::app()->db->createCommand(
                 "select  sum(t.punitplan)as mplan , sum(t.punitreal) as mreal, 
                     c.codc as ceco,  c.desceco as designacion from ".$tabla." 
                     t ,  {{cc}} c where t.imputacion=c.codc and hidot=".$this->id." and t.est not in "
               . "    ".Estado::listaestadosnocalculables(self::CODIGO_DOCUMENTO_DETALLE_SOLPE)."    "
               . " group by c.codc,  c.desceco   " )->queryAll();
       
     
     
    return new CArrayDataProvider($filas, array(
                    'id'=>'costosporceco',
                ));
}

       public function getNextItemConsignacion(){
            return str_pad($this->nconsignaciones+1,3,"0",STR_PAD_LEFT); 
        }  
        
        public function getNextItem(){
            return str_pad($this->numeroitems+1,3,"0",STR_PAD_LEFT); 
        }  
        public function getNextItemRecurso(){
            return str_pad($this->nrecursos+1,3,"0",STR_PAD_LEFT); 
        }  
        
      public function listaitems(){
          return yii::app()->db->createCommand()->
                  select('t.item')->
                  from('{{detot}} t')-> 
                  where('hidorden=:vid',array(":vid"=>$this->id))-> 
                  queryColumn();
      }
      
      public function getid($item){
          $valores=yii::app()->db->createCommand()->
                  select('t.id')->
                  from('{{detot}} t, {{ot}} a')-> 
                  where('  a.id=t.hidorden and a.id=:vid and t.item=:vitem',array(":vid"=>$this->id, ":vitem"=>$item))-> 
                  queryAll();
          if(count($valores)>0){
              return $valores[0]['id']+0;              
          }else{
              return null;
          }
      }
      
      public function getids(){
          $valores=yii::app()->db->createCommand()->
                  select('t.id')->
                  from('{{detot}} t')-> 
                  where('  t.hidorden=:vid ',array(":vid"=>$this->id))-> 
                  queryColumn();
          if(count($valores)>0){
              return $valores;              
          }else{
              return array(-1);
          }
      }
  
        /**************************
	 * Checkea que le objeto y el cliente final sean compatible 
	 * @param $attribute
	 * @param $params
	 *
	 */
	public function checkobjeto($attribute,$params) {
           if(!is_null($this->codobjeto)){
              $obj= ObjetosCliente::model()->findByPk(array('codpro'=>$this->codpro, 'codobjeto'=>$this->codobjeto));
            if(is_null($obj)){
                 $this->addError ('codobjeto', 'La referencia a este objeto no coincide con el cliente');
                      return;  
           }
           
           
            }
             else{
               $this->addError ('codobjeto', 'Llene el objeto referencia '.$this->codobjeto);
                 
           }
           
            }
               
		
      public function checkitems($attribute,$params) {
           if($this->numeroitems==0)
              $this->addError ('numero', 'No pude generar la orden porque no tiene detalles ');
                      return;  
		}
       public function checkcontacto($attribute,$params) {
	       $matriz= Contactos::model()->findAll("id=:idx and c_hcod=:vcdf",array(":vcdf"=>$this->codpro1,":idx"=>$this->idcontacto));
		   if (count($matriz)==0)
		   {
				  		// if(!$this->codpro==$fila->c_hcod)
					   			$this->adderror('idcontacto','Este contacto no pertenece a la empresa '.$this->codpro1.' o no existe ');

		   }
			}  
                        
    public function suggestotsimple($keyword,$limit=20)
	{
		$models=$this->findAll(array(
			'condition'=>'numero LIKE :keyword',
			'order'=>'numero',
			'limit'=>$limit,
			'params'=>array(':keyword'=>"%$keyword%")
		));
		$suggest=array();
		//$suggest=array(JSON_ENCODE($models[0]),'KFSHFKSIY');
		foreach($models as $model) {
			$suggest[] = array(
				'label'=>$model->numero.'-'.$model->textocorto,  // label for dropdown list
				'value'=>$model->numero,  // value for input field
				//'id'=>$model->id,       // return values from autocomplete
				//'code'=>$model->code,
				//'call_code'=>$model->call_code,
			);
		}
		
		return $suggest;
	}                     
      
}