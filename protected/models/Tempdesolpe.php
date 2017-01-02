<?php

class Tempdesolpe extends ModeloGeneral
{
	
    const ESTADO_PREVIO='99';
    const ESTADO_CREADO='10';
     const ESTADO_REGISTRO_NUEVO='10';
    
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tempdesolpe}}';
	}
        
        
        public function init() {
            $this->campoestado='est';
            
            $this->campossensibles=array(
                 'fechaent'=>array(self::ESTADO_REGISTRO_NUEVO,self::ESTADO_PREVIO,self::ESTADO_CREADO),
                               'centro'=>array(self::ESTADO_REGISTRO_NUEVO,self::ESTADO_PREVIO,self::ESTADO_CREADO),
                'imputacion'=>array(self::ESTADO_REGISTRO_NUEVO,self::ESTADO_PREVIO,self::ESTADO_CREADO),                
                'codal'=>array(self::ESTADO_REGISTRO_NUEVO,self::ESTADO_PREVIO,self::ESTADO_CREADO),
            'codart'=>array(self::ESTADO_PREVIO,self::ESTADO_CREADO),
                'cant'=>array(self::ESTADO_REGISTRO_NUEVO,self::ESTADO_PREVIO,self::ESTADO_CREADO),
            'um'=>array(self::ESTADO_REGISTRO_NUEVO,self::ESTADO_PREVIO,self::ESTADO_CREADO),
               // 'txtmaterial'=>array(SELF::ESTADO_PREVIO,SELF::ESTADO_CREADO),
            
                
                );
            //var_dump($this->campossensibles);die();
        }
        

	/**
	 * @return array valhistion rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//
                    array('est',  'safe','on'=>'Atencionreserva'),
			array('centro, codal,cant, codart, txtmaterial,'
                            . 'um,hidlabor', 'required','on'=>'buffer'),
			array('tipsolpe,centro, codal,hidot,hcodoc, codart,item,codservicio,
			fechaent,est, txtmaterial,hidlabor,iduser,idusertemp,punitreal,idstatus,id,idtemp', 'safe','on'=>'buffer'),
			array('codart', 'checkvalores'),
                        array('codart', 'chkcatval'),
			array('codal', 'checkal'),
			array('posicion, iduser, idusertemp, idstatus', 'numerical', 'integerOnly'=>true),
			array('cant, cantaten, punitplan, punitreal', 'numerical'),
			array('id, hidsolpe, idreserva, hidot, idtemp', 'length', 'max'=>20),
			array('numero', 'length', 'max'=>10),
			array('tipimputacion, tipsolpe, estadolib, firme', 'length', 'max'=>1),
			array('centro, grupocompras', 'length', 'max'=>4),
			array('codal, codocu, item, um, hcodoc', 'length', 'max'=>3),
			array('codart, imputacion', 'length', 'max'=>12),
			array('txtmaterial', 'length', 'max'=>40),
			array('usuario', 'length', 'max'=>35),
			array('est', 'length', 'max'=>2),
			array('solicitanet', 'length', 'max'=>25),
			array('codservicio', 'length', 'max'=>8),
			array('id,hidlabor, numero, tipimputacion, centro, codal, codart, txtmaterial, grupocompras, usuario, textodetalle, fechacrea, fechaent, fechalib, imputacion, hidsolpe, codocu, tipsolpe, est, cant, item, cantaten, posicion, estadolib, solicitanet, um, firme, idreserva, punitplan, punitreal, codservicio, iduser, hidot, hcodoc, idusertemp, idtemp, idstatus', 'safe', 'on'=>'search_por_ot'),


			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,hidlabor, numero, tipimputacion, centro, codal, codart, txtmaterial, grupocompras, usuario, textodetalle, fechacrea, fechaent, fechalib, imputacion, hidsolpe, codocu, tipsolpe, est, cant, item, cantaten, posicion, estadolib, solicitanet, um, firme, idreserva, punitplan, punitreal, codservicio, iduser, hidot, hcodoc, idusertemp, idtemp, idstatus', 'safe', 'on'=>'search'),
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
			'solpe' => array(self::BELONGS_TO, 'Solpe', 'hidsolpe'),
                    'cc' => array(self::BELONGS_TO, 'Cc', 'imputacion'),
			'desolpe' => array(self::HAS_ONE, 'Desolpe', 'idtemp'),
			'servicios'=>array(self::BELONGS_TO, 'Maestroservicios', 'codservicio'),
           'maestro' => array(self::BELONGS_TO, 'Maestrocompo', 'codart'),
			'ot' => array(self::BELONGS_TO, 'Ot', 'hidot'),
			'tempdetot' => array(self::BELONGS_TO, 'tempdetot', 'hidlabor'),
			'um' => array(self::BELONGS_TO, 'Ums', 'um'),
			'estado'=>array(self::BELONGS_TO,'Estado',array('est'=>'codestado','codocu'=>'codocu')),
			'almac' => array(self::BELONGS_TO, 'Almacenes', 'codal'),
			'desolpe_alinventario'=> array(self::BELONGS_TO, 'Alinventario', array('codal'=>'codalm','centro'=>'codcen','codart'=>'codart')),
			'alkardex_gastos'=>array(self::STAT, 'Alkardex', 'idref','select'=>'sum(montomovido*-1)','condition'=>"codocuref in('890','891')"),//el campo foraneo
			//'alkardex_gastos'=>array(self::STAT, 'Alkardex', 'idref','select'=>'sum(montomovido*-1)','condition'=>"1=1"),//el campo foraneo
//'ot'=>array(self::STAT, 'Alkardex', 'idref','select'=>'sum(montomovido*-1)','condition'=>"codocuref in('340','350')"),//el campo foraneo
           // 'numeroitem'=>array(self::STAT, 'Tempdesolpe','hidot','select'=>'max(t.item)','condition'=>"iduser=".yii::app()->user->id),


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
			'tipimputacion' => 'Tipimputacion',
			'centro' => 'Centro',
			'codal' => 'Codal',
			'codart' => 'Codart',
			'txtmaterial' => 'Txtmaterial',
			'grupocompras' => 'Grupocompras',
			'usuario' => 'Usuario',
			'textodetalle' => 'Textodetalle',
			'fechacrea' => 'Fechacrea',
			'fechaent' => 'Fechaent',
			'fechalib' => 'Fechalib',
			'imputacion' => 'Imputacion',
			'hidsolpe' => 'Hidsolpe',
			'codocu' => 'Codocu',
			'tipsolpe' => 'Tipsolpe',
			'est' => 'Est',
			'cant' => 'Cant',
			'item' => 'Item',
			'cantaten' => 'Cantaten',
			'posicion' => 'Posicion',
			'estadolib' => 'Estadolib',
			'solicitanet' => 'Solicitanet',
			'um' => 'Um',
			'firme' => 'Firme',
			'idreserva' => 'Idreserva',
			'punitplan' => 'Punitplan',
			'punitreal' => 'Punitreal',
			'codservicio' => 'Codservicio',
			'iduser' => 'Iduser',
			'hidot' => 'Hidot',
			'hcodoc' => 'Hcodoc',
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
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('tipimputacion',$this->tipimputacion,true);
		$criteria->compare('centro',$this->centro,true);
		$criteria->compare('codal',$this->codal,true);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('txtmaterial',$this->txtmaterial,true);
		$criteria->compare('grupocompras',$this->grupocompras,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('textodetalle',$this->textodetalle,true);
		$criteria->compare('fechacrea',$this->fechacrea,true);
		$criteria->compare('fechaent',$this->fechaent,true);
		$criteria->compare('fechalib',$this->fechalib,true);
		$criteria->compare('imputacion',$this->imputacion,true);
		$criteria->compare('hidsolpe',$this->hidsolpe,true);
		$criteria->compare('codocu',$this->codocu,true);
		$criteria->compare('tipsolpe',$this->tipsolpe,true);
		$criteria->compare('est',$this->est,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('cantaten',$this->cantaten);
		$criteria->compare('posicion',$this->posicion);
		$criteria->compare('estadolib',$this->estadolib,true);
		$criteria->compare('solicitanet',$this->solicitanet,true);
		$criteria->compare('um',$this->um,true);
		$criteria->compare('firme',$this->firme,true);
		$criteria->compare('idreserva',$this->idreserva,true);
		$criteria->compare('punitplan',$this->punitplan);
		$criteria->compare('punitreal',$this->punitreal);
		$criteria->compare('codservicio',$this->codservicio,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('hidot',$this->hidot,true);
		$criteria->compare('hidlabor',$this->hidot,true);
		$criteria->compare('hcodoc',$this->hcodoc,true);
		$criteria->compare('idusertemp',$this->idusertemp);
		$criteria->compare('idtemp',$this->idtemp,true);
		$criteria->compare('idstatus',$this->idstatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tempdesolpe the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function search_por_ot($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('txtmaterial',$this->txtmaterial,true);
		$criteria->compare('hidlabor',$this->hidlabor,true);
		$criteria->addCondition("hidot=".$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function checkvalores($attribute,$params) {
		$codigoserv=yii::app()->settings->get('materiales','materiales_codigoservicio');
		$modelomaterial=Maestrocompo::model()->find("codigo=:codigox",array(":codigox"=>TRIM($this->codart)));

		/*******************************************
		+		Debe de exigir el tipo de solpe
		+		la combinacion de valores del tipo de solpe-material
		 ***********************************************/
		if ($this->tipsolpe=='M')		{
			if ($this->codart==$codigoserv)
				$this->adderror('codart','Este es un servicio, usted esta solicitando un material' );


			if (is_null($modelomaterial)) {
				$this->adderror('codart','Este material no existe ...' );
			} else {

				if($this->desolpe_alinventario===null)
					$this->adderror('codart','Este material tiene que ser ampliado al centro '.$this->centro.' y almacen '.$this->codal.' ' );
			}

		}	else { //Si es un servicio
			if (is_null($modelomaterial)) {
				if (!empty($this->codart)) {
					$this->adderror('codart','Este material no existe ->' );
				}else {
					// $this->adderror('codart','Este material no existe' );
					$this->codart=$codigoserv;
				}

			}else {
				if (TRIM($this->codart) <> $codigoserv )
					$this->adderror('tipsolpe','Este es un servicio, usted esta solicitando un material' );


			}

		}

	}

	public function checkal($attribute,$params) {
		if($this->almac->codcen <> $this->centro)
			$this->adderror('codal','No se permite un almacen que no este en el centro' );





	}

	public function beforeSave() {
             //$this->item=$this->numeroitem;
		if ($this->isNewRecord) {
                     
			if($this->tipsolpe=='M'){
				$registroinventario = $this->desolpe_alinventario;
				$this->punitplan = $this->cant*$registroinventario->getprecio(abs($this->cant)) *
					Alconversiones::convierte($this->codart, $this->um) *
					yii::app()->tipocambio->getcambio($registroinventario->almacen->codmon,
						yii::app()->settings->get('general', 'general_monedadef'));//}
				//$this->punitreal = 0;
				$this->cantaten = 0;

			}ELSE {
				$this->punitplan = $this->punitplan * $this->cant;
			}


		} else
		{
			if($this->cambiocampo('codal') or $this->cambiocampo('codart') or $this->cambiocampo('cant') ) {
				if ($this->tipsolpe == 'M') {
					$registroinventario = $this->desolpe_alinventario;
					$this->punitplan = $this->cant * $registroinventario->getprecio(abs($this->cant)) *
						Alconversiones::convierte($this->codart, $this->um) *
						yii::app()->tipocambio->getcambio($registroinventario->almacen->codmon,
							yii::app()->settings->get('general', 'general_monedadef'));

				}ELSE{
					$this->punitplan=$this->punitplan*$this->cant;
				}
			}
           }



		return parent::beforeSave();
	}

	public static function getTotal($provider)
	{
		$totalreal=0;
		$totalplan=0;
		foreach($provider->data as $data)
		{
			if($data->est <> '20'){
				$r = $data->punitreal;
				$p=$data->punitplan;
				$totalreal += $r;
				$totalplan += $p;
			}
		}
		return array('plan'=>$totalplan,'real'=>$totalreal);
	}

	public function afterfind(){
		if($this->tipsolpe=='M'){
			//$this->punitreal=$this->desolpe->alkardex_gastos;
                        //$this->punitreal=14.73;
		}else{ //Si es un servicio

			$this->punitreal=Yii::app()->db->createCommand()
				->select('sum(k.montomovido)')
				->from('{{alkardex}} k, {{docompra}} d, {{desolpecompra}} ds ' )
				->where("k.idref=d.id and
						k.codocuref in ('210','220') and
						d.id=ds.iddocompra and
						 ds.iddesolpe=:vid ",array(":vid"=>$this->id))->queryScalar();

		}

		return parent::afterfind();
	}
        
        public function chkcatval($attribute,$params){
 if(!Maestrodetalle::tienecatvaloracion($this->codart,$this->codal,$this->centro))
	 $this->adderror('codart','Este material no tiene grupo de valor válido, complete este valor en los datos maestros del material para este centro y almacen');

      }

}
