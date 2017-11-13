<?php
class Controlactivos extends ModeloGeneral
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ControlActivos the static model class
	 */
    CONST ESTADO_CREADO='10';
    CONST ESTADO_APROBADO='20';
        CONST ESTADO_ANULADO='90';
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return '{{controlactivos}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('tipo', 'required', 'message'=>'Debes de llenar el tipo de solicitud'),
			array('numeroref', 'length', 'max'=>25),
			array('numeroref', 'length', 'min'=>3),
			array('codep', 'required', 'message'=>'Llena la referencia destino'),
			array('codepanterior', 'required', 'message'=>'Llena la referencia origen'),
			array('codcentro', 'required', 'message'=>'Llena el centro donde se gestionara'),
			array('fecha', 'required', 'message'=>'Llena la fecha '),
                    array('fechaap', 'safe', 'on'=>'update'),
			array('comentario', 'required', 'message'=>'Escribe el detalle'),
			//array('codestado', 'required', 'message'=>'Lldocueena la referencia origen'),
			//array('documento', 'required', 'message'=>'Indica el documento de referencia'),
			//array('numeroref', 'required', 'message'=>'Llena el numero de refernc'),
			array('solicitante', 'required', 'message'=>'Indica quien esta solicitando'),
			
			//array('codobraencurso', 'length', 'max'=>12),
			array('ccanterior, ccactual', 'length', 'max'=>10),
			
			//array('numformato', 'length', 'max'=>17),
			//array('codestado', 'length', 'max'=>2),
			//array('almacen, creadopor, modificadopor', 'length', 'max'=>25),
			//array('valesalida', 'length', 'max'=>30),
			//array('ocompra, creadoel, modificadoel', 'length', 'max'=>20),
			//array('coddocu, codepanterior, codep, documento', 'length', 'max'=>3),
			//array('codlugaranterior, codlugarnuevo', 'length', 'max'=>6),
		//	array('codcentro, solicitante', 'length', 'max'=>4),
			array('fechaan, codocuan, codcenan,numerodocan,documento', 'safe','on'=>'cambioestado'), 
                     array('codestado', 'safe', 'on'=>'estatus'),
                         array('idactivo, fecha,  comentario', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idactivo, tipo, guiaremision, numerofactura, fecha, idemplazamientoactual, idemplazamientoanterior, codobraencurso, ccanterior, ccactual, comentario, numformato, idformato, codestado, almacen, valesalida, ocompra, creadopor, creadoel, modificadopor, modificadoel, coddocu, codepanterior, codep, codlugaranterior, codlugarnuevo, codcentro, solicitante, documento, numeroref', 'safe', 'on'=>'search'),
		);
	}
    public $maximovalor;
	public function beforeSave() {
		if ($this->isNewRecord) {									
			$this->codestado=self::ESTADO_CREADO;
			$this->coddocu='102';
			$command = Yii::app()->db->createCommand("select count(idformato)  from  {{controlactivos}} where   CODcentro='".$model->codcentro."'"); 
			$siguiente=$command->queryScalar()+1;		
			$this->numformato=$this->codtipoop.'-'.$this->codcentro.'-'.str_pad($siguiente.'',5,"0",STR_PAD_LEFT);
										
		} else
		{
                    if($this->cambiocampo('codestado')){
                        $this->setScenario('cambioestado');
                        IF($this->codestado==self::ESTADO_APROBADO){//SI SE APRUEBA EL PROCESO
                            $this->actualizainventario();
                        }
                        IF($this->codestado==self::ESTADO_ANULADO){//SI SE ANULA EL PROCESO
                            if($this->oldVal('codestado')==self::ESTADO_APROBADO) //SI  seha anulado un proceso que ya estaba aprobado 
                            $this->revierteinventario();
                        }
                        IF($this->codestado==self::ESTADO_CREADO){//UNICA POSIBILIDAD QUE SE HAYA REVERTIDO EL PROCESO
                            $this->revierteinventario();
                        }
                        
                    }
		}
		return parent::beforeSave();
	}
	
	
	
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'barcoactual'=>array(self::BELONGS_TO, 'Embarcaciones', 'codep'),
		'barcoanterior'=>array(self::BELONGS_TO, 'Embarcaciones', 'codepanterior'),
		'centro'=>array(self::BELONGS_TO, 'Centros', 'codcentro'),
		//'estado'=>array(self::BELONGS_TO, 'Estado', 'codestado'),
		'solicitante'=>array(self::BELONGS_TO, 'Trabajadores', 'codigotra'),
		'inventario'=>array(self::BELONGS_TO, 'Inventario', 'idactivo'),
		'tipoop'=>array(self::BELONGS_TO, 'Tipoop', 'codtipoop'),
                    'estado' => array(self::BELONGS_TO, 'Estado', array('codestado'=>'codestado','coddocu'=>'codocu')),

		);
	}

  private function actualizainventario(){ 
     if(!$this->isNewRecord)  {
         //primero guardar los valores originales antes de modificar el registro de inventario
         //$this->setScenario('actualizainventario');
         $registroinv=$this->inventario;
         $registroinv->setScenario('proceso');
        
         $this->setAttributes(array(
                                            'codestadoan'=>$registroinv->codestado,
                                             'fechaan'=>$registroinv->fecha,
                                             'codocuan'=>$registroinv->coddocu,
                                            'codcenan'=>$registroinv->codpropietario,
                                               'numerodocan'=>$registroinv->numerodocumento,
                                                 ));
         $registroinv->setAttributes(array(
                                            'codestado'=>$this->tipoop->codestado2,
                                             'fecha'=>(is_null($this->fechaap))?$this->fecha:$this->fechaap,
                                             'coddocu'=>$this->documento,
                                             'codpropietario'=>$this->codcentro,
                                               'numerodocumento'=>$this->numeroref,
                                                 ));
        $registroinv->save();
     } 
  }

  private function revierteinventario(){ //reveierte el inventario 
     if(!$this->isNewRecord)  {
         //primero guardar los valores originales antes de modificar el registro de inventario
         //$this->setScenario('actualizainventario');
         $registroinv=$this->inventario;
         $registroinv->setScenario('proceso');
        
         $registroinv->setAttributes(array(
                                            'codestado'=>$this->codestadoan,
                                             'fecha'=>$this->fechaan,
                                             'coddocu'=>$this->codocuan,
                                               'numerodocumento'=>$this->numerodocan,
                                                'codpropietario'=>$this->codcenan,
                                                 ));
          $this->setAttributes(array(
                                            'codestadoan'=>NULL,
                                             'fechaan'=>NULL,
                                             'codocuan'=>NULL,
                                               'numerodocan'=>NULL,
                                                'codcenan'=>null
                                                 ));
        $registroinv->save();
     } 
  }
  
  
  
  
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idactivo' => 'Activo',
                    'codpropietario' => 'Propiet',
			'tipo' => 'Tipo Proc ',
			'guiaremision' => 'G. R.',
			'numerofactura' => 'Num Fac.',
			'fecha' => 'Fecha ',
			'idemplazamientoactual' => 'Idemplazamientoactual',
			'idemplazamientoanterior' => 'Idemplazamientoanterior',
			'codobraencurso' => 'Obr. Curso',
			'ccanterior' => 'Cc Ori',
			'ccactual' => 'Cc Dest',
			'comentario' => 'Comentario',
			'numformato' => 'Numero',
			'idformato' => 'Idformato',
			'codestado' => 'Estado',
			'almacen' => 'Almacen',
			'valesalida' => 'V. Salida',
			'ocompra' => 'O. Compra',
			'creadopor' => 'Creadopor',
			'creadoel' => 'Creadoel',
			'modificadopor' => 'Modificadopor',
			'modificadoel' => 'Modificadoel',
			'coddocu' => 'Doc',
			'codepanterior' => 'Dep ant.',
			'codep' => 'Dep Dest.',
			'codlugaranterior' => 'Lug Ant',
			'codlugarnuevo' => 'Lug. Nuevo',
			'codcentro' => 'Centro',
			'solicitante' => 'Solicit',
			'documento' => 'Documento',
			'numeroref' => 'N doc',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idactivo',$this->idactivo,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('guiaremision',$this->guiaremision,true);
		$criteria->compare('numerofactura',$this->numerofactura,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('idemplazamientoactual',$this->idemplazamientoactual,true);
		$criteria->compare('idemplazamientoanterior',$this->idemplazamientoanterior,true);
		$criteria->compare('codobraencurso',$this->codobraencurso,true);
		$criteria->compare('ccanterior',$this->ccanterior,true);
		$criteria->compare('ccactual',$this->ccactual,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('numformato',$this->numformato,true);
		$criteria->compare('idformato',$this->idformato,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('almacen',$this->almacen,true);
		$criteria->compare('valesalida',$this->valesalida,true);
		$criteria->compare('ocompra',$this->ocompra,true);




		$criteria->compare('coddocu',$this->coddocu,true);
		$criteria->compare('codepanterior',$this->codepanterior,true);
		$criteria->compare('codep',$this->codep,true);
		$criteria->compare('codlugaranterior',$this->codlugaranterior,true);
		$criteria->compare('codlugarnuevo',$this->codlugarnuevo,true);
		$criteria->compare('codcentro',$this->codcentro,true);
		$criteria->compare('solicitante',$this->solicitante,true);
		$criteria->compare('documento',$this->documento,true);
		$criteria->compare('numeroref',$this->numeroref,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function search_poractivo($canica)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idactivo',$this->idactivo,true);
		$criteria->addcondition('idactivo='.(integer)$canica);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('guiaremision',$this->guiaremision,true);
		$criteria->compare('numerofactura',$this->numerofactura,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('idemplazamientoactual',$this->idemplazamientoactual,true);
		$criteria->compare('idemplazamientoanterior',$this->idemplazamientoanterior,true);
		$criteria->compare('codobraencurso',$this->codobraencurso,true);
		$criteria->compare('ccanterior',$this->ccanterior,true);
		$criteria->compare('ccactual',$this->ccactual,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('numformato',$this->numformato,true);
		$criteria->compare('idformato',$this->idformato,true);
		$criteria->compare('codestado',$this->codestado,true);
		$criteria->compare('almacen',$this->almacen,true);
		$criteria->compare('valesalida',$this->valesalida,true);
		$criteria->compare('ocompra',$this->ocompra,true);




		$criteria->compare('coddocu',$this->coddocu,true);
		$criteria->compare('codepanterior',$this->codepanterior,true);
		$criteria->compare('codep',$this->codep,true);
		$criteria->compare('codlugaranterior',$this->codlugaranterior,true);
		$criteria->compare('codlugarnuevo',$this->codlugarnuevo,true);
		$criteria->compare('codcentro',$this->codcentro,true);
		$criteria->compare('solicitante',$this->solicitante,true);
		$criteria->compare('documento',$this->documento,true);
		$criteria->compare('numeroref',$this->numeroref,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}