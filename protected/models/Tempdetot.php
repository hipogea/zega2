<?php

class Tempdetot extends ModeloGeneral
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tempdetot}}';
	}

         public function behaviors()
	{
		//var_dump(yii::app()->settings->get('general','general_nregistrosporcarpeta'));die();
            
            return array(
			// Classname => path to Class
			'adjuntos'=>array(
				'class'=>'ext.behaviors.TomaFotosBehavior',
                            '_codocu'=>'210',
                            '_ruta'=>yii::app()->settings->get('general','general_directorioimg'),
                            '_numerofotosporcarpeta'=>yii::app()->settings->get('general','general_nregistrosporcarpeta')+0,
                            '_extensionatrabajar'=>'.jpg',
                            '_id'=>$this->id,
                                ));

	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
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
			'ceco'=> array(self::BELONGS_TO, 'Cc', 'cc'),
			'trabajadores' => array(self::BELONGS_TO, 'Trabajadores', 'codresponsable'),
			'masterequipo' => array(self::BELONGS_TO, 'Masterequipo', 'codmaster'),
			'grupoplan' => array(self::BELONGS_TO, 'Grupoplan', 'codgrupoplan'),
			'estado'=>array(self::BELONGS_TO,'Estado',array('codestado'=>'codestado','codocu'=>'codocu')),
                    'listamateriales'=> array(self::BELONGS_TO, 'Listamateriales', 'idlabor'),
                          'nrecursos' => array(self::STAT, 'Tempdesolpe', 'hidlabor'),
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
                            if($this->cambiocampo('nhoras')	or $this->cambiocampo('codgrupoplan'))
                                {
                                    $this->monto=$this->nhoras*$this->nhombres*
                                            yii::app()->tipocambio->getcambio($this->grupoplan->codmon,$this->codmon)*
                                            $this->grupoplan->tarifa;
                                }
                if(!is_null($this->idlabor)){
                    if($this->cambiocampo('idlabor')){
                      $this->cargarecursos(); 
                    }
                }                
                                
                                
                               return parent::beforeSave();
				}
        
                                
             public function afterSave() {
            
                if(!is_null($this->idlabor)){
                   
                      $this->cargarecursos(); 
                   
                }            
                               return parent::afterSave();
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
         
    public function colocaarchivox($fullFileName,$userdata=null) {
       // $filename=$fullFileName;
        
       // $path_parts = pathinfo($fullFileName);
      // Yii::log(' ejecutando '.serialize($fullFileName),'error');
        $this->colocaarchivo($fullFileName);
    }
    
    //7carga los materiales relacinados a la tabla tempdesolpe a al actividad de la lista materiales 
    private function cargarecursos(){
        ///devuelve primero los registros hijos para ver si tiene hijos 
        $registros=  Listamateriales::model()->hijos;
        foreach($registros as $fila){
            $recurso=New Tempdesolpe('hojaruta');
             $recurso->setAttributes(
                            array(
                                'codcen'=>$recurso->getvaluedefault('centro'),
                                'codal'=>$recurso->getvaluedefault('codal'),
                                'idusertemp'=>yii::app()->user->id,
                                'hcodoc'=>$this->ot->codocu,
                                'codart'=>$fila->codigo,
                                'um'=>$fila->um,
                                'cant'=>$fila->cant,
                                'txtmaterial'=>$fila->maestro->descripcion,
                                
                            )
                     );
            
        }
        
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

    
    
    
}
