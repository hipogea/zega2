<?php

class Dcajachica extends ModeloGeneral
{
    const CODIGO_DOCUMENTO='200';
    const ESTADO_CABECERA_CREADO='10';
const ESTADO_DETALLE_CAJA_ANULADO='30';
const ESTADO_DETALLE_CAJA_CREADO='10';
const ESTADO_DETALLE_CAJA_CERRADO='20';
const ESTADO_DETALLE_CAJA_CONFIRMADO='40';
    const FUJO_CARGO_A_RENDIR='102';
    const FLUJO_DEVOLUCION_FONDO='103';
    const FLUJO_FONDO_GASTO='101';
	const FUJO_FONDO='100';
        public $camposfechas=array('fecha');
        public $montoimputado=0;//campo auxiliar para proceso de imputacion , se usa para colectar el porcentaje de monto imputado 
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{dcajachica}}';
	}

         public function behaviors()
	{
		return array(
			                    
                    'tablasunat'=>array(
				'class'=>'contabilidad.behaviors.tablasSunatBehavior',
                                                           ),
                 'docucontable'=>array(
				'class'=>'contabilidad.behaviors.formatoNumeroBehavior',
                                                           ),
               );
                
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
            
           
            return array(
                //ESCENARIO APRA IMPUTACIONES 
                array('ceco,tipimputacion,montoimputado','required','on'=>'imputaciones'),                
                array('ceco,tipimputacion,monto, montoimputado','safe','on'=>'imputaciones'),
                array('montoimputado','chkmontoimputado','on'=>'imputaciones'),
                array('tipimputacion','exists','allowEmpty' => false, 'attributeName' => 'codimpu', 'className' => 'Tipimputa','message'=>'Esta Imputacion no es valida','imputaciones'),
			
                
                   array('fecha,monto','safe','on'=>'devuelve'),
                  array('debe, haber, monto','safe','on'=>'montos'),
                array('codestado,haber','safe','on'=>'anulacion'),
                 array('fecha,monto','required','on'=>'devuelve'),
			array('hidcaja,hidcargo,codestado, fecha, glosa, monto,monedahaber,referencia, debe,tipoflujo,  codtra,esservicio,serie,tipodocid,numdocid,razon,  codocu,codocuref,hidref', 'safe'),
			array('fecha', 'checkfecha','on'=>'insert,update'),
                    array('codestado','safe','on'=> 'estado'),
			array('monto', 'checktolerancia','on'=>'insert,update'),
            //array('ceco','exist','allowEmpty' => false, 'attributeName' => 'codc', 'className' => 'Cc','message'=>'Este ceco no existe'),
            array('fecha', 'checkfecha_detalle','on'=>'upd_rencidiontrabajador,ins_rendiciontrabajador'),
			//array('tipoflujo', 'checkflujo','on'=>'upd_rencidiontrabajador,ins_rendiciontrabajador'),
			array('hidcaja, fecha, glosa, referencia, debe,monedahaber, tipoflujo,  codtra, codocu', 'required','on'=>'insert,update'),
			array('hidcaja, iduser', 'numerical', 'integerOnly'=>true),
			array('glosa, referencia', 'length', 'max'=>60),
			array('debe, haber, saldo', 'length', 'max'=>10),
			array('monedahaber, codocu', 'length', 'max'=>3), 
			array('codtra', 'length', 'max'=>4),
			array('ceco', 'length', 'max'=>16),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidcaja, fecha, glosa, referencia, tipoflujo, debe, haber, monedahaber, saldo, codtra, ceco, fechacre, iduser, codocu', 'safe', 'on'=>'search'),
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
			'documentos' => array(self::BELONGS_TO, 'Documentos', 'codocu'),
                    'padre' => array(self::BELONGS_TO, 'Dcajachica', 'hidcargo'),
			'hijos'=>array(self::HAS_MANY,'Dcajachica','hidcargo'),
			'cabecera' => array(self::BELONGS_TO, 'Cajachica', 'hidcaja'),
			'trabajadores' => array(self::BELONGS_TO, 'Trabajadores', 'codtra'),
			'estado'=> array(self::BELONGS_TO, 'Estado', array('codestado'=>'codestado', 'coddocu'=>'codocu')),			
			'cco' => array(self::BELONGS_TO, 'VwImputaciones', 'ceco'),
			'ot'=>array(self::BELONGS_TO, 'VwOtdetalle', 'hidref'),
                    'moneda' => array(self::BELONGS_TO, 'Monedas', 'codmon'),
                    'devoluciones'=>array(self::STAT, 'Dcajachica', 'hidcargo','select'=>'sum(t.monto)','condition'=>"t.hidcargo > 0 and t.tipoflujo in ( '".self::FLUJO_DEVOLUCION_FONDO."') "),
			'flujos' => array(self::BELONGS_TO, 'Tipoflujocaja', 'tipoflujo'),
			'rendido'=>array(self::STAT, 'Dcajachica', 'hidcargo','select'=>'sum(t.monto)','condition'=>" t.hidcargo > 0 and t.codestado  in ( '".self::ESTADO_DETALLE_CAJA_CERRADO."','".self::ESTADO_DETALLE_CAJA_CONFIRMADO."') "),//el campo foraneo
                        'deuda'=>array(self::STAT, 'Dcajachica', 'hidcargo','select'=>'sum(t.monto)','condition'=>"t.hidcargo > 0 and haber=0 and t.codestado  in ( '".self::ESTADO_DETALLE_CAJA_ANULADO."') "),
                    'imputaciones'=> array(self::HAS_MANY, 'CcGastos', array('codocuref'=>'coddocu', 'idref'=>'id')),			
		'imputado'=> array(self::STAT, 'CcGastos', array('codocuref'=>'coddocu', 'idref'=>'id'),'select'=>'sum(t.monto)'),			
		
		);
	}

	public function checkfecha($attribute,$params) {
     $fechainicio=Cajachica::model()->findByPk($this->hidcaja)->fechaini;
		$fechafin=Cajachica::model()->findByPk($this->hidcaja)->fechafin;
		if(!yii::app()->periodo->estadentrodefechas($fechainicio,$this->fecha,$fechafin))
			$this->adderror('Fecha','Esta fecha no esta dentro del perido de la cabecera ');

	}

	public function checktolerancia($attribute,$params) {
		if($this->isNewRecord and $this->cabecera->excedeplan() )
			$this->adderror('debe','Se excedio de la tolerancia,('.yii::app()->settings->get("general","general_porcexcesocaja").'%)  Monto planificado : '.$this->cabecera->monto_planificado.'    Limite superior :   '.$this->cabecera->limitesuperior);

	}



	public function checkfecha_detalle($attribute,$params) {

		$fecharegistro=Dcajachica::model()->findByPk($this->hidcargo)->fecha;
		if(!yii::app()->periodo->verificaFechas($fecharegistro,$this->fecha))
			$this->adderror('c_numgui','Esta fecha es anterior a la entrega de dinero ');

	}

	public static function getMonto($proveedor){
		$totalplan=0;
		foreach($proveedor->data as $data)
		{
			if($data->codestado <> self::ESTADO_DETALLE_CAJA_ANULADO){

				$totalplan += $data->monto;
			}
		}
		return $totalplan;
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidcaja' => 'Hidcaja',
			'fecha' => 'Fecha',
			'glosa' => 'Glosa',
			'referencia' => 'Referencia',
			'debe' => 'Debe',
			'haber' => 'Haber',
			'monedahaber' => 'Monedahaber',
			'saldo' => 'Saldo',
			'codtra' => 'Codtra',
			'ceco' => 'Ceco',
			'fechacre' => 'Fechacre',
			'iduser' => 'Iduser',
			'codocu' => 'Codocu',
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
		$criteria->compare('hidcaja',$this->hidcaja);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('glosa',$this->glosa,true);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('debe',$this->debe,true);
		$criteria->compare('haber',$this->haber,true);
		$criteria->compare('monedahaber',$this->monedahaber,true);
		$criteria->compare('saldo',$this->saldo,true);
		$criteria->compare('codtra',$this->codtra,true);
		$criteria->compare('ceco',$this->ceco,true);
		$criteria->compare('fechacre',$this->fechacre,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('codocu',$this->codocu,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search_por_caja($idcabecera)
	{

		$criteria=new CDbCriteria;

		$criteria->addcondition("hidcaja=".$idcabecera."  and hidcargo IS NULL ");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function search_por_cargo_a_rendir($idcabecera,$idparent)
	{

		$criteria=new CDbCriteria;

		$criteria->addcondition("hidcaja=".$idcabecera."  and hidcargo= ".$idparent);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search_por_trabajador($codigo)
	{

		$criteria=new CDbCriteria;

		$criteria->addcondition("codtra='".$codigo."'  ");
		$criteria->addcondition("tipoflujo='102'");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function search_deuda_trabajador($codigo)
	{

		$criteria=new CDbCriteria;

		$criteria->addcondition("codtra='".$codigo."'  and monto <> 0 and debe <> haber");
		$criteria->addcondition("codestado='".self::ESTADO_DETALLE_CAJA_ANULADO."'");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	///verifica que ningun otro usuario modifiaue o trate tu caja cabecera
	private function isPropietariocaja(){
            if($this->hidcaja >0){
                //echo "sale l";
                return($this->iduser==yii::app()->user->id);
            }else{
               return ($this->cabecera->codtra==yii::app()->user->um->getFieldValue(yii::app()->user->id,'codtra'))?true:false;
	 
            }
		}


	public function isTratable(){
            //var_dump($this->codestado);
		return ($this->codestado==self::ESTADO_DETALLE_CAJA_CREADO and $this->cabecera->codestado==self::ESTADO_CABECERA_CREADO);
	}


	pUBLIC function tieneHijos(){
            //var_dump($this->tipoflujo);var_dump(self::FUJO_CARGO_A_RENDIR);
		if($this->tipoflujo==self::FUJO_CARGO_A_RENDIR)
		{
			//echo "salepues"; 
			return (count($this->hijos)>0)?true:false;
		}else{
                    //echo "salecaray";
			return false;
		}
	}

	public function tieneHijospendientes(){
		$sepuede=FALSE;
		if($this->tieneHijos())
		{
			
                    //echo "dentro";
                    $criteriaxy=New CDbcriteria;
			$criteriaxy->addCondition(" hidcargo=:vcargo AND hidcaja=:vhidcaja");
			$criteriaxy->params=array(":vcargo"=>$this->id ,":vhidcaja"=>$this->hidcaja);
			foreach (Dcajachica::model()->findAll($criteriaxy) as $fila){
				if(in_array($fila->codestado,array(self::ESTADO_DETALLE_CAJA_CREADO)))
				{
					$sepuede=true;
					break;
				}
			}
		}
		return $sepuede;
	}


	public function esEditable(){
		if($this->isTratable()){
			 if($this->tieneHijos())
			 {
				 return false;
			 }else  {
				return true;
			 }
		}ELSE {
			RETURN false;
		}

	}


	public function borra(){
		//Primero veriifcansdo si es usuario propietario
		$mensaje="";
		   if($this->isPropietariocaja()){
                           // echo "cero";
			   if($this->isTratable())
			    {
				
                               if(!$this->tieneHijos())
					{
                                       //echo "dos";
                                            IF(count($this->imputaciones)==0){
                                               $this->delete(); 
                                            }else{
                                                $mensaje.="El registro a borrar ya tiene imputaciones";
                                            }
						

					}else {
						$mensaje.="  Este registro tiene rendiciones hijas <br>";
					}


			     }else {
				   $mensaje.="  Este registro no se puede borrar porque tiene estado ".$this->estado->estado." <br>";
			   }

		   } else {
			   $mensaje.="  Para borrar el registro debe estar registrado como Empleado  <br>";
		   }
          return $mensaje;
	}






	public function beforeSave() {
		if($this->tipoflujo==self::FUJO_FONDO )
		{
			$this->debe=-1*abs($this->debe);

		}

		$cambio=($this->monedahaber!=yii::app()->settings->get('general','general_monedadef'))?
			yii::app()->tipocambio->getcambio($this->monedahaber,yii::app()->settings->get('general','general_monedadef')):
			1;
		$this->monto=$cambio*$this->debe;
		if($this->tipoflujo <> self::FUJO_CARGO_A_RENDIR)
		{

			//$this->haber=$this->debe;
		}





		if ($this->isNewRecord) {

            $this->coddocu=self::CODIGO_DOCUMENTO;
            if(is_null($this->codestado))
            $this->codestado=self::ESTADO_DETALLE_CAJA_CREADO;
		 $this->iduser=yii::app()->user->id;	
			  
		} else
		{

		}
		
 //verificando consistencia de tipimputacion
              
         //  $this->trataimputacion();
            if($this->getScenario()=='imputaciones'){
                $this->insertaccGastos($this->montoimputado, $this->ceco);
            }
		
            
            //Si se apropbo el registro 
            //Tambien actualizar el regisrto de compra de contabilidad
            if(yii::app()->hasModule('contabilidad'))
            if($this->cambiocampo('codestado') and $this->codestado==self::ESTADO_DETALLE_CAJA_CERRADO){
                if(!is_null(Registrocompras::cogeCajaChica($this->id))){
                   // echo "bien";die();
                    MiFactoria::Mensaje('success', 'Se agrego al registro de comrpas este comprobante');
                }else{
                    //echo "mal"; die();
                     MiFactoria::Mensaje('error', 'No se pudo agregar este comprobaten al registro de compras');
                }
            }
		
		return parent::beforesave();
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dcajachica the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function checktipimputaciones(){
            
        }
        
        private function trataimputacion(){
            //IF ($this->cambiocampo('tipimputacion')){
               if($this->tipimputacion=='T')
                   { //SI ES UNA ORDEN
                       //VERIFICAR SI ESTA IMPUTADO YA A UNA ORDEN
                     $criterio=New CDBCriteria;
                     $criterio->addCondition("hidcaja=:vcaja and codocucaja=:vcodocu");
                     $criterio->params=array(
                         ':vcaja' => $this->id,
			':vcodocu' => $this->codocu,
                     );
                      $impu=Imputaciones::model()->find($criterio);
                      if(is_null($impu)){
                          $regi=New Imputaciones();
                          $regi->setAttributes(
                                  array(
                                      
			'hidcaja' =>$this->id,
			'codocucaja' => $this->codocu,
			'monto' => (($this->monedahaber!=yii::app()->settings->get('general','general_monedadef'))?
			yii::app()->tipocambio->getcambio($this->monedahaber,yii::app()->settings->get('general','general_monedadef')):
			1)*$this->debe,
			'codmon' => $this->monedahaber,
			'tipimputacion' => $this->tipimputacion,
			'idcolector' => $this->hidref,
			'numerocolector' => Detot::model()->findByPK($this->hidref)->ot->numero,
                       'idcolectorpadre' => Detot::model()->findByPK($this->hidref)->ot->id,
			'codocuref' => '891', //detalle ot
                        // 'numerocolector' => Detot::model()->findByPK($this->hidref)->ot->id,
			             
                                  )
                                  );
                        $regi->save();
                             RETURN TRUE;
                          
                      }else{
                          return false;
                      }
                      
                      
                        
                    }  else{
                        return false;
                    }
            //}
            
        }
        
   public function insertaccGastos($monto,$ceco){
       //verificando el monto imputado
       if($monto > 0){
           // echo "#salio nada"; die();
           $porimputar=$this->monto-$this->imputado();
           if($monto <= $porimputar){
              //echo "#salio insert"; die();
              
               $model = new CcGastos();
		$model->ceco = $ceco;
		$model->fechacontable = $this->fecha;		
		$model->monto = $monto; ///ok
		$model->iduser = Yii::app()->user->id;
		$model->tipo = $this->esservicio;
		$model->idref = $this->id;
                $model->codocuref=self::CODIGO_DOCUMENTO;
                 if($this->tipimputacion=='T'){
                    $orden= explode('-', $this->ceco);
                    $registroorden=Ot::model()->findByNumero($orden[0]);
                    $identidad=$registroorden->getid($orden[1]);
                    $model->idetot=$identidad;
               }
		if(!$model->save())
                   throw new CHttpException(500,yii::app()->mensajes->getErroresItem($model->geterrors()));
	
		unset($model);//unset($row);
           }
           else{
              // echo "#salio"; die();
               //ups alguien ha metido la mano por otro sitio y ha imputado mas de la cuenta, //dejarlo asi nomas 
           }
       }
     }
     
   public function esimputable(){
       $loes=false;
       if(in_array($this->codestado, array(self::ESTADO_DETALLE_CAJA_CERRADO,self::ESTADO_DETALLE_CAJA_CONFIRMADO)))
           if(self::FLUJO_FONDO_GASTO==$this->tipoflujo)
               $loes=true;
       return $loes;
   }  
    
   //evrfa que no se exceda el monto total den las imputaciones parciale4
  public function chkmontoimputado($attribute,$params) {
      
      //$montocalificado=$this->imputado;
      if($this->monto < $this->montoimputado+$this->imputado()){
          $this->adderror('ceco','El monto a imputar['.$this->montoimputado.'] mas lo acumulado['.$this->imputado().'] sobrepasa al monto ['.$this->monto.'], este registro ya tiene imputaciones, revise');
           return; 
          }
          //verificando el ceco 
      if($this->tipimputacion=='K'){
            $cecquito=Cc::model()->findByPk(trim($this->ceco));
          if(is_null($cecquito)){
              $this->adderror('ceco','Este colector ['.$this->ceco.'] No existe ');
              return ;
          }else{
              if($cecquito->semaforopresup!='1')
                 $this->adderror('ceco','Este colector ['.$this->ceco.'] Ya esta cerrado y no esta activo ');
              return ; 
          }
      }ELSEIF($this->tipimputacion=='T'){//verificando la OT
         $orden= explode('-', $this->ceco);
         if(count($orden)==0){
         $this->adderror('ceco','El formato de imputacion no es el correcto');return;
         
                    }
         $registroorden=Ot::model()->findByNumero($orden[0]);
         if(is_null($registroorden)){
            $this->adderror('ceco','Esta orden no existe');return;
          }else{
              if(!in_array($orden[1],$registroorden->listaitems()))
                $this->adderror('ceco','El item ['.$orden[1].'] indicado en la orden no existe');return; 
               
          }
           
    
      }else{
          $this->adderror('tipimputacion','Este tipo de imputación aun no esta implementado');return;
      }
          
  }

	public function imputado(){
            return  yii::app()->db->createCommand()->
                     select('sum(t.monto) ')->
                     from('{{ccgastos}} t')->
                     where("codocuref=:vcoddocu and idref=:vid ",array(":vcoddocu"=>$this->coddocu,":vid"=>$this->id))->                    
                     queryScalar();
        }	 
   
   public function aftersave(){
       //veridfica que los 
       return parent::aftersave();
   }    
}