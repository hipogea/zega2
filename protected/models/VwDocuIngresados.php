<?php

/**
 * This is the model class for table "vw_docu_ingresados".
 *
 * The followings are the available columns in table 'vw_docu_ingresados':
 * @property double $montomoneda
 * @property integer $id
 * @property string $codprov
 * @property string $fecha
 * @property string $fechain
 * @property string $correlativo
 * @property string $tipodoc
 * @property string $moneda
 * @property string $descorta
 * @property string $codepv
 * @property double $monto
 * @property string $codgrupo
 * @property string $codresponsable
 * @property string $creadopor
 * @property string $creadoel
 * @property string $texv
 * @property string $docref
 * @property string $codteniente
 * @property string $codlocal
 * @property string $numero
 * @property string $cod_estado
 * @property string $codocu
 * @property string $codtenencia
 * @property string $codtenor
 * @property string $codsoc
 * @property integer $idproceso
 * @property string $fechacrea
 * @property string $fechanominal
 * @property string $fechafin
 * @property integer $hidtra
 * @property integer $hidproc
 * @property string $codocuref
 * @property string $numdocref
 * @property string $comentario
 * @property string $codtenenciaproc
 * @property integer $idtenenciasproc
 * @property string $final
 * @property integer $hidevento
 * @property integer $nhorasnaranja
 * @property integer $nhorasverde
 * @property integer $hidprevio
 * @property string $descripcion
 * @property string $ap
 * @property string $am
 * @property string $nombres
 */
class VwDocuIngresados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $tiempopasado;
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
			array('montomoneda, id, codprov, fecha, fechain, correlativo, tipodoc, moneda, descorta, codepv, monto, codgrupo, codresponsable, creadopor, creadoel, texv, docref, codteniente, codlocal, numero, cod_estado, codocu, codtenencia, codtenor, codsoc, idproceso, fechacrea, fechanominal, fechafin, hidtra, hidproc, codocuref, numdocref, comentario, codtenenciaproc, idtenenciasproc, final, hidevento, nhorasnaranja, nhorasverde, hidprevio, descripcion, ap, am, nombres', 'safe', 'on'=>'search'),
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
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('montomoneda',$this->montomoneda);
		$criteria->compare('id',$this->id);
		$criteria->compare('codprov',$this->codprov,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('fechain',$this->fechain,true);
		$criteria->compare('correlativo',$this->correlativo,true);
		$criteria->compare('tipodoc',$this->tipodoc,true);
		$criteria->compare('moneda',$this->moneda,true);
		$criteria->compare('descorta',$this->descorta,true);
		$criteria->compare('codepv',$this->codepv,true);
		$criteria->compare('monto',$this->monto);
		$criteria->compare('codgrupo',$this->codgrupo,true);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('creadopor',$this->creadopor,true);
		$criteria->compare('creadoel',$this->creadoel,true);
		$criteria->compare('texv',$this->texv,true);
		$criteria->compare('docref',$this->docref,true);
		$criteria->compare('codteniente',$this->codteniente,true);
		$criteria->compare('codlocal',$this->codlocal,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('cod_estado',$this->cod_estado,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codtenencia',$this->codtenencia,true);
		$criteria->compare('codtenor',$this->codtenor,true);
		$criteria->compare('codsoc',$this->codsoc,true);
		$criteria->compare('idproceso',$this->idproceso);
		$criteria->compare('fechacrea',$this->fechacrea,true);
		$criteria->compare('fechanominal',$this->fechanominal,true);
		$criteria->compare('fechafin',$this->fechafin,true);
		$criteria->compare('hidtra',$this->hidtra);
		$criteria->compare('hidproc',$this->hidproc);
		$criteria->compare('codocuref',$this->codocuref,true);
		$criteria->compare('numdocref',$this->numdocref,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('codtenenciaproc',$this->codtenenciaproc,true);
		$criteria->compare('idtenenciasproc',$this->idtenenciasproc);
		$criteria->compare('final',$this->final,true);
		$criteria->compare('hidevento',$this->hidevento);
		$criteria->compare('nhorasnaranja',$this->nhorasnaranja);
		$criteria->compare('nhorasverde',$this->nhorasverde);
		$criteria->compare('hidprevio',$this->hidprevio);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('ap',$this->ap,true);
		$criteria->compare('am',$this->am,true);
		$criteria->compare('nombres',$this->nombres,true);

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
