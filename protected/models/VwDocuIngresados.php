<?php

class VwDocuIngresados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $color;
    public $tiempopasado;
    public $fechain1;
    public $fechanominal1;
	public function tableName()
	{
		return 'vw_docu_ingresados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codocu, codtenencia, fechacrea, fechanominal, hidtra, hidproc, codocuref, final', 'required'),
			array('id, idproceso, hidtra, hidproc, idtenenciasproc, hidevento, nhorasnaranja, nhorasverde, hidprevio', 'numerical', 'integerOnly'=>true),
			array('montomoneda, monto', 'numerical'),
			array('codprov', 'length', 'max'=>6),
			array('fecha', 'length', 'max'=>19),
			array('fechain', 'length', 'max'=>50),
			array('correlativo', 'length', 'max'=>8),
			array('tipodoc, moneda, codepv, codgrupo, codocu, codocuref, codtenenciaproc', 'length', 'max'=>3),
			array('descorta, nombres', 'length', 'max'=>25),
			array('codresponsable, codteniente, codlocal, codtenencia', 'length', 'max'=>4),
			array('creadopor', 'length', 'max'=>23),
			array('creadoel', 'length', 'max'=>15),
			array('docref', 'length', 'max'=>14),
			array('numero, numdocref', 'length', 'max'=>20),
			array('cod_estado', 'length', 'max'=>2),
			array('codtenor, codsoc, final', 'length', 'max'=>1),
			array('descripcion, ap', 'length', 'max'=>30),
			array('am', 'length', 'max'=>35),
			array('texv, fechafin, comentario', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codprov, fecha,'
                            . ' fechain, fechain1,tipoactivo, subproceso,fechanominal1,correlativo, tipodoc, '
                            . ' codepv, monto, codgrupo, codresponsable,'
                            . ' espeabierto,  docref, '
                            . ' codlocal, numero,  codtenencia,'
                            . '   fechacrea, fechanominal, '
                            . 'fechafin, hidtra, hidproc, codocuref, numdocref,  '
                            . ' final, hidevento, '
                            . 'nhorasnaranja, nhorasverde, hidprevio, descripcion, ap,'
                            . ' am, nombres', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'montomoneda' => 'Montomoneda',
			'id' => 'ID',
			'codprov' => 'Codprov',
			'fecha' => 'Fecha',
			'fechain' => 'Fechain',
			'correlativo' => 'Correlativo',
			'tipodoc' => 'Tipodoc',
			'moneda' => 'Moneda',
			'descorta' => 'Descorta',
			'codepv' => 'Codepv',
			'monto' => 'Monto',
			'codgrupo' => 'Codgrupo',
			'codresponsable' => 'Codresponsable',
			'creadopor' => 'Creadopor',
			'creadoel' => 'Creadoel',
			'texv' => 'Texv',
			'docref' => 'Docref',
			'codteniente' => 'Codteniente',
			'codlocal' => 'Codlocal',
			'numero' => 'Numero',
			'cod_estado' => 'Cod Estado',
			'codocu' => 'Codocu',
			'codtenencia' => 'Codtenencia',
			'codtenor' => 'Codtenor',
			'codsoc' => 'Codsoc',
			'idproceso' => 'Idproceso',
			'fechacrea' => 'Fechacrea',
			'fechanominal' => 'Fechanominal',
			'fechafin' => 'Fechafin',
			'hidtra' => 'Hidtra',
			'hidproc' => 'Hidproc',
			'codocuref' => 'Codocuref',
			'numdocref' => 'Numdocref',
			'comentario' => 'Comentario',
			'codtenenciaproc' => 'Codtenenciaproc',
			'idtenenciasproc' => 'Idtenenciasproc',
			'final' => 'Final',
			'hidevento' => 'Hidevento',
			'nhorasnaranja' => 'Nhorasnaranja',
			'nhorasverde' => 'Nhorasverde',
			'hidprevio' => 'Hidprevio',
			'descripcion' => 'Descripcion',
			'ap' => 'Ap',
			'am' => 'Am',
			'nombres' => 'Nombres',
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
		$criteria=new CDbCriteria;

		//$criteria->compare('id',$this->id);
		//$criteria->compare('codepv',$this->codepv,true);
		//$criteria->compare('fecha',$this->fecha,true);
               // $criteria->compare('color',$this->color,true);
		//$criteria->compare('fechain',$this->fechain,true);
		$criteria->compare('correlativo',$this->correlativo,true);
		$criteria->compare('tipodoc',$this->tipodoc,true);
                $criteria->compare('color',$this->color,true);
		//$criteria->compare('moneda',$this->moneda,true);
		//$criteria->compare('descorta',$this->descorta,true);
		$criteria->compare('codepv',$this->codepv,true);
		$criteria->compare('monto',$this->monto);
		//$criteria->compare('fechavencimiento',$this->codgrupo,true);
		//$criteria->compare('codresponsable',$this->codresponsable,true);
		//$criteria->compare('texv',$this->texv,true);
		$criteria->compare('docref',$this->docref,true);
		//$criteria->compare('codteniente',$this->codteniente,true);
		$criteria->compare('codlocal',$this->codlocal,true);
		$criteria->compare('numero',$this->numero,true);
		//$criteria->compare('cod_estado',$this->cod_estado,true);
		$criteria->compare('codocu',$this->codocu,true);
		//$criteria->compare('codigotra',$this->codigotra,true);
		$criteria->compare('fechacrea',$this->fechacrea,true);
		$criteria->compare('codocuref',$this->codocuref,true);
		$criteria->compare('nhorasnaranja',$this->nhorasnaranja);
		$criteria->compare('nhorasverde',$this->nhorasverde);
                $criteria->compare('espeabierto',$this->espeabierto);
		$criteria->compare('numdocref',$this->numdocref,true);
                $criteria->compare('tipoactivo',$this->tipoactivo,true);
                 $criteria->compare('subproceso',$this->subproceso,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('ap',$this->ap,true);
		$criteria->compare('despro',$this->despro,true);
		//$criteria->compare('rucpro',$this->rucpro,true);
		$criteria->compare('final',$this->final,true);
                //$criteria->compare('idproceso',$this->idproceso,true);
                if(isset($_SESSION['sesion_Clipro']))
                    {
			$criteria->addInCondition('codprov', $_SESSION['sesion_Clipro'], 'AND');
			  } ELSE {
				$criteria->compare('codprov',$this->codprov,true);
                      }
                      
                     if(isset($_SESSION['sesion_Tenenciasproc']))
                    {
			$criteria->addInCondition('idproceso', $_SESSION['sesion_Tenenciasproc'], 'AND');
			  } ELSE {
				$criteria->compare('idproceso',$this->idproceso);
                      }
                      
                      
                      
                      
                      
                     if(isset($_SESSION['sesion_Tenencias']))
                    {
			$criteria->addInCondition('codtenencia', $_SESSION['sesion_Tenencias'], 'AND');
			  } ELSE {
				$criteria->compare('codtenencia',$this->codtenencia,true);
                      }  
                      
                      
                       if(isset($_SESSION['sesion_Eventos']))
                    {
			$criteria->addInCondition('hidproc', $_SESSION['sesion_Eventos'], 'AND');
			  } ELSE {
				$criteria->compare('hidproc',$this->hidproc,true);
                      }  
                      
                      
                      
                      
                if(isset($_SESSION['sesion_Docingresados']))
                    {
			$criteria->addInCondition('id', $_SESSION['sesion_Docingresados'], 'AND');
			  } ELSE {
				$criteria->compare('id',$this->id,true);
                      }      
                      
                      
                      
               if(isset($_SESSION['sesion_Embarcaciones']))
                    {
			$criteria->addInCondition('codepv', $_SESSION['sesion_Embarcaciones'], 'AND');
			  } ELSE {
				$criteria->compare('codepv',$this->codepv,true);
                      } 
                      
                     
                                                
                            if((isset($this->fechanominal) && trim($this->fechanominal) != "") && (isset($this->fechanominal1) && trim($this->fechanominal1) != ""))  {
		           
                        $criteria->addBetweenCondition('fechanominal', ''.$this->fechanominal.'', ''.$this->fechanominal1.''); 
						//VAR_DUMP($criteria->params);DIE();
						}   
                                                
                                                if((isset($this->fechain) && trim($this->fechain) != "") && (isset($this->fechain1) && trim($this->fechain1) != ""))  {
		           
                        $criteria->addBetweenCondition('fechain', ''.$this->fechain.'', ''.$this->fechain1.''); 
						//VAR_DUMP($criteria->params);DIE();
						}  
                                                
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwDocuIngresados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
    public  function datosParaLineaTiempo($idproc)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		
		$criteria->addCondition("id=:vhidproc");
                $criteria->params=array(":vhidproc"=>$idproc);
                $criteria->order = 'idproceso ASC';
		$grupo= new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
                return $grupo->getdata();
	}  
        
     public function afterfind(){
         if(strtotime($this->fechafin)>0){
             $this->tiempopasado= strtotime($this->fechafin)-strtotime($this->fechacrea);
         }else{
             $this->tiempopasado= time()-strtotime($this->fechacrea);
         }
         
         
         
         return parent::afterfind();
     }   
     
     
     public function datosparafrafo($idproc){
        $registros= $this->datosParaLineaTiempo($idproc);
        foreach($registros as $fila){
            
                     }
     
        
              }

}
