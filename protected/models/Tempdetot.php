<?php

class Tempdetot extends ModeloGeneral
{
	
    public $numeroingreso; //campo auxiliar para recolactar las notas dE entrada para asociar componentes ingresados  dentro de la orden 
    public $canticomp;
    /**
	 * @return string the associated database table name
	 */
    
    public function init(){
        $this->documento='891';
        return parent::init();
    }
	public function tableName() 
	{
		return '{{tempdetot}}';
	}

         public function behaviors()
	{
		//var_dump(yii::app()->settings->get('general','general_nregistrosporcarpeta'));die();
            
            return array(
			// Classname => path to Class
			/*'adjuntos'=>array(
				'class'=>'ext.behaviors.TomaFotosBehavior',
                            '_codocu'=>'891',
                            '_ruta'=>yii::app()->settings->get('general','general_directorioimg'),
                            '_numerofotosporcarpeta'=>yii::app()->settings->get('general','general_nregistrosporcarpeta')+0,
                            '_extensionatrabajar'=>'.jpg',
                            '_id'=>$this->id,
                                )*/);

	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('numeroingreso,canticomp','safe','on'=>'ingreso'),
                   // array('codmaster','exist','allowEmpty' => false,'attributeName' => 'codigo', 'className' => 'Masterequipo','message'=>'Este código de componente no existe'),
                     array('codmaster,canticomp','required','on'=>'ingreso'),
                      array('codmaster','checkingreso','on'=>'ingreso'),
                    
                    array('idlabor','exist','allowEmpty' => true, 'attributeName' => 'id', 'className' => 'Listamateriales','message'=>'Esta actividad no está registrada : '.gettype($this->idlabor)),
		array('idlabor', 'checkcamposdefecto'),
			//array('id, hidorden, item, textoactividad, codresponsable, fechainic, fechafinprog, fechacre, flaginterno, codocu, codestado, codmaster, idinventario, iduser, idusertemp, idstatus', 'required'),
		array('idinventario, iduser, idusertemp, idstatus', 'numerical', 'integerOnly'=>true),
			array('idlabor,codocu,avance,codestado,nhoras,fechainic,fechafinprog,fechafin,'
                            . 'fechainiprog,idaux,nhombres,codmon,monto,codmaster,tipo,cc,txt,codgrupoplan', 'safe'),
				array('id, hidorden', 'length', 'max'=>20),
			array('item', 'length', 'max'=>3),
                    array('codestado', 'length', 'max'=>3,'message'=>' el valor es '.$this->codestado),
			array('textoactividad', 'length', 'max'=>40),
			array('codresponsable', 'length', 'max'=>8),
			array('flaginterno', 'length', 'max'=>1),
			array('codocu', 'length', 'max'=>3),
			array('codocu,codestado,nhoras,nhombres,codgrupoplan', 'safe'),
			array('codmaster', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hidorden, item, textoactividad, codresponsable, fechainic, fechafinprog, fechacre, flaginterno, codocu, codestado, codmaster, idinventario, iduser, idusertemp, idtemp, idstatus', 'safe', 'on'=>'search'),
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
			'ot' => array(self::BELONGS_TO, 'Ot', 'hidorden'),
			'cecosto'=> array(self::BELONGS_TO, 'Cc', 'cc'),
			'trabajadores' => array(self::BELONGS_TO, 'Trabajadores', 'codresponsable'),
			'masterequipo' => array(self::BELONGS_TO, 'Masterequipo', 'codmaster'),
			'grupoplan' => array(self::BELONGS_TO, 'Grupoplan', 'codgrupoplan'),
			'estado'=>array(self::BELONGS_TO,'Estado',array('codestado'=>'codestado','codocu'=>'codocu')),
                    'listamateriales'=> array(self::BELONGS_TO, 'Listamateriales', 'idlabor'),
                          'nrecursos' => array(self::STAT, 'Tempdesolpe', 'hidlabor'),
                    'regimen' => array(self::BELONGS_TO, 'Regimen', 'hidregimen'),
                    
                   //  'nrecursos'=>array(self::STAT, 'Tempdesolpe', array('idaux'=>'hidlabor')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hidorden' => 'Hidorden',
			'item' => 'Item',
			'textoactividad' => 'Textoactividad',
			'codresponsable' => 'Codresponsable',
			'fechainic' => 'Fechainic',
			'fechafinprog' => 'Fechafinprog',
			'fechacre' => 'Fechacre',
			'flaginterno' => 'Flaginterno',
			'codocu' => 'Codocu',
			'codestado' => 'Codestado',
			'codmaster' => 'Codmaster',
			'idinventario' => 'Idinventario',
			'iduser' => 'Iduser',
			'idusertemp' => 'Idusertemp',
			'idtemp' => 'Idtemp',
			'idstatus' => 'Idstatus',
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
		$criteria->compare('hidorden',$this->hidorden,true);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('textoactividad',$this->textoactividad,true);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('fechainic',$this->fechainic,true);
		$criteria->compare('fechafinprog',$this->fechafinprog,true);
		$criteria->compare('fechacre',$this->fechacre,true);
		$criteria->compare('flaginterno',$this->flaginterno,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('codmaster',$this->codmaster,true);
		$criteria->compare('idinventario',$this->idinventario);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('idusertemp',$this->idusertemp);
		$criteria->compare('idtemp',$this->idtemp,true);
		$criteria->compare('idstatus',$this->idstatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search_por_ot($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->addCondition("hidorden=".$id);
          $criteria->addCondition("idstatus > -1"); //no mostrar los eliminados

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tempdetot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        public function beforeSave() {
            IF($this->idlabor==0)
                $this->idlabor=null;
            if($this->isNewRecord) {
                 $this->codmon = yii::app()->settings->get('general', 'general_monedadef');
                }
                            /*if($this->cambiocampo('nhoras')	or $this->cambiocampo('codgrupoplan'))
                                {
                                  //VAR_DUMP($this->grupoplan); DIE();
                                $this->monto=$this->nhoras*$this->nhombres*
                                            yii::app()->tipocambio->getcambio($this->grupoplan->codmon,$this->codmon)*
                                            $this->grupoplan->tarifa;
                                }*/
               /* if(!is_null($this->idlabor)){
                    if($this->cambiocampo('idlabor')){
                      //$this->cargarecursos(); 
                        echo "cambio csm"; 
                        var_dump($this->oldAttributes);
                        var_dump($this->oldVal('idlabor'));
                         var_dump($this->idlabor);die();
                    }
                }  */              
                                
                                
                               return parent::beforeSave();
				}
        
                                
             public function afterSave() {
            
                
	}                    
                                
                                
       public function imposiblescambios(){
         return  array(
              '98'=>array('10','20','12','99','14','16'),
             '99'=>array('16','17'),
              '10'=>array('16','17'),
              '20'=>array('16','17'),
              '12'=>array('99','17'),
              '14'=>array('99','10','17'),
              '16'=>array('98','10','99'),
              '17'=>array('98','10','99','20','12','14'),
          );
      }
                                
    PUBLIC FUNCTION nrecursos(){
        return count($this->recursos());
    }   
    
    public function recursos(){
        return Desolpe::model()->findAll("hidlabor=:vidlabor",array(":vidlabor"=>$this->idaux));
        
    }
         
    public static function colocaarchivox($fullFileName,$userdata=null) {
        $filename=$fullFileName;
        $extension=pathinfo($filename)['extension'];
        $registro=self::model()->findByPk($userdata);
        $extension= strtolower($extension);
        $registro->agregacomportamientoarchivo($extension);               
              
       $registro->colocaarchivo($fullFileName);
    }
    
    public function agregacomportamientoarchivo($extension){
         $comportamiento=new TomaFotosBehavior();
        $comportamiento->_codocu='891';
         $comportamiento->_ruta=yii::app()->settings->get('general','general_directorioimg');
         $comportamiento->_numerofotosporcarpeta=yii::app()->settings->get('general','general_nregistrosporcarpeta')+0;
          $comportamiento->_extensionatrabajar=$extension;
           $comportamiento->_id=$this->id; 
           $this->attachbehavior('adjuntador',$comportamiento );  
    }
    
    //7carga los materiales relacinados a la tabla tempdesolpe a al actividad de la lista materiales 
    public function cargarecursosext($idlista=null,$atributos=null){
        ///devuelve primero los registros hijos para ver si tiene hijos 
      if(is_null($atributos) or is_null($idlista))  {
          return;
      }else{
       $registros=  Listamateriales::model()->findByPk($idlista)->hijos;
       //var_dump($registros);die();
          foreach($registros as $fila){
            $recurso=New Tempotconsignacion('buffer');
            $recurso->valorespordefecto();
             $recurso->setAttributes(
                            array(
                                'centro'=>$atributos['centro'],
                                'codal'=>$atributos['codal'],
                                'idusertemp'=>yii::app()->user->id,
                                //'hcodoc'=>$this->ot->codocu, //()
                                'codart'=>$fila->codigo,
                                'um'=>$fila->um,
                                'cant'=>$fila->cant,
                                'descripcion'=>$fila->maestro->descripcion,
                               // 'codocu'=>'350',//()
                                // 'tipsolpe'=>'M',//()
                                'est'=>'99',
                                'hidot'=>$this->ot->id,
                                'hidetot'=>$this->idaux,
                                'idusertemp'=>yii::app()->user->id,
                                // 'tipsolpe'=>'M',
                                'idstatus'=>0, 
                            )
                        
                     );
            
             $recurso->item=$this->ot->getNextItemConsignacion();
           
            if(!$recurso->save())
                MiFactoria::Mensaje ('error',
                        Yii::app()->mensajes->
                        getErroresItem($recurso->geterrors())
                        );
            
        } 
      }
        
        
        
        
    }
    
     public function cargarecursos($idlista=null,$atributos=null){
        ///devuelve primero los registros hijos para ver si tiene hijos 
      if(is_null($atributos) or is_null($idlista))  {
          return;
      }else{
       $registros=  Listamateriales::model()->findByPk($idlista)->hijos;
       //var_dump($registros);die();
          foreach($registros as $fila){
            $recurso=New Tempdesolpe('buffer');
            $recurso->valorespordefecto();
             $recurso->setAttributes(
                            array(
                               // 'centro'=>$recurso->getvaluedefault('centro'),
                                //'codal'=>$recurso->getvaluedefault('codal'),
                                'idusertemp'=>yii::app()->user->id,
                                'hcodoc'=>$this->ot->codocu,
                                'codart'=>$fila->codigo,
                                'um'=>$fila->um,
                                'cant'=>$fila->cant,
                                'txtmaterial'=>$fila->maestro->descripcion,
                                'codocu'=>'350',
                                 'tipsolpe'=>'M',
                                'est'=>'99',
                                'hidot'=>$this->ot->id,
                                'hidlabor'=>$this->idaux,
                                 'tipsolpe'=>'M',
                                'idstatus'=>0,
                            )
                     );
             //ahora sobreescribimos lo ms avlore   ue pasaron como parametro en el array
             if(!is_null($atributos)){
                 foreach($atributos as $clave=>$valor){
                     $recurso->{$clave}=$valor;
                 }
             }
             
             
            if(!$recurso->save())
                MiFactoria::Mensaje ('error',
                        Yii::app()->mensajes->
                        getErroresItem($recurso->geterrors())
                        );
            
        } 
      }
        
        
        
        
    }
    
    public function checkingreso(){
             //verificando el numero de ingreso 
         $ingreso= explode('-', $this->numeroingreso);
         if(count($ingreso)!=3){
         $this->adderror('numeroingreso','El formato de Ingreso  no es el correcto');return;
         
                    }
         $registroingreso=Ne::findByNumero($ingreso[0],$ingreso[1]);
         if(is_null($registroingreso)){
            $this->adderror('numeroingreso','Este numero de ingreso  no existe');return;
          }else{
              if(!in_array($ingreso[2],$registroingreso->listaitems()))
                $this->adderror('numeroingreso','El item ['.$ingreso[2].'] indicado en el ingreso no existe');return; 
               
          }
        //verificando el componente 
          $registrodetalle=Detgui::model()->findByIdguia($registroingreso->id,$ingreso[1]);
            if(is_null($registrodetalle)){
            $this->adderror('numeroingreso','El item especificado  no existe');return;
          }else{
              
              if(is_null(Masterequipo::model()->findByCodigo(trim($registrodetalle->c_codgui))))
               $this->adderror('numeroingreso','El codigo del componente ['.$registrodetalle->c_codgui.'] no pertenece al registro maestro');return;
         
          }
          
          //AHORA  SI LOS OBJETOS DE REFERFNCI COINCIDEN EN EL ENCABEZADO DE LAORDEN Y EL DETLLE DE L INGRESO
          $regot=Ot::model()->findByPk($this->hidorden);
          IF(!($regot->codobjeto==$registroingreso->codob))
           $this->adderror('numeroingreso','El objeto referencia del ingreso no coindice con le objeto de la Orden ');return;
         
          //AHROA LAS CANTIDADES
         if($this->canticomp > $registroingreso->asignadosot-$registroingreso->n_cangui)
             $this->adderror('n_cangui','La cantidada asignada ['.$this->canticomp.'] sobrepasa  a la diferencia en lacantidad ingresada ['.$registroingreso->n_cangui.'] y la cantidada asignada ['.$registroingreso->asignadosot.']');return;
         
         
             
             
                    }

    
     public function checkcamposdefecto(){
             
             if($this->idlabor >0){
                 $reg=new Tempdesolpe();
                                    if(!$reg->hasvaluedefault('codal')){
                                                 
                                                $this->adderror('idlabor','Para seleccionar Hojas de ruta, debe poner valores por defecto al registro de materiales (Codigo de almacen)');
                                    }
                               if(!$reg->hasvaluedefault('centro')){
                                                 
                                                $this->adderror('idlabor','Para seleccionar Hojas de ruta, debe poner valores por defecto al registro de materiales (Centro)');
                                    }
                                    
                                                 unset($reg);
                                                
                                    
                 }
             

                    }
    
                    
     public function registracomponente($idne,$cant, $verificar=true){
         
         if(!isnull($this->codob)){  
            if($verificar){
               $registro= Detgui::model()->findByPk($idne);
               if(!is_null($registro)){
                   if($registro->n_cangui-$registro->asignadosot <= $cant){
                      for( $i= 1 ; $i <= $cant ; $i++ ) {
                            $modelo=new Neot;
                            $modelo->setAttributes(
                                array(
                                    'hidne'=>$idne,
                                    'hidot'=>$this->id,
                                     'cant'=>1,
                                    )
                                                );
                                    $modelo->save();
                            } 
                    }
               }
            }else{
                for( $i= 1 ; $i <= $cant ; $i++ ) {
                            $modelo=new Neot;
                            $modelo->setAttributes(
                                array(
                                    'hidne'=>$idne,
                                    'hidot'=>$this->id,
                                     'cant'=>1,
                                    )
                                                );
                                    $modelo->save();
                            } 
            }
             
         }
         
     }
     
     
     
}
