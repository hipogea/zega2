<?php

class VwDoci extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    
    public  $d_fechain1;
    public $color;
	public function tableName()
	{
		return 'vw_doci';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codocu, codtenencia, rucpro, final', 'required'),
			array('id, nhorasnaranja, nhorasverde', 'numerical', 'integerOnly'=>true),
			array('monto', 'numerical'),
			array('codprov', 'length', 'max'=>6),
			array('fecha, fechain', 'length', 'max'=>19),
			array('correlativo', 'length', 'max'=>8),
			array('tipodoc, codepv, codgrupo, codocu, codocuref', 'length', 'max'=>3),
			array('moneda, final', 'length', 'max'=>1),
			array('descorta', 'length', 'max'=>25),
			array('codresponsable, codteniente, codlocal, codtenencia', 'length', 'max'=>4),
			array('creadopor', 'length', 'max'=>23),
			array('creadoel', 'length', 'max'=>15),
			array('docref', 'length', 'max'=>14),
			array('numero, numdocref', 'length', 'max'=>20),
			array('cod_estado', 'length', 'max'=>2),
			array('descripcion, ap', 'length', 'max'=>30),
			array('despro', 'length', 'max'=>100),
			array('rucpro', 'length', 'max'=>11),
			array('texv, fechacrea', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,d_fechain1, codprov, fecha, fechain, correlativo, tipodoc, moneda, descorta, codepv, monto, codgrupo, codresponsable, creadopor, creadoel, texv, docref, codteniente, codlocal, numero, cod_estado, codocu, codtenencia, fechacrea, codocuref, nhorasnaranja, nhorasverde, numdocref, descripcion, ap, despro, rucpro, final', 'safe', 'on'=>'search'),
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
			'fechacrea' => 'Fechacrea',
			'codocuref' => 'Codocuref',
			'nhorasnaranja' => 'Nhorasnaranja',
			'nhorasverde' => 'Nhorasverde',
			'numdocref' => 'Numdocref',
			'descripcion' => 'Descripcion',
			'ap' => 'Ap',
			'despro' => 'Despro',
			'rucpro' => 'Rucpro',
			'final' => 'Final',
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

		//$criteria->compare('id',$this->id);
		//$criteria->compare('codepv',$this->codepv,true);
		$criteria->compare('fecha',$this->fecha,true);
		//$criteria->compare('fechain',$this->fechain,true);
		$criteria->compare('correlativo',$this->correlativo,true);
		$criteria->compare('tipodoc',$this->tipodoc,true);
		//$criteria->compare('moneda',$this->moneda,true);
		$criteria->compare('descorta',$this->descorta,true);
		$criteria->compare('codepv',$this->codepv,true);
		$criteria->compare('monto',$this->monto);
		//$criteria->compare('codgrupo',$this->codgrupo,true);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('texv',$this->texv,true);
		$criteria->compare('docref',$this->docref,true);
		$criteria->compare('codteniente',$this->codteniente,true);
		$criteria->compare('codlocal',$this->codlocal,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('cod_estado',$this->cod_estado,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('codtenencia',$this->codtenencia,true);
		$criteria->compare('fechacrea',$this->fechacrea,true);
		$criteria->compare('codocuref',$this->codocuref,true);
		$criteria->compare('nhorasnaranja',$this->nhorasnaranja);
		$criteria->compare('nhorasverde',$this->nhorasverde);
		$criteria->compare('numdocref',$this->numdocref,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('ap',$this->ap,true);
		$criteria->compare('despro',$this->despro,true);
		$criteria->compare('rucpro',$this->rucpro,true);
		$criteria->compare('final',$this->final,true);
                if(isset($_SESSION['sesion_Clipro']))
                    {
			$criteria->addInCondition('codprov', $_SESSION['sesion_Clipro'], 'AND');
			  } ELSE {
				$criteria->compare('codprov',$this->codprov,true);
                      }
                      
                if(isset($_SESSION['sesion_Docingresados']))
                    {
			$criteria->addInCondition('id', $_SESSION['sesion_Docingresados'], 'AND');
			  } ELSE {
				$criteria->compare('id',$this->codprov,true);
                      }      
                      
                      
                      
               if(isset($_SESSION['sesion_Embarcaciones']))
                    {
			$criteria->addInCondition('codepv', $_SESSION['sesion_Embarcaciones'], 'AND');
			  } ELSE {
				$criteria->compare('codepv',$this->codepv,true);
                      } 
                      
                       if((isset($this->fechain) && trim($this->fechain) != "") && (isset($this->d_fechain1) && trim($this->d_fechain1) != ""))  {
		           
                        $criteria->addBetweenCondition('fechain', ''.$this->fechain.'', ''.$this->d_fechain1.''); 
						//VAR_DUMP($criteria->params);DIE();
						}
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        public function search_por_proceso($arrayvalores)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
            $criteria->addInCondition('id',$arrayvalores);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwDoci the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
     public function horaspadas(){
       return round((time()-strtotime($this->fechacrea))/(60*60),2);
     }   
      
     public function getcolor(){
         if($this->final <> "1"){
             $pasado=$this->horaspadas();
         if( $pasado < $this->nhorasverde)
             return '#07a204';
         if( $pasado < $this->nhorasnaranja and $pasado > $this->nhorasverde)
            return '#f1bd02';
          if( $pasado  > $this->nhorasnaranja)
              
            return '#f5143e';
         }else{
           return '#d8d5d2';  
         }
         
             
     }
     
     public function afterfind(){
         $this->color=$this->getcolor();
         return parent::afterfind();
     }
        
}
